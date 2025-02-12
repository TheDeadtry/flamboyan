<?php
class M_dashboard extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

  function tampil_data_personal(){
		$sql = "SELECT * FROM personal ORDER BY nama ASC ";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampilbiaya(){
		$sql = "SELECT * FROM biaya WHERE id_biaya='1'";
                $query = $this->db->query($sql);

            return $query;
	}
 
 function tampilpemilik($idpemilik){
		$sql = "SELECT * FROM blk_pemilik WHERE id_pemilik='$idpemilik'";
                $query = $this->db->query($sql);

            return $query;
	}
 
   function ambildata1($date1,$date2){
		$sql = "SELECT DISTINCT (
idblk
) AS usernya, personal.nama AS nama, personalblk.nama AS namahk, blk_pemilik.isi AS nama_pemilik, blk_pemilik.negara AS negara
FROM tblattendance
LEFT JOIN personalblk ON tblattendance.idblk = personalblk.nodaftar
LEFT JOIN blk_pemilik ON personalblk.pemilik = blk_pemilik.id_pemilik
LEFT JOIN personal ON personalblk.nodaftar = personal.id_biodata
WHERE DATE( dteDate ) BETWEEN '$date1' AND '$date2' ORDER BY `usernya` ASC";
                $query = $this->db->query($sql);

            return $query;
	}

	   function ambildata1ss($date1,$date2,$idpemilik,$jk){
		$sql = "SELECT DISTINCT (
idblk
) AS usernya, personal.nama AS nama, personalblk.nama AS namahk, blk_pemilik.isi AS nama_pemilik, blk_pemilik.negara AS negara, personalblk.statterbang as hk_stb, personal.statterbang as personal_stb
FROM tblattendance
LEFT JOIN personalblk ON tblattendance.idblk = personalblk.nodaftar
LEFT JOIN blk_pemilik ON personalblk.pemilik = blk_pemilik.id_pemilik
LEFT JOIN personal ON personalblk.nodaftar = personal.id_biodata
WHERE DATE( dteDate ) BETWEEN '$date1' AND '$date2' AND blk_pemilik.id_pemilik='$idpemilik' $jk ORDER BY `usernya` ASC";
                $query = $this->db->query($sql);

            return $query;
	}

	  function ambildata2($date1,$date2,$usercx){
		$sql = "SELECT DISTINCT(DATE(dteDate)) as tanggal,idblk FROM tblattendance WHERE DATE(dteDate) BETWEEN '$date1' AND '$date2' AND idblk ='$usercx' ORDER BY  `tanggal` ASC ";
                $query = $this->db->query($sql);

            return $query;
	}

 function simpan_data_personalblk(){
		$pemilik = $this->input->post('pemilik');
		$nodaftar = $this->input->post('nodaftar');
		$nama = $this->input->post('nama');

		$data = array (
			'pemilik'=>$pemilik, 
			'nodaftar'=>$nodaftar,
			'nama'=>$nama, 
			);

		$this->db->insert('personalblk',$data);
	}

	function tampil_data_personalblk(){
		$sql = "SELECT * FROM personalblk left join datapemilik on personalblk.pemilik = datapemilik.id_pemilik";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_data_pemilik(){
		$sql = "SELECT * FROM blk_pemilik";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_personalblk() {
		$id = $this->input->post('id_personalblk');
	$pemilik = $this->input->post('pemilik');
		$nodaftar = $this->input->post('nodaftar');
		$nama = $this->input->post('nama');

		$data = array(
			'pemilik'=>$pemilik, 
			'nodaftar'=>$nodaftar,
			'nama'=>$nama, 
			);
		$this->db->where('id_personalblk', $id);
		$this->db->update('personalblk', $data);
	}

	function hapus_data_personalblk() {
		$id = $this->input->post('id_personalblk');
		$this->db->where('id_personalblk', $id);
		$this->db->delete('personalblk');
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

	function hitung_data_mf_terbang(){
		$sql = "SELECT count(*) as total FROM personal WHERE statterbang=1 and id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi_terbang(){
		$sql = "SELECT count(*) as total FROM personal WHERE statterbang=1 and id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_ff_terbang(){
		$sql = "SELECT count(*) as total FROM personal WHERE statterbang=1 and id_biodata LIKE 'ff%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_fi_terbang(){
		$sql = "SELECT count(*) as total FROM personal WHERE statterbang=1 and id_biodata LIKE 'fi%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_jp_terbang(){
		$sql = "SELECT count(*) as total FROM personal WHERE statterbang=1 and id_biodata LIKE 'jp%'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}



	function hitung_data_mf_md(){
		$sql = "SELECT count(*) as total FROM personal WHERE (lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT'))and id_biodata LIKE 'mf%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_mi_md(){
		$sql = "SELECT count(*) as total FROM personal WHERE (lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT')) and id_biodata LIKE 'mi%'";
                 $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_ff_md(){
		$sql = "SELECT count(*) as total FROM personal WHERE (lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT')) and id_biodata LIKE 'ff%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_fi_md(){
		$sql = "SELECT count(*) as total FROM personal WHERE (lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT')) and id_biodata LIKE 'fi%'";
               $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
	 function hitung_data_jp_md(){
		$sql = "SELECT count(*) as total FROM personal WHERE (lower(statusaktif)=lower('Mengundurkan diri') || lower(statusaktif)=lower('UNFIT')) and id_biodata LIKE 'jp%'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}

	function select($qq) {
		return $this->db->query($qq)->result();
	}

	function select_row($qq) {
		return $this->db->query($qq)->row();
	}
}
?>