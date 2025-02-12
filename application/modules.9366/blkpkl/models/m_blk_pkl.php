<?php
class M_blk_pkl extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	function tampil_data_personal($idnya){
		$sql = "SELECT *,TIMESTAMPDIFF( YEAR, tgllahir, CURDATE( ) ) AS umur FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function hitung_data_blkpkl($idnya){
		$sql = "SELECT * from blk_pkl WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->num_rows();
	}
	function tampil_blkpkl($idnya){
				$sql = "SELECT *from blk_pkl WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);
			
            return $query->result();
			
		}
	function tambahpkl($id,$tempat,$mulai_tgl,$selesai_tgl,$jml_hari,$penilaian,$total_hari,$ket) {
			$data = array(
			'id_blk_pkl' => ' ',
			'id_biodata' => $id,
			'tempat' => $tempat,
			'mulai_tgl' 	 => $mulai_tgl,
			'selesai_tgl' 	 => $selesai_tgl,
			'jml_hari' 	 => $jml_hari,
			'penilaian'  => $penilaian,
			'total_hari'  => $total_hari,
			'ket'  => $ket,
			);
		$this->db->insert('blk_pkl', $data);
	}
	
	function get_data_pkl($kode) { 
			$this->db->where('id_blk_pkl', $kode);
			$query = $this->db->get('blk_pkl');
			if($query->num_rows() > 0) {
				return $query->row();
			} else {
				return null;
			}
	}
	
	function delete_data($kode) { 
			$this->db->where('id_blk_pkl', $kode);
			$this->db->delete('blk_pkl');
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	function getById($id) {
			return $this->db->get_where('blk_pkl', array('id_blk_pkl' => $id))->row();
		}
		
	function updateblkpkl($id){
		$tempat = $this->input->post('tempat');
		$mulai_tgl = $this->input->post('mulai_tgl');
		$selesai_tgl = $this->input->post('selesai_tgl');
		$jml_hari = $this->input->post('jml_hari');
		$penilaian = $this->input->post('penilaian');
		$total_hari = $this->input->post('total_hari');
		$ket = $this->input->post('ket');
		
			$data = array(
				'tempat' => $tempat,
				'mulai_tgl' => $mulai_tgl,
				'selesai_tgl' => $selesai_tgl,
				'jml_hari' => $jml_hari,
				'penilaian' => $penilaian,
				'total_hari' => $total_hari,
				'ket' => $ket,
				);
			$this->db->where('id_blk_pkl', $id);
			$this->db->update('blk_pkl', $data);
	}

}
?>