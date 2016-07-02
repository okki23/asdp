<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/icon.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.easyui.min.js"></script>

</head>	
	
		<div class="ftitle">Setting Organization</div>
		<form action="<?php echo base_url();?>orm/save_new" method="post" novalidate>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Organization:</label>
				<input name="code" data-options="prompt:'Code'" class="easyui-textbox" required="true"> - <input data-options="prompt:'Name'" style="width:250px;" name="name" class="easyui-textbox" required>
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Periode:</label>
            <input style="width:100px;" value="<? echo $data = date('d-m-Y');?>" name="datestart" class="easyui-datebox" > - 
            <input style="width:100px;" value="31-12-9999" name="dateend" class="easyui-datebox" >
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