<?php
class M_printdata extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function tampilnamatki1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahir1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 

	function tampilalamat1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamatlengkap'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_bapak1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
        LEFT JOIN family
        ON surat_pernyataan.id_keluarga=family.id_family 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	} 
	
	function tampiltempat1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempat'];
			}
		return $kode_desa;
	} 
	
	function tampiltgl1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgl'];
			}
		return $kode_desa;
	} 
	
	function tampilalamat21($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat2'];
			}
		return $kode_desa;
	} 







	function tampilnomor2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nomor'];
			}
		return $kode_desa;
	} 

	function tampillampiran2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['lampiran'];
			}
		return $kode_desa;
	} 

	function tampilperihal2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['perihal'];
			}
		return $kode_desa;
	} 

	function tampilkepada2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kepada'];
			}
		return $kode_desa;
	} 
	
	function tampilnamatki2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
        LEFT JOIN personal
        ON pembuatan_ijin.id_tki=personal.id_biodata 
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahir2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
        LEFT JOIN personal
        ON pembuatan_ijin.id_tki=personal.id_biodata 
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
        LEFT JOIN personal
        ON pembuatan_ijin.id_tki=personal.id_biodata 
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 

	function tampiljabatan2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jabatan'];
			}
		return $kode_desa;
	} 

	function tampilalamat2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin
        LEFT JOIN personal
        ON pembuatan_ijin.id_tki=personal.id_biodata 
WHERE id_pembuatan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	


		function tampilnomordesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nomor'];
			}
		return $kode_desa;
	} 

	function tampillampirandesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['lampiran'];
			}
		return $kode_desa;
	} 

	function tampilperihaldesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['perihal'];
			}
		return $kode_desa;
	} 

	function tampilkepadadesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kepada'];
			}
		return $kode_desa;
	} 
	
	function tampilnamatkidesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
        LEFT JOIN personal
        ON pembuatan_ijin_desa.id_tki=personal.id_biodata 
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahirdesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
        LEFT JOIN personal
        ON pembuatan_ijin_desa.id_tki=personal.id_biodata 
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahirdesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
        LEFT JOIN personal
        ON pembuatan_ijin_desa.id_tki=personal.id_biodata 
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 

	function tampiljabatandesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jabatan'];
			}
		return $kode_desa;
	} 

	function tampilalamatdesa($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pembuatan_ijin_desa
        LEFT JOIN personal
        ON pembuatan_ijin_desa.id_tki=personal.id_biodata 
WHERE id_pembuatan_desa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	
	
	
	
	
	
	function tampilnamatki3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_perjanjian
        LEFT JOIN personal
        ON surat_perjanjian.nama_tki=personal.id_personal 
WHERE id_perjanjian='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahir3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_perjanjian
        LEFT JOIN personal
        ON surat_perjanjian.nama_tki=personal.id_personal 
WHERE id_perjanjian='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_perjanjian
        LEFT JOIN personal
        ON surat_perjanjian.nama_tki=personal.id_personal 
WHERE id_perjanjian='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 
	
	function tampilnopass3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_perjanjian
WHERE id_perjanjian='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nopass'];
			}
		return $kode_desa;
	} 

	function tampiljeniskelamin3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_perjanjian
        LEFT JOIN personal
        ON surat_perjanjian.nama_tki=personal.id_personal 
WHERE id_perjanjian='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 

	function tampilalamat3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_perjanjian
        LEFT JOIN personal
        ON surat_perjanjian.nama_tki=personal.id_personal 
WHERE id_perjanjian='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	
	
	
	
	function tampilnamatki4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_legalitas
        LEFT JOIN personal
        ON surat_legalitas.id_tki=personal.id_personal 
WHERE id_legalitas='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampilnoid4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_legalitas
WHERE id_legalitas='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['noid'];
			}
		return $kode_desa;
	}
	
	function tampiltempatlahir4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_legalitas
        LEFT JOIN personal
        ON surat_legalitas.id_tki=personal.id_personal 
WHERE id_legalitas='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_legalitas
        LEFT JOIN personal
        ON surat_legalitas.id_tki=personal.id_personal 
WHERE id_legalitas='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	}
	
	function tampiljeniskelamin4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_legalitas
        LEFT JOIN personal
        ON surat_legalitas.id_tki=personal.id_personal 
