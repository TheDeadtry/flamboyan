            <div class='row-fluid'>
                <div class='span12'>
                    <div class='page-header'>
                        <h1 class='pull-left'>
                            <i class='icon-star'></i>
                            <span>Detail Absensi </span>
                        </h1>
                        <div class='pull-right'>
                            <ul class='breadcrumb'>
                                <li>
                                    <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i> Dashboard</a>
                                </li>
                                <li class='separator'>
                                    <i class='icon-angle-right'></i>
                                </li>
                                <li>
                                    <a href="<?php echo site_url().'/absensi'; ?>"><i class='icon-group'></i> Absensi</a>
                                </li>
                                <li class='separator'>
                                    <i class='icon-angle-right'></i>
                                </li>
                                <li class='active'>Detail Absensi </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                     
            <div class="row-fluid">
                <div class='span12 box bordered-box red-border' style='margin-bottom:0;'>
                    <div class='box-header blue-background'>
                        <div class='title'>Detail Absensi</div>
                        <div class='actions'>
                            <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
                            <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
                        </div>
                    </div>
                    <div class='box-content box-no-padding'>
                        <?php foreach ($personal as $row) { ?>
                        <div class="span3">
                            <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                            <ul class="nav nav-tabs nav-stacked">
                                <div class='box-content box-statistic green-background'>
                                    <h3 class='title text-primary'><?php echo $dethadir->num_rows();?></h3>
                                    <small>Masuk</small>
                                    <div class='text-success icon-group align-right'></div>
                                </div>
                                <div class='box-content box-statistic blue-background'>
                                    <h3 class='title text-success'><?php echo $detsakit->num_rows();?></h3>
                                    <small>Sakit</small>
                                    <div class='text-primary icon-group align-right'></div>
                                </div>
                                <div class='box-content box-statistic orange-background'>
                                    <h3 class='title muted'><?php echo $detijin->num_rows();?></h3>
                                    <small>Ijin</small>
                                <div class='warning icon-group align-right'></div>
                            </div>
                            <div class='box-content box-statistic red-background'>
                                <h3 class='title muted'><?php echo $dettk->num_rows();?></h3>
                                <small>Tanpa Keterangan</small>
                                <div class='danger icon-group align-right'></div>
                            </div>
                        </ul>
                    </div>

                    <div class="span6">
                        <h4><?php echo $row->nama;?> <br /><small><?php echo "".$row->id_biodata; ?></small></h4>
                    </div>
                    
                    <div class='span8 box bordered-box red-border' style='margin-bottom:0;'>
                        <div class='accordion accordion-contrast' id='accordion' style='margin-bottom:0;'>
                            <div class='accordion-group'>
                                <div class='accordion-heading'>
                                    <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseOne-accordion'>
                                        Detail Hadir
                                    </a>
                                </div>
                                <div class='accordion-body collapse in' id='collapseOne-accordion'>
                                    <div class='accordion-inner'>
                                        <ul>
                                            <?php foreach($dethadir->result() as $row) { ?>
                                            <li><?php echo $row->tanggal_abs.", Absen ".$row->jenis_abs." - ".$row->keterangan; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class='accordion-group'>
                                <div class='accordion-heading'>
                                    <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseTwo-accordion'>
                                        Detail Sakit
                                    </a>
                                </div>
                                <div class='accordion-body collapse' id='collapseTwo-accordion'>
                                    <div class='accordion-inner'>
                                        <ul>
                                            <?php foreach($detsakit->result() as $row) { ?>
                                            <li><?php echo $row->tanggal_abs.", Absen ".$row->jenis_abs." - ".$row->keterangan; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class='accordion-group'>
                                <div class='accordion-heading'>
                                    <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseThree-accordion'>
                                        Detail Ijin
                                    </a>
                                </div>
                                <div class='accordion-body collapse' id='collapseThree-accordion'>
                                    <div class='accordion-inner'>
                                        <ul>
                                            <?php foreach($detijin->result() as $row) { ?>
                                            <li><?php echo $row->tanggal_abs.", Absen ".$row->jenis_abs." - ".$row->keterangan; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class='accordion-group'>
                                <div class='accordion-heading'>
                                    <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseFour-accordion'>
                                        Detail Tanpa Keterangan
                                    </a>
                                </div>
                                <div class='accordion-body collapse' id='collapseFour-accordion'>
                                    <div class='accordion-inner'>
                                        <ul>
                                            <?php foreach($dettk->result() as $row) { ?>
                                            <li><?php echo $row->tanggal_abs.", Absen ".$row->jenis_abs." - ".$row->keterangan; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="space5"></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>