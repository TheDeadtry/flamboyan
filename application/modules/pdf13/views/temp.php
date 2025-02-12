<?php
    $dataHead = [
        "Nomor" => $nomor
        , "Lampiran" => "01(Satu) lembar"
        , "Hal" => "Permohonan OPP"
    ];
    
    $dataHead2 = [
        "Nomor" => $nomor
        , "Lampiran" => "01(Satu) lembar"
        , "Hal" => "Pendaftaran Peserta E-KTKLN"
    ];
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table style="font-size:15px;" align="left" width="100%" cellspacing="0" cellpadding="0" border="0">
    <?php foreach ($dataHead as $name => $dhead) : ?>
    <tr>
        <td width="15mm"></td>
        <td width="20mm" style="font-weight:bold;"><?= $name ?></td>
        <td width="5mm">:</td>
        <td width="auto" style="font-weight:bold;"><?= $dhead ?></td>
        <td width="15mm"></td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<table style="font-size:15px;"  align="left" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;">KepadaYth</td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;"><?= $kepada ?></td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;">di</td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;">Tempat</td>
        <td width="25mm"></td>
    </tr>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Dalam rangka peningkatan perlindungan PMI yang akan ditempatkan diluar Negeri, maka bersama ini kami PT.FLAMBOYAN GEMAJASA mengajukan calon PMI untuk di berikan OPP PMI pada tanggal 
        <b><?= $tglopp ?></b>, dengan jumlah <b><?= $total ?> (<?= $total_penyebut ?>)</b> orang, dimana datanya sebagai berikut:</td>
        <td width="25mm"></td>
    </tr>
    <br>
    <?php foreach ($tampil_data_detailpap as $ky => $pap) : ?>
    <tr>
        <td width="25mm"></td>
        <td width="15mm"></td>
        <td width="135mm"><?= ($ky+1).'. '.$pap->nama ?></td>
        <td width="25mm"></td>
    </tr>
    <?php endforeach ?>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Demikian Surat Permohonan kami atas perhatian disampaikan terimakasih.</td>
        <td width="25mm"></td>
    </tr>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Malang, <?= $tglopp1 ?></td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="155mm"><u>Hormat Kami</u></td>
        <td width="25mm"></td>
    </tr>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm"><u><b>IMMANUEL DARMAWAN SANTOSO</b></u></td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Direktur Utama</td>
        <td width="25mm"></td>
    </tr>
    
</table>



<br pagebreak="true">



<table  style="font-size:15px;" align="left" width="100%" cellspacing="0" cellpadding="0" border="0">
    <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <?php foreach ($dataHead2 as $name => $dhead) : ?>
    <tr>
        <td width="15mm"></td>
        <td width="20mm" style="font-weight:bold;"><?= $name ?></td>
        <td width="5mm">:</td>
        <td width="auto" style="font-weight:bold;"><?= $dhead ?></td>
        <td width="15mm"></td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<table style="font-size:15px;" align="left" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;">KepadaYth</td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;"><?= $kepada ?></td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;">di</td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="auto" style="font-weight:bold;">Tempat</td>
        <td width="25mm"></td>
    </tr>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Dalam rangka peningkatan perlindungan PMI yang akan ditempatkan di luar Negeri, maka bersama ini kami PT.FLAMBOYAN GEMAJASA mengajukan calon OPP untuk diberikan E-KTKLN, dengan jumlah <b><?= $total ?> (<?= $total_penyebut ?>)</b> orang , dimana datanya sebagai berikut:</td>
        <td width="25mm"></td>
    </tr>
    <br>
    <?php foreach ($tampil_data_detailpap as $ky => $pap) : ?>
    <tr>
        <td width="25mm"></td>
        <td width="15mm"></td>
        <td width="135mm"><?= ($ky+1).'. '.$pap->nama ?></td>
        <td width="25mm"></td>
    </tr>
    <?php endforeach ?>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Demikian Surat Permohonan kami atas perhatian disampaikan terimakasih.</td>
        <td width="25mm"></td>
    </tr>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Malang, <?= $tglopp1 ?></td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="155mm"><u>Hormat Kami</u></td>
        <td width="25mm"></td>
    </tr>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <tr>
        <td width="25mm"></td>
        <td width="155mm"><u><b>IMMANUEL DARMAWAN SANTOSO</b></u></td>
        <td width="25mm"></td>
    </tr>
    <tr>
        <td width="25mm"></td>
        <td width="155mm">Direktur Utama</td>
        <td width="25mm"></td>
    </tr>
    
</table>