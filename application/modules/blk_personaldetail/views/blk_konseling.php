<!-- 
buat script dibawah script selection untuk tampil_data_konseling
sesuaikan dengan
table blk_konselingkhusus
columns
id
tgl
jammulai
jamberakhir
konselor
keterangan
-->
<div class="panel-body">

    <table class="table datatable-basic table-bordered table-striped table-hover" id="table1">
        <thead>
            <tr class="active">
                <th colspan="6">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal_konseling">TAMBAH DATA KONSELING</button>
                    <div id="modal_form_horizontal_konseling" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Tambah Konseling [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_konseling'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tanggal</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Tanggal" autocomplete="off" class="form-control" name="tgl" id="add_tanggal">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Jam Mulai</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="time" placeholder="Jam Mulai" class="form-control" name="jammulai">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Jam Berakhir</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="time" placeholder="Jam Berakhir" class="form-control" name="jamberakhir">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Konselor</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Konselor" class="form-control" name="konselor">
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
                <th>TANGGAL</th>
                <th>JAM MULAI</th>
                <th>JAM BERAKHIR</th>
                <th>KONSELOR</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($tampil_data_konseling as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editkonseling<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuskonseling<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                        </td>
                        <td><?php echo $row->tgl;?></td>
                        <td><?php echo $row->jammulai;?></td>
                        <td><?php echo $row->jamberakhir;?></td>
                        <td><?php echo $row->konselor;?></td>
                        <td><?php echo $row->keterangan;?></td>
                    </tr>

                    <div id="editkonseling<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Update Konseling [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_konseling'); ?>" class="form-horizontal" method="post">                                        
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Tanggal</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Tanggal" autocomplete="off" class="form-control dewdate2" name="tgl" value="<?php echo $row->tgl;?>" id="edit_tanggal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Jam Mulai</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="time" placeholder="Jam Mulai" class="form-control" name="jammulai" value="<?php echo $row->jammulai;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Jam Berakhir</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="time" placeholder="Jam Berakhir" class="form-control" name="jamberakhir" value="<?php echo $row->jamberakhir;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-sm-3">Konselor</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="Konselor" class="form-control" name="konselor" value="<?php echo $row->konselor;?>">
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

                    <div id="hapuskonseling<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Hapus Konseling [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_konseling'); ?>" class="form-horizontal" method="post">                                     
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
    $('#add_tanggal').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        minDate: "dateToday"
    });

    $('#edit_tanggal').datepicker({
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