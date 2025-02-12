
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">Beranda</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span>Dashboard</span></a>
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

                <!-- Main charts -->

                <!-- /main charts -->


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert bg-info alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                             Welcome <span class="text-semibold">admin</span> PT Flamboyan Gema Jasa
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-3">

                                <!-- Members online -->
                                <div class="panel bg-teal-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="reload"></a></li>
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php echo $blk_tki ?></h3>
                                        TKI DI BLK
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div class="container-fluid">
                                        <div id="members-online"></div>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="col-lg-3">

                                <!-- Current server load -->
                                <div class="panel bg-pink-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                             <ul class="icons-list">
                                                <li><a data-action="reload"></a></li>
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php echo $blk_non ?></h3>
                                         TKI NON TAIWAN
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="server-load"></div>
                                </div>
                                <!-- /current server load -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Today's revenue -->
                                <div class="panel bg-blue-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="reload"></a></li>
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php echo $blk_taiwan ?></h3>
                                        TKI TAIWAN
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->

                            </div>
                            
                            <div class="col-lg-3">

                                <!-- Current server load -->
                                <div class="panel bg-pink-400">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="reload"></a></li>
                                            </ul>
                                        </div>

                                        <h3 class="no-margin"><?php echo $tki_all ?></h3>
                                        TKI KESELURUHAN
                                        <div class="text-muted text-size-small"></div>
                                    </div>

                                <div id="server-load"></div>
                                </div>
                            </div>
                                <!-- /current server load -->

                        </div>


                            
                    </div>


                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. <a href="#">PT FLAMBOYAN GEMAJASA</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /page container -->

        <script type="text/javascript" charset="utf-16">
            $('#example').dataTable({
                scrollY: '400px',
                paging: false,
                "ordering": false
            });
        </script>





