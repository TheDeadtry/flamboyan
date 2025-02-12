                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">Data majikan<small>Berisi semua majikan perusahaan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Data</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">majikan</a><span class="divider-last">&nbsp;</span></li>
                            <li class="pull-right search-wrap">
                                <form class="hidden-phone" />
                                <div class="search-input-area">
                                    <input id=" " class="search-query" type="text" placeholder="Search" /><i class="icon-search"></i></div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tabbable tabbable-custom">
                    <ul class="nav nav-tabs">
                        <li><a>Data Majikan - 雇主</a></li>
                        <li class="active"><a href="#tab_1_2" data-toggle="tab">Data Suhan - 核准函</a></li>
                        <li><a>Data VISA - 簽證函</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_2">
                            <div class="span5">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i> Update Suhan</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                    </div>
                                    <div class="widget-body">

                                        <?php echo form_open('majikan/update_data_suhan/'.$suhan->id_suhan, array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                        <div class="control-group">
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="" />Select...
                                                    <?php foreach($tampil_data_majikan as $row) { ?>
                                                    <option value="<?php echo $row->id_majikan; ?>"/><?php echo $row->nama; ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">No Suhan </label>
                                            <div class="controls">
                                                <input type="text" name="no" class="span10 popovers" value="<?php echo $suhan->no_suhan; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tgl Terbit </label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tglterbit" value="<?php echo $suhan->tglterbit; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tgl Expired </label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tglexp" value="<?php echo $suhan->tglexp; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tgl Terima </label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tglterima" value="<?php echo $suhan->tglterima; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tgl Simpan </label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tglsimpan" value="<?php echo $suhan->tglsimpan; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tgl Bawa </label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tglbawa" value="<?php echo $suhan->tglbawa; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tgl Minta </label>
                                            <div class="controls">
                                                <input class=" input-medium date-picker" size="16" type="text" name="tglminta" value="<?php echo $suhan->tglminta; ?>"/>
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
                            <div class="span7">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i> Data Suhan</h4>
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
                                                <th>Majikan</th>
                                                <th>No Suhan</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_suhan as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->id_majikan;?></td>
                                                <td><?php echo $row->no_suhan;?></td>
                                                <td><a href="<?php echo site_url('majikan/update_data_suhan/'.$row->id_suhan); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                <a href="<?php echo site_url('majikan/hapus_data_suhan/'.$row->id_suhan); ?>" class="btn btn-mini" type="button">Hapus</a></td>
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