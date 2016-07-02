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
		 
		 <div class="easyui-layout" data-options="fit:true">
                <div data-options="region:'north',split:true,hideCollapsedContent:false" title="Overview" style="height:185px">
				<!--<div class="ftitle">Edit Pegawai</div>-->
<?php 
					     foreach ($data_employee->result() as $row) {
					     	 	$personnel_id = $row->personnel_id;
					     	 	$start_date = $row->start_date;
					     	 	$name_full = $row->name_full;
								$thn = substr($start_date,0,4);
								$bln = substr($start_date,4,2);
								$tgl = substr($start_date,6,2);
								$tglmasuk = $tgl.'-'.$bln.'-'.$thn;
								$photo = base_url()."images/10001495.jpg";
								if(!empty($photo)){
									$foto = $photo;
								}else{
									$foto = "images/people.png";
								}
								
					     	 }
					     ?>
		<div class="easyui-layout" style="width:100%;height:150px;">
		<div region="west" border=0 style="width:140px;">				 
		<center>
		<img style="margin-top:10px;width:110px;height:130px;border:2px solid silver;" src="<?php echo $photo;?>">
		</center>
		</div>
		<div id="content" region="center"  fit="true" style="padding:5px;border-top:0;border-bottom:0;">
    
		<form method="post" action="<?php echo base_url();?>pegawai/pro_update_pegawai" role="form" style="margin-left:5px;margin-top:5px;">
			<div class="fitem" style="font-size:10px;">
				<label style="width:80px;">NIK</label>
				: <input name="nik" value="<?php echo $personnel_id;?>" class="easyui-textbox" readonly="readonly">
				<label style="width:70px;">Jabatan</label>
				: <input name="jabatan" class="easyui-textbox" style="width:210px;" readonly="readonly">
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:80px;">Nama</label>
				: <input name="nama" class="easyui-textbox" required="true" value="<?php echo $name_full;?>">
				<label style="width:70px;">TTL</label>
				: <input style="width:110px;" name="tempat" class="easyui-textbox" > - <input style="width:90px;" name="tgllahir" class="easyui-datebox" >
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:80px;" >Tanggal Masuk</label>
				: <input name="tanggal_masuk" value="<?php echo $tglmasuk;?>" class="easyui-datebox" required="true">
				<label style="width:70px;">Wilayah</label>
				: <input style="width:100px;" name="wilayah" class="easyui-textbox" > - <input style="width:100px;" name="status" class="easyui-textbox" >
			</div>
			<div class="fitem" style="font-size:10px;">
				<label style="width:80px;" >Unit Kerja</label>
				: <input name="tanggal_masuk" class="easyui-textbox" >
				<label style="width:70px;" >Golongan</label>
				: <input name="golongan" class="easyui-textbox" style="width:50px;">
			</div>
			<button type="submit" class="easyui-linkbutton c6" iconCls="icon-ok">Save</button>
		</form>
		</div>
				</div>
				</div>
                <div data-options="region:'west',split:true" style="width:140px">
				<ul class="easyui-datalist" title="Master Data" border=0 fit="true" lines="true" style="width:140px;height:250px">
		<li ><a href="javascript:void(0)" plain="true" onclick="getTabs('Data Personal','<?php echo base_url();?>data_pribadi/data_pribadi_detail/<?php echo $personnel_id;?>')">Data Personal</a></li>
		<li>Riwayat Jabatan</li>
		<li><a href="javascript:void(0)" plain="true" onclick="getTabs('Riwayat Penugasan','<?php echo base_url();?>penugasan/penugasan_detail/<?php echo $personnel_id;?>')">Riwayat Penugasan</a></li>
		<li value="AR">Riwayat Pekerjaan</li>
		<li value="CA">Aktivitas Seleksi</li>
		<li value="CO">Data Keluarga</li>
		<li value="CT">Data Alamat</li>
		<li value="DE">Data Komunikasi</li>
		<li value="FL">Dokumen Identitas Pribadi</li>
		<li value="GA">Pendidikan Formal</li>
		<li value="HI">Data Pelatihan</li>
		<li value="ID">Penghargaan</li>
		<li value="IL">Hukuman</li>
		<li value="IL">Fasiltas Dinas</li>
		<li value="IL">Penguasaan Bahasa</li>
		<li value="IL">Buku Pelaut</li>
		<li value="IL">Endorsment</li>
		<li value="IL">Medical Check Up</li>
		<li value="IL">Foto</li>
		<li value="IL">Lampiran Dosir</li>
	</ul>
				</div>
                <div data-options="region:'center',border:false">
				<div id="tta" class="easyui-tabs" fit="true">
		
				</div>
				</div>
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
<script>	
function getTabs(title, url){
			if ($('#tta').tabs('exists', title)){
				$('#tta').tabs('select', title);
				//$('#tt').tabs('close', title);
				//progress();
				//editUser();
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				//p.panel('refresh');
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tta').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
				
			}
		}
		/*
        function myformatter(date){
            var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
        }
        function myparser(s){
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
        }
    */
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
		function ImportPhoto(){
			
				$('#ff').form({
				url:'pegawai/importphoto/',
				onSubmit:function(){
					return $(this).form('validate');
				},
				success:function(data){
					$.messager.alert('Info', data, 'info');
				}
			});
				
			
		}
</script>		
