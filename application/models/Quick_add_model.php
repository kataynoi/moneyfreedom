<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Quick_add_model extends CI_Model
{

    public function get_quick_add()
    {
        $rs = $this->db
            ->where('active',1)
            ->order_by('pay_times','DESC')
            ->get("quick_add")
            ->result();
        return $rs;
    }
}