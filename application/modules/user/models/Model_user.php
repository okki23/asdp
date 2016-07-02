<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data user
	public function get_all_user(){
	global $db;
	$query = $this->db->query("SELECT instance,status_process, logon_success_last_date,user_id,lit_auth_password, lit_authority, lit_code_core_orm, 
case when lit_level_user = '3' then 'Super Admin' when 
lit_level_user = '2' then 'Admin' when 
lit_level_user = '1' then 'pegawai' end as status 
FROM core_identity_user");

 	return $query;
	}

	public function get_all_user_json(){
 
	$query = $this->db->query("SELECT instance,status_process, logon_success_last_date,user_id,lit_auth_password, lit_authority, lit_code_core_orm, 
case when lit_level_user = '3' then 'Super Admin' when 
lit_level_user = '2' then 'Admin' when 
lit_level_user = '1' then 'Pegawai' end as status 
FROM core_identity_user");

			$list_data = null;
	        foreach ($query->result() as $row) {
				$list_data[] = array(
				    'user_id' => $row->user_id,
	                'logon_success_last_date'   => $row->logon_success_last_date,
	                'status'=> $row->status,
	                'opsi'=> '<a href="'.base_url('user/user_delete/').'/'.$row->user_id.'""> <img src="'.base_url('assets/images/delete.png').'" title="Delete"> </a>
	                <a href="'.base_url('user/user_update/').'/'.$row->user_id.'""> <img src="'.base_url('assets/images/edit.png').'" title="Edit"></a>',
	                //<a href="'.base_url('pegawai/pegawai_detail/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/images/view.png').'" title="Profile"></a>'
	                
					//,
	                //'opsidelete'=> '<a href="'.base_url('user/user_delete/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/recycle.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('user/user_update/').'/'.$row->personnel_id.'""> <img src="'.base_url('assets/jqwidget/images/settings.png').'"></a>'

	            
				);
	        }
	     return $list_data;
	}





	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(user_id),-8) AS id  FROM core_identity_user");

	return $query;
	}

	//ini method untuk menyimpan data user baru
	public function pro_add_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process){
	$query = $this->db->query("insert into core_identity_user (instance, user_id,lit_auth_password,lit_code_core_orm,lit_level_user,lit_authority,status_process) 
			values ('$instance', '$user_id','$lit_auth_password','$lit_code_core_orm','$lit_level_user','$auth','$status_process')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function user_update($user_id){
		$query = $this->db->query("select * from core_identity_user where user_id = '$user_id' ");
		return $query;
	}

	public function user_delete($user_id){
		$query = $this->db->query("delete from core_identity_user where user_id = '$user_id' ");
		return $query;
	}

	public function pro_update_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process){
		$query = $this->db->query("update core_identity_user set instance = '$instance', lit_auth_password = '$lit_auth_password', lit_code_core_orm = '$lit_code_core_orm', lit_level_user = '$lit_level_user', lit_authority='$auth', status_process = '$status_process' where user_id = '$user_id'");
		return $query;
	}
}
