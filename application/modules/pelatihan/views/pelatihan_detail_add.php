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
					<h3>Add Data Pelatihan</h3>
				</div>
			</div>
		 
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('pelatihan/pelatihan_detail_pro_add')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Pelatihan </h6></div>
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
                <td> <small>Kategori Kursus</small> </td>
                <td> : </td>
                <td> 
                        <select class="form-control" name="training_category">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_kategori_training->result() as $rowtraincat){  
                            echo "<option value=".$rowtraincat->training_category."> ".$rowtraincat->name."</option>" ;      
                            }
                            ?> 
                        </select>
                </td>
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Tipe  Kursus</small> </td>
                <td> : </td>
                <td> <input type="checkbox" name="training_type_by_catalog" value="1"> Dari Katalog </td>
                
                <td> <small>Nama</small> </td>
                <td> : </td>
                <td> <input type="text" name="training_type_name" class="form-control"> </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Kegiatan Pelatihan</small> </td>
                <td> : </td>
                <td> <input type="text" name="training_event_name" class="form-control"> </td>
                
                <td colspan="6"> </td>
            </tr>
             <tr>
                <td> <small>Periode</small> </td>
                <td> : </td>
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo date('d-m-Y');?>"  placeholder="Start Date"> </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $date_end;?>" placeholder="Start Date"> </td>
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
     

         <div class="panel-heading"><h6 class="panel-title">  Education Data</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Instansi  Kursus</small> </td>
                <td> : </td>
                <td> <input type="checkbox" name="training_institution_by_catalog" value="1"> By Katalog </td>
                
                <td> <small>Nama </small> </td>
                <td> : </td>
                <td>  <input type="text" name="training_institution_name" class="form-control"> </td>
                
                <td colspan="3"></td>
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
                <td> <small>Sertifikasi</small> </td>
                <td> : </td>
                <td> <input type="checkbox" name="certified" value="1"> Sertifikasi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; No : </td>
                <td> <input type="text" name="certificate_no" class="form-control" > </td>
                <td> Berlaku </td>
                <td> <input type="text" name="qualification_start_date" class="qualificationstartdate form-control" data-mask="99-99-9999" placeholder="Berlaku mulai" >  </td>
                <td> <input type="text" name="qualification_end_date" class="qualificationenddate form-control" data-mask="99-99-9999""  placeholder="Berlaku akhir" > </td>
                
                <td colspan="2"> </td>
            </tr>
           <tr>
                <td> <small>Skor</small> </td>
                <td> : </td>
                <td> <input type="text" name="score" class="form-control" >  </td>
                
                <td> <small>Grade</small> </td>
                <td> : </td>
                <td> <input type="text" name="grade" class="form-control" >  </td>
                
                <td colspan="3"> </td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

