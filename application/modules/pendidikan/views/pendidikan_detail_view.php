<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php //$this->load->view('sidebar-template-personal',$location);?>
	<?php $this->load->view('sidebar-template-personal');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Pendidikan</h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="<?php echo base_url('pendidikan/pendidikan_detail_add/'.$personnel_id);?>" class="btn btn-primary">Add</a>
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
            { field: 'assignment_type', caption: 'Alasan', type: 'text' },
            
        ],
        columns: [                
            { field: 'tglmulai', caption: 'From', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'tglakhir', caption: 'To', size: '20%', sortable: true },
            { field: 'level', caption: 'Level', size: '10%', sortable: true },
            { field: 'institut', caption: 'Institusi', size: '20%', sortable: true },
            { field: 'institusi_lainnya', caption: 'Institusi Lainnya', size: '20%', sortable: true },
            { field: 'major', caption: 'Jurusan', size: '20%', sortable: true },
            { field: 'gpa', caption: 'GPA/Nilai', size: '10%', sortable: true },
            { field: 'grade', caption: 'Grade', size: '10%', sortable: true },
            { field: 'opsi', caption: 'Opsi', size: '10%', sortable: true },
           
          
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
	 w2ui['grid'].load("<?php echo base_url('pendidikan/get_all_pendidikan_detail_json/'.$personnel_id);?>");
	 
	 
});
</script>
 
</div>
</div>
</html>	