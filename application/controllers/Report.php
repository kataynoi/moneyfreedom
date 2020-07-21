<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Reports_model', 'crud');
    }

    public function index()
    {
        $data[] = '';
        $this->layout->view('reports/index', $data);
    }

    public function  person_bypass_last7day()
    {
        $data['report'] = $this->crud->person_bypass_last7day();
        $this->layout->view('reports/person_bypass_last7day', $data);
    }

    public function  person_survey()
    {
        $data['report'] = $this->crud->person_survey();
        $this->layout->view('reports/person_survey', $data);
    }

    public function  summary_checkpoint()
    {
        $date_now = '';
        $ampcode = $this->session->userdata('id');
        IF ($date_now == '') {
            $date_now = DATE("Y-m-d");
        };
        $data['report'] = $this->crud->person_bypass_inday($ampcode, $date_now);
        $data['car'] = $this->crud->car_inday($ampcode, $date_now);
        $this->layout->view('reports/summary_checkpoint', $data);
    }

    public function get_pay_month()
    {
        $year = $this->input->post('year');
        $rs = $this->crud->get_pay_month($year);


        $arr_result = array();
        foreach ($rs as $r) {
            $obj = new stdClass();
            $obj->m_id = $r->m_id;
            $obj->fullname = $r->fullname;
            $obj->total = $r->total;
            $obj->income = $r->income;
            $obj->outcome = $r->outcome;
            $obj->median = '';
            $arr_result[] = $obj;
        }
        $json = $rs ? '{"success": "true", "rows": ' . json_encode($arr_result) . '}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';
        render_json($json);
    }

    public function get_pay_subaccount()
    {
        $year = $this->input->post('year');
        $account = $this->input->post('account');
        $rs = $this->crud->get_pay_subaccount($year, $account);


        $arr_result = array();
        foreach ($rs as $r) {
            $obj = new stdClass();
            $obj->m_id = $r->m_id;
            $obj->fullname = $r->fullname;
            $obj->total = $r->total;
            $obj->income = $r->income;
            $obj->outcome = $r->outcome;
            $obj->median = '';
            $arr_result[] = $obj;
        }
        $json = $rs ? '{"success": "true", "rows": ' . json_encode($arr_result) . '}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';
        render_json($json);
    }
}