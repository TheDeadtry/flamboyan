<div class="panel-body">

    <table class="table datatable-basic table-bordered table-striped table-hover" id="table1">
        <thead>
            <tr class="active">
                <th colspan="8">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal007">TAMBAH DATA KEJADIAN</button>
                    <div id="modal_form_horizontal007" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Tambah Kejadian Pelanggaran/Negatif [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_kejadian'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Tanggal</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input required="required" type="text" placeholder="EX: 2017-05-16 " autocomplete="off" class="form-control dewdate2" name="tgl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Kejadian </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" placeholder="Keterangan" class="form-control" name="kejadian" ></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3"> ADM </label>
                                            <div class="col-sm-9">
                                                <select class="select-menu-color" name="adm"  required="required">
                                                    <option value="" />Select...
                                                    <?php  
                                                        foreach ( $tampil_data_adm as $pilihan2 ) { 
                                                    ?>
                                                    <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                    <?php  
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3"> MARK </label>
                                            <div class="col-sm-9">
                                                <select class="select-menu-color" name="mark" required="required" >
                                                    <option value="" />Select...
                                                    <?php  
                                                        foreach ( $tampil_data_mark as $pilihan ) { 
                                                    ?>
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
                                                    <?php  
                                                        foreach ($tampil_data_instruktur as $pilihan) { 
                                                    ?>
                                                    <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                    <?php  
                                                        } 
                                                    ?>
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
                </th>
            </tr>
            <tr>
                <th>NO </th>
                <th class="text-center">ACTIONS</th>
                <th>TANGGAL</th>
                <th>KEJADIAN</th>
                <th>ADM</th>
                <th>MARK</th>
                <th>BLK</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
                foreach ($tampil_data_kejadian as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_kejadian_<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_kejadian_<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                        </td> 
                        <td><?php echo $row->tanggal; ?></td>
                        <td><?php echo $row->kejadian; ?></td>
                        <td><?php echo $row->adm; ?></td>
                        <td><?php echo $row->mark; ?></td>
                        <td><?php echo $row->blk; ?></td>
                    </tr>

                    <div id="edit_kejadian_<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update Kejadian Pelanggaran/Negatif [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_kejadian'); ?>" class="form-horizontal" method="post">       
                                        
                                        <input type="hidden" class="form-control" name="idz" value="<?php echo $row->id; ?>">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="EX: 2017-05-16 " autocomplete="off" class="form-control dewdate2" name="tgl" value="<?php echo $row->tanggal; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Kejadian </label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" placeholder="Keterangan" class="form-control" name="kejadian" ><?php echo $row->kejadian; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> ADM </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="adm"  required="required">
                                                        <option value="" />Select...
                                                        <?php  
                                                            foreach ( $tampil_data_adm as $pilihan2 ) { 
                                                                $sllc = "";
                                                                if ( $pilihan2->id_adm_kantor == $row->adm ) {
                                                                    $sllc = 'selected="selected"';
                                                                }
                                                        ?>
                                                        <option value="<?php echo $pilihan2->id_adm_kantor;?>" <?php echo $sllc; ?> /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                        <?php  
                                                            } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> MARK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="mark" required="required" >
                                                        <option value="" />Select...
                                                        <?php  
                                                            foreach ( $tampil_data_mark as $pilihan ) { 
                                                                $sllc = "";
                                                                if ( $pilihan->id_marketing == $row->mark ) {
                                                                    $sllc = 'selected="selected"';
                                                                }
                                                        ?>
                                                        <option value="<?php echo $pilihan->id_marketing;?>" <?php echo $sllc; ?> /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk" required="required" >
                                                        <option value="" />Select...
                                                        <?php  
                                                            foreach ($tampil_data_instruktur as $pilihan) {
                                                                $sllc = "";
                                                                if ( $pilihan->id_instruktur == $row->blk ) {
                                                                    $sllc = 'selected="selected"';
                                                                } 
                                                        ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" <?php echo $sllc; ?> /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                        <?php  
                                                            } 
                                                        ?>
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

                    <div id="hapus_kejadian_<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus Kejadian Pelanggaran/Negatif [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_kejadian'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="idz" value="<?php echo $row->id; ?>">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <p>
                                            Apakah anda yakin akan menghapus data dengan Kode 
                                            <code class="text-danger"><?php echo $row->id; ?></code> 
                                            ?
                                        </p>
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