
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    <span class="text-semibold">JADWAL PRINT</span>
                </h4>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a type="button" href="<?php echo site_url('absen_jadwal/detail/'.$zzkode) ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                    <h5 class="panel-title text-center">PRINTVIEW BOGA</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <form target='_blank' action="<?php echo site_url('databio/printdataprocess');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                        <table class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>MH</th>
                                    <th>PRAKTEK BERSAMA MEMASAK</th>
                                    <th>NO.</th>
                                    <th>BUKU HAL</th>
                                    <th>TGL</th>
                                    <th>JAM</th>
                                    <th>GURU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    error_reporting(0);

                                    $no = 1;
                                    $c  = 0;
                                    $y  = 0;
                                    $q  = 0;

                                    $concat_id = "id_tata_boga,'||tata_boga'";
                                    $table = "blk_pelajaran_tata_boga";

                                    foreach ($tampil_data as $tds) {

                                        $koddetail[$no] = explode("<>", $tds->kode_detail);
                                        
                                        $count_same1 = $this->M_absen_jadwal->select_row("SELECT count(*) as total FROM absen_jadwal_materi where jam='".$tds->jam."' and kode_detail like '".$koddetail[$no][0]."%'");
                                        $count_same2 = $this->M_absen_jadwal->select_row("SELECT count(*) as total FROM absen_jadwal_materi where kode_detail='$tds->kode_detail'");

                                        $countz1e[$no]  = $count_same1->total;
                                        $countz2e[$no]  = $count_same2->total;

                                        $cc = "SELECT kode_pelajaran FROM absen_jadwal_detail where kode_jadwal='$zzkode' and hari='$zykode'";
                                        $counter2 = $this->M_absen_jadwal->select_row($cc);
                                        $bef_count[$no] = $counter2->kode_pelajaran;
                                        $explode_counting[$no] = explode(",", $bef_count[$no]);
                                        $countz2[$no] = count($explode_counting[$no]);

                                        $ce = "SELECT distinct jam FROM absen_jadwal_materi where kode_detail like '$zukode%'";
                                        $counter4 = $this->M_absen_jadwal->select($ce);
                                        $countz4[$no] = count($counter4);

                                        $headernm[$no] = $tds->header_nama;
                                        $sesijam[$no]  = $tds->jam;

                                        $jamnm[$no] = explode("._.", $tds->kode_detail);
                                        $fjammn[$no] = explode("<>", $jamnm[$no][1]);
                                        $fjammn[$no] = $fjammn[$no][1];

                                        if ($countz4[$no] > 1) {
                                            if ($sesijam[$no-1] == $sesijam[$no]) {
                                                $c++;
                                            } else {
                                                $c=1;
                                            }
                                        } else {
                                            $c=1;
                                        }

                                        if ($countz2[$no] > 1) {
                                            if ($fjammn[$no-1] == $fjammn[$no]) {
                                                $y++;
                                            } else {
                                                $y=1;
                                            }
                                        } else {
                                            $y=1;
                                        }
                                ?>
                                <tr>
                                    <?php
                                        if($y == 1) {
                                            echo '<td style="text-align:center" rowspan="'.$countz2e[$no].'">'.$headernm[$no].'</td>';  
                                        } elseif($y == 0) {
                                            echo '<td style="text-align:center" rowspan="">'.$headernm[$no].'</td>';
                                        }
                                    ?>
                                    <td>
                                        <?php 
                                        $nama_sub[$no] = $tds->body_nama;

                                        $dispatch_nama_sub[$no] = explode("||", $nama_sub[$no]);

                                        $fid = "id_".$dispatch_nama_sub[$no][1];
                                        $hid = $dispatch_nama_sub[$no][0];

                                        $query_materi = "SELECT kode_materi,nama_materi,concat($concat_id) as id,buku_hal FROM $table where $fid='".$hid."'";

                                        $get_materi = $this->M_absen_jadwal->select_row($query_materi);

                                        echo $get_materi->kode_materi.' : '.$get_materi->nama_materi;
                                        
                                        $bukuhal[$no] = $get_materi->buku_hal;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($no > 4) {
                                                echo '';
                                            } else {
                                                echo $no;
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $bukuhal[$no].$fjammn[$no][1]; ?></td><!--
                                    <td><?php echo $countz1e[$no].$tds->kode_detail.$koddetail[$no][0] ?></td>
                                    <td><?php echo $y.' = '.$fjammn[$no-1].' - '.$fjammn[$no].' | '.$countz2[$no]; ?></td>
                                    <td><?php echo $y.' = '.$fjammn[$no-1].' - '.$fjammn[$no].' | '.$countz2[$no]; ?></td>
                                    -->
                                    <?php
                                        if($c == 1) {
                                            echo '<td style="text-align:center" rowspan="'.$countz1e[$no].'"></td>';  
                                        } elseif($c == 0) {
                                            echo '<td style="text-align:center" rowspan=""></td>';
                                        }
                                    ?>
                                    <?php
                                        if($c == 1) {
                                            echo '<td style="text-align:center" rowspan="'.$countz1e[$no].'"></td>';  
                                        } elseif($c == 0) {
                                            echo '<td style="text-align:center" rowspan=""></td>';
                                        }
                                    ?>
                                    <?php
                                        if($c == 1) {
                                            echo '<td style="text-align:center" rowspan="'.$countz1e[$no].'">';
                                                echo '<select name="pilgur" class="form-control">';
                                                    foreach ($tampil_guru as $guru) {
                                                        echo '<option value="'.$guru->kode_instruktur.'">'.$guru->kode_instruktur.' - '.$guru->nama.'</option>';
                                                    }
                                                echo '</select>';
                                            echo '</td>';  
                                        } elseif($c == 0) {
                                            echo '<td style="text-align:center" rowspan="">

                                            </td>';    
                                        }
                                    ?>
                                </tr>
                                <?php 
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        <br/>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">PRINT <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
