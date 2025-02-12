    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Berhitung</span> - BLK</h4>

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
                        <h5 class="panel-title">Setting Data Awal</h5>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo site_url('blk_fisik_mental/setdata/'.$idbio) ?>" method="POST">
                            <?php 
                                $tgl555         = $this->session->userdata('tgl');
                                $id_penilai     = $this->session->userdata('id_penilai');
                                $nama_penilai   = $this->session->userdata('nama_penilai');

                                if ($tgl555 == NULL) {
                                    $tgl555 = 'BELUM TERISI !';
                                } else {
                                    $tgl555 = $tgl555;
                                    //date("d/m/Y", strtotime(
                                }

                                if ($id_penilai == "none") {
                                    $id_penilai = "BELUM TERISI !";
                                } else {
                                    $id_penilai = $id_penilai;
                                }

                                if ($nama_penilai == "none") {
                                    $nama_penilai = "BELUM TERISI !";
                                } else {
                                    $nama_penilai = $nama_penilai;
                                }

                            ?>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Tanggal </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <?php 
                                                if ($this->session->userdata('tgl')) {
                                                    $ttggll = $this->session->userdata('tgl');
                                                } else {
                                                    $ttggll = date("Y-m-d");
                                                }
                                            ?>
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input class="form-control" type="date" value="<?php echo $ttggll ?>" id="input_tgl" name="tgl">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Penilai </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <select name="penilai" class="form-control">
                                                <?php 
                                                    if ($this->session->userdata('nama_penilai')) {
                                                        echo '<option value="'.$this->session->userdata('id_penilai').','.$this->session->userdata('nama_penilai').'">'.$this->session->userdata('nama_penilai').'</option>';
                                                    } else {
                                                        echo '<option value="none,none"></option>';
                                                    }
                                                ?>
                                                <div class="list-group-divider"></div>
                                                <?php 
                                                    foreach ($tampil_data_blk_instruktur as $instruktur) {
                                                ?>
                                                    <option value="<?php echo $instruktur->id_instruktur.','.$instruktur->nama ?>"><?php echo $instruktur->nama ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="btn-group pull-left">
                                        </div>
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success btn-sm">SET</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Profile Data <?php echo $idbio;?></h5>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-lg datatable-basic table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="9" class="active">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahv">TAMBAH PENILAIAN</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td rowspan="2" max-width="100%" style="text-align:center">NO</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">TGL</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">PENILAI</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">MATERI</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">NILAI</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">KETERANGAN</td>
                                    <td rowspan="2" style="text-align:center">ACTION</td>
                                </tr>
                            </thead>
                            <tbody> 

                                <div class="modal fade" id="tambahv" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('blk_fisik_mental/tambah_nilai/'.$idbio); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">TAMBAH DATA NILAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="tgl" value="<?php echo $tgl555 ?>">
                                                    <input type="hidden" class="form-control" name="penilai" value="<?php echo $id_penilai?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Tanggal </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                    <input type="text" value="<?php echo date("d/m/Y", strtotime($tgl555)) ?>" name="x2" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Instruktur Penilai </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" value="<?php echo $nama_penilai ?>" name="x" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Materi </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="materi" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="none">Pilih Materi</option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_materi as $materi) {
                                                                        ?>
                                                                            <option value="<?php echo $materi->id_fisik_mental ?>"><?php echo $materi->kode_materi.' : '.$materi->nama_materi ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Nilai</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-pencil5"></i></span>
                                                                    <select name="nilai" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="none">Pilih Nilai Tulis</option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_nilai as $nt) {
                                                                        ?>
                                                                            <option value="<?php echo $nt->id_nilai ?>"><?php echo $nt->kode_nilai ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Keterangan </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-file-text"></i></span>
                                                                    <textarea value="" name="keterangan" placeholder="Keterangan" class="form-control tatagraha_keterangan"></textarea>
                                                                </div>
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
                                 <?php 
                                    error_reporting(0);
                                    $no = 0;
                                    $c  = 0;
                                    $i  = 0;
                                    foreach ($tampil_data_group as $group) {
                                    //foreach ($tampil_data_fisik_mental as $hasil) {
                                        $count  = $this->M_blk_fisik_mental->tampil_data_count($group->tgl,$idbio);
                                        //for($q=1;$q<=$count->total;$q++) {
                                            $h  = $this->M_blk_fisik_mental->tampil_data_fisik_mental($group->tgl,$idbio);
                                            foreach ($h as $hasil) {
                                         $no++;
                                        $id                 = $hasil->idpgl;
                                        $tgl[$no]           = date("Y.m.d", strtotime($hasil->tgl));
                                        $ket                = $hasil->ket;
                                        $materi             = $hasil->kode.' : '.$hasil->nama;
                                        //$union_idpenilai    = $hasil->unionpenilai;
                                        //$union_penilai      = $hasil->unionnamapenilai;
                                        $id_instruktur[$no] = $hasil->id_instruktur;
                                        $instruktur         = $hasil->instruktur;
                                        $minggu             = $hasil->mgid;
                                        $kode_inst 			= $hasil->kodinst;
                                        $nilai              = $this->M_blk_fisik_mental->get_nilai($hasil->nt);
                                        $row[$no]           = $count->total;
                                        
                                        $count_penilai = $this->M_blk_fisik_mental->tampil_data_count2($group->tgl,$idbio,$hasil->id_instruktur);

                                        //$tampil_data_laundry   = $this->M_blk_fisik_mental->tampil_data_laundry($group->tgl,$idbio);
                                        //$data['tampil_data_count']      = $this->M_blk_fisik_mental->tampil_data_count($idbio);
                                        if ($row[$no] > 1) {
                                            if ($tgl[$no-1] == $tgl[$no]) {
                                                $c++;
                                            } else {
                                                $c=1;
                                            }
                                        } else {
                                            $c=1;
                                        }
                                        if ($count_penilai->total2 > 1) {
                                            if ($tgl[$no-1] == $tgl[$no]) {
                                            	if ($id_instruktur[$no-1] == $id_instruktur[$no]) {
                                                	$i++;
	                                            } else {
	                                                $i=1;
	                                            }
                                            } else {
                                            	$i=1;
                                            }
                                            
                                        } else {
                                            $i=1;
                                        }
                                ?>
                                <tr>
                                    <td style="text-align:center" ><?php echo $no ?></td>
                                    <?php
                                        if($c == 1) {
                                            echo '<td style="text-align:center" rowspan="'.$count->total.'">'.$tgl[$no].'</td>';  
                                        } elseif($c == 0) {
                                            echo '<td style="text-align:center" rowspan="">'.$tgl[$no].'</td>';
                                        }
                                        if($i == 1) {
                                            echo '<td style="text-align:center" rowspan="'.$count_penilai->total2.'">'.$kode_inst.'</td>';  
                                        } elseif($i == 0) {
                                            echo '<td style="text-align:center" rowspan="">'.$kode_inst.'</td>';
                                        }
                                    ?>
                                   
                                    <td style="text-align:center" ><?php echo $materi ?></td>
                                    <td style="text-align:center" ><?php echo $nilai['kode_nilai'] ?></td>
                                    <td style="text-align:center" ><?php echo $ket ?></td>  
                                    <td style="text-align:center" >
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#" data-toggle="modal" data-target="#ubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span>Ubah</span></a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span>Hapus</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>  
                                </tr>     


                                <div class="modal fade" id="ubah<?php echo $no ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('blk_fisik_mental/ubah_nilai/'.$idbio); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH DATA NILAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control tatagraha_id" name="tatagraha_id" value="<?php echo $id ?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Tanggal </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                    <input type="date" maxlength="30" value="<?php echo $hasil->tgl ?>" name="tgl" class="form-control tatagraha_tgl">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Instruktur Penilai </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="penilai" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $hasil->id_instruktur ?>"><?php echo $instruktur ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_instruktur as $instruktur) {
                                                                        ?>
                                                                            <option value="<?php echo $instruktur->id_instruktur ?>"><?php echo $instruktur->nama ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Materi </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="materi" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $hasil->id_fisik_mental ?>"><?php echo $materi ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_materi as $materi) {
                                                                        ?>
                                                                            <option value="<?php echo $materi->id_fisik_mental ?>"><?php echo $materi->kode_materi.' : '.$materi->nama_materi ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Nilai</label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-pencil5"></i></span>
                                                                    <select name="nilai" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $nilai['id_nilai'] ?>"><?php echo $nilai['kode_nilai'] ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_nilai as $nt) {
                                                                        ?>
                                                                            <option value="<?php echo $nt->id_nilai ?>"><?php echo $nt->kode_nilai ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Keterangan </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-file-text"></i></span>
                                                                    <textarea value="<?php echo $ket ?>" name="keterangan" placeholder="Keterangan" class="form-control tatagraha_keterangan"><?php echo $ket ?></textarea>
                                                                </div>
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

                                <div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">Hapus Aspek </h5>
                                            </div>
                                            <form action="<?php echo site_url('blk_fisik_mental/hapus_nilai/'.$idbio); ?>" class="form-horizontal" method="post">                                       
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="tatagraha_id" value="<?php echo $id ?>">
                                                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                            }
                                     }                         
                                    ?>
                                
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-group" id="accordion-styled">
                        <div class="panel">
                            <div class="panel-heading bg-danger">
                                <h6 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group23">AKUMULASI PENILAIAN (Klik Disini)</a>
                                </h6>
                            </div>
                            <div id="accordion-styled-group23" class="panel-collapse collapse ">
                                <div class="panel-body">
                                    <table class="table table-lg datatable-basic table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">NO</th>
                                                <th rowspan="2" class="text-center">MATERI</th>
                                                <th colspan="2" class="text-center">NILAI</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">KALI</th>
                                                <th class="text-center">NILAI RATA2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 0;
                                            foreach($tampil_data_blk_materi as $erds) {
                                                $no++;
                                                $teori_kali     = $this->M_blk_fisik_mental->ambil_kali('nilai_id',$idbio,$erds->id_fisik_mental);
                                                $teori_rata     = $this->M_blk_fisik_mental->ambil_rata($idbio,$erds->id_fisik_mental);
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $erds->kode_materi.' : '.$erds->nama_materi ?></td>
                                                <td><?php echo $teori_kali->kali ?></td>
                                                <td><?php echo round($teori_rata->nilai,1) ?></td>
                                            </tr>
                                        <?php
                                            }
                                            $t_nilai_final = $t_nilai->total;

                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <th colspan="2">Total Rata2</th>
                                            <th><?php echo $count_total->total; ?></th>
                                            <th><?php echo round($t_nilai_final,1) ?></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-lg-3">

                        <!-- User thumbnail -->
                        <div class="thumbnail">
                            <div class="thumb thumb-rounded thumb-slide">
                                <?php 
                                $idbio_explode = explode("-",$idbio);
                                $tipe_id = $idbio_explode[0];
                                    if ($tipe_id != 'HK') {
                                    $qfoto = "SELECT foto FROM personal where id_biodata='".$idbio."'";
                                    $zfoto = $this->M_session->select_row($qfoto);
                                    //print_r($zfoto);
                                ?>
                                <img src="<?php echo base_url()."assets/uploads/".$zfoto->foto ; ?>" alt="">
                                <?php } else { ?>
                                <img src="" alt="">
                                <?php } ?>
                                <div class="caption">
                                    <span>
                                        <a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                        <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin"><?php echo $namanya;?><small class="display-block">CALON CTKI</small></h6>
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

                        <!-- Share your thoughts -->
                        
                        <!-- /share your thoughts -->


                        <!-- Balance chart -->
                        <!-- /balance chart -->


                        <!-- Connections -->
                        
                        <!-- /connections -->

                    </div>
            </div>
                <!-- /user profile -->

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