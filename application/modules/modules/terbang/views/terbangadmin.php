                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Terbang </span>
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
                    <li class='active'>Data Terbang </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

                         <div class='row-fluid'>
    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahterbang' role='button'>Tambah Terbang</a>

</div>  </div> 
</br>

                   <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Terbang</div>
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
                                            <th>Nama Maskapai</th>
                                            <th>Kode Terbang</th>
                                            <th>Rute Terbang</th>
                                             <th>Jam Terbang</th>
                                             <th>Kode Terbang 2</th>
                                            <th>Rute Terbang 2</th>
                                             <th>Jam Terbang 2</th>
                                              <th>status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_terbang as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->namamaskapai;?></td>
                                            <td><?php echo $row->kodeterbang;?></td>
                                            <td><?php echo $row->ruteterbang;?></td>
                                             <td><?php echo $row->jamterbang;?></td>
                                             <td><?php echo $row->kodeterbang2;?></td>
                                            <td><?php echo $row->ruteterbang2;?></td>
                                             <td><?php echo $row->jamterbang2;?></td>

                                             <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Terbang</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('terbang/update_data_terbang'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_terbang" value="<?php echo $row->id_terbang; ?>">

                                     <div class="control-group">
                                                            <label class="control-label">Nama Maskapai</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_maskapai" value="<?php echo $row->namamaskapai; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(China Airlines)" data-original-title="Nama Maskapai" />
                                                            </div>
                                                            </div> 
                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jumlah Penerbangan </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlahpenerbangan" id="jumlahpenerbangan" ata-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="1" />1
                                                                        <option value="2" />2
                                                                        </select>
                                                                </div>
                                                            </div>
<div id="satupenerbangan">
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang" value="<?php echo $row->kodeterbang; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang" value="<?php echo $row->ruteterbang; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang" value="<?php echo $row->jamterbang; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div id="duapenerbangan">
</br>
</br>
</br>
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang2" value="<?php echo $row->kodeterbang2; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang2" value="<?php echo $row->ruteterbang2; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang2" value="<?php echo $row->jamterbang2; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div class="control-group">
                                                            <label class="control-label">Jam Tiba Tujuan</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_tiba" value="<?php echo $row->jamtiba; ?>" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(17:00)" data-original-title="Jam Tiba" />
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('terbang/hapus_data_terbang'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Terbang</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_terbang" value="<?php echo $row->id_terbang; ?>">
                              <p>Apakah anda yakin akan menghapus data Terbang ini? : <?php echo $row->namamaskapai; ?></p>
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
<!--                         <div class="span5">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Input terbang</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('terbang/simpan_data_terbang', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama Maskapai</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_maskapai" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(China Airlines)" data-original-title="Nama Maskapai" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jumlah Penerbangan </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlahpenerbangan" id="jumlahpenerbangan" ata-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="0" />Select...
                                                                        <option value="1" />1
                                                                        <option value="2" />2
                                                                        </select>
                                                                </div>
                                                            </div>
<div id="satupenerbangan">
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div id="duapenerbangan">
</br>
</br>
</br>
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang2" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang2" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang2" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div class="control-group">
                                                            <label class="control-label">Jam Tiba Tujuan</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_tiba" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(17:00)" data-original-title="Jam Tiba" />
                                                            </div>
                                                            </div>
                                                        
                                                            <div class="form-actions">
                                                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                            </div>
                                                            
                              <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div> -->
                    </div>
                    

                                           <div class='modal hide fade' id='tambahterbang' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Terbang</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('terbang/simpan_data_terbang');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                       
                                <div class="control-group">
                                                            <label class="control-label">Nama Maskapai</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_maskapai" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(China Airlines)" data-original-title="Nama Maskapai" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Jumlah Penerbangan </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="jumlahpenerbangan" id="jumlahpenerbangan" ata-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="0" />Select...
                                                                        <option value="1" />1
                                                                        <option value="2" />2
                                                                        </select>
                                                                </div>
                                                            </div>
<div id="satupenerbangan">
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div id="duapenerbangan">
</br>
</br>
</br>
                                    <div class="control-group">
                                                            <label class="control-label">Kode Terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="kode_terbang2" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(JT 654)" data-original-title="Kode Terbang" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Rute terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="rute_terbang2" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(SUB-KHH)" data-original-title="Rute Penerbangan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam terbang 2</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_terbang2" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(16:00-17:00)" data-original-title="Jam Terbang" />
                                                            </div>
                                                            </div>
</div>

<div class="control-group">
                                                            <label class="control-label">Jam Tiba Tujuan</label>
                                                            <div class="controls">
                                                                <input type="text" name="jam_tiba" class="span10 popovers" data-trigger="hover" data-content="Isi Dengan format dari ke ex=(17:00)" data-original-title="Jam Tiba" />
                                                            </div>
                                                            </div>
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                    