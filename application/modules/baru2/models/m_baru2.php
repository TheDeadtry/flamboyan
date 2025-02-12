<?php
class M_baru2 extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function tampilnamatki($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	
	
	function tampiltempatlahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 
	
	function tampiljeniskelamin($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 
	
	function tampilalamat($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampilnotelp($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notelp'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_bapak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN family
        ON perjanjian_penempatan.id_biodata=family.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	} 
	
	function tampilnotelpkel($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notelpkel'];
			}
		return $kode_desa;
	} 
	
	function tampilpendidikan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['pendidikan'];
			}
		return $kode_desa;
	} 
	
	function tampilstatus($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN personal
        ON perjanjian_penempatan.id_biodata=personal.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_istri_suami($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
        LEFT JOIN family
        ON perjanjian_penempatan.id_biodata=family.id_biodata 
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_istri_suami'];
			}
		return $kode_desa;
	} 
	
	function tampil_gaji($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['gaji'];
			}
		return $kode_desa;
	} 

	function tampil_lembur($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['lembur'];
			}
		return $kode_desa;
	} 
	
	
	function tampil_hubungan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['hubungan'];
			}
		return $kode_desa;
	} 


	function tampil_wali($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['wali'];
			}
		return $kode_desa;
	} 

	function tampil_nama_dinas($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_dinas'];
			}
		return $kode_desa;
	} 


	function tampil_nama_agen($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        	 LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 

	function tampil_id_pengguna($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        	 LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nosiup'];
			}
		return $kode_desa;
	} 

	function tampil_nomer_pengguna($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        	 LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['notel'];
			}
		return $kode_desa;
	} 

	function tampil_alamat_pengguna($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        	 LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 

	function tampil_jabatan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM perjanjian_penempatan
WHERE perjanjian_penempatan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jabatan'];
			}
		return $kode_desa;
	} 
}
?>