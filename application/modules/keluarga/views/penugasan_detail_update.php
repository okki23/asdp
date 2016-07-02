<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/icon.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="http://localhost/asdp/assets/datagrid-filter.js"></script>
	


<body>
<div class="easyui-layout" data-options="fit:true,border:false" >

<div data-options="region:'west',split:false,hideCollapsedContent:false,singleSelect:true" collapsed="false" title="Update Penugasan" style="width:100%;">
        <?php
        date_default_timezone_set("Asia/Jakarta");

        foreach ($data_assignment->result() as $row) {
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
            $position = $row->position;
            $organization = $row->organization;
            $jabatan = $row->jabatan;
            $unit = $row->unit;
            $bagian = $row->bagian;
            $work_location = $row->work_location;
            $cost_center = $row->cost_center;
            $company = $row->company;
            $legal_letter_no = $row->legal_letter_no;
            $legal_date = $row->legal_date;
            $legal_effective_date = $row->legal_effective_date;
            $remark = $row->remark;
                      
        }
        ?>
        <form id="ff" method="post" action="<?php echo base_url('penugasan/penugasan_detail_pro_update')?>">

        <input type="hidden" name="personnel_id" value="<?php echo $personnel_id; ?>" >

        <fieldset>
            <legend> Key Data </legend>
            <table>
                <tr>    
                    <td> Periode </td>
                    <td> 
                        <input class="easyui-datebox"   type="text" name="start_date" value="<?php echo $start_date;?>" ></input> 
                    </td>
                    <td> 
                        <input class="easyui-datebox"   type="text" name="end_date"  value="<?php echo $end_date;?>" ></input> 
                    </td>
                    <td> Status </td>
                    <td> 
                        <select class="easyui-combobox" name="status_process">
                            <option value="">--Pilih--</option>
                            <option value="1" <?php if($status_process == '1') {echo "selected=selected";} ?> >Release</option>
                            <option value="0"  <?php if($status_process == '0') {echo "selected=selected";} ?>>Plan</option>
                        </select>
                    </td>
                </tr>
                <tr>    
                    <td> Tipe Penugasan Sementara </td>
                    <td colspan="2"> 
                        <select name="assignment_type" class="easyui-combobox">
                            <option value="">--Pilih--</option>
                            <?php 
                            foreach($opt_assignment_type->result() as $row){  
                                if($row->assignment_type == $assignment_type){
                                echo "<option value=".$row->assignment_type." selected=selected> ".$row->name."</option>" ;
                                }else{
                                echo "<option value=".$row->assignment_type."> ".$row->name."</option>" ;
                                }
                                     
                            }
                            ?> 
                        </select>

                     
                    </td>
                    <td>  Alasan </td>
                   
                    <td> 
                    <select name="assignment_reason" class="easyui-combobox">
                        <option value="">--Pilih--</option>
                        <?php
                        foreach ($opt_assignment_reason->result() as $rows) {

                            if($rows->assignment_reason == $assignment_reason){
                                echo "<option value=".$rows->assignment_reason." selected=selected> ".$rows->name."</option>" ;  

                            }else{
                                echo "<option value=".$rows->assignment_reason."> ".$rows->name."</option>" ;  

                            }
                              
                            }
                        ?>
                    </select>

                        
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend> Struktur Administrasi </legend>
            <table>
                <tr>    
                    <td> Tipe Karyawan </td>
                    <td colspan="2"> 
                        
                         <select name="employee_type" class="easyui-combobox">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($opt_employee_type->result() as $rowemployeetype) {

                                            if($rowemployeetype->employee_type == $employee_type)

                                            {
                                            
                                            echo "<option value=".$rowemployeetype->employee_type." selected=selected> ".$rowemployeetype->name."</option>" ;   
                                            
                                            }else{

                                            echo "<option value=".$rowemployeetype->employee_type."> ".$rowemployeetype->name."</option>" ;   

                                            }

                                                
                                                 
                                            }
                                            ?>
                                                
                                            </select>
                    </td>
                    <td> Sub Tipe </td>
                    <td colspan="2"> 
                      
                        <select name="employee_subtype" class="easyui-combobox">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($opt_employee_subtype->result() as $rowemployeestype) {

                                            if($rowemployeestype->employee_subtype == $employee_subtype){

                                                echo "<option value=".$rowemployeestype->employee_subtype." selected=selected> ".$rowemployeestype->name."</option>" ;

                                            }else{
                                                echo "<option value=".$rowemployeestype->employee_subtype."> ".$rowemployeestype->name."</option>" ;

                                            }

                                                
                                                 
                                            }
                                            ?>
                                                
                                            </select>

                    </td>                   
                </tr>
                <tr>    
                    <td> Area </td>
                    <td colspan="2"> 
                       <select name="employee_area" class="easyui-combobox">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($opt_employee_area->result() as $rowemployeearea) {

                                            if($rowemployeearea->employee_area == $employee_area){

                                            echo "<option value=".$rowemployeearea->employee_area." selected=selected> ".$rowemployeearea->name."</option>" ;

                                            }else{

                                            echo "<option value=".$rowemployeearea->employee_area."> ".$rowemployeearea->name."</option>" ;

                                            }


                                                                                        
                                            }
                                            ?>
                                                
                                            </select>
                    </td>
                    <td> Cabang </td>
                    <td colspan="2"> 
                     <select name="employee_office" class="easyui-combobox">
                                            <option value="">--Pilih--</option>
                                            <?php
                                            foreach ($opt_employee_cabang->result() as $rowemployeecabang) {
                                            
                                            if($rowemployeecabang->employee_office == $employee_office){

                                            echo "<option value=".$rowemployeecabang->employee_office." selected=selected> ".$rowemployeecabang->name."</option>" ;

                                            }else{
                                            echo "<option value=".$rowemployeecabang->employee_office."> ".$rowemployeecabang->name."</option>" ;

                                            }

                                               
                                                 
                                            }
                                            ?>
                                                
                                            </select>
                    </td>                   
                </tr>
                
            </table>
        </fieldset>
        <fieldset>
            <legend> Struktur Organisasi </legend>
            <table>
                <tr>    
                    <td> Posisi </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox"   type="text" name="position" value="<?php echo $position; ?>" ></input> 
                    </td>
                    <td> Organisasi </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox"   type="text" name="organization" value="<?php echo $organization; ?>"></input> 
                    </td>                   
                </tr>
                <tr>    
                    <td> Jabatan </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox" type="text" name="jabatan" value="<?php echo $jabatan; ?>"></input> 
                    </td>
                    <td> Unit Kerja </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox" type="text" name="unit" value="<?php echo $unit; ?>" ></input> 
                    </td>                   
                </tr>
                <tr>    
                    <td> Perusahaan </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox" type="text" name="company" value="<?php echo $company; ?>"></input> 
                    </td>
                    <td> Bagian </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox"   type="text" name="bagian" value="<?php echo $bagian; ?>" ></input> 
                    </td>                   
                </tr>
                <tr>    
                    <td> Cost Center </td>
                    <td colspan="2"> 
                        <input class="easyui-textbox"   type="text" name="cost_center" value="<?php echo $cost_center; ?>"></input> 
                    </td>
                    <td> Wilayah </td>
                    <td colspan="2"> 
                    <select name="work_location" class="easyui-combobox">
                        <option value="">--Pilih--</option>
                        <?php
                        foreach ($opt_employee_wilayah->result() as $rowemployeewilayah) {

                        if($rowemployeewilayah->work_location == $work_location){

                        echo "<option value=".$rowemployeewilayah->work_location." selected=selected> ".$rowemployeewilayah->name."</option>" ;

                        }else{

                        echo "<option value=".$rowemployeewilayah->work_location."> ".$rowemployeewilayah->name."</option>" ;

                        }
                           

                            }
                        ?>
                    </select>

                    </td>                   
                </tr>
                
            </table>
        </fieldset>
         <fieldset>
            <legend> Info Lainnya </legend>
            <table>
                <tr>    
                    <td> No SK  </td>
                    <td colspan="4"> 
                        <input class="easyui-textbox"   type="text" name="legal_letter_no" value="<?php echo $legal_letter_no; ?>"></input> 
                    </td>
                                 
                </tr>
                <tr>    
                    <td> Tanggal SK </td>
                    <td colspan="2"> 
                        <input class="easyui-datebox"   type="text" name="legal_date" value="<?php echo $legal_date; ?>"> </input> 
                    </td>
                    <td> Tanggal Berlaku </td>
                    <td colspan="2"> 
                        <input class="easyui-datebox"   type="text" name="legal_effective_date" value="<?php echo $legal_effective_date; ?>"></input> 
                    </td>                   
                </tr>
                <tr>    
                    <td> NIK  </td>
                    <td colspan="4"> 
                        <input class="easyui-textbox"   type="text" name="nik" value="<?php echo $personnel_id;?>" ></input> 
                    </td>
                          
                </tr>
                <tr>    
                    <td> Catatan  </td>
                    <td colspan="4"> 
                        <input class="easyui-textbox"   type="text" name="remark" value="<?php echo $remark; ?>"></input> 
                    </td>
                          
                </tr>
                
            </table>
        </fieldset>
             <div style="text-align:center;padding:5px">
          <button class="easyui-linkbutton" data-options="iconCls:'icon-save'"> Simpan</button>
        </div>
            
        </form>
      
        
	 
