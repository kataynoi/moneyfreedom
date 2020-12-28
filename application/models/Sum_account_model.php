<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Sum_account_model extends CI_Model
{
    var $sql = "SELECT b.`name` account ,SUM(a.price) as sum FROM pay_items a
LEFT JOIN account b ON a.account_id = b.id
WHERE DATE_FORMAT(a.date,'%Y-%m')='2020-08'
GROUP BY a.account_id ORDER BY sum DESC";

    function make_datatables()
    {
        $query = $this->db->query($this->sql);
        return $query->result();
    }
}