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
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">JADWAL</h5>

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
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Tambah Jadwal</h5>
                                </div>
                                <form action="<?php echo site_url('blk_jadwal/simpan'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Nama Jadwal</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="Ex : BOGA HARI KE 1" class="form-control" name="nama_jadwal">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Minggu</label>
                                            <div class="col-sm-6">
                                                <select multiple="multiple" class="txx" name="minggu[]">
                                                    <?php 
                                                        foreach ($tampil_data_minggu as $vminggu) {
                                                    ?>
                                                        <option value="<?php echo $vminggu->kode_minggu ?>"><?php echo 'Minggu '.$vminggu->minggu; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">OK</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-lg datatable-basic table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="9" class="active">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH JADWAL</button>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td max-width="100%" style="text-align:center">NO</td>
                                        <td max-width="100%" style="text-align:center;display:none;">KODE</td>
                                        <td max-width="100%" style="text-align:center">NAMA</td>
                                        <td max-width="100%" style="text-align:center">MINGGU</td>
                                        <td max-width="100%" style="text-align:center">DETAIL</td>
                                        <td style="display:none"></td>
                                        <td style="text-align:center">ACTION</td>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php 
                                        $no = 1;
                                        foreach ($tampil_data_jadwal as $jdw) {
                                            $fnama      = $jdw->nama_jadwal;
                                            $fminggu    = $jdw->minggu_id;
                                            $fkode      = $jdw->kode_jadwal;
                                    ?>
                                    <tr>
                                        <td style="text-align:center" ><?php echo $no ?></td>
                                        <td style="text-align:center;display:none;" ><?php //echo $fkode ?></td>
                                        <td style="text-align:center" ><?php echo $fnama ?></td>
                                        <td style="text-align:center" ><?php echo $fminggu ?></td>
                                        <td style="text-align:center" >
                                            <a class="btn btn-sm btn-success" href="<?php echo site_url('blk_jadwal/detail/'.$fkode) ?>">DETAIL</a>
                                        </td>  
                                        <td style="display:none"></td>
                                        <td style="text-align:center" >
                                            <ul class="icons-list"><!--
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#" data-toggle="modal" data-target="#ubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span>Ubah</span></a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span>Hapus</span></a></li>
                                                    </ul>
                                                </li>-->
                                            </ul>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $(".txx").select2({
                maximumSelectionLength: 2
            });
            $(".tyy").select2();
        });
    </script>