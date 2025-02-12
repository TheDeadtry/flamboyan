
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Laporan AN05 </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper"> 

            <div class="row">

                <div class="col-lg-6">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>PRINT LAPORAN PER AGEN</div> <br>
                            </h5>
                        </div>

                        <form target="_blank" id="printv2_form" action="<?php echo site_url('pdf7/cetaklaporanagen');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class="panel-body">   
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> PRINT MULAI TGL  </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="tglmulai" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3"> SAMPAI TGL </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="tglakhir" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label col-sm-3"> Pilih Data Agen </label>
                                    <div class="col-sm-9">
                                       <select class="select-search" name="id_agen" data-placeholder="Choose a Category">
                                            <option value="x_semua_agen">SEMUA AGEN</option>
                                            <?php  foreach ($tampil_data_namaagen as $pilihan) { ?>
                                            <option value="<?php echo $pilihan->id_agen;?>" /><?php echo $pilihan->nama.' ('.$pilihan->groupnama.')';?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3"> </label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn bg-blue-800" id="printv1_btn"> PRINT <i class="icon-arrow-right14 position-right"></i></button>
                                    <!--<button type="submit" class="btn bg-orange-800" id="printv2_btn"> PRINT (BANK) <i class="icon-arrow-right14 position-right"></i></button>-->
                                    <button type="button" class="btn bg-teal-800" id="print_bankv1">PRINT BANK</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>PRINT LAPORAN PER WILAYAH DISNAKER</div> <br>
                            </h5>
                        </div>

                        <form target="_blank" id="printv2_form" action="<?php echo site_url('pdf7/cetaklaporanperwilayahdisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class="panel-body">   
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> PRINT MULAI TGL  </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="tglmulai" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3"> SAMPAI TGL </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="tglakhir" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label col-sm-3"> Pilih Wilayah Disnaker </label>
                                    <div class="col-sm-9">
                                       <select class="select-search" name="wildis" data-placeholder="Choose a Category">
                                            <option value="">Pilih Wilayah Disnaker</option>
                                            <?php  foreach ($tampil_data_namadisnaker as $pilihan) { ?>
                                            <option value="<?php echo $pilihan->wilayah;?>" /><?php echo $pilihan->wilayah?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3"> </label>
                                <div class="col-sm-9">
                                    <button type="button" class="btn bg-blue-800" id="printv1_btn"> PRINT <i class="icon-arrow-right14 position-right"></i></button>
                                    <!--<button type="submit" class="btn bg-orange-800" id="printv2_btn"> PRINT (BANK) <i class="icon-arrow-right14 position-right"></i></button>-->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">

                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>LAPORAN AN05</div> <br>
                            </h5>
                            <div class="heading-elements">
                                <a href="<?php echo base_url()."index.php/print_data/"?>" role="button" class="btn bg-success-800"> Kembali</a>
                                <a href="#myModal1" role="button" class="btn bg-success-800" data-toggle="modal">Tambah Data</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class='data-table table table-bordered table-striped' id="suveringtos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Opsi</th>
                                        <th>Print</th>
                                        <th>Nomor</th>
                                        <th>Tanggal</th>
                                         <th>Print Data Tanggal</th>
                                    </tr>
                                </thead>
                                <body>
                                    
                                </body>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
                                            <div id="myModal2" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning-800">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h3 id="myModalLabel1">Tambah Data</h3>
                                                        </div>
                                                        <form action="<?php echo site_url('surat_rekom_laporan/edit_surat/');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                            <div class="modal-body">
                                                            
                                                        		<input type="hidden" class="form-control" name="id_pembuatan" value="" id="edit_id">

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Nomor Surat</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nomor" value="" class="form-control"  placeholder="Berisi Data Surat" id="edit_nomor" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> Tanggal Dokumen </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" id="edit_tanggal">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> PRINT MULAI TGL  </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tglmulai" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" id="edit_tanggal2">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="form-group">
                                                                    <label class="control-label col-sm-3"> SAMPAI TGL </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tglakhir" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" id="edit_tanggal3">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn bg-danger-800" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                <button class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="myModal1" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary-800">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h3 id="myModalLabel1">Tambah Data</h3>
                                                        </div>
                                                        <form action="<?php echo site_url('surat_rekom_laporan/simpan_data_surat/');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Nomor Surat </label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="nomor" placeholder="Berisi Data Surat" class="form-control" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> Tanggal Dokumen </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> PRINT MULAI TGL  </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tglmulai" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> SAMPAI TGL </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tglakhir" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn bg-danger-800" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                <button class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="modal_bankv1" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning-800">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h3 id="myModalLabel1">FORM PRINT BANK</h3>
                                                        </div>
                                                        <form action="<?php echo site_url('surat_rekom_laporan/print_bankv1/');?>" enctype="multipart/form-data" method="post" class="form-horizontal" id="form_bankv1" />
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">BANK</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="select-search" name="bank" data-placeholder="Choose a Category">
                                                                            <?php  
                                                                                foreach ($tampil_data_bank as $pilihan) { 
                                                                            ?>
                                                                                    <option value="<?php echo $pilihan->id_bank;?>" /><?php echo $pilihan->isi;?>
                                                                            <?php 
                                                                                } 
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> PRINT MULAI TGL  </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tglmulai" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3"> SAMPAI TGL </label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="tglakhir" autocomplete="off" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-danger-800" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                <button type="submit" class="btn btn-primary" id="btn_bankv1">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

    <script type="text/javascript">
        $('#suveringtos').dataTable({
            scrollY: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url"       : "<?php echo site_url('surat_rekom_laporan/show_data/') ?>",
                "type"      : "POST"
            }
        });

        function edit1234(id) {
            $.ajax({
                url: '<?php echo site_url('surat_rekom_laporan/edit_show') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+id,
                encode:true,
                success:function (data) {
                    $('#edit_id').val(data.id_pembuatan);
                    $('#edit_nomor').val(data.nomor);
                    $('#edit_tanggal').val(data.tanggal);
                    $('#edit_tanggal').datepicker().datepicker('setDate', data.tanggal);
                    $('#edit_tanggal2').val(data.tglmulai).trigger("change");
                    $('#edit_tanggal2').datepicker().datepicker('setDate', data.tglmulai);
                    $('#edit_tanggal3').val(data.tglakhir).trigger("change");
                    $('#edit_tanggal3').datepicker().datepicker('setDate', data.tglakhir);
                }
            })
        }

        $('#printv1_btn').click(function() {
            $( "#printv2_form" ).attr('action', '<?php echo site_url('pdf7/cetaklaporanagen') ?>')
        });

        $('#printv2_btn').click(function() {
            $( "#printv2_form" ).attr('action', '<?php echo site_url('surat_rekom_laporan/print_v2') ?>')
            //$.post( "<?php echo site_url('surat_rekom_laporan/print_v2') ?>", $( "#printv2_form" ).serialize() );
        });

        $('#print_bankv1').click(function() {
            $('#modal_bankv1').modal('toggle');
        });

        $('#btn_bankv1').click(function() {
            $.ajax({

            });
        });
    </script>