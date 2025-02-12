<?php
class M_blk_inventaris extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//============================================== INVENTARIS ======================================================//

	
	function tampil_data_inventaris(){
		$sql = "SELECT *,a.id_inventaris as idnyainventaris,(jumlah-jumlahkeluar) as sisanya FROM blk_inventaris a LEFT JOIN blk_inventaris_barang b ON  a.id_barang=b.id_barang  order by sisa DESC ";
                $query = $this->db->query($sql);

            return $query->result();
    }
     
    function simpan_data_blk_inventaris(){
        
        $tglmasuk = $this->input->post('tglmasuk');
        $id_barang = $this->input->post('id_barang');
        $tglkeluar = $this->input->post('tglkeluar');
        $jumlah = $this->input->post('jumlah');
        $jumlahkeluar = $this->input->post('jumlahkeluar');
        $pemohon = $this->input->post('pemohon');
        $data = array (
            'tglmasuk' => $tglmasuk,
            'id_barang' => $id_barang,
            'tglkeluar' => $tglkeluar,
            'jumlah' => $jumlah,
            'jumlahkeluar' => $jumlahkeluar,
            'pemohon' => $pemohon
        );

        $this->db->insert('blk_inventaris',$data);
    }

 function ubah_data_blk_inventaris(){
    
    $idinventaris = $this->input->post('idnyainventaris');
    
    $tglmasuk = $this->input->post('tglmasuk');
    $id_barang = $this->input->post('id_barang');
    $tglkeluar = $this->input->post('tglkeluar');
    $jumlah = $this->input->post('jumlah');
    $jumlahkeluar = $this->input->post('jumlahkeluar');
    $pemohon = $this->input->post('pemohon');
    $data = array (
        'tglmasuk' => $tglmasuk,
        'id_barang' => $id_barang,
        'tglkeluar' => $tglkeluar,
        'jumlah' => $jumlah,
        'jumlahkeluar' => $jumlahkeluar,
        'pemohon' => $pemohon
    );
		
        $this->db->where('id_inventaris', $idinventaris);
        $this->db->update('blk_inventaris',$data);
    }

    function hapus_data_inventaris_blk() {

        $idinventaris = $this->input->post('idnyainventaris');
        $this->db->where('id_inventaris', $idinventaris);
        $this->db->delete('blk_inventaris');
    }
    
	function tampil_data_pilihan_barang(){
		$sql = "SELECT * FROM blk_inventaris_barang ";
               $query = $this->db->query($sql);

            return $query->result();
	}
/*================================================================== barang ================================================================*/

	function tampil_data_barang(){
		$sql = "SELECT *,blk_inventaris_barang.id_inventaris as idnyabarang FROM blk_inventaris_barang order by id_barang DESC ";
                $query = $this->db->query($sql);

            return $query->result();
    }
     
    function simpan_data_barang(){
        
        $nama = $this->input->post('nama');
        $data = array (
            'nama' => $nama,
        );

        $this->db->insert('blk_inventaris_barang',$data);
    }

    function ubah_data_barang(){
        
        $idinventaris = $this->input->post('idnyabarang');
        
        $nama = $this->input->post('nama');
        $data = array (
            'nama' => $nama
        );
            
            $this->db->where('id_barang', $idinventaris);
            $this->db->update('blk_inventaris_barang',$data);
        }

    function hapus_data_barang() {

        $idinventaris = $this->input->post('idnyabarang');
        $this->db->where('id_barang', $idinventaris);
        $this->db->delete('blk_inventaris_barang');
    }

}
?>