                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">Data Calling Visa ID <small>Berisi semua pilihan Calling Visa ID untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Calling Visa</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Data Calling Visa ID</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Kode Calling Visa ID</th>
                                            <th>Nama</th>
                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_calling as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->kode_calling;?></td>
                                            <td><?php echo $row->isi;?></td>
                                             <td><a href="<?php echo site_url('calling/update_data_calling/'.$row->id_calling); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                <a href="<?php echo site_url('calling/hapus_data_calling/'.$row->id_calling); ?>" class="btn btn-mini" type="button">Hapus</a></td>
                                            
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
                                    <h4><i class="icon-reorder"></i>Input calling</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                    <?php echo form_open('calling/update_data_calling/'.$calling->id_calling, array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                            

                            <div class="control-group">
                                                            <label class="control-label">Kode calling</label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $calling->kode_calling; ?>" name="kode_calling" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama calling</label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $calling->isi; ?>" name="nama_calling" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
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
                    