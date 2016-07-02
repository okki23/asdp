<?php $this->load->view('header-template');
date_default_timezone_set("Asia/Jakarta");
?>
<script type="text/javascript">
	
    $(function(){
	$('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
        $('.tglsk').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
	$('.tglberlaku').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    });
	</script>
        
<script type="application/javascript">
$(document).ready(function(){
   
      		 $("#posisi").change(function (){
			 var lit_code_position = $(this).val();
			 $.ajax({
				 url : "<?php echo base_url('jabatan/jabatan_opt_posisi')?>",
				 type : "POST",
				 dataType : "json",
				 data : {lit_code_position:lit_code_position},
				 success: function(data,status){
					$.each(data, function(i,item){
						$("#kdposisi").val(item.kdposisi);
                                                $("#jabatan").val(item.namajabatan);
                                                $("#kdjabatan").val(item.kdjabatan);
						$("#unitkerja").val(item.namaunit);
                                                $("#kdunit").val(item.kdunit);
						$("#wilayah").val(item.wilayah);
                                                $("#kdwilayah").val(item.kdwilayah);
                                                
					});
				 },
				 error: function(e){
					 alert('fail');
				 }
			});
		 });
    }); // end document.ready
    </script>
    
     <?php
    
     foreach ($dataku->result() as $row){
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $assignment_type = $row->assignment_type;
            $assignment_reason = $row->assignment_reason;
            $employee_area = $row->employee_area;
            $employee_office = $row->employee_office;
            $employee_type = $row->employee_type;
            $employee_subtype = $row->employee_subtype;
            $position = $row->lit_code_position;
            $namajabatan =  $row->namajabatan;
            $namaunit = $row->namaunit;
            $kdunit = $row->kdunit;
            $kdjabatan = $row->kdjabatan; 
            $tipewilayah = $row->tipewilayah;
            $namawilayah = $row->namawilayah;
 
            $legal_letter_no = $row->legal_letter_no;
            $legal_date = $row->legal_date;
            $legal_effective_date = $row->legal_effective_date;
            $legal_datex = $row->legal_datex;
            $legal_effective_datex = $row->legal_effective_datex;
            $remark = $row->remark;
     }
     
     ?>
  

 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Riwayat Jabatan</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('jabatan/jabatan_detail_pro_update');?>">

			 <input type="text" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Riwayat Jabatan</h6></div>
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
                <td width="200"><input type="text" value="<?php echo $start_date; ?>" name="start_date" class="startdate form-control" data-mask="99-99-9999"> </td>
                <td width="200"><input type="text" value="<?php echo $end_date; ?>"  name="end_date" class="enddate form-control" data-mask="99-99-9999"></td>
                <td width="200"><select class="form-control" name="status_process" placeholder="Status">
                       
                        <option value="1" >Release</option>
                        <option value="0" >Plan</option>
                        </select></td>
              </tr>

              <tr>
                <td width="200"><small>Penugasan</small></td>
                <td width="10">:</td>
                <td colspan="2" width="400"><select name="assignment_type" class="form-control" placeholde="Tipe Penugasan">
                                                <option value="">--Pilih--</option>
                                                <?php 
                                                foreach($opt_assignment_type->result() as $row){  
                                                    
                                                        echo "<option value=".$row->assignment_type."> ".$row->name."</option>" ; 
                                                        
                                                }
                                                ?> 
                                            </select> </td>              
                <td width="200"><select name="assignment_reason" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($opt_assignment_reason->result() as $rows) {
                                                    
                                                    echo "<option value=".$rows->assignment_reason."> ".$rows->name."</option>" ;    
                                                   
                                                }
                                            ?>
                                        </select></td>
              </tr>
        </table>

         <div class="panel-heading"><h6 class="panel-title">  Struktur Organisasi dan Administrasi</h6></div>                
        <table class="table table-striped">       
             <tr>
                <td width="200"><small>Posisi</small></td>
                <td width="10">:</td>
                <td width="600">
                     <select name="lit_code_position" class="select-full" data-placeholder="Posisi" id="posisi">
                    <option value=""></option>
                        <?php 
                        foreach($opt_position->result() as $rowposition){
                            
                                echo "<option value=".$rowposition->lit_code_position.">".$rowposition->name_position.' '.$rowposition->nm_kapal."</option>";
                            
                        }
                        ?> 
                    </select>
                    <input type="hidden" name="kdposisi" class="form-control" id="kdposisi" value=" ">
                   
                </td>
                <td width="200"><small>Unit Kerja</small></td>
                <td width="10">:</td>
                <td colspan="3" width="300"><input type="text" name="unit" class="form-control" id="unitkerja" readonly="readonly" value=" ">
                <input type="hidden" name="kdunit" class="form-control" id="kdunit" value=" ">
                </td>
                
                </tr>
             
            <tr>
                <td width="200"><small>Jabatan</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="jabatan" class="form-control" id="jabatan" readonly="readonly" value=" ">
                <input type="hidden" name="kdjabatan" class="form-control" id="kdjabatan" value=" ">
                </td>
                <td width="200"><small>Wilayah</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="wilayah" class="form-control" id="wilayah" readonly="readonly" value=" ">
                    <input type="hidden" name="kdwilayah" class="form-control" id="kdwilayah" value=" ">;
                </td>
            </tr>
           
             
            
            <tr>
                <td width="200"><small>Tipe Karyawan</small></td>
                <td width="10">:</td>
                <td width="600"><select name="employee_type" class="form-control input-sm">
                                        
                                   <?php
                                        foreach ($opt_employee_type->result() as $rowemployeetype) {
                                       
                                        echo "<option value=".$rowemployeetype->employee_type."> ".$rowemployeetype->name."</option>" ;   
                                       
                                        }
                                        ?>
                                            
                                    </select>
                </td>
                <td width="200"><small>Sub Tipe</small></td>
                <td width="10">:</td>
                <td width="600"><select name="employee_subtype" class="form-control input-sm">
                                         
                                    <?php
                                        foreach ($opt_employee_subtype->result() as $rowemployeestype) {
                                        
                                        echo "<option value=".$rowemployeestype->employee_subtype."> ".$rowemployeestype->name."</option>" ;   
                                        
                                        }
                                        ?>     
                                </select></td>
                </tr>
                <tr>
                <td width="200"><small>Area</small></td>
                <td width="10">:</td>
                <td width="600"><select name="employee_area" class="form-control">
                                           
                                            <?php
                                            foreach ($opt_employee_area->result() as $rowemployeearea) {
                                                 
                                                 
                                                    echo "<option value=".$rowemployeearea->employee_area."> ".$rowemployeearea->name."</option>" ;
                                               

                                            }
                                            ?>

                                </select>
                </td>
                <td width="200"><small>Cabang</small></td>
                <td width="10">:</td>
                <td width="600"><select name="employee_office" class="form-control">
                                                <option value="">--Pilih--</option>
                                                <?php
                                                foreach ($opt_employee_cabang->result() as $rowemployeecabang) {
                                                    
                                                       echo "<option value=".$rowemployeecabang->employee_office."> ".$rowemployeecabang->name."</option>" ;
                                                    

                                                }
                                                ?>
                                </select>
                </td>
              </tr>

                                                   
        </table>

 
        <div class="panel-heading"><h6 class="panel-title">Other Info</h6></div>                
        <table class="table table-striped">   
            <tr>
                <td width="200"><small>No. SK</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="legal_letter_no" class="form-control" value=" "></td>
            </tr>
            <tr>
                <td width="200"><small>Tanggal SK</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="legal_date" class="tglsk form-control" data-mask="99-99-9999" value=" "></td>
            </tr>
            
            
            
            <tr>
                <td width="200"><small>NIK</small></td>
                <td width="10">:</td>
                <td width="600"><input type="text" name="external_id" value="<?php echo $getnik->id_number; ?>" readonly="readonly" ></td>
            </tr> 
             <tr>
                <td width="200"><small>Catatan</small></td>
                <td width="10">:</td>
                <td width="600"><textarea rows="5" cols="5" class="form-control" name="remark" >    </textarea></td>
            </tr>
        </table>
        </div>
        </div>
 
                         













