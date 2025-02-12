<?php
class M_pdf13 extends CI_Model{
    function __construct(){
        parent::__construct();
    }

function ambilidbio($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_tki'];
			}
		return $kode_desa;
	}

	function tampillembaga($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['asuransi'];
			}
		return $kode_desa;
	}

		function tampillembaga2($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis2 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['asuransi'];
			}
		return $kode_desa;
	}

			function tampillembaga3($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis3 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['asuransi'];
			}
		return $kode_desa;
	}

            function tampil_data_detail($idtabeldis){
        $sql = "SELECT *,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired, disnaker.nama as namapersonal, disnaker.alamat as alamattampil,disnaker.tempatlahir as personaltempat, disnaker.tanggallahir as tgllahirpersonal FROM pembuatan_tabeldis 
LEFT JOIN detail_tabeldis 
ON pembuatan_tabeldis.id_pembuatan = detail_tabeldis.id_tabeldis
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN paspor
ON paspor.id_biodata=detail_tabeldis.id_biodata
where pembuatan_tabeldis.id_pembuatan='$idtabeldis'
AND paspor.keterangan='sudah' ";
                $query = $this->db->query($sql);

            return $query;
    } 

                function tampil_data_detailfilter($dari,$sampai){
        $sql = "SELECT *, disnaker.nama as namapersonal,disnaker.tempatlahir as personaltempat, disnaker.tanggallahir as tgllahirpersonal FROM pembuatan_tabeldis 
LEFT JOIN detail_tabeldis 
ON pembuatan_tabeldis.id_pembuatan = detail_tabeldis.id_tabeldis
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis.id_biodata
WHERE Month(pembuatan_tabeldis.tanggal)='$dari' && YEAR(pembuatan_tabeldis.tanggal)='$sampai'";
                $query = $this->db->query($sql);

            return $query;
    } 

     function tampil_data_detail2($idtabeldis){
        $sql = "SELECT *,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired,personal.nama as namapersonal,personal.tempatlahir as personaltempat, personal.tgllahir as tgllahirpersonal, disnaker.alamat as alamattampil FROM pembuatan_tabeldis2 
LEFT JOIN detail_tabeldis2
ON pembuatan_tabeldis2.id_pembuatan = detail_tabeldis2.id_tabeldis2
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN paspor
ON paspor.id_biodata=detail_tabeldis2.id_biodata
where pembuatan_tabeldis2.id_pembuatan='$idtabeldis'
AND paspor.keterangan='sudah' 
";
                $query = $this->db->query($sql);

            return $query;
    } 

         function tampil_data_detail2filter($dari,$sampai){
        $sql = "SELECT *,personal.nama as namapersonal,personal.tempatlahir as personaltempat, personal.tgllahir as tgllahirpersonal FROM pembuatan_tabeldis2 
LEFT JOIN detail_tabeldis2
ON pembuatan_tabeldis2.id_pembuatan = detail_tabeldis2.id_tabeldis2
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis2.id_biodata
WHERE Month(pembuatan_tabeldis2.tanggal)='$dari' && YEAR(pembuatan_tabeldis2.tanggal)='$sampai'";

                $query = $this->db->query($sql);

            return $query;
    } 


     function tampil_data_detail3($idtabeldis){
        $sql = "SELECT *,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired,personal.nama as namapersonal, disnaker.alamat as alamattampil,personal.tempatlahir as personaltempat, personal.tgllahir as tgllahirpersonal FROM pembuatan_tabeldis3
LEFT JOIN detail_tabeldis3
ON pembuatan_tabeldis3.id_pembuatan = detail_tabeldis3.id_tabeldis3
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN paspor
ON paspor.id_biodata=detail_tabeldis3.id_biodata
where pembuatan_tabeldis3.id_pembuatan='$idtabeldis'
AND paspor.keterangan='sudah' 
";
                $query = $this->db->query($sql);

            return $query;
    } 

         function tampil_data_detail3filter($dari,$sampai){
        $sql = "SELECT *,personal.nama as namapersonal,personal.tempatlahir as personaltempat, personal.tgllahir as tgllahirpersonal FROM pembuatan_tabeldis3
LEFT JOIN detail_tabeldis3
ON pembuatan_tabeldis3.id_pembuatan = detail_tabeldis3.id_tabeldis3
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis3.id_biodata
WHERE Month(pembuatan_tabeldis3.tanggal)='$dari' && YEAR(pembuatan_tabeldis3.tanggal)='$sampai'";
                $query = $this->db->query($sql);

            return $query;
    } 




                function tampil_data_detailhapap($idtabeldis){
        $sql = "SELECT *,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired FROM pembuatan_tabelhapap 
LEFT JOIN detail_tabelhapap
ON pembuatan_tabelhapap.id_pembuatan = detail_tabelhapap.id_tabelhapap
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabelhapap.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabelhapap.id_biodata
LEFT JOIN paspor
ON paspor.id_biodata=detail_tabelhapap.id_biodata
where pembuatan_tabelhapap.id_pembuatan='$idtabeldis'
AND paspor.keterangan='sudah' 

";
                $query = $this->db->query($sql);

            return $query;
    } 
                    function tampil_data_detailpap($idtabeldis){
        $sql = "SELECT *,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired FROM pembuatan_tabelpap 
LEFT JOIN detail_tabelpap
ON pembuatan_tabelpap.id_pembuatanpap = detail_tabelpap.id_tabelpap
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabelpap.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabelpap.id_biodata
LEFT JOIN paspor
ON paspor.id_biodata=detail_tabelpap.id_biodata
where pembuatan_tabelpap.id_pembuatanpap='$idtabeldis'
AND paspor.keterangan='sudah' 
GROUP BY paspor.id_biodata
ORDER BY paspor.tglterbit DESC  
";
                $query = $this->db->query($sql);

            return $query;
    }
                        function tampil_data_detailpapformal($idtabeldis){
        $sql = "SELECT pembuatan_tabelpap.*, detail_tabelpap.*, disnaker.*, paspor.*, detail_tabeldis3.*, pembuatan_tabeldis3.*,
        DATE_ADD( paspor.tglterbit, INTERVAL 5 YEAR ) AS expired, datamajikan.nama as dtkode
FROM pembuatan_tabelpap
LEFT JOIN detail_tabelpap ON pembuatan_tabelpap.id_pembuatanpap = detail_tabelpap.id_tabelpap
LEFT JOIN disnaker ON disnaker.id_biodata = detail_tabelpap.id_biodata
LEFT JOIN paspor ON paspor.id_biodata = detail_tabelpap.id_biodata
LEFT JOIN detail_tabeldis3 ON detail_tabelpap.id_biodata = detail_tabeldis3.id_biodata
LEFT JOIN pembuatan_tabeldis3 ON detail_tabeldis3.id_tabeldis3 = pembuatan_tabeldis3.id_pembuatan
LEFT JOIN majikan ON majikan.id_biodata = detail_tabelpap.id_biodata
LEFT JOIN datamajikan ON majikan.kode_majikan = datamajikan.id_majikan
where pembuatan_tabelpap.id_pembuatanpap='$idtabeldis'
AND paspor.keterangan = 'sudah'
AND (
detail_tabelpap.id_biodata LIKE  'MF%'
OR detail_tabelpap.id_biodata LIKE  'FF%'
OR detail_tabelpap.id_biodata LIKE  'JP%'
)";    $query = $this->db->query($sql);
            return $query;
    }

                            function tampil_data_detailpapinformal($idtabeldis){
        $sql = "SELECT * , DATE_ADD( paspor.tglterbit, INTERVAL 5 YEAR ) AS expired
FROM pembuatan_tabelpap
LEFT JOIN detail_tabelpap ON pembuatan_tabelpap.id_pembuatanpap = detail_tabelpap.id_tabelpap
LEFT JOIN disnaker ON disnaker.id_biodata = detail_tabelpap.id_biodata
LEFT JOIN paspor ON paspor.id_biodata = detail_tabelpap.id_biodata
LEFT JOIN detail_tabeldis3 ON detail_tabelpap.id_biodata = detail_tabeldis3.id_biodata
LEFT JOIN pembuatan_tabeldis3 ON detail_tabeldis3.id_tabeldis3 = pembuatan_tabeldis3.id_pembuatan
where pembuatan_tabelpap.id_pembuatanpap='$idtabeldis'
AND paspor.keterangan = 'sudah'
AND (
detail_tabelpap.id_biodata LIKE  'MI%'
OR detail_tabelpap.id_biodata LIKE  'FI%')
GROUP BY paspor.id_biodata
ORDER BY paspor.tglterbit DESC  
";
                $query = $this->db->query($sql);

            return $query;
    }

			function ambilfoto($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['foto'];
			}
		return $kode_desa;
	}

				function daerah($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}

					function tanggal($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}


				function daerahfilter($dari,$sampai){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis WHERE tanggal BETWEEN '$dari' AND '$sampai'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}

					function tanggalfilter($dari,$sampai){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis WHERE tanggal BETWEEN '$dari' AND '$sampai'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}
	function daerah2($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis2 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}

					function tanggal2($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis2 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}

	function daerah2filter($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis2 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}

					function tanggal2filter($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis2 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}

		function daerah3($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis3 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}

					function tanggal3($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabeldis3 where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}


					function daerahhapap($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelhapap where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}


					function tanggalhapap($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelhapap where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}


					function tanggalx($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}
						function tanggalpap($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggalpap'];
			}
		return $kode_desa;
	}

						function kepadapap($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['kepada'];
			}
		return $kode_desa;
	}
							function nomorpap($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomor'];
			}
		return $kode_desa;
	}
								function nomorkt($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomorktkln'];
			}
		return $kode_desa;
	}
							function daerahpap($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelpap where id_pembuatanpap='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}

						function tanggalktkln($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelktkln where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}

						function kepadaktkln($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelktkln where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['kepada'];
			}
		return $kode_desa;
	}
							function nomorktkln($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelktkln where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomor'];
			}
		return $kode_desa;
	}
							function daerahktkln($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelktkln where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['daerah'];
			}
		return $kode_desa;
	}
								function jumlahktkln($id_pembuatan){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM pembuatan_tabelktkln where id_pembuatan='$id_pembuatan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jumlah'];
			}
		return $kode_desa;
	}



    			function ambilpendmandarin(){
$kode_desa=array();
        $result = Dbs::load("SELECT * FROM datapendidikan");
			while($row = mysqli_fetch_array($result)){
                $kode_desa[] =$row['mandarin'];
			}
		return $kode_desa;
	} 

}
?>