<div class="panel-body">

    <table class="table datatable-basic table-bordered table-striped table-hover" id="table1">
        <thead>
            <tr class="active">
                <th colspan="8">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA JENIS KB</button>
                    <div id="modal_form_horizontal" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Tambah KB [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_kb'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">

                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3"> Jenis KB </label>
                                            <div class="col-sm-9">
                                                <select class="select-menu-color" name="id_jenis_kb" required="required" id="add_jenis_kb">
                                                    <option value="" />Select...
                                                    <?php  foreach ($tampil_data_Jenis_kb as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->id_jenis_kb;?>" /><?php echo $pilihan->kode_jenis_kb." <br>".$pilihan->ket;?>
                                                     <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tanggal suntik</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="EX: 2017-05-16 " autocomplete="off" class="form-control" name="tgl_suntik" id="add_tanggal_suntik">
                                                </div>
                                            </div>
                                        </div>
                <!--
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">KB Suntik</label>
                                            <div class="col-sm-9">
                                                <input required="required" type="text" placeholder="KB Suntik" class="form-control" name="kb_suntik" >
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tanggal Kadaluwarsa</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="Masa Kadaluwarsa" autocomplete="off" class="form-control dewdate2" name="masa_kadaluwarsa" id="add_tanggal_kadaluarsa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3"> BLK </label>
                                            <div class="col-sm-9">
                                                <select class="select-menu-color" name="id_instruktur"  required="required">
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
                </th>
            </tr>
            <tr>
                <th>NO </th>
                <th class="text-center">ACTIONS</th>
                <th>JENIS KB</th>
                <th>TANGGAL SUNTIK</th><!--
                <th>KB SUNTIK(BULAN)</th>-->
                <th>MASA KADALUWARSA</th>
                <th>BLK</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($tampil_data_kb as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                        </td> 
                        <td><?php echo $row->kode_jenis_kb;?> <?php echo $row->ket_kb;?></td>
                        <td><?php echo $row->tgl_suntik;?></td><!--
                        <td><?php echo $row->kb_suntik;?></td>-->
                        <td><?php echo $row->masa_kadaluwarsa;?></td>
                        <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                        <td><?php echo $row->ketnya;?></td>
                    </tr>

                    <div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update KB [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_kb'); ?>" class="form-horizontal" method="post">                                        
                                    <input type="hidden" class="form-control" name="id_kb" value="<?php echo $row->id_kb; ?>">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Kode Jenis KB </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="id_jenis_kb" required="required">
                                                        <option value="<?php echo $row->id_jenis_kb;?>"><?php echo $row->kode_jenis_kb." <br>".$row->ket;?></option>
                                                        <?php  foreach ($tampil_data_Jenis_kb as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_jenis_kb;?>" /><?php echo $pilihan->kode_jenis_kb." <br>".$pilihan->ket;?>
                                                        <?php   } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Suntik </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="Tanggal Suntik" autocomplete="off" class="form-control dewdate2" name="tgl_suntik" data-format='yyyy.MM.dd' value="<?php echo $row->tgl_suntik;?>" id="edit_tanggal_suntik">
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">KB Suntik</label>
                                                <div class="col-sm-9">
                                                    <input required="required" type="text" placeholder="KB Suntik" class="form-control" name="kb_suntik" value="<?php echo $row->kb_suntik;?>" >
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Kadaluwarsa</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="Masa Kadaluwarsa" autocomplete="off" class="form-control dewdate2" name="masa_kadaluwarsa" value="<?php echo $row->masa_kadaluwarsa;?>" id="edit_tanggal_kadaluarsa">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="id_instruktur" required="required">
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
                                                    <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" value="" ><?php echo $row->ketnya;?></textarea>
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

                    <div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus KB [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_kb'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <input type="hidden" class="form-control" name="id_kb" value="<?php echo $row->id_kb; ?>">
                                        <p>Apakah anda yakin akan menghapus data dengan Kode <code class="text-danger"><?php echo $row->kode_jenis_kb; ?></code> ?</p>
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
    $('#add_tanggal_suntik').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        minDate: "dateToday"
    }).on("input change", function (e) {
        //console.log("Date changed: ", e.target.value);
        var tgl = $('#add_tanggal_suntik').val();
        var tpe = $('#add_jenis_kb').val();
        currentDate = tgl;
        d = new Date(currentDate);
        if (tpe == 1) {
            dates = d.add({days:60});
        } else if (tpe == 7) {
            dates = d.add({days:90});
        } else if (tpe == 3) {
            dates = d.add({days:120});
        } else {
            dates = d.add({months:-11});
        }
        /*
        var d = new Date( tgl );
        d.setMonth( d.getMonth( ) + 3 );
        datee = d.getFullYear( ) + '-' + ("0" + (d.getMonth( ) + 3 )).slice(-2) + '-' + ("0" + d.getDate( )).slice(-2) ;
        */
        month = dates.getMonth()
        if (dates.getMonth() == 0) {
            month = 12;
        }
        datee = dates.getFullYear( ) + '-' + ("0" + month).slice(-2) + '-' + ("0" + dates.getDate( )).slice(-2) ;

        $('#add_tanggal_kadaluarsa').val(datee);
    });

    $('#edit_tanggal_suntik').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        minDate: "dateToday"
    }).on("input change", function (e) {
        //console.log("Date changed: ", e.target.value);
        var tgl = $('#edit_tanggal_suntik').val();
        var tpe = $('#edit_jenis_kb').val();
        currentDate = tgl;
        d = new Date(currentDate);
        if (tpe == 1) {
            dates = d.add({days:60});
        } else if (tpe == 7) {
            dates = d.add({days:90});
        } else if (tpe == 3) {
            dates = d.add({days:120});
        } else {
            dates = d.add({months:-11});
        }
        /*
        var d = new Date( tgl );
        d.setMonth( d.getMonth( ) + 3 );
        datee = d.getFullYear( ) + '-' + ("0" + (d.getMonth( ) + 3 )).slice(-2) + '-' + ("0" + d.getDate( )).slice(-2) ;
        */
        month = dates.getMonth()
        if (dates.getMonth() == 0) {
            month = 12;
        }
        datee = dates.getFullYear( ) + '-' + ("0" + month).slice(-2) + '-' + ("0" + dates.getDate( )).slice(-2) ;

        $('#edit_tanggal_kadaluarsa').val(datee);
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
 