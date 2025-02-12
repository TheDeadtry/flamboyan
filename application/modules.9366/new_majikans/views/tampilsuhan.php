
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">History Suhan </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-info panel-bordered">

                        <div class="panel-heading">
                            <a class='btn bg-purple-400' data-toggle='modal' href='#tambahagama' role='button'>Tambah History Suhan</a>
                            <a class='btn bg-pink' href="<?php echo site_url('new_majikans/tampildatasuhan/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>">Kembali</a>
                            <h5 class="panel-title text-center ">Suhan <?php echo $ambidatasuhan;?> - <?php echo $ambidatasuhanmajikan;?>  <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class=" table table-bordered table-striped" style='margin-bottom:0;' id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Terima</th>
                                         <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; 
                                        foreach ($tampil_datahistory as $row) { ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row->tgl_terima;?></td>
                                        <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a> 
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></a>
                                        </td>
                                    </tr>

                                    <div class='modal fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class='modal-header bg-primary'>
                                                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                                    <h3>Ubah History Suhan</h3>
                                                </div>
                                                <form class="form-horizontal" method="post" action="<?php echo site_url('new_majikans/update_history_suhan/'.$idnya.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup); ?>">
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="id_suhanhistory" value="<?php echo $row->id_suhanhistory; ?>">
                                                        <div class="control-group" id="berlaku">
                                                            <label class="control-label"> Tgl Simpan Suhan </label>
                                                            <div class="controls">
                                                                <div class="input-group input-append date dewdate" id="datePicker">
                                                                    <input type="text" class="form-control" name="tgl_terima" value="<?php echo $row->tgl_terima; ?>"/>
                                                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
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


                                    <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal" method="post" action="<?php echo site_url('new_majikans/hapus_history_suhan/'.$idnya.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup); ?>">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                        <h4 class="modal-title">Hapus Data History</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="id_suhanhistory" value="<?php echo $row->id_suhanhistory; ?>">
                                                        <p>Apakah anda yakin akan menghapus data History ini? : <?php echo $row->id_suhanhistory; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                <div class='modal fade' id='tambahagama' role='dialog' tabindex='-2'>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class='modal-header bg-primary'>
                                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                <h3>Tambah History Suhan</h3>
                            </div>
                            <div class='modal-body'>
                                <form action="<?php echo site_url('new_majikans/simpan_history_suhan/'.$idnya.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                    <input type="hidden" class="form-control" name="id_suhanhistory" value="<?php echo $idnya; ?>">
                                    <div class="form-group" id="berlaku">
                                        <label class="control-label"> Tgl Terima </label>
                                        <div class="controls">
                                            <div class="input-group input-append date dewdate" id="datePicker">
                                                <input type="text" class="form-control" name="tgl_terima" />
                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button class='btn' data-dismiss='modal'>Close</button>
                                        <button class='btn btn-primary'>Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function goBack() {
                        window.history.back();
                    }

                    $('#fixedeks').dataTable();
                </script>