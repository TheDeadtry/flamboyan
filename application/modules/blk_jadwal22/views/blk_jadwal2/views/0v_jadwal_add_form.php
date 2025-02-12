    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <div class="heading-elements">
            </div>
        </div>
    </div>
    <!-- /page header -->


    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-lg-3">

                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">
                                <div class="panel-heading bg-primary">
                                    <h5 class="panel-title">
                                        SETTING
                                    </h5>
                                    <div class="heading-elements">
                                    </div>
                                </div>
                            </a>
                            <div id="accordion-styled-group1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        NAMA PAKET 
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <?php echo $ptk_nama ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        ANGKATAN PAKET 
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <?php echo $ptk_minggu ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        JAM PAKET 
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <?php echo $ptk_jam ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        TANGGAL
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <?php echo $s_tanggal ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-xxs bg-primary pull-right">SIMPAN</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        DATA TKW YANG IKUT JADWAL INI (SESUAI ANGKATAN)
                                    </h5>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                                <thead>
                                                    <tr>
                                                        <td max-width="100%" style="text-align:center">NO</td>
                                                        <td max-width="100%" style="text-align:center">ID TKW</td>
                                                        <td max-width="100%" style="text-align:center">NAMA TKW</td>
                                                        <td max-width="100%" style="text-align:center">ANGKATAN (MINGGU)</td>
                                                        <!--<td style="text-align:center">Non-aktif</td>-->
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php 
                                                        $no = 1;
                                                        foreach ($tampil_data_tkw as $pkt) {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo $no; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt['id']; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt['nama']; ?></td>
                                                        <td style="text-align:center"><?php echo 'M'.$pkt['angkatan']; ?></td>
                                                        <!--<td style="text-align:center">
                                                            <input type="checkbox" class="form-control" value="hapus"/>
                                                        </td>  -->
                                                    </tr>    
                                                    <?php 
                                                        $no++;
                                                        }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                            </div>
                            <div class="panel">
                                <div class="panel-heading bg-danger">
                                    <h5 class="panel-title">
                                        DATA TKW SECARA MANUAL
                                    </h5>

                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="modal_form_horizontal" class="modal fade">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">TAMBAH TKI MANUAL</h5>
                                            </div>
                                            <form action="<?php echo site_url('blk_jadwal2/paket_simpan'); ?>" class="form-horizontal" method="post">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">TKI</label>
                                                        <div class="col-sm-9">
                                                            <select class="tyy" name="dt_tki[]" required="required" multiple="multiple">
                                                                <?php 
                                                                    foreach ($tampil_data_tki as $vtki) {
                                                                        if (substr($vtki->id, 2, 0) == 'FI') {
                                                                            $tki_nama = $vtki->nama_tw;
                                                                        } else {
                                                                            $tki_nama = $vtki->nama_hk;
                                                                        }
                                                                ?>
                                                                    <option value="<?php echo $vtki->id ?>"><?php echo $vtki->id.' - '.$tki_nama; ?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-danger">OK</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                                <thead>
                                                    <tr>
                                                        <th colspan="9" class="active">
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH MANUAL</button>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td max-width="100%" style="text-align:center">NO</td>
                                                        <td max-width="100%" style="text-align:center">ID TKW</td>
                                                        <td max-width="100%" style="text-align:center">NAMA TKW</td>
                                                        <td max-width="100%" style="text-align:center">ANGKATAN (MINGGU)</td>
                                                        <td style="text-align:center">Non-aktif</td>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php 
                                                        $no = 1;
                                                        foreach ($tampil_data_tkw as $pkt) {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo $no; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt['id']; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt['nama']; ?></td>
                                                        <td style="text-align:center"><?php echo 'M'.$pkt['angkatan']; ?></td>
                                                        <td style="text-align:center">
                                                            <input type="checkbox" class="form-control" value="hapus"/>
                                                        </td>  
                                                    </tr>    
                                                    <?php 
                                                        $no++;
                                                        }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                            </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. <a href="">PT FLAMBOYAN GEMAJASA</a> by <a href="" target="_blank">DKRH</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /page container -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".txx").select2({
                maximumSelectionLength: 2
            });
            $(".tyy").select2();
        });

    </script>