<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Adminstrasi</span>
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
                    <li class='active'>Data Adminstrasi</li>
                </ul>
            </div>
        </div>
    </div>
</div>


                            <div class='row-fluid'>
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Adminstrasi Tkw</div>
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
                                             <th>sponsor</th>
                                            <th>ID DISNAKER</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
  <?php if($row->skill1==""){?>
                                            <td><?php echo "".$row->id_biodata."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></td>
                                              <?php }else{?>
                                            <td><?php echo "".$row->id_biodata."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></td>
                                     <?php }?>                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->nama_mandarin;?></td>
                                            <td><?php echo $row->namasponsor;?></td>
                                              <td><?php echo $row->nodisnaker;?></td>
                                             <td> <div class='label label-important external-event'><?php echo $row->statusaktif;?></div></td>
                                            <td><a href="<?php echo base_url()."index.php/dataadministrasi/detaildata/".$row->id_biodata; ?>">Detail</a></td>

                                            <td><a href="<?php echo base_url()."index.php/databiomaleformal/deletedata/".$row->id_biodata; ?>" onclick="return deletechecked();">Delete</a></td> 
                                            
                                            
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
