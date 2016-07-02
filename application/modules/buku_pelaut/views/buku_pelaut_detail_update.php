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
					<h3>Update Data Buku Pelaut</h3>
				</div>
			</div>
                
                 <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($data_bulaut->result() as $row) {
            /*
personnel_id
start_date
end_date
status_process
book_no
place_of_issued
country
remarks

 */          
            $personnel_id = $row->personnel_id;
            $start_date = $row->tanggalstart;
            $end_date = $row->tanggalend;
            $status_process = $row->status_process;
            $book_no = $row->book_no;
            $place_of_issued = $row->place_of_issued;
            $country = $row->country;
            $remarks = $row->remarks;
                     
        }
        ?>
                
 
             
    		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url('buku_pelaut/buku_pelaut_detail_pro_update');?>">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Pelaut </h6></div>
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
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $end_date;?>" placeholder="End Date"> </td>
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
     

         <div class="panel-heading"><h6 class="panel-title">  Buku Pelaut Data</h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>No.Buku</small> </td>
                <td> : </td>
                <td> <input type="text" name="book_no" class="form-control" value="<?php echo $book_no; ?>"> </td>
                
                 
                
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Tempat Dikeluarkan</small> </td>
                <td> : </td>
                <td> <input type="text" name="place_of_issued" class="form-control" value="<?php echo $place_of_issued; ?>"> </td>
                
                 
                
                <td colspan="6"></td>
            </tr>
            <tr>
                 
                
                <td> <small>Negara</small> </td>
                <td> : </td>
                <td> <select class="form-control" name="country">
                    <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_country->result() as $rowcountry){
                            if($rowcountry->country == $country){
                               echo "<option value=".$rowcountry->country." selected=selected> ".$rowcountry->name."</option>" ;      
                            }else{
                               echo "<option value=".$rowcountry->country."> ".$rowcountry->name."</option>" ;       
                            }
                            
                            }
                            ?>  
                    </select>
                </td>
                
                <td colspan="6"> </td>
            </tr>
             
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control"> <?php echo $remarks; ?> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

