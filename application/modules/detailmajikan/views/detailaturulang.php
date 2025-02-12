<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data History Atur Ulang Detail Majikan/Agen </span></h2>
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
                            <a class="btn btn-lg bg-blue-400" href="<?php echo site_url('detailmajikan/'); ?>">KEMBALI</a>
                            <a class="btn btn-lg bg-teal-400" href="<?php echo site_url('detailmajikan/aturulang/'.$id); ?>">ATUR ULANG</a>
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
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Tgl diatur ulang</th>
                                        <th colspan="5">Data</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Group</th>
                                        <th>Agen</th>
                                        <th>Majikan</th>
                                        <th>Suhan</th>
                                        <th>VP</th>
                                    </tr>
                                </thead>
                                <tbody>        
                                    <?php echo $datatable; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                            
