<?php
class M_dashboard extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function hitung_warga($kode_desa){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_ak) as hitungan FROM data_keluarga where no_registrasi LIKE '%$kode_desa%'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
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
	
  function hitung_balita($kode_desa){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_balita_lk)+  sum(jumlah_balita_pr)as hitungan FROM data_keluarga where no_registrasi LIKE '%$kode_desa%'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 
  function hitung_lansia($kode_desa){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_lansia) as hitungan FROM data_keluarga where no_registrasi LIKE '%$kode_desa%'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 function hitung_ibuhamil($kode_desa){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_bumil)+ sum(jumlah_busui)as hitungan FROM data_keluarga where no_registrasi LIKE '%$kode_desa%'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
   function ambil_kode_desa($id_user, $status){
		$kode_desa;
        $result = mysql_query("SELECT * FROM admin_desa where username='$id_user' and status='$status'");
			while($row = mysql_fetch_array($result)){
                $kode_desa=$row['kode_wilayah'];
			}
		return $kode_desa;
	}
	
	function ambil_kode_kec($id_user, $status){
		$kode_desa;
        $result = mysql_query("SELECT * FROM admin_kec where username='$id_user' and status='$status'");
			while($row = mysql_fetch_array($result)){
                $kode_kec=$row['kode_wilayah'];
			}
		return $kode_kec;
	}
	
	function hitung_warga_sekec($kode_kec){
	$jumlahwarga;
        $result = mysql_query("SELECT count(a.nama) as hitungan FROM data_warga a JOIN desa b ON a.kode_dasawisma=b.kode where b.kode_kec='$kode_kec'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 
  function hitung_balita_sekec($kode_kec){
	$jumlahwarga;
        $result = mysql_query("SELECT count(a.nama) as hitungan FROM data_kader_pkk a JOIN desa b ON a.kode_desa=b.kode where b.kode_kec='$kode_kec'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 
  function hitung_lansia_sekec($kode_kec){
	$jumlahwarga;
        $result = mysql_query("SELECT count(a.nama) as hitungan FROM data_anggota_pkk a JOIN desa b ON a.kode_desa=b.kode where b.kode_kec='$kode_kec'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 function hitung_ibuhamil_sekec($kode_kec){
	$jumlahwarga;
        $result = mysql_query("SELECT count(a.nama) as hitungan FROM data_kader_pkk a JOIN desa b ON a.kode_desa=b.kode where b.kode_kec='$kode_kec'");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 
 function ambil_nama_kecamatan($kode_kec){
		$nama_kec;
        $result = mysql_query("SELECT * FROM kecamatan where kode='$kode_kec'");
			while($row = mysql_fetch_array($result)){
                $nama_kec=$row['nama'];
			}
		return $nama_kec;
	}
	
function hitung_warga_sekab(){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_ak) as hitungan FROM data_keluarga");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 
  function hitung_balita_sekab(){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_balita_lk)+  sum(jumlah_balita_pr)as hitungan FROM data_keluarga");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 
  function hitung_lansia_sekab(){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_lansia) as hitungan FROM data_keluarga");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
 function hitung_ibuhamil_sekab(){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_bumil)+ sum(jumlah_busui)as hitungan FROM data_keluarga");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
  	
function hitung_user(){
	$jumlahwarga;
        $result = mysql_query("select count(id) from admin_desa union select count(id) from admin_kec union select count(id) from admin_kab");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['id'];
			}
		return $jumlahwarga;
 }
 //belum selesai
  function hitung_berita_artikel(){
	$jumlahwarga;
        $result = mysql_query("select count(id) from berita");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
  //belum selesai
  function hitung_pengumuman(){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_lansia) as hitungan FROM data_keluarga");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
  //belum selesai
 function hitung_kegiatan(){
	$jumlahwarga;
        $result = mysql_query("SELECT sum(jumlah_bumil)+ sum(jumlah_busui)as hitungan FROM data_keluarga");
			while($row = mysql_fetch_array($result)){
                $jumlahwarga=$row['hitungan'];
			}
		return $jumlahwarga;
 }
}
?>