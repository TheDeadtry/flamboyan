                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah Working Experience <small>Menambahkan Working Experience Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah Working Experience</a><span class="divider-last">&nbsp;</span></li>
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
                        
						<button data-dismiss="alert" class="close"> x </button> Pastikan Id Biodata telah tampil pada form Id Biodata...
						</div>

	                        

<div class="row-fluid">

                        <div class="span4">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Detail ID Biodata </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">
                            <?php foreach ($tampil_data_personal as $row) { ?>

                                <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
								<?php }?>
															<div class="text-center control-group">
															<label class="control-label">ID BIODATA </label>
															<div class="controls">
																<input type="text" readonly id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="span7 popovers" data-trigger="hover" data-content="Auto Generated Id" data-original-title="ID Biodata"/>

															</div>
															</div>



															

																	

							<span class="label label-important">NOTE!</span>
							<span>  Pastikan id biodata telah tampil dan foto sudah sesuai dengan data...</span>

                                </div>
                            </div>
                        </div>




 <div class="span8">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Tambah WORKING EXPERIENCE-工作經驗 </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahworking/tambahworkingdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />


																<div class="control-group">
																<label class="control-label"> 受雇國家 Negara</label>
																<div class="controls">
																	<select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
																			<option value="" />Select...
																		<?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>


                                                            <div class="control-group">
                                                                <label class="control-label"> 業務類別 Jenis Usaha </label>
                                                                <div class="controls span7">
                                                                   <?php   echo form_dropdown("id_kategori",$option_posisi,"","id='posisi_id'"); ?>
                                                                               <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="jelasin">
                                                                <label class="control-label"> 工作性質 Penjelasan pekerjaan </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_pekerjaan",array('Pilih Penjelasan'=>'Pilih Jenis Usaha Dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>

															<div class="control-group">
																<label class="control-label"> 職務 Posisi </label>
																<div class="controls">
																	<select class="span7 " name="posisi" data-placeholder="Choose a Category" tabindex="1">
																			<option value="" />Select...
																		<?php  foreach ($pilihan_posisi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>

<!-- 
															<div class="control-group">
                                    <label class="control-label"> 工作性質 Penjelasan pekerjaan </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Pekerjaan" name="penjelasan[]" id="penjelasan" class="chosen span7" multiple="multiple" tabindex="6">
                                            <option value="" />
                                            <optgroup label="Penjelasan Pekerjaan">
                                            	<?php  foreach ($pilihan_penjelasan as $pilihan) { ?>

													<option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

													<?php
                                            	}
													?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div> -->
									<div class="control-group">
                                    <label class="control-label"> 受雇期間 Masa Kerja </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Masa Kerja" name="masakerja" class="chosen span6" tabindex="-1" id="masakerja">
                                            <option value="<?php echo $row->masa_kerja;?>" /><?php echo $row->masa_kerja;?>
                                         <optgroup label="tahun">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun 年" ?>" /><?php echo"".$i." tahun 年" ?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                            

                                        </select>

                                        <select data-placeholder="Pilih Masa Kerja" name="masabulan" class="chosen span6" tabindex="-1" id="masakerja">
                                            <option value="<?php echo $row->masabulan;?>" /><?php echo $row->masabulan;?>
                                        <optgroup label="bulan">
                                                <?php 
                                                for($i=1;$i<=12;$i++){?>
                                                    <option value="<?php echo"".$i." bulan 月" ?>" /><?php echo"".$i." bulan 月" ?>
                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>

                                            

                                        </select>

                                       
                                    </div>
                                </div>


                                 <div class="control-group">
															<label class="control-label"> 年 Tahun</label>
															<div class="controls">
																<input type="text" name="tahun" class="span7 popovers" data-trigger="hover" data-content="Input data tahun dengan di pisah '-' (ex: 2010-2015) " data-original-title="Tahun masa kerja" />
															</div>
								</div>

															<div class="control-group">
																<label class="control-label">離職原因 Alasan berhenti bekerja </label>
																<div class="controls">
																	<select class="span7 " name="alasan" data-placeholder="pilih kategori" tabindex="1">
																			<option value="" />Select...
																		<?php  foreach ($pilihan_alasan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>	


															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Simpan </button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailworking/"?>"><i class=" icon-remove"></i> Kembali</a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>
                                                </div>



<div class="row-fluid">

                        </div>

