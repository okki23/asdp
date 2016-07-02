<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model pegawai jika memang controller butuh transaksi data
		$this->load->model('model_pegawai');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function transaksi_id($param='') {
		$data = $this->model_pegawai->get_last_personnel_id();
		$lastid = $data->row();
		$idnya = $lastid->id;
	 

            if($idnya=='') { // bila data kosong
                $ID = $param."10000001";
				//00000001
            }else {
                $MaksID = $idnya;
                $MaksID++;
                if($MaksID < 10) $ID = $param."1000000".$MaksID;  
                else if($MaksID < 100) $ID = $param."100000".$MaksID; 
                else if($MaksID < 1000) $ID = $param."10000".$MaksID;  
                else if($MaksID < 10000) $ID = $param."1000".$MaksID;  
				else if($MaksID < 100000) $ID = $param."100".$MaksID;
				else if($MaksID < 1000000) $ID = $param."10".$MaksID;
				else if($MaksID < 10000000) $ID = $param."1".$MaksID;
                else $ID = $MaksID;  
            }

            return $ID;
        }



	public function get_all_pegawai_json(){
		$data_employee = $this->model_pegawai->get_all_pegawai_json();
		$total = count($this->model_pegawai->get_all_pegawai_json());
		$data = json_encode($this->model_pegawai->get_all_pegawai_json());
		//echo json_encode($this->model_pegawai->get_all_pegawai_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	echo "{\"records\":" . $data . "}";
	}
	public function get_chart_pegawai_json(){
		//$data_employee = $this->model_pegawai->get_all_pegawai_json();
		//$total = count($this->model_pegawai->get_all_pegawai_json());
		echo json_encode($this->model_pegawai->get_chart_pegawai_json());
		//echo json_encode($this->model_pegawai->get_all_pegawai_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	//echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
                $location = $this->uri->segment(1);
		$data_employee = $this->model_pegawai->get_all_pegawai();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                          'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('pegawai/pegawai_view',$data);
		 

		 
	}

	public function add_pegawai(){
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
                 
		//$last_personnel_id = $this->model_pegawai->get_last_personnel_id();
                $location = $this->uri->segment(2);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                           'location'=>$location,
					  'last_id'=>$this->transaksi_id(),
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('pegawai/pegawai_add',$data);
	}

		public function pro_add_pegawai(){
		//ini adalah tipe parsingan data si CI
		$nik = $this->input->post('nik');
                
                $start_date = $this->input->post('tanggal_masuk');
                $extgstart_date = substr($start_date,0,2);
                $exblstart_date = substr($start_date,3,2);
                $exthstart_date = substr($start_date,6,4);
                $tanggalmulai = $exthstart_date.$exblstart_date.$extgstart_date;
                
                
		//$tanggal_masuk = str_replace("-","",date('Ymd',strtotime($this->input->post('tanggal_masuk'))));
		//$stor_tanggal_masuk = date('Y-m-d',strtotime($tanggal_masuk));
		//$datestart = htmlspecialchars($tanggal_masuk);
		$tgldn = substr($datestart,0,2);
                $personnel_id = $this->input->post('personnel_id');
		$blndn = substr($datestart,3,2);
		$thndn = substr($datestart,6,4);
		$tglstart = $thndn.$blndn.$tgldn;
		$nama =   $this->input->post('nama');

 		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin

		$sqlinsert = $this->model_pegawai->pro_add_pegawai($personnel_id,$nik,$tanggalmulai,$nama);
		$link = base_url('pegawai');
		//jika berhasil maka pindah ke halaman view pegawai
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('pegawai'));
               
                
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link';
		      </script>";
                
		
	}

	public function pegawai_update(){
		$id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
	 	//$this->model_pegawai->pegawai_update($id);
	 	$data_employee = $this->model_pegawai->pegawai_update($id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                          'personnel_id'=>$id,
                                          'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('pegawai/pegawai_edit',$data);
	}

	public function pro_update_pegawai(){
		$nik = $this->input->post('nik');
		 
		$tanggal_masuk = str_replace("-","",date('Ymd',strtotime($this->input->post('tanggal_masuk'))));
		$nama =   $this->input->post('nama');
		//echo $nik.'-'.$stor_tanggal_masuk.'-'.$nama;
		$sqlupdate = $this->model_pegawai->pro_update_pegawai($nik,$tanggal_masuk,$nama);
		$link = base_url('pegawai');
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
        public function pegawai_detail(){
                $id = $this->uri->segment(3);
                $location = $this->uri->segment(2);
                $sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
										'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
                                          'personnel_id'=>$id,
                                          'location'=>$location,
					 
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('pegawai/pegawai_detail',$data);
        }
	public function pegawai_delete(){
		$id = $this->uri->segment(3);
		$this->model_pegawai->pegawai_delete($id);
                $link = base_url('pegawai');
                 echo "<script language=javascript>
				alert('Hapus Berhasil');
		        window.location='$link';
		      </script>";
                
                /*
		echo json_encode($this->model_pegawai->pegawai_delete($id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('pegawai'));
                
                 */

	}
	
	public function pegawai_importphoto(){
	
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
