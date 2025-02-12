<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Dokumen Bank </span>
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
                    <li class='active'>Dokumen Bank</li>
                </ul>
            </div>
        </div>
    </div>
</div>                   


                <div class="row-fluid">

                                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Administrasi</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
    </br>
                            <div class='box-content box-no-padding'>

                            <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                    <?php 
                                        $this->load->view('template/menuadministrasi');
                                    ?>
                                </div>
                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                    
                                    
                                </div>

                                    <div class='span9 box'>

        <div class='box-header'>
            <div class='title'>Update Dokumen Bank</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content'>
            <div class='accordion accordion-contrast' id='accordion' style='margin-bottom:0;'>
                <div class='accordion-group'>
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseOne-accordion'>
                            Tanggal Terima Visa
                        </a>
                    </div>
                    <div class='accordion-body collapse in' id='collapseOne-accordion'>
                        <div class='accordion-inner'>
                            Molestiae incidunt porro ad occaecati maxime sint dolor non error qui nesciunt sunt qui quisquam reiciendis omnis ea iure dolores qui et.
                        </div>
                    </div>
                </div>
                <div class='accordion-group'>
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseTwo-accordion'>
                            Sit nemo ducimus laborum
                        </a>
                    </div>
                    <div class='accordion-body collapse' id='collapseTwo-accordion'>
                        <div class='accordion-inner'>
                            Molestiae incidunt porro ad occaecati maxime sint dolor non error qui nesciunt sunt qui quisquam reiciendis omnis ea iure dolores qui et.
                        </div>
                    </div>
                </div>
                <div class='accordion-group'>
                    <div class='accordion-heading'>
                        <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseThree-accordion'>
                            Dicta cumque perspiciatis.
                        </a>
                    </div>
                    <div class='accordion-body collapse' id='collapseThree-accordion'>
                        <div class='accordion-inner'>
                            Molestiae incidunt porro ad occaecati maxime sint dolor non error qui nesciunt sunt qui quisquam reiciendis omnis ea iure dolores qui et.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
                                <!-- <div class="space5"></div> -->

                                <?php } ?>

                            </div>
        </div>


                    </div>