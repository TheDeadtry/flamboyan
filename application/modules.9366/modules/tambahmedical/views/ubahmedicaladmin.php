<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Medical </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Ubah Medical </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


	                        

<div class="row-fluid">



 <div class="span8">
                         
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Medical History</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>

<form action="<?php echo site_url('tambahmedical/ubahmedicaldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_medical as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />


<div class="control-group">
                                                                <label class="control-label span4"> Jenis Medical </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jenismedical" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="awal" />Awal
                                                                        <option value="Full" />Full
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Nama Medical </label>
                                                            <div class="controls">
                                                                <input type="text" name="namamedical" value="<?php echo $row->nama;?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Medical yang di gunakan" data-original-title="Nama Medical" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label span4">Nomor Medical </label>
                                                            <div class="controls">
                                                                <input type="text" name="nomormedical" value="<?php echo $row->nomor;?>" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical </label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tanggal;?>" name="tanggal" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
																<label class="control-label span4"> 體檢 Pemeriksaan kesehatan </label>
																<div class="controls">
																	<select class="span7 " name="kesehatan" data-placeholder="Choose a Category" tabindex="1">
																		<option value="<?php echo $row->keterangan;?>" /><?php echo $row->keterangan;?>
																		<option value="OK 有" />OK 有
																		<option value="Tidak OK 沒有" />Tidak OK 沒有
																		</select>
																</div>
															</div>
															
			

    <?php }?>
															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailmedical/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


