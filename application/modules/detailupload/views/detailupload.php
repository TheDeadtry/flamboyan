<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Upload</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Upload </li>
                </ul>
            </div>
        </div>
    </div>
</div>                


                          
    
     

                        <div class="row-fluid">
            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Profile</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>


                            <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                   
                                    <?php 
                                        $this->load->view('template/menu_upload');
                                    ?>
                                </div>

                                <div class="span9">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>



                <div class="row-fluid">
                                                     <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Upload</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                            <table class='table table-bordered' style='margin-bottom:0;'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dokumen</th>
                                            <th>Perlu/Tdk Perlu</th>
                                            <th>Original<br>/Copy</th>
                                            <th>Tgl Terima/Print</th>
                                            <th>Keterangan</th>
                                            <th>Jmlh Dok</th>
                                            <th>Upload Dok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php if($tampil_data_fotovisa==null){?>
                                            <td>1</td>
                                            <td>PAS FOTO</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_fotovisa != 0) echo $hitung_fotovisa; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_fotovisa as $row) { ?>
                                            <td>1</td>
                                            <td>PAS FOTO</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_fotovisa; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_fotovisa/"?>"> Upload </a></td>
                                        </tr> 

                                         <tr>
                                            <td></td>
                                            <td colspan="7"><b>DOK RUMAH / BAKU TKI</b></td>
                                        </tr>

                                                                                <tr>
                                        <?php if($tampil_data_ktp==null){?>
                                              <td>2</td>
                                            <td>KTP</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_ktp != 0) echo $hitung_ktp; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_ktp as $row) { ?>
                                             <td>2</td>
                                            <td>KTP</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_ktp; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_ktp/"?>"> Upload </a></td>
                                        </tr> 
                                                                                <tr>
                                        <?php if($tampil_data_kk==null){?>
                                             <td>3</td>
                                            <td>KK</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_kk != 0) echo $hitung_kk; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_kk as $row) { ?>
                                             <td>3</td>
                                            <td>KK</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_kk; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_kk/"?>"> Upload </a></td>
                                        </tr>
                                        <tr>
                                        <?php if($tampil_data_aktelahir==null){?>
                                             <td>4</td>
                                            <td>AKTE LAHIR</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_aktelahir != 0) echo $hitung_aktelahir; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_aktelahir as $row) { ?>
                                            <td>4</td>
                                            <td>AKTE LAHIR</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_aktelahir; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_aktelahir/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_ijasah==null){?>
                                              <td>5</td>
                                            <td>IJASAH /KET SEKOLAH</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_ijasah != 0) echo $hitung_ijasah; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_ijasah as $row) { ?>
                                              <td>5</td>
                                            <td>IJASAH /KET SEKOLAH</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_ijasah; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_ijasah/"?>"> Upload </a></td>
                                        </tr>

                                          <tr>
                                        <?php if($tampil_data_suratnikah==null){?>
                                             <td>6</td>
                                            <td>SURAT NIKAH / CERAI</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_suratnikah != 0) echo $hitung_suratnikah; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_suratnikah as $row) { ?>
                                               <td>6</td>
                                            <td>SURAT NIKAH / CERAI</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_suratnikah; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_suratnikah/"?>"> Upload </a></td>
                                        </tr>

                                          <tr>
                                        <?php if($tampil_data_suratijinkeluarga==null){?>
                                             <td>7</td>
                                            <td>SURAT IJIN KELUARGA</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_suratijinkeluarga != 0) echo $hitung_suratijinkeluarga; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_suratijinkeluarga as $row) { ?>
                                              <td>7</td>
                                            <td>SURAT IJIN KELUARGA</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_suratijinkeluarga; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_suratijinkeluarga/"?>"> Upload </a></td>
                                        </tr>


                                          <tr>
                                        <?php if($tampil_data_pasporlama==null){?>
                                             <td>8</td>
                                            <td>PASPOR LAMA</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_pasporlama != 0) echo $hitung_pasporlama; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_pasporlama as $row) { ?>
                                             <td>8</td>
                                            <td>PASPOR LAMA</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_pasporlama; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_pasporlama/"?>"> Upload </a></td>
                                        </tr>

                                           <tr>
                                        <?php if($tampil_data_perjanjianpenempatan==null){?>
                                             <td>9</td>
                                            <td>PERJANJIAN PENEMPATAN</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_perjanjianpenempatan != 0) echo $hitung_perjanjianpenempatan; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_perjanjianpenempatan as $row) { ?>
                                             <td>9</td>
                                            <td>PERJANJIAN PENEMPATAN</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_perjanjianpenempatan; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_perjanjianpenempatan/"?>"> Upload </a></td>
                                        </tr>

                                         <tr>
                                        <?php if($tampil_data_pasportampil==null){?>
                                            <td>10</td>
                                            <td>PASPOR BERLAKU</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_pasportampil != 0) echo $hitung_pasportampil; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_pasportampil as $row) { ?>
                                            <td>10</td>
                                            <td>PASPOR BERLAKU</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_pasportampil; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_pasportampil/"?>"> Upload </a></td>
                                        </tr>

                                         <tr>
                                        <?php if($tampil_data_kehilanganpaspor==null){?>
                                            <td>11</td>
                                            <td>SURAT KEHILANGAN PASPOR <br>LAMA</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_kehilanganpaspor != 0) echo $hitung_kehilanganpaspor; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_kehilanganpaspor as $row) { ?>
                                            <td>11</td>
                                            <td>SURAT KEHILANGAN PASPOR <br>LAMA</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_kehilanganpaspor; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_kehilanganpaspor/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_skck==null){?>
                                            <td>12A</td>
                                            <td>SKCK (POLDA)</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_skck != 0) echo $hitung_skck; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_skck as $row) { ?>
                                            <td>12A</td>
                                            <td>SKCK (POLDA)</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_skck; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_skck/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_skckpolres==null){?>
                                            <td>12B</td>
                                            <td>SKCK (POLRES)</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_skckpolres != 0) echo $hitung_skckpolres; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_skckpolres as $row) { ?>
                                            <td>12B</td>
                                            <td>SKCK (POLRES)</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_skckpolres; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_skckpolres/"?>"> Upload </a></td>
                                        </tr>

                                         <tr>
                                        <?php if($tampil_data_legalitas==null){?>
                                            <td>13</td>
                                            <td>LEGALITAS (LEGALITAS +S, <br> KUASA+, S.PERNYATAAN, <br>S.RESIKO KABUR DLL)</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_legalitas != 0) echo $hitung_legalitas; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_legalitas as $row) { ?>
                                           <td>13</td>
                                            <td>LEGALITAS (LEGALITAS +S, <br> KUASA+, S.PERNYATAAN, <br>S.RESIKO KABUR DLL)</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_legalitas; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_legalitas/"?>"> Upload </a></td>
                                        </tr>

                                        
                                        <tr>
                                            <td></td>
                                            <td colspan="7"><b>MEDIKAL, ASURANSI DLL</b></td>
                                        </tr>

                                         <tr>
                                        <?php if($tampil_data_medikal==null){?>
                                            <td>14</td>
                                            <td>SERTIFIKAT MEDIKAL PRA</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_medikal != 0) echo $hitung_medikal; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_medikal as $row) { ?>
                                            <td>14</td>
                                            <td>SERTIFIKAT MEDIKAL PRA</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_medikal; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_medikal/"?>"> Upload </a></td>
                                        </tr>
                                         <tr>
                                        <?php if($tampil_data_serkes==null){?>
                                             <td>15</td>
                                            <td>SERKES</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_serkes != 0) echo $hitung_serkes; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_serkes as $row) { ?>
                                            <td>15</td>
                                            <td>SERKES</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_serkes; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_serkes/"?>"> Upload </a></td>
                                        </tr>
                                       <tr>
                                        <?php if($tampil_data_medikalfull==null){?>
                                           <td>16</td>
                                            <td>SERTIFIKAT MEDIKAL FULL</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_medikalfull != 0) echo $hitung_medikalfull; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_medikalfull as $row) { ?>
                                           <td>16</td>
                                            <td>SERTIFIKAT MEDIKAL FULL</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_medikalfull; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_medikalfull/"?>"> Upload </a></td>
                                        </tr>

                                       <tr>
                                        <?php if($tampil_data_sertifikatujian==null){?>
                                            <td>17</td>
                                            <td>SERTIFIKAT BLK</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_sertifikatujian != 0) echo $hitung_sertifikatujian; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_sertifikatujian as $row) { ?>
                                            <td>17</td>
                                            <td>SERTIFIKAT BLK</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_sertifikatujian; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_sertifikatujian/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_kpa==null){?>
                                             <td>18</td>
                                            <td>KPA ASURANSI</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_kpa != 0) echo $hitung_kpa; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_kpa as $row) { ?>
                                             <td>18</td>
                                            <td>KPA ASURANSI</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_kpa; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_kpa/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_pk==null){?>
                                             <td>19</td>
                                            <td>PERJANJIAN KERJA</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_pk != 0) echo $hitung_pk; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_pk as $row) { ?>
                                             <td>19</td>
                                            <td>PERJANJIAN KERJA</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_pk; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_pk/"?>"> Upload </a></td>
                                        </tr>

 <tr>
                                        <?php if($tampil_data_suhan==null){?>
                                             <td>20</td>
                                            <td>SUHAN</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_suhan != 0) echo $hitung_suhan; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_suhan as $row) { ?>
                                             <td>20</td>
                                            <td>SUHAN</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_suhan; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_suhan/"?>"> Upload </a></td>
                                        </tr>


                                      <tr>
                                        <?php if($tampil_data_visapermit==null){?>
                                             <td>21</td>
                                            <td>VISA PERMIT</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_visapermit != 0) echo $hitung_visapermit; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_visapermit as $row) { ?>
                                            <td>21</td>
                                            <td>VISA PERMIT</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_visapermit; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_visapermit/"?>"> Upload </a></td>
                                        </tr>
                                        <tr>
                                        <?php if($tampil_data_visa==null){?>
                                            <td>22</td>
                                            <td>VISA</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_visa != 0) echo $hitung_visa; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_visa as $row) { ?>
                                            <td>22</td>
                                            <td>VISA</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_visa; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_visa/"?>"> Upload </a></td>
                                        </tr>
                                        <tr>
                                        <?php if($tampil_data_tiket==null){?>
                                            <td>23</td>
                                            <td>TIKET</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_tiket != 0) echo $hitung_tiket; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_tiket as $row) { ?>
                                            <td>23</td>
                                            <td>TIKET</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_tiket; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_tiket/"?>"> Upload </a></td>
                                        </tr>
                                       <tr>
                                        <?php if($tampil_data_visaarrival==null){?>
                                            <td>24</td>
                                            <td>VISA ARRIVAL</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_visaarrival != 0) echo $hitung_visaarrival; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_visaarrival as $row) { ?>
                                            <td>24</td>
                                            <td>VISA ARRIVAL</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_visaarrival; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_visaarrival/"?>"> Upload </a></td>
                                        </tr>

                                        <!--  <tr>
                                            <td>27</td>
                                            <td>ARC BARU TKI</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td></td>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_pasporbaru/"?>"> Upload </a></td>
                                        </tr> -->
                                        <tr>
                                            <td></td>
                                            <td colspan="7"><b>DOK RUMAH / BAKU TKI</b></td>
                                        </tr>
                                         <tr>
                                        <?php if($tampil_data_job==null){?>
                                          <td>25</td>
                                            <td>JOB DESCRIPTION, SURAT <br>PERMINTAAN keterangan / MAJIKAN</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_job != 0) echo $hitung_job; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_job as $row) { ?>
                                            <td>25</td>
                                            <td>JOB DESCRIPTION, SURAT <br>PERMINTAAN keterangan / MAJIKAN</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_job; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_job/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_suhankabur==null){?>
                                         <td>26</td>
                                            <td>SUHAN KABUR DARI TAIWAN <br> PERNYATAAN KELUARGA<br> TKI KABUR</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_suhankabur != 0) echo $hitung_suhankabur; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_suhankabur as $row) { ?>
                                            <td>26</td>
                                            <td>SUHAN KABUR DARI TAIWAN <br> PERNYATAAN KELUARGA<br> TKI KABUR</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_suhankabur; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_suhankabur/"?>"> Upload </a></td>
                                        </tr>
                                        <tr>
                                        <?php if($tampil_data_berkas==null){?>
                                          <td>27</td>
                                            <td>SURAT TANDA PENGAMBILAN <br>BERKAS</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_berkas != 0) echo $hitung_berkas; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_berkas as $row) { ?>
                                            <td>27</td>
                                            <td>SURAT TANDA PENGAMBILAN <br>BERKAS</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_berkas; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_berkas/"?>"> Upload </a></td>
                                        </tr>
                                        <tr>
                                        <?php if($tampil_data_slain==null){?>
                                          <td>28 </td>
                                            <td>SURAT LAIN</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_slain != 0) echo $hitung_slain; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_slain as $row) { ?>
                                            <td>28 </td>
                                            <td>SURAT LAIN</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_slain; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_slain/"?>"> Upload </a></td>
                                        </tr>

                                         <tr>
                                        <?php if($tampil_data_kpapra==null){?>
                                          <td>29 </td>
                                            <td>JD (KHUSUS INFORMAL)</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_kpapra != 0) echo $hitung_kpapra; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_kpapra as $row) { ?>
                                            <td>29 </td>
                                            <td>JD (KHUSUS INFORMAL)</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_kpapra; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_kpapra/"?>"> Upload </a></td>
                                        </tr>


                                        <tr>
                                        <?php if($tampil_data_ttdt==null){?>
                                          <td>30 </td>
                                            <td>TANDA TERIMA DOKUMEN TERBANG</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_kpapra != 0) echo $hitung_kpapra; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_ttdt as $row) { ?>
                                            <td>30 </td>
                                            <td>TANDA TERIMA DOKUMEN TERBANG</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_ttdt; ?></td>
                                             <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_ttdt/"?>"> Upload </a></td>
                                        </tr>

                                        <tr>
                                        <?php if($tampil_data_servak==null){?>
                                          <td>31 </td>
                                            <td>SERTIFIKAT VAKSIN</td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php if($hitung_servak != 0) echo $hitung_servak; ?></td>

                                        <?php }else{?>
                                        <?php foreach ($tampil_data_servak as $row) { ?>
                                            <td>31 </td>
                                            <td>SERTIFIKAT VAKSIN</td>
                                            <td><?php echo $row->penting;?></td>
                                            <td><?php echo $row->cekdokumen;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->keterangan;?></td>
                                              <?php }?>
                                            <td><?php  echo $hitung_servak; ?></td>
                                            <?php }?>
                                            <td><a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/upload_servak/"?>"> Upload </a></td>
                                        </tr>


                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>
             </div>
                            
     </div>

                                
                            </div>
        </div>
    </div>                   
          