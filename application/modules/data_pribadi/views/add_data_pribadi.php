<?php $this->load->view('header-template');?>

 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Data Pribadi</h3>
				</div>
			</div>
		 
        <?php 

        date_default_timezone_set("Asia/Jakarta");
  
        foreach ($data_employee->result() as $rowdata) {
          $name_first = $rowdata->name_first;
        }
        ?>
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('data_pribadi/pro_add_data_pribadi_selected')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-info">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Pribadi</h6></div>
	                <div class="panel-body">
				
				</div>
	               <legend>
				<div class="form-actions text-left">
				<button type="submit" class="btn btn-primary"> <span data-icon="&#xe08d;"> </span> Simpan</button>
                        </div>
				</legend>
                

<div class="panel panel-tab">
	<div class="panel-heading"><h6 class="panel-title">  Key Data</h6></div>				
		<table class="table table-striped">       
      			<tr>
		        <td width="200"><small>Periode</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" value="<?php echo date('d-m-Y');?>" name="start_date" class="datepicker form-control" placeholder="Start Date"> </td>
		        <td width="200"><input type="text" value="<?php echo $date_end;?>"  name="end_date" class="datepicker form-control" placeholder="End Date"></td>
		        <td width="200"><select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih--</option>
                        <option value="1">Release</option>
                        <option value="0">Plan</option>
                        </select></td>
		      </tr>
		</table>

	<div class="panel-heading"><h6 class="panel-title"> Personal Data</h6></div>				
		<table class="table table-striped">     
		      <tr>
		        <td width="200"><small>Nama</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="name_first" value="<?php echo $name_first;?>" class="form-control" placeholder="Nama Depan"> </td>
		        <td width="200"><input type="text" name="name_mid" class="form-control" placeholder="Nama Tengah"></td>
		        <td width="200"><input type="text" name="name_last" class="form-control" placeholder="Nama Belakang"></td>
		      </tr>
		     <tr>
		        <td width="200"><small></small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="name_full" class="form-control" placeholder="Nama Lengkap"> </td>
		        <td width="200"><input type="text" name="name_nick" class="form-control" placeholder="Nama Panggilan"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Gelar</small></td>
		        <td width="10">:</td>
		        <td width="200"><select class="form-control" name="prefix" placeholder="Gelar Depan">
								 <option value="">Pilih</option>
                               		 <?php 
                                   		foreach($opt_prefix->result() as $rowprefix){
                                     	echo "<option value=".$rowprefix->prefix."> ".$rowprefix->name."</option>";
                                        }
                                      ?> 
                                </select></td>
		        <td width="200"><input type="text" name="prefix_other" class="form-control" placeholder="Gelar Lainnya"></td>
		        <td width="200"></td>
		      </tr>
		      <tr>
		        <td width="200"><small></small></td>
		        <td width="10">:</td>
		        <td width="200"><select class="form-control" name="suffix" placeholder="Gelar Belakang">
	                              	<option value="">--Pilih--</option>
	                                	<?php 
	          		                    	foreach($opt_suffix->result() as $rowsuffix){
	                                        echo "<option value=".$rowsuffix->suffix."> ".$rowsuffix->name."</option>";
	                                        }
	                                   	?> 
	                            </select></td>
		        <td width="200"><input type="text" name="suffix_other" class="form-control" placeholder="Gelar Lainnya"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Jenis Kelamin</small></td>
		        <td width="10">:</td>
		        <td width="200">
		        	<input type="radio" name="gender" value="1" checked="checked"><small>Pria</small>
		        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        	<input type="radio" name="gender" value="2"><small>Wanita</small>
		        </td>
		        <td width="200"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Tempat/Tanggal Lahir</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="birth_place" class="form-control" placeholder="Tempat Lahir"></td>
		        <td width="200"><input type="text" value="<?php echo date('d-m-Y');?>" name="birth_date" class="datepicker form-control" placeholder="Tanggal Lahir"> </td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Jenis Kelamin</small></td>
		        <td width="10">:</td>
		        <td width="200">
		        	<select class="form-control" name="nationality">
                            <option value="">--Pilih--</option>
                            <option value="WNI" selected="selected">WNI</option> 
                            <option value="WNA">WNA</option> 
                    </select>
		        </td>
		        <td width="200"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Suku</small></td>
		        <td width="10">:</td>
		        <td width="200"><select class="form-control" name="ethnic">
                                                <option value="">--Pilih--</option>
                                                   <?php 
                                                    	foreach($opt_ethnic->result() as $rowethnic){
                                                        echo "<option value=".$rowethnic->ethnic."> ".$rowethnic->name."</option>";
                                                        }
                                                    ?> 
                                            </select></td>
		        <td width="200"><input type="text" name="ethnic_other" class="form-control" placeholder="Lainnya"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Agama</small></td>
		        <td width="10">:</td>
		        <td width="200">
		        	<select class="form-control input-sm" name="religion">
                       <option value="">--Pilih--</option>
                            <?php 
                                foreach($opt_religion->result() as $rowreligion){
                                echo "<option value=".$rowreligion->religion."> ".$rowreligion->name."</option>";
                                }
                            ?> 
                    </select>				
		        </td>
		        <td width="200"></td>
		        <td width="200"></td>
		      </tr>

		       <tr>
		        <td width="200"><small>Status Pernikahan</small></td>
		        <td width="10">:</td>
		       <td width="200"><select class="form-control input-sm" name="marital_status" style="width:100%;">
                                                <option value="">--Pilih--</option>
                                                    <?php 
                                                     foreach($opt_marital_status->result() as $rowmarstatus){
                                                      echo "<option value=".$rowmarstatus->marital_status."> ".$rowmarstatus->name."</option>";
                                                        }
                                                    ?> 
                                                </select></td>
		        <td width="200"><input type="text" name="status_since" class="datepicker form-control" placeholder="Sejak"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Jumlah Anak</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="no_of_children" class="form-control" placeholder="Jumlah Anak"></td>
		        <td width="200"></td>
		        <td width="200"></td>
		      </tr>

		</table>
		</div>
		</div>





