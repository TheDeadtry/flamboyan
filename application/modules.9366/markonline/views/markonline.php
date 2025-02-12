
                                        <?php if($keterangan == 'dokrumah') { ?>
                                        <div class='row-fluid'>
                                            <div class='span12'>
                                                <div class='page-header'>
                                                    <h1 class='pull-left'>
                                                        <i class='icon-star'></i>
                                                        <span> DOkumen Rumah </span>
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
                                                            <li class='active'> DOkumen Rumah </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
<div class="row-fluid">
                                            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                                                <div class='box-header blue-background'>
                                                <div class='title'>Dokumen Online</div>
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
                                                <div class="span9">
                                       <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>    
                        <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
           <div class='span4 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_ktp'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'><b>KARTU TANDA PENDUDUK (KTP)</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div>
                </a>
            </div>
             <div class='span4 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_kk'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'><b>KARTU KELUARGA</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div>                    
                </a>
            </div>
<div class='span4 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_aktelahir'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'><b>Akte Kelahiran</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>

  <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
           <div class='span4 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_ijasah'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'><b>Ijasah/Keterangan Sekolah</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
              <div class='span4 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_suratnikah'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'><b>Surat Nikah atau Cerai</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
 <div class='span4 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_skck'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'><b>SKCK</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>

                        <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span4 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_suratijinkeluarga'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'><b>Surat Ijin Keluarga</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
            <div class='span4 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_pasporbaru'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'><b>Paspor Baru</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
            <div class='span4 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_pasporlama'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'><b>Paspor Lama</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>

                        <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span4 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_perjanjianpenempatan'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'><b>Perjanjian Penempatan</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
             <div class='span4 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_legalitas'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'><b>Legalitas Dan Dokumen LAIN</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>


                                                </div>
                                                </div>
                                                  </div>
                                                  </div>
                                                <?php }?>
   <?php }?>
<?php if($keterangan == 'doksurat') { ?>
                                        <div class='row-fluid'>
                                            <div class='span12'>
                                                <div class='page-header'>
                                                    <h1 class='pull-left'>
                                                        <i class='icon-star'></i>
                                                        <span> DOkumen Surat Kehilangan </span>
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
                                                            <li class='active'> DOkumen  Surat Kehilangan </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row-fluid">
                                            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                                                <div class='box-header blue-background'>
                                                <div class='title'>Dokumen Online</div>
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
                                                <div class="span9">
                                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>

                        <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>

             <div class='span4 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_kehilanganpaspor'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'><b>Surat Kehilangan</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>

        </div>
    </div>
</div>
                                             </div>
                                                </div>
                                                  </div>
                                                  </div>
<?php }?>
<?php }?>
                                      