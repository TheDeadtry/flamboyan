<div class="panel-body">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal3">TAMBAH IJIN INAP</button>
    <div id="modal_form_horizontal3" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Tambah Ijin Inap [<?php echo $idbio; ?>]</h5>
                </div>
                <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_inap'); ?>" class="form-horizontal" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                           <!--  <div class="form-group">
                            <label class="control-label col-sm-3">Waktu Keluar dan Waktu Kembali</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="text" class="form-control daterange-time" name="keluar_kembali" data-format='yyyy.MM.dd' > 
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Keluar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input required="required" type="text" autocomplete="off" readonly="readonly" class="form-control pickadate-selectors dewdate2"  name="tglkeluar" placeholder="EX: 2017-05-16 ">
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
                                    <input type="text" autocomplete="off" readonly="readonly" class="form-control pickadate-selectors dewdate2"  name="tglkembali" placeholder="EX: 2017-05-16 ">
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

<!--
                        <?php if($hitung_data_terlambatinap==null){?>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Terlambat (Menit)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" id="lam"  value="0" onblur="recalculateSum();">
                            </div>
                        </div>
                        <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="0" id="tot" >

                        <div class="form-group">
                            <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total2" readonly="readonly" >
                            </div>
                        </div>
                        <?php }else{?>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Terlambats (Menit)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" id="lam"  value="0" onblur="recalculateSum();" >
                            </div>
                        </div>
                        <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="<?php echo $hitung_data_terlambatinap; ?>" id="tot" >
                        <div class="form-group">
                            <label class="control-label col-sm-3">AKM Terlambats (Menit)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total2" readonly="readonly" >
                            </div>
                        </div>

                        <?php } ?>-->
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3"> BLK </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="blk_pemberi_izin" required="required" >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Keterangan </label>
                            <div class="col-sm-9">
                                <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ></textarea>
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
    <table class="table datatable-basic table-bordered table-striped table-hover" id="table3">
        <thead>
            <tr>
                <th>NO </th>
                <th class="text-center">ACTIONS</th>
                <th>TANGGAL / JAM KELUAR</th>
                <th>TANGGAL / JAM KEMBALI</th><!--
                <th>TERLAMBAT (MENIT)</th>
                <th>AKM TERLAMBAT</th>-->
                <th>BLK PEMBERI IZIN</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1; 
                foreach ($tampil_data_izin_inap as $row) { 
            ?>
                    <tr>    
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editinap<?php echo $no; ?>"><i class="icon-pencil"></i></button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusinap<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                        </td> 
                        <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                        <td><?php echo $row->tglmasuk.'<br>'.$row->jammasuk;?></td><!--
                        <td><?php echo $row->terlambat;?></td>
                        <td><?php echo $row->akm_terlambat;?></td>-->
                        <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                        <td><?php echo $row->ket;?></td>
                    </tr>

                    <div id="editinap<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update Ijin Inap [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_izin_inap'); ?>" class="form-horizontal" method="post">                                        
                                   <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                    <input type="hidden" class="form-control" name="id_izin_inap" value="<?php echo $row->id_izin_inap; ?>">
                                
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
                                                <label class="control-label col-sm-3">Tanggal Masuk</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input type="text" placeholder="Tanggal Masuk" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tglmasuk" value="<?php echo $row->tglmasuk;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Masuk</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" placeholder="Jam Masuk" class="form-control" name="jammasuk" value="<?php echo $row->jammasuk;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" placeholder="Terlambat (Menit)" class="form-control" name="terlambat" value="<?php echo $row->terlambat;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" placeholder="" class="form-control" name="akm_terlambat" value="<?php echo $row->akm_terlambat;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk_pemberi_izin"  required="required">
                                                        <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->nama." - ".$row->jabatan_tugas;?></option>
                                                        <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Keterangan </label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" value="" ><?php echo $row->ket;?></textarea>
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

                    <div id="hapusinap<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus Ijin Inap [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_inap'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <input type="hidden" class="form-control" name="id_izin_inap" value="<?php echo $row->id_izin_inap; ?>">
                                        <p>Apakah anda yakin akan menghapus data dengan ID <code class="text-danger"><?php echo $row->id_izin_inap; ?></code> ?</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
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