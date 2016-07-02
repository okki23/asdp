<?php $this->load->view('header-template');?>
     <!-- /striped datatable inside panel -->


<!--awal bagian konten -->

	<div class="page-container">
 
		<?php $this->load->view('sidebar-template',$location);?>
	 


 
	 	<div class="page-content">

 
			<div class="page-header">
				<div class="page-title">
					<h3>Dashboard <small>Welcome <b><?php echo $this->session->userdata('username'); ?></b> on Human Resource Information System</small> </h3>
				</div>

			</div>
			<?php //$this->load->view('breadcrumb');?>
			
			<!-- Page statistics -->
	    	<ul class="page-stats list-justified">
	    		<li class="bg-primary">
	    			<div class="page-stats-showcase">
	    				<span>Total Pegawai</span>
	    				<h2><?php echo number_format($countemp,0);?></h2>
	    			</div>
	    			<div class="bar-default chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Kantor Pusat</span>
	    				<h2>16.290</h2>
	    			</div>
	    			<div class="bar-default chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Cabang</span>
	    				<h2>22.504</h2>
	    			</div>
	    			<div class="bar-default chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Pegawai Darat</span>
	    				<h2>16.290</h2>
	    			</div>
	    			<div class="bar-default chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
	    		</li>
	    		<li class="bg-info">
	    			<div class="page-stats-showcase">
	    				<span>Pegawai Laut</span>
	    				<h2>16.290</h2>
	    			</div>
	    			<div class="bar-default chart">10,14,8,45,23,41,22,31,19,12, 28, 21, 24, 20</div>
	    		</li>
	    	</ul>
			
			
		
		<div class="row">
				<div class="col-md-4">

			        <!-- Donut -->
			        <div class="panel panel-default">
				        <div class="panel-heading">
					        <h6 class="panel-title"><i class="icon-calendar2"></i>Grafik Berdasarkan Jenis Kelamin</h6>
				        </div>
				        <div class="panel-body">
					        <div class="graph-standard" id="gender"></div>
				        </div>
			        </div>
			        <!-- /donut -->


			        

				</div>

				<div class="col-md-4">
				
			        <!-- Pie -->
			        <div class="panel panel-default">
				        <div class="panel-heading">
					        <h6 class="panel-title"><i class="icon-calendar2"></i>Grafik Berdasarkan Tipe</h6>
				        </div>
				        <div class="panel-body">
					        <div class="graph-standard" id="tipe"></div>
				        </div>
			        </div>
			        <!-- /pie -->


			       

				</div>

				<div class="col-md-4">
				
			        <!-- Pie -->
			        <div class="panel panel-default">
				        <div class="panel-heading">
					        <h6 class="panel-title"><i class="icon-calendar2"></i> Grafik Berdasarkan Usia</h6>
				        </div>
				        <div class="panel-body">
					        <div class="graph-standard" id="usia"></div>
				        </div>
			        </div>
			        <!-- /pie -->


			       

				</div>
			</div>

			

<?php $this->load->view('footer-template');?>
 
 		 
 </div>
 
<script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/js/exporting.js');?>"></script>
<script type="text/javascript">
		$(function () {
			$.getJSON("dashboard/gender", function(json) {
			$('#gender').highcharts({
				
				title: {
					text: ''
				},
				
				plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
	            series: [{
					type: 'pie',
					name: 'Jumlah',
					data: json
						//['Pria',   5017],
						//['Wanita',  274]					
					//]
				}]
			});
			
				//options.series[1].data = json[1];
				//options.series[0].name = json[0];
	        	chart = new Highcharts.Chart(options);
	        });
			
	        
      	});   
		</script>
		
</body>
</html>