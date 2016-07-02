<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/

	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model dashboard jika memang controller butuh transaksi data
 		$this->load->model('model_dashboard');

 		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	}

	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
	//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		$location = $this->uri->segment(1);
		$countemp = count($this->model_dashboard->get_count_all_json());
		
		//$total = count($this->model_pegawai->get_all_pegawai_json());
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'location'=>$location,
					  'countemp'=>$countemp,
					  'footer'=>'© 2016. Langit Infotama');

		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('dashboard',$data);
 
	 
	}
	 public function gender()	{
		 echo json_encode($this->model_dashboard->get_count_gender_json(),JSON_NUMERIC_CHECK);
		 //$jsonIterator = new RecursiveIteratorIterator(
    //new RecursiveArrayIterator(json_decode($json, TRUE)),
    //RecursiveIteratorIterator::SELF_FIRST);

//foreach ($jsonIterator as $key => $val) {
  //  if(is_array($val)) {
    //    echo "$key:\n";
    //} else {
    //    echo "$key => $val\n";
    //}
//}
		 }
}
