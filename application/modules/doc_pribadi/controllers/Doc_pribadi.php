<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc_pribadi extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	  
	public function __construct(){
		parent ::__construct();
		//panggil model doc_pribadi jika memang controller butuh transaksi data
		$this->load->model('model_doc_pribadi');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	} 


 	public function get_all_doc_pribadi_detail_json(){
		$personnel_id = $this->uri->segment(3);
		 
		//echo json_encode($this->model_doc_pribadi->get_all_doc_pribadi_detail_json($personnel_id));
		$data = json_encode($this->model_doc_pribadi->get_all_doc_pribadi_detail_json($personnel_id));
		echo "{\"records\":" . $data . "}";
	}

	public function get_all_pic_doc_pribadi_json(){
		$personnel_id = $this->uri->segment(3);
		 
		echo json_encode($this->model_doc_pribadi->get_all_pic_doc_pribadi_json($personnel_id));
	}
 
	//ini method buat menampilkan ke layar pertama kali ketika controller diakses
	public function index()	{
		 
		$error = '';
		$personnel_id = $this->uri->segment(3);
		$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					'personnel_id'=>$personnel_id,
					  
					  'footer'=>'© 2016. Langit Infotama');		
		 
		
		$this->load->view('doc_pribadi/doc_pribadi_detail_view',$data);
		 

		 
	}

	public function doc_pribadi_detail_json(){
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

  

	public function doc_pribadi_detail(){
		$personnel_id = $this->uri->segment(3);
                $location = $this->uri->segment(1);
                
                //cek ketersediaan direktori per personnel_id
              
                $mydir = 'assets/doc/'.$personnel_id;
                
                if(file_exists($mydir)){
                    //echo "<h1>direktori kamu ada</h1>";
                }else{
                    //echo "<h1>direktori kamu ga ada</h1>";
                    mkdir('assets/doc/'.$personnel_id);
                }
                 
                        $sql        =   $this->db->query("SELECT *,substr(birth_date,1,4) as thnlahir FROM human_pa_md_emp_personal where personnel_id = '$personnel_id' order by start_date desc limit 1")->row_array();
			$namapegawai = $sql['name_full'];
			$litfoto = $sql['lit_foto'];
			$thnlahir = $sql['thnlahir'];
			$thn_skrg = date('Y');
			$usia = $thn_skrg - $thnlahir;
	 	//$this->model_doc_pribadi->doc_pribadi_update($id);
	 	$data_employee = $this->model_doc_pribadi->doc_pribadi_detail($personnel_id);
 	 
	  
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

	 	$this->load->view('doc_pribadi/doc_pribadi_detail_view',$data);
	}

	public function doc_pribadi_detail_delete($personnel_id,$start_date,$end_date){
		$personnel_id = $this->uri->segment(3);
		$start_date = $this->uri->segment(4);
		$end_date = $this->uri->segment(5);
                
                //ambil data buat dihapus
                $sqlfile = $this->db->query("select * from human_pa_md_emp_document where personnel_id = '$personnel_id' AND start_date = '$start_date' AND end_date = '$end_date'");
		foreach($sqlfile->result() as $row){
                    if($row->binary_data == '' || empty($row->binary_data)){
                        
                    }else{
                         unlink("assets/doc/$personnel_id/".$row->binary_data);
                    }
                }
                 
                $sqldelete = $this->model_doc_pribadi->doc_pribadi_detail_delete($personnel_id,$start_date,$end_date);
	 
		redirect(base_url('doc_pribadi/doc_pribadi_detail/'.$personnel_id));
	}

	public function doc_pribadi_detail_add(){
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
                                          'opt_tipe_dokumen'=>$this->model_doc_pribadi->opt_tipe_dokumen(),
					 
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
										'litfoto'=>$litfoto,
										'usia'=>$usia,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('doc_pribadi/doc_pribadi_detail_add',$data);
	}


	public function doc_pribadi_detail_update($personnel_id,$start_date,$end_date){
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
                        
 	 	$data_docpribadi = $this->model_doc_pribadi->doc_pribadi_detail_update($personnel_id,$start_date,$end_date);
	 	$data = array('judul'=>'Human Resource Information System (HRIS) ASDP',
					  'location'=>$location,
                                          'personnel_id'=>$personnel_id,
                                          'opt_tipe_dokumen'=>$this->model_doc_pribadi->opt_tipe_dokumen(),					   
					  'date_start_today'=>$date_start_today,
					  'date_end'=>$date_end,
					  'namapegawai'=>$namapegawai,
                                          'litfoto'=>$litfoto,              
                                          'usia'=>$usia,
					  'data_docpribadi'=>$data_docpribadi,
					  'footer'=>'© 2016. Langit Infotama');	

	 	$this->load->view('doc_pribadi/doc_pribadi_detail_update',$data);
	}

	public function cek_opt(){
		$sql = $this->model_doc_pribadi->opt_assignment_reason();

		foreach ($sql->result() as $baris) {
			echo $baris->assignment_reason .'-'. $baris->name .'<br>';
		}
	}

	public function doc_pribadi_detail_pro_update(){
		$personnel_id = $this->input->post('personnel_id');
                 
                //upload File
                $config['upload_path']	= "assets/doc/$personnel_id";
   
                $config['allowed_types']= '*';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload');
                $this->upload->initialize($config);
                
                //cek isi inputan file kosong apa nggak?
                if($this->upload->do_upload('binary_data'))
                {
                   $filedata = $this->upload->data();  
                   $masuk = $filedata['file_name'];
                  
                }else{
                   $filedata = $this->upload->display_errors(); 
                   $masuk = $this->input->post('original_file_name');
                   
                }
                /*
                 echo $filedata['file_ext'];
                 echo "<br>";
                 echo $filedata['file_type'];
                 echo "<br>";
                 echo $filedata['file_size'];
                 echo "<br>";
                 echo $filedata['file_name'];
                 exit();
                */
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
                
                //get ext
                $original_file_name = $this->input->post('original_file_name');
                $pisah = explode(".",$original_file_name);
                $ekstensi = $pisah[1];
                
               /*
personnel_id
start_date
end_date
document_type
seq
document_no
title
authority_officer
mime_type
binary_data
original_file_name
extension
size
remarks
                              */
        
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
                        'start_date'=>$tanggalmulai,
                        'end_date'=>$tanggalakhir,
                        'document_type'=>$this->input->post('document_type'),
                        'seq'=>$this->input->post('seq'),
                        'document_no'=>$this->input->post('document_no'),
                        'title'=>$this->input->post('title'),
                        'authority_officer'=>$this->input->post('authority_officer'),
                        'mime_type'=>$this->input->post('mime_type'),
                        'binary_data'=>$masuk,
                        'original_file_name'=>$this->input->post('original_file_name'),
                        'extension'=>$ekstensi,
                        'size'=>$this->input->post('size'),
                        'remarks'=>$this->input->post('remarks')                         
                        );

		$sql = $this->model_doc_pribadi->doc_pribadi_detail_pro_update($data);
                 echo "<script language=javascript>
				alert('Perubahan Data Berhasil');
				window.location='".base_url()."/doc_pribadi/doc_pribadi_detail/".$data['personnel_id']."';
		      </script>";
	 	 
		//redirect(base_url('doc_pribadi/doc_pribadi_detail/'.$data['personnel_id']));
	}
	 
	public function doc_pribadi_detail_pro_add(){
                $personnel_id = $this->input->post('personnel_id');
                 
                //upload File
                $config['upload_path']	= "assets/doc/$personnel_id";
   
                $config['allowed_types']= '*';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload');
                $this->upload->initialize($config);
                
                //ini buat BLOB
                 
                $file = $_FILES['binary_data']['tmp_name'];
                $datacontent = file_get_contents($file);          
                 
                
                
                //cek isi inputan file kosong apa nggak?
                if($this->upload->do_upload('binary_data'))
                {
                   $filedata = $this->upload->data();  
                   $masuk = $filedata['file_name'];
                   
                   $file = $_FILES['binary_data']['tmp_name'];
                   $datacontent = file_get_contents($file);    
                  
                }else{
                  $filedata = $this->upload->display_errors(); 
                  $masuk = '';
                   
                  $file = '';
                  $datacontent = '';
                   
                }
                /*
                 echo $filedata['file_ext'];
                 echo "<br>";
                 echo $filedata['file_type'];
                 echo "<br>";
                 echo $filedata['file_size'];
                 echo "<br>";
                 echo $filedata['file_name'];
                 exit();
                */
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
                
                //get ext
                $original_file_name = $this->input->post('original_file_name');
                $pisah = explode(".",$original_file_name);
                $ekstensi = $pisah[1];
                
               /*
personnel_id
start_date
end_date
document_type
seq
document_no
title
authority_officer
mime_type
binary_data
original_file_name
extension
size
remarks
                              */
        
		$data = array('personnel_id'=>$this->input->post('personnel_id'),
                        'start_date'=>$tanggalmulai,
                        'end_date'=>$tanggalakhir,
                        'document_type'=>$this->input->post('document_type'),
                        'seq'=>$this->input->post('seq'),
                        'document_no'=>$this->input->post('document_no'),
                        'title'=>$this->input->post('title'),
                        'authority_officer'=>$this->input->post('authority_officer'),
                        'mime_type'=>$this->input->post('mime_type'),
                        'binary_data'=>$datacontent,
                        'original_file_name'=>$this->input->post('original_file_name'),
                        'extension'=>$ekstensi,
                        'size'=>$this->input->post('size'),
                        'remarks'=>$this->input->post('remarks')                         
                        );

		$sql = $this->model_doc_pribadi->doc_pribadi_detail_pro_add($data);
                
                  echo "<script language=javascript>
				alert('Penambahan Data Berhasil');
				window.location='".base_url()."/doc_pribadi/doc_pribadi_detail/".$data['personnel_id']."';
		      </script>";
                
		//redirect(base_url('doc_pribadi/doc_pribadi_detail/'.$data['personnel_id']));
	}

 

	public function doc_pribadi_update_pro_selected(){
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
	  
		$sqlupdate = $this->model_doc_pribadi->doc_pribadi_update_pro_selected($data);

		$this->session->set_flashdata('pesan','Data berhasil di Update!');
		redirect(base_url('doc_pribadi/doc_pribadi_detail/'.$data['personnel_id']));

	}
 
	 
}
