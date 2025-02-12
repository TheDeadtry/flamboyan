                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="page-title"> Update Tugas</h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Update Tugas</a><span class="divider-last">&nbsp;</span></li>
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
                                <h4><i class="icon-reorder"></i>Update Tugas </h4>
                                <span class="tools">
                                	<a href="javascript:;" class="icon-chevron-down"></a>
                                	<a href="javascript:;" class="icon-remove"></a>
                                </span>
                            </div>
                            <div class="widget-body">
								<form action="<?php echo site_url('detailtugas/updatetugas');?>" method="post" class="form-horizontal" />
                                	<?php foreach ($tugas as $row) { ?>
										<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
		                                
		                                <div class="control-group">
											<label class="control-label span5">家務 Pekerjaan Rumah Tangga</label>
											<div class="controls span7">
												<select name="t1" class="form-control">
													<?php for($i=1;$i<7;$i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label span5">照顧嬰兒 Merawat Bayi Baru Lahir</label>
											<div class="controls span7">
												<select name="t2" class="form-control">
													<?php for($i=1;$i<7;$i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label span5">老弱病殘 Merawat Orang Cacat</label>
											<div class="controls span7">
												<select name="t3" class="form-control">
													<?php for($i=1;$i<7;$i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label span5">看護小孩 Merawat Anak Kecil</label>
											<div class="controls span7">
												<select name="t4" class="form-control">
													<?php for($i=1;$i<7;$i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label span5">烹飪 Memasak</label>
											<div class="controls span7">
												<select name="t5" class="form-control">
													<?php for($i=1;$i<7;$i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label span5">看護老人 Merawat Orang Jompo</label>
											<div class="controls span7">
												<select name="t6" class="form-control">
													<?php for($i=1;$i<7;$i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										
										<?php } ?>
										<div class="form-actions">
		                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
		                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
                                		</div>
									</form>
     							 </div>
                            </div>
                        </div>
                    </div>