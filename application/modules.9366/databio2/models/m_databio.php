<?php
class M_databio extends CI_Model{
    function __construct(){
        parent::__construct();
    }
  function hitung_data_mf(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_ff(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'ff%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_fi(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'fi%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_jp(){
		$sql = "SELECT count(*) as total FROM personal WHERE id_biodata LIKE 'jp%'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
 function tampil_data_personal(){
		$sql = "SELECT * FROM personal";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function delete_personal($id)
    {
        //delete employee record
        $this->db->where('id_biodata', $id);
        $this->db->delete('personal');
        redirect('databio');
    } 
	
		function tampil_pengguna_agen($id_user){
		$nama;
        $result = Dbs::load("SELECT kode_agen FROM dataagen where username='$id_user'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['kode_agen'];
			}
		return $nama;
	}

    function ambiltki($where, $limit){
        $kode_desa=array();
        $result = Dbs::load("SELECT * FROM personal 
        $where order by personal.id_personal DESC $limit  ");
        while($row = mysqli_fetch_array($result)){
                $kode_desa[]=$row['id_biodata'];
        }
        return $kode_desa;
    } 

    function ambilnama($where){
        $kode_desa=array();
        $result = Dbs::load(
            "SELECT *,
            personal.nama as personalnama,
            personal.id_biodata as personalid,
            personal.status as personalstatus,
            personal.tempatlahir as biotempatlahir,
            personal.tgllahir as biotgllahir,
            disnaker.nama as disnakernama,
            disnaker.tempatlahir as disnakertempatlahir,
            disnaker.tanggallahir as disnakertgllahir,
            disnaker.status as disnakerstatus,
            disnaker.perkiraan as disnakerperkiraan,
            disnaker.tglonline as disnakertglonline,
            disnaker.nodisnaker as disnakernodisknaker,
            count(upload_ktp.namadok) as ktpada,
            count(upload_kk.namadok) as kkada,
            count(upload_aktelahir.namadok) as aktelahirada,
            count(upload_suratijinkeluarga.namadok) as siada,
            count(upload_skck.namadok) as skckada,
            count(upload_suratnikah.namadok) as snada,
            count(upload_ijasah.namadok) as ijasahada,
            count(upload_perjanjianpenempatan.namadok) as ppada,
            count(upload_arc.namadok) as arcada,
            count(upload_keterangan.namadok) as ketada,
            upload_kehilanganpaspor.penting as hilangpenting,
            upload_kehilanganpaspor.tglterima as hilangtglterima,
            DATE_ADD(pasporlama.tglterbit, INTERVAL 5 YEAR) as expiredpplm
            FROM personal 
            left join disnaker
            on personal.id_biodata=disnaker.id_biodata
            left join pasporlama
            on personal.id_biodata=pasporlama.id_biodata
            left join upload_ktp
            on personal.id_biodata=upload_ktp.id_biodata
            left join upload_kk
            on personal.id_biodata=upload_kk.id_biodata
             left join upload_aktelahir
            on personal.id_biodata=upload_aktelahir.id_biodata
             left join upload_suratijinkeluarga
            on personal.id_biodata=upload_suratijinkeluarga.id_biodata
            left join upload_skck
            on personal.id_biodata=upload_skck.id_biodata
            left join upload_suratnikah
            on personal.id_biodata=upload_suratnikah.id_biodata
            left join upload_ijasah
            on personal.id_biodata=upload_ijasah.id_biodata
            left join upload_perjanjianpenempatan
            on personal.id_biodata=upload_perjanjianpenempatan.id_biodata
            left join upload_arc
            on personal.id_biodata=upload_arc.id_biodata
            left join upload_keterangan
            on personal.id_biodata=upload_keterangan.id_biodata
            left join upload_kehilanganpaspor
            on personal.id_biodata=upload_kehilanganpaspor.id_biodata

             $where");


        while($row = mysqli_fetch_array($result)){
            // Tanggal Lahir
            $tglnya = $row['tgllahir'];
            $birthday=str_replace(".","-",$tglnya);
            // Convert Ke Date Time
            $biday = new DateTime($birthday);
            $today = new DateTime();
            $diff = $today->diff($biday);

            $tglnyadisnaker = $row['disnakertgllahir'];
            $birthday2=str_replace(".","-",$tglnyadisnaker);
            // Convert Ke Date Time
            $biday2 = new DateTime($birthday2);
            $today2 = new DateTime();
            $diff2 = $today2->diff($biday2);

             $isiktp="-";
             $ktp = $row['ktpada'];
             if($ktp>=1){ $isiktp="V";}
             $isikk="-";
             $kk = $row['kkada'];
             if($kk>=1){ $isikk="V";}

              $isiakte="-";
             $akte = $row['aktelahirada'];
             if($akte>=1){ $isiakte="V";}
              $isisi="-";
             $isi = $row['siada'];
             if($isi>=1){ $isisi="V";}

              $isiskck="-";
             $skck = $row['skckada'];
             if($skck>=1){ $isiskck="V";}
              $isisn="-";
             $sn = $row['snada'];
             if($sn>=1){ $isisn="V";}

              $isiijasah="-";
             $ijasah = $row['ijasahada'];
             if($ijasah>=1){ $isiijasah="V";}
              $isipp="-";
             $pp = $row['ppada'];
             if($pp>=1){ $isipp="V";}

              $isiarc="-";
             $arc = $row['arcada'];
             if($arc>=1){ $isiarc="V";}
              $isiket="-";
             $ket = $row['ketada'];
             if($ket>=1){ $isiket="V";}



            $kode_desa[]=$row['personalid'];

            $kode_desa[]=$row['personalnama'];
            $kode_desa[]=$row['kode_sponsor'];
            $kode_desa[]=$row['tanggaldaftar'];
            $kode_desa[]=$row['biotempatlahir'];
            $kode_desa[]=$row['biotgllahir'];
            $kode_desa[]=$row['tinggi'];
            $kode_desa[]=$row['berat'];
            $kode_desa[]=$row['pendidikan'];
            $kode_desa[]=$row['personalstatus'];
            $kode_desa[]=$row['notelp'];

            $kode_desa[]=$row['notelpkel'];
            $kode_desa[]=$diff->y." Tahun";
            $kode_desa[]=$row['status'];
            $kode_desa[]=$row['disnakernama'];
            $kode_desa[]=$row['disnakertempatlahir'];
            $kode_desa[]=$row['disnakertgllahir'];
             $kode_desa[]=$diff2->y." Tahun";
             $kode_desa[]=$row['disnakerstatus'];
             $kode_desa[]=$row['disnakerperkiraan'];
             $kode_desa[]=$row['disnakertglonline'];

            $kode_desa[]=$row['keterangan'];
            $kode_desa[]=$row['expiredpplm'];
             $kode_desa[]=$isiktp;
             $kode_desa[]=$isikk;
             $kode_desa[]=$isiakte;
             $kode_desa[]=$isisi;
             $kode_desa[]=$isiskck;
             $kode_desa[]=$isisn;
             $kode_desa[]=$isiijasah;
             $kode_desa[]=$isipp;
             
             $kode_desa[]=$isiarc;
             $kode_desa[]=$isiket;
              $kode_desa[]=$row['hilangpenting'];
               $kode_desa[]=$row['hilangtglterima'];
               $kode_desa[]=$row['disnakernodisknaker'];
               $kode_desa[]=$row['statusaktif'];
               $kode_desa[]=$row['negara1'];
               $kode_desa[]=$row['negara2'];
               $kode_desa[]=$row['calling'];
               $kode_desa[]=$row['skill1'];
               
               $kode_desa[]=$row['skill2'];
               $kode_desa[]=$row['skill3'];
               $kode_desa[]=$row['ketdok'];
               $kode_desa[]=$row['ketadm'];
               //$kode_desa[]=$row['bandaratuju'];


        }
        return $kode_desa;
    } 

     function namamedical($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT id_medical,jenismedical,nama as namamed,id_biodata FROM medical  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['namamed'];
            }
        return $kode_desa;
    } 
       function namamedicaltgl($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT id_medical,jenismedical,nama as namamed,id_biodata,tanggal FROM medical  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggal'];
            }
        return $kode_desa;
    } 

    function namamedicalfulltgl($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM medical3  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggal'];
            }
        return $kode_desa;
    } 
       function namamedicalhasilfull($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM medical3  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nama'];
            }
        return $kode_desa;
    } 
       function namamedicalexpfull($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 
          function namamedicalfingerfull($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM medical3  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglsidik'];
            }
        return $kode_desa;
    } 

     function namamedicalfulltgl2($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM medical2  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggal'];
            }
        return $kode_desa;
    } 
       function namamedicalhasilfull2($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM medical2  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nama'];
            }
        return $kode_desa;
    } 
       function namamedicalexpfull2($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    } 
          function namamedicalfingerfull2($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM medical2  where id_biodata='$idbio' order by id_medical ASC LIMIT 1 ");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglsidik'];
            }
        return $kode_desa;
    } 

      function hitungmed($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT count(*) as hitung FROM medical3 where id_biodata='$idbio'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['hitung'];
            }
        return $kode_desa;
    } 

    function tglregblk($idbio){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM personalblk where nodaftar='$idbio'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['adm_tglreg'];
            }
        return $kode_desa;
    } 

    function hitunganfingernodaftujuh($idbio){
        $kode_desa="";
        $result = Dbs::load("SELECT DATE_ADD(adm_tglreg, INTERVAL 68 DAY) as expired FROM personalblk WHERE nodaftar='$idbio'");
                 while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    }
       function hitunganfingernodaft($idbio){
        $kode_desa="";
        $result = Dbs::load("SELECT DATE_ADD(adm_tglreg, INTERVAL 41 DAY) as expired FROM personalblk WHERE nodaftar='$idbio'");
                 while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
            }
        return $kode_desa;
    }
    function kelulusan($nodaftar){
$kode_desa="";
$result = Dbs::load("SELECT * FROM personalblk WHERE nodaftar ='$nodaftar'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['statujk'];
            }
        return $kode_desa;  
    }

    function jmlfingerpagi($nodaftar){
        $sql = "SELECT count(DISTINCT(DATE(dteDate))) as jumlah FROM tblattendance WHERE idblk ='$nodaftar' AND waktu='pagi'";
                 $query = $this->db->query($sql)->row_array();

          return $query['jumlah'];
    }
    function jmlfingersore($nodaftar){
        $sql = "SELECT count(DISTINCT(DATE(dteDate))) as jumlah FROM tblattendance WHERE idblk ='$nodaftar' AND waktu='sore'";
                 $query = $this->db->query($sql)->row_array();

          return $query['jumlah'];
    }

         function tglterakhirfinger($nodaftars){
        $kode_desa="";
        $result =  Dbs::load("SELECT dteDate FROM tblattendance WHERE idblk='".$nodaftars."' Group by dteDate DESC LIMIT 1");
                 while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['dteDate'];
            }

            return $kode_desa;
    }



    /*
    function ambilnama($where){
        $kode_desa=array();
        $result = Dbs::load("SELECT * FROM personal $where");
        while($row = mysqli_fetch_array($result)){
            // Tanggal Lahir
        	$tglnya = $row['tgllahir'];
        	$birthday=str_replace(".","-",$tglnya);
        	// Convert Ke Date Time
        	$biday = new DateTime($birthday);
        	$today = new DateTime();
        	$diff = $today->diff($biday);

            $kode_desa[]=$row['id_biodata'];
            $kode_desa[]=$row['nama'];
            $kode_desa[]=$row['kode_sponsor'];
            $kode_desa[]=$row['tanggaldaftar'];
            $kode_desa[]=$row['tempatlahir'];
            $kode_desa[]=$row['tgllahir'];
            $kode_desa[]=$row['tinggi'];
            $kode_desa[]=$row['berat'];
            $kode_desa[]=$row['pendidikan'];
            $kode_desa[]=$row['status'];
            $kode_desa[]=$row['notelp'];
            $kode_desa[]=$row['notelpkel'];
            $kode_desa[]=$diff->y." Tahun";

        }
        return $kode_desa;
    } */

  function namadisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nama'];
            }
        return $kode_desa;
    } 

    function ttldisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tempatlahir'];
            }
        return $kode_desa;
    } 
     function tanggaltldisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggallahir'];
            }
        return $kode_desa;
    } 

    function statusdisnaker($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['status'];
            }
        return $kode_desa;
    } 

    function datatables_sql_exec($table, $bindings, $limit, $select) {
        $query = "SELECT $select FROM $table where id_biodata is not null $limit";
        $q = $this->db->query($query);
        return $q->result_array();
    }

    function datatables_count($table, $primaryKey, $pilsek) {
        $query = "SELECT COUNT($primaryKey) as 'key' FROM $table where id_biodata is not null and id_biodata LIKE '$pilsek%'";
        $q = $this->db->query($query);
        return $q->row();
    }

    function datatables_count_where($table, $primaryKey, $where) {
        $query = "SELECT COUNT($primaryKey) as 'filter' FROM $table $where";
        $q = $this->db->query($query);
        return $q->row();
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
      function tgterbitpaspor($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM paspor where id_biodata='$id_biodata' ORDER BY id_paspor DESC limit 1");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['nopaspor'];
            }
        return $kode_desa;
    } 

            function expiredpaspor($idnya){
                $kode_desa="";
 $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='".$idnya."'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['expired'];
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

    //agen

     function tglmajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterpilih'];
            }
        return $kode_desa;
    } 

    function kodeagen($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,dataagen.kode_agen as kodeagennya FROM majikan LEFT JOIN dataagen ON majikan.kode_agen=dataagen.id_agen where majikan.id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kodeagennya'];
            }
        return $kode_desa;
    } 

 // data agen dan terbang

     function kodemajikanformal($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,datamajikan.kode_majikan as kodemajikannya FROM majikan LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan where majikan.id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kodemajikannya'];
            }
        return $kode_desa;
    } 
   function kodemajikaninformal($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where majikan.id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['namamajikan'];
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


 function ambilsuhan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_suhan'];
            }
        return $kode_desa;
    } 

 function tglterimasuhan($id_suhan){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM datasuhan where id_suhan='$id_suhan'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterima'];
            }
        return $kode_desa;
    } 

    function tglterimavisapermit($id_suhan){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM datavisapermit where id_visapermit='$id_suhan'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterimavs'];
            }
        return $kode_desa;
    } 

    function tglexp_suhan($id_suhan){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM datasuhan where id_suhan='$id_suhan'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglexp'];
            }
        return $kode_desa;
    } 

    function tglexp_visapermit($id_suhan){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM datavisapermit where id_visapermit='$id_suhan'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglexpvs'];
            }
        return $kode_desa;
    } 


        function ambilvisapermit($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['kode_visapermit'];
            }
        return $kode_desa;
    } 

 function no_suhan($id_suhan){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM datasuhan where id_suhan='$id_suhan'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['no_suhan'];
            }
        return $kode_desa;
    } 

 function no_visapermit($id_suhan){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM datavisapermit where id_visapermit='$id_suhan'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['no_visapermit'];
            }
        return $kode_desa;
    } 

   function ambillegalitas($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM legalitas where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tgl_legal'];
            }
        return $kode_desa;
    } 
    

       function ambilnotarisan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM notarisan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tgl_nota'];
            }
        return $kode_desa;
    } 
    
     function asuransipra($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,pembuatan_tabeldis2.tanggal as tanggalnya FROM pembuatan_tabeldis2 LEFT JOIN detail_tabeldis2 ON detail_tabeldis2.id_tabeldis2=pembuatan_tabeldis2.id_pembuatan where detail_tabeldis2.id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggalnya'];
            }
        return $kode_desa;
    } 

     function asuransimasa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT *,pembuatan_tabeldis3.tanggal as tanggalnya FROM pembuatan_tabeldis3 LEFT JOIN detail_tabeldis3 ON detail_tabeldis3.id_tabeldis3=pembuatan_tabeldis3.id_pembuatan where detail_tabeldis3.id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggalnya'];
            }
        return $kode_desa;
    } 

