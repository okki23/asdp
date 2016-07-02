<?php
/* Smarty version 3.1.29, created on 2016-06-06 05:28:06
  from "C:\xampp\htdocs\asdp\application\views\templates\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5754edc6d10387_34353007',
  'file_dependency' => 
  array (
    '0724329792f2859494788ef654686b5206696b4d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\asdp\\application\\views\\templates\\home.tpl',
      1 => 1465048368,
      2 => 'file',
    ),
    '75d95befbe0db49b4def3d5f573a3c92966ac4d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\asdp\\application\\views\\templates\\header.tpl',
      1 => 1465048450,
      2 => 'file',
    ),
    'ce98d7b9a0f826c67099457a3462d16827ebab0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\asdp\\application\\views\\templates\\topmenu.tpl',
      1 => 1464241597,
      2 => 'file',
    ),
    'ccda412241d3d803f3991100f700b374afd44d5e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\asdp\\application\\views\\templates\\rightmenu.tpl',
      1 => 1464677922,
      2 => 'file',
    ),
    'f7e5f5f049f8779df812402faaeb393d162c36cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\asdp\\application\\views\\templates\\footer.tpl',
      1 => 1463550816,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5754edc6d10387_34353007 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Human Resource Information System (HRIS) ASDP</title>
	<link rel="stylesheet" type="text/css" href="../assets/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../assets/themes/icon.css">
	<script type="text/javascript" src="../assets/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/jquery.easyui.min.js"></script>
</head>
<script>
		function addTab(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
			} else {
				progress2()
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}
		function progress2(){
            var win = $.messager.progress({
                title:'Please waiting',
                msg:'Loading data...'
            });
            setTimeout(function(){
				//$('#tbl').treegrid('reload');
                $.messager.progress('close');
            },1000)
			
        }
	</script>
<!--
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="http://placehold.it/300">
					<span>yasirwan</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="password.php"><i class="icon-key"></i> Change Password</a></li>
					<li><a href=".."><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>-->
	<!-- /navbar -->
<script>
$(document).ready(function() {
    var panels = $('#menu').accordion('panels');
    $.each(panels, function() {
        this.panel('collapse');
    });
});

</script>
	<body>
	<div class="easyui-layout" data-options="fit:'true'">
		<div data-options="region:'north',split:true" title="PT ASDP Indonesia Ferry (Persero)" style="height:90px">
		<div style="float: left; margin: 10px;"><img src="../images/logo.png" alt="HRIS-INDONESIA FERRY "></a></div>
		<div style="float: right; margin: 10px;">
		<div>
		<a href="#" class="easyui-menubutton" menu="#user-menu" iconCls="icon-man">yasirwan</a>
		<a href="#" class="easyui-menubutton" menu="#help-menu" iconCls="icon-help">Help</a>
		</div>
		<div id="user-menu" style="width:150px;">
    <div>Change Password</div>
    <div>Information User</div>
    <div class="menu-sep"></div>
	<div><a href="http://localhost/asdp/auth/logout" >Logout</a></div>
</div>
<div id="help-menu" style="width:100px;">
    <div>Help</div>
    <div>About</div>
</div></div>
</div>
		<div data-options="region:'east',split:true,hideCollapsedContent:false,collapsed:true" title="Panel Information" style="width:180px;">
			<ul class="easyui-tree" data-options="url:'tree_data1.json',method:'get',animate:true,dnd:true"></ul>
			<div style="width:200px;height:auto;background:#7190E0;padding:5px;">
    <div class="easyui-panel" title="Info Pensiun Pegawai" collapsible="true" style="width:200px;height:auto;padding:10px;">
        5 Pegawai Tahun Ini
    </div>
    <br/>
    <div class="easyui-panel" title="Info Ultah Pegawai" collapsible="true" style="width:200px;height:auto;padding:10px;">
        3 Pegawai Bulan Ini<br/>
    </div>
    <br/>
   
    <div class="easyui-panel" title="Info Pengajuan Cuti" collapsible="true" style="width:200px;height:auto;padding:10px;">
        10 Pegawai Mengajukan Cuti
    </div>
</div><!--"-->
		</div>
		
		<div data-options="region:'west',split:true,hideCollapsedContent:false" title="Main Menu" style="width:210px;">
			<div id="menu" class="easyui-accordion" data-options="fit:true,border:false">
				<div title="Master" style="padding:10px;" data-options="selected:false" >
				<div class="easyui-panel" style="padding:5px">
			<ul class="easyui-tree" >
                   <!-- <li><a href="#" onclick="addTab('Pegawai','http://localhost/asdp/pegawai')">Pegawai</a></li>-->
			</ul>
			</div>
				</div>
				<div title="Organization Management" style="padding:10px;">
					<ul class="easyui-tree" >
                    <li><a href="#" onclick="addTab('Organization Management','http://localhost/asdp/orm')">Organization Management</a></li>
					</ul>
				</div>
				<div title="Personal Administration" style="padding:10px;">
					<ul class="easyui-tree" >
                    <li><a href="#" onclick="addTab('Employee Management','http://localhost/asdp/pegawai')">Employee Management</a></li>
					</ul>
				</div>
				<div title="Key Performance Indicator (KPI)"  style="padding:10px;">
					<!--<a href="#" class="easyui-linkbutton" onclick="addTab('jquery','http://jquery.com/')">jquery</a>-->
				</div>
				<div title="Competency" style="padding:10px">
					<!--<a href="#" class="easyui-linkbutton" onclick="addTab('easyui','http://jeasyui.com/')">easyui</a>-->
				</div>
			</div>
		</div>
		<div data-options="region:'center',title:'Dashboard',iconCls:'icon-ok'">
			<div id="tt" class="easyui-tabs" data-options="fit:true,border:false,plain:false" >
		<div title="Home">
		</div>
	</div>
		</div>

	        <div data-options="region:'south',split:true" style="height:50px;">
		PT Langit Infotama</div>
	</div>
</body>
</html>
		   
		   <?php }
}
