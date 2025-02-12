<?php
class M_blk_personaldetail extends CI_Model{
    function __construct(){
        parent::__construct();
    }

 function personalff(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
disnaker.jeniskelamin as jeniskelamin,
disnaker.alamat as alamat,
disnaker.telpkontak as telp,
disnaker.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'FF%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personalfi(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
disnaker.jeniskelamin as jeniskelamin,
disnaker.alamat as alamat,
disnaker.telpkontak as telp,
disnaker.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'FI%' ORDER BY personal.nama ASC";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personalmf(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
disnaker.jeniskelamin as jeniskelamin,
disnaker.alamat as alamat,
disnaker.telpkontak as telp,
disnaker.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'MF%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personalmi(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
disnaker.jeniskelamin as jeniskelamin,
disnaker.alamat as alamat,
disnaker.telpkontak as telp,
disnaker.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'MI%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}
	 function personaljp(){
		$sql = "SELECT 
datasponsor.nama as namasponsor,
disnaker.nodisnaker as nodisnaker,
personal.id_biodata as idbiodata,
personal.nama as nama,
personal.id_biodata as id_biodata,
personal.tempatlahir as tempatlahir,
personal.tgllahir as tanggallahir,
disnaker.jeniskelamin as jeniskelamin,
disnaker.alamat as alamat,
disnaker.telpkontak as telp,
disnaker.pendidikan as pendidikan,
disnaker.noktp as noktp,
disnaker.negara as negara,
    (SELECT nopaspor from paspor where id_biodata=personal.id_biodata order by id_paspor DESC limit 1
    ) AS paspor
FROM personal
LEFT JOIN datasponsor 
ON personal.kode_sponsor= datasponsor.kode_sponsor
LEFT JOIN disnaker
ON personal.id_biodata = disnaker.id_biodata WHERE personal.id_biodata LIKE 'JP%' ORDER BY personal.nama ASC ";
                $query = $this->db->query($sql);
            return $query->result();
	}

 function simpan_data_blk_personal(){
 	$nama = $this->input->post('nama');
 	$pemilik = $this->input->post('pemilik');
 	$sponsor = $this->input->post('sponsor');
 	$nodisnaker = $this->input->post('nodisnaker');
 	$notki = $this->input->post('notki');
 	$tempatlahir = $this->input->post('tempatlahir');
 	$tanggallahir = $this->input->post('tanggalnyas');
 	$jeniskelamin = $this->input->post('jeniskelamin');
 	$alamat = $this->input->post('alamat');
 	$notelp = $this->input->post('notelp');
 	$pendidikan = $this->input->post('pendidikan');
 	$noktp = $this->input->post('noktp');
 	$negara = $this->input->post('negara');
 	$bahasa = $this->input->post('bahasa');
 	$eksnon = $this->input->post('eksnon');
 	$cluster = $this->input->post('cluster');
 	$nopaspor = $this->input->post('nopaspor');
 	$foto = $this->input->post('foto');


		$data = array (
			'nama'=>$nama, 
			'pemilik'=>$pemilik,
			'sponsor'=>$sponsor,
			'nodisnaker'=>$nodisnaker,
			'nodaftar'=>$notki,
			'tempatlahir'=>$tempatlahir,
			'tanggallahir'=>$tanggallahir,
			'jeniskelamin'=>$jeniskelamin,
			'alamat'=>$alamat,
			'notelp'=>$notelp,
			'pendidikan'=>$pendidikan,
			'noktp'=>$noktp,
			'negara'=>$negara,
			'bahasa'=>$bahasa,
			'eksnon'=>$eksnon,
			'cluster'=>$cluster,
			'nopaspor'=>$nopaspor,
			'foto'=>$foto,
			);

		$this->db->insert('personalblk',$data);
	}

	function tampil_data_instruktur(){
		$sql = "SELECT * FROM blk_instruktur";
                $query = $this->db->query($sql);

            return $query->result();
	} 

function tampil_data_ranjang(){
		$sql = "SELECT * FROM blk_no_ranjang";
                $query = $this->db->query($sql);

            return $query->result();
	}


	function tampil_data_blk_personal($pilihan){
		$sql = "SELECT *,blk_instruktur.nama as insnya,personalblk.alamat as alamatx,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor
FROM personalblk 
LEFT JOIN blk_pemilik
ON personalblk.pemilik=blk_pemilik.id_pemilik 
LEFT JOIN datasponsor
ON personalblk.sponsor=datasponsor.nama
LEFT JOIN blk_instruktur
ON personalblk.cekins=blk_instruktur.id_instruktur
LEFT JOIN blk_no_ranjang
ON personalblk.ranjangno=blk_no_ranjang.id_no_ranjang
WHERE personalblk.nodaftar='$pilihan'";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	function tampil_data_blk_personalNN(){
		$sql = "SELECT *,personalblk.alamat as alamatx,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor
FROM personalblk 
LEFT JOIN blk_pemilik
ON personalblk.pemilik=blk_pemilik.id_pemilik 
LEFT JOIN datasponsor
ON personalblk.sponsor=datasponsor.nama
WHERE 
(personalblk.nodaftar NOT LIKE 'MF%' 
 AND personalblk.nodaftar NOT LIKE 'MI%'
AND personalblk.nodaftar NOT LIKE 'FI%'
AND personalblk.nodaftar NOT LIKE 'FF%'
AND personalblk.nodaftar NOT LIKE 'JP%') ORDER BY personalblk.id_personalblk DESC";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function update_data_blk_personaldetail() {
		$id = $this->input->post('id_personalblk');

	$nama = $this->input->post('nama');
 	$pemilik = $this->input->post('pemilik');
 	$sponsor = $this->input->post('sponsor');
 	$nodisnaker = $this->input->post('nodisnaker');
 	$notki = $this->input->post('notki');
 	$tempatlahir = $this->input->post('tempatlahir');
 	$tanggallahir = $this->input->post('tanggalnyas');
 	$jeniskelamin = $this->input->post('jeniskelamin');
 	$alamat = $this->input->post('alamat');
 	$notelp = $this->input->post('notelp');
 	$pendidikan = $this->input->post('pendidikan');
 	$noktp = $this->input->post('noktp');
 	$negara = $this->input->post('negara');
 	$bahasa = $this->input->post('bahasa');
 	$eksnon = $this->input->post('eksnon');
 	$cluster = $this->input->post('cluster');
 	$nopaspor = $this->input->post('nopaspor');
 	$tglmed = $this->input->post('tglmed');
 	$tglmedfull = $this->input->post('tglmedfull');
 	$tgljari = $this->input->post('tgljari');
 	$foto = $this->input->post('foto');

		$data = array (
			'nama'=>$nama, 
			'pemilik'=>$pemilik,
			'sponsor'=>$sponsor,
			'nodisnaker'=>$nodisnaker,
			'nodaftar'=>$notki,
			'tempatlahir'=>$tempatlahir,
			'tanggallahir'=>$tanggallahir,
			'jeniskelamin'=>$jeniskelamin,
			'alamat'=>$alamat,
			'notelp'=>$notelp,
			'pendidikan'=>$pendidikan,
			'noktp'=>$noktp,
			'negara'=>$negara,
			'bahasa'=>$bahasa,
			'eksnon'=>$eksnon,
			'cluster'=>$cluster,
			'nopaspor'=>$nopaspor,
			'tglmedawal'=>$tglmed,
			'tglmedfull'=>$tglmedfull,
			'tglsidikjari'=>$tgljari,
			'foto'=>$foto,
			);
		$this->db->where('nodaftar', $id);
		$this->db->update('personalblk', $data);
	}

		function update_data_blk_registrasi() {
		$id = $this->input->post('id_personalblk');

	$adm_tglreg = $this->input->post('adm_tglreg');

		$data = array (
			'adm_tglreg'=>$adm_tglreg, 
			);
		$this->db->where('nodaftar', $id);
		$this->db->update('personalblk', $data);
	}

			function update_data_blk_cek() {
		$id = $this->input->post('id_personalblk');
		$cektgl = $this->input->post('cektgl');
		$cekins = $this->input->post('cekins');
		$cekket = $this->input->post('cekket');

		$data = array (
			'cektgl'=>$cektgl, 
			'cekins'=>$cekins, 
			'cekket'=>$cekket, 
			);
		$this->db->where('nodaftar', $id);
		$this->db->update('personalblk', $data);
	}


			function update_data_blk_ranjang() {
		$id = $this->input->post('id_personalblk');
		$ranjangtgl = $this->input->post('ranjangtgl');
		$ranjangno = $this->input->post('ranjangno');

		$data = array (
			'ranjangtgl'=>$ranjangtgl, 
			'ranjangno'=>$ranjangno, 
			);
		$this->db->where('nodaftar', $id);
		$this->db->update('personalblk', $data);
	}

	function hapus_data_blk_personal() {
		$id = $this->input->post('id_personalblk');
		$this->db->where('id_personalblk', $id);
		$this->db->delete('personalblk');
	}

	function ambil_id($id) {
		return $this->db->get_where('datablk_personal', array('id_blk_personal' => $id))->row();
	}


		function tampil_data_pemilik_tki(){
		$sql = "SELECT * FROM blk_pemilik";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_jk_tki(){
		$sql = "SELECT * FROM blk_jk";
                $query = $this->db->query($sql);

            return $query->result();
		} 

				function tampil_data_negara_tki(){
		$sql = "SELECT * FROM blk_negara_tujuan";
                $query = $this->db->query($sql);

            return $query->result();
		} 

				function tampil_data_bahasa_tki(){
		$sql = "SELECT * FROM blk_bahasa";
                $query = $this->db->query($sql);

            return $query->result();
		} 
		function tampil_data_eksnon_tki(){
		$sql = "SELECT * FROM blk_eks_non";
                $query = $this->db->query($sql);

            return $query->result();
		} 
		function tampil_data_cluster_tki(){
		$sql = "SELECT * FROM blk_cluster_profesi";
                $query = $this->db->query($sql);

            return $query->result();
		} 

			  function tglawalfinger($nodaftar){
             $sql = "SELECT DISTINCT(DATE(dteDate)) as jumlah,idblk FROM tblattendance WHERE idblk ='$nodaftar' ORDER BY  jumlah ASC LIMIT 1 ";
                $query = $this->db->query($sql);

            return $query->result();
			}


		function jmlfingerpagi($nodaftar){
		$sql = "SELECT count(DISTINCT(DATE(dteDate))) as jumlah FROM tblattendance WHERE idblk ='$nodaftar' AND waktu='pagi'";
                 $query = $this->db->query($sql)->row_array();

          return $query['jumlah'];
	}
	function jmlfingersore($nodaftar){
		$sql = "SELECT count(DISTINCT(DATE(dteDate))) as jumlah FROM tblattendance WHERE idblk ='$nodaftar' AND waktu='sore'";
                 $query = $this->db->query($sql)->row_array();

          return $query['jumlah'];
	}

		  function hitunganfinger($date1,$date2,$usercx){
		$sql = "SELECT count(DISTINCT(DATE(dteDate))) as jumlah FROM tblattendance WHERE DATE(dteDate) BETWEEN '$date1' AND '$date2' AND idblk ='$usercx'";
                $query = $this->db->query($sql)->row_array();

             return $query['jumlah'];
	}

	function hitunganfingernodaft($nodaftars){
		$sql = "SELECT DATE_ADD(adm_tglreg, INTERVAL 41 DAY) as expired FROM personalblk WHERE nodaftar='".$nodaftars."'";
                $query = $this->db->query($sql)->row_array();

            return $query['expired'];
	}

	function hitunganfingernodaftujuh($nodaftars){
		$sql = "SELECT DATE_ADD(adm_tglreg, INTERVAL 68 DAY) as expired FROM personalblk WHERE nodaftar='".$nodaftars."'";
                $query = $this->db->query($sql)->row_array();

            return $query['expired'];
	}
	function hitunganfingernodafbelas($nodaftars){
		$sql = "SELECT DATE_ADD(adm_tglreg, INTERVAL 75 DAY) as expired FROM personalblk WHERE nodaftar='".$nodaftars."'";
                $query = $this->db->query($sql)->row_array();

            return $query['expired'];
	}
	



	function adm_tglreg($nodaftars){
		$sql = "SELECT * FROM personalblk WHERE nodaftar ='$nodaftars'";
                 $query = $this->db->query($sql)->row_array();

          return $query['adm_tglreg'];
	}
 

 	function ujk_pengajuan($nodaftar){
 $kode_desa="";
        $result = mysql_query("SELECT tgl_pengajuan FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgl_pengajuan'];
			}
		return $kode_desa;	
	}

	function ujk_keluar($nodaftar){

		 $kode_desa="";
        $result = mysql_query("SELECT tgl_keluar FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgl_keluar'];
			}
		return $kode_desa;	
	}
		function ujk_ujian($nodaftar){

					 $kode_desa="";
        $result = mysql_query("SELECT tgl_ujk FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['tgl_ujk'];
			}
		return $kode_desa;	
	}
			function ujk_namalsp($nodaftar){

									 $kode_desa="";
        $result = mysql_query("SELECT nama FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;	
	}

				function ujk_noserlok($nodaftar){
									 $kode_desa="";
        $result = mysql_query("SELECT noserlok FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['noserlok'];
			}
		return $kode_desa;	
	}

					function ujk_noresibayar($nodaftar){
									 $kode_desa="";
        $result = mysql_query("SELECT noresi FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_bayar_ujk
ON blk_detail_formulir.id_formulir=blk_bayar_ujk.id_laporan_bulanan
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['noresi'];
			}
		return $kode_desa;	
	}

						function ujk_noinvoice($nodaftar){
$kode_desa="";
$result = mysql_query("SELECT noinvoice_ujk FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_invoice_ujk
ON blk_detail_formulir.id_formulir=blk_invoice_ujk.id_laporan_bulanan
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['noinvoice_ujk'];
			}
		return $kode_desa;	
	}

						function kelulusan($nodaftar){
$kode_desa="";
$result = mysql_query("SELECT * FROM personalblk WHERE nodaftar ='$nodaftar'");
			while($row = mysql_fetch_array($result)){
                $kode_desa =$row['statujk'];
			}
		return $kode_desa;	
	}

 

 function simpan_data_kb(){
		$id_personalblk		= $this->input->post('id_personalblk');
		$id_jenis_kb		= $this->input->post('id_jenis_kb');
		$tgl_suntik			= $this->input->post('tgl_suntik');
		$kb_suntik			= $this->input->post('kb_suntik');
		$masa_kadaluwarsa	= $this->input->post('masa_kadaluwarsa');
		$id_instruktur		= $this->input->post('id_instruktur');
		$ket				= $this->input->post('ket');
		$data = array (
			'nodaftar'		=>	$id_personalblk, 
			'id_jenis_kb'		=>	$id_jenis_kb, 
			'tgl_suntik'		=>	$tgl_suntik,
			'kb_suntik'			=>	$kb_suntik,
			'masa_kadaluwarsa'	=>	$masa_kadaluwarsa,
			'id_instruktur'		=>	$id_instruktur,
			'ket'				=>	$ket
			);
		$this->db->insert('blk_kb',$data);
	}

	function tampil_data_kb($idnya){
		$sql = "SELECT a.*, b.*, c.*, b.ket as ket_kb , a.ket as ketnya
				FROM blk_kb a JOIN blk_jenis_kb b JOIN blk_instruktur c
				where a.id_jenis_kb = b.id_jenis_kb 
				AND a.id_instruktur = c.id_instruktur
				AND a.nodaftar='$idnya';";
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	function tampil_data_jenis_kb(){
		$sql = "SELECT * FROM blk_jenis_kb ";
               $query = $this->db->query($sql);

            return $query->result();
	}


	function update_data_kb() {
		$id_personalblk		= $this->input->post('id_personalblk');
		$id					= $this->input->post('id_kb');
		$id_jenis_kb 		= $this->input->post('id_jenis_kb');
		$tgl_suntik			= $this->input->post('tgl_suntik');
		$kb_suntik			= $this->input->post('kb_suntik');
		$masa_kadaluwarsa	= $this->input->post('masa_kadaluwarsa');
		$id_instruktur		= $this->input->post('id_instruktur');
		$ket				= $this->input->post('ket');
		$data = array(
			'nodaftar'		=>	$id_personalblk, 
			'id_jenis_kb'		=>	$id_jenis_kb, 
			'tgl_suntik'		=>	$tgl_suntik,
			'kb_suntik'			=>	$kb_suntik,
			'masa_kadaluwarsa'	=>	$masa_kadaluwarsa,
			'id_instruktur'		=>	$id_instruktur,
			'ket'				=>	$ket
			);
		$this->db->where('id_kb', $id);
		$this->db->update('blk_kb', $data);
	}

	function hapus_data_kb() {
		$id = $this->input->post('id_kb');
		$this->db->where('id_kb', $id);
		$this->db->delete('blk_kb');
	}

}
?>