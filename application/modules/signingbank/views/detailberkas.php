<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Info Berkas </span>
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
                    <li class='active'>Detail Info Berkas </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="row-fluid">

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Info Berkas</div>
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
<?php   
                                  if($hitungberkas==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data  pada tombol ini... <br>

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Info Berkas</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data  pada tombol ini... <br>
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Info Berkas</a>
                        </div>
  <?php foreach ($tampil_data_berkas as $pilihan) { ?>


                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal Info :</td>
                                                <td> <?php echo $pilihan->info_berkas; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Tanggal Dokument Disiapkan :</td>
                                                <td> <?php echo $pilihan->tgl_dok_siap; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Hp TKI  :</td>
                                                <td> <?php echo $pilihan->hptki_berkas; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Nama Pengambil  :</td>
                                                <td> <?php echo $pilihan->nama_ambil_berkas; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Hubungan Pengambil  :</td>
                                                <td> <?php echo $pilihan->nama_hub_berkas; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> No Telp Pengambil  :</td>
                                                <td> <?php echo $pilihan->nama_hp_berkas; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Info Penerima :</td>
                                                <td> <?php echo $pilihan->nama_terima_berkas; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Rak Berkas :</td>
                                                <td> <?php echo $pilihan->rak_berkas; ?></td>
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
                                  if($hitungambilberkas==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data  pada tombol ini... <br>

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahambil' role='button'>Tambah Ambil Berkas</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data  pada tombol ini... <br>
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubahambil' role='button'>Ubah Ambil Berkas</a>
                        </div>
  <?php foreach ($tampil_data_ambilberkas as $pilihan) { ?>


                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal Menyerahkan :</td>
                                                <td> <?php echo $pilihan->tgl_ambil_dok; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Dokument Diserahkan :</td>
                                                <td> <?php echo $pilihan->dokdiserahkan; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Nama Penerima :</td>
                                                <td> <?php echo $pilihan->nama_ambil_dok; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Hubungan Penerima  :</td>
                                                <td> <?php echo $pilihan->hub_ambil_dok; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> No Telp Penerima  :</td>
                                                <td> <?php echo $pilihan->tel_ambil_dok; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Nama Penyerah  :</td>
                                                <td> <?php echo $pilihan->nama_serah_dok; ?></td>
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

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
            <div class='modal-header'>
                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                <h3>Tambah Info Berkas</h3>
            </div>
            <div class='modal-body'>
              <form action="<?php echo site_url('signingbank/tambahberkas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

              <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
              <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
              
              <div class="control-group">
                <label class="control-label">Tanggal Info </label>
                <div class="controls">
                  <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='yyyy.MM.dd' name="info_berkas"  placeholder='Select datepicker' type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                  </div>
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Tanggal Dokument disiapkan </label>
                <div class="controls">
                  <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_dok_siap"  placeholder='Select datepicker' type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                  </div>
                </div>
              </div>  
              <div class="control-group">
                <label class="control-label">Pilih Rak Berkas</label>
                <div class="controls">
                  <select name="rak_berkas" id="rak_berkas">
                   <option value="">-- pilih rak --</option>
                   <option value="rak 1">rak 1</option>
                   <option value="rak 2">rak 2</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">HP TKI</label>
                <div class="controls">
                  <input type="text" class=" popovers" name="hptki_berkas"data-trigger="hover" data-content="" data-original-title="Agen" />
                  </div>
              </div>     
              <div class="control-group">
              <label class="control-label">Nama Pengambil</label>
                <div class="controls">
                  <input type="text" class=" popovers" name="nama_ambil_berkas" data-trigger="hover" data-content="" data-original-title="Agen" />
                  </div>
              </div> 
              <div class="control-group">
              <label class="control-label">Hubungan Pengambil</label>
                <div class="controls">
                  <input type="text" class=" popovers" name="nama_hub_berkas" data-trigger="hover" data-content="" data-original-title="Agen" />
                  </div>
              </div>      
                <div class="control-group">
              <label class="control-label">HP Pengambil</label>
                <div class="controls">
                  <input type="text" class=" popovers" name="nama_hp_berkas" data-trigger="hover" data-content="" data-original-title="Agen" />
                  </div>
              </div>   
                <div class="control-group">
              <label class="control-label">Info Penerima </label>
                <div class="controls">
                  <input type="text" class=" popovers" name="nama_terima_berkas" data-trigger="hover" data-content="" data-original-title="Agen" />
                  </div>
              </div>     



                                                        
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>


<div class='modal hide fade' id='tambahambil' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Ambil Berkas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('signingbank/tambahambil');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


 <div class="control-group">
            <label class="control-label">Tgl Menyerahkan</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_ambil_dok" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>
                            <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                            <div class="control-group">
                              <label class="control-label">Dokumen yang diserahkan</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="dokdiserahkan" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>       
                            <div class="control-group">
                            <label class="control-label">Nama Penerima</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_ambil_dok" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div> 
                            <div class="control-group">
                            <label class="control-label">Hubungan Penerima</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="hub_ambil_dok" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>      
                             <div class="control-group">
                            <label class="control-label">HP Penerima</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="tel_ambil_dok" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>   
                             <div class="control-group">
                            <label class="control-label">Nama Penyerah</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_serah_dok" data-trigger="hover" data-content="" data-original-title="Agen" />
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
                    <h3>Ubah Info Berkas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('signingbank/ubahberkas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_berkas as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
<div class="control-group">
            <label class="control-label">Tanggal Info </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="info_berkas"  value="<?php echo $row->info_berkas;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

          <div class="control-group">
                <label class="control-label">Tanggal Dokument disiapkan </label>
                <div class="controls">
                  <div class='datepicker input-append' id='datepicker'>
                    <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_dok_siap" value="<?php echo $row->tgl_dok_siap;?>"  placeholder='Select datepicker' type='text' />
                    <span class='add-on'>
                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                    </span>
                  </div>
                </div>
              </div>

              <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">

              <div class="control-group">
                <label class="control-label">Pilih Rak Berkas</label>
                <div class="controls">
                  <select name="rak_berkas" id="rak_berkas">
                   <?php if($row->rak_berkas != "" || $row->rak_berkas != NULL) : ?>
                   <option value="<?= $row->rak_berkas; ?>"><?= $row->rak_berkas; ?></option>
                   <?php endif; ?>
                   <option value="">-- pilih rak --</option>
                   <option value="rak 1">rak 1</option>
                   <option value="rak 2">rak 2</option>
                  </select>
                </div>
              </div>


                            <div class="control-group">
                            <label class="control-label">HP TKI</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="hptki_berkas" value="<?php echo $row->hptki_berkas;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>     
                            <div class="control-group">
                            <label class="control-label">Nama Pengambil</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_ambil_berkas" value="<?php echo $row->nama_ambil_berkas;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div> 
                            <div class="control-group">
                            <label class="control-label">Hubungan Pengambil</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_hub_berkas" value="<?php echo $row->nama_hub_berkas;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>      
                             <div class="control-group">
                            <label class="control-label">HP Pengambil</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_hp_berkas" value="<?php echo $row->nama_hp_berkas;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>   
                             <div class="control-group">
                            <label class="control-label">Penerima Info</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_terima_berkas" value="<?php echo $row->nama_terima_berkas;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
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

                        <div class='modal hide fade' id='ubahambil' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Ambil Berkas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('signingbank/ubahambil');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_ambilberkas as $row) { ?>
 <div class="control-group">
            <label class="control-label">Tgl Menyerahkan</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_ambil_dok"  value="<?php echo $row->tgl_ambil_dok;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>      
                            <input type="hidden" name="id_biodata" value="<?= $detailpersonalid; ?>">
                            <div class="control-group">
                              <label class="control-label">Dokumen yang diserahkan</label>
                              <div class="controls">
                                  <input type="text" class=" popovers" name="dokdiserahkan" value="<?php echo $row->dokdiserahkan;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                              </div>
                            </div>

                            <div class="control-group">
                            <label class="control-label">Nama Penerima</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_ambil_dok" value="<?php echo $row->nama_ambil_dok;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div> 
                            <div class="control-group">
                            <label class="control-label">Hubungan Penerima</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="hub_ambil_dok" value="<?php echo $row->hub_ambil_dok;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>      
                             <div class="control-group">
                            <label class="control-label">HP Penerima</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="tel_ambil_dok" value="<?php echo $row->tel_ambil_dok;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>   
                             <div class="control-group">
                            <label class="control-label">Nama Penyerah</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_serah_dok" value="<?php echo $row->nama_serah_dok;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
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