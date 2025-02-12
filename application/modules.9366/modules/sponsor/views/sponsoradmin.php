<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Sponsor </span>
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
                    <li class='active'>Data Sponsor </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						<a class='btn btn-info btn-large' id="printsponsor" role='button'>print Sponsor</a>
						</div>
                    <div class="row-fluid">


 <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Sponsor</div>
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
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'id="tabelSponsor">
 <thead>

                                        
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                             <th>Hadphone</th>
                                             <th>Email</th>
                                             <th>Alamat</th>
                                             <th>Status</th>
                                             <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_sponsor as $row) { ?>
                                        <tr>
                                           <td><?php echo $no;?></td>
                                            <td><?php echo $row->kode_sponsor;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->hp;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->alamat;?></td>
                                            <td><?php echo $row->status;?></td>
                                           <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

                                        <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>UPDATE SPONSOR</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('sponsor/update_sponsor'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="kode_sponsor" value="<?php echo $row->kode_sponsor; ?>">

        
                                                             <div class="control-group">
                                                            <label class="control-label">Kode </label>
                                                            <div class="controls">
                                                                <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->kode_sponsor; ?>" readonly/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Nama </label>
                                                            <div class="controls">
                                                                <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->nama; ?>"/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Handphone </label>
                                                            <div class="controls">
                                                                <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->hp; ?>"/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Email </label>
                                                            <div class="controls">
                                                                <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->email; ?>"/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Alamat </label>
                                                            <div class="controls">
                                                                <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->alamat; ?>"/>
                                                            </div>
                                                            </div>
                                                             <div class="control-group">
                                                                <label class="control-label">Status</label>
                                                                <div class="controls">
                                                                    <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="status">
                                                                        <option value="<?php echo $row->status; ?>" /><?php echo $row->status; ?>
                                                                        <option value="teman" />Teman
                                                                        <option value="sponsor" />Sponsor
																		<option value="agen" />Agen
                                                                        </select>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('sponsor/hapus_sponsor'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Sponsor</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="kode_sponsor" value="<?php echo $row->kode_sponsor; ?>">
                              <p>Apakah anda yakin akan menghapus data Sponsor ini? : <?php echo $row->nama; ?></p>
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

                <div class="row-fluid">


            <div class='span7 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Input Sponsor</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                            </br>
<?php echo form_open('sponsor/simpan_data_sponsor', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>

                                                                
                                                             <div class="control-group">
                                                            <label class="control-label">Kode </label>
                                                            <div class="controls">
                                                                <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Nama </label>
                                                            <div class="controls">
                                                                <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Handphone </label>
                                                            <div class="controls">
                                                                <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Email </label>
                                                            <div class="controls">
                                                                <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Alamat </label>
                                                            <div class="controls">
                                                                <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             <div class="control-group">
                                                                <label class="control-label">Status</label>
                                                                <div class="controls">
                                                                    <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="status">
                                                                        <option value="" />Select...
                                                                        <option value="teman" />Teman
                                                                        <option value="sponsor" />Sponsor
																		<option value="agen" />Agen
                                                                        </select>
                                                                </div>
                                                            </div>
                                        

                                                        
                                                            <div class="form-actions">
                                                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                            </div>
                                                            
                              <?php echo form_close(); ?>


                            </div>
        </div>


                    </div>
                    