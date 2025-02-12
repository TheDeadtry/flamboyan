<?php
class M_pdf7 extends CI_Model{
    function __construct(){
        parent::__construct();
    }
            function tampil_data_detail($idbiodata){
        $sql = "SELECT * FROM personal where id_biodata='$idbiodata';
";
                $query = $this->db->query($sql);

            return $query;
    } 

                function tampil_perso(){
        $sql = "SELECT * FROM personal LIMIT 6;
";
                $query = $this->db->query($sql);

            return $query;
    } 

                    function ambilvisa($idbiodata){
        $sql = "SELECT * FROM visa where id_biodata='$idbiodata';";
                $query = $this->db->query($sql);
            return $query;
    } 

                        function setelahterbang($idbiodata){
        $sql = "SELECT * FROM setelahterbang where id_biodata='$idbiodata';";
                $query = $this->db->query($sql);
            return $query;
    } 
    

                function ambildokagen($idagen,$sektor){
        $sql = "SELECT * FROM detail_dokumen where id_agen='$idagen' AND status='$sektor'";
                $query = $this->db->query($sql);
            return $query;
    } 

                    function hitungdokagen($idagen,$sektor){
       $kode_desa="";
        $result = Dbs::load("SELECT count(*) as totalnya FROM detail_dokumen where id_agen='$idagen' AND status='$sektor'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['totalnya'];
			}
		return $kode_desa;
    }

                    function ambildokmajikan($idmajikan,$sektor){
        $sql = "SELECT * FROM detail_dokmajikan where id_majikan='$idmajikan' AND status='$sektor'";
                $query = $this->db->query($sql);
            return $query;
    } 

                    function hitungdokmajikan($idmajikan,$sektor){
       $kode_desa="";
        $result = Dbs::load("SELECT count(*) as totalnya FROM detail_dokmajikan where id_majikan='$idmajikan' AND status='$sektor'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['totalnya'];
			}
		return $kode_desa;
    } 



                function tampidatanya($ambiltglmulai,$ambiltglakhir){
        $sql = "SELECT disnaker.id_biodata,disnaker.jeniskelamin,disnaker.tempatlahir,disnaker.tanggallahir,visa.novisa,visa.tanggalterbang,visa.tglberangkat
        ,paspor.nopaspor as paspornya
        ,dataagen.nama as namaagennya
        ,personal.nama as namatkinya
        ,disnaker.alamat as alamattkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.alamat as formalalamat
        ,majikan.namamajikan as informalmajikan
        ,majikan.alamatmajikan as informalalamat
         from disnaker 
LEFT JOIN visa
ON disnaker.id_biodata=visa.id_biodata 
LEFT JOIN paspor
ON paspor.id_biodata=disnaker.id_biodata
LEFT JOIN majikan
ON majikan.id_biodata=disnaker.id_biodata
LEFT JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen
LEFT JOIN datamajikan
ON majikan.kode_majikan=datamajikan.id_majikan
LEFT JOIN personal
ON disnaker.id_biodata=personal.id_biodata
WHERE visa.tanggalterbang!=''
AND visa.tglberangkat between '$ambiltglmulai' and '$ambiltglakhir'
AND paspor.keterangan='sudah'
GROUP BY paspor.id_biodata
ORDER BY visa.tanggalterbang ASC";

                $query = $this->db->query($sql);

            return $query;
    } 

function hitungdatanya($ambiltglmulai,$ambiltglakhir){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as hitungane
        ,paspor.nopaspor as paspornya
        ,dataagen.nama as namaagennya
        ,disnaker.nama as namatkinya
        ,disnaker.alamat as alamattkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.alamat as formalalamat
        ,majikan.namamajikan as informalmajikan
        ,majikan.alamatmajikan as informalalamat
         from disnaker 
LEFT JOIN visa
ON disnaker.id_biodata=visa.id_biodata 
LEFT JOIN paspor
ON paspor.id_biodata=disnaker.id_biodata
LEFT JOIN majikan
ON majikan.id_biodata=disnaker.id_biodata
LEFT JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen
LEFT JOIN datamajikan
ON majikan.kode_majikan=datamajikan.id_majikan
WHERE visa.tanggalterbang!=''
AND visa.tglberangkat between '$ambiltglmulai' and '$ambiltglakhir'
AND paspor.keterangan='sudah'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hitungane'];
			}
		return $kode_desa;
	}

