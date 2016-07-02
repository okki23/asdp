<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data <?php echo $location;?></h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="posisi/add_posisi" class="btn btn-xs btn-primary">Add</a><p>
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
            { field: 'lit_code_position', caption: 'Kode', type: 'text' },
            { field: 'name_position', caption: 'Nama Posisi', type: 'text' },
            { field: 'code_core_orm', caption: 'Unit Kerja', type: 'text' },
            { field: 'tipe', caption: 'Tipe', type: 'text' },
            
        ],
        columns: [                
            { field: 'lit_code_position', caption: 'Kode', size: '150px', sortable: true, attr: 'align=left' },
            { field: 'name_position', caption: 'Nama Posisi', size: '20%', sortable: true },
            { field: 'code_core_orm', caption: 'Unit Kerja', size: '20%', sortable: true },
             { field: 'tipe', caption: 'Tipe', size: '20%', sortable: true },
            { field: 'opsi', caption: 'Option', size: '10%', sortable: true, attr: 'align=center'},
            //{ field: 'opsiupdate', caption: 'Opsi Update', size: '5%', sortable: true },
            //{ field: 'opsidetail', caption: 'Opsi Detail', size: '5%', sortable: true }
        ],
        onAdd: function (event) {
           // w2ui['form'].url = 'posisi/add_posisi';
		   //w2alert('<?php echo base_url();?>posisi/add_posisi');
			//w2popup.load({ url: '<?php echo base_url();?>posisi/add_posisi' });
			//w2ui['layout'].url = '<?php echo base_url();?>posisi/add_posisi';
			//w2ui['layout'].refresh();
		//w2popup.load({ url: '<?php echo base_url();?>posisi/add_posisi' });
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
	 w2ui['grid'].load('posisi/get_all_posisi_json');
	 //w2ui['grid'].select(10000004);
	 
});
</script>
 
</div>
</div>
</html>	