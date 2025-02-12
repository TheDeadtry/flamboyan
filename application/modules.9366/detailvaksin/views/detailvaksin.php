<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Vaksin </span>
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
                    <li class='active'>Detail Vaksin </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


	                       

<div class="row-fluid">
    <div class="row-fluid">
        <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
            <div class='box-header blue-background'>
                <div class='title'>Profile</div>
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
                        $this->load->view('template/menudalam');
                    ?>
                                </div>

                                <div class="span6">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>
<?php   
                                  if($hitungrequest==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Family Belum di input.. silahkan menambahkan data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>
                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                        </div>
                                 <?php foreach ($tampil_data_request as $row) { ?>

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Nama Vaksin Pertama (Tanggal) :</td>
                                                <td> <?php echo $row->xnama1.' ('.$row->tgl1.')';?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Nama Vaksin Kedua (Tanggal) :</td>
                                                <td> <?php echo $row->xnama2.' ('.$row->tgl2.')';?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Nama Vaksin Ketiga (Tanggal) :</td>
                                                <td> <?php echo $row->xnama3.' ('.$row->tgl3.')';?> </td>
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

                            </div>
        </div>
    </div>

                </div>

                

        <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
            <div class='modal-header'>
                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                <h3>Form in modal</h3>
            </div>
            <div class='modal-body'>
                <form action="<?php echo site_url('detailvaksin/tambah');?>" method="post" class="form-horizontal" />

                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                    <div class="control-group">
                        <label class="control-label span4"> Nama Vaksin Pertama </label>
                        <div class="controls">
                            <select class="span7 " name="namavaksin1" data-placeholder="Choose a Category" tabindex="1">
                                <option value="" />Select...
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_vaksinlist; ?>" /><?php echo $pilihan->nama;?>
                                <?php } ?>
                                <option value=""/>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Tanggal Vaksin Pertama</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglvaksin1"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label span4"> Nama Vaksin Kedua </label>
                        <div class="controls">
                            <select class="span7 " name="namavaksin2" data-placeholder="Choose a Category" tabindex="1">
                                <option value="" />Select...
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_vaksinlist; ?>" /><?php echo $pilihan->nama;?>
                                <?php } ?>
                                <option value=""/>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Tanggal Vaksin Kedua</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglvaksin2"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label span4"> Nama Vaksin Ketiga </label>
                        <div class="controls">
                            <select class="span7 " name="namavaksin3" data-placeholder="Choose a Category" tabindex="1">
                                <option value="" />Select...
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_vaksinlist; ?>" /><?php echo $pilihan->nama;?>
                                <?php } ?>
                                <option value=""/>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Tanggal Vaksin Ketiga</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglvaksin3"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
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
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailvaksin/ubah');?>" method="post" class="form-horizontal" />
  <?php foreach ($tampil_data_request as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

<div class="control-group">
                        <label class="control-label span4"> Nama Vaksin Pertama </label>
                        <div class="controls">
                            <select class="span7 " name="namavaksin1" data-placeholder="Choose a Category" tabindex="1">
                                <option value="<?php echo $row->xid1;?>" selected /><?php echo $row->xnama1;?>
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_vaksinlist; ?>" /><?php echo $pilihan->nama;?>
                                <?php } ?>
                                <option value=""/>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Tanggal Vaksin Pertama</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglvaksin1"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tgl1; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label span4"> Nama Vaksin Kedua </label>
                        <div class="controls">
                            <select class="span7 " name="namavaksin2" data-placeholder="Choose a Category" tabindex="1">
                                <option value="<?php echo $row->xid2;?>" selected /><?php echo $row->xnama2;?>
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_vaksinlist; ?>" /><?php echo $pilihan->nama;?>
                                <?php } ?>
                                <option value=""/>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Tanggal Vaksin Kedua</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglvaksin2"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tgl2; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label span4"> Nama Vaksin Ketiga </label>
                        <div class="controls">
                            <select class="span7 " name="namavaksin3" data-placeholder="Choose a Category" tabindex="1">
                                <option value="<?php echo $row->xid3;?>" selected /><?php echo $row->xnama3;?>
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_vaksinlist; ?>" /><?php echo $pilihan->nama;?>
                                <?php } ?>
                                <option value=""/>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Tanggal Vaksin Ketiga</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglvaksin3"  placeholder='Select datepicker' type='text'  value="<?php echo  $row->tgl3; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
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