<?php
class M_laporanasuransimasa extends CI_Model{
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

		function asuransimasafilter($bulan,$tahun){
		$sql = "SELECT *,personal.nama as namapersonal,personal.tempatlahir as personaltempat, personal.tgllahir as tgllahirpersonal FROM pembuatan_tabeldis3
LEFT JOIN detail_tabeldis3
ON pembuatan_tabeldis3.id_pembuatan = detail_tabeldis3.id_tabeldis3
LEFT JOIN disnaker
ON disnaker.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN asuransifull
ON asuransifull.id_biodata=detail_tabeldis3.id_biodata
LEFT JOIN personal
ON personal.id_biodata=detail_tabeldis3.id_biodata
WHERE Month(pembuatan_tabeldis3.tanggal)='$bulan' && YEAR(pembuatan_tabeldis3.tanggal)='$tahun';
";
                $query = $this->db->query($sql);

            return $query->result();
	} 


}
?>