function tampidatanyaagen($ambiltglmulai,$ambiltglakhir,$idagenxxxx){
        $sql = "SELECT disnaker.id_biodata,disnaker.jeniskelamin,disnaker.tempatlahir,disnaker.tanggallahir,visa.novisa,visa.tanggalterbang
        ,paspor.nopaspor as paspornya
        ,dataagen.nama as namaagennya
        ,disnaker.nama as namatkinya
        ,personal.nama_mandarin as namamandarintkinya
        ,disnaker.alamat as alamattkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.namamajikan as formalmandarinmajikan
        ,datamajikan.alamat as formalalamat
        ,datamajikan.hp as hpformal
        ,majikan.namamajikan as informalmajikan
        ,majikan.namataiwan as informalmandarinmajikan
        ,majikan.alamatmajikan as informalalamat
        ,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired
        ,majikan.alamatmajikan as informalalamat
        ,datasuhan.no_suhan as nosuhan
         ,datavisapermit.no_visapermit as novisapermit
         ,majikan.id_suhan as id_suhan
         ,majikan.id_visapermit as id_visapermit
         ,majikan.notelpmajikan as hpinformal
         ,datakreditbank.namakredit as namakredit
         ,datakreditbank.isikredit as isikredit
         ,datakreditbank.nilaikredit as nilaikredit
          ,personal.negara1 as negara1
           ,personal.negara2 as negara2
            ,personal.calling as calling
             ,personal.skill1 as skill1
              ,personal.skill2 as skill2
               ,personal.skill3 as skill3
         from disnaker
LEFT JOIN visa
ON disnaker.id_biodata=visa.id_biodata 
LEFT JOIN paspor
ON paspor.id_biodata=disnaker.id_biodata
LEFT JOIN majikan
ON majikan.id_biodata=disnaker.id_biodata
LEFT JOIN signingbank
ON signingbank.id_biodata=disnaker.id_biodata
LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank
LEFT JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen
LEFT JOIN datamajikan
ON majikan.kode_majikan=datamajikan.id_majikan
LEFT JOIN datasuhan
ON majikan.kode_suhan=datasuhan.id_suhan
LEFT JOIN datavisapermit
ON majikan.kode_visapermit=datavisapermit.id_visapermit
LEFT JOIN personal
ON disnaker.id_biodata=personal.id_biodata


WHERE visa.tanggalterbang!=''
AND visa.tanggalterbang between '$ambiltglmulai' and '$ambiltglakhir'
AND paspor.keterangan='sudah' 
AND dataagen.id_agen='$idagenxxxx'
ORDER BY visa.tanggalterbang ASC";

                $query = $this->db->query($sql);

            return $query;
    } 

function hitungdatanyaagen($ambiltglmulai,$ambiltglakhir,$idagenxxxx){
$kode_desa="";
        $result = Dbs::load("SELECT count(*) as hitungane
        ,paspor.nopaspor as paspornya
        ,dataagen.nama as namaagennya
        ,disnaker.nama as namatkinya
        ,disnaker.alamat as alamattkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.alamat as formalalamat
        ,majikan.namamajikan as informalmajikan
        ,majikan.alamatmajikan as informalalamat
        ,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired
         from disnaker 
LEFT JOIN visa
ON disnaker.id_biodata=visa.id_biodata 
LEFT JOIN paspor
ON paspor.id_biodata=disnaker.id_biodata
LEFT JOIN majikan
ON majikan.id_biodata=disnaker.id_biodata
LEFT JOIN signingbank
ON signingbank.id_biodata=disnaker.id_biodata
LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank
LEFT JOIN dataagen
ON majikan.kode_agen=dataagen.id_agen
LEFT JOIN datamajikan
ON majikan.kode_majikan=datamajikan.id_majikan
LEFT JOIN datasuhan
ON majikan.kode_suhan=datasuhan.id_suhan
LEFT JOIN datavisapermit
ON majikan.kode_visapermit=datavisapermit.id_visapermit
LEFT JOIN personal
ON disnaker.id_biodata=personal.id_biodata
WHERE visa.tanggalterbang!=''
AND visa.tanggalterbang between '$ambiltglmulai' and '$ambiltglakhir'
AND paspor.keterangan='sudah'
AND dataagen.id_agen='$idagenxxxx'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hitungane'];
			}
		return $kode_desa;
        }

