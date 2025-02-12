
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">PERSONAL BLK</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span>PERSONAL BLK</span></a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-md-1">
            </div>
<div class="col-md-10">
    <!-- /page header -->
<div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Filter Data</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
<form target='_blank' action="<?php echo site_url('dashboard/printabsenbiayakat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />


                                 <div class="form-group">
                                    <label class="control-label col-md-2">Pilih Pemilik</label>
                                    <div class="col-md-10">
                                                 <select class="select-results-color" name="namapemilikx">
                                                    <option value=""></option>
                                                   <?php  foreach ($tampil_data_pemilik as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->negara;?>
                                                   <?php } ?>
                                                </select>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                    <label class="control-label col-md-2">Pilih Tipe</label>
                                    <div class="col-md-10">
                                                 <select class="select-results-color" name="jk">
                                                    <option value="TKL">TKL</option>
                                                    <option value="TKW">TKW</option>
                                                    <?php
                                                    //get data sektor
                                                    $getSektor = $this->db->query("SELECT kode_jenis kode, isi text, IF(jeniskelamin = '女 Perempuan','icon-woman','icon-man') gen FROM datasektor ORDER BY kode_jenis ASC")->result();
                                                    ?>
                                                    <?php foreach($getSektor as $sektor) :?>
                                                        <option value="<?= $sektor->kode ?>"><?= $sektor->kode ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                        </div>
                                    </div>

<div class="form-group">
                                    <label class="control-label col-md-2">Dari Tanggal</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text"  placeholder="EX: 2017-04-30" name="date1">
                                        <span class="help-block">Using <code>input type="date"</code></span>
                                    </div>
                                </div>
<div class="form-group">
                                    <label class="control-label col-md-2">Sampai Tanggal</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text"  placeholder="EX: 2017-04-30" name="date2">
                                        <span class="help-block">Using <code>input type="date"</code></span>
                                    </div>
                                </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Biaya</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="biaya" value="25000">
                            </div>
                        </div>


<div class="text-right">
                                <button type="submit" class="btn btn-primary">Tampilkan DATA Finger <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
  



</form>
  </div>
                    </div>
                     </div>

 </div>
