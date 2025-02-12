<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail LEGALITAS dan NOTARISAN </span>
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
                    <li class='active'>Detail SKCK </li>
                </ul>
            </div>
        </div>
    </div>
</div>  



	                       

<div class="row-fluid">

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail legalitas</div>
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
  
                                    
            <?php 
            $fotoo = base_url()."assets/uploads/".$row->foto;
            $exif = exif_read_data($fotoo);
            if($exif && isset($exif['Orientation']))
            {
                $orien = $exif['Orientation'];
                if ($orien != 1)
                {
                    $img=imagecreatefromjpeg($fotoo);
                    $deg = 0;
                    switch ($orien)
                    {
                        case 3:
                        $deg = 180;
                        break;
                        case 6:
                        $deg = 270;
                        break;
                        case 8:
                        $deg = 90;
                        break;
                    }
                    if ($deg)
                    {
                        $img = imagerotate($img, $deg, 0);
                        echo '<div style="display: table;"><div style="padding: 50% 0;height: 0;"><a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.$fotoo.'" style="display: block;transform-origin: top left;-ms-transform:rotate(270deg) translate(-100%); -webkit-transform:rotate(270deg) translate(-100%); transform:rotate(270deg) translate(-100%); margin-top: -50%;white-space: nowrap;" /></a></div></div>';
                    }
                    else
                    {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                    }
                }
                else
                {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                }
            }
            else
            {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
            }
        ?>
                                     <?php 
                        $this->load->view('template/menuadministrasi');
                    ?>
                                </div>

                                <div class="span6">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>
                                       <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
             <div class='span6 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_legalitas'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'><b>Legalitas Dan Dokumen LAIN</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
            <div class='span6 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/detaillegalitas/printTanggalPengambilandocument/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'><b>Tanggal Pengambilan Dokumen Sebelum Terbang</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>
<?php   
                                  if($hitunglegalitas==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data  pada tombol ini... <br>

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Legalitas</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data  pada tombol ini... <br>
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Legalitas</a>
                        </div>
  <?php foreach ($tampil_data_legalitas as $pilihan) { ?>

                                  
                
                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal Legalitas :</td>
                                                <td> <?php echo $pilihan->tgl_legal; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Nama  :</td>
                                                <td> <?php echo $pilihan->nama_legal; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Hubungan  :</td>
                                                <td> <?php echo $pilihan->hub_legal; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Nomor Telpon  :</td>
                                                <td> <?php echo $pilihan->notelp; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Khusus  :</td>
                                                <td> <?php echo $pilihan->khusus_legal; ?></td>
                                            </tr>

                                           

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>


                            
                                   
                                     <?php }

                                 } ?>

                                 <?php   
                                  if($hitungnotarisan==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... 

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahnota' role='button'>Tambah NOTARISAN</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubahnota' role='button'>Ubah NOTARISAN</a>
                        </div>
  <?php foreach ($tampil_data_notarisan as $pilihan) { ?>

                                  
                
                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal Notarisan :</td>
                                                <td> <?php echo $pilihan->tgl_nota; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Nama  :</td>
                                                <td> <?php echo $pilihan->nama_nota; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Hubungan  :</td>
                                                <td> <?php echo $pilihan->hub_nota; ?></td>
                                            </tr>
                                              <tr>
                                                <td class="span3"> Nomor Telpon  :</td>
                                                <td> <?php echo $pilihan->notelp; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Khusus  :</td>
                                                <td> <?php echo $pilihan->khusus_nota; ?></td>
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
                    <h3>Tambah legalitas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detaillegalitas/tambahlegalitas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Legalitas </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tgllegalitas"  placeholder='Select datepicker' type='text' />
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
                                                            <label class="control-label">Nama Legalitas</label>
                                                            <div class="controls">
                                                                <input type="text" name="namalegal" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Hubungan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="hublegal" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_hubungan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nomor Telpon</label>
                                                            <div class="controls">
                                                                <input type="text" name="notelp" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Khusus</label>
                                                            <div class="controls">
                                                                <input type="text" name="khususlegal" class="span10 popovers"/>
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
                    <h3>Ubah Legalitas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detaillegalitas/ubahlegalitas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_legalitas as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

<div class="control-group">
                                                                <label class="control-label">Tanggal Legalitas </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tgllegalitas"  value="<?php echo $row->tgl_legal?>" placeholder='Select datepicker' type='text' />
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
                                                            <label class="control-label">Nama Legalitas</label>
                                                            <div class="controls">
                                                                <input type="text" name="namalegal"  value="<?php echo $row->nama_legal?>"class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Hubungan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="hublegal" data-placeholder="Choose a Category" tabindex="1">
                                                                       <option value="<?php echo $row->hub_legal;?>" /><?php echo $row->hub_legal;?>
                                                                        <?php  foreach ($tampil_data_hubungan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nomor Telpon</label>
                                                            <div class="controls">
                                                                <input type="text" name="notelp" value="<?php echo $row->notelp?>" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Khusus</label>
                                                            <div class="controls">
                                                                <input type="text" name="khususlegal"  value="<?php echo $row->khusus_legal?>"class="span10 popovers"/>
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

<div class='modal hide fade' id='tambahnota' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Notarisan</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detaillegalitas/tambahnotarisan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Notarisan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglnota"  placeholder='Select datepicker' type='text' />
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
                                                            <label class="control-label">Nama Notarisan</label>
                                                            <div class="controls">
                                                                <input type="text" name="namanota" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nomor Telpon</label>
                                                            <div class="controls">
                                                                <input type="text" name="notelp" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Hubungan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="hubnota" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_hubungan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Khusus</label>
                                                            <div class="controls">
                                                                <input type="text" name="khususnota" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                        
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>
<div class='modal hide fade' id='ubahnota' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Notarisan</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detaillegalitas/ubahnotarisan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_notarisan as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

<div class="control-group">
                                                                <label class="control-label">Tanggal Notarisan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglnota"  value="<?php echo $row->tgl_nota?>" placeholder='Select datepicker' type='text' />
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
                                                            <label class="control-label">Nama Legalitas</label>
                                                            <div class="controls">
                                                                <input type="text" name="namanota"  value="<?php echo $row->nama_nota?>"class="span10 popovers"/>
                                                            </div>
                                                            </div>

                                                           <div class="control-group">
                                                                <label class="control-label">Hubungan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="hubnota" data-placeholder="Choose a Category" tabindex="1">
                                                                       <option value="<?php echo $row->hub_nota;?>" /><?php echo $row->hub_nota;?>
                                                                        <?php  foreach ($tampil_data_hubungan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nomor Telpon</label>
                                                            <div class="controls">
                                                                <input type="text" name="notelp" value="<?php echo $row->notelp?>" class="span10 popovers"/>
                                                            </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label">Khusus</label>
                                                            <div class="controls">
                                                                <input type="text" name="khususnota"  value="<?php echo $row->khusus_nota?>"class="span10 popovers"/>
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
