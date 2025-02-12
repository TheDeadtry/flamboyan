<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Hisrtory Suhan </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail History Suhan</li>
                </ul>
            </div>
        </div>
    </div>
</div>  
                          <div class='row-fluid'>
    <div class='span12'>
<!-- <a href="javascript:close_window();">close</a> -->
</div>  </div> 
<button class='btn btn-info btn-large' onclick="goBack()">Kembali</button>

<script>
function goBack() {
    window.history.back();
}
</script>
                                <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
                                <div class='title'>Daftar TKI Suhan <?php echo $ambidatasuhan;?> - <?php echo $ambidatasuhanmajikan;?></div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>ID TKI </th>
                                            <th>NAMA TKI</th>
                                              <th>Tanggal Terima</th>
                                              <th>Stats Suhan</th>
                                                <th>Tanggal Simpan</th>
                                                  <th>Tanggal Kirim</th>
                                                  <th>KETERANGAN</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_datatki as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->idnyabio;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            
                                            <td><?php echo $row->tglsimpansuhan;?></td>
                                             <td><?php echo $row->statsuhan;?></td>
                                             <td><?php 
                                             if($row->tempatsuhandok=='放印尼 DI INDONESIA'){
                                            echo $row->tglberangkat;
                                             }?></td>
                                             <td><?php 
                                             if($row->tempatsuhandok=='寄臺灣KE TAIWAN'){
                                            echo $row->tglberangkat;
                                             }?></td>
                                             
                                             <td><?php echo $row->ketdoksuhan;?></td>
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>



                                </div>
                            </div>
                        </div>
</div></div>