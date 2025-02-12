
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Update majikan </span></h2>
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
                            <a href="<?php echo site_url('new_majikans') ?>" class="btn btn-danger">Kembali</a>
                            <h5 class="panel-title text-center">Data majikan <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="<?php echo site_url('new_majikans/update_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $row->id_majikan; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kode Majikan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kode" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->kode_majikan; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Majikan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->nama; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Taiwan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="namamajikan" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->namamajikan; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Handphone </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hp" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->hp; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->email; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alamat </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="alamat" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->alamat; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control " data-placeholder="Choose a Category" tabindex="1" name="status">
                                            <option value="majikan" />majikan
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">File Upload</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="gambarnya" />
                                    </div>
                                </div>
                                <div class="form-actions text-center">
                                    <?php echo form_submit('submit', 'Update', "class = 'btn btn-primary'"); ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                            
                        </div>
                    </div>