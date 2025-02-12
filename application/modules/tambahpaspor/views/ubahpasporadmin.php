<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Paspor </span>
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
                    <li class='active'>Ubah Paspor </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

	                        

<div class="row-fluid">



 <div class="span8">
                                <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Paspor History</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>

<form action="<?php echo site_url('tambahpaspor/ubahpaspordata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_paspor as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

                                                             <div class="control-group">
                                                                <label class="control-label span4"> PASPORT  護照 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="paspor" id="paspor" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->keterangan;?>" /><?php echo $row->keterangan;?>
                                                                        <option value="sudah" />Sudah
                                                                        <option value="belum" />Belum
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="nomorpaspor" >
                                                            <label class="control-label span4">Nomor Paspor</label>
                                                            <div class="controls">
                                                                <input type="text" name="nomorpaspor" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Paspor yang di gunakan " data-original-title="Nama Paspor" value="<?php echo $row->nopaspor;?>"/>
                                                            </div>

                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Terbit Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitpas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Tempat Terbit Passpor</label>
                                                            <div class="controls">
                                                                <input type="text" name="office"  class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="<?php echo $row->office;?>"/>
                                                            </div>
                                                            </div>

                                                            

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Pengajuan Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglpengajuanpas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglpengajuan;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                         
                                                                         <?php if($row->statuspengajuan=="A"){ ?>
                                                                        <label class='radio '>
                                                                         <input type='radio' name="ajua" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ajua" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                                        <?php } else{?>
                                                                            <label class='radio '>
                                                                         <input type='radio' name="ajua" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ajua" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                            <?php }?>
       
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="rencana">
                                                                <label class="control-label span4">Tanggal Foto (in) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglfotopas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglfoto;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                            <?php if($row->statusfoto=="A"){ ?>
                                                                        <label class='radio '>
                                                                         <input type='radio' name="fotoa" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fotoa" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                                        <?php } else{?>
                                                                            <label class='radio '>
                                                                         <input type='radio' name="fotoa" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fotoa" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                            <?php }?>
       

                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="rencana">
                                                                <label class="control-label span4">Tanggal terima buku</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="trimabuku"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                             <?php if($row->statusterima=="A"){ ?>
                                                                        <label class='radio '>
                                                                         <input type='radio' name="trima" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="trima" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                                        <?php } else{?>
                                                                            <label class='radio '>
                                                                         <input type='radio' name="trima" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="trima" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                            <?php }?>
       

                                                                </div>
                                                            </div>
       <?php }?>

															<div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
															
														</form>

     							 </div>
                            </div>
                        </div>

                        </div>


