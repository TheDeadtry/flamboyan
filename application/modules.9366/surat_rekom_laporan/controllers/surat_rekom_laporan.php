<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class surat_rekom_laporan extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$this->load->model('M_surat_rekom_laporan');			
	}
	
	function index(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
				//user sudah login
			if ($id_user && $status==1){
				//user sudah login
				$this->session->set_userdata('id','');
				$data['id'] =  $this->input->post('id');
				$data['tampil_data_personal'] = $this->M_surat_rekom_laporan->tampil_data_personal();
				$data['tampil_data_tki'] = $this->M_surat_rekom_laporan->tampil_data_tki();
				$data['tampil_data_namadisnaker'] = $this->M_surat_rekom_laporan->tampil_data_namadisnaker();
				$data['tampil_data_namaasuransi'] = $this->M_surat_rekom_laporan->tampil_data_namaasuransi();
				$data['tampil_data_namaagen'] = $this->M_surat_rekom_laporan->tampil_data_namaagen();
				$data['tampil_data_bank'] = $this->M_session->select(" SELECT * FROM databank order by isi ASC ");	

				$data['namamodule'] = "surat_rekom_laporan";
				$data['namafileview'] = "surat_rekom_laporan";
				echo Modules::run('template/new_admin_template', $data);
			} else if ($id_user && $status==2){
				
				$data['namamodule'] = "surat_rekom_laporan";
				$data['namafileview'] = "surat_rekom_laporan";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function show_data() {
		$columns22 = array(
            0 => 'nomor',
            1 => 'tanggal',
            2 => 'tglmulai',
            3 => 'tglakhir'
		);

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

		$limit 		= "";
		$where_dd 	= "";
		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		} else {
			$where_dd = "";
		}
			$querrr = "SELECT 
			*
			FROM pembuatan_laporan
			$where_dd 
			order by id_pembuatan DESC 
			$limit";

			$bolvia = "SELECT count(*) as total 
			FROM pembuatan_laporan
			$where_dd";

			$rt = "SELECT count(*) as total 
			FROM pembuatan_laporan";

		$tampil_data_pengajuan= $this->M_surat_rekom_laporan->select($querrr);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
		            '<a href="#myModal2" role="button" onClick=edit1234("'.$row->id_pembuatan.'") data-toggle="modal"  class="btn btn-primary">Edit</a>
		            <a href="#hapus'.$no.'" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a>',
		            '<a href="'.base_url().'index.php/pdf7/cetakan05/'.$row->id_pembuatan.'"  target="_blank" class="btn btn-warning">Print</a> '.
		            '<!--<a href="'.base_url().'index.php/surat_rekom_laporan/cetakan05v2/'.$row->id_pembuatan.'"  target="_blank" class="btn bg-orange">Print (BANK)</a>-->',
		            $row->nomor,
		            $row->tanggal,
		            $row->tglmulai.' - '.$row->tglakhir.
		            '<div id="hapus'.$no.'" class="modal fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger-700">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 id="myModalLabel1">Hapus Data</h3>
                                </div>
                                <form action="'.site_url('surat_rekom_laporan/hapus_data_surat/').'" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_pembuatan" value="'.$row->id_pembuatan.'">
                                        <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger">'.$row->id_pembuatan.'</code> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn bg-danger-800" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>'
                )
            );
        }

        $resFilterLength 	= $this->M_surat_rekom_laporan->select_row($bolvia);
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_surat_rekom_laporan->select_row($rt);
        $recordsTotal 		= $resTotalLength->total;

        $r = array(
            "draw"            => isset ( $request['draw'] ) ?
                                    intval( $request['draw'] ) :
                                    0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
	}

	function edit_show() {
		$id = $this->input->post('id');

		$querys = "SELECT * FROM pembuatan_laporan where id_pembuatan='".$id."'";
		$data = $this->M_surat_rekom_laporan->select_row($querys);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function filtermasa(){
		$this->session->set_userdata('id', $this->input->post('id'));
		$idxxxx=$this->input->post('id');

		$data['id'] =  $this->input->post('id');

		$data['tampil_data_personal'] = $this->M_surat_rekom_laporan->tampil_data_personalcari($idxxxx);
		$data['tampil_data_tki'] = $this->M_surat_rekom_laporan->tampil_data_tki();
		$data['tampil_data_namadisnaker'] = $this->M_surat_rekom_laporan->tampil_data_namadisnaker();
		$data['tampil_data_namaasuransi'] = $this->M_surat_rekom_laporan->tampil_data_namaasuransi();

		$data['namamodule'] = "surat_rekom_laporan";
		$data['namafileview'] = "surat_rekom_laporan";
		echo Modules::run('template/admin_template', $data);
	}


	function detaillaporan($idlaporan){
		$data['tampil_data_detail'] = $this->M_surat_rekom_laporan->tampil_data_detail($idlaporan);
		
		$data['tampil_data_ff'] = $this->M_surat_rekom_laporan->tampil_data_ff();
		$data['tampil_data_fi'] = $this->M_surat_rekom_laporan->tampil_data_fi();
		$data['tampil_data_mf'] = $this->M_surat_rekom_laporan->tampil_data_mf();
		$data['tampil_data_mi'] = $this->M_surat_rekom_laporan->tampil_data_mi();
		$data['tampil_data_jp'] = $this->M_surat_rekom_laporan->tampil_data_jp();

		$data['id_pembuatan'] = $idlaporan;
		$data['namamodule'] = "surat_rekom_laporan";
		$data['namafileview'] = "detaillaporan";
		echo Modules::run('template/admin_template', $data);
	}

	function simpan_data_laporan($idagen){
		$this->M_surat_rekom_laporan->simpan_data_ctki();
		redirect('surat_rekom_laporan/detaillaporan/'.$idagen);
	}

	function update_laporan($idagen) {
		$this->M_surat_rekom_laporan->update_ctki();
		redirect('surat_rekom_laporan/detaillaporan/'.$idagen);
	}

	function hapus_laporan($idagen) {
		$this->M_surat_rekom_laporan->hapus_ctki();
		redirect('surat_rekom_laporan/detaillaporan/'.$idagen);
	}
	
	function simpan_data_surat(){
		$this->M_surat_rekom_laporan->simpan_data_surat();

		redirect('surat_rekom_laporan/');
	}

	function edit_surat() {
			$this->M_surat_rekom_laporan->edit_surat();
			redirect('surat_rekom_laporan/');
	}

	function hapus_data_surat() {
		$this->M_surat_rekom_laporan->hapus_data_surat();
		redirect('surat_rekom_laporan/');
	}

	function cetakan05v2($idlaporan) {
		require_once 'assets/phpword/PHPWord.php';

		$ambiltglmulai = $this->M_session->select_row("SELECT tglmulai FROM pembuatan_laporan WHERE id_pembuatan='$idlaporan'")->tglmulai;
		$ambiltglakhir = $this->M_session->select_row("SELECT tglakhir FROM pembuatan_laporan WHERE id_pembuatan='$idlaporan'")->tglakhir;
/*
		$originalDate3 =str_replace('.','-',$ambiltglmulai);
		$newDate3 = date("d-m-Y", strtotime($originalDate3));
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    	$tahuna = substr($newDate3, 0, 2);               
    	$bulana = substr($newDate3, 3, 2);
    	$tgla   = substr($newDate3, 6, 4);

		$tglla = str_replace('.','-',$ambiltanggallaporan);
		$tgllapors = date("d-m-Y", strtotime($tglla));*/

		$PHPWord = new PHPWord();

		$document = $PHPWord->loadTemplate('files/an2.docx');
/*
		$document->setValue('Nomor',$ambilnomorlaporan);
		$document->setValue('Tanggal',$tgllapors);
		$document->setValue('Bulan',$BulanIndo[(int)$bulana-1]);
		$document->setValue('Tahun',$tgla);*/

		$tampil_data = $this->M_session->select("
				SELECT 
				disnaker.id_biodata,
				disnaker.jeniskelamin,
				disnaker.tempatlahir,
				disnaker.tanggallahir,
				visa.novisa,
				visa.tanggalterbang,
				paspor.nopaspor as paspornya,
		        dataagen.nama as namaagennya,
		        personal.nama as namatkinya,
		        disnaker.alamat as alamattkinya,
		        datamajikan.nama as formalmajikan,
		        datamajikan.alamat as formalalamat,
		        majikan.namamajikan as informalmajikan,
		        majikan.alamatmajikan as informalalamat,
		        signingbank.nama_bank as nama_bank,
				concat(datakreditbank.namakredit,' ',datakreditbank.isikredit,' ',datakreditbank.nilaikredit) as jeniskredit
		        FROM disnaker 
				LEFT JOIN visa
				ON disnaker.id_biodata=visa.id_biodata 
				LEFT JOIN paspor
				ON paspor.id_biodata=disnaker.id_biodata
				LEFT JOIN majikan
				ON majikan.id_biodata=disnaker.id_biodata
				LEFT JOIN dataagen
				ON majikan.kode_agen=dataagen.id_agen
				LEFT JOIN datamajikan
				ON majikan.kode_majikan=datamajikan.id_majikan
				LEFT JOIN personal
				ON disnaker.id_biodata=personal.id_biodata
				LEFT JOIN signingbank 
				ON signingbank.id_biodata=personal.id_biodata
				LEFT JOIN datakreditbank
				ON signingbank.idkredit=datakreditbank.id_kreditbank
				WHERE visa.tanggalterbang!=''
				AND visa.tanggalterbang between '$ambiltglmulai' 
				AND '$ambiltglakhir'
				AND paspor.keterangan='sudah' 
				ORDER BY visa.tanggalterbang ASC
			");

		$document->cloneRow('Formal', count($tampil_data) );

		$no=1;
		foreach( $tampil_data as $row ) {
			$document->setValue('No#'.$no, $no);
			$document->setValue('Nama#'.$no, $row->namatkinya);
			$document->setValue('Alamat#'.$no, $row->alamattkinya);
			$stts = substr($row->id_biodata, 0, 2);
			if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男')
			{
				$document->setValue('jk#'.$no,'L');
			}
			if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女')
			{
				$document->setValue('jk#'.$no,'P');
			}
			$document->setValue('Tempat#'.$no, $row->tempatlahir);
			$document->setValue('tgllahir#'.$no, $row->tanggallahir);
			if($stts == 'FI' ||$stts == 'MI')
			{ 
				$document->setValue('Informal#'.$no,'INFORMAL');
				$document->setValue('Formal#'.$no,'');
			}
			else
			{
				$document->setValue('Formal#'.$no,'FORMAL');
				$document->setValue('Informal#'.$no,'');
			}
			$document->setValue('nopaspor#'.$no, $row->paspornya);
			$document->setValue('novisa#'.$no, $row->novisa);
			$document->setValue('namaagen#'.$no, $row->namaagennya);
			$document->setValue('tglberangkat#'.$no, $row->tanggalterbang);
			$document->setValue('namabank#'.$no, $row->nama_bank);
			$document->setValue('jeniskredit#'.$no, $row->jeniskredit);
			$no++;
		}

		$filename = date('Y-m-d_H:i:s') . ' LAPORAN AN05 V2.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $filename . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
    
		flush();
		readfile(FCPATH.$isinya);
		unlink(FCPATH.$isinya);
		exit;
	}

	function print_v2() {

		$tglmulai	= $this->input->post('tglmulai');
		$tglakhir	= $this->input->post('tglakhir');

		$idagen	= $this->input->post('id_agen');
		if ($idagen == 'x_semua_agen') {
			exit('error 1');
		}

        $sql = "SELECT disnaker.id_biodata,disnaker.jeniskelamin,disnaker.tempatlahir,disnaker.tanggallahir,visa.novisa,visa.tanggalterbang
	        ,paspor.nopaspor as paspornya
	        ,dataagen.nama as namaagennya
	        ,disnaker.nama as namatkinya
	        ,personal.nama_mandarin as namamandarintkinya
	        ,disnaker.alamat as alamattkinya
	        ,datamajikan.nama as formalmajikan
	        ,datamajikan.namamajikan as formalmandarinmajikan
	        ,datamajikan.alamat as formalalamat
	        ,datamajikan.hp as hpformal
	        ,majikan.namamajikan as informalmajikan
	        ,majikan.namataiwan as informalmandarinmajikan
	        ,majikan.alamatmajikan as informalalamat
	        ,DATE_ADD(paspor.tglterbit, INTERVAL 5 YEAR) as expired
	        ,majikan.alamatmajikan as informalalamat
	        ,datasuhan.no_suhan as nosuhan
         	,datavisapermit.no_visapermit as novisapermit
         	,majikan.id_suhan as id_suhan
         	,majikan.id_visapermit as id_visapermit
         	,majikan.notelpmajikan as hpinformal
         	,datakreditbank.namakredit as namakredit
         	,datakreditbank.isikredit as isikredit
         	,datakreditbank.nilaikredit as nilaikredit
          	,personal.negara1 as negara1
           	,personal.negara2 as negara2
            ,personal.calling as calling
            ,personal.skill1 as skill1
            ,personal.skill2 as skill2
            ,personal.skill3 as skill3,
		    signingbank.nama_bank as nama_bank
         	FROM disnaker 
			LEFT JOIN visa
			ON disnaker.id_biodata=visa.id_biodata 
			LEFT JOIN paspor
			ON paspor.id_biodata=disnaker.id_biodata
			LEFT JOIN majikan
			ON majikan.id_biodata=disnaker.id_biodata
			LEFT JOIN signingbank
			ON signingbank.id_biodata=disnaker.id_biodata
			LEFT JOIN datakreditbank
			ON signingbank.idkredit=datakreditbank.id_kreditbank
			LEFT JOIN dataagen
			ON majikan.kode_agen=dataagen.id_agen
			LEFT JOIN datamajikan
			ON majikan.kode_majikan=datamajikan.id_majikan
			LEFT JOIN datasuhan
			ON majikan.kode_suhan=datasuhan.id_suhan
			LEFT JOIN datavisapermit
			ON majikan.kode_visapermit=datavisapermit.id_visapermit
			LEFT JOIN personal
			ON disnaker.id_biodata=personal.id_biodata
			WHERE visa.tanggalterbang!=''
			AND visa.tanggalterbang between '$tglmulai' and '$tglakhir'
			AND paspor.keterangan='sudah' 
			AND dataagen.id_agen='$idagen'
			ORDER BY visa.tanggalterbang ASC";
        $tampidatanyaagen = $this->M_session->select($sql);

		$hitungdatanyaagen = count( $tampidatanyaagen );

		$namanyaagen2 = $this->M_session->select_row("SELECT * FROM dataagen where id_agen='$idagen'");

		$namanyaagen = "";
		if ( $namanyaagen2 != NULL ) {
			$namanyaagen = $namanyaagen2->nama;
		}

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord = new PHPWord();

		$document = $PHPWord->loadTemplate('files/laporan_3.docx');

		$document->setValue('value1',$namanyaagen);
		$document->setValue('value2',$tglmulai);
		$document->setValue('value3',$tglakhir);


		$document->cloneRow('value4',$hitungdatanyaagen);

		$no=1;
		foreach ($tampidatanyaagen as $row) {
			$document->setValue('value4#'.$no,$no);
			$document->setValue('value6#'.$no, $row->id_biodata."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3);
			$document->setValue('value7#'.$no, $row->namatkinya);
			$document->setValue('valuea7#'.$no, $row->namamandarintkinya);
			$stts = substr($row->id_biodata, 0, 2);

			$document->setValue('value8#'.$no, $row->paspornya);
			$document->setValue('value9#'.$no, $row->expired);

			if ($stts == 'FI' ||$stts == 'MI') { 
				$document->setValue('value10#'.$no, $row->id_suhan);
				$document->setValue('value11#'.$no, $row->id_visapermit);
				$document->setValue('value12#'.$no,$row->informalmajikan);
				$document->setValue('valuea12#'.$no,$row->informalmandarinmajikan);
				$document->setValue('value13#'.$no,$row->informalalamat);
				$document->setValue('value14#'.$no,$row->hpinformal);
			} else {
				$document->setValue('value10#'.$no, $row->nosuhan);
				$document->setValue('value11#'.$no, $row->novisapermit);
				$document->setValue('value12#'.$no,$row->formalmajikan);
				$document->setValue('valuea12#'.$no,$row->formalmandarinmajikan);
				$document->setValue('value13#'.$no,$row->formalalamat);
				$document->setValue('value14#'.$no,$row->hpformal);
			}
			$document->setValue('value5#'.$no, $row->tanggalterbang);

			$document->setValue('value15#'.$no,$row->namakredit);
			$document->setValue('value16#'.$no,$row->isikredit);
			$document->setValue('value17#'.$no,$row->nilaikredit);

			$document->setValue('vbank#'.$no, $row->nama_bank);

		$no++;
		}

		$filename = date('Y-m-d_H:i:s') .' Laporan AN05 - '. $namanyaagen .'.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $filename . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
    
		flush();
		readfile(FCPATH.$isinya);
		unlink(FCPATH.$isinya); 
		exit;
	}

	function print_bankv1() {
		require_once 'assets/phpword/PHPWord.php';

		$bank 		= $this->input->post('bank');
		$tglmulai	= $this->input->post('tglmulai');
		$tglakhir	= $this->input->post('tglakhir');

		$PHPWord 	= new PHPWord();

		$document 	= $PHPWord->loadTemplate('files/an3.docx');

		$tampil_data = $this->M_session->select("
				SELECT 
				disnaker.id_biodata,
				disnaker.jeniskelamin,
				disnaker.tempatlahir,
				disnaker.tanggallahir,
				visa.novisa,
				visa.tanggalterbang,
				paspor.nopaspor as paspornya,
		        dataagen.nama as namaagennya,
		        personal.nama as namatkinya,
		        disnaker.alamat as alamattkinya,
		        datamajikan.nama as formalmajikan,
		        datamajikan.alamat as formalalamat,
		        majikan.namamajikan as informalmajikan,
		        majikan.alamatmajikan as informalalamat,
		        signingbank.nama_bank as nama_bank,
				concat(datakreditbank.namakredit,' ',datakreditbank.isikredit,' ',datakreditbank.nilaikredit) as jeniskredit
		        FROM disnaker 
				LEFT JOIN visa
				ON disnaker.id_biodata=visa.id_biodata 
				LEFT JOIN paspor
				ON paspor.id_biodata=disnaker.id_biodata
				LEFT JOIN majikan
				ON majikan.id_biodata=disnaker.id_biodata
				LEFT JOIN dataagen
				ON majikan.kode_agen=dataagen.id_agen
				LEFT JOIN datamajikan
				ON majikan.kode_majikan=datamajikan.id_majikan
				LEFT JOIN personal
				ON disnaker.id_biodata=personal.id_biodata
				LEFT JOIN signingbank 
				ON signingbank.id_biodata=personal.id_biodata
				LEFT JOIN datakreditbank
				ON signingbank.idkredit=datakreditbank.id_kreditbank
				LEFT JOIN databank 
				ON signingbank.nama_bank=databank.isi
				WHERE visa.tanggalterbang!=''
				AND visa.tanggalterbang between '$tglmulai' 
				AND '$tglakhir'
				AND paspor.keterangan='sudah' 
				AND databank.id_bank = '$bank'
				ORDER BY visa.tanggalterbang ASC
			");

		$document->cloneRow('Formal', count($tampil_data) );/*
		echo '<pre>';
		print_r($tampil_data);
		echo count($tampil_data);*/

		$ambil_bank = $this->M_session->select_row(" SELECT * FROM databank WHERE id_bank='$bank' ");
		$a_nama = "";
		if ($ambil_bank != NULL) {
			$a_nama = $ambil_bank->isi;
		}

		$no=1;
		foreach( $tampil_data as $row ) {

			$document->setValue('No#'.$no, $no);
			$document->setValue('id#'.$no, $row->id_biodata);
			$document->setValue('Nama#'.$no, $row->namatkinya);

			$stts = substr($row->id_biodata, 0, 2);
			if($row->jeniskelamin=='Laki-Laki' ||$row->jeniskelamin=='Pria' ||$row->jeniskelamin=='pria'  ||$row->jeniskelamin=='男')
			{
				$document->setValue('jk#'.$no,'L');
			}
			if($row->jeniskelamin=='Perempuan' ||$row->jeniskelamin=='Wanita' ||$row->jeniskelamin=='perempuan' ||$row->jeniskelamin=='wanita' ||$row->jeniskelamin=='女')
			{
				$document->setValue('jk#'.$no,'P');
			}

			$document->setValue('Tempat#'.$no, $row->tempatlahir);
			$document->setValue('tgllahir#'.$no, $row->tanggallahir);

			if($stts == 'FI' ||$stts == 'MI')
			{ 
				$document->setValue('Informal#'.$no,'INFORMAL');
				$document->setValue('Formal#'.$no,'');
			}
			else
			{
				$document->setValue('Informal#'.$no,'');
				$document->setValue('Formal#'.$no,'FORMAL');
			}
			$document->setValue('nopaspor#'.$no, $row->paspornya);
			$document->setValue('novisa#'.$no, $row->novisa);

			if ($stts == 'FI' ||$stts == 'MI')
			{ 
				$document->setValue('namamajikan#'.$no,$row->informalmajikan);
				$document->setValue('alamatmajikan#'.$no,$row->informalalamat);
			} 
			else 
			{
				$document->setValue('namamajikan#'.$no,$row->formalmajikan);
				$document->setValue('alamatmajikan#'.$no,$row->formalalamat);
			}

			$document->setValue('namaagen#'.$no, $row->namaagennya);
			$document->setValue('tglberangkat#'.$no, $row->tanggalterbang);
			$document->setValue('namabank#'.$no, $row->nama_bank);
			$document->setValue('jeniskredit#'.$no, $row->jeniskredit);
			$no++;
		}

		$document->setValue('t_tglterbang', $tglmulai.' - '.$tglakhir );
		$document->setValue('t_nmbank', $a_nama);

		$filename = date('Y-m-d_H-i-s') . ' LAPORAN KREDIT BANK '.$a_nama.'.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $filename . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
    
		flush();
		readfile(FCPATH.$isinya);
		unlink(FCPATH.$isinya);
		exit;
	}
        
}