<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/icon.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.easyui.min.js"></script>

</head>	
	<?php 
					     foreach ($data_employee->result() as $row) {
					     	 	$kodecp = $row->kodecp;
								$kode = $row->code;
								$parentcode = $row->code;
					     	 	//$parentcode = $row->parentId;
					     	 	$parentname = $row->name;
								$area = $row->area;
								$datenow = date('d-m-Y');
								$enddate = '31-12-9999';
								if($area == 'D'){
									//echo 1;
									$select0 = '';
									$select1 = 'selected=selected';
									$select2 = '';
								}elseif($area == 'L'){
									//echo 2;
									$select0 = '';
									$select1 = '';
									$select2 = 'selected=selected';
								}else{
									//echo 3;
									$select0 = '';
									$select1 = '';
									$select2 = '';
								}
								//$sql = "select name from core_orm where code='$parentcode'";
								//$rs =  $this->db->query($sql)->result();
								//	foreach ($rs as $r)
								//{
								//	$parentname = $r->name;
								//}
					     	 }
					     ?>
	
		<div class="ftitle">Setting Organization</div>
		<form action="<?php echo base_url();?>orm/save_add" method="post" novalidate>
		<input type=hidden name="id" value="">
			<!--<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Company:</label>
				<input name="company" value="<?php //echo $kodecp; ?>" data-options="prompt:'Company Code'" class="easyui-textbox" readonly>
			</div>-->
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Parent Code:</label>
				<input name="parentname" value="<?php echo $parentcode.'-'.$parentname; ?>" class="easyui-textbox" readonly style="width:250px;">
				<input type=hidden name="parentcode" value="<?php echo $parentcode; ?>">
				<!--<input id="cc" style="width:320px;" class="easyui-combobox" name="parentcode" data-options="prompt:'Parent Code',valueField:'code',textField:'name',url:'{$link}orm/datacombo'" >-->
				</div>
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Organization:</label>
				<input name="code" value="<?php echo $kode; ?>" data-options="prompt:'Code'" class="easyui-textbox" required="true"> - <input data-options="prompt:'Name'" style="width:250px;" name="name" class="easyui-textbox" required>
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Tipe:</label>
				<!--<input name="area" class="easyui-textbox" value="{$area}">-->
				<select class="easyui-combobox" name="area" style="width:120px;">
				<option value='' <?php echo $select0;?>>Pilih</option>
                <option value='D' <?php echo $select1;?>>Darat</option>
                <option value='L' <?php echo $select2;?>>Laut</option>
            </select>
			</div>
			
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Periode:</label>
            <input style="width:100px;" name="datestart" value="<?php echo $datenow; ?>" class="easyui-datebox" > - 
            <input style="width:100px;" name="dateend" value="<?php echo $enddate; ?>" class="easyui-datebox" >
			</div>
			<button type="submit" class="easyui-linkbutton c6" iconCls="icon-ok">Save</button>
		</form>
	
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
	<script>	
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