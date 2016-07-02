<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pribadi extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
 
	public function __construct(){
		parent ::__construct();
		//panggil model data_pribadi jika memang controller butuh transaksi data
		$this->load->model('model_data_pribadi');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	}
	//http://localhost/asdp_hris/data_pribadi/data_pribadi_detail/00000005
 

	public function get_all_data_pribadi_json($personnel_id){
		$personnel_id = $this->uri->segment(3);
		 
		$data= json_encode($this->model_data_pribadi->get_all_data_pribadi_json($personnel_id));
                echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		$personnel_id = $this->uri->segment(3);
		$location = $this->uri->segment(1);
		$data_employee = $this->model_data_pribadi->get_all_data_pribadi($personnel_id);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                          'location'=>$location,
					  'personnel_id'=>$personnel_id,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		 
		$this->load->view('data_pribadi/data_pribadi_view',$data);
		 

		 
	}

 
	public function data_pribadi_detail($personnel_id){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
	 	//$this->model_data_pribadi->data_pribadi_update($id);
	 	$data_employee = $this->model_data_pribadi->data_pribadi_selected($personnel_id);
	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
                                          'location'=>$location,
					'namapegawai'=>$namapegawai,
					  'litfoto'=>$litfoto,
					  'usia'=>$usia,					  
					  'personnel_id'=>$personnel_id,
					  'link'=>base_url('data_pribadi/data_pribadi_detail/'.$personnel_id),
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('data_pribadi/data_pribadi_view',$data);
	}


	public function add_data_pribadi(){
		 
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
 		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
		$data_employee = $this->model_data_pribadi->add_data_pribadi_selected($personnel_id);
	 
	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'namapegawai'=>$namapegawai,
					  'litfoto'=>$litfoto,
					  'usia'=>$usia,
					  'opt_prefix'=>$this->model_data_pribadi->opt_prefix(),
					  'opt_suffix'=>$this->model_data_pribadi->opt_suffix(),
					  'opt_ethnic'=>$this->model_data_pribadi->opt_ethnic(),
					  'opt_religion'=>$this->model_data_pribadi->opt_religion(),
					  'opt_marital_status'=>$this->model_data_pribadi->opt_marital_status(),
					  'personnel_id'=>$personnel_id,
                      'location'=>$location,
					  'data_employee'=>$data_employee,
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('data_pribadi/add_data_pribadi',$data);

	}


	public function update_data_pribadi(){
		$personnel_id = $this->uri->segment(3);
                $start_date = $this->uri->segment(4);
                $end_date = $this->uri->segment(5);
                
                $location = $this->uri->segment(1);
 
		$data_employee = $this->model_data_pribadi->update_data_pribadi($personnel_id,$start_date,$end_date);
		
	 	$error = '';
		$sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'namapegawai'=>$namapegawai,
					  'litfoto'=>$litfoto,
					  'usia'=>$usia,
                                          'location'=>$location,
					  'opt_prefix'=>$this->model_data_pribadi->opt_prefix(),
					  'opt_suffix'=>$this->model_data_pribadi->opt_suffix(),
					  'opt_ethnic'=>$this->model_data_pribadi->opt_ethnic(),
					  'opt_religion'=>$this->model_data_pribadi->opt_religion(),
					  'opt_marital_status'=>$this->model_data_pribadi->opt_marital_status(),
					  'personnel_id'=>$personnel_id,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('data_pribadi/update_data_pribadi',$data);

	}

	public function pro_add_data_pribadi_selected(){
		/*
	echo $this->input->post('personnel_id')."<br>";
	echo str_replace("-","",date('Ymd',strtotime($this->input->post('start_date'))))."<br>";
	echo str_replace("-","",date('Ymd',strtotime($this->input->post('end_date'))))."<br>";
	echo $this->input->post('status_process')."<br>";
	echo $this->input->post('name_first')."<br>";
	echo $this->input->post('name_mid')."<br>";
	echo $this->input->post('name_last')."<br>";
	echo $this->input->post('name_full')."<br>";
	echo $this->input->post('name_nick')."<br>";
	echo $this->input->post('prefix')."<br>";
	echo $this->input->post('prefix_other')."<br>";
	echo $this->input->post('suffix')."<br>";
	echo $this->input->post('suffix_other')."<br>";
	echo $this->input->post('gender')."<br>";
	echo $this->input->post('birth_place')."<br>";	
	 	 
	echo str_replace("-","",date('Ymd',strtotime($this->input->post('birth_date'))))."<br>";
	echo $this->input->post('nationality')."<br>";
	echo $this->input->post('ethnic')."<br>";
	echo $this->input->post('ethnic_other')."<br>";
	echo $this->input->post('religion')."<br>";
	echo $this->input->post('marital_status')."<br>";
	echo str_replace("-","",date('Ymd',strtotime($this->input->post('status_since'))))."<br>";
	echo $this->input->post('no_of_children')."<br>";			 
				 

	exit();
	*/
				 
		$data = array(
				'personnel_id'=>$this->input->post('personnel_id'),
				'start_date'=>str_replace("-","",date('Ymd',strtotime($this->input->post('start_date')))),
				'end_date'=>str_replace("-","",date('Ymd',strtotime($this->input->post('end_date')))),
				'status_process'=>$this->input->post('status_process'),
				'name_first'=>$this->input->post('name_first'),
				'name_mid'=>$this->input->post('name_mid'),
				'name_last'=>$this->input->post('name_last'),
				'name_full'=>$this->input->post('name_full'),
				'name_nick'=>$this->input->post('name_nick'),
				'prefix'=>$this->input->post('prefix'),
				'prefix_other'=>$this->input->post('prefix_other'),
				'suffix'=>$this->input->post('suffix'),
				'suffix_other'=>$this->input->post('suffix_other'),
				'gender'=>$this->input->post('gender'),
				'birth_place'=>$this->input->post('birth_place'),
				'birth_date'=>str_replace("-","",date('Ymd',strtotime($this->input->post('birth_date')))),
				'nationality'=>$this->input->post('nationality'),
				'ethnic'=>$this->input->post('ethnic'),
				'ethnic_other'=>$this->input->post('ethnic_other'),
				'religion'=>$this->input->post('religion'),
				'marital_status'=>$this->input->post('marital_status'),
				'status_since'=>str_replace("-","",date('Ymd',strtotime($this->input->post('status_since')))),
				'no_of_children'=>$this->input->post('no_of_children'),
				);

		
                //select data untuk proteksi jika ada NIK yang sama
                
		$sql_pro_add = $this->model_data_pribadi->pro_add_data_pribadi_selected($data);
		 
		redirect(base_url('data_pribadi/add_data_pribadi'.$personnel_id));

 
	}

		public function pro_update_data_pribadi_selected(){

			$data = array(
				'personnel_id'=>$this->input->post('personnel_id'),
				'start_date'=>$this->input->post('start_date'),
				'end_date'=>$this->input->post('end_date'),
				'status_process'=>$this->input->post('status_process'),
				'name_first'=>$this->input->post('name_first'),
				'name_mid'=>$this->input->post('name_mid'),
				'name_last'=>$this->input->post('name_last'),
				'name_full'=>$this->input->post('name_full'),
				'name_nick'=>$this->input->post('name_nick'),
				'prefix'=>$this->input->post('prefix'),
				'prefix_other'=>$this->input->post('prefix_other'),
				'suffix'=>$this->input->post('suffix'),
				'suffix_other'=>$this->input->post('suffix_other'),
				'gender'=>$this->input->post('gender'),
				'birth_place'=>$this->input->post('birth_place'),
				'birth_date'=>str_replace("-","",date('Ymd',strtotime($this->input->post('birth_date')))),
				'nationality'=>$this->input->post('nationality'),
				'ethnic'=>$this->input->post('ethnic'),
				'ethnic_other'=>$this->input->post('ethnic_other'),
				'religion'=>$this->input->post('religion'),
				'marital_status'=>$this->input->post('marital_status'), 
				'status_since'=>str_replace("-","",date('Ymd',strtotime($this->input->post('status_since')))),
				'no_of_children'=>$this->input->post('no_of_children'),
				);
                //echo $data['end_date'];
                //exit();
	  	//start validasi
		$tgl_lahir = $this->input->post('birth_date');
		$rubah = date_format(date_create($tgl_lahir), 'Y');
		$thn_skrg = date('Y');
		$usia = $thn_skrg - $rubah;
		 
		
		if($usia < 21){
		echo "<script language=javascript>
				alert('Usia anda kurang dari 21 Tahun!');
		        window.location='".base_url()."/data_pribadi/update_data_pribadi/".$data['personnel_id'].'/'.$data['start_date'].'/'.$data['end_date']."';
		      </script>";
		}else{
		$sql_pro_update = $this->model_data_pribadi->pro_update_data_pribadi_selected($data);
		 $id = $data['personnel_id'];
		 $link = base_url('data_pribadi/data_pribadi_detail/'.$id);
		 //redirect(base_url('data_pribadi/update_data_pribadi/'.$data['personnel_id']));
		 echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='".base_url()."/data_pribadi/data_pribadi_detail/".$id."';
		      </script>";
		 
		}

		 
	 
	}



	

 
	//bagian pendidikan
	public function data_pribadi_pendidikan_add(){
		$error = '';
		$personnel_id = $this->uri->segment(3);
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'personnel_id'=>$personnel_id,
					  'footer'=>'© 2016. Langit Infotama');	
		$this->load->view('data_pribadi/data_pribadi_pendidikan_add',$data);
	}

	public function data_pribadi_pendidikan_pro_add(){
	 	$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('v_upload_sukses', $data);
		}

	 	 $data=array(
    		'personnel_id' => $this->input->post('personnel_id'),
            'sekolah_institut' => $this->input->post('sekolah_institut'),
            'status_sekolah_institut' => $this->input->post('status_sekolah_institut'),
            'kota' => $this->input->post('kota'),
            'tahun_mulai' => $this->input->post('tahun_mulai'),
            'tahun_berakhir' => $this->input->post('tahun_berakhir'),
            'ijazah_doc_upload'=>$ijazah_doc_upload['file_name'],
            'keterangan'=>$this->input->post()
    	);
	 	 echo $data;
	 	 exit();
		 
		$personnel_id = $this->input->post('personnel_id');

       
 	
 		//masukin ke model untuk eksekusi kueri
		$sqlinsert = $this->model_data_pribadi->data_pribadi_pendidikan_pro_add($data);

		//jika berhasil maka pindah ke halaman view data_pribadi
		$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		redirect(base_url('data_pribadi/data_pribadi_detail/'.$personnel_id));
	}
	

	//bagian jabatan

	//bagian keluarga
 
 

	 
}
