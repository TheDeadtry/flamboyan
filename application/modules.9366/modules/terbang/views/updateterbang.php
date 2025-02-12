                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">terbang Data <small>Berisi semua pilihan terbang untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">terbang</a><span class="divider-last">&nbsp;</span></li>
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
                    <div class="row-fluid">
                        <div class="span7">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Data terbang</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                                                      <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Nama Maskapai</th>
                                            <th>Kode Terbang</th>
                                            <th>Rute Terbang</th>
                                             <th>Jam Terbang</th>
                                             <th>Kode Terbang 2</th>
                                            <th>Rute Terbang 2</th>
                                             <th>Jam Terbang 2</th>
                                              <th>status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_terbang as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->namamaskapai;?></td>
                                            <td><?php echo $row->kodeterbang;?></td>
                                            <td><?php echo $row->ruteterbang;?></td>
                                             <td><?php echo $row->jamterbang;?></td>
                                             <td><?php echo $row->kodeterbang2;?></td>
                                            <td><?php echo $row->ruteterbang2;?></td>
                                             <td><?php echo $row->jamterbang2;?></td>

                                            <td><a href="<?php echo site_url('terbang/update_data_terbang/'.$row->id_terbang); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                <a href="<?php echo site_url('terbang/hapus_data_terbang/'.$row->id_terbang); ?>" class="btn btn-mini" type="button">Hapus</a></td>
                                            
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
                                    <h4><i class="icon-reorder"></i>Input terbang</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                <?php echo form_open('terbang/update_data_terbang/'.$terbang->id_terbang, array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                             
                                   <div class="control-group">
                                                            <label class="control-label">Nama Maskapai</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_maskapai" value="<?php echo $terbang->namamaskapai; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(China Airlines)" data-original-title="Nama Maskapai" />
                                                            </div>
                                                            </div> 
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jumlah Penerbangan </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlahpenerbangan" id="jumlahpenerbangan" ata-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="1" />1
                                                                        <option value="2" />2
                                                                        </select>
                                                                </div>
                                                            </div>
<div id="satupenerbangan">
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang" value="<?php echo $terbang->kodeterbang; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang" value="<?php echo $terbang->ruteterbang; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang" value="<?php echo $terbang->jamterbang; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div id="duapenerbangan">
</br>
</br>
</br>
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang2" value="<?php echo $terbang->kodeterbang2; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang2" value="<?php echo $terbang->ruteterbang2; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang2" value="<?php echo $terbang->jamterbang2; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div class="control-group">
                                                            <label class="control-label">Jam Tiba Tujuan</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_tiba" value="<?php echo $terbang->jamtiba; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(17:00)" data-original-title="Jam Tiba" />
                                                            </div>
                                                            </div>

                                                        
                                                            <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                            </div>
                                                            
                              <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    