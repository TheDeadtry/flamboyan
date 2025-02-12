<?php
class M_baru5 extends CI_Model{
    function __construct(){
        parent::__construct();
    }
function tampil_namanya($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 
	
	function tampil_nama_ibu($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN family
        ON format_disnaker_informal.id_biodata=family.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_ibu'];
			}
		return $kode_desa;
	} 
	
	function tampil_nama_bapak($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN family
        ON format_disnaker_informal.id_biodata=family.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama_bapak'];
			}
		return $kode_desa;
	}
	
	function tampil_jeniskelamin($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jeniskelamin'];
			}
		return $kode_desa;
	} 
	
	function tampil_tempatlahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tempatlahir'];
			}
		return $kode_desa;
	} 
	
	function tampil_tgllahir($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgllahir'];
			}
		return $kode_desa;
	} 
	
	function tampil_no_ktpnya($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['no_ktpnya'];
			}
		return $kode_desa;
	} 
	
	function tampil_alamatnya($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['alamat'];
			}
		return $kode_desa;
	} 
	
	function tampil_provinsi($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['provinsi'];
			}
		return $kode_desa;
	} 
	
	function tampil_status($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['status'];
			}
		return $kode_desa;
	} 
	
	function tampil_agama($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['agama'];
			}
		return $kode_desa;
	} 
	
	function tampil_pendidikan($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN personal
        ON format_disnaker_informal.id_biodata=personal.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['pendidikan'];
			}
		return $kode_desa;
	} 
	
	function tampil_nama($id_siswa){
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
	
	
	function tampil_mata_uang($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['mata_uang'];
			}
		return $kode_desa;
	} 
	
	function tampil_direktur($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['direktur'];
			}
		return $kode_desa;
	} 
	
	function tampil_jenisagre($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM majikan
        LEFT JOIN dataagen
        ON majikan.kode_agen=dataagen.id_agen 
WHERE majikan.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['jenisagre'];
			}
		return $kode_desa;
	} 
	
	function tampil_gajinya($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['gajinya'];
			}
		return $kode_desa;
	} 
	
	
	function tampil_berlaku($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN paspor
        ON format_disnaker_informal.id_biodata=paspor.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['berlaku'];
			}
		return $kode_desa;
	} 
	
	function tampil_sampai($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN paspor
        ON format_disnaker_informal.id_biodata=paspor.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['sampai'];
			}
		return $kode_desa;
	}

	function tampil_paspor($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
        LEFT JOIN paspor
        ON format_disnaker_informal.id_biodata=paspor.id_biodata 
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nopaspor'];
			}
		return $kode_desa;
	} 
	function tampil_tgl_berangkatnya($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_berangkatnya'];
			}
		return $kode_desa;
	} 
	
	function tampil_tgl_tibanya($id_siswa){
$kode_desa="";
        $result = Dbs::load("SELECT * FROM format_disnaker_informal
WHERE format_disnaker_informal.id_biodata='$id_siswa'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_tibanya'];
			}
		return $kode_desa;
	} 
}
?>