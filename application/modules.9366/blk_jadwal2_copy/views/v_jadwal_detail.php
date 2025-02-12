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
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        <div class="text-center">DATA TKW YANG IKUT JADWAL INI (SESUAI ANGKATAN)</div>
                                        <div class="heading-elements">
                                            <?php echo $gg_guru; ?>
                                        </div>
                                    </h5>
                                </div>

                                <div id="modal_form_horizontal" class="modal fade">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">TAMBAH TKW MANUAL</h5>
                                            </div>
                                            <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_simpan'); ?>" class="form-horizontal" method="post">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-3">TKW</label>
                                                        <div class="col-sm-9">
                                                            <select class="tyy" name="dt_tkw[]" required="required" multiple="multiple">
                                                                <?php 
                                                                    foreach ($tampil_data_tkw as $vtki) {
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
                                                        <a type="button" class="btn btn-sm bg-warning" href="<?php echo site_url('blk_jadwal2/jadwal') ?>">KEMBALI</a>
                                                        <a href="<?php echo site_url('blk_jadwal2/all_print/'.$v_id.'/'.$v_hari) ?>" class="btn btn-sm bg-primary">PRINT</a>
                                                        <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH MANUAL</button>-->
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">HARI</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">TGL</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">GURU</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow"></td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">MATERI JOMPO</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">T/P/S</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">BUKU JOMPO HLM</td>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php 
                                                    $no = 0;
                                                    foreach ($tampil_data_jadwal_data as $r) {
                                                        $count_hari = count($tampil_data_jadwal_data);
                                                        $date22     = date("d/m/Y", strtotime("+$r->satuan day", strtotime($r->tanggal)));
                                                        $materi_exp = explode(",", $r->materi);
                                                        $materi_cou = count($materi_exp);
                                                ?>
                                                <tr>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $r->hari ?></td>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $date22; ?></td>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $gg_guru; ?></td>
                                                </tr>
                                                    <?php 
                                                        for($x=0; $x<$materi_cou; $x++) {
                                                            $materi_exp2 = explode("|-|", $materi_exp[$x]);
                                                            $materi_ambil = "SELECT * FROM blk_pelajaran_jompo where kode_materi='$materi_exp2[0]'";
                                                            $query_materi = $this->M_session->select_row($materi_ambil);
                                                    ?>
                                                <tr>
                                                            <td style="text-align:center;"><?php echo $x ?></td>
                                                            <td><?php echo $materi_exp2[0].' - '.$query_materi->nama_materi; ?></td>
                                                            <td style="text-align:center;"><?php echo $query_materi->keterangan ?></td>
                                                            <td style="text-align:center;"><?php echo $query_materi->buku_hal ?></td>
                                                    
                                                </tr><?php 
                                                        }
                                                    ?>
                                                <?php 
                                                    $no++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>

                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                            <thead>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NO</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ID TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NAMA TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ANGKATAN (MINGGU)</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">TDK HADIR?</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ACTION</td>
                                                    <!--<td style="text-align:center">Non-aktif</td>-->
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php 
                                                    $no = 1;
                                                    foreach ($tampil_data_tkw2 as $pkt) {
                                                        $sektor = substr($pkt->biodata_id, 2, 0);
                                                        if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
                                                            $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$pkt->biodata_id'");
                                                            $biodata_nama    = $ambil_tw->nama;
                                                        } else {
                                                            $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$pkt->biodata_id'");
                                                            $biodata_nama    = $ambil_hk->nama;
                                                        }
                                                        if ($pkt->angkatan != NULL) {
                                                            $angkt = 'M'.$pkt->angkatan;
                                                        } else {
                                                            $angkt = 'Manual';
                                                        }
                                                ?>
                                                <tr>
                                                    <td style="text-align:center"><?php echo $no; ?></td>
                                                    <td style="text-align:center"><?php echo $pkt->biodata_id; ?></td>
                                                    <td style="text-align:center"><?php echo $biodata_nama; ?></td>
                                                    <td style="text-align:center"><?php echo $angkt; ?></td>
                                                    <td style="text-align:center">
                                                        <input type="checkbox" class="form-control" value="hapus"/>
                                                    </td>
                                                    <td style="text-align:center">
                                                        <a class="btn btn-xxs bg-teal" href="<?php echo site_url('blk_jadwal2/penilaian') ?>">Penilaian</a>
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