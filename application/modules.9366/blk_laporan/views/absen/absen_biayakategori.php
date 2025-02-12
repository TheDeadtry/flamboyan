
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            $this->load->view('blk_laporan/absen/_sidebar');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-info">
                                <h5 class="panel-title">
                                    Data Absensi + Biaya Per Kategori
                                </h5>
                                <div class="heading-elements">
                                </div>     
                            </div>
                            <div class="panel-body">
                                <form target='_blank' action="<?php echo site_url('blk_laporan/dataabsen_biayakategori_print');?>" enctype="multipart/form-data" method="post"/>

                                    <div class="form-group">
                                        <div class="row">
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
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-md-2">Pilih Tipe</label>
                                            <div class="col-md-10">
                                                <select class="select-results-color" name="jk">
                                                    <option value="TKL">TKL</option>
                                                    <option value="TKW">TKW</option>
                                                    <option value="MF">MF</option>
                                                    <option value="MI">MI</option>
                                                    <option value="FF">FF</option>
                                                    <option value="FI">FI</option>
                                                    <option value="JP">JP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Dari Tanggal</label>
                                        <div class="col-md-10">
                                            <input class="form-control dewdate2" type="text"  placeholder="EX: 2017-04-30" name="date1">
                                            <span class="help-block">Using <code>input type="date"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Sampai Tanggal</label>
                                        <div class="col-md-10">
                                            <input class="form-control dewdate2" type="text"  placeholder="EX: 2017-04-30" name="date2">
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
            </div>
        </div>
    </div>