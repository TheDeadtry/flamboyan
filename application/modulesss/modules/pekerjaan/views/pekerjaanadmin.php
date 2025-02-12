                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">Jenis Usaha Data <small>Berisi semua pilihan Jenis Usaha untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Jenis Usaha</a><span class="divider-last">&nbsp;</span></li>
                            <li class="pull-right search-wrap">
                                <form class="hidden-phone" />
                                <div class="search-input-area">
                                    <input id=" " class="search-query" type="text" placeholder="Search" /><i class="icon-search"></i></div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>
                                                    <h4>Kategori Jenis Usaha</h4>

                    <div class="row-fluid">


                        
                        <div class="span7">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Data Kategori Jenis Usaha</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Bhs Taiwan</th>
                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_kategori_pekerjaan as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->isi;?></td>
                                            <td><?php echo $row->mandarin;?></td>
                                            <td><button class="btn btn-mini btn-primary" type="button">Ubah</button> 
                                                <button class="btn btn-mini" type="button">Hapus</button></td>
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>



                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Input Kategori Jenis Usaha</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('pekerjaan/simpan_data_kategoripekerjaan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Kategori Jenis Usaha</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kategoripekerjaan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Kategori (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kategoripekerjaan_taiwan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
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
  


  <h4>Data Jenis Usaha</h4>
    <div class="row-fluid">
                        
<div class="span7">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>Data Jenis Usaha</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered" id="sample_2">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                            <th>Nama Jenis Usaha</th>
                                            <th>Bhs Taiwan</th>
                                            <th>kategori</th>
                                             <th>Ubah</th>
                                             <th>Hapus</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $no = 1; 
                                                foreach ($tampil_data_pekerjaan as $row) { ?>
                                        <tr class="odd gradeX">
                                              <td><?php echo $no;?></td>
                                            <td><?php echo $row->isi;?></td>
                                            <td><?php echo $row->mandarin;?></td>
                                             <td><?php echo $row->kategorinya;?></td>

                                            <td><button class="btn btn-mini btn-primary" type="button">Ubah</button> </td>
                                                <td><button class="btn btn-mini" type="button">Hapus</button></td>
                                        </tr>
                                          <?php $no++;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





                        <div class="span5">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Input Jenis Usaha</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('pekerjaan/simpan_data_pekerjaan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                            <div class="control-group">
                                                                <label class="control-label">Kategori </label>
                                                                <div class="controls">
                                                                    <select name="kategori" class="span11 " data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                 <?php  foreach ($tampil_data_kategori_pekerjaan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_kategori;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama Jenis Usaha</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pekerjaan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Jenis Usaha (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pekerjaan_taiwan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
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

