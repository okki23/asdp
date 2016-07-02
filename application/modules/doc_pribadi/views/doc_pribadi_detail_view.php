<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php //$this->load->view('sidebar-template-personal',$location);?>
	<?php $this->load->view('sidebar-template-personal');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Data Dokumen Pribadi </h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="<?php echo base_url('doc_pribadi/doc_pribadi_detail_add/'.$personnel_id);?>" class="btn btn-primary">Add</a>
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
            { field: 'tglakhir', caption: 'To', size: '30%', sortable: true },
            { field: 'doctype', caption: 'Type', size: '30%', sortable: true },
            { field: 'document_no', caption: 'Document No.', size: '30%', sortable: true },
            { field: 'title', caption: 'Title', size: '30%', sortable: true },
            { field: 'authority_officer', caption: 'Signed By', size: '30%', sortable: true },
            { field: 'opsi', caption: 'Opsi', size: '16%', sortable: true },
           
          
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
	 w2ui['grid'].load("<?php echo base_url('doc_pribadi/get_all_doc_pribadi_detail_json/'.$personnel_id);?>");
	 
	 
});
</script>
 
</div>
</div>
</html>	