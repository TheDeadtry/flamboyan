<?php
class M_markawal extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function hitung_data_marka($idnya){
		$sql = "SELECT * from marka WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->num_rows();
	}
	
	function hitung_data_marka_b($idnya){
		$sql = "SELECT * from marka_biotoagen WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->num_rows();
	}
		function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen where statusnonaktif=0";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_group(){
		$sql = "SELECT * FROM datagroup";
                $query = $this->db->query($sql);

            return $query->result();
	} 
    function getagenList($idgrup){
	$sql = "SELECT * FROM dataagen where statusnonaktif=0 and kode_group='".$idgrup."'";
                $query = $this->db->query($sql);

            return $query->result();

    }

    function getposisiList_group(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datagroup');
        $this->db->order_by('kode_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Data-';
            $result[1]= '-Tidak Ada Group-';
            $result[$row->id_group]= $row->nama;
        }

        return $result;
    }

	
	function tambahdptmaj($id,$majmntgl,$tgl,$nmajikan,$agen,$grup,$ket) {
			$data = array(
			'id_marka' => ' ',
			'id_biodata' => $id,
			'mtgl_terbang' => $majmntgl,
			'tgl' 	 => $tgl,
			'nama' 	 => $nmajikan,
			'agen' 	 => $agen,
			'grup' 	 => $grup,
			'ket' 	 => $ket,
			
			);
		$this->db->insert('marka', $data);
	}
	
	function tambahbiotoagen($id,$tgl_to_agen,$nama_agen,$grup_to_agen,$nama_pabrik,$tgl_pauliu,$tgl_inter,$tgldilepas) {
			$data = array(
			'id_marka_bioagen' => ' ',
			'id_biodata' => $id,
			'tgl_to_agen' 	 => $tgl_to_agen,
			'nama_agen' 	 => $nama_agen,
			'grup_to_agen' 	 => $grup_to_agen,
			'nama_pabrik' 	 => $nama_pabrik,
			'tgl_pauliu' 	 => $tgl_pauliu,
			'tgl_inter' 	 => $tgl_inter,
			'tgldilepas' 	 => $tgldilepas,
			
			);
		$this->db->insert('marka_biotoagen', $data);
	}
	
	
	function tampil_marka($idnya){
				$sql = "SELECT *from marka WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
		
	function tampil_marka_b($idnya){
				$sql = "SELECT * ,datagroup.nama as namagroupnya, dataagen.nama as namaagennya
				FROM marka_biotoagen
INNER JOIN dataagen 
ON marka_biotoagen.nama_agen=dataagen.id_agen 
INNER JOIN datagroup 
ON datagroup.id_group=marka_biotoagen.grup_to_agen 
WHERE marka_biotoagen.id_biodata='$idnya'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}


			function tampil_marka_bid($idnya){
				$sql = "SELECT * ,datagroup.nama as namagroupnya, dataagen.nama as namaagennya
				FROM marka_biotoagen
INNER JOIN dataagen 
ON marka_biotoagen.nama_agen=dataagen.id_agen 
INNER JOIN datagroup 
ON datagroup.id_group=marka_biotoagen.grup_to_agen 
WHERE marka_biotoagen.id_biodata='$idnya'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
		
	function getById($id) {
			return $this->db->get_where('marka', array('id_marka' => $id))->row();
		}
	
	function getById_bio($id) {
			return $this->db->get_where('marka_biotoagen', array('id_marka_bioagen' => $id))->row();
		}
		
	function updatemarkawal($id){
		$mtgl_terbang = $this->input->post('mtgl_terbang');
		$tgl = $this->input->post('tgl');
		$nama = $this->input->post('nama');
		$agen = $this->input->post('agen');
		$grup = $this->input->post('grup');
		$ket = $this->input->post('ket');
			$data = array(
				'mtgl_terbang' => $mtgl_terbang,
				'tgl' => $tgl,
				'nama' => $nama,
				'agen' => $agen,
				'grup' => $grup,
				'ket' => $ket,
				);
			$this->db->where('id_marka', $id);
			$this->db->update('marka', $data);
	}
	
	function updatemarkawal_bio($id){
		$nama_agen = $this->input->post('kode_agen');
		$grup_to_agen = $this->input->post('kode_group');
			$data = array(
				'nama_agen' => $nama_agen,
				'grup_to_agen' => $grup_to_agen,
				);
			$this->db->where('id_marka_bioagen', $id);
			$this->db->update('marka_biotoagen', $data);
	}
	
	
	function get_data_marka($kode) { 
			$this->db->where('id_marka', $kode);
			$query = $this->db->get('marka');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	function get_data_marka_bio($kode) { 
			$this->db->where('id_marka_bioagen', $kode);
			$query = $this->db->get('marka_biotoagen');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	
	function delete_data($kode) { 
			$this->db->where('id_marka', $kode);
			$this->db->delete('marka');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	function delete_data_bio($kode) { 
			$this->db->where('id_marka_bioagen', $kode);
			$this->db->delete('marka_biotoagen');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

	function edit_markawal() {
		$id = $this->input->post('id_marka_bioagen');
		$tgl_to_agen = $this->input->post('tgl_to_agen');
		$nama_pabrik = $this->input->post('nama_pabrik');
		$tgl_pauliu = $this->input->post('tgl_pauliu');
		$tgl_inter = $this->input->post('tgl_inter');
		$tgldilepas = $this->input->post('tgldilepas');
		$data = array(
			'tgl_to_agen' => $tgl_to_agen,
			'nama_pabrik' => $nama_pabrik,
			'tgl_pauliu' => $tgl_pauliu,
			'tgl_inter' => $tgl_inter,
			'tgldilepas' => $tgldilepas,
			);
		$this->db->where('id_marka_bioagen', $id);
		$this->db->update('marka_biotoagen', $data);
	}

	function edit_markawalgrup() {
		$id = $this->input->post('id_marka_bioagen');
		$nama_agen = $this->input->post('nama_agen');
		$kodeagen2 = $this->input->post('kodeagen');
		$data = array(
			'nama_agen' => $nama_agen,
			'grup_to_agen' => $kodeagen2,
			);
		$this->db->where('id_marka_bioagen', $id);
		$this->db->update('marka_biotoagen', $data);
	}

	function hapus_markawal() {
		$id = $this->input->post('id_marka_bioagen');
		$this->db->where('id_marka_bioagen', $id);
		$this->db->delete('marka_biotoagen');
	}

}
?>