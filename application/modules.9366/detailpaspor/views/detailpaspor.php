<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Paspor </span>
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
                    <li class='active'>Detail Paspor </li>
                </ul>
            </div>
        </div>
    </div>
</div> 


	                       

<div class="row-fluid">

                    <div class="row-fluid">


            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Paspor</div>
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
                                     <?php }?>                                <?php }?>
<div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>

            <div class='span4 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_pasportampil'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'><b>Paspor Baru</b></div>
                    <div class='content'><b>0 DOKUMEN</b></div> 
                </a>
            </div>
            <div class='span4 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_pasporbaru'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'><b>Paspor Tampil LIST TERBANG DAN PK</b></div>
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
<?php   
                                  if($hitungpaspor==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>
                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini...  <a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Data</a>
                        </div>

 <?php }?>

  <div class="row-fluid">
<div class='span12 box bordered-box orange-border'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Paspor</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Option</th>
                                            <th>PASPORT 護照</th>
                                            <th>Nomor Passpor</th>
                                             <th>Issuing Office</th>
                                             <th>Tanggal Berlaku</th>
                                             <th>Tanggal Terima</th>
                                             <th>Tanggal Pengajuan</th>
                                             <th>Tanggal Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                         foreach ($tampil_data_paspor as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                                <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                             <td> <?php echo $row->keterangan;?> </td>
                                            <td><?php echo $row->nopaspor;?></td>
                                             <td><?php echo $row->office;?></td>
                                             <td> <?php echo $row->tglterbit." - ".str_replace("-",".",$row->expired);?> </td>
                                                <td> <?php echo $row->tglterima." (".$row->statusterima.")";?> </td>
                                                <td> <?php echo $row->tglpengajuan." (".$row->statuspengajuan.")";?> </td>
                                                 <td> <?php echo $row->tglfoto." (".$row->statusfoto.")";?> </td>

                                        
                                            
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Paspor</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('tambahpaspor/ubahpaspordata'); ?>">
                           <div class="modal-body">
                           
                          <input type="text" id="id_paspor" name="id_paspor" value="<?php echo "". $row->id_paspor; ?>" class="hidden" />

                                                             <div class="control-group">
                                                                <label class="control-label span4"> PASPORT  護照 </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="paspor" id="paspor" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="<?php echo $row->keterangan;?>" /><?php echo $row->keterangan;?>
                                                                        <option value="sudah" />Sudah
                                                                        <option value="belum" />Belum
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="nomorpaspor" >
                                                            <label class="control-label span4">Nomor Paspor</label>
                                                            <div class="controls">
                                                                <input type="text" name="nomorpaspor" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Paspor yang di gunakan " data-original-title="Nama Paspor" value="<?php echo $row->nopaspor;?>"/>
                                                            </div>

                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Terbit Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitpas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Tempat Terbit Passpor</label>
                                                            <div class="controls">
                                                                <input type="text" name="office"  class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="<?php echo $row->office;?>"/>
                                                            </div>
                                                            </div>

                                                            

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Pengajuan Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglpengajuanpas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglpengajuan;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                         
                                                                         <?php if($row->statuspengajuan=="A"){ ?>
                                                                        <label class='radio '>
                                                                         <input type='radio' name="ajua" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ajua" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                                        <?php } else{?>
                                                                            <label class='radio '>
                                                                         <input type='radio' name="ajua" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ajua" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                            <?php }?>
       
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="rencana">
                                                                <label class="control-label span4">Tanggal Foto (in) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglfotopas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglfoto;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                            <?php if($row->statusfoto=="A"){ ?>
                                                                        <label class='radio '>
                                                                         <input type='radio' name="fotoa" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fotoa" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                                        <?php } else{?>
                                                                            <label class='radio '>
                                                                         <input type='radio' name="fotoa" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fotoa" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                            <?php }?>
       

                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="rencana">
                                                                <label class="control-label span4">Tanggal terima buku</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="trimabuku"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                             <?php if($row->statusterima=="A"){ ?>
                                                                        <label class='radio '>
                                                                         <input type='radio' name="trima" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="trima" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                                        <?php } else{?>
                                                                            <label class='radio '>
                                                                         <input type='radio' name="trima" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="trima" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                            <?php }?>
       

                                                          
                                        
                             
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('tambahpaspor/hapuspaspordata'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Paspor</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_paspor" value="<?php echo $row->id_paspor; ?>">
                              <p>Apakah anda yakin akan menghapus data Paspor ini? : <?php echo $row->nopaspor; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>



                                </div>
                            </div>


                        </div>

</div>
</div>
  <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan Menambah data pada tombol ini...  <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahb' role='button'>Tambah Paspor Lama</a>
                        </div>
  <div class="row-fluid">


<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Paspor Lama</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                             <th>Option</th>
                                            <th>Nomor Passpor</th>
                                             <th>Issuing Office</th>
                                             <th>Tanggal Berlaku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                         foreach ($tampil_data_pasporlama as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                                  <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit2<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus2<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                            <td><?php echo $row->nopaspor;?></td>
                                             <td><?php echo $row->office;?></td>
                                             <td> <?php echo $row->tglterbit." - ".str_replace("-",".",$row->expired);?> </td>

                                      
                                        </tr>

 <div class='modal hide fade' id='edit2<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Paspor</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('tambahpaspor/ubahpaspordatalama'); ?>">
                           <div class="modal-body">
                           
                          <input type="text" id="id_paspor" name="id_paspor" value="<?php echo "". $row->id_paspor; ?>" class="hidden" />

                                                            

                                                            <div class="control-group" id="nomorpaspor" >
                                                            <label class="control-label span4">Nomor Paspor</label>
                                                            <div class="controls">
                                                                <input type="text" name="nomorpaspor" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Paspor yang di gunakan " data-original-title="Nama Paspor" value="<?php echo $row->nopaspor;?>"/>
                                                            </div>

                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Terbit Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitpas"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit;?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Tempat Terbit Passpor</label>
                                                            <div class="controls">
                                                                <input type="text" name="office"  class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="<?php echo $row->office;?>"/>
                                                            </div>
                                                            </div>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


 <div class="modal fade" id="hapus2<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('tambahpaspor/hapuspaspordatalama'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Paspor</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_paspor" value="<?php echo $row->id_paspor; ?>">
                              <p>Apakah anda yakin akan menghapus data Paspor ini? : <?php echo $row->nopaspor; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>



                                </div>
                            </div>


                        </div>


  <div class='modal hide fade' id='tambaha' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Data Paspor</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('tambahpaspor/tambahpaspordata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group">
																<label class="control-label span4"> PASPORT  護照 </label>
																<div class="controls">
																	<select class="span7 " name="paspor" id="paspor" data-placeholder="Choose a Category" tabindex="1">
																		<option value="" />Select...
																		<option value="sudah" />Sudah
																		<option value="belum" />Belum
																		</select>
																</div>
															</div>

															<div class="control-group" id="nomorpaspor" >
                                                            <label class="control-label span4">Nomor Paspor</label>
                                                            <div class="controls">
                                                                <input type="text" name="nomorpaspor" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Paspor yang di gunakan" data-original-title="Nama Paspor" />
                                                            </div>

                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Terbit Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitpas"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Tempat Terbit Passpor</label>
                                                            <div class="controls">
                                                                <input type="text" name="office"  class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
                                                            </div>
                                                            </div>

															

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Pengajuan Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglpengajuanpas"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                         <label class='radio '>
                                                                            <input type='radio' name="ajua" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ajua" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="rencana">
                                                                <label class="control-label span4">Tanggal Foto (in) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglfotopas"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                         <label class='radio '>
                                                                            <input type='radio' name="fotoa" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fotoa" value='C' checked />
                                                                            Calculation
                                                                        </label>

                                                                </div>
                                                            </div>

															<div class="control-group" id="rencana">
																<label class="control-label span4">Tanggal terima buku</label>
																<div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="trimabuku"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                         <label class='radio '>
                                                                            <input type='radio' name="trima" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="trima" value='C' checked />
                                                                            Calculation
                                                                        </label>

																</div>
															</div>

                                                          
                                                            

                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>

            <div class='modal hide fade' id='tambahb' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Data Paspor</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('tambahpaspor/tambahpaspordatalama');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                          

                                                            <div class="control-group" id="nomorpaspor" >
                                                            <label class="control-label span4">Nomor Paspor</label>
                                                            <div class="controls">
                                                                <input type="text" name="nomorpaspor" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Paspor yang di gunakan" data-original-title="Nama Paspor" />
                                                            </div>

                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Terbit Paspor</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitpas"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Tempat Terbit Passpor</label>
                                                            <div class="controls">
                                                                <input type="text" name="office"  class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
                                                            </div>
                                                            </div>


                                                           
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>

