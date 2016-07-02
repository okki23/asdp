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
					<h3>Update Data Pelatihan</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($data_bahasa->result() as $row) {
            /*
personnel_id
start_date
end_date
status_process
language
oral_grade
written_grade
 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $language = $row->language;
            $oral_grade = $row->oral_grade;
            $written_grade = $row->written_grade;
             
        }
        ?>
                
             
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('kemampuan_bahasa/kemampuan_bahasa_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Kemampuan Bahasa </h6></div>
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
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>" > </td>
                <td> Status: </td>
                <td><select class="form-control" name="status_process" placeholder="Status">
                       
                        <option value="1" <?php if($status_process == '1') {echo "selected=selected";} ?> >Release</option>
                        <option value="0"  <?php if($status_process == '0') {echo "selected=selected";} ?>>Plan</option>
                        </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Bahasa</small> </td>
                <td> : </td>
                <td> 
                        <select class="form-control" name="language">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_tipe_bahasa->result() as $rowlanguage){  
                              if($rowlanguage->language == $language){
                                  echo "<option value=".$rowlanguage->language." selected=selected> ".$rowlanguage->name."</option>" ; 
                              }else{
                                 echo "<option value=".$rowlanguage->language."> ".$rowlanguage->name."</option>" ;  
                              }
                                 
                            }
                            ?> 
                        </select>
                </td>
                
                <td colspan="6"></td>
            </tr>
             
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Kemampuan Bahasa</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Oral Grade</small> </td>
                <td> : </td>
                <td> 
                    <select class="form-control" name="oral_grade">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_level_bahasa->result() as $rowlvlanguage){ 
                            if($rowlvlanguage->learning_grade == $oral_grade){
                                echo "<option value=".$rowlvlanguage->learning_grade." selected=selected> ".$rowlvlanguage->name."</option>" ;   
                            }else{
                                echo "<option value=".$rowlvlanguage->learning_grade."> ".$rowlvlanguage->name."</option>" ;   
                            }
                               
                            }
                            ?> 
                    </select>
                </td>
                 
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Written Grade</small> </td>
                <td> : </td>
                <td> 
                    <select class="form-control" name="written_grade">
                        <option value="">--Pilh--</option>
                           <?php 
                            foreach($opt_level_bahasa->result() as $rowlvlanguage){ 
                            if($rowlvlanguage->learning_grade == $written_grade){
                                echo "<option value=".$rowlvlanguage->learning_grade." selected=selected> ".$rowlvlanguage->name."</option>" ;   
                            }else{
                                echo "<option value=".$rowlvlanguage->learning_grade."> ".$rowlvlanguage->name."</option>" ;   
                            }
                               
                            }
                            ?>  
                    </select>
                </td>
                
                
                
                <td colspan="6"> </td>
            </tr>
            
        </table>


          
        </div>