function tampidatanyalaporanagen($ambiltglmulai,$ambiltglakhir,$idagenxxxx){
        $sql = "SELECT disnaker.id_biodata,visa.tanggalterbang
        ,visa.id_biodata_dititipkan as idbiodititipsh
        ,visa.nama_dititipkan as namadititipsh
        ,visa.tgl_terbang_dititipkan as tgldititipsh
        ,visa.id_biodata_dititipkan2 as idbiodititipvp
        ,visa.nama_dititipkan2 as namadititipvp
        ,visa.tgl_terbang_dititipkan2 as tgldititipvp
        ,visa.nama_titipan as namatitip
        ,visa.id_biodata_titipan as idbiotitip
        ,visa.tgl_terbang_titipan as tgltitip
        ,visa.tempatsuhandok as tempat_sh
        ,visa.tempatvpdok as tempat_vp
        ,visa.statsuhandok as status_sh
        ,visa.statvpdok as status_vp
        ,dataagen.nama as namaagennya
        ,disnaker.nama as namatkinya
        ,personal.nama_mandarin as namamandarintkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.namamajikan as formalmandarinmajikan
        ,majikan.id_majikan as id_maj
        ,majikan.namamajikan as informalmajikan
        ,majikan.namataiwan as informalmandarinmajikan
        ,majikan.ketsuhan as suhanket
        ,majikan.ketpermit as visapermitket
        ,datasuhan.no_suhan as nosuhan
        ,datavisapermit.no_visapermit as novisapermit
        ,majikan.id_suhan as id_suhan
        ,majikan.id_visapermit as id_visapermit
        from disnaker
        LEFT JOIN visa
        ON disnaker.id_biodata=visa.id_biodata
        LEFT JOIN majikan
        ON majikan.id_biodata=disnaker.id_biodata
        LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen
        LEFT JOIN datamajikan
        ON majikan.kode_majikan=datamajikan.id_majikan
        LEFT JOIN datasuhan
        ON majikan.kode_suhan=datasuhan.id_suhan
        LEFT JOIN datavisapermit
        ON majikan.kode_visapermit=datavisapermit.id_visapermit
        LEFT JOIN personal
        ON disnaker.id_biodata=personal.id_biodata

        WHERE visa.tanggalterbang!=''
        AND visa.tanggalterbang between '$ambiltglmulai' and '$ambiltglakhir'
        AND dataagen.id_agen='$idagenxxxx'
        ORDER BY tanggalterbang ASC";

        $query = $this->db->query($sql);

        return $query;
}

function tampidatanyalaporanagenditaiwan($ambiltglmulai,$ambiltglakhir,$idagenxxxx){
        $sql = "SELECT disnaker.id_biodata
        ,visa.id_biodata_dititipkan as idbiodititipsh
        ,visa.nama_dititipkan as namadititipsh
        ,visa.tgl_terbang_dititipkan as tgldititipsh
        ,visa.id_biodata_dititipkan2 as idbiodititipvp
        ,visa.nama_dititipkan2 as namadititipvp
        ,visa.tgl_terbang_dititipkan2 as tgldititipvp
        ,visa.nama_titipan as namatitip
        ,visa.id_biodata_titipan as idbiotitip
        ,visa.tgl_terbang_titipan as tgltitip
        ,visa.tempatsuhandok as tempat_sh
        ,visa.tempatvpdok as tempat_vp
        ,visa.statsuhandok as status_sh
        ,visa.statvpdok as status_vp
        ,dataagen.nama as namaagennya
        ,disnaker.nama as namatkinya
        ,personal.nama_mandarin as namamandarintkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.namamajikan as formalmandarinmajikan
        ,majikan.namamajikan as informalmajikan
        ,majikan.namataiwan as informalmandarinmajikan
        ,majikan.ketsuhan as suhanket
        ,majikan.ketpermit as visapermitket
        ,datasuhan.no_suhan as nosuhan
        ,datavisapermit.no_visapermit as novisapermit
        ,majikan.id_suhan as id_suhan
        ,majikan.id_visapermit as id_visapermit
        from disnaker 
        LEFT JOIN visa
        ON disnaker.id_biodata=visa.id_biodata 
        LEFT JOIN majikan
        ON majikan.id_biodata=disnaker.id_biodata
        LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen
        LEFT JOIN datamajikan
        ON majikan.kode_majikan=datamajikan.id_majikan
        LEFT JOIN datasuhan
        ON majikan.kode_suhan=datasuhan.id_suhan
        LEFT JOIN datavisapermit
        ON majikan.kode_visapermit=datavisapermit.id_visapermit
        LEFT JOIN personal
        ON disnaker.id_biodata=personal.id_biodata

        WHERE visa.tanggalterbang!=''
        AND visa.tempatsuhandok='寄臺灣KE TAIWAN'
        AND visa.tanggalterbang between '$ambiltglmulai' and '$ambiltglakhir'
        AND dataagen.id_agen='$idagenxxxx'
        ORDER BY visa.tanggalterbang ASC";

        $query = $this->db->query($sql);

        return $query;
}

