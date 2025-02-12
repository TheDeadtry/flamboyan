
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
                <div class="col-lg-6">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <h5 class="panel-title text-center ">Data majikan <br> </h5><br/>
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
                                    <label class="control-label">Kode Majikan</label>
                                    <div class="controls">
                                        <input type="text" name="kode" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->kode_majikan; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Majikan</label>
                                    <div class="controls">
                                        <input type="text" name="nama" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->nama; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Taiwan</label>
                                    <div class="controls">
                                        <input type="text" name="namamajikan" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->namamajikan; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Handphone </label>
                                    <div class="controls">
                                        <input type="text" name="hp" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->hp; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Email </label>
                                    <div class="controls">
                                        <input type="text" name="email" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->email; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Alamat </label>
                                    <div class="controls">
                                        <input type="text" name="alamat" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->alamat; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <div class="controls">
                                        <select class="form-control " data-placeholder="Choose a Category" tabindex="1" name="status">
                                            <option value="majikan" />majikan
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url(); ?>assets/dokmajikan/<?php echo "".$row->file ?>" alt="" />
                                            </div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="gambarnya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <span class="label label-important">NOTE!</span>
                                        <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <?php echo form_submit('submit', 'Update', "class = 'btn btn-primary'"); ?>
                                    <a href="<?php echo site_url('new_majikans/'); ?>" class="btn red btn-medium">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                            
                        </div>
                    </div>