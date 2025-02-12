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

<form action="<?php echo site_url('detaildisnaker/tambahdisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <?php foreach ($tampil_data_personal as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

 															<div class="control-group">
															<label class="control-label span4">ID disnaker </label>
															<div class="controls">
																<input type="text" name="nodisnaker" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

															<div class="control-group">
															<label class="control-label span4">ID SBK </label>
															<div class="controls">
																<input type="text" name="nosbk" value="<?php echo "".$idbiodatanya ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" readonly />
															</div>
															</div>

															<div class="control-group" id="berlaku">
																<label class="control-label span4"> Tgl Perkiraan Online </label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" name="perkiraan"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>


															<div class="control-group">
															<label class="control-label span4"> No Ktp </label>
															<div class="controls">
																<input type="text" name="noktp" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label span4"> Nama </label>
															<div class="controls">
																<input type="text" name="nama" value="<?php echo "".$row->nama ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label span4"> Tempat lahir </label>
															<div class="controls">
																<input type="text" name="tempatlahir" value="<?php echo "".$row->tempatlahir ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
															</div>
															</div>
						
															<div class="control-group" id="berlaku">
																<label class="control-label span4"> Tanggal Lahir </label>
																<div class="controls">
																<input type="text" name="tanggallahir" value="<?php echo "".$row->tgllahir ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
															</div>
															</div>

															<div class="control-group">
                                                                <label class="control-label span4"> Jenis kelamin</label>
                                                                <div class="controls">
																<input type="text" name="jenis_kelamin" value="<?php echo "".$row->jeniskelamin ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
															</div>
                                                            </div>

                                                            <div class="control-group">
																<label class="control-label span4"> Agama</label>
																<div class="controls">
																<input type="text" name="agama" value="<?php echo "".$row->agama ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
															</div>
															</div>

															<div class="control-group">
																<label class="control-label span4">Status</label>
																<div class="controls">
																	<select class="span7 " name="status" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo "".$row->status ?>" /><?php echo "".$row->status ?>
																		<option value="Belum Nikah" />Belum Nikah
																		<option value="Menikah" />Menikah
																		<option value="Cerai" />Cerai
																		<option value="Cerai mati" />Cerai mati
																		</select>
																</div>
															</div>

															<div class="control-group">
															<label class="control-label span4"> Pendidikan </label>
															<div class="controls">
																<input type="text" name="pendidikan" value="<?php echo "".$row->pendidikan ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
															</div>
															</div>

															<div class="control-group">
						                                    <label class="control-label span4">Alamat Lengkap</label>
						                                    <div class="controls">
						                                        <textarea class="span6 " name="alamat" rows="3"><?php echo "".$row->alamat ?></textarea>
						                                    </div>
						                                	</div>
								  <?php }?>						

 <?php foreach ($tampil_data_family as $row2) { ?>
															<div class="control-group">
															<label class="control-label span4"> Nama Ayah </label>
															<div class="controls">
																<input type="text" name="namaayah" value="<?php echo "".$row2->nama_bapak ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

															<div class="control-group">
															<label class="control-label span4"> Nama Ibu </label>
															<div class="controls">
																<input type="text" name="namaibu" value="<?php echo "".$row2->nama_ibu ?>"class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

														
															<div class="control-group">
																<label class="control-label span4">Hubungan Kontak Darurat</label>
																<div class="controls">
																	<select class="span7 " name="namaahli" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Ayah" />Ayah
																		<option value="Ibu" />Ibu
																		<option value="Istri" />Istri
																		</select>
																</div>
															</div>

															<div class="control-group hidden">
															<label class="control-label span4"> Nama Kontak Darurat </label>
															<div class="controls">
																<input type="text" name="namakontak" class="span7 popovers "  data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

															<div class="control-group ">
						                                    <label class="control-label span4">Alamat Kontak Darurat</label>
						                                    <div class="controls">
						                                        <textarea class="span6 "  name="alamatkontak" rows="3"><?php echo "".$row->alamat ?></textarea>
						                                    </div>
						                                	</div>

															<div class="control-group ">
															<label class="control-label span4"> Telepon Kontak Darurat </label>
															<div class="controls">
																<input type="text" name="teleponkontak" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

															<div class="control-group hidden">
															<label class="control-label span4"> Hubungan Kontak Darurat </label>
															<div class="controls">
																<input type="text" name="hubugankonta" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>

															<div class="control-group">
																<label class="control-label span4">Negara</label>
																<div class="controls">
																	<select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
																			<option value="" />Select...
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
																			<option value="" />Select...
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


