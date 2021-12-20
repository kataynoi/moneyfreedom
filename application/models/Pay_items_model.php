<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Pay_items_model extends CI_Model
{
    var $table = "pay_items";
    var $order_column = Array('id', 'name', 'price', 'account_id', 'subaccount_id', 'date', 'note', 'd_update',);
    var $user_id;
    function make_query()
    {
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("name", $_POST["search"]["value"]);
            $this->db->or_like("account_id", $_POST["search"]["value"]);
            $this->db->or_like("subaccount_id", $_POST["search"]["value"]);
            $this->db->group_end();

        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('date', 'DESC');
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
    public function del_pay_items($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->delete('pay_items');
        return $rs;
    }

    public function get_account()
    {
        $rs = $this->db
            ->get("account")
            ->result();
        return $rs;
    }

    public function get_account_id_name($id)
    {
        $rs = $this->db
            ->where("id", $id)
            ->get("account")
            ->row();
        return $rs ? $rs->name : "";
    }

    public function get_sub_account()
    {
        $rs = $this->db
            ->get("sub_account")
            ->result();
        return $rs;
    }

    public function get_subaccount_id_name($id)
    {
        $rs = $this->db
            ->where("id", $id)
            ->get("sub_account")
            ->row();
        return $rs ? $rs->name : "";
    }

    public function save_pay_items($data)
    {
        if($data["date"]==""){
            $data["date"] = to_thai_date(date('Y-m-d'));

        }
        $this->user_id = $this->session->userdata('id');
        $rs = $this->db
            ->set("name", $data["name"])
            ->set("price", $data["price"])
            ->set("account_id", $data["account_id"])
            ->set("subaccount_id", $data["subaccount_id"])
            ->set("date", to_mysql_date($data["date"]))
            ->set("note", $data["note"])
            ->set("d_update", date('Y-m-d H:i:s'))
            ->set("user_id", $this->user_id)
            ->insert('pay_items');

        return $this->db->insert_id();

    }

    public function update_pay_items($data)
    {
        $this->user_id = $this->session->userdata('id');
        $rs = $this->db
            ->set("id", $data["id"])
            ->set("name", $data["name"])
            ->set("price", $data["price"])
            ->set("account_id", $data["account_id"])
            ->set("subaccount_id", $data["subaccount_id"])
            //->set("necessity", $data["necessity"])
            ->set("date", to_mysql_date($data["date"]))
            ->set("note", $data["note"])
            ->set("user_id", $this->user_id)
            ->where("id", $data["id"])
            ->update('pay_items');

        return $rs;

    }

    public function get_pay_items($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->get("pay_items")
            ->row();
        return $rs;
    }
}