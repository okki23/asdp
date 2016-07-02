<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {
/*
@author : Okki Setyawan &copy 2016
*/
	//semua kueri SQL akan dijalankan disini
	public function __construct(){
		parent ::__construct();
		 
	}
	//ini method model yang digunakan untuk autentikasi user
	public function cek_auth($username,$password)	{
		 $query = $this->db->query("select * from core_identity_user where user_id = '$username' AND lit_auth_password = '$password'");
 		 $queryku = $query->num_rows(); 

 		 return $queryku;
	 	 
	}
	//ini method model yang digunakan untuk menarik data user setelah user berhasil login
	public function get_account_info($username,$password){
		$queryacc = $this->db->query("select * from core_identity_user where user_id = '$username' AND lit_auth_password = '$password'");
		$getqueryacc = $queryacc->row();

		return $getqueryacc;
	}
}
