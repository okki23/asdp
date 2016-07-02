<?php $this->load->view('header-template');?>
		
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/themes/icon.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/jquery.easyui.min.js"></script>

	<div id="toolbar">
		<!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addTab('New Organization','orm/add')">New</a>-->
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="NewOrm()">New</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="EditOrm()">Edit</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="Destroy()">Delete</a>
		<a href="#" class="easyui-linkbutton" plain="true" onclick="progress()" iconCls="icon-reload">Refresh</a>
		<a href="#" class="easyui-linkbutton" plain="true" onclick="location.href='dashboard';" iconCls="icon-home">Home</a>
	</div>
	
    <div class="easyui-layout" data-options="fit:true,border:false">
		
	<!--<div id="menu" region="west" split="false" hideCollapsedContent="false" title="Struktur Organization" style="width:30%;">-->
	<!--<div data-options="region:'west',split:true,hideCollapsedContent:false" title="Main Menu" style="width:210px;">-->
	<div data-options="region:'west',split:true,hideCollapsedContent:false"  style="width:40%;height:100%;">
	
        <table id="tbl" class="easyui-treegrid" data-options="fit:true,border:false" 
			url="orm/data"
			rownumbers="true"
			idField="code" treeField="name"
			toolbar="#toolbar" 
			fitColumns="false" singleSelect="true" >
		<thead>
			<tr>
				<th field="name" width="250">Name</th>
				<th field="code" width="100" align="left">Kode</th>
				<th field="area" width="50" align="center">Tipe</th>
				<!--<th field="total" width="150" align="right" formatter="formatDollar">Pusat/Cabang</th>-->
			</tr>
		</thead>
	</table>
    </div>
	<div data-options="region:'center',split:true,border:false" style="width:60%;">
    <div id="tt" class="easyui-tabs" fit="true" style="height:100%;">
		
	</div>
	</div>

	
	
	</div>
	
	<script type="text/javascript">
	var editIndex = undefined;
		function progress(){
            var win = $.messager.progress({
                title:'Please waiting',
                msg:'Loading data...'
            });
            setTimeout(function(){
				$('#tbl').treegrid('reload');
                $.messager.progress('close');
            },1000)
			
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
		function NewOrm(){
			var row = $('#tbl').datagrid('getSelected');
			
			if (row){
				//progress2()
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				//p.panel('refresh');
				progress();
				getTab('New Organization','orm/add/'+row.code);
				//url = 'update_user.php?id='+row.id;
			}else{
				//$.messager.alert('Information','Silakan pilih data ditabel dulu');
				getTab('New Organization','orm/add/');
			}
		}
		function EditOrm(){
			var row = $('#tbl').datagrid('getSelected');
			
			if (row){
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				//p.panel('refresh');
				progress2();
				getTabs('Edit Organization','orm/edit/'+row.code);
				//url = 'update_user.php?id='+row.id;
			}else{
				$.messager.alert('Information','Silakan pilih data ditabel dulu');
			}
		}
		function getTab(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
				$('#tt').tabs('close', title);
				//$('#tt').panel('refresh');
				progress2();
				NewOrm();
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:500px;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
				
			}
		}
		function getTabs(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
				$('#tt').tabs('close', title);
				progress2();
				EditOrm();
				//var p = $('#tt').tabs('getTab', 0);  // get the first tab panel
				//p.panel('refresh');
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:500px;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
				
			}
		}
	function Destroy(){
			var row = $('#tbl').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to delete this record?',function(r){
					if (r){
						$.post('orm/delete/'+row.code,{code:row.code},function(result){
							progress()
								$.messager.show({	// show error message
									title: 'Information',
									msg: 'Delete Success'
								});
							//$('#tbl').datagrid('reload');
						},'json');
					}
				});
			}else{
				$.messager.alert('Information','Silakan pilih data ditabel dulu');
			}
		}
	</script>
	<script>
$(document).ready(function() {
    var panels = $('#menu').accordion('panels');
    $.each(panels, function() {
        this.panel('collapse');
    });
});
</script>
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
		
		function addTab(title, url){
			if ($('#tt').tabs('exists', title)){
				$('#tt').tabs('select', title);
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#tt').tabs('add',{
					title:title,
					content:content,
					closable:true
				});
			}
		}
	</script>
	