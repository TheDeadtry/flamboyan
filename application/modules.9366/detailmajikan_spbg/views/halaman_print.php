


<?php 
$stts = substr($detailpersonalid, 0, 2); 
$newf = false;
if($stts == 'FI' || $stts == 'MI') { 
    $ddd = 'SPBG-D';
    $newf = true;
}
if($stts == 'MF' || $stts == 'FF') {
    $ddd = 'SPBG-FAC';
    $newf = false;
}
if($stts == 'JP') {
    $ddd = 'SPBG-NUR';
    $newf = false;
} ?>
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Print <?php echo $ddd; ?> <b><?php echo $ambil_data_propinsi_tipe. '('.$detailpersonalid.')'; ?> </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('detailmajikan_spbg/print1/'.$detailpersonalid);?>" method="post" class="form-horizontal" >
                            
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Pilih No.COMLA</label>
                                        <div class="col-lg-10">
                                            <select name="spbg" class="form-control">
                                                <?php foreach ($tampil_data_spbg as $k => $v): ?>
                                                    <option value="<?= $v->id_setting_spbg ?>"><?= $v->k1.' - '.$v->k2.' - '.$v->k3; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Isian Tanggal</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="tgl" type='text' value="<?php echo date('Y.m.d') ?>" />
                                        </div>
                                    </div>
                                </div>
                                <?php if ($newf == true) { ?>
                                    <!-- <div class="form-group">
                                        <div class="row">
                                            <label class="control-label col-lg-2">Versi</label>
                                            <div class="col-lg-10">
                                                <select name="versi" class="form-control">
                                                    <option value="baru" selected>Baru</option>
                                                    <option value="lama">Lama</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                <?php } ?>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-lg btn-success">Print</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading bg-teal-800">
                            <h5 class="panel-title"><b><i> Setting Print SPBG-FAC & SPBG-NUR P. JAWA </i></b></h5>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('detailmajikan_spbg/updateSetting/1/'.$detailpersonalid);?>" method="post" class="form-horizontal" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi kesehatan nasional</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="fpj1" type='number' value="<?php echo $dkrh->fpj1 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi tenaga kerja</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="fpj2" type='number' value="<?php echo $dkrh->fpj2 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Pajak pendapatan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="fpj3" type='number' value="<?php echo $dkrh->fpj3 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Gaji yang disepakati per bulan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="fpj4" type='number' value="<?php echo $dkrh->fpj4 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-lg bg-teal">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading bg-brown-800">
                            <h5 class="panel-title"><b><i> Setting Print SPBG-FAC & SPBG-NUR LUAR JAWA </i></b></h5>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('detailmajikan_spbg/updateSetting/2/'.$detailpersonalid);?>" method="post" class="form-horizontal" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi kesehatan nasional</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="flj1" type='number' value="<?php echo $dkrh->flj1 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi tenaga kerja</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="flj1" type='number' value="<?php echo $dkrh->flj2 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Pajak pendapatan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="flj3" type='number' value="<?php echo $dkrh->flj3 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Gaji yang disepakati per bulan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="flj4" type='number' value="<?php echo $dkrh->flj4 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-lg bg-teal">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading bg-grey-800">
                            <h5 class="panel-title"><b><i> Setting Print SPBG-D P. JAWA </i></b></h5>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('detailmajikan_spbg/updateSetting/3/'.$detailpersonalid);?>" method="post" class="form-horizontal" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi kesehatan nasional</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ipj1" type='number' value="<?php echo $dkrh->ipj1 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi tenaga kerja</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ipj2" type='number' value="<?php echo $dkrh->ipj2 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Pajak pendapatan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ipj3" type='number' value="<?php echo $dkrh->ipj3 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Gaji yang disepakati per bulan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ipj4" type='number' value="<?php echo $dkrh->ipj4 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-lg bg-teal">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading bg-green-800">
                            <h5 class="panel-title"><b><i> Setting Print SPBG-D LUAR JAWA </i></b></h5>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo site_url('detailmajikan_spbg/updateSetting/4/'.$detailpersonalid);?>" method="post" class="form-horizontal" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi kesehatan nasional</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ilj1" type='number' value="<?php echo $dkrh->ilj1 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Biaya asuransi tenaga kerja</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ilj2" type='number' value="<?php echo $dkrh->ilj2 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Pajak pendapatan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ilj3" type='number' value="<?php echo $dkrh->ilj3 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-lg-12">Gaji yang disepakati per bulan</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" name="ilj4" type='number' value="<?php echo $dkrh->ilj4 ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-lg bg-teal">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>