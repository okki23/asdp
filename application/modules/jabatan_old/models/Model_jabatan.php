<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jabatan extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data jabatan
	public function get_all_jabatan(){
 
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal order by personnel_id asc");

 	return $query;
	}




	public function get_all_jabatan_detail_json($personnel_id){
 	
	$query = $this->db->query("select a.*,b.name as tipe_jabatan,c.name as alasan_jabatan,  date_format(a.start_date,'%d-%m-%Y') as tanggalmasuknya,date_format(a.end_date,'%d-%m-%Y') as tanggalberakhirnya from human_pa_md_emp_assignment a
		left join human_cust_personnel_assignment_type b on b.assignment_type = a.assignment_type 
		left join human_cust_personnel_assignment_reason c on c.assignment_reason = a.assignment_reason
		where a.personnel_id = '$personnel_id' order by start_date desc");

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'tanggalakhir'=>$row->tanggalberakhirnya,
	                'tanggalmasuk'=> $row->tanggalmasuknya,
	                'assignment_type'=>$row->assignment_type,
	                'assignment_reason'=>$row->assignment_reason,
	                'tipe_jabatan'=>$row->tipe_jabatan,
                        'legal_letter_no'=>$row->legal_letter_no,
	                'alasan_jabatan' => $row->alasan_jabatan,
                        'opsi'=> '<a href="'.base_url('jabatan/jabatan_detail_update').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/edit.png').'" title="Update"> </a><a  onclick="return confirm(Anda Yakin?);"  href="'.base_url('jabatan/jabatan_detail_delete').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/delete.png').'" title="Hapus"></a>'
                         
	            );
	        }
	     return $list_data;
	}

	public function jabatan_detail_delete($personnel_id,$star_date,$end_date){
		$sql = $this->db->query("delete from human_pa_md_emp_assignment where personnel_id = '$personnel_id' AND start_date = '$star_date' AND end_date = '$end_date'");
		return $sql;
	}
	public function get_all_pic_jabatan_json($personnel_id){
 	
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus, date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal where personnel_id = '$personnel_id' order by personnel_id asc");

			$list_data = null;
                        foreach ($query->result() as $row) {
                        $list_data[] = array(
                            'personnel_id' => $row->personnel_id,
                            'name_full'   => $row->name_full,
                            'start_date'=> $row->tanggalmasuknya,
                            'tipe_jabatan'=>$row->tanggalmasuknya,
                            'alasan_jabatan' => $row->tanggalmasuknya
	            );
	        }
	     return $list_data;
	}
        
        public function jabatan_opt_posisi($lit_code_position){
 	$sql = $this->db->query("select a.*,b.nm_jabatan as namajabatan,c.nm_unit as namaunit,case when a.tipe = 'L' then 'Laut' else 'Darat' end as statuswilayah from lit_tab_posisi a 
LEFT JOIN lit_jabatan b on b.id = a.id_jabatan
LEFT JOIN lit_tab_unit c on c.kode_unit = a.code_core_orm
where a.lit_code_position = '$lit_code_position'");
	
                $list = null;
                foreach ($sql->result() as $row){
                $list[] = array('kdposisi'=>$row->lit_code_position,
                                'kdwilayah'=>$row->tipe,
                                'wilayah'=>$row->statuswilayah,
                                'kdjabatan'=>$row->id_jabatan,
                                'namajabatan'=>$row->namajabatan,
                                'kdunit'=>$row->code_core_orm,
                                'namaunit'=>$row->namaunit);
                }
                return $list;
        }

	public function get_all_pic_data_jabatan_json($personnel_id){
 
	$query = $this->db->query("select *, date_format(start_date,'%d %M %Y') as tglmulai, date_format(end_date,'%d %M %Y') as tglakhir from human_pa_md_emp_assignment where personnel_id = '$personnel_id'");
 
	}




	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data jabatan baru
	public function pro_add_jabatan($nik,$stor_tanggal_masuk,$nama){
	$query = $this->db->query("insert into human_pa_md_emp_personal (personnel_id,start_date,name_full) VALUES ('$nik','$stor_tanggal_masuk','$nama')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function opt_assignment_type(){
	$sql = $this->db->query("select * from human_cust_personnel_assignment_type order by assignment_type asc");
	return $sql;
	}

	public function opt_position(){
	$sql = $this->db->query("select a.*,b.nm_kapal from lit_tab_posisi a left join lit_tab_kapal b on b.kode_kapal = a.code_core_orm_kapal ");
	return $sql;
	}

	public function opt_assignment_reason(){
	$sql = $this->db->query("select * from human_cust_personnel_assignment_reason order by assignment_reason asc");
	return $sql;
	}

	public function opt_employee_type(){
	$sql = $this->db->query("select * from human_cust_employee_type order by employee_type asc");
	return $sql;
	}

	public function opt_employee_subtype(){
	$sql = $this->db->query("select * from human_cust_employee_subtype order by employee_subtype asc");
	return $sql;
	}

	public function opt_employee_area(){
	$sql = $this->db->query("select * from human_cust_employee_area order by employee_area asc");
	return $sql;
	}

	public function opt_employee_cabang(){
	$sql = $this->db->query("select * from human_cust_employee_office order by employee_office asc");
	return $sql;
	}
	public function opt_employee_wilayah(){
	$sql = $this->db->query("select * from human_cust_position_work_location order by work_location asc");
	return $sql;
	}


	public function jabatan_detail($id){
		$query = $this->db->query("select a.*,b.name as tipeasignment,c.name as tipereason from human_pa_md_emp_assignment a
			left join human_cust_personnel_assignment_type b on b.assignment_type = a.assignment_type
			left join human_cust_personnel_assignment_reason c on c.assignment_reason = a.assignment_reason
			where a.personnel_id = '$id'");

		return $query;
	}

	public function jabatan_detail_pro_add($data){
             //get last max end_date for update
                $sqla = $this->db->query ("select * from human_pa_md_emp_assignment where personnel_id = '$data[personnel_id]' and end_date = (select MAX(end_date) from human_pa_md_emp_assignment WHERE personnel_id = '$data[personnel_id]')");
                
                $personnel_idfirst = '';
                $start_datefirst = '';
                foreach ($sqla->result() as $rowa){
                      $personnel_idfirst = $rowa->personnel_id;
                      $start_datefirst = $rowa->start_date;
                }
                     
                //store new data
                            /*
personnel_id
start_date
end_date
status_process
assignment_type
assignment_reason
employee_area
employee_office
employee_type
employee_subtype
lit_code_position
unit
jabatan
work_location
legal_letter_no
legal_date
 
remark
             */
                
		$sqlb = $this->db->query("insert into human_pa_md_emp_assignment (personnel_id,start_date,end_date,status_process,assignment_type,assignment_reason,external_id,employee_area,employee_office,employee_type,employee_subtype,lit_code_position,unit,jabatan,work_location,legal_letter_no,legal_date,remark) VALUES ('$data[personnel_id]','$data[start_date]','$data[end_date]','$data[status_process]','$data[assignment_type]','$data[assignment_reason]','$data[external_id]','$data[employee_area]','$data[employee_office]','$data[employee_type]','$data[employee_subtype]','$data[lit_code_position]','$data[unit]','$data[jabatan]','$data[work_location]','$data[legal_letter_no]','$data[legal_date]','$data[remark]')");
                 
                if($personnel_idfirst == ''){
                $sqlc = '';  
                
                }else{
                    
                //update last end date
                $sqlc =$this->db->query("update human_pa_md_emp_assignment set end_date = '$data[start_date]' where personnel_id = '$personnel_idfirst' AND start_date = '$start_datefirst'");
                
                }
               
		return $sqla;
                return $sqlb;
                return $sqlc;
                
                 
	}
        
        public function fix_jab_det_update($personnel_id,$start_date,$end_date){
            $sql = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggalstart,date_format(a.end_date,'%d-%m-%Y') as tanggalend,
                date_format(a.legal_date,'%d-%m-%Y') as legal_datex,date_format(a.legal_effective_date,'%d-%m-%Y') as legal_effective_datex ,
                c.nm_jabatan as namajabatan,d.nm_unit as namaunit,b.code_core_orm,b.name_position,b.id_jabatan,b.tipe,case when b.tipe = 'L' then 'Laut' else 'Darat' end as statuswilayah
                from human_pa_md_emp_assignment a 
                LEFT JOIN lit_tab_posisi b on b.lit_code_position = a.lit_code_position
                LEFT JOIN lit_jabatan c on c.id = b.id_jabatan
                LEFT JOIN lit_tab_unit d on d.kode_unit = b.code_core_orm
                where a.personnel_id = '$personnel_id' and a.start_date = '$start_date' and a.end_date = '$end_date'");
		return $sql;
        }

	public function jabatan_detail_update($personnel_id,$start_date,$end_date){

		$sql = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggalstart,date_format(a.end_date,'%d-%m-%Y') as tanggalend,
                date_format(a.legal_date,'%d-%m-%Y') as legal_datex,date_format(a.legal_effective_date,'%d-%m-%Y') as legal_effective_datex ,
                c.nm_jabatan as namajabatan,d.nm_unit as namaunit,b.code_core_orm,b.name_position,b.id_jabatan,b.tipe,case when b.tipe = 'L' then 'Laut' else 'Darat' end as statuswilayah
                from human_pa_md_emp_assignment a 
                LEFT JOIN lit_tab_posisi b on b.lit_code_position = a.lit_code_position
                LEFT JOIN lit_jabatan c on c.id = b.id_jabatan
                LEFT JOIN lit_tab_unit d on d.kode_unit = b.code_core_orm
                where a.personnel_id = '$start_date' and a.start_date = '$start_date' and a.end_date = '$end_date'");
		return $sql;
	}

	public function jabatan_update_selected($id){
		$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%Y %M %d') as tanggalmasuknya ,date_format(start_date,'%Y %M %d') as tanggalmasuknya,date_format(end_date,'%Y %M %d') as tanggalberakhirnya,date_format(birth_date,'%d %M %Y') as tanggallahirnya from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function jabatan_detail_pro_update($data){
		/*
personnel_id
start_date
end_date
status_process
assignment_type
assignment_reason
employee_area
employee_office
employee_type
employee_subtype
position
unit
jabatan
work_location
legal_letter_no
legal_date
 
remark
             */
		$query = $this->db->query("update human_pa_md_emp_assignment set status_process = '$data[status_process]', 
							assignment_type = '$data[assignment_type]',
							assignment_reason = '$data[assignment_reason]',
                                                        external_id = '$data[external_id]',
							employee_area = '$data[employee_area]',
							employee_office = '$data[employee_office]',
							employee_type = '$data[employee_type]',
							employee_subtype = '$data[employee_subtype]',
							lit_code_position = '$data[lit_code_position]',
                                                        unit = '$data[unit]',
							jabatan = '$data[jabatan]',
							work_location = '$data[work_location]',	
							legal_letter_no = '$data[legal_letter_no]',
							legal_date = '$data[legal_date]',
							 
							remark = '$data[remark]'
							where personnel_id = '$data[personnel_id]' 
							AND start_date = '$data[start_date]' 
							AND end_date = '$data[end_date]'");
		return $query;
	}
	public function jabatan_delete($id){
		$query = $this->db->query("delete from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function pro_update_jabatan($nik,$stor_tanggal_masuk,$nama){
		$query = $this->db->query("update human_pa_md_emp_personal set start_date = '$stor_tanggal_masuk', name_full = '$nama' where personnel_id = '$nik'");
		return $query;
	}

	public function jabatan_update_pro_selected($data){
		 
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
