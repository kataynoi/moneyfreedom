<?php
class Excel_export_model extends CI_Model
{
    function fetch_data($ampurcode)
    {

        $day_now = date("Y-m-d");
        $sql = "SELECT a.d_update,a.cid,a.`name`,a.tel,f.`name` as from_conutry,e.changwatname as from_province  , a.date_in,a.`no` ,a.moo,c.tambonname,b.ampurname,a.in_family,g.`name` as reporter
                FROM person_survey a
                LEFT JOIN (SELECT * FROM campur WHERE changwatcode='44') b ON a.ampur = b.ampurcodefull
                LEFT JOIN ( SELECT * FROM ctambon WHERE ampurcode='$ampurcode') c ON a.tambon = c.tamboncodefull
                LEFT JOIN cchangwat e ON a.from_province = e.changwatcode
                LEFT JOIN cnation f ON a.from_conutry = f.id
                LEFT JOIN users g ON a.reporter = g.id
                WHERE a.ampur ='$ampurcode'
                GROUP BY a.cid";
        $rs = $this->db->query($sql)->result();
        //echo $this->db->last_query();

        return $rs;
/*

        $this->db->order_by("id", "DESC");
        $query = $this->db
            ->where('ampur',$ampurcode)
            ->get("person_survey");
        return $query->result();*/
    }


}