                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">Data Ujian</h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Data</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Ujian</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                    </div>
                </div>

                <div class="tabbable tabbable-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Daftar Ujian</a></li>
                        <li><a>Input Personal Ujian</a></li>
                        <li><a>Rekap Nilai Ujian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                           <div class="span5">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i>Input Ujian</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">

                                        <?php echo form_open('ujianwanita/update_data_ujian/'.$ujian->id_jenis, array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                        <div class="control-group">
                                            <label class="control-label">Nama Ujian </label>
                                            <div class="controls">
                                                <input type="text" name="nama" class="span10 popovers" value="<?php echo $ujian->nama; ?>">
                                                <input type="hidden" name="status" value="<?php echo $status; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tanggal</label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tanggal" value="<?php echo $ujian->tanggal; ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <?php echo form_submit('submit', 'Update', "class = 'btn'"); ?>
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                        </div>
                                        <?php echo form_close(); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="span7">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i>Data Ujian</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_ujian as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->tanggal; ?></td>
                                                <td><?php echo $row->status; ?></td>
                                                <td><a href="<?php echo site_url('ujianwanita/update_data_ujian/'.$row->id_jenis); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                    <a href="<?php echo site_url('ujianwanita/hapus_data_ujian/'.$row->id_jenis); ?>" class="btn btn-mini" type="button">Hapus</a></td>
                                            </tr>
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
                </div>