<?php
class M_surat_kuasa extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_kuasa 
				INNER JOIN personal 
				ON surat_kuasa.id_tki = personal.id_personal";
                $query = $this->db->query($sql);
 
 
            return $query->result();
	} 
 
 function tampil_data_tki(){
		$sql = "SELECT * FROM personal ";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function simpan_data_surat(){
		
		$id_tki = $this->input->post('id_tki');
		$noid = $this->input->post('noid');
		$nopass = $this->input->post('nopass');

		$data = array (
			'id_tki' => $id_tki,
			'noid' => $noid,
			'nopass' => $nopass,
			);

		$this->db->insert('surat_kuasa',$data);
	}

 function edit_surat(){
		
		$id_kuasa = $this->input->post('id_kuasa');
		$id_tki = $this->input->post('id_tki');
		$noid = $this->input->post('noid');
		$nopass = $this->input->post('nopass');

		$data = array (
			'id_tki' => $id_tki,
			'noid' => $noid,
			'nopass' => $nopass,
			);

		
		$this->db->where('id_kuasa', $id_kuasa);
		$this->db->update('surat_kuasa',$data);
	}

	function hapus_data_surat() {
		$id_kuasa = $this->input->post('id_kuasa');
		$this->db->where('id_kuasa', $id_kuasa);
		$this->db->delete('surat_kuasa');
	}

}
?>