<?php $this->load->view('header-template');?>

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
					<h3>Update Data Fasilitas</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($data_facility->result() as $row) {
            /*
 
personnel_id
start_date
end_date
status_process
facility_type
 
facility_owner
brand
serial_no
facility_currency
facility_value
remarks

 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $facility_type = $row->facility_type;
            $facility_owner = $row->facility_owner;
            $brand = $row->brand;
            $serial_no = $row->serial_no;
            $facility_currency = $row->facility_currency;
            $facility_value = $row->facility_value;
            $remarks = $row->remarks;
            
                       
        }
        ?>
                
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('fasilitas/fasilitas_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data Fasilitas </h6></div>
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
                <td> Status: </td>
                <td> <select class="form-control" name="status_process" placeholder="Status">
                       <option value="">--Pilih Status--</option>
                        <option value="1" <?php if($status_process == '1') {echo "selected=selected";} ?> >Release</option>
                        <option value="0"  <?php if($status_process == '0') {echo "selected=selected";} ?>>Plan</option>
                        </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Tipe Fasilitas</small> </td>
                <td> : </td>
                <td> 
                        <select class="form-control" name="facility_type">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_tipe_fasilitas->result() as $rowfacility){  
                                if($rowfacility->facility_type == $facility_type){
                                     echo "<option value=".$rowfacility->facility_type." selected=selected> ".$rowfacility->name."</option>" ;      
                                }else{
                                     echo "<option value=".$rowfacility->facility_type."> ".$rowfacility->name."</option>" ;      
                                }
                           
                            }
                            ?> 
                        </select>
                </td>
                
                <td colspan="6"></td>
            </tr>
            
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Fasilitas</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Pemilik Fasilitas</small> </td>
                <td> : </td>
                <td> <input type="text" name="facility_owner" class="form-control" value="<?php echo $facility_owner;?>"> </td>   
                <td colspan="6"></td>
            </tr>
             
            <tr>
                <td> <small>Brand</small> </td>
                <td> : </td>
                <td> <input type="text" name="brand" class="form-control" value="<?php echo $brand;?>"> </td>   
                <td colspan="6"></td>
            </tr>
           <tr>
                <td> <small>No.Serial</small> </td>
                <td> : </td>
                <td> <input type="text" name="serial_no" class="form-control" value="<?php echo $serial_no;?>"> </td>   
                <td colspan="6"></td>
            </tr>
           <tr>
                <td> <small>Nilai Fasilitas</small> </td>
                <td> : </td>
                <td> <input type="text" name="facility_value" class="form-control" value="<?php echo $facility_value;?>"> </td>   
                <td> <input type="text" name="facility_currency" class="form-control" value="<?php echo $facility_currency;?>"> </td>
               
                <td colspan="5"></td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control"> <?php echo $remarks;?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

