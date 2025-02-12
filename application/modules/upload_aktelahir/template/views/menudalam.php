    <ul class="nav nav-tabs nav-stacked">
        <?php
            //$stts = 'FI'; 
            $stts = substr($detailpersonalid, 0, 2);
            if($stts == 'FF' || $stts == 'MI' || $stts == 'MF') { 
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
<!--          <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-external-link"></i> Passport</a></li> -->
    <!--    <li><a href="<?php echo base_url()."index.php/detailvisa/"?>"><i class="icon-filter"></i> Visa</a></li> -->
        <li><a href="<?php echo base_url()."index.php/detaildisnaker/"?>"><i class="icon-tasks"></i> Disnaker Online</a></li>
        <!-- <li><a href="<?php echo base_url()."index.php/detailbank/"?>"><i class="icon-bar-chart"></i> Bank</a></li>
        <li><a href="<?php echo base_url()."index.php/detailasuransi/"?>"><i class="icon-eye-open"></i> Asuransi</a></li>
        <li><a href="<?php echo base_url()."index.php/detailterbang/"?>"><i class="icon-plane"></i> Departure</a></li>   -->

         <h5></h5>
        <h5> PROGRESS DATA</h5>
        
        <li><a href="<?php echo base_url()."index.php/detailadministrasi/"?>"><i class="icon-briefcase"></i> Administrasi</a></li>

    </ul>

      <!--   <ul class="nav nav-tabs nav-stacked">
        <?php
            //$stts = 'FI'; 
            $stts = substr($detailpersonalid, 0, 2);
            if($stts == 'FF' || $stts == 'MI' || $stts == 'MF') { 
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