<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_pribadi extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data data_pribadi
	public function get_all_data_pribadi($personnel_id){
 
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as gender,date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal where personnel_id = '$personnel_id' order by personnel_id asc");

 	return $query;
	}

	public function get_all_data_pribadi_json($personnel_id){
 
	$query = $this->db->query("select a.*,b.name as agama,c.name as marital_status,case when a.gender = '1' then 'Pria' when a.gender = '2' then 'Wanita' end as gender,date_format(a.start_date,'%d-%m-%Y') as tanggalmasuknya,date_format(a.end_date,'%d-%m-%Y') as tanggalberakhir,date_format(a.birth_date,'%d-%m-%Y') as tanggallahir from human_pa_md_emp_personal a
		left join human_cust_personnel_religion b on b.religion = a.religion 
		left join human_cust_personnel_marital_status c on c.marital_status = a.marital_status
		where a.personnel_id = '$personnel_id' order by a.personnel_id asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'name_full'   => $row->name_full,
	                'start_date'=> $row->tanggalmasuknya,
	                'end_date'=> $row->tanggalberakhir,
	                'gender'=> $row->gender,
	                'birth_date'=> $row->tanggallahir,
	                'religion'=>$row->agama,
	                'marital_status'=>$row->marital_status,                       
                    //'opsidelete'=> '<a href="'.base_url('data_pribadi/data_pribadi_delete/').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/delete.png').'"> </a>',
	                'opsi'=> '<a href="'.base_url('data_pribadi/update_data_pribadi/').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/edit.png').'"></a>'

	            );
	        }
	     return $list_data;
	}




	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data data_pribadi baru
	public function pro_add_data_pribadi($nik,$stor_tanggal_masuk,$nama){
	$query = $this->db->query("insert into human_pa_md_emp_personal (personnel_id,start_date,name_full) VALUES ('$nik','$stor_tanggal_masuk','$nama')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function add_data_pribadi_selected($personnel_id){
		$query = $this->db->query("select * from  human_pa_md_emp_personal where personnel_id = '$personnel_id' ");
		return $query;
	}

	public function update_data_pribadi($personnel_id,$start_date,$end_date){
		$query = $this->db->query("select *,date_format(start_date,'%d-%m-%Y') as tanggalmasuknya,date_format(end_date,'%d-%m-%Y') as tanggalberakhir,date_format(birth_date,'%d-%m-%Y') as tanggallahir,date_format(status_since,'%d-%m-%Y') as status_since from  human_pa_md_emp_personal where personnel_id = '$personnel_id' AND start_date = '$start_date' AND end_date = '$end_date' ");
		return $query;
	}

	public function data_pribadi_selected($personnel_id){
		$query = $this->db->query("select * from  human_pa_md_emp_personal where personnel_id = '$personnel_id' ");
		return $query;
	}

	public function data_pribadi_delete($id){
		$query = $this->db->query("delete from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function pro_update_data_pribadi($nik,$stor_tanggal_masuk,$nama){
		$query = $this->db->query("update human_pa_md_emp_personal set start_date = '$stor_tanggal_masuk', name_full = '$nama' where personnel_id = '$nik'");
		return $query;
	}


	public function opt_prefix(){
	$sql = $this->db->query("select * from human_cust_personnel_prefix order by prefix asc");
	return $sql;
	}


	public function opt_suffix(){
	$sql = $this->db->query("select * from human_cust_personnel_suffix order by suffix asc");
	return $sql;
	}

	public function opt_ethnic(){
	$sql = $this->db->query("select * from human_cust_personnel_ethnic order by ethnic asc");
	return $sql;
	}

	public function opt_religion(){
	$sql = $this->db->query("select * from human_cust_personnel_religion order by religion asc");
	return $sql;
	}

	public function opt_marital_status(){
	$sql = $this->db->query("select * from human_cust_personnel_marital_status order by marital_status asc");
	return $sql;
	}
 
	public function pro_update_data_pribadi_selected($data){
	$stardate = substr($data['start_date'],6,4).substr($data['start_date'],3,2).substr($data['start_date'],0,2);
	$enddate = substr($data['end_date'],6,4).substr($data['end_date'],3,2).substr($data['end_date'],0,2);
	$sql = $this->db->query("update human_pa_md_emp_personal set
							status_process = '$data[status_process]', 
							name_first = '$data[name_first]',
							name_mid = '$data[name_mid]',
							name_last = '$data[name_last]',
							name_full = '$data[name_full]',
							name_nick = '$data[name_nick]',
							prefix = '$data[prefix]',
							prefix_other = '$data[prefix_other]',
							suffix = '$data[suffix]',
							suffix_other = '$data[suffix_other]',
							gender = '$data[gender]',
							birth_place = '$data[birth_place]',
							birth_date = '$data[birth_date]',
							nationality = '$data[nationality]',
							ethnic = '$data[ethnic]',
							ethnic_other = '$data[ethnic_other]',
							religion = '$data[religion]',
							marital_status = '$data[marital_status]',
							status_since = '$data[status_since]',
							no_of_children = '$data[no_of_children]'
							where personnel_id = '$data[personnel_id]' AND start_date = '$stardate' AND end_date = '$enddate'");
	
	return $sql;
	}

	public function pro_add_data_pribadi_selected($data){

		$sql = $this->db->query("INSERT INTO human_pa_md_emp_personal (
				personnel_id,start_date,end_date,status_process,name_full,name_first,name_mid,name_last,name_nick,prefix,prefix_other,suffix,suffix_other,gender,birth_date,birth_place,nationality,ethnic,ethnic_other,religion,marital_status,status_since,no_of_children) VALUES 
				('$data[personnel_id]','$data[start_date]',
				'$data[end_date]','$data[status_process]',
				'$data[name_full]','$data[name_first]','$data[name_mid]',
				'$data[name_last]','$data[name_nick]','$data[prefix]',
				'$data[prefix_other]','$data[suffix]','$data[suffix_other]',
				'$data[gender]','$data[birth_date]','$data[birth_place]',
				'$data[nationality]','$data[ethnic]','$data[ethnic_other]',
				'$data[religion]','$data[marital_status]','$data[status_since]','$data[no_of_children]')");

	return $sql;
	}
	 

 
}
