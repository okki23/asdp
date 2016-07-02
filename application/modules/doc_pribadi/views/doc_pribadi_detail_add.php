<?php $this->load->view('header-template');
date_default_timezone_set("Asia/Jakarta");?>
 
       
 
 
 
 <script type="text/javascript">
       $(function(){
    $('.startdate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val();
    $('.enddate').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy' }).val(); 
      });
   function init(){
        
var bHaveFileAPI = (window.File && window.FileReader);

    if(!bHaveFileAPI){
      alert('browser tidak suport API HTML!');
      return;
    }
    document.getElementById('files').addEventListener('change', onFileChanged); 
}
function onFileChanged(theEvt){
  var thefile = theEvt.target.files[0];

  document.getElementById("filename").value = thefile.name;
  document.getElementById("filesize").value = thefile.size;
  document.getElementById("filetype").value = thefile.type;
 
}
window.addEventListener("load",init);

	</script>
 
 	<div class="page-container">
            <?php $this->load->view('sidebar-template-personal',$location);?>
            <div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Add Data Dokumen Pribadi</h3>
				</div>
			</div>
		 
                
              
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('doc_pribadi/doc_pribadi_detail_pro_add')?>" enctype="multipart/form-data">

			 <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >
	 
		        <div class="panel panel-default">
			        <div class="panel-heading"><h6 class="panel-title">  Form Tambah Data Dokumen Pribadi </h6></div>
	                <div class="panel-body">        
                     
</div>
                   <legend>
                <div class="form-actions text-left">
                <button type="submit" class="btn btn-primary"> <span data-icon="&#xe08d;"> </span> Simpan</button>
                        </div>
                </legend>
                

<div class="panel panel-tab">
    <div class="panel-heading"><h6 class="panel-title"> Key Data</h6></div>   
        <table class="table table-striped">  
            <tr>
                <td> <small>Periode</small> </td>
                <td> : </td>
                <td> <input type="text" name="start_date" class="startdate form-control" data-mask="99-99-9999" value="<?php echo date('d-m-Y');?>"  placeholder="Start Date"> </td>
                <td> <input type="text" name="end_date" class="enddate form-control" data-mask="99-99-9999" value="<?php echo $date_end;?>" placeholder="Start Date"> </td>
                <td>  </td>
                <td>  </td>
                
                <td colspan="6"> </td>
            </tr>
            <tr>
                <td> <small>Tipe Dokumen</small> </td>
                <td> : </td>
                <td> 
                        <select class="form-control" name="document_type">
                        <option value="">--Pilh--</option>
                            <?php 
                            foreach($opt_tipe_dokumen->result() as $rowdoctype){  
                            echo "<option value=".$rowdoctype->document_type."> ".$rowdoctype->name."</option>" ;      
                            }
                            ?> 
                        </select>
                </td>
                <td> <small>Seq</small> </td>
                <td> : </td>
                <td> <input type="text" name="seq" class="form-control">  </td>
                
                <td colspan="3"></td>
            </tr>
             
        </table>
     

         <div class="panel-heading"><h6 class="panel-title">  Data Dokumen </h6></div>                
         <table class="table table-striped">  
            <tr>
                <td> <small>No.Dokumen </small> </td>
                <td> : </td>
                <td>  <input type="text" name="document_no" class="form-control"> </td>
                    
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Judul </small> </td>
                <td> : </td>
                <td>  <input type="text" name="title" class="form-control"> </td>
                    
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Ditanda tangani Oleh </small> </td>
                <td> : </td>
                <td>  <input type="text" name="authority_officer" class="form-control"> </td>
                    
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>File </small> </td>
                <td> : </td>
                <td>  <input type="file" name="binary_data" class="form-control"  id="files" > </td>
                    
                <td colspan="6">  </td>
            </tr>
            <tr>
                <td> <small>Nama File </small> </td>
                <td> : </td>
                <td>  <input type="text" name="original_file_name" class="form-control" id="filename"> </td>
                    
                <td colspan="6"></td>
            </tr>
            <tr>
                <td> <small>Tipe File </small> </td>
                <td> : </td>
                <td>  <input type="text" name="mime_type" class="form-control" id="filetype"> </td>
                <td> <small>Ukuran </small> </td>
                <td> : </td>
                <td>  <input type="text" name="size" class="form-control" id="filesize"> </td>
                    
                <td colspan="6"></td>
            </tr>
             
             
            <tr>
                <td> <small>Keterangan</small> </td>
                <td> : </td>
                <td> <textarea name="remarks" class="form-control"> </textarea>  </td>
                
                 
                <td colspan="6"> </td>
            </tr>
        </table>


          
        </div>

