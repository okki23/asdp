<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	  
	public function __construct(){
		parent ::__construct();
		//panggil model alamat jika memang controller butuh transaksi data
		$this->load->model('model_alamat');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	} 


 	public function get_all_alamat_detail_json(){
		$personnel_id = $this->uri->segment(3);
		 
		$data = json_encode($this->model_alamat->get_all_alamat_detail_json($personnel_id));
                echo "{\"records\":" . $data . "}";
	}

	public function get_all_pic_alamat_json(){
		$personnel_id = $this->uri->segment(3);
		 
		echo json_encode($this->model_alamat->get_all_pic_alamat_json($personnel_id));
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
		
		$this->load->view('alamat/alamat_detail_view',$data);
		 

		 
	}

	public function alamat_detail_json(){
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

  

	public function alamat_detail(){
		$personnel_id = $this->uri->segment(3);
	 	//$this->model_alamat->alamat_update($id);
	 	$data_employee = $this->model_alamat->alamat_detail($personnel_id);
                $location = $this->uri->segment(1);
	  $sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
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

	 	$this->load->view('alamat/alamat_detail_view',$data);
	}

	public function alamat_detail_delete($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
		$sqldelete = $this->model_alamat->alamat_detail_delete($personnel_id,$start_date,$end_date);
		$this->session->set_flashdata('pesan','Data berhasil di Hapus!');
		redirect(base_url('alamat/alamat_detail/'.$personnel_id));
	}

	public function alamat_detail_add(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
 	 	$error = '';
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'personnel_id'=>$personnel_id,
					  'location'=>$location,
					  'opt_tipe_alamat'=>$this->model_alamat->opt_tipe_alamat(),
					  'opt_country'=>$this->model_alamat->opt_country(),
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('alamat/alamat_detail_add',$data);
	}


	public function alamat_detail_update($personnel_id,$start_date,$end_date){
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
 	 	$data_alamat = $this->model_alamat->alamat_detail_update($personnel_id,$start_date,$end_date);
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'personnel_id'=>$personnel_id,
                                          'location'=>$location,
					  'opt_country'=>$this->model_alamat->opt_country(),
					  'opt_tipe_alamat'=>$this->model_alamat->opt_tipe_alamat(),
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'data_alamat'=>$data_alamat,
					  'namapegawai'=>$namapegawai,
					  'litfoto'=>$litfoto,
					  'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('alamat/alamat_detail_update',$data);
	}

	public function cek_opt(){
		$sql = $this->model_alamat->opt_assignment_reason();

		foreach ($sql->result() as $baris) {
			echo $baris->assignment_reason .'-'. $baris->name .'<br>';
		}
	}

	public function alamat_detail_pro_update(){
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
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
					  'start_date'=>$tanggalmulai,
					  'end_date'=>$tanggalakhir,
					  'status_process'=>$this->input->post('status_process'),				  
					  'address_type'=>$this->input->post('address_type'),
					  'street'=>$this->input->post('street'),
					  'neighborhood1'=>$this->input->post('neighborhood1'),
					  'neighborhood2'=>$this->input->post('neighborhood2'),
					  'sub_district'=>$this->input->post('sub_district'),
					  'district'=>$this->input->post('district'),
					  'city'=>$this->input->post('city'),
					  'province'=>$this->input->post('province'),
					  'country'=>$this->input->post('country'),
					  'postalcode'=>$this->input->post('postalcode'),
					  'contact_person'=>$this->input->post('contact_person'),
					  'contact_phone_country'=>$this->input->post('contact_phone_country'),
					  'contact_phone_area'=>$this->input->post('contact_phone_area'),
					  'contact_phone_no'=>$this->input->post('contact_phone_no'),
					  'mobile_phone_country'=>$this->input->post('mobile_phone_country'),
					  'mobile_phone_area'=>$this->input->post('mobile_phone_area'),
				  	  'mobile_phone_no'=>$this->input->post('mobile_phone_no')
					  );
		$sql = $this->model_alamat->alamat_detail_pro_update($data);

	 	 echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='".base_url()."/alamat/alamat_detail/".$data['personnel_id']."';
		      </script>";
		//redirect(base_url('alamat/alamat_detail/'.$data['personnel_id']));
	}
	 
	public function alamat_detail_pro_add(){
            
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
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
					  'start_date'=>$tanggalmulai,
					  'end_date'=>$tanggalakhir,
					  'status_process'=>$this->input->post('status_process'),				  
					  'address_type'=>$this->input->post('address_type'),
					  'street'=>$this->input->post('street'),
					  'neighborhood1'=>$this->input->post('neighborhood1'),
					  'neighborhood2'=>$this->input->post('neighborhood2'),
					  'sub_district'=>$this->input->post('sub_district'),
					  'district'=>$this->input->post('district'),
					  'city'=>$this->input->post('city'),
					  'province'=>$this->input->post('province'),
					  'country'=>$this->input->post('country'),
					  'postalcode'=>$this->input->post('postalcode'),
					  'contact_person'=>$this->input->post('contact_person'),
					  'contact_phone_country'=>$this->input->post('contact_phone_country'),
					  'contact_phone_area'=>$this->input->post('contact_phone_area'),
					  'contact_phone_no'=>$this->input->post('contact_phone_no'),
					  'mobile_phone_country'=>$this->input->post('mobile_phone_country'),
					  'mobile_phone_area'=>$this->input->post('mobile_phone_area'),
				  	  'mobile_phone_no'=>$this->input->post('mobile_phone_no')
					  );

		$sql = $this->model_alamat->alamat_detail_pro_add($data);
                
                echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='".base_url()."/alamat/alamat_detail/".$data['personnel_id']."';
		      </script>";
	 	//$this->session->set_flashdata('pesan','Data berhasil di Simpan!');
		//redirect(base_url('alamat/alamat_detail/'.$data['personnel_id']));
	}

 

	public function alamat_update_pro_selected(){
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
	  
		$sqlupdate = $this->model_alamat->alamat_update_pro_selected($data);

		$this->session->set_flashdata('pesan','Data berhasil di Update!');
		redirect(base_url('alamat/alamat_detail/'.$data['personnel_id']));

	}
 
	 
}
