<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title><?php echo $judul;?></title>

<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/londinium-theme.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/icons.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/fontsext.css');?>" rel="stylesheet" type="text/css">
 
 
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/charts/sparkline.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uniform.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/select2.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/inputmask.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/autosize.js');?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/inputlimit.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/listbox.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/multiselect.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/validate.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/tags.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/switch.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uploader/plupload.full.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/uploader/plupload.queue.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/wysihtml5/wysihtml5.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/wysihtml5/toolbar.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/daterangepicker.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/fancybox.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/moment.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/jgrowl.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/datatables.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/colorpicker.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/fullcalendar.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/interface/timepicker.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/application.js');?>"></script>

<!--jqwidget-->

  <link rel="stylesheet" href="<?php echo base_url('assets/jqwidget/jqwidgets/styles/jqx.bootstrap.css');?>" type="text/css" />

  <link rel="stylesheet" href="<?php echo base_url('assets/jqwidget/jqwidgets/styles/jqx.base.css');?>" type="text/css" />

  <script type="text/javascript" src="<?php echo base_url('assets/jqwidget/jqwidgets/jqx-all.js');?>"></script>


  <script type="text/javascript" src="<?php echo base_url('assets/jqwidget/jqwidgets/jqxtabs.js');?>"></script>

  
 
<script>
$(document).ready(function(){
   		$("#notif").delay(1000).fadeIn();
   		$("#notif").delay(1000).fadeOut();

});
</script>

<!--manggil jqtabs-->
<script type="text/javascript">
        $(document).ready(function () {
            $('#jqxTabs').jqxTabs({ width: 1090});
            $('#leftButton').jqxRadioButton({ height: 25, width: 100});
            $('#rightButton').jqxRadioButton({ height: 25, width: 100, checked: true});
            $('#jqxTabs').jqxTabs({ scrollPosition: 'both' });
             
        });
</script>
 

</head>


<body>

