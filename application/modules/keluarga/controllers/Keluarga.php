<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	  
	public function __construct(){
		parent ::__construct();
		//panggil model keluarga jika memang controller butuh transaksi data
		$this->load->model('model_keluarga');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	} 


 	public function get_all_keluarga_detail_json(){
		$personnel_id = $this->uri->segment(3);
		 
		$data = json_encode($this->model_keluarga->get_all_keluarga_detail_json($personnel_id));
        echo "{\"records\":" . $data . "}";
	}

	public function get_all_pic_keluarga_json(){
		$personnel_id = $this->uri->segment(3);
		 
		echo json_encode($this->model_keluarga->get_all_pic_keluarga_json($personnel_id));
	}
 
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		$personnel_id = $this->uri->segment(3);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					'personnel_id'=>$personnel_id,
					  
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('keluarga/keluarga_detail_view',$data);
		 

		 
	}

	public function keluarga_detail_json(){
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

  

	public function keluarga_detail(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
	 	//$this->model_keluarga->keluarga_update($id);
	 	$data_employee = $this->model_keluarga->keluarga_detail($personnel_id);
		 $sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	  
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'personnel_id' => $personnel_id,
                                         'location' => $location,
										 'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('keluarga/keluarga_detail_view',$data);
	}

	public function keluarga_detail_delete($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
		$sqldelete = $this->model_keluarga->keluarga_detail_delete($personnel_id,$start_date,$end_date);
		$this->session->set_flashdata('pesan','Data berhasil di Hapus!');
		redirect(base_url('keluarga/keluarga_detail/'.$personnel_id));
	}

	public function keluarga_detail_add(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
 	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'personnel_id'=>$personnel_id,
                                          'location'=>$location,
										  'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'opt_tipe_keluarga'=>$this->model_keluarga->opt_tipe_keluarga(),
					  'opt_prefix'=>$this->model_keluarga->opt_prefix(),
					  'opt_marital_status'=>$this->model_keluarga->opt_marital_status(),

					  'opt_pendidikan_terakhir'=>$this->model_keluarga->opt_pendidikan_terakhir(),
					  
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('keluarga/keluarga_detail_add',$data);
	}


	public function keluarga_detail_update($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
 	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
 	 	$data_keluarga = $this->model_keluarga->keluarga_detail_update($personnel_id,$start_date,$end_date);
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'personnel_id'=>$personnel_id,
                                          'location'=>$location,
					  'opt_tipe_keluarga'=>$this->model_keluarga->opt_tipe_keluarga(),
					  'opt_prefix'=>$this->model_keluarga->opt_prefix(),
					  'opt_marital_status'=>$this->model_keluarga->opt_marital_status(),

					  'opt_pendidikan_terakhir'=>$this->model_keluarga->opt_pendidikan_terakhir(),
					  'data_keluarga'=>$data_keluarga,
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					   'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('keluarga/keluarga_detail_update',$data);
	}

	public function cek_opt(){
		$sql = $this->model_keluarga->opt_assignment_reason();

		foreach ($sql->result() as $baris) {
			echo $baris->assignment_reason .'-'. $baris->name .'<br>';
		}
	}

	public function keluarga_detail_pro_update(){
                $personnel_id = $this->input->post('personnel_id');
             
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
                
                $birth_date = $this->input->post('birth_date');
                $exbdtg = substr($birth_date,0,2);
                $exbdbl = substr($birth_date,3,2);
                $exbdth = substr($birth_date,6,4);
                $tanggallahir = $exbdth.$exbdbl.$exbdtg;
                
                $date_of_death = $this->input->post('date_of_death');
                $exddtg = substr($date_of_death,0,2);
                $exddbl = substr($date_of_death,3,2);
                $exddth = substr($date_of_death,6,4);
                $tanggalmeninggal = $exddth.$exddbl.$exddtg;
                        
                $status_since = $this->input->post('status_since');
                $extntg = substr($date_of_death,0,2);
                $extnbl = substr($date_of_death,3,2);
                $extnth = substr($date_of_death,6,4);
                $tanggalnikah = $extnth.$extnbl.$extntg;
                
                $next_kind = $this->input->post('next_kind');                
                $medical_dependant = $this->input->post('medical_dependant');
                
                if($next_kind == '' || empty($next_kind)){
                    $cek1 = '0';
                }else{
                    $cek1 = '1';
                }
                
                if($medical_dependant == '' || empty($medical_dependant)){
                    $cek2 = '0';
                }else{
                    $cek2 = '1';
                }
                
                 
                
                        
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
                            'start_date'=> $tanggalmulai,
                            'end_date' =>$tanggalakhir,
                            'status_process'=>$this->input->post('status_process'),
                            'family_type'=>$this->input->post('family_type'),
                            'seq'=>$this->input->post('seq'),
                            'name_full'=>$this->input->post('name_full'),
                            'name_first'=>$this->input->post('name_first'),
                            'name_mid'=>$this->input->post('name_mid'),
                            'name_last'=>$this->input->post('name_last'),
                            'name_nick'=>$this->input->post('name_nick'),
                            'prefix'=>$this->input->post('prefix'),
                            'gender'=>$this->input->post('gender'),
                            'birth_date'=>$tanggallahir,
                            'birth_place'=>$this->input->post('birth_place'),
                            'date_of_death'=>$tanggalmeninggal,
                            'last_education'=>$this->input->post('last_education'),
                            'address'=>$this->input->post('address'),
                            'neighborhood1'=>$this->input->post('neighborhood1'),
                            'neighborhood2'=>$this->input->post('neighborhood2'),
                            'postalcode'=>$this->input->post('postalcode'),
                            'home_phone_country'=>$this->input->post('home_phone_country'),
                            'home_phone_area'=>$this->input->post('home_phone_area'),
                            'home_phone_no'=>$this->input->post('home_phone_no'),
                            'mobile_phone_country'=>$this->input->post('mobile_phone_country'),
                            'mobile_phone_area'=>$this->input->post('mobile_phone_area'),
                            'mobile_phone_no'=>$this->input->post('mobile_phone_no'),
                            'occupation'=>$this->input->post('occupation'),
                            'marital_status'=>$this->input->post('marital_status'),
                            'status_since'=>$tanggalnikah,
                            'medical_dependant'=>$cek2,
                            'remarks'=>$this->input->post('remarks'),
                            'next_kind'=>$cek1,
                            'passport_no'=>$this->input->post('passport_no'),
                            'ktp_no'=>$this->input->post('ktp_no')
                             );

		$sql = $this->model_keluarga->keluarga_detail_pro_update($data);
                
                 echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='".base_url()."/keluarga/keluarga_detail/".$data['personnel_id']."';
		      </script>";
	 	 
		//redirect(base_url('keluarga/keluarga_detail/'.$data['personnel_id']));
	}
	 
	public function keluarga_detail_pro_add(){
                $personnel_id = $this->input->post('personnel_id');
             
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
                
                $birth_date = $this->input->post('birth_date');
                $exbdtg = substr($birth_date,0,2);
                $exbdbl = substr($birth_date,3,2);
                $exbdth = substr($birth_date,6,4);
                $tanggallahir = $exbdth.$exbdbl.$exbdtg;
                
                $date_of_death = $this->input->post('date_of_death');
                $exddtg = substr($date_of_death,0,2);
                $exddbl = substr($date_of_death,3,2);
                $exddth = substr($date_of_death,6,4);
                $tanggalmeninggal = $exddth.$exddbl.$exddtg;
                        
                $status_since = $this->input->post('status_since');
                $extntg = substr($date_of_death,0,2);
                $extnbl = substr($date_of_death,3,2);
                $extnth = substr($date_of_death,6,4);
                $tanggalnikah = $extnth.$extnbl.$extntg;
                
                $next_kind = $this->input->post('next_kind');                
                $medical_dependant = $this->input->post('medical_dependant');
                
                if($next_kind == '' || empty($next_kind)){
                    $cek1 = '0';
                }else{
                    $cek1 = '1';
                }
                
                if($medical_dependant == '' || empty($medical_dependant)){
                    $cek2 = '0';
                }else{
                    $cek2 = '1';
                }
                
                 
                
                        
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
                            'start_date'=> $tanggalmulai,
                            'end_date' =>$tanggalakhir,
                            'status_process'=>$this->input->post('status_process'),
                            'family_type'=>$this->input->post('family_type'),
                            'seq'=>$this->input->post('seq'),
                            'name_full'=>$this->input->post('name_full'),
                            'name_first'=>$this->input->post('name_first'),
                            'name_mid'=>$this->input->post('name_mid'),
                            'name_last'=>$this->input->post('name_last'),
                            'name_nick'=>$this->input->post('name_nick'),
                            'prefix'=>$this->input->post('prefix'),
                            'gender'=>$this->input->post('gender'),
                            'birth_date'=>$tanggallahir,
                            'birth_place'=>$this->input->post('birth_place'),
                            'date_of_death'=>$tanggalmeninggal,
                            'last_education'=>$this->input->post('last_education'),
                            'address'=>$this->input->post('address'),
                            'neighborhood1'=>$this->input->post('neighborhood1'),
                            'neighborhood2'=>$this->input->post('neighborhood2'),
                            'postalcode'=>$this->input->post('postalcode'),
                            'home_phone_country'=>$this->input->post('home_phone_country'),
                            'home_phone_area'=>$this->input->post('home_phone_area'),
                            'home_phone_no'=>$this->input->post('home_phone_no'),
                            'mobile_phone_country'=>$this->input->post('mobile_phone_country'),
                            'mobile_phone_area'=>$this->input->post('mobile_phone_area'),
                            'mobile_phone_no'=>$this->input->post('mobile_phone_no'),
                            'occupation'=>$this->input->post('occupation'),
                            'marital_status'=>$this->input->post('marital_status'),
                            'status_since'=>$tanggalnikah,
                            'medical_dependant'=>$cek2,
                            'remarks'=>$this->input->post('remarks'),
                            'next_kind'=>$cek1,
                            'passport_no'=>$this->input->post('passport_no'),
                            'ktp_no'=>$this->input->post('ktp_no')
                             );

		$sql = $this->model_keluarga->keluarga_detail_pro_add($data);

	 	   echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='".base_url()."/keluarga/keluarga_detail/".$data['personnel_id']."';
		      </script>";
		//redirect(base_url('keluarga/keluarga_detail/'.$data['personnel_id']));
	}

 

	public function keluarga_update_pro_selected(){
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
	  
		$sqlupdate = $this->model_keluarga->keluarga_update_pro_selected($data);

		$this->session->set_flashdata('pesan','Data berhasil di Update!');
		redirect(base_url('keluarga/keluarga_detail/'.$data['personnel_id']));

	}
 
	 
}
