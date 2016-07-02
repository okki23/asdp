<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_keluarga extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data keluarga
	public function get_all_keluarga(){
 
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal order by personnel_id asc");

 	return $query;
	}




	public function get_all_keluarga_detail_json($personnel_id){
 	
	$query = $this->db->query("select a.*,date_format(start_date,'%d-%m-%Y') as tglmulai,date_format(end_date,'%d-%m-%Y') as tglakhir,b.name as tipe_keluarga,date_format(a.birth_date,'%d-%m-%Y') as tanggal_lahir from human_pa_md_emp_family a  left join human_cust_personnel_family_type b on b.family_type = a.family_type where a.personnel_id = '$personnel_id' order by start_date desc");

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'tanggal_lahir'=>$row->tanggal_lahir,
	                'start_date'=>$row->start_date,
	                'end_date'=>$row->end_date,
                        'tglmulai'=>$row->tglmulai,
	                'tglakhir'=>$row->tglakhir,
	                'tipe_keluarga'=> $row->tipe_keluarga,
	                'name_full'=>$row->name_full,
	                'urutan'=>$row->seq,
                        'opsi'=> '<a href="'.base_url('keluarga/keluarga_detail_update').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/edit.png').'" title="Update"> </a><a href="'.base_url('keluarga/keluarga_detail_delete').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.' ""> <img src="'.base_url('assets/images/delete.png').'" title="Delete"></a>'


	              
	            );
	        }
	     return $list_data;
	}

	public function keluarga_detail_delete($personnel_id,$start_date,$end_date){
		$sql = $this->db->query("delete from human_pa_md_emp_family where personnel_id = '$personnel_id' AND start_date = '$start_date' AND end_date = '$end_date'");
		return $sql;
	}
	public function get_all_pic_keluarga_json($personnel_id){
 	
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus, date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal where personnel_id = '$personnel_id' order by personnel_id asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'name_full'   => $row->name_full,
	                'start_date'=> $row->tanggalmasuknya,
	                'tipe_keluarga'=>$row->tanggalmasuknya,
	                'alasan_keluarga' => $row->tanggalmasuknya
	            );
	        }
	     return $list_data;
	}

	public function get_all_pic_data_keluarga_json($personnel_id){
 
	$query = $this->db->query("select *, date_format(start_date,'%d %M %Y') as tglmulai, date_format(end_date,'%d %M %Y') as tglakhir from human_pa_md_emp_assignment where personnel_id = '$personnel_id'");
 
	}




	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data keluarga baru
	public function pro_add_keluarga($nik,$stor_tanggal_masuk,$nama){
	$query = $this->db->query("insert into human_pa_md_emp_personal (personnel_id,start_date,name_full) VALUES ('$nik','$stor_tanggal_masuk','$nama')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function opt_tipe_keluarga(){
	$sql = $this->db->query("select * from human_cust_personnel_family_type order by family_type asc");
	return $sql;
	}

	public function opt_prefix(){
	$sql = $this->db->query("select * from human_cust_personnel_prefix order by prefix asc");
	return $sql;
	}

	public function opt_marital_status(){
	$sql = $this->db->query("select * from human_cust_personnel_marital_status order by marital_status asc");
	return $sql;
	}

	public function opt_pendidikan_terakhir(){
	$sql = $this->db->query("select * from human_cust_personnel_education_level order by education_level asc");
	return $sql;
	}
 

	public function keluarga_detail($id){
		$query = $this->db->query("select a.*,b.name as tipeasignment,c.name as tipereason from human_pa_md_emp_assignment a
			left join human_cust_personnel_assignment_type b on b.assignment_type = a.assignment_type
			left join human_cust_personnel_assignment_reason c on c.assignment_reason = a.assignment_reason
			where a.personnel_id = '$id'");

		return $query;
	}

	public function keluarga_detail_pro_add($data){
		 //get last max end_date for update
                $sqla = $this->db->query ("select * from human_pa_md_emp_family where personnel_id = '$data[personnel_id]' and end_date = (select MAX(end_date) from human_pa_md_emp_family WHERE personnel_id = '$data[personnel_id]')");
                $personnel_idfirst = '';
                $start_datefirst = '';
                foreach ($sqla->result() as $rowa){
                    
                      $personnel_idfirst = $rowa->personnel_id;
                      $start_datefirst = $rowa->start_date;
                      
                }
                     
                //store new data
 
		$sqlb = $this->db->query("insert into human_pa_md_emp_family (personnel_id,start_date,end_date,status_process,
                                         family_type,seq,name_full,name_first,name_mid,name_last,name_nick,prefix,gender,birth_date,
                                         birth_place,date_of_death,last_education,address,neighborhood1,neighborhood2,postalcode,
                                         home_phone_country,home_phone_area,home_phone_no,mobile_phone_country,mobile_phone_area,
                                         mobile_phone_no,occupation,marital_status,status_since,medical_dependant,remarks,next_kind,
                                         passport_no,ktp_no) VALUES ('$data[personnel_id]','$data[start_date]','$data[end_date]','$data[status_process]','$data[family_type]','$data[seq]','$data[name_full]','$data[name_first]','$data[name_mid]','$data[name_last]','$data[name_nick]','$data[prefix]','$data[gender]','$data[birth_date]','$data[birth_place]','$data[date_of_death]','$data[last_education]','$data[address]','$data[neighborhood1]','$data[neighborhood2]','$data[postalcode]','$data[home_phone_country]','$data[home_phone_area]','$data[home_phone_no]','$data[mobile_phone_country]','$data[mobile_phone_area]','$data[mobile_phone_no]','$data[occupation]','$data[marital_status]','$data[status_since]','$data[medical_dependant]','$data[remarks]','$data[next_kind]','$data[passport_no]','$data[ktp_no]')");

                if($personnel_idfirst == ''){
                $sqlc = "";
                
                }else if($personnel_idfirst != ''){
                    
                //update last end date
                $sqlc =$this->db->query("update human_pa_md_emp_family set end_date = '$data[start_date]' where personnel_id = '$personnel_idfirst' AND start_date = '$start_datefirst'");
                
                }
               
		return $sqla;
                return $sqlb;
                return $sqlc;
                
                
	}

	public function keluarga_detail_update($personnel_id,$start_date,$end_date){

		$sql = $this->db->query("
			select *,date_format(start_date,'%d-%m-%Y') as tanggalstart,date_format(end_date,'%d-%m-%Y') as tanggalend,date_format(birth_date,'%d-%m-%Y') as tanggal_lahir,date_format(status_since,'%d-%m-%Y') as sejak,date_format(date_of_death,'%d-%m-%Y') as tanggal_meninggal from human_pa_md_emp_family where personnel_id = '$personnel_id' and start_date = '$start_date' and end_date = '$end_date'");
		return $sql;
	}

	public function keluarga_update_selected($id){
		$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%Y %M %d') as tanggalmasuknya ,date_format(start_date,'%Y %M %d') as tanggalmasuknya,date_format(end_date,'%Y %M %d') as tanggalberakhirnya,date_format(birth_date,'%d %M %Y') as tanggallahirnya from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function keluarga_detail_pro_update($data){
	/*
 
personnel_id
start_date
end_date
   
status_process
family_type
seq
name_full
name_first
name_mid
name_last
name_nick
prefix
birth_date
birth_place
date_of_death
last_education
address
neighborhood1
neighborhood2
postalcode
home_phone_country
home_phone_area
home_phone_no
mobile_phone_country
mobile_phone_area
mobile_phone_no
occupation
marital_status
status_since
medical_dependant
remarks
next_kind
passport_no
ktp_no
 

         */
            
		$query = $this->db->query("update human_pa_md_emp_family set  status_process = '$data[status_process]', 
							family_type = '$data[family_type]',
							seq = '$data[seq]',
							name_full = '$data[name_full]',
							name_first = '$data[name_first]',
							name_mid = '$data[name_mid]',
							name_last = '$data[name_last]',
							name_nick = '$data[name_nick]',
							prefix = '$data[prefix]',
							gender = '$data[gender]',
							birth_date = '$data[birth_date]',
							birth_place = '$data[birth_place]',
							date_of_death = '$data[date_of_death]',	
							last_education = '$data[last_education]',
							address = '$data[address]',
                                                        neighborhood1 = '$data[neighborhood1]',
                                                        neighborhood2 = '$data[neighborhood2]',
                                                        postalcode = '$data[postalcode]',
							home_phone_country = '$data[home_phone_country]',
							home_phone_area = '$data[home_phone_area]',
							home_phone_no = '$data[home_phone_no]',
							mobile_phone_country = '$data[mobile_phone_country]',
							mobile_phone_area = '$data[mobile_phone_area]',
							mobile_phone_no = '$data[mobile_phone_no]',
							occupation = '$data[occupation]',
							marital_status = '$data[marital_status]',
							status_since = '$data[status_since]',
							medical_dependant = '$data[medical_dependant]',
							remarks = '$data[remarks]',
                                                        next_kind  = '$data[next_kind]',
                                                        passport_no  = '$data[passport_no]',
                                                        ktp_no  = '$data[ktp_no]'
							where personnel_id = '$data[personnel_id]' 
							AND start_date = '$data[start_date]' 
							AND end_date = '$data[end_date]'");
		return $query;
	}
	public function keluarga_delete($id){
		$query = $this->db->query("delete from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function pro_update_keluarga($nik,$stor_tanggal_masuk,$nama){
		$query = $this->db->query("update human_pa_md_emp_personal set start_date = '$stor_tanggal_masuk', name_full = '$nama' where personnel_id = '$nik'");
		return $query;
	}

	public function keluarga_update_pro_selected($data){
		 
		 $sql = $this->db->query("update human_pa_md_emp_personal set 
						  		instance = '$data[instance]',
						  		name_full = '$data[name_full]',
						  		name_first = '$data[name_first]',
						  		name_mid = '$data[name_mid]',
						  		name_last = '$data[name_last]',
						  		name_nick = '$data[name_nick]',
						  		start_date = '$data[start_date]',
						  		end_date = '$data[end_date]',
						  		title = '$data[title]',
						  		status_process = '$data[status_process]',
						  		gender = '$data[gender]',
						  		birth_date = '$data[birth_date]',
						  		birth_place = '$data[birth_place]',
						  		nationality = '$data[nationality]',
						  		ethnic = '$data[ethnic]',
						  		ethnic_other = '$data[ethnic_other]',
						  		religion = '$data[religion]',
						  		marital_status = '$data[marital_status]',
						  		status_since = '$data[status_since]',
						  		no_of_children = '$data[no_of_children]'
						  		where personnel_id = '$data[personnel_id]'
						  		");

		 return $sql;
		 
	}
 
 
}
