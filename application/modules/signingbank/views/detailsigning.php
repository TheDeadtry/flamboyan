<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Pengajuan Signing Bank </span>
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
                    <li class='active'>Detail Signing bank </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="row-fluid">

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail legalitas</div>
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
                                  if($hitungsigning==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data  pada tombol ini... <br>

                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Legalitas</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data  pada tombol ini... <br>
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Legalitas</a>
                        </div>
  <?php foreach ($tampil_data_signing as $pilihan) { ?>


                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Nama Bank :</td>
                                                <td> <?php echo $pilihan->nama_bank; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> TGL APPLY CS :</td>
                                                <td> <?php echo $pilihan->tglapplycs; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> TGL TRM CS :</td>
                                                 <td> <?php echo $pilihan->tglterimacs; 

                                                        $hasil= $pilihan->statustglterimacs;
                                                        if($hasil=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> TGL APPLY LEG :</td>
                                                <td> <?php echo $pilihan->tglapplyleg; ?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> TGL TRM LEG :</td>
                                                 <td> <?php echo $pilihan->tgltrmleg; 

                                                        $hasil= $pilihan->statustgltrmleg;
                                                        if($hasil=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>

                                             <tr>
                                                <td class="span3"> Tanggal Bank  :</td>
                                                <td> <?php echo $pilihan->tgl_bank; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal TKI TTD  :</td>
                                                <td> <?php echo $pilihan->tgl_tki_ttd; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Nama Kredit  :</td>
                                                <td> <?php echo $pilihan->namakredit; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Periode Kredit  :</td>
                                                <td> <?php echo $pilihan->isikredit; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Nilai Kredit  :</td>
                                                <td> <?php echo $pilihan->nilaikredit; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> TGL DOK KEMBALI KE BANK :</td>
                                                <td> <?php echo $pilihan->tgldokbank; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> NO.REK TKI   :</td>
                                                <td> <?php echo $pilihan->norektki; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> TGL APPLY PRIBADI   :</td>
                                                <td> <?php echo $pilihan->pribadi; ?></td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> KARANTINA   :</td>
                                                <td> <?php echo $pilihan->karantina; ?></td>
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
                    <h3>Tambah Signing Bank</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('signingbank/tambahsigning');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group">
                            <label class="control-label">Nama Bank</label>
                              <div class="controls">
                                <select class="span7 " id="nama_bank"name="nama_bank" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="" />Select
                                    <?php  foreach ($tampil_data_bank as $pilihan) { ?>
                                     <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                      <?php
                                     } ?>
                                    </select> 
                              </div>

                              </div>
<!-- 
                         <div class="control-group">
                            <label class="control-label">Nama Bank</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_bank" value="<?php echo $row->nama_bank;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>  -->    
                                 

            <div class="control-group">
            <label class="control-label"> Tanggal Apply CS </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tglapplycs"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

<div class="control-group">
                                                                <label class="control-label">TGL TRM CS  </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tglterimacs"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <label class='radio '>
                                                                            <input type='radio' name="statustglterimacs" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="statustglterimacs" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>
               <div class="control-group">
            <label class="control-label">TGL APPLY LEG </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tglapplyleg"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

    <div class="control-group">
                                                                <label class="control-label">TGL TRM LEG   </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgltrmleg"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <label class='radio '>
                                                                            <input type='radio' name="statustgltrmleg" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="statustgltrmleg" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>                       

          <!--   <div class="control-group">
            <label class="control-label"> Tanggal Bank</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_bank"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div> -->
          <div class="control-group">
            <label class="control-label"> Tanggal Bank</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_bank"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

          <div class="control-group">
            <label class="control-label">Tanggal Tki Tandatangan </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_tki_ttd" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>  

          <div class="control-group">
                            <label class="control-label">Jenis Kredit </label>
                              <div class="controls">
                                <select class="span7 " name="idkredit" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="" />select
                                    <?php  foreach ($tampil_data_kredit as $pilihan) { ?>
                                     <option value="<?php echo $pilihan->id_kreditbank;?>" /><?php echo $pilihan->namakredit; echo " - ".$pilihan->isikredit; echo " - ".$pilihan->nilaikredit;?>
                                      <?php
                                     } ?>
                                    </select> 
                              </div>

                              </div>

                         <div class="control-group">
            <label class="control-label">Tanggal DOK KEMBALI KE BANK  </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgldokbank"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

           <div class="control-group">
                                                            <label class="control-label "> NO.REK TKI </label>
                                                            <div class="controls">
                                                                <input type="text" name="norektki" class=" popovers" data-trigger="hover" data-content="" data-original-title="" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
            <label class="control-label">TGL APPLY PRIBADI  </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="pribadi"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>
                                                            <div class="control-group">
                                                            <label class="control-label "> KARANTINA </label>
                                                            <div class="controls">
                                                                <input type="text" name="karantina" class=" popovers" data-trigger="hover" data-content="" data-original-title="" />
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
                    <h3>Ubah Legalitas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('signingbank/ubahsigning');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_signing as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

     <div class="control-group">
                            <label class="control-label">Nama Bank</label>
                              <div class="controls">
                                <select class="span7 " id="nama_bank"name="nama_bank" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $row->nama_bank;?>" /><?php echo $row->nama_bank;?>
                                    <?php  foreach ($tampil_data_bank as $pilihan) { ?>
                                     <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                      <?php
                                     } ?>
                                    </select> 
                              </div>

                              </div>

                         

            <div class="control-group">
            <label class="control-label"> Tanggal Apply CS </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  value="<?php echo $row->tglapplycs;?>" name="tglapplycs"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

          <div class="control-group">
                                                                <label class="control-label">TGL TRM CS </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo $row->tglterimacs;?>" name="tglterimacs"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                <?php $tglb= $row->statustglterimacs;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="statustglterimacs" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="statustglterimacs" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="statustglterimacs" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="statustglterimacs" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                 
                                                                </div> 
                                                            </div>
<!-- 
                         <div class="control-group">
                            <label class="control-label">Nama Bank</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_bank" value="<?php echo $row->nama_bank;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>  -->    

            <!-- <div class="control-group">
            <label class="control-label"> Tanggal Apply CS </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tglapplycs" value="<?php echo $row->tglapplycs;?>"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div> -->

          <div class="control-group">
            <label class="control-label">TGL APPLY LEG </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tglapplyleg"  value="<?php echo $row->tglapplyleg;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

          <div class="control-group">
                                                                <label class="control-label">Tanggal TERIMA LEG</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo $row->tgltrmleg;?>" name="tgltrmleg"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                <?php $tglb= $row->statustgltrmleg;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="statustgltrmleg" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="statustgltrmleg" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="statustgltrmleg" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="statustgltrmleg" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                 
                                                                </div> 
                                                            </div>


                     <!--             <div class="control-group">
            <label class="control-label"> Tanggal Bank</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_bank"  value="<?php echo $row->tgl_bank;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div> -->
               <div class="control-group">
            <label class="control-label"> Tanggal Bank</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd'  value="<?php echo $row->tgl_bank;?>" name="tgl_bank"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tanggal Tki Tandatangan </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_tki_ttd"  value="<?php echo $row->tgl_tki_ttd;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>  

          <div class="control-group">
                            <label class="control-label">Jenis Kredit </label>
                              <div class="controls">
                                <select class="span7 " name="idkredit" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $row->idkredit;?>" /><?php echo $row->namakredit; echo " - ".$row->isikredit; echo " - ".$row->nilaikredit;?>
                                    <?php  foreach ($tampil_data_kredit as $pilihan) { ?>
                                     <option value="<?php echo $pilihan->id_kreditbank;?>" /><?php echo $pilihan->namakredit; echo " - ".$pilihan->isikredit; echo " - ".$pilihan->nilaikredit;?>
                                      <?php
                                     } ?>
                                    </select> 
                              </div>

                              </div>

                                <div class="control-group">
            <label class="control-label">Tanggal DOK KEMBALI KE BANK  </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgldokbank" value="<?php echo $row->tgldokbank;?>"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

           <div class="control-group">
                                                            <label class="control-label "> NO.REK TKI </label>
                                                            <div class="controls">
                                                                <input type="text" name="norektki" value="<?php echo $row->norektki;?>" class=" popovers" data-trigger="hover" data-content="" data-original-title="" />
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="control-group">
            <label class="control-label">TGL APPLY PRIBADI  </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="pribadi"  placeholder='Select datepicker' type='text' value="<?php echo $row->pribadi;?>" />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>
                                                            <div class="control-group">
                                                            <label class="control-label "> KARANTINA </label>
                                                            <div class="controls">
                                                                <input type="text" name="karantina" class=" popovers" data-trigger="hover" data-content="" data-original-title="" value="<?php echo $row->karantina;?>" />
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