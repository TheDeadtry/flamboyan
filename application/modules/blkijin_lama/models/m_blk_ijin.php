<?php
class M_blk_ijin extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function hitung_data_blkijin($idnya){
		$sql = "SELECT * from blk_ijin WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->num_rows();
	}
	function hitung_data_blkijin_b($idnya){
		$sql = "SELECT * from blk_plg WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->num_rows();
	}
	function hitung_data_blkijin_c($idnya){
		$sql = "SELECT * from blk_inap WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->num_rows();
	}
	
	function tampil_blkijin($idnya){
				$sql = "SELECT *from blk_ijin WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
	function tampil_blkijin_b($idnya){
				$sql = "SELECT *from blk_plg WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
	function tampil_blkijin_c($idnya){
				$sql = "SELECT *from blk_inap WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
	function tambahdata($id,$tgl_suntik_kb,$masa_kb,$berakhir_kb,$ket_kb) {
			$data = array(
			'id_blk_ijin' => ' ',
			'id_biodata' => $id,
			'tgl_suntik_kb' => $tgl_suntik_kb,
			'masa_kb' 	 => $masa_kb,
			'berakhir_kb' 	 => $berakhir_kb,
			'ket_kb' 	 => $ket_kb,
			);
		$this->db->insert('blk_ijin', $data);
	}
	
	function tambahdata_b($id,$mulai_plg,$kembali_plg,$terlambat_plg,$hari_plg,$ket_plg) {
			$data = array(
			'id_blk_plg' => ' ',
			'id_biodata' => $id,
			'mulai_plg'  => $mulai_plg,
			'kembali_plg'  => $kembali_plg,
			'terlambat_plg'  => $terlambat_plg,
			'hari_plg'  => $hari_plg,
			
			'ket_plg'  => $ket_plg,
			);
		$this->db->insert('blk_plg', $data);
	}
	
	function tambahdata_c($id,$mulai_inap,$kembali_inap,$terlambat_inap,$hari_inap,$ket_inap) {
			$data = array(
			'id_blk_inap' => ' ',
			'id_biodata' => $id,
			'mulai_inap'  => $mulai_inap,
			'kembali_inap'  => $kembali_inap,
			'terlambat_inap'  => $terlambat_inap,
			'hari_inap'  => $hari_inap,
			
			'ket_inap'  => $ket_inap,
			);
		$this->db->insert('blk_inap', $data);
	}
	
	function get_data_blkijin($kode) { 
			$this->db->where('id_blk_ijin', $kode);
			$query = $this->db->get('blk_ijin');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	function get_data_blkijin_b($kode) { 
			$this->db->where('id_blk_plg', $kode);
			$query = $this->db->get('blk_plg');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	function get_data_blkijin_c($kode) { 
			$this->db->where('id_blk_inap', $kode);
			$query = $this->db->get('blk_inap');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	function delete_data($kode) { 
			$this->db->where('id_blk_ijin', $kode);
			$this->db->delete('blk_ijin');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
		
	
	function delete_data_b($kode) { 
			$this->db->where('id_blk_plg', $kode);
			$this->db->delete('blk_plg');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	
	function delete_data_c($kode) { 
			$this->db->where('id_blk_inap', $kode);
			$this->db->delete('blk_inap');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
		
	
	function getById($id) {
			return $this->db->get_where('blk_ijin', array('id_blk_ijin' => $id))->row();
		}
	function getById_b($id) {
			return $this->db->get_where('blk_plg', array('id_blk_plg' => $id))->row();
		}
	function getById_C($id) {
			return $this->db->get_where('blk_inap', array('id_blk_inap' => $id))->row();
		}		
		
	function updateblkijin($id){
			$tgl_suntik_kb = $this->input->post('tgl_suntik_kb');
			$masa_kb = $this->input->post('masa_kb');
			$berakhir_kb = $this->input->post('berakhir_kb');
			$ket_kb = $this->input->post('ket_kb');
			
			
		
			$data = array(
			'tgl_suntik_kb' => $tgl_suntik_kb,
			'masa_kb' 	 => $masa_kb,
			'berakhir_kb' 	 => $berakhir_kb,
			'ket_kb' 	 => $ket_kb,
				);
			$this->db->where('id_blk_ijin', $id);
			$this->db->update('blk_ijin', $data);
	}
	
	function updateblkijin_b($id){
			
			$mulai_plg = $this->input->post('mulai_plg');
			$kembali_plg = $this->input->post('kembali_plg');
			$terlambat_plg = $this->input->post('terlambat_plg');
			$hari_plg = $this->input->post('hari_plg');
			
			$ket_plg = $this->input->post('ket_plg');
		
			$data = array(
				
			'mulai_plg'  => $mulai_plg,
			'kembali_plg'  => $kembali_plg,
			'terlambat_plg'  => $terlambat_plg,
			'hari_plg'  => $hari_plg,
			
			'ket_plg'  => $ket_plg,
			
				);
			$this->db->where('id_blk_plg', $id);
			$this->db->update('blk_plg', $data);
	}
	
	function updateblkijin_c($id){
			
			$mulai_inap = $this->input->post('mulai_inap');
			$kembali_inap = $this->input->post('kembali_inap');
			$terlambat_inap = $this->input->post('terlambat_inap');
			$hari_inap = $this->input->post('hari_inap');

			$ket_inap = $this->input->post('ket_inap');
		
			$data = array(
			'mulai_inap'  => $mulai_inap,
			'kembali_inap'  => $kembali_inap,
			'terlambat_inap'  => $terlambat_inap,
			'hari_inap'  => $hari_inap,
			'ket_inap'  => $ket_inap,
				);
			$this->db->where('id_blk_inap', $id);
			$this->db->update('blk_inap', $data);
	}

}
?>