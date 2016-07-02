<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template-personal',$location);?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Keluarga</h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="<?php echo base_url('keluarga/keluarga_detail_add/'.$personnel_id);?>" class="btn btn-primary">Add</a>
<br>
&nbsp;
 
 
<div id="gridx" style="width: 100%; height: 400px;"></div>
</body>
<script type="text/javascript">	
$(function () {    
    $('#gridx').w2grid({ 
        name: 'grid', 
		recid: 'personnel_id',
        show: { 
            toolbar: true,
            footer: true,
           // toolbarAdd: true,
          
			selectColumn: true
        },
		
        searches: [                
            { field: 'personnel_id', caption: 'ID', type: 'text' },
          
            
        ],
        columns: [                
            { field: 'tglmulai', caption: 'From', size: '20%', sortable: true, attr: 'align=center' },
            { field: 'tglakhir', caption: 'To', size: '20%', sortable: true, attr: 'align=center' },
            { field: 'tipe_keluarga', caption: 'Hubungan', size: '20%', sortable: true, attr: 'align=center' },
            { field: 'urutan', caption: 'Urutan', size: '20%', sortable: true, attr: 'align=center' },
            { field: 'name_full', caption: 'Nama', size: '20%', sortable: true, attr: 'align=center' }, 
            { field: 'tanggal_lahir', caption: 'Tanggal Lahir', size: '20%', sortable: true, attr: 'align=center' }, 
            { field: 'opsi', caption: 'Opsi', size: '9%', sortable: true },
           
          
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
	 w2ui['grid'].load("<?php echo base_url('keluarga/get_all_keluarga_detail_json/'.$personnel_id);?>");
	 //keluarga/get_all_keluarga_detail_json/00000004
	 
});
</script>
 
</div>
</div>
</html>	