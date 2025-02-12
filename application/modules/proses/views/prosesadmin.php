                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">proses Data <small>Berisi semua pilihan proses untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">proses</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Data proses Marketing</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Nama Proses</th>
                                            <th>Tanggal</th>
                                             <th>Status</th>
                                             <th>detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_proses as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama_proses;?></td>
                                            <td><?php echo $row->tanggalproses;?></td>
                                            <td><?php echo $row->status;?></td>
                                            <td><a href="<?php echo site_url('proses/detail_proses/'.$row->kode_proses); ?>" class="btn btn-mini btn-primary" type="button">Detail</a> 
                                                <a href="<?php echo site_url('proses/hapus_data_proses/'.$row->kode_proses); ?>" class="btn btn-mini" type="button">Hapus</a></td>
                                            
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
                                    <h4><i class="icon-reorder"></i>Input proses</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('proses/simpan_data_proses', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama proses</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_proses" class="span10 popovers" data-trigger="hover" data-content="Isi nama inisial proses marketing" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             <div class="control-group">
                                                                <label class="control-label">Tanggal Proses  </label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" name="tgl_proses" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Pilih Status</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="status_proses" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="aktif" />aktif
                                                                        <option value="pending" />pending
                                                                        </select>
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
                    