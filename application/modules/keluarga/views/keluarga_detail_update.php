<?php $this->load->view('header-template');
 date_default_timezone_set("Asia/Jakarta");
 ?>
 <script type="text/javascript">
	
    $(function(){
	$('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        $('.tgllahir').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.tglmeninggal').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        $('.tglnikah').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    });
	</script>
        
         <?php
        date_default_timezone_set("Asia/Jakarta");
        foreach ($data_keluarga->result() as $row) {
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $family_type = $row->family_type;
            $seq = $row->seq;
            $name_full = $row->name_full;
            $name_first = $row->name_first;
            $name_mid = $row->name_mid;
            $name_last = $row->name_last;
            $name_nick = $row->name_nick;
            $prefix = $row->prefix;
            $gender = $row->gender;
            $postalcode = $row->postalcode;
            $birth_date = $row->tanggal_lahir;
            $birth_place = $row->birth_place;
            $date_of_death = $row->tanggal_meninggal;
            $marital_status = $row->marital_status;
            $status_since = $row->sejak;
            $ktp_no = $row->ktp_no;
            $passport_no = $row->passport_no;
            $next_kind = $row->next_kind;
            $neighborhood1 = $row->neighborhood1;
            $neighborhood2 = $row->neighborhood2;
            $medical_dependant = $row->medical_dependant;
            $last_education = $row->last_education;
            $address = $row->address;
            $mobile_phone_country = $row->mobile_phone_country;
            $mobile_phone_area = $row->mobile_phone_area;
            $mobile_phone_no = $row->mobile_phone_no;
            $home_phone_country = $row->home_phone_country;
            $home_phone_area = $row->home_phone_area;
            $home_phone_no = $row->home_phone_no;
            $occupation = $row->occupation;
            $remarks = $row->remarks;
        }
        ?>
        
 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Update Keluarga</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('keluarga/keluarga_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data Keluarga </h6></div>
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
                <td> <small>Periode</small> </td>
                <td> : </td>
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo $start_date;?>"  > </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>" > </td>
                <td> Status: </td>
                <td> <select class="form-control" name="status_process" placeholder="Status">
                       
                        <option value="1" <?php if($status_process == '1') {echo "selected=selected";} ?> >Release</option>
                        <option value="0"  <?php if($status_process == '0') {echo "selected=selected";} ?>>Plan</option>
                     </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Tipe Keluarga</small> </td>
                <td> : </td>
                <td>   <select name="family_type"  class="form-control">
                        <option value="">--Pilih--</option>
                        <?php 
                            foreach($opt_tipe_keluarga->result() as $rowkeluarga){ 
                                if($rowkeluarga->family_type == $family_type){
                                    echo "<option value=".$rowkeluarga->family_type." selected=selected> ".$rowkeluarga->name."</option>" ;  
                                }else{
                                    echo "<option value=".$rowkeluarga->family_type."> ".$rowkeluarga->name."</option>" ;   
                                }
                                   
                            }
                        ?>  
                                                                                 
                      </select> 
                </td>
                <td> <small>Sequence</small></td>
                <td> <input type="text" class="form-control" name="seq" value="<?php echo $seq; ?>"></td>
                <td> <small>Next Of Kind</small></td>
                <td> <input type="checkbox" class="form-control" name="next_kind" value="1" <?php if($next_kind == '1'){ echo "checked=checked"; }?> ></td>
                 
                
                <td colspan="5"> </td>
            </tr>
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Keluarga</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Nama</small></td>
                <td> <small>Depan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_first" value="<?php echo $name_first; ?>"> </td>
                <td> <small>Tengah</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_mid" value="<?php echo $name_mid; ?>"> </td>
                <td> <small>Last</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_last" value="<?php echo $name_last; ?>"> </td>
            </tr>
            <tr>
                <td> <small> </small></td>
                <td> <small>Lengkap</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_full" value="<?php echo $name_full; ?>"> </td>
                <td> <small>Panggilan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_nick" value="<?php echo $name_nick; ?>"> </td>
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small> Gelar</small></td>
                <td> :</td>
                <td> <select name="prefix" class="form-control input-sm">
                     <option value="">--Pilih--</option>
                        <?php 
                            foreach($opt_prefix->result() as $rowprefix){ 
                               if($rowprefix->prefix == $prefix){
                                    echo "<option value=".$rowprefix->prefix." selected=selected> ".$rowprefix->name."</option>" ;    
                               }else{
                                    echo "<option value=".$rowprefix->prefix."> ".$rowprefix->name."</option>" ;    
                               }
                             
                            }
                        ?>  
                                                                       
                     </select>	
                </td>
              
                <td colspan="7"> </td>
            </tr>
            <tr>
                <td> <small> Jenis Kelamin </small></td>
                <td> :</td>
                <td> <input type="radio" name="gender" value="1" <?php if($gender == '1'){ echo "checked=checked"; }?> > Pria   &nbsp  &nbsp; <input type="radio" name="gender" value="2" <?php if($gender == '2'){ echo "checked=checked"; }?> >  Wanita  </td>
                <td colspan="7"> </td>
            </tr>
            <tr>
                <td> <small> Tempat Tanggal Lahir </small></td>
                <td> :</td>
                <td> Di</td>
                <td> <input type="text" class="form-control" name="birth_place" value="<?php echo $birth_place;?>"> </td>
                <td> Tanggal</td>
                <td> <input type="text" name="birth_date" class="tgllahir form-control" data-mask="99-99-9999" value="<?php echo $birth_date;?>" > </td>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td> <small> Tanggal Meninggal </small></td>
                <td> :</td>
                <td> <input type="text" name="date_of_death" class="tglmeninggal form-control" data-mask="99-99-9999" value="<?php echo $date_of_death;?>" > </td>
               
                <td colspan="7"> </td>
            </tr>
            <tr>
                <td> <small> Status Perkawinan </small></td>
                <td> :</td>
                <td> <select class="form-control input-sm" name="marital_status" style="width:100%;">
                        <option value="">--Pilih--</option>
                            <?php 
                            foreach($opt_marital_status->result() as $rowmarstatus){
                                if($rowmarstatus->marital_status == $marital_status) {
                                     echo "<option value=".$rowmarstatus->marital_status." selected=selected> ".$rowmarstatus->name."</option>";
                                }else{
                                     echo "<option value=".$rowmarstatus->marital_status."> ".$rowmarstatus->name."</option>";
                                }
                           
                            }
                            ?> 
                     </select>
                </td>
                <td> <small> Sejak </small>  </td>
                <td> : </td>
                <td> <input type="text" name="status_since" class="tglnikah form-control" data-mask="99-99-9999" value="<?php echo $status_since; ?>"  >  </td>
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small> Ditanggung ? </small></td>
                <td> :</td>
                <td> <input type="checkbox" class="form-control" name="medical_dependant" value="1" <?php if($medical_dependant == '1'){ echo "checked=checked"; }?>>  </td>
                <td colspan="7"> </td>
            </tr>
            
             
           
        </table>
        
         <div class="panel-heading"><h6 class="panel-title"> Lain-Lain</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Pendidikan Terakhir</small> </td>
                <td> : </td>
                <td> <select name="last_education" class="form-control input-sm">
                        <option value="">--Pilih--</option>
                        <?php 
                        foreach($opt_pendidikan_terakhir->result() as $rowlastpend){ 
                            if($rowlastpend->education_level == $last_education){
                                echo "<option value=".$rowlastpend->education_level." selected=selected> ".$rowlastpend->name."</option>" ;
                            }else{
                                echo "<option value=".$rowlastpend->education_level."> ".$rowlastpend->name."</option>" ;
                            }
                              
                        }
                        ?>  

                    </select>
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Alamat</small> </td>
                <td> : </td>
                <td> <textarea name="address" class="form-control input-sm"> <?php echo $address; ?> </textarea> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>RT/RW</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="neighborhood1" value="<?php echo $neighborhood1; ?>"> </td>
                <td> <input type="text" class="form-control" name="neighborhood2" value="<?php echo $neighborhood2; ?>"> </td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td> <small>Kode Pos</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="postalcode" value="<?php echo $postalcode; ?>"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>No Paspor</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="passport_no" value="<?php echo $passport_no; ?>"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>No KTP</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="ktp_no" value="<?php echo $ktp_no; ?>"> </td>
                <td colspan="6"></td>
            </tr>
             
            <tr>
                <td> <small>Telepon Rumah</small> </td>
                <td> : + </td>
                <td> <input type="text" class="form-control" name="home_phone_country" value="<?php echo $home_phone_country; ?>"> </td>
                <td> <input type="text" class="form-control" name="home_phone_area" value="<?php echo $home_phone_area; ?>"> </td>
                <td> <input type="text" class="form-control" name="home_phone_no" value="<?php echo $home_phone_no; ?>"> </td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td> <small>No.Handphone</small> </td>
                <td> : + </td>
                <td> <input type="text" class="form-control" name="mobile_phone_country" value="<?php echo $mobile_phone_country; ?>"> </td>
                <td> <input type="text" class="form-control" name="mobile_phone_area" value="<?php echo $mobile_phone_area; ?>"> </td>
                <td> <input type="text" class="form-control" name="mobile_phone_no" value="<?php echo $mobile_phone_no; ?>"> </td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td> <small>Pendudukan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="occupation" value="<?php echo $occupation; ?>"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control input-sm"> <?php echo $remarks; ?> </textarea> </td>
                <td colspan="6"></td>
            </tr>
             
           
        </table>


          
        </div>

