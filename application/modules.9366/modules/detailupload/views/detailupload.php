<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Upload</span>
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
                    <li class='active'>Detail Upload </li>
                </ul>
            </div>
        </div>
    </div>
</div>                

                <div class="row-fluid">

                                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Upload</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                            <?php foreach ($tampil_data_personal as $row) { ?>
                            <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                      </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>

                                    </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                                </div>
                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                    
                                    
                                </div>
                            </br>
 <?php } ?>

                            

    <div class='span8 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_visa'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>Upload Visa</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_ketaiwan'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Pasfoto Ke Taiwan</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_ktp'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>KTP</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_kk'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'>KK</div>
                </a>
            </div>
            <div class='span2 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_aktelahir'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'>Akte Lahir</div>
                </a>
            </div>
            <div class='span2 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_ijasah'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>Ijasah/Keterangan Sekolah</div>
                </a>
            </div>
        </div>
    </div>

        <div class='span8 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_suratnikah'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>Surat Nikah</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_suratijinkeluarga'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Surat Ijin Keluarga</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_pasporlama'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>Paspor Lama</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_asuransilama'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'>ARC+Asuransi Lama</div>
                </a>
            </div>
            <div class='span2 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_perjanjianpenempatan'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'>Perjanjian Penempatan</div>
                </a>
            </div>
            <div class='span2 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_pasporbaru'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>Paspor Baru</div>
                </a>
            </div>
        </div>
    </div>

     <div class='span8 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_kehilanganpaspor'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>Surat Kehilangan Paspor Lama</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_medikal'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Sertifikat Medikal Pra</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_serkes'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>SERKES</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_medikalfull'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'>Sertifikan Medikal Full</div>
                </a>
            </div>
            <div class='span2 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_sertifikatujian'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'>Sertifikat Ujian</div>
                </a>
            </div>
            <div class='span2 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_kpapra'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>KPA PRA</div>
                </a>
            </div>
        </div>
    </div>


     <div class='span8 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_pk'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>Perjanjian Kerja</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_suhan'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Suhan</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_visapermit'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>Visa Permit</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_fotovisa'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'>Foto Visa</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_tiket'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>Tiket</div>
                </a>
            </div>
            <div class='span2 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_visaarrival'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>Visa Arrival</div>
                </a>
            </div>
        </div>
    </div>


     <div class='span8 box box-transparent'>
        <div class='row-fluid'>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_arc'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>ARC</div>
                </a>
            </div>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_legalitas'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>Legalitas</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_skuasa'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Surat Kuasa</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_spernyataan'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>Surat Pernyataan</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_kabur'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'>Surat Resiko Kabur</div>
                </a>
            </div>
            <div class='span2 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_job'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'>Job Description</div>
                </a>
            </div>
           
        </div>
    </div>

    
     <div class='span8 box box-transparent'>
        <div class='row-fluid'>
             <div class='span2 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_agen'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>Permintaan Agen / Majikan</div>
                </a>
            </div>
            <div class='span2 box-quick-link blue-background'>
                <a href='<?php echo site_url().'/upload_suhankabur'; ?>'>
                    <div class='header'>
                        <div class='icon-legal'></div>
                    </div>
                    <div class='content'>Suhan Kabur</div>
                </a>
            </div>
            <div class='span2 box-quick-link green-background'>
                <a href='<?php echo site_url().'/upload_pkeluarga'; ?>'>
                    <div class='header'>
                        <div class='icon-book'></div>
                    </div>
                    <div class='content'>Penyataan Keluarga Kabur</div>
                </a>
            </div>
            <div class='span2 box-quick-link orange-background'>
                <a href='<?php echo site_url().'/upload_berkas'; ?>'>
                    <div class='header'>
                        <div class='icon-briefcase'></div>
                    </div>
                    <div class='content'>Surat Tanda Pengambilan Berkas</div>
                </a>
            </div>
            <div class='span2 box-quick-link purple-background'>
                <a href='<?php echo site_url().'/upload_slain'; ?>'>
                    <div class='header'>
                        <div class='icon-globe'></div>
                    </div>
                    <div class='content'>Surat Lain</div>
                </a>
            </div>
            <div class='span2 box-quick-link red-background'>
                <a href='<?php echo site_url().'/upload_skck'; ?>'>
                    <div class='header'>
                        <div class='icon-flag'></div>
                    </div>
                    <div class='content'>SKCK</div>
                </a>
            </div>
            
        </div>
    </div>
    <div class='span8 box box-transparent'>
        <div class='row-fluid'>
             <div class='span2 box-quick-link muted-background'>
                <a href='<?php echo site_url().'/upload_kpa'; ?>'>
                    <div class='header'>
                        <div class='icon-tags'></div>
                    </div>
                    <div class='content'>KPA Masa Purna</div>
                </a>
            </div>
           
            
        </div>
    </div>

                            </div>
                              </div>
     </div>


                          
    
                               

       