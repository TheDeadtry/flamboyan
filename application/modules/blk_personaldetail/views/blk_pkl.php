<div class="panel-body">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_pkl">TAMBAH HASIL KEGIATAN PKL</button>
    <div id="modal_form_pkl" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Tambah Hasil PKL [<?php echo $idbio; ?>]</h5>
                </div>
                <form action="<?php echo site_url('blk_personaldetail/simpan_data_pkl'); ?>" class="form-horizontal" method="post">
                    <div class="modal-body">

                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Tempat PKL</label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="id_tempatpkl" required="required" >
                                    <?php 
                                        foreach ($tampil_tempatpkl as $row ) { ?>
                                            <option value="<?php echo $row->id_tempatpkl?>"><?php echo $row->nama_tempat?></option>
                                    <?php    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Instruktur</label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="id_instruktur" required="required" >
                                    <?php 
                                        foreach ($tampil_data_instruktur as $row ) { ?>
                                            <option value="<?php echo $row->id_instruktur?>"><?php echo $row->nama?></option>
                                    <?php    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Tanggal Mulai" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tgl_mulai" data-format='yyyy-MM-dd'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Selesai</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Tanggal Selesai" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tgl_selesai" data-format='yyyy-MM-dd'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">No Resi Apresiasi PKL</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="No Resi Apresiasi PKL" class="form-control" name="no_resi" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Kepada</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kepada" class="form-control" name="kepada" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nominal</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Nominal" class="form-control" name="nominal" >
                            </div>
                        </div>
                        <?php
                            foreach ($tampil_aspek as $row) { ?>
                            <div class="form-group">
                                <h5><label class="control-label col-sm-12"><?php echo $row->abjad.'. '.$row->aspek?></h5>            
                            </div>
                            <?php
                                $no=1;
                                $materi = $this->M_blk_personaldetail->tampil_materi($row->id_aspek);
                                foreach ($materi as $row2) { ?>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6"><?php echo $no.'. '.$row2->materi;?></label>
                                        <div class="col-sm-2">
                                        <select class="select-menu-color" name="id_nilai<?php echo $row2->id_materipkl;?>" >
                                            <?php
                                                foreach ($tampil_pilihan as $row3) { ?>
                                                    <option value="<?php echo $row3->id_nilai;?>"><?php echo $row3->keterangan?></option>
                                            <?php    }
                                            ?>
                                        </select>
                                           
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" placeholder="Penjelasan" class="form-control" name="penjelasan<?php echo $row2->id_materipkl;?>" >
                                        </div>
                                    </div> 
                            <?php $no++;
                               }
                            }
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Catatan</label>
                            <div class="col-sm-9">
                                <textarea placeholder="Catatan" class="form-control dewket" name="catatan" ></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table datatable-basic table-bordered table-striped table-hover" id="table6">
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
                <th>Catatan</th>
                
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
                        <td>
                            <a href="<?php echo site_url('blk_personaldetail/cetak_pkl/'.$row->id_pkl); ?>" class="btn btn-danger btn-sm"><i class="icon-printer2"></i> PRINT</a> 
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pkl<?php echo $row->id_pkl; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pkl<?php echo $row->id_pkl; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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
                        <td><?php echo $row->catatan?></td>
                    </tr>

                    <div id="edit_pkl<?php echo $row->id_pkl; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update PKL [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_pkl'); ?>" class="form-horizontal" method="post">                                        
                                    <input type="hidden" class="form-control" name="id_pkl" value="<?php echo $row->id_pkl; ?>">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tempat PKL</label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="id_tempatpkl"  required="required">
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
                                                    <select class="select-menu-color" name="id_instruktur"  required="required">
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
                                                    <input type="text" placeholder="Tanggal Suntik" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tgl_mulai" data-format='yyyy-MM-dd' value="<?php echo $row->tgl_mulai;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Selesai </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Tanggal Suntik" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tgl_selesai" data-format='yyyy-MM-dd' value="<?php echo $row->tgl_selesai;?>">
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
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Catatan</label>
                                            <div class="col-sm-9">
                                                <textarea placeholder="Catatan" class="form-control dewket" name="catatan"><?php echo $row->catatan;?></textarea>
                                            </div>
                                        </div>
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

                    <div id="hapus_pkl<?php echo $row->id_pkl; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus PKL [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_pkl'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <input type="hidden" class="form-control" name="id_pkl" value="<?php echo $row->id_pkl; ?>">
                                        <p>Apakah anda yakin akan menghapus data dengan ID <code class="text-danger"><?php echo $row->pkl_ke;?> </code> </p>
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
            ?>
        </tbody>
    </table>

</div>


<script>
$('.dewdate2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            minDate: "dateToday",
            todayBtn: "linked",
            clearBtn: true,
            zIndexOffset: 1600
        }).click(function() {    
            $(this).datepicker('setDate', $(this).val() );
        }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

</script> 