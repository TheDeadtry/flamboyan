<?php
class M_print_data extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
  function hitung_data_mf(){
		$sql = "SELECT count(*) as total FROM perjanjian_penempatan WHERE id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi(){
		$sql = "SELECT count(*) as total FROM perjanjian_penempatan WHERE id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
	 function hitung_data_jp(){
		$sql = "SELECT count(*) as total FROM perjanjian_penempatan WHERE id_biodata LIKE 'jp%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_ijin_kbanyuwangi(){
		$sql = "SELECT count(*) as total FROM surat_ijin_keluarga_banyuwangi";
        $query = $this->db->query($sql)->row_array();

        return $query['total'];
	}
	//---------------------------------------
	function hitung1(){
		$sql = "SELECT count(*) as total FROM pembuatan_tabelpap";
        $query = $this->db->query($sql)->row();
        return $query->total;
	}
	
	function hitung2(){
		$sql = "SELECT count(*) as total FROM pembuatan_tabeldis";
        $query = $this->db->query($sql)->row();
        return $query->total;
	}
	
	function hitung3(){
		$sql = "SELECT count(*) as total FROM pembuatan_tabeldis2";
        $query = $this->db->query($sql)->row();
        return $query->total;
	}
	
	function hitung4(){
		$sql = "SELECT count(*) as total FROM pembuatan_tabeldis3";
        $query = $this->db->query($sql)->row();
        return $query->total;
	}
	
	function hitung5(){
		$sql = "SELECT count(*) as total FROM pembuatan_laporan";
        $query = $this->db->query($sql)->row();
        return $query->total;
	}
	
	function hitung6(){
		$sql = "SELECT count(*) as total FROM surat_pengajuan";
        $query = $this->db->query($sql)->row();
        return $query->total;
	}
 	//-------------------------------
	function hitung_data_2(){
		$sql = "SELECT count(*) as total FROM surat_pernyataan";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_3(){
		$sql = "SELECT count(*) as total FROM surat_pernyataan";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_4(){
		$sql = "SELECT count(*) as total FROM pembuatan_ijin";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_5(){
		$sql = "SELECT count(*) as total FROM surat_perjanjian";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_6(){
		$sql = "SELECT count(*) as total FROM pembuatan_ijin";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_7(){
		$sql = "SELECT count(*) as total FROM surat_pernyataan_malang";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_8(){
		$sql = "SELECT count(*) as total FROM surat_kerja";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_9(){
		$sql = "SELECT count(*) as total FROM pengajuan_ktkln";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_10(){
		$sql = "SELECT count(*) as total FROM pengantar_pktkln";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	function hitung_data_11(){
		$sql = "SELECT count(*) as total FROM pengantar_ppap";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function tampil_data_personal(){
		$sql = "SELECT *,datasponsor.nama as namasponsor FROM personal INNER JOIN datasponsor ON personal.kode_sponsor=datasponsor.kode_sponsor";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_pengguna_agen($id_user){
		$nama;
        $result = Dbs::load("SELECT kode_agen FROM dataagen where username='$id_user'");
			while($row = mysqli_fetch_array($result)){
                $nama=$row['kode_agen'];
			}
		return $nama;
	}
	
	function hitung_data_disnaker_informal(){
		$sql = "SELECT count(*) as total FROM format_disnaker_informal";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
	function hitung_data_disnaker_formal(){
		$sql = "SELECT count(*) as total FROM format_disnaker_formal";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
	function hitung_data_disnaker_jompo(){
		$sql = "SELECT count(*) as total FROM format_disnaker_jompo";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
	function hitung_surat_perjanjian_kerja_formal(){
		$sql = "SELECT count(*) as total FROM surat_perjanjian_kerja_formal";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	
	function hitung_surat_perjanjian_kerja_informal(){
		$sql = "SELECT count(*) as total FROM surat_perjanjian_kerja_informal";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

}
?>