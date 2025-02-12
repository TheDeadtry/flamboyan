<style type="text/css">
@media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}
</style>

                                    

                                    <div id="modal_form_horizontal34" class="modal fade" style="color:#000;">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">TAMBAH TKW MANUAL</h5>
                                                </div>
                                                <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_add_tki_manual/'.$v_id); ?>" class="form-horizontal" method="post">
                                                    <input type="hidden" name="jadwal_id" value="<?php echo $v_jadwal_id; ?>"/>
                                                    <input type="hidden" name="data_id" value="<?php echo $v_id; ?>"/>
                                                    <input type="hidden" name="vie_hari" value="<?php echo $e_hari; ?>">
                                                    <input type="hidden" name="vie_jam" value="<?php echo $e_jam; ?>">

                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <label class="control-label">HARI</label>
                                                                    <div class="col-sm-12">
                                                                        <?php 
                                                                            $cfrhari = $this->M_session->select_row("SELECT * FROM blk_hari WHERE kode_hari='".$e_hari."'");
                                                                        ?>
                                                                        <input type="text" class="form-control" name="vbhari" value="<?php echo $cfrhari->kode_hari.' - '.$cfrhari->hari; ?>" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <label class="control-label">JAM</label>
                                                                    <div class="col-sm-12">
                                                                        <?php 
                                                                            $cfrjam = $this->M_session->select_row("SELECT * FROM blk_jam WHERE kode_jam='".$e_jam."'");
                                                                        ?>
                                                                        <input type="text" class="form-control" name="vbhari" value="<?php echo $cfrjam->kode_jam.' - '.$cfrjam->jam; ?>" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <label class="control-label">PILIH TKW</label>
                                                                    <div class="col-sm-12">
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

                                    <div id="update_tki55" class="modal fade" style="color:#000;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UPDATE TKI ANGKATAN</h5>
                                                </div>
                                                <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_update_tki_angkatan/'.$v_id); ?>" class="form-horizontal" method="post">
                                                    <input type="hidden" name="jadwal_id" value="<?php echo $v_jadwal_id; ?>"/>
                                                    <input type="hidden" name="data_id" value="<?php echo $v_id; ?>"/>
                                                    <input type="hidden" name="vie_hari" value="<?php echo $e_hari; ?>">
                                                    <input type="hidden" name="vie_jam" value="<?php echo $e_jam; ?>">

                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <label class="control-label">HARI</label>
                                                                    <div class="col-sm-12">
                                                                        <?php 
                                                                            $cfrhari = $this->M_session->select_row("SELECT * FROM blk_hari WHERE kode_hari='".$e_hari."'");
                                                                        ?>
                                                                        <input type="text" class="form-control" name="vbhari" value="<?php echo $cfrhari->kode_hari.' - '.$cfrhari->hari; ?>" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <label class="control-label">HARI</label>
                                                                    <div class="col-sm-12">
                                                                        <?php 
                                                                            $cfrjam = $this->M_session->select_row("SELECT * FROM blk_jam WHERE kode_jam='".$e_jam."'");
                                                                        ?>
                                                                        <input type="text" class="form-control" name="vbhari" value="<?php echo $cfrjam->kode_jam.' - '.$cfrjam->jam; ?>" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <table class="table table-xxs table-bordered table-striped table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>NO</th>
                                                                                <th>ID TKI</th>
                                                                                <th>NAMA</th>
                                                                                <th>ANGKATAN</th>
                                                                                <th>STAT</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php 
                                                                                $no = 1;
                                                                                foreach($tampil_data_update_tki_angkatan as $u) {
                                                                                    $ket        = '<label class="label label-primary">BELUM ADA</label>';
                                                                                    $ket1       = 0;
                                                                                    foreach ($tampil_data_tkw2 as $tki39) {
                                                                                        if ($tki39->biodata_id == $u['nodaftar']) {
                                                                                            $ket = '<label class="label label-danger">SUDAH ADA</label>';
                                                                                            $ket1 = 1;
                                                                                        }
                                                                                    }
                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?php echo $no; ?></td>
                                                                                        <td><?php echo $u['nodaftar']; ?></td>
                                                                                        <td><?php echo $u['nama']; ?></td>
                                                                                        <td><?php echo $u['angkatan']; ?></td>
                                                                                        <td><?php echo $ket ?></td>
                                                                                        <?php 
                                                                                            if ($ket1 == 0) {
                                                                                        ?>
                                                                                                <input type="hidden" name="id_tki[]" value="<?php echo $u['nodaftar'] ?>">
                                                                                        <?php
                                                                                            } 
                                                                                        ?>
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
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                                                        <button type="submit" class="btn btn-danger" >UPDATE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

                <div class="row">
                    

                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading bg-primary">
                                <h5 class="panel-title">
                                    PILIH HARI <?php echo $e_hari.' '.$e_jam ?>
                                </h5>
                                <div class="heading-elements">
                                    
                                    <button type="button" class="btn bg-warning btn-sm" data-toggle="modal" data-target="#modal_form_horizontal34">TAMBAH TKI</button>
                                    <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#update_tki55">UPDATE TKI ANGKATAN</button>

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <form action="<?php echo site_url('blk_jadwal2/set_hari/'.$v_id) ?>" method="POST">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Pilih Hari</label>
                                                        <select name="pil_hari" class="select-search" id="select_harijam1">
                                                            <option></option>
                                                            <?php 
                                                                foreach($tampil_data_hari_dari_paket as $baris) {
                                                                    $sol = "";
                                                                    if ($e_hari == $baris->kode_hari) {
                                                                        $sol = 'selected="selected"';
                                                                    }
                                                            ?>
                                                                    <option value="<?php echo $baris->kode_hari; ?>" <?php echo $sol; ?>><?php echo $baris->kode_hari.' - '.$baris->hari; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <div id="load" style="display:none">
                                                            <img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                                if ($e_hari != NULL) {
                                            ?>
                                                    <div class="form-group" id="select_harijam2">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Pilih Jam</label>
                                                                <select name="pil_jam" class="select-search">
                                                                    <?php 
                                                                        foreach($option_jam as $baris) {
                                                                            $sol = "";
                                                                            if ($e_jam == $baris->kode_jam) {
                                                                                $sol = 'selected="selected"';
                                                                            }
                                                                    ?>
                                                                            <option value="<?php echo $baris->kode_jam; ?>" <?php echo $sol; ?> ><?php echo $baris->kode_jam.' - '.$baris->jam; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php 
                                                } else {
                                            ?>
                                                    <div class="form-group" id="select_harijam2">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Pilih Jam</label>
                                                                <select name="pil_jam" class="select-search">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php 
                                                }
                                            ?>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="submit" class="btn btn-xxs bg-primary">Cari!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        <div class="text-center">DATA TKW YANG IKUT JADWAL INI (SESUAI ANGKATAN)</div>
                                        <div class="heading-elements">
                                        </div>
                                    </h5>
                                </div>

                                <div class="panel-body">
                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                            <thead>
                                                <tr>
                                                    <th colspan="9" class="active">
                                                        <div class="pull-left">
                                                            <a type="button" class="btn btn-sm bg-warning" href="<?php echo site_url('blk_jadwal2/jadwal') ?>">KEMBALI</a>
                                                        </div>
                                                        <div class="pull-right">
                                                            <a href="<?php echo site_url('blk_jadwal2/all_print/'.$v_id.'/'.$e_hari.'/'.$e_jam) ?>" class="btn btn-sm bg-primary">PRINT <?php echo $e_hari.':'.$e_jam ?></a>
                                                            <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#kehadiran">CHECKLIST KEHADIRAN</button>
                                                        </div>

                                                        <div id="kehadiran" class="modal fade" style="color:#000;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h5 class="modal-title">Checklist Kehadiran</h5>
                                                                    </div>
                                                                    <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_tdk_hadir/'.$v_id); ?>" class="form-horizontal" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">

                                                                                <div class="col-sm-12">
                                                                                    <div class="row">
                                                                                        <label class="col-sm-12"></label>
                                                                                        <div class="col-sm-12">
                                                                                            <table class="table table-xxs table-bordered table-striped table-hover">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td>No</td>
                                                                                                        <td>ID</td>
                                                                                                        <td>Nama</td>
                                                                                                        <td>Angkatan</td>
                                                                                                        <td>Hari</td>
                                                                                                        <td>Tdk Hadir</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                        $no = 1;
                                                                                                        foreach ($tampil_data_tkw2 as $ptt) {
                                                                                                            $sektor = substr($ptt->biodata_id, 2, 0);
                                                                                                            if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
                                                                                                                $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$ptt->biodata_id'");
                                                                                                                $biodata_nama    = $ambil_tw->nama;
                                                                                                            } else {
                                                                                                                $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$ptt->biodata_id'");
                                                                                                                $biodata_nama    = $ambil_hk->nama;
                                                                                                            }
                                                                                                            if ($ptt->angkatan != NULL) {
                                                                                                                $angkt = 'M'.$ptt->angkatan;
                                                                                                            } else {
                                                                                                                $angkt = 'Manual';
                                                                                                            }


                                                                                                            if ($ptt->tdk_hadir == NULL) {
                                                                                                                $tpy    = "";
                                                                                                            } else {
                                                                                                                $tpy    = 'checked="checked"';
                                                                                                            }

                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo $no; ?></td>
                                                                                                        <td><?php echo $ptt->biodata_id; ?></td>
                                                                                                        <td><?php echo $biodata_nama; ?></td>
                                                                                                        <td><?php echo $angkt; ?></td>
                                                                                                        <td><?php echo "" ?></td>
                                                                                                        <td>
                                                                                                            <input type="hidden" name="id_jadwal_data_tki[<?php echo $no-1 ?>]" value="<?php echo $ptt->id_jadwal_data_tki ?>">
                                                                                                            <input type="hidden" class="form-control" name="tdk_hadir[<?php echo $no-1 ?>]" value="">
                                                                                                            <input type="checkbox" class="form-control" name="tdk_hadir[<?php echo $no-1 ?>]" value="1" <?php echo $tpy ?>>
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
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                            <button type="submit" class="btn btn-danger">OK</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH MANUAL</button>-->
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">HARI</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">TGL</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">GURU</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">JAM</td>
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
                                                        $xjamx = $this->M_session->select_row("SELECT * FROM blk_jam WHERE kode_jam='$r->jam'");
                                                        $xinsx = $this->M_session->select_row("SELECT * FROM blk_instruktur WHERE kode_instruktur='$r->instruktur_kode'");
                                                        $count_hari = count($tampil_data_jadwal_data);
                                                        $date22     = date("d/m/Y", strtotime("+$r->satuan day", strtotime($r->tanggal)));
                                                        $materi_exp = explode(",", $r->materi);
                                                        $materi_cou = count($materi_exp);
                                                ?>
                                                <tr>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $r->kode_hari.'<br/>'.$r->hari; ?></td>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $date22; ?></td>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $r->instruktur_kode.'<br/>'.$xinsx->nama; ?></td>
                                                    <td rowspan="<?php echo $materi_cou+1 ?>" style="text-align:center;"><?php echo $xjamx->kode_jam.'<br/>'.$xjamx->jam ; ?></td>
                                                </tr>
                                                    <?php 
                                                        for($x=0; $x<$materi_cou; $x++) {
                                                            $materi_exp2 = explode("|-|", $materi_exp[$x]);
                                                            $table = "blk_pelajaran_".$materi_exp2[1];
                                                            $materi_ambil = "SELECT * FROM $table where kode_materi='$materi_exp2[0]'";
                                                            $query_materi = $this->M_session->select_row($materi_ambil);
                                                    ?>
                                                        <tr>
                                                            <td style="text-align:center;"><?php echo $x ?></td>
                                                            <td><?php echo $materi_exp2[0].' - '.$query_materi->nama_materi; ?></td>
                                                            <td style="text-align:center;"><?php echo $query_materi->keterangan ?></td>
                                                            <td style="text-align:center;"><?php echo $query_materi->buku_hal ?></td>
                                                    
                                                        </tr>
                                                    <?php 
                                                            }
                                                        $no++;
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>

                                        <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables2">
                                            <thead>
                                                <tr>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NO</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ID TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">NAMA TKW</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ANGKATAN (MINGGU)</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">KEHADIRAN</td>
                                                    <td max-width="100%" style="text-align:center;font-weight: bold;" bgcolor="yellow">ACTION</td>
                                                    <!--<td style="text-align:center">Non-aktif</td>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form id="data_tkw3">
                                                    <?php 
                                                        $no_u = 1;
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

                                                            if ($pkt->tdk_hadir == NULL) {
                                                                $hdr    = '<label class="label label-info">HADIR</label>';
                                                                $disbld = '<a class="btn btn-xxs bg-teal" data-toggle="modal" data-target="#penilaian69_'.$no_u.'">Penilaian</a>';
                                                            } else {
                                                                $hdr    = '<label class="label label-danger">TIDAK HADIR</label>';
                                                                $disbld = '<a class="btn btn-xxs bg-teal" disabled="disabled">Penilaian</a>';
                                                            }

                                                            if ($pkt->tdk_hadir == NULL) {
                                                                $tpy    = "";
                                                            } else {
                                                                $tpy    = 'checked="checked"';
                                                            }
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo $no_u; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->biodata_id; ?></td>
                                                        <td style="text-align:center"><?php echo $biodata_nama; ?></td>
                                                        <td style="text-align:center"><?php echo $angkt; ?></td>
                                                        <td style="text-align:center">
                                                            <?php echo $hdr; ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <?php echo $disbld; ?>
                                                            <div id="penilaian69_<?php echo $no_u ?>" class="modal fade">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-primary">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h5 class="modal-title">PENILAIAN <?php echo ' ('.$pkt->biodata_id.') '.$biodata_nama ?></h5>
                                                                        </div>
                                                                        <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_penilaian/'.$v_id) ?>" method="POST">
                                                                            <?php 
                                                                                $cek_penilaian = $this->M_session->select_row("SELECT * FROM blk_jadwal_penilaian where jadwal_data_tki_id='$pkt->id_jadwal_data_tki' and hari='$e_hari'");
                                                                                if ($cek_penilaian != NULL) {
                                                                                    echo '<input type="hidden" name="id_penilaian" value="'.$cek_penilaian->id_penilaian.'"/>';
                                                                                }
                                                                            ?>
                                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_jadwal_data_tki ?>"/>
                                                                            <input type="hidden" name="hari" value="<?php echo $e_hari ?>"/>

                                                                            <div class="modal-body">
                                                                                <table class="table table-xxs table-bordered table-striped table-hover">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="10%">No</th>
                                                                                            <th width="65%">Materi</th>
                                                                                            <th width="25%">Nilai</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody> 
                                                                                        <?php
                                                                                                $no = 0;
                                                                                                foreach ($tampil_data_jadwal_data as $r) {
                                                                                                    $materi_exp = explode(",", $r->materi);
                                                                                                    $materi_cou = count($materi_exp);

                                                                                                    for($x=0; $x<$materi_cou; $x++) {
                                                                                                        $materi_exp2  = explode("|-|", $materi_exp[$x]);
                                                                                                        $tabel_nama   = "blk_pelajaran_$materi_exp2[1]";
                                                                                                        $materi_ambil = "SELECT * FROM $tabel_nama where kode_materi='$materi_exp2[0]'";
                                                                                                        $query_materi = $this->M_session->select_row($materi_ambil);

                                                                                                        $tampil_data_penilaian = $this->M_session->select_row("SELECT * FROM blk_jadwal_penilaian where jadwal_data_tki_id='$pkt->id_jadwal_data_tki' and hari='$e_hari' and materi_id='$materi_exp2[0]'");
                                                                                                        $n_nilai = "";
                                                                                                        $n_id_penilaian = "";
                                                                                                        if ($tampil_data_penilaian != NULL) {
                                                                                                            $n_nilai            = $tampil_data_penilaian->nilai;
                                                                                                            $n_id_penilaian     = $tampil_data_penilaian->id_penilaian;
                                                                                                        }
                                                                                        ?>
                                                                                                        <tr>
                                                                                                            <td style="text-align:center;"><?php echo $x+1 ?></td>
                                                                                                            <td><?php echo $materi_exp2[0].' - '.$query_materi->nama_materi; ?></td>
                                                                                                            <td style="text-align:center;">
                                                                                                                <input type="hidden" name="p_id_nilai[]" value="<?php echo $n_id_penilaian; ?>">
                                                                                                                <input type="hidden" name="p_materi[]" value="<?php echo $materi_exp2[0]; ?>">
                                                                                                                <?php 
                                                                                                                    if ($query_materi->tipe_input == 1) {
                                                                                                                ?>
                                                                                                                        <div class="input-group">
                                                                                                                            <input type="text" name="p_nilai[]" class="form-control number" placeholder="dalam skala kilogram" aria-describedby="basic-addon2">
                                                                                                                            <span class="input-group-addon" id="basic-addon2"> KG</span>
                                                                                                                        </div>
                                                                                                                <?php 
                                                                                                                    } else {
                                                                                                                ?>
                                                                                                                        <select class="select-search" name="p_nilai[]">
                                                                                                                            <option></option>
                                                                                                                            <?php 
                                                                                                                                foreach ($tampil_data_nilai as $nilai) {
                                                                                                                                    $respier = "";
                                                                                                                                    if ($nilai->kode_nilai == $n_nilai) {
                                                                                                                                        $respier = 'selected="selected"';
                                                                                                                                    }
                                                                                                                            ?>
                                                                                                                                <option value="<?php echo $nilai->kode_nilai; ?>" <?php echo $respier; ?>><?php echo $nilai->kode_nilai ?></option>
                                                                                                                            <?php 
                                                                                                                                }
                                                                                                                            ?>
                                                                                                                        </select>   
                                                                                                                <?php   
                                                                                                                    }
                                                                                                                ?>
                                                                                                                
                                                                                                            </td>
                                                                                                    
                                                                                                        </tr>
                                                                                        <?php 
                                                                                                    }
                                                                                        ?>
                                                                                        <?php 
                                                                                                $no++;
                                                                                                }
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">OK</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a class="btn btn-xxs bg-danger" data-toggle="modal" data-target="#delete69_<?php echo $no_u ?>">DELETE</a>
                                                            <div id="delete69_<?php echo $no_u ?>" class="modal fade">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-primary">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h5 class="modal-title">HAPUS <?php echo ' ('.$pkt->biodata_id.') '.$biodata_nama ?></h5>
                                                                        </div>
                                                                        <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_delete/'.$v_id) ?>" method="POST">
                                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_jadwal_data_tki ?>"/>

                                                                            <div class="modal-body">
                                                                                <p>
                                                                                    Apakah anda yakin akan menghapus data ini
                                                                                    <code class="danger"><?php echo $pkt->id_jadwal_data_tki ?></code>
                                                                                    ?
                                                                                </p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">OK</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </td>
                                                    </tr>    
                                                    <?php 
                                                        $no_u++;
                                                        }
                                                    ?>
                                                </form>

                                            </tbody>
                                        </table>

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

        function select_harijam() {
            var hari = $('#select_harijam2').val();
            $.ajax({
                url: '<?php echo site_url('blk_jadwal2/jam_show/<?php echo $v_id ?>') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+hari,
                encode:true,
                success:function (data) {

                }
            })
        }
        $("#select_harijam1").change(function(){
            var kode = {kode:$("#select_harijam1").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('blk_jadwal2/select_jamlist/'.$v_id)?>",
                data: kode,
                success: function(msg) {
                    $('#select_harijam2').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });

        $('#jadwaltables2').DataTable({
            "searchable": false,
            bFilter: false,
            "info": false,
            "paging":   false,
            "lengthChange": false
        });

        $('input.number').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
            .replace(/\D/g, "");
            });
        });
        $(".khdrn").on('click', function(){
            if ($('.khdrn').checked) {
                alert('bwbw');
            } else {
                alert('bwbw2');
            }
            var value = $(this).val();
            $.ajax({
                url: '<?php echo site_url('blk_jadwal2/jadwal_detail_checklist') ?>',
                type: 'POST',
                dataType: 'json',
                data: {value:value},
                encode:true,
                success:function (data) {
                    if(!data.success) {
                        alert(data.message);
                    } else {
                        alert(data.message);
                        setTimeout(function () {
                            $(function () {
                                //$('#myModal').modal('toggle');
                                $('#jadwaltables2').DataTable().ajax.reload();
                            });
                            //window.location.reload();
                        }, 400);
                    }
                }
            });
        });
    </script>