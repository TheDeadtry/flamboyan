                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">kreditbank Data <small>Berisi semua pilihan kreditbank untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">kreditbank</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Data kreditbank</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Sektor</th>
                                            <th>Nama Kredit</th>
                                            <th>Total</th>
                                            <th>Nilai</th>
                                            <th>Mandarin <br> Slip 1</th>
                                            <th>Status <br> Slip 1</th>
                                            <th>Mandarin <br> Slip 2</th>
                                            <th>Status <br> Slip 2</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_kreditbank as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->kode_sektor;?></td>
                                            <td><?php echo $row->namakredit;?></td>
                                            <td><?php echo $row->isikredit;?></td>
                                            <td><?php echo $row->nilaikredit;?></td>
                                            <td><?php echo $row->mandarinnya;?></td>
                                            <td><?php echo $row->statuskredit;?></td>
                                            <td><?php echo $row->mandarinnya2;?></td>
                                            <td><?php echo $row->statuskredit2;?></td>


                                            <td><a href="<?php echo site_url('kreditbank/update_data_kreditbank/'.$row->id_kreditbank); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                <a href="<?php echo site_url('kreditbank/hapus_data_kreditbank/'.$row->id_kreditbank); ?>" class="btn btn-mini" type="button">Hapus</a></td>
                                            
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
                                    <h4><i class="icon-reorder"></i>Input kreditbank</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('kreditbank/simpan_data_kreditbank', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                         <div class="control-group">
 <label class="control-label">Nama Sektor</label>
                                                            <div class="controls">
                                                                <select class="span10 " id="namasektor" name="namasektor" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_sektor as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_jenis;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>   
                                                            </div>

                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nama kredit</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kredit" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                            <label class="control-label">Jumlah Kredit</label>
                                                            <div class="controls">
                                                                <input type="text" name="jumlahkredit" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nilai Kredit</label>
                                                            <div class="controls">
                                                                <input type="text" name="nilaikredit" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Mandarin <br> Slip 1</label>
                                                            <div class="controls">
                                                                <input type="text" name="mandarinnya" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="control-group">
                                                            <label class="control-label">Status <br> Slip 1</label>
                                                            <div class="controls">
                                                                <input type="text" name="statuskredit" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai Keaslian Kredit Bank" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Mandarin <br> Slip 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="mandarinnya2" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="control-group">
                                                            <label class="control-label">Status <br> Slip 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="statuskredit2" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai Keaslian Kredit Bank" data-original-title="Nama Sektor (Bahsa Taiwan)" />
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
                    