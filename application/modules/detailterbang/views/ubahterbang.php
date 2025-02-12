                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah Data PEnerbangan <small>Menambahkan Data PEnerbangan Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah Data Terbang</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Tambah DATA terbang 簽證</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('detailterbang/ubahterbang');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_terbang as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

 															<div class="control-group">
                                                                <label class="control-label">Tanggal Berangkat </label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tanggalterbang;?>" name="tanggalterbang"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->id_terbang;?>" /><?php echo $row->namamaskapai; echo " : ".$row->kodeterbang;echo " : ".$row->ruteterbang;echo " : ".$row->jamterbang;echo " --> ";echo " : ".$row->kodeterbang2;echo " : ".$row->ruteterbang2;echo " : ".$row->jamterbang2;?>
                                                                        <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->namamaskapai; echo " : ".$pilihan->kodeterbang;echo " : ".$pilihan->ruteterbang;echo " : ".$pilihan->jamterbang;echo " --> ";echo " : ".$pilihan->kodeterbang2;echo " : ".$pilihan->ruteterbang2;echo " : ".$pilihan->jamterbang2;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


															


												  <?php } ?>			


															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailterbangpermit/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


