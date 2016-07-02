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
					<h3>Add Data Medical Check Up</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('mcu/mcu_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data  Medical Check Up </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo date('d-m-Y');?>"  placeholder="Start Date"> </td>
                <td>  <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $date_end;?>" placeholder="Start Date"> </td>
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
                <td> <small>Tanggal Pemeriksaan</small> </td>
                <td> : </td>
                <td> <input type="text" name="mcu_start_date" class="startcek form-control" data-mask="99-99-9999" > </td>
                <td>  <input type="text" name="mcu_end_date" class="endcek form-control" data-mask="99-99-9999"  > </td>
                 
                
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
                            echo "<option value=".$rowcek->checked_result."> ".$rowcek->name."</option>" ;      
                            }
                            ?>  
                    </select> </td>
                
                
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Sertifikat</small> </td>
                <td> :</td>
                <td> <input type="checkbox" name="certified" class="form-control" value="1">  </td>
                
                <td> <small>No :</small> </td>
                <td> <input type="text" name="certificate_no" class="form-control">  </td>
                <td>   </td>
                
                <td colspan="3"> </td>
            </tr>
             <tr>
                <td> <small>Tenaga Medis</small> </td>
                <td> : </td>
                <td> <input type="text" name="medical" class="form-control" > </td>
               
                 
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Catatan Kesehatan</small> </td>
                <td> : </td>
                <td> <textarea name="health_note" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remark" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

