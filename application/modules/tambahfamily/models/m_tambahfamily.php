<?php
class M_tambahfamily extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

	function tampil_data_jobs(){
		$sql = "SELECT * FROM datajobs";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function tampil_data_negara(){
		$sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_data_pekerjaan(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
	function tampil_data_agama(){
		$sql = "SELECT id_agama,isi,mandarin FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_pendidikan(){
		$sql = "SELECT id_pedidikan,isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT id_provinsi,isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

		function getnourut($idnya){

		$sql = "SELECT no_urut FROM datasektor WHERE kode_jenis='".$idnya."'";
                $query = $this->db->query($sql);
            return $query->row('no_urut');
	}


		function updateidsektor($idnya,$nourut){

		$sql = "UPDATE datasektor SET no_urut='".$nourut."' WHERE kode_jenis='".$idnya."'";

		$this->db->query($sql);

	}
	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tampil_data_family($idnya){
		$sql = "SELECT * FROM family WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahfamily() {
		$player = array();
		$datanya="";

		$player=$this->input->post('jumlahanak');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}
		//echo "".$datanya;


            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'nama_bapak' => $this->input->post('namabapak'),
					'umur_bapak' => $this->input->post('umurbapak')." tahun 嵗",
					'kerja_bapak' => $this->input->post('kerjabapak'),
					'nama_ibu' => $this->input->post('namaibu'),
					'umur_ibu' => $this->input->post('umuribu')." tahun 嵗",
					'kerja_ibu' => $this->input->post('kerjaibu'),
					'nama_istri_suami' => $this->input->post('namaistri'),
					'umur_istri_suami' => $this->input->post('umuristri')." tahun 嵗",
					'kerja_istri_suami' => $this->input->post('kerjaistri'),
					'data_anak' => $datanya,
					'saudara_laki' => $this->input->post('saudaralaki'),
					'saudar_pr' => $this->input->post('saudarapr'),
					'anak_ke' => $this->input->post('anakke'),
					
				);
        $idid = $this->input->post('idbiodata');
        $cek_family = $this->db->query("SELECT count(*) as total FROM family WHERE id_biodata='$idid'")->row();
        if ($cek_family->total == 0) {
			$this->db->insert('family', $data);
        }
	} 

		function ubahfamily() {
		$player = array();
		$datanya="";

		$player=$this->input->post('jumlahanak');
		$datanya=$player[0];
		for($i=1;$i<sizeof($player);$i++){
			$datanya=$datanya.",".$player[$i];
		}
		//echo "".$datanya;


            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'nama_bapak' => $this->input->post('namabapak'),
					'umur_bapak' => $this->input->post('umurbapak')." tahun 嵗",
					'kerja_bapak' => $this->input->post('kerjabapak'),
					'nama_ibu' => $this->input->post('namaibu'),
					'umur_ibu' => $this->input->post('umuribu')." tahun 嵗",
					'kerja_ibu' => $this->input->post('kerjaibu'),
					'nama_istri_suami' => $this->input->post('namaistri'),
					'umur_istri_suami' => $this->input->post('umuristri')." tahun 嵗",
					'kerja_istri_suami' => $this->input->post('kerjaistri'),
					'data_anak' => $datanya,
					'saudara_laki' => $this->input->post('saudaralaki'),
					'saudar_pr' => $this->input->post('saudarapr'),
					'anak_ke' => $this->input->post('anakke'),
					
				);

            $this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('family', $data);
			//$this->db->insert('family', $data);
	} 

}
?>