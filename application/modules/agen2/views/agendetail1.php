                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Agen </span>
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
                    <li class='active'>Detail Agen </li>
                </ul>
            </div>
        </div>
    </div>
</div>  
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Yang Paling atas adalah data Agreement Terbaru
                        </div>
                        <div class='row-fluid'>

                          <div class='row-fluid'>
    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahagama' role='button'>Tambah Agreement</a>
 <a href="<?php echo site_url('agen/'); ?>" class='btn btn-info btn-large' type="button">Kembali</a>

</div>  </div> 
</br>
                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Agreement  <?php echo $tampil_jenis_agree1.' - '.$tampil_nama_agree1; ?></div>
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
                                            <th>Nomor Agree</th>
                                             <th>Tanggal Berlaku</th>
                                              <th>Tanggal Berakhir</th>
                                               <th>Tanggal Terima</th>

                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_agree1 as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td><?php echo $row->noagree1;?></td>
                                              <td><?php echo $row->tglberlaku1;?></td>
                                               <td><?php echo $row->tglberakhir1;?></td>
                                                <td><?php echo $row->tglterima1;?></td>

                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

                                         <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Agreement <?php echo $row->noagree1; ?> </h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('agen/update_agree1/'.$idagree); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_agree1" value="<?php echo $row->id_agree1; ?>">

                           <div class="control-group">
                                                            <label class="control-label">No Agreement</label>
                                                            <div class="controls">
                                                                <input type="text" name="noagree"  value="<?php echo $row->noagree1; ?>"class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             
                                   <div class="control-group">
                                                                <label class="control-label">Tanggal AGREEMENT Berlaku</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy'  value="<?php echo $row->tglberlaku1; ?>"name="berlaku"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal AGREEMENT Selesai</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' value="<?php echo $row->tglberakhir1; ?>" name="selesai"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terima AGREEMENT</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' value="<?php echo $row->tglterima1; ?>" name="tgl_terimaagree"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('agen/hapus_agree1/'.$idagree); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Agreement</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_agree1" value="<?php echo $row->id_agree1; ?>">
                              <p>Apakah anda yakin akan menghapus data Agree ini? : <?php echo $row->noagree1; ?></p>
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

                                         <div class='modal hide fade' id='tambahagama' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Agreement  <?php echo $tampil_jenis_agree1; ?></h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('agen/simpan_data_agree1/'.$idagree);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />


<input type="hidden" class="form-control" name="id_agen" value="<?php echo $idagree; ?>">

                                  <div class="control-group">
                                                            <label class="control-label">No Agreement</label>
                                                            <div class="controls">
                                                                <input type="text" name="noagree" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             
                                   <div class="control-group">
                                                                <label class="control-label">Tanggal AGREEMENT Berlaku</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="berlaku"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal AGREEMENT Selesai</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="selesai"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terima AGREEMENT</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tgl_terimaagree"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                      