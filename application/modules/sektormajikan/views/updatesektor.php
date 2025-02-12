                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">Sektor Data <small>Berisi semua pilihan sektor untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Sektor</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Data Sektor</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Sektor</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_sektor as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->sektor;?></td>
                                            <td><?php echo $row->nama;?></td>
                                             <td><a href="<?php echo site_url('sektor/update_data_sektor/'.$row->id_jenis); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                <a href="<?php echo site_url('sektor/hapus_data_sektor/'.$row->id_jenis); ?>" class="btn btn-mini" type="button">Hapus</a></td>
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
                                    <h4><i class="icon-reorder"></i>Input Sektor</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                    <?php echo form_open('sektormajikan/update_data_sektor/'.$sektor->id, array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                   <div class="control-group">
                                        <label class="control-label">Sektor</label>
                                        <div class="controls">
                                            <input type="text" name="sektor" value="<?php echo $sektor->sektor; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Sesuai kode misal: FF, FI, MF, dll" data-original-title="Kode Sektor"/>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Nama</label>
                                        <div class="controls">
                                            <input type="text" name="nama" value="<?php echo $sektor->nama; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                    </div>
                                                            <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                            </div>
                                                            
                              <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    