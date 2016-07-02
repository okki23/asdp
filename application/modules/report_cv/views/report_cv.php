
<html> 
    <head>
        <title>
          ::REPORT CV::  
        </title>
        <style>
            .head{
                margin: 0;
                padding-top: -10px;
            }
        </style>
    </head>
    <body>
        <table border="0">
            <tr>
                <td style="width:20%;">   <img src="<?php echo base_url('images/logo.png');?>" width="110" height="60">     </td>
                <td style="font-family:helvetica;"> <b>  PT.ASDP INDONESIA FERRY </b> <br> &nbsp; <b>REPORT DATA RIWAYAT HIDUP </b> </td>
                <td> </td>
            </tr>
        </table>
        <br>
        
        <div style="font-size: 10px;font-weight: bolder;" align="center">
             DAFTAR RIWAYAT HIDUP 
        </div>
        
       
        
        <!--Data pribadi-->
        <div style="font-size: 10px;font-weight: bolder;">
            I.DATA PRIBADI
        </div>
        
                
        <div style="font-size: 9px; align-content: left;">
            <table border="0">
                <tr>
                    <td width="30%;"> Nama Lengkap </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $name_full; ?></td>
                    <td rowspan="13"> <img src="<?php echo base_url('assets/images/foto/'.$foto);?>" width="90" height="120">  </td>
                    
                </tr>
            
             
                <tr>
                    <td width="30%;"> NIK </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $personelid; ?> </td>
                </tr>
           
             
                <tr>
                    <td width="30%;"> Pangkat/Golongan </td>
                    <td width="3%;" > : </td>
                    <td width="35%;">  </td>
                </tr>
             
           
                <tr>
                    <td width="30%;"> Tempat/Tanggal Lahir </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $tempatlahir.' / '.$tanggallahir; ?></td>
                </tr>
             
                <tr>
                    <td width="30%;"> Alamat Tempat Tinggal </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $isialamat;   ?>
                    </td>
                </tr>
            
                <tr>
 

                    <td width="30%;"> No.Telepon/Fax </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo '+'.$comunication; ?>  </td>
                </tr>
            
                <tr>
                    <td width="30%;"> Agama </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $agama; ?>   </td>
                </tr>
            
                <tr>
                    <td width="30%;"> Status Pernikahan </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $statusnikah; ?>  </td>
                </tr>
             
                <tr>
                    <td width="30%;"> SK </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $sk; ?> </td>
                </tr>
            
                <tr>
                    <td width="30%;"> Unker/Cabang </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $namaunit; ?> </td>
                </tr>
             
                <tr>
                    <td width="30%;"> Bagian/KMP </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $bagian;?> </td>
                </tr>
             
                <tr>
                    <td width="30%;"> Jabatan </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $namajabatan; ?></td>
                </tr>
             
                <tr>
                    <td width="30%;"> Wilayah </td>
                    <td width="3%;" > : </td>
                    <td width="35%;"> <?php echo $namawilayah; ?> </td>
                </tr>
            </table>
        </div>
        <!--Data pribadi-->
        
        <!--Data Suami Istri Anak-->
        <div style="font-size: 10px;font-weight: bolder;">
            II.DATA SUAMI / ISTRI / ANAK
            
        </div>
        <div style="font-size: 8px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="34%;" > NAMA LENGKAP </td>
                    <td width="20%;"> HUBUNGAN</td>
                    <td width="20%;"> TEMPAT LAHIR</td>
                    <td width="20%;"> TANGGAL LAHIR </td>
                </tr>
                <?php
                $noklg = 1;
                if($datakeluarga->num_rows() > 0){
                    foreach ($datakeluarga->result() as $rowkeluarga){
                ?>   
                
                    <tr>
                        <td width="5%;" align="center"> <?php echo $noklg;?> </td>
                        <td width="34%;"> <?php echo $rowkeluarga->name_full; ?> </td>
                        <td width="20%;"> <?php echo $rowkeluarga->hubungan; ?> </td>
                        <td width="20%;"> <?php echo $rowkeluarga->birth_place; ?> </td>
                        <td width="20%;">  <?php echo $rowkeluarga->tgllahir; ?>  </td>
                    </tr>
               
                <?php
                $noklg++;
                }
                }else{
                ?>
                    <tr>
                        <td width="5%;" align="center"> N/A </td>
                        <td width="34%;" align="center"> N/A </td>
                        <td width="20%;" align="center"> N/A </td>
                        <td width="20%;" align="center"> N/A </td>
                        <td width="20%;" align="center"> N/A </td>
                    </tr>
                
                <?php
                 }
                ?>
               
              
                   
                 
            </table>
             
        </div>
        <!--Data suami istri anak-->
        
        <!--Data riwayat pekerjaan-->
        <div style="font-size: 10px;font-weight: bolder;">
            III.RIWAYAT PEKERJAAN
        </div>
        <div style="font-size: 10px;">
           A.Penugasan
        </div>
        <div style="font-size: 8px; align-content: left;">
            
            
            
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="20%;"> JABATAN </td>
                    <td width="20%;"> BAGIAN/KAPAL</td>
                    <td width="10%;"> UNKER</td>
                    <td width="12%;"> NO.SK </td>
                    <td width="12%;"> TANGGAL SK </td>
                    <td width="20%;"> KETERANGAN </td>
                </tr>
                <?php
                $norjb = 1;
                if($rjabatan->num_rows() > 0){
                foreach($rjabatan->result() as $rowrjab){
                   
                ?>
                 <tr>
                    <td width="5%;"> <?php echo $norjb;?> </td>
                    <td width="20%;"> <?php echo $rowrjab->nama_jabatan; ?> </td>
                    <td width="20%;">   </td>
                    <td width="10%;"> <?php echo $rowrjab->nm_unit; ?> </td>
                    <td width="12%;"> <?php echo $rowrjab->legal_letter_no; ?> </td>
                    <td width="12%;"> <?php echo $rowrjab->tanggalsk; ?> </td>
                    <td width="20%;"> <?php echo $rowrjab->remark; ?> </td>
                </tr>
                <?php
                $norjb++;
                }
                    }else{
                ?>
                 <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="10%;" align="center"> N/A </td>
                    <td width="12%;" align="center"> N/A </td>
                    <td width="12%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                </tr>
                <?php
                
                    }
                ?>
               
               
            </table>
            
             
             
        </div>
     
        <div style="font-size: 10px;">
           B.Jabatan
        </div>
         <div style="font-size: 8px; align-content: left;">
             <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="20%;"> JABATAN </td>
                    <td width="20%;"> BAGIAN/KAPAL</td>
                    <td width="10%;"> UNKER</td>
                    <td width="12%;"> NO.SK </td>
                    <td width="12%;"> TANGGAL SK </td>
                    <td width="20%;"> KETERANGAN </td>
                </tr>
                <?php
                $nopng = 1;
                if($penugasan->num_rows() > 0){
                foreach($penugasan->result() as $rowpenugasan){
                    
                ?>
                <tr>
                    <td width="5%;"> <?php echo $nopng; ?> </td>
                    <td width="20%;"> <?php echo $rowpenugasan->nama_jabatan; ?> </td>
                    <td width="20%;">  </td>
                    <td width="10%;"> <?php echo $rowpenugasan->nm_unit; ?></td>
                    <td width="12%;"> <?php echo $rowpenugasan->legal_letter_no; ?> </td>
                    <td width="12%;"> <?php echo $rowpenugasan->tanggalsk; ?> </td>
                    <td width="20%;"> <?php echo $rowpenugasan->remark; ?> </td>
                </tr>
                <?php 
                 $nopng++;
                }
               
                    
                    }else{
                ?>
                <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="10%;" align="center"> N/A </td>
                    <td width="12%;" align="center"> N/A </td>
                    <td width="12%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                </tr>
               
               <?php
                    }
           
               ?>
            </table>
             
             
             
             
             
              
        </div>
         <!--Data riwayat pekerjaan-->
         
         
        <!--Data riwayat pendidikan-->
               
        <div style="font-size: 10px;font-weight: bolder;">
            IV.RIWAYAT PENDIDIKAN
        </div>
        <div style="font-size: 10px;">
            A.Pendidikan Formal
        </div>
        <div style="font-size: 8px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="25%;"> TINGKAT </td>
                    <td width="25%;"> JURUSAN</td>
                    <td width="25%;"> INSTANSI</td>
                    <td width="19%;"> TAHUN LULUS </td>
                </tr>
                <?php
                $norpf = 1;
                if($pendidikan->num_rows() > 0 ){
                foreach($pendidikan->result() as $roweducation){
                ?>
                <tr>
                    <td width="5%;"> <?php echo $norpf; ?> </td>
                    <td width="25%;"> <?php echo $roweducation->tingkat; ?> </td>
                    <td width="25%;"> <?php echo $roweducation->major; ?></td>
                    <td width="25%;"> <?php echo $roweducation->education_institution; ?></td>
                    <td width="19%;"> <?php echo $roweducation->tanggallulus; ?> </td>
                </tr>  
                <?php
                $norpf++;
                }
                }else{
                ?>
                 <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="19%;" align="center"> N/A </td>
                </tr>  
                <?php
                }
                ?>
               
            </table>
             
        </div>
        <div style="font-size: 10px;">
            B.Pendidikan / Pelatihan Kelautan
        </div>
        <div style="font-size: 8px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="25%;"> NAMA PELATIHAN </td>
                    <td width="20%;"> INSTITUSI </td>
                    <td width="20%;"> TAHUN LULUS </td>
                    <td width="29%;"> NO.SERTIFIKAT </td>
                </tr>
                <?php
                $norpkl = 1;
                if($training->num_rows() > 0){
                foreach($training->result() as $rowtraining){
                ?> 
                 <tr>
                    <td width="5%;"> <?php echo $norpkl; ?> </td>
                    <td width="25%;"> <?php echo $rowtraining->training_type_name; ?>   </td>
                    <td width="20%;"> <?php echo $rowtraining->training_institution_name; ?> </td>
                    <td width="20%;"> <?php echo $rowtraining->tanggallulus; ?> </td>
                    <td width="29%;"> <?php echo $rowtraining->certificate_no; ?> </td>
                </tr>             
               <?php
                $norpkl++;
                }
                }else{
               ?>
                 <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="29%;" align="center"> N/A </td>
                </tr>  
                
               <?php
                }
               ?>
            </table>
             
        </div>
        <div style="font-size: 10px;">
           C. Pendidikan Lainnya (Pelatihan/Penataran/Lokakarya/Seminar)
        </div>
        <div style="font-size: 8px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="34%;"> JENIS PENDIDIKAN </td>
                    <td width="34%;"> INSTITUSI </td>
                    <td width="26%;"> TAHUN   </td>
                   
                </tr>
                <?php
                $nopelkur = 1;
                if($trainingother->num_rows() > 0){
                foreach($trainingother->result() as $rowpelkur){
                ?> 
                <tr>
                    <td width="5%;"> <?php echo $nopelkur; ?> </td>
                    <td width="34%;"> <?php echo $rowpelkur->training_type_name; ?> </td>
                    <td width="34%;">  <?php echo $rowpelkur->training_institution_name; ?></td>
                    <td width="26%;"><?php echo $rowpelkur->tanggallulus; ?>   </td>
                   
                </tr>   
                <?php
                $nopelkur++;
                }
                }else{
                ?>
                 <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="34%;" align="center"> N/A </td>
                    <td width="34%;" align="center"> N/A </td>
                    <td width="26%;" align="center"> N/A </td>
                   
                </tr>  
                <?php
                
                }
                ?>
               
            </table>
             
        </div>
        <!--Data riwayat pendidikan-->
        
        <!--Data riwayat penghargaan-->
        <div style="font-size: 10px;font-weight: bolder;">
            V.RIWAYAT PENGHARGAAN
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="17%;"> JENIS PENGHARGAAN </td>
                    <td width="17%;"> NAMA PENGHARGAAN</td>
                    <td width="20%;"> PEMBERI PENGHARGAAN</td>
                    <td width="10%;"> TANGGAL </td>
                    <td width="15%;"> KETERANGAN </td>
                    <td width="15%;"> NO.SK </td>
                </tr>
                <?php
                $nophg = 1;
                if($penghargaan->num_rows() > 0){
                foreach($penghargaan->result() as $rowpenghargaan){
                ?> 
               <tr>
                    <td width="5%;"> <?php echo $nophg; ?> </td>
                    <td width="17%;"> <?php echo $rowpenghargaan->jenispenghargaan; ?> </td>
                    <td width="17%;"> <?php echo $rowpenghargaan->jenispenghargaan; ?> </td>
                    <td width="20%;"> <?php echo $rowpenghargaan->authority_officer; ?> </td>
                    <td width="10%;"> <?php echo $rowpenghargaan->tanggalpenghargaan; ?> </td>
                    <td width="15%;"> <?php echo $rowpenghargaan->remark; ?> </td>
                    <td width="15%;"> <?php echo $rowpenghargaan->reference_no; ?> </td>
                </tr>
                <?php
                $nophg++;                
                }
                }else{
                ?>
                 <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="17%;" align="center"> N/A </td>
                    <td width="17%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="10%;" align="center"> N/A </td>
                    <td width="15%;" align="center"> N/A </td>
                    <td width="15%;"align="center"> N/A </td>
                </tr>
                <?php
                }
                ?>
                
            </table>
             
        </div>
        <!--Data riwayat penghargaan-->
        
        <!--Data riwayat hukuman-->
        <div style="font-size: 10px;font-weight: bolder;">
            VI.RIWAYAT HUKUMAN
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="17%;"> TANGGAL </td>
                    <td width="27%;"> TIPE </td>
                    <td width="25%;"> NO.SURAT </td>
                    <td width="25%;"> PEMBERI HUKUMAN</td>
                   
                </tr>
                 <?php
                $nohk = 1;
                if($hukuman->num_rows() > 0){
                foreach($hukuman->result() as $rowhukuman){
                ?> 
                <tr>
                    <td width="5%;"> <?php echo $nohk; ?> </td>
                    <td width="17%;"> <?php echo $rowhukuman->tanggalhukuman; ?> </td>
                    <td width="27%;">  <?php echo $rowhukuman->jenishukuman; ?> </td>
                    <td width="25%;"> <?php echo $rowhukuman->reference_no; ?> </td>
                    <td width="25%;"> <?php echo $rowhukuman->authority_officer; ?></td>
                </tr>
                <?php
                $nohk++;
                }
                }else{
                ?>
                <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="17%;" align="center"> N/A </td>
                    <td width="27%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                </tr>
                
                <?php
                }
                ?>
            </table>
             
        </div>
        <!--Data riwayat hukuman-->
        
        
        <!--Data riwayat fasilitas-->
        <div style="font-size: 10px;font-weight: bolder;">
            VII.FASILITAS
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="22%;"> TIPE   </td>
                    <td width="22%;"> OWNER  </td>
                    <td width="20%;"> BRAND  </td>
                    <td width="30%;"> NO.SERI </td>
                   
                </tr>
               <?php
                $nofac = 1;
                if($fasilitas->num_rows() > 0){
                foreach($fasilitas->result() as $rowfasilitas){
                ?> 
                <tr>
                   <td width="5%;"> <?php echo $nofac; ?> </td>
                    <td width="22%;"> <?php echo $rowfasilitas->jenisfasilitas; ?>   </td>
                    <td width="22%;"> <?php echo $rowfasilitas->facility_owner; ?>   </td>
                    <td width="20%;"> <?php echo $rowfasilitas->brand; ?>  </td>
                    <td width="30%;"> <?php echo $rowfasilitas->serial_no; ?> </td>
                </tr>
                <?php 
                $nofac++;
                }
                }else{
                ?>
                <tr>
                   <td width="5%;" align="center"> N/A </td>
                    <td width="22%;" align="center"> N/A </td>
                    <td width="22%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="30%;" align="center"> N/A </td>
                </tr>
                <?php
                }
                ?>
            </table>
             
        </div>
        <!--Data riwayat fasilitas-->
        
        
        <!--Data riwayat endorsement-->
        <div style="font-size: 10px;font-weight: bolder;">
            VIII.ENDORSEMENT
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="17%;"> TANGGAL </td>
                    <td width="25%;"> NO.ENDORSEMENT </td>
                    <td width="25%;"> KEWENANGAN</td>
                    <td width="27%;"> KETERANGAN</td>
                   
                  
                </tr>
                 <?php
                $noend = 1;
                if($endorsement->num_rows() > 0){
                foreach($endorsement->result() as $rowendor){
                ?> 
                <tr>
                     <td width="5%;"> <?php echo $noend; ?> </td>
                    <td width="17%;"> <?php echo $rowendor->tanggalendor; ?> </td>
                    <td width="25%;"> <?php echo $rowendor->endorsment_no; ?> </td>
                    <td width="25%;"> <?php echo $rowendor->authority; ?></td>
                    <td width="27%;"> <?php echo $rowendor->remark; ?></td>
                </tr>
                <?php
                $noend++;
                }
                }else{
                ?>
                 <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="17%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="27%;" align="center"> N/A </td>
                </tr>
                
                <?php
                }
                ?>
            </table>
             
        </div>
        <!--Data riwayat endorsement-->
        
        
        <!--Data riwayat mcu-->
        <div style="font-size: 10px;font-weight: bolder;">
            IX.MEDICAL CHECK UP
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="27%;"> TANGGAL </td>
                    <td width="30%;"> HASIL </td>
                    <td width="37%;"> CATATAN</td>
                     
                </tr> 
                <?php
                $nomcu = 1;
                if($mcu->num_rows() > 0){
                foreach($mcu->result() as $rowmcu){
                ?> 
                <tr>
                    <td width="5%;"> <?php echo $nomcu; ?> </td>
                    <td width="27%;"> <?php echo $rowmcu->tanggalmcu; ?> </td>
                    <td width="30%;"> <?php echo $rowmcu->hasil; ?> </td>
                    <td width="37%;"> <?php echo $rowmcu->health_note; ?></td>
                </tr>
                <?php
                $nomcu++;
                }
                }else{
                ?>
                <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="27%;" align="center"> N/A </td>
                    <td width="30%;" align="center"> N/A </td>
                    <td width="37%;" align="center"> N/A </td>
                </tr>
                <?php
                }
                ?>
            </table>
             
        </div>
        <!--Data riwayat mcu-->
        
        
         <!--Data riwayat bukupelaut-->
        <div style="font-size: 10px;font-weight: bolder;">
            X.BUKU PELAUT 
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="24%;"> NO.BUKU   </td>
                    <td width="20%;"> TANGGAL   </td>
                     
                    <td width="25%;"> TEMPAT DIKELUARKAN  </td>
                    <td width="25%;"> NEGARA</td>
                    
                </tr>
                 <?php
                $nobp = 1;
                if($bpelaut->num_rows() > 0){
                foreach($bpelaut->result() as $rowbpelaut){
                ?> 
                <tr>
                    <td width="5%;"> <?php echo $nobp; ?></td>
                    <td width="24%;"> <?php echo $rowbpelaut->book_no; ?>   </td>
                    <td width="20%;"> <?php echo $rowbpelaut->tglbpelaut; ?>   </td>
                    <td width="25%;"> <?php echo $rowbpelaut->place_of_issued; ?>  </td>
                    <td width="25%;"> <?php echo $rowbpelaut->negara; ?></td>
                </tr>
                <?php
                 $nobp++;
                }
                }else{
                ?>
                <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="24%;" align="center"> N/A </td>
                    <td width="20%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                </tr>
                <?php
                }
                 ?>
            </table>
             
        </div>
        <!--Data riwayat bukupelaut-->
        
        
         <!--Data riwayat kemampuanbahasa-->
        <div style="font-size: 10px;font-weight: bolder;">
            XI.KEMAMPUAN BAHASA   
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="30%;"> BAHASA </td>
                    <td width="32%;"> ORAL GRADE</td>
                    <td width="32%;"> WRITTEN GRADE</td>
                   
                </tr>
                <?php 
                $nobhs = 1;
                if($bahasa->num_rows() > 0){
                foreach($bahasa->result() as $rowbahasa){
                ?>
                <tr>
                    <td width="5%;"> <?php echo $nobhs; ?> </td>
                    <td width="30%;"> <?php echo $rowbahasa->tipebahasa; ?> </td>
                    <td width="32%;"> <?php echo $rowbahasa->hasiloraltest; ?> </td>
                    <td width="32%;"> <?php echo $rowbahasa->hasilwrittentest; ?></td>
                </tr>
                <?php
                
                $nobhs++;
                }
                }else{
                ?>
                
                <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="30%;" align="center"> N/A </td>
                    <td width="32%;" align="center"> N/A </td>
                    <td width="32%;" align="center"> N/A </td>
                </tr>
                
                <?php
                }
                ?>
            </table>
             
        </div>
        <!--Data riwayat kemampuanbahasa-->
        
        
          <!--Data riwayat pekerjaan-->
        <div style="font-size: 10px;font-weight: bolder;">
            XII.PENGALAMAN PEKERJAAN   
        </div>
       
           <div style="font-size: 7px; align-content: left;">
            <table border="1" cellpadding="1" cellspacing="0">
                <tr style="background-color:#0099FF;" align="center">
                    <td width="5%;"> NO </td>
                    <td width="25%;"> PERIODE </td>
                    <td width="25%;"> COMPANY / EMPLOYER </td>
                    <td width="23%;"> INDUSTRY TYPE</td>
                    <td width="21%;"> POSITION</td>
                   
                </tr>
                <?php 
                $norpk = 1;
                if($rpekerjaan->num_rows() > 0){
                foreach($rpekerjaan->result() as $rowrpekerjaan){
                ?>
                <tr>
                    <td width="5%;"> <?php echo $norpk; ?> </td>
                    <td width="25%;"> <?php echo $rowrpekerjaan->tglmulai .' Sampai '. $rowrpekerjaan->tglakhir; ?> </td>
                    <td width="25%;"> <?php echo $rowrpekerjaan->employer; ?> </td>
                    <td width="23%;"> <?php echo $rowrpekerjaan->industry_type; ?> </td>
                    <td width="21%;"> <?php echo $rowrpekerjaan->position_name; ?></td>
                </tr>
                <?php
                $norpk++;
                }
                }else{
                ?>
                <tr>
                    <td width="5%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="25%;" align="center"> N/A </td>
                    <td width="23%;" align="center"> N/A </td>
                    <td width="21%;" align="center"> N/A </td>
                </tr>
                
                
                <?php
                }
                ?>
            </table>
             
        </div>
        <!--Data riwayat pekerjaan-->
        
        
       
        <div style="font-size: 8px;font-weight: bolder;">
            
            <?php 
            date_default_timezone_set("Asia/Jakarta");
            echo date('M d, Y H:i A');
            ?> 
        </div>
           
    </body>
</html>
