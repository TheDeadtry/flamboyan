                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Nama Disnaker </span>
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
                    <li class='active'>Data Nama Disnaker </li>
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
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahnamadisnaker' role='button'>Tambah Nama Disnaker</a>

</div>  </div>
</br>
                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data nama disnaker</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area' style='height: 400px;width: 100%; overflow-x: scroll;overflow-y: scroll;'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Nama Disnaker</th>
                                             <th>Alamat Disnaker</th>
                                             <th>Wilayah Disnaker</th>
                                             <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                                foreach ($tampil_data_namadisnaker as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->namadisnaker;?></td>
											<td><?php echo $row->alamatdisnaker;?></td>
											<td><?php echo $row->wilayah;?></td>
                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>

                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update nama disnaker</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('namadisnaker/update_data_namadisnaker'); ?>">
                           <div class="modal-body">

                          <input type="hidden" class="form-control" name="id_namadisnaker" value="<?php echo $row->id_namadisnaker; ?>">

                                         <div class="control-group">
                                                            <label class="control-label">Nama Disnaker</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_disnaker" class="span10 popovers" value="<?php echo $row->namadisnaker; ?>"/>
                                                            </div>
                                                            </div>

                                    <div class="control-group">
                                                            <label class="control-label">Alamat Disnaker</label>
                                                            <div class="controls">
                                                                <input type="text" name="alamat_disnaker" class="span10 popovers" value="<?php echo $row->alamatdisnaker; ?>"/>
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Wilayah Disnaker</label>
                                                            <div class="controls">
                                                                <input type="text" name="wilayah_disnaker" class="span10 popovers" value="<?php echo $row->wilayah; ?>"/>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('namadisnaker/hapus_data_namadisnaker'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data namadisnaker</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_namadisnaker" value="<?php echo $row->id_namadisnaker; ?>">
                              <p>Apakah anda yakin akan menghapus data namadisnaker ini? : <?php echo $row->namadisnaker; ?></p>
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
                                    <h4><i class="icon-reorder"></i>Input agama</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                                <div class="widget-body">

<?php echo form_open('agama/simpan_data_agama', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>


                                    <div class="control-group">
                                                            <label class="control-label">Nama agama</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_agama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>

                                    <div class="control-group">
                                                            <label class="control-label">Nama agama (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_agama_taiwan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
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

                                         <div class='modal hide fade' id='tambahnamadisnaker' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah namadisnaker</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('namadisnaker/simpan_data_namadisnaker');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                 <div class="control-group">
                                                            <label class="control-label">Nama Disnaker</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_disnaker" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>

                                    <div class="control-group">
                                                            <label class="control-label">Alamat Disnaker</label>
                                                            <div class="controls">
                                                                <input type="text" name="alamat_disnaker" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Wilayah Disnaker</label>
                                                            <div class="controls">
                                                                <input type="text" name="wilayah_disnaker" class="span10 popovers"/>
                                                            </div>
                                                            </div>

                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
