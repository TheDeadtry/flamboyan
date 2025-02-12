<?php 

$ip=$_SERVER['REMOTE_ADDR'];

?>

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
        max-height: 380px;
        overflow-y: scroll;
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
            <div class='title'>Detail Administrasi</div>
                <div class='actions'>
                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
            </div>
        </div>
        <?php foreach ($tampil_data_personal as $row) : ?>
            <div class='box-content box-no-padding'>
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
                    <ul class="nav nav-tabs nav-stacked">
                        <?php $this->load->view('template/menuadministrasi'); ?>
                    </ul>
                </div>
                <div class="span6">
                    <?php if($row->skill1==""): ?>
                        <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                            <?php else : ?>
                        <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                    <?php endif; ?>
                    <div class='row-fluid'>
                        <div class='span12 box box-transparent'>
                            <div class='row-fluid'>
                               <div class='span4 box-quick-link green-background'>
                                    <a href='<?php echo site_url().'/upload_pk'; ?>'>
                                        <div class='header'>
                                            <div class='icon-book'></div>
                                        </div>
                                        <div class='content'><b>Upload PK</b></div>
                                         <div class='content'><b>0 DOKUMEN</b></div>
                                    </a>
                                </div>
                                 <div class='span4 box-quick-link orange-background'>
                                    <a href='<?php echo site_url().'/upload_suhan'; ?>'>
                                        <div class='header'>
                                            <div class='icon-briefcase'></div>
                                        </div>
                                        <div class='content'><b>Upload SUHAN</b></div>
                                         <div class='content'><b>0 DOKUMEN</b></div>
                                    </a>
                                </div>
                                <div class='span4 box-quick-link purple-background'>
                                    <a href='<?php echo site_url().'/upload_visapermit'; ?>'>
                                        <div class='header'>
                                            <div class='icon-globe'></div>
                                        </div>
                                        <div class='content'><b>Upload Visa Permit</b></div>
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
                                    <a href='<?php echo site_url().'/upload_kpapra'; ?>'>
                                        <div class='header'>
                                            <div class='icon-book'></div>
                                        </div>
                                        <div class='content'><b>Upload JD</b></div>
                                         <div class='content'><b>0 DOKUMEN</b></div>
                                    </a>
                                </div><!--
                                <div class='span4 box-quick-link green-background'>
                                    <a class="modal-aksi" target="modal-pk">
                                        <div class='header'>
                                            <div class='icon-book'></div>
                                        </div>
                                        <div class='content'><b>TGL PK KE TAIWAN</b></div>
                                    </a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <?php $stts = substr($detailpersonalid, 0, 2); ?>
                    <?php if ($hitungmajikan==0) : ?>
                        <div class="alert alert-info">
                            <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini...
                            <?php if($stts == 'FI' ||$stts == 'MI') : ?>
                                <!-- untuk informal -->
                                <a class='btn btn-info btn-large modal-aksi' target="modal-formal">Tambah Data</a>
                                <?php else : ?>
                                    <!-- untuk formal -->
                                <a class='btn btn-info btn-large modal-aksi' target="modal-formal">Tambah Data</a>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                     <div class="alert alert-info ">

                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini...
                        <?php if($stts == 'FI' ||$stts == 'MI') : ?>
                                <a class='btn btn-info btn-medium modal-aksi' target="modal-formal-edit">Ubah Data</a>
                                <a href="<?php echo site_url('detailmajikan/vubahmajikan/'.$detailpersonalid); ?>"class="btn btn-info btn-medium"></i>Edit Grup Majikan</a>
                            <?php else : ?>
                                <a class='btn btn-info btn-medium modal-aksi' target="modal-formal-edit">Ubah Data</a>
                                <a href="<?php echo site_url('detailmajikan/vubahmajikanformal/'.$detailpersonalid); ?>"class="btn btn-info btn-medium"></i>Edit Grup Majikan</a>
                         <?php endif; ?>
                        <a href="<?php echo site_url('detailmajikan/aturulangform/'.$detailpersonalid); ?>"class="btn btn-info btn-medium"></i>Form Atur Ulang</a>
                     </div>
                    <?php endif; ?>
                    <?php if($stts == 'FI' ||$stts == 'MI') : ?>
                        <?php foreach ($tampil_data_majikanfi as $row) : ?>
                             <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="span3"> Nama Group :</td>
                                        <td> <?php echo  $row->namagroupnya;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> Kode Agen :</td>
                                        <td> <?php echo $row->namaagennya;?> </td>
                                    </tr>

                                     <tr>
                                        <td class="span3"> Nama Majikan :</td>
                                        <td> <?php echo $row->namamajikan;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Nama Majikan (taiwan) :</td>
                                        <td> <?php echo $row->namataiwan;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Bandara Tujuan :</td>
                                        <td> <?php echo $row->bandaratuju;?> </td>
                                    </tr>
                                      <tr>
                                        <td class="span3"> No Telp Majikan :</td>
                                        <td> <?php echo $row->notelpmajikan;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> Alamat Majikan :</td>
                                        <td> <?php echo $row->alamatmajikan;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> Tanggal Terima PK:</td>
                                        <td> <?php echo $row->tglpk;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Tanggal Terima SPBG:</td>
                                        <td> <?php echo $row->tgltrmspbg;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> No Suhan :</td>
                                        <td> <?php echo $row->id_suhan;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> tgl terbit suhan :</td>
                                        <td> <?php echo $row->tglterbitsuhan;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> tgl terima suhan :</td>
                                        <td> <?php echo $row->tglterimasuhan;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Keterangan suhan :</td>
                                        <td> <?php echo $row->ketsuhan;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3">No Visa Permit :</td>
                                        <td> <?php echo $row->id_visapermit;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> tgl terbit Visa Permit :</td>
                                        <td> <?php echo $row->tglterbitpermit;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> tgl terima Visa Permit :</td>
                                        <td> <?php echo $row->tglterimapermit;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> Keterangan Visa Permit :</td>
                                        <td> <?php echo $row->ketpermit;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3">Tanggal Terpilih :</td>
                                        <td> <?php echo $row->tglterpilih;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> JD :</td>
                                        <td> <?php echo $row->JD;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> Tanggal Terbang :</td>
                                        <td> <?=
                                        $row->tglterbang;
                                        $hasil3= $row->statustglterbang; ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td class="span2"></td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                            <?php else : ?>
                        <?php foreach ($tampil_data_majikanformal as $rowformal) : ?>
                             <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="span3"> Nama Group :</td>
                                        <td> <?php echo $rowformal->namagroup1;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Nama Agen :</td>
                                        <td> <?php echo $rowformal->namaagen1;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Nama Majikan :</td>
                                        <td> <?php echo $rowformal->namamajikan1;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Bandara Tujuan :</td>
                                        <td> <?php echo $rowformal->bandaratuju;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> NO Suhan :</td>
                                        <td> <?php echo $rowformal->nosuhan1;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> NO VisaPermit :</td>
                                        <td> <?php echo $rowformal->novisapermit1;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3">Tanggal Terpilih :</td>
                                        <td> <?php echo $rowformal->tglterpilih;?> </td>
                                    </tr>

                                    <tr>
                                        <td class="span3"> Tanggal Terima Suhan:</td>
                                        <td> <?php echo $rowformal->tglsimpansuhan;?> </td>
                                    </tr>

                                    <tr>
                                        <td class="span3"> Stat Dokumen Suhan:</td>
                                        <td> <?php echo $rowformal->statsuhan;?> </td>
                                    </tr>

                                     <tr>
                                        <td class="span3"> Tanggal Terima Visapermit:</td>
                                        <td> <?php echo $rowformal->tglsimpanvp;?> </td>
                                    </tr>

                                    <tr>
                                        <td class="span3"> Stat Dokumen Visa Permit:</td>
                                        <td> <?php echo $rowformal->statvp;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Tanggal Terima PK:</td>
                                        <td> <?php echo $rowformal->tglpk;?> </td>
                                    </tr>
                                    <tr>
                                        <td class="span3"> Tanggal Terima SPBG:</td>
                                        <td> <?php echo $rowformal->tgltrmspbg;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> JD :</td>
                                        <td> <?php echo $rowformal->JD;?> </td>
                                    </tr>
                                     <tr>
                                        <td class="span3"> Tanggal Terbang :</td>
                                        <td> <?php echo $rowformal->tglterbang;?> </td>
                                    </tr>

                                     <tr>
                                        <td class="span2"></td>
                                        <td> </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class='span3 box box-transparent'>
                <br>
                <br>
                <br>
                <h4>PRINT DOKUMEN </h4>
                <div class='row-fluid'>
                    <div class=' box-quick-link blue-background'>
                        <a target='_blank' href='<?php echo site_url().'/tambah1/cetakbaru/'.$detailpersonalid; ?>'>
                            <div class='header'>
                                <div class='icon-book'></div>
                            </div>
                            <div class='content'>DL005. PERJANJIAN KERJA</div>
                        </a>
                    </div>
                    <br>
                    <div class=' box-quick-link blue-background'>
                        <a target='_blank' href="<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/print_apendik/<?= $detailpersonalid; ?>">
                            <div class='header'>
                                <div class='icon-book'></div>
                            </div>
                            <div class='content'>Print Apendik</div>
                        </a>
                    </div>
                    <br>
                    
                    <?php if($stts == 'FI' || $stts == 'MI') { ?>
                        <?php if ($ambil_data_propinsi_tipe != "") { ?>
                        <div class=' box-quick-link blue-background'>
                            <a  target='_blank' href="<?= site_url(); ?>/detailmajikan_spbg/print_spbg/<?= $detailpersonalid; ?>">
                                <div class='header'>
                                    <div class='icon-book'></div>
                                </div>
                                <div class='content'>SPBG-D <b><?php echo $ambil_data_propinsi_tipe; ?></b></div>
                            </a>
                        </div>
                        <?php } else { ?>
                        <div class=' box-quick-link blue-background'>
                            <a>
                                <div class='header'>
                                    <b style="color:red">BELUM DI ISI PROPINSI TIPE</b>
                                </div>
                                <div class='content'>SPBG-D <b><?php echo $ambil_data_propinsi_tipe; ?></b></div>
                            </a>
                        </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if($stts == 'MF' || $stts == 'FF') { ?>
                        <?php if ($ambil_data_propinsi_tipe != "") { ?>
                            <div class=' box-quick-link blue-background'>
                                <a  target='_blank' href="<?= site_url(); ?>/detailmajikan_spbg/print_spbg/<?= $detailpersonalid; ?>">
                                    <div class='header'>
                                        <div class='icon-book'></div>
                                    </div>
                                    <div class='content'>SPBG-FAC <b><?php echo $ambil_data_propinsi_tipe; ?></b></div>
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class=' box-quick-link blue-background'>
                                <a>
                                    <div class='header'>
                                        <b style="color:red">BELUM DI ISI PROPINSI TIPE</b>
                                    </div>
                                    <div class='content'>SPBG-FAC <b><?php echo $ambil_data_propinsi_tipe; ?></b></div>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if($stts == 'JP') { ?>
                        <?php if ($ambil_data_propinsi_tipe != "") { ?>
                            <div class=' box-quick-link blue-background'>
                                <a  target='_blank' href="<?= site_url(); ?>/detailmajikan_spbg/print_spbg/<?= $detailpersonalid; ?>">
                                    <div class='header'>
                                        <div class='icon-book'></div>
                                    </div>
                                    <div class='content'>SPBG-NUR <b><?php echo $ambil_data_propinsi_tipe; ?></b></div>
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class=' box-quick-link blue-background'>
                                <a>
                                    <div class='header'>
                                        <b style="color:red">BELUM DI ISI PROPINSI TIPE</b>
                                    </div>
                                    <div class='content'>SPBG-NUR <b><?php echo $ambil_data_propinsi_tipe; ?></b></div>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php if ($stts == 'FI' ||$stts == 'MI'): ?>

<div id="modal-formal" class="modal-gugus modal-lain">
    <div class="modal-pages">
        <div class="card">
            <div class="card-header">
                Tambah Majikan
            </div>
            <form action="<?php echo site_url('detailmajikan/tambahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
            <div class="card-body">
                    <br><br>
                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                    <div class="control-group">
                        <label class="control-label" for="group">Pilih Group Agen</label>
                        <div class="controls">
                            <select name="group" class="form-control" id="group">
                                <option value="">Piih Group</option>
                                <?php foreach ($tampil_data_group as $key => $datagroup): ?>
                                    <option value="<?= $datagroup->id_group ?>"><?= $datagroup->nama; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Agen </label>
                        <div class="controls">
                            <select class="form-control" name="kodeagen" id="kodeagen">
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Majikan</label>
                        <div class="controls">
                            <select class="form-control" name="kode_majikan" id="kode_majikan">
                            </select>
                        </div>
                    </div>

                     <div class="control-group" id="jelasin_agen">
                         <label class="control-label">Pilih No Suhan </label>
                         <div class="controls">
                            <select class="form-control" name="id_suhan" id="id_suhan">
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                         <label class="control-label">Pilih No Visa Permit </label>
                         <div class="controls">
                            <select class="form-control" name="id_visapermit" id="id_visapermit">
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terpilih Majikan </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label "> Nama Majikan  </label>
                        <div class="controls">
                            <input type="text" name="namamajikan" class=" popovers" value="" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label "> Nama Majikan (taiwan)</label>
                        <div class="controls">
                            <input type="text" name="namataiwan" class=" popovers" value="" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label ">Bandara Tujuan</label>
                        <div class="controls">
                            <input type="text" name="bandaratuju" class=" popovers" value="" data-trigger="hover" data-content="" data-original-title="bandaratuju" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label "> No Telp Majikan</label>
                        <div class="controls">
                            <input type="text" name="notelpmajikan" class=" popovers" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label "> Alamat Majikan</label>
                        <div class="controls">
                            <input type="text" name="alamatmajikan" class=" popovers" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                        </div>
                    </div>
                    
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terbit Suhan </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitsuhan"  placeholder='Select datepicker' type='text' />
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima Suhan </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterimasuhan"  placeholder='Select datepicker' type='text' />
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                            </span>
                           </div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label "> Keterangan Suhan</label>
                        <div class="controls">
                            <input type="text" name="ketsuhan" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                        </div>
                    </div>

                    
                     <div class="control-group">
                        <label class="control-label "> Visa Permit </label>
                        <div class="controls">
                            <input type="text" name="visapermit" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima PK </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglpk"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima SPBG </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tgltrmspbg"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> TGL TD TGN JD  </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Diminta Terbang </label>
                        <div class="controls">
                              <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' />
                        </div>
                    </div>
            </div> 
            <div class="card-footer text-right">
                <button type="button" class="btn btn-default btn-lg btn-closse">Close</button>
                <button type="submit" class="btn btn-lg btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- edit data untuk formal -->
<div id="modal-formal-edit" class="modal-gugus modal-lain">
    <div class="modal-pages">
        <div class="card">
            <div class="card-header">
                Tambah Majikann
            </div>
            <form action="<?php echo site_url('detailmajikan/ubahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
            <?php foreach ($tampil_data_majikanformal as $rowformal) : ?>
            <div class="card-body">
                    <br><br>
                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                    
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="group">Pilih Group Agen</label>
                        <div class="controls">
                            <select name="group" class="form-control" id="group">
                                <option value="">Piih Group</option>
                                <?php foreach ($tampil_data_group as $key => $datagroup): ?>
                                        <?php if ( $datagroup->nama == $rowformal->namagroup1) : ?>
                                            <option selected="selected" value="<?= $datagroup->id_group ?>"><?= $datagroup->nama; ?></option>
                                            <?php else : ?>
                                            <option value="<?= $datagroup->id_group ?>"><?= $datagroup->nama; ?></option>
                                        <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Agen </label>
                        <div class="controls">
                            <select class="form-control" name="kodeagen" id="kodeagen">
                                <option value="">Piih Group</option>
                                <?php foreach ($dataagen as $key => $dataagen): ?>
                                        <?php if ( $dataagen->nama == $rowformal->namaagen1) : ?>
                                            <option selected="selected" value="<?= $dataagen->id_agen ?>"><?= $dataagen->nama; ?></option>
                                            <?php else : ?>
                                            <option value="<?= $dataagen->id_agen ?>"><?= $dataagen->nama; ?></option>
                                        <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima PK </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                  <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $rowformal->tglpk;?>" name="tglpk"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                 </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima SPBG </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $rowformal->tgltrmspbg;?>" name="tgltrmspbg"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="control-group">
                    <label class="control-label "> Nama Majikan </label>
                    <div class="controls">
                        <input type="text" name="namamajikan" class=" popovers" value="<?= $namamajikan_informal; ?>" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label "> Nama Majikan (taiwan)</label>
                    <div class="controls">
                        <input type="text" name="namataiwan" class=" popovers" value="<?php echo  $rowformal->namataiwan;?>" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                    </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label "> Bandara Tujuan</label>
                      <div class="controls">
                          <input type="text" name="bandaratuju" class=" popovers" value="<?php echo  $rowformal->bandaratuju;?>" data-trigger="hover" data-content="" data-original-title="bandaratuju" />
                      </div>
                    </div>

                    <div class="control-group">
                    <label class="control-label "> No Telp Majikan</label>
                    <div class="controls">
                        <input type="text" name="notelpmajikan" class=" popovers" value="<?php echo  $rowformal->notelpmajikan;?>" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label "> Alamat Majikan</label>
                    <div class="controls">
                        <input type="text" name="alamatmajikan" class=" popovers" value="<?php echo  $rowformal->alamatmajikan;?>" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                    </div>
                    </div>


                    <div class="control-group">
                    <label class="control-label "> Suhan </label>
                    <div class="controls">
                        <input type="text" name="suhan" class=" popovers" value="<?php echo  $ketsuhan_informal;?>" data-trigger="hover" data-content="" data-original-title="Suhan" />
                    </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terbit Suhan </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $rowformal->tglterbitsuhan;?>" name="tglterbitsuhan"  placeholder='Select datepicker' type='text' />
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                             </span>
                                       </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima Suhan </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                              <input class='input-medium' data-format='yyyy.MM.dd'  value="<?php echo  $rowformal->tglterimasuhan;?>" name="tglterimasuhan"  placeholder='Select datepicker' type='text' />
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                             </span>
                                       </div>
                        </div>
                    </div>
                      <div class="control-group">
                    <label class="control-label "> Keterangan Suhan</label>
                    <div class="controls">
                        <input type="text" name="ketsuhan" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" value="<?php echo  $rowformal->ketsuhan;?>" />
                    </div>
                    </div>


                    
                    <div class="control-group">
                    <label class="control-label "> Visa Permit </label>
                    <div class="controls">
                        <input type="text" name="visapermit" class=" popovers" value="<?php echo  $rowformal->id_visapermit;?>" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                    </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terbit Visa Permit </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $rowformal->tglterbitpermit;?>" name="tglterbitpermit"  placeholder='Select datepicker' type='text' />
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                             </span>
                                       </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima Visa Permit </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $rowformal->tglterimapermit;?>" name="tglterimapermit"  placeholder='Select datepicker' type='text' />
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                             </span>
                                       </div>
                        </div>
                    </div>
                      <div class="control-group">
                    <label class="control-label "> Keterangan Visa Permit</label>
                    <div class="controls">
                        <input type="text" name="ketpermit" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" value="<?php echo  $rowformal->ketpermit;?>"/>
                    </div>
                    </div>


                     <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terpilih Majikan </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                              <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' value="<?php echo  $rowformal->tglterpilih;?>"/>
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                             </span>
                                       </div>
                        </div>
                    </div>


                    <div class="control-group" id="berlaku">
                        <label class="control-label"> TGL TD TGN JD  </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                              <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' value="<?php echo  $rowformal->JD;?>"/>
                            <span class='add-on'>
                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                             </span>
                                       </div>
                        </div>
                    </div>

                     <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Diminta Terbang </label>
                        <div class="controls">
                              <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' value="<?php echo  $rowformal->tglterbang;?>"/>
                        </div>
                    </div>

            </div> 
            <div class="card-footer text-right">
                <button type="button" class="btn btn-default btn-lg btn-closse">Close</button>
                <button type="submit" class="btn btn-lg btn-success">Simpan</button>
            </div>
            <?php endforeach ?>
            </form>
        </div>
    </div>
</div>

    <?php else: ?>
<!-- tambah data untuk formal -->
<div id="modal-formal" class="modal-gugus modal-lain">
    <div class="modal-pages">
        <div class="card">
            <div class="card-header">
                Tambah Majikan
            </div>
            <form action="<?php echo site_url('detailmajikan/tambahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
            <div class="card-body">
                    <br><br>
                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                    <div class="control-group">
                        <label class="control-label" for="group">Pilih Group Agen</label>
                        <div class="controls">
                            <select name="group" class="form-control" id="group">
                                <option value="">Piih Group</option>
                                <?php foreach ($tampil_data_group as $key => $datagroup): ?>
                                    <option value="<?= $datagroup->id_group ?>"><?= $datagroup->nama; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Agen </label>
                        <div class="controls">
                            <select class="form-control" name="kodeagen" id="kodeagen">
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Majikan</label>
                        <div class="controls">
                            <select class="form-control" name="kode_majikan" id="kode_majikan">
                            </select>
                        </div>
                    </div>

                     <div class="control-group" id="jelasin_agen">
                         <label class="control-label">Pilih No Suhan </label>
                         <div class="controls">
                            <select class="form-control" name="id_suhan" id="id_suhan">
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                         <label class="control-label">Pilih No Visa Permit </label>
                         <div class="controls">
                            <select class="form-control" name="id_visapermit" id="id_visapermit">
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terpilih Majikan </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima PK </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglpk"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima SPBG </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tgltrmspbg"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> TGL TD TGN JD  </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Diminta Terbang </label>
                        <div class="controls">
                              <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' />
                        </div>
                    </div>
            </div> 
            <div class="card-footer text-right">
                <button type="button" class="btn btn-default btn-lg btn-closse">Close</button>
                <button type="submit" class="btn btn-lg btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- edit data untuk formal -->
<div id="modal-formal-edit" class="modal-gugus modal-lain">
    <div class="modal-pages">
        <div class="card">
            <div class="card-header">
                Tambah Majikann
            </div>
            <form action="<?php echo site_url('detailmajikan/ubahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
            <?php foreach ($tampil_data_majikanformal as $rowformal) : ?>
            <div class="card-body">
                    <br><br>
                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                    
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="group">Pilih Group Agen</label>
                        <div class="controls">
                            <select name="group" class="form-control" id="group">
                                <option value="">Piih Group</option>
                                <?php foreach ($tampil_data_group as $key => $datagroup): ?>
                                        <?php if ( $datagroup->nama == $rowformal->namagroup1) : ?>
                                            <option selected="selected" value="<?= $datagroup->id_group ?>"><?= $datagroup->nama; ?></option>
                                            <?php else : ?>
                                            <option value="<?= $datagroup->id_group ?>"><?= $datagroup->nama; ?></option>
                                        <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Agen </label>
                        <div class="controls">
                            <select class="form-control" name="kodeagen" id="kodeagen">
                                <option value="">Piih Group</option>
                                <?php foreach ($dataagen as $key => $dataagen): ?>
                                        <?php if ( $dataagen->nama == $rowformal->namaagen1) : ?>
                                            <option selected="selected" value="<?= $dataagen->id_agen ?>"><?= $dataagen->nama; ?></option>
                                            <?php else : ?>
                                            <option value="<?= $dataagen->id_agen ?>"><?= $dataagen->nama; ?></option>
                                        <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                        <label class="control-label">Pilih Majikan</label>
                        <div class="controls">
                            <select class="form-control" name="kode_majikan" id="kode_majikan">
                                <option value="">Piih Group</option>
                                <?php foreach ($datamajikan as $key => $datamajikan): ?>
                                        <?php if ( $datamajikan->nama == $rowformal->namamajikan1) : ?>
                                            <option selected="selected" value="<?= $datamajikan->id_majikan ?>"><?= $datamajikan->nama; ?></option>
                                            <?php else : ?>
                                            <option value="<?= $datamajikan->id_majikan ?>"><?= $datamajikan->nama; ?></option>
                                        <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                     <div class="control-group" id="jelasin_agen">
                         <label class="control-label">Pilih No Suhan </label>
                         <div class="controls">
                            <select class="form-control" name="id_suhan" id="id_suhan">
                                <?php foreach ($datasuhan as $key => $datasuhan): ?>
                                    <?php if ($datasuhan->no_suhan == $rowformal->nosuhan1) : ?>
                                        <option selected="selected" value="<?= $datasuhan->id_suhan; ?>"><?= $datasuhan->no_suhan; ?></option>
                                        <?php else : ?>
                                        <option value="<?= $datasuhan->id_suhan; ?>"><?= $datasuhan->no_suhan; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="jelasin_agen">
                         <label class="control-label">Pilih No Visa Permit </label>
                         <div class="controls">
                            <select class="form-control" name="id_visapermit" id="id_visapermit">
                            <?php foreach ($datavisapermit as $key => $datavisapermit): ?>
                                    <?php if ($datavisapermit->no_visapermit == $rowformal->novisapermit1) : ?>
                                        <option selected="selected" value="<?= $datavisapermit->id_visapermit ?>"><?= $datavisapermit->no_visapermit; ?></option>
                                        <?php else : ?>
                                        <option value="<?= $datavisapermit->id_visapermit ?>"><?= $datavisapermit->no_visapermit; ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terpilih Majikan </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' value="<?php echo $rowformal->tglterpilih;?>" />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label ">Bandara Tujuan</label>
                        <div class="controls">
                            <input type="text" name="bandaratuju" class=" popovers" value="<?php echo $rowformal->bandaratuju;?>" data-trigger="hover" data-content="" data-original-title="bandaratuju" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tanggal Terima Suhan</label>
                        <div class="controls">
                            <select class="span6 " name="tglsimpansuhan" data-placeholder="Choose a Category" tabindex="1">
                                <option value="" />Select...
                                <?php  foreach ($option_suhan as $pilihan) : ?>
                                    <?php if ( $pilihan->tgl_terima == $rowformal->tglsimpansuhan) : ?>
                                            <option selected="selected" value="<?php echo $pilihan->tgl_terima;?>" /><?php echo $pilihan->tgl_terima;?>
                                        <?php else: ?>
                                            <option value="<?php echo $pilihan->tgl_terima;?>" /><?php echo $pilihan->tgl_terima;?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Status Suhan</label>
                        <div class="controls">
                            <?php $status_suhan = array(" - Pilih - ", "Asli", "Simpanan"); ?>
                            <?php $value_suhan = array("", "Asli", "Simpanan"); ?>
                            <select class="span6 " name="statsuhan" data-placeholder="Choose a Category" tabindex="1">
                                <?php for($i=0; $i < count($status_suhan); $i++) : ?>
                                    <?php if ( $value_suhan[$i] == $rowformal->statsuhan): ?>
                                            <option selected="selected" value="<?= $value_suhan[$i]; ?>"><?= $status_suhan[$i]; ?></option>
                                        <?php else: ?>
                                            <option value="<?= $value_suhan[$i]; ?>"><?= $status_suhan[$i]; ?></option>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                     <div class="control-group">
                        <label class="control-label">Tanggal Terima Visapermit</label>
                        <div class="controls">
                            <select class="span6 " name="tglsimpanvp" data-placeholder="Choose a Category" tabindex="1">
                                <option value="" />Select...
                                <?php  foreach ($option_vp as $pilihan) : ?>
                                    <?php if ($pilihan->tgl_terima == $rowformal->tglsimpanvp): ?>
                                            <option selected="selected" value="<?php echo $pilihan->tgl_terima;?>" /><?php echo $pilihan->tgl_terima;?>
                                        <?php else: ?>
                                            <option value="<?php echo $pilihan->tgl_terima;?>" /><?php echo $pilihan->tgl_terima;?>
                                    <?php endif ?>
                                 <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"> Status Visapermit</label>
                        <div class="controls">
                            <select class="span6 " name="statvp" data-placeholder="Choose a Category" tabindex="1">
                                <?php for($i=0; $i < count($status_suhan); $i++) : ?>
                                    <?php if ( $value_suhan[$i] == $rowformal->statvp): ?>
                                            <option selected="selected" value="<?= $value_suhan[$i]; ?>"><?= $status_suhan[$i]; ?></option>
                                        <?php else: ?>
                                            <option value="<?= $value_suhan[$i]; ?>"><?= $status_suhan[$i]; ?></option>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima PK </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="tglpk"  placeholder='Select datepicker' type='text' value="<?php echo $rowformal->tglpk;?>" />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Terima SPBG </label>
                            <div class="controls">
                                <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $rowformal->tgltrmspbg;?>" name="tgltrmspbg"  placeholder='Select datepicker' type='text' />
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> TGL TD TGN JD  </label>
                        <div class="controls">
                            <div class='datepicker input-append' id='datepicker'>
                                <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' value="<?php echo $rowformal->JD;?>"/>
                                <span class='add-on'>
                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group" id="berlaku">
                        <label class="control-label"> Tgl Diminta Terbang </label>
                        <div class="controls">
                          <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' value="<?php echo $rowformal->tglterbang;?>" />
                        </div>
                    </div>
            </div> 
            <div class="card-footer text-right">
                <button type="button" class="btn btn-default btn-lg btn-closse">Close</button>
                <button type="submit" class="btn btn-lg btn-success">Simpan</button>
            </div>
            <?php endforeach ?>
            </form>
        </div>
    </div>
</div>

<?php endif ?>



<div id="modal-pk" class="modal-gugus modal-lain">
    <div class="modal-pages">
        <div class="card">
            <div class="card-header">
                Tambah Majikann
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
                </div>
                <div class="card-footer">
                    <input type="button" onclick="simpanpk('<?= $detailpersonalid; ?>')" class="btn btn-primary pkpk" value="Simpan">
                    <button type="button" class="btn btn-default btn-closse" data-dismiss="modal">Close</button>
                </div>
            </form>        
        </div>
    </div>
</div>
<script type="text/javascript">



    //javascript modals -->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>.

$( document ).ready(function() {
    
    $("body").click(function(e){
            let target = $(e.target);
            if (target.is('.modal-lain') || target.is(".btn-closse")) {
                $(".modal-lain").css({
                    "display": 'none'
                });
            }
        });

    // -------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



        $(document).on("click",".modal-aksi",function(){
            let target = $(this).attr('target');
            console.log(target);
            $("#"+target).css({
                    "display": 'block'
                });

        });
        $(document).on("click","#modal-spbg-open",function(){
            console.log("spbg-open");
            $("#modal-spbg").css({
                    "display": 'block'
                });

        });
        $(document).on("click","#modal-spbg-close",function(){
            console.log("spbg-close");
            $("#modal-spbg").css({
                    "display": 'none'
                });

        });


        $(".ubah-fromal").click(function(){
            var target = $(this).attr('target');
            $("#"+target).css({
                "display": 'block'
            });

        });

        


        $("input[name='sudahadapk']").change(function(){
        if ($(this).is(":checked")) {
            $.ajax({
                url: "<?= site_url(); ?>/detailmajikan/stauspkpk/1/<?= $detailpersonalid; ?>",
                success:function(response){
                    alert(response);
                }
            })
        }else{
            $.ajax({
                url: "<?= site_url(); ?>/detailmajikan/stauspkpk/0/<?= $detailpersonalid; ?>",
                success:function(response){
                    alert(response);
                }
            })
        }
        })


        $(".printapendik").click(function(){
        $("#apendik").modal("show");
        })


        function tglpkketaiwan(key){
        $("#tanggalpk").modal("show");
        $.ajax({
            url: "<?= site_url(); ?>/detailmajikan/ambilpkketaiwan/"+key,
            success:function(response){
                if (response != 'undefined') {
                    $(".pkpk").attr("value", "Update");
                    var nilai = response.replace(/~/g, " ");
                    $("input[name='tglpkketaiwan']").val(nilai);
                }
            }
        });

        $.ajax({
            url: "<?= site_url(); ?>/detailmajikan/ambilpkditrima/"+key,
            success:function(response){
                if (response != 'undefined') {
                    $(".pkpk").attr("value", "Update");
                    var nilai = response.replace(/~/g, " ");
                    $("input[name='tglpkditrima']").val(nilai);
                }
            }
        });

        $.ajax({
            url: "<?= site_url(); ?>/detailmajikan/ambilstatuspk/"+key,
            success:function(response){
                if (response == 1) {
                    $("input[name='sudahadapk']").attr("checked", "checked");
                }
            }
        });
        }

        function simpanpk(){
        var id = "<?= $detailpersonalid; ?>";
        var pk = $("input[name='tglpkketaiwan']").val();
        var pkDitrima = $("input[name=tglpkditrima]").val();
        $.ajax({
            url: "<?= site_url(); ?>/detailmajikan/simpanpkketaiwan/",
            method: "POST",
            dataType: "text",
            data: {
                id:id,
                pk:pk,
                terima:pkDitrima
            },success:function(response){
                location.reload();                
            }
        });
        }


        $("body").change(function(e){
            var target = $(e.target);
            if(target.is("#group"))
            {
                var a = target.val();
                    $.ajax({
                    url: "<?= site_url("detailmajikan/ambildataagen/"); ?>",
                    method: "POST",
                    dataType: "text",
                    data: {
                        key: "groupkey",
                        dataidagen: a
                    },success:function(response){
                        $("body #kodeagen").html(response);
                    }
                });
            }
        })


        $("body").change(function(e){
            var target = $(e.target);
            if(target.is("#kodeagen"))
            {
                var a = target.val();
                $.ajax({
                    url: "<?= site_url("detailmajikan/ambildatamajikan/"); ?>",
                    method: "POST",
                    dataType: "text",
                    data: {
                        key: "groupkey",
                        dataidagen: a
                    },success:function(response){
                        $("body #kode_majikan").html(response);
                    }
                });
            }
        })

        $("body").change(function(e){
            var target = $(e.target);
            if(target.is("#kode_majikan"))
            {
                var a = target.val();
                $.ajax({
                    url: "<?= site_url("detailmajikan/ambilsuhanid/"); ?>",
                    method: "POST",
                    dataType: "text",
                    data: {
                        key: "groupkey",
                        dataidagen: a
                    },success:function(response){
                        $("body #id_suhan").html(response);
                    }
                });
            }
        })

        $("body").change(function(e){
            var target = $(e.target);
            if(target.is("#id_suhan"))
            {
                var a = target.val();
                $.ajax({
                    url: "<?= site_url("detailmajikan/ambilvisapermit/"); ?>",
                    method: "POST",
                    dataType: "text",
                    data: {
                        key: "groupkey",
                        dataidagen: a
                    },success:function(response){
                        $("body #id_visapermit").html(response);
                    }
                });
            }
        })
});



</script>
