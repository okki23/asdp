<?php $this->load->view('header-template');?><body>
<!-- Page container -->
 	<div class="page-container">
	<?php $this->load->view('sidebar-template');?>
	<div class="page-content">
			<div class="page-header">
				<div class="page-title">
					<h3>Edit Data user<small>Informasi Manajemen User</small></h3>
				</div>
			</div>
		<!-- /sidebar -->
	
		<?php
              foreach($data_employee->result() as $row){
                  $user_id = $row->user_id;
                  $lit_auth_password = $row->lit_auth_password;
                  $instance = $row->instance;
                  $status_process = $row->status_process;
                  $lit_level_user = $row->lit_level_user;
                  $lit_code_core_orm = $row->lit_code_core_orm;
                  $auth = $row->lit_authority;
              }
              ?>
        <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('user/pro_update_user')?>">
 
     

<table class="table table-striped " >	
 <tr>
    <td width="150" align="left">Username</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;">
  <input type="text" placeholder="Username" name="user_id" class="form-control" value="<?php echo $user_id;?>">
  </td>
  </tr>
  <tr>
    <td width="150" align="left">Password</td>
    <td width="10" align="left">:</td>
    <td style="padding:2px;">
	       <input type="password" placeholder="Password" name="lit_auth_password" class="form-control" value="<?php echo $lit_auth_password;?>">
	</td>
  </tr>
<tr >
    <td>Kode Unit</td>
    <td>:</td>
    <td style="padding:2px;"><input type="text" name="lit_code_core_orm" class="form-control" placeholder="Kode Unit" value="<?php echo $lit_code_core_orm;?>"></td>
  </tr>
   <tr>
    <td>Instansi</td>
    <td>:</td>
    <td style="padding:2px;">
	<select name="instance" class="form-control"  > required>
						<option value=''>Pilih</option>
						<option value='1000D'>1000D</option>

		</select>
	</td>
  </tr>
  <tr>
    <td>Status Prosess</td>
    <td>:</td>
    <td style="padding:2px;">
	<select name="status_process" class="form-control" required>
						<option value=''>Pilih</option>
                        <option value='1'>1</option>
		</select>
	</td>
  </tr>
  <tr>
    <td>Status</td>
    <td>:</td>
    <td style="padding:2px;">
	<select name="lit_level_user" class="form-control">
						<option value=''>Pilih</option>
						<option value='3'>Super Admin</option>
						<option value='2'>Admin</option>
            <option value='1'>Pegawai</option>
		</select>
	</td>
  </tr>
  </table>
  
   

 <!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#master" data-toggle="tab"><i class="icon-icon"></i> Menu Master Data</a></li>
                    <li><a href="#transaksi" data-toggle="tab"><i class="icon-quill2"></i> Menu Transaksi</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active fade in" id="master">
                      <table id=data class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>1. MENU MASTER DATA </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>1.1. Database Pegawai</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=dt11 value=2 size=20></TD>
                          </TR>
                          
                        </table>            
                    </div>


                    <div class="tab-pane fade" id="transaksi">
            <table id=adk class="table table-striped table-bordered table-hover">
                          <TR >
                            <TD style="background-color:#237EA0;" width="28%" ><font color=#FFFFFF><b>2. MENU TRANSAKSI  </b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>NOT ALLOWED</b></font></TD>
                            <TD style="background-color:#237EA0;text-align:center;" width="10%" ><font color=#FFFFFF><b>READ ONLY</b></font></TD>
                          </TR>
                          <TR >
                            <TD>2.1 Data Pribadi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad21 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad21 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad21 value=2 size=20></TD>
                          </TR>
                          <TR >
                            <TD>2.2 Data Alamat</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad22 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad22 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad22 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.3 Data Keluarga </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad23 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad23 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad23 value=2 size=20></TD>
                          </TR>
              
                          <TR>
                            <TD>2.4 Data Pendidikan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad24 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad24 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad24 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.5 Identitas Pribadi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad25 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad25 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad25 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.6 Riwayat Jabatan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad26 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad26 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad26 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.7 Riwayat Penugasan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad27 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad27 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad27 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.8 Riwayat Pekerjaan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad28 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad28 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad28 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.9 Penghargaan </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad29 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad29 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad29 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.10 Hukuman</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad210 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad210 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad210 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.11 Komunikasi</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad211 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad211 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad211 value=2 size=20></TD>
                          </TR><TR>
                            <TD>2.12 Pelatihan</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad212 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad212 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad212 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.13 Fasiltas Dinas</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad213 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad213 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad213 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.14 Endorsment</TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad214 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad214 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad214 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.15 Medical Check Up </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad215 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad215 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad215 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.16 Buku Pelaut </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad216 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad216 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad216 value=2 size=20></TD>
                          </TR>
                          <TR>
                            <TD>2.17 Dokumen Pribadi </TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad217 value=1 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad217 value=0 size=20></TD>
                            <TD style="text-align:center;"><INPUT TYPE=radio NAME=ad217 value=2 size=20></TD>
                          </TR>

                          </table>
                    </div>

                </div>
            </div>
          <!-- /page tabs -->


<br />




                                 <div class="form-actions text-left">
              <button type="submit" class="btn btn-primary">Update</button>   
                      <button type=button value="Cancel" onClick="javascript:history.go(-1)" class="btn btn-primary">Cancel</button>
          </div>

  </div>
</body>


<style type="text/css">
    #fm{
      margin:0;
      padding:10px 30px;
    }
    .ftitle{
      font-size:12px;
      font-weight:bold;
      padding:5px 0;
      margin-bottom:10px;
      border-bottom:1px solid #ccc;
    }
    .fitem{
      margin-bottom:5px;
    }
    .fitem label{
      display:inline-block;
      width:80px;
    }
    .fitem input{
      width:160px;
    }
  </style>
  <script type="text/javascript">
       $.fn.datebox.defaults.formatter = function(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return (d<10?('0'+d):d)+'-'+(m<10?('0'+m):m)+'-'+y;
  };
  $.fn.datebox.defaults.parser = function(s){
    if (!s) return new Date();
    var ss = s.split('-');
    var d = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var y = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
      return new Date(y,m-1,d);
    } else {
      return new Date();
    }
  };
    </script>
</html>