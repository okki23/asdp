<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_posisi extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data posisi
	public function get_all_posisi(){
	global $db;
	$query = $this->db->query("SELECT lit_code_position, name_position, code_core_orm, case when tipe = 'L' then 'Laut' when tipe = 'D' then 'Darat' end as tipe FROM lit_tab_posisi order by lit_code_position asc");

 	return $query;
	}

	public function get_all_posisi_json(){
 
	$query = $this->db->query("SELECT lit_code_position, name_position, code_core_orm, case when tipe = 'L' then 'Laut' when tipe = 'D' then 'Darat' end as tipe FROM lit_tab_posisi order by lit_code_position asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'lit_code_position' => $row->lit_code_position,
	                'name_position'   => $row->name_position,
	                'code_core_orm'=> $row->code_core_orm,
	                'tipe'=> $row->tipe,
					'opsi'=> '<a href="'.base_url('posisi/posisi_delete/').'/'.$row->lit_code_position.'""> <img src="'.base_url('assets/images/delete.png').'" title="Delete"> </a><a href="'.base_url('posisi/posisi_update/').'/'.$row->lit_code_position.'""> <img src="'.base_url('assets/images/edit.png').'" title="Edit"></a>',
					//<a href="'.base_url('posisi/posisi_detail/').'/'.$row->lit_code_position.'""> <img src="'.base_url('assets/images/view.png').'" title="Profile"></a>
	                //'opsidelete'=> '<a href="'.base_url('posisi/posisi_delete/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/delete.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('posisi/posisi_update/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/edit.png').'"></a>',
                    //    'opsidetail'=> '<a href="'.base_url('posisi/posisi_detail/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/detail.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}

public function get_chart_posisi_json(){
 
	$query = $this->db->query("SELECT
    CASE
        WHEN gender = 1 THEN 'Pria' else 'Wanita'
    END as range_gender,
    COUNT(*) AS jumlah
FROM human_pa_md_emp_personal
GROUP BY gender
ORDER BY gender");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'range_gender' => $row->range_gender,
	                'jumlah'   => $row->jumlah
					//,
	                //'opsidelete'=> '<a href="'.base_url('posisi/posisi_delete/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/recycle.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('posisi/posisi_update/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/settings.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}


	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data posisi baru
	public function pro_add_posisi($nik,$tanggal_masuk,$nama){
	$query = $this->db->query("insert into human_pa_md_emp_personal (personnel_id,start_date,end_date,name_full) VALUES ('$nik','$tanggal_masuk','99991231','$nama')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function posisi_update($id){
		$query = $this->db->query("select *,date_format(start_date,'%d-%m-%Y') as tanggal_masuk from  human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function posisi_delete($id){
		$query = $this->db->query("delete from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function pro_update_posisi($nik,$tanggal_masuk,$nama){
		$query = $this->db->query("update human_pa_md_emp_personal set start_date = '$tanggal_masuk', name_full = '$nama' where personnel_id = '$nik'");
		return $query;
	}
}
