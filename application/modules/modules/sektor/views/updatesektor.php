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
                                            <th>Kode Sektor</th>
                                            <th>Nama Sektor</th>
                                            <th>Bhs Taiwan</th>
                                            <th>No Urut</th>
                                            <th>Kelamin</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_sektor as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->kode_jenis;?></td>
                                            <td><?php echo $row->isi;?></td>
                                            <td><?php echo $row->isi_taiwan;?></td>
                                            <td><?php echo $row->no_urut;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
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

                                    <?php echo form_open('sektor/update_data_sektor/'.$sektor->id_jenis, array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                   <div class="control-group">
                                                            <label class="control-label">Kode Sektor</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_sektor" value="<?php echo $sektor->kode_jenis; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Sesuai kode misal: FF, FI, MF, dll" data-original-title="Kode Sektor"/>
                                                            </div>
                                                            </div>
                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama Sektor</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_sektor" value="<?php echo $sektor->isi; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Nama Sektor (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_sektor_taiwan" value="<?php echo $sektor->isi_taiwan; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">No Urut Sektor</label>
                                                            <div class="controls">
                                                                <input type="text" name="urut_sektor" value="<?php echo $sektor->no_urut; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi No Urut dari Anggota Sektor" data-original-title="Urut Sektor" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="<?php echo $sektor->jeniskelamin; ?>"  /><?php echo $sektor->jeniskelamin; ?>
                                                                        <option value="男 Pria" />男 Pria
                                                                        <option value="女 Wanita" />女 Wanita
                                                                        </select>
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
                    