function tampidatanyalaporanagendiindo($ambiltglmulai,$ambiltglakhir,$idagenxxxx){
        $sql = "SELECT disnaker.id_biodata
        ,visa.id_biodata_dititipkan as idbiodititipsh
        ,visa.nama_dititipkan as namadititipsh
        ,visa.tgl_terbang_dititipkan as tgldititipsh
        ,visa.id_biodata_dititipkan2 as idbiodititipvp
        ,visa.nama_dititipkan2 as namadititipvp
        ,visa.tgl_terbang_dititipkan2 as tgldititipvp
        ,visa.nama_titipan as namatitip
        ,visa.id_biodata_titipan as idbiotitip
        ,visa.tgl_terbang_titipan as tgltitip
        ,visa.tempatsuhandok as tempat_sh
        ,visa.tempatvpdok as tempat_vp
        ,visa.statsuhandok as status_sh
        ,visa.statvpdok as status_vp
        ,dataagen.nama as namaagennya
        ,disnaker.nama as namatkinya
        ,personal.nama_mandarin as namamandarintkinya
        ,datamajikan.nama as formalmajikan
        ,datamajikan.namamajikan as formalmandarinmajikan
        ,majikan.namamajikan as informalmajikan
        ,majikan.namataiwan as informalmandarinmajikan
        ,majikan.ketsuhan as suhanket
        ,majikan.ketpermit as visapermitket
        ,datasuhan.no_suhan as nosuhan
        ,datavisapermit.no_visapermit as novisapermit
        ,majikan.id_suhan as id_suhan
        ,majikan.id_visapermit as id_visapermit
        from disnaker 
        LEFT JOIN visa
        ON disnaker.id_biodata=visa.id_biodata 
        LEFT JOIN majikan
        ON majikan.id_biodata=disnaker.id_biodata
        LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen
        LEFT JOIN datamajikan
        ON majikan.kode_majikan=datamajikan.id_majikan
        LEFT JOIN datasuhan
        ON majikan.kode_suhan=datasuhan.id_suhan
        LEFT JOIN datavisapermit
        ON majikan.kode_visapermit=datavisapermit.id_visapermit
        LEFT JOIN personal
        ON disnaker.id_biodata=personal.id_biodata


        WHERE visa.tempatsuhandok='放印尼 DI INDONESIA'
        AND visa.tanggalterbang!=''
        AND visa.tanggalterbang between '$ambiltglmulai' and '$ambiltglakhir'
        AND dataagen.id_agen='$idagenxxxx'
        ORDER BY visa.tanggalterbang ASC";

        $query = $this->db->query($sql);

        return $query;
}

function namanyaagen($idagen){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM dataagen where id_agen='$idagen'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
        }

function idbiosuhandititipkan($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_biodata_dititipkan'];
			}
		return $kode_desa;
	}

function namasuhandititipkan($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_dititipkan'];
			}
		return $kode_desa;
        }

function tglterbangsuhandititipkan($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_terbang_dititipkan'];
			}
		return $kode_desa;
	}

function jeniskelamin($idbiodata){
                $kode_desa="";
                 $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
                        while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
                        }
                return $kode_desa;
        }

        function adh1($idbiodata){
                        $kode_desa="";
                         $result = Dbs::load("SELECT * FROM asuransi_dan_hotel where id_biodata='$idbiodata'");
                                while($row = mysqli_fetch_array($result)){
                        $kode_desa =$row['adh_nohp'];
                                }
                        return $kode_desa;
                }

        function adh2($idbiodata){
                        $kode_desa="";
                                $result = Dbs::load("SELECT * FROM asuransi_dan_hotel where id_biodata='$idbiodata'");
                                while($row = mysqli_fetch_array($result)){
                        $kode_desa =$row['adh_line'];
                                }
                        return $kode_desa;
                }

        function adh3($idbiodata){
                        $kode_desa="";
                                $result = Dbs::load("SELECT * FROM asuransi_dan_hotel where id_biodata='$idbiodata'");
                                while($row = mysqli_fetch_array($result)){
                        $kode_desa =$row['adh_email'];
                                }
                        return $kode_desa;
                }

