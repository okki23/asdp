<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model user jika memang controller butuh transaksi data
		$this->load->model('model_user');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function transaksi_id($param='') {
		$data = $this->model_user->get_last_personnel_id();
		$lastid = $data->row();
		$idnya = $lastid->id;
	 

            if($idnya=='') { // bila data kosong
                $ID = $param."00000001";
				//00000001
            }else {
                $MaksID = $idnya;
                $MaksID++;
                if($MaksID < 10) $ID = $param."0000000".$MaksID;  
                else if($MaksID < 100) $ID = $param."000000".$MaksID; 
                else if($MaksID < 1000) $ID = $param."00000".$MaksID;  
                else if($MaksID < 10000) $ID = $param."0000".$MaksID;  
				else if($MaksID < 100000) $ID = $param."000".$MaksID;
				else if($MaksID < 1000000) $ID = $param."00".$MaksID;
				else if($MaksID < 10000000) $ID = $param."0".$MaksID;
                else $ID = $MaksID;  
            }

            return $ID;
        }



	public function get_all_user_json(){
		$data_employee = $this->model_user->get_all_user_json();
		$total = count($this->model_user->get_all_user_json());
		$data = json_encode($this->model_user->get_all_user_json());
		//echo json_encode($this->model_user->get_all_user_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		$location = $this->uri->segment(1);
		$data_employee = $this->model_user->get_all_user();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('user/user_view',$data);
		 

		 
	}

	public function add_user(){
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		//$last_personnel_id = $this->model_user->get_last_personnel_id();
		$location = $this->uri->segment(1);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'last_id'=>$this->transaksi_id(),
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('user/user_add',$data);
	}

		public function pro_add_user(){
		//ini adalah tipe parsingan data si CI
		$nik = $this->input->post('nik');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		//$stor_tanggal_masuk = date('Y-m-d',strtotime($tanggal_masuk));
		$dt11 = $this->input->post('dt11');

			$ad21 = $this->input->post('ad21');
			$ad22 = $this->input->post('ad22');
			$ad23 = $this->input->post('ad23');
			$ad24 = $this->input->post('ad24');
			$ad25 = $this->input->post('ad25');
			$ad26 = $this->input->post('ad26');
			$ad27 = $this->input->post('ad27');
			$ad28 = $this->input->post('ad28');
			$ad29 = $this->input->post('ad29');
			$ad210 = $this->input->post('ad210');
			$ad211 = $this->input->post('ad211');;
			$ad212 = $this->input->post('ad212');
			$ad213 = $this->input->post('ad213');
			$ad214 = $this->input->post('ad214');
			$ad215 = $this->input->post('ad215');
			$ad216 = $this->input->post('ad216');
			$ad217 = $this->input->post('ad217');

		
			
			$auth = $dt11.
					$ad21.$ad22.$ad23.
					$ad24.$ad25.$ad26.
					$ad27.$ad28.$ad29.
					$ad210.$ad211.$ad212.
					$ad213.$ad214.$ad215.
					$ad216.$ad217;

			$instance = $this->input->post('instance');
			$status_process = $this->input->post('status_process');
			$user_id = $this->input->post('user_id');
			$lit_auth_password = MD5($this->input->post('lit_auth_password'));
			$lit_level_user = $this->input->post('lit_level_user');
			$lit_code_core_orm = $this->input->post('lit_code_core_orm');
			

 		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin

		$sqlinsert = $this->model_user->pro_add_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process);
		$link = base_url('user');
		//jika berhasil maka pindah ke halaman view user
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('user'));
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link';
		      </script>";
		
	 	
 
		
	}

	public function user_update(){
		$user_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
	 	//$this->model_pegawai->pegawai_update($id);
	 	$data_employee = $this->model_user->user_update($user_id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'user_id'=>$user_id,
                      'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('user/user_edit',$data);
	}

	public function pro_update_user(){
			
			$dt11 = $this->input->post('dt11');
			$ad21 = $this->input->post('ad21');
			$ad22 = $this->input->post('ad22');
			$ad23 = $this->input->post('ad23');
			$ad24 = $this->input->post('ad24');
			$ad25 = $this->input->post('ad25');
			$ad26 = $this->input->post('ad26');
			$ad27 = $this->input->post('ad27');
			$ad28 = $this->input->post('ad28');
			$ad29 = $this->input->post('ad29');
			$ad210 = $this->input->post('ad210');
			$ad211 = $this->input->post('ad211');;
			$ad212 = $this->input->post('ad212');
			$ad213 = $this->input->post('ad213');
			$ad214 = $this->input->post('ad214');
			$ad215 = $this->input->post('ad215');
			$ad216 = $this->input->post('ad216');
			$ad217 = $this->input->post('ad217');

		
			
			$auth = $dt11.
					$ad21.$ad22.$ad23.
					$ad24.$ad25.$ad26.
					$ad27.$ad28.$ad29.
					$ad210.$ad211.$ad212.
					$ad213.$ad214.$ad215.
					$ad216.$ad217;

			$instance = $this->input->post('instance');
			$status_process = $this->input->post('status_process');
			$user_id = $this->input->post('user_id');
			$lit_auth_password = MD5($this->input->post('lit_auth_password'));
			$lit_level_user = $this->input->post('lit_level_user');
			$lit_code_core_orm = $this->input->post('lit_code_core_orm');

			$sqlupdate = $this->model_user->pro_update_user($instance,$user_id,$lit_auth_password,$lit_code_core_orm,$lit_level_user,$auth,$status_process);
		$link = base_url('user');

		//jika berhasil maka pindah ke halaman view pegawai
		//echo $this->session->set_flashdata('pesan','Data Berhasil Dirubah');
		//echo 2;
		//redirect(base_url('pegawai'));
		//
		echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='$link';
		      </script>";

	}

	public function user_delete(){
		$user_id = $this->uri->segment(3);
		$this->model_user->user_delete($user_id);
		echo json_encode($this->model_user->user_delete($user_id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('user'));

	}
	
	public function user_importphoto(){
	
	$sql        =   $this->db->query("SELECT * FROM human_pa_md_emp_photo order by start_date desc limit 1")->row_array();
    $file   =   'images/'.$sql['personnel_id'].".jpg";
	$handle = fopen($file, 'a+');
	fwrite($handle, $sql['binary_data']); 
	//$result = $this->db->query("SELECT * FROM human_pa_md_emp_photo limit 1")->row_array();
	//echo json_encode($result);
				/*
		$query = "SELECT * FROM human_pa_md_emp_photo limit 1";
				$result = $db->Execute($query);
	            
				while ($row = $rs->FetchRow()){

					$file = 'images/'.$row['personnel_id'].".jpg";
					$handle = fopen($file, 'a+');

					
					fwrite($handle, $row['binary_data']); 
				      	
	            }
		echo json_encode($result);
		*/
	}

	 
}
