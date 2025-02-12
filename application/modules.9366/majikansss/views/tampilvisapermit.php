<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Hisrtory Visa Permit </span>
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
                    <li class='active'>Detail History Visa Permit</li>
                </ul>
            </div>
        </div>
    </div>
</div>  

                          <div class='row-fluid'>
    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahagama' role='button'>Tambah History Visa Permit</a>

</div>  </div> 

                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Visapermit  </div>
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
                                            <th>Tanggal Terima</th>
                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_datahistoryvisapermit as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->tgl_terima;?></td>
                                            <td>
                                                 <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a> 
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Visapermit</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/update_history_visapermit/'.$idnya); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_visapermithistory" value="<?php echo $row->id_visapermithistory; ?>">

                                         <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Simpan visapermit </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' value="<?php echo $row->tgl_terima; ?>" data-format='yyyy.MM.dd' name="tgl_terima"  placeholder='Select datepicker' type='text' />
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


 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapus_history_visapermit/'.$idnya); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data History</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_visapermithistory" value="<?php echo $row->id_visapermithistory; ?>">
                              <p>Apakah anda yakin akan menghapus data History ini? : <?php echo $row->id_visapermithistory; ?></p>
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
</div></div>
                    </div>

   <div class='modal hide fade' id='tambahagama' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah History visapermit </h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('majikans/simpan_history_visapermit/'.$idnya);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                             <input type="hidden" class="form-control" name="id_visapermithistory" value="<?php echo $idnya; ?>">


                                                             
                                <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terima"  placeholder='Select datepicker' type='text' />
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