<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Asuransi </span>
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
                    <li class='active'>Detail Asuransi </li>
                </ul>
            </div>
        </div>
    </div>
</div> 
	                       

<div class="row-fluid">

                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Asuransi</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                            <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                     <?php 
                        $this->load->view('template/menuadministrasi');
                    ?>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>
<?php   
                             
                                  if($hitungasuransi==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data  pada tombol ini... <br>

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Asuransi pra</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data  pada tombol ini... <br>
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Asuransi pra</a>
                        </div>
  <?php foreach ($tampil_data_asuransi as $pilihan) { ?>

                                  
                
                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Nomor Asuransi :</td>
                                                <td> <?php echo $pilihan->noasuransi; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Nama Asuransi :</td>
                                                <td> <?php echo $pilihan->namaasuransi; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Asuransi  :</td>
                                                <td> <?php echo $pilihan->tglasuransi; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Jumlah Asuransi  :</td>
                                                <td> <?php echo $pilihan->jumlah; ?></td>
                                            </tr>

                                           

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>


                            
                                   
                                     <?php }

                                 }

                                   if($hitungasuransifull==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data  pada tombol ini... <br>

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahfull' role='button'>Tambah Asuransi Full</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data  pada tombol ini... <br>
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubahfull' role='button'>Ubah Asuransi Full</a>
                        </div>
  <?php foreach ($tampil_data_asuransifull as $pilihan) { ?>

                                  
                
                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Nomor Asuransi :</td>
                                                <td> <?php echo $pilihan->noasuransi; ?></td>
                                            </tr>
                                               <tr>
                                                <td class="span3"> Nama Asuransi :</td>
                                                <td> <?php echo $pilihan->namaasuransi; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Asuransi  :</td>
                                                <td> <?php echo $pilihan->tglasuransi; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Jumlah Asuransi  :</td>
                                                <td> <?php echo $pilihan->jumlah; ?></td>
                                            </tr>

                                           

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>


                            
                                   
                                     <?php }

                                 } ?>
                                </div>

                                <div class="space5"></div>


                            </div>
        </div>

                </div>


<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Pra Asuransi</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailasuransi/tambahasuransi');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                           <div class="control-group">
                                                            <label class="control-label">Nomor Asuransi</label>
                                                            <div class="controls">
                                                                <input type="text" name="noasuransi" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Nama Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaasuransi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_namaasuransi as $pilihan2) { ?>
                                                                        <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Asuransi </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglasuransi"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <!-- <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C' checked />
                                                                            Calculation
                                                                        </label> -->
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Jumlah Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlah" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_pil_asuransi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                        
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>


            <div class='modal hide fade' id='tambahfull' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Full Asuransi</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailasuransi/tambahasuransifull');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                           <div class="control-group">
                                                            <label class="control-label">Nomor Asuransi</label>
                                                            <div class="controls">
                                                                <input type="text" name="noasuransi" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Nama Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaasuransi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_namaasuransi as $pilihan2) { ?>
                                                                        <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Asuransi </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglasuransi"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <!-- <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C' checked />
                                                                            Calculation
                                                                        </label> -->
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label">Jumlah Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlah" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_pil_asuransi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                        
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>


<div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Asuransi</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailasuransi/ubahasuransi');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_asuransi as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

<div class="control-group">

      <div class="control-group">
                                                            <label class="control-label">Nomor Asuransi</label>
                                                            <div class="controls">
                                                                <input type="text" name="noasuransi"  value="<?php echo $row->noasuransi?>"class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Nama Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaasuransi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->namaasuransi?>" /><?php echo $row->namaasuransi?>
                                                                        <?php  foreach ($tampil_data_namaasuransi as $pilihan2) { ?>
                                                                        <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                                <label class="control-label">Tanggal Asuransi </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglasuransi"  value="<?php echo $row->tglasuransi?>" placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
<!--                                                                     <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C' checked />
                                                                            Calculation
                                                                        </label> -->
                                                                </div>
                                                            </div>

                                                         
                                                            <div class="control-group">
                                                                <label class="control-label">Jumlah Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlah" data-placeholder="Choose a Category" tabindex="1">
                                                                       <option value="<?php echo $row->jumlah;?>" /><?php echo $row->jumlah;?>
                                                                        <?php  foreach ($tampil_pil_asuransi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
<?php }?>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>

            <div class='modal hide fade' id='ubahfull' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah full Asuransi</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailasuransi/ubahasuransifull');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_asuransifull as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

<div class="control-group">

      <div class="control-group">
                                                            <label class="control-label">Nomor Asuransi</label>
                                                            <div class="controls">
                                                                <input type="text" name="noasuransi"  value="<?php echo $row->noasuransi?>"class="span10 popovers"/>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Nama Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaasuransi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->namaasuransi?>" /><?php echo $row->namaasuransi?>
                                                                        <?php  foreach ($tampil_data_namaasuransi as $pilihan2) { ?>
                                                                        <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                                <label class="control-label">Tanggal Asuransi </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglasuransi"  value="<?php echo $row->tglasuransi?>" placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
<!--                                                                     <label class='radio '>
                                                                            <input type='radio' name="pengajuana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="pengajuana" value='C' checked />
                                                                            Calculation
                                                                        </label> -->
                                                                </div>
                                                            </div>

                                                         
                                                            <div class="control-group">
                                                                <label class="control-label">Jumlah Asuransi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlah" data-placeholder="Choose a Category" tabindex="1">
                                                                       <option value="<?php echo $row->jumlah;?>" /><?php echo $row->jumlah;?>
                                                                        <?php  foreach ($tampil_pil_asuransi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
<?php }?>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>