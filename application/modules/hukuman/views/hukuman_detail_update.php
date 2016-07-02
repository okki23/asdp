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
					<h3>Update Data Hukuman</h3>
				</div>
			</div>
		 
               <?php
               foreach ($data_sanction->result() as $row){
                   $personnel_id = $row->personnel_id;
                    $start_date = $row->tanggalstart;
                    $end_date = $row->tanggalend;
                    $status_process = $row->status_process;
                    $sanction_type = $row->sanction_type;
                    $reference_no = $row->reference_no;
                    $description = $row->description;
                    $authority_officer = $row->authority_officer;
                    $facility = $row->facility;
                    $jabatan = $row->jabatan;
                    $sanction_value = $row->sanction_value;
                    $remark = $row->remark;
                   
               }
               
               ?>
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('hukuman/hukuman_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data Hukuman </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo $start_date;?>"  placeholder="Start Date"> </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>" placeholder="Start Date"> </td>
                <td> Status : </td>
                <td> 
                     <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1" <?php if($status_process == '1'){ echo "selected=selected";} ?> >Release</option>
                        <option value="0" <?php if($status_process == '0'){ echo "selected=selected";} ?> >Plan</option>
                     </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Tipe Hukuman</small> </td>
                <td> : </td>
                <td> 
                        <select class="form-control" name="sanction_type">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_tipe_hukuman->result() as $rowsanction){  
                            if($rowsanction->sanction_type == $sanction_type){
                                echo "<option value=".$rowsanction->sanction_type." selected=selected> ".$rowsanction->name."</option>" ;
                            }else{
                                echo "<option value=".$rowsanction->sanction_type."> ".$rowsanction->name."</option>" ;
                            }
                                  
                            }
                            ?> 
                        </select>
                </td>
                
                <td colspan="6"></td>
            </tr>
           
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Hukuman </h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>No.Referensi </small> </td>
                <td> : </td>
                <td>  <input type="text" name="reference_no" class="form-control" value="<?php echo $reference_no; ?>"> </td>
                
                <td colspan="3"></td>
                
                <td>  </td>
                <td>   </td>
                <td>  </td>
                
                <td colspan="3"></td>
            </tr>
            <tr>
                <td> <small>Deskripsi</small> </td>
                <td> : </td>
                <td> <textarea name="description" class="form-control"> <?php echo $description; ?> </textarea>   </td>
                
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Fasilitas Terkait</small> </td>
                <td> : </td>
                <td> <textarea name="facility" class="form-control"> <?php echo $facility; ?> </textarea> </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="2"> </td>
            </tr>
           <tr>
                <td> <small>Pemberi Hukuman</small> </td>
                <td> : </td>
                <td> <input type="text" name="authority_officer" class="form-control" value="<?php echo $authority_officer; ?>">
                </td>
                
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Jabatan</small> </td>
                <td> : </td>
                <td> <input type="text" name="jabatan" class="form-control" value="<?php echo $jabatan; ?>">
                </td>
                
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Nilai Hukuman</small> </td>
                <td> : </td>
                <td> <input type="text" name="sanction_value" class="form-control" value="<?php echo $sanction_value; ?>">
                </td>
                <td> <input type="text" name="remark" class="form-control" value="<?php echo $remark; ?>"></td>
                <td> </td>
                <td> </td>
                 
                <td colspan="3"> </td>
            </tr>
        </table>


          
        </div>

