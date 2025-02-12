
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">History Visa Permit </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info panel-bordered">
                        <div class="panel-heading">
                            <a class='btn bg-pink' href="<?php echo site_url('new_visapermit/') ?>">Kembali</a>
                            <h5 class="panel-title text-center ">Detail History Visa Permit <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">

                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;' id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID TKI </th>
                                        <th>NAMA TKI</th>
                                        <th>Tanggal Terima</th>
                                        <th>Stats Visa Permit</th>
                                        <th>Tanggal Simpan</th>
                                        <th>Tanggal Kirim</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; 
                                    foreach ($tampil_datatkivisapermit as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->idnyabio;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tglsimpanvp;?></td>
                                            <td><?php echo $row->statvp;?></td>
                                            <td>
                                                <?php 
                                                    if($row->tempatvpdok=='放印尼 DI INDONESIA'){
                                                        echo $row->tglberangkat;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($row->tempatvpdok=='寄臺灣KE TAIWAN'){
                                                        echo $row->tglberangkat;
                                                    }
                                                ?> 
                                            </td>
                                            <td><?php echo $row->ketdokvp;?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>

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
                    function goBack() {
                        window.history.back();
                    }

                    $('#fixedeks').dataTable();
                </script>