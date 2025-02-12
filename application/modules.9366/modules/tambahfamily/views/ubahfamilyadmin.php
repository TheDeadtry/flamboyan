                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah Family <small>Menambahkan Family Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah Family</a><span class="divider-last">&nbsp;</span></li>
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


 <div class="span8">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Tambah 家庭資料 / FAMILY DATA </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahfamily/ubahfamilydata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_family as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

                                                             <div class="control-group">
															<label class="control-label">姓名 Nama Bapak</label>
															<div class="controls">
																<input type="text" name="namabapak" class="span7 popovers" data-trigger="hover" value="<?php echo $row->nama_bapak;?>" data-content="Isi Nama Lengkap" data-original-title="Nama Bapak" />
															</div>

															</div>
															<div class="control-group">
															<label class="control-label">年齡 Umur Bapak</label>
															<div class="controls">
																<input type="text" name="umur_bapak" class="span3 popovers" data-trigger="hover" value="<?php echo $row->umur_bapak;?>" data-content="Isi Umur Lengkap " data-original-title="Umur Bapak" />
															</div>
															</div>

																<div class="control-group">
																<label class="control-label">職業 Pekerjaan Bapak</label>
																<div class="controls">
																	<select class="span7 " name="kerjabapak" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->kerja_bapak;?>"  /><?php echo $row->kerja_bapak;?>
																		<?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>


                                                             <div class="control-group">
															<label class="control-label">姓名 Nama Ibu</label>
															<div class="controls">
																<input type="text" name="namaibu" class="span7 popovers" value="<?php echo $row->nama_ibu;?>" data-trigger="hover" data-content="Isi Nama Lengkap " data-original-title="Nama Ibu" />
															</div>

															</div>
															<div class="control-group">
															<label class="control-label">年齡 Umur Ibu</label>
															<div class="controls">
																<input type="text" name="umuribu" class="span3 popovers" value="<?php echo $row->umur_ibu;?>" data-trigger="hover" data-content="Isi Umur Lengkap " data-original-title="Umur Ibu" />
															</div>
															</div>

															<div class="control-group">
																<label class="control-label">職業 Pekerjaan Ibu</label>
																<div class="controls">
																	<select class="span7 " name="kerjaibu" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->kerja_ibu;?>"  /><?php echo $row->kerja_ibu;?>
																		<?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>

                                                             <div class="control-group">
															<label class="control-label">姓名 Nama Istri</label>
															<div class="controls">
																<input type="text" name="namaistri" class="span7 popovers" value="<?php echo $row->nama_istri_suami;?>" data-trigger="hover" data-content="Isi Nama Lengkap" data-original-title="Nama Istri" />
															</div>

															</div>
															<div class="control-group">
															<label class="control-label">年齡 Umur Istri</label>
															<div class="controls">
																<input type="text" name="umuristri" class="span3 popovers" value="<?php echo $row->umur_istri_suami;?>" data-trigger="hover" data-content="Isi Umur" data-original-title="Umur Istri" />
															</div>
															</div>

															<div class="control-group">
																<label class="control-label">職業 Pekerjaan Istri</label>
																<div class="controls">
																	<select class="span7 " name="kerjaistri" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->kerja_istri_suami;?>" /><?php echo $row->kerja_istri_suami;?>
																		<?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>

 									  <div class="control-group">
                                    <label class="control-label">子女人數 Banyak anak</label>
                                    <div class="controls">
                                        <select data-placeholder="Input umur dari jumlah anak pendaftar" name="jumlahanak[]" id="jumlahanak" class="chosen span7" multiple="multiple" tabindex="6">
                                            <option value="<?php echo $row->data_anak;?>"  selected/><?php echo $row->data_anak;?>
                                            <optgroup label="tahun">
                                            	<?php 
                                            	for($i=1;$i<=50;$i++){?>

													<option value="<?php echo"".$i." tahun 嵗" ?>" /><?php echo"".$i." tahun 嵗" ?>

													<?php
                                            	}
													?>

                                              </optgroup>
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
															<label class="control-label">兄弟-saudara laki</label>
															<div class="controls">
																<input type="text" name="saudaralaki" value="<?php echo $row->saudara_laki;?>" class="span3 popovers" data-trigger="hover" data-content="Isi Jumlah Saudara Laki laki" data-original-title="Saudara Laki" />
															</div>
															</div>


															<div class="control-group">
															<label class="control-label">姐妹-saudara perempuan</label>
															<div class="controls">
																<input type="text" name="saudarapr" value="<?php echo $row->saudar_pr;?>" class="span3 popovers" data-trigger="hover" data-content="Isi Jumlah Saudara Perempuan" data-original-title="Saudara Perempuan" />
															</div>
															</div>


															<div class="control-group">
															<label class="control-label">排行-Anak ke</label>
															<div class="controls">
																<input type="text" name="anakke" value="<?php echo $row->anak_ke;?>" class="span3 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

															 <?php } ?>



															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailfamily/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


