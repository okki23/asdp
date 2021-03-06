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
					<h3>Update Data Pelatihan</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($data_endorsment->result() as $row) {
            /*
personnel_id
start_date
end_date
status_process
endorsment_no
authority
remark

 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $endorsment_no = $row->endorsment_no;
            $authority = $row->authority;
            $remark = $row->remark;
             
        }
        ?>
                
         
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('endorsement/endorsement_detail_pro_update')?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Ubah Data Endorsement </h6></div>
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
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo $start_date ;?>" > </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>" > </td>
                <td> Status: </td>
                <td> <select class="form-control" name="status_process" placeholder="Status">
                        <option value="">--Pilih Status--</option>
                        <option value="1" <?php if($status_process == '1') {echo "selected=selected";} ?> >Release</option>
                        <option value="0"  <?php if($status_process == '0') {echo "selected=selected";} ?>>Plan</option>
                        </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Endorsement Detail</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>No.Endorsment</small> </td>
                <td> : </td>
                <td> <input type="text" name="endorsment_no" class="form-control" value="<?php echo $endorsment_no;?>"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Kewenangan</small> </td>
                <td> : </td>
                <td> <input type="text" name="authority" class="form-control" value="<?php echo $authority; ?>"> </td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remark" class="form-control"> <?php echo $remark; ?> </textarea> </td>
                <td colspan="6"></td>
            </tr>
              
        </table>


          
        </div>

