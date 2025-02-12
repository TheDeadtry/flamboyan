                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title">Marketing Data <small>Berisi semua pilihan Marketing untuk inputan</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Setting</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Marketing</a><span class="divider-last">&nbsp;</span></li>
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
                        
                        <button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
                        </div>
                         <div class="row-fluid ">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Progress Marketing</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                <div class="widget-body">
                                    <div class="row-fluid">

                                        <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
    <ul class="nav nav-tabs nav-stacked">

        <li><strong>PRINT DATA </strong>: <a href="<?php echo site_url('printout/biodata/'); ?>" target="_blank"> Personal Data</a></li>

    </ul>

                                </div>
     <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4> 
<!-- <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Semua Data Biodata Dan Dokumen Lokal Harus Sudah terisi Terlebih dahulu ....
                        </div> -->


                                </div>
                        
                                <?php }?>


                                        <div class="span9">
                                            <div class="tabbable tabbable-custom tabs-right">
                                                <ul class="nav nav-tabs tabs-right">
                                                    <li class="active"><a href="#tab_3_1" data-toggle="tab">TKI 外勞</a></li>
                                                    <li><a href="#tab_3_2" data-toggle="tab">DEPNAKER ONLINE 勞工網上報名</a></li>
                                                    <li><a href="#tab_3_3" data-toggle="tab">DAPAT MAJIKAN 挑到雇主</a></li>
                                                    <li><a href="#tab_3_4" data-toggle="tab">PK 勞動契約</a></li>
                                                    <li><a href="#tab_3_5" data-toggle="tab">SUHAN 核准函</a></li>
                                                    <li><a href="#tab_3_6" data-toggle="tab">VISA PERMIT  簽證函</a></li>
                                                    <li><a href="#tab_3_7" data-toggle="tab">PASSPORT 護照</a></li>
                                                    <li><a href="#tab_3_8" data-toggle="tab">SKCK 良民證</a></li>
                                                    <li><a href="#tab_3_9" data-toggle="tab">MEDIKAL 體檢</a></li>
                                                    <li><a href="#tab_3_10" data-toggle="tab">VISA 簽證</a></li>
                                                    <li><a href="#tab_3_11" data-toggle="tab">PAP 出發前簡報課</a></li>
                                                    <li><a href="#tab_3_12" data-toggle="tab">貸款 KSP LOAN </a></li>
                                                    <li><a href="#tab_3_13" data-toggle="tab">Departure 入境</a></li>
                                                    <li><a href="#tab_3_14" data-toggle="tab">REMARK 備註</a></li>


                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_3_1">
                                                <?php echo form_open('Marketing/update_data_tki/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                              <?php  foreach ($ambildatatki as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                       <div class="control-group">
                                                            <label class="control-label">Agen 仲介</label>
                                                            <div class="controls">
                                                                <input type="text" name="agen" value="<?php echo $row->kodetkiagen; ?>" class="span7 popovers" readonly />
                                                            </div>
                                                            </div>
                                                             
                                                             <div class="control-group">
                                                            <label class="control-label">Majikan 雇主</label>
                                                            <div class="controls">
                                                                <input type="text" name="majikan" class="span7 popovers"   value="<?php echo $row->namamjk; ?>" readonly/>
                                                            </div>
                                                            </div>
                                                             
                                                             <div class="control-group">
                                                            <label class="control-label">No Induk Dari Agency 仲介編號</label>
                                                            <div class="controls">
                                                                <input type="text" name="noindukagen" value="<?php echo $row->indukagen; ?>"  class="span7 popovers"  readonly/>
                                                            </div>
                                                            </div>
                                                             
                                                             <div class="control-group">
                                                            <label class="control-label">No Induk 編號</label>
                                                            <div class="controls">
                                                                <input type="text" name="noinduk" class="span7 popovers"  value="<?php echo $row->id_biodata; ?>"  readonly/>
                                                            </div>
                                                            </div>
                                                             
                                                             <div class="control-group ">
                                                            <label class="control-label">Nama 姓名</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama" class="span7 popovers"   value="<?php echo $row->namatki; ?>" readonly/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Kirim Bio KeTaiwan 履歷表給臺灣日期</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->kirimbio; ?>"  name="kirimbio" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <?php }?>

                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>
                                                       </div>
                                                    <div class="tab-pane" id="tab_3_2">
                                                       <?php echo form_open('Marketing/update_data_terbang/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                              <?php  foreach ($ambildatadisnaker as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                                                <label class="control-label">大開勞工網上報名 TGL PERKIRAAN ONLINE</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->tglonline; ?>" name="tglonline" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                             <div class="control-group">
                                                            <label class="control-label">勞工網上報名號碼 NO ID ONLINE</label>
                                                            <div class="controls">
                                                                <input type="text" name="noonline" value="<?php echo $row->nodisnaker; ?>" class="span7 popovers"  readonly/>
                                                            </div>
                                                            </div>
                                                             
                                                             <div class="control-group ">
                                                            <label class="control-label">護照號碼 NO PASPORT</label>
                                                            <div class="controls">
                                                                <input type="text" name="nopaspor" value="<?php echo $row->nopaspor; ?>" class="span7 popovers"  readonly/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">大開 入境 PERKIRAAN TERBANG</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->tanggalterbang; ?>" name="kiraterbang" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
     <?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>

                                                        </div>
                                                    <div class="tab-pane" id="tab_3_3">
                                                        
 <?php echo form_open('Marketing/update_data_majikan/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                              <?php  foreach ($ambildatamajikan as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                                                <label class="control-label">挑工 日期TGL TERPILIH</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->tglterpilih; ?>" name="tglterpilih" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">聘工表 JD</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->JD; ?>" name="tgljd" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">雇主要求入境 TGL DIMINTA TERBANG</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->tglterbang; ?>" name="tglterbang" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_4">
                                                        
 <?php echo form_open('Marketing/update_data_pk/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
  <?php  foreach ($ambildatapk as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                                       <div class="control-group">
                                                                <label class="control-label">受到日期 TGL TERIMA</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $row->pk; ?>" name="tglpk" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>
</div>
                                                        <div class="tab-pane" id="tab_3_5">
 <?php echo form_open('Marketing/update_data_suhan/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
  <?php  foreach ($ambilsuhan as $row2) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                        <div class="control-group ">
                                                            <label class="control-label">號碼 NO</label>
                                                            <div class="controls">
                                                                <input type="text" name="nosuhan" value="<?php echo $row2->no_suhan; ?>" class="span7 popovers"  readonly/>
                                                            </div>
                                                            </div>

                                                       <div class="control-group">
                                                                <label class="control-label">發行日期 TGL TERBIT</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglterbit" value="<?php echo $row2->tglterbit; ?>"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">到期 TGL EXP</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglexp" value="<?php echo $row2->tglexp; ?>"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">新受到日期 TGL TERIMA BARU</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglterima" value="<?php echo $row2->tglterima; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">之前受到日期保留在印尼 TGL TERIMA DULU DISIMPAN DI INDONESIA</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglsimpan" value="<?php echo $row2->tglsimpan; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">給工人帶回去臺灣-TGL DIBAWA TKI KE TAIWAN</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglbawa" value="<?php echo $row2->tglbawa; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">保留在印尼-TGL DIMINTA SIMPAN DI INDO</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglminta" value="<?php echo $row2->tglminta; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_6">
                                                        
 <?php echo form_open('Marketing/update_data_visapermit/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
  <?php  foreach ($ambilvisapermit as $visapermit) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                    <div class="control-group ">
                                                            <label class="control-label">號碼 NO</label>
                                                            <div class="controls">
                                                                <input type="text" name="novisapermit" value="<?php echo $visapermit->no_visapermit; ?>" class="span7 popovers"  readonly/>
                                                            </div>
                                                            </div>

                                                       <div class="control-group">
                                                                <label class="control-label">發行日期 TGL TERBIT</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglterbit" value="<?php echo $visapermit->tglterbit; ?>"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">到期 TGL EXP</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglexp" value="<?php echo $visapermit->tglexp; ?>"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">新受到日期 TGL TERIMA BARU</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglterima" value="<?php echo $visapermit->tglterima; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">之前受到日期保留在印尼 TGL TERIMA DULU DISIMPAN DI INDONESIA</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglsimpan" value="<?php echo $visapermit->tglsimpan; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">給工人帶回去臺灣-TGL DIBAWA TKI KE TAIWAN</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglbawa" value="<?php echo $visapermit->tglbawa; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">保留在印尼-TGL DIMINTA SIMPAN DI INDO</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly name="tglminta" value="<?php echo $visapermit->tglminta; ?>" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_7">
                                                        
 <?php echo form_open('Marketing/update_data_paspor/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                           <?php  foreach ($ambilpaspor as $paspor) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />                              <div class="control-group">
                                                                <label class="control-label">tgl exp 到期</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $paspor->expired; ?>" name="expired" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">送PENGAJUAN</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $paspor->rencana; ?>" name="rencana" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">受到 TERIMA</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $paspor->berlaku; ?>" name="berlaku" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_8">
                                                        
 <?php echo form_open('Marketing/update_data_skck/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambilskck as $skck) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />   
                                                       <div class="control-group">
                                                                <label class="control-label">送PENGAJUAN</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $skck->pengajuan; ?>" name="pengajuan" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">受到 TERIMA</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $skck->terima; ?>" name="terima" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">到期 TGL EXP</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $skck->tglexp; ?>" name="tglexp" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_9">
                                                        
 <?php echo form_open('Marketing/update_data_medical/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambilmedical as $medical) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />  
                                                       <div class="control-group">
                                                                <label class="control-label">日期 TGL</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $medical->tanggal; ?>" name="tanggal" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">到期 TGL EXP</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" readonly data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $medical->expired; ?>" name="expired" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar" ></i></span></div>
                                                                </div>
                                                            </div>

<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_10">
                                                        
 <?php echo form_open('Marketing/update_data_Marketing/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambilvisa as $visa) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                                                <label class="control-label">抽獎 KOCOKAN</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $visa->kocokan; ?>"name="kocokan" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">指纹 FINGER PRINT</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $visa->finger; ?>" name="finger" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">領 TERIMA</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $visa->terima; ?>" name="terima" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_11">
                                                        
 <?php echo form_open('Marketing/update_data_pap/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambildatapap as $pap) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                                                <label class="control-label">PAP 出發前簡報課 </label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $pap->pap; ?>" name="pap" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                          
<?php }?>
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_12">
                                                        
 <?php echo form_open('Marketing/update_data_bank/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambilbank as $bank) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                                                <label class="control-label">TD TANGAN BANK</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $bank->ttdbank; ?>" name="ttdbank" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
                                                             
                                                            <div class="control-group">
                                                                <label class="control-label">KTKLN</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $bank->ktkln; ?>" name="ktkln" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                           <?php }?>             

                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                          <div class="tab-pane" id="tab_3_13">
                                                        
 <?php echo form_open('Marketing/update_data_terbang2/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambilterbang2 as $terbang2) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                            <div class="control-group">
                                                            <label class="control-label">RUTE 班機</label>
                                                            <div class="controls">
                                                                <input type="text" name="noindukagen" value="<?php echo $terbang2->ruteterbang; ?>"  class="span7 popovers" readonly/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">TUJUAN 下機張</label>
                                                            <div class="controls">
                                                                <input type="text" name="noindukagen" value="<?php echo $terbang2->ruteterbang; ?>"  class="span7 popovers" readonly/>
                                                            </div>
                                                            </div>
 
                                                            <div class="control-group">
                                                                <label class="control-label">TGL 日期</label>
                                                                <div class="controls">
                                                                    <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" readonly value="<?php echo $terbang2->tanggalterbang; ?>" name="tanggalterbang" size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>
   <?php }?> 
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                

                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                          <div class="tab-pane" id="tab_3_14">
                                                        
 <?php echo form_open('Marketing/update_data_remark/', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                           <?php  foreach ($ambildataremark as $remark) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group ">
                                                            <label class="control-label span4">備註 REMARK</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="remark" rows="3" readonly><?php echo $remark->remark; ?></textarea>
                                                            </div>
                                                            </div>

   <?php }?> 
                                                             <div class="form-actions">
                                                <?php //echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10 visible-phone"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>