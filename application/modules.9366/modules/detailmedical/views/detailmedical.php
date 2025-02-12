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
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                     <?php 
                        $this->load->view('template/menuadministrasi');
                    ?>
                                </div>

                                <div class="span8">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailmedicalid ?></small></h4>
                                <?php }?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Pra Medical</a>
                        </div>

                            <div class='span12 box bordered-box orange-border' >
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
                                             <th>Jenis Medical</th>
                                             <th>Hasil Medical</th>
                                             <th>Tanggal Medical</th>
                                             <th>Keterangan</th>
                                               <th>Option</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->jenismedical;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->keterangan;?></td>

                                        <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
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
             </div>
             </br>

<div class="span8">
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahb' role='button'>Tambah Full Dari Pra</a>
                        </div>

             <div class='span12 box bordered-box orange-border' >
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
                                             <th>Jenis Medical</th>
                                             <th>Hasil Medical</th>
                                             <th>Tanggal Medical</th>
                                             <th>Keterangan</th>
                                               <th>Option</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical2 as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->jenismedical;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->keterangan;?></td>

                                                                                <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit2<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus2<?php echo $no; ?>"><span>Hapus</span></td>
                                            
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

                                <div class="span8">
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a class='btn btn-info btn-large' data-toggle='modal' href='#tambahc' role='button'>Tambah Full Langsung</a>
                        </div>

             <div class='span12 box bordered-box orange-border' >
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
                                             <th>Jenis Medical</th>
                                             <th>Hasil Medical</th>
                                             <th>Tanggal Medical</th>
                                             <th>Keterangan</th>
                                               <th>Option</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_medical3 as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->jenismedical;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->keterangan;?></td>

                                                                               <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit3<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus3<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

                                        <div class='modal hide fade' id='edit3<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Medical Pra</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('detailmedical/ubahmedicaldata3'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_medical" value="<?php echo $row->id_medical; ?>">

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
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tanggal"  placeholder='Select datepicker' type='text'  value="<?php echo $row->tanggal; ?>"/>
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
