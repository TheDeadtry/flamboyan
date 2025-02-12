<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailbio_print extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');	
		$this->load->library('Pdf');	
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
			else 
			{
				$document->setValue('we1', '');
				$document->setValue('we2', '');
				$document->setValue('we3', '');
				$document->setValue('we4', '');
				$document->setValue('we5', '');
				$document->setValue('we6', '');
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
			else
			{
				$document->setValue('we1', '');
				$document->setValue('we2', '');
				$document->setValue('we3', '');
				$document->setValue('we4', '');
				$document->setValue('we5', '');
				$document->setValue('we6', '');
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

    function disnaker_rekom_desa($id_pembuatan, $tgl=NULL) {
		$ambil_data 	= $this->M_session->select_row("SELECT nomor,lampiran,perihal,kepada,id_tki FROM pembuatan_ijin_desa WHERE id_pembuatan_desa='$id_pembuatan'");
		$nomor 				= "";
		$lampiran 			= "";
		$perihal 			= "";
		$kepada 			= "";
		$idtki 				= "";
		if ( $ambil_data != NULL )
		{
			$nomor 				= $ambil_data->nomor;
			$lampiran 			= $ambil_data->lampiran;
			$perihal 			= $ambil_data->perihal;
			$kepada 			= $ambil_data->kepada;
			$idtki 				= $ambil_data->id_tki;
		}

		$ambil_disnaker = $this->M_session->select_row("SELECT nama,tempatlahir,tanggallahir,jabatan,alamat FROM disnaker WHERE id_biodata='$idtki'");
		$nama 				= "";
		$tempatlahir 		= "";
		$tgllahir 			= "";
		$jabatan 			= "";
		$alamat 			= "";
		if ( $ambil_disnaker != NULL )
		{
			$nama 				= $ambil_disnaker->nama;
			$tempatlahir 		= $ambil_disnaker->tempatlahir;
			$tgllahir 			= $ambil_disnaker->tanggallahir;
			$jabatan 			= $ambil_disnaker->jabatan;
			$alamat 			= $ambil_disnaker->alamat;

			$tanggalan 	= str_replace(".","-",$tgllahir);
			$newDate 	= date("d-m-Y", strtotime($tanggalan));
		}

		$tanggal 		= date('d-m-Y');
		if ( $tgl != NULL ) 
		{
			$tanggal = $tgl;
		}

	    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);

	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
	    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
	    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');  

	    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	    $pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
	    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 

	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  

	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

	    $pdf->SetMargins(3, 4, 10);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	        $pdf->setLanguageArray($l);
	    }   
	    $pdf->setFontSubsetting(true);   
	    $pdf->SetFont('times', '', '11', '', false);   
		$pdf->AddPage(); 
	    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
	
    	$html = '
    		<br/><br/><br/><br/><br/><br/><br/><br/>
    		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">Lawang, '.$tanggal.'</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br/>Perihal</th> 
					<th colspan="3">: <br/>:</th> 
					<th colspan="16">'.$lampiran.' <br/>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25">YTH.'.$kepada.' <br/>Di tempat.</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>					
			</table>
			<br/><br/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br/>				
			</table>
			<br/><br/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI LAWANG-MALANG</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="6"></th> 
					<th colspan="32">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Calon Tenaga Kerja Indonesia (CTKI)</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$alamat.'</th> 
				</tr>
				<br/>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<br/>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
				</tr>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>											
			</table>
			<br/><br/><br/>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<br/><br/><br/><br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u></th>
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><b>Direktur Utama</b></th> 
				</tr>						
			</table>
			<br/><br/>
		';

    	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('REKOM IJIN KE DESA.pdf', 'I');    
    }


	function disnaker_rekom_ijin1($id_pembuatan) {
		$ambil_data			= $this->M_session->select_row("SELECT nomor,lampiran,perihal,kepada,imigrasi,daerah,tanggal,id_tki FROM pembuatan_ijin WHERE id_pembuatan='$id_pembuatan'");
		$nomor 				= "";
		$lampiran 			= "";
		$perihal 			= "";
		$kepada 			= "";
		$imigrasi 			= "";
		$daerah 			= "";
		$tglnya 			= "";
		$idtki 				= "";
		if ( $ambil_data != NULL )
		{
			$nomor 				= $ambil_data->nomor;
			$lampiran 			= $ambil_data->lampiran;
			$perihal 			= $ambil_data->perihal;
			$kepada 			= $ambil_data->kepada;
			$imigrasi 			= $ambil_data->imigrasi;
			$daerah 			= $ambil_data->daerah;
			$tglnya 			= $ambil_data->tanggal;
			$idtki 				= $ambil_data->id_tki;
		}
			
		$ambil_disnaker		= $this->M_session->select_row("SELECT * FROM disnaker WHERE id_biodata='$idtki'");
		$nama 				= "";
		$tempatlahir 		= "";
		$tgllahir 			= "";
		$jabatan 			= "";
		$alamat 			= "";
		if ( $ambil_disnaker != NULL )
		{
			$nama 				= $ambil_disnaker->nama; 
			$tempatlahir 		= $ambil_disnaker->tempatlahir;
			$tgllahir 			= $ambil_disnaker->tanggallahir;
			$jabatan 			= $ambil_disnaker->jabatan;
			$alamat 			= $ambil_disnaker->alamat;

			$tanggalan			= str_replace(".","-",$tgllahir);
			$newDate 			= date("d-m-Y", strtotime($tanggalan));
		}


    	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

    	$pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('REKOM IJIN KE DISNAKER & DESA');
	    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
	    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   

	    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	    $pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
	    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 

	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  

	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

	    $pdf->SetMargins(3, 4, 10);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	        $pdf->setLanguageArray($l);
	    }   
	    $pdf->setFontSubsetting(true);   
	    $pdf->SetFont('times', '', '11', '', false);   
		$pdf->AddPage(); 
	    $pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
	
    	$html = '
    		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>							
			</table>
    		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">'.$daerah.', '.$tglnya.'</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br/>Perihal</th> 
					<th colspan="3">: <br/>:</th> 
					<th colspan="16">'.$lampiran.' <br/>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25">YTH.'.$kepada.' <br/>Di tempat.</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>					
			</table>
			<br/><br/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" > Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="8" > </th> 
					<th colspan="34" > Yang bertanda tangan ini, saya : </th> 
				</tr>	
				<br/>			
			</table>
			<br/><br/>
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">IMMANUEL DARMAWAN SANTOSO</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Direktur Utama PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">JL. INSPEKTUR SUWOTO NO.95B RT.02. RW.01, DS.SIDODADI LAWANG-MALANG</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="6"></th> 
					<th colspan="32">dengan ini memberikan rekomendasi kepada :</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Nama</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$nama.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Tempat Tanggal Lahir</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$tempatlahir.' / '.$newDate.'</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Jabatan</th> 
					<th colspan="2">:</th> 
					<th colspan="25">Calon Tenaga Kerja Indonesia (CTKI)</th> 
				</tr>
				<tr>
					<th colspan="6"></th> 
					<th colspan="10">Alamat</th> 
					<th colspan="2">:</th> 
					<th colspan="25">'.$alamat.'</th> 
				</tr>
				<br/>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Mohon dapatlah CTKI kami tersebut diatas untuk dapat diberikan kemudahan untuk Pengurusan Ijin sebagai salah satu persyaratan untuk proses pemberangkatan ke Negara Taiwan. </th> 
				</tr>
				<br/>
				<tr> 
					<th colspan="4" > </th> 
					<th colspan="40" align="justify">Demikian, atas bantuan dan perhatian Bapak/Ibu yang baik, kami ucapkan banyak terima kasih.</th> 
				</tr>
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>											
			</table>
			<br/><br/><br/>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<br/><br/><br/><br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><b>Direktur Utama</b></th> 
				</tr>						
			</table>
			<br pagebreak="true">
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
			</table>
			<br/><br/>
      		<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">				
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="8"></th> 
					<th colspan="18">'.$daerah.', '.$tglnya.'</th> 
				</tr>
				<br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Nomor</th> 
					<th colspan="3">:</th> 
					<th colspan="16">'.$nomor.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18">Kepada</th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8">Lampiran <br/>Perihal</th> 
					<th colspan="3">: <br/>:</th> 
					<th colspan="16">'.$lampiran.' <br/>'.$perihal.'</th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="25">YTH.'.$kepada.' <br/>Di tempat.</th> 
				</tr>

				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="16"></th> 
					<th colspan="8"></th> 
					<th colspan="4"></th> 
					<th colspan="18"></th> 
				</tr>
											
			</table>
			<table align="left" width="90%" cellspacing="0" cellpadding="2" border="0">
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32" >Dengan Hormat</th> 
				</tr>			
				<tr> 
					<th colspan="6" > </th> 
					<th colspan="32"  style="text-align:justify" >Dengan ini kami mengajukan permohonan kepada Bapak untuk diterbitkan permohonan Perjanjian Penempatan Calon TKI sebanyak 1 ( Satu ) orang  orang untuk Negara tujuan:</th> 
				</tr>
				<tr>
					<th colspan="6" > </th> 
					<th colspan="32" ></th> 
				</tr>	
				<br/>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Hongkong</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"></th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br/>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Malaysia</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br/>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Singapura</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> </th> 
					<th colspan="8" > orang</th> 
				</tr>		
				<br/>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" >Taiwan</th> 
					<th colspan="2" >:</th> 
					<th colspan="8" align="center"> 1 </th> 
					<th colspan="8" > orang</th> 
				</tr>
				<tr> 
					<th colspan="12" ></th> 
					<th colspan="10" ></th> 
					<th colspan="2" ></th>
					<th colspan="8" >__________________</th> 
					<th colspan="8" > </th> 
				</tr>			
				<br/>
				<tr> 
					<th colspan="12" ></th> 
					<th align="right" colspan="10" >JUMLAH</th> 
					<th colspan="2" >:</th>
					<th colspan="8" align="center">1</th>  
					<th colspan="8" > orang</th> 
				</tr>				
				<br/>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30"  style="text-align:justify">Daftar nominasi terlampir. <br/>Rekom Paspor tersebut kami mohon ditujukan kepada '.$imigrasi.'.</th>
				</tr>
				<tr> 
					<th colspan="7" > </th> 
					<th align="left" colspan="30" >Demikian atas bantuan Bapak, kami sampaikan terima kasih</th>
				</tr>							
			</table>
			<br/><br/><br/><br/><br/><br/>
			<table align="left" width="95%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="8"></th> 
					<th colspan="24" align="center">PT.FLAMBOYAN GEMA JASA</th> 
				</tr>
				<br/><br/><br/><br/>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u></th> 
				</tr>
				<tr>
					<th colspan="4"></th> 
					<th colspan="8"></th> 
					<th colspan="3"></th> 
					<th colspan="6"></th> 
					<th colspan="9"></th> 
					<th colspan="24" align="center"><b>Direktur Utama</b></th> 
				</tr>						
			</table>
			<br/><br/>
		';

    	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('REKOM IJIN KE DISNAKER.pdf', 'I');    
    }

    function disnaker_rekom_ijin2($id_pembuatan) 
    {
		$ambilidbio = $this->M_session->select_row("SELECT id_tki,daerah,tampilkan,tanggal FROM pembuatan_ijin where id_pembuatan='$id_pembuatan'");

		if ( $ambilidbio == NULL )
		{
			exit('error1');
		}
		$idt = $ambilidbio->id_tki;
		$tampil_data_detail = $this->M_session->select("SELECT * FROM disnaker where id_biodata='$idt'");
		
		$daerah 	= $ambilidbio->daerah;
		$tampilkan 	= $ambilidbio->tampilkan;
		$tanggal 	= $ambilidbio->tanggal;

		$originalDate3 = str_replace('.','-',$tanggal);
		$newDate3 = date("Y-m-d", strtotime($originalDate3));

		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	    $tahuna = substr($newDate3, 0, 4);               
	    $bulana = substr($newDate3, 5, 2);
	    $tgla   = substr($newDate3, 8, 2);
	    $tgna 	= $tgla . " " . $BulanIndo[(int)$bulana-1]. " ". $tahuna;

		$tampildata = '';
		$no = 1;
		foreach( $tampil_data_detail as $row ) 
		{
			$jeniskelamin 	= $row->jeniskelamin;
			$status 		= $row->status;
			$agama 			= $row->agama;
			$pendidikan 	= $row->pendidikan;

			if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita")
			{
				$jeniskelamin="Perempuan";
			}
			if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria")
			{
				$jeniskelamin="Laki-Laki";
			}

			$status = str_replace("未婚","",$status);
			$status = str_replace("已婚","",$status);
			$status = str_replace("離婚","",$status);
			$status = str_replace("丈夫去世","",$status);

			$agama = str_replace("回教","",$agama);
			$agama = str_replace("基督教","",$agama);
			$agama = str_replace("天主教","",$agama);
			$agama = str_replace("印度教","",$agama);
			$agama = str_replace("佛教","",$agama);

			$datapen = $this->M_session->select("SELECT * FROM datapendidikan");

			if ( $datapen == NULL )
			{
				exit("error2");
			}

			foreach ( $datapen as $row2 )
			{
				$pendidikan=str_replace($row2->mandarin, "", $pendidikan);
			}

			$statusnya = '
				<th colspan="9" >'.$row->namapasangan.'<br>'.$row->alamatpasangan.'</th>  
				<th colspan="9" ></th>   
			';
			if ($tampilkan=='Orang Tua')
			{
				$statusnya = '
					<th colspan="9" ></th>  
					<th colspan="9" >'.$row->namaayah.' <br>'.$row->alamatortu.'</th>  
				';
			}

			$originalDate4 =str_replace('.','-',$row->tanggallahir);
			$newDate4 = date("d-m-Y", strtotime($originalDate4));

			$tampildata .= '
				<tr>
					<th colspan="2" >'.$no.'</th>  
					<th colspan="8" ></th> 
					<th colspan="8" >'.$row->nama.'<br>'.$row->tempatlahir.', <br>'.$newDate4.' </th> 
					<th colspan="4" >'.$jeniskelamin.'</th>
					<th colspan="4" >'.$status.'</th>
					<th colspan="7" >'.$row->alamat.'</th>
					<th colspan="5" >'.$agama.'</th>
					<th colspan="5" >'.$pendidikan.'</th>
					<th colspan="5" >'.$row->jabatan.'</th>  
					'.$statusnya.'
					<th colspan="5" >'.$row->negara.'</th>  
				</tr>
			';

		$no++;
		}

	    $pdf = new TCPDF('L', PDF_UNIT, 'F4', true, 'UTF-8', false);

	    $pdf->SetCreator(PDF_CREATOR);
	    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
	    $pdf->SetTitle('IM');
	    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
	    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   

	    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	    $pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
	    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 

	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  

	    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

	    $pdf->SetMargins(5, 10, 5);
	    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

	    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

	    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

	    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	        require_once(dirname(__FILE__).'/lang/eng.php');
	        $pdf->setLanguageArray($l);
	    }   
	    $pdf->setFontSubsetting(true);   
	    $pdf->SetFont('times', '', '10', '', false);   
		$pdf->AddPage(); 
	
	    $html = '
    		<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
				<tr>
					<th><b> DAFTAR NOMINASI CALON TKI YANG DINYATAKAN LULUS SELEKSI UNTUK PASPOR DARI </b></th>   
				</tr>
				<tr>
					<th><b>PT. FLAMBOYAN GEMAJASA LAWANG</b></th>  
				</tr>				
			</table>
			<br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
				<tr>
					<th colspan="2" > NO</th>  
					<th colspan="8" > FOTO </th> 
					<th colspan="8" > NAMA CALON CTKI</th> 
					<th colspan="4" > JENIS KELAMIN</th>
					<th colspan="4" > STATUS</th>
					<th colspan="7" > ALAMAT CTKI</th>
					<th colspan="5" > AGAMA</th>
					<th colspan="5" > PEND AKHIR</th>
					<th colspan="5" > JABATAN</th>  
					<th colspan="9" > NAMA & ALAMAT SUAMI/ISTRI CTKI</th>  
					<th colspan="9" > NAMA & ALAMAT ORANG TUA/WALI CTKI</th>  
					<th colspan="5" > TUJUAN</th>  
				</tr>
				'.$tampildata.'
							
			</table>
			<br><br>
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="">
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="16" align="center">'.$daerah.', '.$tgna.' </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" > </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th>  
				</tr>
				<tr>
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="8" >  </th> 
					<th colspan="16" align="center"><u>IMMANUEL DARMAWAN SANTOSO</u><br>
									Direktur Utama </th> 
					<th colspan="8" >  </th>  
				</tr>
											
			</table>
			<br>
		';

    	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('TABEL KE DISNAKER.pdf', 'I');    
    }
    
	function cetakdisnaker($id_pembuatan) {

		$idtkinya = $this->m_printdata->ambilidtki($id_pembuatan);
		$eksnya = $this->m_printdata->ambileksnya($id_pembuatan);

		$dataeks='<th colspan="35">EKS/Baru</th> ';
		if($eksnya=='eks'){
$dataeks='<th colspan="35">EKS/<strike>Baru</strike></th> ';
		}else{
$dataeks='<th colspan="35"><strike>EKS</strike>/Baru</th> ';
		}

		$datadisnaker = $this->m_printdata->ambildisnakernya($idtkinya);

		$stts = substr($idtkinya, 0, 2);
		$formal='<th colspan="35">Formal / Informal</th>';
		if($stts=='FI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='MI'){
			$formal='<th colspan="35"><strike>Formal</strike> / Informal</th>';
		}
		if($stts=='FF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='MF'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
		if($stts=='JP'){
			$formal='<th colspan="35">Formal / <strike>Informal</strike></th>';
		}
$nama='';
		foreach($datadisnaker->result() as $row) {
			$nama = $row->nama;
			$tempatlahir = $row->tempatlahir;
			$tanggallahir2 = $row->tanggallahir;
			$noktp = $row->noktp;
			$jeniskelamin = $row->jeniskelamin;
			$agama = $row->agama;
			$status = $row->status;
			$pendidikan = $row->pendidikan;
			$alamat = $row->alamat;
			$namaayah = $row->namaayah;
			$namaibu = $row->namaibu;
			$namaahli = $row->namaahli;
			$namakontak = $row->namakontak;
			$alamatkontak = $row->alamatkontak;
			$hubkontak = $row->hubkontak;
			$tglonline = $row->tglonline;
			$perkiraan = $row->perkiraan;
			$negara = $row->negara;
			$jabatan = $row->jabatan;
			$ahliwaris = $row->ahliwaris;
			$jmlanak = $row->jmlanak;
			$agency2 = $row->agency;
			$matauang = $row->matauang;
			$sektorusaha = $row->sektorusaha;
			$gaji = $row->gaji;
			$nopaspor = $row->nopaspor;
			$masaberlaku = $row->masaberlaku;
			$masahabis = $row->masahabis;
			$tglberangkat = $row->tglberangkat;
			$tgltiba = $row->tgltiba;

		}

if($jeniskelamin=="女" || $jeniskelamin=="Wanita"|| $jeniskelamin=="wanita"){
			$jeniskelamin="Perempuan";
		}
		if($jeniskelamin=="男" || $jeniskelamin=="pria" || $jeniskelamin=="Pria"){
			$jeniskelamin="Laki-Laki";
		}

		$status=str_replace("未婚","",$status);
		$status=str_replace("已婚","",$status);
		$status=str_replace("離婚","",$status);
		$status=str_replace("丈夫去世","",$status);

		$agama=str_replace("回教","",$agama);
		$agama=str_replace("基督教","",$agama);
		$agama=str_replace("天主教","",$agama);
		$agama=str_replace("印度教","",$agama);
		$agama=str_replace("佛教","",$agama);

		$datapen = $this->m_printdata->ambilpendmandarin();
		$agency = $this->m_printdata->ambilagency($agency2);

		for($i=0;$i<count($datapen);$i++){
			$pendidikan=str_replace($datapen[$i],"",$pendidikan);
		}

$lahiran=str_replace(".","-",$tanggallahir2);
$tanggallahir = date("d-m-Y", strtotime($lahiran));

if($tglberangkat==null){
$tglbrkt ="";

}else{
	$originalDate2=str_replace(".","-",$tglberangkat);
$tglbrkt = date("d-m-Y", strtotime($originalDate2));
}

if($tgltiba==null){
$tgltb ="";

}else{
$originalDate3=str_replace(".","-",$tgltiba);
$tgltb = date("d-m-Y", strtotime($originalDate3));
}




$tgl4="";
if($masaberlaku==null){
$tgl4="";
}else{
$originalDate4=str_replace(".","-",$masaberlaku);
$tgl4 = date("d-m-Y", strtotime($originalDate4));
}

$tgl5="";
if($masahabis==null){
$masahabis="";
}else{
$originalDate5=str_replace(".","-",$masahabis);
$tgl5 = date("d-m-Y", strtotime($originalDate5));
}


    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
    $pdf->SetTitle('IM');
    $pdf->SetSubject('SURAT REKOMENDASI IJIN');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
     $pdf->SetMargins(10, 20, 10);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
    $pdf->setFontSubsetting(true);   
    $pdf->SetFont('times', '', '12', '', false);   
	$pdf->AddPage(); 
  
	// Set some content to print
	
    $html = '<p align="center">FORMAT PENGISIAN TKI ON LINE</p>
			<br>
			
			<table align="center" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th colspan="3" ></th>
                <th colspan="25" >TKI</th>
                <th colspan="2">:</th>
              	'.$dataeks.'
              	<th colspan="15">*)</th>             
             </tr>
			 <tr>
                <th colspan="3" ></th>
                <th colspan="25" >Sektor</th>
                <th colspan="2">:</th>
              	'.$formal.'
              	<th colspan="15">**)</th>             
             </tr>
			 </table><br><br>
			 
			<table align="left" width="100%" cellspacing="0" cellpadding="2" border="0.1em">
			<tr>
                <th align="center" colspan="3">No</th>
                <th align="center" colspan="62">Uraian</th>
                <th align="center" colspan="15">Ket</th>
                
             </tr>
			 <tr>
                <th align="center" colspan="3" >1</th>
                <th colspan="25" > NAMA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$nama.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >2</th>
                <th colspan="25" > NAMA IBU</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$namaibu.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >3</th>
                <th colspan="25" > NAMA AYAH</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$namaayah.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >4</th>
                <th colspan="25" > JENIS KELAMIN</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$jeniskelamin.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >5</th>
                <th colspan="25" > TEMPAT LAHIR</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tempatlahir.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >6</th>
                <th colspan="25" > TANGGAL LAHIR</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tanggallahir.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >7</th>
                <th colspan="25" > NO. KTP TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$noktp.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >8</th>
                <th colspan="25" > ALAMAT TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$alamat.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >9</th>
                <th colspan="25" > PROPINSI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> JAWA TIMUR</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >10</th>
                <th colspan="25" > KOTA ASAL TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tempatlahir.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >11</th>
                <th colspan="25" > ALAMAT ORANG TUA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$alamatkontak.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >12</th>
                <th colspan="25" > KOTA ORANG TUA TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$namaahli.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >13</th>
                <th colspan="25" > STATUS PERKAWINAN TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$status.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >14</th>
                <th colspan="25" > AGAMA</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$agama.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >15</th>
                <th colspan="25" > PENDIDIKAN</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$pendidikan.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >16</th>
                <th colspan="25" > AGENCY</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$agency.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >17</th>
                <th colspan="25" > MATA UANG</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$matauang.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >18</th>
                <th colspan="25" > JABATAN</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$jabatan.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >19</th>
                <th colspan="25" > SEKTOR USAHA</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$sektorusaha.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >20</th>
                <th colspan="25" > GAJI TKI</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$gaji.'</th> 
              	<th colspan="15"></th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >21</th>
                <th colspan="25" > NO PASPOR</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$nopaspor.'</th> 
              	<th colspan="15">NO. 21 s/d 25</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >22</th>
                <th colspan="25" > MASA BERLAKU</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tgl4.'</th> 
              	<th colspan="15">Harus diisi</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >23</th>
                <th colspan="25" > MASA HABIS BERLAKU</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tgl5.'</th> 
              	<th colspan="15">Bagi TKI yang</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >24</th>
                <th colspan="25" > TGL. BERANGKAT </th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tglbrkt.'</th> 
              	<th colspan="15">Eks/pernah</th>             
             </tr>
			 <tr>
                <th align="center" colspan="3" >25</th>
                <th colspan="25" > TGL. TIBA</th>
                <th colspan="2">:</th>
              	<th colspan="35"> '.$tgltb.'</th> 
              	<th colspan="15">ke luar negeri</th>             
             </tr>
			
			 </table><br><br>
			 <table align="left" width="100%" cellspacing="0" cellpadding="2" border="0">
			<tr>
                <th colspan="5" >*)</th>
                <th  colspan="77">Coret Salah Satu</th>
              	       
             </tr>
			 <tr>
                <th colspan="5" >**)</th>
                <th  colspan="77">Bagi TKI Baru/yang belum pernah ke luar negeri untuk nomor 21 s/d 25 tidak perlu diisi</th>
              	          
             </tr>
			 </table>';
			
  // ;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }

}