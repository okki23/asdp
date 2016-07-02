<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/

	//semua kueri SQL akan dijalankan disini
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
 		//panggil model login jika memang controller butuh transaksi data
		$this->load->model('model_login');
	}

	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'footer'=>'© 2016. Langit Infotama');
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('login_view',$data);
 
		 
	}

	public function auth(){
		//ini adalah tipe parsingan data si CI
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin
		$sql_login = $this->model_login->cek_auth($username,$password);


		//kalo dari database tidak ada record,maka balik ke halaman login
		if($sql_login < 1){
		 
			redirect(base_url('login'));
			$this->session->set_flashdata('pesan','Username atau Password Salah,Ulangi!');
            $error = 'username atau password salah';
            
                    
          
		}else{
		//kalo dari database ada record,maka pindah ke halaman dashboard
			$error = '';
			$this->session->set_flashdata('pesan','Login Sukses!');
		//ini memanggil user id untuk didaftarkan oleh session
			$sql_accinfo = $this->model_login->get_account_info($username,$password);
		//menciptakan session yang ingin didaftarkan
			$data = array('username'=>$sql_accinfo->user_id,
                                      'level'=>$sql_accinfo->lit_level_user);
                         
			$this->session->set_userdata($data);
		//pindah ke halaman dashboard
			redirect(base_url('dashboard'));
 
		    
		}
	}

	public function logout(){
		//mematikan seluruh session yang sudah terdaftar dan kembali ke halaman login
		$this->session->sess_destroy($data);
		redirect(base_url('login'));
	}

	public function change_pass_view(){

	}

	public function change_pass_action(){
		
	}
}
