<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailbio_print extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		}		
		if ($id_user && $status!=1){
			redirect('dashboard');
		}		
	}

    function biodata_word() { 
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord 	= new PHPWord();

		$id 		= $this->session->userdata("detailuser");

		$datapersonal = $this->M_session->select_row("Select * from personal where id_biodata='$id'");

		$negara1 	= "";
		$negara2 	= "";
		$calling1 	= "";
		$skill1 	= "";
		$skill2 	= "";
		$skill3 	= "";
		if ( $datapersonal != NULL )
		{
			$negara1 	= $datapersonal->negara1;
			$negara2 	= $datapersonal->negara2;
			$calling1 	= $datapersonal->calling;
			$skill1 	= $datapersonal->skill1;
			$skill2 	= $datapersonal->skill2;
			$skill3 	= $datapersonal->skill3;
		}

		if ($skill1 == '') 
		{
			$tampilidbio = $id.''.$negara1.''.$negara2.''.$calling1.''.$skill1.''.$skill2.''.$skill3;
		} 
		else 
		{
			$tampilidbio = $id.''.$negara1.''.$negara2.''.$calling1.'-'.$skill1.''.$skill2.''.$skill3;
		}

		$rowpersonal 	= $this->M_session->select_row("SELECT personal.*,YEAR(CURDATE()) - YEAR(tgllahir) AS umur,datapendidikan.mandarin as pendidikan_mandarin FROM personal LEFT JOIN datapendidikan ON personal.pendidikan=datapendidikan.isi WHERE id_biodata='".$id."'");
		$rowfamily  	= $this->M_session->select_row("SELECT * FROM family WHERE id_biodata='".$id."'");
		$rowworking2 	= $this->M_session->select("SELECT * FROM working INNER JOIN kategoripekerjaan ON kategoripekerjaan.id_kategori=working.jenis_usaha WHERE id_biodata='".$id."' ORDER BY tahun ASC");
		$rowskill 		= $this->M_session->select_row("SELECT * FROM skillcondition WHERE id_biodata='".$id."'");
		$rowpaspor 		= $this->M_session->select_row("SELECT *,DATE_ADD(tglterbit, INTERVAL 5 YEAR) as expired FROM paspor WHERE id_biodata='".$id."'");
		$rowmajikan		= $this->M_session->select_row("SELECT kode_agen, kode_majikan, namamajikan FROM majikan WHERE id_biodata='".$id."'");

		$tampil_data_medical 	= $this->M_session->select_row("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical WHERE id_biodata='".$id."'  ORDER BY id_medical ASC LIMIT 1");
		$tampil_data_medical2 	= $this->M_session->select_row("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical2 WHERE id_biodata='".$id."'  ORDER BY id_medical ASC LIMIT 1");
		$tampil_data_medical3 	= $this->M_session->select_row("SELECT *,tanggal + INTERVAL '3' MONTH as expired FROM medical3 WHERE id_biodata='".$id."'  ORDER BY id_medical ASC LIMIT 1");
		
		$kode_agen 		= "";
		$kode_maji 		= "";
		$nm_agen 		= "";
		$nm_maji 		= "";
		if ($rowmajikan != NULL) 
		{
			$kode_agen 		= $rowmajikan->kode_agen;
			$kode_maji 		= $rowmajikan->kode_majikan;
			$nm_agen 		= "";
			$nm_maji 		= $rowmajikan->namamajikan;

			if ($kode_agen != 0) {
				$nm_agen2 		= $this->M_session->select_row("SELECT kode_agen FROM dataagen WHERE id_agen='".$id."'");
				if ( $nm_agen2 != NULL )
				{
					$nm_agen = $nm_agen2->kode_agen;
				}
			}

			if ($kode_maji != 0) {
				$nm_maji2 		= $this->M_session->select_row("SELECT kode_majikan FROM datamajikan WHERE id_majikan='".$id."'");
				if ( $nm_maji2 != NULL )
				{
					$nm_maji = $nm_maji2->kode_majikan;
				}
			}
		} 
		
		$personal_ks = "";
		$personal_nm = "";
		$personal_md = "";
		$personal_td = "";
		$personal_jk = "";

		$personal_tg = "";
		$personal_wn = "";
		$personal_br = "";
		$personal_tl = "";
		$personal_ag = "";
		$personal_te = "";

		$personal_st = "";
		$personal_um = "";
		$personal_mn = "";
		$personal_pd = "";
		$personal_at = "";
		$personal_pv = "";
		$personal_mi = "";
		$personal_ig = "";
		$personal_b1 = "";
		$personal_b2 = "";
		$personal_b3 = "";

		$personal_kt = "";
		$personal_nt = "";
		$personal_nk = "";

		$personal_b5 = "";

		if ($rowpersonal != NULL) 
		{
			$personal_ks = $rowpersonal->kode_sponsor;
			$personal_nm = $rowpersonal->nama;
			$personal_md = $rowpersonal->nama_mandarin;
			$personal_td = $rowpersonal->tanggaldaftar;
			$personal_jk = $rowpersonal->jeniskelamin;

			$personal_tg = $rowpersonal->tinggi;
			$personal_wn = $rowpersonal->warganegara;
			$personal_br = $rowpersonal->berat;
			$personal_tl = $rowpersonal->tgllahir;
			$personal_ag = $rowpersonal->agama;
			$personal_te = $rowpersonal->tempatlahir;

			$personal_st = $rowpersonal->status;
			$personal_um = $rowpersonal->umur;
			$personal_mn = $rowpersonal->tglmenikah;
			$personal_pd = $rowpersonal->pendidikan.' '.$rowpersonal->pendidikan_mandarin;
			$personal_at = $rowpersonal->alamat;
			$personal_pv = $rowpersonal->provinsi;
			$personal_mi = $rowpersonal->mandarin;
			$personal_ig = $rowpersonal->inggris;
			$personal_b1 = $rowpersonal->taiyu;
			$personal_b2 = $rowpersonal->cantonese;
			$personal_b3 = $rowpersonal->hakka;

			$personal_kt = $rowpersonal->keterangan;
			$personal_nt = $rowpersonal->notelp;
			$personal_nk = $rowpersonal->notelpkel;

			$personal_b5 = $rowpersonal->lokasikerja;
		}


		$family_nama_bapak 		= "";
		$family_umur_bapak 		= "";
		$family_kerja_bapak 	= "";
		$family_nama_ibu 		= "";
		$family_umur_ibu 		= "";
		$family_kerja_ibu 		= "";
		$family_nama_is 		= "";
		$family_umur_is 		= "";
		$family_kerja_is 		= "";
		$family_saudara_lk 		= "";
		$family_saudara_pr 		= "";
		$family_anak_ke 		= "";
		$family_data_anak 		= "";
		if ($rowfamily != NULL) 
		{
			$family_nama_bapak 		= $rowfamily->nama_bapak;
			$family_umur_bapak 		= $rowfamily->umur_bapak.' tahun 嵗';
			$family_kerja_bapak 	= $rowfamily->kerja_bapak;
			$family_nama_ibu 		= $rowfamily->nama_ibu;
			$family_umur_ibu 		= $rowfamily->umur_ibu.' tahun 嵗';
			$family_kerja_ibu 		= $rowfamily->kerja_ibu;
			$family_nama_is 		= $rowfamily->nama_istri_suami;
			$family_umur_is 		= $rowfamily->umur_istri_suami.' tahun 嵗';
			$family_kerja_is 		= $rowfamily->kerja_istri_suami;
			$family_saudara_lk 		= $rowfamily->saudara_laki;
			$family_saudara_pr 		= $rowfamily->saudar_pr;
			$family_anak_ke 		= $rowfamily->anak_ke;
			$family_data_anak 		= $rowfamily->data_anak;
		}

		$skill_1 = '';
		$skill_2 = '';
		$skill_3 = '';
		$skill_4 = '';
		$skill_5 = '';
		$skill_6 = '';
		$skill_7 = '';
		$skill_8 = '';
		$skill_9 = '';
		$skill_10 = '';
		$skill_11 = '';
		$skill_12 = '';
		$skill_13 = '';
		if ($rowskill != NULL) {	
			$skill_1 = $rowskill->keterampilan;
			$skill_2 = $rowskill->hobi;
			$skill_3 = $rowskill->alkohol;
			$skill_4 = $rowskill->merokok;
			$skill_5 = $rowskill->food;
			$skill_6 = $rowskill->alergi;
			$skill_7 = 'Bisa mengangkat 能夠抱 '.$rowskill->angkat.' KG 公斤';
			$skill_8 = $rowskill->operasi;
			$skill_9 = 'Push up-推升 '.$rowskill->pushup;
			$skill_10 = $rowskill->tato;
			$skill_11 = $rowskill->peglihatan;
			$skill_12 = $rowskill->kidal;
			$skill_13 = $rowskill->butawarna;
		} 

		$op1 = " 沒有- BELUM ADA ";
		$op2 = " Rencana 安排 ";
		$op3 = $rowpaspor->tglterima;
		if($rowpaspor->keterangan == "sudah")
		{
			$op1 = " 有- ADA "; 
			$op2 = " 到期-Berlaku sampai";
			$op3 = $rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired);
		} 
		elseif($rowpaspor->keterangan=="mati") 
		{
			$op1 = " 護照关闭 - PASPOR MATI ";
			$op2 = " Rencana 安排 ";
			$op3 = $rowpaspor->tglterima;
		} 
		elseif($rowpaspor->keterangan=="exbio") 
		{
			$op1 = " 護照丟失 - EX BIOMETRI ";
			$op2 = " Rencana 安排 ";
			$op3 = $rowpaspor->tglterima;
		} 

		$mdc2 = "";
		if ( count($tampil_data_medical) != 0 )
		{
			$mdc2 = $tampil_data_medical->nama;
			
		} 
		if ( count($tampil_data_medical2) != 0 ) 
		{
			$mdc2 = $tampil_data_medical2->nama;
		}
		if ( count($tampil_data_medical3) != 0 ) 
		{
			$mdc2 = $tampil_data_medical3->nama;
		}

		$datagambar = "assets/uploads/profile.jpg";
		if ($rowpersonal->foto != NULL) 
		{
			if ( file_exists(FCPATH."assets/uploads/".$rowpersonal->foto) )
			{
				$datagambar = "assets/uploads/".$rowpersonal->foto;
			}
		}
		$photoProfile = array(
    		array(
    			'img' 	=> $datagambar,
				'size' 	=> array(245, 380)
	        )
	    );

		$exp_id		= substr($id, 0, 2);

		if ( $exp_id == 'MI' || $exp_id == 'MF' || $exp_id == 'FF' ) 
		{
			$document = $PHPWord->loadTemplate('files/admin_print_biodata_male.docx');

			$rowrequest 	= $this->M_session->select_row("SELECT * FROM request WHERE id_biodata='".$id."'");

			$req1 = '';
			$req2 = '';
			$req3 = '';
			$req4 = '';
			$req5 = '';
			$req6 = '';
			if ($rowrequest != NULL) 
			{
				$req1 = $rowrequest->usahamajikan;
				$req2 = $rowrequest->jenispekerjaan;
				$req3 = $rowrequest->waktukerja;
				$req4 = $rowrequest->lokasikerja;
				$req5 = $rowrequest->kondisikerja;
				$req6 = $rowrequest->lembur;
			}

			$document->replaceStrToImg( 'gambar', $photoProfile);

			$document->setValue('pinhou1', $tampilidbio);
			$document->setValue('pl1', $personal_ks);

			$document->setValue('value1', $nm_agen);
			$document->setValue('value2', $nm_maji);

			$document->setValue('value3', $personal_nm);
			$document->setValue('value3b', $personal_md);
			$document->setValue('value4', $personal_td);
			$document->setValue('value5', $personal_jk);
			$document->setValue('value6', $personal_tg);
			$document->setValue('value7', $personal_wn);
			$document->setValue('value8', $personal_br);
			$document->setValue('value9', $personal_tl);
			$document->setValue('value10', $personal_ag);
			$document->setValue('value11', $personal_te);
			$document->setValue('value12', $personal_st);
			$document->setValue('value13', $personal_um);
			$document->setValue('value13b', $personal_mn);
			$document->setValue('value14', $personal_pd);
			$document->setValue('value15', $personal_at);
			$document->setValue('value16', $personal_pv);
			$document->setValue('value17', $personal_mi);
			$document->setValue('value18', $personal_ig);

			$document->setValue('value19', $family_nama_bapak); 
			$document->setValue('value20', $family_umur_bapak); 
			$document->setValue('value21', $family_kerja_bapak); 
			$document->setValue('value22', $family_nama_ibu); 
			$document->setValue('value23', $family_umur_ibu); 
			$document->setValue('value24', $family_kerja_ibu); 
			$document->setValue('value25', $family_nama_is); 
			$document->setValue('value26', $family_umur_is); 
			$document->setValue('value27', $family_kerja_is); 
			$document->setValue('value28', $family_saudara_lk); 
			$document->setValue('value29', $family_saudara_pr); 
			$document->setValue('value30', $family_anak_ke);  
			$document->setValue('value31', $family_data_anak);

			$document->setValue('we1', '');
			$document->setValue('we2', '');
			$document->setValue('we3', '');
			$document->setValue('we4', '');
			$document->setValue('we5', '');
			$document->setValue('we6', '');
			if ($rowworking2 != NULL) 
			{

				$document->cloneRow('we2',count($rowworking2));

				$ne=1;
				foreach ($rowworking2 as $rowworking) 
				{
					$document->setValue('we1#'.$ne, $rowworking->negara);
					$document->setValue('we2#'.$ne, $rowworking->isi.''.$rowworking->mandarin);
					$document->setValue('we3#'.$ne, $rowworking->posisi);
					$document->setValue('we4#'.$ne, $rowworking->penjelasan);
					$document->setValue('we5#'.$ne, $rowworking->masa_kerja.' '.$rowworking->masabulan.' '.$rowworking->tahun);
					$document->setValue('we6#'.$ne, $rowworking->alasan);
				$ne++;
				}
			}

			$document->setValue('kkf1', $skill_1);
			$document->setValue('kkf2', $skill_2);
			$document->setValue('kkf3', $skill_3);
			$document->setValue('kkf4', $skill_4);
			$document->setValue('kkf5', $skill_5);
			$document->setValue('kkf6', $skill_6);
			$document->setValue('kkf7', $skill_7);
			$document->setValue('kkf8', $skill_8);
			$document->setValue('kkf9', $skill_9);
			$document->setValue('kkf10', $skill_10);
			$document->setValue('kkf11', $skill_11);
			$document->setValue('kkf12', $skill_12);
			$document->setValue('kkf13', $skill_13);

			$document->setValue('p1', $req1);
			$document->setValue('p2', $req2);
			$document->setValue('p3', $req3);
			$document->setValue('p4', $req4);
			$document->setValue('p5', $req5);
			$document->setValue('p6', $req6);

			$document->setValue('keet', $personal_kt);

			$document->setValue('pasp1', $op1);
			$document->setValue('pasp2', $op2);
			$document->setValue('pasp3', $op3);

			$document->setValue('medic1', '體檢-Pemeriksaan kesehatan');
			$document->setValue('medic2', $mdc2);

			$document->setValue('nohh1', $personal_nt);

			$document->setValue('nohh2', $personal_nk);

		} 
		elseif ($exp_id == 'JP') 
		{
			$document = $PHPWord->loadTemplate('files/admin_print_biodata_jp.docx');

        	$rowinterview	= $this->M_session->select_row("SELECT * FROM interview WHERE id_biodata='".$id."'");

			$req1 = '';
			$req2 = '';
			$req3 = '';
			$req4 = '';
			$req5 = '';
			$req6 = '';
			$req7 = '';
			$req8 = '';
			if ($rowinterview != NULL) 
			{
				$req1 = $rowinterview->sunction;
				$req2 = $rowinterview->food;
				$req3 = $rowinterview->cateter;
				$req4 = $rowinterview->injection;
				$req5 = $rowinterview->therapy;
				$req6 = $rowinterview->helping;
				$req7 = $rowinterview->bed;
				$req8 = $rowinterview->stairs;
			}

			$document->replaceStrToImg( 'picsz', $photoProfile);

			$document->setValue('pinhou1', $tampilidbio);
			$document->setValue('pl1', $personal_ks);

			$document->setValue('value1', $nm_agen);
			$document->setValue('value2', $nm_maji);

			$document->setValue('value3', $personal_nm);
			$document->setValue('value3b', $personal_md);
			$document->setValue('value4', $personal_td);
			$document->setValue('value5', $personal_jk);
			$document->setValue('value6', $personal_tg);
			$document->setValue('value7', $personal_wn);
			$document->setValue('value8', $personal_br);
			$document->setValue('value9', $personal_tl);
			$document->setValue('value10', $personal_ag);
			$document->setValue('value11', $personal_te);
			$document->setValue('value12', $personal_st);
			$document->setValue('value13', $personal_um);
			$document->setValue('value13b', $personal_mn);
			$document->setValue('value14', $personal_pd);
			$document->setValue('value15', $personal_at);
			$document->setValue('value16', $personal_pv);
			$document->setValue('value17', $personal_mi);
			$document->setValue('value18', $personal_ig);

			$document->setValue('value19', $family_nama_bapak); 
			$document->setValue('value20', $family_umur_bapak); 
			$document->setValue('value21', $family_kerja_bapak); 
			$document->setValue('value22', $family_nama_ibu); 
			$document->setValue('value23', $family_umur_ibu); 
			$document->setValue('value24', $family_kerja_ibu); 
			$document->setValue('value25', $family_nama_is); 
			$document->setValue('value26', $family_umur_is); 
			$document->setValue('value27', $family_kerja_is); 
			$document->setValue('value28', $family_saudara_lk); 
			$document->setValue('value29', $family_saudara_pr); 
			$document->setValue('value30', $family_anak_ke);  
			$document->setValue('value31', $family_data_anak);

			$document->setValue('we1', '');
			$document->setValue('we2', '');
			$document->setValue('we3', '');
			$document->setValue('we4', '');
			$document->setValue('we5', '');
			$document->setValue('we6', '');
			if ($rowworking2 != NULL) 
			{

				$document->cloneRow('we2',count($rowworking2));

				$ne=1;
				foreach ($rowworking2 as $rowworking) 
				{
					$document->setValue('we1#'.$ne, $rowworking->negara);
					$document->setValue('we2#'.$ne, $rowworking->isi.''.$rowworking->mandarin);
					$document->setValue('we3#'.$ne, $rowworking->posisi);
					$document->setValue('we4#'.$ne, $rowworking->penjelasan);
					$document->setValue('we5#'.$ne, $rowworking->masa_kerja.' '.$rowworking->masabulan.' '.$rowworking->tahun);
					$document->setValue('we6#'.$ne, $rowworking->alasan);
				$ne++;
				}
			}

			$document->setValue('kkf1', $skill_1);
			$document->setValue('kkf2', $skill_2);
			$document->setValue('kkf3', $skill_3);
			$document->setValue('kkf4', $skill_4);
			$document->setValue('kkf5', $skill_5);
			$document->setValue('kkf6', $skill_6);
			$document->setValue('kkf7', $skill_7);
			$document->setValue('kkf8', $skill_8);
			$document->setValue('kkf9', $skill_9);
			$document->setValue('kkf10', $skill_10);
			$document->setValue('kkf11', $skill_11);
			$document->setValue('kkf12', $skill_12);
			$document->setValue('kkf13', $skill_13);

			$document->setValue('xxx3', $req1);
			$document->setValue('xxx4', $req2);
			$document->setValue('xxx5', $req3);
			$document->setValue('xxx6', $req4);
			$document->setValue('xxx7', $req5);
			$document->setValue('xxx8', $req6);
			$document->setValue('xxx9', $req7);
			$document->setValue('xxx10', $req8);
			
			$document->setValue('keet', $personal_kt);

			$document->setValue('pasp1', $op1);
			$document->setValue('pasp2', $op2);
			$document->setValue('pasp3', $op3);

			$document->setValue('meddhtml', $mdc2);

			$document->setValue('nohh1', $personal_nt);

			$document->setValue('nohh2', $personal_nk);

		} 
		elseif ($exp_id == 'FI') 
		{
			$document = $PHPWord->loadTemplate('files/admin_print_biodata.docx');

			$tampil_data_pengalamanfi = $this->M_session->select("SELECT * FROM pengalaman WHERE id_biodata='".$id."' order by periodekerja asc");
			$tugas 		= $this->M_session->select_row("SELECT * FROM tugas WHERE id_biodata='".$id."'");
			$kettugas 	= $this->M_session->select_row("SELECT * FROM kettugas WHERE id_biodata='".$id."'");

			$hasilnya 		= substr_count($family_data_anak, 'tahun') + substr_count($family_data_anak, 'bulan'); 
			$ttl 			= $family_saudara_lk + $family_saudara_pr;

			if ( $tampil_data_pengalamanfi != NULL )
			{
				foreach ($tampil_data_pengalamanfi as $rowpengalamanfi) 
				{
					$negarahtml[]	= $rowpengalamanfi->negara;
					$kerjahtml[]	= $rowpengalamanfi->lokasikerja;
					$lamahtml[]		= $rowpengalamanfi->lamakerja;
					$periodehtml[]	= $rowpengalamanfi->periodekerja;
					$jamhtml[]		= $rowpengalamanfi->jamkerja;
					$majikanhtml[]	= $rowpengalamanfi->majikan;
					$alasanhtml[]	= $rowpengalamanfi->alasanberhenti;

					$krjprt 	= $rowpengalamanfi->kerjaprt;
					$msk 		= $rowpengalamanfi->memasak;
					$cucibj 	= $rowpengalamanfi->mencucibaju;
					$strk 		= $rowpengalamanfi->setrikabaju;
					$cucimb 	= $rowpengalamanfi->mencucimobil;
					$rwtb 		= $rowpengalamanfi->rawatbinatang;

					$krjprt 	= ''; 
					$msk 		= '';
					$cucibj 	= '';
					$strk 		= '';
					$cucimb 	= '';
					$rwtb 		= '';
					if ($krjprt=='1') 
					{ 
						$krjprt='V'; 
					} 
					if ($msk=='1') 
					{ 
						$msk='V'; 
					}
					if ($cucibj=='1') 
					{ 
						$cucibj='V'; 
					}
					if ($strk=='1') 
					{ 
						$strk='V'; 
					}
					if ($cucimb=='1') 
					{ 
						$cucimb='V'; 
					}
					if ($rwtb=='1') 
					{ 
						$rwtb='V'; 
					}

					$rumah[] 			= $krjprt;
					$masak[] 			= $msk;
					$cucibaju[] 		= $cucibj;
					$Menyetrika[] 		= $strk;
					$cucimobil[]		= $cucimb;
					$merawatbinatang[] 	= $rwtb;

					$merawatbayi[] 		= $rowpengalamanfi->rawatbayi;
					$merawatanak[] 		= $rowpengalamanfi->rawatanak.' Orang 位';
					$umuranak[] 		= $rowpengalamanfi->umur;

					if ($rowpengalamanfi->rawatanak == NULL) 
					{
						$kondisianak[] = '-';
					} 
					else 
					{
						$kondisianak[] = $rowpengalamanfi->kondisi;
					}

					$umur[] 		= $rowpengalamanfi->jompoumur.' Tahun 嵗';
					$kondisinya[] 	= $rowpengalamanfi->jompokondisi;
					 
					$umur2[]		= $rowpengalamanfi->jompoumur2.' Tahun 嵗';
					$kondisinya2[] 	= $rowpengalamanfi->jompokondisi2;
					 
					$merawatjompo[] = $rowpengalamanfi->jompoumur.' sTahun 嵗';
					$kondisijompo[] = $rowpengalamanfi->jompokondisi;
					$anggotarumah[] = $rowpengalamanfi->anggotarumah.' / Orang 名';
					$tiperumah[]	= $rowpengalamanfi->tiperumah;
					$lantairumah[] 	= $rowpengalamanfi->jumlahlantai;
					$jumlahkamar[] 	= $rowpengalamanfi->jumlahkamar;
					$keterangan[] 	= $rowpengalamanfi->keterangan;
				}
			}

			$tugas1 = '';
			$tugas2 = '';
			$tugas3 = '';
			$tugas4 = '';
			$tugas5 = '';
			$tugas6 = '';
			if ( $tugas != NULL )
			{
				$tugas1 = $tugas->pekerjaan_rt;
				$tugas2 = $tugas->merawat_bayi;
				$tugas3 = $tugas->cacat;
				$tugas4 = $tugas->anak_kecil;
				$tugas5 = $tugas->memasak;
				$tugas6 = $tugas->jompo;
			}

			$document->replaceStrToImg( 'img', $photoProfile);

			$document->setValue('value1', $tampilidbio);
			$document->setValue('value2', $personal_ks);
			$document->setValue('value3', $personal_td);
			$document->setValue('value4', $personal_nm);
			$document->setValue('value5', $personal_md);
			$document->setValue('value6', $personal_tl);
			$document->setValue('value7', $personal_te);
			$document->setValue('value8', $personal_um.' Tahun 歲');
			$document->setValue('value9', $personal_tg.' cm 公分');
			$document->setValue('value10', $personal_br.' kg 公斤');
			$document->setValue('value11', $personal_pd);
			$document->setValue('value12', $personal_ag);
			$document->setValue('value13', $personal_st);
			$document->setValue('value14', $personal_mn);

			$document->setValue('value15', $family_nama_is);
			$document->setValue('value16', $family_umur_is);
			$document->setValue('value17', $family_kerja_is);
			$document->setValue('value18', $hasilnya.' anak');
			$document->setValue('value19', $family_data_anak);
			
			$document->setValue('value20', $personal_mi);
			$document->setValue('value21', $personal_b1);
			$document->setValue('value22', $personal_ig);
			$document->setValue('value23', $personal_b2);
			$document->setValue('value24', $personal_b3);

			for ($cxz=1; $cxz<=4; $cxz++) {
				$document->setValue('pk1v'.$cxz, '');
				$document->setValue('pk2v'.$cxz, '');
				$document->setValue('pk3v'.$cxz, '');
				$document->setValue('pk4v'.$cxz, '');
				$document->setValue('pk5v'.$cxz, '');
				$document->setValue('pk6v'.$cxz, '');
				$document->setValue('pk7v'.$cxz, '');

				$document->setValue('tg1s'.$cxz, '');
				$document->setValue('tg2s'.$cxz, '');
				$document->setValue('tg3s'.$cxz, '');
				$document->setValue('tg4s'.$cxz, '');
				$document->setValue('tg5s'.$cxz, '');
				$document->setValue('tg6s'.$cxz, '');
				$document->setValue('tg7s'.$cxz, '');
				$document->setValue('tg8s'.$cxz, '');
				$document->setValue('tg9s'.$cxz, '');
				$document->setValue('tg10s'.$cxz, '');
				$document->setValue('tg11s'.$cxz, '');
				$document->setValue('tg12s'.$cxz, '');
				$document->setValue('tg13s'.$cxz, '');
				$document->setValue('tg14s'.$cxz, '');
				$document->setValue('tg15s'.$cxz, '');
				$document->setValue('tg16s'.$cxz, '');
				$document->setValue('tg17s'.$cxz, '');
				$document->setValue('tg18s'.$cxz, '');
				$document->setValue('tg19s'.$cxz, '');
			$cxz++;
			}

			$total_row = count($tampil_data_pengalamanfi);

			$nn = 1;
			for ($tb=0; $tb<$total_row; $tb++) {
				$document->setValue('pk1v'.$nn, $negarahtml[$tb]);
				$document->setValue('pk2v'.$nn, $kerjahtml[$tb]);
				$document->setValue('pk3v'.$nn, $lamahtml[$tb]);
				$document->setValue('pk4v'.$nn, $periodehtml[$tb]);
				$document->setValue('pk5v'.$nn, $jamhtml[$tb]);
				$document->setValue('pk6v'.$nn, $majikanhtml[$tb]);
				$document->setValue('pk7v'.$nn, $alasanhtml[$tb]);

				$document->setValue('tg1s'.$nn, $rumah[$tb]);
				$document->setValue('tg2s'.$nn, $masak[$tb]);
				$document->setValue('tg3s'.$nn, $cucibaju[$tb]);
				$document->setValue('tg4s'.$nn, $Menyetrika[$tb]);
				$document->setValue('tg5s'.$nn, $cucimobil[$tb]);
				$document->setValue('tg6s'.$nn, $merawatbinatang[$tb]);
				$document->setValue('tg7s'.$nn, $merawatbayi[$tb]);
				$document->setValue('tg8s'.$nn, $merawatanak[$tb]);
				$document->setValue('tg9s'.$nn, $umuranak[$tb]);
				$document->setValue('tg10s'.$nn, $kondisianak[$tb]);
				$document->setValue('tg11s'.$nn, $umur[$tb]);
				$document->setValue('tg12s'.$nn, $kondisinya[$tb]);
				$document->setValue('tg13s'.$nn, $umur2[$tb]);
				$document->setValue('tg14s'.$nn, $kondisinya2[$tb]);
				$document->setValue('tg15s'.$nn, $anggotarumah[$tb]);
				$document->setValue('tg16s'.$nn, $tiperumah[$tb]);
				$document->setValue('tg17s'.$nn, $lantairumah[$tb]);
				$document->setValue('tg18s'.$nn, $jumlahkamar[$tb]);
				$document->setValue('tg19s'.$nn, $keterangan[$tb]);
			$nn++;
			}

			$document->setValue('kel1', $family_nama_bapak);
			$document->setValue('kel2', $family_nama_ibu);
			$document->setValue('kel3', $ttl);
			$document->setValue('kel6', $family_umur_bapak.' tahun 嵗');
			$document->setValue('kel7', $family_umur_ibu.' tahun 嵗');
			$document->setValue('kel8', $family_anak_ke);
			
			$document->setValue('best1', $tugas1);
			$document->setValue('best2', $tugas2);
			$document->setValue('best3', $tugas3);
			$document->setValue('best4', $tugas4);
			$document->setValue('best5', $tugas5);
			$document->setValue('best6', $tugas6);

			if ($kettugas != NULL) {
				$document->setValue('v1s1', str_replace("0"," ",$kettugas->t1_pengalaman));
				$document->setValue('v1s2', '雇主要求');
				$document->setValue('v1s3', str_replace("0"," ",$kettugas->t1_bersedia));

				$document->setValue('v2s1', str_replace("0"," ",$kettugas->t2_pengalaman));
				$document->setValue('v2s2', '雇主要求');
				$document->setValue('v2s3', str_replace("0"," ",$kettugas->t2_bersedia));

				$document->setValue('v3s1', str_replace("0"," ",$kettugas->t3_pengalaman));
				$document->setValue('v3s2', '雇主要求');
				$document->setValue('v3s3', str_replace("0"," ",$kettugas->t3_bersedia));

				$document->setValue('v4s1', str_replace("0"," ",$kettugas->t4_pengalaman));
				$document->setValue('v4s2', '雇主要求');
				$document->setValue('v4s3', str_replace("0"," ",$kettugas->t4_bersedia));

				$document->setValue('v5s1', str_replace("0"," ",$kettugas->t5_pengalaman));
				$document->setValue('v5s2', 'V');
				$document->setValue('v5s3', str_replace("0"," ",$kettugas->t5_bersedia));

				$document->setValue('v6s1', str_replace("0"," ",$kettugas->t6_pengalaman));
				$document->setValue('v6s2', 'V');
				$document->setValue('v6s3', str_replace("0"," ",$kettugas->t6_bersedia));

				$document->setValue('v7s1', str_replace("0"," ",$kettugas->t7_pengalaman));
				$document->setValue('v7s2', 'V');
				$document->setValue('v7s3', str_replace("0"," ",$kettugas->t7_bersedia));

				$document->setValue('v8s1', str_replace("0"," ",$kettugas->t8_pengalaman));
				$document->setValue('v8s2', 'V');
				$document->setValue('v8s3', str_replace("0"," ",$kettugas->t8_bersedia));

				$document->setValue('v9s1', str_replace("0"," ",$kettugas->t9_pengalaman));
				$document->setValue('v9s2', 'V');
				$document->setValue('v9s3', str_replace("0"," ",$kettugas->t9_bersedia));

				$document->setValue('v10s1', str_replace("0"," ",$kettugas->t10_pengalaman));
				$document->setValue('v10s2', str_replace("0"," ",$kettugas->t10_latihan));
				$document->setValue('v10s3', str_replace("0"," ",$kettugas->t10_bersedia));

				$document->setValue('v11s1', str_replace("0"," ",$kettugas->t11_pengalaman));
				$document->setValue('v11s2', str_replace("0"," ",$kettugas->t11_latihan));
				$document->setValue('v11s3', str_replace("0"," ",$kettugas->t11_bersedia));

				$document->setValue('v12s1', str_replace("0"," ",$kettugas->t12_pengalaman));
				$document->setValue('v12s2', '');
				$document->setValue('v12s3', str_replace("0"," ",$kettugas->t12_bersedia));

				$document->setValue('v13s1', str_replace("0"," ",$kettugas->t13_pengalaman));
				$document->setValue('v13s2', '');
				$document->setValue('v13s3', str_replace("0"," ",$kettugas->t13_bersedia));

				$document->setValue('v14s1', str_replace("0"," ",$kettugas->t14apengalaman));
				$document->setValue('v14s2', '');
				$document->setValue('v14s3', str_replace("0"," ",$kettugas->t14abersedia));

				$document->setValue('v15s1', str_replace("0"," ",$kettugas->t14bpengalaman));
				$document->setValue('v15s2', '');
				$document->setValue('v15s3', str_replace("0"," ",$kettugas->t14bbersedia));

				$document->setValue('v16s1', str_replace("0"," ",$kettugas->t15_pengalaman));
				$document->setValue('v16s2', '');
				$document->setValue('v16s3', str_replace("0"," ",$kettugas->t15_bersedia));

				$document->setValue('v17s1', str_replace("0"," ",$kettugas->t16_pengalaman));
				$document->setValue('v17s2', '');
				$document->setValue('v17s3', str_replace("0"," ",$kettugas->t16_bersedia));

				$document->setValue('v18s1', str_replace("0"," ",$kettugas->t17_pengalaman));
				$document->setValue('v18s2', '');
				$document->setValue('v18s3', str_replace("0"," ",$kettugas->t17_bersedia));

				$document->setValue('mp1s1', str_replace("0"," ",$kettugas->t18_pengalaman));
				$document->setValue('mp1s2', 'V');
				$document->setValue('mp1s3', str_replace("0"," ",$kettugas->t18_bersedia));

				$document->setValue('mp2s1', str_replace("0"," ",$kettugas->t19_pengalaman));
				$document->setValue('mp2s2', '');
				$document->setValue('mp2s3', str_replace("0"," ",$kettugas->t19_bersedia));
				
				$document->setValue('mp3s1', str_replace("0"," ",$kettugas->t20_pengalaman));
				$document->setValue('mp3s2', '');
				$document->setValue('mp3s3', str_replace("0"," ",$kettugas->t20_bersedia));
				
				$document->setValue('mp4s1', str_replace("0"," ",$kettugas->t21_pengalaman));
				$document->setValue('mp4s2', 'V');
				$document->setValue('mp4s3', str_replace("0"," ",$kettugas->t21_bersedia));
				
				$document->setValue('mp5s1', str_replace("0"," ",$kettugas->t22_pengalaman));
				$document->setValue('mp5s2', 'V');
				$document->setValue('mp5s3', str_replace("0"," ",$kettugas->t22_bersedia));
				
				$document->setValue('mp6s1', str_replace("0"," ",$kettugas->t23_pengalaman));
				$document->setValue('mp6s2', 'V');
				$document->setValue('mp6s3', str_replace("0"," ",$kettugas->t23_bersedia));
				
				$document->setValue('mp7s1', str_replace("0"," ",$kettugas->t24_pengalaman));
				$document->setValue('mp7s2', 'V');
				$document->setValue('mp7s3', str_replace("0"," ",$kettugas->t24_bersedia));
				
				$document->setValue('mp8s1', str_replace("0"," ",$kettugas->t25_pengalaman));
				$document->setValue('mp8s2', '');
				$document->setValue('mp8s3', str_replace("0"," ",$kettugas->t25_bersedia));
				
				$document->setValue('mp9s1', str_replace("0"," ",$kettugas->t26_pengalaman));
				$document->setValue('mp9s2', '');
				$document->setValue('mp9s3', str_replace("0"," ",$kettugas->t26_bersedia));
				
				$document->setValue('mp10s1', str_replace("0"," ",$kettugas->t27_pengalaman));
				$document->setValue('mp10s2', 'V');
				$document->setValue('mp10s3', str_replace("0"," ",$kettugas->t27_bersedia));
				
				$document->setValue('mp11s1', str_replace("0"," ",$kettugas->t28_pengalaman));
				$document->setValue('mp11s2', 'V');
				$document->setValue('mp11s3', str_replace("0"," ",$kettugas->t28_bersedia));
				
				$document->setValue('mp12s1', str_replace("0"," ",$kettugas->t29_pengalaman));
				$document->setValue('mp12s2', '');
				$document->setValue('mp12s3', str_replace("0"," ",$kettugas->t29_bersedia));
				
				$document->setValue('mp13s1', str_replace("0"," ",$kettugas->t30_pengalaman));
				$document->setValue('mp13s2', 'V');
				$document->setValue('mp13s3', str_replace("0"," ",$kettugas->t30_bersedia));
				
				$document->setValue('mp14s1', str_replace("0"," ",$kettugas->t31_pengalaman));
				$document->setValue('mp14s2', 'V');
				$document->setValue('mp14s3', str_replace("0"," ",$kettugas->t31_bersedia));
				
				$document->setValue('mp15s1', str_replace("0"," ",$kettugas->t32_pengalaman));
				$document->setValue('mp15s2', '');
				$document->setValue('mp15s3', str_replace("0"," ",$kettugas->t32_bersedia));
				
				$document->setValue('mp16s1', str_replace("0"," ",$kettugas->t33_pengalaman));
				$document->setValue('mp16s2', 'V');
				$document->setValue('mp16s3', str_replace("0"," ",$kettugas->t33_bersedia));
				
				$document->setValue('mp17s1', str_replace("0"," ",$kettugas->t34_pengalaman));
				$document->setValue('mp17s2', 'V');
				$document->setValue('mp17s3', str_replace("0"," ",$kettugas->t34_bersedia));
				
				$document->setValue('mp18s2', $kettugas->t35_kg);
			} else {
				$document->setValue('v1s1', '');
				$document->setValue('v1s2', '');
				$document->setValue('v1s3', '');

				$document->setValue('v2s1', '');
				$document->setValue('v2s2', '');
				$document->setValue('v2s3', '');

				$document->setValue('v3s1', '');
				$document->setValue('v3s2', '');
				$document->setValue('v3s3', '');

				$document->setValue('v4s1', '');
				$document->setValue('v4s2', '');
				$document->setValue('v4s3', '');

				$document->setValue('v5s1', '');
				$document->setValue('v5s2', '');
				$document->setValue('v5s3', '');

				$document->setValue('v6s1', '');
				$document->setValue('v6s2', '');
				$document->setValue('v6s3', '');

				$document->setValue('v7s1', '');
				$document->setValue('v7s2', '');
				$document->setValue('v7s3', '');

				$document->setValue('v8s1', '');
				$document->setValue('v8s2', '');
				$document->setValue('v8s3', '');

				$document->setValue('v9s1', '');
				$document->setValue('v9s2', '');
				$document->setValue('v9s3', '');

				$document->setValue('v10s1', '');
				$document->setValue('v10s2', '');
				$document->setValue('v10s3', '');

				$document->setValue('v11s1', '');
				$document->setValue('v11s2', '');
				$document->setValue('v11s3', '');

				$document->setValue('v12s1', '');
				$document->setValue('v12s2', '');
				$document->setValue('v12s3', '');

				$document->setValue('v13s1', '');
				$document->setValue('v13s2', '');
				$document->setValue('v13s3', '');

				$document->setValue('v14s1', '');
				$document->setValue('v14s2', '');
				$document->setValue('v14s3', '');

				$document->setValue('v15s1', '');
				$document->setValue('v15s2', '');
				$document->setValue('v15s3', '');

				$document->setValue('v16s1', '');
				$document->setValue('v16s2', '');
				$document->setValue('v16s3', '');

				$document->setValue('v17s1', '');
				$document->setValue('v17s2', '');
				$document->setValue('v17s3', '');

				$document->setValue('v18s1', '');
				$document->setValue('v18s2', '');
				$document->setValue('v18s3', '');

				$document->setValue('mp1s1', '');
				$document->setValue('mp1s2', '');
				$document->setValue('mp1s3', '');

				$document->setValue('mp2s1', '');
				$document->setValue('mp2s2', '');
				$document->setValue('mp2s3', '');
				
				$document->setValue('mp3s1', '');
				$document->setValue('mp3s2', '');
				$document->setValue('mp3s3', '');
				
				$document->setValue('mp4s1', '');
				$document->setValue('mp4s2', '');
				$document->setValue('mp4s3', '');
				
				$document->setValue('mp5s1', '');
				$document->setValue('mp5s2', '');
				$document->setValue('mp5s3', '');
				
				$document->setValue('mp6s1', '');
				$document->setValue('mp6s2', '');
				$document->setValue('mp6s3', '');
				
				$document->setValue('mp7s1', '');
				$document->setValue('mp7s2', '');
				$document->setValue('mp7s3', '');
				
				$document->setValue('mp8s1', '');
				$document->setValue('mp8s2', '');
				$document->setValue('mp8s3', '');
				
				$document->setValue('mp9s1', '');
				$document->setValue('mp9s2', '');
				$document->setValue('mp9s3', '');
				
				$document->setValue('mp10s1', '');
				$document->setValue('mp10s2', '');
				$document->setValue('mp10s3', '');
				
				$document->setValue('mp11s1', '');
				$document->setValue('mp11s2', '');
				$document->setValue('mp11s3', '');
				
				$document->setValue('mp12s1', '');
				$document->setValue('mp12s2', '');
				$document->setValue('mp12s3', '');
				
				$document->setValue('mp13s1', '');
				$document->setValue('mp13s2', '');
				$document->setValue('mp13s3', '');
				
				$document->setValue('mp14s1', '');
				$document->setValue('mp14s2', '');
				$document->setValue('mp14s3', '');
				
				$document->setValue('mp15s1', '');
				$document->setValue('mp15s2', '');
				$document->setValue('mp15s3', '');
				
				$document->setValue('mp16s1', '');
				$document->setValue('mp16s2', '');
				$document->setValue('mp16s3', '');
				
				$document->setValue('mp17s1', '');
				$document->setValue('mp17s2', '');
				$document->setValue('mp17s3', '');
				
				$document->setValue('mp18s2', '');
			}

			$document->setValue('kethtml2', $personal_kt);
				
			$document->setValue('lokasikerjahtml2', $personal_b5);
			
			$document->setValue('paspor1html', $op1);
			$document->setValue('paspor2html', $op2);
			$document->setValue('paspor3html', $op3);

			$document->setValue('meddhtml', $mdc2);

			$document->setValue('nohphtml', $personal_nt);

			$document->setValue('medicinehtml', $personal_nk);

		}

		$tampil_data_arc = $this->M_session->select("SELECT * FROM upload_arc WHERE id_biodata='".$id."'");
		$document->setValue('arc', '');
		if ($tampil_data_arc != NULL) {
			$document->cloneRow('arc', count($tampil_data_arc) );

			$nn=1;
		 	foreach ($tampil_data_arc as $arc) { 
				$datagambar="assets/upload_arc/".$arc->file;
				if (file_exists($datagambar)) {
					$aImgs2 = array(
		        		array(
		        			'img' 	=> $datagambar,
							'size' 	=> array(400, 200),
				        )
				    );
					$document->replaceStrToImg('arc#'.$nn, $aImgs2);
				} else {
					$document->replaceStrToImg('arc#'.$nn, 'Gambar tidak ada');
				}
			$nn++;
			}
		}

		$tampil_data_keterangan = $this->M_session->select("SELECT * FROM upload_keterangan WHERE id_biodata='".$id."'");
		$document->setValue('ketdown', '');
		if ($tampil_data_keterangan != NULL) {
			$totalKetdown = count($tampil_data_keterangan)*2;
			$document->cloneRow('ketdown', $totalKetdown);

			$nn=1;
			$np=2;
		 	foreach ($tampil_data_keterangan as $keterangan) { 
		 		list($ket_width, $ket_height) = getimagesize("assets/upload_keterangan/".$keterangan->file);

				$document->setValue('ketdown#'.$nn, $keterangan->namadok);
				if ($ket_width > 1000) {
					$ket_width = $ket_width/5;
					$ket_height = $ket_height/5;
				} elseif ($ket_width > 400 && $ket_width < 1000 ) {
					$ket_width = $ket_width/4;
					$ket_height = $ket_height/4;
				} elseif ($ket_width < 400 ) {
					$ket_width = $ket_width/3;
					$ket_height = $ket_height/3;
				}
				$datagambar="assets/upload_keterangan/".$keterangan->file;
				if (file_exists($datagambar)) {
					$aImgs3 = array(
		        		array(
							'size' 	=> array($ket_width, $ket_height),
		        			'img' 	=> $datagambar,
				        )
				    );
					$document->replaceStrToImg('ketdown#'.$np, $aImgs3);
				} else {
					$document->replaceStrToImg('ketdown#'.$np, 'Gambar tidak ada');
				}
			$nn=$nn+2;
			$np=$np+2;
			}
		}
		//print_r($document);

		$filename = 'Biodata '.$id.' '.$personal_nm.'.docx';
		//$filename = 'Biodata .docx';

		$isinya=$document->save($filename);
	
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink(FCPATH.$isinya); // deletes the temporary file
		exit;
		
    }

}