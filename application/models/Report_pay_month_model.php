<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report_pay_month_model extends CI_Model
{
    function make_datatables($id,$m)
    {
        $sql = "SELECT b.`name` account , a.subaccount_id,SUM(a.price) as sum FROM pay_items a
                                    LEFT JOIN sub_account b ON a.subaccount_id = b.id
                                    WHERE a.account_id=".$id."
                                    AND DATE_FORMAT(a.date,'%Y-%m')='".$m."'
                                    GROUP BY a.subaccount_id ORDER BY sum DESC
                                    ";
        $query = $this->db->query($sql);
        return $query->result();
    }
 public function get_account(){
                        $rs = $this->db
                        ->get("account")
                        ->result();
                        return $rs;}    public function get_account_name($id)
                {
                    $rs = $this->db
                        ->where("id",$id)
                        ->get("account")
                        ->row();
                    return $rs?$rs->name:"";
                }
}