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
            <div class='title'>Detail Disnaker</div>
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
                                  if($hitungdisnaker==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        <a class='btn btn-info btn-large' role='button' onclick='window.open("<?php echo site_url('detaildisnaker_detail/index/'.$idbiodatanya) ?>", "windowName", "width=1000, height=580, left=139, top=64, scrollbars, resizable"); return false; '>Detail Historikal</a>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
<br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br> 
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br> 
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br> 
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br> 
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                        <a class='btn btn-info btn-large' role='button' onclick='window.open("<?php echo site_url('detaildisnaker_detail/index/'.$idbiodatanya) ?>", "windowName", "width=1000, height=580, left=139, top=64, scrollbars, resizable"); return false; '>Detail Historikal</a>
                        </div>
                                 <?php foreach ($tampil_data_disnaker as $row) { ?>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal BUAT :</td>
                                                <td> <?php echo $row->tglbuat;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Tanggal TERIMA :</td>
                                                <td> <?php echo $row->tglterima;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> No disnaker :</td>
                                                <td> <?php echo $row->nodisnaker;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> tglonline :</td>
                                                <td> <?php echo $row->tglonline;
                                                 $hasil= $row->perkiraan;
                                                        if($hasil=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Nama :</td>
                                                <td> <?php echo $row->nama;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Tempatlahir :</td>
                                                <td> <?php echo $row->tempatlahir;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Tanggal Lahir :</td>
                                                <td> <?php echo $row->tanggallahir;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> Nomor KTP :</td>
                                                <td> <?php echo $row->noktp;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> Tanggal Pembuatan KTP :</td>
                                                <td> <?php echo $row->tglnoktp;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> Tempat Pembuatan KTP :</td>
                                                <td> <?php echo $row->tempatnoktp;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Jenis Kelamin :</td>
                                                <td> <?php echo $row->jeniskelamin;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> agama :</td>
                                                <td> <?php echo $row->agama;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> status :</td>
                                                <td> <?php echo $row->status;?> </td>
                                            </tr>
                                           <!--
                                            <tr>
                                                <td class="span2"> Email :</td>
                                                <td> <?php echo $row->email;?> </td>
                                            </tr>
                                            <tr>
                                                <?php 
                                                    $passs = "";
                                                    $exp = explode(" ", $row->nama);
                                                    if (isset($exp[0])) {
                                                        $passs = $exp[0]."f123@";
                                                    }
                                                ?>
                                                <td class="span2"> Password :</td>
                                                <td> <?php echo $passs;?> </td>
                                            </tr>-->
                                            <tr>
                                                <td class="span2"> No. Tel TKI :</td>
                                                <td> <?php echo $data_notelp;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Nomor Surat Nikah :</td>
                                                <td> <?php echo $row->d_nosuratnikah;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> NIP Pegawai Pencatat Nikah :</td>
                                                <td> <?php echo $row->d_nippencatat;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> NIK Suami/Istri :</td>
                                                <td> <?php echo $row->d_niksuamioristri;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Nomor Registrasi Surat dari Kepala Desa :</td>
                                                <td> <?php echo $row->d_noregistrasi;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> TGL Surat :</td>
                                                <td> <?php echo $row->d_tglsurat;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Nama Kepala Desa yg TTD mengetahui Surat Izin :</td>
                                                <td> <?php echo $row->d_namakepaladesa;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> NO NIK Suami/Istri/Orang Tua/Wali yg memberikan Izin :</td>
                                                <?php if ($row->status == 'cerai' || $row->status == 'cerai mati') {
                                                ?>
                                                    <td> <?php echo $row->d_niksuamioristri;?> </td>
                                                <?php 
                                                } else {
                                                ?>
                                                    <td> <?php echo $row->d_nonikwali;?> </td>
                                                <?php 
                                                } ?>
                                            </tr>
                                            <tr>
                                                <td class="span2"> No Kartu Keluarga :</td>
                                                <td> <?php echo $row->d_nokk;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> NIK Kepala Keluarga :</td>
                                                <td> <?php echo $row->d_nikkepala;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> NIP Kepala DIDUKCAPIL yg menerbitkan KK :</td>
                                                <td> <?php echo $row->d_nipdidukcapil;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> TGL Terbut Kartu Keluarga :</td>
                                                <td> <?php echo $row->d_tglterbitkk;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2">pendidikan :</td>
                                                <td> <?php echo $row->pendidikan;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2">Pekerjaan sesuai KTP :</td>
                                                <td> <?php echo $row->pekerjaan;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> alamat :</td>
                                                <td> <?php echo $row->alamat;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Propinsi :</td>
                                                <td> <?php echo $row->propinsi;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Tipe Propinsi :</td>
                                                <td> <?php echo $row->propinsi_tipe;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> namaayah :</td>
                                                <td> <?php echo $row->namaayah;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> namaibu :</td>
                                                <td> <?php echo $row->namaibu;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> alamat Orang Tua :</td>
                                                <td> <?php echo $row->alamatortu;?> </td>
                                            </tr>
                                           
                                           
                                            <tr>
                                                <td class="span2"> Nama Pasangan :</td>
                                                <td> <?php echo $row->namapasangan;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> Alamat Pasangan :</td>
                                                <td> <?php echo $row->alamatpasangan;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> namakontak :</td>
                                                <td> <?php echo $row->namakontak;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> alamatkontak :</td>
                                                <td> <?php echo $row->alamatkontak;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> telpkontak :</td>
                                                <td> <?php echo $row->telpkontak;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> Hubungan Kontak :</td>
                                                <td> <?php echo $row->hubkontak;?> </td>
                                            </tr>


                                              <tr>
                                                <td class="span2"> Negara :</td>
                                                <td> <?php echo $row->negara;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> Jabatan :</td>
                                                <td> <?php echo $row->jabatan;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Nama Ahli Waris :</td>
                                                <td> <?php echo $row->ahliwaris;?> </td>
                                            </tr>
 <tr>
                                                <td class="span2"> Kota Ahli Waris :</td>
                                                <td> <?php echo $row->namaahli;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Jumlah anak dibawah umur 18 tahun dan belum menikah :</td>
                                                <td> <?php echo $row->jmlanak;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Agency :</td>
                                                <td> <?php echo $row->agency;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Mata Uang :</td>
                                                <td> <?php echo $row->matauang;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Sektor Usaha :</td>
                                                <td> <?php echo $row->sektorusaha;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Gaji TKI :</td>
                                                <td> <?php echo $row->gaji;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> No Paspor :</td>
                                                <td> <?php echo $row->nopaspor;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Masa Berlaku :</td>
                                                <td> <?php echo $row->masaberlaku;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Masa Habis :</td>
                                                <td> <?php echo $row->masahabis;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Tgl Berangkat :</td>
                                                <td> <?php echo $row->tglberangkat;?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> Tgl Tiba :</td>
                                                <td> <?php echo $row->tgltiba;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Wilayah Disnaker :</td>
                                                <td> <?php echo $row->namadisnakernama;?> </td>
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
                                        <div class='span3 box box-transparent'>
                <br>
                 <br>
                  <br>
                      <h4>PRINT DOKUMEN </h4>
        <div class='row-fluid'>
            <div class=' box-quick-link blue-background'>
                  <!-- <a href='<?php echo site_url().'/tambah1/cetak/'.$detailpersonalid; ?>' target="_blank"> -->
                                    <a href='<?php echo site_url().'/surat_rekom_desa/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL001. SUrat IJIN DESA</div>
                </a>
            </div>
        </div>
    </div>
                <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_ijin/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL003. IJIN DISNAKER <br> DL006. TABEL KE DISNAKER <br>DL007. PENGAJUAN PP DISNAKER</div>
                </a>
            </div>
        </div>
    </div>

                    <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_disnaker/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL004. PRINT DISNAKER ONLINE</div>
                </a>
            </div>
        </div>
    </div>

                    <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_perjanjian/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL005. PERJANJIAN PENEMPATAN</div>
                </a>
            </div>
        </div>
    </div>
<!-- 
                    <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_tabeldis/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL006. TABEL KE DISNAKER</div>
                </a>
            </div>
        </div>
    </div> -->
                    
  <!--   <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_ppdis/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL007. PENGAJUAN PP DISNAKER</div>
                </a>
            </div>
        </div>
    </div>
 -->
    <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_skck/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL008. REKOM SKCK</div>
                </a>
            </div>
        </div>
    </div>
    <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_paspor/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL009. REKOM PASPOR</div>
                </a>
            </div>
        </div>
    </div>
    <div class='span3 box box-transparent'>
        <div class='row-fluid'>
                        <div class=' box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_keabsahan/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>DL010. SURAT KEABSAHAN</div>
                </a>
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
  <form action="<?php echo site_url('detaildisnaker/tambahdisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <?php foreach ($tampil_data_personal as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

                                                            <div class="control-group">
                                                                <label class="control-label"> Data Registrasi</label>
                                                                <div class="controls">
                                                                    <select class="span10" data-placeholder="Pilih Data Registrasi" name="datareg">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach ( $tampil_data_registrasi as $fff )
                                                                            {
                                                                        ?>
                                                                                <option value="<?php echo $fff->nama ?>"><?php echo $fff->nama ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

<div class="control-group">
                                                                <label class="control-label span4"> Tgl Buatnya</label>
                                                                <div class="controls">
              <input type='text' value="<?php echo $tglxss;?>"  name="tanggalbuatnyaya" readonly/>

                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Terima </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="tglterima"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
    
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label span4">ID disnaker </label>
                                                            <div class="controls">
                                                                <input type="text" name="nodisnaker" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">ID SBK </label>
                                                            <div class="controls">
                                                                <input type="text" name="nosbk" value="<?php echo "".$idbiodatanya ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" readonly />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Online </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="perkiraan"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                   <!--  <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" name="perkiraan"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                 -->
                                                                  <label class='radio '>
                                                                            <input type='radio' name="perkiraana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="perkiraana" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label span4"> No Ktp </label>
                                                            <div class="controls">
                                                                <input type="text" name="noktp" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Tanggal Dibuat Ktp </label>
                                                            <div class="controls">
                                                                <div class='datepicker input-append' id='datepicker'>
                                                                    <input class='input-medium' data-format='yyyy.MM.dd'  name="tglnoktp"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Tempat Dibuat Ktp </label>
                                                            <div class="controls">
                                                                <input type="text" name="tempatnoktp" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama </label>
                                                            <div class="controls">
                                                                <input type="text" name="nama" value="<?php echo "".$row->nama ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Tempat lahir </label>
                                                            <div class="controls">
                                                                <input type="text" name="tempatlahir" value="<?php echo "".$row->tempatlahir ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>
                        
                                                           <!--  <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tanggal Lahir </label>
                                                                <div class="controls">
                                                                <input type="text" name="tanggallahir" value="<?php echo "".$row->tgllahir ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div> -->
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Tanggal Lahir </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="tanggallahir" value="<?php echo "".$row->tgllahir ?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
    
                                                                </div>
                                                            </div>

                                                            <!-- <div class="control-group">
                                                                <label class="control-label span4"> Jenis kelamin</label>
                                                                <div class="controls">
                                                                <input type="text" name="jenis_kelamin" value="<?php echo "".$row->jeniskelamin ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div> -->
                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="<?php echo $row->jeniskelamin; ?>"  /><?php echo $row->jeniskelamin; ?>
                                                                        <option value="Laki-Laki" />Laki-Laki
                                                                        <option value="Perempuan" />Perempuan
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Agama</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="agama" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->agama;?>"  /><?php echo $row->agama;?> 
                                                                        <?php  foreach ($tampil_data_agama as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4">Status</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="status" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->status ?>" /><?php echo $row->status ?>
                                                                        <option value="Belum Kawin" />Belum Kawin
                                                                        <option value="Kawin" />Kawin
                                                                        <option value="Kawin Belum Tercatat" />Kawin Belum Tercatat
                                                                        <option value="Cerai" />Cerai
                                                                        <option value="Cerai mati" />Cerai mati
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div><!--
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Email </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_email" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>-->
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Nomor Surat Nikah </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nosuratnikah" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIP Pegawai Pencatat Nikah </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nippencatat" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIK Suami/Istri </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_niksuamioristri" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Nomor Registrasi Surat dari Kepala Desa </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_noregistrasi" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> TGL Surat </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_tglsurat" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Nama Kepala Desa yg TTD mengetahui Surat Izin </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_namakepaladesa" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NO NIK Suami/Istri/Orang Tua/Wali yg memberikan Izin </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nonikwali" value="" class="span7 popovers" />
                                                                    <code class="text-danger">Diisi Jika Status Cerai</code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> No Kartu Keluarga </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nokk" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIK Kepala Keluarga </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nikkepala" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIP Kepala DIDUKCAPIL yg menerbitkan KK </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nipdidukcapil" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> TGL Terbut Kartu Keluarga </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_tglterbitkk" value="" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>

                                                                <div class="control-group">
                                                                <label class="control-label span4">Pendidikan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="pendidikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->pendidikan;?>" /><?php echo $row->pendidikan;?>
                                                                        <?php foreach($tampil_data_setting_pendidikan as $v) { ?>
                                                                        <option value="<?php echo $v->k1 ?>" /><?php echo $v->k1 ?>
                                                                        <?php } ?>
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Pekerjaan sesuai KTP </label>
                                                                <div class="controls">
                                                                    <select class="span7 " id="pekerjaan" name="pekerjaan" data-placeholder="Choose a Category" tabindex="1">
                                                                    </select>
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                AuditDevQuery(datalogin, `SELECT * FROM datajobs`, function(data){
                                                                    let [pdk] = data;
                                                                    document.getElementById('pekerjaan').innerHTML = `<option value="">Pilih Data</option>`+pdk.map(function(o){
                                                                        return `<option value="${o.isi}">`+o.isi+`</option>`;
                                                                    }).join('');
                                                                    $('#pekerjaan').select2();
                                                                })
                                                            </script>

                                                            <div class="control-group">
                                                            <label class="control-label span3">Alamat Lengkap</label>
                                                            <div class="controls">
                                                                <textarea class="span6 " name="alamat" rows="3"><?php echo "".$row->alamat ?></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span3">Propinsi</label>
                                                            <div class="controls">
                                                                <textarea class="span6 " name="propinsi" rows="3"><?php echo $row->provinsi ?></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span3">Tipe Propinsi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="propinsi_tipe" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="PULAU JAWA" />PULAU JAWA
                                                                            <option value="LUAR PULAU JAWA" />LUAR PULAU JAWA
                                                                    </select>
                                                                    <code class="text-danger"> Inputan</code>
                                                                </div>
                                                            </div>
                                  <?php }?>                     

 <?php foreach ($tampil_data_family as $row2) { ?>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Ayah </label>
                                                            <div class="controls">
                                                                <input type="text" name="namaayah" value="<?php echo "".$row2->nama_bapak?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                                <code class="text-danger">Silahkan Dipastikan Kembali Sesuai Inputan</code>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Ibu </label>
                                                            <div class="controls">
                                                                <input type="text" name="namaibu" value="<?php echo "".$row2->nama_ibu ?>"class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                                <code class="text-danger">Silahkan Dipastikan Kembali Sesuai Inputan</code>
                                                            </div>
                                                            </div>

                                                               <div class="control-group ">
                                                            <label class="control-label span4">Alamat Orang Tua</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamatortu" rows="3"></textarea>
                                                            </div>
                                                            </div>

                                                              <div class="control-group">
                                                            <label class="control-label span4"> Nama Pasangan  </label>
                                                            <div class="controls">
                                                                <input type="text" name="namapasangan" value="<?php echo "".$row2->nama_istri_suami?>" class="span7 popovers "  data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                                <code class="text-danger">Data Akan Muncul jika sudah Menikah / COnfirm Ulang Jika Data Berbeda</code>
                                                            </div>
                                                            </div>
                                                            <?php if($row2->nama_istri_suami!=null){?>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Alamat Pasangan</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamatpasangan" rows="3"><?php echo "".$row->alamat ?></textarea>
                                                                <code class="text-danger">Data Akan Muncul jika sudah Menikah / COnfirm Ulang Jika Data Berbeda</code>
                                                            </div>
                                                            </div>

                                                            <?php }?>

                                                        
                                                            

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" name="namakontak" value="<?php echo "".$row2->nama_bapak?>" class="span7 popovers "  data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Alamat Kontak Darurat</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamatkontak" rows="3"><?php echo "".$row->alamat ?></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4"> Telepon Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" name="teleponkontak" class="span7 popovers"  value="<?php echo "".$row->notelpkel?>" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                           <!--  <div class="control-group hidden">
                                                            <label class="control-label span4"> Hubungan Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" name="hubugankonta" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div> -->
                                                            <div class="control-group">
                                                                <label class="control-label span4">Hubungan Kontak Darurat</label>
                                                                <div class="controls">
                                                            
                                                                          <select class="span7 " name="hubugankontak" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_hubungan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                                 
                                                            </div> 
                                                            
                                                            <div class="control-group">
                                                        <label class="control-label">Nama Ahli Waris</label>
                                                      <div class="controls">
                                                        <input type="text" name="ahliwaris" class="span10 popovers" placeholder="Berisi Nama" class="form-control" > 
                                                        <code class="text-danger">nama ahli waris</code>
                                                      </div>
                                                    </div>


                                                            <div class="control-group">
                                                        <label class="control-label">Kota Ahli Waris</label>
                                                      <div class="controls">
                                                        <input type="text" name="namaahli" class="span10 popovers" placeholder="Berisi Nama" class="form-control" > 
                                                        <code class="text-danger">Kota Asal ahli waris</code>
                                                      </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah anak dibawah umur 18 tahun dan belum menikah</label>
                                                      <div class="controls">
                                                        <input type="text" name="jmlanak" class="span10 popovers" placeholder="Berisi Jumlah" class="form-control" > 
                                                        <code class="text-danger">Jumlah Anak Berapa Orang</code>
                                                      </div>
                                                    </div>


                                                            <div class="control-group">
                                                                <label class="control-label span4">Negara</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4">Jabatan</label>
                                                                <div class="controls">
                                                                    <select class="span10 " name="jabatan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_jabatan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                             <div class="control-group">
                                                                <label class="control-label span4">Pilih Agency</label>
                                                                <div class="controls">
                                                                    <select class="span10 " name="agency" data-placeholder="Choose a Category" tabindex="1">
                                                                        <?php  foreach ($tampil_data_agen as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_agen;?>" /><?php echo $pilihan->kode_agen;?> - <?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Mata Uang </label>
                                                            <div class="controls">
                                                                <input type="text" name="matauang" class="span10 popovers" data-trigger="hover" value="NT" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Sektor Usaha </label>
                                                            <div class="controls">
                                                                <input type="text" name="sektorusaha" class="span10 popovers" data-trigger="hover" value="Jasa Kemasyarakatan, Sosial, dan Perorangan" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label span4">Pilih GAJI</label>
                                                                <div class="controls">
                                                                    <select class="span10 " name="gaji" data-placeholder="Choose a Category" tabindex="1">
                                                                        <?php  foreach ($tampil_data_gaji as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namagaji;?>" /><?php echo $pilihan->namagaji;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                        <label class="control-label">NO PASPOR</label>
                                                      <div class="controls">
                                                        <input type="text" name="nopaspor" class="span10 popovers" placeholder="Berisi No paspor" class="form-control" > 
                                                        <code class="text-danger">Diisi jika ex taiwan</code>
                                                      </div>
                                                    </div>

                                               <!--              <div class="control-group">
                                                        <label class="control-label">Masa Berlaku</label>
                                                      <div class="controls">
                                                        <input type="text" name="masaberlaku" class="span10 popovers" placeholder="Berisi masa berlaku paspor" class="form-control" > 
                                                        <code class="text-danger">Diisi jika ex taiwan</code>
                                                      </div>
                                                    </div> -->
                                                    <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Masa Berlaku</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="masaberlaku"   placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Masa Habis</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="masahabis"  placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>

<!-- 
                                                            <div class="control-group">
                                                        <label class="control-label">Masa Habis</label>
                                                      <div class="controls">
                                                        <input type="text" name="masahabis" class="span10 popovers" placeholder="Berisi Masa Habis Paspor" class="form-control" > 
                                                        <code class="text-danger">Diisi jika ex taiwan</code>
                                                      </div>
                                                    </div>
 -->
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Ke Luar Negeri </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="tglberangkat"  placeholder='Select datepicker' type='text' />

            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
               <code class="text-danger">Diisi jika ex taiwan</code>
                       </div>
                                                                </div>
                                                            </div>
                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Kembali Ke Indonesia </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="tgltiba"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                             <code class="text-danger">Diisi jika ex taiwan</code>

                       </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="control-group">
                                                                <label class="control-label"> Wilayah Disnaker</label>
                                                                <div class="controls">
                                                                    <select class="span10" data-placeholder="Pilih Data Registrasi" name="namadisnaker_id">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach ( $tampil_data_namadisnaker as $fff )
                                                                            {
                                                                        ?>
                                                                                <option value="<?php echo $fff->id_namadisnaker ?>"><?php echo $fff->namadisnaker ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
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


          <div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Data</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detaildisnaker/ubahdisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_disnaker as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />
                                                            <div class="control-group">
                                                                <label class="control-label"> Data Registrasi</label>
                                                                <div class="controls">
                                                                    <select class="span10" data-placeholder="Pilih Data Registrasi" name="datareg">
                                                                        <option value="<?php echo $row->data_registrasi; ?>"  /><?php echo $row->data_registrasi; ?>
                                                                        <option value=""> kosong / tidak ada</option>
                                                                        <?php 
                                                                            foreach ( $tampil_data_registrasi as $fff )
                                                                            {
                                                                        ?>
                                                                                <option value="<?php echo $fff->nama ?>"><?php echo $fff->nama ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>


                <?php
$tglx='';
                if($row->tglbuat==null ||$row->tglbuat=='0'){
                                        $tglx= date("d/m/Y");
                                    }else{

                                        $tglx= $row->tglbuat;
                                        }
                                                                        ?>
   <div class="control-group">
                                                            <label class="control-label span4">Tanggal Buat </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $tglx;?>" name="tglbuat" class="span7 popovers" data-trigger="hover" data-content="Isi No DIsnaker online" data-original-title="No Disnaker" readonly/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tanggal TERIMA </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglterima;?>" name="tglterima"  size="16" data-date-format="yyyy.mm.dd" type="text" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">ID disnaker </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->nodisnaker;?>" name="nodisnaker" class="span7 popovers" data-trigger="hover" data-content="Isi No DIsnaker online" data-original-title="No Disnaker" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">ID SBK </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $idbiodatanya;?>" name="nosbk" class="span7 popovers" data-trigger="hover" data-content="No induk dari perusahaan" data-original-title="No SBK" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Perkiraan Online </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo $row->tglonline;?>" name="perkiraan"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                   <!--  <div class="input-append date date-picker" data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tglonline;?>" name="perkiraan"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                -->
                                                               <?php $tgla= $row->perkiraan;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="perkiraana" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="perkiraana" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="perkiraana" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="perkiraana" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label span4"> No Ktp </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->noktp;?>" name="noktp" class="span7 popovers" data-trigger="hover" data-content="Isi Nomor Sesuai dengan KTP" data-original-title="No Ktp" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Tanggal Dibuat Ktp </label>
                                                            <div class="controls">
                                                                <div class='datepicker input-append' id='datepicker'>
                                                                    <input class='input-medium' data-format='yyyy.MM.dd'  name="tglnoktp"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tglnoktp;?>"/>
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Tempat Dibuat Ktp </label>
                                                            <div class="controls">
                                                                <input type="text" name="tempatnoktp" value="<?php echo "".$row->tempatnoktp ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->nama;?>" name="nama" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Tempat lahir </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->tempatlahir;?>" name="tempatlahir" class="span7 popovers" data-trigger="hover" data-content="Isi Kota Lahir Lengkap Sesuai dengan KTP" data-original-title="Kota Lahir" />
                                                            </div>
                                                            </div>
                        
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tanggal Lahir </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
                                                                        <input class=" m-ctrl-medium date-picker span7" value="<?php echo $row->tanggallahir;?>" name="tanggallahir"  size="16" data-date-format="yyyy.mm.dd" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span></div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="<?php echo $row->jeniskelamin; ?>"  /><?php echo $row->jeniskelamin; ?>
                                                                        <option value="Laki-Laki" />Laki-Laki
                                                                        <option value="Perempuan" />Perempuan
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>

                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Agama</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="agama" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->agama;?>"  /><?php echo $row->agama;?> 
                                                                        <?php  foreach ($tampil_data_agama as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4">Status</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="status" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->status;?>"  /><?php echo $row->status;?>
                                                                        <option value="Belum Kawin" />Belum Kawin
                                                                        <option value="Kawin Belum Tercatat" />Kawin Belum Tercatat
                                                                        <option value="Kawin" />Kawin
                                                                        <option value="Cerai" />Cerai
                                                                        <option value="Cerai mati" />Cerai mati
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div><!--
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Email </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_email" value="<?php echo $row->email;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>-->
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Nomor Surat Nikah </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nosuratnikah" value="<?php echo $row->d_nosuratnikah;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIP Pegawai Pencatat Nikah </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nippencatat" value="<?php echo $row->d_nippencatat;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIK Suami/Istri </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_niksuamioristri" value="<?php echo $row->d_niksuamioristri;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Nomor Registrasi Surat dari Kepala Desa </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_noregistrasi" value="<?php echo $row->d_noregistrasi;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> TGL Surat </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_tglsurat" value="<?php echo $row->d_tglsurat;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Nama Kepala Desa yg TTD mengetahui Surat Izin </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_namakepaladesa" value="<?php echo $row->d_namakepaladesa;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NO NIK Suami/Istri/Orang Tua/Wali yg memberikan Izin </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nonikwali" value="<?php echo $row->d_nonikwali;?>" class="span7 popovers" />
                                                                    <code class="text-danger">Diisi Jika Status Cerai</code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> No Kartu Keluarga </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nokk" value="<?php echo $row->d_nokk;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIK Kepala Keluarga </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nikkepala" value="<?php echo $row->d_nikkepala;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> NIP Kepala DIDUKCAPIL yg menerbitkan KK </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_nipdidukcapil" value="<?php echo $row->d_nipdidukcapil;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> TGL Terbut Kartu Keluarga </label>
                                                                <div class="controls">
                                                                    <input type="text" name="d_tglterbitkk" value="<?php echo $row->d_tglterbitkk;?>" class="span7 popovers" />
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>




                                                           <div class="control-group">
                                                                <label class="control-label span4">Pendidikan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="pendidikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->pendidikan;?>"  /><?php echo $row->pendidikan;?>
                                                                        <?php foreach($tampil_data_setting_pendidikan as $v) { ?>
                                                                        <option value="<?php echo $v->k1 ?>" /><?php echo $v->k1 ?>
                                                                        <?php } ?>
                                                                        </select>
                                                                        <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Pekerjaan sesuai KTP </label>
                                                                <div class="controls">
                                                                    <select class="span7 " id="pekerjaan2" name="pekerjaan" data-placeholder="Choose a Category" tabindex="1">
                                                                    </select>
                                                                    <code class="text-danger"></code>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                AuditDevQuery(datalogin, `SELECT * FROM datajobs`, function(data){
                                                                    let [pdk] = data;
                                                                    document.getElementById('pekerjaan2').innerHTML = `<option value="">Pilih Data</option>`+pdk.map(function(o){
                                                                        return `<option value="${o.isi}">`+o.isi+`</option>`;
                                                                    }).join('');
                                                                    $('#pekerjaan2').select2();
                                                                    $('#pekerjaan2').val('<?php echo $row->pekerjaan;?>').trigger('change')
                                                                })
                                                            </script>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Alamat</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamat" rows="3"><?php echo $row->alamat;?></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span3">Propinsi</label>
                                                            <div class="controls">
                                                                <textarea class="span6 " name="propinsi" rows="3"><?php echo $row->propinsi ?></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span3">Tipe Propinsi</label>
                                                                <div class="controls">
                                                                    
                                                                    <select class="span7 " name="propinsi_tipe" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->propinsi_tipe;?>" /><?php echo $row->propinsi_tipe;?>
                                                                            <option value="PULAU JAWA" />PULAU JAWA
                                                                            <option value="LUAR PULAU JAWA" />LUAR PULAU JAWA
                                                                    </select>
                                                                        <code class="text-danger"> Inputan</code>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Ayah </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->namaayah;?>" name="namaayah" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Ayah Kandung" data-original-title="Nama Ayah" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Ibu </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->namaibu;?>" name="namaibu" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Ibu Kandung" data-original-title="Nama Ibu" />
                                                            </div>
                                                            </div>

                                                              <div class="control-group ">
                                                            <label class="control-label span4">Alamat Orang Tua</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamatortu" rows="3"><?php echo "".$row->alamatortu ?></textarea>
                                                            </div>
                                                            </div>

                                                              <div class="control-group">
                                                            <label class="control-label span4"> Nama Pasangan  </label>
                                                            <div class="controls">
                                                                <input type="text" name="namapasangan" value="<?php echo "".$row->namapasangan;?>" class="span7 popovers "  data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                                <code class="text-danger">Data Akan Muncul jika sudah Menikah / COnfirm Ulang Jika Data Berbeda</code>
                                                            </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Alamat Pasangan</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamatpasangan" rows="3"><?php echo "".$row->alamatpasangan;?></textarea>
                                                                <code class="text-danger">Data Akan Muncul jika sudah Menikah / COnfirm Ulang Jika Data Berbeda</code>
                                                            </div>
                                                            </div>


                                                           <!--  <div class="control-group">
                                                                <label class="control-label span4">Nama Ahli Waris</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaahli" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->namaahli;?>" /><?php echo $row->namaahli;?>
                                                                        <option value="Ayah" />Ayah
                                                                        <option value="Ibu" />Ibu
                                                                        <option value="Istri" />Istri
                                                                        </select>
                                                                </div>
                                                            </div> -->

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->namakontak;?>" name="namakontak" class="span7 popovers" data-trigger="hover" data-content="Isi Nama KOntak Darurat yang di tuju jika ada masalah" data-original-title="Nama Kontak Darurat" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Alamat Kontak Darurat</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "   name="alamatkontak" rows="3"><?php echo $row->alamatkontak;?></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Telepon Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->telpkontak;?>" name="teleponkontak" class="span7 popovers" data-trigger="hover" data-content="Isi Telpon KOntak dengan lengkap" data-original-title="Telp kontak darurat" />
                                                            </div>
                                                            </div>

                                                            <!-- <div class="control-group">
                                                            <label class="control-label span4"> Hubungan Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->hubkontak;?>" name="hubugankontak" class="span7 popovers" data-trigger="hover" data-content="Isi Hubungan darah " data-original-title="Hubungan darah " />
                                                            </div>
                                                            </div> -->
                                                            <div class="control-group">
                                                                <label class="control-label span4">Hubungan Kontak Darurat</label>
                                                                <div class="controls">
                                                                         <select class="span7 " name="hubugankontak" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->hubkontak;?>" /><?php echo $row->hubkontak;?>
                                                                        <?php  foreach ($tampil_data_hubungan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                          <code class="text-danger">Silahkan Dipilih Kembali Sesuai Inputan</code>

                                                                </div>
                                                            </div> 

                                                             <div class="control-group">
                                                        <label class="control-label">Nama Ahli Waris</label>
                                                      <div class="controls">
                                                        <input type="text" name="ahliwaris" value="<?php echo $row->ahliwaris;?>"  class="span10 popovers" placeholder="Berisi Nama" class="form-control" > 
                                                        <code class="text-danger">nama ahli waris</code>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Kota Ahli Waris</label>
                                                      <div class="controls">
                                                        <input type="text" name="namaahli" value="<?php echo $row->namaahli;?>"  class="span10 popovers" placeholder="Berisi Nama" class="form-control" > 
                                                        <code class="text-danger">Kota Asal ahli waris</code>
                                                      </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah anak dibawah umur 18 tahun dan belum menikah</label>
                                                      <div class="controls">
                                                        <input type="text" name="jmlanak" value="<?php echo $row->jmlanak;?>" class="span10 popovers" placeholder="Berisi Jumlah" class="form-control" > 
                                                        <code class="text-danger">Jumlah Anak Berapa Orang</code>
                                                      </div>
                                                    </div>


                                                            <div class="control-group">
                                                                <label class="control-label span4">Negara</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->negara;?>" /><?php echo $row->negara;?>
                                                                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4">Jabatan</label>
                                                                <div class="controls">
                                                                    <select class="span10 " name="jabatan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->jabatan;?>" /><?php echo $row->jabatan;?>
                                                                        <?php  foreach ($tampil_data_jabatan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label span4">Pilih Agency</label>
                                                                <div class="controls">
                                                                    <select class="span10 " name="agency" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->agency;?>" /><?php echo $row->agency;?>
                                                                        <?php  foreach ($tampil_data_agen as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_agen;?>" /><?php echo $pilihan->kode_agen;?> - <?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Mata Uang </label>
                                                            <div class="controls">
                                                                <input type="text" name="matauang"  value="<?php echo $row->matauang;?>" class="span10 popovers" data-trigger="hover" value="NT" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group ">
                                                            <label class="control-label span4">Sektor Usaha </label>
                                                            <div class="controls">
                                                                <input type="text" name="sektorusaha"  value="<?php echo $row->sektorusaha;?>" class="span10 popovers" data-trigger="hover" value="Jasa Kemasyarakatan, Sosial, dan Perorangan" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label span4">Pilih GAJI</label>
                                                                <div class="controls">
                                                                    <select class="span10 " name="gaji" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->gaji;?>" /><?php echo $row->gaji;?>
                                                                        <?php  foreach ($tampil_data_gaji as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namagaji;?>" /><?php echo $pilihan->namagaji;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                        <label class="control-label">NO PASPOR</label>
                                                      <div class="controls">
                                                        <input type="text" name="nopaspor"   value="<?php echo $row->nopaspor;?>"class="span10 popovers" placeholder="Berisi No paspor" class="form-control" > 
                                                        <code class="text-danger">Diisi jika ex taiwan</code>
                                                      </div>
                                                    </div>

                                                      <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Masa Berlaku</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium'   value="<?php echo $row->masaberlaku;?>" data-format='yyyy.MM.dd' name="masaberlaku"   placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Masa Habis</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium'  value="<?php echo $row->masahabis;?>" data-format='yyyy.MM.dd' name="masahabis"  placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
<!-- 

                                                            <div class="control-group">
                                                        <label class="control-label">Masa Berlaku</label>
                                                      <div class="controls">
                                                        <input type="text" name="masaberlaku"   value="<?php echo $row->masaberlaku;?>"class="span10 popovers" placeholder="Berisi masa berlaku paspor" class="form-control" > 
                                                        <code class="text-danger">Diisi jika ex taiwan</code>
                                                      </div>
                                                    </div>

                                                            <div class="control-group">
                                                        <label class="control-label">Masa Habis</label>
                                                      <div class="controls">
                                                        <input type="text" name="masahabis"   value="<?php echo $row->masahabis;?>"class="span10 popovers" placeholder="Berisi Masa Habis Paspor" class="form-control" > 
                                                        <code class="text-danger">Diisi jika ex taiwan</code>
                                                      </div>
                                                    </div> -->

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Ke Luar Negeri </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="tglberangkat"    value="<?php echo $row->tglberangkat;?>" placeholder='Select datepicker' type='text' />

            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
               <code class="text-danger">Diisi jika ex taiwan</code>
                       </div>
                                                                </div>
                                                            </div>
                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tgl Kembali Ke indonesia </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  name="tgltiba"   value="<?php echo $row->tgltiba;?>"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                             <code class="text-danger">Diisi jika ex taiwan</code>

                       </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="control-group">
                                                                <label class="control-label"> Wilayah Disnaker</label>
                                                                <div class="controls">
                                                                    <select class="span10" data-placeholder="Pilih Data Registrasi" name="namadisnaker_id">
                                                                        <option value="<?php echo $row->namadisnaker_id;?>" /><?php echo $row->namadisnakernama;?>
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach ( $tampil_data_namadisnaker as $fff )
                                                                            {
                                                                        ?>
                                                                                <option value="<?php echo $fff->id_namadisnaker ?>"><?php echo $fff->namadisnaker ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
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

            <h4>UPLOAD DOKUMEN </h4>

<div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                 <a data-toggle='modal' href='#dokktp'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>SCAN KTP</div>
                </a>
            </div>
           <div class='span2 box-quick-link blue-background'>
                 <a data-toggle='modal' href='#dokkuasa'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>SCAN Surat Kuasa</div>
                </a>
            </div>
            <div class='span2 box-quick-link blue-background'>
                 <a data-toggle='modal' href='#doknyata'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>SCAN Surat Pernyataan</div>
                </a>
            </div>
            <div class='span2 box-quick-link blue-background'>
                 <a data-toggle='modal' href='#doklegal'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>SCAN LEGALITAS</div>
                </a>
            </div>

            <div class='span2 box-quick-link blue-background'>
                 <a data-toggle='modal' href='#dokkeluarga'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>SCAN IJIN KELUARGA</div>
                </a>
            </div>
            
        </div>
    </div>
</div>

<!--             <h4>PRINT DOKUMEN </h4>

<div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_desa/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>IJIN DESA</div>
                </a>
            </div>
                        <div class='span2 box-quick-link blue-background'>
                  <a href='<?php echo site_url().'/surat_rekom_ijin/index/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>IJIN DISNAKER</div>
                </a>
            </div>
        </div>

    </div>
</div>
 -->

<!-- <div class='modal hide fade' id='dokktp' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update KTP</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="">
                                    <div class="zoom"><img src="" alt="KTP" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updatektp');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="ktp"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : </label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div> -->

             <!-- Modal Update KTP -->
            <div class='modal hide fade' id='dokktp' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update KTP</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="<?php echo base_url(); ?>assets/scanktp/<?php echo "".$row->ktp; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/scanktp/<?php echo "".$row->ktp; ?>" alt="KTP" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('detaildisnaker/updatektp');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="ktp"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_ktp; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

             <!-- Modal Update KTP -->
            <div class='modal hide fade' id='dokkuasa' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update SURAT KUASA</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KUASA"  href="<?php echo base_url(); ?>assets/scankuasa/<?php echo "".$row->kuasa; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/scankuasa/<?php echo "".$row->kuasa; ?>" alt="KUASA" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('detaildisnaker/updatekuasa');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="kuasa"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_kuasa; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

  <!-- Modal Update KTP -->
            <div class='modal hide fade' id='doknyata' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update SURAT PERNYATAAN</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="NYATA"   href="<?php echo base_url(); ?>assets/scannyata/<?php echo "".$row->nyata; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/scannyata/<?php echo "".$row->nyata; ?>" alt="NYATA" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('detaildisnaker/updatenyata');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="nyata"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_nyata; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

  <!-- Modal Update KTP -->
            <div class='modal hide fade' id='doklegal' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update SURAT LEGALITAS</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="LEGAL"  href="<?php echo base_url(); ?>assets/scanlegal/<?php echo "".$row->legal; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/scanlegal/<?php echo "".$row->legal; ?>" alt="LEGAL" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('detaildisnaker/updatelegal');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="legal"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_legal; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update KTP -->
            <div class='modal hide fade' id='dokkeluarga' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update SURAT IJIN KELUARGA</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KELUARGA"  href="<?php echo base_url(); ?>assets/scankeluarga/<?php echo "".$row->keluarga; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/scankeluarga/<?php echo "".$row->keluarga; ?>" alt="KELUARGA" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('detaildisnaker/updatekeluarga');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="legal"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_keluarga; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

  <?php }?>