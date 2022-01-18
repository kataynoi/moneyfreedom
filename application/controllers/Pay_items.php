<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_items extends CI_Controller
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("login"))
            redirect(site_url("user/login"));
        $this->load->model('Pay_items_model', 'crud');
        $this->load->model('Basic_model', 'basic');
        $this->user_id = $this->session->userdata('id');
    }

    public function index()
    {
        $data[] = '';
        $data["account"] = $this->crud->get_account();
        //$data["sub_account"] = $this->crud->get_sub_account();
        $this->layout->view('pay_items/index', $data);
    }


    function fetch_pay_items()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {


            $sub_array = array();
            $sub_array[] = $row->id;
            $sub_array[] = $row->name;
            $sub_array[] = $row->price;
            $sub_array[] = $row->account_id;
            $sub_array[] = $row->subaccount_id;
            //$sub_array[] = $row->necessity;
            $sub_array[] = to_thai_date_time($row->date);
            $sub_array[] = $row->note;
            $sub_array[] = to_thai_date_time($row->d_update);
            $sub_array[] = '<div class="btn-group pull-right" role="group" >
                <button class="btn btn-outline btn-success" data-btn="btn_view" data-id="' . $row->id . '"><i class="fa fa-eye"></i></button>
                <button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button>
                <button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' . $row->id . '"><i class="fa fa-trash"></i></button></div>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud->get_all_data(),
            "recordsFiltered" => $this->crud->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function del_pay_items()
    {
        $id = $this->input->post('id');

        $rs = $this->crud->del_pay_items($id);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }

    public function  save_pay_items()
    {
        $data = $this->input->post('items');
        $quick_id = $this->input->post('quick_id');
        $token = $this->get_line_token(1);
        $pay_type = '';
        $account = $this->basic->get_account_name($data['account_id']);
        $sub_account = $this->basic->get_sub_account_name($data['subaccount_id']);

        if($data['price']>1){ $pay_type='รายได้ :';}else{$pay_type = 'รายการจ่าย :';}
        if ($data['action'] == 'insert') {
            $rs = $this->crud->save_pay_items($data);
            if(isset($quick_id)){
                $this->crud->add_quick_add($quick_id);
            }
            $message = 'เพิ่ม '.$pay_type.' : '.$account.'->'.$sub_account.' :'.$data['name'].' '.$data['price'].' ['.$data['date'].']';
            $this->notify_message($message, $token);
            if ($rs) {
                $json = '{"success": true,"id":' . $rs . '}';
            } else {
                $json = '{"success": false}';
            }
        } else if ($data['action'] == 'update') {
            $rs = $this->crud->update_pay_items($data);

            $message = 'แก้ไข '.$pay_type.' : '.$account.'->'.$sub_account.' :'.$data['name'].' '.$data['price'].' ['.$data['date'].']';
            $this->notify_message($message, $token);
            if ($rs) {
                $json = '{"success": true}';
            } else {
                $json = '{"success": false}';
            }
        }

        render_json($json);
    }

    public function  get_pay_items()
    {
        $id = $this->input->post('id');
        $rs = $this->crud->get_pay_items($id);
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": ' . $rows . '}';
        render_json($json);
    }
    public function get_line_token($id)
    {
        $rs = $this->basic->get_line_token($id);
        return $rs;

    }
    public function notify_message($message, $token)
    {
        $str = $message;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://notify-api.line.me/api/notify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "message=" . $str,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $token,
                "Cache-Control: no-cache",
                "Content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        //console_log($err);
        curl_close($curl);
    }

public function quick_pay(){
    $data[] = '';
    //$data["account"] = $this->crud->get_account();
    //$data["sub_account"] = $this->crud->get_sub_account();
    $this->layout->view('pay_items/quick_pay', $data);
}

}