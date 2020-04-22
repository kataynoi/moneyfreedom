<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Admin_hospital_model extends CI_Model
{
    var $table = "chospital";
    var $order_column = Array('id','name','hostype','address','subdistcode','tel','boss',);

    function make_query()
    {
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("name", $_POST["search"]["value"]);
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
    public function del_admin_hospital($id)
        {
        $rs = $this->db
            ->where('id', $id)
            ->delete('chospital');
        return $rs;
        }

        public function get_chostype(){
                        $rs = $this->db
                        ->get("chostype")
                        ->result();
                        return $rs;}    public function get_hostype_name($id)
                {
                    $rs = $this->db
                        ->where("id",$id)
                        ->get("chostype")
                        ->row();
                    return $rs?$rs->name:"";
                }public function get_employee(){
                        $rs = $this->db
                        ->get("employee")
                        ->result();
                        return $rs;}    public function get_boss_name($id)
                {
                    $rs = $this->db
                        ->where("id",$id)
                        ->get("employee")
                        ->row();
                    return $rs?$rs->name:"";
                }

    public function save_admin_hospital($data)
            {

                $rs = $this->db
                    ->set("id", $data["id"])->set("name", $data["name"])->set("hostype", $data["hostype"])->set("address", $data["address"])->set("subdistcode", $data["subdistcode"])->set("tel", $data["tel"])->set("boss", $data["boss"])
                    ->insert('chospital');

                return $this->db->insert_id();

            }
    public function update_admin_hospital($data)
            {
                $rs = $this->db
                    ->set("id", $data["id"])->set("name", $data["name"])->set("hostype", $data["hostype"])->set("address", $data["address"])->set("subdistcode", $data["subdistcode"])->set("tel", $data["tel"])->set("boss", $data["boss"])->where("id",$data["id"])
                    ->update('chospital');

                return $rs;

            }
    public function get_admin_hospital($id)
                {
                    $rs = $this->db
                        ->where('id',$id)
                        ->get("chospital")
                        ->row();
                    return $rs;
                }
}