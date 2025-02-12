<div class="panel-body">
    <table class="table datatable-basic table-bordered table-striped table-hover" id="table1">
        <thead>
            <tr class="active">
                <th colspan="6">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal_piketdapur">TAMBAH DATA PIKET DAPUR</button>
                    <div id="modal_form_horizontal_piketdapur" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Tambah Piket Dapur [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_piketdapurblk'); ?>" class="form-horizontal" method="post">
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
                                                    <input required="required" type="text" placeholder="Tanggal Berakhir" autocomplete="off" class="form-control dewdate2" name="tglberakhir">
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
                <th>TANGGAL MULAI</th>
                <th>TANGGAL BERAKHIR</th>
                <th>PEMBERI NILAI</th>
                <th>NILAI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($tampil_data_piketdapurblk as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editpiketdapur<?php echo $no; ?>"><i class="icon-pencil"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuspiketdapur<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                        <td><?php echo $row->tglmulai;?></td>
                        <td><?php echo $row->tglberakhir;?></td>
                        <td><?php echo $row->pemberiannilai;?></td>
                        <td><?php echo $row->nilai;?></td>
                    </tr>
                    <!-- Edit Modal -->
                     <!-- Add this after the table row, inside the foreach loop -->
                    <div id="editpiketdapur<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Update Piket Dapur [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('blk_personaldetail/update_data_piketdapurblk'); ?>" class="form-horizontal" method="post">                                        
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $row->id; ?>">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Mulai</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="Tanggal Mulai" autocomplete="off" class="form-control dewdate2" name="tglmulai" value="<?php echo $row->tglmulai;?>">
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
                                                        <input required="required" type="text" placeholder="Tanggal Berakhir" autocomplete="off" class="form-control dewdate2" name="tglberakhir" value="<?php echo $row->tglberakhir;?>">
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

                    <div id="hapuspiketdapur<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title">Hapus Piket Dapur [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_piketdapurblk'); ?>" class="form-horizontal" method="post">                                     
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

                    <!-- Delete Modal -->
            <?php 
                $no++; 
                } 
            ?>
        </tbody>
    </table>
</div>
