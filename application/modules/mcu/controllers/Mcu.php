<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcu extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	  
	public function __construct(){
		parent ::__construct();
		//panggil model mcu jika memang controller butuh transaksi data
		$this->load->model('model_mcu');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	} 


 	public function get_all_mcu_detail_json(){
		$personnel_id = $this->uri->segment(3);
		 
		//echo json_encode($this->model_mcu->get_all_mcu_detail_json($personnel_id));
		$data = json_encode($this->model_mcu->get_all_mcu_detail_json($personnel_id));
		echo "{\"records\":" . $data . "}";
	}

	public function get_all_pic_mcu_json(){
		$personnel_id = $this->uri->segment(3);
		 
		echo json_encode($this->model_mcu->get_all_pic_mcu_json($personnel_id));
	}
 
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		 
		$error = '';
		$personnel_id = $this->uri->segment(3);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					'personnel_id'=>$personnel_id,
					  
					  'footer'=>'© 2016. Langit Infotama');		
		 
		
		$this->load->view('mcu/mcu_detail_view',$data);
		 

		 
	}

	public function mcu_detail_json(){
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

  

	public function mcu_detail(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
                        $sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 	//$this->model_mcu->mcu_update($id);
	 	$data_employee = $this->model_mcu->mcu_detail($personnel_id);
 	 
	  
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

	 	$this->load->view('mcu/mcu_detail_view',$data);
	}

	public function mcu_detail_delete($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
		$sqldelete = $this->model_mcu->mcu_detail_delete($personnel_id,$start_date,$end_date);
	 
		redirect(base_url('mcu/mcu_detail/'.$personnel_id));
	}

	public function mcu_detail_add(){
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
                                          'location'=>$location,
					  'personnel_id'=>$personnel_id,
                                          'opt_hasil_cek'=>$this->model_mcu->opt_hasil_cek(),
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('mcu/mcu_detail_add',$data);
	}


	public function mcu_detail_update($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
                $location = $this->uri->segment(1);
		$date_start_today = date('d-m-Y');
 		$date_end =  '31-12-9999';
 	 	 
		$sql = $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
                        
 	 	$datamcu = $this->model_mcu->mcu_detail_update($personnel_id,$start_date,$end_date);
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'location'=>$location,
                                          'personnel_id'=>$personnel_id,
                                          'opt_hasil_cek'=>$this->model_mcu->opt_hasil_cek(),
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
                                          'litfoto'=>$litfoto,              
                                          'usia'=>$usia,
					  'datamcu'=>$datamcu,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('mcu/mcu_detail_update',$data);
	}

	public function cek_opt(){
		$sql = $this->model_mcu->opt_assignment_reason();

		foreach ($sql->result() as $baris) {
			echo $baris->assignment_reason .'-'. $baris->name .'<br>';
		}
	}

	public function mcu_detail_pro_update(){
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
                
                $mcu_start_date = $this->input->post('mcu_start_date');
                $exmcutgstart_date = substr($mcu_start_date,0,2);
                $exmcublstart_date = substr($mcu_start_date,3,2);
                $exmcuthstart_date = substr($mcu_start_date,6,4);
                $starchcekup = $exmcuthstart_date.$exmcublstart_date.$exmcutgstart_date;
                
                $mcu_end_date = $this->input->post('mcu_end_date');
                $exmcutgend_date = substr($mcu_end_date,0,2);
                $exmcublend_date = substr($mcu_end_date,3,2);
                $exmcuthend_date = substr($mcu_end_date,6,4);
                $endcheckup = $exmcuthend_date.$exmcublend_date.$exmcutgend_date;
                /*
personnel_id
start_date
end_date
status_process
checked_result
certified
certificate_no
medical
health_note
remark
mcu_start_date
mcu_end_date
                 */
                $certified = $this->input->post('certified');
                if($certified == ''){
                    $valcertified = '0';
                }else{
                    $valcertified = $certified;
                }
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
                        'start_date'=>$tanggalmulai,
                        'end_date'=>$tanggalakhir,
                        'status_process'=>$this->input->post('status_process'),
                        'checked_result'=>$this->input->post('checked_result'),
                        'certified'=>$valcertified,
                        'certificate_no'=>$this->input->post('certificate_no'),
                        'medical'=>$this->input->post('medical'),
                        'health_note'=>$this->input->post('health_note'),
                        'remark'=>$this->input->post('remark'),
                        'mcu_start_date'=>$starchcekup,
                        'mcu_end_date'=>$endcheckup                         
                        );

		$sql = $this->model_mcu->mcu_detail_pro_update($data);

	 	  echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='".base_url()."/mcu/mcu_detail/".$data['personnel_id']."';
		      </script>";
		//redirect(base_url('mcu/mcu_detail/'.$data['personnel_id']));
	}
	 
	public function mcu_detail_pro_add(){
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
                
                $mcu_start_date = $this->input->post('mcu_start_date');
                $exmcutgstart_date = substr($mcu_start_date,0,2);
                $exmcublstart_date = substr($mcu_start_date,3,2);
                $exmcuthstart_date = substr($mcu_start_date,6,4);
                $starchcekup = $exmcuthstart_date.$exmcublstart_date.$exmcutgstart_date;
                
                $mcu_end_date = $this->input->post('mcu_end_date');
                $exmcutgend_date = substr($mcu_end_date,0,2);
                $exmcublend_date = substr($mcu_end_date,3,2);
                $exmcuthend_date = substr($mcu_end_date,6,4);
                $endcheckup = $exmcuthend_date.$exmcublend_date.$exmcutgend_date;
                /*
personnel_id
start_date
end_date
status_process
checked_result
certified
certificate_no
medical
health_note
remark
mcu_start_date
mcu_end_date
                 */
                $certified = $this->input->post('certified');
                if($certified == ''){
                    $valcertified = '0';
                }else{
                    $valcertified = $certified;
                }
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
                        'start_date'=>$tanggalmulai,
                        'end_date'=>$tanggalakhir,
                        'status_process'=>$this->input->post('status_process'),
                        'checked_result'=>$this->input->post('checked_result'),
                        'certified'=>$valcertified,
                        'certificate_no'=>$this->input->post('certificate_no'),
                        'medical'=>$this->input->post('medical'),
                        'health_note'=>$this->input->post('health_note'),
                        'remark'=>$this->input->post('remark'),
                        'mcu_start_date'=>$starchcekup,
                        'mcu_end_date'=>$endcheckup                         
                        );

		$sql = $this->model_mcu->mcu_detail_pro_add($data);
                
                  echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='".base_url()."/mcu/mcu_detail/".$data['personnel_id']."';
		      </script>";
                
		//redirect(base_url('mcu/mcu_detail/'.$data['personnel_id']));
	}

 

	public function mcu_update_pro_selected(){
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
	  
		$sqlupdate = $this->model_mcu->mcu_update_pro_selected($data);

		$this->session->set_flashdata('pesan','Data berhasil di Update!');
		redirect(base_url('mcu/mcu_detail/'.$data['personnel_id']));

	}
 
	 
}
