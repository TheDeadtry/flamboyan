                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah Skill  <small>Menambahkan Skill Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah Skill</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Tambah 家庭資料 / skill DATA </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahskill/ubahskilldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_skill as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />
    

									<div class="control-group">
                                    <label class="control-label"> 專長 Keterampilan  </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Keterampilan" name="keterampilan[]" id="keterampilan" class="chosen span7" multiple="multiple" tabindex="6">
                                        	
                                            <option value=" <?php echo $row->keterampilan;?>" selected/><?php echo $row->keterampilan;?>
                                            <optgroup label="Pilih Keterampilan">
                                            	<?php  foreach ($tampil_data_keterampilan as $pilihan) { ?>

													<option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

													<?php
                                            	}
													?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                                						<div class="control-group">
                                    <label class="control-label"> 嗜好 Hobby </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih data" name="hobi[]" id="hobi" class="chosen span7" multiple="multiple" tabindex="13">
                                            <option value=" <?php echo $row->hobi;?>" selected/><?php echo $row->hobi;?>
                                            <optgroup label="Pilih Hobi">
                                            	<?php  foreach ($tampil_data_hobi as $pilihan) { ?>

													<option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

													<?php
                                            	}
													?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="control-group">
																<label class="control-label"> 酒 Alkohol</label>
																<div class="controls">
																	<select class="span7 " name="alkohol" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->alkohol;?>"  /><?php echo $row->alkohol;?>
																		<option value="不喝 tidak" />不喝 tidak
																		<option value="偶爾 kadang " />偶爾 kadang 
																		<option value="喝 ya" />喝 ya
																		</select>
																</div>
															</div>

															<div class="control-group">
																<label class="control-label"> 煙 merokok</label>
																<div class="controls">
																	<select class="span7 " name="merokok" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->merokok;?>"  /> <?php echo $row->merokok;?>
																		<option value="不喝 tidak" />不喝 tidak
																		<option value="偶爾 kadang " />偶爾 kadang 
																		<option value="吸煙 merokok" />吸煙 merokok
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label"> 飲食 food</label>
																<div class="controls">
																	<select class="span7 " name="food" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->food;?>"  /><?php echo $row->food;?>
																		<option value="吃豬肉 makan daging babi" />吃豬肉 makan daging babi
																		<option value="一般不吃豬肉 tidak makan daging babi" />一般不吃豬肉 tidak makan daging babi
																		</select>
																</div>
															</div>

															<div class="control-group">
															<label class="control-label"> 身體狀況 Kondisi Fisik </label>
															</div>

															<div class="control-group">
																<label class="control-label"> 過敏 alergi </label>
																<div class="controls">
																	<select class="span7 " name="alergi" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->alergi;?>"  /><?php echo $row->alergi;?>
																		<option value="Tidak 沒有" />Tidak 沒有
																		<option value="Ya 是" />Ya 是
																		</select>
																</div>
															</div>

															<div class="control-group">
																<label class="control-label"> 開刀 Operasi</label>
																<div class="controls">
																	<select class="span7 " name="operasi" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->operasi;?>"  /><?php echo $row->operasi;?>
																		<option value="Tidak Pernah 從不" />Tidak Pernah 從不
																		<option value="Pernah 從過" />Pernah 從過
																		</select>
																</div>
															</div>

															<div class="control-group">
																<label class="control-label"> 剌青 Tato</label>
																<div class="controls">
																	<select class="span7 " name="tato" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->tato;?>"  /><?php echo $row->tato;?>
																		<option value="Tidak 沒有" />Tidak 沒有
																		<option value="Ya 是" />Ya 是
																		</select>
																</div>
															</div>

															<div class="control-group">
																<label class="control-label"> 左撇子 tangan kidal</label>
																<div class="controls">
																	<select class="span7 " name="tangan" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->kidal;?>"  /> <?php echo $row->kidal;?>
																		<option value="Tidak 沒有" />Tidak 沒有
																		<option value="Ya 是" />Ya 是
																		</select>
																</div>
															</div>
															   <div class="control-group">
															<label class="control-label"> 能夠抱 Bisa mengangkat</label>
															<div class="controls">
																<input type="text" name="angkat" value=" <?php echo $row->angkat;?>" class="span3 popovers" data-trigger="hover" data-content="isi berdasarkan KG" data-original-title="MEngangkat Beban" />
															</div>

															</div>
															<div class="control-group">
															<label class="control-label"> 推升 Push up</label>
															<div class="controls">
																<input type="text" name="pushup" value=" <?php echo $row->pushup;?>" class="span3 popovers" data-trigger="hover" data-content="Isi pushup berapa kali" data-original-title="Jumlah Pushup" />
															</div>
															</div>



															<div class="control-group" id="ukuranmata">
															<label class="control-label">視力 penglihatan mata</label>
															<div class="controls">
																 <input type="text" class="span8 popovers" value=" <?php echo $row->peglihatan;?>"  data-trigger="hover" name="mata" id="kanan" data-content="Ukuran Mata untuk Kanan" data-original-title="Mata Kanan" />
															</div>
															</div>

						                                <div class="control-group">
																<label class="control-label"> 色盲 buta warna</label>
																<div class="controls">
																	<select class="span7 " name="butawarna" data-placeholder="Choose a Category" tabindex="1">
																		<option value=" <?php echo $row->butawarna;?>"  /> <?php echo $row->butawarna;?>
																		<option value="Tidak 沒有" />Tidak 沒有
																		<option value="Ya 是" />Ya 是
																		</select>
																</div>
															</div>



															

 <?php } ?>
															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailskill/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


