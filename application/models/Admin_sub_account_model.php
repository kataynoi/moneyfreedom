<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Admin_sub_account_model extends CI_Model
{
    var $table = "sub_account";
    var $order_column = Array('id','name','account_id','limit','active',);

    function make_query()
    {
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("name", $_POST["search"]["value"]);$this->db->or_like("account_id", $_POST["search"]["value"]);
            $this->db->group_end();

        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('', '');
        }
    }

    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    /* End Datatable*/
    public function del_admin_sub_account($id)
        {
        $rs = $this->db
            ->where('id', $id)
            ->delete('sub_account');
        return $rs;
        }

        public function get_account(){
                        $rs = $this->db
                        ->get("account")
                        ->result();
                        return $rs;}    public function get_account_id_name($id)
                {
                    $rs = $this->db
                        ->where("id",$id)
                        ->get("account")
                        ->row();
                    return $rs?$rs->name:"";
                }

    public function save_admin_sub_account($data)
            {

                $rs = $this->db
                    ->set("id", $data["id"])->set("name", $data["name"])->set("account_id", $data["account_id"])->set("limit", $data["limit"])->set("active", $data["active"])
                    ->insert('sub_account');

                return $this->db->insert_id();

            }
    public function update_admin_sub_account($data)
            {
                $rs = $this->db
                    ->set("id", $data["id"])->set("name", $data["name"])->set("account_id", $data["account_id"])->set("limit", $data["limit"])->set("active", $data["active"])->where("id",$data["id"])
                    ->update('sub_account');

                return $rs;

            }
    public function get_admin_sub_account($id)
                {
                    $rs = $this->db
                        ->where('id',$id)
                        ->get("sub_account")
                        ->row();
                    return $rs;
                }
}