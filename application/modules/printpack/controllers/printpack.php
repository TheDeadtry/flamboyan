<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class printpack extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');	
			$this->load->model('m_printpack');			
	}

	function pk($id_biodata) {
		require_once 'assets/phpword/PHPWord.php';
    	$sektors 	= '';
        $judul 		= '';
        $stts 		= '';

        $nama_agen              = $this->m_printpack->tampil_nama_agen($id_biodata);
        $nama_majikan           = $this->m_printpack->tampil_nama_majikan($id_biodata);
        $nama_majikanmandarin   = $this->m_printpack->tampil_nama_majikanmandarin($id_biodata);
   		$id_tki 				= $this->m_printpack->idtki($id_biodata);
        
        $nodisnaker             = $this->m_printpack->tampil_nodisnaker($id_biodata);
        $nama                   = $this->m_printpack->tampil_nama($id_biodata);
        $namamandarin           = $this->m_printpack->tampil_nama_mandarin($id_biodata);
        $jabatan                = $this->m_printpack->tampil_jabatan($id_biodata);
        $alamat                 = $this->m_printpack->tampil_alamat($id_biodata);

        $nopaspor               = $this->m_printpack->tampil_nopaspor($id_biodata);
        $tglterima              = $this->m_printpack->tampil_tglterima($id_biodata);
        $office                 = $this->m_printpack->tampil_office($id_biodata);

        $tanggallahir           = $this->m_printpack->tampil_tanggallahir($id_biodata);
        $tempatlahir            = $this->m_printpack->tampil_tempatlahir($id_biodata);
        $jeniskelamin           = $this->m_printpack->tampil_jeniskelamin($id_biodata);
        $status                 = $this->m_printpack->tampil_status($id_biodata);
        $jumlah_anak            = $this->m_printpack->tampil_jumlah_anak($id_biodata);
        $namaahli               = $this->m_printpack->tampil_namaahli($id_biodata);
        $namakontak             = $this->m_printpack->tampil_namakontak($id_biodata);
        $alamatkontak           = $this->m_printpack->tampil_alamatkontak($id_biodata);
        $telpkontak             = $this->m_printpack->tampil_telpkontak($id_biodata);
        $hubkontak              = $this->m_printpack->tampil_hubkontak($id_biodata);

        $stts = substr($id_biodata, 0, 2);
        if($stts == 'FI') {
            $judul 					= '監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
            $sektors 				= 'INFORMAL';
        }
        if($stts == 'MI') {
            $judul 					= '監護工 PERAWAT ORANG SAKIT (CARE GIVER)';
            $sektors	      		= 'INFORMAL';
        }
        if($stts == 'MF') {
            $judul 					= '工廠 PABRIK';
            $sektors 				= 'FORMAL';
            $nama_majikan           = $this->m_printpack->tampil_nama_majikanformal($id_biodata);
            $nama_majikanmandarin   = $this->m_printpack->tampil_nama_majikanmandarinformal($id_biodata);
        }
        if($stts == 'FF') {
            $judul 					= '工廠 PABRIK';
            $sektors 				= 'FORMAL';
            $nama_majikan           = $this->m_printpack->tampil_nama_majikanformal($id_biodata);
            $nama_majikanmandarin   = $this->m_printpack->tampil_nama_majikanmandarinformal($id_biodata);
        }
        if($stts == 'JP') {
            $judul 					= '養護機構/醫院類 / PANTI JOMPO/ RUMAH SAKIT (NURSING HOME)';
            $sektors				= 'FORMAL';
            $nama_majikan           = $this->m_printpack->tampil_nama_majikanformal($id_biodata);
            $nama_majikanmandarin   = $this->m_printpack->tampil_nama_majikanmandarinformal($id_biodata);
        }

		$hitungpaspor= $this->m_printpack->hitungpaspor($id_biodata);

        $fotopaspor   = $this->m_printpack->fotopaspor($id_biodata);
        $fotopaspor2  = $this->m_printpack->fotopaspor2($id_biodata);

		$jk="";
    	$jk2="";
    	if($jeniskelamin=='女'|| $jeniskelamin=='Perempuan'|| $jeniskelamin=='Wanita'){
	    	$jk2 	= "Perempuan";
	        $jk 	= "女";
	    }
	    if($jeniskelamin=='男'|| $jeniskelamin=='pria'|| $jeniskelamin=='Pria'){
	    	$jk2 	= "Laki-Laki";
	        $jk 	= "男";

	    }
  
		$hitungpaspor = $this->m_printpack->hitungpaspor($id_biodata);



		$PHPWord = new PHPWord();

		$document = $PHPWord->loadTemplate('files/pk.docx');

		$document->setValue('Value1', $sektors);
		$document->setValue('Value2', $judul);
		$document->setValue('Value3', $nama_agen);
		$document->setValue('Value4', $nama_majikan);
		$document->setValue('Value26',$nama_majikanmandarin);
		$document->setValue('Value5', $id_tki);
		$document->setValue('Value6', $nodisnaker);
		$document->setValue('Value7', $nama);
		$document->setValue('Value8', $namamandarin);
		$document->setValue('Value9', $alamat);
		$document->setValue('Value10', $nopaspor);
		$document->setValue('Value11', $tglterima);
		$document->setValue('Value12', $office);
		$document->setValue('Value13', $tanggallahir);
		$document->setValue('Value14', $tempatlahir);
		$document->setValue('Value15', $jk2);
		$document->setValue('Value16', $jk);
		$document->setValue('Value17', $status);
		$document->setValue('Value18', $jumlah_anak);
		$document->setValue('Value19', $namaahli);
		$document->setValue('Value20', $namakontak);
		$document->setValue('Value21', $alamatkontak);
		$document->setValue('Value22', $telpkontak);
		$document->setValue('Value23', $hubkontak);
	     
	    $datagambar 	= "assets/uploadpasporbaru/".$fotopaspor;   
	    $datagambar2 	= "assets/uploadpasporbaru/".$fotopaspor2;

	  	if ($hitungpaspor==1){
			$aImgs1 = array(
		        array(
		         	'img' => $datagambar,
		        	'size' => array(305, 205),
		        )
		    );
	    	$document->replaceStrToImg( 'Value24', $aImgs1);
	    	$document->setValue('Value25','');
	  	} else {
		    $aImgs1 = array(
		        array(
		         'img' => $datagambar,
		        'size' => array(305, 205),
		        )
		    );
		    $document->replaceStrToImg( 'Value24', $aImgs1);

			$aImgs2 = array(
		        array(
		        'img' => $datagambar2,
		        'size' => array(305, 205),
		        )
		    );
			$document->replaceStrToImg( 'Value25', $aImgs2);
	  	}


		$document->setValue('weekday', date('l'));
		$document->setValue('time', date('H:i'));

		    
		$filename = 'pktki.docx';

		$isinya=$document->save($filename);

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$isinya);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($isinya));
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}


	function databio($id) {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();

		$negara1 	= $this->m_printpack->ambil_id_negara1($id);
		$negara2 	= $this->m_printpack->ambil_id_negara2($id);
		$calling1 	= $this->m_printpack->ambil_id_calling($id);
		$skill1 	= $this->m_printpack->ambil_id_skill1($id);
		$skill2 	= $this->m_printpack->ambil_id_skill2($id);
		$skill3 	= $this->m_printpack->ambil_id_skill3($id);

		if ($skill1=='') {
			$tampilidbio = $id.''.$negara1.''.$negara2.''.$calling1.''.$skill1.''.$skill2.''.$skill3;
		} else {
			$tampilidbio = $id.''.$negara1.''.$negara2.''.$calling1.'-'.$skill1.''.$skill2.''.$skill3;
		}
		// end of #0

		$exp_id		= substr($id, 0, 2);

		if ($exp_id == 'MI' || $exp_id == 'MF' || $exp_id == 'FF') {
			$document = $PHPWord->loadTemplate('files/admin_print_biodata_male.docx');

			$rowfamily  	= $this->m_printpack->tampil_data_family($id);
			$rowworking2 	= $this->m_printpack->tampil_data_working($id);
        	$rowskill 		= $this->m_printpack->tampil_data_skill($id);
        	$rowpersonal 	= $this->m_printpack->tampil_data_personal($id);
        	$rowrequest 	= $this->m_printpack->tampil_data_request($id);
			$rowpaspor 		= $this->m_printpack->tampil_data_paspor($id);
			$rowmajikan		= $this->m_printpack->tampil_data_majikan($id);

			$kode_agen 		= $rowmajikan->kode_agen;
			$kode_maji 		= $rowmajikan->kode_majikan;

			$nm_agen 		= $this->m_printpack->select_agen($kode_agen)->kode_agen;

			if ($kode_maji != 0) {
				$nm_maji 		= $this->m_printpack->select_maji($kode_maji)->kode_majikan;
			} else {
				$nm_maji 		= $rowmajikan->namamajikan;
			}

			if($rowpersonal->foto==null) {
				$datagambar="assets/uploads/profile.jpg";
				$aImgs1 = array(
	        		array(
	        		'img' 	=> $datagambar,
					'size' 	=> array(245, 380),
			        )
			    );
				$document->replaceStrToImg( 'gambar', $aImgs1);
				//$document->setValue( 'img','');
			} else {
				$datagambar="assets/uploads/".$rowpersonal->foto;
				$aImgs1 = array(
	        		array(
	        		'img' 	=> $datagambar,
					'size' 	=> array(245, 380),
			        )
			    );
				$document->replaceStrToImg( 'gambar', $aImgs1);
			}

			$document->setValue('pinhou1', $tampilidbio);
			$document->setValue('pl1', $rowpersonal->kode_sponsor);

			$document->setValue('value1', $nm_agen);
			$document->setValue('value2', $nm_maji);

			$document->setValue('value3', $rowpersonal->nama);
			$document->setValue('value3b', $rowpersonal->nama_mandarin);

			$document->setValue('value4', $rowpersonal->tanggaldaftar);
			$document->setValue('value5', $rowpersonal->jeniskelamin);

			$document->setValue('value6', $rowpersonal->tinggi);
			$document->setValue('value7', $rowpersonal->warganegara);

			$document->setValue('value8', $rowpersonal->berat);
			$document->setValue('value9', $rowpersonal->tgllahir);

			$document->setValue('value10', $rowpersonal->agama);
			$document->setValue('value11', $rowpersonal->tempatlahir);

			$document->setValue('value12', $rowpersonal->status);
			$document->setValue('value13', $rowpersonal->umur);

			$document->setValue('value13b', $rowpersonal->tglmenikah);

			$document->setValue('value14', $rowpersonal->pendidikan.' '.$rowpersonal->pendidikan_mandarin);

			$document->setValue('value15', $rowpersonal->alamat);
			$document->setValue('value16', $rowpersonal->provinsi);

			$document->setValue('value17', $rowpersonal->mandarin);
			$document->setValue('value18', $rowpersonal->inggris);

			$document->setValue('value19', $rowfamily->nama_bapak); 
			$document->setValue('value20', $rowfamily->umur_bapak.' tahun 嵗'); 
			$document->setValue('value21', $rowfamily->kerja_bapak); 

			$document->setValue('value22', $rowfamily->nama_ibu); 
			$document->setValue('value23', $rowfamily->umur_ibu.' tahun 嵗'); 
			$document->setValue('value24', $rowfamily->kerja_ibu); 

			$document->setValue('value25', $rowfamily->nama_istri_suami); 
			$document->setValue('value26', $rowfamily->umur_istri_suami.' tahun 嵗'); 
			$document->setValue('value27', $rowfamily->kerja_istri_suami); 

			$document->setValue('value28', $rowfamily->saudara_laki); 
			$document->setValue('value29', $rowfamily->saudar_pr); 
			$document->setValue('value30', $rowfamily->anak_ke);  
			$document->setValue('value31', $rowfamily->data_anak);

			if ($rowworking2 != NULL) {

				$document->cloneRow('we2',count($rowworking2));

				$ne=1;
				foreach ($rowworking2 as $rowworking) {
					$document->setValue('we1#'.$ne, $rowworking->negara);
					$document->setValue('we2#'.$ne, $rowworking->isi.''.$rowworking->mandarin);
					$document->setValue('we3#'.$ne, $rowworking->posisi);
					$document->setValue('we4#'.$ne, $rowworking->penjelasan);
					$document->setValue('we5#'.$ne, $rowworking->masa_kerja.' '.$rowworking->masabulan.'<br>'.$rowworking->tahun);
					$document->setValue('we6#'.$ne, $rowworking->alasan);
				$ne++;
				}
			} else {
				$document->setValue('we1', '');
				$document->setValue('we2', '');
				$document->setValue('we3', '');
				$document->setValue('we4', '');
				$document->setValue('we5', '');
				$document->setValue('we6', '');
			}

			if ($rowskill != NULL) {	
				$sk_1 = $rowskill->keterampilan;
				$sk_2 = $rowskill->hobi;
				$sk_3 = $rowskill->alkohol;
				$sk_4 = $rowskill->merokok;
				$sk_5 = $rowskill->food;
				$sk_6 = $rowskill->alergi;
				$sk_7 = $rowskill->operasi;
				$sk_8 = $rowskill->tato;
				$sk_9 = $rowskill->kidal;
				$sk_10 = 'Bisa mengangkat 能夠抱 '.$rowskill->angkat.' KG 公斤';
				$sk_11 = 'Push up-推升 '.$rowskill->pushup;
				$sk_12 = $rowskill->peglihatan;
				$sk_13 = $rowskill->butawarna;
			} else {
				$sk_1 = '';
				$sk_2 = '';
				$sk_3 = '';
				$sk_4 = '';
				$sk_5 = '';
				$sk_6 = '';
				$sk_7 = '';
				$sk_8 = '';
				$sk_9 = '';
				$sk_10 = '';
				$sk_11 = '';
				$sk_12 = '';
				$sk_13 = '';
			}
			$document->setValue('kkf1', $sk_1);
			$document->setValue('kkf2', $sk_2);
			$document->setValue('kkf3', $sk_3);
			$document->setValue('kkf4', $sk_4);
			$document->setValue('kkf5', $sk_5);
			$document->setValue('kkf6', $sk_6);
			$document->setValue('kkf7', $sk_7);
			$document->setValue('kkf8', $sk_8);
			$document->setValue('kkf9', $sk_9);
			$document->setValue('kkf10', $sk_10);
			$document->setValue('kkf11', $sk_11);
			$document->setValue('kkf12', $sk_12);
			$document->setValue('kkf13', $sk_13);

			if ($rowrequest != NULL) {
				$req1 = $rowrequest->usahamajikan;
				$req2 = $rowrequest->jenispekerjaan;
				$req3 = $rowrequest->waktukerja;
				$req4 = $rowrequest->lokasikerja;
				$req5 = $rowrequest->kondisikerja;
				$req6 = $rowrequest->lembur;
			} else {
				$req1 = '';
				$req2 = '';
				$req3 = '';
				$req4 = '';
				$req5 = '';
				$req6 = '';
			}

			$document->setValue('p1', $req1);
			$document->setValue('p2', $req2);
			$document->setValue('p3', $req3);
			$document->setValue('p4', $req4);
			$document->setValue('p5', $req5);
			$document->setValue('p6', $req6);

			$document->setValue('keet', $rowpersonal->keterangan);

			if($rowpaspor->keterangan=="sudah"){
				$op1 = " 有- ADA "; 
				$op2 = "到期-Berlaku sampai";
				$op3 = $rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired);
			} elseif($rowpaspor->keterangan=="mati") {
				$op1 = " 護照关闭 - PASPOR MATI ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			} elseif($rowpaspor->keterangan=="exbio") {
				$op1 = " 護照丟失 - EX BIOMETRI ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			} else {
				$op1 = " 沒有- BELUM ADA ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			}

			$document->setValue('pasp1', $op1);
			$document->setValue('pasp2', $op2);
			$document->setValue('pasp3', $op3);


			$document->setValue('nohh1', $rowpersonal->notelp);

			$document->setValue('nohh2', $rowpersonal->notelpkel);

		} elseif ($exp_id == 'JP') {
			$document = $PHPWord->loadTemplate('files/admin_print_biodata_jp.docx');

			$rowfamily  	= $this->m_printpack->tampil_data_family($id);
			$rowworking2 	= $this->m_printpack->tampil_data_working($id);
        	$rowskill 		= $this->m_printpack->tampil_data_skill($id);
        	$rowpersonal 	= $this->m_printpack->tampil_data_personal($id);
        	$rowinterview	= $this->m_printpack->tampil_data_interview($id);
			$rowpaspor 		= $this->m_printpack->tampil_data_paspor($id);
			$rowmajikan		= $this->m_printpack->tampil_data_majikan($id);

			$kode_agen 		= $rowmajikan->kode_agen;
			$kode_maji 		= $rowmajikan->kode_majikan;

			$nm_agen 		= $this->m_printpack->select_agen($kode_agen)->kode_agen;

			if ($kode_maji != 0) {
				$nm_maji 		= $this->m_printpack->select_maji($kode_maji)->kode_majikan;
			} else {
				$nm_maji 		= $rowmajikan->namamajikan;
			}

			if($rowpersonal->foto==null) {
				$datagambar="assets/uploads/profile.jpg";
				$aImgs1 = array(
	        		array(
	        		'img' 	=> $datagambar,
					'size' 	=> array(245, 380),
			        )
			    );
				$document->replaceStrToImg( 'picsz', $aImgs1);
				//$document->setValue( 'img','');
			} else {
				$datagambar="assets/uploads/".$rowpersonal->foto;
				$aImgs1 = array(
	        		array(
	        		'img' 	=> $datagambar,
					'size' 	=> array(245, 380),
			        )
			    );
				$document->replaceStrToImg( 'picsz', $aImgs1);
			}

			$document->setValue('pinhou1', $tampilidbio);
			$document->setValue('pl1', $rowpersonal->kode_sponsor);

			$document->setValue('value1', $nm_agen);
			$document->setValue('value2', $nm_maji);

			$document->setValue('value3', $rowpersonal->nama);
			$document->setValue('value3b', $rowpersonal->nama_mandarin);

			$document->setValue('value4', $rowpersonal->tanggaldaftar);
			$document->setValue('value5', $rowpersonal->jeniskelamin);

			$document->setValue('value6', $rowpersonal->tinggi);
			$document->setValue('value7', $rowpersonal->warganegara);

			$document->setValue('value8', $rowpersonal->berat);
			$document->setValue('value9', $rowpersonal->tgllahir);

			$document->setValue('value10', $rowpersonal->agama);
			$document->setValue('value11', $rowpersonal->tempatlahir);

			$document->setValue('value12', $rowpersonal->status);
			$document->setValue('value13', $rowpersonal->umur);

			$document->setValue('value13b', $rowpersonal->tglmenikah);

			$document->setValue('value14', $rowpersonal->pendidikan.' '.$rowpersonal->pendidikan_mandarin);

			$document->setValue('value15', $rowpersonal->alamat);
			$document->setValue('value16', $rowpersonal->provinsi);

			$document->setValue('value17', $rowpersonal->mandarin);
			$document->setValue('value18', $rowpersonal->inggris);

			$document->setValue('value19', $rowfamily->nama_bapak); 
			$document->setValue('value20', $rowfamily->umur_bapak.' tahun 嵗'); 
			$document->setValue('value21', $rowfamily->kerja_bapak); 

			$document->setValue('value22', $rowfamily->nama_ibu); 
			$document->setValue('value23', $rowfamily->umur_ibu.' tahun 嵗'); 
			$document->setValue('value24', $rowfamily->kerja_ibu); 

			$document->setValue('value25', $rowfamily->nama_istri_suami); 
			$document->setValue('value26', $rowfamily->umur_istri_suami.' tahun 嵗'); 
			$document->setValue('value27', $rowfamily->kerja_istri_suami); 

			$document->setValue('value28', $rowfamily->saudara_laki); 
			$document->setValue('value29', $rowfamily->saudar_pr); 
			$document->setValue('value30', $rowfamily->anak_ke);  
			$document->setValue('value31', $rowfamily->data_anak);

			if ($rowworking2 != NULL) {

				$document->cloneRow('we2',count($rowworking2));

				$ne=1;
				foreach ($rowworking2 as $rowworking) {
					$document->setValue('we1#'.$ne, $rowworking->negara);
					$document->setValue('we2#'.$ne, $rowworking->isi.''.$rowworking->mandarin);
					$document->setValue('we3#'.$ne, $rowworking->posisi);
					$document->setValue('we4#'.$ne, $rowworking->penjelasan);
					$document->setValue('we5#'.$ne, $rowworking->masa_kerja.' '.$rowworking->masabulan.'<br>'.$rowworking->tahun);
					$document->setValue('we6#'.$ne, $rowworking->alasan);
				$ne++;
				}
			} else {
				$document->setValue('we1', '');
				$document->setValue('we2', '');
				$document->setValue('we3', '');
				$document->setValue('we4', '');
				$document->setValue('we5', '');
				$document->setValue('we6', '');
			}

			if ($rowskill != NULL) {	
				$sk_1 = $rowskill->keterampilan;
				$sk_2 = $rowskill->hobi;
				$sk_3 = $rowskill->alkohol;
				$sk_4 = $rowskill->merokok;
				$sk_5 = $rowskill->food;
				$sk_6 = $rowskill->alergi;
				$sk_7 = $rowskill->operasi;
				$sk_8 = $rowskill->tato;
				$sk_9 = $rowskill->kidal;
				$sk_10 = 'Bisa mengangkat 能夠抱 '.$rowskill->angkat.' KG 公斤';
				$sk_11 = 'Push up-推升 '.$rowskill->pushup;
				$sk_12 = $rowskill->peglihatan;
				$sk_13 = $rowskill->butawarna;
			} else {
				$sk_1 = '';
				$sk_2 = '';
				$sk_3 = '';
				$sk_4 = '';
				$sk_5 = '';
				$sk_6 = '';
				$sk_7 = '';
				$sk_8 = '';
				$sk_9 = '';
				$sk_10 = '';
				$sk_11 = '';
				$sk_12 = '';
				$sk_13 = '';
			}
			$document->setValue('kkf1', $sk_1);
			$document->setValue('kkf2', $sk_2);
			$document->setValue('kkf3', $sk_3);
			$document->setValue('kkf4', $sk_4);
			$document->setValue('kkf5', $sk_5);
			$document->setValue('kkf6', $sk_6);
			$document->setValue('kkf7', $sk_7);
			$document->setValue('kkf8', $sk_8);
			$document->setValue('kkf9', $sk_9);
			$document->setValue('kkf10', $sk_10);
			$document->setValue('kkf11', $sk_11);
			$document->setValue('kkf12', $sk_12);
			$document->setValue('kkf13', $sk_13);

			if ($rowinterview != NULL) {
				$req1 = $rowinterview->sunction;
				$req2 = $rowinterview->food;
				$req3 = $rowinterview->cateter;
				$req4 = $rowinterview->injection;
				$req5 = $rowinterview->therapy;
				$req6 = $rowinterview->helping;
				$req7 = $rowinterview->bed;
				$req8 = $rowinterview->stairs;
			} else {
				$req1 = '';
				$req2 = '';
				$req3 = '';
				$req4 = '';
				$req5 = '';
				$req6 = '';
				$req7 = '';
				$req8 = '';
			}

			$document->setValue('xxx3', $req1);
			$document->setValue('xxx4', $req2);
			$document->setValue('xxx5', $req3);
			$document->setValue('xxx6', $req4);
			$document->setValue('xxx7', $req5);
			$document->setValue('xxx8', $req6);
			$document->setValue('xxx9', $req7);
			$document->setValue('xxx10', $req8);

			$document->setValue('keet', $rowpersonal->keterangan);

			if($rowpaspor->keterangan=="sudah"){
				$op1 = " 有- ADA "; 
				$op2 = "到期-Berlaku sampai";
				$op3 = $rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired);
			} elseif($rowpaspor->keterangan=="mati") {
				$op1 = " 護照关闭 - PASPOR MATI ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			} elseif($rowpaspor->keterangan=="exbio") {
				$op1 = " 護照丟失 - EX BIOMETRI ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			} else {
				$op1 = " 沒有- BELUM ADA ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			}

			$document->setValue('pasp1', $op1);
			$document->setValue('pasp2', $op2);
			$document->setValue('pasp3', $op3);


			$document->setValue('nohh1', $rowpersonal->notelp);

			$document->setValue('nohh2', $rowpersonal->notelpkel);
		} elseif ($exp_id == 'FI') {
			$document = $PHPWord->loadTemplate('files/admin_print_biodata.docx');

			// #1
			$rowpersonalx 	= $this->m_printpack->tampil_data_personal($id);
			$rowfamilyfi 	= $this->m_printpack->tampil_data_family($id);
			$rowpaspor 		= $this->m_printpack->tampil_data_paspor($id);

			if ($rowfamilyfi != NULL) {
		 		$hitungtahun 	= substr_count($rowfamilyfi->data_anak, 'tahun');
				$hitungbulan 	= substr_count($rowfamilyfi->data_anak, 'bulan');
				$hasilnya 		= $hitungbulan+$hitungtahun; 	
				$cwk 			= $rowfamilyfi->saudara_laki;
				$cwek 			= $rowfamilyfi->saudar_pr;
				$ttl 			= $cwk+$cwek;
			}
			// end of #1

			// #2
			$tampil_data_pengalamanfi = $this->m_printpack->tampil_data_pengalaman($id);
			
			foreach ($tampil_data_pengalamanfi as $rowpengalamanfi) {
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

				if ($krjprt=='1') { $krjprt='V'; } else { $krjprt=' '; }
				if ($msk=='1') { $msk='V'; } else { $msk=' '; }
				if ($cucibj=='1') { $cucibj='V'; } else { $cucibj=' '; }
				if ($strk=='1') { $strk='V'; } else { $strk=' '; }
				if ($cucimb=='1') { $cucimb='V'; } else { $cucimb=' '; }
				if ($rwtb=='1') { $rwtb='V'; } else { $rwtb=' '; }

				$rumah[] 			= $krjprt;
				$masak[] 			= $msk;
				$cucibaju[] 		= $cucibj;
				$Menyetrika[] 		= $strk;
				$cucimobil[]		= $cucimb;
				$merawatbinatang[] 	= $rwtb;
				$merawatbayi[] 		= $rowpengalamanfi->rawatbayi;
				$merawatanak[] 		= $rowpengalamanfi->rawatanak.' Orang 位';
				$umuranak[] 		= $rowpengalamanfi->umur;

				if ($rowpengalamanfi->rawatanak == NULL) {
					$kondisianak[] = '-';
				} else {
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
				// end of #2
			}

				//print_r($negarahtml);

			$tugas 		= $this->m_printpack->tampil_data_tugas($id);

			$kettugas 	= $this->m_printpack->tampil_data_kettugas($id);

			if($rowpersonalx->foto==null) {
				$datagambar="assets/uploads/profile.jpg";
				$aImgs1 = array(
	        		array(
	        		'img' 	=> $datagambar,
					'size' 	=> array(245, 380),
			        )
			    );
				$document->replaceStrToImg( 'img', $aImgs1);
				//$document->setValue( 'img','');
			} else {
				$datagambar="assets/uploads/".$rowpersonalx->foto;
				$aImgs1 = array(
	        		array(
	        		'img' 	=> $datagambar,
					'size' 	=> array(245, 380),
			        )
			    );
				$document->replaceStrToImg( 'img', $aImgs1);
			}


		    //print_r($aImgs);
		    //$document->replaceStrToImg( 'img', $aImgs);


			$document->setValue('value1', $tampilidbio);
			$document->setValue('value2', $rowpersonalx->kode_sponsor);
			$document->setValue('value3', $rowpersonalx->tanggaldaftar);
			$document->setValue('value4', $rowpersonalx->nama);
			$document->setValue('value5', $rowpersonalx->nama_mandarin);
			$document->setValue('value6', $rowpersonalx->tgllahir);
			$document->setValue('value7', $rowpersonalx->tempatlahir);
			$document->setValue('value8', $rowpersonalx->umur.' Tahun 歲');
			$document->setValue('value9', $rowpersonalx->tinggi.' cm 公分');
			$document->setValue('value10', $rowpersonalx->berat.' kg 公斤');
			$document->setValue('value11', $rowpersonalx->pendidikan);
			$document->setValue('value12', $rowpersonalx->agama);
			$document->setValue('value13', $rowpersonalx->status);
			$document->setValue('value14', $rowpersonalx->tglmenikah);

			if ($rowfamilyfi != NULL) {
				$document->setValue('value15', $rowfamilyfi->nama_istri_suami);
				$document->setValue('value16', $rowfamilyfi->umur_istri_suami);
				$document->setValue('value17', $rowfamilyfi->kerja_istri_suami);
				$document->setValue('value18', $hasilnya.' anak');
				$document->setValue('value19', $rowfamilyfi->data_anak);
			} else {
				$document->setValue('value15', '');
				$document->setValue('value16', '');
				$document->setValue('value17', '');
				$document->setValue('value18', '');
				$document->setValue('value19', '');
			}

			$document->setValue('value20', $rowpersonalx->mandarin);
			$document->setValue('value21', $rowpersonalx->taiyu);
			$document->setValue('value22', $rowpersonalx->inggris);
			$document->setValue('value23', $rowpersonalx->cantonese);
			$document->setValue('value24', $rowpersonalx->hakka);

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
				//echo $tb.$nn.'</br>';
			$nn++;
			}

			$ftr = $total_row;
			$cxz = $total_row+1;
			for ($tbz=$ftr; $tbz<4; $tbz++) {
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
				//echo '-'.$tbz.$cxz.'</br>';
			$cxz++;
			}

			if ($rowfamilyfi != NULL) {
				$document->setValue('kel1', $rowfamilyfi->nama_bapak);
				$document->setValue('kel2', $rowfamilyfi->nama_ibu);
				$document->setValue('kel3', $ttl);
				$document->setValue('kel6', $rowfamilyfi->umur_bapak.' tahun 嵗');
				$document->setValue('kel7', $rowfamilyfi->umur_ibu.' tahun 嵗');
				$document->setValue('kel8', $rowfamilyfi->anak_ke);
			} else {
				$document->setValue('kel1', '');
				$document->setValue('kel2', '');
				$document->setValue('kel3', '');
				$document->setValue('kel6', '');
				$document->setValue('kel7', '');
				$document->setValue('kel8', '');
			}

			if ($tugas != NULL) {
				$document->setValue('best1', $tugas->pekerjaan_rt);
				$document->setValue('best2', $tugas->merawat_bayi);
				$document->setValue('best3', $tugas->cacat);
				$document->setValue('best4', $tugas->anak_kecil);
				$document->setValue('best5', $tugas->memasak);
				$document->setValue('best6', $tugas->jompo);
			} else {
				$document->setValue('best1', '');
				$document->setValue('best2', '');
				$document->setValue('best3', '');
				$document->setValue('best4', '');
				$document->setValue('best5', '');
				$document->setValue('best6', '');
			}

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

			if ($rowpersonalx->keterangan != NULL) {
				$document->setValue('kethtml2', $rowpersonalx->keterangan);
			} else {
				$document->setValue('kethtml2', '');
			}
				
			if ($rowpersonalx->lokasikerja != NULL) {
				$document->setValue('lokasikerjahtml2', $rowpersonalx->lokasikerja);
			} else {
				$document->setValue('lokasikerjahtml2', '');
			}
				
			//echo $rowpersonalx->keterangan;
			//echo $rowpersonalx->lokasikerja;

			if($rowpaspor->keterangan=="sudah"){
				$op1 = " 有- ADA "; 
				$op2 = "到期-Berlaku sampai";
				$op3 = $rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired);
			} elseif($rowpaspor->keterangan=="mati") {
				$op1 = " 護照关闭 - PASPOR MATI ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			} elseif($rowpaspor->keterangan=="exbio") {
				$op1 = " 護照丟失 - EX BIOMETRI ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			} else {
				$op1 = " 沒有- BELUM ADA ";
				$op2 = " Rencana 安排 ";
				$op3 = $rowpaspor->tglterima;
			}

			$document->setValue('paspor1html', $op1);
			$document->setValue('paspor2html', $op2);
			$document->setValue('paspor3html', $op3);

			$rowmedical 	 	= $this->m_printpack->tampil_data_medical($id);
			$rowmedical2 	 	= $this->m_printpack->tampil_data_medical2($id);
			$rowmedical3 	 	= $this->m_printpack->tampil_data_medical3($id);
			$hitungmedical2 	= $this->m_printpack->hitung_data_medical2($id);
			$hitungmedical3 	= $this->m_printpack->hitung_data_medical3($id);
/*
			if($hitungmedicalsa==0) {
				$medicalhtml=$rowmedical->nama;
			} else {
				$medicalhtml=$rowmedical2->nama;
			}

			if($hitungmedical3>0) {
				$medicalhtml=$rowmedical3->nama;
			}*/

			if ($hitungmedical3 == 0 && $hitungmedical2 == 0) {
				$medicalhtml = $rowmedical->nama;
			} elseif ($hitungmedical3 == 0) {
				$medicalhtml = $rowmedical2->nama;
			} else {
				$medicalhtml = $rowmedical3->nama;
			}

			$document->setValue('meddhtml', $medicalhtml);

			$document->setValue('nohphtml', $rowpersonalx->notelp);

			$document->setValue('medicinehtml', $rowpersonalx->notelpkel);

		} 

		$tampil_data_arc = $this->M_session->select_row("SELECT * FROM upload_arc WHERE id_biodata='".$id."'");

		if ($tampil_data_arc != NULL) {
			$datagambar="assets/upload_arc/".$tampil_data_arc->file;
			$aImgs1 = array(
        		array(
        		'img' 	=> $datagambar,
		        )
		    );
			$document->replaceStrToImg( 'arc', $aImgs1);
		} else {
			$document->setValue('arc', '');
		}
				
		$filename = 'filenya.docx';

		$isinya = $document->save($filename);
	
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
}