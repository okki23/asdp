<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data Pribadi </h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="pegawai/add_pegawai" class="btn btn-xs btn-primary">Add</a><p>
<div id="grid" style="width: 100%; height: 400px;"></div>
<div id="containers" style="width: 500px; height: 300px; margin: 0 auto"></div>
</body>
<script type="text/javascript">	
$(function () {    
    $('#grid').w2grid({ 
        name: 'grid', 
		recid: 'personnel_id',
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
            { field: 'personnel_id', caption: 'Last Name', type: 'text' },
            { field: 'name_full', caption: 'First Name', type: 'text' },
            
        ],
        columns: [                
            { field: 'personnel_id', caption: 'ID', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'name_full', caption: 'Last Name', size: '30%', sortable: true },
            { field: 'start_date', caption: 'Tanggal Masuk', size: '30%', sortable: true },
            { field: 'opsi', caption: 'Option', size: '5%', sortable: true, attr: 'align=center'},
            //{ field: 'opsiupdate', caption: 'Opsi Update', size: '5%', sortable: true },
            //{ field: 'opsidetail', caption: 'Opsi Detail', size: '5%', sortable: true }
        ],
        onAdd: function (event) {
           // w2ui['form'].url = 'pegawai/add_pegawai';
		   //w2alert('<?php echo base_url();?>pegawai/add_pegawai');
			//w2popup.load({ url: '<?php echo base_url();?>pegawai/add_pegawai' });
			//w2ui['layout'].url = '<?php echo base_url();?>pegawai/add_pegawai';
			//w2ui['layout'].refresh();
		//w2popup.load({ url: '<?php echo base_url();?>pegawai/add_pegawai' });
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
	 w2ui['grid'].load('pegawai/get_all_pegawai_json');
	 //w2ui['grid'].select(10000004);
	 
});
</script>
 
</div>
</div>
</html>	