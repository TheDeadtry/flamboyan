<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Formulir_blk extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_formulir_blk');			
	}
	
	function index(){
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
			if ($id_user && $status==1){
			//user sudah login
				$data['namamodule'] = "formulir_blk";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_formulir'] = $this->M_session->select("SELECT *,blk_formulir.id_formulir as idnyabuat FROM blk_formulir order by id_formulir DESC ");
				//$data['tampil_data_tki'] = $this->M_formulir_blk->tampil_data_tki();
				
				$data['namamodule'] = "formulir_blk";
				$data['namafileview'] = "formulir_blk";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}
	
//============================================== surat_formulir =======================================================//

	function simpan_data_formulir_blk()
	{
        $ambil_data_sebelumnya = $this->M_session->select_row("SELECT * FROM blk_formulir where tipe='".$this->input->post('tipe')."' order by resi_no DESC");

        $resi_no = $ambil_data_sebelumnya->resi_no + 1;
        $data = array
        (
            'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'tgl_ujk' => $this->input->post('tgl_ujk'),
            'tipe' => $this->input->post('tipe'),
            'resi_no' => $resi_no
        );
		
        $this->db->insert('blk_formulir',$data);

		redirect('formulir_blk');
	}

	function update_data_formulir_blk() {
		$this->M_formulir_blk->update_data_formulir_blk();
		redirect('formulir_blk');
	}

	function hapus_data_formulir_blk() {
		$this->M_formulir_blk->hapus_data_formulir_blk();
		redirect('formulir_blk');
	}
	
//============================================== detail surat_formulir =======================================================//
	
	function detail_formulir_blk($idformulir) {
		$data['id_formulir'] = $idformulir;
		$data['tampil_data_detail'] = $this->M_formulir_blk->tampil_data_detail($idformulir);
		
		$data['tampil_data_ff'] = $this->M_formulir_blk->tampil_data_ff();
		$data['tampil_data_fi'] = $this->M_formulir_blk->tampil_data_fi();
		$data['tampil_data_mf'] = $this->M_formulir_blk->tampil_data_mf();
		$data['tampil_data_mi'] = $this->M_formulir_blk->tampil_data_mi();
		$data['tampil_data_jp'] = $this->M_formulir_blk->tampil_data_jp();
		$data['tampil_data_all'] = $this->M_formulir_blk->tampil_data_all();
		$data['tampil_data_jenisujian'] = $this->M_formulir_blk->tampil_data_jenisujian();
		$data['tampil_data_formulir'] = $this->M_session->select_row("SELECT *,blk_formulir.id_formulir as idnyabuat FROM blk_formulir WHERE id_formulir='$idformulir' order by id_formulir DESC ");
		$data['tampil_data_lsp'] = $this->M_formulir_blk->tampil_data_lsp();
		$data['tampil_data_pemilik'] = $this->M_formulir_blk->tampil_data_pemilik();
		$data['tampil_data_negara'] = $this->M_formulir_blk->tampil_data_negara();

		$data['tampil_data_bahasa_tki'] = $this->M_formulir_blk->tampil_data_bahasa_tki();
		$data['tampil_data_cluster_tki'] = $this->M_formulir_blk->tampil_data_cluster_tki();

		$data['tampil_data_pengajuanujk'] = $this->M_formulir_blk->tampil_data_pengajuanujk($idformulir);
		$data['hitung_data_pengajuanujk'] = $this->M_formulir_blk->hitung_data_pengajuanujk($idformulir);
		
		$data['tampil_data_detailnya'] = $this->M_formulir_blk->tampil_data_detailnya($idformulir);

		$data['hitung_data_bayarujk'] = $this->M_formulir_blk->hitung_data_bayarujk($idformulir);
		$data['tampil_data_bayarujk'] = $this->M_formulir_blk->tampil_data_bayarujk($idformulir);

		$data['tampil_data_invoiceujk'] = $this->M_formulir_blk->tampil_data_invoiceujk($idformulir);
		$data['hitung_data_invoiceujk'] = $this->M_formulir_blk->hitung_data_invoiceujk($idformulir);

		$now_bln = date('n');
		$now_thn = date('Y');
		$bulan_rom_array = array (
			1 	=> 'I',
			2 	=> 'II',
			3 	=> 'III',
			4	=> 'IV',
			5	=> 'V',
			6	=> 'VI',
			7	=> 'VII',
			8	=> 'VIII',
			9	=> 'IX',
			10	=> 'X',
			11	=> 'XI',
			12	=> 'XII'

		);
		$res_bulan = $bulan_rom_array[$now_bln];
		$res_tahun = $now_thn;
		$ambil_noresi = $this->M_session->select_row("SELECT resi_no FROM blk_formulir WHERE id_formulir='$idformulir'");
		if ($ambil_noresi != NULL) {
			$data['dew_no_resi'] 	= $ambil_noresi->resi_no.'/'.$res_bulan.'/'.$res_tahun;
		}
			
			
		$data['namamodule'] = "formulir_blk";
		$data['namafileview'] = "detail_formulir_blk";
		echo Modules::run('template/blk_template', $data); 
	}
	
	function simpan_detail_formulir_blk($idagen){
		$this->M_formulir_blk->simpan_data_ctki();
		redirect('formulir_blk/detail_formulir_blk/'.$idagen);
	}
	function update_detail_formulir_blk($idagen) {
		$this->M_formulir_blk->update_ctki();
		redirect('formulir_blk/detail_formulir_blk/'.$idagen);
	}
		function update_detail_formulir_blk_bahasa($idagen) {
		$this->M_formulir_blk->update_ctki_bahasa();
		redirect('formulir_blk/detail_formulir_blk/'.$idagen);
	}
			function update_detail_formulir_blk_nilai($idagen) {
		$this->M_formulir_blk->update_ctki_nilai($idagen);
		redirect('formulir_blk/detail_formulir_blk/'.$idagen);
	}

	function hapus_detail_formulir_blk($idagen) {
		$this->M_formulir_blk->hapus_ctki();
		redirect('formulir_blk/detail_formulir_blk/'.$idagen);
	}
	
	//============================================== detail pengajuanujk ==================================================//

	function simpan_detailpengajuanujk($id_formulir){
		$cek_data = $this->M_session->select_row("SELECT * FROM blk_pengajuan_ujk WHERE id_formulirnya='$idformulir'");
		if ($cek_data->id_laporan_bulanan == NULL) {
			$this->M_formulir_blk->simpan_data_pengajuanujk($id_formulir);
		}
		redirect('formulir_blk/detail_formulir_blk/'.$id_formulir);
	}

	function ubah_detailpengajuanujk($id_formulir){
		$this->M_formulir_blk->ubah_detailpengajuanujk($id_formulir);
		redirect('formulir_blk/detail_formulir_blk/'.$id_formulir);
	}
	
	//============================================== detail invoiceujk ==================================================//

	//============================================== detail invoice_reftuk ==================================================//

	function simpan_detailinvoice_reftuk($id_formulir){
		$this->M_formulir_blk->simpan_data_invoice_reftuk($id_formulir);
		redirect('formulir_blk/detail_formulir_blk/'.$id_formulir);
	}

	function ubah_detailinvoice_reftuk($id_formulir){
		$this->M_formulir_blk->ubah_detailinvoice_reftuk($id_formulir);
		redirect('formulir_blk/detail_formulir_blk/'.$id_formulir);
	}
	
	//============================================== detail invoice_formulir ==================================================//

	function simpan_detailinvoice_formulir($id_formulir){
		$this->M_formulir_blk->simpan_data_invoice_formulir($id_formulir);
		redirect('formulir_blk/detail_formulir_blk/'.$id_formulir);
	}

	function ubah_detailinvoice_formulir($id_formulir){
		$this->M_formulir_blk->ubah_detailinvoice_formulir($id_formulir);
		redirect('formulir_blk/detail_formulir_blk/'.$id_formulir);
	}

	function blk_cetak_raport($id_formulir) {

		$negara				= $this->input->post('negara');
		$cluster			= $this->input->post('cluster');
		$tampil_data_raport	= $this->M_formulir_blk->tampil_data_raport($id_formulir, $negara, $cluster);
		$hitung_data_raport	= $this->M_formulir_blk->hitung_data_raport($id_formulir, $negara, $cluster);

		$ambil_tipe 		= $this->M_session->select_row(" SELECT * FROM blk_formulir WHERE id_formulir='$id_formulir' ");
		
		require_once 'assets/phpword/PHPWord.php';

		$PHPWord = new PHPWord();

		if ( $ambil_tipe->tipe == 'BLK-LN' ) 
		{
			$document = $PHPWord->loadTemplate('files/raportujkbaru.docx');
		}
		elseif ( $ambil_tipe->tipe == 'LPKS' ) 
		{
			$document = $PHPWord->loadTemplate('files/lpkskib_raportujkbaru.docx');
		}
		else
		{
			exit('ERROR-4005');
		}
		
		$document->setValue('value1',$negara);
		$document->setValue('value2',$cluster);
		
		$document->cloneRow('valuea',$hitung_data_raport);
		$no=1;
		foreach($tampil_data_raport->result() as $row) {
			$zyxpilsek = substr($row->all_nodaftar, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname = $row->personal_nama;
			} else {
				$asliname = $row->hk_nama;
			}

			$document->setValue('valuea#'.$no,$no);
			$document->setValue('value3#'.$no, $asliname);
		$no++;
		}    
			$document->cloneRow('valueaa',$hitung_data_raport);
		$noa=1;
		foreach($tampil_data_raport->result() as $row) {
			$zyxpilsek = substr($row->all_nodaftar, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname = $row->personal_nama;
			} else {
				$asliname = $row->hk_nama;
			}
			
			$document->setValue('valueaa#'.$noa,$noa);
			$document->setValue('value3a#'.$noa, $asliname);
		$noa++;
		}  

				$document->cloneRow('valueab',$hitung_data_raport);
		$nob=1;
		foreach($tampil_data_raport->result() as $row) {
			$zyxpilsek = substr($row->all_nodaftar, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname = $row->personal_nama;
			} else {
				$asliname = $row->hk_nama;
			}
			
			$document->setValue('valueab#'.$nob,$nob);
			$document->setValue('value3b#'.$nob, $asliname);
		$nob++;
		}  

				$document->cloneRow('valueac',$hitung_data_raport);
		$noc=1;
		foreach($tampil_data_raport->result() as $row) {
			$zyxpilsek = substr($row->all_nodaftar, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname = $row->personal_nama;
			} else {
				$asliname = $row->hk_nama;
			}
			
			$document->setValue('valueac#'.$noc,$noc);
			$document->setValue('value3c#'.$noc, $asliname);
		$noc++;
		}  
		//	$document->cloneRow('nomor',$hitung_data_ctkinya_pengajuan_ujk);
		//	$no=1; 
		//	foreach($tampil_data_ctkinya_pengajuan_ujk->result() as $rows) {
		//	$document->setValue('nomor#'.$no,$no);
		//	$document->setValue('value8#'.$no, $rows->iddisnaker);
		//	$document->setValue('value9#'.$no, $rows->nodaftar);
		//	$document->setValue('value10#'.$no, $rows->namaperblk);
		//	$document->setValue('value11#'.$no, $rows->negaranya);
			
		//$no++;
		//} 
	 
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

function blk_cetak_sertifikat($id_detail_formulir) {

	$tampil_data_sertifikat	= $this->M_formulir_blk->tampil_data_sertifikat($id_detail_formulir);
	
	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$ambil_tipe = $this->M_session->select_row(" SELECT a.tipe FROM blk_formulir a JOIN blk_detail_formulir b ON a.id_formulir=b.id_formulir WHERE b.id_detail_formulir='$id_detail_formulir' ");
	if ( $ambil_tipe->tipe == 'BLK-LN' ) 
	{
		$document = $PHPWord->loadTemplate('files/sertifikatujk.docx');
	}
	elseif ( $ambil_tipe->tipe == 'LPKS' ) 
	{
		$document = $PHPWord->loadTemplate('files/lpkskib_sertifikatujk.docx');
	}
	else
	{
		exit('ERROR-4005');
	}
	
	foreach($tampil_data_sertifikat->result() as $row) {
        $ubah_tipe = substr($row->nodaftar, 0, 2);
        if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
			$personal 		= $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$row->nodaftar."'");
			$tanggal 		= $personal->tgllahir;
			$originalDate	= str_replace('.','-',$tanggal);
			$tanggallahir	= date("d-m-Y", strtotime($originalDate));
			$tempatlahir    = $personal->tempatlahir;
        } else {
			$tanggal 		= $row->tanggallahir;
			$originalDate	= str_replace('.','-',$tanggal);
			$tanggallahir	= date("d-m-Y", strtotime($originalDate));
			$tempatlahir    = $row->tempatlahir;
        }
	
	$tanggal2 		= $row->adm_tglreg;
	$originalDate2	= str_replace('.','-',$tanggal2);
	$tanggalmasuk	= date("d-m-Y", strtotime($originalDate2));
	
	$tanggal3 		= $row->tgl_keluar;
	$originalDate3	= str_replace('.','-',$tanggal3);
	$tanggalkeluar	= date("d-m-Y", strtotime($originalDate3));
	
	$document->setValue('value1',$row->noserlok);
	$document->setValue('value2',$row->nama_per);
	$document->setValue('value3',$tempatlahir);
	$document->setValue('value4',$tanggallahir);
	$document->setValue('value5',$tanggalmasuk);
	$document->setValue('value6',$tanggalkeluar);
	$document->setValue('value7',$tanggalkeluar);
	$document->setValue('lulus',$row->statujk);
	
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

	function blk_cetak_semua($idformulir) {

	$ambil_data_detailnya = $this->M_formulir_blk->ambil_data_detailnya($idformulir);
	$hitung_data_detailnya = $this->M_formulir_blk->hitung_data_detailnya($idformulir);
	$ambil_no_pengajuan = $this->M_formulir_blk->ambil_no_pengajuan($idformulir);

	$ambil_tipe_judul = $this->M_session->select_row(" SELECT tipe FROM blk_formulir WHERE id_formulir='$idformulir' ");

	require_once 'assets/phpword/PHPWord.php';

	$PHPWord = new PHPWord();

	$document = $PHPWord->loadTemplate('files/printsemuaujk.docx');

$document->setValue('value15', $ambil_no_pengajuan);

	$document->cloneRow('value2',$hitung_data_detailnya);
	$no=1;
	foreach($ambil_data_detailnya->result() as $row) {
		
		$ph = substr($row->pinhou, 0, 2);

		if ($ph == 'FI' || $ph == 'MI' || $ph == 'FF' || $ph == 'MF' || $ph == 'JP') {
			$document->setValue('value1#'.$no,$no);
			$document->setValue('value2#'.$no, $row->prs_nodisnaker);
			$document->setValue('value3#'.$no, $row->prs_nama);
			$document->setValue('value4#'.$no, $row->prs_tempatlahir.','.$row->prs_tanggallahir);

			$document->setValue('value6#'.$no, $row->prs_alamat);
			$document->setValue('value7#'.$no, $row->prs_pendidikan);

			$document->setValue('value9#'.$no, $row->prs_nopaspor);
			$document->setValue('value10#'.$no, $row->prs_negara);
		} else {
			$document->setValue('value1#'.$no,$no);
			$document->setValue('value2#'.$no, $row->blk_nodisnaker);
			$document->setValue('value3#'.$no, $row->blk_nama);
			$document->setValue('value4#'.$no, $row->blk_tempatlahir.','.$row->blk_tanggallahir);

			$document->setValue('value6#'.$no, $row->blk_alamat);
			$document->setValue('value7#'.$no, $row->blk_pendidikan);

			$document->setValue('value9#'.$no, $row->blk_nopaspor);
			$document->setValue('value10#'.$no, $row->blk_negara);
		}

		$document->setValue('value5#'.$no, $row->eksnon);
		$document->setValue('value8#'.$no, $row->for_noserlok);
		$document->setValue('value11#'.$no, $row->bahasa);
		$document->setValue('value12#'.$no, $row->for_ket);
		$document->setValue('value13#'.$no, $row->adm_tglreg);
		$document->setValue('value14#'.$no, $row->blk_tgl_keluar);
	$no++;
	}    

	if ( $ambil_tipe_judul->tipe == 'BLK-LN' )
	{
		$nametipe = "PT FLAMBOYAN GEMAJASA (LAWANG)";
	}
	else
	{
		$nametipe = "LPKS KARYA INSANI BAROKAH";
	}

	$document->setValue('value99', $nametipe);

 
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

//============================================== detail pembayaranujk ke lsp ==================================================//

	function simpan_detailbayarujk($idformulir){
		$cek_data = $this->M_session->select_row("SELECT * FROM blk_bayar_ujk WHERE id_laporan_bulanan='$idformulir'");
		if ($cek_data->id_laporan_bulanan == NULL) {
			$this->M_formulir_blk->simpan_data_bayarujk($idformulir);
		}
		redirect('formulir_blk/detail_formulir_blk/'.$idformulir);
	}

	function ubah_detailbayarujk($idformulir){
		$this->M_formulir_blk->ubah_detailbayarujksampah($idformulir);
		redirect('formulir_blk/detail_formulir_blk/'.$idformulir);
	}
	
	// //============================================== detail invoiceujk ==================================================//

	function simpan_detailinvoiceujk($idformulir){
		$cek_data = $this->M_session->select_row("SELECT * FROM blk_invoice_ujk WHERE id_laporan_bulanan='$idformulir'");
		if ($cek_data->id_laporan_bulanan == NULL) {
			$this->M_formulir_blk->simpan_data_invoiceujk($idformulir);
		}
		redirect('formulir_blk/detail_formulir_blk/'.$idformulir);
	}

	function ubah_detailinvoiceujk($idformulir){
		$this->M_formulir_blk->ubah_detailinvoiceujk($idformulir);
		redirect('formulir_blk/detail_formulir_blk/'.$idformulir);
	}

	//===========================================================================//

	function printlulus($id)
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( "files/blk_ujk_print_status_lulus.docx" );
		
		$ambildata = $this->M_session->select("
			SELECT 
			blk_detail_formulir.*,
			personalblk.nama as nama_hk,
			personal.nama as nama_tw
			FROM blk_formulir
			join blk_detail_formulir on blk_formulir.id_formulir=blk_detail_formulir.id_formulir 
			LEFT JOIN personalblk 
			ON blk_detail_formulir.nodaftar=personalblk.nodaftar 
			LEFT JOIN personal 
			ON blk_detail_formulir.nodaftar=personal.id_biodata 
			where blk_formulir.id_formulir='$id'
			order by nodaftar ASC
		");

		$document->cloneRow('no', count($ambildata) );

		$nn=1;
		foreach ( $ambildata as $row )
		{
            $ubah_tipe = substr($row->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') 
            {
            	$nama = $row->nama_tw;
            } 
            else 
            {
            	$nama = $row->nama_hk;
            }

		    $document->setValue('no#'.$nn, $nn );
		    $document->setValue('id#'.$nn, $row->nodaftar.'<w:br/>'.$nama );
		    $document->setValue('serlok#'.$nn, $row->noserlok );
		    $document->setValue('stat#'.$nn, $row->statujk );

		$nn++;
		}

		$ambils = $this->M_session->select_row("
			SELECT 
			*
			FROM blk_formulir
			where blk_formulir.id_formulir='$id'
		");

		$document->setValue('tgl1', $ambils->tgl_pengajuan );
		$document->setValue('tgl2', $ambils->tgl_keluar );
		$document->setValue('tgl3', $ambils->tgl_ujk );
		
		$filename = 'LAPORAN KELULUSAN CTKW UJK.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya);
		exit;
	}
	



	function ubahdatakelulusan(){
		$nodaftar = $_POST['idtkwnya'];
		$id_detail_formulir = $_POST['idformulir'];
		$statujk = $_POST['datanya'];

		$query = $this->db->query("UPDATE blk_detail_formulir SET statujk = '$statujk' WHERE nodaftar = '$nodaftar' AND id_detail_formulir = '$id_detail_formulir' ");
		$query = $this->db->query("UPDATE personalblk SET statujk = '$statujk' WHERE nodaftar = '$nodaftar'");

	}




}