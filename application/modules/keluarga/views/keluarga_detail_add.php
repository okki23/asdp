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
 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Keluarga</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('keluarga/keluarga_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Keluarga </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo date('d-m-Y');?>"  > </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $date_end;?>" > </td>
                <td> Status: </td>
                <td> <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Release</option>
                        <option value="0">Plan</option>
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
                                echo "<option value=".$rowkeluarga->family_type."> ".$rowkeluarga->name."</option>" ;      
                            }
                        ?>  
                                                                                 
                      </select> 
                </td>
                <td> <small>Sequence</small></td>
                <td> <input type="text" class="form-control" name="seq"></td>
                <td> <small>Next Of Kind</small></td>
                <td> <input type="checkbox" class="form-control" name="next_kind" value="1"></td>
                 
                
                <td colspan="5"> </td>
            </tr>
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Keluarga</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Nama</small></td>
                <td> <small>Depan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_first"> </td>
                <td> <small>Tengah</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_mid"> </td>
                <td> <small>Last</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_last"> </td>
            </tr>
            <tr>
                <td> <small> </small></td>
                <td> <small>Lengkap</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_full" </td>
                <td> <small>Panggilan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="name_nick"> </td>
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small> Gelar</small></td>
                <td> :</td>
                <td> <select name="prefix" class="form-control input-sm">
                     <option value="">--Pilih--</option>
                        <?php 
                            foreach($opt_prefix->result() as $rowprefix){ 
                            echo "<option value=".$rowprefix->prefix."> ".$rowprefix->name."</option>" ;      
                            }
                        ?>  
                                                                       
                     </select>	
                </td>
              
                <td colspan="7"> </td>
            </tr>
            <tr>
                <td> <small> Jenis Kelamin </small></td>
                <td> :</td>
                <td> <input type="radio" name="gender" value="1"> Pria   &nbsp  &nbsp; <input type="radio" name="gender" value="2" >  Wanita  </td>
                <td colspan="7"> </td>
            </tr>
            <tr>
                <td> <small> Tempat Tanggal Lahir </small></td>
                <td> :</td>
                <td> Di</td>
                <td> <input type="text" class="form-control" name="birth_place"> </td>
                <td> Tanggal</td>
                <td> <input type="text" name="birth_date" class="tgllahir form-control" data-mask="99-99-9999"  > </td>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td> <small> Tanggal Meninggal </small></td>
                <td> :</td>
                <td> <input type="text" name="date_of_death" class="tglmeninggal form-control" data-mask="99-99-9999" > </td>
               
                <td colspan="7"> </td>
            </tr>
            <tr>
                <td> <small> Status Perkawinan </small></td>
                <td> :</td>
                <td> <select class="form-control input-sm" name="marital_status" style="width:100%;">
                                                                                <option value="">--Pilih--</option>
                                                                                <?php 
                                                                                   foreach($opt_marital_status->result() as $rowmarstatus){
                                                                                    echo "<option value=".$rowmarstatus->marital_status."> ".$rowmarstatus->name."</option>";
                                                                                   }
                                                                                 ?> 
                     </select>
                </td>
                <td> <small> Sejak </small>  </td>
                <td> : </td>
                <td> <input type="text" name="status_since" class="tglnikah form-control" data-mask="99-99-9999"  >  </td>
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small> Ditanggung ? </small></td>
                <td> :</td>
                <td> <input type="checkbox" class="form-control" name="medical_dependant" value="1">  </td>
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
                        echo "<option value=".$rowlastpend->education_level."> ".$rowlastpend->name."</option>" ;      
                        }
                        ?>  

                    </select>
                </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Alamat</small> </td>
                <td> : </td>
                <td> <textarea name="address" class="form-control input-sm"> </textarea> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>RT/RW</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="neighborhood1"> </td>
                <td> <input type="text" class="form-control" name="neighborhood2"> </td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td> <small>Kode Pos</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="postalcode"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>No Paspor</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="passport_no"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>No KTP</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="ktp_no"> </td>
                <td colspan="6"></td>
            </tr>
             
            <tr>
                <td> <small>Telepon Rumah</small> </td>
                <td> : + </td>
                <td> <input type="text" class="form-control" name="home_phone_country"> </td>
                <td> <input type="text" class="form-control" name="home_phone_area"> </td>
                <td> <input type="text" class="form-control" name="home_phone_no"> </td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td> <small>No.Handphone</small> </td>
                <td> : + </td>
                <td> <input type="text" class="form-control" name="mobile_phone_country"> </td>
                <td> <input type="text" class="form-control" name="mobile_phone_area"> </td>
                <td> <input type="text" class="form-control" name="mobile_phone_no"> </td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td> <small>Pendudukan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="occupation"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control input-sm"> </textarea> </td>
                <td colspan="6"></td>
            </tr>
             
           
        </table>


          
        </div>

