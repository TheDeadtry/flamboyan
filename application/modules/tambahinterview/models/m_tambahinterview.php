<?php
class M_tambahinterview extends CI_Model{
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

	function tambahinterview() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'sunction' => $this->input->post('sunction'),
					'food' => $this->input->post('food'),
					'cateter' => $this->input->post('cateter'),
					'injection' => $this->input->post('injection'),
					'therapy' => $this->input->post('therapy'),
					'helping' => $this->input->post('helping'),
					'bed' => $this->input->post('bed'),
					'stairs' => $this->input->post('stairs'),


				);
			$this->db->insert('interview', $data);
	} 

		function ubahinterview() {
            	 $data = array(  
            	 	'sunction' => $this->input->post('sunction'),
					'food' => $this->input->post('food'),
					'cateter' => $this->input->post('cateter'),
					'injection' => $this->input->post('injection'),
					'therapy' => $this->input->post('therapy'),
					'helping' => $this->input->post('helping'),
					'bed' => $this->input->post('bed'),
					'stairs' => $this->input->post('stairs'),


				);
		 $this->db->where('id_interview', $this->input->post('id_interview'));
        $this->db->update('interview',$data);
	} 

}
?>