WHERE id_legalitas='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 

	function tampilalamat4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_legalitas
        LEFT JOIN personal
        ON surat_legalitas.id_tki=personal.id_personal 
WHERE id_legalitas='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	}
	
	
	
	
	
	function tampilnama_bapak5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
        LEFT JOIN family
        ON surat_ijin_keluarga_banyuwangi.id_keluarga=family.id_family 
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	}  
	
	function tampilnoktp5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['noktp'];
			}
		return $kode_desa;
	} 
	
	function tampiltmp5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tmp'];
			}
		return $kode_desa;
	} 
	
	function tampiltgl5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgl'];
			}
		return $kode_desa;
	} 
	
	function tampilalamat25($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat2'];
			}
		return $kode_desa;
	} 
	
	function tampilnamatki5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
        LEFT JOIN personal
        ON surat_ijin_keluarga_banyuwangi.id_tki=personal.id_personal 
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahir5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
        LEFT JOIN personal
        ON surat_ijin_keluarga_banyuwangi.id_tki=personal.id_personal 
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
        LEFT JOIN personal
        ON surat_ijin_keluarga_banyuwangi.id_tki=personal.id_personal 
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 
	
	function tampilnopass5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nopass'];
			}
		return $kode_desa;
	} 

	function tampilalamat5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
        LEFT JOIN personal
        ON surat_ijin_keluarga_banyuwangi.id_tki=personal.id_personal 
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampiltujuan5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tujuan'];
			}
		return $kode_desa;
	} 
	
	function tampilsebagai5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga_banyuwangi
WHERE id_surat='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['sebagai'];
			}
		return $kode_desa;
	} 
	
	
	
	
	function tampilnamatki6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
        LEFT JOIN personal
        ON surat_kuasa.id_tki=personal.id_personal 
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampilnoid6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['noid'];
			}
		return $kode_desa;
	}
	
	function tampiltempatlahir6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
        LEFT JOIN personal
        ON surat_kuasa.id_tki=personal.id_personal 
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
        LEFT JOIN personal
        ON surat_kuasa.id_tki=personal.id_personal 
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	}
	
	function tampilnopass6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nopass'];
			}
		return $kode_desa;
	}
	
	function tampiljeniskelamin6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
        LEFT JOIN personal
        ON surat_kuasa.id_tki=personal.id_personal 
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 

	function tampilalamat6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_kuasa
        LEFT JOIN personal
        ON surat_kuasa.id_tki=personal.id_personal 
WHERE id_kuasa='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	}
	
	
	
	
	
	function tampilnamatki7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
        LEFT JOIN personal
        ON surat_pernyataan_malang.id_tki=personal.id_personal 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahir7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
        LEFT JOIN personal
        ON surat_pernyataan_malang.id_tki=personal.id_personal 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
        LEFT JOIN personal
        ON surat_pernyataan_malang.id_tki=personal.id_personal 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 
	
	function tampilstatus7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
        LEFT JOIN personal
        ON surat_pernyataan_malang.id_tki=personal.id_personal 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	} 

	function tampilalamat7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
        LEFT JOIN personal
        ON surat_pernyataan_malang.id_tki=personal.id_personal 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_bapak7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
        LEFT JOIN family
        ON surat_pernyataan_malang.id_keluarga=family.id_family 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	} 
	
	function tampiltempat7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempat'];
			}
		return $kode_desa;
	} 
	
	function tampiltgl7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgl'];
			}
		return $kode_desa;
	} 
	
	function tampilstatus27($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['status2'];
			}
		return $kode_desa;
	} 
	
	function tampilhubungan7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hubungan2'];
			}
		return $kode_desa;
	} 
	
	function tampilalamat27($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang 
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat2'];
			}
		return $kode_desa;
	} 
	
	function tampiltujuan7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tujuan2'];
			}
		return $kode_desa;
	}
	
	function tampilkontrak7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_pernyataan_malang
