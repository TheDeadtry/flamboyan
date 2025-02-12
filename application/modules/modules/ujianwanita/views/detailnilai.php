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
                        <li><a href="#tab_1_1" data-toggle="tab">Daftar Ujian</a></li>
                        <li><a href="#tab_1_2" data-toggle="tab">Input Nilai Ujian</a></li>
                        <li class="active"><a href="#tab_1_3" data-toggle="tab">Rekap Nilai Ujian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab_1_1">
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

                                        <?php echo form_open('ujianwanita/simpan_data_ujian', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                        <div class="control-group">
                                            <label class="control-label">Nama Ujian / Materi</label>
                                            <div class="controls">
                                                <input type="text" name="nama" class="span10 popovers">
                                                <input type="hidden" name="status" value="<?php echo $status; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tanggal</label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tanggal"/>
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
                        <div class="tab-pane" id="tab_1_2">
                            <div class="span5">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i>Input Nilai</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">

                                        <?php echo form_open('ujianwanita/simpan_data_nilai', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                        <div class="control-group">
                                            <label class="control-label">Nama Personal</label>
                                            <div class="controls">
                                                <select class="span10 popovers" name="nama">
                                                    <?php foreach($tampil_data_personal as $row) { ?>
                                                    <option value="<?php echo $row->id_biodata; ?>"><?php echo $row->nama; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="status" value="<?php echo $status; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Jenis Ujian</label>
                                            <div class="controls">
                                                <select class="span10 popovers" name="jenis">
                                                    <?php foreach($tampil_data_ujian as $row) { ?>
                                                    <option value="<?php echo $row->id_jenis; ?>"><?php echo $row->nama; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="status" value="<?php echo $status; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Kerapihan</label>
                                            <div class="controls">
                                                <input type="text" name="kerapihan" class="span10 popovers">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Kebersihan</label>
                                            <div class="controls">
                                                <input type="text" name="kebersihan" class="span10 popovers">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Kesimpulan</label>
                                            <div class="controls">
                                                <input type="text" name="kesimpulan" class="span10 popovers">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Keterangan</label>
                                            <div class="controls">
                                                <textarea type="text" name="keterangan" class="span10 popovers"></textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tanggal</label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tanggal"/>
                                                <input type="hidden" name="status" value="<?php echo $status; ?>">
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
                            <div class="span7">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i>Daftar Ujian</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">
                                        <table class="table table-striped table-bordered" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
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
                        <div class="tab-pane active" id="tab_1_3">
                            <form class="form-horizontal" method="post" action="<?php echo site_url('ujianwanita/set_detail'); ?>">
                                <div class="control-group span12">
                                    <label class="control-label span3">Pilih Berdasarkan Tanggal dan Ujian</label>
                                    <div class="controls span3">
                                        <select name="jenis">
                                            <?php foreach($tampil_data_ujian as $row) { ?>
                                            <option value="<?php echo $row->id_jenis; ?>"><?php echo $row->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="controls span3">
                                        <input class=" m-ctrl-medium date-picker" size="16" type="text" name="tanggal"/>
                                    </div>
                                    <button type="submit" class="btn blue" name="atur"><i class="icon-ok"></i> Atur</button>
                                </div>
                            </form>
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> Rekap Nilai Keseluruhan</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Personal</th>
                                                <th>Ujian</th>
                                                <th>Kerapihan</th>
                                                <th>Kebersihan</th>
                                                <th>Kesimplan</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach($tampil_data_nilai as $row) {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row->nama; ?></td>
                                                <td><?php echo $row->ujian; ?></td>
                                                <td><?php echo $row->nilai1; ?></td>
                                                <td><?php echo $row->nilai2; ?></td>
                                                <td><?php echo $row->nilai3; ?></td>
                                                <td><?php echo $row->keterangan; ?></td>
                                                <td><?php echo $row->tanggal; ?></td>
                                                <td><?php echo $row->status; ?></td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>