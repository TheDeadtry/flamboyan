<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class pdfpsv extends MX_Controller{

	public function __construct(){
            parent::__construct();
			$this->load->model('m_pdfpsv');
			$this->load->model('M_session');
			$this->load->library('Pdf');
	}

		function cetaklaporanagenpsv() {

		// $tglmulai	= $this->input->post('tglmulai');
		// $tglakhir	= $this->input->post('tglakhir');

		$idagen	= $this->input->post('id_agen');

			$tampildatanyaagen=$this->m_pdfpsv->tampildatanyaagenpsv($idagen);
			// $hitungdatanyaagen=$this->m_pdfpsv->hitungdatanyaagen($tglmulai,$tglakhir,$idagen);

			$namanyaagen=$this->m_pdfpsv->namanyaagen($idagen);
				// echo "".$idagen;
				// echo "".$tglmulai;
				// echo "".$tglakhir;

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord = new PHPWord();

		$document = $PHPWord->loadTemplate('files/pgmshvp.docx');

		$document->setValue('agen',$namanyaagen);

		// $document->cloneRow('value4',$hitungdatanyaagen);

		$no=1;

		foreach($tampildatanyaagen->result() as $row) {
		$document->setValue('no'.$no,$no);
		$document->setValue('valuemaj'.$no,$row->id_majikan);
		$document->setValue('nosu'.$no, $row->suhanno);
		$document->setValue('tglterbit'.$no, $row->suhantglterbit);
		// $stts = substr($row->id_biodata, 0, 2);

		$document->setValue('tglterima'.$no, $row->suhantglterima);
		$document->setValue('value_as'.$no, $row->statsuhan);

		// if($stts == 'FI' ||$stts == 'MI'){ 
		$document->setValue('novp'.$no, $row->vpno);
		$document->setValue('tglterbitvp'.$no, $row->vptglterbit);
		$document->setValue('exp'.$no,$row->vptglexp);
		$document->setValue('$idtki'.$no,$row->informalmandarinmajikan);
		$document->setValue('$nama'.$no,$row->informalalamat);
		$document->setValue('$tglkirim'.$no,$row->hpinformal);
		// }else{
		$document->setValue('$tglsmpn'.$no, $row->suhantglsimpan);
		$document->setValue('$namatitipan'.$no, $row->novisapermit);
		$document->setValue('$idbiotitipan'.$no,$row->formalmajikan);

		// $setelahterbang=$this->m_pdfpsv->setelahterbang($row->id_biodata);
		// $document->cloneRow('value18',3);
		// $nos=1;
		// foreach($setelahterbang->result() as $rows) {
		// $document->setValue('value18#'.$nos,$rows->tgl_setelah_terbang);
		// $document->setValue('value19#'.$nos,$rows->ket_setelah_terbang);
		// $nos++;
		// }

		$no++;
		}

		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

		// header('Content-Description: File Transfer');
		// header('Content-Type: application/octet-stream');
		// header('Content-Disposition: attachment; filename='.$isinya);
		// header('Content-Transfer-Encoding: binary');
		// header('Expires: 0');
		// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		// header('Pragma: public');
		// header('Content-Length: ' . filesize($isinya));

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