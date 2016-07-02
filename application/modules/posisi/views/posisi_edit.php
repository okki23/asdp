<?php $this->load->view('header-template');?>

 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Update Pegawai</h3>
				</div>
			</div>
		 
              <?php
              foreach($data_employee->result() as $row){
                  $personnel_id = $row->personnel_id;
                  $name_full = $row->name_full;
                  $tanggal_masuk = $row->tanggal_masuk;
              }
              ?>
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('posisi/pro_update_posisi')?>">
 



<table class="table table-striped " > 
      <tr>
        <td width="150" align="left">Kode Posisi</td>
        <td width="10">:</td>
        <td><input type="text" name="code_position" placeholder="Kode Posisi" class="form-control" required ></td>
      </tr>
     
      <tr>
        <td width="150" align="left">Jabatan</td>
        <td width="10">:</td>
        <td><input type="text" name="jabatan" placeholder="Jabatan" class="form-control" required></td>
      </tr>
      
      <tr>
        <td>Level</td>
        <td width="10">:</td>
        <td><input type="text" name="level" class="form-control" placeholder="Level"></td>
      </tr>
    
      <tr>
        <td>Status</td>
        <td width="10">:</td>
        <td><input type="text" name="status" class="form-control" placeholder="Level"></td>
      </tr>
    
      <tr>
        <td>Unit Kerja</td>
        <td width="10">:</td>
        <td>
            <select name="code_core_orm" class="form-control" required>
                <option value=''>Pilih</option>
            </select>
        </td>
      </tr>
      
      <tr>
        <td>Segmen Usaha</td>
        <td width="10">:</td>
        <td>
            <select name="code_segmentasi_usaha" class="form-control" required>
                <option value=''>Pilih</option>
            </select>
        </td>
      </tr>
     <tr>
        <td>Tipe</td>
        <td width="10">:</td>
        <td>
            <select name="tipe" class="form-control" required>
                <option value=''>Pilih</option>
                <option value='D'>Darat</option>
                <option value='L'>Laut</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>Nama Kapal</td>
        <td width="10">:</td>
        <td>
            <select name="code_core_orm_kapal" class="form-control" required>
                <option value=''>Pilih</option>
                <option value='D'>Darat</option>
                <option value='L'>Laut</option>
            </select>
        </td>
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