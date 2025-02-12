<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal</span>
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
                                     <?php } }?>

                                </div>

<div class='row-fluid'>
    <div class='span8 box'>
        <div class='box-header'>
            <div class='title'>
                <div class='icon-inbox'></div>
               FISKAL TKI
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3">TGL PENGAJUAN REKOM :</td>
                                                <td><?php echo $tglbuat;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ID DISNAKER ONLINE :</td>
                                                <td><?php echo $nodisnaker;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL ONLINE :</td>
                                                <td><?php echo $tglonline;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL CEK VIEW DETAIL SISKO :</td>
                                                <td><?php echo $tglpksisko;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ID PT FLAMBOYAN :</td>
                                                <td><?php echo $detailpersonalid;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL DAFTAR :</td>
                                                <td><?php echo $tanggaldaftar;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA :</td>
                                                <td><?php echo $nama;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TEMPAT LAHIR :</td>
                                                <td><?php echo $tempatlahir;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TANGGAL LAHIR :</td>
                                                <td><?php echo $tgllahir;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NOMER KTP :</td>
                                                <td><?php echo $noktp;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">JENIS KELAMIN :</td>
                                                <td><?php echo $jeniskelamin;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">AGAMA :</td>
                                                <td><?php echo $agama;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">STATUS PERKAWINAN :</td>
                                                <td><?php echo $status;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">PENDIDIKAN :</td>
                                                <td><?php echo $pendidikan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ALAMAT :</td>
                                                <td><?php echo $alamat;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA AYAH :</td>
                                                <td><?php echo $namaayah;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA IBU :</td>
                                                <td><?php echo $namaibu;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA MEDICAL :</td>
                                                <td><?php echo $namamedical;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NOMER MEDICAL :</td>
                                                <td><?php echo $nomedical;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TANGGAL MEDICAL FULL :</td>
                                                <td><?php echo $tanggalmed;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NOMER PASPORT MASIH BERLAKU :</td>
                                                <td><?php echo $nopaspor;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERBIT :</td>
                                                <td><?php echo $tglterbit;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL BERAKHIR :</td>
                                                <td><?php echo $expired;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TEMPAT TERBIT :</td>
                                                <td><?php echo $office;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NEGARA :</td>
                                                <td><?php echo $namanegara;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">JABATAN :</td>
                                                <td><?php echo $namajabatan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL MAJIKAN :</td>
                                                <td><?php echo $tglmajikan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA AGENCY  :</td>
                                                <td><?php echo $namaagency;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA MAJIKAN :</td>
                                                <td><?php echo $namamajikan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NAMA MAJIKAN (taiwan):</td>
                                                <td><?php echo $namamajikantaiwan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">ALAMAT MAJIKAN :</td>
                                                <td><?php echo $alamatmajikan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TELEPON :</td>
                                                <td><?php echo $telpmajikan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERIMA PK :</td>
                                                <td><?php echo $tglpk;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERIMA SUHAN :</td>
                                                <td><?php echo $tglterimasuhan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO.SUHAN :</td>
                                                <td><?php echo $nosuhan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERBIT SUHAN :</td>
                                                <td><?php echo $terbitsuhan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL BERAKHIR SUHAN :</td>
                                                <td><?php echo $berakhirsuhan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">DIBAWA / DISIMPAN :</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL DIBAWA / DISIMPAN :</td>
                                                <td><?php echo $tglbawasuhan;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERIMA VISA PERMIT :</td>
                                                <td><?php echo $tglterimavisapermit;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO.VISA PERMIT :</td>
                                                <td><?php echo $novisapermit;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERBIT VISA PERMIT :</td>
                                                <td><?php echo $terbitvisapermit;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL BERAKHIR VISA PERMIT :</td>
                                                <td><?php echo $berakhirvisapermit;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">DIBAWA / DISIMPAN :</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL DIBAWA / DISIMPAN :</td>
                                                <td><?php echo $tglbawavisapermit;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">NO VISA :</td>
                                                <td><?php echo $novisa;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL TERBIT VISA :</td>
                                                <td><?php echo $terbitvisa;?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">TGL BERAKHIR :</td>
                                                <td><?php echo $berakhirvisa;?></td>
                                            </tr>
                                           <!--   <tr>
                                                <td class="span3">TGL ASURANSI PRA :</td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">NO ASURANSI PRA :</td>
                                                <td></td>
                                            </tr> -->
                                             <tr>
                                                <td class="span3">NOMER PAP :</td>
                                                <td><?php echo $nopap;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TANGGAL PAP :</td>
                                                <td><?php echo $pap;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">NAMA BANK :</td>
                                                <td><?php echo $namabank;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">NOMER REKENING BANK :</td>
                                                <td><?php echo $norek;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TANGGAL REKENING BANK :</td>
                                                <td><?php echo $tglbank;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">JENIS KREDIT :</td>
                                                <td><?php echo $jenisbank.' ( '.$nilaibank.')';?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TERIMA VISA ARRIVAL :</td>
                                                <td><?php echo $visaarrival;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TGL FINAL TERBANG :</td>
                                                <td><?php echo $tglterbang;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TGL FINAL TIBA DI TAIWAN :</td>
                                                <td><?php echo $tgltiba;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">PENERBANGAN :</td>
                                                 <td> <?php echo $detailberangkat1;echo " : ".$jamtiba;?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan Lanjutan:</td>
                                                <td> <?php

                                                if($detailberangkat2==""){

                                                }else{
                                                    echo $detailberangkat2;echo " : ".$jamtiba;
                                                }?>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TGL INFO MAU AMBIL BERKAS :</td>
                                                <td><?php echo $infoberkas;?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3">TGL AMBIL BERKAS :</td>
                                                <td><?php echo $ambilberkas;?></td>
                                            </tr>




                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>

    </div>

</div>
                                <div class="space5"></div>



                            </div>
        </div>


                    </div>
