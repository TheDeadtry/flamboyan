<?php
class M_tambahmedical extends CI_Model{
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

 function tampil_data_pilihanmedical(){
		$sql = "SELECT id_medical,isi,mandarin FROM datamedical";
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
function tampil_data_medical($idnya){
		$sql = "SELECT * FROM medical WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahmedical() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterangan' => $this->input->post('kesehatan'),
            	 	'jenismedical' => $this->input->post('jenismedical'),
					'tanggal' => $this->input->post('tanggal'),
					'nama' => $this->input->post('namamedical'),
					'nomor' => $this->input->post('nomormedical'),

				

				);
			$this->db->insert('medical', $data);
	} 
		function ubahmedical() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterangan' => $this->input->post('kesehatan'),
            	 	'jenismedical' => $this->input->post('jenismedical'),
					'tanggal' => $this->input->post('tanggal'),
					'nama' => $this->input->post('namamedical'),
					'nomor' => $this->input->post('nomormedical'),
				

				);
			//$this->db->insert('medical', $data);
            $this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('medical', $data);
	} 


	function hapus_medical($id){
		$this->db->where('id_medical', $id);
			$this->db->delete('medical');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
	}

}
?>