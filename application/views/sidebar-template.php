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
                                    
					<li <?php if($location == 'dashboard') { echo 'class="active"'; }  ?> ><a href="<?php echo base_url('dashboard');?>"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
					<li><a href="#"><span>Master</span> <i class="icon-profile"></i></a>
					<ul>
							<li <?php if($location == 'jabatan') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('jabatan');?>">Jabatan</a></li>
							<li <?php if($location == 'posisi') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('posisi');?>">Posisi</a></li>
							<li <?php if($location == 'user') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('user');?>">Manajemen User</a></li>
					</ul>
					</li>
					<li <?php if($location == 'orm') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('orm');?>"><span>Organization Management</span> <i class="icon-tree2"></i></a>
					<li <?php if($location == 'pegawai') { echo 'class="active"'; }  ?>><a href="#"><span>Personal Administration</span> <i class="icon-clipboard"></i></a>
					<ul>
						<li <?php if($location == 'pegawai') { echo 'class="active"'; }  ?>><a href="<?php echo base_url('pegawai');?>"><span>Employee Management</span></i></a></li>
						
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