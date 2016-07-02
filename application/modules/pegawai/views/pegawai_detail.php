<?php $this->load->view('header-template');?> 

<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template-personal',$location);?>
	<div class="page-content">
	<div class="page-header">
				<div class="page-title">
					<h3>Profile Pegawai</h3>
				</div>
			</div>

<div class="panel panel-default">
				                <div class="panel-heading"><h6 class="panel-title"><i class="icon-droplet2"></i> Panel Informasi</h6></div>
				                <div class="panel-body">
								<div class="tabbable">
									<ul class="nav nav-pills nav-justified">
										<li class="active"><a href="#panel-pill1" data-toggle="tab"><i class="icon-accessibility"></i> Identitas Personal</a></li>
										<li><a href="#panel-pill2" data-toggle="tab"><i class="icon-briefcase"></i> Riwayat Personal 1</a></li>
										<li><a href="#panel-pill3" data-toggle="tab"><i class="icon-user4"></i> Riwayat Personal 2</a></li>
										<li><a href="#panel-pill4" data-toggle="tab"><i class="icon-file2"></i> Dokumen</a></li>
										<!--<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sun2"></i> Dropdown <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#panel-pill3" tabindex="-1" data-toggle="tab">@fat</a></li>
												<li><a href="#panel-pill4" tabindex="-1" data-toggle="tab">@mdo</a></li>
											</ul>
										</li>-->
									</ul>

									<div class="tab-content pill-content">
										<div class="tab-pane fade in active" id="panel-pill1">
											<!-- Striped and bordered table -->
											<ul class="info-blocks">
				<li class="bg-info">
					<div class="top-info">
						<a href="<?php echo base_url('data_pribadi');?>">Personal</a>
						<small>Data Personal</small>
					</div>
					<a href="<?php echo base_url('data_pribadi');?>"><i class="icon-user4"></i></a>
					<span class="bottom-info bg-primary">Entry Data Personal</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="<?php echo base_url('alamat');?>">Alamat</a>
						<small>Data Alamat</small>
					</div>
					<a href="<?php echo base_url('alamat');?>"><i class="icon-home3"></i></a>
					<span class="bottom-info bg-info">Entry Data Alamat</span>
				</li>
				<li class="bg-success">
					<div class="top-info">
						<a href="<?php echo base_url('keluarga');?>">Keluarga</a>
						<small>Data Keluarga</small>
					</div>
					<a href="<?php echo base_url('keluarga');?>"><i class="icon-users"></i></a>
					<span class="bottom-info bg-primary">Entry Data Keluarga</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="<?php echo base_url('pendidikan');?>">Pendidikan</a>
						<small>Data Pendidikan</small>
					</div>
					<a href="<?php echo base_url('pendidikan');?>"><i class="icon-library"></i></a>
					<span class="bottom-info bg-danger">Entry Data Pendidikan</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="<?php echo base_url('identifikasi');?>">Identitas Pribadi</a>
						<small>Data Identitas Pribadi</small>
					</div>
					<a href="<?php echo base_url('identifikasi');?>"><i class="icon-profile"></i></a>
					<span class="bottom-info bg-primary">Entry Identitas Pribadi</span>
				</li>
			</ul>
			            <!-- /striped and bordered table -->
										</div>




										<div class="tab-pane fade" id="panel-pill2">
											
			 			<!-- Striped and bordered table -->
			 			<ul class="info-blocks">
			 					<li class="bg-success">
					<div class="top-info">
						<a href="<?php echo base_url('riwayat_pekerjaan');?>">Pekerjaan</a>
						<small>Data Pekerjaan</small>
					</div>
					<a href="<?php echo base_url('riwayat_pekerjaan');?>"><i class="icon-history"></i></a>
					<span class="bottom-info bg-primary">Entry Data Pekerjaan</span>
				</li>
				<li class="bg-info">
					<div class="top-info">
						<a href="<?php echo base_url('jabatan');?>">Jabatan</a>
						<small>Data Jabatan</small>
					</div>
					<a href="<?php echo base_url('jabatan');?>"><i class="icon-bookmarks"></i></a>
					<span class="bottom-info bg-primary">Entry Data Jabatan</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="<?php echo base_url('penugasan');?>">Penugasan</a>
						<small>Data Penugasan</small>
					</div>
					<a href="<?php echo base_url('penugasan');?>"><i class="icon-archive"></i></a>
					<span class="bottom-info bg-info">Entry Data Penugasan</span>
				</li>
				
				<li class="bg-primary">
					<div class="top-info">
						<a href="<?php echo base_url('penghargaan');?>">Penghargaan</a>
						<small>Data Penghargaan</small>
					</div>
					<a href="<?php echo base_url('penghargaan');?>"><i class="icon-crown"></i></a>
					<span class="bottom-info bg-danger">Entry Data Penghargaan</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="<?php echo base_url('hukuman');?>">Hukuman</a>
						<small>Data Hukuman</small>
					</div>
					<a href="<?php echo base_url('hukuman');?>"><i class="icon-notification"></i></a>
					<span class="bottom-info bg-primary">Entry Hukuman</span>
				</li>
				
				</ul>
			            <!-- /striped and bordered table -->
										</div>





			<div class="tab-pane fade" id="panel-pill3">
				<!-- Striped and bordered table -->
				<ul class="info-blocks">
				<li class="bg-primary">
					<div class="top-info">
						<a href="<?php echo base_url('pelatihan');?>">Pelatihan</a>
						<small>Data Pelatihan</small>
					</div>
					<a href="<?php echo base_url('pelatihan');?>"><i class="icon-certificate"></i></a>
					<span class="bottom-info bg-info">Entry Data Pelatihan</span>
				</li>
				<li class="bg-info">
					<div class="top-info">
						<a href="<?php echo base_url('data_pribadi');?>">Komunikasi</a>
						<small>Data Komunikasi</small>
					</div>
					<a href="<?php echo base_url('data_pribadi');?>"><i class="icon-bubbles6"></i></a>
					<span class="bottom-info bg-primary">Entry Data Komunikasi</span>
				</li>
				<li class="bg-success">
					<div class="top-info">
						<a href="<?php echo base_url('endorsement');?>">Endorsement</a>
						<small>Data Endorsement</small>
					</div>
					<a href="<?php echo base_url('endorsement');?>"><i class="icon-thumbs-up3"></i></a>
					<span class="bottom-info bg-primary">Entry Data Endorsement</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="<?php echo base_url('fasilitas');?>">Fasilitas Dinas</a>
						<small>Data Fasilitas Dinas</small>
					</div>
					<a href="<?php echo base_url('fasilitas');?>"><i class="icon-office"></i></a>
					<span class="bottom-info bg-danger">Entry Data Fasilitas Dinas</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="<?php echo base_url('mcu');?>">Medical Check-up</a>
						<small>Data Medical Check-up</small>
					</div>
					<a href="<?php echo base_url('mcu');?>"><i class="icon-book2"></i></a>
					<span class="bottom-info bg-primary">Entry Medical Check-up</span>
				</li>

											</ul>
											
			            <!-- /striped and bordered table -->
										</div>



			<div class="tab-pane fade" id="panel-pill4">
				<!-- Striped and bordered table -->
					<ul class="info-blocks">
					<li class="bg-info">
					<div class="top-info">
						<a href="<?php echo base_url('buku_pelaut');?>">Buku Laut</a>
						<small>Data Buku Laut</small>
					</div>
					<a href="<?php echo base_url('buku_pelaut');?>"><i class="icon-notebook"></i></a>
					<span class="bottom-info bg-primary">Entry Data Buku Laut</span>
				</li>
				<li class="bg-danger">
					<div class="top-info">
						<a href="<?php echo base_url('doc_pribadi');?>">Dokumen Pribadi</a>
						<small>Data Dokumen Pribadi</small>
					</div>
					<a href="<?php echo base_url('doc_pribadi');?>"><i class="icon-file5"></i></a>
					<span class="bottom-info bg-primary">Entry Dokumen Pribadi</span>
				</li>
			</ul>

											</ul>
											
			            <!-- /striped and bordered table -->
										</div>

	        <!-- /tasks table -->
										</div>							

									</div>
								</div>
								</div>
				            </div>
				           
