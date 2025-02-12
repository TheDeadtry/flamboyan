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

	function select_row($sql) {
		return $this->db->query($sql)->row();
	}
/*
	function tampil_data_blk_personal($pilihan){
		$sql = "SELECT 
		blk_instruktur.nama as insnya,
		personalblk.alamat as alamatx,
		personalblk.nama as namanya,
		blk_pemilik.isi as pemilikx, 
		blk_pemilik.negara as negarapemilikx,
		datasponsor.kode_sponsor as kdsponsor,

		personal.nama as personal_nama,
		personal.kode_sponsor as personal_kodspons,
		disnaker.nodisnaker as disnaker_no,
		personal.tempatlahir as personal_tempatlahir,
		personal.tgllahir as personal_tgllahir,
		personal.jeniskelamin as ,
		personal.alamat as personal_alamat,
		personal.notelp as personal_notelp,
		personal.pendidikan as personal_pend,
		disnaker.noktp as personal.noktp,
		bahasa,
		eksnon,
		cluster,
		paspor.nopaspor as paspor_no,
		medical.tanggal as med_pra_tgl,
		medical2.tanggal as med_prafull_tgl,
		medical2.tglsidik as med_prafull_sidik,
		medical3.tanggal as med_full_tgl,
		medical3.tglsidik as med_full_sidik,
		personalblk.adm_tglreg as blk_admtgl,
		personal.foto as personal_foto,
		personalblk.cektgl as cekfisik_tgl,
		personalblk.cekins as cekfisik_ins,
		personalblk.cekket as cekfisik_ket,
		ranjangtgl,
		ranjangno,
		statujk,




FROM personalblk 
LEFT JOIN blk_pemilik
ON personalblk.pemilik=blk_pemilik.id_pemilik 
LEFT JOIN datasponsor
ON personalblk.sponsor=datasponsor.nama
LEFT JOIN blk_instruktur
ON personalblk.cekins=blk_instruktur.id_instruktur
LEFT JOIN blk_no_ranjang
ON personalblk.ranjangno=blk_no_ranjang.id_no_ranjang
LEFT JOIN medical
ON personalblk.nodaftar=medical.id_biodata
LEFT JOIN medical2
ON personalblk.nodaftar=medical2.id_biodata
LEFT JOIN medical3
ON personalblk.nodaftar=medical3.id_biodata
LEFT JOIN personal
ON personalblk.nodaftar=personal.id_biodata
WHERE personalblk.nodaftar='$pilihan'";
                $query = $this->db->query($sql);

            return $query->result();
	} */
	function tampil_data_blk_personalNN(){
		$sql = "SELECT personal.*,personalblk.alamat as alamatx,personalblk.nama as namanya,blk_pemilik.isi as pemilikx, blk_pemilik.negara as negarapemilikx,datasponsor.kode_sponsor as kdsponsor
FROM personalblk 
LEFT JOIN blk_pemilik
ON personalblk.pemilik=blk_pemilik.id_pemilik 
LEFT JOIN datasponsor
ON personalblk.sponsor=datasponsor.nama
LEFT JOIN personal
ON personalblk.nodaftar=personal.id_biodata
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
	 	$bahasa = $this->input->post('bahasa');
	 	$eksnon = $this->input->post('eksnon');
	 	$cluster = $this->input->post('cluster');

		$data = array (
			'bahasa'=>$bahasa,
			'eksnon'=>$eksnon,
			'cluster'=>$cluster,
			);
		$this->db->where('nodaftar', $id);
		$this->db->update('personalblk', $data);
	}

	function update_data_blk_personaldetailhk() {
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
		$cekket2= $this->input->post('cekket2');
		if ($cekket == "TIDAK ADA KELUHAN") {
			$fcekket = $cekket;
		} else {
			$fcekket = $cekket2;
		}

		$data = array (
			'cektgl'=>$cektgl, 
			'cekins'=>$cekins, 
			'cekket'=>$fcekket, 
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

	function update_data_angkatan() {
		$id = $this->input->post('id_personalblk');
		$tgl_angkt = $this->input->post('tglangk');

		$dat7= $this->db->query("SELECT nodaftar FROM personal_angkatan where nodaftar='$id'")->row();
		if (empty($dat7)) {
	 		$data = array (
				'date_angkatan'	=>$tgl_angkt, 
				'nodaftar'		=>$id,
				);
			$this->db->insert('personal_angkatan', $data);
		} else {
	 		$data = array (
				'date_angkatan'=>$tgl_angkt, 
				);
			$this->db->where('nodaftar', $id);
			$this->db->update('personal_angkatan', $data);
		}
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
        $result = Dbs::load("SELECT tgl_pengajuan FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_pengajuan'];
			}
		return $kode_desa;	
	}

	function ujk_keluar($nodaftar){

		 $kode_desa="";
        $result = Dbs::load("SELECT tgl_keluar FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_keluar'];
			}
		return $kode_desa;	
	}
		function ujk_ujian($nodaftar){

					 $kode_desa="";
        $result = Dbs::load("SELECT tgl_ujk FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['tgl_ujk'];
			}
		return $kode_desa;	
	}
			function ujk_namalsp($nodaftar){

									 $kode_desa="";
        $result = Dbs::load("SELECT nama FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;	
	}

				function ujk_noserlok($nodaftar){
									 $kode_desa="";
        $result = Dbs::load("SELECT noserlok FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_pengajuan_ujk
ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
LEFT JOIN blk_lembaga_lsp
ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['noserlok'];
			}
		return $kode_desa;	
	}

					function ujk_noresibayar($nodaftar){
									 $kode_desa="";
        $result = Dbs::load("SELECT noresi FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_bayar_ujk
ON blk_detail_formulir.id_formulir=blk_bayar_ujk.id_laporan_bulanan
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['noresi'];
			}
		return $kode_desa;	
	}

						function ujk_noinvoice($nodaftar){
$kode_desa="";
$result = Dbs::load("SELECT noinvoice_ujk FROM blk_detail_formulir
LEFT JOIN blk_formulir
ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
LEFT JOIN blk_invoice_ujk
ON blk_detail_formulir.id_formulir=blk_invoice_ujk.id_laporan_bulanan
WHERE blk_detail_formulir.nodaftar='$nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['noinvoice_ujk'];
			}
		return $kode_desa;	
	}

						function kelulusan($nodaftar){
$kode_desa="";
$result = Dbs::load("SELECT * FROM personalblk WHERE nodaftar ='$nodaftar'");
			while($row = mysqli_fetch_array($result)){
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


	function tampil_data_izin_keluar($idbio){
		$sql = "SELECT a.*, b.* 
				FROM blk_izin_keluar a JOIN blk_instruktur b 
				where a.blk_pemberi_izin = b.id_instruktur
				AND a.nodaftar='$idbio'";
               $query = $this->db->query($sql);

            return $query->result();
	}
	
	function hitung_data_terlambat($idbio){
		$kode_desa="";
$result = Dbs::load("SELECT * FROM blk_izin_keluar WHERE nodaftar ='$idbio' Group By id_izin_keluar DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['akm_terlambat'];
			}
		return $kode_desa;	
	}


	 function simpan_data_izin_keluar(){
		
		$tgl				= $this->input->post('tgl');
		$id_personalblk		= $this->input->post('id_personalblk');
		$jam_keluar			= $this->input->post('jam_keluar');
		$jam_kembali		= $this->input->post('jam_kembali');
		$terlambat			= $this->input->post('terlambat');
		$akm_terlambat		= $this->input->post('akm_terlambat');
		$blk_pemberi_izin	= $this->input->post('blk_pemberi_izin');
		$ket				= $this->input->post('ket');
		$data = array (
			'tgl'				=>	$tgl,
			'nodaftar'		=>	$id_personalblk,
			'jam_keluar'		=>	$jam_keluar,
			'jam_kembali'		=>	$jam_kembali,
			'terlambat'			=>	$terlambat,
			'akm_terlambat'		=>	$akm_terlambat,
			'blk_pemberi_izin'	=>	$blk_pemberi_izin,
			'ket'				=>	$ket
			);
		$this->db->insert('blk_izin_keluar',$data);
	}

	function update_data_izin_keluar() {
		$id					= $this->input->post('id_izin_keluar');
		$id_personalblk		= $this->input->post('id_personalblk');
		$tgl				= $this->input->post('tgl');
		$jam_keluar			= $this->input->post('jam_keluar');
		$jam_kembali		= $this->input->post('jam_kembali');
		$terlambat			= $this->input->post('terlambat');
		$akm_terlambat		= $this->input->post('akm_terlambat');
		$blk_pemberi_izin	= $this->input->post('blk_pemberi_izin');
		$ket				= $this->input->post('ket');
		$data = array(
			'tgl'				=>	$tgl,
			'nodaftar'		=>	$id_personalblk,
			'jam_keluar'		=>	$jam_keluar,
			'jam_kembali'		=>	$jam_kembali,
			'terlambat'			=>	$terlambat,
			'akm_terlambat'		=>	$akm_terlambat,
			'blk_pemberi_izin'	=>	$blk_pemberi_izin,
			'ket'				=>	$ket
			);
		$this->db->where('id_izin_keluar', $id);
		$this->db->update('blk_izin_keluar', $data);
	}

	function hapus_data_izin_keluar() {
		$id = $this->input->post('id_izin_keluar');
		$this->db->where('id_izin_keluar', $id);
		$this->db->delete('blk_izin_keluar');
	}


	function tampil_data_izin_inap($idbio){
		
		$sql = "SELECT a.*, b.* 
				FROM blk_izin_inap a JOIN blk_instruktur b 
				where a.blk_pemberi_izin = b.id_instruktur
				AND a.nodaftar='$idbio'";
               $query = $this->db->query($sql);

            return $query->result();
	}

	function hitung_data_terlambatinap($idbio){
		$kode_desa="";
$result = Dbs::load("SELECT * FROM blk_izin_inap WHERE nodaftar ='$idbio' Group By id_izin_inap DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['akm_terlambat'];
			}
		return $kode_desa;	
	}

	 function simpan_data_izin_inap(){
		
		$tglkeluar		= $this->input->post('tglkeluar');
		$jamkeluar		= $this->input->post('jamkeluar');
		$tglkembali		= $this->input->post('tglkembali');
		$jamkembali		= $this->input->post('jamkembali');
		$id_personalblk		= $this->input->post('id_personalblk');

		$terlambat			= $this->input->post('terlambat');
		$akm_terlambat		= $this->input->post('akm_terlambat');
		$blk_pemberi_izin	= $this->input->post('blk_pemberi_izin');
		$ket				= $this->input->post('ket');
		$data = array (
			'tglkeluar'	=>	$tglkeluar,
			'jamkeluar'	=>	$jamkeluar,
			'tglmasuk'	=>	$tglkembali,
			'jammasuk'	=>	$jamkembali,
			'nodaftar'		=>	$id_personalblk,


			'terlambat'			=>	$terlambat,
			'akm_terlambat'		=>	$akm_terlambat,
			'blk_pemberi_izin'	=>	$blk_pemberi_izin,
			'ket'				=>	$ket
			);
		$this->db->insert('blk_izin_inap',$data);
	}
	
	function update_data_izin_inap($id_izin_inap) {
		$tglkeluar		= $this->input->post('tglkeluar');
		$jamkeluar		= $this->input->post('jamkeluar');
		$tglkembali		= $this->input->post('tglmasuk');
		$jamkembali		= $this->input->post('jammasuk');
		$id_personalblk		= $this->input->post('id_personalblk');

		$terlambat			= $this->input->post('terlambat');
		$akm_terlambat		= $this->input->post('akm_terlambat');
		$blk_pemberi_izin	= $this->input->post('blk_pemberi_izin');
		$ket				= $this->input->post('ket');
		$data = array(
			'tglkeluar'	=>	$tglkeluar,
			'jamkeluar'	=>	$jamkeluar,
			'tglmasuk'	=>	$tglkembali,
			'jammasuk'	=>	$jamkembali,
			'nodaftar'		=>	$id_personalblk,
			'terlambat'			=>	$terlambat,
			'akm_terlambat'		=>	$akm_terlambat,
			'blk_pemberi_izin'	=>	$blk_pemberi_izin,
			'ket'				=>	$ket
			);
		$this->db->where('id_izin_inap', $id_izin_inap);
		$this->db->update('blk_izin_inap', $data);
	}

	
	function hapus_data_izin_inap() {
		$id = $this->input->post('id_izin_inap');
		$this->db->where('id_izin_inap', $id);
		$this->db->delete('blk_izin_inap');
	}


		function tampil_data_izin_pulang($idbio){
		
		$sql = "SELECT a.*, b.*, c.*, d.*
,b.nama as namablk
,b.jabatan_tugas as jabatanblk
,c.nama as namamark
,c.jabatan_tugas as jabatanmark
,d.nama as namaadm
,d.jabatan_tugas as jabatanadm
FROM blk_izin_pulang a JOIN blk_instruktur b 
JOIN blk_marketing c JOIN blk_adm_kantor d
where a.mark = c.id_marketing
AND a.adm = d.id_adm_kantor
AND a.blk = b.id_instruktur
AND a.nodaftar='$idbio'
				";
               $query = $this->db->query($sql);

            return $query->result();
	}

		function simpan_data_izin_pulang(){
		
		$tglkeluar		= $this->input->post('tglkeluar');
		$jamkeluar		= $this->input->post('jamkeluar');
		$tglkembali		= $this->input->post('tglkembali');
		$jamkembali		= $this->input->post('jamkembali');
		$tglact			= $this->input->post('tglact');
		$jamact			= $this->input->post('jamact');
		$id_personalblk		= $this->input->post('id_personalblk');

		$terlambat			= $this->input->post('terlambat');
		$akm_terlambat		= $this->input->post('akm_terlambat');
		$ket				= $this->input->post('ket');
		$mark				= $this->input->post('mark');
		$adm				= $this->input->post('adm');
		$blk				= $this->input->post('blk');
		$data = array (
			'tglkeluar'		=>	$tglkeluar,
			'jamkeluar'		=>	$jamkeluar,
			'tglkembali'	=>	$tglkembali,
			'jamkembali'	=>	$jamkembali,
			'tglactual'		=>	$tglact,
			'jamactual'		=>	$jamact,
			'nodaftar'		=>	$id_personalblk,

			'terlambat'			=>	$terlambat,
			'akm_terlambat'		=>	$akm_terlambat,
			'ket'				=>	$ket,
			'mark'				=>	$mark,
			'adm'				=>	$adm,
			'blk'				=>	$blk
			);
		$this->db->insert('blk_izin_pulang',$data);
	}


	function hitung_data_terlambatpulang($idbio){
		$kode_desa="";
$result = Dbs::load("SELECT * FROM blk_izin_pulang WHERE nodaftar ='$idbio' Group By id_izin_pulang DESC LIMIT 1");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['akm_terlambat'];
			}
		return $kode_desa;	
	}

	

	function update_data_izin_pulang($id_izin_pulang) {
		$tglkeluar		= $this->input->post('tglkeluar');
		$jamkeluar		= $this->input->post('jamkeluar');
		$tglkembali		= $this->input->post('tglkembali');
		$jamkembali		= $this->input->post('jamkembali');
		$tglact			= $this->input->post('tglact');
		$jamact			= $this->input->post('jamact');
		$id_personalblk		= $this->input->post('id_personalblk');

		$terlambat			= $this->input->post('terlambat');
		$akm_terlambat		= $this->input->post('akm_terlambat');
		$mark				= $this->input->post('mark');
		$adm				= $this->input->post('adm');
		$blk				= $this->input->post('blk');
		$ket				= $this->input->post('ket');
		$data = array(
			'tglkeluar'	=>	$tglkeluar,
			'jamkeluar'	=>	$jamkeluar,
			'tglkembali'	=>	$tglkembali,
			'jamkembali'	=>	$jamkembali,
			'tglactual'		=>	$tglact,
			'jamactual'		=>	$jamact,
			'nodaftar'		=>	$id_personalblk,

			'terlambat'			=>	$terlambat,
			'akm_terlambat'		=>	$akm_terlambat,
			'ket'				=>	$ket,
			'mark'				=>	$mark,
			'adm'				=>	$adm,
			'blk'				=>	$blk
			);
		$this->db->where('id_izin_pulang', $id_izin_pulang);
		$this->db->update('blk_izin_pulang', $data);
	}

	
	function hapus_data_izin_pulang() {
		$id = $this->input->post('id_izin_pulang');
		$this->db->where('id_izin_pulang', $id);
		$this->db->delete('blk_izin_pulang');
	}


	function tampil_data_adm(){
		$sql = "SELECT * FROM blk_adm_kantor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

	function tampil_data_mark(){
		$sql = "SELECT * FROM blk_marketing";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_izin_tdk_hadir($idbio){
		
		$sql = "SELECT a.*, b.*, c.*, d.*, e.*
,b.nama as namablk
,b.jabatan_tugas as jabatanblk
,c.nama as namamark
,c.jabatan_tugas as jabatanmark
,d.nama as namaadm
,d.jabatan_tugas as jabatanadm
				FROM blk_izin_tdk_hadir a JOIN blk_instruktur b 
				JOIN blk_marketing c JOIN blk_adm_kantor d JOIN blk_izin_keperluan e
				WHERE a.blk = b.id_instruktur
				AND a.adm = d.id_adm_kantor
				AND a.mark = c.id_marketing
				AND a.keperluan = e.id_izin_keperluan
				AND a.nodaftar='$idbio'
				";
               $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_izin_keperluan(){
		$sql = "SELECT * FROM blk_izin_keperluan ";
               $query = $this->db->query($sql);

            return $query->result();
	}

	 function simpan_data_izin_tdk_hadir(){
		
		$tglkeluar		= $this->input->post('tglkeluar');
		$jamkeluar		= $this->input->post('jamkeluar');
		$tglkembali		= $this->input->post('tglkembali');
		$jamkembali		= $this->input->post('jamkembali');
		$id_personalblk		= $this->input->post('id_personalblk');
		$keperluan			= $this->input->post('keperluan');
		$mark				= $this->input->post('mark');
		$adm				= $this->input->post('adm');
		$blk				= $this->input->post('blk');
		$data = array (
			'tglkeluar'	=>	$tglkeluar,
			'jamkeluar'	=>	$jamkeluar,
			'tglkembali'	=>	$tglkembali,
			'jamkembali'	=>	$jamkembali,
			'nodaftar'		=>	$id_personalblk,

			'keperluan'			=>	$keperluan,
			'mark'				=>	$mark,
			'adm'				=>	$adm,
			'blk'				=>	$blk
			);
		$this->db->insert('blk_izin_tdk_hadir',$data);
	}

	function update_data_izin_tdk_hadir($id_izin_tdk_hadir) {
		$tglkeluar		= $this->input->post('tglkeluar');
		$jamkeluar		= $this->input->post('jamkeluar');
		$tglkembali		= $this->input->post('tglkembali');
		$jamkembali		= $this->input->post('jamkembali');
		$id_personalblk		= $this->input->post('id_personalblk');

		$keperluan			= $this->input->post('keperluan');
		$mark				= $this->input->post('mark');
		$adm				= $this->input->post('adm');
		$blk				= $this->input->post('blk');
			$data = array(
			'tglkeluar'	=>	$tglkeluar,
			'jamkeluar'	=>	$jamkeluar,
			'tglkembali'	=>	$tglkembali,
			'jamkembali'	=>	$jamkembali,
			'nodaftar'		=>	$id_personalblk,

			'keperluan'			=>	$keperluan,
			'mark'				=>	$mark,
			'adm'				=>	$adm,
			'blk'				=>	$blk,
			);
		$this->db->where('id_izin_tdk_hadir', $id_izin_tdk_hadir);
		$this->db->update('blk_izin_tdk_hadir', $data);
	}

	
	function hapus_data_izin_tdk_hadir() {
		$id = $this->input->post('id_izin_tdk_hadir');
		$this->db->where('id_izin_tdk_hadir', $id);
		$this->db->delete('blk_izin_tdk_hadir');
	}


	function tampil_aspek(){
		$sql = "SELECT * FROM blk_aspekpkl";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function tampil_materi($id_aspek){
		$sql = "SELECT * FROM blk_materipkl WHERE id_aspek='$id_aspek'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function tampil_pilihan()
	{
		$sql = "SELECT * FROM blk_nilai";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function tampil_tempatpkl(){
		$sql = "SELECT * FROM blk_tempatpkl";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function cek_pklke($id_personalblk){
		$sql = "SELECT * FROM blk_pklke WHERE id_personalblk='$id_personalblk'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function new_pklke($id_personalblk){
		$data = array(
			'id_personalblk' => $id_personalblk,
			'nonext' => 1,
		 );
		$this->db->insert('blk_pklke',$data);
	}
	function pklke($id_personalblk){
		$sql = "SELECT * FROM blk_pklke WHERE id_personalblk='$id_personalblk'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function update_pklke($id_personalblk){
		$this->db->set('nonext', '`nonext`+1', FALSE);
		$this->db->where('id_personalblk', $id_personalblk);
		$this->db->update('blk_pklke');
	}
	function simpan_data_pkl($data){
		$this->db->insert('blk_hasilpkl',$data);
	}
	function last_hasilpkl(){
		$sql = "SELECT * FROM blk_hasilpkl ORDER BY id_pkl DESC";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function tampil_materi_all(){
		$sql = "SELECT * FROM blk_materipkl";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function simpan_penilaian($data){
		$this->db->insert('blk_penilaianpkl',$data);
	}
	function tampil_hasilpkl($id_personalblk){
		$sql = "SELECT h.pkl_ke, h.tgl_mulai, h.tgl_selesai, h.jml_hari, t.nama_tempat, h.id_pkl, i.nama, h.no_resi, h.nominal, h.id_tempatpkl, h.id_instruktur, h.kepada FROM blk_hasilpkl h JOIN blk_instruktur i ON h.id_instruktur=i.id_instruktur JOIN blk_tempatpkl t ON h.id_tempatpkl=t.id_tempatpkl WHERE h.id_personalblk='$id_personalblk'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function rata2($id_pkl){
		$sql = "SELECT AVG(nilai) as rata2 FROM blk_penilaianpkl p JOIN blk_nilai n ON p.id_nilai=n.id_nilai WHERE p.id_pkl='$id_pkl'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function rata($id_pkl){
		$sql = "SELECT AVG(nilai) as rata, a.aspek, a.id_aspek FROM blk_penilaianpkl p JOIN blk_nilai n ON p.id_nilai=n.id_nilai JOIN blk_materipkl m ON p.id_materipkl=m.id_materipkl JOIN blk_aspekpkl a ON m.id_aspek=a.id_aspek WHERE p.id_pkl='$id_pkl' GROUP BY m.id_aspek ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function hapus_data_pkl() {
		$id = $this->input->post('id_pkl');
		$this->db->where('id_pkl', $id);
		$this->db->delete('blk_hasilpkl');
	}
	function tampil_penilaian($id_pkl, $id_materipkl){
		$sql = "SELECT * FROM blk_penilaianpkl WHERE id_pkl='$id_pkl' AND id_materipkl='$id_materipkl'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function update_data_pkl($data, $id_pkl){
		$this->db->where('id_pkl', $id_pkl);
		$this->db->update('blk_hasilpkl', $data);
	}
	function update_penilaian($id_nilai, $penjelasan, $id_pkl, $id_materipkl){
		$sql = "UPDATE blk_penilaianpkl SET id_nilai='$id_nilai', penjelasan='$penjelasan' WHERE id_pkl='$id_pkl' AND id_materipkl='$id_materipkl' ";
		$query = $this->db->query($sql);
	}

	function ambilprint($idpkl){
		$sql = "SELECT * FROM blk_hasilpkl LEFT JOIN personalblk ON blk_hasilpkl.id_personalblk=personalblk.nodaftar
		LEFT JOIN blk_tempatpkl ON blk_hasilpkl.id_tempatpkl=blk_tempatpkl.id_tempatpkl WHERE blk_hasilpkl.id_pkl='$idpkl'";
                $query = $this->db->query($sql);

            return $query;
	} 

	function t_angkatan($id_pkl) {
		$sql = "SELECT * FROM personal_angkatan where nodaftar='$id_pkl'";
        $query = $this->db->query($sql);
		return $query->row();
	}

	function update_data_statterbang() {
		$id = $this->input->post('id_personalblk');
		$statterbang = $this->input->post('statterbang');
		if ($statterbang == 'sdh') {
			$fstatterbang = '1';
		} elseif ($statterbang == 'blm') {
			$fstatterbang = '';
		} else {
			$fstatterbang = '';
		}

		if ($id != NULL) {
			$data = array (
				'statterbang' => $fstatterbang
			);
			$this->db->where('nodaftar', $id);
			$this->db->update('personalblk', $data);
		}
	}
} 
?>