</div>
 

</body>
<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>

<script type="text/javascript">

        $.fn.datebox.defaults.formatter = function(date){
        var y = date.getFullYear();
        var m = date.getMonth()+1;
        var d = date.getDate();
        return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
        };

        $.fn.datebox.defaults.parser = function(s){
            if (!s) return new Date();
            var ss = s.split('-');
            var d = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var y = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        };


</script>

 
<script>
         var url;
		function progress(){
            var win = $.messager.progress({
                title:'Please waiting',
                msg:'Loading data...'
            });
            setTimeout(function(){
				$('#tbl').datagrid('reload');
                $.messager.progress('close');
            },0)
			
        }
		function editUser(){
			var row = $('#tbl').datagrid('getSelected');
			
			if (row){
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				//p.panel('refresh');
				
				getTab('Update Pegawai','pegawai/pegawai_update/'+row.personnel_id);
				//url = 'update_user.php?id='+row.id;
			}else{
				$.messager.alert('Information','Silakan pilih data ditabel dulu');
			}
		}
               function saveUser(){
            $('#fm').form('submit',{
                url: '<?php echo base_url('data_pribadi/data_pribadi_update_pro_selected');?>',
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }



		function getTab(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
				$('#tt').tabs('close', title);
				progress();
				editUser();
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				//p.panel('refresh');
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
				
			}
		}
		
    $(function(){
		//var dg = $('#tbl').datagrid();
         //dg.datagrid('enableFilter');
		 //$('#tbl').datagrid('enableFilter');
      $('#tbl').datagrid({
        onClickRow:function(){
        	//$('#tt').tabs('close', title);
			editUser();
		 // $('#tt').tabs('refresh');
        }
      });
	  var dg = $('#tbl').datagrid();
			dg.datagrid('enableFilter');
    });
	
    function checkData(){
        $('#tt').tabs('close',1);
    }

    function doSearch(){
    $('#tbl').datagrid('load',{
        itemid: $('#itemid').val(),
        productid: $('#productid').val()
    });

    
}
	</script>



