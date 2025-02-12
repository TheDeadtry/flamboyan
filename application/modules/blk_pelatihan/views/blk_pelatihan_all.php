
                <div class="col-lg-9">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>DATA PELATIHAN <?php echo $xpil_nama_paket; ?> [<?php echo $idbio;?>] </i></b></h5>

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
                                <table class="table table-lg table-bordered table-striped table-hover" id="datatable_123">
                                    <thead>
                                        <tr>
                                            <th colspan="9" class="active bg-primary"><!--
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahm">TAMBAH PENILAIAN</button>-->
                                                <select class="form-control" name="search_pelajaran" onchange="javascript:location.href=this.value;">
                                                    <?php 
                                                        foreach ($tampil_data_settingpaket as $row) {
                                                            $rdf = "";
                                                            if ($row->id_setting_paket == $u_pil_paket) {
                                                                $rdf = 'disabled="disabled" selected="selected"';
                                                            }
                                                    ?>
                                                            <option value="<?php echo site_url('blk_pelatihan/set_pilihan/'.$idbio.'/'.$row->id_setting_paket) ?>" <?php echo $rdf ?> ><?php echo $row->nama_paket ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">TGL JADWAL</td>
                                            <td max-width="100%" style="text-align:center">PENILAI</td>
                                            <td max-width="100%" style="text-align:center">NAMA PAKET</td>
                                            <td style="text-align:center">DETAIL</td>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php 
                                            $no = 1;
                                            foreach ($tampil_data_penilaian as $group) {
                                                $ambil_penilai = $this->M_session->select_row("SELECT nama FROM blk_instruktur WHERE kode_instruktur='$group->instruktur_kode'");
                                                $ambil_paket   = $this->M_session->select_row("SELECT nama_full FROM blk_jadwal_paket WHERE id_paket='$group->paket_id'");
                                        ?>
                                            <tr>
                                                <td style="text-align:center" ><?php echo $no.' '.$group->paket_id ?></td>
                                                <td style="text-align:center" ><?php echo $group->tanggal ?></td>
                                                <td style="text-align:center" ><?php echo $ambil_penilai->nama ?></td>
                                                <td style="text-align:center" ><?php echo $ambil_paket->nama_full ?></td> 
                                                <td style="text-align:center" >
                                                    <button class="btn btn-xs bg-primary" data-target="#detail_<?php echo $no ?>" data-toggle="modal">DETAIL</button>
                                                    <div id="detail_<?php echo $no ?>" class="modal fade">
                                                        <div class="modal-dialog modal-full">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h5 class="modal-title">PENILAIAN <?php echo ' ['.$idbio.'] ' ?></h5>
                                                                </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-xxs table-bordered table-striped table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td rowspan="2" max-width="100%" style="text-align:center">NO</td>
                                                                                        <td rowspan="2" max-width="100%" style="text-align:center">HARI</td>
                                                                                        <td rowspan="2" max-width="100%" style="text-align:center">JAM</td>
                                                                                        <td rowspan="2" max-width="100%" style="text-align:center">MINGGU</td>
                                                                                        <td rowspan="2" max-width="100%" style="text-align:center">MATERI</td>
                                                                                        <td colspan="2" style="text-align:center">NILAI</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>T</td>
                                                                                        <td>P</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody> 
                                                                                    <?php 
                                                                                        $tampil_data_paketjadwal    = $this->M_session->select("SELECT 
                                                                                                                                                distinct(a.hari) as hari 
                                                                                                                                                FROM blk_jadwal_paketjadwal a 
                                                                                                                                                JOIN blk_jadwal_data b 
                                                                                                                                                ON a.paket_id=b.paket_id
                                                                                                                                                JOIN blk_jadwal_data_tki c
                                                                                                                                                ON b.id_jadwal_data=c.jadwal_data_id
                                                                                                                                                where a.paket_id='$group->paket_id'
                                                                                                                                                ORDER BY a.hari ASC");
                                                                                        $no2 = 1;
                                                                                        foreach ($tampil_data_paketjadwal as $pkt) {
                                                                                            $hari_nama      = $this->M_session->select_row("SELECT hari FROM blk_hari where kode_hari='".$pkt->hari."'");

                                                                                            $ambil_paket_harijam = $this->M_session->select("SELECT * FROM blk_jadwal_paketjadwal WHERE paket_id='".$group->paket_id."' AND hari='".$pkt->hari."' ORDER BY jam ASC");
                                                                                            $total_paket_harijam = count($ambil_paket_harijam);

                                                                                            $total_finalization = "";
                                                                                            foreach ($ambil_paket_harijam as $test) {
                                                                                                $materi_exp     = explode(",", $test->materi);
                                                                                                $total_finalization = $total_finalization+count($materi_exp);
                                                                                            }

                                                                                            $no3 = 1;
                                                                                            foreach ($ambil_paket_harijam as $terrabite) {
                                                                                                $jam_nama       = $this->M_session->select_row("SELECT jam FROM blk_jam where kode_jam='".$terrabite->jam."'");
                                                                                                $minggu_nama    = $this->M_session->select_row("SELECT minggu FROM blk_minggu where kode_minggu='".$terrabite->minggu."'");
                                                                                                $materi_exp     = explode(",", $terrabite->materi);

                                                                                                $total_materi = count($materi_exp);

                                                                                                $no4 = 1;
                                                                                                $tyu = "";
                                                                                                for ($c=0; $c<count($materi_exp); $c++) {
                                                                                                    $materi_exp2 = explode("|-|", $materi_exp[$c]);

                                                                                                    $ztable = "blk_pelajaran_".$materi_exp2[1];
                                                                                                    $query00 = "SELECT nama_materi FROM $ztable where kode_materi='$materi_exp2[0]'";
                                                                                                    $materi_nama = $this->M_session->select_row($query00);
                                                                                                    $zxc_materi = $materi_exp2[0].' - '.$materi_nama->nama_materi; 
                                                                                                    $tyu = $tyu.',"'.$materi_exp[$c].'"';
                                                                                            ?>
                                                                                                    <tr>

                                                                                                        <?php 
                                                                                                            if ($no3 == 1 && $no4 == 1) {
                                                                                                        ?>
                                                                                                                <td style="text-align:center" rowspan="<?php echo $total_finalization; ?>"><?php echo $no; ?></td>
                                                                                                                <td style="text-align:center" rowspan="<?php echo $total_finalization; ?>"><?php echo $hari_nama->hari; ?></td>
                                                                                                        <?php
                                                                                                            }
                                                                                                        ?>
                                                                                                        
                                                                                                        <?php 
                                                                                                            if ($no4 == 1) {
                                                                                                        ?>
                                                                                                        <td style="text-align:center" rowspan="<?php echo $total_materi ?>"><?php if ($jam_nama != NULL) echo $terrabite->jam.'<br/>'.$jam_nama->jam; ?></td>
                                                                                                        <td style="text-align:center" rowspan="<?php echo $total_materi ?>"><?php echo $terrabite->minggu ?></td>
                                                                                                        <?php 
                                                                                                            }
                                                                                                        ?>
                                                                                                        <td>
                                                                                                            <?php echo $zxc_materi; ?>
                                                                                                        </td>
                                                                                                        <td style="text-align:center">
                                                                                                            <?php  
                                                                                                                $ambil_nilai = $this->M_session->select_row("SELECT 
                                                                                                                                                                c.nilai,
                                                                                                                                                                c.nilai2 
                                                                                                                                                                FROM blk_jadwal_data a 
                                                                                                                                                                LEFT JOIN blk_jadwal_data_tki b 
                                                                                                                                                                ON a.id_jadwal_data=b.jadwal_data_id 
                                                                                                                                                                LEFT JOIN blk_jadwal_penilaian c 
                                                                                                                                                                ON b.id_jadwal_data_tki=c.jadwal_data_tki_id
                                                                                                                                                                WHERE a.id_jadwal_data='$group->id_jadwal_data'
                                                                                                                                                                AND b.hari='$pkt->hari' 
                                                                                                                                                                AND b.jam='$terrabite->jam'
                                                                                                                                                                AND c.materi_id='$materi_exp2[0]'
                                                                                                                                                            ");
                                                                                                                $nilai1 = "";
                                                                                                                $nilai2 = "";
                                                                                                                if ($ambil_nilai != NULL) {
                                                                                                                    $nilai1 = $ambil_nilai->nilai;
                                                                                                                    $nilai2 = $ambil_nilai->nilai2;
                                                                                                                }
                                                                                                                echo $nilai1;
                                                                                                            ?>
                                                                                                        </td> 
                                                                                                        <td style="text-align:center">
                                                                                                            <?php 
                                                                                                                echo $nilai2;
                                                                                                            ?>
                                                                                                        </td>   
                                                                                                    </tr> 
                                                                                            <?php 
                                                                                                $no4++;
                                                                                                } 
                                                                                            $no3++;
                                                                                            }
                                                                                        $no2++;
                                                                                        }
                                                                                    ?> 
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn bg-primary-800" data-dismiss="modal">Tutup</button>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>

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
