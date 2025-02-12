<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class admin_mark extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');			
	}

    //------------------------------------------- MARK FORMAL ------------------------------------------//
	
	function formal()
	{
        $this->session->unset_userdata('mark_idagen');
        $this->session->unset_userdata('mark_statterbang');

		$data['tampil_pilihan_agen'] = $this->M_session->select("SELECT * FROM dataagen ORDER BY nama ASC");

		$data['namamodule']   = "admin_mark";
		$data['namafileview'] = "markformal";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function formal_show() 
    {
        $revgroup =  $this->session->userdata('mark_idagen');
        $revstatt =  $this->session->userdata('mark_statterbang');

        $columns22 = array('personal.id_biodata');

        $strr = array();
        $string1 = $_POST['search']['value'];
        for ($i=0;$i<count($columns22);$i++) {
            $strr[] = " lower(".$columns22[$i].") LIKE '%".strtolower($string1)."%'";
        }
        $where = '';
        if ( count( $strr ) ) {
            $where = '('.implode(' OR ', $strr).')';
        }
        if ( $where !== '' ) {
            $where = $where;
        }

        if ($revgroup == NULL || $revgroup == "Semua") {
            $kodwhere = "( majikan.kode_agen!='' || majikan.kode_agen is NULL) and ";
        } else {
            $kodwhere = "majikan.kode_agen='".$revgroup."' and ";
        }

        $kodwhere2 = "( personal.statterbang IS NULL || personal.statterbang = '' ) and ";
        if ($revstatt == "1") {
            $kodwhere2 = "personal.statterbang = '1' and ";
        }

        $where_dd   = "";
        $limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

        $where_dd = "where ".$kodwhere." ".$kodwhere2." 
        	(personal.id_biodata LIKE 'FF%' 
	   		OR personal.id_biodata LIKE 'MF%' 
	   		OR personal.id_biodata LIKE 'JP%')";

        if ($where != NULL) 
        {
            $where_dd .= " and ".$where;
        }

        $ambiltki = $this->M_session->select(
	   		"SELECT 
	        	distinct(personal.id_biodata)
		   		FROM personal 
		        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
				".$where_dd." 
	   			ORDER BY personal.id_biodata ".$limit);

        $data2  = array();
        $no     = intval($_POST['start']);
        foreach ($ambiltki as $row) {

        	$query_ambil_tki = $this->M_session->select_row("
        		SELECT
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
                personal.keterangan2 as personal_keterangan2,
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
		        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
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
				WHERE personal.id_biodata='".$row->id_biodata."'"
			);

			$medical 	= $query_ambil_tki->medical3_tanggal;
			$medicalexp = $query_ambil_tki->medical3_expired;

			if ($query_ambil_tki->medical3_total == 0)
			{
				$medical 	= $query_ambil_tki->medical2_tanggal;
				$medicalexp = str_replace('-', '.', $query_ambil_tki->medical2_expired);
			}
/*
            $pkets = '';
            if ( $query_ambil_tki->personal_keterangan != NULL || $query_ambil_tki->personal_keterangan != "" )
            {
                $pkets = substr($query_ambil_tki->personal_keterangan, 0, 9).'...';
            }*/
            $pkets = '<a class="mark_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil3"></i><span></span></a>';
            if ( $query_ambil_tki->personal_keterangan != NULL && $query_ambil_tki->personal_keterangan != "" )
            {
                $pkets = 
                    '<a class="mark_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil4"></i><span></span></a> '.
                    '<a class="mark_detail" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-bubbles"></i><span></span></a> ';
            }

            $pkets2 = '<a class="markket2_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil3"></i><span></span></a>';
            if ( $query_ambil_tki->personal_keterangan2 != NULL && $query_ambil_tki->personal_keterangan2 != "" )
            {
                $pkets2 = 
                    '<a class="markket2_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil4"></i><span></span></a> '.
                    '<a class="markket2_detail" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-bubbles"></i><span></span></a> ';
            }

            $no++;
            array_push($data2,
                array(
                	$no,
                    $query_ambil_tki->personal_id.$query_ambil_tki->personal_negara1.$query_ambil_tki->personal_negara2.$query_ambil_tki->personal_calling.'-'.$query_ambil_tki->personal_skill1.$query_ambil_tki->personal_skill2.$query_ambil_tki->personal_skill3,
                    $query_ambil_tki->personal_nama,
                    $query_ambil_tki->personal_namaman,
                    $query_ambil_tki->namamajikanman,
                    $query_ambil_tki->namamajikan,
                    
                    $query_ambil_tki->tgltoagen,
                    $query_ambil_tki->tgldisnaker,
                    $query_ambil_tki->perkiraandisnaker,
                    $query_ambil_tki->nodisnaker,
                    $query_ambil_tki->tgterbitpaspor,
                    $query_ambil_tki->terpilihmajikan,
                    $query_ambil_tki->jdmajikan,
                    $query_ambil_tki->terbangmajikan,
                    $query_ambil_tki->tglberangkat,
                    $query_ambil_tki->statusberangkat,
                    $query_ambil_tki->keberangkatan,
                    $query_ambil_tki->jamtiba,
                    $query_ambil_tki->tiket,
                    $query_ambil_tki->tglnyaberangkat,
                    $query_ambil_tki->statusterbang,
                    $query_ambil_tki->tglpk,
                    $query_ambil_tki->tglterimasuhan,
                    $query_ambil_tki->no_suhan,
                    $query_ambil_tki->tglterbit_suhan,
                    $query_ambil_tki->tglexp_suhan,
                    '',
                    $query_ambil_tki->tglterimavisapermit,
                    $query_ambil_tki->no_visapermit,
                    $query_ambil_tki->tglterbit_visapermit,
                    $query_ambil_tki->tglexp_visapermit,
                    '',
                    $query_ambil_tki->pasporlama,
                    $query_ambil_tki->ajupaspor,
                    $query_ambil_tki->ajustatpaspor,
                    $query_ambil_tki->fotopaspor,
                    $query_ambil_tki->fotostatpaspor,
                    $query_ambil_tki->terimapaspor,
                    $query_ambil_tki->terimastatpaspor,
                    $query_ambil_tki->pengajuan_skck,
                    $query_ambil_tki->pengajuanstat_skck,
                    $query_ambil_tki->terima_skck,
                    $query_ambil_tki->terimastat_skck,
                    $query_ambil_tki->tglexp_skck,
                    $medical,
                    $medicalexp,
                    $query_ambil_tki->kocokan_visa,
                    $query_ambil_tki->kocokanstats_visa,
                    $query_ambil_tki->finger_visa,
                    $query_ambil_tki->fingerstats_visa,
                    $query_ambil_tki->terima_visa,
                    $query_ambil_tki->terimastats_visa,
                  
                    $query_ambil_tki->loanbank,
                    $query_ambil_tki->pap_visa,
                    $query_ambil_tki->papstats_visa,
                    $query_ambil_tki->ktkln_visa,
                    $query_ambil_tki->kklnstats_visa,/*
                    '<a class="mark_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil3"></i><span></span></a> '.
                    '<a class="mark_detail" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-bubbles"></i><span></span></a> '.*/
                    $pkets,
                    $pkets2
                )
            );
        }

        $recordsFiltered = $this->M_session->select_count("personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
	   		".$where_dd);

        $recordsTotal = $this->M_session->select_count("personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata where ".$kodwhere." ".$kodwhere2."
        	(personal.id_biodata LIKE 'FF%' 
	   		OR personal.id_biodata LIKE 'MF%' 
	   		OR personal.id_biodata LIKE 'JP%')");

        $r = array(
            "draw"            => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($r));
    }

    function formal_setagen()
    {
        $kodegroup = $this->input->post('kodegroup');
        $this->session->set_userdata('mark_idagen','');
        $title = $this->input->post('tl');
        $hasil = "SEMUA AGEN";
        if ($kodegroup != NULL && $kodegroup != "Semua")
        {
        	$nama = $this->M_session->select_one("dataagen WHERE id_agen='$kodegroup'", "nama");
        	$hasil = $nama;
            $this->session->set_userdata('mark_idagen',$kodegroup);
        }

        $title_exp = explode(" | ", $title);
        $title_fin = $title_exp[0].' | '.$hasil;

        $arr = array(
        	'title' => $title_fin,
        	'kodegroup' => $kodegroup
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($arr));
    }

    function formal_set_statterbang()
    {
        $kodegroup 	= $this->input->post('id');
        $title  	= $this->input->post('tl');

        $this->session->unset_userdata('mark_statterbang');
        $tipe1 	= '2';
        $tipe2 	= '1';
        $button = '還沒入境 – BELUM KE TAIWAN';

        if ($kodegroup == 'sudah')
        {
            $this->session->set_userdata('mark_statterbang', '1');
		    $tipe1 	= '1';
		    $tipe2 	= '2';
		    $button = '已經入境 – SUDAH KE TAIWAN';
        }

        $title_exp = explode(" | ", $title);
        $title_fin = $button.' | '.$title_exp[1];

        $arr = array(
        	'title' => $title_fin,
        	'tipe1' => $tipe1,
        	'tipe2' => $tipe2,
        	'button' => $button
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($arr));
    }

    function formal_updateket()
    {
        $data['success'] = FALSE;
        $data['message'] = 'Terjadi Kesalahan';

        $id     = $this->input->post('idbio');
        $ket    = $this->input->post('keterangan');

        $data2 = array(
            'keterangan' => $ket
        );

        $cek = $this->M_session->update($data2, "personal", $id, "id_biodata");

        if ( $cek == TRUE ) 
        {
            $data['success'] = TRUE;
            $data['message'] = 'Sukses';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function formal_detailket($id)
    {
        $keterangan = $this->M_session->select_one("personal WHERE id_biodata='$id'", "keterangan");

        $this->output->set_content_type('application/json')->set_output(json_encode($keterangan));
    }

    function formal_updateket2()
    {
        $data['success'] = FALSE;
        $data['message'] = 'Terjadi Kesalahan';

        $id     = $this->input->post('idbio');
        $ket    = $this->input->post('keterangan');

        $data2 = array(
            'keterangan2' => $ket
        );

        $cek = $this->M_session->update($data2, "personal", $id, "id_biodata");

        if ( $cek == TRUE ) 
        {
            $data['success'] = TRUE;
            $data['message'] = 'Sukses';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function formal_detailket2($id)
    {
        $keterangan = $this->M_session->select_one("personal WHERE id_biodata='$id'", "keterangan2");

        $this->output->set_content_type('application/json')->set_output(json_encode($keterangan));
    }

    //------------------------------------------- MARK INFORMAL ------------------------------------------//
	
	function informal()
	{
        $this->session->unset_userdata('mark_idagen');
        $this->session->unset_userdata('mark_statterbang');

		$data['tampil_pilihan_agen'] = $this->M_session->select("SELECT * FROM dataagen ORDER BY nama ASC");

		$data['namamodule']   = "admin_mark";
		$data['namafileview'] = "markinformal";
		echo Modules::run('template/new_admin2_template', $data);
	}

	function informal_show() 
    {
        $revgroup =  $this->session->userdata('mark_idagen');
        $revstatt =  $this->session->userdata('mark_statterbang');

        $columns22 = array('personal.id_biodata');

        $strr = array();
        $string1 = $_POST['search']['value'];
        for ($i=0;$i<count($columns22);$i++) {
            $strr[] = " lower(".$columns22[$i].") LIKE '%".strtolower($string1)."%'";
        }
        $where = '';
        if ( count( $strr ) ) {
            $where = '('.implode(' OR ', $strr).')';
        }
        if ( $where !== '' ) {
            $where = $where;
        }

        if ($revgroup == NULL || $revgroup == "Semua") {
            $kodwhere = "( majikan.kode_group!='' || majikan.kode_group is NULL) AND ";
        } else {
            $kodwhere = "majikan.kode_agen='".$revgroup."' and ";
        }

        $kodwhere2 = "( personal.statterbang IS NULL || personal.statterbang = '' ) and ";
        if ($revstatt == "1") {
            $kodwhere2 = "( personal.statterbang = 1 ) and ";
        }

        $where_dd   = "";
        $limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

        $where_dd = "where ".$kodwhere." ".$kodwhere2." 
        	(personal.id_biodata LIKE 'FI%' 
	   		OR personal.id_biodata LIKE 'MI%')";

        if ($where != NULL) 
        {
            $where_dd .= " and ".$where;
        }

        $ambiltki = $this->M_session->select(
	   		" 
	   		SELECT 
	        distinct(personal.id_biodata)
	   		FROM personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
	   		".$where_dd." 
	   		ORDER BY personal.id_biodata ".$limit);

        $data2  = array();
        $no     = intval($_POST['start']);
        foreach ($ambiltki as $row) {

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
                personal.keterangan2 as personal_keterangan2,

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
                personalblk.sektor_tki as status_monitoring,
                (SELECT tgl_ujk FROM blk_detail_formulir
                    LEFT JOIN blk_formulir
                    ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
                    WHERE blk_detail_formulir.nodaftar=personal.id_biodata ORDER BY blk_formulir.id_formulir DESC LIMIT 1
                ) as personalblk_tgl_ujk
		   		FROM personal 
		        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
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
			");

			$medical 	= $query_ambil_tki->medical3_tanggal;
			$medicalexp = $query_ambil_tki->medical3_expired;

			if ($query_ambil_tki->medical3_total == '0')
			{
				$medical 	= $query_ambil_tki->medical2_tanggal;
				$medicalexp = str_replace('-', '.', $query_ambil_tki->medical2_expired);
			}
/*
            $pkets = '';
            if ( $query_ambil_tki->personal_keterangan != NULL || $query_ambil_tki->personal_keterangan != "" )
            {
                $pkets = substr($query_ambil_tki->personal_keterangan, 0, 9).'...';
            }*/
            $pkets = '<a class="mark_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil3"></i><span></span></a>';
            if ( $query_ambil_tki->personal_keterangan != NULL || $query_ambil_tki->personal_keterangan != "" )
            {
                $pkets = 
                    '<a class="mark_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil4"></i><span></span></a> '.
                    '<a class="mark_detail" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-bubbles"></i><span></span></a> ';
            }

            $pkets2 = '<a class="markket2_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil3"></i><span></span></a>';
            if ( $query_ambil_tki->personal_keterangan2 != NULL && $query_ambil_tki->personal_keterangan2 != "" )
            {
                $pkets2 = 
                    '<a class="markket2_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil4"></i><span></span></a> '.
                    '<a class="markket2_detail" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-bubbles"></i><span></span></a> ';
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
            if ( $query_ambil_tki->personalblk_tgl_ujk != NULL )
            {
                $stat_tgl_ujk = 'A';
            }

            $no++;
            array_push($data2,
                array(
                	$no,
                    $query_ambil_tki->personal_id.$query_ambil_tki->personal_negara1.$query_ambil_tki->personal_negara2.$query_ambil_tki->personal_calling.'-'.$query_ambil_tki->personal_skill1.$query_ambil_tki->personal_skill2.$query_ambil_tki->personal_skill3,
                    $query_ambil_tki->personal_nama,
                    $query_ambil_tki->personal_namaman,
                    $query_ambil_tki->namamajikanman,
                    $query_ambil_tki->namamajikan,
                    
                    $query_ambil_tki->tgltoagen,
                    $query_ambil_tki->tgldisnaker,
                    $query_ambil_tki->perkiraandisnaker,
                    $query_ambil_tki->nodisnaker,
                    $query_ambil_tki->tgterbitpaspor,

                    $query_ambil_tki->tglterakhirfinger,
                    ' ( Pagi: '.$query_ambil_tki->jmlfingerpagi.' )'.' ( Sore: '.$query_ambil_tki->jmlfingersore.' )',
                    $tanggal_durasi,
                    $stat_tgl_durasi,
                    $query_ambil_tki->hitunganfingernodafbelas,
                    $stat_tgl_ujk,

                    $query_ambil_tki->terpilihmajikan,
                    $query_ambil_tki->jdmajikan,
                    $query_ambil_tki->terbangmajikan,
                    $query_ambil_tki->tglberangkat,
                    $query_ambil_tki->statusberangkat,
                    $query_ambil_tki->keberangkatan,
                    $query_ambil_tki->jamtiba,
                    $query_ambil_tki->tiket,
                    $query_ambil_tki->tglnyaberangkat,
                    $query_ambil_tki->statusterbang,
                    $query_ambil_tki->tglpk,
                    $query_ambil_tki->tglterimasuhan,
                    $query_ambil_tki->no_suhan,
                    $query_ambil_tki->tglterbit_suhan,
                    $query_ambil_tki->tglexp_suhan,
                    $query_ambil_tki->keterangan_suhan,
                    $query_ambil_tki->tglterimavisapermit,
                    $query_ambil_tki->no_visapermit,
                    $query_ambil_tki->tglterbit_visapermit,
                    $query_ambil_tki->tglexp_visapermit,
                    $query_ambil_tki->keterangan_visapermit,
                    $query_ambil_tki->pasporlama,
                    $query_ambil_tki->ajupaspor,
                    $query_ambil_tki->ajustatpaspor,
                    $query_ambil_tki->fotopaspor,
                    $query_ambil_tki->fotostatpaspor,
                    $query_ambil_tki->terimapaspor,
                    $query_ambil_tki->terimastatpaspor,
                    $query_ambil_tki->pengajuan_skck,
                    $query_ambil_tki->pengajuanstat_skck,
                    $query_ambil_tki->terima_skck,
                    $query_ambil_tki->terimastat_skck,
                    $query_ambil_tki->tglexp_skck,
                    $medical,
                    $medicalexp,
                    $query_ambil_tki->kocokan_visa,
                    $query_ambil_tki->kocokanstats_visa,
                    $query_ambil_tki->finger_visa,
                    $query_ambil_tki->fingerstats_visa,
                    $query_ambil_tki->terima_visa,
                    $query_ambil_tki->terimastats_visa,
                  
                    $query_ambil_tki->loanbank,
                    $query_ambil_tki->pap_visa,
                    $query_ambil_tki->papstats_visa,
                    $query_ambil_tki->ktkln_visa,
                    $query_ambil_tki->kklnstats_visa,/*
                    '<a class="mark_ubah" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-pencil3"></i><span></span></a> '.
                    '<a class="mark_detail" data-idbio="'.$query_ambil_tki->personal_id.'"><i class="icon-bubbles"></i><span></span></a> '.*/
                    $pkets,
                    $pkets2
                )
            );
        }

        $recordsFiltered = $this->M_session->select_count("personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata 
	   		$where_dd");

        $recordsTotal = $this->M_session->select_count("personal 
	        JOIN majikan ON personal.id_biodata=majikan.id_biodata where ".$kodwhere." ".$kodwhere2." 
        	( majikan.kode_group!='' || majikan.kode_group is NULL) 
        	AND (personal.id_biodata LIKE 'FF%' 
	   		OR personal.id_biodata LIKE 'MF%' 
	   		OR personal.id_biodata LIKE 'JP%')");

        $r = array(
            "draw"            => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($r));
    }

    function informal_setagen()
    {
        $kodegroup = $this->input->post('kodegroup');
        $this->session->set_userdata('mark_idagen','');
        $title = $this->input->post('tl');
        $hasil = "SEMUA AGEN";
        if ($kodegroup != NULL && $kodegroup != "Semua")
        {
        	$nama = $this->M_session->select_one("dataagen WHERE id_agen='$kodegroup'", "nama");
        	$hasil = $nama;
            $this->session->set_userdata('mark_idagen',$kodegroup);
        }

        $title_exp = explode(" | ", $title);
        $title_fin = $title_exp[0].' | '.$hasil;

        $arr = array(
        	'title' => $title_fin,
        	'kodegroup' => $kodegroup
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($arr));
    }

    function informal_set_statterbang()
    {
        $kodegroup 	= $this->input->post('id');
        $title  	= $this->input->post('tl');

        $this->session->unset_userdata('mark_statterbang');
        $tipe1 	= '2';
        $tipe2 	= '1';
        $button = '還沒入境 – BELUM KE TAIWAN';

        if ($kodegroup == 'sudah')
        {
            $this->session->set_userdata('mark_statterbang', '1');
		    $tipe1 	= '1';
		    $tipe2 	= '2';
		    $button = '已經入境 – SUDAH KE TAIWAN';
        }

        $title_exp = explode(" | ", $title);
        $title_fin = $button.' | '.$title_exp[1];

        $arr = array(
        	'title' => $title_fin,
        	'tipe1' => $tipe1,
        	'tipe2' => $tipe2,
        	'button' => $button
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($arr));
    }

    function informal_updateket()
    {
        $data['success'] = FALSE;
        $data['message'] = 'Terjadi Kesalahan';

        $id     = $this->input->post('idbio');
        $ket    = $this->input->post('keterangan');

        $data2 = array(
            'keterangan' => $ket
        );

        $cek = $this->M_session->update($data2, "personal", $id, "id_biodata");

        if ( $cek == TRUE ) 
        {
            $data['success'] = TRUE;
            $data['message'] = 'Sukses';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function informal_detailket($id)
    {
        $keterangan = $this->M_session->select_one("personal WHERE id_biodata='$id'", "keterangan");

        $this->output->set_content_type('application/json')->set_output(json_encode($keterangan));
    }

    function informal_updateket2()
    {
        $data['success'] = FALSE;
        $data['message'] = 'Terjadi Kesalahan';

        $id     = $this->input->post('idbio');
        $ket    = $this->input->post('keterangan');

        $data2 = array(
            'keterangan2' => $ket
        );

        $cek = $this->M_session->update($data2, "personal", $id, "id_biodata");

        if ( $cek == TRUE ) 
        {
            $data['success'] = TRUE;
            $data['message'] = 'Sukses';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function informal_detailket2($id)
    {
        $keterangan = $this->M_session->select_one("personal WHERE id_biodata='$id'", "keterangan2");

        $this->output->set_content_type('application/json')->set_output(json_encode($keterangan));
    }

}