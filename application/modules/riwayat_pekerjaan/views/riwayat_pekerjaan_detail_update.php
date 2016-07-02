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
					<h3>Update Data Riwayat Pekerjaan</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($datarpekerjaan->result() as $row) {
            /*
 
personnel_id
start_date
end_date
status_process
 
employer
industry_type
location
country
job
job_name
position_name
job_description
reason_leaving
remarks

 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $employer = $row->employer;
            $industry_type = $row->industry_type;
            $location = $row->location;
            $country = $row->country;
            $job = $row->job;
            $job_name = $row->job_name;
            $position_name = $row->position_name;
            $job_description = $row->job_description;
            $reason_leaving = $row->reason_leaving;
            $remarks = $row->remarks;
             
                       
        }
        ?>
                
               
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('riwayat_pekerjaan/riwayat_pekerjaan_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data Riwayat Pekerjaan </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo $start_date;?>" > </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>"> </td>
                <td> Status: </td>
                <td>  <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1" <?php if($status_process == '1') {echo "selected=selected"; } ?> >Release</option>
                        <option value="0" <?php if($status_process == '0') {echo "selected=selected"; } ?> >Plan</option>
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
                <td> <input type="text" name="employer" class="form-control" value="<?php echo $employer;?>"> </td>
                
                
                <td colspan="6"></td>
            </tr>
             <tr>
                <td> <small>Industri</small> </td>
                <td> : </td>
                <td> <input type="text" name="industry_type" class="form-control" value="<?php echo $industry_type;?>"> </td>
                
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Lokasi</small> </td>
                <td> : </td>
                <td> <input type="text" name="location" class="form-control" value="<?php echo $location;?>">  </td>
                
                <td> <small>Negara</small> </td>
                <td> : </td>
                <td> <select class="form-control" name="country" placeholder="Status">
                    <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_country->result() as $rowcountry){  
                            if($rowcountry->country == $country){
                                echo "<option value=".$rowcountry->country." selected=selected> ".$rowcountry->name."</option>" ;   
                            }else{
                                echo "<option value=".$rowcountry->country."> ".$rowcountry->name."</option>" ;   
                            }
                               
                            }
                            ?>  
                    </select>
                </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Katalog Pekerjaan</small> </td>
                <td> : </td>
                <td> <input type="text" name="job" class="form-control" value="<?php echo $job; ?>">  </td>
                
                <td> <small>Nama Jabatan</small> </td>
                <td> : </td>
                <td> <input type="text" name="job_name" class="form-control" value="<?php echo $job_name;?>"> </td>
                
                <td colspan="3"> </td>
            </tr>
            
            <tr>
                <td> <small>Position</small> </td>
                <td> : </td>
                <td> <input type="text" name="position_name" class="form-control" value="<?php echo $position_name;?>"> </td>
                
                
                <td colspan="6"></td>
            </tr>
            
            <tr>
                <td> <small>Deskripsi Jabatan</small> </td>
                <td> : </td>
                <td> <textarea name="job_description" class="form-control"> <?php echo $job_description;?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
             <tr>
                <td> <small>Alasan Meninggalkan</small> </td>
                <td> : </td>
                <td> <textarea name="reason_leaving" class="form-control"> <?php echo $reason_leaving;?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
             <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control"> <?php echo $remarks;?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

