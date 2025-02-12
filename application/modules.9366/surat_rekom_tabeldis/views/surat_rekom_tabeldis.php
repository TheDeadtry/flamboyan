
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">DATA ASURANSI PRA AWAL </span></h2>
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

                <div class="col-lg-12">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('surat_rekom_tabeldis/setid'); ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <label class="control-label col-sm-1">ID TKI </label>
                                <div class="col-sm-4">
                                    <select class="select-search" name="id" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="<?php echo $id;?>"/><?php echo $id;?>
                                        <?php  
                                            foreach ($tampil_data_tki as $pilihan) { 
                                                $sie = "";
                                                if ($pilihan->id_biodata == $id) {
                                                    $sie = 'selected="selected"';
                                                }
                                        ?>
                                            <option value="<?php echo $pilihan->id_biodata;?>" <?php echo $sie ?> /><?php echo $pilihan->id_biodata." ".$pilihan->nama;?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-info btn-large" name="submit">Tampilkan</button>
                                    <a href="<?php echo base_url()."index.php/surat_rekom_tabeldis/setsemua"?>" role="button" class="btn btn-info btn-large">Semua</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>DATA ASURANSI PRA AWAL</div> <br>
                            </h5>
                            <div class="heading-elements">
                                <a href="<?php echo base_url()."index.php/print_data/"?>" role="button" class="btn bg-success-800"> Kembali</a>
                                <a href="#myModal1" role="button" class="btn bg-success-800" data-toggle="modal">Tambah Data</a>
                            </div>
                        </div>

                        <div class="panel-body">    
                            <div class="table-responsive"> 
                                <table class="table table-bordered table-striped table-hover" id="suveringtos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                            <th>Tambah CTKI</th>
                                            <th>Daerah</th>
                                            <th>Tanggal</th>
                                            <th>Nama Asuransi</th>
                                            <th>Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>    
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

    <div id="myModal1" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info-800">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="myModalLabel1">Tambah Data</h3>
                </div>
                <form action="<?php echo site_url('surat_rekom_tabeldis/simpan_data_surat/');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Daerah</label>
                            <div class="col-sm-9">
                                <input type="text" name="daerah" class="form-control"  placeholder="Berisi Data Surat" required>
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
                            <label class="control-label col-sm-3">Nama Asuransi</label>
                            <div class="col-sm-9">
                                <select class="select-search" name="namaasuransi" data-placeholder="Choose a Category" tabindex="1" required="required">
                                    <option value=""/>Select...
                                    <?php  foreach ($tampil_data_namaasuransi as $pilihan2) { ?>
                                    <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Biaya</label>
                            <div class="col-sm-9">
                                <input type="text" name="biaya" class="form-control"  placeholder="Berisi Data Surat" required>
                            </div>
                        </div>
                                       
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

                    <div id="myModal2" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning-800">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 id="myModalLabel1">Ubah Data</h3>
                                </div>
                                <form action="<?php echo site_url('surat_rekom_tabeldis/edit_surat/');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_pembuatan" value="" id="edit_id">

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Daerah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="daerah" value="" class="form-control"  placeholder="Berisi Data Surat" id="edit_daerah" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3"> Tanggal Dokumen </label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="text" name="tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" id="edit_tgl" placeholder="Select Datepicker">
                                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Nama Asuransi</label>
                                            <div class="col-sm-9">
                                                <select class="select-search" name="namaasuransi" data-placeholder="Choose a Category" id="edit_asuransi">
                                                    <?php  foreach ($tampil_data_namaasuransi as $pilihan2) { ?>
                                                        <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Biaya</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="biaya" value="" placeholder="Berisi Data Surat" class="form-control" id="edit_biaya" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>     

    <script type="text/javascript">
        $('#suveringtos').dataTable({
            scrollX: true,
            scrollY: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url"       : "<?php echo site_url('surat_rekom_tabeldis/show_data/') ?>",
                "type"      : "POST"
            }
        });

        function edit777(id) {
            $.ajax({
                url: '<?php echo site_url('surat_rekom_tabeldis/edit_show') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+id,
                encode:true,
                success:function (data) {
                    $('#edit_id').val(data.id_pembuatan);
                    $('#edit_daerah').val(data.daerah);
                    $('#edit_tgl').val(data.tanggal);
                    $('#edit_tgl').datepicker().datepicker('setDate', data.tanggal);
                    $('#edit_asuransi').val(data.asuransi).trigger("change");
                    $('#edit_biaya').val(data.biaya);
                }
            })
        }
    </script>