

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">Invoice</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span>Invoice</span></a>
                </div>
            </div>
        </div>
        
    </div>

    <div class="page-container">

        <div class="page-content">

            <div class="content-wrapper">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title"> 
                        </h5>
                    </div>
                    <div class="panel-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-highlight">
                                <li class="active"><a href="#badges-tab1" data-toggle="tab" aria-expanded="false"> Data Invoice<span class="badge badge-success position-right"><?php echo $total_invoice ?></span></a></li>
                                <!--<li class=""><a href="#badges-tab2" data-toggle="tab" aria-expanded="true">Tambah Invoice</a></li>-->
                                <!--<li class=""><a href="#badges-tab3" data-toggle="tab" aria-expanded="true">Setting Tipe Invoice</a></li>-->
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="badges-tab1">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="komproter">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>TAHUN</th>
                                                    <th>BULAN</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

            </div>

        </div>




        <script type="text/javascript" charset="utf-16">

        $('#komproter').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url"       : "<?php echo site_url('invoice/show_data') ?>",
                "type"      : "POST"
            }
        });
        $('#ndektor').dataTable();
        </script>


