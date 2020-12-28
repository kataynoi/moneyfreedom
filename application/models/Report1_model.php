<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Report1_model extends CI_Model
{
    var $sql = "SELECT b.`name` account , a.subaccount_id,SUM(a.price) as sum FROM pay_items a
LEFT JOIN sub_account b ON a.subaccount_id = b.id
WHERE a.account_id=1
AND DATE_FORMAT(a.date,'%Y-%m')='2020-09'
GROUP BY a.subaccount_id ORDER BY sum DESC";

    function make_datatables()
    {
        $query = $this->db->query($this->sql);
        return $query->result();
    }
}