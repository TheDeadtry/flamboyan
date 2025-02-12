<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>                    

                <div class="row-fluid">
                   
            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Marketing Awal</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
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
                                
                                    
            <div class='span8 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
            <div class='title'>Data Marketing</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                                               <!--  <div class="accordion " id="accordion1">
													<?php if($hitung_data_marka == 0) { ?>
                                                    <div class="accordion-group">
													<?php echo form_open('markawal/tambahdptmaj', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
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
															
                                                            <div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
															</div>    
                                                            </div>
                                                        </div>
														 <?php echo form_close(); ?>
                                                    </div>
													<?php } else { ?>
													
												<div class="accordion-group">
                                                    <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dapat Majikan </a></div>
                                                       <div id="collapse_1" class="accordion-body collapse in">
                                                           <div class="accordion-inner">
														   <?php echo form_open('markawal/tambahdptmaj', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
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
															
                                                            <div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
															</div>
															
															 <?php echo form_close(); ?>

																							
																	<table class="table table-striped table-bordered" id="sample_1">
																		<thead>

																			
																			<tr>
																				<td>#</td>
																				<td>Majikan minta tgl Terbang</td>
																				<td>Tanggal</td>
																				 <td>Nama Majikan</td>
																				 <td>Agen</td>
																				 <td>Grup</td>
																				 <td>Keterangan</td>
																				 <td>Action</td>
																			</tr>
																		</thead>
																		<tbody>
																		 <?php $no = 1; 
																					foreach ($data_marka as $row) { ?>
																			<tr>
																			   <td><?php echo $no;?></td>
																				<td><?php echo $row->mtgl_terbang;?></td>
																				<td><?php echo $row->tgl;?></td>
																				<td><?php echo $row->nama;?></td>
																				<td><?php echo $row->agen;?></td>
																				<td><?php echo $row->grup;?></td>
																				<td><?php echo $row->ket;?></td>
																				<td><a href="<?php echo site_url('markawal/ubahmarkawal/'.$row->id_marka); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
																					<a href="<?php echo site_url('markawal/hapus_data/'.$row->id_marka); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
																				</td>
																				
																			</tr>
																			<?php $no++;
																			} ?>

																		</tbody>
																	</table>
																
															
															
															</div>
                                                        </div>
                                                    </div>
													
													
													 <?php } ?> -->
													 
													<?php if($hitung_data_marka_b == 0) { ?>
                                                    <div class="accordion-group">
														
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Biodata Ke Agen </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
															<?php echo form_open('markawal/tambahbiotoagen', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
																<div class="control-group">
															<label class="control-label">Tanggal</label>
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl_to_agen" name="tgl_to_agen" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
										

															 <div class="control-group">
                                                                <label class="control-label"> Nama Group </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="nama_agen" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_group as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_group;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Nama Agency </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="grup_to_agen" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_agen as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_agen;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
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
															<label class="control-label">Tanggal Interview </label>
															
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl_inter" name="tgl_inter" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
                                                              
																
																<div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
																</div>
															<?php echo form_close(); ?>
																
                                                            </div>
                                                        </div>
														
                                                    </div>
                                                    <?php } else { ?>
														<div class="accordion-group">
														
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Biodata Ke Agen </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
															<?php echo form_open('markawal/tambahbiotoagen', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
																<div class="control-group">
															<label class="control-label">Tanggal</label>
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl_to_agen" name="tgl_to_agen" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
											
															 <div class="control-group">
                                                                <label class="control-label"> Nama Group </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="nama_agen" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_group as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_group;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Nama Agency </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="grup_to_agen" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_agen as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_agen;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
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
                                                              
																
																<div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
																</div>
															<?php echo form_close(); ?>
															
															

																	   <table class="table table-striped table-bordered" id="sample_2">
																		<thead>

																			
																			<tr>
																				<td>#</td>
																				<td>Tanggal</td>
																				<td>Agen</td>
																				 <td>Grup</td>
																				 <td>Nama Pabrik</td>
																				 <td>Tanggal Pauliu</td>
																				 <td>Tanggal Interview</td>
																				 <td>Action</td>
																			</tr>
																		</thead>
																		<tbody>
																		 <?php $no = 1; 
																					foreach ($data_marka_b as $row) { ?>
																			<tr>
																			   <td><?php echo $no;?></td>
																				<td><?php echo $row->tgl_to_agen;?></td>
																				<td><?php echo $row->nama_agen;?></td>
																				<td><?php echo $row->grup_to_agen;?></td>
																				<td><?php echo $row->nama_pabrik;?></td>
																				<td><?php echo $row->tgl_pauliu;?></td>
																				<td><?php echo $row->tgl_inter;?></td>
																				<td><a href="<?php echo site_url('markawal/ubahmarkawal_bio/'.$row->id_marka_bioagen); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
																					<a href="<?php echo site_url('markawal/hapus_data_bio/'.$row->id_marka_bioagen); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
																				</td>
																				
																			</tr>
																			<?php $no++;
																			} ?>

																		</tbody>
																	</table>
															
																
                                                            </div>
                                                        </div>
														
                                                    </div>
													
													
													<?php } ?>
													
													
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="space5"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>