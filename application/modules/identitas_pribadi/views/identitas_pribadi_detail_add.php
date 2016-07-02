<?php $this->load->view('header-template');
date_default_timezone_set("Asia/Jakarta");
?>
 <script type="text/javascript">
	
    $(function(){
	$('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        $('.issueddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.expdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    });
	</script>
 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Dokumen Identitas Pribadi</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('identitas_pribadi/identitas_pribadi_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Dokumen Identitas Pribadi</h6></div>
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
                <td width="200"><input type="text" value="<?php echo date('d-m-Y');?>" name="start_date" class="startdate form-control" data-mask="99-99-9999" > </td>
                <td width="200"><input type="text" value="<?php echo $date_end;?>"  name="end_date" class="enddate form-control" data-mask="99-99-9999" ></td>
                <td width="200"><select class="form-control" name="status_process" >
                        <option value="">--Pilih Status--</option>
                        <option value="1">Release</option>
                        <option value="0">Plan</option>
                        </select></td>
              </tr>

              <tr>
                <td width="200"><small>Tipe Identitas</small></td>
                <td width="10">:</td>
                <td width="400"><select name="personal_id_type" class="form-control">
                                                <option value="">--Pilih Tipe Identitas--</option>
                                                <?php 
                                                foreach($opt_doc_type->result() as $row){  echo "<option value=".$row->personal_id_type."> ".$row->name."</option>" ;      
                                                }
                                                ?> 
                                            </select> </td>     
                <td> <small>Sequence</small> </td>
                <td><input type="text" name="seq" class="form-control"  ></td>
              </tr>
        </table>

         <div class="panel-heading"><h6 class="panel-title">  Personal Identification Data</h6></div>                
        <table class="table table-striped">       
            <tr>
                <td width="200"><small>No. Identitas</small></td>
                <td width="10">:</td>
                <td width="100"><input type="text" name="id_number" class="form-control" ></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td width="200"><small>Dikeluarkan Oleh</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="authority_issued" class="form-control" ></td>
                <td colspan="3"></td>
            </tr>

              </tr>
              <tr>
                <td width="200"><small>Tanggal Dikeluarkan</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="issued_date" class="issueddate form-control" data-mask="99-99-9999"></td>
                 <td width="200"><small>Data Berlaku </small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="exp_date" class="expdate form-control" data-mask="99-99-9999"></td>
              </tr> 
              
              <tr>
                <td width="200"><small>Lokasi</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="location" class="form-control" placeholder="Lokasi"></td>
              <td colspan="3"></td>
              </tr> 
               <tr>
                <td width="200"><small>Negara Yang Mengeluarkan</small></td>
                <td width="10">:</td>
                <td width="600"><select name="country" class="form-control" placeholde="Tipe Penugasan">
                                                <option value="">--Pilih Negara--</option>
                                                <?php 
                                                foreach($opt_country->result() as $row){  echo "<option value=".$row->country."> ".$row->name."</option>" ;      
                                                }
                                                ?> 
                                            </select></td>
              <td colspan="3"></td>
               </tr> 
        </table>


          
        </div>

