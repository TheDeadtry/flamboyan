<?php
class M_markinformal extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    			function tampil_pilihan_agen(){
		$sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
	}

            function ambiltki(){
    $kode_desa=array();
 $result = Dbs::load("SELECT * FROM personal WHERE personal.id_biodata LIKE 'FI%' OR personal.id_biodata LIKE 'MI%' ;");
            while($row = mysqli_fetch_array($result)){
                $kode_desa[]=$row['id_biodata'];
            }
        return $kode_desa;
    } 

    function idbiodata($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['id_biodata'];
            }
        return $kode_desa;
    } 

    function ambilnama($id_biodata){
    $kode_desa=array();
 $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa[]=$row['id_biodata'];
                $kode_desa[]=$row['nama'];
                $kode_desa[]=$row['nama_mandarin'];
            }
        return $kode_desa;
    } 


     function marketawal($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM marka_biotoagen where id_biodata='$id_biodata' ORDER BY id_marka_bioagen DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tgl_to_agen'];
            }
        return $kode_desa;
    } 
    function markawal($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM marka_biotoagen where id_biodata='$id_biodata' ORDER BY id_marka_bioagen DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nama_agen'];
            }
        return $kode_desa;
    } 

      function ambilmajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_majikan'];
            }
        return $kode_desa;
    } 

     function namamajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['namamajikan'];
            }
        return $kode_desa;
    } 
     function namamajikanman($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['namataiwan'];
            }
        return $kode_desa;
    } 

      function markagen($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_agen'];
            }
        return $kode_desa;
    } 
          function cekagen($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_agen'];
            }
        return $kode_desa;
    } 

//disnaker
     function tgldisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglonline'];
            }
        return $kode_desa;
    } 
     function perkiraandisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['perkiraan'];
            }
        return $kode_desa;
    } 
     function nodisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nodisnaker'];
            }
        return $kode_desa;
    } 

// majikan
       function terpilihmajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterpilih'];
            }
        return $kode_desa;
    } 

           function jdmajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['JD'];
            }
        return $kode_desa;
    } 

           function terbangmajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterbang'];
            }
        return $kode_desa;
    } 
//keberangkatan
     function tglberangkat($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggalterbang'];
            }
        return $kode_desa;
    } 

  function statusberangkat($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusterbang'];
            }
        return $kode_desa;
    } 

     function jadwal($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['id_terbang'];
            }
        return $kode_desa;
    } 


     function keberangkatan($idjadwal){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM dataterbang where id_terbang='$idjadwal'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['detailberangkat1'];
            }
        return $kode_desa;
    } 

    function tujuan($idjadwal){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM dataterbang where id_terbang='$idjadwal'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['detailberangkat1'];
            }
        return $kode_desa;
    } 
     function jamtiba($idjadwal){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM dataterbang where id_terbang='$idjadwal'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['jamtiba'];
            }
        return $kode_desa;
    } 


 function tiket($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tiket'];
            }
        return $kode_desa;
    } 

     function tglnyaberangkat($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglberangkat'];
            }
        return $kode_desa;
    } 
      function statusterbang($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusterbang'];
            }
        return $kode_desa;
    } 

    // dokumentaiwan
		
 function tglpk($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglpk'];
            }
        return $kode_desa;
    } 

     function ambilsuhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_suhan'];
            }
        return $kode_desa;
    } 

 function tglterimasuhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterimasuhan'];
            }
        return $kode_desa;
    } 

 function no_suhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['id_suhan'];
            }
        return $kode_desa;
    } 

 function tglterbit_suhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterbitsuhan'];
            }
        return $kode_desa;
    } 

 function tglexp_suhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tglterbitsuhan + INTERVAL '6' MONTH as expired FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 

     function keterangan_suhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['ketsuhan'];
            }
        return $kode_desa;
    } 

    // visa permit

        function ambilvisapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_visapermit'];
            }
        return $kode_desa;
    } 

     function tglterimavisapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterimapermit'];
            }
        return $kode_desa;
    } 

 function no_visapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['id_visapermit'];
            }
        return $kode_desa;
    } 

 function tglterbit_visapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterbitpermit'];
            }
        return $kode_desa;
    } 

 function tglexp_visapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tglterbitpermit + INTERVAL '6' MONTH as expired FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 

     function keterangan_visapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['ketpermit'];
            }
        return $kode_desa;
    } 

 //paspor lama

        function pasporlama($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) AS expired FROM pasporlama where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 

//paspor Baru
      function ajupaspor($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglpengajuan'];
            }
        return $kode_desa;
    } 
       function ajustatpaspor($id_biodata){
    $kode_desa="";
        $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statuspengajuan'];
            }
        return $kode_desa;
    } 
      function fotopaspor($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglfoto'];
            }
        return $kode_desa;
    } 
       function fotostatpaspor($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusfoto'];
            }
        return $kode_desa;
    } 
      function terimapaspor($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterima'];
            }
        return $kode_desa;
    } 
       function terimastatpaspor($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusterima'];
            }
        return $kode_desa;
    } 


    // SKCK

    function pengajuan_skck($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM skck where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['pengajuan'];
            }
        return $kode_desa;
    } 

     function pengajuanstat_skck($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM skck where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statuspengajuan'];
            }
        return $kode_desa;
    } 

     function terima_skck($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM skck where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['terima'];
            }
        return $kode_desa;
    } 

     function terimastat_skck($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM skck where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusterima'];
            }
        return $kode_desa;
    } 

     function tglexp_skck($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM skck where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglexp'];
            }
        return $kode_desa;
    } 

    // visa
      function kocokan_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kocokan'];
            }
        return $kode_desa;
    } 
       function kocokanstats_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statuskocokan'];
            }
        return $kode_desa;
    } 
          function finger_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['finger'];
            }
        return $kode_desa;
    } 
            function fingerstats_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusfinger'];
            }
        return $kode_desa;
    } 

      function terima_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['terima'];
            }
        return $kode_desa;
    } 
     function terimastats_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusterima'];
            }
        return $kode_desa;
    } 

//loan
         function loanbank($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tgl_tki_ttd'];
            }
        return $kode_desa;
    } 

//pap ktkln
     function pap_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['pap'];
            }
        return $kode_desa;
    } 
     function papstats_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statuspap'];
            }
        return $kode_desa;
    } 
     function ktkln_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['ktkln'];
            }
        return $kode_desa;
    } 
     function kklnstats_visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusktkln'];
            }
        return $kode_desa;
    } 

    // medical

      function medicalpra($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 where id_biodata='$id_biodata' ORDER BY id_medical DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggal'];
            }
        return $kode_desa;
    } 

          function medicalfull($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 where id_biodata='$id_biodata' ORDER BY id_medical DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggal'];
            }
        return $kode_desa;
    } 

          function medicalpraexp($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 where id_biodata='$id_biodata' ORDER BY id_medical DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 

          function medicalfullexp($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 where id_biodata='$id_biodata' ORDER BY id_medical DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 
}
?>