<?php $this->load->view('header-template');?>

<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data User</h3>
				</div>
			</div>
		<!-- /sidebar -->
     
               <a href="user/add_user" class="btn btn-xs btn-primary">Add</a><p>
<div id="grid" style="width: 100%; height: 400px;"></div>
<div id="containers" style="width: 500px; height: 300px; margin: 0 auto"></div>
</body>



<script type="text/javascript">	
$(function () {    
    $('#grid').w2grid({ 
        name: 'grid', 
		recid: 'user_id',
        show: { 
            toolbar: true,
            footer: true,
           // toolbarAdd: true,
           // toolbarDelete: true,
           // toolbarSave: true,
           // toolbarEdit: true,
			selectColumn: true
        },
		
        searches: [                
            { field: 'user_id', caption: 'ID', type: 'text' },
            { field: 'logon_success_last_date', caption: 'Last Login', type: 'text' },
            { field: 'status', caption: 'Status', type: 'text' }
            
        ],
        columns: [                
            { field: 'user_id', caption: 'ID', size: '200px', sortable: true, attr: 'align=left' },
            { field: 'logon_success_last_date', caption: 'Last Login', size: '10%', sortable: true },
            { field: 'status', caption: 'Status', size: '200px', sortable: true, attr: 'align=left' },
             { field: 'opsi', caption: 'Option', size: '5%', sortable: true, attr: 'align=center'},
            //{ field: 'opsiupdate', caption: 'Opsi Update', size: '5%', sortable: true },
            //{ field: 'opsidetail', caption: 'Opsi Detail', size: '5%', sortable: true }
        ],


        onAdd: function (event) {
             // w2ui['form'].url = 'user/add_user';
           //w2alert('<?php echo base_url();?>user/add_pegawai');
            //w2popup.load({ url: '<?php echo base_url();?>user/add_pegawai' });
            //w2ui['layout'].url = '<?php echo base_url();?>user/add_pegawai';
            //w2ui['layout'].refresh();
        //w2popup.load({ url: '<?php echo base_url();?>user/add_pegawai' });
        },
        onEdit: function (event) {
            w2alert('edit');
        },
        onDelete: function (event) {
            console.log('delete has default behaviour');
        },
        onSubmit: function (event) {
            w2alert('save');
        }
    });    
	 w2ui['grid'].load('user/get_all_user_json');
	 //w2ui['grid'].select(10000004);
});
</script>
</div>
</div>
</html>	