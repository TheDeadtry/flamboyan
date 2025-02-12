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
	
	function tambahdptmaj($id,$majmntgl,$tgl,$nmajikan,$agen,$grup,$ket,$tgl_to_agen,$nama_agen,$grup_to_agen,$nama_pabrik,$tgl_pauliu,$tgl_inter) {
			$data = array(
			'id_marka' => ' ',
			'id_biodata' => $id,
			'mtgl_terbang' => $majmntgl,
			'tgl' 	 => $tgl,
			'nama' 	 => $nmajikan,
			'agen' 	 => $agen,
			'grup' 	 => $grup,
			'ket' 	 => $ket,
			'tgl_to_agen' 	 => $tgl_to_agen,
			'nama_agen' 	 => $nama_agen,
			'grup_to_agen' 	 => $grup_to_agen,
			'nama_pabrik' 	 => $nama_pabrik,
			'tgl_pauliu' 	 => $tgl_pauliu,
			'tgl_inter' 	 => $tgl_inter,
			
			);
		$this->db->insert('marka', $data);
	}
	
	function tampil_marka($idnya){
				$sql = "SELECT *from marka WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
	function getById($id) {
			return $this->db->get_where('marka', array('id_marka' => $id))->row();
		}
	function updatemarkawal($id){
		$mtgl_terbang = $this->input->post('mtgl_terbang');
		$tgl = $this->input->post('tgl');
		$nama = $this->input->post('nama');
		$agen = $this->input->post('agen');
		$grup = $this->input->post('grup');
		$ket = $this->input->post('ket');
		$tgl_to_agen = $this->input->post('tgl_to_agen');
		$nama_agen = $this->input->post('nama_agen');
		$grup_to_agen = $this->input->post('grup_to_agen');
		$nama_pabrik = $this->input->post('nama_pabrik');
		$tgl_pauliu = $this->input->post('tgl_pauliu');
		$tgl_inter = $this->input->post('tgl_inter');
			$data = array(
				'mtgl_terbang' => $mtgl_terbang,
				'tgl' => $tgl,
				'nama' => $nama,
				'agen' => $agen,
				'grup' => $grup,
				'ket' => $ket,
				'tgl_to_agen' => $tgl_to_agen,
				'nama_agen' => $nama_agen,
				'grup_to_agen' => $grup_to_agen,
				'nama_pabrik' => $nama_pabrik,
				'tgl_pauliu' => $tgl_pauliu,
				'tgl_inter' => $tgl_inter,
				);
			$this->db->where('id_marka', $id);
			$this->db->update('marka', $data);
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
	
	function delete_data($kode) { 
			$this->db->where('id_marka', $kode);
			$this->db->delete('marka');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

}
?>