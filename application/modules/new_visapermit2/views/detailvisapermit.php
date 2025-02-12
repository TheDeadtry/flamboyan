
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Visa Permit </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetakvisapermit/'); ?>">Print Data Visa Permit</a>
                            <h5 class="panel-title text-center ">Data Visa Permit <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>  
                                        <th></th>  
                                        <th>File</th>
                                        <th>No Suhan</th>
                                        <th>No Visa Permit</th>
                                        <th>Nama Group</th>
                                        <th>Nama Agen</th>
                                        <th>Nama Majikan</th>
                                        <th>tgl terbit</th>
                                        <th>tgl exp</th>
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

                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: "400px",
                        processing: true,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_visapermit/show_visapermit') ?>",
                            "type"      : "POST"
                        }
                    });
                </script>
