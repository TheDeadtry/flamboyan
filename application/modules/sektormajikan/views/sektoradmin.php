<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Sektor Majikan </span>
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
                    <li class='active'>Sektor Data </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>
                    <div class="row-fluid">



                                                    <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Biodata Tkw</div>
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
                                            <th>Sektor</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_sektor as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->sektor;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><a href="<?php echo site_url('sektormajikan/update_data_sektor/'.$row->id); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a> 
                                                <a href="<?php echo site_url('sektormajikan/hapus_data_sektor/'.$row->id); ?>" class="btn btn-mini" type="button">Hapus</a></td>
                                        </tr>
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
            <div class='span6 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Input Sektor</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content box-no-padding'>
                                        <br>
        <?php echo form_open('sektormajikan/simpan_data_sektor', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                <div class="control-group">
                    <label class="control-label">Kode Sektor</label>
                    <div class="controls">
                        <input type="text" name="sektor" class="span10 popovers" data-trigger="hover" data-content="Isi Sesuai kode misal: FF, FI, MF, dll" data-original-title="Kode Sektor"/>
                    </div>
                </div>
                                            
                <div class="control-group">
                    <label class="control-label">Nama</label>
                    <div class="controls">
                        <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
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
</div>