<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orm extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	public function __construct(){
		parent ::__construct();
		//panggil model pegawai jika memang controller butuh transaksi data
		$this->load->model('model_orm');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		//if($this->session->userdata('username') == ''){
		//	redirect(base_url('login'));
		//}
		 
	}


	public function transaksi_id($param='') {
		$data = $this->model_orm->get_last_personnel_id();
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
	
	public function Data(){
		
		$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
		$result = array();
		$sql = "select *,case when area='D' then 'Darat' when area='L' then 'Laut' end as arean from core_orm where parentId=$id";
		$data =  $this->db->query($sql);
		//
		foreach ($data->result() as $r){
			//$r['state'] = $this->has_child($r['code']) ? 'closed' : 'open';
			//$r['area'] = $r['arean'];
			//$state= $this->has_child($r->code) ? 'closed' : 'open';
			$r->state = $this->has_child($r->code) ? 'closed' : 'open';
			$r->area = $r->arean;
			//$area=$r->arean;
			array_push($result, $r);
			
		}
		//while($row = mysqli_fetch_array($data)){
		//	$row['state'] = $this->has_child($row['code']) ? 'closed' : 'open';
		//	$row['area'] = $row['arean'];
		//	array_push($result, $row);
		//}
		//echo $this->has_child();
		echo json_encode($result);
		
		
		}	
	function Has_child($id){
	//require 'conn.php';$id
	$sql = "select count(*) from core_orm where parentId='$id'";
	$data =  $this->db->query($sql);
	//foreach($data->result_array() AS $row) {
		
	//		return $r[0] > 0 ? true : false;
	//}	
	//$rs=mysqli_query($con,$sql);
	//$rs = mysqli_query("select count(*) from products where parentId=$id");
	//$row = mysqli_fetch_array($data);
	//}
	//$data['counts'] = $query->num_rows;
	if($data->num_rows() > 0) {
	//return $row[0] > 0 ? true : false;
	return true;
	}else{
	return false;	
	}
	}


	public function get_all_orm_json(){
		$data_employee = $this->model_orm->get_all_orm_json();
		//$total = count($this->model_orm->get_all_pegawai_json());
		//$data = json_encode($this->model_orm->get_all_pegawai_json());
		echo json_encode($this->model_orm->get_all_orm_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	//echo "{\"records\":" . $data . "}";
	}
	public function get_chart_pegawai_json(){
		//$data_employee = $this->model_orm->get_all_pegawai_json();
		//$total = count($this->model_orm->get_all_pegawai_json());
		echo json_encode($this->model_orm->get_chart_pegawai_json());
		//echo json_encode($this->model_orm->get_all_pegawai_json());
		//echo "{\"total\":". $total .",\"records\":" . $data . "}";
	//echo "{\"records\":" . $data . "}";
	}
	
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		//ini variabel buat nimpuk ke view ,ini kalau di smarty namanya assign
		$error = '';
		//$data_employee = $this->model_orm->get_all_pegawai();
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
			//		  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');		
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah

		//$this->session->set_flashdata('pesan','');
		
		$this->load->view('orm/orm_view',$data);
		 

		 
	}

	public function add(){
		
		$id = $this->uri->segment(3);
		$error = '';
		if(!empty($id)){
		$data_employee = $this->model_orm->orm_view_add($id);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('orm/orm_add',$data);	
		}else{
		$this->load->view('orm/orm_addnew');		
		}
		
	}
	
	public function addnew(){
		
		$id = $this->uri->segment(3);
		$error = '';
		//$data_employee = $this->model_orm->orm_view_add($id);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  //'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
		//ini mirip sama display smarty tapi si CI ngelempar view sama data sekaligus
		//kalau smarty antara display sama assign terpisah
		$this->load->view('orm/orm_addnew',$data);
	}
		
		public function save_new(){
			//echo 'berhasil';exit;
		//ini adalah tipe parsingan data si CI
		$code = $this->input->post('code');
		$name = $this->input->post('name');
		$datestartc = $this->input->post('datestart');
		$datestart = htmlspecialchars($datestartc);
		$tgldn = substr($datestart,0,2);
		$blndn = substr($datestart,3,2);
		$thndn = substr($datestart,6,4);
		$tglstart = $thndn.$blndn.$tgldn;
		
 		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin

		$sqlinsert = $this->model_orm->save_new_orm($code,$tglstart,$name);
		$link = base_url();
		//jika berhasil maka pindah ke halaman view pegawai
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('pegawai'));
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link/orm/addnew';
		      </script>";
		
	}
		
		public function save_add(){
		//ini adalah tipe parsingan data si CI
		$code = $this->input->post('code');
		$name = $this->input->post('name');
		$datestart = $this->input->post('datestart');
		$datestart = htmlspecialchars($datestart);
		$tgldn = substr($datestart,0,2);
		$blndn = substr($datestart,3,2);
		$thndn = substr($datestart,6,4);
		$tglstart = $thndn.$blndn.$tgldn;
		$area =   $this->input->post('area');
		$parentcode =   $this->input->post('parentcode');

 		//karena model terpisah jadi kita panggil method si model saja ,karena core model sudah dipanggil sama si construct diatas
		//jangan lupa parameter parsingan dimasukin

		$sqlinsert = $this->model_orm->save_add_orm($code,$tglstart,$area,$name,$parentcode);
		$link = base_url();
		//jika berhasil maka pindah ke halaman view pegawai
		//$this->session->set_flashdata('pesan','Data Berhasil Dimasukkan');
		 //redirect(base_url('pegawai'));
		echo "<script language=javascript>
				alert('Simpan Berhasil');
		        window.location='$link/orm/add/$code';
		      </script>";
		
	}

	public function edit(){
		$id = $this->uri->segment(3);
	 	$data_employee = $this->model_orm->orm_update($id);
	 	$error = '';
	 		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'error'=>$error,
					  'data_employee'=>$data_employee,
					  'footer'=>'© 2016. Langit Infotama');	
					  
	 	$this->load->view('orm/orm_edit',$data);
	}

	public function update(){
		$code = $this->input->post('code');
		$tanggal_masuk = $this->input->post('datestart');
		$tgldn = substr($tanggal_masuk,0,2);
		$blndn = substr($tanggal_masuk,3,2);
		$thndn = substr($tanggal_masuk,6,4);
		$tglstart = $thndn.$blndn.$tgldn;
		$dateend = $this->input->post('dateend');
		$tglde = substr($dateend,0,2);
		$blnde = substr($dateend,3,2);
		$thnde = substr($dateend,6,4);
		$tglend = $thnde.$blnde.$tglde;
		$nama =   $this->input->post('name');
		$area =   $this->input->post('area');
		$parentid =   $this->input->post('parentcode');
		$sqlupdate = $this->model_orm->pro_update_orm($code,$tglstart,$tglend,$nama,$area,$parentid);
		$link = base_url();
		//jika berhasil maka pindah ke halaman view pegawai
		//echo $this->session->set_flashdata('pesan','Data Berhasil Dirubah');
		//echo 2;
		//redirect(base_url('pegawai'));
		//
		echo "<script language=javascript>
				alert('Perbaikan Berhasil');
				window.location='$link/orm/edit/$code';
		      </script>";

	}

	public function delete(){
		$id = $this->uri->segment(3);
		$this->model_orm->orm_delete($id);
		$result = json_encode($this->model_orm->orm_delete($id));
		if ($result){
		echo json_encode(array('success'=>true));
		} else {
		echo json_encode(array('msg'=>'An error occurred while attempting to delete the record.'));
		}
		//$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		// redirect(base_url('pegawai'));

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
