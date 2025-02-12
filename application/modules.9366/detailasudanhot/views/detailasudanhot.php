
<style type="text/css">
    #satu{
        display: block;
        width: 95%;
        padding: 5px;
    }


    .modal-body label, .modal-body > input{
    padding: 15px;
    display: inline-block;
    font-size: 16px;
    }

    .inline-block{
    width: auto;
    min-width: 100px;
    display: inline-block;
    margin: 10px;
    }

    .menu-apendik a{
    min-width: 150px;
    margin: 10px;
    }


    .modal-gugus{
        position: absolute;
        position: fixed;
        display: none;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0,0,0,0.5);
        text-align: center;
    }

    .modal-pages{
        position: relative;
        display: inline-block;
        background-color: transparent;
        top: 10%;
        width: 600px;
        height: auto;
    }

    .card{
        width: 100%;
        margin: 0;
        padding: 0;
        background-color: white;
        border-radius: 3px;
        text-align: left;
    }

    .card-header,
    .card-body,
    .card-footer
    {
        width: calc(100% - 20px);
        padding: 10px;
    }

    .card-header
    {
        font-size: 25px;
        font-weight: bold;
        background-color: #aaaaFa;
        color: white;
    }

    .card-body{
        max-height: 480px;
        overflow-y: scroll;
    }

</style>

<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Dok. Asuransi dan Hotel </span>
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
                    <li class='active'>Marketing: Keterangan, DOK Asuransi, Hotel, Terbang </li>
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
                                                 <div class='span4 box-quick-link green-background'>
                                                     <a class="modal-aksi" target="modal-pk">
                                                         <div class='header'>
                                                             <div class='icon-book'></div>
                                                         </div>
                                                         <div class='content'><b>TGL PK KE TAIWAN</b></div>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

