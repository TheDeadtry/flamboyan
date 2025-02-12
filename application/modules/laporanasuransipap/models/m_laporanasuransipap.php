<?php
class M_laporanasuransipap extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	function asuransipra(){
		$sql = "SELECT *, disnaker.nama as namapersonal,disnaker.tempatlahir as personaltempat, disnaker.tanggallahir as tgllahirpersonal FROM pembuatan_tabeldis 
LEFT JOIN detail_tabeldis 
ON pembuatan_tabeldis.id_pembuatan = detail_tabeldis.id_tabeldis
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis.id_biodata";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function asuransiprafilter($bulan,$tahun){
		$sql = "SELECT *, disnaker.nama as namapersonal,disnaker.tempatlahir as personaltempat, disnaker.tanggallahir as tgllahirpersonal FROM pembuatan_tabeldis 
LEFT JOIN detail_tabeldis 
ON pembuatan_tabeldis.id_pembuatan = detail_tabeldis.id_tabeldis
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis.id_biodata
WHERE Month(pembuatan_tabeldis.tanggal)='$bulan' && YEAR(pembuatan_tabeldis.tanggal)='$tahun';
";
                $query = $this->db->query($sql);

            return $query->result();
	} 

         function tampil_data_detail2filter($bulan,$tahun){
        $sql = "SELECT *,personal.nama as namapersonal,personal.tempatlahir as personaltempat, personal.tgllahir as tgllahirpersonal FROM pembuatan_tabeldis2 
LEFT JOIN detail_tabeldis2
ON pembuatan_tabeldis2.id_pembuatan = detail_tabeldis2.id_tabeldis2
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis2.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis2.id_biodata
WHERE Month(pembuatan_tabeldis2.tanggal)='$bulan' && YEAR(pembuatan_tabeldis2.tanggal)='$tahun'";

                $query = $this->db->query($sql);

            return $query->result();;
    } 
    
}
?>