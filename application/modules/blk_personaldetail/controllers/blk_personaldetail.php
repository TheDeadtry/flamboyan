<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_personaldetail extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_personaldetail');			
	}
	
	function index($pilihan) {
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;
			 	$d_sektor = substr($idbio, 0, 2);

			 	$personalblk = "SELECT 
								medical.tanggal as med_pra_tgl,
								medical2.tanggal as med_prafull_tgl,
								medical2.tglsidik as med_prafull_sidik,
								medical3.tanggal as med_full_tgl,
								medical3.tglsidik as med_full_sidik,
								blk_instruktur.nama as insnya,
								personalblk.nodaftar as blk_nodaftar,
								personalblk.adm_tglkor as blk_adm_tglkor,
								personalblk.adm_tglreg as blk_adm_tglreg,
								personalblk.cektgl as blk_cektgl,
								personalblk.cekins as blk_cekins,
								personalblk.cekket as blk_cekket,
								personalblk.bahasa as blk_bahasa,
								personalblk.eksnon as blk_eksnon,
								personalblk.cluster as blk_cluster,
								personalblk.ranjangtgl as ranjang_tgl,

								personalblk.nama as hk_nama,
								personalblk.pemilik as hk_pemilik,
								personalblk.sponsor as hk_sponsor,
								personalblk.nodisnaker as hk_nodisnaker,
								personalblk.tempatlahir as hk_tempatlahir,
								personalblk.tanggallahir as hk_tanggallahir,
								personalblk.jeniskelamin as hk_jeniskelamin,
								personalblk.alamat as hk_alamat,
								personalblk.notelp as hk_notelp,
								personalblk.pendidikan as hk_pendidikan,
								personalblk.noktp as hk_noktp,
								personalblk.negara as hk_negara,
								personalblk.nopaspor as hk_nopaspor,
								personalblk.statterbang as hk_statterbang,
								personalblk.foto as hk_foto,

								blk_pemilik.isi as pemilikx, 
								blk_pemilik.negara as negarapemilikx,
								blk_no_ranjang.kode_no_ranjang as ranjang_kode,
								blk_no_ranjang.lokasi as ranjang_lokasi,
								blk_no_ranjang.ranjang as ranjang_nama,
								blk_no_ranjang.id_no_ranjang as ranjang_id,

								blk_sektor_tki.nama_sektor as nama_sektor_tki

			 					FROM personalblk 
			 					LEFT JOIN medical
								ON personalblk.nodaftar=medical.id_biodata
								LEFT JOIN medical2
								ON personalblk.nodaftar=medical2.id_biodata
								LEFT JOIN medical3
								ON personalblk.nodaftar=medical3.id_biodata 
								LEFT JOIN blk_pemilik
								ON personalblk.pemilik=blk_pemilik.id_pemilik 
								LEFT JOIN blk_instruktur
								ON personalblk.cekins=blk_instruktur.id_instruktur
								LEFT JOIN blk_no_ranjang
								ON personalblk.ranjangno=blk_no_ranjang.id_no_ranjang 
								LEFT JOIN blk_sektor_tki 
								ON personalblk.sektor_tki=blk_sektor_tki.id_sektor_tki 
								where nodaftar='".$pilihan."'";
			 	$data_personal = "SELECT 
			 						datasponsor.kode_sponsor as personal_kodespons,
			 						datasponsor.nama as personal_namaspons,
			 						personal.nama as personal_nama,
			 						personal.tempatlahir as personal_tempatlahir,
			 						personal.tgllahir as personal_tgllahir,
			 						personal.jeniskelamin as personal_jk,
			 						disnaker.alamat as disnaker_alamat,
			 						personal.notelp as personal_notelp,
			 						personal.notelpkel as personal_notelpkel,
			 						personal.pendidikan as personal_pendidikan, 
			 						disnaker.noktp as disnaker_noktp,
			 						disnaker.nodisnaker as disnaker_nodisnaker,
			 						disnaker.negara as disnaker_negara,
			 						paspor.nopaspor as paspor_nopaspor,
			 						personal.statterbang as personal_statterbang,
			 						personal.tanggaldaftar as personal_tgldaftar
								 	FROM personal 
			 						LEFT JOIN disnaker
									ON personal.id_biodata=disnaker.id_biodata
									LEFT JOIN datasponsor
									ON personal.kode_sponsor=datasponsor.kode_sponsor
									LEFT JOIN paspor
									ON personal.id_biodata=paspor.id_biodata
								 	where personal.id_biodata='".$pilihan."'";

			 	$data['data_personalblk'] 	= $this->M_blk_personaldetail->select_row($personalblk);
			 	$data['data_personal'] 		= $this->M_blk_personaldetail->select_row($data_personal);
			 	//$data['data_personalblk'] 		= $this->M_blk_personaldetail->select_row($data_personalblk_get);
				$data['tglawalfinger'] 		= $this->M_blk_personaldetail->tglawalfinger($pilihan);
				$data['tampil_angkatan'] 	= $this->M_blk_personaldetail->t_angkatan($pilihan);
				
				$data['hitunganfingernodaft'] = $this->M_blk_personaldetail->hitunganfingernodaft($pilihan);
				$data['hitunganfingernodaftujuh'] = $this->M_blk_personaldetail->hitunganfingernodaftujuh($pilihan);
				$data['hitunganfingernodafbelas'] = $this->M_blk_personaldetail->hitunganfingernodafbelas($pilihan);
				
				$data['ujk_pengajuan'] = $this->M_blk_personaldetail->ujk_pengajuan($pilihan);
				$data['ujk_keluar'] = $this->M_blk_personaldetail->ujk_keluar($pilihan);
				$data['ujk_ujian'] = $this->M_blk_personaldetail->ujk_ujian($pilihan);
				$data['ujk_namalsp'] = $this->M_blk_personaldetail->ujk_namalsp($pilihan);
				$data['ujk_noserlok'] = $this->M_blk_personaldetail->ujk_noserlok($pilihan);
				$data['kelulusan'] = $this->M_blk_personaldetail->kelulusan($pilihan);
				
				$data['ujk_noresibayar'] = $this->M_blk_personaldetail->ujk_noresibayar($pilihan);
				$data['ujk_noinvoice'] = $this->M_blk_personaldetail->ujk_noinvoice($pilihan);
				
				$data['jmlfingerpagi'] = $this->M_blk_personaldetail->jmlfingerpagi($pilihan);
				$data['jmlfingersore'] = $this->M_blk_personaldetail->jmlfingersore($pilihan);

				
			 	$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();
				$data['tampil_data_adm'] = $this->M_blk_personaldetail->tampil_data_adm();
				$data['tampil_data_mark'] = $this->M_blk_personaldetail->tampil_data_mark();
				$data['tampil_data_izin_keperluan']	= $this->M_blk_personaldetail->tampil_data_izin_keperluan();

			 	$data['tampil_data_kb'] = $this->M_blk_personaldetail->tampil_data_kb($idbio);

			 	$data['tampil_data_izin_keluar'] = $this->M_blk_personaldetail->tampil_data_izin_keluar($idbio);
				$data['hitung_data_terlambat'] = $this->M_blk_personaldetail->hitung_data_terlambat($idbio);

				$data['tampil_data_izin_inap'] = $this->M_blk_personaldetail->tampil_data_izin_inap($idbio);
				$data['hitung_data_terlambatinap'] = $this->M_blk_personaldetail->hitung_data_terlambatinap($idbio);

				$data['tampil_data_izin_pulang'] = $this->M_blk_personaldetail->tampil_data_izin_pulang($idbio);
				$data['hitung_data_terlambatpulang'] = $this->M_blk_personaldetail->hitung_data_terlambatpulang($idbio);

				$data['tampil_data_izin_tdk_hadir'] = $this->M_blk_personaldetail->tampil_data_izin_tdk_hadir($idbio);

				$data['tampil_aspek'] = $this->M_blk_personaldetail->tampil_aspek();
				$data['tampil_pilihan'] = $this->M_blk_personaldetail->tampil_pilihan();
				$data['tampil_tempatpkl'] = $this->M_blk_personaldetail->tampil_tempatpkl();
				$data['tampil_hasilpkl'] = $this->M_blk_personaldetail->tampil_hasilpkl($idbio);

				$data['tampil_data_Jenis_kb'] = $this->M_blk_personaldetail->tampil_data_Jenis_kb();

			 	$data['tampil_data_pemilik_tki'] = $this->M_blk_personaldetail->tampil_data_pemilik_tki();
			 	$data['tampil_data_jk_tki'] = $this->M_blk_personaldetail->tampil_data_jk_tki();
			 	$data['tampil_data_negara_tki'] = $this->M_blk_personaldetail->tampil_data_negara_tki();
			 	$data['tampil_data_bahasa_tki'] = $this->M_blk_personaldetail->tampil_data_bahasa_tki();
			 	$data['tampil_data_eksnon_tki'] = $this->M_blk_personaldetail->tampil_data_eksnon_tki();
			 	$data['tampil_data_cluster_tki'] = $this->M_blk_personaldetail->tampil_data_cluster_tki();
				$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();
				$data['tampil_data_ranjang'] = $this->M_blk_personaldetail->tampil_data_ranjang();

			 	$data['tampil_data_sponsor'] 		= $this->M_blk_personaldetail->tampil_data_sponsor();

			 	$sql0 = "SELECT sektor_tki FROM personalblk where nodaftar='".$idbio."'";
			 	$data['sektor_tki']     = $this->M_session->select_row($sql0)->sektor_tki;

			 	$sql1 = "SELECT * FROM blk_sektor_tki";
			 	$data['tampil_data_sektor_tki']     = $this->M_session->select($sql1);

				$adm_tglreg = $this->M_blk_personaldetail->adm_tglreg($pilihan);
				if($adm_tglreg==''){
					$data['tglns'] = $adm_tglreg;
				} else {
					$date1 = date('Y-m-d');
					$date2 = $adm_tglreg;
					$data['tglns'] = $this->M_blk_personaldetail->hitunganfinger($date1,$date2,$pilihan);
				}
				$data['namamodule'] = "blk_personaldetail";
				$data['namafileview'] = "blk_personaldetail";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}
	function index2($pilihan){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;


				$data['tampil_data_blk_personaldetail'] = $this->M_blk_personaldetail->tampil_data_blk_personal($pilihan);
				

				$data['namamodule'] = "blk_personaldetail";
				$data['namafileview'] = "blk_personaldetail";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

		function pembinaan($pilihan,$form=NULL){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;
				$data['collapse_form'] = $form;

				$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();
			 	$data['tampil_data_instruktur_ls'] = $this->M_blk_personaldetail->tampil_data_instruktur_ls();
				$data['tampil_data_adm'] = $this->M_blk_personaldetail->tampil_data_adm();
				$data['tampil_data_adm2'] = $this->M_blk_personaldetail->tampil_data_adm2();
				//$data['tampil_data_satpam'] = $this->M_session->select(" SELECT * FROM blk_satpam");
				$data['tampil_data_mark'] = $this->M_blk_personaldetail->tampil_data_mark();
				$data['tampil_data_izin_keperluan']	= $this->M_blk_personaldetail->tampil_data_izin_keperluan();
			 	$data['tampil_data_kb'] = $this->M_blk_personaldetail->tampil_data_kb($idbio);
				$data['tampil_data_piketdapurblk'] = $this->M_blk_personaldetail->tampil_data_piketdapurblk($idbio);
			 	
				$data['tampil_data_piketdapur'] = $this->M_blk_personaldetail->tampil_data_piketdapur($idbio);
				$data['tampil_data_piketdapur_sore'] = $this->M_blk_personaldetail->tampil_data_piketdapur_sore($idbio);
				
				$data['tampil_data_konseling'] = $this->M_blk_personaldetail->tampil_data_konseling($idbio);
				$data['tampil_data_kejadiansakit'] = $this->M_blk_personaldetail->tampil_data_kejadiansakit($idbio);

			 	$data['tampil_data_izin_keluar'] = $this->M_blk_personaldetail->tampil_data_izin_keluar($idbio);
				$data['hitung_data_terlambat'] = $this->M_blk_personaldetail->hitung_data_terlambat($idbio);
				$data['tampil_data_ditemani'] = $this->M_session->select(" SELECT * FROM personalblk");

				$data['tampil_data_izin_inap'] = $this->M_blk_personaldetail->tampil_data_izin_inap($idbio);
				$data['hitung_data_terlambatinap'] = $this->M_blk_personaldetail->hitung_data_terlambatinap($idbio);

				$data['tampil_data_izin_pulang'] = $this->M_blk_personaldetail->tampil_data_izin_pulang($idbio);
				$data['hitung_data_terlambatpulang'] = $this->M_blk_personaldetail->hitung_data_terlambatpulang($idbio);

				$data['tampil_data_izin_tdk_hadir'] = $this->M_blk_personaldetail->tampil_data_izin_tdk_hadir($idbio);

				$data['tampil_data_Jenis_kb'] = $this->M_blk_personaldetail->tampil_data_Jenis_kb();

			 	$data['tampil_data_kejadian'] = $this->M_session->select(" SELECT 
			 		a.*,
			 		concat('(',b.kode_adm_kantor,') ',b.nama) as adm, 
			 		concat('(',c.kode_marketing,') ',c.nama) as mark, 
			 		concat('(',d.kode_instruktur,') ',d.nama) as blk
			 		FROM blk_kejadian a 
			 		LEFT JOIN blk_adm_kantor b 
			 		ON a.adm=b.id_adm_kantor
			 		LEFT JOIN blk_marketing c 
			 		ON a.adm=c.id_marketing
			 		LEFT JOIN blk_instruktur d 
			 		ON a.adm=d.id_instruktur
			 		where a.idbio='$pilihan' ");
				
			 	$personalblk = "SELECT 
								medical.tanggal as med_pra_tgl,
								medical2.tanggal as med_prafull_tgl,
								medical2.tglsidik as med_prafull_sidik,
								medical3.tanggal as med_full_tgl,
								medical3.tglsidik as med_full_sidik,
								blk_instruktur.nama as insnya,
								personalblk.nodaftar as blk_nodaftar,
								personalblk.adm_tglreg as blk_adm_tglreg,
								personalblk.cektgl as blk_cektgl,
								personalblk.cekins as blk_cekins,
								personalblk.cekket as blk_cekket,
								personalblk.bahasa as blk_bahasa,
								personalblk.eksnon as blk_eksnon,
								personalblk.cluster as blk_cluster,
								personalblk.ranjangtgl as ranjang_tgl,

								personalblk.nama as hk_nama,
								personalblk.pemilik as hk_pemilik,
								personalblk.sponsor as hk_sponsor,
								personalblk.nodisnaker as hk_nodisnaker,
								personalblk.tempatlahir as hk_tempatlahir,
								personalblk.tanggallahir as hk_tanggallahir,
								personalblk.jeniskelamin as hk_jeniskelamin,
								personalblk.alamat as hk_alamat,
								personalblk.notelp as hk_notelp,
								personalblk.pendidikan as hk_pendidikan,
								personalblk.noktp as hk_noktp,
								personalblk.negara as hk_negara,
								personalblk.nopaspor as hk_nopaspor,

								blk_pemilik.isi as pemilikx, 
								blk_pemilik.negara as negarapemilikx,
								blk_no_ranjang.kode_no_ranjang as ranjang_kode,
								blk_no_ranjang.lokasi as ranjang_lokasi,
								blk_no_ranjang.ranjang as ranjang_nama,
								blk_no_ranjang.id_no_ranjang as ranjang_id

			 					FROM personalblk 
			 					LEFT JOIN medical
								ON personalblk.nodaftar=medical.id_biodata
								LEFT JOIN medical2
								ON personalblk.nodaftar=medical2.id_biodata
								LEFT JOIN medical3
								ON personalblk.nodaftar=medical3.id_biodata 
								LEFT JOIN blk_pemilik
								ON personalblk.pemilik=blk_pemilik.id_pemilik 
								LEFT JOIN blk_instruktur
								ON personalblk.cekins=blk_instruktur.id_instruktur
								LEFT JOIN blk_no_ranjang
								ON personalblk.ranjangno=blk_no_ranjang.id_no_ranjang
								where nodaftar='".$pilihan."'";
			 	$data_personal = "SELECT 
			 						datasponsor.kode_sponsor as personal_kodespons,
			 						datasponsor.nama as personal_namaspons,
			 						personal.nama as personal_nama,
			 						personal.tempatlahir as personal_tempatlahir,
			 						personal.tgllahir as personal_tgllahir,
			 						personal.jeniskelamin as personal_jk,
			 						disnaker.alamat as disnaker_alamat,
			 						personal.notelp as personal_notelp,
			 						personal.notelpkel as personal_notelpkel,
			 						personal.pendidikan as personal_pendidikan, 
			 						disnaker.noktp as disnaker_noktp,
			 						disnaker.nodisnaker as disnaker_nodisnaker,
			 						disnaker.negara as disnaker_negara,
			 						paspor.nopaspor as paspor_nopaspor
								 	FROM personal 
			 						LEFT JOIN disnaker
									ON personal.id_biodata=disnaker.id_biodata
									LEFT JOIN datasponsor
									ON personal.kode_sponsor=datasponsor.kode_sponsor
									LEFT JOIN paspor
									ON personal.id_biodata=paspor.id_biodata
								 	where personal.id_biodata='".$pilihan."'";

			 	$data['data_personalblk'] 	= $this->M_blk_personaldetail->select_row($personalblk);
			 	$data['data_personal'] 		= $this->M_blk_personaldetail->select_row($data_personal);
			 	
				 
				//$data['tampil_data_blk_personaldetail'] = $this->M_blk_personaldetail->tampil_data_blk_personal($pilihan);
				$data['jmlfingerpagi'] = $this->M_blk_personaldetail->jmlfingerpagi($pilihan);
				$data['jmlfingersore'] = $this->M_blk_personaldetail->jmlfingersore($pilihan);

				$data['tampil_aspek'] = $this->M_blk_personaldetail->tampil_aspek();
				$data['tampil_pilihan'] = $this->M_blk_personaldetail->tampil_pilihan();
				$data['tampil_tempatpkl'] = $this->M_blk_personaldetail->tampil_tempatpkl();
				$data['tampil_hasilpkl'] = $this->M_blk_personaldetail->tampil_hasilpkl($idbio);

				$adm_tglreg = $this->M_blk_personaldetail->adm_tglreg($pilihan);
				if($adm_tglreg==''){
					$data['tglns'] = $adm_tglreg;
				}else{
					$date1 = date('Y-m-d');
					$date2 = $adm_tglreg;
					$data['tglns'] = $this->M_blk_personaldetail->hitunganfinger($date1,$date2,$pilihan);
				}

				$data['tglawalfinger'] = $this->M_blk_personaldetail->tglawalfinger($pilihan);
				$data['hitunganfingernodaft'] = $this->M_blk_personaldetail->hitunganfingernodaft($pilihan);
				$data['hitunganfingernodaftujuh'] = $this->M_blk_personaldetail->hitunganfingernodaftujuh($pilihan);
				$data['hitunganfingernodafbelas'] = $this->M_blk_personaldetail->hitunganfingernodafbelas($pilihan);

			 	$data['tampil_data_pemilik_tki'] = $this->M_blk_personaldetail->tampil_data_pemilik_tki();
			 	$data['tampil_data_jk_tki'] = $this->M_blk_personaldetail->tampil_data_jk_tki();
			 	$data['tampil_data_negara_tki'] = $this->M_blk_personaldetail->tampil_data_negara_tki();
			 	$data['tampil_data_bahasa_tki'] = $this->M_blk_personaldetail->tampil_data_bahasa_tki();
			 	$data['tampil_data_eksnon_tki'] = $this->M_blk_personaldetail->tampil_data_eksnon_tki();
			 	$data['tampil_data_cluster_tki'] = $this->M_blk_personaldetail->tampil_data_cluster_tki();
				$data['tampil_data_instruktur'] = $this->M_blk_personaldetail->tampil_data_instruktur();
				$data['tampil_data_ranjang'] = $this->M_blk_personaldetail->tampil_data_ranjang();

				$data['tampil_data_pmi'] = $this->M_session->select("SELECT * FROM personalblk ORDER BY nodaftar ASC");

				$data['namamodule'] = "blk_personaldetail";
				$data['namafileview'] = "blk_administrasidetail";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

		function setpilih($pilihan){
		$this->session->set_userdata('pilsektor', $pilihan);
		redirect('blk_personaldetail/');
	}

	function simpan_data_blk_personaldetail(){
		$this->M_blk_personaldetail->simpan_data_blk_personaldetail();

		redirect('blk_personaldetail');
	}

	function update_data_blk_personaldetail() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_personaldetail();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_personaldetailhk() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_blk_personaldetailhk();
		redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_koreksi() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_blk_koreksi();
		redirect('blk_personaldetail/index/'.$id);
	}

	function simpan_data_piketdapur() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_piketdapur();
		redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_piketdapur() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_piketdapur();
		redirect('blk_personaldetail/index/'.$id);
	}

	function simpan_data_kejadiansakit() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_kejadiansakit();
		redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_kejadiansakit() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_kejadiansakit();
		redirect('blk_personaldetail/index/'.$id);
	}

	function simpan_data_konseling() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_konseling();
		redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_konseling() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_konseling();
		redirect('blk_personaldetail/index/'.$id);
	}
	
	function update_data_blk_registrasi() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_registrasi();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_ranjang() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_ranjang();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_blk_cek() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_blk_cek();
			redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_angkatan() {
		$id = $this->input->post('id_personalblk');
			$this->M_blk_personaldetail->update_data_angkatan();
			redirect('blk_personaldetail/index/'.$id);
	}


	function hapus_data_blk_personaldetail() {
		$this->M_blk_personaldetail->hapus_data_blk_personaldetail();
		redirect('blk_personaldetail');
	}

