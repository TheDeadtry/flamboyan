           
<script>
 function tampilsuhane()
 {
     kdkab = document.getElementById("majikan_id").value;
     $.ajax({
         url:"<?php echo  base_url();?>detailmajikan/pilih_suhannya/"+kdkab+"",
         success: function(response){
         $("#suhan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 
 function tampilvisapermite()
 {
     kdkec = document.getElementById("suhan_id").value;
     $.ajax({
         url:"<?php echo  base_url();?>detailmajikan/pilih_visapermitnya/"+kdkec+"",
         success: function(response){
         $("#visapermit_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }

</script>


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
                                    <h4><i class="icon-reorder"></i>Tambah DATA majikan 簽證</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<form action="<?php echo site_url('detailmajikan/tambahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

                                                            

															<!-- <div class="control-group">
                                                                <label class="control-label"> Pilih Majikan </label>
                                                                <div class="controls">
                                                                   <?php   echo form_dropdown("id_majikannya",$option_posisi,"","id='id_majikan'"); ?>
                                                            <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                                                </div>
                                                            </div>
                                                            <div id="suhanin">
                                                             <div class="control-group" id="suhanin">
                                                                <label class="control-label"> Pilih SUhan </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_suhan",array('Pilih Suhan'=>'Pilih Majikan Terlebih dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="suhanin">
                                                                <label class="control-label"> Pilih Visa Permit </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_visapermit",array('Pilih Suhan'=>'Pilih Majikan Terlebih dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>
 															</div> -->

        <div class="form-group">
            <label for="jk" class="control-label col-sm-3"> Pilih Majikan</label>
            <div class="col-sm-4">
            <?php
            $style_provinsi='class="form-control input-sm" id="majikan_id"  onChange="tampilmajikane()"';
            echo form_dropdown('majikan_id',$datamajikane,'',$style_provinsi);
            ?>
        </div>
        </div>
        
        <div class="form-group">
            <label for="jk" class="control-label col-sm-3">Pilih SUhan</label>
            <div class="col-sm-4">
                <?php
                $style_kabupaten='class="form-control input-sm" id="suhan_id" onChange="tampilSuhane()"';
                echo form_dropdown("suhan_id",array('Pilih Majikan'=>'- Pilih Majikan -'),'',$style_kabupaten);
                ?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="jk" class="control-label col-sm-3">Pilih Visa Permit</label>
            <div class="col-sm-4">
                <?php
                $style_kecamatan='class="form-control input-sm" id="visapermit_id" onChange="tampilvisapermite()"';
                echo form_dropdown("visapermit_id",array('Pilih Suhan'=>'- Pilih Suhan -'),'',$style_kecamatan);
                ?>
            </div>
        </div>


															<div class="control-group" id="berlaku">
																<label class="control-label"> 挑工 日期 TGL TERPILIH </label>
																<div class="controls">
																	<div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span7" name="terpilih"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															</div>



															


															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailmajikan/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>

                                                            <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel1">Modal Header</h3></div>
                                        <div class="modal-body">
                                           <?php echo form_open('detailmajikan/simpan_data_majikan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                    <div class="control-group">

                                                            <label class="control-label">ID BIODATA</label>
                                                            <div class="controls">
                                                                <input type="text" readonly name="idp" value="<?php echo $idbiodatanya; ?>" required class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" readonly/>
                                                            </div>
                                                            </div>


                                        <div class="control-group">
                                        <label class="control-label">Kode </label>
                                        <div class="controls">
                                            <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Nama </label>
                                        <div class="controls">
                                            <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Handphone </label>
                                        <div class="controls">
                                            <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                        <div class="control-group">
                                        <label class="control-label">Email </label>
                                        <div class="controls">
                                            <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                         <div class="control-group">
                                        <label class="control-label">Alamat </label>
                                        <div class="controls">
                                            <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="status">
                                                    <option value="" />Select...
                                                    <option value="majikan" />majikan
                                                </select>
                                            </div>
                                        </div>
                                       
                                       
                                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button class="btn btn-primary">Save</button>
                                        </div>
 <?php echo form_close(); ?>
                                    </div>
                        </div>



                        </div>
