<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Report model
 *
 * @author  Mr.Satit Rianpit <rianpit@yahoo.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 *
 */
class Reports_model extends CI_Model
{


    public function get_pay_month($year='2020')
    {
        $sql = "SELECT a.m_id,a.fullname,b.total,b.income,b.outcome FROM co_month a ";
        $sql .= " LEFT JOIN ";
        $sql .= " (SELECT DATE_FORMAT(a.date,'%m') as M, SUM(price) as total,SUM(IF(price >0,price,0)) as income,SUM(IF(price <0,price,0)) as outcome  FROM pay_items a WHERE DATE_FORMAT(a.date,'%Y')='" . $year . "' GROUP BY M) b ON a.m_id=b.M  ORDER BY a.m_id";
        $rs = $this->db->query($sql)->result();

        return $rs;

    }
    public function get_pay_subaccount($year='2020',$account)
    {
        $sql = "SELECT a.m_id,a.fullname,b.total,b.income,b.outcome FROM co_month a ";
        $sql .= " LEFT JOIN ";
        $sql .= " (SELECT DATE_FORMAT(a.date,'%m') as M, SUM(price) as total,SUM(IF(price >0,price,0)) as income,SUM(IF(price <0,price,0)) as outcome  FROM pay_items a WHERE account_id ='".$account."' AND DATE_FORMAT(a.date,'%Y')='" . $year . "' GROUP BY M) b ON a.m_id=b.M  ORDER BY a.m_id";
        $rs = $this->db->query($sql)->result();

        return $rs;

    }

}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */