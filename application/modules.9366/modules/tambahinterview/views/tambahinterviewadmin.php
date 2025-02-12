                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Tambah interview <small>Menambahkan interview Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Tambah interview</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Tambah 家庭資料 / interview DATA </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('tambahinterview/tambahinterviewdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />


																<div class="control-group">
																<label class="control-label span7"> 有經 EXPERIENCE </label>

																<div class="controls">

																</div>
															</div>

                                                            <div class="control-group">
																<label class="control-label span4"> 抽痰 SUCTION </label>
																<div class="controls">
																	<select class="span4 " name="sunction" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 鼻胃管 FOOD SONDING</label>
																<div class="controls">
																	<select class="span4 " name="food" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 尿管 CATETER</label>
																<div class="controls">
																	<select class="span4 " name="cateter" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 注射 INJECTION</label>
																<div class="controls">
																	<select class="span4 " name="injection" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 拍背 THERAPY BACK</label>
																<div class="controls">
																	<select class="span4 " name="therapy" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 扶持 HELPING /CARRYING WHEN PARIENT WALKING</label>
																<div class="controls">
																	<select class="span4 " name="helping" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 抱病人上下床/輪椅 CARRYING BATIENT UP/ DOWN BED TO/ FROM WHEELCHAIR</label>
																<div class="controls">
																	<select class="span4 " name="bed" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label span4"> 抱病人上下樓梯 CARRYING PATIENT UP/ DOWN STAIRS</label>
																<div class="controls">
																	<select class="span4 " name="stairs" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="Y/有" />Y/有
																		<option value="N/ 沒有" />N/ 沒有
																		</select>
																</div>
															</div>

															


															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailinterview/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


