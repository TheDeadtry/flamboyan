<?php
class M_laporanasuransi extends CI_Model{
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


}
?>