
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <span class="text-semibold">DATA BIODATA PRINT PER TGL KELUAR ID</span>
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
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a type="button" href="<?php echo site_url('databio/') ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
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
                    <form target='_blank' action="<?php echo site_url('databio/printdatatglprocess');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                        <div class="form-group">
                            <label class="control-label col-md-2">Tanggal Keluar ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text"  placeholder="EX: 2017-04-30" name="date1">
                                <span class="help-block">Using <code>input type="date"</code></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Hingga</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text"  placeholder="EX: 2017-04-30" name="date2">
                                <span class="help-block">Using <code>input type="date"</code></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-warning">PRINT <i class="fa fa-print position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/pages/form_select2.js"></script>