function ambilpaspor($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM paspor where id_biodata='$idbiodata' AND paspor.nopaspor!=''");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nopaspor'];
			}
		return $kode_desa;
	}

	function ambilnomorlaporan($idlaporan){
$kode_desa="";
        $result = Dbs::load("SELECT *,pembuatan_laporan.id_pembuatan as idnyabuat FROM pembuatan_laporan WHERE id_pembuatan='$idlaporan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomor'];
			}
		return $kode_desa;
	}
		function ambiltglmulai($idlaporan){
$kode_desa="";
        $result = Dbs::load("SELECT *,pembuatan_laporan.id_pembuatan as idnyabuat FROM pembuatan_laporan WHERE id_pembuatan='$idlaporan'");
		while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglmulai'];
			}
		return $kode_desa;
	}
			function ambiltglakhir($idlaporan){
$kode_desa="";
        $result = Dbs::load("SELECT *,pembuatan_laporan.id_pembuatan as idnyabuat FROM pembuatan_laporan WHERE id_pembuatan='$idlaporan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglakhir'];
			}
		return $kode_desa;
	}

		function ambiltanggallaporan($idlaporan){
$kode_desa="";
        $result = Dbs::load("SELECT *,pembuatan_laporan.id_pembuatan as idnyabuat FROM pembuatan_laporan WHERE id_pembuatan='$idlaporan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}

	function masaberlakupaspor($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired  FROM paspor where id_biodata='$idbiodata' AND paspor.nopaspor!=''");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['expired'];
			}
		return $kode_desa;
	}

		function namaagenfi($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namaagennya'];
			}
		return $kode_desa;
	}

			function ambilidagen($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_agen'];
			}
		return $kode_desa;
	}

				function ambilidmajikan($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,datamajikan.nama as namaagennya FROM majikan
JOIN datamajikan
ON datamajikan.id_majikan=majikan.kode_majikan
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_majikan'];
			}
		return $kode_desa;
	}

			function namaagenformal($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namaagennya'];
			}
		return $kode_desa;
	}


			function namamajikanfi($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namamajikan'];
			}
		return $kode_desa;
	}


			function namamajikanformal($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,datamajikan.nama as namamajikannya FROM majikan
JOIN datamajikan
ON datamajikan.id_majikan=majikan.kode_majikan
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namamajikannya'];
			}
		return $kode_desa;
	}

				function namataiwanmajikanfi($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namataiwan'];
			}
		return $kode_desa;
	}
			function namataiwanmajikanformal($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,datamajikan.namamajikan as namataiwannya FROM majikan
JOIN datamajikan
ON datamajikan.id_majikan=majikan.kode_majikan
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namataiwannya'];
			}
		return $kode_desa;
	}


					function nosuhanfi($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_suhan'];
			}
		return $kode_desa;
	}

						function nosuhanformal($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,datasuhan.no_suhan as nosuhannya FROM majikan
JOIN datasuhan
ON datasuhan.id_suhan=majikan.kode_suhan
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nosuhannya'];
			}
		return $kode_desa;
	}

						function novisapermitfi($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,dataagen.nama as namaagennya FROM majikan
JOIN dataagen
ON dataagen.id_agen=majikan.kode_agen
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_visapermit'];
			}
		return $kode_desa;
	}

							function novisapermitformal($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,datavisapermit.no_visapermit as novsnya FROM majikan
JOIN datavisapermit
ON datavisapermit.id_visapermit=majikan.kode_visapermit
where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['novsnya'];
			}
		return $kode_desa;
	}


function idtki($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $id_biodata =$row['id_biodata'];
                  $negara1 =$row['negara1'];
                    $negara2 =$row['negara2'];
                      $calling =$row['calling'];
                        $skill1 =$row['skill1'];
                        $skill2 =$row['skill2'];
                        $skill3 =$row['skill3'];
			}

			$kode_desa=$id_biodata.''.$negara1.''.$negara2.''.$calling.'-'.$skill1.''.$skill2.''.$skill3;
		return $kode_desa;
        }

        function namatki($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
            }
        return $kode_desa;
    }
		function tanggallahir($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	}


        function bankpribadi($idbiodata){
                $kode_desa="";
                        $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$idbiodata'");
                                        while($row = mysqli_fetch_array($result)){
                                $kode_desa =$row['pribadi'];
                                        }
                                return $kode_desa;
                        }

                        function bankkarantina($idbiodata){
        $kode_desa="";
                $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$idbiodata'");
                                while($row = mysqli_fetch_array($result)){
                        $kode_desa =$row['karantina'];
                                }
                        return $kode_desa;
                }

		function namabank($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_bank'];
			}
		return $kode_desa;
	}
			function nilaikredit($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['isikredit'];
			}
		return $kode_desa;
	}
		function totalkredit($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nilaikredit'];
			}
		return $kode_desa;
	}


		function namatkimandarin($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_mandarin'];
			}
		return $kode_desa;
	}

			function ambilstatus($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	}

				function tglmenikah($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglmenikah'];
			}
		return $kode_desa;
	}
				function hpkel($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notelpkel'];
			}
		return $kode_desa;
	}
				function namapasangan($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM family where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_istri_suami'];
			}
		return $kode_desa;
	}

	function tanggaltiba($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggalterbang'];
			}
		return $kode_desa;
	}

		function airport($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['airport'];
			}
		return $kode_desa;
	}

		function ambilfoto1($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM upload_arc where id_biodata='$idbiodata' ORDER BY id_arc ASC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['file'];
			}
		return $kode_desa;
	}
		function ambilfoto2($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM upload_arc where id_biodata='$idbiodata' ORDER BY id_arc DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['file'];
			}
		return $kode_desa;
	}

					function hitungfoto($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT count(*) hitungan FROM upload_arc where id_biodata='$id_siswa'");

			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hitungan'];
			}
		return $kode_desa;
	} 
		function fotopaspor($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM upload_pasporbaru where id_biodata='$id_siswa' AND tampilkan='Ya' ORDER BY id_pasporbaru ASC LIMIT 1");

			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['file'];
			}
		return $kode_desa;
	} 
			function fotopaspor2($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT * FROM upload_pasporbaru where id_biodata='$id_siswa' AND tampilkan='Ya' ORDER BY id_pasporbaru DESC LIMIT 1");

			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['file'];
			}
		return $kode_desa;
	} 

				function hitungpaspor($id_siswa){
$kode_desa="";
                $result = Dbs::load("SELECT count(*) hitungan FROM upload_pasporbaru where id_biodata='$id_siswa' AND tampilkan='Ya'");

			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hitungan'];
			}
		return $kode_desa;
	} 

	function penerbangan1($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['detailberangkat1'];
			}
		return $kode_desa;
	}

		function penerbangan2($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['detailberangkat2'];
			}
		return $kode_desa;
	}

			function jamtiba($idbiodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM visa JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang where id_biodata='$idbiodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jamtiba'];
			}
		return $kode_desa;
	}
        function maskapai($idbiodata){
$kode_desa="";
$result = Dbs::load("SELECT * FROM visa JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang where id_biodata='$idbiodata'");
        while($row = mysqli_fetch_array($result)){
$kode_desa =$row['namamaskapai'];
        }
return $kode_desa;
}

