
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Majikan</span></h2>
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
                            <a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Data</a>
                            <h5 class="panel-title text-center ">DATA SUHAN <br> </h5><br/>
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
                                        <th>Majikan</th>
                                        <th>tgl terbit</th>
                                        <th>tgl exp</th>
                                        <th>AGEN</th>
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
                        scrollY: true,
                        "searchable": false,
                        fixedColumns: {
                            leftColumns: 0,
                            rightColumns: 0
                        },
                        processing: true,
                        bFilter: true,
                        "lengthChange": false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_majikans/show_suhan/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>",
                            "type"      : "POST"
                        }
                    });
                </script>