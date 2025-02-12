<?php
class m_surat_pengajuan_keuangan extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function select($grohk) {
        return $this->db->query($grohk)->result();
    }

    function select_row($grohk) {
        return $this->db->query($grohk)->row();
    }

    function simpan_pengajuan() {
    	$pptkis 	= $this->input->post('pptkis');
    	$lembaga 	= $this->input->post('lembaga');
    	$no_surat 	= $this->input->post('no_surat');
    	$tanggal 	= $this->input->post('tanggal');

    	$data = array (
    		'pptkis' => $pptkis,
    		'lembaga' => $lembaga,
    		'no_surat' => $no_surat,
    		'tanggal' => $tanggal
    	);

    	$this->db->insert('surat_pengajuan', $data);
    }

    function ubah_pengajuan() {
        $id         = $this->input->post('id_pengajuan');
        $no_surat   = $this->input->post('no_surat');
        $tanggal    = $this->input->post('tanggal');

        $data = array (
            'no_surat' => $no_surat,
            'tanggal' => $tanggal
        );

        $this->db->where('id_surat_aju', $id);
        $this->db->update('surat_pengajuan', $data);
    }

    function hapus_pengajuan() {
        $id         = $this->input->post('id_pengajuan');

        $this->db->where('id_surat_aju', $id);
        $this->db->delete('surat_pengajuan');
    }

    function simpan_dctki($data) {
    	$this->db->insert_batch('surat_pengajuan_data', $data); 
    }

    function ubah_dctki() {
        $id         = $this->input->post('id_dctki');
        $dctki      = $this->input->post('dctki');
        $pinjam     = $this->input->post('pinjam');
        $loan       = $this->input->post('loan');

        $data = array (
            'id_biodata'        => $dctki,
            'jumlah_pinjaman'   => $pinjam,
            'loan'              => $loan,
        );


        $this->db->where('id_surat_pengajuan_data', $id);
        $this->db->update('surat_pengajuan_data', $data);
    }

    function hapus_dctki() {
        $id         = $this->input->post('id_dctki');

        $this->db->where('id_surat_pengajuan_data', $id);
        $this->db->delete('surat_pengajuan_data');
    }
}

?>