<?php
class M_formulir_blk extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//============================================== DATA LAPORAN BULANAN ======================================================//

	
	function tampil_data_formulir(){
		$sql = "SELECT *,blk_formulir.id_formulir as idnyabuat FROM blk_formulir order by id_formulir DESC ";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 /* function tampil_data_personalcari($id){
        $sql = "SELECT *,pembuatan_tabeldis.id_pembuatan as idnyabuat FROM pembuatan_tabeldis JOIN detail_tabeldis ON pembuatan_tabeldis.id_pembuatan = detail_tabeldis.id_tabeldis where detail_tabeldis.id_biodata='$id'
                ";
                $query = $this->db->query($sql);

            return $query->result();
    } */ 
	
    function tampil_data_detail($id_formulir){
        $sql = "SELECT blk_detail_formulir.*, 
                    personalblk.* , 
                    blk_detail_formulir.id_detail_formulir as id_detail_formulir, 
                    personal.foto as person_fotonya, 
                    personalblk.nama as namazz,
                    disnaker.negara as negaradituju
				FROM blk_detail_formulir 
				LEFT JOIN personalblk
				ON personalblk.nodaftar = blk_detail_formulir.nodaftar
                LEFT JOIN personal
                ON personalblk.nodaftar = personal.id_biodata
                LEFT JOIN disnaker
                ON personalblk.nodaftar = disnaker.id_biodata
				where blk_detail_formulir.id_formulir = '$id_formulir'";
                $query = $this->db->query($sql);

            return $query->result();
    } 	

    function tampil_data_detailnya($id_formulir){
        $sql = "SELECT 
        personalblk.nodaftar as nodaftar,

        disnaker.nodisnaker as personal_nodisnaker,
        personal.nama as personal_nama,
        personal.tempatlahir as personal_tempatlahir,
        personal.tgllahir as personal_tanggallahir,
        personal.jeniskelamin as personal_jeniskelamin,
        disnaker.alamat as personal_alamat,
        personal.notelp as personal_notelp,
        personal.pendidikan as personal_pendidikan,
        disnaker.noktp as personal_noktp,

        personalblk.nodisnaker as blk_nodisnaker,
        personalblk.nama as blk_nama,
        personalblk.tempatlahir as blk_tempatlahir,
        personalblk.tanggallahir as blk_tanggallahir,
        personalblk.jeniskelamin as blk_jeniskelamin,
        personalblk.alamat as blk_alamat,
        personalblk.notelp as blk_notelp,
        personalblk.pendidikan as blk_pendidikan,
        personalblk.noktp as blk_noktp,

        blk_detail_formulir.noserlok as noserlok,
        personalblk.adm_tglreg as adm_tglreg,
        blk_formulir.tgl_keluar as tgl_keluar

        FROM blk_detail_formulir 
        LEFT JOIN personalblk
        ON blk_detail_formulir.nodaftar=personalblk.nodaftar
        LEFT JOIN blk_formulir
        ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
        LEFT JOIN personal
        ON personalblk.nodaftar=personal.id_biodata
        LEFT JOIN disnaker
        ON personalblk.nodaftar=disnaker.id_biodata
        WHERE blk_detail_formulir.id_formulir='$id_formulir'";
        $query = $this->db->query($sql);

        return $query->result();
    }   

        function ambil_data_detailnya($id_formulir){
        $sql = "SELECT 
        disnaker.nodisnaker as prs_nodisnaker,
        personal.nama as prs_nama,
        personal.tempatlahir as prs_tempatlahir,
        personal.tgllahir as prs_tanggallahir,
        disnaker.alamat as prs_alamat,
        personal.pendidikan as prs_pendidikan,
        paspor.nopaspor as prs_nopaspor,
        disnaker.negara as prs_negara,

        personalblk.nodisnaker as blk_nodisnaker,
        personalblk.nama as blk_nama,
        personalblk.tempatlahir as blk_tempatlahir,
        personalblk.tanggallahir as blk_tanggallahir,
        personalblk.alamat as blk_alamat,
        personalblk.pendidikan as blk_pendidikan,
        personalblk.nopaspor as blk_nopaspor,
        personalblk.negara as blk_negara,

        personalblk.bahasa as bahasa,
        personalblk.eksnon as eksnon,
        personalblk.adm_tglreg as adm_tglreg,
        blk_detail_formulir.ket as for_ket,
        blk_detail_formulir.noserlok as for_noserlok,
        blk_formulir.tgl_keluar as blk_tgl_keluar,
        personalblk.nodaftar as pinhou

        FROM blk_detail_formulir 
        LEFT JOIN personalblk
        ON blk_detail_formulir.nodaftar=personalblk.nodaftar
        LEFT JOIN blk_formulir
        ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
        LEFT JOIN personal
        ON personal.id_biodata=personalblk.nodaftar
        LEFT JOIN disnaker
        ON disnaker.id_biodata=personalblk.nodaftar
        LEFT JOIN paspor
        ON paspor.id_biodata=personalblk.nodaftar
        WHERE blk_detail_formulir.id_formulir='$id_formulir'";
        $query = $this->db->query($sql);

        return $query;
    }   

        function hitung_data_detailnya($id_formulir){
        $sql = "SELECT count(*) as total FROM blk_detail_formulir 
LEFT JOIN personalblk
ON blk_detail_formulir.nodaftar=personalblk.nodaftar
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN personal
ON personal.id_biodata=personalblk.nodaftar
WHERE blk_detail_formulir.id_formulir='$id_formulir'";
                $query = $this->db->query($sql)->row_array();
          return $query['total'];
    }

            function ambil_no_pengajuan($id_formulir){
        $sql = "SELECT * FROM blk_pengajuan_ujk WHERE id_formulirnya='$id_formulir'";
                $query = $this->db->query($sql)->row_array();
          return $query['no_pengajuan'];
    }

    function simpan_data_formulir_blk(){
        
        $ambil_data_sebelumnya = $this->M_session->select_row("SELECT * FROM blk_formulir where tipe='".$this->input->post('tipe')."' order by resi_no DESC limit 1,1");
        
        $tgl_pengajuan = $this->input->post('tgl_pengajuan');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $tgl_ujk = $this->input->post('tgl_ujk');
        $nama_blk = $this->input->post('nama_blk');
        $tmp_uji = $this->input->post('tmp_$tmp_uji');
        $tipe = $this->input->post('tipe');
        $resi_no = $ambil_data_sebelumnya->resi_no+1;
        $data = array (
            'tgl_pengajuan' => $tgl_pengajuan,
            'tgl_keluar' => $tgl_keluar,
            'tgl_ujk' => $tgl_ujk,
            'nama_blk' => $nama_blk,
            'tmp_uji' => $tmp_uji,
            'tipe' => $tipe,
            'resi_no' => $resi_no
        );

        $this->db->insert('blk_formulir',$data);
    }

 function update_data_formulir_blk(){
        
        $id_formulir = $this->input->post('id_formulir');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $tgl_ujk = $this->input->post('tgl_ujk');
        $nama_blk = $this->input->post('nama_blk');
        $tmp_uji = $this->input->post('tmp_uji');
        $data = array (
            'tgl_pengajuan' => $tgl_pengajuan,
            'tgl_keluar' => $tgl_keluar,
            'nama_blk' => $nama_blk,
            'tmp_uji' => $tmp_uji,
            'tgl_ujk' => $tgl_ujk
        );
		
        $this->db->where('id_formulir', $id_formulir);
        $this->db->update('blk_formulir',$data);
    }

    function hapus_data_formulir_blk() {
        $id_formulir = $this->input->post('id_formulir');
        $this->db->where('id_formulir', $id_formulir);
        $this->db->delete('blk_formulir');
    }

//========================================================= Data CTKI ========================================================//

	
	function tampil_data_all(){
        $sql = "SELECT personalblk.nodaftar, personalblk.nama as hk_nama, personal.nama as personal_nama FROM personalblk LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata WHERE nodaftar LIKE 'FI%' OR nodaftar LIKE 'MI%' OR (personalblk.nodaftar NOT LIKE 'MF%' 
        AND personalblk.nodaftar NOT LIKE 'MI%'
        AND personalblk.nodaftar NOT LIKE 'FI%'
        AND personalblk.nodaftar NOT LIKE 'FF%'
        AND personalblk.nodaftar NOT LIKE 'JP%')order by personalblk.nodaftar ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function tampil_data_jenisujian(){
        $sql = "SELECT * FROM blk_jenisujian ";
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

	function tampil_data_negara(){
        $sql = "SELECT * FROM blk_negara_tujuan";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function tampil_data_bahasa_tki(){
        $sql = "SELECT * FROM blk_bahasa";
                $query = $this->db->query($sql);

            return $query->result();
        } 

        function tampil_data_cluster_tki(){
        $sql = "SELECT * FROM blk_cluster_profesi";
                $query = $this->db->query($sql);

            return $query->result();
        } 

    function simpan_data_ctki(){

        $id_formulir=$this->input->post('id_formulir');
        $id1=$this->input->post('id1');
        $noserlok=$this->input->post('noserlok');
        $ket=$this->input->post('ket');
        
            $idsimpan=$id1;

        $data = array (
            'id_formulir'=>$id_formulir,
            'nodaftar'=> $id1,
            'noserlok'=> $noserlok,
            'ket'=> $ket,
            );
        $this->db->insert('blk_detail_formulir',$data);
    }
	
    function update_ctki() {
		$id_detail_formulir=$this->input->post('id_detail_formulir');
        $noserlok=$this->input->post('noserlok');
        $ket=$this->input->post('ket');

        $data = array (
            'noserlok'=> $noserlok,
            'ket'=> $ket,
            );       
        $this->db->where('id_detail_formulir', $id_detail_formulir);
        $this->db->update('blk_detail_formulir', $data);
    }

        function update_ctki_bahasa() {
        $nodaftar=$this->input->post('nodaftar');
        $bahasa=$this->input->post('bahasa');
        $cluster=$this->input->post('cluster');

        $data = array (
            'bahasa'=> $bahasa,
            'cluster'=> $cluster,
            );       
        $this->db->where('nodaftar', $nodaftar);
        $this->db->update('personalblk', $data);
    }

    function update_ctki_nilai($idform) {
        $nodaftar=$this->input->post('nodaftar');
        $nilai=$this->input->post('nilai');

        $data = array (
            'statujk'=> $nilai,
            );      
        $this->db->where('nodaftar', $nodaftar);
        $this->db->update('personalblk', $data);

        $this->db->where('nodaftar', $nodaftar);
        $this->db->where('id_formulir', $idform);
        $this->db->update('blk_detail_formulir', $data);
    }
	
    function hapus_ctki() {
        $id = $this->input->post('id_detail_formulir');
        $this->db->where('id_detail_formulir', $id);
        $this->db->delete('blk_detail_formulir');
    }
	

//---------------------------------------operasi penyimpanan pengajuan ujk------------------///

    function tampil_data_pengajuanujk($id_formulir){
        $sql = "SELECT * FROM blk_pengajuan_ujk LEFT JOIN blk_lembaga_lsp
				ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp 
				WHERE blk_pengajuan_ujk.id_formulirnya='".$id_formulir."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
	
	function hitung_data_pengajuanujk($id_formulir){
		$sql = "SELECT count(*) as total 
				FROM blk_pengajuan_ujk 
				WHERE id_formulirnya='".$id_formulir."'";
				$query = $this->db->query($sql)->row_array();
		  return $query['total'];
	}

    function simpan_data_pengajuanujk($id_formulir){

        $no_pengajuan	= $this->input->post('no_pengajuan');
        $lembagalsp		= $this->input->post('lembagalsp');
        $data = array (
            'no_pengajuan'	=> $no_pengajuan,
            'lembagalsp'	=> $lembagalsp,
            'id_formulirnya'=> $id_formulir,
            );
        $this->db->insert('blk_pengajuan_ujk',$data);
    }	

    function ubah_detailpengajuanujk($id_formulir) {
		$no_pengajuan	= $this->input->post('no_pengajuan');
        $lembagalsp		= $this->input->post('lembagalsp');
        $data = array (
            'no_pengajuan'	=> $no_pengajuan,
            'lembagalsp'	=> $lembagalsp,
            );

        $this->db->where('id_formulirnya', $id_formulir);
        $this->db->update('blk_pengajuan_ujk', $data);
    }

//---------------------------------------------------------------------------------------------//
	//-----------------------------------------RAPORT UJK------------------------------------------//  
function tampil_data_raport($id_formulir, $negara, $cluster){
        $sql = "SELECT 
                a.*,
                b.*, 
                c.*,
                b.nodaftar as all_nodaftar,
                b.nama as hk_nama,
                d.nama as personal_nama,
                b.negara as negaranya, 
                b.cluster as profesi,
                e.negara as negaradituju
                FROM blk_detail_formulir a 
                JOIN personalblk b 
                JOIN blk_formulir c
                LEFT JOIN personal d
                ON b.nodaftar=d.id_biodata
                LEFT JOIN disnaker e
                ON b.nodaftar=e.id_biodata
                WHERE a.id_formulir = c.id_formulir 
                AND a.nodaftar = b.nodaftar
                AND c.id_formulir = '$id_formulir' 
                AND (b.negara = '$negara' OR e.negara = '$negara') 
                AND b.cluster = '$cluster'
                ;";
                $query = $this->db->query($sql);

            return $query;
    }
    
 function hitung_data_raport($id_formulir, $negara, $cluster){
        $result = Dbs::load("SELECT count(a.id_detail_formulir) as total,
                b.negara as negaranya, b.cluster as profesi
                FROM blk_detail_formulir a JOIN personalblk b JOIN blk_formulir c
                LEFT JOIN personal d
                ON b.nodaftar=d.id_biodata
                LEFT JOIN disnaker e
                ON b.nodaftar=e.id_biodata
                WHERE a.id_formulir = c.id_formulir 
                AND a.nodaftar = b.nodaftar
                AND c.id_formulir = '$id_formulir' 
                AND (b.negara = '$negara' OR e.negara = '$negara') 
                AND b.cluster = '$cluster'
                ;");
        while($row = mysqli_fetch_array($result)){
                $total =$row['total'];
            }
        return $total;
    } 

    function hitung_data_bayarujk($id_formulir){
        $sql = "SELECT count(*) as total 
                FROM blk_bayar_ujk 
                WHERE id_laporan_bulanan='".$id_formulir."'";
                $query = $this->db->query($sql)->row_array();
          return $query['total'];
    }

        function tampil_data_bayarujk($id_formulir){
        $sql = "SELECT * FROM blk_bayar_ujk LEFT JOIN blk_lembaga_lsp
                ON blk_bayar_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp 
                WHERE blk_bayar_ujk.id_laporan_bulanan='".$id_formulir."'";
                $query = $this->db->query($sql);

            return $query->result();
    }


    function hitung_data_invoiceujk($id_formulir){
        $sql = "SELECT count(*) as total 
                FROM blk_invoice_ujk 
                WHERE id_laporan_bulanan='".$id_formulir."'";
                $query = $this->db->query($sql)->row_array();
          return $query['total'];
    }

    function tampil_data_invoiceujk($id_formulir){
        $sql = "SELECT * FROM blk_invoice_ujk LEFT JOIN blk_pemilik
                ON blk_invoice_ujk.blk_pemilik=blk_pemilik.id_pemilik 
                WHERE blk_invoice_ujk.id_laporan_bulanan='".$id_formulir."'";
                $query = $this->db->query($sql);

            return $query->result();
    }
    
//---------------------------------------------------------------------------------------------//   
//=============================================================================================//
//=============================================================================================//
	
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
    //-----------------------------------------SERTIFIKAT UJK------------------------------------------//   
function tampil_data_sertifikat($id_detail_formulir){
        $sql = "SELECT a.*, b.*, c.*, b.nama as nama_per
                FROM blk_detail_formulir a JOIN personalblk b JOIN blk_formulir c 
                WHERE a.id_formulir = c.id_formulir 
                AND a.nodaftar = b.nodaftar 
                AND a.id_detail_formulir = '$id_detail_formulir'
                ;";
                $query = $this->db->query($sql);

            return $query;
    }

//---------------------------------------------------------------------------------------------//   
//=============================================================================================//

      function simpan_data_bayarujk($id_laporan_blk){
        $noresi=$this->input->post('noresi');
        $tglsurat=$this->input->post('tglsurat');
        $lembagalsp=$this->input->post('lembagalsp');
        $biayamurni=$this->input->post('biayamurni');
        $biayaulang=$this->input->post('biayaulang');
        $data = array (
            'noresi'=>$noresi,
            'tglsurat'=> $tglsurat,
            'lembagalsp'=> $lembagalsp,
            'biayamurni'=> $biayamurni,
            'biayaulang'=> $biayaulang,
            'id_laporan_bulanan'=> $id_laporan_blk,
            );
        $this->db->insert('blk_bayar_ujk',$data);
    }

  function ubah_detailbayarujksampah($id_laporan_blk) {
        $noresi=$this->input->post('noresi');
        $tglsurat=$this->input->post('tglsurat');
        $lembagalsp=$this->input->post('lembagalsp');
        $biayamurni=$this->input->post('biayamurni');
        $biayaulang=$this->input->post('biayaulang');
        $data = array (
            'noresi'=>$noresi,
            'tglsurat'=> $tglsurat,
            'lembagalsp'=> $lembagalsp,
            'biayamurni'=> $biayamurni,
            'biayaulang'=> $biayaulang,
            );

        $this->db->where('id_laporan_bulanan', $id_laporan_blk);
        $this->db->update('blk_bayar_ujk', $data);
    }


        function simpan_data_invoiceujk($id_laporan_blk){

        $noinvoice_ujk  = $this->input->post('noinvoice_ujk');
        $tglsurat       = $this->input->post('tglsurat');
        $blk_pemilik    = $this->input->post('blk_pemilik');
        $biaya          = $this->input->post('biaya');
        $data = array (
            'noinvoice_ujk' => $noinvoice_ujk,
            'tglsurat'      => $tglsurat,
            'blk_pemilik'   => $blk_pemilik,
            'biaya'         => $biaya,
            'id_laporan_bulanan'=> $id_laporan_blk,
            );
        $this->db->insert('blk_invoice_ujk',$data);
    }

      function ubah_detailinvoiceujk($id_laporan_blk) {
        $noinvoice_ujk  = $this->input->post('noinvoice_ujk');
        $tglsurat       = $this->input->post('tglsurat');
        $blk_pemilik    = $this->input->post('blk_pemilik');
        $biaya          = $this->input->post('biaya');
        $data = array (
            'noinvoice_ujk' => $noinvoice_ujk,
            'tglsurat'      => $tglsurat,
            'blk_pemilik'   => $blk_pemilik,
            'biaya'         => $biaya,
            );

        $this->db->where('id_laporan_bulanan', $id_laporan_blk);
        $this->db->update('blk_invoice_ujk', $data);
    }
}




?>