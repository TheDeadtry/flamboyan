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

 <div class="span8">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Tambah 家庭資料 / visapermit DATA </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahvisapermit/ubahvisapermitdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_visapermit as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

 															<div class="control-group">
															<label class="control-label span4">號碼 NO</label>
															<div class="controls">
																<input type="text" name="no" value="<?php echo $row->no;?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
															</div>
															</div>


															<div class="control-group" id="berlaku">
																<label class="control-label span4">發行日期 TGL TERBIT</label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglterbit;?>" name="tglterbit"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
															<div class="control-group" id="berlaku">
																<label class="control-label span4">到期 TGL EXP</label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglexp;?>" name="tglexp"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
															<div class="control-group" id="berlaku">
																<label class="control-label span4">新受到日期 TGL TERIMA BARU</label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglterima;?>" name="tglterima"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
															<div class="control-group" id="berlaku">
																<label class="control-label span4">之前受到日期保留在印尼 TGL TERIMA DULU DISIMPAN DI INDONESIA</label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglsimpan;?>" name="tglsimpan"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
															<div class="control-group" id="berlaku">
																<label class="control-label span4">給工人帶回去臺灣-TGL DIBAWA TKI KE TAIWAN</label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglbawa;?>" name="tglbawa"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
															<div class="control-group" id="berlaku">
																<label class="control-label span4">保留在印尼-TGL DIMINTA SIMPAN DI INDO</label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglminta;?>" name="tglminta"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>
															
															

                                     <?php }?>

															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailvisapermit/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


