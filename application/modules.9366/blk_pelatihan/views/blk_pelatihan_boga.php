
                            <div id="tambah_boga" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH NILAI GRAHA BOGA [<?php echo $idbio; ?>]</h5>
                                        </div>

                                        <form action="<?php echo site_url('blk_pelatihan/tambah_boga/'.$idbio); ?>" class="form-horizontal" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="idbio" class="form-control" value="<?php echo $idbio;?>">
                                            
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">ID BIO</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" disabled="disabled" value="<?php echo $idbio;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">TANGGAL PENILAIAN</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tgl_ang" class="form-control dewdate2"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">INSTRUKTUR</label>
                                                        <div class="col-sm-9">
                                                            <select class="select-search" name="instruktur" >
                                                                <?php
                                                                    foreach ($tampil_instruktur as $row3) {
                                                                ?>
                                                                        <option value="<?php echo $row3->kode_instruktur;?>" ><?php echo $row3->kode_instruktur.' - '.$row3->nama?></option>
                                                                <?php    
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <h4><label class="control-label col-sm-12">PENILAIAN</label></h4>  
                                                    </div>        
                                                </div>
                                                <?php
                                                    foreach ($tampil_materi1 as $row4) { 
                                                ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3"><?php echo $row4->kode_materi.' - '.$row4->nama_materi ?></label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="id_nilai[]" >
                                                                    <?php
                                                                        foreach ($tampil_pilihan as $row3) {
                                                                            $sel = "";
                                                                            if ($row3->kode_nilai == "B7") {
                                                                                $sel = 'selected="selected"';
                                                                            }
                                                                    ?>
                                                                            <option value="<?php echo $row3->kode_nilai;?>" <?php echo $sel;?>><?php echo $row3->kode_nilai.' - '.$row3->keterangan?></option>
                                                                    <?php    
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <input type="hidden" name="id_materi[]" value="<?php echo $row4->id_graha_boga ?>">
                                                            </div>
                                                        </div>
                                                                  
                                                    </div>
                                                <?php
                                                    }
                                                ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <div class="col-lg-9">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>DATA PELATIHAN <?php echo $xpil_nama_paket; ?> [<?php echo $idbio;?>] </i></b></h5>

                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <a type="button" data-target="#tambah_boga" data-toggle="modal" class="btn btn-xs bg-primary" data-idbio="">TAMBAH NILAI</a>
                            <div class="table-responsive">
                                <table class="table table-lg table-bordered table-striped table-hover" id="datatable_123">
                                    <thead>
                                        <tr>
                                            <th colspan="9" class="active bg-primary"><!--
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahm">TAMBAH PENILAIAN</button>-->
                                                <select class="form-control" name="search_pelajaran" onchange="javascript:location.href=this.value;">
                                                    <?php 
                                                        foreach ($tampil_data_settingpaket as $row) {
                                                            $rdf = "";
                                                            if ($row->id_setting_paket == $u_pil_paket) {
                                                                $rdf = 'disabled="disabled" selected="selected"';
                                                            }
                                                    ?>
                                                            <option value="<?php echo site_url('blk_pelatihan/set_pilihan/'.$idbio.'/'.$row->id_setting_paket) ?>" <?php echo $rdf ?> ><?php echo $row->nama_paket ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">ID BIO</td>
                                            <td max-width="100%" style="text-align:center">INSTRUKTUR</td>
                                            <td max-width="100%" style="text-align:center">TGL PENILAIAN</td>
                                            <td style="text-align:center">DETAIL</td>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php 
                                            $no = 1;
                                            foreach($tampil_penilaian as $row) {
                                                //$ambil_id = $this->M_session->select_row("SELECT * FROM blk_penilaian_boga_mental WHERE ")
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $idbio; ?></td>
                                                    <td><?php echo $row->penilai_id; ?></td>
                                                    <td><?php echo $row->tgl; ?></td>
                                                    <td>
                                                        <a class="btn btn-xs bg-info" data-target="#show_boga<?php echo $no ?>" data-toggle="modal">DETAIL</a>
                                                        <a class="btn btn-xs bg-warning" data-target="#edit_boga<?php echo $no ?>" data-toggle="modal">EDIT</a>
                                                        <a class="btn btn-xs bg-danger" data-target="#delete_boga<?php echo $no ?>" data-toggle="modal">DELETE</a>
                                                    </td>
                                                </tr>
                                                <div id="show_boga<?php echo $no ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h5 class="modal-title">DETAIL NILAI GRAHA boga [<?php echo $idbio; ?>]</h5>
                                                            </div>

                                                            <form action="<?php echo site_url('blk_pelatihan/ubah_boga/'.$idbio); ?>" class="form-horizontal" method="post">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="idbio" class="form-control" value="<?php echo $idbio;?>">
                                                                
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="control-label col-sm-3">ID BIO</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $idbio;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="control-label col-sm-3">TANGGAL PENILAIAN</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="tgl_ang" class="form-control dewdate2" disabled="disabled"  value="<?php echo $row->tgl;?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="control-label col-sm-3">INSTRUKTUR</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="select-search" name="instruktur" disabled="disabled" >
                                                                                    <?php
                                                                                        foreach ($tampil_instruktur as $row3) {
                                                                                            $sel = "";
                                                                                            if ($row->penilai_id == $row3->kode_instruktur) {
                                                                                                $sel = 'selected="selected"';
                                                                                            }
                                                                                    ?>
                                                                                            <option value="<?php echo $row3->kode_instruktur;?>" <?php echo $sel ?> ><?php echo $row3->kode_instruktur.' - '.$row3->nama?></option>
                                                                                    <?php    
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <h4><label class="control-label col-sm-12">PENILAIAN</label></h4>  
                                                                        </div>        
                                                                    </div>
                                                                    <?php
                                                                        foreach ($tampil_materi1 as $row4) { 
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="control-label col-sm-3"><?php echo $row4->kode_materi.' - '.$row4->nama_materi ?></label>
                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control" name="id_nilai[]" disabled="disabled">
                                                                                        <?php
                                                                                            foreach ($tampil_pilihan as $row3) {
                                                                                                $aa = $this->M_session->select_row("SELECT * FROM blk_penilaian_graha_boga WHERE no_daftar='$idbio' and tgl='$row->tgl' and id_materi='$row4->id_graha_boga'");
                                                                                                $sel = "";
                                                                                                if ($row3->kode_nilai == $aa->id_nilai) {
                                                                                                    $sel = 'selected="selected"';
                                                                                                }
                                                                                        ?>
                                                                                                <option value="<?php echo $row3->kode_nilai;?>" <?php echo $sel;?>><?php echo $row3->kode_nilai.' - '.$row3->keterangan?></option>
                                                                                        <?php    
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                    <input type="hidden" name="id_materi[]" value="<?php echo $row4->id_graha_boga ?>">
                                                                                    <input type="hidden" name="id_data_penilaian[]" value="<?php echo $aa->id_penilaian_graha_boga ?>">
                                                                                </div>
                                                                            </div>
                                                                                      
                                                                        </div>
                                                                    <?php
                                                                        }
                                                                    ?>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="edit_boga<?php echo $no ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h5 class="modal-title">UBAH NILAI GRAHA BOGA [<?php echo $idbio; ?>]</h5>
                                                            </div>

                                                            <form action="<?php echo site_url('blk_pelatihan/ubah_boga/'.$idbio); ?>" class="form-horizontal" method="post">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="idbio" class="form-control" value="<?php echo $idbio;?>">
                                                                
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="control-label col-sm-3">ID BIO</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $idbio;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="control-label col-sm-3">TANGGAL PENILAIAN</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="tgl_ang" class="form-control dewdate2" value="<?php echo $row->tgl;?>"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="control-label col-sm-3">INSTRUKTUR</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="select-search" name="instruktur" >
                                                                                    <?php
                                                                                        foreach ($tampil_instruktur as $row3) {
                                                                                            $sel = "";
                                                                                            if ($row->penilai_id == $row3->kode_instruktur) {
                                                                                                $sel = 'selected="selected"';
                                                                                            }
                                                                                    ?>
                                                                                            <option value="<?php echo $row3->kode_instruktur;?>" <?php echo $sel ?> ><?php echo $row3->kode_instruktur.' - '.$row3->nama?></option>
                                                                                    <?php    
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <h4><label class="control-label col-sm-12">PENILAIAN</label></h4>  
                                                                        </div>        
                                                                    </div>
                                                                    <?php
                                                                        foreach ($tampil_materi1 as $row4) { 
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <label class="control-label col-sm-3"><?php echo $row4->kode_materi.' - '.$row4->nama_materi ?></label>
                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control" name="id_nilai[]" >
                                                                                        <?php
                                                                                            foreach ($tampil_pilihan as $row3) {
                                                                                                $aa = $this->M_session->select_row("SELECT * FROM blk_penilaian_graha_boga WHERE no_daftar='$idbio' and tgl='$row->tgl' and id_materi='$row4->id_graha_boga'");
                                                                                                $sel = "";
                                                                                                if ($row3->kode_nilai == $aa->id_nilai) {
                                                                                                    $sel = 'selected="selected"';
                                                                                                }
                                                                                        ?>
                                                                                                <option value="<?php echo $row3->kode_nilai;?>" <?php echo $sel;?>><?php echo $row3->kode_nilai.' - '.$row3->keterangan?></option>
                                                                                        <?php    
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                    <input type="hidden" name="id_materi[]" value="<?php echo $row4->id_graha_boga ?>">
                                                                                    <input type="hidden" name="id_data_penilaian[]" value="<?php echo $aa->id_penilaian_graha_boga ?>">
                                                                                </div>
                                                                            </div>
                                                                                      
                                                                        </div>
                                                                    <?php
                                                                        }
                                                                    ?>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="delete_boga<?php echo $no ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h5 class="modal-title">HAPUS NILAI GRAHA BOGA [<?php echo $idbio; ?>]</h5>
                                                            </div>

                                                            <form action="<?php echo site_url('blk_pelatihan/delete_boga/'.$idbio); ?>" class="form-horizontal" method="post">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="idbio" class="form-control" value="<?php echo $idbio;?>">
                                                                    <input type="hidden" name="tgl_ang" class="form-control" value="<?php echo $row->tgl;?>">
                                                                
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-sm-9">
                                                                                <code class="danger">APAKAH YAKIN INGIN MENGHAPUS PENILAIAN GRAHA BOGA ID <?php echo $idbio ?> DAN TGL <?php echo $row->tgl ?></code>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php 
                                            $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
