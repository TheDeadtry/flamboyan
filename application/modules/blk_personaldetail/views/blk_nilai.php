<!-- 
table blk_piketdapur
id
tglmulai
tglberakhir
pemberiannilai
nilai
-->
<div class="panel-body">

    <table class="table datatable-basic table-bordered table-striped table-hover" id="table1">
        <thead>
            <tr class="active">
                <th colspan="7">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal_nilai">TAMBAH DATA GRAHA PAGI</button>
                    <div id="modal_form_horizontal_nilai" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Tambah Graha Pagi [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_piketdapur'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tempat</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Tempat" class="form-control" name="tempat">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Waktu</label>
                                            <div class="col-sm-9">
                                                <select required="required" class="form-control" name="waktu">
                                                    <option value="">Pilih Waktu</option>
                                                    <option value="pagi">Pagi</option>
                                                    <option value="sore">Sore</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tanggal Mulai</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Tanggal Mulai" autocomplete="off" class="form-control" name="tglmulai" id="add_tanggal_mulai">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tanggal Berakhir</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Tanggal Berakhir" autocomplete="off" class="form-control dewdate2" name="tglberakhir" id="add_tanggal_berakhir">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Pemberi Nilai</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Pemberi Nilai" class="form-control" name="pemberiannilai">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Nilai</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="number" placeholder="Nilai" class="form-control" name="nilai">
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
                </th>
            </tr>
            <tr>
                <th>NO</th>
                <th class="text-center">ACTIONS</th>
                <th>WAKTU</th>
                <th>TANGGAL MULAI</th>
                <th>TANGGAL BERAKHIR</th>
                <th>Pemberi NILAI</th>
                <th>NILAI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($tampil_data_piketdapur as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editnilai<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusnilai<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                        </td>
                        <td><?php echo $row->waktu;?></td>
                        <td><?php echo $row->tglmulai;?></td>
                        <td><?php echo $row->tglberakhir;?></td>
                        <td><?php echo $row->pemberiannilai;?></td>
                        <td><?php echo $row->nilai;?></td>
                    </tr>

                    <div id="editnilai<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Update Graha Pagi [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_piketdapur'); ?>" class="form-horizontal" method="post">                                        
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Tempat</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Tempat" class="form-control" name="tempat" value="<?php echo $row->tempat;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Waktu</label>
                                            <div class="col-sm-9">
                                                <select required="required" class="form-control" name="waktu">
                                                    <option value="">Pilih Waktu</option>
                                                    <option value="pagi" <?php echo ($row->waktu == 'pagi') ? 'selected' : ''; ?>>Pagi</option>
                                                    <option value="sore" <?php echo ($row->waktu == 'sore') ? 'selected' : ''; ?>>Sore</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Tanggal Mulai</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Tanggal Mulai" autocomplete="off" class="form-control dewdate2" name="tglmulai" value="<?php echo $row->tglmulai;?>" id="edit_tanggal_mulai">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Tanggal Berakhir</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Tanggal Berakhir" autocomplete="off" class="form-control dewdate2" name="tglberakhir" value="<?php echo $row->tglberakhir;?>" id="edit_tanggal_berakhir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Pemberi Nilai</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Pemberi Nilai" class="form-control" name="pemberiannilai" value="<?php echo $row->pemberiannilai;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Nilai</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="number" placeholder="Nilai" class="form-control" name="nilai" value="<?php echo $row->nilai;?>">
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

                    <div id="hapusnilai<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Hapus Graha Pagi [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_piketdapur'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                                        <p>Apakah anda yakin akan menghapus data ini?</p>
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

<script type="text/javascript">
    $('#add_tanggal_mulai').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        minDate: "dateToday"
    });

    $('#edit_tanggal_mulai').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        minDate: "dateToday"
    });

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