                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail Dokumen Online</h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail Dokumen Online</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                    </div>
                </div>                    

                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-user"></i>Profile</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span>
                            </div>
                            <div class="widget-body">
                                <?php foreach ($tampil_data_personal as $row) { ?>
                                    <div class="span3">
                                        <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                        <?php 
                                            $this->load->view('template/menuadministrasi');
                                        ?>
                                    </div>
                                    <div class="span6">
                                        <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                    </div>
                                <?php if($hitung_data_marka == 0) { ?>
                                    <div class="span9">
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4><i class="icon-reorder"></i>Tambah Marketing Awal</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                            <div class="widget-body">
                                                <div class="accordion " id="accordion1">
                                                <?php echo form_open('markawal/tambahdptmaj', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dapat Majikan </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																
																<div class="control-group">
																<label class="control-label">Majikan Minta Tanggal Terbang</label>
																	<div class="controls">
																		<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="majmntgl" name="majmntgl" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
																</div>
															
															<div class="control-group">
															<label class="control-label">Tanggal</label>
															
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl" name="tgl" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
															
															
															<div class="control-group">
															<label class="control-label">Nama Majikan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="nmajikan" data-trigger="hover" data-content="Nama Majikan" data-original-title="Majikan" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Agen</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="agen" data-trigger="hover" data-content="" data-original-title="Agen" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Grup</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="grup" data-trigger="hover" data-content="" data-original-title="Grup" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Ket</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket" data-trigger="hover" data-content="" data-original-title="Keterangan" />
															</div>
															</div>
															
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Biodata Ke Agen </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
															
																<div class="control-group">
															<label class="control-label">Tanggal</label>
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl_to_agen" name="tgl_to_agen" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
											
															<div class="control-group">
															<label class="control-label">Agen</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="nama_agen" data-trigger="hover" data-content="" data-original-title="Agen" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Grup</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="grup_to_agen" data-trigger="hover" data-content="" data-original-title="Grup" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Nama Pabrik</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="nama_pabrik" data-trigger="hover" data-content="" data-original-title="Grup" />
															</div>
															</div>
															
																<div class="control-group">
															<label class="control-label">Tanggal Pauliu</label>
															
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl_pauliu" name="tgl_pauliu" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
															
																<div class="control-group">
															<label class="control-label">Tanggal Interview</label>
															
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl_inter" name="tgl_inter" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
                                                              
																
																
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                    </div>
                                                <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="span9">
									 <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close"> x </button> 
										silahkan mengubah data pada tombol ini... 
										<?php foreach($data_marka as $row) { ?>
										<a href="<?php echo site_url('markawal/ubahmarkawal/'.$row->id_marka); ?>" class="btn btn-mini btn-primary">Ubah data</a> 
										
										&nbsp &nbsp 
										
										<a href="<?php echo site_url('markawal/hapus_data/'.$row->id_marka); ?>" class="btn btn-mini btn-primary">Hapus data</a>
										<?php } ?>
                                     </div>
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4><i class="icon-reorder"></i>Marketing Awal</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                            <div class="widget-body">
                                                <div class="accordion " id="accordion1">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dapat Majikan </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">

															
									<table class="table table-borderless">
                                        <tbody>
											<?php foreach($data_marka as $row) { ?>
                                            <tr>
                                                <td class="span3">Majikan Minta Tanggal Terbang</td>
                                                <td> <?php echo $row->mtgl_terbang;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Tanggal</td>
                                                <td> <?php echo $row->tgl;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Nama Majikan</td>
                                                <td> <?php echo $row->nama;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Agen</td>
                                                <td> <?php echo $row->agen;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Grup</td>
                                                <td> <?php echo $row->grup;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Keterangan</td>
                                                <td> <?php echo $row->ket;?> </td>
                                            </tr>
                                           
                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
											<?php } ?>
                                        </tbody>
                                    </table>
																
															
															
															</div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Biodata ke Agen </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
															
																<table class="table table-borderless">
                                        <tbody>
											<?php foreach($data_marka as $row) { ?>
                                            <tr>
                                                <td class="span3">Tanggal</td>
                                                <td> <?php echo $row->tgl_to_agen;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Agen</td>
                                                <td> <?php echo $row->nama_agen;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Grup</td>
                                                <td> <?php echo $row->grup_to_agen;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Nama Pabrik</td>
                                                <td> <?php echo $row->nama_pabrik;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Tanggal Pauliu</td>
                                                <td> <?php echo $row->tgl_pauliu;?> </td>
                                            </tr>
											<tr>
                                                <td class="span3">Tanggal Interview</td>
                                                <td> <?php echo $row->tgl_inter;?> </td>
                                            </tr>
                                           
                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
											<?php } ?>
                                        </tbody>
                                    </table>
															
															
															</div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <div class="space5"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>