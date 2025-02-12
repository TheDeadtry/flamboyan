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
                    <div class="span4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>Detail ID Biodata </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                            <div class="widget-body">
                            <?php foreach ($tugas as $row) { ?>
                                <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
								<?php } ?>
									<div class="text-center control-group">
										<label class="control-label">ID BIODATA </label>
										<div class="controls">
											<input type="text" readonly id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="span7 popovers" data-trigger="hover" data-content="Auto Generated Id" data-original-title="ID Biodata"/>
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
                                <h4><i class="icon-reorder"></i>Tambah 家庭資料 / FAMILY DATA </h4>
                                <span class="tools">
                                	<a href="javascript:;" class="icon-chevron-down"></a>
                                	<a href="javascript:;" class="icon-remove"></a>
                                </span>
                            </div>
                            <div class="widget-body">
								<form action="<?php echo site_url('detailtugas/tambahtugas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
									<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                    <div class="control-group">
										<label class="control-label">家務 Pekerjaan Rumah Tugas</label>
										<div class="controls">
											<select name="t1" class="form-control">
												<?php for($i=1;$i<7;$i++) { ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">照顧嬰兒 Merawat Bayi Baru Lahir</label>
										<div class="controls">
											<select name="t2" class="form-control">
												<?php for($i=1;$i<7;$i++) { ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">老弱病殘 Merawat Orang Cacat</label>
										<div class="controls">
											<select name="t3" class="form-control">
												<?php for($i=1;$i<7;$i++) { ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">看護小孩 Merawat Anak Kecil</label>
										<div class="controls">
											<select name="t4" class="form-control">
												<?php for($i=1;$i<7;$i++) { ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">烹飪 Memasak</label>
										<div class="controls">
											<select name="t5" class="form-control">
												<?php for($i=1;$i<7;$i++) { ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">看護老人 Merawat Orang Jompo</label>
										<div class="controls">
											<select name="t6" class="form-control">
												<?php for($i=1;$i<7;$i++) { ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-actions">
		                                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
		                                <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
		                            </div>
								</form>
     						</div>
                        </div>
                    </div>


                              <div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
            </div>