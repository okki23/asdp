<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_orm extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data pegawai
	public function get_all_pegawai(){
	global $db;
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as gender,date_format(start_date,'%d %M %Y') as tanggalmasuknya from core_orm order by code asc");

 	return $query;
	}

	public function get_all_orm_json(){
 
	$query = $this->db->query("select * from core_orm order by code asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'code' => $row->code,
	                'name'   => $row->name,
	                'start_date'=> $row->start_date
					//,
	                //'opsidelete'=> '<a href="'.base_url('pegawai/pegawai_delete/').'/'.$row->code.'""> <img src="'.base_url('assets/images/delete.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('pegawai/pegawai_update/').'/'.$row->code.'""> <img src="'.base_url('assets/images/edit.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}

public function get_chart_pegawai_json(){
 
	$query = $this->db->query("SELECT
    CASE
        WHEN gender = 1 THEN 'Pria' else 'Wanita'
    END as range_gender,
    COUNT(*) AS jumlah
FROM core_orm
GROUP BY gender
ORDER BY gender");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'range_gender' => $row->range_gender,
	                'jumlah'   => $row->jumlah
					//,
	                //'opsidelete'=> '<a href="'.base_url('pegawai/pegawai_delete/').'/'.$row->code.'""> <img src="'.base_url('assets/jqwidget/images/recycle.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('pegawai/pegawai_update/').'/'.$row->code.'""> <img src="'.base_url('assets/jqwidget/images/settings.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}


	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_code(){
	$query = $this->db->query("SELECT SUBSTR(MAX(code),-8) AS id  FROM core_orm");

	return $query;
	}

	//insert new orm
	public function save_new_orm($code,$tglstart,$name){
	$query = $this->db->query("insert into core_orm (code,start_date,end_date,name) VALUES ('$code','$tglstart','99991231','$name')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}
	//ini add orm
	public function save_add_orm($code,$tglstart,$area,$name,$parentcode){
	$query = $this->db->query("insert into core_orm (code,start_date,end_date,name,area,parentId) VALUES ('$code','$tglstart','99991231','$name','$area','$parentcode')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function orm_view_add($id){
		$query = $this->db->query("select id,substr(code,1,2)as kodecp,parentId,code,name,start_date,end_date,area from core_orm where code = '$id' ");
		return $query;
	}
	
	public function orm_update($id){
		$query = $this->db->query("select id,substr(code,1,2)as kodecp,parentId,code,name,start_date,end_date,area from core_orm where code = '$id' ");
		return $query;
	}

	public function orm_delete($id){
		$query = $this->db->query("delete from core_orm where code = '$id' ");
		return $query;
	}

	public function pro_update_orm($code,$tglstart,$tglend,$nama,$area,$parentid){
		$query = $this->db->query("update core_orm set start_date = '$tglstart',end_date = '$tglend', name = '$nama', area='$area' where code = '$code'");
		return $query;
	}
}