<div class="page-container">

	<!--awal bagian header-->

 
	<div class="navbar navbar-inverse " role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" style="margin-top:-4px;" href="index.php?action=showmenu"><img  src="images/logo.png" title="HRIS" alt="HRIS"></a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
					
			
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<!--<img src="http://placehold.it/300">-->
					<span><?php echo $this->session->userdata('username');?></span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="password.php"><i class="icon-key"></i> Change Password</a></li>
					<li><a href="<?php echo base_url('login/logout');?>"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
 

	<!--akhir bagian header-->
	 

	<!--awal bagian konten-->
 
 	<div class="page-container">

 
			<div class="sidebar">
			<div class="sidebar-content">
								<!-- User dropdown -->
				<div class="user-menu dropdown">
					<a href="<?php echo base_url('dashboard');?>" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/images/admin.png')?>">
						<div class="user-info">
							Pengelola Website <span>Administrator</span>
						</div>
					</a>
					
				</div>
				 
				<ul class="navigation">				
					<li   ><a href="<?php echo base_url('dashboard');?>"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
					<li><a href="#"><span>Master</span> <i class="icon-profile"></i></a>
					<ul>
							<li ><a href="<?php echo base_url('pegawai');?>">Pegawai</a></li>
							<li ><a href="<?php echo base_url('jabatan');?>">Jabatan</a></li>
							<li ><a href="<?php echo base_url('unit_kerja');?>">Unit Kerja</a></li>
							<li ><a href="user.php">Manajemen User</a></li>
					</ul>
					</li>
					<li class="active"><a href="#"><span>Personal Administration</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li ><a href="<?php echo base_url('penugasan');?>">Penugasan</a></li>
							<li ><a href="<?php echo base_url('penugasan_sementara');?>">Penugasan Sementara</a></li>
							<li class="active"><a href="<?php echo base_url('data_pribadi');?>">Data Pribadi</a></li>
							<li ><a href="<?php echo base_url('keluarga');?>">Keluarga</a></li>
							<li ><a href="<?php echo base_url('alamat');?>">Alamat</a></li>
							<li ><a href="<?php echo base_url('komunikasi');?>">Komunikasi</a></li>
							<li ><a href="<?php echo base_url('identifikasi');?>">Identifikasi Pribadi</a></li>
							<li ><a href="<?php echo base_url('pendidikan');?>">Pendidikan</a></li>
							<li ><a href="<?php echo base_url('pelatihan');?>">Pelatihan</a></li>
							<li ><a href="<?php echo base_url('hukuman');?>">Hukuman</a></li>
							<li ><a href="<?php echo base_url('fasilitas');?>">Fasilitas</a></li>
							<li ><a href="<?php echo base_url('kemampuan_bahasa');?>">Kemampuan Bahasa</a></li>
							<li ><a href="<?php echo base_url('buku_pelaut');?>">Buku Pelaut</a></li>
							<li ><a href="<?php echo base_url('endorsement');?>">Endorsement</a></li>
							<li ><a href="<?php echo base_url('mcu');?>">Medical Check-up</a></li>
							<li ><a href="<?php echo base_url('riwayat_pekerjaan');?>">Riwayat Pekerjaan</a></li>
							<li ><a href="<?php echo base_url('foto');?>">Foto</a></li>
							<li ><a href="<?php echo base_url('doc_pribadi');?>">Dokumen Pribadi</a></li>
							
					</ul>
					</li>
					<li><a href="#"><span>Key Performance Indicator (KPI)</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li ><a href="<?php echo base_url('setting_target');?>">Setting Target KPI</a></li>
							<li ><a href="<?php echo base_url('input_realisasi');?>">Input Realisasi KPI</a></li>
							<li ><a href="<?php echo base_url('monitoring_kpi');?>">Monitoring KPI</a></li>
							<li ><a href="<?php echo base_url('coach_and_consel');?>">Coaching and Counselling</a></li>
							<li ><a href="<?php echo base_url('nilai_kpi');?>">Nilai KPI</a></li>
					</ul>
					</li>
					<li><a href="#"><span>Kompetensi</span> <i class="icon-clipboard"></i></a>
					<ul>
							<li ><a href="<?php echo base_url('skj');?>">Standar Kompetensi Jabatan</a></li>
							<li ><a href="<?php echo base_url('ukurkomp_individu');?>">Pengukuran Kompetensi Individu</a></li>
							<li ><a href="<?php echo base_url('hasil_pengukuran');?>">Hasil Pengukuran</a></li>
							<li ><a href="<?php echo base_url('gap_kompetensi');?>">Gap Kompetensi</a></li>
							<li ><a href="<?php echo base_url('kebutuhan_diklat_komp');?>">Kebutuhan Diklat Kompetensi</a></li>
					</ul>
					</li>
					<li><a href="<?php echo base_url('login/logout');?>"><span>Logout</span> <i class="icon-exit"></i></a></li>
				</ul>				
				 
				
			</div>
		</div>
	 
	 

 	 	<div class="page-content">


		 
			<div class="page-header">
				<div class="page-title">
					<h3>Data Pribadi</h3>
				</div>

			</div>

					 <?php 
 
					     foreach ($data_employee->result() as $row) {
					     	 	$instance = $row->instance;
					     	 	$personnel_id = $row->personnel_id;
					     	 	$start_date = $row->start_date;
					     	 	$name_full = $row->name_full;
					     	 	$name_first = $row->name_first;
					     	 	$name_mid = $row->name_mid;
								$name_last = $row->name_last;
								$name_nick = $row->name_nick;
								$title = $row->title;										 
								$tanggalmasukinput = $row->tanggalmasukinput;
								$tanggalakhirinput = $row->tanggalakhirinput;
								$tanggallahirinput = $row->tanggallahirinput;
					     	 	$end_date = $row->end_date;
					     	 	$status_process = $row->status_process;
					     	 	$gender = $row->gender;
					     	 	$genderstatus = $row->genderstatus;
					     	 	$birth_date = $row->birth_date;
					     	 	$birth_place = $row->birth_place;
					     	 	$nationality = $row->nationality;
								$ethnic = $row->ethnic;
								$ethnic_other = $row->ethnic_other;
								$religion = $row->religion;
								$marital_status = $row->marital_status;
								$status_since = $row->status_since;
								$no_of_children = $row->no_of_children;
					     	 }
					     ?>
		 
				<div class="row">
				 
				    	 
				    	<h3 lign="center" class="alert alert-danger" id="notif"><?php echo $this->session->flashdata('pesan');?> </h3>
				    	 
					<div class="col-lg-12">
					  
		            </div>

		          
			            <div class="panel panel-default">
			          	 
			          
			                <div class="panel-heading"><h6 class="panel-title"> Form Perubahan Data Pribadi </h6></div>
			                  
			                <form class="form-horizontal" role="form" action="<?php echo base_url('data_pribadi/data_pribadi_update_pro_selected');?>" method="POST">

			                <div class="table-responsive">
				                <table class="table table-striped table-bordered">
				                   
				                    <tbody>				                        
				                        
				                        <tr>
				                            <td style="width:10%">Personnel ID</td>
				                            <td style="width:3%">:</td>
				                            <td style="width:80%">
				                          	 	<input type="text" name="personnel_id" value="<?php echo $personnel_id; ?>"  class="form-control" readonly="readonly">
				                            </td>
				                            
				                        </tr>
				                        <tr>
				                            <td style="width:10%">Instance</td>
				                            <td style="width:3%">:</td>
				                            <td style="width:80%">
				                          	 	<input type="text" name="instance" value="<?php echo $instance; ?>"  class="form-control">
				                            </td>
				                            
				                        </tr>
				                        
				                        <tr>
				                            <td>Full Name</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="name_full" value="<?php echo $name_full; ?>" class="form-control" >
				                            </td>
				                           
				                        </tr>
				                        <tr>
				                            <td>Start Date</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="start_date" value="<?php echo $tanggalmasukinput; ?>"  class="form-control" >
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>End Date</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="end_date" class="datepicker form-control" placeholder="End Date" value="<?php echo $tanggallahirinput; ?>">
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Status Process</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="status_process" value="<?php echo $status_process; ?>"  class="form-control" placeholder="Status Process" >
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Name First</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="name_first" value="<?php echo $name_first; ?>"  class="form-control" placeholder="Name First">
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Name Mid</td>
				                            <td>:</td>
				                            <td>
				                            	 <input type="text" name="name_mid" value="<?php echo $name_mid; ?>" class="form-control" placeholder="Name Mid">
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Name Last</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="name_last" value="<?php echo $name_last; ?>"  class="form-control" placeholder="Name Last"> 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Name Nick</td>
				                            <td>:</td>
				                            <td> 
				                             	<input type="text" name="name_nick" value="<?php echo $name_nick; ?>"  class="form-control" placeholder="Name Nick"> 
				                             </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Title</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="title" value="<?php echo $title; ?>"  class="form-control" placeholder="Title"> 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Gender </td>
				                            <td>:</td>
				                            <td> 
				                           		<input type="radio" value="1" name="gender"	  <?php if($gender == 1){
				                           		  echo "checked=checked";
				                           		  }?> 
				                           		  > Male &nbsp;
				                            	<input type="radio" value="2" name="gender" 
				                            	  <?php if($gender == 2){ 
				                            	  echo "checked=checked";
				                            	  }?>
				                            	  > Female
				                          
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Birth Date</td>
				                            <td>:</td>
				                            <td> 
				                            	<input type="text" name="birth_date" class="datepicker form-control" placeholder="Birthdate" value="<?php echo $tanggallahirinput; ?>">
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Birth Place</td>
				                            <td>:</td>
				                            <td> 
				                            	<input type="text" name="birth_place" value="<?php echo $birth_place; ?>"  class="form-control" placeholder="Birth Place"> 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Nationality</td>
				                            <td>:</td>
				                            <td>
				                            	<input type="text" name="nationality" value="<?php echo $nationality; ?>"  class="form-control" placeholder="Nationality" >   
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Ethnic</td>
				                            <td>:</td>
				                            <td> 
				                            	<input type="text" name="ethnic" value="<?php echo $ethnic; ?>" class="form-control" placeholder="Ethnic"  >  
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Ethnic Other</td>
				                            <td>:</td>
				                            <td>
				                            	 <input type="text" name="ethnic_other" value="<?php echo $ethnic_other; ?>"  class="form-control" placeholder="Ethnic Other"  > 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Religion</td>
				                            <td>:</td>
				                            <td> 
				                            	<input type="text" name="religion" value="<?php echo $religion; ?>"  class="form-control" placeholder="Religion" > 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Marital Status</td>
				                            <td>:</td>
				                            <td>  
				                            	<input type="text" name="marital_status" value="<?php echo $marital_status; ?>"  class="form-control" placeholder="Marital Status" > 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>Status Since</td>
				                            <td>:</td>
				                            <td>  
				                           		 <input type="text" name="status_since" value="<?php echo $status_since; ?>"  class="form-control" placeholder="Status Since" > 
				                            </td>
				                             
				                        </tr>
				                        <tr>
				                            <td>No Of Children</td>
				                            <td>:</td>
				                            <td>  
				                            <input type="number" name="no_of_children" value="<?php echo $no_of_children; ?>"  class="form-control" placeholder="No Of Children"  > 
				                            </td>
				                             
				                        </tr>

				                        <tr>
				                        	<td colspan="3">     
							<button type="submit" class="btn btn-block btn-primary">Simpan Perubahan Data</button>
					  </td>
				                        </tr>
				                    </tbody>
				                </table>

			                </div>
			 
						</form>
				        

				       
					</div>
		 
			</div>
			
			

	<!--akhir bagian konten-->

	<!--awal bagian footer-->

    <div class="footer clearfix">
        <div class="pull-left">  <a href="http://langitinfotama.com">PT.Langit Infotama &copy; 2016 </a></div>
    	 
    </div>
  
	<!--akhir bagian footer-->
	

 
 		 
 </div>

</body>
</html>