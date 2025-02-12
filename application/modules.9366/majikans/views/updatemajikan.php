<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Update majikan </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Update majikan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

               <div class="row-fluid">
                            <div class='span5 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data majikan</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <form action="<?php echo site_url('majikans/update_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

 <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $row->id_majikan; ?>">



                                        <div class="control-group">
                                        <label class="control-label">Kode Majikan</label>
                                        <div class="controls">
                                            <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->kode_majikan; ?>"/>
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Nama Majikan</label>
                                        <div class="controls">
                                            <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->nama; ?>"/>
                                        </div>
                                        </div>
                                            <div class="control-group">
                                        <label class="control-label">Nama Taiwan</label>
                                        <div class="controls">
                                            <input type="text" name="namamajikan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->namamajikan; ?>"/>
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Handphone </label>
                                        <div class="controls">
                                            <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->hp; ?>"/>
                                        </div>
                                        </div>

                                        <div class="control-group">
                                        <label class="control-label">Email </label>
                                        <div class="controls">
                                            <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->email; ?>"/>
                                        </div>
                                        </div>

                                         <div class="control-group">
                                        <label class="control-label">Alamat </label>
                                        <div class="controls">
                                            <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->alamat; ?>"/>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="status">
                                                    <option value="majikan" />majikan
                                                </select>
                                            </div>
                                        </div>

                                      <!--   <div class="control-group">
                                        <label class="control-label">Nama Agen </label>
                                        <div class="controls">
                                            <input type="text" name="kode_agen" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->alamat; ?>"/>
                                        </div>
                                        </div> -->

                                        <!-- <div class="control-group">
                                                            <label class="control-label"> Pilih Agen</label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih No suhan" name="kode_agen" id="kode_agen" s tabindex="6">
                                                              <option value="<?php echo $row->kode_agen; ?>" /><?php echo $row->namaagen; ?>
                                                                        <?php foreach ($tampil_data_agen as $daftar_list): ?>
                                                                            <option value="<?php echo $daftar_list->kode_agen;?>"><?php echo $daftar_list->nama;?></option>
                                                                        <?php endforeach; ?>    

                                                                  
                                                                </select>
                                                            </div>
                                                            </div> -->

                                                            <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/dokmajikan/<?php echo "".$row->file ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="gambarnya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>


<div class="form-actions">
                                            <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <a href="<?php echo site_url('majikans/'); ?>" class="btn red btn-medium">Batal</a>
                                        </div>
                                    </form>
                        </div>
                    </div>