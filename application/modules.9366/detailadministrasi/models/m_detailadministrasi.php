<?php
class M_detailadministrasi extends CI_Model{
    function __construct(){
        parent::__construct();
    }

			function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tglbuat($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterima'];
			}
		return $kode_desa;
	}
		function nodisnaker($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nodisnaker'];
			}
		return $kode_desa;
	}
		function tglonline($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglonline'];
			}
		return $kode_desa;
	}
		function tglpksisko($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglpksisko'];
			}
		return $kode_desa;
	}





			function tanggaldaftar($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggaldaftar'];
			}
		return $kode_desa;
	}

			function nama($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}
				function tempatlahir($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	}
				function tgllahir($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM personal where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	}



				function noktp($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['noktp'];
			}
		return $kode_desa;
	}

					function jeniskelamin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	}


				function agama($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['agama'];
			}
		return $kode_desa;
	}


				function status($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	}


				function pendidikan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['pendidikan'];
			}
		return $kode_desa;
	}


				function alamat($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	}


				function namaayah($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namaayah'];
			}
		return $kode_desa;
	}


				function namaibu($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namaibu'];
			}
		return $kode_desa;
	}





				function namamedical2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM medical2 where id_biodata='$id_biodata' order by id_medical DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namamedical'];
			}
		return $kode_desa;
	}
				function tanggalmed2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM medical2 where id_biodata='$id_biodata' order by id_medical DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}
				function nomedical2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM medical2 where id_biodata='$id_biodata' order by id_medical DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomedical'];
			}
		return $kode_desa;
	}


				function namamedical3($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM medical3 where id_biodata='$id_biodata' order by id_medical DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namamedical'];
			}
		return $kode_desa;
	}
				function tanggalmed3($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM medical3 where id_biodata='$id_biodata' order by id_medical DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggal'];
			}
		return $kode_desa;
	}
				function nomedical3($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM medical3 where id_biodata='$id_biodata' order by id_medical DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nomedical'];
			}
		return $kode_desa;
	}


	function nopaspor($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nopaspor'];
			}
		return $kode_desa;
	}
		function tglterbit($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbit'];
			}
		return $kode_desa;
	}

	function expired($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['expired'];
			}
		return $kode_desa;
	}
	function office($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['office'];
			}
		return $kode_desa;
	}
		function nopaspor2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM pasporlama WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nopaspor'];
			}
		return $kode_desa;
	}
		function tglterbit2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM pasporlama WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbit'];
			}
		return $kode_desa;
	}

	function expired2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM pasporlama WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['expired'];
			}
		return $kode_desa;
	}
	function office2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM pasporlama WHERE id_biodata='$id_biodata' order by id_paspor DESC limit 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['office'];
			}
		return $kode_desa;
	}


				function namanegara($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['negara'];
			}
		return $kode_desa;
	}

function namajabatan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM disnaker where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jabatan'];
			}
		return $kode_desa;
	}

function tglmajikan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterpilih'];
			}
		return $kode_desa;
	}

	function namaagency($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join dataagen ON majikan.kode_agen=dataagen.id_agen where majikan.id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}

			function tglpk($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datamajikan ON majikan.kode_majikan=datamajikan.id_majikan where majikan.id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglpk'];
			}
		return $kode_desa;
	}


