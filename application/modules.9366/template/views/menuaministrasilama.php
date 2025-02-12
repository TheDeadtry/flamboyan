    <ul class="nav nav-tabs nav-stacked">
        <?php
            //$stts = 'FI'; 
            $stts = substr($detailpersonalid, 0, 2);
            if($stts == 'FI') { 
        ?>

        <!-- <li label label-success><a href="<?php echo base_url()."index.php/absensi/"?>"><i class="icon-user"></i> BLK ABSENSI</a></li> -->
        <li><a href="<?php echo base_url()."index.php/blkijin/"?>"><i class="icon-info-sign"></i> Blk Ijin</a></li>
        <li><a href="<?php echo base_url()."index.php/blkpkl/"?>"><i class="icon-info-sign"></i> Blk Pkl</a></li>
        <!-- <li><a href="<?php echo base_url()."index.php/ujianwanita/"?>"><i class="icon-info-sign"></i> BLK PRAKTEK</a></li> -->
        <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/"?>"><i class="icon-info-sign"></i> Dokumen Online </a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/"?>"><i class="icon-info-sign"></i> Dokumen Medical,PP,SKCK</a></li>
        <li><a href="<?php echo base_url()."index.php/marktaiwan/"?>"><i class="icon-info-sign"></i> Marketing Dokumen Taiwan</a></li>
        <li><a href="<?php echo base_url()."index.php/markvisa/"?>"><i class="icon-info-sign"></i> Dokumen Visa </a></li>
        <li><a href="<?php echo base_url()."index.php/markdokubank/"?>"><i class="icon-info-sign"></i> Dokumen Bank </a></li>
        <li><a href="<?php echo base_url()."index.php/markcairbank/"?>"><i class="icon-info-sign"></i> Pencairan Bank </a></li>

        <?php  
            }else if($stts == 'JP') { ?>

        <!-- <li label label-success><a href="<?php echo base_url()."index.php/absensi/"?>"><i class="icon-user"></i> BLK ABSENSI</a></li> -->
        <li><a href="<?php echo base_url()."index.php/blkijin/"?>"><i class="icon-info-sign"></i> BLK IJIN </a></li>
        <li><a href="<?php echo base_url()."index.php/blkpkl/"?>"><i class="icon-info-sign"></i> BLK PKL</a></li>
        <!-- <li><a href="<?php echo base_url()."index.php/ujianjompo/"?>"><i class="icon-info-sign"></i> BLK PRAKTEK</a></li> -->
        <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/"?>"><i class="icon-info-sign"></i> Dokumen Online </a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/"?>"><i class="icon-info-sign"></i> Dokumen Medical,PP,SKCK</a></li>
        <li><a href="<?php echo base_url()."index.php/marktaiwan/"?>"><i class="icon-info-sign"></i> Marketing Dokumen Taiwan</a></li>
        <li><a href="<?php echo base_url()."index.php/markvisa/"?>"><i class="icon-info-sign"></i> Dokumen Visa </a></li>
        <li><a href="<?php echo base_url()."index.php/markdokubank/"?>"><i class="icon-info-sign"></i> Dokumen Bank </a></li>
        <li><a href="<?php echo base_url()."index.php/markcairbank/"?>"><i class="icon-info-sign"></i> Pencairan Bank </a></li>

        <?php    
            }else{ ?>

        <!-- <li label label-success><a href="<?php echo base_url()."index.php/absensi/"?>"><i class="icon-user"></i> BLK ABSENSI</a></li> -->
        <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/"?>"><i class="icon-info-sign"></i> Dokumen Online </a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/"?>"><i class="icon-info-sign"></i> Dokumen Medical,PP,SKCK</a></li>
        <li><a href="<?php echo base_url()."index.php/marktaiwan/"?>"><i class="icon-info-sign"></i> Marketing Dokumen Taiwan</a></li>
        <li><a href="<?php echo base_url()."index.php/markvisa/"?>"><i class="icon-info-sign"></i> Dokumen Visa </a></li>
        <li><a href="<?php echo base_url()."index.php/markdokubank/"?>"><i class="icon-info-sign"></i> Dokumen Bank </a></li>
        <li><a href="<?php echo base_url()."index.php/markcairbank/"?>"><i class="icon-info-sign"></i> Pencairan Bank </a></li>
            <?php } ?> 

    </ul>