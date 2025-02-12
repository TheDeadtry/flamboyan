<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class admin_print extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');	
		$this->load->library('Pdf');		
	}

	function markformal_print()
	{
		$revgroup = $this->session->userdata('mark_idagen');
        $revstatt = $this->session->userdata('mark_statterbang');

        if ($revgroup == NULL || $revgroup == "Semua") {
            $kodwhere = "( majikan.kode_group!='' || majikan.kode_group is NULL) AND ";
            $nama_files = "MARK FORMAL SEMUA";
        } else {
            $kodwhere = "majikan.kode_agen='".$revgroup."' and ";
            $select_agen = $this->M_session->select_row("SELECT * FROM dataagen where id_agen='".$revgroup."'");
            $nama_files = "MARK FORMAL ".$select_agen->nama;
        }

        $kodwhere2 = "( personal.statterbang IS NULL || personal.statterbang = '' ) and ";
        if ($revstatt == "1") {
            $kodwhere2 = "( personal.statterbang = 1 ) and ";
        }

        $where_dd = "where ".$kodwhere." ".$kodwhere2." 
        	(personal.id_biodata LIKE 'FF%' 
	   		OR personal.id_biodata LIKE 'MF%' 
	   		OR personal.id_biodata LIKE 'JP%')";

		$ambil_data = $this->M_session->select(" 
	   		SELECT 
	        	distinct(personal.id_biodata)
	   		FROM personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
	   		".$where_dd." 
	   		ORDER BY personal.id_biodata");

		$this->load->library("PHPExcel");

        $objPHPExcel 	= new PHPExcel();
		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');

		$objPHPExcel = $objReader->load("files/pgm_formal.xls");

		$no = 1;
		$e 	= 5;
		foreach ($ambil_data as $row) {

			$query_ambil_tki = $this->M_session->select_row("SELECT 
	        	majikan.kode_majikan,

	        	personal.id_biodata as personal_id,
	        	personal.nama as personal_nama,
	        	personal.nama_mandarin as personal_namaman,
	        	personal.negara1 as personal_negara1,
	        	personal.negara2 as personal_negara2,
	        	personal.calling as personal_calling,
	        	personal.skill1 as personal_skill1,
	        	personal.skill2 as personal_skill2,
	        	personal.skill3 as personal_skill3,
	        	personal.keterangan as personal_keterangan,
	        	datamajikan.namamajikan as namamajikanman,
	        	datamajikan.nama as namamajikan,
	        	marka_biotoagen.tgl_to_agen as tgltoagen,
	        	disnaker.tglonline as tgldisnaker,
	        	disnaker.perkiraan as perkiraandisnaker,
	        	disnaker.nodisnaker as nodisnaker,
	        	paspor.nopaspor as tgterbitpaspor,
	        	majikan.tglterpilih as terpilihmajikan,
	        	majikan.JD as jdmajikan,
	        	majikan.tglterbang as terbangmajikan,
	        	visa.tanggalterbang as tglberangkat,
	        	visa.statusterbang as statusberangkat,
	        	dataterbang.detailberangkat1 as keberangkatan,
	        	dataterbang.jamtiba as jamtiba,
	        	visa.tiket as tiket,
	        	visa.tglberangkat as tglnyaberangkat,
	        	visa.statusterbang as statusterbang,
	        	majikan.tglpk as tglpk,
	        	datasuhan.tglterima as tglterimasuhan,
	        	datasuhan.no_suhan as no_suhan,
	        	datasuhan.tglterbit as tglterbit_suhan,
	        	datasuhan.tglexp as tglexp_suhan,
	        	datavisapermit.tglterimavs as tglterimavisapermit,
	        	datavisapermit.no_visapermit as no_visapermit,
	        	datavisapermit.tglterbitvs as tglterbit_visapermit,
	        	datavisapermit.tglexpvs as tglexp_visapermit,
	        	DATE_ADD(pasporlama.tglterbit, INTERVAL 5 YEAR) as pasporlama,
	        	paspor.tglpengajuan as ajupaspor,
	        	paspor.statuspengajuan as ajustatpaspor,
	        	paspor.tglfoto as fotopaspor,
	        	paspor.statusfoto as fotostatpaspor,
	        	paspor.tglterima as terimapaspor,
	        	paspor.statusterima as terimastatpaspor,
	        	skck.pengajuan as pengajuan_skck,
	        	skck.statuspengajuan as pengajuanstat_skck,
	        	skck.terima as terima_skck,
	        	skck.statusterima as terimastat_skck,
	        	skck.tglexp as tglexp_skck,
	        	visa.kocokan as kocokan_visa,
	        	visa.statuskocokan as kocokanstats_visa,
	        	visa.finger as finger_visa,
	        	visa.statusfinger as fingerstats_visa,
	        	visa.terima as terima_visa,
	        	visa.statusterima as terimastats_visa,
	        	signingbank.tgl_tki_ttd as loanbank,
	        	visa.pap as pap_visa,
	        	visa.statuspap as papstats_visa,
	        	visa.ktkln as ktkln_visa,
	        	visa.statusktkln as kklnstats_visa,
	        	( SELECT count(*) FROM medical3 WHERE id_biodata=personal.id_biodata ) as medical3_total,
				medical2.tanggal + INTERVAL '3' MONTH as medical2_expired,
				medical2.tanggal as medical2_tanggal,
				medical3.tanggal + INTERVAL '3' MONTH as medical3_expired,
				medical3.tanggal as medical3_tanggal
		   		FROM personal 
		        LEFT JOIN majikan ON personal.id_biodata=majikan.id_biodata 
		        LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan 
		        LEFT JOIN marka_biotoagen ON personal.id_biodata=marka_biotoagen.id_biodata 
		        LEFT JOIN disnaker ON personal.id_biodata=disnaker.id_biodata 
		        LEFT JOIN visa ON personal.id_biodata=visa.id_biodata
				LEFT JOIN dataterbang ON dataterbang.id_terbang=visa.id_terbang
				LEFT JOIN datasuhan ON majikan.kode_suhan=datasuhan.id_suhan
				LEFT JOIN datavisapermit ON majikan.kode_visapermit=datavisapermit.id_visapermit
				LEFT JOIN pasporlama ON personal.id_biodata=pasporlama.id_biodata
				LEFT JOIN paspor ON personal.id_biodata=paspor.id_biodata
				LEFT JOIN skck ON personal.id_biodata=skck.id_biodata
				LEFT JOIN medical ON personal.id_biodata=medical.id_biodata
				LEFT JOIN medical2 ON personal.id_biodata=medical2.id_biodata
				LEFT JOIN medical3 ON personal.id_biodata=medical3.id_biodata
				LEFT JOIN signingbank ON personal.id_biodata=signingbank.id_biodata
				WHERE personal.id_biodata='".$row->id_biodata."'
			");

			$medical 	= $query_ambil_tki->medical3_tanggal;
			$medicalexp = $query_ambil_tki->medical3_expired;

			if ($query_ambil_tki->medical3_total == '0')
			{
				$medical 	= $query_ambil_tki->medical2_tanggal;
				$medicalexp = str_replace('-', '.', $query_ambil_tki->medical2_expired);
			}

			$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$e, $no)
				->setCellValue('B'.$e, $query_ambil_tki->personal_id.$query_ambil_tki->personal_negara1.$query_ambil_tki->personal_negara2.$query_ambil_tki->personal_calling.'-'.$query_ambil_tki->personal_skill1.$query_ambil_tki->personal_skill2.$query_ambil_tki->personal_skill3)
                ->setCellValue('C'.$e, $query_ambil_tki->personal_nama)
                ->setCellValue('D'.$e, $query_ambil_tki->personal_namaman)
                ->setCellValue('E'.$e, $query_ambil_tki->namamajikanman)
                ->setCellValue('F'.$e, $query_ambil_tki->namamajikan)
                ->setCellValue('G'.$e, $query_ambil_tki->tgltoagen)
                ->setCellValue('H'.$e, $query_ambil_tki->tgldisnaker)
                ->setCellValue('I'.$e, $query_ambil_tki->perkiraandisnaker)
                ->setCellValue('J'.$e, $query_ambil_tki->nodisnaker)
                ->setCellValue('K'.$e, $query_ambil_tki->tgterbitpaspor)
                ->setCellValue('L'.$e, $query_ambil_tki->terpilihmajikan)
                ->setCellValue('M'.$e, $query_ambil_tki->jdmajikan)
                ->setCellValue('N'.$e, $query_ambil_tki->terbangmajikan)
                ->setCellValue('O'.$e, $query_ambil_tki->tglberangkat)
                ->setCellValue('P'.$e, $query_ambil_tki->statusberangkat)
                ->setCellValue('Q'.$e, $query_ambil_tki->keberangkatan)
                ->setCellValue('R'.$e, $query_ambil_tki->jamtiba)
                ->setCellValue('S'.$e, $query_ambil_tki->tiket)
                ->setCellValue('T'.$e, $query_ambil_tki->tglnyaberangkat)
                ->setCellValue('U'.$e, $query_ambil_tki->statusterbang)
                ->setCellValue('V'.$e, $query_ambil_tki->tglpk)
                ->setCellValue('W'.$e, $query_ambil_tki->tglterimasuhan)
                ->setCellValue('X'.$e, $query_ambil_tki->no_suhan)
                ->setCellValue('Y'.$e, $query_ambil_tki->tglterbit_suhan)
                ->setCellValue('Z'.$e, $query_ambil_tki->tglexp_suhan)
                ->setCellValue('AA'.$e, '')
                ->setCellValue('AB'.$e, $query_ambil_tki->tglterimavisapermit)
                ->setCellValue('AC'.$e, $query_ambil_tki->no_visapermit)
                ->setCellValue('AD'.$e, $query_ambil_tki->tglterbit_visapermit)
                ->setCellValue('AE'.$e, $query_ambil_tki->tglexp_visapermit)
                ->setCellValue('AF'.$e, '')
                ->setCellValue('AG'.$e, $query_ambil_tki->pasporlama)
                ->setCellValue('AH'.$e, $query_ambil_tki->ajupaspor)
                ->setCellValue('AI'.$e, $query_ambil_tki->ajustatpaspor)
                ->setCellValue('AJ'.$e, $query_ambil_tki->fotopaspor)
                ->setCellValue('AK'.$e, $query_ambil_tki->fotostatpaspor)
                ->setCellValue('AL'.$e, $query_ambil_tki->terimapaspor)
                ->setCellValue('AM'.$e, $query_ambil_tki->terimastatpaspor)
                ->setCellValue('AN'.$e, $query_ambil_tki->pengajuan_skck)
                ->setCellValue('AO'.$e, $query_ambil_tki->pengajuanstat_skck)
                ->setCellValue('AP'.$e, $query_ambil_tki->terima_skck)
                ->setCellValue('AQ'.$e, $query_ambil_tki->terimastat_skck)
                ->setCellValue('AR'.$e, $query_ambil_tki->tglexp_skck)
                ->setCellValue('AS'.$e, $medical)
                ->setCellValue('AT'.$e, $medicalexp)
                ->setCellValue('AU'.$e, $query_ambil_tki->kocokan_visa)
                ->setCellValue('AV'.$e, $query_ambil_tki->kocokanstats_visa)
                ->setCellValue('AW'.$e, $query_ambil_tki->finger_visa)
                ->setCellValue('AX'.$e, $query_ambil_tki->fingerstats_visa)
                ->setCellValue('AY'.$e, $query_ambil_tki->terima_visa)
                ->setCellValue('AZ'.$e, $query_ambil_tki->terimastats_visa)
              
                ->setCellValue('BA'.$e, $query_ambil_tki->loanbank)
                ->setCellValue('BB'.$e, $query_ambil_tki->pap_visa)
                ->setCellValue('BC'.$e, $query_ambil_tki->papstats_visa)
                ->setCellValue('BD'.$e, $query_ambil_tki->ktkln_visa)
                ->setCellValue('BE'.$e, $query_ambil_tki->kklnstats_visa)
                ->setCellValue('BF'.$e, $query_ambil_tki->personal_keterangan)
			;

		$no++;
		$e++;
		}

			

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_files.'.xls"');

        $objWriter->save("php://output");
	}

	function markinformal_print()
	{
		$revgroup = $this->session->userdata('mark_idagen');
        $revstatt = $this->session->userdata('mark_statterbang');

        if ($revgroup == NULL || $revgroup == "Semua") {
            $kodwhere = "( majikan.kode_group!='' || majikan.kode_group is NULL) AND ";
            $nama_files = "MARK INFORMAL SEMUA";
        } else {
            $kodwhere = "majikan.kode_agen='".$revgroup."' and ";
            $select_agen = $this->M_session->select_row("SELECT * FROM dataagen where id_agen='".$revgroup."'");
            $nama_files = "MARK INFORMAL ".$select_agen->nama;
        }

        $kodwhere2 = "( personal.statterbang IS NULL || personal.statterbang = '' ) and ";
        if ($revstatt == "1") {
            $kodwhere2 = "( personal.statterbang = 1 ) and ";
        }

        $where_dd = "where ".$kodwhere." ".$kodwhere2." 
        	(personal.id_biodata LIKE 'FI%' 
	   		OR personal.id_biodata LIKE 'MI%')";

		$ambil_data = $this->M_session->select(" 
	   		SELECT 
	        	distinct(personal.id_biodata)
	   		FROM personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
	   		".$where_dd." 
	   		ORDER BY personal.id_biodata");

		$this->load->library("PHPExcel");

        $objPHPExcel 	= new PHPExcel();
		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');

		$objPHPExcel = $objReader->load("files/pgm_informal.xls");

		$no = 1;
		$e 	= 5;
		foreach ($ambil_data as $row) {

			$query_ambil_tki = $this->M_session->select_row("SELECT 
	        	majikan.kode_majikan,

	        	personal.id_biodata as personal_id,
	        	personal.nama as personal_nama,
	        	personal.nama_mandarin as personal_namaman,
	        	personal.negara1 as personal_negara1,
	        	personal.negara2 as personal_negara2,
	        	personal.calling as personal_calling,
	        	personal.skill1 as personal_skill1,
	        	personal.skill2 as personal_skill2,
	        	personal.skill3 as personal_skill3,
	        	personal.keterangan as personal_keterangan,

	        	majikan.namataiwan as namamajikanman,
	        	majikan.namamajikan as namamajikan,
	        	marka_biotoagen.tgl_to_agen as tgltoagen,
	        	disnaker.tglonline as tgldisnaker,
	        	disnaker.perkiraan as perkiraandisnaker,
	        	disnaker.nodisnaker as nodisnaker,

	        	paspor.nopaspor as tgterbitpaspor,
				(SELECT dteDate FROM tblattendance WHERE idblk=personal.id_biodata Group by dteDate DESC LIMIT 1) as tglterakhirfinger,
				(SELECT count(DISTINCT(DATE(dteDate))) FROM tblattendance WHERE idblk =personal.id_biodata AND waktu='pagi') as jmlfingerpagi,
				(SELECT count(DISTINCT(DATE(dteDate))) FROM tblattendance WHERE idblk =personal.id_biodata AND waktu='sore') as jmlfingersore,
				(SELECT DATE_ADD(adm_tglreg, INTERVAL 60 DAY) FROM personalblk WHERE nodaftar=personal.id_biodata) as hitunganfingernodaftujuh,
				(SELECT DATE_ADD(adm_tglreg, INTERVAL 67 DAY) FROM personalblk WHERE nodaftar=personal.id_biodata) as hitunganfingernodafbelas,

	        	majikan.tglterpilih as terpilihmajikan,
	        	majikan.JD as jdmajikan,
	        	majikan.tglterbang as terbangmajikan,
	        	visa.tanggalterbang as tglberangkat,
	        	visa.statusterbang as statusberangkat,
	        	dataterbang.detailberangkat1 as keberangkatan,
	        	dataterbang.jamtiba as jamtiba,
	        	visa.tiket as tiket,
	        	visa.tglberangkat as tglnyaberangkat,
	        	visa.statusterbang as statusterbang,
	        	majikan.tglpk as tglpk,

	        	majikan.tglterimasuhan as tglterimasuhan,
	        	majikan.id_suhan as no_suhan,
	        	majikan.tglterbitsuhan as tglterbit_suhan,
	        	majikan.tglterbitsuhan + INTERVAL '6' MONTH as tglexp_suhan,
	        	majikan.ketsuhan as keterangan_suhan,

	        	majikan.tglterimapermit as tglterimavisapermit,
	        	majikan.id_visapermit as no_visapermit,
	        	majikan.tglterbitpermit as tglterbit_visapermit,
	        	majikan.tglterbitpermit + INTERVAL '6' MONTH as tglexp_visapermit,
	        	majikan.ketpermit as keterangan_visapermit,

	        	DATE_ADD(pasporlama.tglterbit, INTERVAL 5 YEAR) as pasporlama,
	        	paspor.tglpengajuan as ajupaspor,
	        	paspor.statuspengajuan as ajustatpaspor,
	        	paspor.tglfoto as fotopaspor,
	        	paspor.statusfoto as fotostatpaspor,
	        	paspor.tglterima as terimapaspor,
	        	paspor.statusterima as terimastatpaspor,
	        	skck.pengajuan as pengajuan_skck,
	        	skck.statuspengajuan as pengajuanstat_skck,
	        	skck.terima as terima_skck,
	        	skck.statusterima as terimastat_skck,
	        	skck.tglexp as tglexp_skck,
	        	visa.kocokan as kocokan_visa,
	        	visa.statuskocokan as kocokanstats_visa,
	        	visa.finger as finger_visa,
	        	visa.statusfinger as fingerstats_visa,
	        	visa.terima as terima_visa,
	        	visa.statusterima as terimastats_visa,
	        	signingbank.tgl_tki_ttd as loanbank,
	        	visa.pap as pap_visa,
	        	visa.statuspap as papstats_visa,
	        	visa.ktkln as ktkln_visa,
	        	visa.statusktkln as kklnstats_visa,
	        	( SELECT count(*) FROM medical3 WHERE id_biodata=personal.id_biodata ) as medical3_total,
				medical2.tanggal + INTERVAL '3' MONTH as medical2_expired,
				medical2.tanggal as medical2_tanggal,
				medical3.tanggal + INTERVAL '3' MONTH as medical3_expired,
				medical3.tanggal as medical3_tanggal,
                personalblk.sektor_tki as status_monitoring
		   		FROM personal 
		        LEFT JOIN majikan ON personal.id_biodata=majikan.id_biodata 
		        LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan 
		        LEFT JOIN marka_biotoagen ON personal.id_biodata=marka_biotoagen.id_biodata 
		        LEFT JOIN disnaker ON personal.id_biodata=disnaker.id_biodata 
		        LEFT JOIN visa ON personal.id_biodata=visa.id_biodata
				LEFT JOIN dataterbang ON dataterbang.id_terbang=visa.id_terbang
				LEFT JOIN datasuhan ON majikan.kode_suhan=datasuhan.id_suhan
				LEFT JOIN datavisapermit ON majikan.kode_visapermit=datavisapermit.id_visapermit
				LEFT JOIN pasporlama ON personal.id_biodata=pasporlama.id_biodata
				LEFT JOIN paspor ON personal.id_biodata=paspor.id_biodata
				LEFT JOIN skck ON personal.id_biodata=skck.id_biodata
				LEFT JOIN medical ON personal.id_biodata=medical.id_biodata
				LEFT JOIN medical2 ON personal.id_biodata=medical2.id_biodata
				LEFT JOIN medical3 ON personal.id_biodata=medical3.id_biodata
				LEFT JOIN signingbank ON personal.id_biodata=signingbank.id_biodata
                LEFT JOIN personalblk ON personal.id_biodata=personalblk.nodaftar
				WHERE personal.id_biodata='".$row->id_biodata."'
				GROUP BY personal.id_biodata
			");

			$medical 	= $query_ambil_tki->medical3_tanggal;
			$medicalexp = $query_ambil_tki->medical3_expired;

			if ($query_ambil_tki->medical3_total == '0')
			{
				$medical 	= $query_ambil_tki->medical2_tanggal;
				$medicalexp = str_replace('-', '.', $query_ambil_tki->medical2_expired);
			}

            $tanggal_durasi = $query_ambil_tki->hitunganfingernodaftujuh;
            if ( $query_ambil_tki->status_monitoring == 3 )
            {
                $tanggal_durasi = "";
            }

            $stat_tgl_durasi = '';
            if ( $tanggal_durasi != NULL )
            {
                $stat_tgl_durasi = 'C';
                if ( $tanggal_durasi < date('Y-m-d') )
                {
                    $stat_tgl_durasi = 'A';
                }
            }

            $stat_tgl_ujk = 'C';
            if ( $query_ambil_tki->hitunganfingernodafbelas != NULL )
            {
                $stat_tgl_ujk = 'A';
            }

			$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$e, $no)
				->setCellValue('B'.$e, $query_ambil_tki->personal_id.$query_ambil_tki->personal_negara1.$query_ambil_tki->personal_negara2.$query_ambil_tki->personal_calling.'-'.$query_ambil_tki->personal_skill1.$query_ambil_tki->personal_skill2.$query_ambil_tki->personal_skill3)
                ->setCellValue('C'.$e, $query_ambil_tki->personal_nama)
                ->setCellValue('D'.$e, $query_ambil_tki->personal_namaman)
                ->setCellValue('E'.$e, $query_ambil_tki->namamajikanman)
                ->setCellValue('F'.$e, $query_ambil_tki->namamajikan)
                ->setCellValue('G'.$e, $query_ambil_tki->tgltoagen)
                ->setCellValue('H'.$e, $query_ambil_tki->tgldisnaker)
                ->setCellValue('I'.$e, $query_ambil_tki->perkiraandisnaker)
                ->setCellValue('J'.$e, $query_ambil_tki->nodisnaker)
                ->setCellValue('K'.$e, $query_ambil_tki->tgterbitpaspor)

                ->setCellValue('L'.$e, $query_ambil_tki->tglterakhirfinger)
                ->setCellValue('M'.$e, ' ( Pagi: '.$query_ambil_tki->jmlfingerpagi.' )'.' ( Sore: '.$query_ambil_tki->jmlfingersore.' )')
                ->setCellValue('N'.$e, $tanggal_durasi)
                ->setCellValue('O'.$e, $stat_tgl_durasi)
                ->setCellValue('P'.$e, $query_ambil_tki->hitunganfingernodafbelas)
                ->setCellValue('Q'.$e, $stat_tgl_ujk)

                ->setCellValue('R'.$e, $query_ambil_tki->terpilihmajikan)
                ->setCellValue('S'.$e, $query_ambil_tki->jdmajikan)
                ->setCellValue('T'.$e, $query_ambil_tki->terbangmajikan)
                ->setCellValue('U'.$e, $query_ambil_tki->tglberangkat)
                ->setCellValue('V'.$e, $query_ambil_tki->statusberangkat)
                ->setCellValue('W'.$e, $query_ambil_tki->keberangkatan)
                ->setCellValue('X'.$e, $query_ambil_tki->jamtiba)
                ->setCellValue('Y'.$e, $query_ambil_tki->tiket)
                ->setCellValue('Z'.$e, $query_ambil_tki->tglnyaberangkat)
                ->setCellValue('AA'.$e, $query_ambil_tki->statusterbang)
                ->setCellValue('AB'.$e, $query_ambil_tki->tglpk)
                ->setCellValue('AC'.$e, $query_ambil_tki->tglterimasuhan)
                ->setCellValue('AD'.$e, $query_ambil_tki->no_suhan)
                ->setCellValue('AE'.$e, $query_ambil_tki->tglterbit_suhan)
                ->setCellValue('AF'.$e, $query_ambil_tki->tglexp_suhan)
                ->setCellValue('AG'.$e, '')
                ->setCellValue('AH'.$e, $query_ambil_tki->tglterimavisapermit)
                ->setCellValue('AI'.$e, $query_ambil_tki->no_visapermit)
                ->setCellValue('AJ'.$e, $query_ambil_tki->tglterbit_visapermit)
                ->setCellValue('AK'.$e, $query_ambil_tki->tglexp_visapermit)
                ->setCellValue('AL'.$e, '')
                ->setCellValue('AM'.$e, $query_ambil_tki->pasporlama)
                ->setCellValue('AN'.$e, $query_ambil_tki->ajupaspor)
                ->setCellValue('AO'.$e, $query_ambil_tki->ajustatpaspor)
                ->setCellValue('AP'.$e, $query_ambil_tki->fotopaspor)
                ->setCellValue('AQ'.$e, $query_ambil_tki->fotostatpaspor)
                ->setCellValue('AR'.$e, $query_ambil_tki->terimapaspor)
                ->setCellValue('AS'.$e, $query_ambil_tki->terimastatpaspor)
                ->setCellValue('AT'.$e, $query_ambil_tki->pengajuan_skck)
                ->setCellValue('AU'.$e, $query_ambil_tki->pengajuanstat_skck)
                ->setCellValue('AV'.$e, $query_ambil_tki->terima_skck)
                ->setCellValue('AW'.$e, $query_ambil_tki->terimastat_skck)
                ->setCellValue('AX'.$e, $query_ambil_tki->tglexp_skck)
                ->setCellValue('AY'.$e, $medical)
                ->setCellValue('AZ'.$e, $medicalexp)
                ->setCellValue('BA'.$e, $query_ambil_tki->kocokan_visa)
                ->setCellValue('BB'.$e, $query_ambil_tki->kocokanstats_visa)
                ->setCellValue('BC'.$e, $query_ambil_tki->finger_visa)
                ->setCellValue('BD'.$e, $query_ambil_tki->fingerstats_visa)
                ->setCellValue('BE'.$e, $query_ambil_tki->terima_visa)
                ->setCellValue('BF'.$e, $query_ambil_tki->terimastats_visa)
              
                ->setCellValue('BG'.$e, $query_ambil_tki->loanbank)
                ->setCellValue('BH'.$e, $query_ambil_tki->pap_visa)
                ->setCellValue('BI'.$e, $query_ambil_tki->papstats_visa)
                ->setCellValue('BJ'.$e, $query_ambil_tki->ktkln_visa)
                ->setCellValue('BK'.$e, $query_ambil_tki->kklnstats_visa)
                ->setCellValue('BL'.$e, $query_ambil_tki->personal_keterangan)
			;

		$no++;
		$e++;
		}	

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_files.'.xls"');

        $objWriter->save("php://output");
	}

}