
    <div class="row">

        <div class="col-md-1">
        </div>

        <div class="col-md-10">
    <!-- /page header -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a type="button" href="<?php echo site_url('databio/') ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                    <h3 class="panel-title text-center">PRINT LAPORAN REKOM DISNAKER</h3>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <form target='_blank' action="<?php echo site_url('cetak_laprekdisnaker/cetaklap');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih Bulan</label>
                            <div class="col-md-7">
                                <select class="select-results-color" name="bulandaftx">
                                    <?php 
                                        $bulan_arr = array (
                                            1 => 'JANUARI',
                                            2 => 'FEBRUARI',
                                            3 => 'MARET',
                                            4 => 'APRIL',
                                            5 => 'MEI',
                                            6 => 'JUNI',
                                            7 => 'JULI',
                                            8 => 'AGUSTUS',
                                            9 => 'SEPTEMBER',
                                            10 => 'OKTOBER',
                                            11 => 'NOVEMER',
                                            12 => 'DESEMBER',
                                        );
                                        for ($x=1; $x<=12; $x++) {
                                            $selopt = '';
                                            if ($x == date('m')) {
                                                $selopt = 'selected="selected"';
                                            }
                                    ?>
                                            <option value="<?php echo $x ?>" <?php echo $selopt ?>><?php echo $bulan_arr[$x]; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="select-results-color" name="tahuner">
                                    <?php 
                                        $startYear = 2010;
                                        $limitYear = date('Y')+3;

                                        for ($x=$startYear; $x<=$limitYear; $x++) {
                                            $selopt = '';
                                            if ($x == date('Y')) {
                                                $selopt = 'selected="selected"';
                                            }
                                    ?>
                                            <option value="<?php echo $x ?>" <?php echo $selopt ?>><?php echo $x ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih Sektor</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="pilsek">
                                    <option value="PR"/> PROSES
                                    <option value="PD" disabled="disabled" /> PENDING
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                PRINT 
                                <i class="icon-arrow-right14 position-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" charset="utf-16">
</script>