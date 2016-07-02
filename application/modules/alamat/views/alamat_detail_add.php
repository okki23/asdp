<?php $this->load->view('header-template');
 date_default_timezone_set("Asia/Jakarta");
 ?>
 <script type="text/javascript">
	
    $(function(){
	$('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        $('.qualificationstartdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.qualificationenddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    });
	</script>
 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Alamat</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('alamat/alamat_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Alamat </h6></div>
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
                <td> <small>Tipe Alamat</small> </td>
                <td> : </td>
                <td>   <select name="address_type"  class="form-control">
                        <option value="">--Pilih--</option>
                        <?php 
                            foreach($opt_tipe_alamat->result() as $rowalamat){ 
                                echo "<option value=".$rowalamat->address_type."> ".$rowalamat->name."</option>" ;      
                            }
                        ?>  
                                                                                 
                      </select> 
                </td>
                 
                
                <td colspan="9"> </td>
            </tr>
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Alamat</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Jalan</small> </td>
                <td> : </td>
                <td>  <textarea name="street" class="form-control"> </textarea> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>RT</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="neighborhood1"> </td>
                <td> <small>RW</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="neighborhood2"> </td>
                
                <td colspan="3"></td>
            </tr>
            <tr>
                <td> <small>Kelurahan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="sub_district"> </td>
                <td> <small>Kecamatan</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="district"> </td>
                
                <td colspan="3"></td>
            </tr>
            <tr>
                <td> <small>Kota</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="city"> </td>
                <td> <small>Kode Pos</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="postalcode"> </td>
                
                <td colspan="3"></td>
            </tr>
            <tr>
                <td> <small>Provinsi</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="province"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Negara</small> </td>
                <td> : </td>
                <td><select name="country" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php 
                        foreach($opt_country->result() as $rowcountry){ 
                            echo "<option value=".$rowcountry->country."> ".$rowcountry->name."</option>" ;      
                        }
                        ?>  

                    </select>
                </td>
                <td colspan="6"></td>
            </tr>
           
        </table>
        
         <div class="panel-heading"><h6 class="panel-title"> Contact</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Contact Person</small> </td>
                <td> : </td>
                <td> <input type="text" class="form-control" name="contact_person"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Telepon Rumah</small> </td>
                <td> : + </td>
                <td> <input type="text" class="form-control" name="contact_phone_country"> </td>
                <td> <input type="text" class="form-control" name="contact_phone_area"> </td>
                <td> <input type="text" class="form-control" name="contact_phone_no"> </td>
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
             
           
        </table>


          
        </div>

