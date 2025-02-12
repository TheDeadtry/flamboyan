                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Ubah Biodata <small>Menambahkan Biodata Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Ubah Biodata</a><span class="divider-last">&nbsp;</span></li>
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
                        
						<button data-dismiss="alert" class="close"> x </button> Silahkan set ID Biodata Terlebih dahulu Sebelum Menambahkan Data Baru Terimakasih...
						</div>

	                        

<div class="row-fluid">

          
 <div class="span8">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>PERSONAL DATA </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('detailpersonal/ubahdatapersonal');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
 <?php foreach ($tampil_data_personal as $row) { ?>
															<div class="control-group">
															<label class="control-label">ID BIODATA</label>
															<div class="controls">
																<input type="text" readonly name="idp" value="<?php echo $personalid; ?>" required class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

                                                             <div class="control-group">
															<label class="control-label">姓名 Nama</label>
															<div class="controls">
																<input type="text" name="namap" class="span7 popovers" value="<?php echo $row->nama; ?>" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>
															<div class="control-group">
																<label class="control-label"> Sponsor / PL </label>
																<div class="controls">
																	<select class="span7 " name="sponsor" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->kode_sponsor; ?>" /><?php echo $row->kode_sponsor; ?>
																		<?php  foreach ($tampil_data_sponsor as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_sponsor;?>" /><?php echo "( ".$pilihan->kode_sponsor." ) ";?> <?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>
															<div class="control-group">
															<label class="control-label">性別 Jenis kelamin</label>
															<div class="controls">
																<input type="text" class="span7 popovers" id="jkp" name="jkp" value="<?php echo $row->jeniskelamin; ?>" data-trigger="hover" data-content="Isi Jenis Kelamin Sesuai dengan KTP" data-original-title="Jenis Kelamin" readonly/>
															</div>
															</div>
															<div class="control-group">
																<label class="control-label">報到日期 Tanggal daftar </label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" name="daftarp" size="16" value="<?php echo $row->tanggaldaftar; ?>" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
														
															<div class="control-group">
															<label class="control-label">身 高 Tinggi Badan</label>
															<div class="controls">
																<input type="text" class="span2 popovers" data-trigger="hover" name="tinggip" value="<?php echo $row->tinggi; ?>" data-content="Tinggi Badan Berdasarkan Cm" data-original-title="Tinggi Badan" /> Cm 公分
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">體 重 Berat Badan</label>
															<div class="controls">
																<input type="text" class="span2 popovers" data-trigger="hover" name="beratp" value="<?php echo $row->berat; ?>" data-content="Berat Badan Berdasarkan Kg" data-original-title="Berat Badan" /> Kg 公斤
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">Handphone </label>
															<div class="controls">
																<input type="text" class="span7 popovers" data-trigger="hover" name="hpp" value="<?php echo $row->hp; ?>" data-content="Input No handphone Pendaftar yang aktif" data-original-title="No telpon" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">Handphone Keluarga</label>
															<div class="controls">
																<input type="text" class="span7 popovers" data-trigger="hover" name="hpkelp" value="<?php echo $row->hpkel; ?>" data-content="Input No Telpon Keluarga" data-original-title="No telpon Keluarga" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">國籍 Warganegara</label>
															<div class="controls">
																<input type="text" value="Indonesia / 印尼" class="span7 popovers" data-trigger="hover" name="wargap" value="<?php echo $row->warganegara; ?>" data-content="Warganegara Pendaftar" data-original-title="Warganegara" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">出生地點 Tempat Lahir</label>
															<div class="controls">
																<input type="text" class="span7 popovers" data-trigger="hover" name="tempatp" value="<?php echo $row->tempatlahir; ?>" data-content="TempatKelahiran sesuai KTP" data-original-title="Tempat Lahir" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label"> 生日 Tanggal lahir  </label>
															<div class="controls">
																<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" size="16" name="tgllahirp" value="<?php echo $row->tgllahir; ?>"  data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
															</div>
															</div>
															
															<div class="control-group">
																<label class="control-label">宗 教 Agama</label>
																<div class="controls">
																	<select class="span7 " name="agamap" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->agama; ?>" /><?php echo $row->agama; ?>
																		<?php  foreach ($tampil_data_agama as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>
															
															<div class="control-group">
																<label class="control-label">婚姻狀況 Status</label>
																<div class="controls">
																	<select class="span7 " name="statusp" data-placeholder="Choose a Category" tabindex="1">
																		<optionvalue="<?php echo $row->status; ?>" /><?php echo $row->status; ?>
																		<option value="Belum Nikah 未婚" />Belum Nikah 未婚
																		<option value="Menikah 已婚" />Menikah 已婚
																		<option value="Cerai 離婚" />Cerai 離婚
																		<option value="Cerai mati 丈夫去世" />Cerai mati 丈夫去世
																		</select>
																</div>
															</div>
															<div class="control-group">
															<label class="control-label">Tanggal menikah / cerai hidup 結婚/离婚日期</label>
															<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" size="16" id="tglnikahp" name="tglnikahp" value="<?php echo $row->tglmenikah; ?>" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
															</div>
															</div>
															<div class="control-group">
																<label class="control-label">教育程度 Pendidikan</label>
																<div class="controls">
																	<select class="span7 " name="pendidikanp" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo $row->pendidikan; ?>" /><?php echo $row->pendidikan; ?>
																		<?php  foreach ($tampil_data_pendidikan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>
															<div class="control-group">
															<label class="control-label">地址 Alamat</label>
															<div class="controls">
																<input type="text" class="span7 popovers" name="alamatp" value="<?php echo $row->alamat; ?>" data-trigger="hover" data-content="Isi Alamat Hanya Kota Saja" data-original-title="Alamat" />
															</div>
															</div>
															<div class="control-group">
																<label class="control-label">省份 Provinsi</label>
																<div class="controls">
																	<select class="span7 " name="provinsip" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo $row->provinsi; ?>" /><?php echo $row->provinsi; ?>
																		<?php  foreach ($tampil_data_provinsi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>
															<div class="control-group">
															<label class="control-label">語言能力  Bahasa</label>
															</div>
															<div class="control-group">
															<label class="control-label">國語 Mandarin</label>
															<div class="controls">
																		<select class="span7 " name="mandarinp" data-placeholder="Choose a Category" tabindex="1">
													<?php
												            //$stts = 'FI'; 
												            $stts = substr($personalid, 0, 2);
												            if($stts == 'FI'){ ?>
												            <option value="" />Select...
												            <option value="初 學 pemula" /> 初 學 pemula
															<option value="中 等 menengah" /> 中 等 menengah
															<option value="好 bagus" /> 好 bagus


														              <?php 
														            }else{?>

																		<option value="" />Select...
																		<option value="聽一點 sedikit mengerti" />聽一點 sedikit mengerti
																		<option value="說一點- sedikit mengucapkan" />說一點- sedikit mengucapkan

 																 <?php }?>

																		
																		</select>															
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">台語 Taiyu (Khusus Female Informal)</label>
															<div class="controls">
																		<select class="span7 " name="taiyup" data-placeholder="Choose a Category" tabindex="1">
																			<?php
												            //$stts = 'FI'; 
												            $stts = substr($personalid, 0, 2);
												            if($stts == 'FI'){ ?>
												            <option value="" />Select...
												            <option value="初 學 pemula" /> 初 學 pemula
															<option value="中 等 menengah" /> 中 等 menengah
															<option value="好 bagus" /> 好 bagus


														              <?php 
														            }else{?>

																		<option value="" />Select...
																		<option value="聽一點 sedikit mengerti" />聽一點 sedikit mengerti
																		<option value="說一點- sedikit mengucapkan" />說一點- sedikit mengucapkan

 																 <?php }?>

																		
																		</select>															
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">英語Inggris</label>
															<div class="controls">
																<select class="span7 " name="inggrisp" data-placeholder="Choose a Category" tabindex="1">
																		<?php
												            //$stts = 'FI'; 
												            $stts = substr($personalid, 0, 2);
												            if($stts == 'FI'){ ?>
												            <option value="" />Select...
												            <option value="初 學 pemula" /> 初 學 pemula
															<option value="中 等 menengah" /> 中 等 menengah
															<option value="好 bagus" /> 好 bagus


														              <?php 
														            }else{?>

																		<option value="" />Select...
																		<option value="拼字A-Z-Mengucapkan A-Z" />拼字A-Z-Mengucapkan A-Z
																		<option value="聽一點 sedikit mengerti" />聽一點 sedikit mengerti
																		<option value="說一點 sedikit mengucapkan" />說一點 sedikit mengucapkan
																		<option value="看一點 sedikit membaca" />看一點 sedikit membaca
																		<option value="寫一點 sedikit menulis" />寫一點 sedikit menulis

 																 <?php }?>

																		
																		</select>			
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">廣東 Cantonese (Khusus Female Informal)</label>
															<div class="controls">
																		<select class="span7 " name="cantonesep" data-placeholder="Choose a Category" tabindex="1">
																						<?php
												            //$stts = 'FI'; 
												            $stts = substr($personalid, 0, 2);
												            if($stts == 'FI'){ ?>
												            <option value="" />Select...
												            <option value="初 學 pemula" /> 初 學 pemula
															<option value="中 等 menengah" /> 中 等 menengah
															<option value="好 bagus" /> 好 bagus


														              <?php 
														            }else{?>

																		<option value="" />Select...
																		<option value="聽一點 sedikit mengerti" />聽一點 sedikit mengerti
																		<option value="說一點- sedikit mengucapkan" />說一點- sedikit mengucapkan

 																 <?php }?>

																		
																		</select>															
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">客家 Hakka (Khusus Female Informal)</label>
															<div class="controls">
																		<select class="span7 " name="hakkap" data-placeholder="Choose a Category" tabindex="1">
																						<?php
												            //$stts = 'FI'; 
												            $stts = substr($personalid, 0, 2);
												            if($stts == 'FI'){ ?>
												            <option value="" />Select...
												            <option value="初 學 pemula" /> 初 學 pemula
															<option value="中 等 menengah" /> 中 等 menengah
															<option value="好 bagus" /> 好 bagus


														              <?php 
														            }else{?>

																		<option value="" />Select...
																		<option value="聽一點 sedikit mengerti" />聽一點 sedikit mengerti
																		<option value="說一點- sedikit mengucapkan" />說一點- sedikit mengucapkan

 																 <?php }?>

																		
																		</select>																
															</div>
															</div>
															<div class="control-group">
                                    <label class="control-label">Image Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>"  alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" value="<?php echo $row->foto; ?>" name="gambarnya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>
<?php 
                                        } ?>

															<div class="form-actions">
                                    <button type="submit" class="btn blue" onclick="return savechecked();"><i class="icon-ok" ></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/personal/personal"?>"><i class=" icon-remove"></i> Kembali </a>

                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