<?php
                                  if($hitungrequest==0){
                                ?>
<div class="alert alert-info">

                        <button data-dismiss="alert" class="close"> x </button> Data Belum di input.. silahkan menambahkan data pada tombol ini...
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
                                                <td class="span3"> Keterangan :</td>
                                                <td> <?php echo $row->pket;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan :</td>
                                                <td> <?php echo $row->detailberangkat1;echo " : ".$row->jamtiba;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Tanggal Tiba di Taiwan :</td>
                                                <td> <?php echo $row->tanggalterbang;

                                                        $hasil= $row->statustgl;
                                                        if($hasil=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan :</td>
                                                <td> <?php echo $row->detailberangkat1;echo " : ".$row->jamtiba;?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan Lanjutan:</td>
                                                <td> <?php

                                                if($row->detailberangkat2==""){

                                                }else{
                                                    echo $row->detailberangkat2;echo " : ".$row->jamtiba;
                                                }?>
                                                </td>
                                            </tr>


                                              <tr>
                                                <td class="span3"> Tiket:</td>
                                                <td> <?php
                                                 $hasil3= $row->tiket;
                                                        if($hasil3=='wl'){
                                                            echo " (候補 - Waiting List)";
                                                        }
                                                        if($hasil3=='issued'){
                                                            echo " (開票 - ISSUED)";
                                                        }
                                                        if($hasil3=='ok'){
                                                            echo " (可以 - OK)";
                                                        }
                                                        ?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span3"> Tanggal Terbang :</td>
                                                <td> <?php echo $row->tglberangkat;

                                                        $hasil2= $row->statusterbang;
                                                        if($hasil2=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>

                                             <tr>
                                                <td class="span3"> Airport Saat Kembali :</td>
                                                <td> <?php echo $row->airport;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> No HP Taiwan :</td>
                                                <td> <?php echo $row->adh_nohp;?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Line ID :</td>
                                                <td> <?php echo $row->adh_line;?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Email :</td>
                                                <td> <?php echo $row->adh_email;?></td>
                                            </tr>

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> DOK ASURANSI</td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> - Ke Taiwan :</td>
                                                <td> <?php echo $row->dakt;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> - Ke Indo :</td>
                                                <td> <?php echo $row->daki;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> - TKI TD TGN</td>
                                                <td> <?php echo $row->dattt;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> DOK AJU HOTEL TAIWAN</td>
                                                <td> <?php echo $row->aju_ht;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> HOTEL</td>
                                                <td> <?php echo $row->kodehotel.' '.$row->namahotel;?> </td>
                                            </tr>
                                        </tbody>
                                    </table>




                                     <?php }

                                 } ?>

                                </div>

                                <div class='span3 box box-transparent'>
                                            <br>
                                            <br>
                                            <br>

                      <h4>PRINT DOKUMEN </h4>
                                    <div class='row-fluid'>
                                        <div class=' box-quick-link blue-background'>
                                            <a target='_blank' href='<?php echo site_url().'/pdf7/cetakbaru/'.$detailpersonalid; ?>'>
                                                <div class='header'>
                                                    <div class='icon-book'></div>
                                                </div>
                                                <div class='content'>DL010. List Terbang</div>
                                            </a>
                                        </div>
                                        </br>
                                    </div>
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
                <form action="<?php echo site_url('detailasudanhot/tambah');?>" method="post" class="form-horizontal" />

                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                    <div class="control-group">
                         <label class="control-label">Keterangan </label>
                        <div class="controls">
                            <input class='span12'  name="keterangan"  placeholder='Isi Keterangan Progress' type='text' />
                        </div>
                    </div>

                    <div class="control-group">
                                                                <label class="control-label">Tanggal Tiba di Taiwan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tanggalterbang"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->detailberangkat1;echo " : ".$pilihan->detailberangkat2;echo " : ".$pilihan->jamtiba;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>

                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Tiket </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiket" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="wl" />候補 - WL
                                                                            <option value="issued" />開票-ISSUED
                                                                            <option value="ok" />可以 - OK
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terbang </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberangkat"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Airport Saat Kembali</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="airport" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_dataairport as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>

                                                                </div>
                                                            </div>

                    <div class="control-group">
                         <label class="control-label">No HP Taiwan </label>
                        <div class="controls">
                            <input class='span12'  name="adh_nohp"  placeholder='Isi No HP Taiwan' type='text' />
                        </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label">Line ID </label>
                        <div class="controls">
                            <input class='span12'  name="adh_line"  placeholder='Isi Line ID' type='text' />
                        </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label">Email </label>
                        <div class="controls">
                            <input class='span12'  name="adh_email"  placeholder='Isi Email' type='text' />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Asuransi Ke Taiwan</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="dakt"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Asuransi Ke Indo</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="daki"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Asuransi TKI TTD</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="dattt"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Aju Hotel Taiwan</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="aju_ht"  placeholder='Select datepicker' type='text'/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Nama Hotel </label>
                        <div class="controls">
                            <select class="span7 " name="idhotel" data-placeholder="Choose a Category" tabindex="1">
                                <option value="" />Select...
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_hotellist; ?>" /><?php echo $pilihan->kodehotel.' '.$pilihan->namahotel;?>
                                <?php } ?>
                                <option value=""/>
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
  <form action="<?php echo site_url('detailasudanhot/ubah');?>" method="post" class="form-horizontal" />
  <?php foreach ($tampil_data_request as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                    <div class="control-group">
                         <label class="control-label">Keterangan </label>
                        <div class="controls">
                            <input class='span12'  name="keterangan"  placeholder='Isi Keterangan Progress' type='text' value="<?php echo $row->keterangan ?>" />
                        </div>
                    </div>

<div class="control-group">
                                                                <label class="control-label">Tanggal Tiba di Taiwan</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo $row->tanggalterbang;?>" name="tanggalterbang"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                <?php $tglb= $row->statustgl;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>


                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->id_terbang;?>" /><?php echo $row->detailberangkat1;echo " : ".$row->detailberangkat2;echo " : ".$row->jamtiba;?>
                                                                       <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->detailberangkat1;echo " : ".$pilihan->detailberangkat2;echo " : ".$pilihan->jamtiba;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                     <div class="control-group">
                                                                <label class="control-label"> Tiket </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiket" data-placeholder="Choose a Category" tabindex="1">
                                                                              <?php $datavalue = array('pilih', 'wl', 'issued', 'ok'); ?>
                                                                        <?php $datatiket = array('pilih', '候補 - Waiting List', '開票 - ISSUED', '可以 - OK'); ?>
                                                                        <?php for($i=0; $i<count($datatiket); $i++) : ?>
                                                                            <?php if($datavalue[$i] == $row->tiket) : ?>
                                                                                    <option selected="selected" value="<?= $datavalue[$i]; ?>"><?= $datatiket[$i]; ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $datavalue[$i]; ?>"><?= $datatiket[$i]; ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terbang </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberangkat"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglberangkat;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tgla= $row->statusterbang;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Airport Saat Kembali</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="airport" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->airport;?>" /><?php echo $row->airport;?>
                                                                        <?php  foreach ($tampil_data_dataairport as $pilihan2) { ?>
                                                                            <option value="<?php echo $pilihan2->isi;?>" /><?php echo $pilihan2->isi;?>

                                                                         <?php
                                                                     } ?>
                                                                        </select>

                                                                </div>
                                                            </div>


                    <div class="control-group">
                         <label class="control-label">No HP Taiwan </label>
                        <div class="controls">
                            <input class='span12'  name="adh_nohp"  placeholder='Isi No HP Taiwan' type='text' value="<?php echo $row->adh_nohp; ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label">Line ID </label>
                        <div class="controls">
                            <input class='span12'  name="adh_line"  placeholder='Isi Line ID' type='text' value="<?php echo $row->adh_line; ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label">Email </label>
                        <div class="controls">
                            <input class='span12'  name="adh_email"  placeholder='Isi Email' type='text' value="<?php echo $row->adh_email; ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label span4"> Dok Asuransi Ke Taiwan</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="dakt"  placeholder='Select datepicker' type='text' value="<?php echo $row->dakt; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Asuransi Ke Indo</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="daki"  placeholder='Select datepicker' type='text' value="<?php echo $row->daki; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Asuransi TKI TTD</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="dattt"  placeholder='Select datepicker' type='text' value="<?php echo $row->dattt; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Dok Aju Hotel Taiwan</label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="aju_ht"  placeholder='Select datepicker' type='text' value="<?php echo $row->aju_ht; ?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span4"> Nama Hotel </label>
                        <div class="controls">
                            <select class="span7 " name="idhotel" data-placeholder="Choose a Category" tabindex="1">
                                <option value="<?php echo $row->idhotel;?>" selected /><?php echo $row->kodehotel.' '.$row->namahotel;?>
                                <?php foreach ($tampilvaksin as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_setting_hotellist; ?>" /><?php echo $pilihan->kodehotel.' '.$pilihan->namahotel;?>
                                <?php } ?>
                                <option value=""/>
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


            <div id="modal-pk" class="modal-gugus">
                <div class="modal-pages">
                    <div class="card">
                        <div class="card-header">
                            Tanggal PK ke Taiwan
                        </div>
                        <form action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <?php if ($personal->status_pk == 1): ?>
                                            <input id="edodo" checked="checked" type="checkbox" class="form-control" name="sudahadapk"><label for="edodo">sudah ada pk</label>
                                        <?php else: ?>
                                            <input id="edodo" type="checkbox" class="form-control" name="sudahadapk"><label for="edodo">sudah ada pk</label>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pk</label>
                                    <input type="text" id="satu" class="form-control" value="<?= $personal->tgl_pk; ?>" name="tglpkketaiwan" placeholder="INPUTKAN TANGGAL PK">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Terima Pk</label>
                                    <input type="text" id="satu" class="form-control" value="<?= $personal->terima_pk; ?>" name="tglpkditrima" placeholder="INPUTKAN TERIMA PK">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Cek PK di Sisko</label>
                                    <input type="text" id="satu" class="form-control" value="<?= $personal->tglpksisko; ?>" name="tglpksisko" placeholder="INPUTKAN TGL CEK PK DI SISKO">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal SPBG Ke Taiwan</label>
                                    <input type="text" id="satu" class="form-control" value="<?= $personal->tglspbgtaiwan; ?>" name="tglspbgtaiwan" placeholder="INPUTKAN TGL SPBG KE TAIWAN">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="button" onclick="simpanpk('<?= $detailpersonalid; ?>')" class="btn btn-primary pkpk" value="Simpan">
                                <button type="button" class="btn btn-default btn-closse" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<script>

        $(".modal-aksi").click(function(){
            var target = $(this).attr('target');
            $("#"+target).css({
                "display": 'block'
            });

        });

                $("body").click(function(e){
                    var target = $(e.target);
                    if (target.is('.modal-gugus') || target.is(".btn-closse")) {
                        $(".modal-gugus").css({
                            "display": 'none'
                        });
                    }
                })


        function simpanpk(){
          var id = "<?= $detailpersonalid; ?>";
          var pk = $("input[name='tglpkketaiwan']").val();
          var pkDitrima = $("input[name=tglpkditrima]").val();
          var tglpksisko = $("input[name=tglpksisko]").val();
          var tglspbgtaiwan = $("input[name=tglspbgtaiwan]").val();
          $.ajax({
              url: "<?= site_url(); ?>/detailasudanhot/simpanpkketaiwan/",
              method: "POST",
              dataType: "text",
              data: {
                  id:id,
                  pk:pk,
                  terima:pkDitrima,
                  tglpksisko:tglpksisko,
                  tglspbgtaiwan:tglspbgtaiwan
              },success:function(response){
                  location.reload();
              }
          });
        }

        $("input[name='sudahadapk']").change(function(){
          if ($(this).is(":checked")) {
              $.ajax({
                  url: "<?= site_url(); ?>/detailasudanhot/stauspkpk/1/<?= $detailpersonalid; ?>",
                  success:function(response){
                      //alert(response);
                  }
              })
          }else{
              $.ajax({
                  url: "<?= site_url(); ?>/detailasudanhot/stauspkpk/0/<?= $detailpersonalid; ?>",
                  success:function(response){
                      //alert(response);
                  }
              })
          }
        })
</script>
