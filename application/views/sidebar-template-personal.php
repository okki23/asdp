<div class="sidebar">
			<div class="sidebar-content">
								<!-- User dropdown -->
								
				<div class="user-menu dropdown">
					<a href="<?php echo base_url('dashboard');?>" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php if(!empty($litfoto)){
						echo base_url($litfoto);
						}else{
						echo base_url('assets/images/noimage.png');	
						}
						?>">
						<div class="user-info">
							<?php echo $namapegawai;?> <span><?php echo $personnel_id;?></span>
						</div>
					</a>
					 
					<div class="popup dropdown-menu dropdown-menu-right">
					    <div class="thumbnail">
					    	<div class="thumb">
								<img src="<?php if(!empty($litfoto)){
						echo base_url($litfoto);
						}else{
						echo base_url('assets/images/noimage.png');	
						}
						?>">
								<div class="thumb-options">
									<span>
										<a href="<?php echo base_url('pegawai/pegawai_importphoto/');?>" class="btn btn-icon btn-success"><i class="icon-upload3"></i></a>
										<!--<a href="<?php //echo base_url('pegawai/pegawai_importphoto/'.$personnel_id);?>" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>-->
									</span>
								</div>
						    </div>
					    
					    	<div class="caption text-center">
					    		<h6><?php echo $namapegawai;?> <small><?php echo $personnel_id;?></small></h6>
					    	</div>
				    	</div>

				    	<ul class="list-group">
							<li class="list-group-item"> Manager SDM </li>
							<li class="list-group-item"> Divisi SDM </li>
							<li class="list-group-item"> Usia <span class="label label-success"><?php echo $usia;?></span></li>
							<li class="list-group-item"> Status <h5 class="pull-right text-danger">Active</h5></li>
						</ul>
					</div>
				</div>
				 
				<ul class="navigation">				
					
					<li ><a href="<?php echo base_url('dashboard');?>"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
                                    <li class="active"><a href="#"><span>Employee Management</span> <i class="icon-clipboard"></i></a>
						<ul>
                                                       
							<li <?php if($location == 'data_pribadi') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('data_pribadi/data_pribadi_detail/'.$personnel_id);?>">Data Pribadi</a></li>
							<li <?php if($location == 'alamat') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('alamat/alamat_detail/'.$personnel_id);?>">Alamat</a></li>
							<li <?php if($location == 'keluarga') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('keluarga/keluarga_detail/'.$personnel_id);?>">Keluarga</a></li>
							<li <?php if($location == 'pendidikan') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('pendidikan/pendidikan_detail/'.$personnel_id);?>">Pendidikan</a></li>
							<li <?php if($location == 'identitas_pribadi') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('identitas_pribadi/identitas_pribadi_detail/'.$personnel_id);?>">Identitas Pribadi</a></li>						
							<li <?php if($location == 'riwayat_jabatan') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('riwayat_jabatan/riwayat_jabatan_detail/'.$personnel_id);?>">Jabatan</a></li>
							<li <?php if($location == 'penugasan') { echo 'class="active"'; }  ?>  > <a href="<?php echo base_url('penugasan/penugasan_detail/'.$personnel_id);?>">Penugasan</a></li>
							<li <?php if($location == 'riwayat_pekerjaan') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('riwayat_pekerjaan/riwayat_pekerjaan_detail/'.$personnel_id);?>">Riwayat Pekerjaan</a></li>
							<li <?php if($location == 'penghargaan') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('penghargaan/penghargaan_detail/'.$personnel_id);?>">Penghargaan</a></li>
							<li <?php if($location == 'hukuman') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('hukuman/hukuman_detail/'.$personnel_id);?>">Hukuman</a></li>			
							<li <?php if($location == 'komunikasi') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('komunikasi/komunikasi_detail/'.$personnel_id);?>">Komunikasi</a></li>
							<li <?php if($location == 'pelatihan') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('pelatihan/pelatihan_detail/'.$personnel_id);?>">Pelatihan</a></li>
							<li <?php if($location == 'fasilitas') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('fasilitas/fasilitas_detail/'.$personnel_id);?>">Fasilitas</a></li>
							<li <?php if($location == 'endorsement') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('endorsement/endorsement_detail/'.$personnel_id);?>">Endorsement</a></li>
							<li <?php if($location == 'mcu') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('mcu/mcu_detail/'.$personnel_id);?>">Medical Check-up</a></li>
							<li <?php if($location == 'buku_pelaut') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('buku_pelaut/buku_pelaut_detail/'.$personnel_id);?>">Buku Pelaut</a></li>
                                                        <li <?php if($location == 'doc_pribadi') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('doc_pribadi/doc_pribadi_detail/'.$personnel_id);?>">Dokumen Pribadi</a></li>
                                                        <li <?php if($location == 'kemampuan_bahasa') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('kemampuan_bahasa/kemampuan_bahasa_detail/'.$personnel_id);?>">Kemampuan Bahasa</a></li>
                                                        <li <?php if($location == 'report_cv') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('report_cv/report_cv_detail/'.$personnel_id);?>">Report CV</a></li>
					</ul>
					 
					
					</li>
					
					
					
				</ul>				
				 
				
			</div>
		</div>