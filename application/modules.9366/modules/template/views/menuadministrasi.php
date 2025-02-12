    <ul class="nav nav-tabs nav-stacked">
        <?php
            $stts = substr($detailpersonalid, 0, 2);
            if($stts == 'FI') { 
        ?>
       <h5> Marketing</h5>
        <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li>
        <li><a href="<?php echo base_url()."index.php/detailmajikan/"?>"><i class="icon-link"></i> Majikan / Agen</a></li>
        

         <h5> BLK</h5>
        <li><a href="<?php echo base_url()."index.php/blkijin/"?>"><i class="icon-info-sign"></i> Blk Ijin</a></li>
        <li><a href="<?php echo base_url()."index.php/blkpkl/"?>"><i class="icon-info-sign"></i> Blk Pkl</a></li>
        <li><a href="<?php echo base_url()."index.php/durasi/"?>"><i class="icon-info-sign"></i> Durasi</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilujk/"?>"><i class="icon-info-sign"></i> Tanggal UJK</a></li>-->
        <!-- <li label label-success><a href="<?php echo base_url()."index.php/absensi/"?>"><i class="icon-user"></i> BLK ABSENSI</a></li> 

        <!-- <li><a href="<?php echo base_url()."index.php/ujianwanita/"?>"><i class="icon-info-sign"></i> BLK PRAKTEK</a></li> -->
        <!-- <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li> -->       
<!--          <h5> Administrasi Dokumen</h5>
        <li><a href="<?php echo base_url()."index.php/markonline/"?>"><i class="icon-info-sign"></i> Dokumen Online </a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/"?>"><i class="icon-info-sign"></i> Dokumen Medical,PP,SKCK</a></li>
        <li><a href="<?php echo base_url()."index.php/marktaiwan/"?>"><i class="icon-info-sign"></i> Marketing Dokumen Taiwan</a></li>
        <li><a href="<?php echo base_url()."index.php/markvisa/"?>"><i class="icon-info-sign"></i> Dokumen Visa </a></li> -->


<h5> DOKUMEN LOKAL</h5>
         <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-external-link"></i> Passport</a></li>


        <h5> Dokumen Online</h5>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildokrumah"?>"><i class="icon-info-sign"></i> Dokumen Rumah</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildoksurat"?>"><i class="icon-info-sign"></i> Surat Kehilangan</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildokrekom"?>"><i class="icon-info-sign"></i> Rekomendasi</a></li>

        <h5> Dokumen Medikal, PP, SKCK</h5>
        <li><a href="<?php echo base_url()."index.php/markmed/tampillegalitas"?>"><i class="icon-info-sign"></i> Legalitas Dan Notaris</a></li>
      <!--   <li><a href="<?php echo base_url()."index.php/markmed/tampilnotaris"?>"><i class="icon-info-sign"></i> Notaris</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilpramed"?>"><i class="icon-info-sign"></i> Pra-Medikal</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilsambungmed"?>"><i class="icon-info-sign"></i> Medikal Full Sambung Pra</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilmurni "?>"><i class="icon-info-sign"></i> Medikal Full Murni</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilpaspor "?>"><i class="icon-info-sign"></i> Paspor</a></li>-->
        <li><a href="<?php echo base_url()."index.php/detailskck "?>"><i class="icon-info-sign"></i> SKCK</a></li>

        <h5> Dokumen Visa</h5>
        <li><a href="<?php echo base_url()."index.php/detailvisa"?>"><i class="icon-info-sign"></i> VISA /PAP /KTKLN</a></li>

        
        <h5> Dokumen Bank</h5>
        <li><a href="<?php echo base_url()."index.php/detailterbang/"?>"><i class="icon-info-sign"></i> Final Terbang</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/"?>"><i class="icon-info-sign"></i> Pengajuan Signing Bank</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilsetelahterbang"?>"><i class="icon-info-sign"></i> Keadaan Setelah Terbang </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilemail"?>"><i class="icon-info-sign"></i>Pencairan Email </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilberkas"?>"><i class="icon-info-sign"></i>Info Isi Buku Pencarian Berkas </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilambildokumen"?>"><i class="icon-info-sign"></i>Info Penyerahan Dokumen </a></li>

        <?php } else if($stts == 'JP') { ?>
        <h5> Marketing</h5>
        <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li>
        <li><a href="<?php echo base_url()."index.php/detailmajikan/"?>"><i class="icon-link"></i> Majikan / Agen</a></li>

        <h5> DOKUMEN LOKAL</h5>
         <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-external-link"></i> Passport</a></li>

     <!--   <h5> BLK</h5>
        <li><a href="<?php echo base_url()."index.php/blkijin/"?>"><i class="icon-info-sign"></i> BLK IJIN </a></li>
        <li><a href="<?php echo base_url()."index.php/blkpkl/"?>"><i class="icon-info-sign"></i> BLK PKL</a></li>
         <li label label-success><a href="<?php echo base_url()."index.php/absensi/"?>"><i class="icon-user"></i> BLK ABSENSI</a></li> -->

        <!-- <h5> Administrasi Dokumen</h5> -->
        <!-- <li><a href="<?php echo base_url()."index.php/ujianjompo/"?>"><i class="icon-info-sign"></i> BLK PRAKTEK</a></li> -->
       <!--  <li><a href="<?php echo base_url()."index.php/markonline/"?>"><i class="icon-info-sign"></i> Dokumen Online </a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/"?>"><i class="icon-info-sign"></i> Dokumen Medical,PP,SKCK</a></li>
        <li><a href="<?php echo base_url()."index.php/marktaiwan/"?>"><i class="icon-info-sign"></i> Marketing Dokumen Taiwan</a></li>
        <li><a href="<?php echo base_url()."index.php/markvisa/"?>"><i class="icon-info-sign"></i> Dokumen Visa </a></li>


 -->
        <h5> Dokumen Online</h5>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildokrumah"?>"><i class="icon-info-sign"></i> Dokumen Rumah</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildoksurat"?>"><i class="icon-info-sign"></i> Surat Kehilangan</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildokrekom"?>"><i class="icon-info-sign"></i> Rekomendasi</a></li>

        <h5> Dokumen Medikal, PP, SKCK</h5>
        <li><a href="<?php echo base_url()."index.php/markmed/tampillegalitas"?>"><i class="icon-info-sign"></i> Legalitas dan Notaris</a></li>
        <!-- <li><a href="<?php echo base_url()."index.php/markmed/tampilnotaris"?>"><i class="icon-info-sign"></i> Notaris</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilpramed"?>"><i class="icon-info-sign"></i> Pra-Medikal</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilsambungmed"?>"><i class="icon-info-sign"></i> Medikal Full Sambung Pra</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilmurni "?>"><i class="icon-info-sign"></i> Medikal Full Murni</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilpaspor "?>"><i class="icon-info-sign"></i> Paspor</a></li>-->
        <li><a href="<?php echo base_url()."index.php/detailskck "?>"><i class="icon-info-sign"></i> SKCK</a></li>


       <h5> Dokumen Visa</h5>
        <li><a href="<?php echo base_url()."index.php/detailvisa"?>"><i class="icon-info-sign"></i> VISA /PAP /KTKLN</a></li>

        <h5> Dokumen Bank</h5>
        <li><a href="<?php echo base_url()."index.php/detailterbang/"?>"><i class="icon-info-sign"></i> Final Terbang</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/"?>"><i class="icon-info-sign"></i> Pengajuan Signing Bank</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilsetelahterbang"?>"><i class="icon-info-sign"></i> Keadaan Setelah Terbang </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilemail"?>"><i class="icon-info-sign"></i>Pencairan Email </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilberkas"?>"><i class="icon-info-sign"></i>Info Isi Buku Pencarian Berkas </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilambildokumen"?>"><i class="icon-info-sign"></i>Info Penyerahan Dokumen </a></li>

        <?php } else { ?>
      <h5> Marketing</h5>
        <li><a href="<?php echo base_url()."index.php/markawal/"?>"><i class="icon-info-sign"></i> Marketing Awal</a></li>
        <li><a href="<?php echo base_url()."index.php/detailmajikan/"?>"><i class="icon-link"></i> Majikan / Agen</a></li>

        <!-- <h5> Administrasi Dokumen</h5> -->
        <!-- <li label label-success><a href="<?php echo base_url()."index.php/absensi/"?>"><i class="icon-user"></i> BLK ABSENSI</a></li> -->
        <!-- <li><a href="<?php echo base_url()."index.php/marktaiwan/"?>"><i class="icon-info-sign"></i> Marketing Dokumen Taiwan</a></li> -->

        <h5> DOKUMEN LOKAL</h5>
         <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
        <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-external-link"></i> Passport</a></li>

        <h5> Dokumen Online</h5>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildokrumah"?>"><i class="icon-info-sign"></i> Dokumen Rumah</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildoksurat"?>"><i class="icon-info-sign"></i> Surat Kehilangan</a></li>
        <li><a href="<?php echo base_url()."index.php/markonline/tampildokrekom"?>"><i class="icon-info-sign"></i> Rekomendasi</a></li>

        <h5> Dokumen Medikal, PP, SKCK</h5>
               <li><a href="<?php echo base_url()."index.php/markmed/tampillegalitas"?>"><i class="icon-info-sign"></i> Legalitas dan Notaris</a></li>
        <!-- <li><a href="<?php echo base_url()."index.php/markmed/tampilnotaris"?>"><i class="icon-info-sign"></i> Notaris</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilpramed"?>"><i class="icon-info-sign"></i> Pra-Medikal</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilsambungmed"?>"><i class="icon-info-sign"></i> Medikal Full Sambung Pra</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilmurni "?>"><i class="icon-info-sign"></i> Medikal Full Murni</a></li>
        <li><a href="<?php echo base_url()."index.php/markmed/tampilpaspor "?>"><i class="icon-info-sign"></i> Paspor</a></li>-->
        <li><a href="<?php echo base_url()."index.php/detailskck "?>"><i class="icon-info-sign"></i> SKCK</a></li>


        <h5> Dokumen Visa</h5>
        <li><a href="<?php echo base_url()."index.php/detailvisa"?>"><i class="icon-info-sign"></i> VISA /PAP /KTKLN</a></li>

        <h5> Dokumen Bank</h5>
        <li><a href="<?php echo base_url()."index.php/detailterbang/"?>"><i class="icon-info-sign"></i> Final Terbang</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/"?>"><i class="icon-info-sign"></i> Pengajuan Signing Bank</a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilsetelahterbang"?>"><i class="icon-info-sign"></i> Keadaan Setelah Terbang </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilemail"?>"><i class="icon-info-sign"></i>Pencairan Email </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilberkas"?>"><i class="icon-info-sign"></i>Info Isi Buku Pencarian Berkas </a></li>
        <li><a href="<?php echo base_url()."index.php/signingbank/tampilambildokumen"?>"><i class="icon-info-sign"></i>Info Penyerahan Dokumen </a></li>

        <h5> Pencairan Bank</h5>
        <li><a href="<?php echo base_url()."index.php/pencairan/"?>"><i class="icon-info-sign"></i> Pencairan</a></li>
            <?php } ?> 
               <h5> Kembali </h5>
<li><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-info-sign"></i> KEMBALI Ke Detail Biodata</a></li>
    </ul>