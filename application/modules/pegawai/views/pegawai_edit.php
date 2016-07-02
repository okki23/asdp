<?php $this->load->view('header-template');?>

 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Update Pegawai<small>Informasi Pegawai</small></h3>
				</div>
			</div>
		 
              <?php
              foreach($data_employee->result() as $row){
                  $personnel_id = $row->personnel_id;
                  $name_full = $row->name_full;
                  $tanggal_masuk = $row->tanggal_masuk;
              }
              ?>
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('pegawai/pro_update_pegawai')?>">
		 <table class="table table-striped " > 
		      <tr>
		        <td width="150" align="left">NIK</td>
		        <td width="10">:</td>
		        <td><input type="text" name="nik" placeholder="NIK" class="form-control" value="<?php echo $personnel_id;?>" required readonly></td>
		      </tr>
		     
		      <tr>
		        <td width="150" align="left">Nama</td>
		        <td width="10">:</td>
		        <td><input type="text" name="nama" placeholder="Nama" class="form-control" value="<?php echo $name_full;?>"></td>
		      </tr>
		      
		      <tr>
		        <td>Tanggal Masuk</td>
		        <td width="10">:</td>
		        <td><input type="text" name="tanggal_masuk" class="datepicker form-control" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk;?>"></td>
		      </tr>
		 </table>

		 <br/><br/>
      <div class="form-actions text-left">
        <button type="submit" class="btn btn-primary"> <span data-icon="&#xe08d;"> </span> Update</button>
        <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
      </div>

    </form>
  </div>
</body>
 
						