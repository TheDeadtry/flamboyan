                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Upload Perjanjian Kerja </span>
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
                    <li class='active'>Data Upload Perjanjian Kerja  </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

<div class="row-fluid">

                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Dokumen Perjanjian Kerja</div>
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
                                    
                                </div>

                                <div class="span9">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>

<?php if($hitungan==0){?>
               <div class="row-fluid">
                            <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data UPLOAD kabur</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <form action="<?php echo site_url('upload_kabur/simpan_data_kabur');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<br>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />



                                   <div class="control-group">
                                        <label class="control-label">Nama Dokumen </label>
                                        <div class="controls">
                                            <input type="text" name="namadok" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status Keperluan</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="penting"  >
                                                    <option value="perlu" />Perlu
                                                    <option value="tdkperlu" />Tidak Perlu

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="cekdokumen"  >
                                                    <option value="O" />Original
                                                    <option value="C/F" />Copy / File
                                                    <option value="P" />Print
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                        <label class="control-label">Keterangan </label>
                                        <div class="controls">
                                            <input type="text" name="keterangan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>




<div class="form-actions">
                                            <?php echo form_submit('submit', 'Tambah', "class = 'btn blue'"); ?>
                                               
                                        </div>
                                    </form>
                        </div>

                        <?php }else{ ?>
 <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data UPLOAD kabur</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>

<?php foreach ($tampil_data_kabur as $row) { ?>
                            <form action="<?php echo site_url('upload_kabur/update_data_kabur');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<br>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
<input type="hidden" class="form-control" name="id_kabur" value="<?php echo $row->id_kabur; ?>">



                                  <div class="control-group">
                                        <label class="control-label">Nama Dokumen </label>
                                        <div class="controls">
                                            <input type="text" name="namadok" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->namadok; ?>"/>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status Keperluan</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="penting"  >
                                                <option value="<?php echo $row->penting; ?>" /><?php echo $row->penting; ?>
                                                    <option value="perlu" />Perlu
                                                    <option value="tdkperlu" />Tidak Perlu

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="cekdokumen"  >
                                                <option value="<?php echo $row->cekdokumen; ?>" /><?php echo $row->cekdokumen; ?>
                                                    <option value="O" />Original
                                                    <option value="C/F" />Copy / File
                                                    <option value="P" />Print
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                        <label class="control-label">Keterangan </label>
                                        <div class="controls">
                                            <input type="text" name="keterangan" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->keterangan; ?>" />
                                        </div>
                                        </div>




<div class="form-actions">
                                            <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                               
                                        </div>
                                    </form>
                        </div>

                        <?php } }?>

                                                            <div class='span3 box box-transparent'>
        <div class='row-fluid'>
            <div class=' box-quick-link blue-background'>
                  <!-- <a href='<?php echo site_url().'/tambah1/cetak/'.$detailpersonalid; ?>' target="_blank"> -->
                                    <a href='<?php echo site_url().'/upload_kabur/uploadfile/'.$detailpersonalid; ?>'>
                    <div class='header'>
                        <div class='icon-upload'></div>
                    </div>
                    <div class='content'>UPLOAD FILE</div>
                </a>
            </div>
        </div>
    </div>
                    </div>


<div class='span12'>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-picture'></i>
                <span>File</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="index.html"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li></li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class='row-fluid'>
<div class='span12 box'>
<div class='box-content'>
<div class='row-fluid'>
<div class='span12'>
<div class='gallery'>
<ul class='unstyled inline'>
<?php $no = 1;  foreach ($ambildatafoto as $rows) { ?>
<li>
    <div class='picture'>
        <div class='tags'>
           <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></a>
        </div>
        <div class='actions'>
            <div class='pull-left'>
                <a href="#" class="btn btn-link"><small>
                    <i class='icon-user'></i>
                    <?php echo $rows->namafile;?>

                </small>
                </a>
            </div>
        </div>
         <a target="_blank" href="<?php echo base_url().'upload-kabur/'.$rows->namafile;?>"<?php echo $rows->namafile;?>>
                                                        <?php if (strpos($rows->namafile, '.doc') !== false){?>
                                                          <img width="200" src="<?php echo base_url(); ?>assets/dokmajikan/nodok.jpg"/></a> 
                                                        <?php }else{?>
                                                           <img width="200" src="<?php echo base_url(); ?>upload-kabur/<?php echo "".$rows->namafile ?>"/></a> 
                                                        <?php } ?>
                                        
                        
    </div>
</li>
 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-1" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('upload_kabur/hapus_data_kabur'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data kabur</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id" value="<?php echo $rows->id; ?>">
                              <p>Apakah anda yakin akan menghapus data ini? : <?php echo $rows->namafile; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

 <?php  $no++; }?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
