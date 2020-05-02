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
    }

    public function index()
    {
        $data[] = '';
        $data["account"] = $this->crud->get_account();
        $data["sub_account"] = $this->crud->get_sub_account();
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
        if ($data['action'] == 'insert') {
            $rs = $this->crud->save_pay_items($data);
            if ($rs) {
                $json = '{"success": true,"id":' . $rs . '}';
            } else {
                $json = '{"success": false}';
            }
        } else if ($data['action'] == 'update') {
            $rs = $this->crud->update_pay_items($data);
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
}