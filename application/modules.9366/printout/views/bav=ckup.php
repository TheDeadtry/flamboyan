function biodata() {
 	$id = $this->session->userdata("detailuser");

 	if(substr($id, 0, 2) == 'FF' || substr($id, 0, 2) == 'MF' || substr($id, 0, 2) == 'MI') {
 		$result = $this->m_printout->ambil_data_biodata($id);
 		 	echo "aa".$id;
 		foreach($result->result() as $row) {
			$idid = $row->id_biodata;
			 	echo "bb".$id;
			$kdsp = $row->kode_sponsor;
			$kdag = $row->kode_agen;
			$nmmj = $row->namamajikan;
			$foto = $row->foto;
			$nama = $row->nama;
			$tgdf = $row->tanggaldaftar;
			$jkel = $row->jeniskelamin;
			$tgbd = $row->tinggi;
			$wrgn = $row->warganegara;
			$bert = $row->berat;
			$tglh = $row->tgllahir;
			$agma = $row->agama;
			$tplh = $row->tempatlahir;
			$stts = $row->status;
			$umur = $row->umur;
			$tgmn = $row->tglmenikah;
			$pddk = $row->pendidikan;
			$almt = $row->alamat;
			$prov = $row->provinsi;
			$mand = $row->mandarin;
			$ingg = $row->inggris;
			$nmbp = $row->nama_bapak;
			$umbp = $row->umur_bapak;
			$pkbp = $row->kerja_bapak;
			$nmib = $row->nama_ibu;
			$umib = $row->umur_ibu;
			$pkib = $row->kerja_ibu;
			$nmis = $row->nama_istri_suami;
			$umis = $row->umur_istri_suami;
			$pkis = $row->kerja_istri_suami;
			$sdlk = $row->saudara_laki;
			$sdpr = $row->saudar_pr;
			$anke = $row->anak_ke;
			$jman = $row->data_anak;
			$ketr = $row->keterampilan;
			$hobi = $row->hobi;
			$alkh = $row->alkohol;
			$roko = $row->merokok;
			$food = $row->food;
			$aler = $row->alergi;
			$oper = $row->operasi;
			$tato = $row->tato;
			$kidl = $row->kidal;
			$angk = $row->angkat;
			$push = $row->pushup;
			$mata = $row->peglihatan;
			$buta = $row->butawarna;
			$usma = $row->usahamajikan;
			$wktu = $row->waktukerja;
			$koke = $row->kondisikerja;
			$jeka = $row->jenispekerjaan;
			$loja = $row->lokasikerja;
			$lemb = $row->lembur;
			$pasp = $row->ketpas;
			$berl = $row->berlaku;
			$medi = $row->ketmed;
			$nohp = $row->hp;
			$hpkl = $row->hpkel;
		}
 	} else if(substr($id, 0, 2) == 'FI') {
 		$result = $this->m_printout->ambil_data_biodatafi($id);
 		foreach($result->result() as $row) {
 			$idid = $row->id_biodata;
 			$kdsp = $row->kode_sponsor;
 			$tgdf = $row->tanggaldaftar;
 			$foto = $row->foto;
 			$nama = $row->nama;
 			$tglh = $row->tgllahir;
 			$tplh = $row->tempatlahir;
 			$umur = $row->umur;
 			$tggi = $row->tinggi;
 			$brat = $row->berat;
 			$pddk = $row->pendidikan;
 			$agam = $row->agama;
 			$stts = $row->status;
 			$tglm = $row->tglmenikah;
 			$nmsm = $row->nama_istri_suami;
 			$umsm = $row->umur_istri_suami;
 			$pksm = $row->kerja_istri_suami;
 			$jman = $row->data_anak;
 			$mand = $row->mandarin;
 			$taiy = $row->taiyu;
 			$ingg = $row->inggris;
 			$cant = $row->cantonese;
 			$hakk = $row->hakka;
 			$nega = $row->negara;
 			$loka = $row->lokasikerja;
 			$lama = $row->lamakerja;
 			$peri = $row->periodekerja;
 			$jamk = $row->jamkerja;
 			$majp = $row->majikan;
 			$alas = $row->alasanberhenti;
 			$pen1 = $row->kerjaprt;
 			$pen2 = $row->memasak;
 			$pen3 = $row->mencucibaju;
 			$pen4 = $row->setrikabaju;
 			$pen5 = $row->mencucimobil;
 			$pen6 = $row->rawatbinatang;
 			$pen7 = $row->rawatbayi;
 			$pen8 = $row->rawatanak;
 			$pen9 = $row->umur;
 			$pe10 = $row->kondisi;
 			$pe11 = $row->jompokelamin;
 			$pe12 = $row->jompoumur;
 			$pe13 = $row->jompokondisi;
 			$pe14 = $row->anggotarumah;
 			$pe15 = $row->tiperumah;
 			$pe16 = $row->jumlahlantai;
 			$pe17 = $row->jumlahkamar;
 			$pe18 = $row->keterangan;
 			$nmbp = $row->nama_bapak;
 			$umbp = $row->umur_bapak;
 			$nmib = $row->nama_ibu;
 			$umib = $row->umur_ibu;
 			$jmsd = $row->saudara_laki + $row->saudar_pr;
 			$anak = $row->anak_ke;
 			$tug1 = $row->pekerjaan_rt;
 			$tug2 = $row->merawat_bayi;
 			$tug3 = $row->cacat;
 			$tug4 = $row->anak_kecil;
 			$tug5 = $row->memasak;
 			$tug6 = $row->jompo;
 			$ke1_1 = $row->t1_pengalaman;
 			$ke1_2 = $row->t1_latihan;
 			$ke1_3 = $row->t1_bersedia;
 			$ke2_1 = $row->t2_pengalaman;
 			$ke2_2 = $row->t2_latihan;
 			$ke2_3 = $row->t2_bersedia;
 			$ke3_1 = $row->t3_pengalaman;
 			$ke3_2 = $row->t3_latihan;
 			$ke3_3 = $row->t3_bersedia;
 			$ke4_1 = $row->t4_pengalaman;
 			$ke4_2 = $row->t4_latihan;
 			$ke4_3 = $row->t4_bersedia;
 			$ke5_1 = $row->t5_pengalaman;
 			$ke5_3 = $row->t5_bersedia;
 			$ke6_1 = $row->t6_pengalaman;
 			$ke6_3 = $row->t6_bersedia;
 			$ke7_1 = $row->t7_pengalaman;
 			$ke7_3 = $row->t7_bersedia;
 			$ke8_1 = $row->t8_pengalaman;
			$ke8_3 = $row->t8_bersedia;
			$ke9_1 = $row->t9_pengalaman;
			$ke9_3 = $row->t9_bersedia;
			$k10_1 = $row->t10_pengalaman;
			$k10_2 = $row->t10_latihan;
			$k10_3 = $row->t10_bersedia;
			$k11_1 = $row->t11_pengalaman;
			$k11_2 = $row->t11_latihan;
			$k11_3 = $row->t11_bersedia;
			$k12_1 = $row->t12_pengalaman;
			$k12_3 = $row->t12_bersedia;
			$k13_1 = $row->t13_pengalaman;
			$k13_3 = $row->t13_bersedia;
			$k14a1 = $row->t14apengalaman;
			$k14a3 = $row->t14abersedia;
			$k14b1 = $row->t14bpengalaman;
			$k14b3 = $row->t14bbersedia;
			$k15_1 = $row->t15_pengalaman;
			$k15_3 = $row->t15_bersedia;
			$k16_1 = $row->t16_pengalaman;
			$k16_3 = $row->t16_bersedia;
			$k17_1 = $row->t17_pengalaman;
			$k17_3 = $row->t17_bersedia;
			$k18_1 = $row->t18_pengalaman;
			$k18_3 = $row->t18_bersedia;
			$k19_1 = $row->t19_pengalaman;
			$k19_3 = $row->t19_bersedia;
			$k20_1 = $row->t20_pengalaman;
			$k20_3 = $row->t20_bersedia;
			$k21_1 = $row->t21_pengalaman;
			$k21_3 = $row->t21_bersedia;
			$k22_1 = $row->t22_pengalaman;
			$k22_3 = $row->t22_bersedia;
			$k23_1 = $row->t23_pengalaman;
			$k23_3 = $row->t23_bersedia;
			$k24_1 = $row->t24_pengalaman;
			$k24_3 = $row->t24_bersedia;
			$k25_1 = $row->t25_pengalaman;
			$k25_3 = $row->t25_bersedia;
			$k26_1 = $row->t26_pengalaman;
			$k26_3 = $row->t26_bersedia;
			$k27_1 = $row->t27_pengalaman;
			$k27_3 = $row->t27_bersedia;
			$k28_1 = $row->t28_pengalaman;
			$k28_3 = $row->t28_bersedia;
			$k29_1 = $row->t29_pengalaman;
			$k29_3 = $row->t29_bersedia;
			$k30_1 = $row->t30_pengalaman;
			$k30_3 = $row->t30_bersedia;
			$k31_1 = $row->t31_pengalaman;
			$k31_3 = $row->t31_bersedia;
			$k32_1 = $row->t32_pengalaman;
			$k32_3 = $row->t32_bersedia;
			$k33_1 = $row->t33_pengalaman;
			$k33_3 = $row->t33_bersedia;
			$k34_1 = $row->t34_pengalaman;
			$k34_3 = $row->t34_bersedia;
			$k35_1 = $row->t35_kg;
 			$nohp = $row->hp;			
 			$nokl = $row->hpkel;			
 			$pasp = $row->ketpas;
 			$berl = $row->berlaku;			
 			$renc = $row->rencana;
 		}
 	} else if(substr($id, 0, 2) == 'FF') {
 		$result = $this->m_printout->ambil_data_biodataff($id);
 		foreach($result->result() as $row) {
 			$idid = $row->id_biodata;
 			$kdsp = $row->kode_sponsor;
 			$tgdf = $row->tanggaldaftar;
 			$foto = $row->foto;
 			$nama = $row->nama;
 			$tglh = $row->tgllahir;
 			$tplh = $row->tempatlahir;
 			$umur = $row->umur;
 			$tggi = $row->tinggi;
 			$brat = $row->berat;
 			$pddk = $row->pendidikan;
 			$agam = $row->agama;
 			$stts = $row->status;
 			$tglm = $row->tglmenikah;
 			$nmsm = $row->nama_istri_suami;
 			$umsm = $row->umur_istri_suami;
 			$pksm = $row->kerja_istri_suami;
 			$jman = $row->data_anak;
 			$mand = $row->mandarin;
 			$taiy = $row->taiyu;
 			$ingg = $row->inggris;
 			$cant = $row->cantonese;
 			$hakk = $row->hakka;
 			$nega = $row->negara;
 			$loka = $row->lokasikerja;
 			$lama = $row->lamakerja;
 			$peri = $row->periodekerja;
 			$jamk = $row->jamkerja;
 			$majp = $row->majikan;
 			$alas = $row->alasanberhenti;
 			$pen1 = $row->kerjaprt;
 			$pen2 = $row->memasak;
 			$pen3 = $row->mencucibaju;
 			$pen4 = $row->setrikabaju;
 			$pen5 = $row->mencucimobil;
 			$pen6 = $row->rawatbinatang;
 			$pen7 = $row->rawatbayi;
 			$pen8 = $row->rawatanak;
 			$pen9 = $row->umur;
 			$pe10 = $row->kondisi;
 			$pe11 = $row->jompokelamin;
 			$pe12 = $row->jompoumur;
 			$pe13 = $row->jompokondisi;
 			$pe14 = $row->anggotarumah;
 			$pe15 = $row->tiperumah;
 			$pe16 = $row->jumlahlantai;
 			$pe17 = $row->jumlahkamar;
 			$pe18 = $row->keterangan;
 			$nmbp = $row->nama_bapak;
 			$umbp = $row->umur_bapak;
 			$nmib = $row->nama_ibu;
 			$umib = $row->umur_ibu;
 			$jmsd = $row->saudara_laki + $row->saudar_pr;
 			$anak = $row->anak_ke;
 			$tug1 = $row->pekerjaan_rt;
 			$tug2 = $row->merawat_bayi;
 			$tug3 = $row->cacat;
 			$tug4 = $row->anak_kecil;
 			$tug5 = $row->memasak;
 			$tug6 = $row->jompo;
 			$ke1_1 = $row->t1_pengalaman;
 			$ke1_2 = $row->t1_latihan;
 			$ke1_3 = $row->t1_bersedia;
 			$ke2_1 = $row->t2_pengalaman;
 			$ke2_2 = $row->t2_latihan;
 			$ke2_3 = $row->t2_bersedia;
 			$ke3_1 = $row->t3_pengalaman;
 			$ke3_2 = $row->t3_latihan;
 			$ke3_3 = $row->t3_bersedia;
 			$ke4_1 = $row->t4_pengalaman;
 			$ke4_2 = $row->t4_latihan;
 			$ke4_3 = $row->t4_bersedia;
 			$ke5_1 = $row->t5_pengalaman;
 			$ke5_3 = $row->t5_bersedia;
 			$ke6_1 = $row->t6_pengalaman;
 			$ke6_3 = $row->t6_bersedia;
 			$ke7_1 = $row->t7_pengalaman;
 			$ke7_3 = $row->t7_bersedia;
 			$ke8_1 = $row->t8_pengalaman;
			$ke8_3 = $row->t8_bersedia;
			$ke9_1 = $row->t9_pengalaman;
			$ke9_3 = $row->t9_bersedia;
			$k10_1 = $row->t10_pengalaman;
			$k10_2 = $row->t10_latihan;
			$k10_3 = $row->t10_bersedia;
			$k11_1 = $row->t11_pengalaman;
			$k11_2 = $row->t11_latihan;
			$k11_3 = $row->t11_bersedia;
			$k12_1 = $row->t12_pengalaman;
			$k12_3 = $row->t12_bersedia;
			$k13_1 = $row->t13_pengalaman;
			$k13_3 = $row->t13_bersedia;
			$k14a1 = $row->t14apengalaman;
			$k14a3 = $row->t14abersedia;
			$k14b1 = $row->t14bpengalaman;
			$k14b3 = $row->t14bbersedia;
			$k15_1 = $row->t15_pengalaman;
			$k15_3 = $row->t15_bersedia;
			$k16_1 = $row->t16_pengalaman;
			$k16_3 = $row->t16_bersedia;
			$k17_1 = $row->t17_pengalaman;
			$k17_3 = $row->t17_bersedia;
			$k18_1 = $row->t18_pengalaman;
			$k18_3 = $row->t18_bersedia;
			$k19_1 = $row->t19_pengalaman;
			$k19_3 = $row->t19_bersedia;
			$k20_1 = $row->t20_pengalaman;
			$k20_3 = $row->t20_bersedia;
			$k21_1 = $row->t21_pengalaman;
			$k21_3 = $row->t21_bersedia;
			$k22_1 = $row->t22_pengalaman;
			$k22_3 = $row->t22_bersedia;
			$k23_1 = $row->t23_pengalaman;
			$k23_3 = $row->t23_bersedia;
			$k24_1 = $row->t24_pengalaman;
			$k24_3 = $row->t24_bersedia;
			$k25_1 = $row->t25_pengalaman;
			$k25_3 = $row->t25_bersedia;
			$k26_1 = $row->t26_pengalaman;
			$k26_3 = $row->t26_bersedia;
			$k27_1 = $row->t27_pengalaman;
			$k27_3 = $row->t27_bersedia;
			$k28_1 = $row->t28_pengalaman;
			$k28_3 = $row->t28_bersedia;
			$k29_1 = $row->t29_pengalaman;
			$k29_3 = $row->t29_bersedia;
			$k30_1 = $row->t30_pengalaman;
			$k30_3 = $row->t30_bersedia;
			$k31_1 = $row->t31_pengalaman;
			$k31_3 = $row->t31_bersedia;
			$k32_1 = $row->t32_pengalaman;
			$k32_3 = $row->t32_bersedia;
			$k33_1 = $row->t33_pengalaman;
			$k33_3 = $row->t33_bersedia;
			$k34_1 = $row->t34_pengalaman;
			$k34_3 = $row->t34_bersedia;
			$k35_1 = $row->t35_kg;
 			$nohp = $row->hp;			
 			$nokl = $row->hpkel;			
 			$pasp = $row->ketpas;
 			$berl = $row->berlaku;			
 			$renc = $row->rencana;
 		}
 	} else if(substr($id, 0, 2) == 'JP') {
 		$result = $this->m_printout->ambil_data_biodatajp($id);
 		foreach($result->result() as $row) {
 			$idid = $row->id_biodata;
			$kdsp = $row->kode_sponsor;
			$kdag = $row->kode_agen;
			$foto = $row->foto;
			$nama = $row->nama;
			$tgdf = $row->tanggaldaftar;
			$jkel = $row->jeniskelamin;
			$tgbd = $row->tinggi;
			$wrgn = $row->warganegara;
			$bert = $row->berat;
			$tglh = $row->tgllahir;
			$agma = $row->agama;
			$tplh = $row->tempatlahir;
			$stts = $row->status;
			$umur = $row->umur;
			$tgmn = $row->tglmenikah;
			$pddk = $row->pendidikan;
			$almt = $row->alamat;
			$prov = $row->provinsi;
			$mand = $row->mandarin;
			$ingg = $row->inggris;
			$nmbp = $row->nama_bapak;
			$umbp = $row->umur_bapak;
			$pkbp = $row->kerja_bapak;
			$nmib = $row->nama_ibu;
			$umib = $row->umur_ibu;
			$pkib = $row->kerja_ibu;
			$nmis = $row->nama_istri_suami;
			$umis = $row->umur_istri_suami;
			$pkis = $row->kerja_istri_suami;
			$sdlk = $row->saudara_laki;
			$sdpr = $row->saudar_pr;
			$anke = $row->anak_ke;
			$jman = $row->data_anak;
			$ketr = $row->keterampilan;
			$hobi = $row->hobi;
			$alkh = $row->alkohol;
			$roko = $row->merokok;
			$food = $row->food;
			$aler = $row->alergi;
			$oper = $row->operasi;
			$tato = $row->tato;
			$kidl = $row->kidal;
			$angk = $row->angkat;
			$push = $row->pushup;
			$mata = $row->peglihatan;
			$buta = $row->butawarna;
			$int1 = $row->sunction;
			$int2 = $row->food;
			$int3 = $row->cateter;
			$int4 = $row->injection;
			$int5 = $row->therapy;
			$int6 = $row->helping;
			$int7 = $row->bed;
			$int8 = $row->stairs;
			$pasp = $row->ketpas;
			$berl = $row->berlaku;
			$medi = $row->ketmed;
			$nohp = $row->hp;
			$hpkl = $row->hpkel;
 		}
 	}
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-16', false);    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
    // set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    //$pdf->SetPrintHeader(false);
	//$pdf->SetPrintFooter(false);
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    //$pdf->SetFont('dejavusans', '', 12, '', true);   
    $pdf->SetFont('kozminproregular', '', 11);
	$pdf->AddPage(); 
    //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
    // Set some content to print
    $html = '';
    $htm2 = '';
    $stat = substr($idid, 0, 2); // MI, MF, FF, FI, JP
    if($stat == 'MI' || $stat == 'MF' || $stat == 'FF') {
		foreach($result->result() as $row) {
	    $htm2 .= '
	    	<tr>
				<td rowspan="2" class="biru tengah">'.$row->negara.'</td>
				<td rowspan="2" class="biru tengah">'.$row->jenis_usaha.'</td>
				<td colspan="2" class="biru tengah">'.$row->posisi.'</td>
				<td rowspan="2" class="kuning tengah">'.$row->masa_kerja.'</td>
				<td rowspan="2" class="biru tengah">'.$row->alasan.'</td>
			</tr>
			<tr>
				<td colspan="2" class="biru tengah">'.$row->penjelasan.'</td>
			</tr>
	    ';
		}
    	$html = '
	    <style type="text/css">
	    	td, th {
				padding: 5px;
			}

			.biru {
				background-color: #a4d3ed;
			}

			.kuning {
				background-color: #fff733;
			}

			.coklat {
				background-color: #e88e25;
			}

			.tengah {
				text-align: center;
			}
			
			.header1 {
				color: #13ad2c;
				font-size: 20px;
				text-align: center;
			}

			.header2 {
				color: #ff3838;
				text-align: center;
			}
		</style>
		<!-- AWAL HEADER -->
	    <table>
	    	<tr>
	    		<td colspan="6" class="header1">PT Flamboyan Gema Jasa</td>
	    	</tr>
	    	<tr>
	    		<td colspan="6" class="header2">Jl. Inspektur Suwoto No. 95B RT.02 RW.01 Ds.Sidodadi Kec.Lawang, Kab.Malang, East Java, Indonesia. Post code 65251 <br>Email : mahartatiang@yahoo.co.id</td>
	    	</tr>
	    </table>
	    <!-- AKHIR HEADER -->
		<!-- AWAL FORM 1 -->
		<table border="1">
			<tr>
				<th>'.$id.'</th>
				<th class="biru">PL :'.$kdsp.'</th>
				<th colspan="2">仲介公司-Agent : '.$kdag.'</th>
				<th colspan="2">僱主名稱-Nama Majikan : '.$nmmj.'</th>
			</tr>
			<tr>
				<td colspan="2" rowspan="10"><img src="assets/uploads/'.$foto.'" width="220" height="300"></td>
				<th colspan="4" class="biru tengah">個人資料 / Personal Data</th>
			</tr>
			<tr>
				<td class="tengah">姓名 Nama</td>
				<th colspan="2" class="kuning tengah">'.$nama.'</th>
				<td></td>
			</tr>
			<tr>
				<td class="tengah">報到日期 Tanggal Daftar</td>
				<td class="kuning tengah">'.$tgdf.'</td>
				<td class="tengah">性別 Jenis Kelamin</td>
				<td class="tengah">'.$jkel.'</td>
			</tr>
			<tr>
				<td class="tengah">身 高 Tinggi Badan</td>
				<td class="kuning tengah">'.$tgbd.' cm</td>
				<td class="tengah">國籍 Warganegara</td>
				<td class="tengah">'.$wrgn.'</td>
			</tr>
			<tr>
				<td class="tengah">體 重 Berat Badan</td>
				<td class="kuning tengah">'.$bert.' kg</td>
				<td class="tengah">生日 Tanggal Lahir</td>
				<td class="kuning tengah">'.$tglh.'</td>
			</tr>
			<tr>
				<td class="tengah">宗 教 Agama</td>
				<td class="biru tengah">'.$agma.'</td>
				<td class="tengah">出生地點 Tempat Lahir</td>
				<td class="kuning tengah">'.$tplh.'</td>
			</tr>
			<tr>
				<td class="tengah">婚姻狀況 Status</td>
				<td class="biru tengah">'.$stts.'</td>
				<td class="tengah">年 齡 Umur</td>
				<td class="kuning tengah">'.$umur.' th</td>
			</tr>
			<tr>
				<td colspan="3">Tanggal Menikah / cerai hidup 結婚/离婚日期</td>
				<td class="kuning">'.$tgmn.'</td>
			</tr>
			<tr>
				<td class="tengah">教育程度 Pendidikan</td>
				<td colspan="3" class="biru">'.$pddk.'</td>
			</tr>
			<tr>
				<td class="tengah">地址-Alamat</td>
				<td class="kuning">'.$almt.'</td>
				<td class="tengah">省份-Propinsi</td>
				<td class="biru">'.$prov.'</td>
			</tr>
			<tr>
				<td colspan="2" class="tengah">語言能力 Bahasa</td>
				<td class="tengah">國語 Mandarin</td>
				<td class="biru">'.$mand.'</td>
				<td class="tengah">英語 Inggris</td>
				<td class="biru">'.$ingg.'</td>
			</tr>
			<tr>
				<td colspan="6" class="biru tengah">家庭資料 / Data Keluarga</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">姓名 Nama dari</td>
				<td class="coklat tengah">年齡 Umur</td>
				<td class="coklat tengah">職業 Pekerjaan</td>
				<td>兄弟-saudara laki</td>
				<td class="kuning tengah">'.$sdlk.'</td>
			</tr>
			<tr>
			    <td class="tengah">父親 / Bapak</td> 
			    <td class="kuning tengah">'.$nmbp.'</td> 
			    <td class="kuning tengah">'.$umbp.'</td> 
			    <td class="kuning tengah">'.$pkbp.'</td> 
			    <td>姐妹-saudara perempuan</td> 
			    <td class="kuning tengah">'.$sdpr.'</td> 
			</tr>
			<tr>
			    <td class="tengah">母親 / Ibu</td> 
			    <td class="kuning tengah">'.$nmib.'</td> 
			    <td class="kuning tengah">'.$umib.'</td> 
			    <td class="kuning tengah">'.$pkib.'</td> 
			    <td>排行-Anak ke</td> 
			    <td class="kuning tengah">'.$anke.'</td> 
			</tr>
			<tr>
			    <td class="tengah">配偶 / Suami</td> 
			    <td class="kuning tengah">'.$nmis.'</td> 
			    <td class="kuning tengah">'.$umis.'</td> 
			    <td class="kuning tengah">'.$pkis.'</td> 
			    <td>子女人數anak </td> 
			    <td class="kuning tengah">'.$jman.'</td> 
			</tr>
			<tr>
				<th colspan="6" class="biru tengah">WORKING EXPERIENCE-工作經驗</th>
			</tr>
			<tr>
				<td rowspan="2" class="coklat tengah">受雇國家 Negara</td>
				<td rowspan="2" class="coklat tengah">Jenis Usaha 業務類別</td>
				<td colspan="2" class="coklat tengah">職務 Posisi</td>
				<td rowspan="2" class="coklat tengah">受雇期間 Masa Kerja</td>
				<td rowspan="2" class="coklat tengah">離職原因 Alasan berhenti bekerja</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">工作性質 Penjelasan pekerjaan</td>
			</tr>
			'.$htm2.'
			<tr>
				<th colspan="6" class="biru tengah">KETRAMPILAN 專長 &amp; KONDISI FISIK 物理條件</th>
			</tr>
			<tr>
				<td class="coklat">專長 Keterampilan</td>
				<td colspan="5" class="biru">'.$ketr.'</td>
			</tr>
			<tr>
				<td class="coklat">嗜好 Hobby</td>
				<td colspan="5" class="biru">'.$hobi.'</td>
			</tr>
			<tr>
			    <td class="coklat">酒-Alkohol</td> 
			    <td class="biru">'.$alkh.'</td> 
			    <td class="coklat">煙merokok</td> 
			    <td class="biru">'.$roko.'</td> 
			    <td class="coklat">飲食-food</td> 
			    <td class="biru">'.$food.'</td> 
			</tr>
			<tr>
				<td rowspan="4">身體狀況 Kondisi Fisik</td>
				<td>過敏-alergi</td> 
			    <td colspan="2" class="biru">'.$aler.'</td> 
			    <td colspan="2">Bisa mengangkat 能夠抱 '.$angk.' KG 公斤</td> 
			</tr>
			<tr>
				<td>開刀 Operasi</td> 
			    <td colspan="2" class="biru">'.$oper.'</td> 
			    <td colspan="2">Push up-推升 &nbsp;'.$push.': kali-次</td>
			</tr>
			<tr>
				<td>剌青-Tato</td> 
			    <td colspan="2" class="biru">'.$tato.'</td> 
			    <td class="coklat">視力-penglihatan mata</td> 
			    <td class="biru">'.$mata.'</td>
			</tr>
			<tr>
			    <td>左撇子-tangan kidal</td> 
			    <td colspan="2" class="biru">'.$kidl.'</td> 
			    <td class="coklat">色盲-buta warna</td> 
			    <td class="biru">'.$buta.'</td> 
			</tr>
			<tr>
				<td colspan="6" class="biru tengah">請求 PERMOHONAN</td>
			</tr>
			<tr>
			    <td class="tengah">Usaha majikan 雇主企業類型</td> 
			    <td colspan="2" class="tengah biru">'.$usma.'</td> 
			    <td class="tengah">Jenis Pekerjaan 工作類型</td> 
			    <td colspan="2" class="tengah biru">'.$jeka.'</td> 
			</tr>
			<tr>
			    <td class="tengah">Waktu kerja 願意工作時間</td> 
			    <td colspan="2" class="tengah biru">'.$wktu.'</td> 
			    <td class="tengah">Lokasi kerja 工作地點</td> 
			    <td colspan="2" class="tengah biru">'.$loja.'</td> 
			</tr>
			<tr>
			    <td class="tengah">Kondisi kerja 工作意願</td> 
			    <td colspan="2" class="tengah biru">'.$koke.'</td> 
			    <td class="tengah">Lembur 加班</td> 
			    <td colspan="2" class="tengah biru">'.$lemb.'</td> 
			</tr>
			<tr>
			    <td class="tengah">備 注 Keterangan</td> 
			    <td colspan="5" class="tengah kuning"></td> 
			</tr>
			<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru">'.$pasp.'</td> 
			    <td class="tengah">到期-Berlaku sampai</td> 
			    <td class="tengah biru">'.$berl.'</td> 
			    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    <td class="tengah biru">'.$medi.'</td> 
			</tr>
			<tr>
			    <td>Handphone</td> 
			    <td colspan="2" class="kuning">'.$nohp.'</td> 
			    <td>No. Keluarga</td> 
			    <td colspan="2" class="kuning">'.$hpkl.'</td> 
			 </tr>
			 <tr>
			    <td colspan="6">
				    本人保證以上填寫內容屬實, 若往後發現與事實不符, 本人願接受雇主無條件解雇, 且不要求任何賠償.<br>
				    Saya menjamin semua yang saya tulis di atas benar adanya, jika pada akhirnya diketahui bahwa saya memberikan data palsu, saya bersedia dipecat tanpa ada komentar apa
			    </td> 
			 </tr>
			 <tr>
			    <td colspan="3">應徵者簽名 / Tanda tangan pelamar : </td> 
			    <td colspan="3">評審者簽名 / Tanda tangan penilai :</td> 
			</tr>
		</table>
		<!-- AKHIR FORM 1 -->
		';
	} else if($stat == 'FI') {
		if(empty($jman)) {
			$str = 'Tidak Ada';
		} else {
			$aaa = explode(',',$jman);
			$str = count($aaa);
		}

		if($pen1 == '1') { $png1 = 'V';} else { $png1 = '-';}
		if($pen2 == '1') { $png2 = 'V';} else { $png2 = '-';}
		if($pen3 == '1') { $png3 = 'V';} else { $png3 = '-';}
		if($pen4 == '1') { $png4 = 'V';} else { $png4 = '-';}
		if($pen5 == '1') { $png5 = 'V';} else { $png5 = '-';}
		if($pen6 == '1') { $png6 = 'V';} else { $png6 = '-';}

		if($pe11 == '男 Pria') {
			$htm2 .= '
			<tr>
				<td rowspan="2">Merawat Orang Jompo 照顧老人 <br> laki 男</td>
				<td>umur-年齡</td>
				<td class="kuning tengah">'.$pe12.' Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
			</tr>
			<tr>
				<td>kondisi-年齡</td>
				<td class="biru tengah">'.$pe13.'</td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
			</tr>
			';
		} else if($pe11 == '女 Wanita') {
			$htm2 .= '
			<tr>
				<td rowspan="2">Merawat Orang Jompo 照顧老人 <br> wanita 女</td>
				<td>umur-年齡</td>
				<td class="kuning tengah">'.$pe12.' Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
			</tr>
			<tr>
				<td>kondisi-年齡</td>
				<td class="biru tengah">'.$pe13.'</td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
			</tr>
			';
		}

		$html = '
	    <style type="text/css">
	    	td, th {
				padding: 5px;
			}

			.biru {
				background-color: #a4d3ed;
			}

			.kuning {
				background-color: #fff733;
			}

			.coklat {
				background-color: #e88e25;
			}

			.hijau {
				background-color: #b4bd51;
			}

			.tengah {
				text-align: center;
			}
			
			.header1 {
				color: #13ad2c;
				font-size: 20px;
				text-align: center;
			}

			.header2 {
				color: #ff3838;
				text-align: center;
			}
		</style>
		<!-- AWAL FORM 1 -->
		<table border="1">
			<tr>
				<th colspan="4" class="coklat" style="font-size: 20px"><b>PT. FLAMBOYAN GEMAJASA'.$pe11.'</b></th>
				<th colspan="2" class="coklat tengah" style="font-size: 20px">'.$idid.'</th>
			</tr>
			<tr>
				<th colspan="4" class="hijau" style="font-size: 20px"><b>General Trade & Labour Supplier</b></th>
				<th colspan="2" class="hijau tengah" style="font-size: 20px"><b>'.$kdsp.'</b></th>
			</tr>
			<tr>
				<th colspan="4" style="color: #348de0;"><b><br>PENCATATAN KUALIFIKASI TKW 女傭資料</b></th>
				<td colspan="2" class="tengah" style="color: #e81e1e;">Selesai durasi 順練到 ..... 月 <br> / ..... 號, Masuk Taiwan 入 <br> 境 ..... 月 初/中/底 PILIHAN</td>
			</tr>
			<tr>
				<td colspan="2">Tanggal Daftar 進日期</td>
				<td colspan="2" class="kuning">  '.$tgdf.'</td>
				<td colspan="2" rowspan="21">{foto}</td>
			</tr>
			<tr>
				<td colspan="2">Nama 姓名</td>
				<td colspan="2" class="kuning">  '.$nama.'</td>
			</tr>
			<tr>
				<td colspan="2">Tanggal Lahir 日期地點</td>
				<td colspan="2" class="kuning">  '.$tglh.'</td>
			</tr>
			<tr>
				<td colspan="2">Tempat Lahir 出生地點</td>
				<td colspan="2" class="kuning">  '.$tplh.'</td>
			</tr>
			<tr>
				<td colspan="2">Umur 年齡</td>
				<td colspan="2" class="kuning">  '.$umur.' Tahun 歲</td>
			</tr>
			<tr>
				<td colspan="2">Tinggi Badan 身高</td>
				<td colspan="2" class="kuning">  '.$tggi.' cm 公分</td>
			</tr>
			<tr>
				<td colspan="2">Berat Badan 體重</td>
				<td colspan="2" class="kuning">  '.$brat.' kg 公斤</td>
			</tr>
			<tr>
				<td colspan="2">Pendidikan 學歷</td>
				<td colspan="2" class="biru">  '.$pddk.'</td>
			</tr>
			<tr>
				<td colspan="2">Agama 宗教</td>
				<td colspan="2" class="biru">  '.$agam.'</td>
			</tr>
			<tr>
				<td colspan="2">Status 婚姻狀況</td>
				<td colspan="2" class="biru">  '.$stts.'</td>
			</tr>
			<tr>
				<td colspan="2">Tanggal menikah / cerai hidup 結婚 / 离婚日期</td>
				<td colspan="2" class="kuning">  '.$tglm.'</td>
			</tr>
			<tr>
				<td colspan="2">Nama Suami 配偶姓名</td>
				<td colspan="2" class="kuning">  '.$nmsm.'</td>
			</tr>
			<tr>
				<td colspan="2">Umur Suami 配偶年齡</td>
				<td colspan="2" class="kuning">  '.$umsm.'</td>
			</tr>
			<tr>
				<td colspan="2">Pekerjaan Suami 配偶職業</td>
				<td colspan="2" class="biru">  '.$pksm.'</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="2">Jumlah Anak <br> 子女數及年齡 </td>
				<td colspan="2" class="kuning">  '.$str.' anak</td>
			</tr>
			<tr>
				<td colspan="2" class="kuning">  '.$jman.'</td>
			</tr>
			<tr>
				<td rowspan="5"><b><br>Kemampuan Bahasa <br> 語言能力</b></td>
				<td>Mandarin 中文</td>
				<td class="biru" colspan="2">  '.$mand.'</td>
			</tr>
			<tr>
				<td>Taiyu 台語</td>
				<td class="biru" colspan="2">  '.$taiy.'</td>
			</tr>
			<tr>
				<td>Inggris 英文</td>
				<td class="biru" colspan="2">  '.$ingg.'</td>
			</tr>
			<tr>
				<td>Cantonese 廣東</td>
				<td class="biru" colspan="2">  '.$cant.'</td>
			</tr>
			<tr>
				<td>Hakka 客家</td>
				<td class="biru" colspan="2">  '.$hakk.'</td>
			</tr>
			<tr>
				<td colspan="2" style="color: #348de0;"><b>PENGALAMAN KERJA 工作經驗</b></td>
				<td class="tengah" style="color: #348de0;"><b>I</b></td>
				<td class="tengah" style="color: #348de0;"><b>II (jika tidak ada tidak usah diisi)</b></td>
				<td class="tengah" style="color: #348de0;"><b>III (jika tidak ada tidak usah diisi)</b></td>
				<td class="tengah" style="color: #348de0;"><b>IV (jika tidak ada tidak usah diisi)</b></td>
			</tr>
			<tr>
				<td colspan="2">Negara 國家</td>
				<td class="biru tengah">'.$nega.'</td>
				<td class="biru tengah">{negara}</td>
				<td class="biru tengah">{negara}</td>
				<td class="biru tengah">{negara}</td>
			</tr>
			<tr>
				<td colspan="2">Lokasi Kerja Taiwan 台灣工作地點</td>
				<td class="biru tengah">'.$loka.'</td>
				<td class="biru tengah">{lokasi}</td>
				<td class="biru tengah">{lokasi}</td>
				<td class="biru tengah">{lokasi}</td>
			</tr>
			<tr>
				<td colspan="2">Lama Kerja (tahun/bulan) 工作期 (年 / 月）</td>
				<td class="kuning tengah">'.$lama.'</td>
				<td class="kuning tengah">{lamakerja}</td>
				<td class="kuning tengah">{lamakerja}</td>
				<td class="kuning tengah">{lamakerja}</td>
			</tr>
			<tr>
				<td colspan="2">Periode Kerja 工作期間</td>
				<td class="kuning tengah">'.$peri.'</td>
				<td class="kuning tengah">{periode}</td>
				<td class="kuning tengah">{periode}</td>
				<td class="kuning tengah">{periode}</td>
			</tr>
			<tr>
				<td colspan="2">Jam Kerja 日常工作時間</td>
				<td class="kuning tengah">'.$jamk.'</td>
				<td class="kuning tengah">{jamkerja}</td>
				<td class="kuning tengah">{jamkerja}</td>
				<td class="kuning tengah">{jamkerja}</td>
			</tr>
			<tr>
				<td colspan="2">Majikan 雇主</td>
				<td class="biru tengah">'.$majp.'</td>
				<td class="biru tengah">{majikan}</td>
				<td class="biru tengah">{majikan}</td>
				<td class="biru tengah">{majikan}</td>
			</tr>
			<tr>
				<td colspan="2">Alasan berhenti kerja 離職原因</td>
				<td class="biru tengah">'.$alas.'</td>
				<td class="biru tengah">{alasan}</td>
				<td class="biru tengah">{alasan}</td>
				<td class="biru tengah">{alasan}</td>
			</tr>
			<tr>
				<td colspan="6" style="color: #348de0;"><b>TUGAS 工作範圍</b></td>
			</tr>
			<tr>
				<td colspan="2">Kerja rumah tangga 家務事</td>
				<td class="hijau tengah">'.$png1.'</td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Memasak 煮食</td>
				<td class="hijau tengah">'.$png2.'</td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Mencuci Baju 洗衫</td>
				<td class="hijau tengah">'.$png3.'</td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Mencuci Baju 洗衫</td>
				<td class="hijau tengah">'.$png4.'</td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Mencuci Mobil 洗機車</td>
				<td class="hijau tengah">'.$png5.'</td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Merawat Binatang 照顧寵物</td>
				<td class="hijau tengah">'.$png6.'</td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
				<td class="hijau tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Merawat Bayi 照料初生嬰兒</td>
				<td class="kuning tengah">'.$pen7.' Bulan 幾個月</td>
				<td class="kuning tengah">Bulan 幾個月</td>
				<td class="kuning tengah">Bulan 幾個月</td>
				<td class="kuning tengah">Bulan 幾個月</td>
			</tr>
			<tr>
				<td colspan="2">Merawat Anak Kecil 照顧小孩</td>
				<td class="kuning tengah">'.$pen8.' Orang 位</td>
				<td class="kuning tengah">Orang 位</td>
				<td class="kuning tengah">Orang 位</td>
				<td class="kuning tengah">Orang 位</td>
			</tr>
			<tr>
				<td colspan="2">Umur 年齡</td>
				<td class="kuning tengah">'.$pen9.' Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
				<td class="kuning tengah">Tahun 嵗</td>
			</tr>
			<tr>
				<td colspan="2">Kondisi 情況</td>
				<td class="biru tengah">'.$pe10.'</td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
			</tr>'.
			$htm2
		  .'<tr>
				<td colspan="2">Jumlah anggota rumah 家庭成員數目</td>
				<td class="kuning tengah">'.$pe14.' / Orang 名</td>
				<td class="kuning tengah">/ Orang 名</td>
				<td class="kuning tengah">/ Orang 名</td>
				<td class="kuning tengah">/ Orang 名</td>
			</tr>
			<tr>
				<td colspan="2">Tipe rumah majikan 居住類型</td>
				<td class="biru tengah">'.$pe15.'</td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Rumah berapa lantai 樓</td>
				<td class="kuning tengah">'.$pe16.'</td>
				<td class="kuning tengah"></td>
				<td class="kuning tengah"></td>
				<td class="kuning tengah"></td>
			</tr>
			<tr>
				<td colspan="2">Jumlah kamar tidur 睡房</td>
				<td class="kuning tengah">'.$pe17.'</td>
				<td class="kuning tengah"></td>
				<td class="kuning tengah"></td>
				<td class="kuning tengah"></td>
			</tr>
			<tr>
				<td colspan="2"><b>Keterangan 備註</b></td>
				<td class="biru tengah">'.$pe18.'</td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
				<td class="biru tengah"></td>
			</tr>
			<tr>
				<td colspan="6" style="color: #348de0;"><b>LATAR BELAKANG KELUARGA 家庭狀況</b></td>
			</tr>
			<tr>
				<td colspan="2"><b>Nama ayah 父親姓名</b></td>
				<td colspan="2" class="kuning tengah">'.$nmbp.'</td>
				<td>Umur 年齡</td>
				<td class="kuning tengah">'.$umbp.'</td>
			</tr>
			<tr>
				<td colspan="2"><b>Nama ibu 母親姓名</b></td>
				<td colspan="2" class="kuning tengah">'.$nmib.'</td>
				<td>Umur 年齡</td>
				<td class="kuning tengah">'.$umib.'</td>
			</tr>
			<tr>
				<td colspan="2"><b>Jumlah saudara 共有兄弟和姐妹</b></td>
				<td class="kuning tengah">'.$jmsd.'</td>
				<td colspan="2">Saya anak ke brp? 你是排第</td>
				<td class="kuning tengah">'.$anak.'</td>
			</tr>
			<tr>
				<td colspan="6" style="color: #348de0;"><b>Tugas dikerjakan dari terbaik (1) sampai dengan terburuk (6) 優先</b></td>
			</tr>
			<tr>
				<td>Pekerjaan rumah tangga 家務</td>
				<td class="kuning tengah">'.$tug1.'</td>
				<td>Merawat bayi baru 照顧嬰兒</td>
				<td class="kuning tengah">'.$tug2.'</td>
				<td>Merawat orang cacat 老弱病殘</td>
				<td class="kuning tengah">'.$tug3.'</td>
			</tr>
			<tr>
				<td>Merawat anak kecil 看護小孩</td>
				<td class="kuning tengah">'.$tug4.'</td>
				<td>Memasak 烹飪</td>
				<td class="kuning tengah">'.$tug5.'</td>
				<td>Merawat orang jompo 看護老人</td>
				<td class="kuning tengah">'.$tug6.'</td>
			</tr>
		</table>
		<table border="1">
			<tr>
				<td></td>
				<td colspan="6"></td>
				<td style="color: #348de0;"><b>Pengalaman 經驗</b></td>
				<td style="color: #348de0;"><b>Latihan 訓練</b></td>
				<td style="color: #348de0;"><b>Bersedia 願意</b></td>
			</tr>
			<tr>
				<td>1. </td>
				<td colspan="6">Merawat bayi baru lahir sampai 3 bulan 照顧零至三個月大之小孩</td>
				<td class="hijau tengah">'.$ke1_1.'</td>
				<td class="hijau tengah">'.$ke1_2.'</td>
				<td class="hijau tengah">'.$ke1_3.'</td>
			</tr>
			<tr>
				<td>2. </td>
				<td colspan="6">Merawat bayi 3-12 bulan 照顧三至十二個月大的小孩</td>
				<td class="hijau tengah">'.$ke2_1.'</td>
				<td class="hijau tengah">'.$ke2_2.'</td>
				<td class="hijau tengah">'.$ke2_3.'</td>
			</tr>
			<tr>
				<td>3. </td>
				<td colspan="6">Merawat anak kecil 1-5 tahun 照顧一至五歲之小孩</td>
				<td class="hijau tengah">'.$ke3_1.'</td>
				<td class="hijau tengah">'.$ke3_2.'</td>
				<td class="hijau tengah">'.$ke3_3.'</td>
			</tr>
			<tr>
				<td>4. </td>
				<td colspan="6">Merawat anak kecil 5-10 tahun</td>
				<td class="hijau tengah">'.$ke4_1.'</td>
				<td class="hijau tengah">'.$ke4_2.'</td>
				<td class="hijau tengah">'.$ke4_3.'</td>
			</tr>
			<tr>
				<td>5. </td>
				<td colspan="6">Mengerjakan pekerjaan rumah umumnya 一般家務</td>
				<td class="hijau tengah">'.$ke5_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$ke5_3.'</td>
			</tr>
			<tr>
				<td>6. </td>
				<td colspan="6">Mencuci baju dengan mesin cuci 使用洗衣機</td>
				<td class="hijau tengah">'.$ke6_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$ke6_3.'</td>
			</tr>
			<tr>
				<td>7. </td>
				<td colspan="6">Memakai mesin penyedot debu 使用吸塵器</td>
				<td class="hijau tengah">'.$ke7_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$ke7_3.'</td>
			</tr>
			<tr>
				<td>8. </td>
				<td colspan="6">Mencuci baju dengan tangan 手洗衣服</td>
				<td class="hijau tengah">'.$ke8_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$ke8_3.'</td>
			</tr>
			<tr>
				<td>9. </td>
				<td colspan="6">Menjahit sederhana 縫糿</td>
				<td class="hijau tengah">'.$ke9_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$ke9_3.'</td>
			</tr>
			<tr>
				<td>10. </td>
				<td colspan="6">Menyetrika baju 燙衫</td>
				<td class="hijau tengah">'.$k10_1.'</td>
				<td class="hijau tengah">'.$k10_2.'</td>
				<td class="hijau tengah">'.$k10_3.'</td>
			</tr>
			<tr>
				<td>11. </td>
				<td colspan="6">Memasak masakan cina 煮中國菜 / 豬肉</td>
				<td class="hijau tengah">'.$k11_1.'</td>
				<td class="hijau tengah">'.$k11_2.'</td>
				<td class="hijau tengah">'.$k11_3.'</td>
			</tr>
			<tr>
				<td>12. </td>
				<td colspan="6" class="coklat">Makan daging babi 願意吃豬肉</td>
				<td class="hijau tengah">'.$k12_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k12_3.'</td>
			</tr>
			<tr>
				<td>13. </td>
				<td colspan="6" class="coklat">Merawat binatang anjing 願意照顧寵物(狗)</td>
				<td class="hijau tengah">'.$k13_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k13_3.'</td>
			</tr>
			<tr>
				<td rowspan="2">14. </td>
				<td rowspan="2" colspan="5">Tidur satu kamar dengan pasien 願意和被照顧的人一起睡</td>
				<td class="coklat tengah"></td>
				<td class="hijau tengah">'.$k14a1.'</td>
				<td class="tengah" style="background-color: #a3a3a3"></td>
				<td class="hijau tengah">'.$k14a3.'</td>
			</tr>
			<tr>
				<td class="tengah"></td>
				<td class="hijau tengah">'.$k14b1.'</td>
				<td class="tengah" style="background-color: #a3a3a3"></td>
				<td class="hijau tengah">'.$k14b3.'</td>
			</tr>
			<tr>
				<td>15. </td>
				<td colspan="6">Merawat orang cacat 照顧殘疾人仕</td>
				<td class="hijau tengah">'.$k15_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k15_3.'</td>
			</tr>
			<tr>
				<td>16. </td>
				<td colspan="6">Merawat pasien dibawah 60 tahun 照顧病人 (60嵗下）</td>
				<td class="hijau tengah">'.$k16_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k16_3.'</td>
			</tr>
			<tr>
				<td>17. </td>
				<td colspan="6">Merawat pasien diatas 60 tahun 照顧老人 / 病人 (60嵗上）</td>
				<td class="hijau tengah">'.$k17_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k17_3.'</td>
			</tr>
		</table>
		<table border="1">
			<tr>
				<td colspan="10" style="color: #348de0;"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></td>
			</tr>
			<tr>
				<td>A. </td>
				<td colspan="6">Mengganti popok 換尿布</td>
				<td class="hijau tengah">'.$k18_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k18_3.'</td>
			</tr>
			<tr>
				<td>B. </td>
				<td colspan="6">Menyuapi makan 餵食</td>
				<td class="hijau tengah">'.$k19_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k19_3.'</td>
			</tr>
			<tr>
				<td>C. </td>
				<td colspan="6">Memandikan di kamar mandi 洗澡在廁所</td>
				<td class="hijau tengah">'.$k20_1.'</td>
				<td class="hijau tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k20_3.'</td>
			</tr>
			<tr>
				<td>D. </td>
				<td colspan="6">Memandikan di ranjang 洗澡在床</td>
				<td class="hijau tengah">'.$k21_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k21_3.'</td>
			</tr>
			<tr>
				<td>E. </td>
				<td colspan="6">Membersihkan buang air besar 處理大小便</td>
				<td class="hijau tengah">'.$k22_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k22_3.'</td>
			</tr>
			<tr>
				<td>F. </td>
				<td colspan="6">Bangun di tengah malam 半夜要起床照顧病人</td>
				<td class="hijau tengah">'.$k23_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k23_3.'</td>
			</tr>
			<tr>
				<td>G. </td>
				<td colspan="6">Membantu pasien jalan 扶持</td>
				<td class="hijau tengah">'.$k24_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k24_3.'</td>
			</tr>
			<tr>
				<td>H. </td>
				<td colspan="6">Membantu pasien lemah 行動較弱需攙扶</td>
				<td class="hijau tengah">'.$k25_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k25_3.'</td>
			</tr>
			<tr>
				<td>I. </td>
				<td colspan="6">Menemani pasien ke rumah sakit 陪同去醫院</td>
				<td class="hijau tengah">'.$k26_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k26_3.'</td>
			</tr>
			<tr>
				<td>J. </td>
				<td colspan="6">Terapi 復健</td>
				<td class="hijau tengah">'.$k27_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k27_3.'</td>
			</tr>
			<tr>
				<td>K. </td>
				<td colspan="6">Menggunakan kursi roda 用轮椅</td>
				<td class="hijau tengah">'.$k28_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k28_3.'</td>
			</tr>
			<tr>
				<td>L. </td>
				<td colspan="6" class="coklat">Suntik insulin 注射胰島素</td>
				<td class="hijau tengah">'.$k29_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k29_3.'</td>
			</tr>
			<tr>
				<td>M. </td>
				<td colspan="6" class="coklat">Sedot dahak 抽痰</td>
				<td class="hijau tengah">'.$k30_1.'</td>
				<td class="coklat tengah">V</td>
				<td class="hijau tengah">'.$k30_3.'</td>
			</tr>
			<tr>
				<td>N. </td>
				<td colspan="6" class="coklat">Memberi makan lewat selang hidung 鼻胃管灌食</td>
				<td class="hijau tengah">'.$k31_1.'</td>
				<td class="coklat tengah">V</td>
				<td class="hijau tengah">'.$k31_3.'</td>
			</tr>
			<tr>
				<td>O. </td>
				<td colspan="6" class="coklat">Katheter 尿管</td>
				<td class="hijau tengah">'.$k32_1.'</td>
				<td class="tengah" style="background-color: #f21313;"></td>
				<td class="hijau tengah">'.$k32_3.'</td>
			</tr>
			<tr>
				<td>P. </td>
				<td colspan="6">Memisahkan pasien ranjang kursi roda dan sebaliknya 抱病人上下床/輪椅</td>
				<td class="hijau tengah">'.$k33_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k33_3.'</td>
			</tr>
			<tr>
				<td>Q. </td>
				<td colspan="6">Menggendong pasien naik turun tangga 抱病人上下樓梯</td>
				<td class="hijau tengah">'.$k34_1.'</td>
				<td class="tengah">V</td>
				<td class="hijau tengah">'.$k34_3.'</td>
			</tr>
			<tr>
				<td>R. </td>
				<td colspan="6">Bisa menggendong pasien berapa kg? 可以携带多少公斤的病人?</td>
				<td colspan="3" class="kuning tengah"><b>'.$k35_1.'KG</b></td>
			</tr>
		</table>
		<table border="1">
			<tr>
				<td colspan="2">KETERANGAN 備註 :</td>
				<td colspan="4"></td>
			</tr>
			<tr>
				<td colspan="2" class="kuning">HANDPHONE : '.$nohp.'</td>
				<td rowspan="2">PASPORT 護照</td>
				<td rowspan="2">'.$pasp.'</td>
				<td colspan="2" class="kuning">Berlaku sampai / 到期 <br> '.$berl.'</td>
			</tr>
			<tr>
				<td colspan="2" class="kuning">HANDPHONE KELUARGA : '.$nokl.'</td>
				<td colspan="2" class="kuning">Rencana 安排 : '.$renc.'</td>
			</tr>
		</table>
		<!-- AKHIR FORM 1 -->
		';
	} else if($stat == 'JP') {
		foreach($result->result() as $row) {
	    $htm2 .= '
	    	<tr>
				<td rowspan="2" class="biru tengah">'.$row->negara.'</td>
				<td rowspan="2" class="biru tengah">'.$row->jenis_usaha.'</td>
				<td colspan="2" class="biru tengah">'.$row->posisi.'</td>
				<td rowspan="2" class="kuning tengah">'.$row->masa_kerja.'</td>
				<td rowspan="2" class="biru tengah">'.$row->alasan.'</td>
			</tr>
			<tr>
				<td colspan="2" class="biru tengah">'.$row->penjelasan.'</td>
			</tr>
	    ';
		}
		$html = '
	    <style type="text/css">
	    	td, th {
				padding: 5px;
			}

			.biru {
				background-color: #a4d3ed;
			}

			.kuning {
				background-color: #fff733;
			}

			.coklat {
				background-color: #e88e25;
			}

			.hijau {
				background-color: #73f590;
			}

			.tengah {
				text-align: center;
			}
			
			.header1 {
				color: #13ad2c;
				font-size: 20px;
				text-align: center;
			}

			.header2 {
				color: #ff3838;
				text-align: center;
			}
		</style>
		<!-- AWAL HEADER -->
	    <table>
	    	<tr>
	    		<td colspan="6" class="header1">PT Flamboyan Gema Jasa</td>
	    	</tr>
	    	<tr>
	    		<td colspan="6" class="header2">Jl. Inspektur Suwoto No. 95B RT.02 RW.01 Ds.Sidodadi Kec.Lawang, Kab.Malang, East Java, Indonesia. Post code 65251 <br>Email : mahartatiang@yahoo.co.id</td>
	    	</tr>
	    </table>
	    <!-- AKHIR HEADER -->
		<!-- AWAL FORM 1 -->
		<table border="1">
			<tr>
				<th colspan="2">'.$id.'</th>
				<th class="biru">PL :'.$kdsp.'</th>
				<th>仲介公司-Agent : '.$kdag.'</th>
				<th colspan="2">僱主名稱-Nama Majikan : </th>
			</tr>
			<tr>
				<td colspan="2" rowspan="10"><img src="assets/uploads/'.$foto.'" width="220" height="300"></td>
				<th colspan="4" class="biru tengah">個人資料 / Personal Data</th>
			</tr>
			<tr>
				<td class="tengah">姓名 Nama</td>
				<th colspan="2" class="kuning tengah">'.$nama.'</th>
				<td class="kuning"></td>
			</tr>
			<tr>
				<td class="tengah">報到日期 Tanggal Daftar</td>
				<td class="kuning tengah">'.$tgdf.'</td>
				<td class="tengah">性別 Jenis Kelamin</td>
				<td class="biru tengah">'.$jkel.'</td>
			</tr>
			<tr>
				<td class="tengah">身 高 Tinggi Badan</td>
				<td class="kuning tengah">'.$tgbd.' CM</td>
				<td class="tengah">國籍 Warganegara</td>
				<td class="tengah">'.$wrgn.'</td>
			</tr>
			<tr>
				<td class="tengah">體 重 Berat Badan</td>
				<td class="kuning tengah">'.$bert.' kg</td>
				<td class="tengah">生日 Tanggal Lahir</td>
				<td class="kuning tengah">'.$tglh.'</td>
			</tr>
			<tr>
				<td class="tengah">宗 教 Agama</td>
				<td class="biru tengah">'.$agma.'</td>
				<td class="tengah">出生地點 Tempat Lahir</td>
				<td class="kuning tengah">'.$tplh.'</td>
			</tr>
			<tr>
				<td class="tengah">婚姻狀況 Status</td>
				<td class="biru tengah">'.$stts.'</td>
				<td class="tengah">年 齡 Umur</td>
				<td class="kuning tengah">'.$umur.' th</td>
			</tr>
			<tr>
				<td colspan="2">Tanggal Menikah / cerai hidup 結婚/离婚日期</td>
				<td colspan="2" class="kuning">'.$tgmn.'</td>
			</tr>
			<tr>
				<td class="tengah">教育程度 Pendidikan</td>
				<td colspan="3" class="biru">'.$pddk.'</td>
			</tr>
			<tr>
				<td class="tengah">地址-Alamat</td>
				<td class="kuning">'.$almt.'</td>
				<td class="tengah">省份-Propinsi</td>
				<td class="biru">'.$prov.'</td>
			</tr>
			<tr>
				<td colspan="2" class="tengah">語言能力 Bahasa</td>
				<td class="tengah">國語 Mandarin</td>
				<td class="biru">'.$mand.'</td>
				<td class="tengah">英語 Inggris</td>
				<td class="biru">'.$ingg.'</td>
			</tr>
			<tr>
				<td colspan="6" class="biru tengah">家庭資料 / Data Keluarga</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">姓名 Nama dari</td>
				<td class="coklat tengah">年齡 Umur</td>
				<td class="coklat tengah">職業 Pekerjaan</td>
				<td>兄弟-saudara laki</td>
				<td class="kuning tengah">'.$sdlk.'</td>
			</tr>
			<tr>
			    <td class="tengah">父親 / Bapak</td> 
			    <td class="kuning tengah">'.$nmbp.'</td> 
			    <td class="kuning tengah">'.$umbp.'</td> 
			    <td class="biru tengah">'.$pkbp.'</td> 
			    <td>姐妹-saudara perempuan</td> 
			    <td class="kuning tengah">'.$sdpr.'</td> 
			</tr>
			<tr>
			    <td class="tengah">母親 / Ibu</td> 
			    <td class="kuning tengah">'.$nmib.'</td> 
			    <td class="kuning tengah">'.$umib.'</td> 
			    <td class="biru tengah">'.$pkib.'</td> 
			    <td>排行-Anak ke</td> 
			    <td class="kuning tengah">'.$anke.'</td> 
			</tr>
			<tr>
			    <td class="tengah">配偶 / Istri</td> 
			    <td class="kuning tengah">'.$nmis.'</td> 
			    <td class="kuning tengah">'.$umis.'</td> 
			    <td class="tengah">'.$pkis.'</td> 
			    <td>子女人數anak </td> 
			    <td class="kuning tengah">'.$jman.'</td> 
			</tr>
			<tr>
				<th colspan="6" class="biru tengah">WORKING EXPERIENCE-工作經驗</th>
			</tr>
			<tr>
				<td rowspan="2" class="coklat tengah">受雇國家 Negara</td>
				<td rowspan="2" class="coklat tengah">Jenis Usaha 業務類別</td>
				<td colspan="2" class="coklat tengah">職務 Posisi</td>
				<td rowspan="2" class="coklat tengah">受雇期間 Masa Kerja</td>
				<td rowspan="2" class="coklat tengah">離職原因 Alasan berhenti bekerja</td>
			</tr>
			<tr>
				<td colspan="2" class="coklat tengah">工作性質 Penjelasan pekerjaan</td>
			</tr>
			'.$htm2.'
			<tr>
				<th colspan="6" class="biru tengah">KETRAMPILAN 專長 &amp; KONDISI FISIK 物理條件</th>
			</tr>
			<tr>
				<td class="coklat">專長 Keterampilan</td>
				<td colspan="5" class="biru">'.$ketr.'</td>
			</tr>
			<tr>
				<td class="coklat">嗜好 Hobby</td>
				<td colspan="5">'.$hobi.'</td>
			</tr>
			<tr>
			    <td class="coklat">酒-Alkohol</td> 
			    <td class="biru">'.$alkh.'</td> 
			    <td class="coklat">煙merokok</td> 
			    <td class="biru">'.$roko.'</td> 
			    <td class="coklat">飲食-food</td> 
			    <td class="biru">'.$food.'</td> 
			</tr>
			<tr>
				<td rowspan="4" class="coklat">身體狀況 Kondisi Fisik</td>
				<td>過敏-alergi</td> 
			    <td colspan="2" class="biru">'.$aler.'</td> 
			    <td colspan="2">Bisa mengangkat 能夠抱 '.$angk.' KG 公斤</td> 
			</tr>
			<tr>
				<td>開刀 Operasi</td> 
			    <td colspan="2" class="biru">'.$oper.'</td> 
			    <td colspan="2">Push up-推升 &nbsp;'.$push.': kali-次</td>
			</tr>
			<tr>
				<td>剌青-Tato</td> 
			    <td colspan="2" class="biru">'.$tato.'</td> 
			    <td class="coklat">視力-penglihatan mata</td> 
			    <td class="biru tengah">'.$mata.'</td>
			</tr>
			<tr>
			    <td>左撇子-tangan kidal</td> 
			    <td colspan="2" class="biru">'.$kidl.'</td> 
			    <td class="coklat">色盲-buta warna</td> 
			    <td class="biru">'.$buta.'</td> 
			</tr>
			<tr>
				<td colspan="6" class="hijau tengah">面試評價 / Interview Appraisal</td>
			</tr>
			<tr>
				<td colspan="3" class="tengah">項 目 <br> ITEM</td>
				<td class="tengah">有經 EXPERIENCE</td>
				<td class="coklat tengah">訓練 <br> TRAINING</td>
				<td class="coklat tengah">願意做 WILINGNESS</td>
			</tr>
			<tr>
				<td colspan="3">抽痰 / SUCTION</td>
				<td class="biru tengah">'.$int1.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">鼻胃管 / FOOD SONDING</td>
				<td class="biru tengah">'.$int2.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">尿管 / CATETER</td>
				<td class="biru tengah">'.$int4.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">注射 / INJECTION</td>
				<td class="biru tengah">'.$int5.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">拍背 / THERAPY BACK</td>
				<td class="biru tengah">'.$int6.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">扶持 HELPING / CARRYING WHEN PARIENT WALKING</td>
				<td class="biru tengah">'.$int6.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">抱病人上下床 / 輪椅 CARRYINNG BATIENT UP / DOWN BED TO / FROM WHEELCHAIR</td>
				<td class="biru tengah">'.$int7.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
				<td colspan="3">抱病人上下樓梯 CARRYINNG PATIENT UP / DOWN STAIRS</td>
				<td class="biru tengah">'.$int8.'</td>
				<td class="coklat tengah">Y/有</td>
				<td class="coklat tengah">Y/有</td>
			</tr>
			<tr>
			    <td class="tengah">備 注 Keterangan</td> 
			    <td colspan="5" class="tengah kuning"></td> 
			</tr>
			<tr>
			    <td class="tengah">PASPORT / 護照</td> 
			    <td class="tengah biru">'.$pasp.'</td> 
			    <td class="tengah">到期-Berlaku sampai</td> 
			    <td class="tengah biru">'.$berl.'</td> 
			    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    <td class="tengah biru">'.$medi.'</td> 
			</tr>
			<tr>
			    <td>Handphone</td> 
			    <td colspan="2" class="kuning">'.$nohp.'</td> 
			    <td>No. Keluarga</td> 
			    <td colspan="2" class="kuning">'.$hpkl.'</td> 
			 </tr>
			 <tr>
			    <td colspan="6">
				    本人保證以上填寫內容屬實, 若往後發現與事實不符, 本人願接受雇主無條件解雇, 且不要求任何賠償.<br>
				    Saya menjamin semua yang saya tulis di atas benar adanya, jika pada akhirnya diketahui bahwa saya memberikan data palsu, saya bersedia dipecat tanpa ada komentar apa
			    </td> 
			 </tr>
			 <tr>
			    <td colspan="3">應徵者簽名 / Tanda tangan pelamar : </td> 
			    <td colspan="3">評審者簽名 / Tanda tangan penilai :</td> 
			</tr>
		</table>
		<!-- AKHIR FORM 1 -->
		';
	}
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
	$pdf->Output('example_001.pdf', 'I');    
    }