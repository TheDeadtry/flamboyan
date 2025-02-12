<!-- Complex headers example -->


<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Majikan</span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetak') ?>">PRINT MAJIKAN</a>
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetaksemuadata') ?>">PRINT TKI LINK MAJIKAN</a>
                            <h5 class="panel-title text-center ">DATA MAJIKAN <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Dokumen</th>
                                        <th></th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Nama Taiwan</th>
                                        <th>Headphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nama Agen</th>
                                    </tr>
                                </thead>
                                <tbody>        

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary panel-bordered">
                        <div class="panel-heading ">
                            <h5 class="panel-title " style="vertical-align: middle">Input Majikan<br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('majikans/simpan_data_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Groups (jika tidak ada... Pilih Tidak Ada grup) </label>
                                    <div class="col-sm-9">
                                        <?php   echo form_dropdown("group",$option_group,"","id='group_id2' class='form-control'"); ?>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="jelasin_agen">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9">
                                        <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kode </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kode" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                               <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Taiwan </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="namamajikan" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Handphone </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alamat </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="alamat" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="file-input form-control" name="filenya" >
                                        <span class="help-block">Automatically convert a file input to a bootstrap file input widget by setting its class as <code>file-input</code>.</span>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
                </div>
                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: true,
                        "searchable": false,
                        fixedColumns: {
                            leftColumns: 0,
                            rightColumns: 0
                        },
                        processing: true,
                        bFilter: true,
                        "lengthChange": false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_majikans/show_majikan') ?>",
                            "type"      : "POST"
                        }
                    });
                </script>