//========================================= BLK FLAMBOYAN =======================================//

//-----------------------------------------BAYAR UJK---------------------------------------------//	

        function nopengajuanujk($id_formulir){
$kode_desa="";
        $result = Dbs::load("SELECT no_pengajuan from blk_pengajuan_ujk where id_formulirnya='$id_formulir'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['no_pengajuan'];
            }
        return $kode_desa;
    }

        function tglujkx($id_formulir){
$kode_desa="";
        $result = Dbs::load("SELECT tgl_ujk from blk_formulir where id_formulir='$id_formulir'");
            while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_ujk'];
            }
        return $kode_desa;
    }

	function tampil_data_bayarujk($id_bayar_ujk){
        $sql = "SELECT
a.*, b.*, b.nama as nama_kepada, 
b.alamat as alamat_kepada 
FROM blk_bayar_ujk a JOIN blk_lembaga_lsp b 
WHERE id_laporan_bulanan = '$id_bayar_ujk'
AND a.lembagalsp = b.id_lembaga_lsp
				;";
                $query = $this->db->query($sql);

            return $query;
    }
	
	function tampil_data_ctkinya($id_bayar_ujk){
        $sql = "SELECT 
                personalblk.nodaftar as blk_nodaftar,
                blk_detail_formulir.ket as ket, 
                personalblk.nodisnaker as blk_nodisnakernya,
                personalblk.nama as blk_namaperblk,
                personalblk.negara as blk_negaranya,
                disnaker.nodisnaker as personal_nodisnakernya,
                personal.nama as personal_namaperblk,
                disnaker.negara as personal_negaranya
                FROM blk_bayar_ujk
                LEFT JOIN blk_detail_formulir 
                ON blk_bayar_ujk.id_laporan_bulanan=blk_detail_formulir.id_formulir
                LEFT JOIN personalblk
                ON blk_detail_formulir.nodaftar=personalblk.nodaftar
                LEFT JOIN personal
                ON blk_detail_formulir.nodaftar=personal.id_biodata
                LEFT JOIN disnaker
                ON blk_detail_formulir.nodaftar=disnaker.id_biodata
                WHERE blk_bayar_ujk.id_laporan_bulanan='$id_bayar_ujk'
				;";
                $query = $this->db->query($sql);

            return $query;
    }

	
	function hitung_data_ctkinya($id_bayar_ujk){
        $result = Dbs::load("SELECT count(blk_bayar_ujk.id_laporan_bulanan) as total
                FROM blk_bayar_ujk
                LEFT JOIN blk_detail_formulir 
                ON blk_bayar_ujk.id_laporan_bulanan=blk_detail_formulir.id_formulir
                LEFT JOIN personalblk
                ON blk_detail_formulir.nodaftar=personalblk.nodaftar
                WHERE blk_bayar_ujk.id_laporan_bulanan='$id_bayar_ujk'
				;");
        while($row = mysqli_fetch_array($result)){
				$total =$row['total'];
			}
		return $total;
    }
//-----------------------------------------------------------------------------------------------//

//------------------------------------------INVOICE UJK------------------------------------------//
	function tampil_data_invoiceujk($id_invoice_ujk){
        $sql = "SELECT a.*, b.*, b.isi as nama_kepada, b.negara as negara_p 
				FROM blk_invoice_ujk a JOIN blk_pemilik b 
				WHERE id_laporan_bulanan ='$id_invoice_ujk'
				AND a.blk_pemilik = b.id_pemilik
				;";
                $query = $this->db->query($sql);

            return $query;
    }
	
	function tampil_data_ctkinya_invoujk($id_invoice_ujk,$idpemiik){
        $sql = "SELECT 
                personalblk.nodaftar as blk_nodaftar,
                blk_detail_formulir.ket as ket, 
                personalblk.nodisnaker as blk_nodisnakernya,
                personalblk.nama as blk_namaperblk,
                personalblk.negara as blk_negaranya,
                disnaker.nodisnaker as personal_nodisnakernya,
                personal.nama as personal_namaperblk,
                disnaker.negara as personal_negaranya
                FROM blk_invoice_ujk
                LEFT JOIN blk_detail_formulir 
                ON blk_invoice_ujk.id_laporan_bulanan=blk_detail_formulir.id_formulir
                LEFT JOIN personalblk
                ON blk_detail_formulir.nodaftar=personalblk.nodaftar
                LEFT JOIN personal
                ON blk_detail_formulir.nodaftar=personal.id_biodata
                LEFT JOIN disnaker
                ON blk_detail_formulir.nodaftar=disnaker.id_biodata
                WHERE blk_invoice_ujk.id_laporan_bulanan='$id_invoice_ujk'
                AND personalblk.pemilik='$idpemiik'
				;";
                $query = $this->db->query($sql);

            return $query;
    }

	function hitung_data_ctkinya_invoujk($id_invoice_ujk,$idpemiik){
        $result = Dbs::load("SELECT count(blk_invoice_ujk.id_laporan_bulanan) as total 
                FROM blk_invoice_ujk
                LEFT JOIN blk_detail_formulir 
                ON blk_invoice_ujk.id_laporan_bulanan=blk_detail_formulir.id_formulir
                LEFT JOIN personalblk
                ON blk_detail_formulir.nodaftar=personalblk.nodaftar
                WHERE blk_invoice_ujk.id_laporan_bulanan='$id_invoice_ujk'
                AND personalblk.pemilik='$idpemiik'
				;");
        while($row = mysqli_fetch_array($result)){
				$total =$row['total'];
			}
		return $total;
    }
//-----------------------------------------------------------------------------------------------//

//------------------------------------------INVOICE REFTUK------------------------------------------//
	function tampil_data_invoicereftuk($id_invoice_reftuk){
        $sql = "SELECT a.*, b.*, b.nama as nama_kepada, b.alamat as alamat_kepada
				FROM blk_invoice_reftuk a JOIN blk_lembaga_lsp b 
				WHERE id_invoice_reftuk = '$id_invoice_reftuk'
				AND a.lembagalsp = b.id_lembaga_lsp
				;";
                $query = $this->db->query($sql);

            return $query;
    }
	
	function tampil_data_ctkinya_invoreftuk($id_invoice_reftuk){
        $sql = "SELECT a.*, b.*, c.*, d.*, 
				d.nodisnaker as iddisnaker,
				d.nama as namaperblk,
				d.negara as negaranya
				FROM blk_invoice_reftuk a JOIN blk_laporan_bulanan b 
                JOIN blk_detail_laporan c JOIN personalblk d
				WHERE id_invoice_reftuk = '$id_invoice_reftuk'
				AND c.id_laporan = b.id_laporan_blk
				AND c.id_laporan = a.id_laporan_bulanan
				AND c.nodaftar = d.nodaftar
				;";
                $query = $this->db->query($sql);

            return $query;
    }

	function hitung_data_ctkinya_invoreftuk($id_invoice_reftuk){
        $result = Dbs::load("SELECT count(c.id_laporan_blk) as total
				FROM blk_invoice_reftuk a JOIN blk_laporan_bulanan b 
                JOIN blk_detail_laporan c JOIN personalblk d
				WHERE id_invoice_reftuk = '$id_invoice_reftuk'
				AND c.id_laporan = b.id_laporan_blk
				AND c.id_laporan = a.id_laporan_bulanan
				AND c.nodaftar = d.nodaftar
				;");
        while($row = mysqli_fetch_array($result)){
				$total =$row['total'];
			}
		return $total;
    }
//-----------------------------------------------------------------------------------------------//

//------------------------------------------INVOICE PELATIHAN------------------------------------------//
	function tampil_data_invoicepelatihan($id_invoice_pelatihan){
        $sql = "SELECT a.*, b.*, b.isi as nama_kepada, b.negara as negara_p
				FROM blk_invoice_pelatihan a JOIN blk_pemilik b 
				WHERE id_invoice_pelatihan = '$id_invoice_pelatihan'
				AND a.blk_pemilik = b.id_pemilik
				;";
                $query = $this->db->query($sql);

            return $query;
    }
	
	function tampil_data_ctkinya_invopelatihan($id_invoice_pelatihan){
        $sql = "SELECT a.*, b.*, c.*, d.*, 
				d.nodisnaker as iddisnaker,
				d.nama as namaperblk,
				d.negara as negaranya
				FROM blk_invoice_pelatihan a JOIN blk_laporan_bulanan b 
                JOIN blk_detail_laporan c JOIN personalblk d
				WHERE id_invoice_pelatihan = '$id_invoice_pelatihan'
				AND c.id_laporan = b.id_laporan_blk
				AND c.id_laporan = a.id_laporan_bulanan
				AND c.nodaftar = d.nodaftar
				;";
                $query = $this->db->query($sql);

            return $query;
    }

	function hitung_data_ctkinya_invopelatihan($id_invoice_pelatihan){
        $result = Dbs::load("SELECT count(c.id_laporan_blk) as total
				FROM blk_invoice_pelatihan a JOIN blk_laporan_bulanan b 
                JOIN blk_detail_laporan c JOIN personalblk d
				WHERE id_invoice_pelatihan = '$id_invoice_pelatihan'
				AND c.id_laporan = b.id_laporan_blk
				AND c.id_laporan = a.id_laporan_bulanan
				AND c.nodaftar = d.nodaftar
				;");
        while($row = mysqli_fetch_array($result)){
				$total =$row['total'];
			}
		return $total;
    }
//-----------------------------------------------------------------------------------------------//

//===============================================================================================//
	
//-----------------------------------------PENGAJUAN UJK---------------------------------------------// 
    function tampil_data_pengajuan_ujk($id_formulir){
        $sql = "SELECT a.*, b.*, c.tgl_pengajuan, b.nama as nama_kepada, b.alamat as alamat_kepada 
                FROM blk_pengajuan_ujk a JOIN blk_lembaga_lsp b JOIN blk_formulir c
                WHERE a.id_formulirnya='$id_formulir'
                AND a.lembagalsp = b.id_lembaga_lsp
                AND a.id_formulirnya = c.id_formulir
                ;";
                $query = $this->db->query($sql);

            return $query;
    }
    
    function tampil_data_ctkinya_pengajuan_ujk($id_pengajuan_ujk){
        $sql = "SELECT a.*, b.*, c.*, d.*, 
                c.id_detail_formulir as id_detail_detailnya,
                d.nodisnaker as nodisnakernya,
                d.nama as namaperblk,
                d.negara as negaranya
                FROM blk_pengajuan_ujk a JOIN blk_formulir b 
                JOIN blk_detail_formulir c JOIN personalblk d
                WHERE id_pengajuan_ujk = '$id_pengajuan_ujk'
                AND c.id_formulir = b.id_formulir
                AND c.id_formulir = a.id_formulirnya
                AND c.nodaftar = d.nodaftar
                ;";
                $query = $this->db->query($sql);

            return $query;
    }

    
    function hitungisi($id_pengajuan_ujk){
        $result = Dbs::load("SELECT count(*) as total FROM blk_detail_formulir where id_formulir='$id_pengajuan_ujk'
                ;");
        while($row = mysqli_fetch_array($result)){
                $total =$row['total'];
            }
        return $total;
    }

     function hitungbahasa($id_pengajuan_ujk,$bahasa){
        $result = Dbs::load("SELECT count(*) as total FROM blk_detail_formulir 
            LEFT JOIN personalblk ON blk_detail_formulir.nodaftar=personalblk.nodaftar 
            where blk_detail_formulir.id_formulir='$id_pengajuan_ujk' AND personalblk.bahasa='$bahasa'
                ;");
        while($row = mysqli_fetch_array($result)){
                $total =$row['total'];
            }
        return $total;
    }

         function hitungbahasastatus($id_pengajuan_ujk,$bahasa,$ket){
        $result = Dbs::load("SELECT count(*) as total 
FROM blk_detail_formulir 
LEFT JOIN personalblk ON blk_detail_formulir.nodaftar=personalblk.nodaftar 
where blk_detail_formulir.id_formulir='$id_pengajuan_ujk' AND personalblk.bahasa='$bahasa' AND blk_detail_formulir.ket='$ket'
                ;");
        while($row = mysqli_fetch_array($result)){
                $total =$row['total'];
            }
        return $total;
    }
//-----------------------------------------------------------------------------------------------//
}
?>