                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah Request <small>Menambahkan Request Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah Request</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Tambah 家庭資料 / request DATA </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahrequest/tambahrequestdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

                                                            <div class="control-group">
																<label class="control-label span4"> Usaha majikan 雇主企業類型 </label>
																<div class="controls">
																	<select class="span7 " name="usahamajikan" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Pabrik 工廠" />Pabrik 工廠
																		<option value="Tidak ada permintaan 不拘 " />Tidak ada permintaan 不拘
																		<option value="Kebun buah/sayur 水果蔬菜元" />Kebun buah/sayur 水果蔬菜元
																		<option value="Peternakan 牲畜" />Peternakan 牲畜
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> Waktu kerja 願意工作時間</label>
																<div class="controls">
																	<select class="span7 " name="waktukerja" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
																		<option value="Siang hari 白天 " />Siang hari 白天
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> Kondisi kerja 工作意願</label>
																<div class="controls">
																	<select class="span7 " name="kondisikerja" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Dalam ruang 室內" />Dalam ruang 室內
																		<option value="Luar ruang 戶外 " />Luar ruang 戶外
																		<option value="Lingkungan panas 在炎熱的工作環境" />Lingkungan panas 在炎熱的工作環境
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> Jenis Pekerjaan 工作類型</label>
																<div class="controls">
																	<select class="span7 " name="jenispekerjaan" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
																		<option value="Las listrik 電焊" />Las listrik 電焊
																		<option value="Mengendarai mobi l駕駛" />Mengendarai mobil 駕駛
																		<option value="Mengendarai Forklift 駕駛叉車" />Mengendarai Forklift 駕駛叉車
																		<option value="Produk rumah dari kayu 木家產品" />Produk rumah dari kayu 木家產品
																		<option value="Memindahkan barang 起重/搬貨" />Memindahkan barang 起重/搬貨
																		</select>
																</div>
															</div>



															<div class="control-group">
																<label class="control-label span4"> Lokasi Kerja  工作地點</label>
																<div class="controls">
																	<select class="span7 " name="lokasikerja" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
																		<option value="Kaoshiung 高雄" />Kaoshiung 高雄
																		<option value="Taipei  台北" />Taipei  台北
																		<option value="Taichung 台中" />Taichung 台中
																		<option value="Tainan 台南" />Tainan 台南
																		</select>
																</div>
															</div>


															<div class="control-group">
							                                    <label class="control-label span4"> Lokasi Kerja  工作地點 </label>
							                                    <div class="controls">
							                                        <select data-placeholder="Pilih Lokasi Kerja" name="lokasikerja[]" id="jenispekerjaan" class="chosen span7" multiple="multiple" tabindex="6">
							                                            <option value="" />
							                                            <optgroup label="Penjelasan Lokasi">
							                                            	<?php  foreach ($tampil_data_lokasi as $pilihan) { ?>

																				<option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

																				<?php
							                                            	}
																				?>

							                                              </optgroup>
							                                          
							                                        </select>
							                                    </div>
							                                </div>


															<div class="control-group">
																<label class="control-label span4"> Lembur 加班</label>
																<div class="controls">
																	<select class="span7 " name="lembur" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Ada lembur 有加班" />Ada lembur 有加班
																		<option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
																		<option value="Min.lembur 50 jam /bulan 50 小時以上" />Min.lembur 50 jam /bulan 50 小時以上
																		<option value="Min.lembur 80 jam /bulan 80 小時以上" />Min.lembur 80 jam /bulan 80 小時以上
																		</select>
																</div>
															</div>

															


															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailrequest/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


