        <?php 
            $url_linkz      = $_SERVER['REQUEST_URI'];
            $exp_url_linkz  = explode ("/", $url_linkz);
            for ($varr = 0; $varr < count($exp_url_linkz); $varr++ ) {
                if ($exp_url_linkz[$varr] == 'index.php') {
                    $ccu = $varr;
                }
            }

            //$link_getit = $exp_url_linkz[$ccu+1];
            //echo '<script>alert('.$url_linkz.')</script>';

            $sz_da = '';
            $sz_dp = '';
            $sz_df = '';
            $sz_dw = '';
            $sz_ds = '';
            $sz_dr = '';
            $sz_dua = '';
            $sz_duk = '';
            $sz_dpeng = '';
            $sz_dtgs = '';
            $sz_dkett = '';
            $sz_dinter = '';
            $sz_pptk = '';
            $sz_exper = '';
            if ($exp_url_linkz[$ccu+1] == 'detailadministrasi') {
                $sz_da = 'orange-background';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailpersonal') {
                $sz_da = '';
                $sz_dp = 'orange-background';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailfamily') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = 'orange-background';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailworking') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = 'orange-background';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailskill') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = 'orange-background';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailrequest') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = 'orange-background';
                $sz_dua = '';
                $sz_duk = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'upload_arc') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = 'orange-background';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'upload_keterangan') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = 'orange-background';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailpengalaman') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = 'orange-background';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailtugas') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = 'orange-background';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailkettugas') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = 'orange-background';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailinterview') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = 'orange-background';
                $sz_pptk = '';
                $sz_exper = '';
            }  elseif ($exp_url_linkz[$ccu+1] == 'detailpptk') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = 'orange-background';
                $sz_exper = '';
            } elseif ($exp_url_linkz[$ccu+1] == 'detailexperience') {
                $sz_da = '';
                $sz_dp = '';
                $sz_df = '';
                $sz_dw = '';
                $sz_ds = '';
                $sz_dr = '';
                $sz_dua = '';
                $sz_duk = '';
                $sz_dpeng = '';
                $sz_dtgs = '';
                $sz_dkett = '';
                $sz_dinter = '';
                $sz_pptk = '';
                $sz_exper = 'orange-background';
            }




        ?>
    <ul class="nav nav-tabs nav-stacked">            
        <li class="<?php echo $sz_da ?>" ><a href="<?php echo base_url()."index.php/detailadministrasi"?>"><i class="icon-user "></i> Administrasi TKI</a></li>
    <?php
        //$stts = 'FI'; 
        $stts = substr($detailpersonalid, 0, 2);
        if($stts == 'FF' || $stts == 'MF'|| $stts == 'FH') { 
    ?>
        <li class="<?php echo $sz_dp ?>" ><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li class="<?php echo $sz_df ?>" ><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li class="<?php echo $sz_dw ?>" ><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
        <li class="<?php echo $sz_ds ?>" ><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
        <li class="<?php echo $sz_dr ?>" ><a href="<?php echo base_url()."index.php/detailrequest/"?>"><i class="icon-info-sign"></i> Request</a></li>
        <li class="<?php echo $sz_pptk ?>" ><a href="<?php echo base_url()."index.php/detailpptk/"?>"><i class="icon-check-sign"></i> Pernyataan</a></li>
        <li class="<?php echo $sz_exper ?>" ><a href="<?php echo base_url()."index.php/detailexperience/"?>"><i class="icon-check-sign"></i> experience</a></li>
        <li><a href="<?php echo base_url()."index.php/detailvaksin/"?>"><i class="icon-check-sign"></i> Vaksin</a></li>
        <h5> Upload Dokumen</h5>
        <li class="<?php echo $sz_dua ?>" ><a href="<?php echo base_url()."index.php/upload_arc/arcadminpersonal"?>"><i class="icon-info-sign"></i> Upload ARC & Asuransi</a></li>
        <li class="<?php echo $sz_duk ?>" ><a href="<?php echo base_url()."index.php/upload_keterangan/keteranganadminpersonal"?>"><i class="icon-info-sign"></i> Upload Keterangan</a></li>

        <?php  
    } else if($stts == 'FI') { ?>

        <li class="<?php echo $sz_dp ?>" ><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li class="<?php echo $sz_df ?>"><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li class="<?php echo $sz_dpeng ?>" ><a href="<?php echo base_url()."index.php/detailpengalaman/"?>"><i class="icon-briefcase"></i> Detail Pengalaman</a></li>
        <li class="<?php echo $sz_dtgs ?>" ><a href="<?php echo base_url()."index.php/detailtugas/"?>"><i class="icon-pencil"></i> Tugas</a></li>
        <li class="<?php echo $sz_dkett ?>" ><a href="<?php echo base_url()."index.php/detailkettugas/"?>"><i class="icon-pencil"></i> Keterangan Tugas</a></li>
        <li><a href="<?php echo base_url()."index.php/detailvaksin/"?>"><i class="icon-check-sign"></i> Vaksin</a></li>
        <h5> Upload Dokumen</h5>
        <li class="<?php echo $sz_dua ?>" ><a href="<?php echo base_url()."index.php/upload_arc/arcadminpersonal"?>"><i class="icon-info-sign"></i> Upload ARC & Asuransi</a></li>
        <li class="<?php echo $sz_duk ?>" ><a href="<?php echo base_url()."index.php/upload_keterangan/keteranganadminpersonal"?>"><i class="icon-info-sign"></i> Upload Keterangan</a></li>
        
        <?php    
            } else if($stts == 'JP') { 
        ?> 

        <li class="<?php echo $sz_dp ?>" ><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li class="<?php echo $sz_df ?>"><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li class="<?php echo $sz_dw ?>" ><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
        <li class="<?php echo $sz_ds ?>" ><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
        <li class="<?php echo $sz_dinter ?>" ><a href="<?php echo base_url()."index.php/detailinterview/"?>"><i class="icon-pencil"></i> Interview</a></li>
        <li><a href="<?php echo base_url()."index.php/detailvaksin/"?>"><i class="icon-check-sign"></i> Vaksin</a></li>

        <h5> Upload Dokumen</h5>
        <li class="<?php echo $sz_dua ?>" ><a href="<?php echo base_url()."index.php/upload_arc/arcadminpersonal"?>"><i class="icon-info-sign"></i> Upload ARC & Asuransi</a></li>
        <li class="<?php echo $sz_duk ?>" ><a href="<?php echo base_url()."index.php/upload_keterangan/keteranganadminpersonal"?>"><i class="icon-info-sign"></i> Upload Keterangan</a></li>

        <?php    
            } else if($stts == 'MI' || $stts = "MC" || $stts = "MH") { ?> 

        <li class="<?php echo $sz_dp ?>" ><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li class="<?php echo $sz_df ?>" ><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li class="<?php echo $sz_dw ?>" ><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
        <li class="<?php echo $sz_ds ?>" ><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
        <li class="<?php echo $sz_dr ?>" ><a href="<?php echo base_url()."index.php/detailrequest/"?>"><i class="icon-info-sign"></i> Request</a></li>
        <li><a href="<?php echo base_url()."index.php/detailvaksin/"?>"><i class="icon-check-sign"></i> Vaksin</a></li>
        <h5> Upload Dokumen</h5>
        <li class="<?php echo $sz_dua ?>" ><a href="<?php echo base_url()."index.php/upload_arc/arcadminpersonal"?>"><i class="icon-info-sign"></i> Upload ARC & Asuransi</a></li>
    <?php 
        }
    ?>
       
         <h5></h5>
        <h5> KEMBALI</h5>
        
        <li><a href="<?php echo base_url()."index.php/databio/"?>"><i class="icon-briefcase"></i> DATA PERSONAL</a></li>

    </ul>

      <!--   <ul class="nav nav-tabs nav-stacked">
        <?php
            //$stts = 'FI'; 
            $stts = substr($detailpersonalid, 0, 2);
            if($stts == 'FH' || $stts == 'FF' || $stts == 'MI' || $stts == 'MF') { 
        ?>

        <li label label-success><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
        <li><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailrequest/"?>"><i class="icon-info-sign"></i> Request</a></li>

        <?php  
            } else if($stts == 'FI') { ?>

        <li label label-success><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li><a href="<?php echo base_url()."index.php/detailpengalaman/"?>"><i class="icon-briefcase"></i> Detail Pengalaman</a></li>
        <li><a href="<?php echo base_url()."index.php/detailtugas/"?>"><i class="icon-pencil"></i> Tugas</a></li>
        <li><a href="<?php echo base_url()."index.php/detailkettugas/"?>"><i class="icon-pencil"></i> Keterangan Tugas</a></li>
        
        <?php    
            } else if($stts == 'JP') { ?> 

        <li label label-success><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
        <li><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
        <li><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
        <li><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailinterview/"?>"><i class="icon-pencil"></i> Interview</a></li>

        <?php 
            }
        ?>

        <h5> DOKUMEN LOKAL</h5>
        <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-external-link"></i> Passport</a></li>
        <li><a href="<?php echo base_url()."index.php/detailvisa/"?>"><i class="icon-filter"></i> Visa</a></li>
        <li><a href="<?php echo base_url()."index.php/detaildisnaker/"?>"><i class="icon-tasks"></i> Disnaker Online</a></li>
        <li><a href="<?php echo base_url()."index.php/detailmajikan/"?>"><i class="icon-link"></i> Majikan / Agen</a></li>
        <li><a href="<?php echo base_url()."index.php/detailbank/"?>"><i class="icon-bar-chart"></i> Bank</a></li>
        <li><a href="<?php echo base_url()."index.php/detailasuransi/"?>"><i class="icon-eye-open"></i> Asuransi</a></li>
        <li><a href="<?php echo base_url()."index.php/detailterbang/"?>"><i class="icon-plane"></i> Departure</a></li>  

         <h5></h5>
        <h5> PROGRESS DATA</h5>
        <li><a href="<?php echo base_url()."index.php/marketing/"?>"><i class="icon-group"></i> Progress Marketing</a></li>
        <li><a href="<?php echo base_url()."index.php/dokumen/"?>"><i class="icon-briefcase"></i> Progress Dokumen</a></li>

    </ul> -->