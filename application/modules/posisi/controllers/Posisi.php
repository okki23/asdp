<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model posisi jika memang controller butuh transaksi data
		$this->load->model('model_posisi');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function transaksi_id($param='') {
		$data = $this->model_posisi->get_last_personnel_id();
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



	public function get_all_posisi_json(){
		$data_employee = $this->model_posisi->get_all_posisi_json();
		$total = count($this->model_posisi->get_all_posisi_json());
		$data = json_encode($this->model_posisi->get_all_posisi_json());
		//echo json_encode($this->model_posisi->get_all_posisi_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	echo "{\"records\":" . $data . "}";
	}
	public function get_chart_posisi_json(){
		//$data_employee = $this->model_posisi->get_all_posisi_json();
		//$total = count($this->model_posisi->get_all_posisi_json());
		echo json_encode($this->model_posisi->get_chart_posisi_json());
		//echo json_encode($this->model_posisi->get_all_posisi_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	//echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
        $location = $this->uri->segment(1);
		$data_employee = $this->model_posisi->get_all_posisi();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                      'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('posisi/posisi_view',$data);
		 

		 
	}

	public function add_posisi(){
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		//$last_personnel_id = $this->model_posisi->get_last_personnel_id();
        $location = $this->uri->segment(1);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                           'location'=>$location,
					  'last_id'=>$this->transaksi_id(),
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('posisi/posisi_add',$data);
	}

		public function pro_add_posisi(){
		//ini adalah tipe parsingan data si CI
		$nik = $this->input->post('nik');
		$tanggal_masuk = str_replace("-","",date('Ymd',strtotime($this->input->post('tanggal_masuk'))));
		//$stor_tanggal_masuk = date('Y-m-d',strtotime($tanggal_masuk));
		$datestart = htmlspecialchars($tanggal_masuk);
		$tgldn = substr($datestart,0,2);
		$blndn = substr($datestart,3,2);
		$thndn = substr($datestart,6,4);
		$tglstart = $thndn.$blndn.$tgldn;
		$nama =   $this->input->post('nama');

 		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin

		$sqlinsert = $this->model_posisi->pro_add_posisi($nik,$tanggal_masuk,$nama);
		$link = base_url('posisi');
		//jika berhasil maka pindah ke halaman view posisi
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('posisi'));
                
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link';
		      </script>";
                
		
	}

	public function posisi_update(){
		$id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
	 	//$this->model_posisi->posisi_update($id);
	 	$data_employee = $this->model_posisi->posisi_update($id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                          'personnel_id'=>$id,
                                          'location'=>$location,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('posisi/posisi_edit',$data);
	}

	public function pro_update_posisi(){
		$nik = $this->input->post('nik');
		 
		$tanggal_masuk = str_replace("-","",date('Ymd',strtotime($this->input->post('tanggal_masuk'))));
		$nama =   $this->input->post('nama');
		//echo $nik.'-'.$stor_tanggal_masuk.'-'.$nama;
		$sqlupdate = $this->model_posisi->pro_update_posisi($nik,$tanggal_masuk,$nama);
		$link = base_url('posisi');
		//jika berhasil maka pindah ke halaman view posisi
		//echo $this->session->set_flashdata('pesan','Data Berhasil Dirubah');
		//echo 2;
		//redirect(base_url('posisi'));
		//
		echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='$link';
		      </script>";

	}
        public function posisi_detail(){
            $id = $this->uri->segment(3);
            $location = $this->uri->segment(2);
            $data_employee = $this->model_posisi->posisi_update($id);
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
										'data_employee'=>$data_employee,
                                          'personnel_id'=>$id,
                                          'location'=>$location,
					 
					  'footer'=>'© 2016. Langit Infotama');	
	 	$this->load->view('posisi/posisi_detail',$data);
        }
	public function posisi_delete(){
		$id = $this->uri->segment(3);
		$this->model_posisi->posisi_delete($id);
                $link = base_url('posisi');
                 echo "<script language=javascript>
				alert('Hapus Berhasil');
		        window.location='$link';
		      </script>";
                
                /*
		echo json_encode($this->model_posisi->posisi_delete($id));
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('posisi'));
                
                 */

	}
	
	public function posisi_importphoto(){
	
	$sql        =   $this->db->query("SELECT * FROM human_pa_md_emp_photo order by start_date desc limit 1")->row_array();
    $file   =   'images/'.$sql['personnel_id'].".jpg";
	$handle = fopen($file, 'a+');
	fwrite($handle, $sql['binary_data']); 
	}

	 
}
