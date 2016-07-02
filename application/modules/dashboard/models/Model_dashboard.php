<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}
	public function get_count_all_json(){
 
	$query = $this->db->query("SELECT * FROM human_pa_md_emp_personal");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'personnel_id'   => $row->personnel_id
				);
	        }
	     return $list_data;
	}
	
	public function get_count_gender_json(){
 
	$query = $this->db->query("select
  case when gender = '1' then 'Pria' when gender = '2' then 'Wanita' end as kelamin,
  count(*) as jumlah
from human_pa_md_emp_personal
group by gender");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				//array("kelamin", $row->kelamin),
				$row->kelamin, $row->jumlah
				    //'kelamin'   => $row->kelamin,
					//'jumlah'   => $row->jumlah
				);
	        }
	     return $list_data;
	}
}