//--------------------------------------------------------------------
	function simpan_data_kb(){
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_kb();
		redirect('blk_personaldetail/pembinaan/'.$id.'/kb');
	}

	function update_data_kb() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_kb();
		redirect('blk_personaldetail/pembinaan/'.$id.'/kb');
	}

	function hapus_data_kb() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_kb();
		redirect('blk_personaldetail/pembinaan/'.$id.'/kb');
	}


	function simpan_data_izin_keluar(){
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_izin_keluar();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ik');
	}

	function update_data_izin_keluar($id_izin_keluar) {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_izin_keluar($id_izin_keluar);
		redirect('blk_personaldetail/pembinaan/'.$id.'/ik');	
	}

	function hapus_data_izin_keluar() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_izin_keluar();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ik');	
	}



function simpan_data_izin_inap(){
	$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_izin_inap();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ii');	
	}

	function update_data_izin_inap() {
		$id = $this->input->post('id_personalblk');
		$id_izin_inap = $this->input->post('id_izin_inap');
		$this->M_blk_personaldetail->update_data_izin_inap($id_izin_inap);
		redirect('blk_personaldetail/pembinaan/'.$id.'/ii');	
	}

	function hapus_data_izin_inap() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_izin_inap();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ii');	
	}



	function simpan_data_izin_pulang(){
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_izin_pulang();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ip');
	}

	function update_data_izin_pulang() {
		$id = $this->input->post('id_personalblk');
		$id_izin_pulang = $this->input->post('id_izin_pulang');
		$this->M_blk_personaldetail->update_data_izin_pulang($id_izin_pulang);
		redirect('blk_personaldetail/pembinaan/'.$id.'/ip');
	}

	function hapus_data_izin_pulang() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_izin_pulang();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ip');
	}

		function simpan_data_izin_tdk_hadir(){
			$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_izin_tdk_hadir();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ith');
	}

	function update_data_izin_tdk_hadir() {
				$id = $this->input->post('id_personalblk');
		$id_izin_tdk_hadir = $this->input->post('id_izin_tdk_hadir');
				$this->M_blk_personaldetail->update_data_izin_tdk_hadir($id_izin_tdk_hadir);
			redirect('blk_personaldetail/pembinaan/'.$id.'/ith');
	}

	function hapus_data_izin_tdk_hadir() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_izin_tdk_hadir();
		redirect('blk_personaldetail/pembinaan/'.$id.'/ith');
	}

	//===================================================== PKL =========================================================//

	function simpan_data_pkl(){
		$id 			= $this->input->post('id_personalblk');
		$id_tempatpkl 	= $this->input->post('id_tempatpkl');
		$tgl_mulai 		= $this->input->post('tgl_mulai');
		$tgl_selesai 	= $this->input->post('tgl_selesai');
		$jml_hari		= ((abs(strtotime ($tgl_mulai) - strtotime ($tgl_selesai)))/(60*60*24));
		$id_instruktur 	= $this->input->post('id_instruktur');
		$no_resi		= $this->input->post('no_resi');
		$nominal 		= $this->input->post('nominal');
		$kepada 		= $this->input->post('kepada');
		$catatan 		= $this->input->post('catatan');
		$cek_pklke 	= $this->M_blk_personaldetail->cek_pklke($id);
		if ($cek_pklke == 0) {
			$this->M_blk_personaldetail->new_pklke($id);
		} 
		$pklke = $this->M_blk_personaldetail->pklke($id)->nonext;
		$this->M_blk_personaldetail->update_pklke($id);
		$data = array(
			'id_personalblk' => $id,
			'id_tempatpkl' => $id_tempatpkl,
			'tgl_mulai' => $tgl_mulai,
			'tgl_selesai' => $tgl_selesai,
			'jml_hari' => $jml_hari,
			'id_instruktur' => $id_instruktur,
			'no_resi' => $no_resi,
			'nominal' => $nominal,
			'pkl_ke' => $pklke, 
			'kepada' => $kepada,
			'catatan' => $catatan
			);
		$this->M_blk_personaldetail->simpan_data_pkl($data);
		$id_pkl = $this->M_blk_personaldetail->last_hasilpkl()->id_pkl;
		$tampil_materi = $this->M_blk_personaldetail->tampil_materi_all();
		foreach ($tampil_materi as $row) {
			$id_nilai = $this->input->post('id_nilai'.$row->id_materipkl);
			$penjelasan = $this->input->post('penjelasan'.$row->id_materipkl);
			$data1 = array(
				'id_pkl' => $id_pkl,
				'id_nilai' => $id_nilai,
				'id_materipkl' => $row->id_materipkl,
				'penjelasan' => $penjelasan, 
				);
			$this->M_blk_personaldetail->simpan_penilaian($data1);
		}
		redirect('blk_personaldetail/pembinaan/'.$id.'/pkl');
	}

	function hapus_data_pkl(){
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_pkl();
		redirect('blk_personaldetail/pembinaan/'.$id.'/pkl');
	}
	function update_data_pkl(){
		$id = $this->input->post('id_personalblk');
		$id_pkl 		= $this->input->post('id_pkl'); 
		$id_tempatpkl 	= $this->input->post('id_tempatpkl');
		$tgl_mulai 		= $this->input->post('tgl_mulai');
		$tgl_selesai 	= $this->input->post('tgl_selesai');
		$jml_hari		= ((abs(strtotime ($tgl_mulai) - strtotime ($tgl_selesai)))/(60*60*24));
		$id_instruktur 	= $this->input->post('id_instruktur');
		$no_resi		= $this->input->post('no_resi');
		$nominal 		= $this->input->post('nominal');
		$kepada 		= $this->input->post('kepada');
		$catatan 		= $this->input->post('catatan');
		$data = array(
			'id_tempatpkl' => $id_tempatpkl,
			'tgl_mulai' => $tgl_mulai,
			'tgl_selesai' => $tgl_selesai,
			'jml_hari' => $jml_hari,
			'id_instruktur' => $id_instruktur,
			'no_resi' => $no_resi,
			'nominal' => $nominal,
			'kepada' => $kepada,
			'catatan' => $catatan
			);
		$this->M_blk_personaldetail->update_data_pkl($data, $id_pkl);
		$tampil_materi = $this->M_blk_personaldetail->tampil_materi_all();
		foreach ($tampil_materi as $row) {
			$id_nilai = $this->input->post('id_nilai'.$row->id_materipkl);
			$penjelasan = $this->input->post('penjelasan'.$row->id_materipkl);
			$this->M_blk_personaldetail->update_penilaian($id_nilai, $penjelasan, $id_pkl, $row->id_materipkl);
		}
		redirect('blk_personaldetail/pembinaan/'.$id.'/pkl');
	}


		function cetak_pkl($idblk) {

	$ambilprint	= $this->M_blk_personaldetail->ambilprint($idblk);

	
	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$document = $PHPWord->loadTemplate('files/appkl.docx');
	// $document->setValue('Value1','mengos');
	// $document->setValue('Value2','temen');

	foreach($ambilprint->result() as $row) {
	$document->setValue('Value1',$row->no_resi);
	$document->setValue('Value2',$row->tgl_selesai);
	$document->setValue('Value3',$row->kepada);
	$document->setValue('value4',$row->nodisnaker);
	$document->setValue('value5',$row->nodaftar);
	$document->setValue('value6',$row->nama);
	$document->setValue('value7',$row->negara);
	$document->setValue('value8',$row->nama_tempat);
	$document->setValue('value9',$row->tgl_mulai);
	$document->setValue('value10',$row->tgl_selesai);
	$document->setValue('value11',$row->nominal);
	$document->setValue('value12',$row->nominal);
	// $document->setValue('value2',$row->nama_per);
	// $document->setValue('value3',$row->tempatlahir);
	// $document->setValue('value4',$tanggallahir);
	// $document->setValue('value5',$tanggalmasuk);
	// $document->setValue('value6',$tanggalkeluar);
	// $document->setValue('value7',$tanggalkeluar);
	// $document->setValue('lulus',$row->statujk);
	
	}    

 
	$filename = 'filenya.docx';

	$isinya=$document->save($filename);
	header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $isinya . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		
	flush();
	readfile($isinya);
	unlink($isinya); // deletes the temporary file
	exit;
}

	function update_data_statterbang() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_statterbang();
		redirect('blk_personaldetail/index/'.$id);
	}

	function update_data_sektor_tki() {
		$id = $this->input->post('id_personalblk');

		$data = array(
			'sektor_tki' => $this->input->post('sektor_tki')
		);

		$this->M_session->update($data, 'personalblk', $id, 'nodaftar');
		redirect('blk_personaldetail/index/'.$id);
	}

	//=========================================================================================================================//

	function simpan_data_kejadian(){
		$data = array (
			'idbio' => $this->input->post('id_personalblk'),
			'tanggal' => $this->input->post('tgl'),
			'kejadian' => $this->input->post('kejadian'),
			'adm' => $this->input->post('adm'),
			'mark' => $this->input->post('mark'),
			'blk' => $this->input->post('blk')
		);
		$this->M_session->insert($data, 'blk_kejadian');
		redirect('blk_personaldetail/pembinaan/'.$this->input->post('id_personalblk').'/kejadian');
	}

	function update_data_kejadian() {
		$id = $this->input->post('idz');
		$data = array (
			'idbio' => $this->input->post('id_personalblk'),
			'tanggal' => $this->input->post('tgl'),
			'kejadian' => $this->input->post('kejadian'),
			'adm' => $this->input->post('adm'),
			'mark' => $this->input->post('mark'),
			'blk' => $this->input->post('blk')
		);
		$this->M_session->update($data, 'blk_kejadian', $id, 'id');
		redirect('blk_personaldetail/pembinaan/'.$this->input->post('id_personalblk').'/kejadian');
	}

	function hapus_data_kejadian() {
		$id = $this->input->post('idz');
		$this->M_session->delete('blk_kejadian', $id, 'id');
		redirect('blk_personaldetail/pembinaan/'.$this->input->post('id_personalblk').'/kejadian');
	}

	public function settingfinger($type, $id)
	{
		if ($type == 1)
		{
			if ($this->M_session->select_count('datafinger where idblk = "'.$id.'"') == 1 )
			{
				$this->M_session->delete('datafinger', $id, 'idblk');
			}
		}
		if ($type == 2)
		{
			if ($this->M_session->select_count('datafinger where idblk = "'.$id.'"') == 1 )
			{
				$this->M_session->delete('datafinger', $id, 'idblk');
			}
			if ($this->M_session->select_count('tblattendance where idblk = "'.$id.'"') == 1 )
			{
				$this->M_session->delete('tblattendance', $id, 'idblk');
			}
		}

		redirect('blk_personaldetail/index/'.$id);
	}

	function simpan_data_piketdapurblk(){
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->simpan_data_piketdapurblk();
		redirect('blk_personaldetail/pembinaan/'.$id);
	}

	function update_data_piketdapurblk() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->update_data_piketdapurblk();
		redirect('blk_personaldetail/pembinaan/'.$id);
	}

	function hapus_data_piketdapurblk() {
		$id = $this->input->post('id_personalblk');
		$this->M_blk_personaldetail->hapus_data_piketdapurblk();
		redirect('blk_personaldetail/pembinaan/'.$id);
	}


}