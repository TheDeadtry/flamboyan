<?php
class M_surat_ijin_keluarga extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_ijin_keluarga 
				INNER JOIN personal 
				ON surat_ijin_keluarga.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga.id_keluarga = family.id_family;";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
 function tampil_data_ahli(){
		$sql = "SELECT * FROM family ";
                $query = $this->db->query($sql);

            return $query->result();
	}

 function simpan_data_surat(){
		
		$id_tki = $this->input->post('id_tki');
		$pekerjaan2 = $this->input->post('pekerjaan2');
		$desa2 = $this->input->post('desa2');
		$kel2 = $this->input->post('kel2');
		$kab2 = $this->input->post('kab2');
		$rt2 = $this->input->post('rt2');
		$kec2 = $this->input->post('kec2');
		$id_keluarga = $this->input->post('id_keluarga');
		$tempat4 = $this->input->post('tempat4');
		$tanggal4 = $this->input->post('tanggal4');
		$alamat4 = $this->input->post('alamat4');
		$pekerjaan1 = $this->input->post('pekerjaan1');
		$desa1 = $this->input->post('desa1');
		$kel1 = $this->input->post('kel1');
		$kab1 = $this->input->post('kab1');
		$rt1 = $this->input->post('rt1');
		$kec1 = $this->input->post('kec1');
		$hubungan4 = $this->input->post('hubungan4');
		$tujuan4 = $this->input->post('tujuan4');

		$data = array (
			'id_tki' => $id_tki,
			'pekerjaan2' => $pekerjaan2,
			'desa2' => $desa2,
			'kel2' => $kel2,
			'kab2' => $kab2,
			'rt2' => $rt2,
			'kec2' => $kec2,
			'id_keluarga' => $id_keluarga,
			'tempat4' => $tempat4,
			'tanggal4' => $tanggal4,
			'alamat4' => $alamat4,
			'pekerjaan1' => $pekerjaan1,
			'desa1' => $desa1,
			'kel1' => $kel1,
			'kab1' => $kab1,
			'rt1' => $rt1,
			'kec1' => $kec1,
			'hubungan4' => $hubungan4,
			'tujuan4' => $tujuan4,
			);

		$this->db->insert('surat_ijin_keluarga',$data);
	}

 function edit_surat(){
		
		$id_ijinku = $this->input->post('id_ijinku');
		$id_tki = $this->input->post('id_tki');
		$pekerjaan2 = $this->input->post('pekerjaan2');
		$desa2 = $this->input->post('desa2');
		$kel2 = $this->input->post('kel2');
		$kab2 = $this->input->post('kab2');
		$rt2 = $this->input->post('rt2');
		$kec2 = $this->input->post('kec2');
		$id_keluarga = $this->input->post('id_keluarga');
		$tempat4 = $this->input->post('tempat4');
		$tanggal4 = $this->input->post('tanggal4');
		$alamat4 = $this->input->post('alamat4');
		$pekerjaan1 = $this->input->post('pekerjaan1');
		$desa1 = $this->input->post('desa1');
		$kel1 = $this->input->post('kel1');
		$kab1 = $this->input->post('kab1');
		$rt1 = $this->input->post('rt1');
		$kec1 = $this->input->post('kec1');
		$hubungan4 = $this->input->post('hubungan4');
		$tujuan4 = $this->input->post('tujuan4');

		$data = array (
			'id_tki' => $id_tki,
			'pekerjaan2' => $pekerjaan2,
			'desa2' => $desa2,
			'kel2' => $kel2,
			'kab2' => $kab2,
			'rt2' => $rt2,
			'kec2' => $kec2,
			'id_keluarga' => $id_keluarga,
			'tempat4' => $tempat4,
			'tanggal4' => $tanggal4,
			'alamat4' => $alamat4,
			'pekerjaan1' => $pekerjaan1,
			'desa1' => $desa1,
			'kel1' => $kel1,
			'kab1' => $kab1,
			'rt1' => $rt1,
			'kec1' => $kec1,
			'hubungan4' => $hubungan4,
			'tujuan4' => $tujuan4,
			);

		$this->db->where('id_ijinku', $id_ijinku);
		$this->db->update('surat_ijin_keluarga',$data);
	}

	function hapus_data_surat() {
		$id_ijinku = $this->input->post('id_ijinku');
		$this->db->where('id_ijinku', $id_ijinku);
		$this->db->delete('surat_ijin_keluarga');
	}

}
?>