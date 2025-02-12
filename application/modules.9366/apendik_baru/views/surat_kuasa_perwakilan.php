<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row" id="apendik-page1">
                <div id='style-judul' class="col-lg-12">
                    <div class="panel panel-collapse panel-info panel-bordered">
                        <div class="panel-heading">
                        <h1>Surat Kuasa Perwakilan</h1>
                        <h3>Tanggal Terbang : <?php echo $tglberangkat ?></h3>
                        <h3>Nama Majikan : <?php echo $namamajikan ?></h3>
                        </div>
                        <div class="panel-body">
                            <form target="_blank" method="POST" action="<?php echo site_url('apendik_baru/print_surat_kuasa_perwakilan') ?>">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nama</td>
                                        <td>Opsi</td>
                                    </tr>
                                    <?php foreach($listTki as $key => $val) {
                                    ?>
                                        <tr class="dkrhtag<?php echo $key ?>">
                                            <td><?php echo $val->id_biodata.' '.$val->nama ?></td>
                                            <td>
                                                <input type="hidden" name="dkrhInput[<?php echo $key ?>]" value="<?php echo $val->id_biodata ?>" />
                                                <button type="button" class="btn btn-danger btnHapus" data-hapus="dkrhtag<?php echo $key ?>">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="2" align="right">
                                            <input type="hidden" name="tglberangkat" value="<?php echo $tglberangkat ?>" />
                                            <input type="hidden" name="kodemajikan" value="<?php echo $kodemajikan ?>" />
                                            <button type="submit" class="btn btn-success">PRINT</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click','.btnHapus',function() {
        let id = $(this).data('hapus');
        $('.'+id).remove();
    });
</script>