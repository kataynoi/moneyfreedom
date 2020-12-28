<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sum_account extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();

                
        $this->load->model('Sum_account_model', 'crud');
    }

    public function index()
    {
        $data[] = '';
        
        $this->layout->view('sum_account/index', $data);
    }


    function fetch_sum_account()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {


            $sub_array = array();
                $sub_array[] = $row->account;$sub_array[] = $row->sum;
                $data[] = $sub_array;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }

    public function  get_sum_account()
    {
                $id = $this->input->post('id');
                $rs = $this->crud->get_sum_account($id);
                $rows = json_encode($rs);
                $json = '{"success": true, "rows": ' . $rows . '}';
                render_json($json);
    }
}