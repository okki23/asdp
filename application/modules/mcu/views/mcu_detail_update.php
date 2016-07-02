<?php $this->load->view('header-template');
date_default_timezone_set("Asia/Jakarta");
?>

  <script type="text/javascript">
	
    $(function(){
	$('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        $('.startcek').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.endcek').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    });
	</script>
        
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Update Data Medical Check Up</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($datamcu->result() as $row) {
            /*
personnel_id
start_date
end_date
status_process
checked_result
certified
certificate_no
medical
health_note
remark
mcu_start_date
mcu_end_date

 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $checked_result = $row->checked_result;
            $certified = $row->certified;
            $certificate_no = $row->certificate_no;
            $medical = $row->medical;
            $health_note = $row->health_note;
            $remark = $row->remark;
            $mcu_start_date = $row->checkupstart;
            $mcu_end_date = $row->checkupend;
             
        }
        ?>
                
            
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('mcu/mcu_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data  Medical Check Up </h6></div>
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
                <td> <small>Masa Berlaku</small> </td>
                <td> : </td>
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo $start_date;?>"  placeholder="Start Date"> </td>
                <td>  <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>" placeholder="Start Date"> </td>
                <td> Status: </td>
                <td> <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1" <?php if($status_process == '1') {echo "selected=selected"; } ?> >Release</option>
                        <option value="0" <?php if($status_process == '0') {echo "selected=selected"; } ?> >Plan</option>
                     </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
            
            <tr>
                <td> <small>Tanggal Pemeriksaan</small> </td>
                <td> : </td>
                <td> <input type="text" name="mcu_start_date" class="startcek form-control" data-mask="99-99-9999" value="<?php echo $mcu_start_date; ?>" > </td>
                <td>  <input type="text" name="mcu_end_date" class="endcek form-control" data-mask="99-99-9999" value="<?php echo $mcu_end_date; ?>"> </td>
                 
                
                <td colspan="8"> </td>
            </tr>
             
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Medical Check-up Data</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Hasil Pemeriksaan</small> </td>
                <td> : </td>
                <td> <select class="form-control" name="checked_result" placeholder="Status">
                    <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_hasil_cek->result() as $rowcek){  
                            if($rowcek->checked_result == $checked_result){
                                echo "<option value=".$rowcek->checked_result." selected=selected> ".$rowcek->name."</option>" ;      
                            }else{
                                echo "<option value=".$rowcek->checked_result."> ".$rowcek->name."</option>" ;      
                            }
                            
                            }
                            ?>  
                    </select> </td>
                
                
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Sertifikat</small> </td>
                <td> :</td>
                <td> <input type="checkbox" name="certified" class="form-control" value="1" <?php if($certified == '1'){ echo "checked"; }?>>  </td>
                
                <td> <small>No :</small> </td>
                <td> <input type="text" name="certificate_no" class="form-control" value="<?php echo $certificate_no; ?>">  </td>
                <td>   </td>
                
                <td colspan="3"> </td>
            </tr>
             <tr>
                <td> <small>Tenaga Medis</small> </td>
                <td> : </td>
                <td> <input type="text" name="medical" class="form-control" value="<?php echo $medical; ?>" > </td>
               
                 
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Catatan Kesehatan</small> </td>
                <td> : </td>
                <td> <textarea name="health_note" class="form-control"> <?php echo $health_note; ?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remark" class="form-control"> <?php echo $remark; ?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

