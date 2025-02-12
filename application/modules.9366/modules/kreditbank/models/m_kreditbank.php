<?php
class M_kreditbank extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	 function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 	function simpan_data_kreditbank($namasektor,$nama_kredit,$jumlahkredit,$nilaikredit){

		$data = array (
			'kode_sektor'=>$namasektor, 
			'namakredit'=>$nama_kredit,
			'isikredit'=>$jumlahkredit,
			'nilaikredit'=>$nilaikredit,
			);

		$this->db->insert('datakreditbank',$data);
	}

	function tampil_data_kreditbank(){
		$sql = "SELECT * FROM datakreditbank";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 	
 	function update_data_kreditbank($id) {
		$nmsk	= $this->input->post('namasektor');
		$nmkr = $this->input->post('nama_kredit');
		$jmkr = $this->input->post('jumlahkredit');
		$nlkr = $this->input->post('nilaikredit');
		$data = array(
			'kode_sektor' => $nmsk, 
			'namakredit' => $nmkr,
			'isikredit' => $jmkr,
			'nilaikredit' => $nlkr,
			);
		$this->db->where('id_kreditbank', $id);
		$this->db->update('datakreditbank', $data);
	}

	function hapus_data_kreditbank($id) {
		$this->db->where('id_kreditbank', $id);
		$this->db->delete('datakreditbank');
	}

	function ambil_id($id) {
		return $this->db->get_where('datakreditbank', array('id_kreditbank' => $id))->row();
	}
}
?>