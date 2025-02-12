<!-- 
buat script dibawah script selection untuk tampil_data_kejadiansakit sesuaiakan
table blk_kejadiansakit
id
tglmulai
tglberakhir
sakit
ibuasrama
keterangan
-->
<div class="panel-body">

    <table class="table datatable-basic table-bordered table-striped table-hover" id="table1">
        <thead>
            <tr class="active">
                <th colspan="7">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal_sakit">TAMBAH DATA KEJADIAN SAKIT</button>
                    <div id="modal_form_horizontal_sakit" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Tambah Kejadian Sakit [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_kejadiansakit'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        
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
                                            <label class="control-label col-sm-3">Sakit</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Sakit" class="form-control" name="sakit">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Ibu Asrama</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Ibu Asrama" class="form-control" name="ibuasrama">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
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
                <th>TANGGAL MULAI</th>
                <th>TANGGAL BERAKHIR</th>
                <th>SAKIT</th>
                <th>IBU ASRAMA</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($tampil_data_kejadiansakit as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editsakit<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapussakit<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                        </td>
                        <td><?php echo $row->tglmulai;?></td>
                        <td><?php echo $row->tglberakhir;?></td>
                        <td><?php echo $row->sakit;?></td>
                        <td><?php echo $row->ibuasrama;?></td>
                        <td><?php echo $row->keterangan;?></td>
                    </tr>

                    <div id="editsakit<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Update Kejadian Sakit [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_kejadiansakit'); ?>" class="form-horizontal" method="post">                                        
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                    
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
                                            <label class="control-label col-sm-3">Sakit</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Sakit" class="form-control" name="sakit" value="<?php echo $row->sakit;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Ibu Asrama</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Ibu Asrama" class="form-control" name="ibuasrama" value="<?php echo $row->ibuasrama;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"><?php echo $row->keterangan;?></textarea>
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

                    <div id="hapussakit<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Hapus Kejadian Sakit [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_kejadiansakit'); ?>" class="form-horizontal" method="post">                                     
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