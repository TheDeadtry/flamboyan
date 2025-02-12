<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Biodata</span>
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
                    <li class='active'>Data Biodata</li>
                </ul>
            </div>
        </div>
    </div>
</div>


                            <div class='row-fluid'>
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Biodata Tkw</div>
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
                                            <th>Nama Mandarin</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->id_biodata;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->nama_mandarin;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
                                            <td><a href="<?php echo base_url()."index.php/databiopantijompo/detaildata/".$row->id_biodata; ?>">Detail</a></td>
                                            <td><a href="<?php echo base_url()."index.php/databiopantijompo/detaildataupload/".$row->id_biodata; ?>">Detail Upload</a></td>

                                            <td><a href="<?php echo base_url()."index.php/databiopantijompo/deletedata/".$row->id_biodata; ?>" onclick="return deletechecked();">Delete</a></td> 
                                            
                                            
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
