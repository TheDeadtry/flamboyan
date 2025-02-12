<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
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
                    <li class='active'>Detail Personal </li>
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
                                                <td class="span3"> Usaha majikan 雇主企業類型 :</td>
                                                <td> <?php echo $row->usahamajikan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Waktu kerja 願意工作時間 :</td>
                                                <td> <?php echo $row->waktukerja;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Kondisi kerja 工作意願 :</td>
                                                <td> <?php echo $row->kondisikerja;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Jenis Pekerjaan 工作類型 :</td>
                                                <td> <?php echo $row->jenispekerjaan;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> Lokasi Kerja  工作地點 :</td>
                                                <td> <?php echo $row->lokasikerja;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> Lembur 加班 :</td>
                                                <td> <?php echo $row->lembur;?> </td>
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

                </div>


          <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('tambahrequest/tambahrequestdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Usaha majikan 雇主企業類型 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="usahamajikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Pabrik 工廠" />Pabrik 工廠
                                                                        <option value="Tidak ada permintaan 不拘 " />Tidak ada permintaan 不拘
                                                                        <option value="Kebun buah/sayur 水果蔬菜元" />Kebun buah/sayur 水果蔬菜元
                                                                        <option value="Peternakan 牲畜" />Peternakan 牲畜
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Waktu kerja 願意工作時間</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="waktukerja" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
                                                                        <option value="Siang hari 白天 " />Siang hari 白天
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Kondisi kerja 工作意願</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kondisikerja" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Dalam ruang 室內" />Dalam ruang 室內
                                                                        <option value="Luar ruang 戶外 " />Luar ruang 戶外
                                                                        <option value="Lingkungan panas 在炎熱的工作環境" />Lingkungan panas 在炎熱的工作環境
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jenis Pekerjaan 工作類型</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jenispekerjaan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
                                                                        <option value="Las listrik 電焊" />Las listrik 電焊
                                                                        <option value="Mengendarai mobi l駕駛" />Mengendarai mobil 駕駛
                                                                        <option value="Mengendarai Forklift 駕駛叉車" />Mengendarai Forklift 駕駛叉車
                                                                        <option value="Produk rumah dari kayu 木家產品" />Produk rumah dari kayu 木家產品
                                                                        <option value="Memindahkan barang 起重/搬貨" />Memindahkan barang 起重/搬貨
                                                                        </select>
                                                                </div>
                                                            </div>



                                                            <div class="control-group">
                                                                <label class="control-label span4"> Lokasi Kerja  工作地點 </label>
                                                                <div class="controls">
                                                                    <select data-placeholder="Pilih Lokasi Kerja" name="lokasikerja[]" id="jenispekerjaan" class='select2 input-block-level' multiple="multiple" tabindex="6">
                                                                        <option value="" />
                                                                        <optgroup label="Penjelasan Lokasi">
                                                                            <?php  foreach ($tampil_data_lokasi as $pilihan) { ?>

                                                                                <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                                <?php
                                                                            }
                                                                                ?>

                                                                          </optgroup>
                                                                      
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label span4"> Lembur 加班</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="lembur" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Ada lembur 有加班" />Ada lembur 有加班
                                                                        <option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
                                                                        <option value="Min.lembur 50 jam /bulan 50 小時以上" />Min.lembur 50 jam /bulan 50 小時以上
                                                                        <option value="Min.lembur 80 jam /bulan 80 小時以上" />Min.lembur 80 jam /bulan 80 小時以上
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
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('tambahrequest/ubahrequestdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
  <?php foreach ($tampil_data_request as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Usaha majikan 雇主企業類型 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="usahamajikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->usahamajikan;?>" /><?php echo $row->usahamajikan;?>
                                                                        <option value="Pabrik 工廠" />Pabrik 工廠
                                                                        <option value="Tidak ada permintaan 不拘 " />Tidak ada permintaan 不拘
                                                                        <option value="Kebun buah/sayur 水果蔬菜元" />Kebun buah/sayur 水果蔬菜元
                                                                        <option value="Peternakan 牲畜" />Peternakan 牲畜
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Waktu kerja 願意工作時間</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="waktukerja" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->waktukerja;?>"  /><?php echo $row->waktukerja;?>
                                                                        <option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
                                                                        <option value="Siang hari 白天 " />Siang hari 白天
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Kondisi kerja 工作意願</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kondisikerja" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->kondisikerja;?>"  /><?php echo $row->kondisikerja;?>
                                                                        <option value="Dalam ruang 室內" />Dalam ruang 室內
                                                                        <option value="Luar ruang 戶外 " />Luar ruang 戶外
                                                                        <option value="Lingkungan panas 在炎熱的工作環境" />Lingkungan panas 在炎熱的工作環境
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jenis Pekerjaan 工作類型</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jenispekerjaan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->jenispekerjaan;?>"  /><?php echo $row->jenispekerjaan;?>
                                                                        <option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
                                                                        <option value="Las listrik 電焊" />Las listrik 電焊
                                                                        <option value="Mengendarai mobi l駕駛" />Mengendarai mobil 駕駛
                                                                        <option value="Mengendarai Forklift 駕駛叉車" />Mengendarai Forklift 駕駛叉車
                                                                        <option value="Produk rumah dari kayu 木家產品" />Produk rumah dari kayu 木家產品
                                                                        <option value="Memindahkan barang 起重/搬貨" />Memindahkan barang 起重/搬貨
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Lokasi Kerja  工作地點 </label>
                                                                <div class="controls">
                                                                    <select data-placeholder="Pilih Lokasi Kerja" name="lokasikerja[]" id="jenispekerjaan" class='select2 input-block-level' multiple="multiple" tabindex="6">
                                                                       <option value="<?php echo $row->lokasikerja;?>" selected /><?php echo $row->lokasikerja;?>
                                                                        <optgroup label="Penjelasan Lokasi">
                                                                            <?php  foreach ($tampil_data_lokasi as $pilihan) { ?>

                                                                                <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                                <?php
                                                                            }
                                                                                ?>

                                                                          </optgroup>
                                                                      
                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="control-group">
                                                                <label class="control-label span4"> Lembur 加班</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="lembur" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->lembur;?>"  /><?php echo $row->lembur;?>
                                                                        <option value="Ada lembur 有加班" />Ada lembur 有加班
                                                                        <option value="Tidak ada permintaan 不拘" />Tidak ada permintaan 不拘
                                                                        <option value="Min.lembur 50 jam /bulan 50 小時以上" />Min.lembur 50 jam /bulan 50 小時以上
                                                                        <option value="Min.lembur 80 jam /bulan 80 小時以上" />Min.lembur 80 jam /bulan 80 小時以上
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