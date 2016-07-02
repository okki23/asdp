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
					<h3>Add Data Hukuman</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('hukuman/hukuman_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Hukuman </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo date('d-m-Y');?>"  placeholder="Start Date"> </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $date_end;?>" placeholder="Start Date"> </td>
                <td> Status : </td>
                <td> 
                     <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Release</option>
                        <option value="0">Plan</option>
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
                            echo "<option value=".$rowsanction->sanction_type."> ".$rowsanction->name."</option>" ;      
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
                <td>  <input type="text" name="reference_no" class="form-control"> </td>
                
                <td colspan="3"></td>
                
                <td>  </td>
                <td>   </td>
                <td>  </td>
                
                <td colspan="3"></td>
            </tr>
            <tr>
                <td> <small>Deskripsi</small> </td>
                <td> : </td>
                <td> <textarea name="description" class="form-control"> </textarea>   </td>
                
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Fasilitas Terkait</small> </td>
                <td> : </td>
                <td> <textarea name="facility" class="form-control"> </textarea> </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="2"> </td>
            </tr>
           <tr>
                <td> <small>Pemberi Hukuman</small> </td>
                <td> : </td>
                <td> <input type="text" name="authority_officer" class="form-control">
                </td>
                
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Jabatan</small> </td>
                <td> : </td>
                <td> <input type="text" name="jabatan" class="form-control">
                </td>
                
                <td>  </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Nilai Hukuman</small> </td>
                <td> : </td>
                <td> <input type="text" name="sanction_value" class="form-control">
                </td>
                <td> <input type="text" name="remark" class="form-control"></td>
                <td> </td>
                <td> </td>
                 
                <td colspan="3"> </td>
            </tr>
        </table>


          
        </div>

