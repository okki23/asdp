<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alamat extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data alamat
	public function get_all_alamat(){
 
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal order by personnel_id asc");

 	return $query;
	}




	public function get_all_alamat_detail_json($personnel_id){
 	
	$query = $this->db->query("
		select a.*,b.name as tipe_alamat, date_format(a.start_date,'%d-%m-%Y') as tanggalmasuknya,date_format(a.end_date,'%d-%m-%Y') as tanggalberakhirnya  from  human_pa_md_emp_address a
		left join human_cust_personnel_address_type b on b.address_type = a.address_type where personnel_id = '$personnel_id'  order by start_date desc");

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'start_date'=>$row->start_date,
	                'end_date'=>$row->end_date,
                        'tanggalmasuknya'=>$row->tanggalmasuknya,
	                'tanggalberakhirnya'=>$row->tanggalberakhirnya,
	                'tipe_alamat'=>$row->tipe_alamat,
	                'jalan'=> $row->street,
	                'kota'=>$row->city,
	                'contact_person'=>$row->contact_person,
	                'propinsi'=>$row->province,
                        'opsi'=> '<a href="'.base_url('alamat/alamat_detail_update').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/edit.png').'" title="Update"> </a> <a href="'.base_url('alamat/alamat_detail_delete').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.' ""> <img src="'.base_url('assets/images/delete.png').'" title="Delete"></a> '

	             
	            );
	        }
	     return $list_data;
	}

	public function alamat_detail_delete($personnel_id,$start_date,$end_date){
		$sql = $this->db->query("delete from human_pa_md_emp_address where personnel_id = '$personnel_id' AND start_date = '$start_date' AND end_date = '$end_date'");
		return $sql;
	}
	public function get_all_pic_alamat_json($personnel_id){
 	
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus, date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal where personnel_id = '$personnel_id' order by personnel_id asc");

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'name_full'   => $row->name_full,
	                'start_date'=> $row->tanggalmasuknya,
	                'tipe_alamat'=>$row->tanggalmasuknya,
	                'alasan_alamat' => $row->tanggalmasuknya
	            );
	        }
	     return $list_data;
	}

	public function get_all_pic_data_alamat_json($personnel_id){
 
	$query = $this->db->query("select *, date_format(start_date,'%d %M %Y') as tglmulai, date_format(end_date,'%d %M %Y') as tglakhir from human_pa_md_emp_assignment where personnel_id = '$personnel_id'");
 
	}




	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data alamat baru
	public function pro_add_alamat($nik,$stor_tanggal_masuk,$nama){
	$query = $this->db->query("insert into human_pa_md_emp_personal (personnel_id,start_date,name_full) VALUES ('$nik','$stor_tanggal_masuk','$nama')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	 
	public function opt_tipe_alamat(){
	$sql = $this->db->query("select * from human_cust_personnel_address_type order by address_type asc");
	return $sql;
	}


	public function opt_country(){
	$sql = $this->db->query("select * from core_cust_country order by country asc");
	return $sql;
	}
	 
 


	public function alamat_detail($id){
		$query = $this->db->query("select a.*,b.name as tipeasignment,c.name as tipereason from human_pa_md_emp_assignment a
			left join human_cust_personnel_assignment_type b on b.assignment_type = a.assignment_type
			left join human_cust_personnel_assignment_reason c on c.assignment_reason = a.assignment_reason
			where a.personnel_id = '$id'");

		return $query;
	}

	public function alamat_detail_pro_add($data){
            
                //get last max end_date for update
                $sqla = $this->db->query ("select * from human_pa_md_emp_address where personnel_id = '$data[personnel_id]' and end_date = (select MAX(end_date) from human_pa_md_emp_address WHERE personnel_id = '$data[personnel_id]')");
                
                $personnel_idfirst = '';
                $start_datefirst = '';
                foreach ($sqla->result() as $rowa){
                    
                      $personnel_idfirst = $rowa->personnel_id;
                      $start_datefirst = $rowa->start_date;
                      
                }
                     
                //store new data
                $sql = $this->db->query("insert into human_pa_md_emp_address (personnel_id,start_date,end_date,status_process,address_type,street,neighborhood1,neighborhood2,sub_district,district,city,province,country,postalcode,contact_person,contact_phone_country,contact_phone_area,contact_phone_no,mobile_phone_country,mobile_phone_area,mobile_phone_no
		) VALUES ('$data[personnel_id]','$data[start_date]','$data[end_date]','$data[status_process]','$data[address_type]','$data[street]','$data[neighborhood1]','$data[neighborhood2]','$data[sub_district]','$data[district]','$data[city]','$data[province]','$data[country]','$data[postalcode]','$data[contact_person]','$data[contact_phone_country]','$data[contact_phone_area]','$data[contact_phone_no]','$data[mobile_phone_country]','$data[mobile_phone_area]','$data[mobile_phone_no]')");

                
                
                if($personnel_idfirst == ''){
                $sqlc = "";
                
                }else if($personnel_idfirst != ''){
                    
                //update last end date
                $sqlc =$this->db->query("update human_pa_md_emp_address set end_date = '$data[start_date]' where personnel_id = '$personnel_idfirst' AND start_date = '$start_datefirst'");
                
                }
               
		return $sqla;
                return $sqlb;
                return $sqlc;
                
                
		 
	}

	public function alamat_detail_update($personnel_id,$start_date,$end_date){

		$sql = $this->db->query("
			select *,date_format(start_date,'%d-%m-%Y') as tanggalstart,date_format(end_date,'%d-%m-%Y') as tanggalend from human_pa_md_emp_address where personnel_id = '$personnel_id' and start_date = '$start_date' and end_date = '$end_date'");
		return $sql;
	}

	public function alamat_update_selected($id){
		$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%Y %M %d') as tanggalmasuknya ,date_format(start_date,'%Y %M %d') as tanggalmasuknya,date_format(end_date,'%Y %M %d') as tanggalberakhirnya,date_format(birth_date,'%d %M %Y') as tanggallahirnya from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function alamat_detail_pro_update($data){
		/*
		 
personnel_id
start_date
end_date
status_process
address_type
street
neighborhood1
neighborhood2
sub_district
district
city
province
country
postalcode
contact_person
contact_phone_country
contact_phone_area
contact_phone_no
mobile_phone_country
mobile_phone_area
mobile_phone_no
 
*/
		$query = $this->db->query("update human_pa_md_emp_address set status_process = '$data[status_process]', 
							address_type = '$data[address_type]',
							street = '$data[street]',
							neighborhood1 = '$data[neighborhood1]',
							neighborhood2 = '$data[neighborhood2]',
							sub_district = '$data[sub_district]',
							district = '$data[district]',
							city = '$data[city]',
							province = '$data[province]',
							country = '$data[country]',
							postalcode = '$data[postalcode]',
							contact_person = '$data[contact_person]',
							contact_phone_country = '$data[contact_phone_country]',	
							contact_phone_area = '$data[contact_phone_area]',
							contact_phone_no = '$data[contact_phone_no]',
							mobile_phone_country = '$data[mobile_phone_country]',
							mobile_phone_area = '$data[mobile_phone_area]',
							mobile_phone_no = '$data[mobile_phone_no]'
							 
							where personnel_id = '$data[personnel_id]' 
							AND start_date = '$data[start_date]' 
							AND end_date = '$data[end_date]'");
		return $query;
	}
	 
	public function pro_update_alamat($nik,$stor_tanggal_masuk,$nama){
		$query = $this->db->query("update human_pa_md_emp_personal set start_date = '$stor_tanggal_masuk', name_full = '$nama' where personnel_id = '$nik'");
		return $query;
	}

	public function alamat_update_pro_selected($data){
		 
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