// FORMAL
		function namamajikanformal($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datamajikan ON majikan.kode_majikan=datamajikan.id_majikan where majikan.id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}

			function namamajikantaiwanformal($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datamajikan ON majikan.kode_majikan=datamajikan.id_majikan where majikan.id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namamajikan'];
			}
		return $kode_desa;
	}
			function alamatmajikanformal($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datamajikan ON majikan.kode_majikan=datamajikan.id_majikan where majikan.id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	}
			function telpmajikanformal($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datamajikan ON majikan.kode_majikan=datamajikan.id_majikan where majikan.id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hp'];
			}
		return $kode_desa;
	}


				function nosuhan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datasuhan ON majikan.kode_suhan=datasuhan.id_suhan where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['no_suhan'];
			}
		return $kode_desa;
	}
					function terbitsuhan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datasuhan ON majikan.kode_suhan=datasuhan.id_suhan where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbit'];
			}
		return $kode_desa;
	}
					function berakhirsuhan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datasuhan ON majikan.kode_suhan=datasuhan.id_suhan where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglexp'];
			}
		return $kode_desa;
	}
					function tglbawasuhan($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datasuhan ON majikan.kode_suhan=datasuhan.id_suhan where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglbawa'];
			}
		return $kode_desa;
	}


					function novisapermit($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datavisapermit ON majikan.kode_visapermit=datavisapermit.id_visapermit where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['no_visapermit'];
			}
		return $kode_desa;
	}

						function terbitvisapermit($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datavisapermit ON majikan.kode_visapermit=datavisapermit.id_visapermit where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbitvs'];
			}
		return $kode_desa;
	}

						function berakhirvisapermit($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datavisapermit ON majikan.kode_visapermit=datavisapermit.id_visapermit where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglexpvs'];
			}
		return $kode_desa;
	}

						function tglbawavisapermit($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan left join datavisapermit ON majikan.kode_visapermit=datavisapermit.id_visapermit where majikan.id_biodata='$id_biodata'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglbawavs'];
			}
		return $kode_desa;
	}


	// INFORMAL
		function namamajikanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namamajikan'];
			}
		return $kode_desa;
	}
			function namamajikantaiwanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['namataiwan'];
			}
		return $kode_desa;
	}

				function alamatmajikanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamatmajikan'];
			}
		return $kode_desa;
	}
	function telpmajikanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notelpmajikan'];
			}
		return $kode_desa;
	}

	function nosuhanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_suhan'];
			}
		return $kode_desa;
	}

		function terbitsuhanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbitsuhan'];
			}
		return $kode_desa;
	}

			function berakhirsuhanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbitsuhan'];
			}
		return $kode_desa;
	}

			function tglterimasuhanin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterimasuhan'];
			}
		return $kode_desa;
	}

		function novisapermitin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['id_visapermit'];
			}
		return $kode_desa;
	}

	function terbitvisapermitin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbitpermit'];
			}
		return $kode_desa;
	}

		function berakhirvisapermitin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterbitpermit'];
			}
		return $kode_desa;
	}

			function tglterimavisapermitin($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan where id_biodata='$id_biodata'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterimapermit'];
			}
		return $kode_desa;
	}







							function novisa($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['novisa'];
			}
		return $kode_desa;
	}
							function terbitvisa($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglberlaku'];
			}
		return $kode_desa;
	}
							function berakhirvisa($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 3 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['expired'];
			}
		return $kode_desa;
	}

								function nopap($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nopap'];
			}
		return $kode_desa;
	}

function pap($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['pap'];
			}
		return $kode_desa;
	}

	function namabank($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_bank'];
			}
		return $kode_desa;
	}

	function norek($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['norektki'];
			}
		return $kode_desa;
	}

	function tglbank($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_bank'];
			}
		return $kode_desa;
	}

	function jenisbank($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank
WHERE signingbank.id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['isikredit'];
			}
		return $kode_desa;
	}

	function nilaibank($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM signingbank LEFT JOIN datakreditbank
ON signingbank.idkredit=datakreditbank.id_kreditbank
WHERE signingbank.id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nilaikredit'];
			}
		return $kode_desa;
	}

		function visaarrival($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM upload_visaarrival WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglterima'];
			}
		return $kode_desa;
	}

	function tglterbang($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tglberangkat'];
			}
		return $kode_desa;
	}

		function tgltiba($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tanggalterbang'];
			}
		return $kode_desa;
	}

		function detailberangkat1($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['detailberangkat1'];
			}
		return $kode_desa;
	}

			function detailberangkat2($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['detailberangkat2'];
			}
		return $kode_desa;
	}

				function jamtiba($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT *,DATE_ADD(tglberlaku, INTERVAL 5 MONTH) as expired FROM visa LEFT JOIN dataterbang ON visa.id_terbang=dataterbang.id_terbang WHERE id_biodata='".$id_biodata."'
");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jamtiba'];
			}
		return $kode_desa;
	}


					function infoberkas($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM infoberkas WHERE id_biodata='".$id_biodata."'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['info_berkas'];
			}
		return $kode_desa;
	}

		function ambilberkas($id_biodata){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM ambilberkas WHERE id_biodata='".$id_biodata."'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_ambil_dok'];
			}
		return $kode_desa;
	}






}
?>
