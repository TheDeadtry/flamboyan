                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah Passport <small>Menambahkan Passport Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah Passport</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Tambah DATA disnaker 簽證</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('detaildisnaker/ubahdisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_disnaker as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

 															<div class="control-group">
															<label class="control-label span4">ID disnaker </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->nodisnaker;?>" name="nodisnaker" class="span7 popovers" data-trigger="hover" data-content="Isi No DIsnaker online" data-original-title="No Disnaker" />
															</div>
															</div>

															<div class="control-group">
															<label class="control-label span4">ID SBK </label>
															<div class="controls">
																<input type="text" value="<?php echo $idbiodatanya;?>" name="nosbk" class="span7 popovers" data-trigger="hover" data-content="No induk dari perusahaan" data-original-title="No SBK" />
															</div>
															</div>

															<div class="control-group" id="berlaku">
																<label class="control-label span4"> Tgl Perkiraan Online </label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglonline;?>" name="perkiraan"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>


															<div class="control-group">
															<label class="control-label span4"> No Ktp </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->noktp;?>" name="noktp" class="span7 popovers" data-trigger="hover" data-content="Isi Nomor Sesuai dengan KTP" data-original-title="No Ktp" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label span4"> Nama </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->nama;?>" name="nama" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label span4"> Tempat lahir </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->tempatlahir;?>" name="tempat" class="span7 popovers" data-trigger="hover" data-content="Isi Kota Lahir Lengkap Sesuai dengan KTP" data-original-title="Kota Lahir" />
															</div>
															</div>
						
															<div class="control-group" id="berlaku">
																<label class="control-label span4"> Tanggal Lahir </label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tanggallahir;?>" name="tgllahir"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>

															<div class="control-group">
                                                                <label class="control-label span4"> Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class="span7 " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="<?php echo $row->jeniskelamin;?>"  /><?php echo $row->jeniskelamin;?>
                                                                        <option value="Pria" />Pria
                                                                        <option value="Wanita" />Wanita
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
																<label class="control-label span4"> Agama</label>
																<div class="controls">
																	<select class="span7 " name="agama" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->agama;?>"  /><?php echo $row->agama;?> 
																		<?php  foreach ($tampil_data_agama as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>

															<div class="control-group">
																<label class="control-label span4">Status</label>
																<div class="controls">
																	<select class="span7 " name="status" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo $row->status;?>"  /><?php echo $row->status;?>"
																		<option value="Belum Nikah" />Belum Nikah
																		<option value="Menikah" />Menikah
																		<option value="Cerai" />Cerai
																		<option value="Cerai mati" />Cerai mati
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4">Pendidikan</label>
																<div class="controls">
																	<select class="span7 " name="pendidikan" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo $row->status;?>"  /><?php echo $row->pendidikan;?>"
																		<option value="SD" />SD
																		<option value="SLTP" />SLTP
																		<option value="SLTA" />SLTA
																		</select>
																</div>
															</div>

															

															<div class="control-group">
						                                    <label class="control-label span4">Alamat</label>
						                                    <div class="controls">
						                                        <textarea class="span6 "  name="alamat" rows="3"><?php echo $row->alamat;?></textarea>
						                                    </div>
						                                	</div>

															<div class="control-group">
															<label class="control-label span4"> Nama Ayah </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->namaayah;?>" name="namaayah" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Ayah Kandung" data-original-title="Nama Ayah" />
															</div>
															</div>

															<div class="control-group">
															<label class="control-label span4"> Nama Ibu </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->namaibu;?>" name="namaibu" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Ibu Kandung" data-original-title="Nama Ibu" />
															</div>
															</div>

															<div class="control-group">
																<label class="control-label span4">Nama Ahli Waris</label>
																<div class="controls">
																	<select class="span7 " name="namaahli" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo $row->namaahli;?>" /><?php echo $row->namaahli;?>
																		<option value="Ayah" />Ayah
																		<option value="Ibu" />Ibu
																		<option value="Istri" />Istri
																		</select>
																</div>
															</div>

															<div class="control-group">
															<label class="control-label span4"> Nama Kontak Darurat </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->namakontak;?>" name="namakontak" class="span7 popovers" data-trigger="hover" data-content="Isi Nama KOntak Darurat yang di tuju jika ada masalah" data-original-title="Nama Kontak Darurat" />
															</div>
															</div>

															<div class="control-group">
						                                    <label class="control-label span4">Alamat Kontak Darurat</label>
						                                    <div class="controls">
						                                        <textarea class="span6 "   name="alamatkontak" rows="3"><?php echo $row->alamatkontak;?></textarea>
						                                    </div>
						                                	</div>

															<div class="control-group">
															<label class="control-label span4"> Telepon Kontak Darurat </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->telpkontak;?>" name="teleponkontak" class="span7 popovers" data-trigger="hover" data-content="Isi Telpon KOntak dengan lengkap" data-original-title="Telp kontak darurat" />
															</div>
															</div>

															<div class="control-group">
															<label class="control-label span4"> Hubungan Kontak Darurat </label>
															<div class="controls">
																<input type="text" value="<?php echo $row->hubkontak;?>" name="hubugankontak" class="span7 popovers" data-trigger="hover" data-content="Isi Hubungan darah " data-original-title="Hubungan darah " />
															</div>
															</div>

															<div class="control-group">
																<label class="control-label span4">Negara</label>
																<div class="controls">
																	<select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->negara;?>" /><?php echo $row->negara;?>
																		<?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4">Negara</label>
																<div class="controls">
																	<select class="span10 " name="jabatan" data-placeholder="Choose a Category" tabindex="1">
																			<option value="<?php echo $row->jabatan;?>" /><?php echo $row->jabatan;?>
																		<?php  foreach ($tampil_data_jabatan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
																		</select>
																</div>
															</div>


															
  <?php }?>

															


															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detaildisnaker/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


