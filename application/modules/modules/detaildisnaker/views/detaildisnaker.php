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
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                    

                                    <?php 
                        $this->load->view('template/menudalam');
                    ?>

                    
        
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>
<?php   
                                  if($hitungdisnaker==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                        </div>
                                 <?php foreach ($tampil_data_disnaker as $row) { ?>
                                    <table class="table table-borderless">
                                        <tbody>
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
                                           
                                            <tr>
                                                <td class="span2">pendidikan :</td>
                                                <td> <?php echo $row->pendidikan;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> alamat :</td>
                                                <td> <?php echo $row->alamat;?> </td>
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
                                                <td class="span2"> namaahli :</td>
                                                <td> <?php echo $row->namaahli;?> </td>
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
                                                <td class="span2"> Negara :</td>
                                                <td> <?php echo $row->negara;?> </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="span2"> Jabatan :</td>
                                                <td> <?php echo $row->jabatan;?> </td>
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
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detaildisnaker/tambahdisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <?php foreach ($tampil_data_personal as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$idbiodatanya ?>" class="hidden" />

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
                        
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4"> Tanggal Lahir </label>
                                                                <div class="controls">
                                                                <input type="text" name="tanggallahir" value="<?php echo "".$row->tgllahir ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jenis kelamin</label>
                                                                <div class="controls">
                                                                <input type="text" name="jenis_kelamin" value="<?php echo "".$row->jeniskelamin ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Agama</label>
                                                                <div class="controls">
                                                                <input type="text" name="agama" value="<?php echo "".$row->agama ?>" class="span4 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"   />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4">Status</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="status" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo "".$row->status ?>" /><?php echo "".$row->status ?>
                                                                        <option value="Belum Nikah" />Belum Nikah
                                                                        <option value="Menikah" />Menikah
                                                                        <option value="Cerai" />Cerai
                                                                        <option value="Cerai mati" />Cerai mati
                                                                        </select>
                                                                </div>
                                                            </div>

                                                                <div class="control-group">
                                                                <label class="control-label span4">Pendidikan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="pendidikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->pendidikan;?>"  /><?php echo $row->pendidikan;?>"
                                                                        <option value="SD" />SD
                                                                        <option value="SLTP" />SLTP
                                                                        <option value="SLTA" />SLTA
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Alamat Lengkap</label>
                                                            <div class="controls">
                                                                <textarea class="span6 " name="alamat" rows="3"><?php echo "".$row->alamat ?></textarea>
                                                            </div>
                                                            </div>
                                  <?php }?>                     

 <?php foreach ($tampil_data_family as $row2) { ?>
                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Ayah </label>
                                                            <div class="controls">
                                                                <input type="text" name="namaayah" value="<?php echo "".$row2->nama_bapak ?>" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Nama Ibu </label>
                                                            <div class="controls">
                                                                <input type="text" name="namaibu" value="<?php echo "".$row2->nama_ibu ?>"class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                        
                                                            <div class="control-group">
                                                                <label class="control-label span4">Hubungan Kontak Darurat</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaahli" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Ayah" />Ayah
                                                                        <option value="Ibu" />Ibu
                                                                        <option value="Istri" />Istri
                                                                         <option value="Suami" />Suami
                                                                          <option value="Anak" />Anak
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group hidden">
                                                            <label class="control-label span4"> Nama Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" name="namakontak" class="span7 popovers "  data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
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
                                                                <input type="text" name="teleponkontak" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group hidden">
                                                            <label class="control-label span4"> Hubungan Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" name="hubugankonta" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
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
                                                                <label class="control-label span4"> Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class="span7 " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="<?php echo $row->jeniskelamin;?>"  /><?php echo $row->jeniskelamin;?>
                                                                        <option value="Pria" />Pria
                                                                        <option value="Wanita" />Wanita
                                                                        </select>
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
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4">Status</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="status" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->status;?>"  /><?php echo $row->status;?>"
                                                                        <option value="Belum Nikah" />Belum Nikah
                                                                        <option value="Menikah" />Menikah
                                                                        <option value="Cerai" />Cerai
                                                                        <option value="Cerai mati" />Cerai mati
                                                                        </select>
                                                                </div>
                                                            </div>

                                                           <div class="control-group">
                                                                <label class="control-label span4">Pendidikan</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="pendidikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->pendidikan;?>"  /><?php echo $row->pendidikan;?>"
                                                                        <option value="SD" />SD
                                                                        <option value="SLTP" />SLTP
                                                                        <option value="SLTA" />SLTA
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Alamat</label>
                                                            <div class="controls">
                                                                <textarea class="span6 "  name="alamat" rows="3"><?php echo $row->alamat;?></textarea>
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

                                                            <div class="control-group">
                                                                <label class="control-label span4">Nama Ahli Waris</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="namaahli" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->namaahli;?>" /><?php echo $row->namaahli;?>
                                                                        <option value="Ayah" />Ayah
                                                                        <option value="Ibu" />Ibu
                                                                        <option value="Istri" />Istri
                                                                        </select>
                                                                </div>
                                                            </div>

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

                                                            <div class="control-group">
                                                            <label class="control-label span4"> Hubungan Kontak Darurat </label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $row->hubkontak;?>" name="hubugankontak" class="span7 popovers" data-trigger="hover" data-content="Isi Hubungan darah " data-original-title="Hubungan darah " />
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
            <<div class='span2 box-quick-link blue-background'>
                 <a data-toggle='modal' href='#doklegal'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>SCAN LEGALITAS</div>
                </a>
            </div>
            
        </div>
    </div>
</div>

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
                                <a class="fancybox-button" data-rel="fancybox-button" title="KUASA" href="<?php echo base_url(); ?>assets/scankuasa/<?php echo "".$row->kuasa; ?>">
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
                                <a class="fancybox-button" data-rel="fancybox-button" title="NYATA" href="<?php echo base_url(); ?>assets/scannyata/<?php echo "".$row->nyata; ?>">
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
                                <a class="fancybox-button" data-rel="fancybox-button" title="LEGAL" href="<?php echo base_url(); ?>assets/scanlegal/<?php echo "".$row->legal; ?>">
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
  <?php }?>