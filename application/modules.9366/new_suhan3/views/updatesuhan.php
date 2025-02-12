
<style type="text/css">
.inputfile, .inputhapus {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
.inputfile + label, .inputhapus + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: #222;
    display: inline-block;
    padding: 6px 10px;
    -webkit-transition: width 2s; /* Safari */
    transition: width 2s;
}

.inputfile:focus + label,
.inputfile + label:hover,
.inputhapus:focus + label,
.inputhapus + label:hover {
    background-color: red;
    border-radius: 9px;
}

.inputhapus {

}
</style>
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Update Suhan </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="panel panel-success panel-bordered">

                        <div class="panel-heading">
                            <h5 class="panel-title text-center ">Data Majikan <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('new_suhan/update_suhan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <input type="hidden" class="form-control" name="id_suhan" value="<?php echo $row->id_suhan; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No Suhan </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no" class="form-control" value="<?php echo $row->no_suhan; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Terbit</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglterbit" value="<?php echo $row->tglterbit; ?>"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tgl Expired </label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-append date dewdate" id="datePicker">
                                            <input type="text" class="form-control" name="tglexp" value="<?php echo $row->tglexp; ?>"/>
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <div class="thumbnail">
                                            <img max-width="250px" max-height="250px" src="<?php echo base_url() ?>/assets/doksuhan/<?php echo $row->filesuhan ?>" alt="KOSONG">
                                            <div class="caption">
                                                <input type="file" class="default" value="<?php echo $row->filesuhan; ?>" name="gambarnya" />
                                            </div>
                                        </div>
                                        <!--
                                        <div class="thumbnail">
                                            <?php
                                                if ($row->filesuhan !=NULL) {
                                            ?>
                                                <img src="<?php echo base_url() ?>/assets/doksuhan/<?php echo $row->filesuhan ?>" alt="GAMBAR KOSONG">
                                                <div class="caption">
                                                    <input type="file" name="gambarnya" id="file" class="inputfile" value="<?php echo $row->filesuhan; ?>" />
                                                    <label for="file">Ubah</label>
                                                    <button class="inputhapus" id="remve"></button>
                                                    <label for="remve">Hapus</label>
                                                    <div class="hasilinput"></div>
                                                </div>
                                            <?php
                                                } else {
                                            ?>
                                                <div class="caption">
                                                    <input type="file" name="gambarnya" id="file" class="inputfile" />
                                                    <label for="file">Tambah Baru</label>
                                                    <div class="hasilinput"></div>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        
                                    </div>
                                </div>
                                <div class="form-actions text-right">
                                    <?php echo form_submit('submit', 'Update', "class = 'btn btn-primary'"); ?>
                                    <a href="<?php echo site_url('new_suhan/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $("#file").change(function() {
            var files = document.getElementById("files").files;
            var names = "";
            for(var i = 0; i < files.length; i++) 
                names += files[i].name + " ";
            //$('.hasilinput').val($names);
            alert(names);
        });
</script>
