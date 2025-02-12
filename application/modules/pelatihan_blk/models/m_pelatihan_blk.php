<?php
class M_pelatihan_blk extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//============================================== DATA LAPORAN BULANAN ======================================================//

	
	function tampil_data_laporan(){
		$sql = "SELECT *,blk_laporan_bulanan.id_laporan_blk as idnyabuat FROM blk_laporan_bulanan ";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 /* function tampil_data_personalcari($id){
        $sql = "SELECT *,pembuatan_tabeldis.id_pembuatan as idnyabuat FROM pembuatan_tabeldis JOIN detail_tabeldis ON pembuatan_tabeldis.id_pembuatan = detail_tabeldis.id_tabeldis where detail_tabeldis.id_biodata='$id'
                ";
                $query = $this->db->query($sql);

            return $query->result();
    } */ 
	
        function tampil_data_detail($id_laporan){
        $sql = "SELECT * FROM blk_detail_laporan 
				LEFT JOIN personalblk
				ON personalblk.nodaftar = blk_detail_laporan.nodaftar
				where blk_detail_laporan.id_laporan = '$id_laporan'";
                $query = $this->db->query($sql);

            return $query->result();
    } 

 function simpan_data_laporan_pelatihan_blk(){
        
        $tanggal = $this->input->post('tanggal');
        $jml = $this->input->post('jml');
        $data = array (
            'tanggal' => $tanggal,
            'jml' => $jml,
            );

        $this->db->insert('blk_laporan_bulanan',$data);
    }

 function update_data_laporan_pelatihan_blk(){
        
        $id_laporan_blk = $this->input->post('id_laporan_blk');
		$tanggal = $this->input->post('tanggal');
        $jml = $this->input->post('jml');
        
        $data = array (
            'tanggal' => $tanggal,
            'jml' => $jml,
            );
		
        $this->db->where('id_laporan_blk', $id_laporan_blk);
        $this->db->update('blk_laporan_bulanan',$data);
    }

    function hapus_data_laporan_pelatihan_blk() {
        $id_laporan_blk = $this->input->post('id_laporan_blk');
        $this->db->where('id_laporan_blk', $id_laporan_blk);
        $this->db->delete('blk_laporan_bulanan');
    }

//========================================================= Data CTKI ========================================================//

	
	function tampil_data_all(){
        $sql = "SELECT * FROM personalblk order by nama ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

	function tampil_data_pemilik(){
        $sql = "SELECT * FROM blk_pemilik";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
    function tampil_data_lsp(){
        $sql = "SELECT * FROM blk_lembaga_lsp";
        $query = $this->db->query($sql);
        return $query->result();
    } 

    function simpan_data_ctki(){

        $id_laporan_blk=$this->input->post('id_laporan_blk');
        $id1=$this->input->post('id1');
        
            $idsimpan=$id1;

        $data = array (
            'id_laporan'=>$id_laporan_blk,
            'nodaftar'=> $id1,
            );
        $this->db->insert('blk_detail_laporan',$data);
    }
	
    function update_ctki() {
    $id_laporan_blk=$this->input->post('id_laporan_blk');
    $id1=$this->input->post('id1');

        $data = array (
            'nodaftar'=> $id1,
            );       
             $this->db->where('id_laporan_blk', $id_laporan_blk);
        $this->db->update('blk_detail_laporan', $data);
    }
	
    function hapus_ctki() {
        $id = $this->input->post('id_laporan_blk');
        $this->db->where('id_laporan_blk', $id);
        $this->db->delete('blk_detail_laporan');
    }
	

//---------------------------------------operasi penyimpanan pembayaran biaya ujk------------------///

    function tampil_data_bayarujk($id_laporan_blk){
        $sql = "SELECT * FROM blk_bayar_ujk LEFT JOIN blk_lembaga_lsp
				ON blk_bayar_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp 
				WHERE blk_bayar_ujk.id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function simpan_data_bayarujk($id_laporan_blk){

        $noresi=$this->input->post('noresi');
        $tglsurat=$this->input->post('tglsurat');
        $lembagalsp=$this->input->post('lembagalsp');
        $biaya=$this->input->post('biaya');
        $data = array (
            'noresi'=>$noresi,
            'tglsurat'=> $tglsurat,
            'lembagalsp'=> $lembagalsp,
            'biaya'=> $biaya,
            'id_laporan_bulanan'=> $id_laporan_blk,
            );
        $this->db->insert('blk_bayar_ujk',$data);
    }

	function hitung_data_bayarujk($id_laporan_blk){
		$sql = "SELECT count(*) as total 
				FROM blk_bayar_ujk 
				WHERE id_laporan_bulanan='".$id_laporan_blk."'";
				$query = $this->db->query($sql)->row_array();
		  return $query['total'];
	}

    function ubah_detailbayarujk($id_laporan_blk) {
		$noresi=$this->input->post('noresi');
        $tglsurat=$this->input->post('tglsurat');
        $lembagalsp=$this->input->post('lembagalsp');
        $biaya=$this->input->post('biaya');
        $data = array (
            'noresi'=>$noresi,
            'tglsurat'=> $tglsurat,
            'lembagalsp'=> $lembagalsp,
            'biaya'=> $biaya,
            );

        $this->db->where('id_laporan_bulanan', $id_laporan_blk);
        $this->db->update('blk_bayar_ujk', $data);
    }

//---------------------------------------operasi penyimpanan invoice biaya ujk------------------///

    function tampil_data_invoiceujk($id_laporan_blk){
        $sql = "SELECT * FROM blk_invoice_ujk LEFT JOIN blk_pemilik
				ON blk_invoice_ujk.blk_pemilik=blk_pemilik.id_pemilik 
				WHERE blk_invoice_ujk.id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function simpan_data_invoiceujk($id_laporan_blk){

        $noinvoice_ujk	= $this->input->post('noinvoice_ujk');
        $tglsurat		= $this->input->post('tglsurat');
        $blk_pemilik	= $this->input->post('blk_pemilik');
        $biaya			= $this->input->post('biaya');
        $data = array (
            'noinvoice_ujk'	=> $noinvoice_ujk,
            'tglsurat'		=> $tglsurat,
            'blk_pemilik'	=> $blk_pemilik,
            'biaya'			=> $biaya,
            'id_laporan_bulanan'=> $id_laporan_blk,
            );
        $this->db->insert('blk_invoice_ujk',$data);
    }

    function hitung_data_invoiceujk($id_laporan_blk){
        $sql = "SELECT count(*) as total 
				FROM blk_invoice_ujk 
				WHERE id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql)->row_array();
          return $query['total'];
    }

    function ubah_detailinvoiceujk($id_laporan_blk) {
		$noinvoice_ujk	= $this->input->post('noinvoice_ujk');
        $tglsurat		= $this->input->post('tglsurat');
        $blk_pemilik	= $this->input->post('blk_pemilik');
        $biaya			= $this->input->post('biaya');
        $data = array (
            'noinvoice_ujk'	=> $noinvoice_ujk,
            'tglsurat'		=> $tglsurat,
            'blk_pemilik'	=> $blk_pemilik,
            'biaya'			=> $biaya,
            );

        $this->db->where('id_laporan_bulanan', $id_laporan_blk);
        $this->db->update('blk_invoice_ujk', $data);
    }

//---------------------------------------operasi penyimpanan invoice refund TUK ------------------///

    function tampil_data_invoice_reftuk($id_laporan_blk){
        $sql = "SELECT * FROM blk_invoice_reftuk LEFT JOIN blk_lembaga_lsp
				ON blk_invoice_reftuk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp 
				WHERE blk_invoice_reftuk.id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function simpan_data_invoice_reftuk($id_laporan_blk){

        $noinvoice_reftuk	= $this->input->post('noinvoice_reftuk');
        $tglsurat			= $this->input->post('tglsurat');
        $lembagalsp			= $this->input->post('lembagalsp');
        $biaya				= $this->input->post('biaya');
        $data = array (
            'noinvoice_reftuk'	=> $noinvoice_reftuk,
            'tglsurat'		=> $tglsurat,
            'lembagalsp'	=> $lembagalsp,
            'biaya'			=> $biaya,
            'id_laporan_bulanan'=> $id_laporan_blk,
            );
        $this->db->insert('blk_invoice_reftuk',$data);
    }

    function hitung_data_invoice_reftuk($id_laporan_blk){
        $sql = "SELECT count(*) as total 
				FROM blk_invoice_reftuk 
				WHERE id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql)->row_array();
          return $query['total'];
    }

    function ubah_detailinvoice_reftuk($id_laporan_blk) {
		$noinvoice_reftuk	= $this->input->post('noinvoice_reftuk');
        $tglsurat			= $this->input->post('tglsurat');
        $lembagalsp			= $this->input->post('lembagalsp');
        $biaya				= $this->input->post('biaya');
        $data = array (
            'noinvoice_reftuk'	=> $noinvoice_reftuk,
            'tglsurat'		=> $tglsurat,
            'lembagalsp'	=> $lembagalsp,
            'biaya'			=> $biaya,
            );

        $this->db->where('id_laporan_bulanan', $id_laporan_blk);
        $this->db->update('blk_invoice_reftuk', $data);
    }
	
//---------------------------------------operasi penyimpanan invoice biaya pelatihan ------------------///

    function tampil_data_invoice_pelatihan($id_laporan_blk){
        $sql = "SELECT * FROM blk_invoice_pelatihan LEFT JOIN blk_pemilik
				ON blk_invoice_pelatihan.blk_pemilik=blk_pemilik.id_pemilik 
				WHERE blk_invoice_pelatihan.id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql);

            return $query->result();
    }

    function simpan_data_invoice_pelatihan($id_laporan_blk){

        $noinvoice_pelatihan	= $this->input->post('noinvoice_pelatihan');
        $tglsurat			= $this->input->post('tglsurat');
        $blk_pemilik		= $this->input->post('blk_pemilik');
        $biaya				= $this->input->post('biaya');
        $data = array (
            'noinvoice_pelatihan'	=> $noinvoice_pelatihan,
            'tglsurat'		=> $tglsurat,
            'blk_pemilik'	=> $blk_pemilik,
            'biaya'			=> $biaya,
            'id_laporan_bulanan'=> $id_laporan_blk,
            );
        $this->db->insert('blk_invoice_pelatihan',$data);
    }

    function hitung_data_invoice_pelatihan($id_laporan_blk){
        $sql = "SELECT count(*) as total 
				FROM blk_invoice_pelatihan 
				WHERE id_laporan_bulanan='".$id_laporan_blk."'";
                $query = $this->db->query($sql)->row_array();
          return $query['total'];
    }

    function ubah_detailinvoice_pelatihan($id_laporan_blk) {
		$noinvoice_pelatihan	= $this->input->post('noinvoice_pelatihan');
        $tglsurat			= $this->input->post('tglsurat');
        $blk_pemilik		= $this->input->post('blk_pemilik');
        $biaya				= $this->input->post('biaya');
        $data = array (
            'noinvoice_pelatihan'	=> $noinvoice_pelatihan,
            'tglsurat'		=> $tglsurat,
            'blk_pemilik'	=> $blk_pemilik,
            'biaya'			=> $biaya,
            );

        $this->db->where('id_laporan_bulanan', $id_laporan_blk);
        $this->db->update('blk_invoice_pelatihan', $data);
    }
	
//=============================================================================================
	
     function tampil_data_ff(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'ff%' order by id_biodata ASC";
                $query = $this->db->query($sql);
            return $query->result();
    }

     function tampil_data_fi(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'fi%' order by id_biodata ASC";
                $query = $this->db->query($sql);

            return $query->result();
    }

     function tampil_data_mf(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mf%' order by id_biodata ASC" ;
                $query = $this->db->query($sql);

            return $query->result();
    }
     function tampil_data_mi(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mi%' order by id_biodata ASC";
                $query = $this->db->query($sql);

            return $query->result();
    }

     function tampil_data_jp(){
        $sql = "SELECT * FROM personal WHERE id_biodata LIKE 'jp%' order by id_biodata ASC";
                $query = $this->db->query($sql);

            return $query->result();
    }

//==============================================================================================
}

?>