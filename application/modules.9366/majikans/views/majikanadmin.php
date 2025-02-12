<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Majikan </span>
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
                    <li class='active'>Data Majikan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  
   <a target="_blank" href="<?php echo site_url('pdf9/cetak/'); ?>" class="btn btn-large btn-primary" type="button">Print Majikan</a>
    <a target="_blank" href="<?php echo site_url('pdf9/cetaksmuadata/'); ?>" class="btn btn-large btn-primary" type="button">Print TKI LINK Majikan</a>
                                <br> <br>

                                 <div class="row-fluid">

                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Majikan</div>

                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
 <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Dokumen</th>
                                                 <th></th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                  <th>Nama Taiwan</th>
                                                 <th>Hadphone</th>
                                                 <th>Email</th>
                                                 <th>Alamat</th>
                                                 <th>Nama Agen</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_majikan as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td>

                                                    <a target="_blank" href="<?php echo base_url().'/assets/dokmajikan/'.$row->file;?>"<?php echo $row->file;?>>
                                                        <?php if (strpos($row->file, '.doc') !== false){?>

                                                          <img src="<?php echo base_url(); ?>assets/dokmajikan/nodok.jpg"/></a> 
                                                        <?php }else{?>
                                                           <img src="<?php echo base_url(); ?>assets/dokmajikan/<?php echo "".$row->file ?>"/></a> 
                                                        <?php } ?>
                                                    </td>
                                                <td>
                                            <div style='position: relative ;' class='btn-group'>
                                                    <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown' style='margin-bottom:5px'>
                                                    Menu
                                                    <span class='caret'></span>
                                                </button>
                                                    <ul  style='position: relative;' class='dropdown-menu'>
                                                         <li>
                                                           <a href="<?php echo site_url('majikans/tampildatasuhan/'.$row->id_majikan.'/'.$row->kode_agen.'/'.$row->kode_group); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">DATA SUHAN</a>                                                        </li>
                                                        <li class='divider'></li>
                                                        <li>
                                                           <a href="<?php echo site_url('majikans/update_data_majikan/'.$row->id_majikan); ?>" type="button">Ubah</a>
                                                        </li>
                                                        <li>
                                                           <a href="<?php echo site_url('majikans/ubahagens/'.$row->id_majikan); ?>"></i>Edit Agen </a>
                                                        </li>
                                                        <li class='divider'></li>
                                                        <li>
                                                           <a href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>">Hapus</a>
                                                        </li>
                                                        <li class='divider'></li>
                                                         <li>
                                                           <a href="<?php echo site_url('majikans/detaildokumen/'.$row->id_majikan); ?>" >Permintaan Dokumen</a></a> 
                                                        </li>
                                                    </ul>
                                                </div>
                                         
                                     </td>
                                                <td><?php echo $row->kode_majikan;?></td>
                                                <td><?php echo $row->nama;?></td>
                                                <td><?php echo $row->namamajikan;?></td>
                                                <td><?php echo $row->hp;?></td>
                                                <td><?php echo $row->email;?></td>
                                                <td><?php echo $row->alamat;?></td>
                                                <td><?php echo $row->namaagen;?></td>
                                                
                                            </tr>

<div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah data Majikan</h3>
                </div>  
                            <form action="<?php echo site_url('majikans/update_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $row->id_majikan; ?>">



                                        <div class="control-group">
                                        <label class="control-label">Kode </label>
                                        <div class="controls">
                                            <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->kode_majikan; ?>"/>
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Nama </label>
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
                                                <input type="file" class="default" name="filenya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>



                             
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapus_majikan'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Majikan</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $row->id_majikan; ?>">
                            <input type="text" class="form-control" name="file" value="<?php echo $row->file; ?>">
                              <p>Apakah anda yakin akan menghapus data Majikan ini? : <?php echo $row->id_majikan; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
                     </div>
                 </div>
             </div>
 </div>
</br>
                                                <div class="row-fluid">

                                            <div class='span8 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Input Majikan</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                            </br>
                            <form action="<?php echo site_url('majikans/simpan_data_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<!--     <?php echo form_open('majikans/simpan_data_majikan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?> -->
                                        <div class="control-group">
                                          <label class="control-label"> Pilih Groups (jika tidak ada... Pilih Tidak Ada grup) </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("group",$option_group,"","id='group_id2'"); ?>
                                          <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                         </div>
                                         </div>

                                         <div class="control-group" id="jelasin_agen">
                                         <label class="control-label">Pilih Agen </label>
                                         <div class="controls">
                                         <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled'); ?>
                                         </div>
                                           </div>

                                        <div class="control-group">
                                        <label class="control-label">Kode </label>
                                        <div class="controls">
                                            <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Nama </label>
                                        <div class="controls">
                                            <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                           <div class="control-group">
                                        <label class="control-label">Nama Taiwan </label>
                                        <div class="controls">
                                            <input type="text" name="namamajikan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Handphone </label>
                                        <div class="controls">
                                            <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                        <div class="control-group">
                                        <label class="control-label">Email </label>
                                        <div class="controls">
                                            <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                         <div class="control-group">
                                        <label class="control-label">Alamat </label>
                                        <div class="controls">
                                            <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                         <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="filenya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                        </div>
                                        <?php echo form_close(); ?>


                            </div>
        </div>

                            </div>





