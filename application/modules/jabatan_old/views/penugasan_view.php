<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data Pribadi</h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="pegawai/add_pegawai" class="btn btn-xs">Add</a>
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
            toolbarDelete: true,
           // toolbarSave: true,
            toolbarEdit: true,
			selectColumn: true
        },
		
        searches: [                
            { field: 'personnel_id', caption: 'ID', type: 'text' },
            { field: 'assignment_type', caption: 'Alasan', type: 'text' },
            
        ],
        columns: [                
            { field: 'personnel_id', caption: 'ID', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'start_date', caption: 'From', size: '30%', sortable: true },
            { field: 'end_date', caption: 'To', size: '30%', sortable: true },
            { field: 'assignment_type', caption: 'Alasan', size: '30%', sortable: true },
			
           
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
	 w2ui['grid'].load('<?php echo base_url('penugasan/penugasan_detail_json/'.$id);?>');
	 //w2ui['grid'].select(10000004);
	 
});
</script>
 
</div>
</div>
</html>	