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
        $data['report']= $this->crud->person_bypass_last7day();
        $this->layout->view('reports/person_bypass_last7day', $data);
    }
    public function  person_survey()
    {
        $data['report']= $this->crud->person_survey();
        $this->layout->view('reports/person_survey', $data);
    }
    public function  summary_checkpoint()
    {
        $date_now='';
        $ampcode=$this->session->userdata('id');
        IF($date_now==''){$date_now=DATE("Y-m-d");};
        $data['report']= $this->crud->person_bypass_inday($ampcode,$date_now);
        $data['car']= $this->crud->car_inday($ampcode,$date_now);
        $this->layout->view('reports/summary_checkpoint', $data);
    }


}