<?php
class M_surat_ijin_keluarga_banyuwangi extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM surat_ijin_keluarga_banyuwangi 
				INNER JOIN personal 
				ON surat_ijin_keluarga_banyuwangi.id_tki = personal.id_personal
				INNER JOIN family 
				ON surat_ijin_keluarga_banyuwangi.id_keluarga = family.id_family";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function tampil_data_tki(){
		$sql = "SELECT * FROM personal";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function tampil_data_keluarga(){
		$sql = "SELECT * FROM family";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function simpan_data_surat(){
		
		
		$id_keluarga               = $this->input->post('id_keluarga');
		$noktp                 	   = $this->input->post('noktp');
		$tmp                 	   = $this->input->post('tmp');
		$tgl                	   = $this->input->post('tgl');
		$alamat2                   = $this->input->post('alamat2');
		$mengijinkan               = $this->input->post('mengijinkan');
		$id_tki               	   = $this->input->post('id_tki');
		$nopass               	   = $this->input->post('nopass');
		$tujuan                	   = $this->input->post('tujuan');
		$sebagai                   = $this->input->post('sebagai');
		$data = array (
			'id_keluarga'			=>$id_keluarga, 
			'noktp'					=>$noktp, 
			'tmp'					=>$tmp,
			'tgl'					=>$tgl,
			'alamat2'				=>$alamat2, 
			'mengijinkan'			=>$mengijinkan,
			'id_tki'				=>$id_tki,
			'nopass'				=>$nopass,
			'tujuan'				=>$tujuan, 
			'sebagai'				=>$sebagai, 
			
			);

		$this->db->insert('surat_ijin_keluarga_banyuwangi',$data);
	}
	
	function edit_data_surat(){
		
		$id_surat          = $this->input->post('id_surat');
		$id_keluarga               = $this->input->post('id_keluarga');
		$noktp                 	   = $this->input->post('noktp');
		$tmp                 	   = $this->input->post('tmp');
		$tgl                	   = $this->input->post('tgl');
		$alamat2                   = $this->input->post('alamat2');
		$mengijinkan               = $this->input->post('mengijinkan');
		$id_tki               	   = $this->input->post('id_tki');
		$nopass               	   = $this->input->post('nopass');
		$tujuan                	   = $this->input->post('tujuan');
		$sebagai                   = $this->input->post('sebagai');
		$data = array (
			'id_keluarga'			=>$id_keluarga, 
			'noktp'					=>$noktp, 
			'tmp'					=>$tmp,
			'tgl'					=>$tgl,
			'alamat2'				=>$alamat2, 
			'mengijinkan'			=>$mengijinkan,
			'id_tki'				=>$id_tki,
			'nopass'				=>$nopass,
			'tujuan'				=>$tujuan, 
			'sebagai'				=>$sebagai, 
			);
		
		$this->db->where('id_surat', $id_surat);
		$this->db->update('surat_ijin_keluarga_banyuwangi',$data);
	}
	
	
	function hapus_data_surat() {
		$id_surat = $this->input->post('id_surat');
		$this->db->where('id_surat', $id_surat);
		$this->db->delete('surat_ijin_keluarga_banyuwangi');
	}

}
?>