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
					<h3>Update Data Komunikasi</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($data_com->result() as $row) {
            /*
 
personnel_id
start_date
end_date
status_process
communication_type
 
communication_id
phone_country
phone_area
phone_no
phone_extension

 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $communication_type = $row->communication_type;
            $communication_id = $row->communication_id;
            $phone_country = $row->phone_country;
            $phone_area = $row->phone_area;
            $phone_no = $row->phone_no;
            $phone_extension = $row->phone_extension;
            
                       
        }
        ?>
                
         
              
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('komunikasi/komunikasi_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Update Data Komunikasi </h6></div>
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
                <td> <small>Communication Type</small> </td>
                <td> : </td>
                <td> 
                        <select class="form-control" name="communication_type">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_tipe_komunikasi->result() as $rowcom){  
                            if($rowcom->communication_type == $communication_type){
                                echo "<option value=".$rowcom->communication_type." selected=selected> ".$rowcom->name."</option>" ;   
                            }else{
                                echo "<option value=".$rowcom->communication_type."> ".$rowcom->name."</option>" ;      
                            }
                               
                            }
                            ?> 
                        </select>
                </td>
                
                <td colspan="6"></td>
            </tr>
             
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Komunikasi </h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>Telepon</small> </td>
                <td> : +</td>
               
                
                <td> <input type="text" name="phone_country" class="form-control" value="<?php echo $phone_country;?>"> </td>
                <td><input type="text" name="phone_area" class="form-control" value="<?php echo $phone_area;?>"> </td>
                <td><input type="text" name="phone_no" class="form-control" value="<?php echo $phone_no;?>"> </td>
               <td>- </td>
               <td><input type="text" name="phone_extension" class="form-control" value="<?php echo $phone_extension;?>"> </td>
                
               <td colspan="2"></td>
            </tr>
            <tr>
                <td> <small>ID Komunikasi</small> </td>
                <td> : </td>
                <td> <input type="text" name="communication_id" class="form-control" value="<?php echo $communication_id;?>">  </td>
                
                
                
                <td colspan="6"> </td>
            </tr>
             
        </table>


          
        </div>

