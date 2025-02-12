    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Detail Personal</span> - BLK</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="index.html">Personal BLK</a></li>
                    <li><a href="user_pages_profile.html">Detail Personal</a></li>
                </ul>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-user"></i><span>Detail Personal</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">


                <div class="row">
                    <div class="col-lg-9">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">PEMBINAAN BLK</h5>

                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
                    
                            <?php 
                                $idbio_explode = explode("-",$idbio);
                                $tipe_id = $idbio_explode[0];

                                $kb  = '';
                                $ik  = '';
                                $ii  = '';
                                $ip  = '';
                                $ith = '';
                                $pkl = '';
                                $kej = '';
                                if ($collapse_form == 'kb') {
                                    $kb  = 'in';
                                } elseif ($collapse_form == 'ik') {
                                    $ik  = 'in';
                                } elseif ($collapse_form == 'ii') {
                                    $ii  = 'in';
                                } elseif ($collapse_form == 'ip') {
                                    $ip  = 'in';
                                } elseif ($collapse_form == 'ith') {
                                    $ith = 'in';
                                } elseif ($collapse_form == 'pkl') {
                                    $pkl = 'in';
                                } elseif ($collapse_form == 'kejadian') {
                                    $kej = 'in';
                                } else {
                                    if ($tipe_id == 'MF' || $tipe_id == 'FF') {
                                        $ik  = 'in';
                                    } else {
                                        $kb  = 'in';
                                    }
                                }
                            ?>

                            

                            <div class="panel-group" id="accordion-styled">
                                <?php 
                                    if ($tipe_id != 'MF' && $tipe_id != 'MI') {
                                ?>
                                        <div class="panel">
                                            <div class="panel-heading bg-danger">
                                                <h6 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">DATA KB (Click Disini!!..)</a>
                                                </h6>
                                            </div>
                                            <div id="accordion-styled-group1" class="panel-collapse collapse <?php echo $kb;?>">
                                                <?php 
                                                    $this->load->view('blk_personaldetail/blk_kb');
                                                ?>
                                            </div>
                                        </div>
                                <?php 
                                    }
                                ?>

                                <div class="panel">
                                    <div class="panel-heading bg-teal">
                                        <h6 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group2">IJIN KELUAR  (Click Disini!!..)</a>
                                        </h6>
                                    </div>
                                    <div id="accordion-styled-group2" class="panel-collapse collapse <?php echo $ik;?>">
                                        <?php 
                                            $this->load->view('blk_personaldetail/blk_ik');
                                        ?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading bg-orange">
                                        <h6 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3">IJIN INAP  (Click Disini!!..)</a>
                                        </h6>
                                    </div>
                                    <div id="accordion-styled-group3" class="panel-collapse collapse <?php echo $ii;?>">
                                        <?php 
                                            $this->load->view('blk_personaldetail/blk_ii');
                                        ?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading bg-green">
                                        <h6 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group4">IJIN PULANG  (Click Disini!!..)</a>
                                        </h6>
                                    </div>
                                    <div id="accordion-styled-group4" class="panel-collapse collapse <?php echo $ip;?>">
                                        <?php 
                                            $this->load->view('blk_personaldetail/blk_ip');
                                        ?>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading bg-warning">
                                        <h6 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group5">IJIN TIDAK HADIR  (Click Disini!!..)</a>
                                        </h6>
                                    </div>
                                    <div id="accordion-styled-group5" class="panel-collapse collapse <?php echo $ith;?>">
                                        <?php 
                                            $this->load->view('blk_personaldetail/blk_ith');
                                        ?>
                                    </div>
                                </div>

                                <?php 
                                    if ($tipe_id != 'MF' && $tipe_id != 'FF') {
                                ?>
                                        <div class="panel">
                                            <div class="panel-heading bg-primary">
                                                <h6 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group6">DATA PKL  (Click Disini!!..)</a>
                                                </h6>
                                            </div>
                                            <div id="accordion-styled-group6" class="panel-collapse collapse <?php echo $pkl; ?>">
                                                <?php 
                                                    $this->load->view('blk_personaldetail/blk_pkl');
                                                ?>
                                            </div>
                                        </div>
                                <?php 
                                    }
                                ?>

                                <div class="panel">
                                    <div class="panel-heading bg-purple">
                                        <h6 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group7">DATA KEJADIAN  (Click Disini!!..)</a>
                                        </h6>
                                    </div>
                                    <div id="accordion-styled-group7" class="panel-collapse collapse <?php echo $kej; ?>">
                                        <?php 
                                            $this->load->view('blk_personaldetail/blk_kejadian');
                                        ?>
                                    </div>
                                </div>


                        </div>
                        <!-- /accordion with different panel styling -->
                </div>
            </div>
                    
                 
                    <?php 
                        $this->load->view('blk_personaldetail/mini_sidebar');
                    ?>

            </div>
                <!-- /user profile -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->


        <!-- Footer -->
      <!--   <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div> -->
        <!-- /footer -->

    </div>
    <!-- /page container -->
                <!-- TAMBAH jenis_kb TKI -->
                <!-- /TAMBAH jenis_kb TKI -->

                                <!-- TAMBAH jenis_kb TKI -->
                
                <!-- /TAMBAH jenis_kb TKI -->

                                                <!-- TAMBAH jenis_kb TKI -->
                
                <!-- /TAMBAH jenis_kb TKI -->


                                                <!-- TAMBAH jenis_kb TKI -->
                
                <!-- /TAMBAH jenis_kb TKI -->


                                                <!-- TAMBAH jenis_kb TKI -->
                
                <!-- /TAMBAH jenis_kb TKI -->

                
                <!-- /TAMBAH jenis_kb TKI -->

<script type="text/javascript" charset="utf-16">

    $('#table1').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('#table2').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('#table3').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('#table4').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('#table5').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('#table6').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('#table7').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
    });
    $('.dewdate2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            minDate: "dateToday",
            todayBtn: "linked",
            clearBtn: true,
            zIndexOffset: 1600
        }).click(function() {    
            $(this).datepicker('setDate', $(this).val() );
        }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

</script>