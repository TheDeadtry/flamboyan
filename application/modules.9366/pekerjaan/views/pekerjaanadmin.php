<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Usaha </span>
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
                    <li class='active'>Data Usaha </li>
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
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahkategori' role='button'>Tambah Jenis Usaha</a>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahusaha' role='button'>Tambah Pekerjaan</a>

</div>  </div> 
</br>

                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Kategori Jenis Usaha</div>
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
                                            <th>Kategori</th>
                                            <th>Bhs Taiwan</th>
                                             <th>Ubah</th>
                                              <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_kategori_pekerjaan as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->isi;?></td>
                                            <td><?php echo $row->mandarin;?></td>
                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a> 
                                            </td> 
                                            <td>
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

                                          <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>UPDATE PEKERJAAN</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('pekerjaan/update_kategoripekerjaan'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $row->id_kategori; ?>">

                                           <div class="control-group">
                                                            <label class="control-label"> Jenis Usaha</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kategoripekerjaan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->isi; ?>" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Jenis Usaha (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kategoripekerjaan_taiwan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" value="<?php echo $row->mandarin; ?>" />
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('pekerjaan/hapus_kategoripekerjaan'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Kategori Usaha</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $row->id_kategori; ?>">
                              <p>Apakah anda yakin akan menghapus data Kategori Usaha ini? : <?php echo $row->isi; ?></p>
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
 <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Jenis Usaha</div>
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
                                            <th>Nama Jenis Usaha</th>
                                            <th>Bhs Taiwan</th>
                                            <th>kategori</th>
                                             <th>Ubah</th>
                                             <th>Hapus</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $no = 1; 
                                                foreach ($tampil_data_pekerjaan as $row2) { ?>
                                        <tr class="odd gradeX">
                                              <td><?php echo $no;?></td>
                                            <td><?php echo $row2->isi;?></td>
                                            <td><?php echo $row2->mandarin;?></td>
                                             <td><?php echo $row2->kategorinya;?></td>

                                               <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#editpekerjaanss<?php echo $no; ?>"><span>Edit</span></a>  
                                            </td>
                                            <td>
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapuspekerjaan<?php echo $no; ?>"><span>Hapus</span></td>
                                        </tr>

                                           <div class='modal hide fade' id='editpekerjaanss<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>UPDATE PEKERJAAN</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('pekerjaan/update_pekerjaan'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_pekerjaan" value="<?php echo $row2->id_pekerjaan; ?>">

                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama Jenis Usaha</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pekerjaan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row2->isi; ?>"/>
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Jenis Usaha (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pekerjaan_taiwan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" value="<?php echo $row2->mandarin; ?>"/>
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

  
 <div class="modal fade" id="hapuspekerjaan<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('pekerjaan/hapus_pekerjaan'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Pekerjaan</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_pekerjaan" value="<?php echo $row2->id_pekerjaan; ?>">
                              <p>Apakah anda yakin akan menghapus data Pekerjaan ini? : <?php echo $row2->isi; ?></p>
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

                      <div class='modal hide fade' id='tambahkategori' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Jenis Usaha</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('pekerjaan/simpan_data_kategoripekerjaan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                       
                                    <div class="control-group">
                                                            <label class="control-label"> Jenis Usaha</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kategoripekerjaan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Jenis Usaha (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_kategoripekerjaan_taiwan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                    
                       <div class='modal hide fade' id='tambahusaha' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Jenis Usaha</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('pekerjaan/simpan_data_pekerjaan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                       
                                      
                                                            <div class="control-group">
                                                                <label class="control-label">Kategori </label>
                                                                <div class="controls">
                                                                    <select name="kategori" class="span11 " data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                 <?php  foreach ($tampil_data_kategori_pekerjaan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_kategori;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                                
                                    <div class="control-group">
                                                            <label class="control-label">Nama Jenis Usaha</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pekerjaan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                    <div class="control-group">
                                                            <label class="control-label">Jenis Usaha (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pekerjaan_taiwan" class="span11 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>

                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>