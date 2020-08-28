<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
/*        if (empty($this->session->userdata("user_type")))
            redirect(site_url("user/login"));*/
        $this->layout->setLayout('default_layout');
        $this->db = $this->load->database('default', true);
        $this->load->model('Basic_model', 'crud');
        $this->load->model('Dashboard_model', 'dash');
    }

    public function index()
    {
        $today = date('Y-m-d');
        $stat_date = date("Y-m-")."01";
        $end_date = date("Y-m-t", strtotime($today));
// อาหารในครอบครัว
        $data['items1'] = $this->db
            ->select('SUM(price) as items1')
            ->where("DATE_FORMAT(date,'%Y-%m-%d')  BETWEEN '".$stat_date."' AND '".$end_date."'")
            ->where('subaccount_id','2')
            ->get('pay_items')
            ->row();
//ค่าน้ำมัน
        $data['items2'] = $this->db
            ->select('SUM(price) as items2')
            ->where("DATE_FORMAT(date,'%Y-%m-%d')  BETWEEN '".$stat_date."' AND '".$end_date."'")
            ->where_in('subaccount_id','3,4,12')
            ->get('pay_items')
            ->row();
        $this->layout->view('dashboard/index_view', $data);
    }
    public function test(){
        $data[]='';
        $this->layout->view('test/index_view', $data);
    }
    public function get_ita(){
        $year=$this->input->post('year');
        $rs = $this->dash->get_ita_ebit($year);


        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->id        = $r->id;
            $obj->name      = $r->name;
            $obj->ita_index = $r->ita_index;
            $obj->n_year    = $r->n_year;
            $obj->ita_items    = $this->dash->get_ita_items($r->id);
            $arr_result[] = $obj;
        }
        $json = $rs ? '{"success": "true", "rows": ' . json_encode($arr_result) . '}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';
        render_json($json);
    }
}
