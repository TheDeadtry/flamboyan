<div class="panel-body">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal5">TAMBAH IJIN TIDAK HADIR</button>
    <div id="modal_form_horizontal5" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Tambah Ijin Tidak Hadir [<?php echo $idbio; ?>]</h5>
                </div>
                <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_tdk_hadir'); ?>" class="form-horizontal" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">

                        <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Keluar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input required="required" type="text" class="form-control pickadate-selectors dewdate2" autocomplete="off" readonly="readonly" name="tglkeluar" placeholder="EX: 2017-05-16 ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Jam Keluar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                    <input required="required" type="text" placeholder="EX : 12:34" class="form-control" name="jamkeluar" id="anytime-time" >
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Kembali</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="text" class="form-control pickadate-selectors dewdate2" autocomplete="off" readonly="readonly" name="tglkembali" placeholder="EX: 2017-05-16 ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Jam Kembali</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                    <input type="text" class="form-control pickatime" name="jamkembali" placeholder="EX : 12:34">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Keperluan</label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="keperluan"  required="required">
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_izin_keperluan as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_izin_keperluan;?>" /><?php echo $pilihan->kode_izin_keperluan." - ".$pilihan->ket;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-sm-3"> ADM </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="adm" required="required" >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                    <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"> MARK </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="mark" required="required" >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"> BLK </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="blk" required="required" >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
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
    <table class="table datatable-basic table-bordered table-striped table-hover" id="table5">
        <thead>
            <tr>
                <th>NO </th>
                <th class="text-center">ACTIONS</th>
                <th>JAM KELUAR</th>
                <th>JAM KEMBALI</th>
                <th>KEPERLUAN</th>
                <th>MARK PEMBERI IZIN</th>
                <th>ADM PEMBERI IZIN</th>
                <th>BLK PEMBERI IZIN</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1; 
                foreach ($tampil_data_izin_tdk_hadir as $row) { 
            ?>
                    <tr>   
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_tdk_hadir/update_data_izin_tdk_hadir/'.$row->id_izin_tdk_hadir); ?>"><i class="icon-pencil"></i> Edit</a>  -->
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#edittdkhadir<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapustdkhadir<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> </button> 
                        </td> 
                        <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                        <td><?php echo $row->tglkembali.'<br>'.$row->jamkembali;?></td>
                        <td><?php echo $row->kode_izin_keperluan;?> - <?php echo $row->ket;?></td>
                        <td><?php echo $row->kode_marketing;?> - <?php echo $row->namamark;?> - <?php echo $row->jabatanmark;?></td>
                        <td><?php echo $row->kode_adm_kantor;?> - <?php echo $row->namaadm;?> - <?php echo $row->jabatanadm;?></td>
                        <td><?php echo $row->kode_instruktur;?> - <?php echo $row->namablk;?> - <?php echo $row->jabatanblk;?></td>
                    </tr>

                    <div id="edittdkhadir<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update Ijin Tidak Hadir [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_izin_tdk_hadir'); ?>" class="form-horizontal" method="post">                                      
                                    <input type="hidden" class="form-control" name="id_izin_tdk_hadir" value="<?php echo $row->id_izin_tdk_hadir; ?>">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Keluar </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="Tanggal Keluar" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tglkeluar" value="<?php echo $row->tglkeluar;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Keluar</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input required="required" type="text" placeholder="Jam Keluar" class="form-control" name="jamkeluar" value="<?php echo $row->jamkeluar;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Kembali</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="Tanggal Kembali" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tglkembali" value="<?php echo $row->tglkembali;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Kembali</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input required="required" type="text" placeholder="Jam Kembali" class="form-control" name="jamkembali" value="<?php echo $row->jamkembali;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> KEPERLUAN </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="keperluan"  required="required">
                                                        <option value="<?php echo $row->id_izin_keperluan;?>" ><?php echo $row->kode_izin_keperluan." - ".$row->ket;?></option>
                                                        <?php  
                                                            foreach ($tampil_data_izin_keperluan as $pilihan) { 
                                                        ?>
                                                                <option value="<?php echo $pilihan->id_izin_keperluan;?>" /><?php echo $pilihan->kode_izin_keperluan." - ".$pilihan->ket;?>
                                                        <?php  
                                                            } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk"  required="required">
                                                        <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->namablk." - ".$row->jabatanblk;?></option>
                                                        <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> ADM </label>
                                                <div class="col-sm-9">
                                                     <select class="select-menu-color" name="adm"  required="required">
                                        <option value="<?php echo $row->id_adm_kantor;?>" ><?php echo $row->kode_adm_kantor." - ".$row->namaadm." - ".$row->jabatanadm;?></option>
                                        <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                        <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                         <?php  } ?>
                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> MARK </label>
                                                <div class="col-sm-9">
                                                     <select class="select-menu-color" name="mark"  required="required">
                                        <option value="<?php echo $row->id_marketing;?>" ><?php echo $row->kode_marketing." - ".$row->namamark." - ".$row->jabatanmark;?></option>
                                        <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                        <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                         <?php  } ?>
                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    <hr>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="hapustdkhadir<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus Tidak Hadir [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_tdk_hadir'); ?>" class="form-horizontal" method="post">                                       
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_izin_tdk_hadir" value="<?php echo $row->id_izin_tdk_hadir; ?>">
                                         <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <p>Apakah anda yakin akan menghapus data dengan ID <code class="text-danger"><?php echo $row->id_izin_tdk_hadir; ?></code> ?</p>
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
                $no++;  
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