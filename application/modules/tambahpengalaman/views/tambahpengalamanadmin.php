                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah pengalaman Experience <small>Menambahkan pengalaman Experience Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah pengalaman Experience</a><span class="divider-last">&nbsp;</span></li>
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
            <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif"/></div>

	                        

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
                                    <h4><i class="icon-reorder"></i>Tambah pengalaman EXPERIENCE-工作經驗 </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahpengalaman/tambahpengalamandata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

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
																<label class="control-label"> Lokasi kerja Taiwan 台灣工作地點 </label>
																<div class="controls">
																	<select class="span7 " name="lokasikerja" data-placeholder="Choose a Category" tabindex="1">
																			<option value="" />Select...
																		<option value="Kaoshiung 高雄" />Kaoshiung 高雄
                                                                        <option value="Taipei  台北" />Taipei  台北
                                                                        <option value="Taichung 台中" />Taichung 台中
                                                                        <option value="Tainan 台南" />Tainan 台南
																		</select>
																</div>
															</div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Lama kerja  (tahun/bulan) 工作期 (年 /  月）</label>
                                                                <div class="controls">
                                                                <input type="text" name="lamakerja" class="control-label span3"  />&nbsp;&nbsp;&nbsp;&nbsp;

                                                                    <select class="span3 " name="tahunlamakerja" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                            <option value="Tahun 年" />Tahun 年
                                                                            <option value="Bulan 月" />Bulan 月
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Periode kerja 工作期間</label>
                                                            <div class="controls">
                                                                <input type="text" name="periodekerja" class="span7 popovers" data-trigger="hover" data-content="Isi Periode ex: (2008-20015)" data-original-title="Periode" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam Kerja 日常工作時間</label>
                                                            <div class="controls">
                                                                <input type="text" name="jamkerja" class="span7 popovers" data-trigger="hover" data-content="Isi jam kerja ex: (07.00-21.00)" data-original-title="Jam Kerja" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Majikan 雇主 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="majikan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <option value="華人-Cina" />華人-Cina
                                                                        <option value="印尼人-Indonesia" />印尼人-Indonesia
                                                                        <option value="印度人- India" />印度人- India
                                                                        <option value=" 馬來人-Melayu" /> 馬來人-Melayu
                                                                        <option value="  阿拉伯人-Arab" />  阿拉伯人-Arab
                                                                        <option value="  西雜貨店 -toko grosir" />  西雜貨店 -toko grosir
                                                                        <option value="  豆腐廠 pabrik tahu洋人" />  豆腐廠 pabrik tahu洋人
                                                                        <option value="  洋人-orang bule" />  洋人-orang bule
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Alasan berhenti kerja 離職原因 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alasan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($pilihan_alasan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Kerja Rumah tangga 家務事</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="kerjaprt" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Memasak 煮食</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="memasak" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mencuci baju 洗衫</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="cucibaju" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Menyetrika baju 燙衫</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="setrika" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mencuci mobil 洗機車</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="cucimobil" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Merawat binatang 照顧寵物</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="rawatbinatang" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Merawat bayi 照料初生嬰兒</label>
                                                                <div class="controls">
                                                                <input type="text" name="rawatbayi" class="control-label span3"  />&nbsp;&nbsp;&nbsp;&nbsp;

                                                                    <select class="span3 " name="tahunrawatbayi" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                            <option value="Tahun 年" />Tahun 年
                                                                            <option value="Bulan 月" />Bulan 月
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> Merawat anak kecil 照顧小孩</label>
                                                            <div class="controls">
                                                                <input type="text" name="rawatanak" class="span3 popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
                                                            </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">merawat orang jompo 照顧老人</label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class="span5 " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="" />Select...
                                                                        <option value="男 Pria" />男 Pria
                                                                        <option value="女 Wanita" />女 Wanita
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">umur 年齡</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurjompo" class="span3 popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> kondisi 情況 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisijompo[]" id="hobi" class="chosen span7" multiple="multiple" tabindex="13">
                                                                    <option value="" />
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_kondisijompo as $pilihan) { ?>

                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                            <?php
                                                                        }
                                                                            ?>

                                                                      </optgroup>
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>





                                                         <div class="control-group">
                                                            <label class="control-label">jumlah anggota rumah 家庭成員數目</label>
                                                            <div class="controls">
                                                                <input type="text" name="jumlahanggota" class="span3 popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tipe rumah majikan 居住類型 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiperumah" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                         <option value="Villa 別墅" />Villa 別墅
                                                                        <option value="Apartment 公寓" />Apartment 公寓
                                                                        <option value="Rumah kota 城市房子" />Rumah kota 城市房子
                                                                        <option value="Rumah desa 村屋" /> Rumah desa 村屋
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">rumah berapa lantai 樓</label>
                                                            <div class="controls">
                                                                <input type="text" name="lantai" class="span3 popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">jumlah kamar tidur 睡房 </label>
                                                            <div class="controls">
                                                                <input type="text" name="kamar" class="span3 popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">keterangan 備註   </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="keterangan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                         <option value="Membantu di restorant 幫老伴在餐廳" />Membantu di restorant 幫老伴在餐廳
                                                                        <option value="Membantu di hotel 幫老伴在酒店" />Membantu di hotel 幫老伴在酒店
                                                                        <option value="Membantu menjual sayur di pasar 幫老伴在銷售按市場" />Membantu menjual sayur di pasar 幫老伴在銷售按市場
                                                                        <option value="Membantu di toko pakaian 幫老伴的衣服店" /> Membantu di toko pakaian 幫老伴的衣服店
                                                                         <option value="Membantu di kebun sayur 幫老伴的菜園" />Membantu di kebun sayur 幫老伴的菜園
                                                                        <option value="Helping employer's fruit garden 幫老伴的菜園" />Helping employer's fruit garden 幫老伴的菜園
                                                                        <option value="Membantu di kebun rebung 幫老伴的竹笋園" /> Membantu di kebun rebung 幫老伴的竹笋園
                                                                        </select>
                                                                </div>
                                                            </div>













															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Simpan </button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailpengalaman/"?>"><i class=" icon-remove"></i> Kembali Ke Profile </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>
                                                </div>



<div class="row-fluid">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Data Pendidikan</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

                                   <table class="table table-striped table-bordered" id="sample_1">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>negara</th>
                                            <th>lokasi kerja</th>
                                             <th>lama kerja</th>
                                             <th>periode kerja</th>
                                             <th>jam kerja</th>
                                             <th>majikan</th>
                                             <th>alasan Berhenti</th>
                                             <th>kerja prt</th>
                                             <th>memasak</th>
                                             <th>mencuci baju</th>
                                             <th>setrika baju</th>
                                             <th>mencuci mobil</th>
                                             <th>rawat binatang</th>
                                             <th>rawat bayi</th>
                                             <th>rawat anak</th>
                                             <th>jk</th>
                                             <th>jompo umur</th>
                                             <th>jompo kondisi</th>
                                             <th>anggota rumah</th>
                                             <th>tipe rumah</th>
                                             <th>jumlah lantai</th>
                                             <th>jumlah kamar</th>
                                             <th>jumlah kamar</th>
                                               <th>Ubah</th>
                                                 <th>Hapus</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_pengalaman as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->negara;?></td>
                                            <td><?php echo $row->lokasikerja;?></td>
                                            <td><?php echo $row->lamakerja;?></td>
                                            <td><?php echo $row->periodekerja;?></td>
                                            <td><?php echo $row->jamkerja;?></td>
                                            <td><?php echo $row->majikan;?></td>
                                            <td><?php echo $row->alasanberhenti;?></td>
                                            <td><?php echo $row->kerjaprt;?></td>
                                            <td><?php echo $row->memasak;?></td>
                                            <td><?php echo $row->mencucibaju;?></td>
                                            <td><?php echo $row->setrikabaju;?></td>
                                            <td><?php echo $row->mencucimobil;?></td>
                                            <td><?php echo $row->rawatbinatang;?></td>
                                            <td><?php echo $row->rawatbayi;?></td>
                                            <td><?php echo $row->rawatanak;?></td>
                                            <td><?php echo $row->jompokelamin;?></td>
                                            <td><?php echo $row->jompoumur;?></td>
                                            <td><?php echo $row->jompokondisi;?></td>
                                            <td><?php echo $row->anggotarumah;?></td>
                                            <td><?php echo $row->tiperumah;?></td>
                                            <td><?php echo $row->jumlahlantai;?></td>
                                            <td><?php echo $row->jumlahkamar;?></td>
                                            <td><?php echo $row->jumlahkamar;?></td>


                                            <td><button class="btn btn-mini btn-primary" type="button">Ubah</button> </td>
                                              <td>   <button class="btn btn-mini" type="button">Hapus</button></td>
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>



                                </div>
                            </div>
                        </div>

