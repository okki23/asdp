<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_cv extends CI_Controller {
/*
@author : Okki Setyawan &copy 2016
*/
	
	//ini method yang pertama kali di jalankan oleh codeginiter,semua pemanggilan ada disini termasuk hak akses
	  
	public function __construct(){
		parent ::__construct();
		//panggil model report_cv jika memang controller butuh transaksi data
		$this->load->model('model_report_cv');
		//jika tidak ada session yang terdaftar maka sistem balik ke halaman login
		if($this->session->userdata('username') == ''){
			redirect(base_url('login'));
		}
		 
	} 
        
        public function index(){
            $personnel_id = $this->uri->segment(3);
            echo "Halo Dunia!";
        }
        
        public function report_cv_detail(){
            $personnel_id = $this->uri->segment(3);
          
            $data['judul'] = 'Report CV';
            
            //get data nama lengkap , ttl,agama,status pernikahan (human_pa_md_emp_personal)
            $sqlpersonal =  $this->db->query("select a.*,date_format(a.birth_date,'%d-%m-%Y') as tanggallahir,b.name as agama,c.name as statusnikah from human_pa_md_emp_personal a left join human_cust_personnel_religion b on b.religion = a.religion left join human_cust_personnel_marital_status c on c.marital_status = a.marital_status where a.personnel_id = '$personnel_id'");
            $availpersonal = $sqlpersonal->num_rows();
            $getpersonal = $sqlpersonal->row();
            if($availpersonal > 0){
                $data['name_full'] = $getpersonal->name_full;
                $data['agama'] = $getpersonal->agama;
                $data['statusnikah'] = $getpersonal->statusnikah;
                $data['tempatlahir'] = $getpersonal->birth_place;
                $data['tanggallahir'] = $getpersonal->tanggallahir;
                $data['foto'] = $getpersonal->lit_foto;
            }else{
                $data['name_full'] = 'N/A';
                $data['agama'] = 'N/A';
                $data['statusnikah'] = 'N/A';
                $data['tempatlahir'] = 'N/A';
                $data['tanggallahir'] = 'N/A';
                $data['foto'] = '';
            }
            //get data nama lengkap , ttl,agama,status pernikahan (human_pa_md_emp_personal)
 
            $sqlpersonelid =  $this->db->query("select * from human_pa_md_emp_personal_id where personnel_id = '$personnel_id' and personal_id_type = '8'");
            $availpersonelid = $sqlpersonelid->num_rows();
            $getpersonelid = $sqlpersonelid->row();
            if($availpersonelid > 0){
                $data['personelid'] = $getpersonelid->id_number;
            }else{
                $data['personelid'] = 'N/A';
            }
              //get data nama lengkap , ttl,agama,status pernikahan 
            
            
            //get address
            $sqladdress = $this->db->query("select * from human_pa_md_emp_address where personnel_id = '$personnel_id' ");
            $availaddress = $sqladdress->num_rows();
            $getaddress = $sqladdress->row();
            if($availaddress > 0){
                $data['isialamat'] = $getaddress->street;
                 
            }else{
                $data['isialamat'] = 'N/A';
            }
            //get address 
            
            
           //get comunication
            $sqlcom = $this->db->query("select * from human_pa_md_emp_communication where personnel_id = '$personnel_id'");
            $availcom = $sqlcom->num_rows();
            $getcom = $sqlcom->row();
            if($availcom > 0){
                $data['comunication'] = $getcom->phone_country.'-'.$getcom->phone_area.'-'.$getcom->phone_no;
              
            }else{
                $data['comunication'] = 'N/A';
            }
            //get comunication 
            
            //get bagian
            $sqlbagian = $this->db->query("select * from human_pa_md_emp_employment where personnel_id = '$personnel_id' order by end_date desc");
            $availbagian = $sqlbagian->num_rows();
            $getbagian = $sqlbagian->row();
            if($availbagian > 0){
                $data['bagian'] = $getbagian->job_name;
              
            }else{
                $data['bagian'] = 'N/A';
            }
            //get bagian 
            
            
            //dataunit
            $sqlunit = $this->db->query("select a.*,c.nama_jabatan as namajabatan,d.nm_unit as namaunit,case when b.tipe = 'D' then 'Darat' else 'Laut' end as statuswilayah from human_pa_md_emp_assignment a 
                        left join lit_tab_posisi b on b.lit_code_position = a.lit_code_position
                        left join lit_tab_jabatan c on c.id = b.id_jabatan
                        left join lit_tab_unit d on d.kode_unit = b.code_core_orm
                        where a.personnel_id = '$personnel_id' order by a.end_date desc LIMIT 1");
            $availdataunit = $sqlunit->num_rows();
            $getdataunit = $sqlunit->row();
            if($availdataunit > 0){
                $data['namaunit'] = $getdataunit->namaunit;
                $data['namajabatan'] = $getdataunit->namajabatan;
                $data['namawilayah'] =$getdataunit->statuswilayah;
            }else{
                $data['namaunit'] = 'N/A';
                $data['namajabatan'] = 'N/A';
                $data['namawilayah'] = 'N/A';
            }
            //dataunit
            
             //get penugasan
            $sqlassign = $this->db->query("select a.*,b.nama_jabatan as namajabatan from human_pa_md_emp_assignment a left join lit_tab_jabatan b on b.id = a.jabatan where a.personnel_id = '$personnel_id' ORDER BY end_date desc LIMIT 1");
            $availassign = $sqlassign->num_rows();
            $getassign = $sqlassign->row();
            if($availassign > 0){
                $data['sk'] = $getassign->legal_letter_no;
                $data['jabatan'] = $getassign->namajabatan;
              
            }else{
                $data['sk'] = 'N/A';
                $data['jabatan'] = 'N/A';
            }
            //get penugasan 
            
            //loop penugasan
            /*
            $data['penugasan'] = $this->db->query("select a.*,c.nama_jabatan,d.nm_unit,date_format(a.legal_date,'%d-%m-%Y') as tanggalsk from human_pa_md_emp_assignment_additional a 
left join lit_tab_posisi b on b.lit_code_position = a.lit_code_position
left join lit_tab_jabatan c on c.id = b.id_jabatan
left join lit_tab_unit d on d.kode_unit = b.code_core_orm
where a.personnel_id = '$personnel_id'");
             
             */
            
            $data['penugasan'] = $this->db->query("select a.*,c.nama_jabatan,d.nm_unit,date_format(a.legal_date,'%d-%m-%Y') as tanggalsk from human_pa_md_emp_assignment_additional a 
left join lit_tab_posisi b on b.lit_code_position = a.lit_code_position
left join lit_tab_jabatan c on c.id = b.id_jabatan
left join lit_tab_unit d on d.kode_unit = b.code_core_orm
 
where a.personnel_id = '$personnel_id' GROUP BY a.start_date");
            //loop penugasan
            
            //loop jabatan
            /*
 $data['rjabatan'] = $this->db->query("select a.*,c.nama_jabatan,d.nm_unit,date_format(a.legal_date,'%d-%m-%Y') as tanggalsk from human_pa_md_emp_assignment a 
left join lit_tab_posisi b on b.lit_code_position = a.lit_code_position
left join lit_tab_jabatan c on c.id = b.id_jabatan
left join lit_tab_unit d on d.kode_unit = b.code_core_orm
where a.personnel_id = '$personnel_id'");
                      
            */
            $data['rjabatan'] = $this->db->query("select a.*,c.nama_jabatan,d.nm_unit,date_format(a.legal_date,'%d-%m-%Y') as tanggalsk from human_pa_md_emp_assignment a 
left join lit_tab_posisi b on b.lit_code_position = a.lit_code_position
left join lit_tab_jabatan c on c.id = b.id_jabatan
left join lit_tab_unit d on d.kode_unit = b.code_core_orm
 
where a.personnel_id = '$personnel_id'");
            //loop jabatan
            
            //$data['rjabatan'] = $this->db->query("select a.*,date_format(legal_date,'%d-%m-%Y') as tanggalsk,b.nama_jabatan as jabatan,c.nm_unit as unit from human_pa_md_emp_assignment a left join lit_tab_jabatan b on b.id = a.jabatan left join lit_tab_unit c on c.kode_unit = a.unit  where personnel_id = '$personnel_id'");
            
            $data['datakeluarga'] = $this->db->query("select a.*, date_format(birth_date,'%d-%m-%Y') as tgllahir, b.name as hubungan from human_pa_md_emp_family a left join human_cust_personnel_family_type b on b.family_type = a.family_type  where a.personnel_id = '$personnel_id'");
            $this->load->library("pdf");
            //// set default header data
            // remove default header/footer
            
            $data['pendidikan'] = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggallulus,b.name as tingkat from human_pa_md_emp_education a left join human_cust_personnel_education_level b on b.education_level = a.education_level where a.personnel_id = '$personnel_id'");
            $data['training'] = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggallulus,b.name as tingkat from human_pa_md_emp_training a left join human_cust_personnel_training_category b on b.training_category = a.training_category where a.personnel_id = '$personnel_id' and b.training_category = '02'");
            $data['trainingother'] = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggallulus,b.name as tingkat from human_pa_md_emp_training a left join human_cust_personnel_training_category b on b.training_category = a.training_category where a.personnel_id = '$personnel_id' and b.training_category = '01'");
           
            
            $data['penghargaan'] = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggalpenghargaan,b.name as jenispenghargaan from human_pa_md_emp_recognition a left join human_cust_personnel_recognition_type b on b.recognition_type = a.recognition_type where a.personnel_id = '$personnel_id'");
            
            $data['hukuman'] = $this->db->query("select a.*,date_format(a.start_date,'%d-%m-%Y') as tanggalhukuman,b.name as jenishukuman from human_pa_md_emp_sanction a left join human_cust_personnel_sanction_type b on b.sanction_type = a.sanction_type where a.personnel_id = '$personnel_id'");
           
            
            $data['fasilitas'] = $this->db->query("select a.*,b.name as jenisfasilitas from human_pa_md_emp_facility a left join human_cust_personnel_facility_type b on b.facility_type = a.facility_type where a.personnel_id = '$personnel_id'");
          
            $data['endorsement'] = $this->db->query("select *,date_format(start_date,'%d-%m-%Y') as tanggalendor from human_pa_md_emp_endorsment  where personnel_id = '$personnel_id'");
            
            $data['mcu'] = $this->db->query("select a.*,date_format(start_date,'%d-%m-%Y') as tanggalmcu,b.name as hasil from human_pa_md_emp_mcu a left join human_cust_personnel_mcu_checked_result b on b.checked_result = a.checked_result where a.personnel_id = '$personnel_id'");
            
            $data['bpelaut'] = $this->db->query("select a.*,date_format(start_date,'%d-%m-%Y') as tglbpelaut,b.name as negara from human_pa_md_emp_spec_seaman a left join core_cust_country b on b.country = a.country where a.personnel_id = '$personnel_id'");
            
            $data['bahasa'] = $this->db->query("select a.*,b.name as tipebahasa,c.name as hasiloraltest,d.name as hasilwrittentest from human_pa_md_emp_skill_language a
left join core_cust_language b on b.language = a.`language`
left join human_cust_personnel_learning_grade c on c.learning_grade = a.oral_grade
left join human_cust_personnel_learning_grade d on d.learning_grade = a.written_grade
where a.personnel_id = '$personnel_id'");
                    
            $data['rpekerjaan'] = $this->db->query("select *, date_format(start_date,'%d-%m-%Y') as tglmulai,date_format(end_date,'%d-%m-%Y') as tglakhir from human_pa_md_emp_employment where personnel_id = '$personnel_id'");
            
            $this->pdf->setPrintHeader(false);
            $this->pdf->setPrintFooter(true,'aku','kau');
            $this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
            $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            // set auto page breaks
            $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);    
            // add a page
            $this->pdf->AddPage("P","A4");
             // set font
            $this->pdf->SetFont("helvetica", "", 9); 
            $html = $this->load->view('report_cv/report_cv',$data,true);

            $this->pdf->writeHTML($html, true, false, true, false, "");
            $this->pdf->Output("Employee Information.pdf", "I");    
             
           
        }
	 
}
