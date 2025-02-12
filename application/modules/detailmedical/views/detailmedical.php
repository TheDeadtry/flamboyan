<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Medical </span>
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
                    <li class='active'>Detail Medical </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


	                       

<div class="row-fluid">

            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Medical</div>
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

                                <div class="span8">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>

                        <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
           <div class='span4 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_medikal'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'><b>Sertifikat Medikal Pra</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div>
                </a>
            </div>
             <div class='span4 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_serkes'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'><b>SERKES</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div>
                </a>
            </div>
            <div class='span4 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_medikalfull'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'><b>Sertifikan Medikal Full</b></div>
                     <div class='content'><b>0 DOKUMEN</b></div>
                </a>
            </div>

        </div>
    </div>
</div>


                            <div class='span12 box bordered-box orange-border' >
                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Pra Medical</a>
                        </div>
                            <div class='box-header orange-background'>
                                <div class='title'>Pra Medical</div>
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
                                             <th>Jenis Medical</th>
                                             <th>Nomor Surat</th>
                                             <th>Nama Klinik</th>
                                             <th>Nama Dokter</th>
                                             <th>Hasil Medical</th>
                                             <th>Tanggal Medical</th>
                                             <th>Keterangan</th>
                                               


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            <td><?php echo $row->jenismedical;?></td>
                                            <td><?php echo $row->d_nomor;?></td>
                                            <td><?php echo $row->d_klinik;?></td>
                                            <td><?php echo $row->d_dokter;?></td>

                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->keterangan;?></td>

                                       
                                            
                                        </tr>

                                        <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Medical Pra</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/ubahmedicaldata'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">

                                         <div class="control-group">
                                                            <label class="control-label span4">Jenis Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="jenis" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="Pra" />
                                                            </div>
                                                            </div>


                                                              <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical/TGL SURAT KETERANGAN SEHAT</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tanggal; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
                                                            <label class="control-label span4">NOMOR SURAT KETERANGAN SEHAT  </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="d_nomor" value="<?php echo $row->d_nomor; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">NAMA PUSKEMAS / KLINIK  </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="d_klinik" value="<?php echo $row->d_klinik; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">NAMA DOKTER PENANDATANGAN SURAT KETERANGAN SEHAT  </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="d_dokter" value="<?php echo $row->d_dokter; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                                <label class="control-label span4"> Hasil Medical </label>
                                                                <div class="controls">
                                                                   <select class="span7 " name="hasilmedical" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option  value="<?php echo $row->nama; ?>"/><?php echo $row->nama; ?>
                                                                        <?php  foreach ($tampil_data_pilihanmedical as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                            <div class="control-group">
                                                            <label class="control-label span4">Keterangan: </label>
                                                            <div class="controls">
                                                                <input type="text" name="keterangan" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="<?php echo $row->keterangan; ?>"/>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/hapusmedical'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Medical</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">
                              <p>Apakah anda yakin akan menghapus data Medical ini? : <?php echo $row->id_medical; ?></p>
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

             </br>

<div class="span12">


             <div class='span12 box bordered-box orange-border' >
                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahb' role='button'>Tambah Full Dari Pra</a>
                        </div>
                            <div class='box-header orange-background'>
                                <div class='title'>Medical Full dari Pra</div>
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
                                             <th>Jenis Medical</th>
                                             <th>Nomor Medical</th>
                                             <th>Nama Medical</th>
                                             <th>Hasil Medical</th>
                                             <th>Tanggal Medical</th>
                                             <th>Tanggal Sidik Jari</th>
                                             <th>Keterangan</th>
                                              


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical2 as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit2<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus2<?php echo $no; ?>"><span>Hapus</span></td>
                                            <td><?php echo $row->jenismedical;?></td>
                                             <td><?php echo $row->nomedical;?></td>
                                            <td><?php echo $row->namamedical;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->tglsidik;?></td>
                                            <td><?php echo $row->keterangan;?></td>

                                                                               
                                            
                                        </tr>

                                        <div class='modal hide fade' id='edit2<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Medical Pra</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/ubahmedicaldata2'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">

                                         <div class="control-group">
                                                            <label class="control-label span4">Jenis Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="jenis" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="Pra" />
                                                            </div>
                                                            </div>
                                                               <div class="control-group">
                                                            <label class="control-label span4">Nomor Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="nomed" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"  value="<?php echo $row->nomedical; ?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Nama Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="named" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"  value="<?php echo $row->namamedical; ?>"/>
                                                            </div>
                                                            </div>


                                                              <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tanggal; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>

                                                         <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">TGL Sidik Jari Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsidik"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tglsidik; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                                <label class="control-label span4"> Hasil Medical </label>
                                                                <div class="controls">
                                                                   <select class="span7 " name="hasilmedical" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option  value="<?php echo $row->nama; ?>"/><?php echo $row->nama; ?>
                                                                        <?php  foreach ($tampil_data_pilihanmedical as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                            <div class="control-group">
                                                            <label class="control-label span4">Keterangan: </label>
                                                            <div class="controls">
                                                                <input type="text" name="keterangan" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="<?php echo $row->keterangan; ?>"/>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/hapusmedical2'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Medical</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">
                              <p>Apakah anda yakin akan menghapus data Medical ini? : <?php echo $row->id_medical; ?></p>
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

                                <div class="span12">


             <div class='span12 box bordered-box orange-border' >
                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahc' role='button'>Tambah Full Langsung</a>
                        </div>
                            <div class='box-header orange-background'>
                                <div class='title'>Medical Full</div>
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

                                             <th>Jenis Medical</th>
                                             <th>Nomor Medical</th>
                                             <th>Nama Medical</th>
                                             <th>Hasil Medical</th>
                                             <th>Tanggal Medical</th>
                                             <th>Tanggal Sidik Jari</th>
                                             <th>Keterangan</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical3 as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit3<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus3<?php echo $no; ?>"><span>Hapus</span></td>
                                            <td><?php echo $row->jenismedical;?></td>
                                            <td><?php echo $row->nomedical;?></td>
                                            <td><?php echo $row->namamedical;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->tglsidik;?></td>
                                            <td><?php echo $row->keterangan;?></td>

                                                                              
                                            
                                        </tr>

                                        <div class='modal hide fade' id='edit3<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Medical Full</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/ubahmedicaldata3'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">

                                         <div class="control-group">
                                                            <label class="control-label span4">Jenis Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="jenis" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="full langsung"  />
                                                            </div>
                                                            </div>
                                                                <div class="control-group">
                                                            <label class="control-label span4">Nomor Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="nomed" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"  value="<?php echo $row->nomedical; ?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Nama Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="named" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"  value="<?php echo $row->namamedical; ?>"/>
                                                            </div>
                                                            </div>



                                                              <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tanggal; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div> 

                                                        <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">TGL Sidik Jari Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsidik"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tglsidik; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
                                                                <label class="control-label span4"> Hasil Medical </label>
                                                                <div class="controls">
                                                                   <select class="span7 " name="hasilmedical" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option  value="<?php echo $row->nama; ?>"/><?php echo $row->nama; ?>
                                                                        <?php  foreach ($tampil_data_pilihanmedical as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                            <div class="control-group">
                                                            <label class="control-label span4">Keterangan: </label>
                                                            <div class="controls">
                                                                <input type="text" name="keterangan" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="<?php echo $row->keterangan; ?>"/>
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


 <div class="modal fade" id="hapus3<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/hapusmedical3'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Medical</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">
                              <p>Apakah anda yakin akan menghapus data Medical ini? : <?php echo $row->id_medical; ?></p>
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

                                
                                
                                <div class="space5"></div>

                        


                                          <div class='modal hide fade' id='tambaha' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Pra Medical</h3>
                </div>
                <div class='modal-body'> 
<form action="<?php echo site_url('detailmedical/tambahmedicaldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailmedicalid ?>" class="hidden" />

                                                           <div class="control-group">
                                                            <label class="control-label span4">Jenis Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="jenis" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="Pra" />
                                                            </div>
                                                            </div>


                                                              <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">NOMOR SURAT KETERANGAN SEHAT  </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="d_nomor" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">NAMA PUSKEMAS / KLINIK  </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="d_klinik" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label span4">NAMA DOKTER PENANDATANGAN SURAT KETERANGAN SEHAT  </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="d_dokter" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="" />
                                                            </div>
                                                        </div>
														
														<div class="control-group">
                                                                <label class="control-label span4"> Hasil Medical </label>
                                                                <div class="controls">
                                                                   <select class="span7 " name="hasilmedical" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pilihanmedical as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                            <div class="control-group">
                                                            <label class="control-label span4">Keterangan: </label>
                                                            <div class="controls">
                                                                <input type="text" name="keterangan" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
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
                    <h3>Tambah Full dari Pra</h3>
                </div>
                <div class='modal-body'> 
<form action="<?php echo site_url('detailmedical/tambahmedicaldata2');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailmedicalid ?>" class="hidden" />

                                                           <div class="control-group">
                                                            <label class="control-label span4">Jenis Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="jenis" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="full dari pra" />
                                                            </div>
                                                            </div>

                                                               <div class="control-group">
                                                            <label class="control-label span4">Nomor Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="nomed" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Nama Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="named" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"/>
                                                            </div>
                                                            </div>



                                                              <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>

                                                        <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">TGL Sidik Jari Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsidik"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
                                                                <label class="control-label span4"> Hasil Medical </label>
                                                                <div class="controls">
                                                                   <select class="span7 " name="hasilmedical" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pilihanmedical as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                            <div class="control-group">
                                                            <label class="control-label span4">Keterangan: </label>
                                                            <div class="controls">
                                                                <input type="text" name="keterangan" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
                                                            </div>
                                                            </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>

             <div class='modal hide fade' id='tambahc' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah FUll Langsung</h3>
                </div>
                <div class='modal-body'> 
<form action="<?php echo site_url('detailmedical/tambahmedicaldata3');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailmedicalid ?>" class="hidden" />

                                                           <div class="control-group">
                                                            <label class="control-label span4">Jenis Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="jenis" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" value="full langsung" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Nomor Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="nomed" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label span4">Nama Medical </label>
                                                            <div class="controls">
                                                                <input type="text" class="span7 popovers" data-trigger="hover" name="named" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical"/>
                                                            </div>
                                                            </div>


                                                              <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">日期 Tanggal Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                         <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">TGL Sidik Jari Medical</label>
                                                                <div class="controls">
                                                                   <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsidik"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                                <label class="control-label span4"> Hasil Medical </label>
                                                                <div class="controls">
                                                                   <select class="span7 " name="hasilmedical" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_pilihanmedical as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                            <div class="control-group">
                                                            <label class="control-label span4">Keterangan: </label>
                                                            <div class="controls">
                                                                <input type="text" name="keterangan" class="span7 popovers" data-trigger="hover" data-content="Isi sesuai no medical yang lengkap" data-original-title="Nomor Medical" />
                                                            </div>
                                                            </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
