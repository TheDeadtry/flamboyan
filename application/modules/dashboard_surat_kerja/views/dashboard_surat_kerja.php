<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <h3><span>SURAT PERJANJIAN KERJA <strong>( FORMAL/ INFORMAL/ PANTI-JOMPO )</strong></span></h3>
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
                    <li class='active'>Print Surat Perjanjian Penempatan</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

                           <div class='row-fluid'>
                            <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header red-background'>
                                <div class='title'>Data TKI Formal</div>
                                <div class='actions'>
                           			 <a href="<?php echo site_url().'/surat_kerja_formal'; ?>" role="button" class="btn btn-primary" data-toggle="modal">Lihat Detail Data</a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Nama TKI</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama;?></td>
                                        </tr>
                                        
                                        </tbody>
                                         <?php $no++;
                                        } ?>

                                </table>    
                                </div>
                                </div>
                                </div>
                                </div>
                                
                                		
                                
                                 <div class="span3">
                                <div class='box-content box-statistic red-background'>
                                    <h3 class='title text-success'><?php echo $hitung_data_mf;?></h3>
                                    <br>
                                    <small>TKI Formal Siap/Telah Cetak</small>
                                    <div class='text-success icon-group align-right'></div>
                                </div>
                                <div class='box-content box-statistic orange-background'>
                                    <h3 class='title text-success'><?php echo $hitung_data_mi;?></h3>
                                    <br>
                                    <small>TKI Informal Siap/Telah Cetak</small>
                                    <div class='text-success icon-group align-right'></div>
                                </div>
                                <div class='box-content box-statistic green-background'>
                                    <h3 class='title text-success'><?php echo $hitung_data_jp;?></h3>
                                    <br>
                                    <small>TKI Panti Jompo Siap/Telah Cetak</small>
                                    <div class='text-success icon-group align-right'></div>
                                </div>
                            </div>
                                
                                </div>
                                <br>
                                <div class='row-fluid'>
                            <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data TKI Informal</div>
                                <div class='actions'>
                           			 <a href="<?php echo site_url().'/surat_kerja_informal'; ?>" role="button" class="btn btn-primary" data-toggle="modal">Lihat Detail Data</a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal2 as $rows) { ?>
                                        <tr>
                                            <td>#</td>
                                            <td>Nama TKI</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rows->nama;?></td>
                                        </tr>
                                        
                                        </tbody>
                                         <?php $no++;
                                        } ?>

                                </table>    
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <br>
                            
                            <div class='row-fluid'>
                            <div class='span8 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header green-background'>
                                <div class='title'>Data TKI Panti Jompo</div>
                                <div class='actions'>
                           			 <a href="<?php echo site_url().'/surat_kerja_jompo'; ?>" role="button" class="btn btn-primary" data-toggle="modal">Lihat Detail Data</a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal3 as $rows) { ?>
                                        <tr>
                                            <td>#</td>
                                            <td>Nama TKI</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $rows->nama;?></td>
                                        </tr>
                                        
                                        </tbody>
                                         <?php $no++;
                                        } ?>

                                </table>    
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                              
                            