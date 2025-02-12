
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">PRINT PENGAJUAN PAP / KTKLN / DAFTAR DATA </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert bg-info alert-styled-left">
                <button data-dismiss="alert" class="close"> x </button> <p> Data DISNAKER dan Data PASPOR harus Diisi Terlebih dahulu...</p>
            </div>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('surat_rekom_tabelpap/setid'); ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <label class="control-label col-sm-1">ID TKI </label>
                                <div class="col-sm-4">
                                    <select class="select-search" name="id" data-placeholder="Choose a Category" tabindex="1">
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
                                    <a href="<?php echo base_url()."index.php/surat_rekom_tabelpap/setsemua"?>" role="button" class="btn btn-info btn-large">Semua</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>PENGAJUAN PAP / KTKLN / DAFTAR DATA</div> <br>
                            </h5>
                            <div class="heading-elements">
                                <a href="<?php echo base_url()."index.php/print_data/"?>" role="button" class="btn bg-success-800"> Kembali</a>
                                <a href="#myModal1" role="button" class="btn bg-success-800" data-toggle="modal">Tambah Data</a>
                            </div>
                        </div>

                        <div class="panel-body">     
                            <div class="table-responsive">        
                                <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                            <th>Tambah CTKI</th>
                                            <th>Nomor Surat PAP</th>
                                            <th>Nomor Surat KTKLN</th>
                                            <th>Lembaga</th>
                                            <th>Daerah</th>
                                            <th>Tanggal PAP</th>
                                            <th>Tanggal</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info-800">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel1">Tambah Data</h3>
                </div>
                <form action="<?php echo site_url('surat_rekom_tabelpap/simpan_data_surat/');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nomer Surat PAP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nomor" class="form-control" value="........./TKI/FGJ/...../......" placeholder="Berisi Data Surat" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Nomer Surat KTKLN</label>
                            <div class="col-sm-9">
                                <input type="text" name="nomorktkln" class="form-control" value="........./TKI/FGJ/...../......." placeholder="Berisi Data Surat" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3"> Kepada </label>
                            <div class="col-sm-9">
                                <select class="select-search" name="kepada" data-placeholder="Choose a Category" required>
                                    <?php foreach ($tampil_data_namapap as $pilihan) { ?>
                                        <option value="<?php echo $pilihan->isi." <br>".$pilihan->mandarin;?>" /><?php echo $pilihan->isi." <br>".$pilihan->mandarin;?>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Daerah</label>
                            <div class="col-sm-9">
                                <input type="text" name="daerah" class="form-control"  placeholder="Berisi Data Surat" class="form-control" required>
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label class="control-label col-sm-3"> Tanggal Dokumen </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" required>
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                                                       
                        <div class="form-group">
                            <label class="control-label col-sm-3"> Tanggal PAP </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="tanggalpap" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" required>
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="myModalLabel1">Ubah Data</h3>
                </div>
                <form action="<?php echo site_url('surat_rekom_tabelpap/edit_surat') ?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                    <div class="modal-body">
                        <input  class="hidden" name="id_pembuatanpap" id="id_pembuatanpap" value="">

                        <div class="form-group">
                            <label class="control-label col-sm-4">Nomer Surat PAP</label>
                            <div class="col-sm-8">
                                <input type="text" name="nomor" class="form-control" value="" placeholder="Berisi Data Surat" class="form-control" id="nomor" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Nomer Surat KTKLN</label>
                            <div class="col-sm-8">
                                <input type="text" name="nomorktkln" class="form-control" value="" placeholder="Berisi Data Surat" class="form-control" id="nomorktkln" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4"> Kepada </label>
                            <div class="col-sm-8">
                                <select name="kepada" class="select-search" data-placeholder="Choose a Category" id="kepada" required>
                                    <?php  foreach ($tampil_data_namapap as $pilihan) { ?>
                                        <option value="<?php echo $pilihan->isi." <br>".$pilihan->mandarin;?>" /><?php echo $pilihan->isi." <br>".$pilihan->mandarin;?>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Daerah</label>
                            <div class="col-sm-8">
                                <input type="text" name="daerah" value="" class="form-control"  placeholder="Berisi Data Surat" class="form-control" id="daerah" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4"> Tanggal Dokumen </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" name="tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" id="tanggal" required>
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4"> Tanggal PAP </label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" name="tanggalpap" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker" id="tanggalpap" required>
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
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
        $('#fixedeks').dataTable({
            scrollX: true,
            scrollY: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url"       : "<?php echo site_url('surat_rekom_tabelpap/show_data/') ?>",
                "type"      : "POST"
            }
        });

        function edit666(id) {
            $.ajax({
                url: '<?php echo site_url('surat_rekom_tabelpap/edit_show') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+id,
                encode:true,
                success:function (data) {
                    $('#id_pembuatanpap').val(data.id_pembuatanpap);
                    $('#nomor').val(data.nomor);
                    $('#nomorktkln').val(data.nomorktkln);
                    $('#kepada').val(data.kepada).trigger("change");;
                    $('#daerah').val(data.daerah);
                    $('#tanggal').val(data.tanggal);
                    $('#tanggal').datepicker().datepicker('setDate', data.tanggal);
                    $('#tanggalpap').val(data.tanggalpap);
                    $('#tanggalpap').datepicker().datepicker('setDate', data.tanggalpap);
                }
            })
        }
    </script>