<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span> Administrasi Personal (DALAM PERBAIKAN) </span>
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
                    <li class='active'>Administrasi Personal</li>
                </ul>
            </div>
        </div>
    </div>
</div>

                        <div class='row-fluid'>
    <div class='span12 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/absensi'; ?>'>
                    <div class='header'>
                        <div class='icon-pushpin'></div>
                    </div>
                    <div class='content'>Absensi</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/ujianwanita'; ?>'>
                    <div class='header'>
                        <div class='icon-tasks'></div>
                    </div>
                    <div class='content'>Ujian Female Informal</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/ujianjompo'; ?>'>
                    <div class='header'>
                        <div class='icon-tasks'></div>
                    </div>
                    <div class='content'>Ujian Panti Jompo</div>
                </a>
            </div>

        </div>
    </div>
</div>
				
<div class="row-fluid">

                            <div class='box-content box-no-padding'>

                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Administrasi Tkw</div>
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
                                            <th>Id Biodata</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->id_biodata;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
                                            <td><a href="<?php echo base_url()."index.php/dataadministrasi/detaildata/".$row->id_biodata; ?>">Detail</a></td>
                                            
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>
             </div>

                            </div>
