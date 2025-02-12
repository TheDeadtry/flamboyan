<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h2> <span class="text-semibold">Laporan Asuransi Pra Awal </span></h2>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
            </div>
        </div>
    </div>
</div>

<div class="alert bg-info alert-styled-left">
    <button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
</div>

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title text-center"><b><i>Laporan Asuransi Pra Awal </i></b></h5>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">   
                            <form class="form-horizontal" method="post" action="<?php echo site_url('laporanasuransi/filtertanggalawal'); ?>">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Bulan </label>
                                    <div class="controls col-lg-4">
                                        <select class="form-control" name="bulan" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="<?php echo $bulan;?>" />
                                            <?php 
                                                if($bulan==null) {
                                            } else {
                                                echo $bulannya[(int)$bulan-1];
                                            }
                                            ?>
                                            <option value="1" /> Januari
                                            <option value="2" /> Februari
                                            <option value="3" /> Maret
                                            <option value="4" /> April
                                            <option value="5" /> Mei
                                            <option value="6" /> Juni
                                            <option value="7" /> Juli
                                            <option value="8" /> Agustus
                                            <option value="9" /> September
                                            <option value="10" /> Oktober
                                            <option value="11" /> November
                                            <option value="12" /> Desember                                                                        
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tahun</label>
                                    <div class="controls col-lg-4">
                                        <input type="text" name="tahun" required class="form-control" value="<?php echo date("Y")?>" data-trigger="hover" data-content="tahun" data-original-title="Nama Lengkap" />
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-info btn-large" name="submit">Tampilkan</button>
                                        <a  class="btn btn-info btn-large" href="<?php echo base_url(); ?>index.php/pdf13/cetakfilter?bulan=<?php echo $bulan;?>&tahun=<?php echo $tahun;?>"> PRINT </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-warning-400">
                            <h5 class="panel-title"><b><i>DATA PEMBAYARAN </i></b></h5>
                        </div>

                        <div class="panel-body"> 
                            <table class='table table-bordered' style='margin-bottom:0;'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No ID</th>
                                        <th>Nama</th>
                                        <th>L/P</th>
                                        <th>Jumlah Uang (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1; 
                                        foreach ($asuransipra as $row) { 
                                    ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->id_biodata;?></td>
                                                <td><?php echo $row->namapersonal;?></td>
                                                <td><?php echo $row->jeniskelamin;?></td>
                                                <td><?php echo $row->biaya;?></td>
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
          

