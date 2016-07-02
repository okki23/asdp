<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template-personal',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data Pribadi</h3>
				</div>
			</div>
		<!-- /sidebar -->
<!--<a href="<?php //echo base_url('data_pribadi/add_data_pribadi/'.$personnel_id);?>" class="btn btn-primary">Add</a>-->
<br>
&nbsp;
 
<div id="grid" style="width: 100%; height: 400px;"></div>
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
            { field: 'personnel_id', caption: 'ID', type: 'text' },
         
        ],
        columns: [                
            { field: 'start_date', caption: 'From', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'end_date', caption: 'To', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'name_full', caption: 'Nama Lengkap', size: '300px', sortable: true, attr: 'align=left' },
            { field: 'gender', caption: 'Gender', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'birth_date', caption: 'Tanggal Lahir', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'religion', caption: 'Agama', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'marital_status', caption: 'Status Pernikahan', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'opsi', caption: 'Option', size: '8%', sortable: true, attr: 'align=center' }
            //{ field: 'opsidelete', caption: 'Delete', size: '8%', sortable: true }
          
        ],
        onAdd: function (event) {
           
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
	 w2ui['grid'].load("<?php echo base_url('data_pribadi/get_all_data_pribadi_json/'.$personnel_id);?>");
	 
	 
});
</script>
 
</div>
</div>
</html>	