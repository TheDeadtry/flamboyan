<?php
class M_baru9 extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function tampilnamatki($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampiltempatlahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampiltgllahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 

	function tampilalamat($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
        LEFT JOIN personal
        ON surat_pernyataan.id_tki=personal.id_personal 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampilnama_bapak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
        LEFT JOIN family
        ON surat_pernyataan.id_keluarga=family.id_family 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	} 
	
	function tampiltempat($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempat'];
			}
		return $kode_desa;
	} 
	
	function tampiltgl($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl'];
			}
		return $kode_desa;
	} 
	
	function tampilalamat2($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat2'];
			}
		return $kode_desa;
	} 

	function tampiltempat3($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM surat_pernyataan 
WHERE id_pernyataan='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempat3'];
			}
		return $kode_desa;
	} 
	
	

}
?>