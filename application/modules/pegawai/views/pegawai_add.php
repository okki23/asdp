<?php $this->load->view('header-template');?>

<script type="text/javascript">
	
    $(function(){
	$('.tanggalmasuk').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	 
    });
	</script>
 	<div class="page-container">
            <?php $this->load->view('sidebar-template',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Pegawai<small>Informasi Pegawai</small></h3>
				</div>
			</div>
		 
 
              
   	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('pegawai/pro_add_pegawai')?>">
           <input type="hidden" name="personnel_id" value="<?php echo $last_id;?>">
            <table class="table table-striped " > 
                     
		      <tr>
		        <td width="150" align="left">NIK</td>
		        <td width="10">:</td>
		        <td><input type="text" name="nik" placeholder="NIK" class="form-control" required ></td>
		      </tr>
		     
		      <tr>
		        <td width="150" align="left">Nama</td>
		        <td width="10">:</td>
		        <td><input type="text" name="nama" placeholder="Nama" class="form-control" required></td>
		      </tr>
		      
		      <tr>
		        <td>Tanggal Masuk</td>
		        <td width="10">:</td>
		        <td><input type="text" name="tanggal_masuk" class="tanggalmasuk form-control" placeholder="Tanggal Masuk"></td>
		      </tr>
		 </table>

		 <br/><br/>
      <div class="form-actions text-left">
        <button type="submit" class="btn btn-primary"> <span data-icon="&#xe08d;"> </span> Save</button>
        <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
      </div>

    </form>
  </div>
</body>

 
 






 