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
                    <div class="col-lg-12">

                        <div class="panel">
                            <div class="panel-heading bg-primary">
                                <h5 class="panel-title text-center">PRINT TKI PER ANGKATAN</h5>
                                <div class="btn-group btn-group-animated">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">ANGKATAN DIPILIH <span class="caret"></span><br/><?php if ($pilsek != NULL) echo $pilsek; else echo '-';?></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/'); ?>"><i class="icon-spinner9"></i> TAMPIL SEMUA</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/BLANK'); ?>"><i class="icon-person"></i> BELUM DIISI</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M1'); ?>"><i class="icon-woman"></i> M1</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M2'); ?>"><i class="icon-woman"></i> M2</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M3'); ?>"><i class="icon-woman"></i> M3</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M4'); ?>"><i class="icon-woman"></i> M4</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M5'); ?>"><i class="icon-woman"></i> M5</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M6'); ?>"><i class="icon-woman"></i> M6</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M7'); ?>"><i class="icon-woman"></i> M7</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M8'); ?>"><i class="icon-woman"></i> M8</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M9'); ?>"><i class="icon-woman"></i> M9</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M10'); ?>"><i class="icon-woman"></i> M10</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M11'); ?>"><i class="icon-woman"></i> M11</a></li>
                                        <li><a href="<?php echo site_url('blk_angkatan_print/setpilih/M12'); ?>"><i class="icon-woman"></i> M12</a></li>
                                    </ul>
                                </div>
<!--
                                <form method="POST" action="<?php echo site_url('blk_angkatan_print/set_pilih') ?>">
                                    <select name="pil_angkatan" class="form-control select-search">
                                        <option value="kosong">Belum diisi</option>
                                        <?php 
                                            for($x=1; $x<=12; $x++) {
                                        ?>
                                                <option value="<?php echo $x ?>"><?php echo 'M'.$x ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-xxs bg-primary">ENTER</button>
                                </form>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>-->
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                        <thead>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td max-width="100%" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center">ANGKATAN</td>
                                                <td max-width="100%" style="text-align:center">Tanggal Angkatan</td>
                                                <td style="text-align:center">ID TKI</td>
                                                <td max-width="100%" style="text-align:center">TKI</td>
                                                <td style="text-align:center">ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                $no     = 1;
                                                foreach ($tampil_data_tki as $pkt) {
                                                    
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?php echo $no; ?></td>
                                                <td style="text-align:center"><?php echo $pkt['angkatan']; ?></td>
                                                <td style="text-align:center"><?php echo $pkt['date']; ?></td>
                                                <td style="text-align:center"><?php echo $pkt['nodaftar']; ?></td>
                                                <td style="text-align:center"><?php echo $pkt['nama']; ?></td>
                                                <td style="text-align:center">
                                                    <a href="<?php echo site_url('blk_personaldetail/index/'.$pkt['nodaftar']) ?>" target="_blank">
                                                        <span class="label label-success">Detail</span>
                                                    </a>
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

        $('#jadwaltables').dataTable();
    </script>