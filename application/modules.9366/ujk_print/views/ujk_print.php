
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
                    <h3 class="panel-title text-center">PRINT LAPORAN BULANAN PESERTA UJK</h3>
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
                    <form target='_blank' action="<?php echo site_url('ujk_print/cetakujk');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih Bulan UJK</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="bulanujkx">
                                    <?php
                                        foreach ($nama_bulan as $key => $value) 
                                        {
                                    ?>
                                            <option value="<?php echo $value['no'] ?>"> <?php echo $value['no'].' '.$value['value'] ?> </option>
                                    <?php 
                                        }
                                    ?><!--
                                    <option value="01,JANUARI"/> JANUARI
                                    <option value="02,FEBRUARI"/> FEBRUARI
                                    <option value="03,MARET"/> MARET
                                    <option value="04,APRIL"/> APRIL
                                    <option value="05,MEI"/> MEI
                                    <option value="06,JUNI"/> JUNI
                                    <option value="07,JULI"/> JULI
                                    <option value="08,AGUSTUS"/> AGUSTUS
                                    <option value="09,SEPTEMBER"/> SEPTEMBER
                                    <option value="10,OKTOBER"/> OKTOBER
                                    <option value="11,NOVEMBER"/> NOVEMBER
                                    <option value="12,DESEMBER"/> DESEMBER-->

                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">PRINT <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
