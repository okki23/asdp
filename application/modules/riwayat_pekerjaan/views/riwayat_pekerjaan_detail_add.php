<?php $this->load->view('header-template');
date_default_timezone_set("Asia/Jakarta");
?>
 <script type="text/javascript">
	
    $(function(){
	$('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        
    });
	</script>
 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Data Riwayat Pekerjaan</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('riwayat_pekerjaan/riwayat_pekerjaan_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Riwayat Pekerjaan </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo date('d-m-Y');?>" > </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $date_end;?>"> </td>
                <td> Status: </td>
                <td> <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Release</option>
                        <option value="0">Plan</option>
                     </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
             
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Employment Data</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Perusahaan / Atasan</small> </td>
                <td> : </td>
                <td> <input type="text" name="employer" class="form-control"> </td>
                
                
                <td colspan="6"></td>
            </tr>
             <tr>
                <td> <small>Industri</small> </td>
                <td> : </td>
                <td> <input type="text" name="industry_type" class="form-control"> </td>
                
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Lokasi</small> </td>
                <td> : </td>
                <td> <input type="text" name="location" class="form-control">  </td>
                
                <td> <small>Negara</small> </td>
                <td> : </td>
                <td> <select class="form-control" name="country" placeholder="Status">
                    <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_country->result() as $rowcountry){  
                            echo "<option value=".$rowcountry->country."> ".$rowcountry->name."</option>" ;      
                            }
                            ?>  
                    </select>
                </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Katalog Pekerjaan</small> </td>
                <td> : </td>
                <td> <input type="text" name="job" class="form-control">  </td>
                
                <td> <small>Nama Jabatan</small> </td>
                <td> : </td>
                <td> <input type="text" name="job_name" class="form-control"> </td>
                
                <td colspan="3"> </td>
            </tr>
            
            <tr>
                <td> <small>Position</small> </td>
                <td> : </td>
                <td> <input type="text" name="position_name" class="form-control"> </td>
                
                
                <td colspan="6"></td>
            </tr>
            
            <tr>
                <td> <small>Deskripsi Jabatan</small> </td>
                <td> : </td>
                <td> <textarea name="job_description" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
             <tr>
                <td> <small>Alasan Meninggalkan</small> </td>
                <td> : </td>
                <td> <textarea name="reason_leaving" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
             <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