// terima
       function tglpengajuanbank($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglapplycs'];
            }
        return $kode_desa;
    } 
       function tglpk($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglpk'];
            }
        return $kode_desa;
    } 
       function tglterimacs($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tglterimacs'];
            }
        return $kode_desa;
    } 
       function statustglterimacs($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statustglterimacs'];
            }
        return $kode_desa;
    } 

     function tglterimaleg($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tgltrmleg'];
            }
        return $kode_desa;
    } 

     function statustglterimaleg($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statustgltrmleg'];
            }
        return $kode_desa;
    } 

     function tgltkittd($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tgl_tki_ttd'];
            }
        return $kode_desa;
    } 

     function visa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['terima'];
            }
        return $kode_desa;
    } 

     function statusvisa($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statusterima'];
            }
        return $kode_desa;
    } 

//telo
   function pap($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['pap'];
            }
        return $kode_desa;
    } 

       function statuspap($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statuspap'];
            }
        return $kode_desa;
    } 


  function tglterbangs($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['tanggalterbang'];
            }
        return $kode_desa;
    } 


  function statustglterbang($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM visa where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['statustgl'];
            }
        return $kode_desa;
    } 


    function updateket() {
    $idbio = $this->input->post('idbio');
    $keterangan = $this->input->post('bnknl');
        $data = array (
            'ketdok'=>$keterangan, 
            );
        $this->db->where('id_biodata', $idbio);
        $this->db->update('personal', $data);
    }


    function updateketadm() {
    $idbio = $this->input->post('idbio');
    $keterangan = $this->input->post('ket_adm');
        $data = array (
            'ketadm'=>$keterangan, 
            );
        $this->db->where('id_biodata', $idbio);
        $this->db->update('personal', $data);
    }

    function select($zqueryz) {
      return $this->db->query($zqueryz)->result();
    }

    function select_row($zqueryz) {
      return $this->db->query($zqueryz)->row();
    }

     function bandaratujumajikan($id_biodata){
    $kode_desa="";
 $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa=$row['bandaratuju'];
            }
        return $kode_desa;
    } 

    function c_tglterimasuhan($id_biodata) {
      $kode_desa="";
      $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
      while($row = mysqli_fetch_array($result)){
        $kode_desa=$row['tglterimasuhan'];
      }
      return $kode_desa;
    }
    function c_no_suhan($id_biodata) {
      $kode_desa="";
      $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
      while($row = mysqli_fetch_array($result)){
        $kode_desa=$row['id_suhan'];
      }
      return $kode_desa;
    }

    function c_tglterimavisapermit($id_biodata) {
      $kode_desa="";
      $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
      while($row = mysqli_fetch_array($result)){
        $kode_desa=$row['tglterimapermit'];
      }
      return $kode_desa;
    }
    function c_no_visapermit($id_biodata) {
      $kode_desa="";
      $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
      while($row = mysqli_fetch_array($result)){
        $kode_desa=$row['id_visapermit'];
      }
      return $kode_desa;
    }

}
?>