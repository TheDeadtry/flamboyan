<?php
class M_durasi extends CI_Model{
    function __construct(){
        parent::__construct();
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
	
function tampil_datadurasi(){
		$sql = "SELECT * FROM durasi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	function tampil_data_skillnya(){
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
		$sql = "SELECT isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function hitung_data_durasi($idnya){
		$sql = "SELECT count(*) as total FROM durasi WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_durasidetail($idnya){
		$sql = "SELECT * FROM durasidetail WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}

				function tampil_data_durasi($idnya){
		$sql = "SELECT * FROM durasi WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahdurasi() {
            	 $data = array(
            	    'id_biodata' => $this->input->post('idbiodata'),  
            	    'tgl_registrasi' => $this->input->post('tgl_registrasi'),
            	 	'tgl_update' => $this->input->post('tgl_update'),
            	 	'tgl_habisdurasi' => $this->input->post('tgl_habisdurasi'),
            	 	'jml_hari' => $this->input->post('jml_hari'),

				);
			$this->db->insert('durasi', $data);
	} 
	function ubahdurasi() {
 $data = array(  
            	 	'tgl_update' => $this->input->post('tgl_update'),
            	 	'tgl_registrasi' => $this->input->post('tgl_registrasi'),
            	 	'tgl_habisdurasi' => $this->input->post('tgl_habisdurasi'),
            	 	'jml_hari' => $this->input->post('jml_hari'),

				);
			//$this->db->insert('durasipermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('durasi', $data);
	} 

	    function updatedurasidetail() {
	    	$idid = $this->input->post('idbiodata');
        $statusp = $this->input->post('statusp');
        $tgl_registrasi = $this->input->post('tgl_registrasi');
        $jml_hari = $this->input->post('jml_hari');
        $data = array(
            'status' => $statusp,
            'tgl_registrasi' => $tgl_registrasi,
            'jml_hari' => $jml_hari,
            );
        $this->db->where('id_biodata', $idid);
        $this->db->update('durasidetail', $data);
    }

    	function hapus_durasi($id) {
		$this->db->where('id_durasi', $id);
		$this->db->delete('durasi');
	}

		
}
?>