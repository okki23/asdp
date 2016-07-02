<?php $this->load->view('header-template');?>
<body>
<!-- Page container -->
 	<div class="page-container">
	<?php //$this->load->view('sidebar-template-personal',$location);?>
	<?php $this->load->view('sidebar-template-personal');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Riwayat Jabatan</h3>
				</div>
			</div>
		<!-- /sidebar -->
<a href="<?php echo base_url('riwayat_jabatan/riwayat_jabatan_detail_add/'.$personnel_id);?>" class="btn btn-primary">Add</a>
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
          //  toolbarDelete: true,
           // toolbarSave: true,
           // toolbarEdit: true,
			selectColumn: true
        },
		
        searches: [                
            { field: 'personnel_id', caption: 'ID', type: 'text' },
            { field: 'assignment_type', caption: 'Alasan', type: 'text' },
            
        ],
        columns: [                
            { field: 'personnel_id', caption: 'ID', size: '100px', sortable: true, attr: 'align=center' },
            { field: 'tanggalmasuk', caption: 'From', size: '30%', sortable: true },
            { field: 'tanggalakhir', caption: 'To', size: '30%', sortable: true },
            { field: 'alasan_jabatan', caption: 'Alasan', size: '30%', sortable: true },
            { field: 'legal_letter_no', caption: 'No.SK', size: '30%', sortable: true },
            { field: 'opsi', caption: 'Opsi', size: '8%', sortable: true }
          
          
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
	 w2ui['grid'].load("<?php echo base_url('riwayat_jabatan/get_all_jabatan_detail_json/'.$personnel_id);?>");
	 
	 
});
</script>
 
</div>
</div>
</html>	