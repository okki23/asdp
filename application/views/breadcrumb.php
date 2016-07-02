<?php 

	echo $check_bc = $this->uri->segment(2);
	
			if($check_bc = "dashboard"){
				$pilih1 = "class='active'";
				$pilih2 = "";
				$pilih3 = "";
				$pilih4 = "";
				$pilih5 = "";
				$pilih6 = "";
				$pilih7 = "";
			}elseif($check_bc = "pegawai"){
				$pilih1 = "";
				$pilih2 = "class='active'";
				$pilih3 = "";
				$pilih4 = "";
				$pilih5 = "";
				$pilih6 = "";
				$pilih7 = "";
			}

?>
<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li <?php echo $pilih1;?>><a href="<?php echo $pilih1;?>">Home</a></li>
					<li <?php echo $pilih2;?>>Employee Management</li>
					<li <?php echo $pilih3;?>>b</li>
					<li <?php echo $pilih4;?>>c</li>
					<li <?php echo $pilih5;?>>d</li>
					<li <?php echo $pilih6;?>>e</li>
					<li <?php echo $pilih7;?>>f</li>
				</ul>
				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>
			</div>