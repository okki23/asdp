<?php $this->load->view('header-template');?>

 <script type="text/javascript">
	
    $(function(){
	$('.stardate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    $('.datebirth').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.status_since').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    });
	</script>
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Update Data Pribadi</h3>
				</div>
			</div>
		 
                <?php 
            date_default_timezone_set("Asia/Jakarta");

            foreach ($data_employee->result() as $rowdata) {
              $personnel_id = $rowdata->personnel_id;
              $start_date = $rowdata->tanggalmasuknya;
              $date_end = $rowdata->tanggalberakhir;
              $status_process = $rowdata->status_process;
              $name_full = $rowdata->name_full;
              $name_first = $rowdata->name_first;
              $name_mid = $rowdata->name_mid;
              $name_last = $rowdata->name_last;
              $name_nick = $rowdata->name_nick; 
              $prefix = $rowdata->prefix; 
              $prefix_other = $rowdata->prefix_other; 
              $suffix = $rowdata->suffix; 
              $suffix_other = $rowdata->suffix_other; 
              $gender =  $rowdata->gender; 
              $birth_date =  $rowdata->tanggallahir; 
              $birth_place = $rowdata->birth_place; 
              $nationality = $rowdata->nationality; 
              $ethnic = $rowdata->ethnic; 
              $ethnic_other = $rowdata->ethnic_other; 
              $religion =  $rowdata->religion; 
              $marital_status = $rowdata->marital_status; 
              $status_since = $rowdata->status_since; 
              $no_of_children = $rowdata->no_of_children; 
            }
            ?>
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('data_pribadi/pro_update_data_pribadi_selected')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		    		        <div class="panel panel-info">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data Pribadi</h6></div>
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
		        <td width="200"><input type="text" value="<?php echo $start_date;?>" name="start_date" class="stardate form-control" data-mask="99-99-9999" placeholder="dd-mm-yyyy"> </td>
		        <td width="200"><input type="text" value="<?php echo $date_end;?>"  name="end_date" class="enddate form-control" data-mask="99-99-9999" placeholder="dd-mm-yyyy"></td>
		        <td width="200"><select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih--</option>
                            <option value="1" <?php if($status_process == '1'){ echo "selected=selected"; }?> >Release</option>
                            <option value="0"  <?php if($status_process == '0'){ echo "selected=selected"; }?>>Plan</option>
                        </select></td>
		      </tr>
		</table>

	<div class="panel-heading"><h6 class="panel-title"> Personal Data</h6></div>				
		<table class="table table-striped">     
		      <tr>
		        <td width="200"><small>Nama</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="name_first" value="<?php echo $name_first;?>" class="form-control" placeholder="Nama Depan"> </td>
		        <td width="200"><input type="text" name="name_mid" value="<?php echo $name_mid; ?>" class="form-control" placeholder="Nama Tengah"></td>
		        <td width="200"><input type="text" name="name_last" value="<?php echo $name_last; ?>" class="form-control" placeholder="Nama Belakang"></td>
		      </tr>
		     <tr>
		        <td width="200"><small></small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="name_full" value="<?php echo $name_full; ?>" class="form-control" placeholder="Nama Lengkap"> </td>
		        <td width="200"><input type="text" name="name_nick" value="<?php echo $name_nick; ?>" class="form-control" placeholder="Nama Panggilan"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Gelar</small></td>
		        <td width="10">:</td>
		        <td width="200"><select class="form-control" name="prefix" placeholder="Gelar Depan">
								<option value="">--Pilih--</option>
                             <?php 
                                foreach($opt_prefix->result() as $rowprefix){
                                    
                                    if($rowprefix->prefix == $prefix){
                                      echo "<option value=".$rowprefix->prefix." selected=selected> ".$rowprefix->name."</option>";
                                    }else{
                                     echo "<option value=".$rowprefix->prefix."> ".$rowprefix->name."</option>";
                                    }
 
                                }
                              ?> 
                                </select></td>
		        <td width="200"><input type="text" name="prefix_other" value="<?php echo $prefix_other; ?>" class="form-control" placeholder="Gelar Lainnya"></td>
		        <td width="200"></td>
		      </tr>
		      <tr>
		        <td width="200"><small></small></td>
		        <td width="10">:</td>
		        <td width="200"><select class="form-control" name="suffix" placeholder="Gelar Belakang">
	                              	 <option value="">--Pilih--</option>
                             <?php 
                                foreach($opt_suffix->result() as $rowsuffix){
                                  if($rowsuffix->suffix == $suffix){
                                      echo "<option value=".$rowsuffix->suffix." selected=selected> ".$rowsuffix->name."</option>";
                                    }else{
                                     echo "<option value=".$rowsuffix->suffix."> ".$rowsuffix->name."</option>";
                                    }
                                }
                              ?> 
	                            </select></td>
		        <td width="200"><input type="text" name="suffix_other" value="<?php echo $suffix_other; ?>" class="form-control" placeholder="Gelar Lainnya"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Jenis Kelamin</small></td>
		        <td width="10">:</td>
		        <td width="200">
		        <input type="radio" name="gender" value="1" <?php if($gender == '1'){ echo "checked=checked"; }?> ><small>Pria</small>
		        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="gender" value="2" <?php if($gender == '2'){ echo "checked=checked"; }?> ><small>Wanita</small>
		        </td>
		        <td width="200"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Tempat/Tanggal Lahir</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="birth_place" value="<?php echo $birth_place;?>" class="form-control" placeholder="Tempat Lahir"></td>
		        <td width="200"><input type="text" value="<?php echo $birth_date;?>" name="birth_date" class="datebirth form-control" data-mask="99-99-9999" placeholder="dd-mm-yyyy"> </td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Negara</small></td>
		        <td width="10">:</td>
		        <td width="200">
		        	<select class="form-control" name="nationality">
                            <option value="">--Pilih--</option>
                            <option value="WNI" <?php if($nationality == 'WNI'){ echo "selected=selected"; }?> >WNI</option> 
                            <option value="WNA" <?php if($nationality == 'WNA'){ echo "selected=selected"; }?>>WNA</option> 
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
                                

                                 if($rowethnic->ethnic == $ethnic){
                                      echo "<option value=".$rowethnic->ethnic." selected=selected> ".$rowethnic->name."</option>";
                                    }else{
                                     echo "<option value=".$rowethnic->ethnic."> ".$rowethnic->name."</option>";
                                    }


                                }
                              ?> 
                                            </select></td>
		        <td width="200"><input type="text" name="ethnic_other" value="<?php echo $ethnic_other; ?>" class="form-control" placeholder="Lainnya"></td>
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

                                
                                 if($rowreligion->religion == $religion){
                                      echo "<option value=".$rowreligion->religion." selected=selected> ".$rowreligion->name."</option>";
                                    }else{
                                     echo "<option value=".$rowreligion->religion."> ".$rowreligion->name."</option>";
                                    }


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

                                 

                                 if($rowmarstatus->marital_status == $marital_status){
                                      echo "<option value=".$rowmarstatus->marital_status." selected=selected> ".$rowmarstatus->name."</option>";
                                    }else{
                                     echo "<option value=".$rowmarstatus->marital_status."> ".$rowmarstatus->name."</option>";
                                    }


                                }
                              ?> 
                                                </select></td>
		        <td width="200"><input type="text" name="status_since" value="<?php echo $status_since; ?>" class="status_since form-control" data-mask="99-99-9999" placeholder="dd-mm-yyyy"></td>
		        <td width="200"></td>
		      </tr>

		      <tr>
		        <td width="200"><small>Jumlah Anak</small></td>
		        <td width="10">:</td>
		        <td width="200"><input type="text" name="no_of_children"  value="<?php echo $no_of_children;?>" class="form-control" placeholder="Jumlah Anak"></td>
		        <td width="200"></td>
		        <td width="200"></td>
		      </tr>

		</table>
		</div>
		</div>


