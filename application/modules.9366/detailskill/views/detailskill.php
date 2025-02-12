<style type="text/css">
 
    .tampilkan-data {
        padding: 10px;
    }

    .tampilkan-data > div > li{
        list-style: none;
        display: block;
    }

    .tampilkan-data > div > li > span{
        position: relative;
        display: inline-block;
        margin: 5px;
        background: blue;
        color: white;
        border-radius: 3px;
        min-width: 300px;
    }

    .tampilkan-data > div > li > span > i{
        position: relative;
        display: inline-block;
        padding: 10px;
        background-color: #ddd;
        color: black;
    }

    .hide-menu{
        min-width: 50px;
        margin-left: 5px;
        visibility: hidden;
    }

</style>

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

            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Skill & Physical Condition</div>
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
                                  if($hitungskill==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Family Belum di input.. silahkan menambahkan data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>

                        </div>
                                 <?php
                                }else{ ?>
                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal'  href='#ubah' role='button'>Ubah Data</a>

                        </div>
                            <?php $operasi = ""; ?>
                            <?php $alergi = ""; ?>

                                 <?php foreach ($tampil_data_skill as $row) { ?>

                                  
                                    <?php $operasi .= $row->operasi; ?>
                                    <?php $alergi .= $row->alergi; ?>

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> 專長 Keterampilan :</td>
                                                <td> <?php echo htmlspecialchars($row->keterampilan);?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 嗜好 Hobby :</td>
                                                <td> <?php echo htmlspecialchars($row->hobi);?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 酒 Alkohol :</td>
                                                <td> <?php echo htmlspecialchars($row->alkohol);?> </td>
                                            </tr>
                                            <tr>
                                                <?php 
                                                    if($row->banyakrokok != NULL){
                                                        $merokoknya = htmlspecialchars($row->banyakrokok).' batang per hari';
                                                    }else{
                                                        $merokoknya = '';
                                                    }
                                                 ?>
                                                <td class="span2"> 煙 merokok :</td>
                                                <td> <?php echo htmlspecialchars($row->merokok).', '.htmlspecialchars($merokoknya);?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 飲食 food :</td>
                                                <td> <?php echo htmlspecialchars($row->food);?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span2"> 身體狀況 Kondisi Fisik</td> 
                                                 <td> </td>                                         
                                               </tr> 


                                             <tr>
                                                <td class="span2"> 過敏 alergi :</td>
                                                <td> <?php echo htmlspecialchars($row->alergi);?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span2"> 開刀 Operasi :</td>
                                                <td> <?php echo htmlspecialchars($row->operasi);?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 剌青 Tato :</td>
                                                <td> <?php echo htmlspecialchars($row->tato);?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 左撇子 tangan kidal :</td>
                                                <td> <?php echo htmlspecialchars($row->kidal);?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 能夠抱 Bisa mengangkat :</td>
                                                <td> <?php echo htmlspecialchars($row->angkat);?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 推升 Push up :</td>
                                                <td> <?php echo htmlspecialchars($row->pushup);?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 視力 penglihatan mata :</td>
                                                <td> <?php echo htmlspecialchars($row->peglihatan);?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 色盲 buta warna :</td>
                                                <td> <?php echo htmlspecialchars($row->butawarna);?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> Operasi Ket :</td>
                                                <td> <?php echo htmlspecialchars($row->operasiket);?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 慣用 Idiomatik (untuk Chongyi) :</td>
                                                <td> <?php echo htmlspecialchars($row->idiomatik);?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 視力 Penglihatan Mata (untuk Chongyi) :</td>
                                                <td> <?php echo htmlspecialchars($row->mata2);?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 左撇子 tangan basah (untuk Chongyi) :</td>
                                                <td> <?php echo htmlspecialchars($row->tanganbasahchongyi);?> </td>
                                            </tr>
                                            

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        <div class="data-alergi">
                                            <div class="ui-widget">
                                                   <label for="negara">Tambahkan Data Alergi</label>
                                                   <input id="dataAlergi" name="dataAlergi">
                                                   <button onclick="simpanalergi('<?= $detailpersonalid; ?>')" class="btn btn-primary">simpan data</button>
                                            </div>
                                            <div class="tampilkan-data">
                                               
                                            </div>
                                        </div>

                                        <div class="data-operasi">
                                            <div class="ui-widget">
                                                   <label for="negara">Tambahkan Data operasi</label>
                                                   <input id="dataoperasinama" name="dataoperasinama" placeholder="isikan tahun">
                                                   <input id="dataoperasiketerangan" name="dataoperasiketerangan" placeholder="isikan keterangan">
                                                   <button onclick="simpanoperasi('<?= $detailpersonalid; ?>')" class="btn btn-primary">simpan data</button>
                                            </div>
                                            <div class="tampilkan-data-operasi">
                                               <table class="table table-bordered table-hover tbl-operasi">
                                                    <thead>
                                                       <tr>
                                                           <th>No</th>
                                                           <th>tahun</th>
                                                           <th>keterangan</th>
                                                           <th>aksi</th>
                                                       </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                               </table>
                                            </div>
                                        </div>
                                   
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
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('tambahskill/tambahskilldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                          

                                                            <div class="control-group">
                                    <label class="control-label"> 專長 Keterampilan  </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Keterampilan" name="keterampilan[]" id="keterampilan" class='select2 input-block-level' multiple="multiple" tabindex="6">
                                            <option value="" />
                                            <optgroup label="Pilih Keterampilan">
                                                <?php  foreach ($tampil_data_keterampilan as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                                                        <div class="control-group">
                                    <label class="control-label"> 嗜好 Hobby </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih data" name="hobi[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                            <option value="" />
                                            <optgroup label="Pilih Hobi">
                                                <?php  foreach ($tampil_data_hobi as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="control-group">
                                                                <label class="control-label"> 酒 Alkohol (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alkohol" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <!-- lama
                                                                        <option value="不喝 tidak" />不喝 tidak
                                                                        <option value="偶爾 kadang " />偶爾 kadang 
                                                                        <option value="喝 ya" />喝 ya
                                                                        -->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        <option value="偶爾 kadang-kadang" />偶爾 kadang-kadang 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 煙 merokok (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="merokok" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <!--
                                                                        <option value="沒有 tidak" />沒有 tidak
                                                                        <option value="偶爾 kadang kadang " /> 偶爾 kadang kadang
                                                                        <option value="有抽煙 merokok" />有抽煙 merokok-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        <option value="偶爾 kadang-kadang" />偶爾 kadang-kadang
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group banyakrokok">
                                                                <label class="control-label">banyak rokok / hari</label>
                                                                <div class="controls">
                                                                    <input type="text" name="banyakrokok" placeholder="inputkan angka">
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 飲食 food</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="food" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="吃豬肉 makan daging babi" />吃豬肉 makan daging babi
                                                                        <option value="一般不吃豬肉 tidak makan daging babi" />一般不吃豬肉 tidak makan daging babi
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> 身體狀況 Kondisi Fisik </label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 過敏 alergi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alergi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 動手術 Pernah Operasi (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="operasi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...<!--
                                                                        <option value="Tidak Pernah 從不" />Tidak Pernah 從不
                                                                        <option value="Pernah 從過" />Pernah 從過-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="無 Tidak" />無 Tidak
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Ket Pernah Operasi (Wajib isi jika dipilih ada)</label>
                                                                <div class="controls">
                                                                    <input type="text" name="operasiket" />
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 剌青 Tato (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tato" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...<!--
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 左撇子 tangan kidal</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tangan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>
                                                               <div class="control-group">
                                                            <label class="control-label"> 能夠抱 Bisa mengangkat</label>
                                                            <div class="controls">
                                                                <input type="text" name="angkat" class="span3 popovers" data-trigger="hover" data-content="isi berdasarkan KG" data-original-title="MEngangkat Beban" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label"> 推升 Push up</label>
                                                            <div class="controls">
                                                                <input type="text" name="pushup" class="span3 popovers" data-trigger="hover" data-content="Isi pushup berapa kali" data-original-title="Jumlah Pushup" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 視力 penglihatan mata </label>
                                                                <div class="controls">
                                                                    <select class="span7 " id="mata" name="mata" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_mata as $pilihan) { ?>

                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                            <?php
                                                                        }
                                                                            ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="ukuranmata">
                                                            <label class="control-label">Ukuran mata</label>
                                                            <div class="controls">
                                                                 Kanan <input type="text" class="span2 popovers" data-trigger="hover" name="kanan" id="kanan" data-content="Ukuran Mata untuk Kanan" data-original-title="Mata Kanan" />
                                                                 Kiri  <input type="text" class="span2 popovers" data-trigger="hover" name="kiri"  id="kiri" data-content="Ukuran Mata untuk Kiri" data-original-title="Mata Kiri" />
                                                            </div>
                                                            </div>
                                                        
                                                        <div class="control-group">
                                                                <label class="control-label"> 色盲 buta warna (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="butawarna" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...<!--
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        <option value="一部分色盲 buta warna sebagian" />一部分色盲 buta warna sebagian
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> 慣用 Idiomatik (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="idiomatik" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="左手 Tangan Kiri " />左手 Tangan Kiri 
                                                                        <option value="右手 Tangan Kanan" />右手 Tangan Kanan
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> 視力 Penglihatan Mata (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="mata2" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="好 Baik" />好 Baik
                                                                        <option value="近視 Rabun Jauh" />近視 Rabun Jauh
                                                                        <option value="遠視 Rabun Dekat" />遠視 Rabun Dekat
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> 左撇子 tangan basah (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tanganbasahchongyi" data-placeholder="Choose a Category" tabindex="1">
                                                                        
                                                                        <option value="" />Select...
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="無 Tidak" />無 Tidak
                                                                    </select>
                                                                </div>
                                                            </div>



                                                            

<!-- 
                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailskill/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
                                                    -->         
                                                        
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
  <form action="<?php echo site_url('tambahskill/ubahskilldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_skill as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
    

                                    <div class="control-group">
                                    <label class="control-label"> 專長 Keterampilan  </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Keterampilan" name="keterampilan[]" id="keterampilan" class='select2 input-block-level' multiple="multiple" tabindex="6">
                                            
                                            <option value=" <?php echo $row->keterampilan;?>" selected/><?php echo $row->keterampilan;?>
                                            <optgroup label="Pilih Keterampilan">
                                                <?php  foreach ($tampil_data_keterampilan as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                                                        <div class="control-group">
                                    <label class="control-label"> 嗜好 Hobby </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih data" name="hobi[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                            <option value=" <?php echo $row->hobi;?>" selected/><?php echo $row->hobi;?>
                                            <optgroup label="Pilih Hobi">
                                                <?php  foreach ($tampil_data_hobi as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="control-group">
                                                                <label class="control-label"> 酒 Alkohol (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alkohol" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->alkohol;?>"  /><?php echo $row->alkohol;?>
                                                                        <!-- lama
                                                                        <option value="不喝 tidak" />不喝 tidak
                                                                        <option value="偶爾 kadang " />偶爾 kadang 
                                                                        <option value="喝 ya" />喝 ya
                                                                        -->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        <option value="偶爾 kadang-kadang" />偶爾 kadang-kadang 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 煙 merokok (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="merokok" data-placeholder="Choose a Category" tabindex="1">
                                                                        <!-- 
                                                                        <option value=" <?php echo $row->merokok;?>"  /> <?php echo $row->merokok;?>
                                                                        <option value="沒有 tidak" />沒有 tidak
                                                                        <option value="偶爾 kadang kadang " /> 偶爾 kadang kadang
                                                                        <option value="有抽煙 merokok" />有抽煙 merokok
                                                                         --><option value=" <?php echo $row->merokok;?>"  /> <?php echo $row->merokok;?>
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        <option value="偶爾 kadang-kadang" />偶爾 kadang-kadang
                                                                        <!--<?php $data_rokok = array("pilih", "沒有 tidak", "偶爾 kadang kadang ", "有抽煙 merokok")  ;  ?>
                                                                        <?php for($i=0; $i < count($data_rokok); $i++) : ?>
                                                                            <?php if($data_rokok[$i] == $row->merokok) : ?>
                                                                                <option selected="selected" value="<?= $data_rokok[$i] ?>"><?= $data_rokok[$i] ?></option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $data_rokok[$i] ?>"><?= $data_rokok[$i] ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>-->

                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group banyakrokok">
                                                                <label class="control-label">banyak rokok / hari</label>
                                                                <div class="controls">
                                                                    <input value="<?= $row->banyakrokok; ?>" type="text" name="banyakrokok" placeholder="inputkan angka">
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 飲食 food</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="food" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->food;?>"  /><?php echo $row->food;?>
                                                                        <option value="吃豬肉 makan daging babi" />吃豬肉 makan daging babi
                                                                        <option value="一般不吃豬肉 tidak makan daging babi" />一般不吃豬肉 tidak makan daging babi
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> 身體狀況 Kondisi Fisik </label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 過敏 alergi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alergi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->alergi;?>"  /><?php echo $row->alergi;?>
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 動手術 Pernah Operasi (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="operasi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->operasi;?>"  /><?php echo $row->operasi;?><!--
                                                                        <option value="Tidak Pernah 從不" />Tidak Pernah 從不
                                                                        <option value="Pernah 從過" />Pernah 從過-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="無 Tidak" />無 Tidak
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Ket Pernah Operasi (Wajib isi jika dipilih ada)</label>
                                                                <div class="controls">
                                                                    <input type="text" name="operasiket" value="<?php echo $row->operasiket ?>" />
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 剌青 Tato (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tato" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->tato;?>"  /><?php echo $row->tato;?><!--
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 左撇子 tangan kidal</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tangan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->kidal;?>"  /> <?php echo $row->kidal;?>
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>
<!--
                                                            <div class="control-group">
                                                                <label class="control-label"> 左撇子 tangan basah</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tanganbasah" data-placeholder="Choose a Category" tabindex="1">
                                                                      <?php $condisiya = array('pilih', 'Ya 是', 'Tidak 沒有'); ?>
                                                                      <?php if (isset($row->tanganbasah)) {
                                                                          $selected = $row->tanganbasah;
                                                                      }else{
                                                                            $selected = 0;
                                                                      } ?>
                                                                        <?php for($i=0; $i<3; $i++) : ?>
                                                                            <?php if($i == $selected) : ?>
                                                                                <option selected="selected" value="<?= $i;?>"  /> <?php echo $condisiya[$i];?>
                                                                            <?php else : ?>
                                                                                <option value="<?= $i;?>"  /> <?php echo $condisiya[$i];?>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                        </select>
                                                                </div>
                                                            </div>-->

                                                               <div class="control-group">
                                                            <label class="control-label"> 能夠抱 Bisa mengangkat</label>
                                                            <div class="controls">
                                                                <input type="text" name="angkat" value=" <?php echo $row->angkat;?>" class="span3 popovers" data-trigger="hover" data-content="isi berdasarkan KG" data-original-title="MEngangkat Beban" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label"> 推升 Push up</label>
                                                            <div class="controls">
                                                                <input type="text" name="pushup" value=" <?php echo $row->pushup;?>" class="span3 popovers" data-trigger="hover" data-content="Isi pushup berapa kali" data-original-title="Jumlah Pushup" />
                                                            </div>
                                                            </div>



                                                            <div class="control-group" id="ukuranmata">
                                                            <label class="control-label">視力 penglihatan mata</label>
                                                            <div class="controls">
                                                                 <input type="text" class="span8 popovers" value=" <?php echo $row->peglihatan;?>"  data-trigger="hover" name="mata" id="kanan" data-content="Ukuran Mata untuk Kanan" data-original-title="Mata Kanan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="ukuranmata">
                                                            <label class="control-label">Banyak Rabun</label>
                                                            <div class="controls">
                                                                 <input type="text" class="span8 popovers" value="<?= $row->banyakrabun; ?>" placeholder="isi jika rabun" data-trigger="hover" name="banyakrabun" id="kanan" data-content="Ukuran Mata untuk Kanan" data-original-title="Mata Kanan" />
                                                            </div>
                                                            </div>

                                                        <div class="control-group">
                                                                <label class="control-label"> 色盲 buta warna (untuk Chongyi)</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="butawarna" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->butawarna;?>"  /> <?php echo $row->butawarna;?><!--
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是-->
                                                                        <option value="有 Ada" />有 Ada 
                                                                        <option value="沒有 Tidak Ada" />沒有 Tidak Ada
                                                                        <option value="一部分色盲 buta warna sebagian" />一部分色盲 buta warna sebagian
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> 慣用 Idiomatik (untuk Chongyi)</label>
                                                            <div class="controls">
                                                                <select class="span7 " name="idiomatik" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value=" <?php echo $row->idiomatik;?>"  /> <?php echo $row->idiomatik;?>
                                                                    <option value="左手 Tangan Kiri " />左手 Tangan Kiri 
                                                                    <option value="右手 Tangan Kanan" />右手 Tangan Kanan
                                                                    </select>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label"> 視力 Penglihatan Mata (untuk Chongyi)</label>
                                                            <div class="controls">
                                                                <select class="span7 " name="mata2" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value=" <?php echo $row->mata2;?>"  /> <?php echo $row->mata2;?>
                                                                    <option value="好 Baik" />好 Baik
                                                                    <option value="近視 Rabun Jauh" />近視 Rabun Jauh
                                                                    <option value="遠視 Rabun Dekat" />遠視 Rabun Dekat
                                                                    </select>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label"> 左撇子 tangan basah (untuk Chongyi)</label>
                                                            <div class="controls">
                                                                <select class="span7 " name="tanganbasahchongyi" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value=" <?php echo $row->tanganbasahchongyi;?>"  /> <?php echo $row->tanganbasahchongyi;?>
                                                                    <option value="有 Ada" />有 Ada 
                                                                    <option value="無 Tidak" />無 Tidak
                                                                </select>
                                                            </div>
                                                            </div>


                                                            

 <?php } ?>
                                     
                                                      
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                  </form>

            </div>


            



<script type="text/javascript">

    $(document).ready(function(){
        tampilpilihanalergi();
        tampilkandataalergi();
        tampilkandataoperasi();
        showingoperasimenu();
        showdataalergi();

       
    });


    function simpanoperasi(key){
        var datatahun = $("input[name='dataoperasinama']").val();
        var dataeterangan = $("input[name='dataoperasiketerangan']").val();
        $.ajax({
            url: "<?= site_url(); ?>/detailskill/simpandataoperasi/"+key,
            method: "POST",
            dataType: "text",
            data: {
                datatahun: datatahun,
                dataketerangan: dataeterangan
            },success: function(response){
                tampilkandataoperasi();
            }
        });
    }


    function showingoperasimenu(){
        var operasi = "<?= $operasi; ?>";
        if (operasi == 'Pernah 從過') {
            $(".data-operasi").css({"visibility":"visible"});
        }else{
            $(".data-operasi").css({"visibility":"hidden"});
        }

    }



 function showdataalergi(){
        var alergi = "<?= $alergi; ?>";
        if (alergi == 'Ya 是') {
            $(".data-alergi").css({"display":"block"});
        }else{
            $(".data-alergi").css({"display":"none"});
        }
    }



   

    function tampilkandataalergi(){
        $.ajax({
            url: "<?= site_url() ?>/detailskill/tampildataalergi/<?= $detailpersonalid; ?>",
            success:function(response){
                $(".tampilkan-data").html(response);
            }
        });
    }

    function tampilkandataoperasi(){
        $.ajax({
            url: "<?= site_url(); ?>/detailskill/tampilkandataoperasi/<?= $detailpersonalid; ?>",
            success: function(response){
                $(".tbl-operasi tbody").html(response);
            }
        })
    }


    function showingmenu(key){
        var menu = ".hide-menu"+key;
        $(menu).css({"visibility":"visible"});
    }

    function hidingmenu(key){
        var menu = ".hide-menu"+key;
        $(menu).css({"visibility":"hidden"});   
    }


    function tampilpilihanalergi(){

    }

    $("input[name='dataAlergi']").keyup(function(){
        $.ajax({
            url: "<?= site_url() ?>/detailskill/ambildataalergi/",
            success:function(response){
                var ary = JSON.parse(response);
                $("#dataAlergi").autocomplete({
                    source: ary
                });
            }
        });

    });


    $("input[name='dataoperasinama']").keyup(function(){
        $.ajax({
            url: "<?= site_url() ?>/detailskill/ambildatatahunoperasi/",
            success:function(response){
                var ary = JSON.parse(response);
                $("#dataoperasinama").autocomplete({
                    source: ary
                });
            }
        });

    });

    $("input[name='dataoperasiketerangan']").keyup(function(){
        $.ajax({
            url: "<?= site_url() ?>/detailskill/ambildataketeranganoperasi/",
            success:function(response){
                var ary = JSON.parse(response);
                $("#dataoperasiketerangan").autocomplete({
                    source: ary
                });
            }
        });

    });



    function hapusoperasidata(key){
        $.ajax({
            url: "<?= site_url(); ?>/detailskill/hapusdataoperasi/"+key,
            success: function(response){
                tampilkandataoperasi();
            }
        })
    }

    function hapusdataalergi(key){
        $.ajax({
            url: "<?= site_url(); ?>/detailskill/hapusdataalergi/"+key,
            success:function(datasaya){
                tampilkandataalergi();
            }
        });
    }


    $("select[name='merokok']").change(function(){
        var nilai = $(this).val();
        if (nilai == '偶爾 kadang kadang ' || nilai == '有抽煙 merokok') {
            $(".banyakrokok").css({"display":"block"});
        }else{
            $(".banyakrokok").css({"display":"none"});
            $("input[name='banyakrokok']").attr("value", "");
        }
    });

    $("input[name='banyakrabun']").click(function(){
        $(this).removeAttr("value");
    });

    function simpanalergi(key){
        var iddata = key;
        var data = $("input[name='dataAlergi'").val();
        $.ajax({
            url: "<?= site_url(); ?>/detailskill/simpanalergi",
            method: "POST",
            dataType: "text",
            data: {
                idnya : iddata,
                datakirim: data   
            }, success:function(response){
               tampilkandataalergi();
            }
        })
    }

                                          


</script>