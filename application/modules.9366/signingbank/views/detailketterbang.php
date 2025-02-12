<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Setelah Terbang </span>
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
                    <li class='active'>Detail Setelah Terbang </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


<div class="row-fluid " >

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Setelah Terbang</div>
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
<?php   
  if($hitungterbang==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>
                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini...  <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>

 <?php }?>

  <div class="row-fluid">
<div class='span12 box bordered-box orange-border'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Keadaan Setelah Terbang</div>
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
                                            <th>Tanggal Terima Info</th>
                                            <th>Tanggal Kejadian</th>
                                            <th>Kejadian</th>
                                            <th>Nilai Kekurangan<br/>Cicilan Bank</th>
                                            <th>Nilai Kekurangan<br/>Cicilan Bank2</th>
                                            <th>Keterangan Kejadian</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                         foreach ($tampil_data_terbang as $row) { 
                                            $cicils1 = explode( " X NTD.", $row->nilai_kekurangan_cicilan_bank );
                                            $cicils2 = explode( " X NTD.", $row->nilai_kekurangan_cicilan_bank2 );

                                            $cicilz1 = "";
                                            $cicilz2 = "";
                                            if ( count($cicils1) == 2 )
                                            {
                                              $cicilz1 = $cicils1[0];
                                              $cicilz2 = $cicils1[1];
                                            }

                                            $cicilx1 = "";
                                            $cicilx2 = "";
                                            if ( count($cicils1) == 2 )
                                            {
                                              $cicilx1 = $cicils2[0];
                                              $cicilx2 = $cicils2[1];
                                            }
                                          ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                                <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                             <td> <?php echo $row->tgl_setelah_terbang;?> </td>
                                             <td><?php echo $row->tgl_kejadian ?></td>
                                             <td> <?php echo $row->kejadian_nama ?></td>
                                             <td><?php echo $row->nilai_kekurangan_cicilan_bank; ?></td>
                                             <td><?php echo $row->nilai_kekurangan_cicilan_bank2; ?></td>
                                            <td><?php echo $row->ket_setelah_terbang;?></td>

                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Keadaan</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('signingbank/ubahsetelahterbang'); ?>">
                           <div class="modal-body">
                           
                          <input type="text" name="id_setelahterbang" value="<?php echo "". $row->id_setelahterbang; ?>" class="hidden" />

                                                            <div class="control-group" >
                                                                <label class="control-label span4">Tanggal Terima Info</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_setelah_terbang" value="<?php echo "". $row->tgl_setelah_terbang; ?>" placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" >
                                                                <label class="control-label span4">Tanggal Kejadian</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_kejadian" value="<?php echo "". $row->tgl_kejadian; ?>" placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Kejadian</label>
                                                            <div class="controls">
                                                              <select name="kejadian" class="input-medium">
                                                                <option value="<?php echo $row->kejadian_id ?>"><?php echo $row->kejadian_nama ?></option>
                                                                <?php
                                                                  foreach ( $tampil_data_kejadian as $row23 )
                                                                  {
                                                                ?>
                                                                    <option value="<?php echo $row23->id ?>"><?php echo $row23->nama ?></option>
                                                                <?php 
                                                                  }
                                                                ?>
                                                              </select>
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Cicilan Bank kurang...</label>
                                                            <div class="controls">
                                                                <input type="text" name="kurang_cicil"  class="span4 popovers" value="<?php echo $cicilz1; ?>"/>
                                                                 X NTD.
                                                                <input type="text" name="kurang_cicil_b"  class="span4 popovers" value="<?php echo $cicilz2; ?>"/>
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Cicilan Bank kurang...</label>
                                                            <div class="controls">
                                                                <input type="text" name="kurang_cicil2" class="span4 popovers" value="<?php echo $cicilx1; ?>"/>
                                                                 X NTD.
                                                                <input type="text" name="kurang_cicil2_b"  class="span4 popovers" value="<?php echo $cicilx2; ?>"/>
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Ket Keadaan Terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="ket_setelah_terbang"  class="span7 popovers" value="<?php echo "". $row->ket_setelah_terbang; ?>"data-trigger="ket_setelah_terbang" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
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


 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('signingbank/hapussetelahterbang'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Kondisi</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_setelahterbang" value="<?php echo $row->id_setelahterbang; ?>">
                              <p>Apakah anda yakin akan menghapus data Kondisi ini? : <?php echo $row->tgl_setelah_terbang; ?></p>
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

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Keadaan</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('signingbank/tambahsetelahterbang');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />



                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Terima Info</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_setelah_terbang"  placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" >
                                                                <label class="control-label span4">Tanggal Kejadian</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_kejadian" placeholder='Select datepicker' type='text'/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='iconb-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Kejadian</label>
                                                            <div class="controls">
                                                              <select name="kejadian" class="input-medium">
                                                                <option></option>
                                                                <?php
                                                                  foreach ( $tampil_data_kejadian as $row23 )
                                                                  {
                                                                ?>
                                                                    <option value="<?php echo $row23->id ?>"><?php echo $row23->nama ?></option>
                                                                <?php 
                                                                  }
                                                                ?>
                                                              </select>
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Cicilan Bank kurang...</label>
                                                            <div class="controls">
                                                                <input type="text" name="kurang_cicil"  class="span4 popovers"/>
                                                                 X NTD.
                                                                <input type="text" name="kurang_cicil_b"  class="span4 popovers"/>
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Cicilan Bank kurang...</label>
                                                            <div class="controls">
                                                                <input type="text" name="kurang_cicil2" class="span4 popovers"/>
                                                                 X NTD.
                                                                <input type="text" name="kurang_cicil2_b"  class="span4 popovers"/>
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="office">
                                                            <label class="control-label span4">Ket Keadaan Terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="ket_setelah_terbang"  class="span7 popovers" data-trigger="ket_setelah_terbang" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
                                                            </div>
                                                            </div>
       
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>
