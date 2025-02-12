    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Detail Personal</span> - BLK</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="index.html">Personal BLK</a></li>
                    <li><a href="user_pages_profile.html">Detail Personal</a></li>
                </ul>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-user"></i><span>Detail Personal</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Toolbar -->
                
                <!-- /toolbar -->


                <!-- User profile -->
            <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Profile</h5>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-xxs" width="200px" >
                            <thead>
                                <th width="35%" >
                                </th>
                                <th>
                                </th>
                                <th>
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3" class="active">Data <?php echo $idbio;?> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit">UBAH PERSONAL BLK</button></th>

                                </tr>
                                 <?php 
                            foreach ($tampil_data_blk_personaldetail as $row) { ?>
                                <tr>
                                    <td>Nama pemilik</td>
                                    <td>: <?php echo $row->pemilikx; echo " - ".$row->negarapemilikx;?></td>
                                </tr>
                                <tr>
                                    <td>PL</td>
                                    <td>: <?php echo $row->sponsor;?></td>
                                </tr>
                                <tr>
                                    <td>Id Depnaker</td>
                                    <td>: <?php echo $row->nodisnaker;?></td>
                                </tr>
                                <tr>
                                    <td>No Pendaftaran TKI</td>
                                    <td>: <?php echo $row->nodaftar;?></td>
                                </tr>
                                <tr>
                                    <td>Nama TKI</td>
                                    <td>: <?php echo $row->namanya;?> </td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>: <?php echo $row->tempatlahir;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>: <?php echo $row->tanggallahir;?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?php echo $row->jeniskelamin;?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: <?php echo $row->alamatx;?></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td>: <?php echo $row->notelp;?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>: <?php echo $row->pendidikan;?></td>
                                </tr>
                                <tr>
                                    <td>No. KTP</td>
                                    <td>: <?php echo $row->noktp;?></td>
                                </tr>
                                <tr>
                                    <td>Tujuan Negara</td>
                                    <td>: <?php echo $row->negara;?></td>
                                </tr>
                                <tr>
                                    <td>Bahasa</td>
                                    <td>: <?php echo $row->bahasa;?></td>
                                </tr>
                                <tr>
                                    <td>Eks / Non</td>
                                    <td>: <?php echo $row->eksnon;?></td>
                                </tr>
                                <tr>
                                    <td>Cluster / Profesi</td>
                                    <td>: <?php echo $row->cluster;?></td>
                                </tr>
                                <tr>
                                    <td>No. Paspor</td>
                                    <td>: <?php echo $row->nopaspor;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Medical Awal</td>
                                    <td>: <?php echo $row->tglmedawal;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Medical Full</td>
                                    <td>: <?php echo $row->tglmedfull;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Sidik jari</td>
                                    <td>: <?php echo $row->tglsidikjari;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai Belajar Di BLK</td>
                                    <td>: <?php  foreach ($tglawalfinger as $datanya) { 
                                         echo $datanya->jumlah;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Angkatan BLK <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit998">Ubah</button> 
                                    </td>
                                    <td>: <?php  //foreach ($tglawalfinger as $datanya) { 
                                         //echo $datanya->jumlah;
                                        //}
                                        if (isset($tampil_angkatan->date_angkatan)) {
                                            $xtglawal = $tampil_angkatan->date_angkatan;
                                            $startpast = $xtglawal;//new DateTime('2017-06-02');
                                            $xnowday = date('Y-m-d');
                                            $datetimeee = new DateTime($startpast);
                                            $dayzz = $datetimeee->format('w');
                                            if($dayzz == 1) {
                                                $xfirstday  = $startpast;
                                            } else {
                                                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
                                            }
                                            $xfirstday;
                                            if ($xfirstday <= $xnowday) {
                                                //$datediff = $xnowday.' + '.$xfirstday;
                                                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
                                                $weekk = (int)($dayss / 7)+1;
                                                echo $xtglawal.'<br/>';
                                                echo $weekk.' ('.$dayss.' hari)';
                                            } elseif ($xfirstday >= $xnowday) {
                                                echo '0';
                                            } else {
                                                echo 'NULL';
                                            }
                                        } else {
                                            $xtglawal = "";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Tanggal Registrasi <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit1">Ubah</button> </td>
                                    <td>: <?php echo $row->adm_tglreg;?> </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkiraan UJK BLK</td>
                                    <td>: <?php echo ''.$hitunganfingernodaft;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengajuan UJK</td>
                                    <td>: <?php echo ''.$ujk_pengajuan;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Keluar UJK</td>
                                    <td>: <?php echo ''.$ujk_keluar;?></td>
                                </tr>
                                <tr>
                                    <td>Lembaga LSP</td>
                                    <td>: <?php echo ''.$ujk_namalsp;?></td>
                                </tr>
                                 <tr>
                                    <td>No Sherlok</td>
                                    <td>: <?php echo ''.$ujk_noserlok;?></td>
                                </tr>
                                 <tr>
                                    <td>Tanggal UJK</td>
                                    <td>: <?php echo ''.$ujk_ujian;?></td>
                                </tr>
                                <tr>
                                    <td>HASIL UJK</td>
                                    <td>: <?php echo ''.$kelulusan;?></td>
                                </tr>
                                 <tr>
                                    <td>Tanggal Terima Sertifikat</td>
                                    <td>: <?php echo ''.$ujk_ujian;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-primary" colspan="2">ADMINISTRASI KEUANGAN DAN AKUNTING BLK</td>
                                </tr>
                                <tr>
                                    <td>NO RESI BIAYA UJK PEMBAYARAN KE LSP</td>
                                    <td>: <?php echo ''.$ujk_noresibayar;?></td>
                                </tr>
                                 <tr>
                                    <td>NO INVOICE UJK </td>
                                    <td>: <?php echo ''.$ujk_noinvoice;?></td>
                                </tr>
                                 <tr>
                                    <td>JUMLAH KEHADIRAN BULAN KE  </td>
                                    <td>: <?php echo '';?></td>
                                </tr>
                                <tr>
                                    <td>TGL NO RESI APRESIASI PKL </td>
                                    <td>: <?php echo '';?></td>
                                </tr>
                                <tr>
                                    <td class="bg-primary" colspan="2">DATA MASA PELATIHAN TKI DI BLK </td>
                                </tr>
                                <tr>
                                    <td>Cek Fisik <button type="button" class="btn btn-danger btn-xxs" data-toggle="modal" data-target="#edit2">Ubah</button></td>
                                    <td>: <?php echo $row->cektgl.' ( '.$row->insnya.' ) '.$row->cekket;?></td>
                                </tr>
                                <tr>
                                    <td>Tangga Terima Ranjang <button type="button" class="btn btn-danger btn-xxs" data-toggle="modal" data-target="#edit3">Ubah</button></td>
                                    <td>: <?php echo $row->ranjangtgl.' - '."Kode Ranjang: ".$row->kode_no_ranjang." - Lokasi: ".$row->lokasi." - Ranjang: ".$row->ranjang;?></td>
                                </tr>
                                <tr>
                                    <td>Status Finger Absen per Hari ini</td>
                                    <td>: <?php 
                                    $date = date('d-m-Y');
                                    echo 'Tgl Terakhir: '.$date.' ( Pagi: '.$jmlfingerpagi.' )'.' ( Sore: '.$jmlfingersore.' )';?></td>
                                </tr>
                                <tr>
                                    <td>Status Durasi Dari TGL REGISTRASI </td>
                                    <td>: <?php echo 'Total Semua Finger (Pagi-Sore jadi satu) total: ( '.$tglns.' )';?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkiraan Selesai Aktual Di BLK</td>
                                    <td>: <?php echo ''.$hitunganfingernodaft;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkiraan Selesai Durasi</td>
                                    <td>: <?php echo ''.$hitunganfingernodaftujuh;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkiraan UJK</td>
                                    <td>: <?php echo ''.$hitunganfingernodafbelas;?></td>
                                </tr>

                                </tbody>


                     <div class="modal fade" id="edit1" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('blk_personaldetail/update_data_blk_registrasi'); ?>">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">UBAH Tanggal Registrasi <?php echo $row->nodaftar; ?></h5>
                            </div>
                           <div class="modal-body">
                              <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->nodaftar; ?>">
                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Tanggal Registrasi</label>
                                                <input type="text" name="adm_tglreg" value="<?php echo $row->adm_tglreg;?>" placeholder="EX: YYYY-MM-DD" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

                     <div class="modal fade" id="edit998" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('blk_personaldetail/update_data_angkatan'); ?>">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">UBAH Tanggal Pertama Angkatan <?php echo $row->nodaftar; ?></h5>
                            </div>
                           <div class="modal-body">
                              <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->nodaftar; ?>">
                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Tanggal Angkatan</label>
                                                <input type="text" name="tglangk" value="<?php echo $xtglawal;?>" placeholder="EX: YYYY-MM-DD" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


    <div class="modal fade" id="edit" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('blk_personaldetail/update_data_blk_personaldetail'); ?>">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">UBAH DATA PERSONAL <?php echo $row->nodaftar; ?></h5>
                            </div>
                           <div class="modal-body">
                              <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->nodaftar; ?>">
                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="<?php echo $row->namanya;?>" placeholder="EX: Budi" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Nama Pemilik TKI</label>
                                                 <select class="select-results-color" id="pemilikxx" name="pemilik">
                                                    <option  value="<?php echo $row->pemilik;?>"><?php echo $row->pemilikx; echo " - ".$row->negarapemilikx;?></option>
                                                   <?php  foreach ($tampil_data_pemilik_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->negara;?>
                                                   <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>PL (SPONSOR)</label>
                                                <input type="text" name="sponsor" value="<?php echo $row->sponsor;?>" placeholder="EX: Ani" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>ID DIPNAKER</label>
                                                <input type="text" name="nodisnaker" value="<?php echo $row->nodisnaker;?>" placeholder="EX: 12345" class="form-control">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>NO DAFTAR TKI</label>
                                                <input type="text" name="notki" value="<?php echo $row->nodaftar;?>"placeholder="EX: 0001 (NO ID TIDAK BOLEH SAMA)" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <div class="row">
                                              <div class="col-sm-4">
                                                <label>TEMPAT LAHIR</label>
                                                <input type="text" name="tempatlahir" value="<?php echo $row->tempatlahir;?>" placeholder="EX: Lamongan" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>TANGGAL LAHIR</label>
                                               <input type="text" name="tanggalnyas" value="<?php echo $row->tanggallahir;?>" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                            </div>
                                            <div class="col-sm-4">
                                                <label>JENIS KELAMIN</label>
                                                 <select class="select-results-color"  id="jeniskelamin" name="jeniskelamin">
                                                     <option value="<?php echo $row->jeniskelamin;?>"><?php echo $row->jeniskelamin;?></option>
                                                   <?php  foreach ($tampil_data_jk_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>ALAMAT</label>
                                                <input type="text" name="alamat"  value="<?php echo $row->alamatx;?>" placeholder="EX: Jalan Flamboyan" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                      <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>NO TELP</label>
                                                <input type="text" name="notelp"  value="<?php echo $row->notelp;?>"placeholder="EX: 0811111" class="form-control">
                                            </div>
                                             <div class="col-sm-4">
                                                <label>PENDIDIKAN</label>
                                                <input type="text" name="pendidikan"  value="<?php echo $row->pendidikan;?>"placeholder="EX: SMA" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>NO KTP</label>
                                                <input type="text" name="noktp"  value="<?php echo $row->noktp;?>"placeholder="EX: 0032123" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>TUJUAN NEGARA</label>
                                                 <select class="select-results-color" id="negara" name="negara">
                                                     <option  value="<?php echo $row->negara;?>"><?php echo $row->negara;?></option>
                                                   <?php  foreach ($tampil_data_negara_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                             <div class="col-sm-4 ">
                                                <label >BAHASA</label>
                                                 <select class="select-results-color " name="bahasa">
                                                   <option  value="<?php echo $row->bahasa;?>"><?php echo $row->bahasa;?></option>
                                                   <?php  foreach ($tampil_data_bahasa_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>EKS/NON</label>
                                                <select class="select-results-color" name="eksnon">
                                                   <option  value="<?php echo $row->eksnon;?>"><?php echo $row->eksnon;?></option>
                                                    <?php  foreach ($tampil_data_eksnon_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                   <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Cluster</label>
                                                 <select class="select-results-color" name="cluster">
                                                     <option  value="<?php echo $row->cluster;?>"><?php echo $row->cluster;?></option>
                                                    <?php  foreach ($tampil_data_cluster_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                   <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>NO PASPOR</label>
                                                <input type="text"  value="<?php echo $row->nopaspor;?>" name="nopaspor" placeholder="EX: 111232" class="form-control">
                                            </div>

                                           <!--  <div class="col-sm-6">
                                                <label>INPUT FOTO</label>
                                                <input type="file" name="foto" class="file-styled">
                                            </div> -->

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                              <div class="col-sm-4">
                                                <label>Tgl MED AWAL</label>
                                                <input type="text" name="tglmed" value="<?php echo $row->tglmedawal;?>"placeholder="EX: YYYY-MM-DD" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Tgl MED FULL</label>
                                               <input type="text" name="tglmedfull" value="<?php echo $row->tglmedfull;?>"placeholder="EX:YYYY-MM-DD" class="form-control" >
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Tgl SIDIK JARI</label>
                                               <input type="text" name="tgljari" value="<?php echo $row->tglsidikjari;?>"placeholder="EX:YYYY-MM-DD" class="form-control" >
                                            </div>
                                        </div>
                                    </div>



                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

                     <div class="modal fade" id="edit2" tabindex="-1"role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('blk_personaldetail/update_data_blk_cek'); ?>">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">UBAH Data Masa Pelatihan  <?php echo $row->nodaftar; ?></h5>
                            </div>
                           <div class="modal-body">
                              <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->nodaftar; ?>">
                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Tanggal Cek FIsik</label>
                                                <input type="text" name="cektgl" value="<?php echo $row->cektgl;?>" placeholder="EX: YYYY-MM-DD" class="form-control">
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-sm-12">
                                                <label>Nama Instruktur</label>
                                                 <select class="select-results-color" name="cekins">
                                                     <option value="<?php echo $row->cekins;?>"><?php echo $row->insnya;?></option>
                                                  <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->nama;?>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-sm-12">
                                                <label>Keterangan</label>
                                                <input type="text" name="cekket" value="<?php echo $row->cekket;?>" placeholder="EX: adalah" class="form-control">
                                            </div>
                                        </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


                                
                        </table>

                       
                    </div>
                </div>


            </div>
                    

                     <div id="edit3" class="modal fade">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('blk_personaldetail/update_data_blk_ranjang'); ?>">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">UBAH Tanggal Registrasi <?php echo $row->nodaftar; ?></h5>
                            </div>
                           <div class="modal-body">
                              <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->nodaftar; ?>">
                            <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Tanggal Terima Ranjang</label>
                                                <input type="text" name="ranjangtgl" value="<?php echo $row->ranjangtgl;?>" placeholder="EX: YYYY-MM-DD" class="form-control">
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-sm-12">
                                                <label>Pilih No Ranjang</label>
                                                 <select class="select-results-color" name="ranjangno">
                                                     <option value="<?php echo $row->ranjangno;?>"><?php echo "Kode Ranjang: ".$row->kode_no_ranjang." - Lokasi: ".$row->lokasi." - Ranjang: ".$row->ranjang;?></option>
                                                  <?php  foreach ($tampil_data_ranjang as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->id_no_ranjang;?>" /><?php echo "Kode Ranjang: ".$pilihan->kode_no_ranjang." - Lokasi: ".$pilihan->lokasi." - Ranjang: ".$pilihan->ranjang;?>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                           </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

                    <div class="col-lg-3">

                        <!-- User thumbnail -->
                        <div class="thumbnail">
                            <div class="thumb thumb-rounded thumb-slide">
                                <img src="assets/images/placeholder.jpg" alt="">
                                <div class="caption">
                                    <span>
                                        <a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                        <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin"><?php echo $row->namanya;?><small class="display-block">CALON CTKI</small></h6>
                                <ul class="icons-list mt-15">
                                    <li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /user thumbnail -->


                        <!-- Navigation -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Navigation</h6>
                                <div class="heading-elements">
                                    <a href="#" class="heading-text"> &rarr;</a>
                                </div>
                            </div>
                            <?php 
                                $idbio_explode = explode("-",$idbio);
                                $tipe_id = $idbio_explode[0];
                            ?>

                            <div class="list-group list-group-borderless no-padding-top">
                                <a href="<?php echo site_url('blk_personaldetail/index/'.$idbio); ?>" class="list-group-item"><i class="icon-cog3"></i> Data Personal</a>
                                <div class="list-group-divider"></div>
                                <a href="<?php echo site_url('blk_personaldetail/pembinaan/'.$idbio); ?>" class="list-group-item"><i class="icon-bed2"></i> Pembinaan BLK </a>
                                <div class="list-group-divider"></div>
                                <a href="<?php echo site_url('blk_fisik_mental/index/'.$idbio); ?>" class="list-group-item"><i class="icon-brain"></i> Data Penilaian Fisik Mental</a>
                                <?php 

                                    if ($tipe_id == 'FI' || $tipe_id == 'MI' || $tipe_id == 'JP') {
                                ?>
                                        <a href="<?php echo site_url('blk_mandarin_inf_jompo/index/'.$idbio); ?>" class="list-group-item"><i class="icon-bookmark"></i> Data Penilaian Mandarin Informal-Jompo</a>
                                        <a href="<?php echo site_url('blk_bhs_taiyu/index/'.$idbio); ?>" class="list-group-item"><i class="icon-tumblr2"></i> Data Penilaian Bahasa Taiyu</a>
                                        <a href="<?php echo site_url('blk_jompo/index/'.$idbio); ?>" class="list-group-item"><i class="icon-accessibility2"></i> Data Penilaian Jompo</a>
                                <?php
                                    }    
                                    if ($tipe_id == 'FI' || $tipe_id == 'MI') {
                                ?>
                                        <a href="<?php echo site_url('blk_graha_laundry/index/'.$idbio); ?>" class="list-group-item"><i class="icon-shutter"></i> Data Penilaian Graha Laundry</a>
                                        <a href="<?php echo site_url('blk_graha_ruang/index/'.$idbio); ?>" class="list-group-item"><i class="icon-cube"></i> Data Penilaian Graha Ruang</a>
                                        <a href="<?php echo site_url('blk_graha_boga/index/'.$idbio); ?>" class="list-group-item"><i class="icon-ampersand"></i> Data Penilaian Graha Boga</a>
                                        <a href="<?php echo site_url('blk_tata_boga/index/'.$idbio); ?>" class="list-group-item"><i class="icon-wave2"></i> Data Penilaian Tata Boga</a>
                                <?php 
                                    } elseif ($tipe_id == 'MF' || $tipe_id == 'FF') {
                                ?>
                                        <a href="<?php echo site_url('blk_mandarin_pabrik/index/'.$idbio); ?>" class="list-group-item"><i class="icon-book3"></i> Data Penilaian Mandarin Pabrik</a>
                                        <a href="<?php echo site_url('blk_olah_raga/index/'.$idbio); ?>" class="list-group-item"><i class="icon-dribbble"></i> Data Penilaian Olah Raga</a>
                                        <a href="<?php echo site_url('blk_berhitung/index/'.$idbio); ?>" class="list-group-item"><i class="icon-seven-segment-4"></i> Data Penilaian Berhitung</a>
                                <?php
                                    } 
                                ?>
                                        <a href="<?php echo site_url('blk_psikotest/index/'.$idbio); ?>" class="list-group-item"><i class="icon-puzzle3"></i> Data Penilaian Psikotest</a>
                                <?php        
                                    if ($tipe_id == 'FI' || $tipe_id == 'MI') {
                                ?>
                                        <a href="<?php echo site_url('blk_umum/index/'.$idbio); ?>" class="list-group-item"><i class="icon-deviantart"></i> Data Penilaian Umum</a>
                                <?php   
                                    } 
                                ?>
                            </div>
                        </div>
                        <!-- /navigation -->
 <?php } ?>

                        <!-- Share your thoughts -->
                        
                        <!-- /share your thoughts -->


                        <!-- Balance chart -->
                        <!-- /balance chart -->


                        <!-- Connections -->
                        
                        <!-- /connections -->

                    </div>
            </div>
                <!-- /user profile -->

                <div class="row">
            <div class="col-lg-9">
        <div class="panel panel-flat">
                    <div class="panel-heading ">
                         <h5 class="panel-title ">DATA KB TKI</h5>
                        <div class="heading-elements ">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                     <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>JENIS KB</th>
                                <th>TANGGAL SUNTIK</th>
                                <th>KB SUNTIK(BULAN)</th>
                                <th>MASA KADALUWARSA</th>
                                <th>BLK</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_kb as $row) { ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->kode_jenis_kb;?> <?php echo $row->ket_kb;?></td>
                                <td><?php echo $row->tgl_suntik;?></td>
                                <td><?php echo $row->kb_suntik;?></td>
                                <td><?php echo $row->masa_kadaluwarsa;?></td>
                                <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ketnya;?></td>
                            </tr>
                        <?php $no++;  } ?>
                        </tbody>
                    </table>

                </div>
                </div>
                </div>

                <div class="row">
            <div class="col-lg-9">
        <div class="panel panel-flat ">
                    <div class="panel-heading ">
                         <h5 class="panel-title">DATA IJIN KELUAR</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>TANGGAL</th>
                                <th>JAM KELUAR</th>
                                <th>JAM KEMBALI</th>
                                <th>TERLAMBAT (MENIT)</th>
                                <th>AKM TERLAMBAT</th>
                                <th>BLK PEMBERI IZIN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                            foreach ($tampil_data_izin_keluar as $row) { ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->tgl;?></td>
                                <td><?php echo $row->jam_keluar;?></td>
                                <td><?php echo $row->jam_kembali;?></td>
                                <td><?php echo $row->terlambat;?></td>
                                <td><?php echo $row->akm_terlambat;?></td>
                                <td><?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ket;?></td>
                                    
                            </tr>
                        <?php $no++;  } ?>
                        </tbody>
                    </table>

                </div>
                </div>
                </div>

                                <div class="row">
            <div class="col-lg-9">
        <div class="panel panel-flat ">
                    <div class="panel-heading ">
                         <h5 class="panel-title">DATA IJIN INAP</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                      <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>TANGGAL / JAM KELUAR</th>
                                 <th>TANGGAL / JAM KEMBALI</th>
                                <th>TERLAMBAT (MENIT)</th>
                                <th>AKM TERLAMBAT</th>
                                <th>BLK PEMBERI IZIN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_izin_inap as $row)    { 
                                  ?>
                            <tr>    
                                
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                                <td><?php echo $row->tglmasuk.'<br>'.$row->jammasuk;?></td>
                                <td><?php echo $row->terlambat;?></td>
                                <td><?php echo $row->akm_terlambat;?></td>
                                <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ket;?></td>
                            </tr>
                     
                        <!-- /HAPUS izin_inap TKI -->
                        <?php $no++;  } ?>
                        </tbody>
                    </table>

                </div>
                </div>
                </div>

                <div class="row">
            <div class="col-lg-9">
        <div class="panel panel-flat ">
                    <div class="panel-heading ">
                         <h5 class="panel-title">DATA IJIN PULANG</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                      <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>JAM KELUAR</th>
                                <th>JAM KEMBALI</th>
                                <th>TERLAMBAT (JAM)</th>
                                <th>AKM </th>
                                <th>BLK PEMBERI IZIN (MARK)</th>
                                <th>BLK PEMBERI IZIN (ADM)</th>
                                <th>BLK PEMBERI IZIN (BLK)</th>
                                <th>KET</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_izin_pulang as $row)  { 
                                   ?>
                            <tr>    
                                
                                <td><?php echo $no;?></td>
                               <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                                <td><?php echo $row->tglkembali.'<br>'.$row->jamkembali;?></td>
                                <td><?php echo $row->terlambat;?></td>
                                <td><?php echo $row->akm_terlambat;?></td>
                                <td><?php echo $row->kode_marketing;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->kode_adm_kantor;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ket;?></td>

                            </tr>
                      
                        <?php $no++;  } ?>
                        </tbody>
                    </table>

                </div>
                </div>
                </div>

                <div class="row">
            <div class="col-lg-9">
        <div class="panel panel-flat ">
                    <div class="panel-heading ">
                         <h5 class="panel-title">DATA IJIN TIDAK HADIR</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                       <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>JAM KELUAR</th>
                                <th>JAM KEMBALI</th>
                                <th>KEPERLUAN</th>
                                <th>MARK PEMBERI IZIN</th>
                                <th>ADM PEMBERI IZIN</th>
                                <th>BLK PEMBERI IZIN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_izin_tdk_hadir as $row)   { 
                                    ?>
                            <tr>    
                                
                                <td><?php echo $no;?></td>
                               <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                                <td><?php echo $row->tglkembali.'<br>'.$row->jamkembali;?></td>
                                <td><?php echo $row->kode_izin_keperluan;?> - <?php echo $row->ket;?></td>
                                <td><?php echo $row->kode_marketing;?> - <?php echo $row->namamark;?> - <?php echo $row->jabatanmark;?></td>
                                <td><?php echo $row->kode_adm_kantor;?> - <?php echo $row->namaadm;?> - <?php echo $row->jabatanadm;?></td>
                                <td><?php echo $row->kode_instruktur;?> - <?php echo $row->namablk;?> - <?php echo $row->jabatanblk;?></td>

                            </tr>
               
                        <?php $no++;  } ?>
                        </tbody>
                    </table>

                </div>
                </div>
                </div>

                 <div class="row">
            <div class="col-lg-9">
        <div class="panel panel-flat ">
                    <div class="panel-heading ">
                         <h5 class="panel-title">DATA PELATIHAN PKL</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                        <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                                            <thead>
                                            <tr>
                                                <th>APRESIASI PKL</th>
                                                <th>Actions</th>
                                                <th>PKL</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Jumlah Hari</th>
                                                <th>Tempat</th>
                                                <?php 
                                                    foreach ($tampil_aspek as $row) {
                                                        echo '<th>'.$row->abjad.'. '.$row->aspek.' (NILAI)</th>';
                                                    }
                                                ?>
                                                <th>Nilai Rata-rata</th>
                                                <th>Pembina (BLK)</th>
                                                <th>No Resi Apresiasi TKI Informal</th>
                                                <th>Kepada</th>
                                                <th>Jumlah</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($tampil_hasilpkl as $row) { 
                                                        $rata2 = $this->M_blk_personaldetail->rata2($row->id_pkl)->rata2;
                                                        $rata = $this->M_blk_personaldetail->rata($row->id_pkl);
                                                        $jumlah = $row->jml_hari*$row->nominal;
                                                        ?>
                                                        <tr>
                                                          <td>  <a href="<?php echo site_url('blk_personaldetail/cetak_pkl/'.$row->id_pkl); ?>" target="_blank" class="btn btn-danger btn-sm"><i class="icon-printer2"></i>PRINT</a> </td>
                                                          <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pkl<?php echo $row->id_pkl; ?>"><i class="icon-search2"></i> </button> 
                                                        </td>
                                                        <td><?php echo $row->pkl_ke;?></td>
                                                        <td><?php echo $row->tgl_mulai;?></td>
                                                        <td><?php echo $row->tgl_selesai;?></td>
                                                        <td><?php echo $row->jml_hari;?></td>
                                                        <td><?php echo $row->nama_tempat;?></td>
                                                        <?php
                                                            foreach ($rata as $row2) {
                                                                echo '<td>'.$row2->rata.'</th>';
                                                            }
                                                        ?>
                                                        <td><?php echo $rata2;?></td>
                                                        <td><?php echo $row->nama;?></td>
                                                        <td><?php echo $row->no_resi;?></td>
                                                        <td><?php echo $row->kepada;?></td>
                                                        <td><?php echo $row->nominal?></td>
                                                        
                                                        </tr>
                            <!-- UPDATE pkl TKI -->
                            <div id="edit_pkl<?php echo $row->id_pkl; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update PKL <?php echo $idbio; ?></h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_pkl'); ?>" class="form-horizontal" method="post">                                        
                                            <input type="hidden" class="form-control" name="id_pkl" value="<?php echo $row->id_pkl; ?>">
                                            <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tempat PKL</label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="id_tempatpkl" >
                                                                <?php 
                                                                    foreach ($tampil_tempatpkl as $row2 ) { 
                                                                        $sel = ($row2->id_tempatpkl==$row->id_tempatpkl)?'selected="selected"':'';
                                                                        ?>
                                                                        <option value="<?php echo $row2->id_tempatpkl?>" <?php echo $sel;?>><?php echo $row2->nama_tempat?></option>
                                                                <?php    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Instruktur</label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="id_instruktur" >
                                                                <?php 
                                                                    foreach ($tampil_data_instruktur as $row2 ) { 
                                                                        $sel = ($row2->id_instruktur==$row->id_instruktur)?'selected="selected"':'';
                                                                        ?>
                                                                        <option value="<?php echo $row2->id_instruktur?>"><?php echo $row2->nama?></option>
                                                                <?php    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Mulai </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Tanggal Suntik" class="form-control" name="tgl_mulai" data-format='yyyy-MM-dd' value="<?php echo $row->tgl_mulai;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Selesai </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Tanggal Suntik" class="form-control" name="tgl_selesai" data-format='yyyy-MM-dd' value="<?php echo $row->tgl_selesai;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">No Resi Apresiasi PKL</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="No Resi Apresiasi PKL" class="form-control" name="no_resi" value="<?php echo $row->no_resi;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Kepada</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Kepada" class="form-control" name="kepada" value="<?php echo $row->kepada;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Nominal</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Nominal" class="form-control" name="nominal" value="<?php echo $row->nominal;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    foreach ($tampil_aspek as $row4) { ?>
                                                    <div class="form-group">
                                                    <div class="row">
                                                        <h5><label class="control-label col-sm-12"><?php echo $row4->abjad.'. '.$row4->aspek?></h5>  
                                                    </div>
                                                                  
                                                    </div>
                                                    <?php

                                                        $no=1;
                                                        $materi = $this->M_blk_personaldetail->tampil_materi($row4->id_aspek);

                                                        foreach ($materi as $row2) { ?>
                                                            <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-6"><?php echo $no.'. '.$row2->materi;?></label>
                                                                <div class="col-sm-2">
                                                                <select class="select-menu-color" name="id_nilai<?php echo $row2->id_materipkl;?>" >
                                                                    <?php
                                                                    $aa = $this->M_blk_personaldetail->tampil_penilaian($row->id_pkl, $row2->id_materipkl);
                                                                        foreach ($tampil_pilihan as $row3) {
                                                                            
                                                                            $sel = ($aa->id_nilai == $row3->id_nilai)?'selected="selected"':'';
                                                                         ?>
                                                                            <option value="<?php echo $row3->id_nilai;?>" <?php echo $sel;?>><?php echo $row3->keterangan?></option>
                                                                    <?php    }
                                                                    ?>
                                                                </select>
                                                                   
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="text" placeholder="Penjelasan" class="form-control" name="penjelasan<?php echo $row2->id_materipkl;?>" value="<?php echo $aa->penjelasan?>" >
                                                                </div>
                                                            </div>
                                                                
                                                            </div> 
                                                    <?php $no++;
                                                       }
                                                    }
                                                ?>
                                                                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /UPDATE pkl TKI -->                            
                
                                                <?php    }
                                                ?>
                                            </tbody>
                                        </table>

                </div>
                </div>
                </div>


            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->


        <!-- Footer -->
      <!--   <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div> -->
        <!-- /footer -->

    </div>
    <!-- /page container -->

