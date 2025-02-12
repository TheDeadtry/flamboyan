<?php
class m_hotel extends CI_Model{
    function __construct(){
        parent::__construct();
    }


 function simpan_data_dokdibawa($kode,$nama){

		$data = array (
			'kodehotel'=>$kode, 
			'namahotel'=>$nama, 
			);

		$this->db->insert('setting_hotellist',$data);
	}

	function tampil_data_dokdibawa(){
		$sql = "SELECT * FROM setting_hotellist";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_dokdibawa() {
		$id = $this->input->post('id_kategori');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$data = array(
			'kodehotel'=>$kode, 
			'namahotel'=>$nama, 
			);
		$this->db->where('id_setting_hotellist', $id);
		$this->db->update('setting_hotellist', $data);
	}

	function hapus_data_dokdibawa($id) {
		$this->db->where('id_setting_hotellist', $id);
		$this->db->delete('setting_hotellist');
	}

	function ambil_id($id) {
		return $this->db->get_where('setting_hotellist', array('id_setting_hotellist' => $id))->row();
	}
 
}
?>