WHERE id_keterangan='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kontrak2'];
			}
		return $kode_desa;
	}
	
	
	
	
	
	function tampilnamamajikan8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['namanya'];
			}
		return $kode_desa;
	}
	function tampilalamatmajikan8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamatnya'];
			}
		return $kode_desa;
	}
	function tampilhpmajikan8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hpnya'];
			}
		return $kode_desa;
	}
	function tampilnamatki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}
	function tampilalamattki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	}
	function tampilnopasstki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nopass'];
			}
		return $kode_desa;
	}
	function tampiltempatlahirtki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	}
	function tampiltgllahirtki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	}
	function tampiljeniskelamintki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	}
	function tampiljmanaktki8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['jmanak'];
			}
		return $kode_desa;
	}
	function tampilnama_bapak8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	}
	function tampilalamat28($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat2'];
			}
		return $kode_desa;
	}
	function tampilhp28($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hp2'];
			}
		return $kode_desa;
	}
	function tampilhubungan28($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT *,a.nama as namanya,b.alamat as alamatnya,c.hp as hpnya FROM surat_kerja 
				INNER JOIN datamajikan a
				ON surat_kerja.id_majikan = a.id_majikan 
				INNER JOIN datamajikan b
				ON surat_kerja.id_majikan = b.id_majikan 
				INNER JOIN datamajikan c
				ON surat_kerja.id_majikan = c.id_majikan 
				INNER JOIN personal 
				ON surat_kerja.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_kerja.id_keluarga = family.id_family 
WHERE id_kerja='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hubungan2'];
			}
		return $kode_desa;
	}
	
	
	
	
	
	function tampil1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	}
	
	function tampil2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempat4'];
			}
		return $kode_desa;
	}
	
	function tampil3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tanggal4'];
			}
		return $kode_desa;
	}
	
	function tampil4($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['pekerjaan1'];
			}
		return $kode_desa;
	}
	
	function tampil5($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat4'];
			}
		return $kode_desa;
	}
	
	function tampil6($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['desa1'];
			}
		return $kode_desa;
	}
	
	function tampil7($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kel1'];
			}
		return $kode_desa;
	}
	
	function tampil8($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kab1'];
			}
		return $kode_desa;
	}
	
	function tampil9($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kec1'];
			}
		return $kode_desa;
	}
	
	function tampil10($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['rt1'];
			}
		return $kode_desa;
	}
	
	function tampil11($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['hubungan4'];
			}
		return $kode_desa;
	}
	
	function tampil12($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}
	
	function tampil13($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	}
	
	function tampil14($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	}
	
	function tampil15($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	}
	
	function tampil16($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['pekerjaan2'];
			}
		return $kode_desa;
	}
	
	function tampil17($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	}
	
	function tampil18($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['desa2'];
			}
		return $kode_desa;
	}
	
	function tampil19($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kel2'];
			}
		return $kode_desa;
	}
	
	function tampil20($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kab2'];
			}
		return $kode_desa;
	}
	
	function tampil21($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kec2'];
			}
		return $kode_desa;
	}
	
	function tampil22($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['rt2'];
			}
		return $kode_desa;
	}
	
	function tampil23($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family
WHERE id_ijinku='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tujuan4'];
			}
		return $kode_desa;
	}
	
	
	
	
	 function data1($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengajuan_ktkln
WHERE id_ktkln='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nomor_2'];
			}
		return $kode_desa;
	}function data2($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengajuan_ktkln
WHERE id_ktkln='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tki_2'];
			}
		return $kode_desa;
	}function data3($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengajuan_ktkln
WHERE id_ktkln='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['kepada_2'];
			}
		return $kode_desa;
	}
	
	
	
	
	 function data21($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengantar_pktkln
WHERE id_pktkln='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nomor_3'];
			}
		return $kode_desa;
	}function data22($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengantar_pktkln
WHERE id_pktkln='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tki_3'];
			}
		return $kode_desa;
	}
	
	
	
	
	 function data31($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengantar_ppap
WHERE id_ppap='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nomor_2'];
			}
		return $kode_desa;
	}function data32($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengantar_ppap
WHERE id_ppap='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tki_2'];
			}
		return $kode_desa;
	}function data33($id_siswa){
$kode_desa="";
        $result = mysql_query("SELECT * FROM pengantar_ppap
WHERE id_ppap='$id_siswa'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tanggal_2'];
			}
		return $kode_desa;
	}
	
}
?>