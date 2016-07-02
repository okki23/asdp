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

 
 
  
 
<script>
$(document).ready(function(){
   		$("#notif").delay(1000).fadeIn();
   		$("#notif").delay(1000).fadeOut();

});
</script>


 <script type="text/javascript">
        $(document).ready(function () {
            var url = "<?php echo base_url('data_pribadi/get_all_data_pribadi_json');?>";
            // prepare the data
            var source =
            {
                dataType: "json",
                dataFields: [
                    { name: 'personnel_id', type: 'string' },
                    { name: 'name_full', type: 'string' },
                    { name: 'start_date', type: 'string' },
                    { name: 'opsiupdate', type: 'string' }
                   
                ],
                id: 'id',
                url: url
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dataTable").jqxDataTable(
            {
                width: 1100,
                pageable: true,
                altRows: true,
                pagerButtonsCount: 10,
                source: dataAdapter,
                filterable: true,
  				filterMode: 'advanced',
                columnsResize: true,
                columns: [
                  { text: 'Personnel ID', dataField: 'personnel_id', cellsAlign: 'center', align: 'center', width: 200 },
                  { text: 'Full Name', dataField: 'name_full', cellsAlign: 'center', align: 'center', width: 670 },
                  { text: 'Tanggal Masuk', dataField: 'start_date', cellsAlign: 'center', align: 'center', width:150 },
                  { text: 'Opsi', dataField: 'opsiupdate',cellsAlign: 'center', align: 'center', width: 80 }
                  
               
              ], 
            });
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
					<h3>Pemdidikan</h3>
				</div>

			</div>
		 
		 
				<div class="row">
				 
				    	 
				    	<h3 align="center" class="alert alert-danger" id="notif"><?php echo $this->session->flashdata('pesan');?> </h3>
				    	 
	 
		<!--
        id
        personnel_id
        sekolah_institut
		status_sekolah_institut
		kota
		tahun_mulai
		tahun_berakhir
		ijazah_doc_upload
		keterangan
		-->
            

        	<!-- Form components -->
    		<form class="form-horizontal" role="form" action="<?php echo base_url('data_pribadi/data_pribadi_pendidikan_pro_add');?>" method="POST" enctype="multipart/form-data" >

    		 
				<!-- Basic inputs -->
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Form Tambah Pendidikan</h6></div>
	                <div class="panel-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Personnel ID: </label>
							<div class="col-sm-10">
								<input type="text" name="personnel_id" class="form-control" value="<?php echo $personnel_id;?>">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Sekolah / Institusi: </label>
							<div class="col-sm-10">
									<input type="text" name="sekolah_institut" class="form-control" placeholder="Nama Sekolah / Institusi" value="">
							</div>
						</div>

						 
						<div class="form-group">
							<label class="col-sm-2 control-label">Status Sekolah / Institusi: </label>
							<div class="col-sm-10">
								<select name="status_sekolah_institut" class="form-control">
										<option value="1"> Negeri </option>
										<option value="2"> Swasta </option>
								</select>
							</div>
						</div>
						

						<div class="form-group">
							<label class="col-sm-2 control-label">Kota: </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama" name="kota">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tahun Mulai: </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Tahun Mulai" name="tahun_mulai">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Tahun Selesai: </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Tahun Selesai" name="tahun_berakhir">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Ijazah / Sertifikat Upload : </label>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="ijazah_doc_upload">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan : </label>
							<div class="col-sm-10">
								<select name="status_sekolah_institut" class="form-control">
											<option value="1"> Lulus </option>
											<option value="2"> Tidak Lulus </option>
								</select>
							</div>
						</div>						 

                        <div class="form-actions text-right">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
				    </div>
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