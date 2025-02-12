<?php
class M_tambahpaspor extends CI_Model{
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

	function tambahpaspor() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'keterangan' => $this->input->post('paspor'),
					'nopaspor' => $this->input->post('nomorpaspor'),
					'office' => $this->input->post('office'),
					'tglterbit' => $this->input->post('tglterbitpas'),
					'tglpengajuan' => $this->input->post('tglpengajuanpas'),
					'statuspengajuan' => $this->input->post('ajua'),
					'tglfoto' => $this->input->post('tglfotopas'),
					'statusfoto' => $this->input->post('fotoa'),
					'tglterima' => $this->input->post('trimabuku'),
					'statusterima' => $this->input->post('trima'),
				);
			$this->db->insert('paspor', $data);
	}
	function tampil_data_paspor($idnya){
		$sql = "SELECT * FROM paspor WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
		function ubahpaspor() {
            	 $data = array(  
            	 	'keterangan' => $this->input->post('paspor'),
					'nopaspor' => $this->input->post('nomorpaspor'),
					'office' => $this->input->post('office'),
					'tglterbit' => $this->input->post('tglterbitpas'),
					'tglpengajuan' => $this->input->post('tglpengajuanpas'),
					'statuspengajuan' => $this->input->post('ajua'),
					'tglfoto' => $this->input->post('tglfotopas'),
					'statusfoto' => $this->input->post('fotoa'),
					'tglterima' => $this->input->post('trimabuku'),
					'statusterima' => $this->input->post('trima'),
				);
			//$this->db->insert('paspor', $data);
						$this->db->where('id_paspor', $this->input->post('id_paspor'));
			$this->db->update('paspor', $data);
	}  

		function hapuspaspordata() {
		$id = $this->input->post('id_paspor');
		$this->db->where('id_paspor', $id);
		$this->db->delete('paspor');
	}


}
?>