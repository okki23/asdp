<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_hukuman extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/

	public function __construct(){
		parent ::__construct();
		 
	}

	//semua kueri SQL akan dijalankan disini
	//ini method untuk menarik seluruh data hukuman
	public function get_all_hukuman(){
 
	$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%d %M %Y') as tanggalmasuknya from human_pa_md_emp_personal order by personnel_id asc");

 	return $query;
	}
 

	public function get_all_hukuman_detail_json($personnel_id){
 	
	$query = $this->db->query("select a.*,b.name as tipe, date_format(start_date,'%d-%m-%Y') as tglmulai,date_format(end_date,'%d-%m-%Y') as tglakhir from human_pa_md_emp_sanction a left join human_cust_personnel_sanction_type b on b.sanction_type = a.sanction_type where a.personnel_id = '$personnel_id' order by start_date desc");
      

			$list_data = null;
	        foreach ($query->result() as $row) {
	            $list_data[] = array(
	                'personnel_id' => $row->personnel_id,
	                'tglmulai'=>$row->tglmulai,
	                'tglakhir'=> $row->tglakhir,
	                'tipe'=>$row->tipe,
                        'reference_no'=>$row->reference_no,
                        'authority_officer'=>$row->authority_officer,
                        'description'=>$row->description,
	               
	                'opsi'=> '<a href="'.base_url('hukuman/hukuman_detail_update').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/edit.png').'" title="Update"> </a> <a href="'.base_url('hukuman/hukuman_detail_delete').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/delete.png').'" title="Hapus"></a> '
                        //'opsidelete'=> '<a href="'.base_url('hukuman/hukuman_detail_delete').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/delete.png').'"> </a>',
	                //'opsiupdate'=> '<a href="'.base_url('hukuman/hukuman_detail_update').'/'.$row->personnel_id.'/'.$row->start_date.'/'.$row->end_date.'""> <img src="'.base_url('assets/images/edit.png').'"></a>'
	            );
	        }
	     return $list_data;
              
	}

	public function hukuman_detail_delete($personnel_id,$start_date,$end_date){
		$sql = $this->db->query("delete from human_pa_md_emp_sanction where personnel_id = '$personnel_id' AND start_date = '$start_date' AND end_date = '$end_date'");
		return $sql;
	}
	 


	//ini method untuk menarik data terakhir personnel id untuk keperluan penambahan data
	public function get_last_personnel_id(){
	$query = $this->db->query("SELECT SUBSTR(MAX(personnel_id),-8) AS id  FROM human_pa_md_emp_personal");

	return $query;
	}

	//ini method untuk menyimpan data hukuman baru
	public function pro_add_hukuman($nik,$stor_tanggal_masuk,$nama){
	$query = $this->db->query("insert into human_pa_md_emp_personal (personnel_id,start_date,name_full) VALUES ('$nik','$stor_tanggal_masuk','$nama')");
		if($query){
			$signal = 1;			
		}else{
			$signal = 0;
		}
		return $signal;
		return $query;

	}

	public function opt_kategori_training(){
	$sql = $this->db->query("select * from human_cust_personnel_training_category order by training_category asc");
	return $sql;
	}
        
        public function opt_doc_type(){
	$sql = $this->db->query("select * from human_cust_personnel_personal_id_type order by personal_id_type asc");
	return $sql;
	}
        
         public function opt_tipe_hukuman(){
	$sql = $this->db->query("select * from human_cust_personnel_sanction_type order by sanction_type asc");
	return $sql;
	}

	public function opt_position(){
	$sql = $this->db->query("select * from human_orm_md_jabatan order by name asc");
	return $sql;
	}

	public function opt_country(){
	$sql = $this->db->query("select * from core_cust_country order by country asc");
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


	public function hukuman_detail($id){
		$query = $this->db->query("select a.*,b.name as tipeasignment,c.name as tipereason from human_pa_md_emp_assignment a
			left join human_cust_personnel_assignment_type b on b.assignment_type = a.assignment_type
			left join human_cust_personnel_assignment_reason c on c.assignment_reason = a.assignment_reason
			where a.personnel_id = '$id'");

		return $query;
	}

	public function hukuman_detail_pro_add($data){
                //get last max end_date for update
                $sqla = $this->db->query ("select * from human_pa_md_emp_sanction where personnel_id = '$data[personnel_id]' and end_date = (select MAX(end_date) from human_pa_md_emp_sanction WHERE personnel_id = '$data[personnel_id]')");
                $personnel_idfirst = '';
                $start_datefirst = '';
                foreach ($sqla->result() as $rowa){
                      $personnel_idfirst = $rowa->personnel_id;
                      $start_datefirst = $rowa->start_date;
                }
                     
                //store new data
                /*
  
personnel_id,start_date,end_date,status_process,sanction_type,reference_no,description,authority_officer,facility,sanction_currency,sanction_value,remark
 
                 */
		$sqlb = $this->db->query("insert into human_pa_md_emp_sanction (personnel_id,start_date,end_date,status_process,sanction_type,reference_no,description,authority_officer,jabatan,facility,sanction_value,remark) VALUES ('$data[personnel_id]','$data[start_date]','$data[end_date]','$data[status_process]','$data[sanction_type]','$data[reference_no]','$data[description]','$data[authority_officer]','$data[jabatan]','$data[facility]','$data[sanction_value]','$data[remark]')");
                 
                if($personnel_idfirst == ''){
                $sqlc = '';  
                
                }else if($personnel_idfirst != ''){
                    
                //update last end date
                $sqlc =$this->db->query("update human_pa_md_emp_sanction set end_date = '$data[start_date]' where personnel_id = '$personnel_idfirst' AND start_date = '$start_datefirst'");
                
                }
               
		return $sqla;
                return $sqlb;
                return $sqlc;
	}

	public function hukuman_detail_update($personnel_id,$start_date,$end_date){ 
            
		$sql = $this->db->query("select *,date_format(start_date,'%d-%m-%Y') as tanggalstart,date_format(end_date,'%d-%m-%Y') as tanggalend from human_pa_md_emp_sanction where personnel_id = '$personnel_id' and start_date = '$start_date' and end_date = '$end_date'");
		return $sql;
	}

	public function hukuman_update_selected($id){
		$query = $this->db->query("select *,case when gender = '1' then 'Pria' else 'Wanita' end as genderstatus,date_format(start_date,'%Y %M %d') as tanggalmasuknya ,date_format(start_date,'%Y %M %d') as tanggalmasuknya,date_format(end_date,'%Y %M %d') as tanggalberakhirnya,date_format(birth_date,'%d %M %Y') as tanggallahirnya from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function hukuman_detail_pro_update($data){
		/*
                 * $data = array('personnel_id'=>$this->input->post('personnel_id'),
                        'start_date'=>$tanggalmulai,
                        'end_date'=>$tanggalakhir,
                        'status_process'=>$this->input->post('status_process'),
                        'sanction_type'=>$this->input->post('sanction_type'),
                        'reference_no'=>$this->input->post('reference_no'),
                        'description'=>$this->input->post('description'),
                        'authority_officer'=>$this->input->post('authority_officer'),
                        'facility'=>$this->input->post('facility'),
                      
                        'sanction_value'=>$this->input->post('sanction_value'),
                        'remark'=>$this->input->post('remark')
                        
                        );
                  */
		$query = $this->db->query("update human_pa_md_emp_sanction set status_process = '$data[status_process]', 
							sanction_type = '$data[sanction_type]',
							reference_no = '$data[reference_no]',
							description = '$data[description]',
							authority_officer = '$data[authority_officer]',
                                                        jabatan = '$data[jabatan]',
							facility = '$data[facility]',
							sanction_value = '$data[sanction_value]',
							remark = '$data[remark]'                                                       
							where personnel_id = '$data[personnel_id]' 
							AND start_date = '$data[start_date]' 
							AND end_date = '$data[end_date]'");
		return $query;
	}
	public function hukuman_delete($id){
		$query = $this->db->query("delete from human_pa_md_emp_personal where personnel_id = '$id' ");
		return $query;
	}

	public function pro_update_hukuman($nik,$stor_tanggal_masuk,$nama){
		$query = $this->db->query("update human_pa_md_emp_personal set start_date = '$stor_tanggal_masuk', name_full = '$nama' where personnel_id = '$nik'");
		return $query;
	}

	public function hukuman_update_pro_selected($data){
		 
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
