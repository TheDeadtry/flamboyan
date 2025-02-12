
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> Data Notarisan </i></b></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <a type="button" class="btn btn-success" href="<?php echo site_url('notarisan_bulk') ?>">KEMBALI</a>
                            <hr/>
                            <form action="<?php echo site_url('notarisan_bulk/printformprocess'); ?>" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Tanggal</label>
                                        <div class="col-lg-10">
                                            <input required type="text" class="form-control" placeholder="Format tgl YYYY.MM.DD" name="tgl" id="tgl" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Type</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" id="type" name="type" required="required">
                                                <option value="formal">Formal</option>
                                                <option value="informal">Informal</option>
                                                <?php
                                                    $sektor = $this->db->query("SELECT kode_jenis, isi FROm datasektor")->result();
                                                    $sektor2 = $this->db->query("SELECT data kode_jenis, `group` isi FROM group_sektor gs")->result();
                                                ?>
                                                <?php foreach($sektor2 as $sektor2) : ?>
                                                    <option value="<?= $sektor2->kode_jenis ?>">(<?= $sektor2->kode_jenis ?>) <?= $sektor2->isi ?></option>
                                                <?php endforeach; ?>
                                                <?php foreach($sektor as $sektor) : ?>
                                                    <option value="<?= $sektor->kode_jenis ?>">(<?= $sektor->kode_jenis ?>) <?= $sektor->isi ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block bg-teal-600">PRINT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#type').select2({
        minimumResultsForSearch: -1
    });
</script>
