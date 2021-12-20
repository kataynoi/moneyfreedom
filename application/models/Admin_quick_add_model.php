<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_quick_add_model extends CI_Model
{

    public function get_quick_add($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->get("quick_add")
            ->row();
        return $rs;
    }
}