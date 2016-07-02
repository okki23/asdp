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
 

<body >
<div class="ftitle">New Pegawai</div>

		<form action="pegawai/pro_add_pegawai" method="post" novalidate>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;" >NIK</label>
				: <input name="nik" class="easyui-textbox" required="true">
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;" >Nama</label>
				: <input name="nama" class="easyui-textbox" required="true">
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:120px;">Tanggal Masuk</label>
				: <input name="tanggal_masuk" class="easyui-datebox"  required="true">
			</div>
			<button type="submit" class="easyui-linkbutton c6" iconCls="icon-ok">Save</button>
		</form>
</body>
<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:12px;
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
</html>