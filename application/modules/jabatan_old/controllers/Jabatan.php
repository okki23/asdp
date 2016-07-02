<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	  
	public function __construct(){
		parent ::__construct();
		//panggil model jabatan jika memang controller butuh transaksi data
		$this->load->model('model_jabatan');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	} 
        
        public function  jabatan_opt_posisi(){
            $lit_code_position = $this->input->post('lit_code_position');
            echo json_encode($this->model_jabatan->jabatan_opt_posisi($lit_code_position));
            
        }

        public function get_all_jabatan_detail_json(){
		$personnel_id = $this->uri->segment(3);
		 
		//echo json_encode($this->model_jabatan->get_all_jabatan_detail_json($personnel_id));
		$data = json_encode($this->model_jabatan->get_all_jabatan_detail_json($personnel_id));
		echo "{\"records\":" . $data . "}";
	}

	public function get_all_pic_jabatan_json(){
		$personnel_id = $this->uri->segment(3);
		 
		echo json_encode($this->model_jabatan->get_all_pic_jabatan_json($personnel_id));
	}
 
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		 
		$error = '';
		$personnel_id = $this->uri->segment(3);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					'personnel_id'=>$personnel_id,
					  
					  'footer'=>'© 2016. Langit Infotama');		
		 
		
		$this->load->view('jabatan/jabatan_detail_view',$data);
		 

		 
	}

	public function jabatan_detail_json(){
	 	$id = $this->uri->segment(3);
	 
		$sqlemp = $this->db->query("select * from human_pa_md_emp_assignment where personnel_id = '".$id."'");
		 

		foreach ($sqlemp->result() as $row) {
			$list[] = array('id'=>$row->id,
							'personnel_id'=>$row->personnel_id,
							'start_date'=>$row->start_date,
							'end_date'=>$row->end_date
							 

							);	 
		}
		echo json_encode($list);
 
	}

  

	public function jabatan_detail(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
				$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 	//$this->model_jabatan->jabatan_update($id);
	 	$data_employee = $this->model_jabatan->jabatan_detail($personnel_id);
 	 
	  
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
					  'personnel_id' => $personnel_id,		   
					  'data_employee'=>$data_employee,
					  'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('jabatan/jabatan_detail_view',$data);
	}

	public function jabatan_detail_delete($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
		$sqldelete = $this->model_jabatan->jabatan_detail_delete($personnel_id,$start_date,$end_date);
		 
		redirect(base_url('jabatan/jabatan_detail/'.$personnel_id));
	}

	public function jabatan_detail_add(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
                
                //get personel_id or nik
                $getnik = $this->db->query("select * from human_pa_md_emp_personal_id where personnel_id = '$personnel_id' and personal_id_type = '8'")->row();
 	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                           'getnik'=>$getnik,
                                          'location'=>$location,
					  'personnel_id'=>$personnel_id,
					  'opt_assignment_type'=>$this->model_jabatan->opt_assignment_type(),
					  'opt_assignment_reason'=>$this->model_jabatan->opt_assignment_reason(),
					  'opt_employee_type'=>$this->model_jabatan->opt_employee_type(),
					  'opt_employee_subtype'=>$this->model_jabatan->opt_employee_subtype(),
					  'opt_employee_area'=>$this->model_jabatan->opt_employee_area(),
					  'opt_employee_cabang'=>$this->model_jabatan->opt_employee_cabang(),
					  'opt_employee_wilayah'=>$this->model_jabatan->opt_employee_wilayah(),
					  'opt_position'=>$this->model_jabatan->opt_position(),
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('jabatan/jabatan_detail_add',$data);
	}


	public function jabatan_detail_update($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
                $location = $this->uri->segment(1);
		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
                $getnik = $this->db->query("select * from human_pa_md_emp_personal_id where personnel_id = '$personnel_id' and personal_id_type = '8'")->row();
 	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
                        
                $dataku = $this->model_jabatan->jabatan_detail_update($personnel_id,$start_date,$end_date);
                        
                
                
                
                
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
                                          'personnel_id'=>$personnel_id,
                                          'getnik'=>$getnik,
                                          
                                          'opt_assignment_type'=>$this->model_jabatan->opt_assignment_type(),
					  'opt_assignment_reason'=>$this->model_jabatan->opt_assignment_reason(),
					  'opt_employee_type'=>$this->model_jabatan->opt_employee_type(),
					  'opt_employee_subtype'=>$this->model_jabatan->opt_employee_subtype(),
					  'opt_employee_area'=>$this->model_jabatan->opt_employee_area(),
					  'opt_employee_cabang'=>$this->model_jabatan->opt_employee_cabang(),
					  'opt_employee_wilayah'=>$this->model_jabatan->opt_employee_wilayah(),
					  'opt_position'=>$this->model_jabatan->opt_position(),
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
					  'litfoto'=>$litfoto,
					  'usia'=>$usia,
					  'dataku'=>$dataku,
					  
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('jabatan/jabatan_detail_update',$data);
	}

	 

	public function jabatan_detail_pro_update(){
                $start_date = $this->input->post('start_date');
                $extgstart_date = substr($start_date,0,2);
                $exblstart_date = substr($start_date,3,2);
                $exthstart_date = substr($start_date,6,4);
                $tanggalmulai = $exthstart_date.$exblstart_date.$extgstart_date;
                
                $end_date = $this->input->post('end_date');
                $extgend_date = substr($end_date,0,2);
                $exblend_date = substr($end_date,3,2);
                $exthend_date = substr($end_date,6,4);
                $tanggalakhir = $exthend_date.$exblend_date.$extgend_date;
                
                $tglsk = $this->input->post('legal_date');
                $tglsk_tg = substr($tglsk,0,2);
                $tglsk_bl = substr($tglsk,3,2);
                $tglsk_th = substr($tglsk,6,4);
                $tanggalsk = $tglsk_th.$tglsk_bl.$tglsk_tg;
                
                $tglbsk = $this->input->post('legal_effective_date');
                $tglbsk_tg = substr($tglbsk,0,2);
                $tglbsk_bl = substr($tglbsk,3,2);
                $tglbsk_th = substr($tglbsk,6,4);
                $tanggalberlaku = $tglbsk_th.$tglbsk_bl.$tglbsk_tg;
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
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
					  'start_date'=>$tanggalmulai,
					  'end_date'=>$tanggalakhir,
					  'status_process'=>$this->input->post('status_process'),				  
					  'assignment_type'=>$this->input->post('assignment_type'),
					  'assignment_reason'=>$this->input->post('assignment_reason'),
                                          'external_id'=>$this->input->post('external_id'),
					  'employee_area'=>$this->input->post('employee_area'),
					  'employee_office'=>$this->input->post('employee_office'),
					  'employee_type'=>$this->input->post('employee_type'),
					  'employee_subtype'=>$this->input->post('employee_subtype'),
					  'lit_code_position'=>$this->input->post('kdposisi'),
					   
					  'jabatan'=>$this->input->post('kdjabatan'),
					  'unit'=>$this->input->post('kdunit'),
					 
					  'work_location'=>$this->input->post('kdwilayah'),
					  
					  'legal_letter_no'=>$this->input->post('legal_letter_no'),
					  'legal_date'=>$tanggalsk,
				  	  
					  'remark'=>$this->input->post('remark')
					  );

		$sql = $this->model_jabatan->jabatan_detail_pro_update($data);
                  echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='".base_url()."/jabatan/jabatan_detail/".$data['personnel_id']."';
		      </script>";
	 	//$this->session->set_flashdata('pesan','Data berhasil di Rubah!');
		//redirect(base_url('jabatan/jabatan_detail/'.$data['personnel_id']));
	}
	 
	public function jabatan_detail_pro_add(){
            
                $start_date = $this->input->post('start_date');
                $extgstart_date = substr($start_date,0,2);
                $exblstart_date = substr($start_date,3,2);
                $exthstart_date = substr($start_date,6,4);
                $tanggalmulai = $exthstart_date.$exblstart_date.$extgstart_date;
                
                $end_date = $this->input->post('end_date');
                $extgend_date = substr($end_date,0,2);
                $exblend_date = substr($end_date,3,2);
                $exthend_date = substr($end_date,6,4);
                $tanggalakhir = $exthend_date.$exblend_date.$extgend_date;
                
                $tglsk = $this->input->post('legal_date');
                $tglsk_tg = substr($tglsk,0,2);
                $tglsk_bl = substr($tglsk,3,2);
                $tglsk_th = substr($tglsk,6,4);
                $tanggalsk = $tglsk_th.$tglsk_bl.$tglsk_tg;
                
                $tglbsk = $this->input->post('legal_effective_date');
                $tglbsk_tg = substr($tglbsk,0,2);
                $tglbsk_bl = substr($tglbsk,3,2);
                $tglbsk_th = substr($tglbsk,6,4);
                $tanggalberlaku = $tglbsk_th.$tglbsk_bl.$tglbsk_tg;
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
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
					  'start_date'=>$tanggalmulai,
					  'end_date'=>$tanggalakhir,
					  'status_process'=>$this->input->post('status_process'),				  
					  'assignment_type'=>$this->input->post('assignment_type'),
					  'assignment_reason'=>$this->input->post('assignment_reason'),
                                          'external_id'=>$this->input->post('external_id'),
					  'employee_area'=>$this->input->post('employee_area'),
					  'employee_office'=>$this->input->post('employee_office'),
					  'employee_type'=>$this->input->post('employee_type'),
					  'employee_subtype'=>$this->input->post('employee_subtype'),
					  'lit_code_position'=>$this->input->post('kdposisi'),
					   
					  'jabatan'=>$this->input->post('kdjabatan'),
					  'unit'=>$this->input->post('kdunit'),
					 
					  'work_location'=>$this->input->post('kdwilayah'),
					  
					  'legal_letter_no'=>$this->input->post('legal_letter_no'),
					  'legal_date'=>$tanggalsk,
				  	  
					  'remark'=>$this->input->post('remark')
					  );

		$sql = $this->model_jabatan->jabatan_detail_pro_add($data);

	 	//$this->session->set_flashdata('pesan','Data berhasil di Simpan!');
                  echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='".base_url()."/jabatan/jabatan_detail/".$data['personnel_id']."';
		      </script>";
		//redirect(base_url('jabatan/jabatan_detail/'.$data['personnel_id']));
	}

 

	public function jabatan_update_pro_selected(){
		//date('Y-m-d',strtotime($_POST['contract_date']))
		$data = array(
				'personnel_id'=>$this->input->post('personnel_id'),
				'instance'=>$this->input->post('instance'),
				'start_date'=>date('Y-m-d',strtotime($this->input->post('start_date'))),
			 	'name_full'=>$this->input->post('name_full'),
				'name_first'=>$this->input->post('name_first'),
				'name_mid'=>$this->input->post('name_mid'),
				'name_last'=>$this->input->post('name_last'),
				'name_nick'=>$this->input->post('name_nick'),
				'title'=>$this->input->post('title'),
				'end_date'=>date('Y-m-d',strtotime($this->input->post('end_date'))),
				'status_process'=>$this->input->post('status_process'),
				'gender'=>$this->input->post('gender'),
				'birth_date'=>date('Y-m-d',strtotime($this->input->post('birth_date'))),
				'birth_place'=>$this->input->post('birth_place'),
				'nationality'=>$this->input->post('nationality'),
				'ethnic'=>$this->input->post('ethnic'),
				'ethnic_other'=>$this->input->post('ethnic_other'),
				'religion'=>$this->input->post('religion'),
				'marital_status'=>$this->input->post('marital_status'),
				'status_since'=>$this->input->post('status_since'),
				'no_of_children'=>$this->input->post('no_of_children'),
				);
	  
		$sqlupdate = $this->model_jabatan->jabatan_update_pro_selected($data);

		$this->session->set_flashdata('pesan','Data berhasil di Update!');
		redirect(base_url('jabatan/jabatan_detail/'.$data['personnel_id']));

	}
 
	 
}
