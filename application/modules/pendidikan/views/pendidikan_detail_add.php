<?php $this->load->view('header-template');?>
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
					<h3>Add Pendidikan</h3>
				</div>
			</div>
		 
                
              
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('pendidikan/pendidikan_detail_pro_add')?>" enctype="multipart/form-data">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Pendidikan</h6></div>
	                <div class="panel-body">        
                     
</div>
                   <legend>
                <div class="form-actions text-left">
                    
                <button type="submit" class="btn btn-primary"> <span data-icon="&#xe08d;"> </span> Simpan</button>
                        </div>
                </legend>
                

<div class="panel panel-tab">
    <div class="panel-heading"><h6 class="panel-title">  Main Data</h6></div>                
        <table class="table table-striped">      
            
              
                <tr>
                <td width="200"><small>Periode</small></td>
                <td width="10">:</td>
                <td width="200"><input type="text" value="<?php echo date('d-m-Y');?>" name="start_date"  class="startdate form-control" data-mask="99-99-9999"> </td>
                <td width="200"><input type="text" value="<?php echo $date_end;?>"  name="end_date"  class="enddate form-control" data-mask="99-99-9999"></td>
                <td width="200"><select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Release</option>
                        <option value="0">Plan</option>
                        </select></td>
              </tr>

              <tr>
                <td width="200"><small>Level Pendidikan</small></td>
                <td width="10">:</td>
                <td width="400"><select name="education_level" class="form-control">
                                                <option value="">--Pilih Level Pendidikan--</option>
                                                <?php 
                                                foreach($opt_education_level->result() as $rowedulevel){  echo "<option value=".$rowedulevel->education_level."> ".$rowedulevel->name."</option>" ;      
                                                }
                                                ?> 
                                            </select> </td>     
                <td>   </td>
                <td> </td>
              </tr>
        </table>

         <div class="panel-heading"><h6 class="panel-title">  Education Data</h6></div>           
         
        <table class="table table-striped"> 
            <tr>
                <td width="75"><small>Institusi</small></td>
                <td width="10">:</td>
                <td width="100"> <input type="text" name="education_institution" class="form-control"  > 
                <!--  <select name="education_institution" class="form-control">
                                                <option value="">--Pilih Institusi--</option>
                                                
                                                <?php 
                                                /*
                                                foreach($opt_insitution->result() as $rowins){  
                                               
                                                if($rowins->education_institution == $education_institution){
                                                      echo '<option value = '.$rowins->education_institution.' selected=> '.$rowins-> name.' </option>' ;
                                                      }else{
                                                      echo '<option value = '.$rowins->education_institution.'> '.$rowins-> name.' </option>' ;
                                                      } 
                                                }
                                                 
                                                 */
                                                ?> 
                                    </select>
                    --></td>
                <td width="75"><small>Lainnya</small></td>
                <td width="10">:</td>
                <td width="100"><input type="text" name="education_institution_name" class="form-control"  ></td>
            </tr>
            <tr>
                <td width="75"><small>Lokasi</small></td>
                <td width="10">:</td>
                <td width="100"> <input type="text" name="location" class="form-control"  > </td>
                <td width="75"><small>Negara</small></td>
                <td width="10">:</td>
                <td width="100">
                                    <select name="country" class="form-control">
                                                <option value="">--Pilih Negara--</option>
                                                <?php 
                                                foreach($opt_country->result() as $rowcountry){  echo "<option value=".$rowcountry->country."> ".$rowcountry->name."</option>" ;      
                                                }
                                                ?> 
                                    </select>
                    
                </td>
            </tr>
            <tr>
                <td width="75"><small>Fakultas</small></td>
                <td width="10">:</td>
                <td width="100"> <input type="text" name="faculty" class="form-control"  >  </td>
                <td width="75"><small>Jurusan</small></td>
                <td width="10">:</td>
                <td width="100"><input type="text" name="major" class="form-control"  > </td>
            </tr>
            <tr>
                <td width="75"><small>No.Sertifikat</small></td>
                <td width="10">:</td>
                <td width="100"> <input type="text" name="certificate_no" class="form-control"  >  </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td width="75"><small>IPK/Nilai</small></td>
                <td width="10">:</td>
                <td width="100"> <input type="text" name="gpa" class="form-control"  > </td>
                <td width="75"><small>Grade</small></td>
                <td width="10">:</td>
                <td width="100"><input type="text" name="grade" class="form-control"  ></td>
            </tr>
            <tr>
                <td width="75"><small>Keterangan</small></td>
                <td width="10">:</td>
                <td colspan="4" width="100%"> <textarea name="remarks" class="form-control"> </textarea> </td>
             
            </tr>
        </table>
         
      

          
        </div>

