<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class cetak_laprekdisnaker extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');				
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_admin');
		}

		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];

		if ($id_user && $status==1){
			$id_user = $session['session_userid'];

			$data['namamodule'] = "cetak_laprekdisnaker";
			$data['namafileview'] = "v_cetak_laprekdisnaker";
			echo Modules::run('template/new_admin2_template', $data); 
		}	
		 
	}

	function cetaklap() {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord 		= new PHPWord();
		$document 		= $PHPWord->loadTemplate('files/laprekdisnaker_print.docx');

		$bulanujk 		= $this->input->post('bulandaftx');
		$tahunujk		= $this->input->post('tahuner');

		$piltgl			= $tahunujk.'.'.sprintf('%02d', $bulanujk); 

		$bulan_arr = array (
            1 => 'JANUARI',
            2 => 'FEBRUARI',
            3 => 'MARET',
            4 => 'APRIL',
            5 => 'MEI',
            6 => 'JUNI',
            7 => 'JULI',
            8 => 'AGUSTUS',
            9 => 'SEPTEMBER',
            10 => 'OKTOBER',
            11 => 'NOVEMER',
            12 => 'DESEMBER',
        );

		$headTitle 	= $bulan_arr[$bulanujk].' '.$tahunujk;

		$quww = 'SELECT 
				personal.id_biodata as id,
				personal.kode_sponsor as sponsor,
				personal.nama as nama1,
				disnaker.nama as nama2,
				disnaker.tglonline as tglonline
				FROM personal 
				JOIN disnaker 
				ON personal.id_biodata=disnaker.id_biodata 
				where tglonline is not null 
				and tglonline like "'.$piltgl.'%"';

		$zselectionz 	= $this->M_session->select($quww);

		$document->cloneRow('value2',count($zselectionz));
		$total_peserta = count($zselectionz);

		$nn=1;	
		foreach ($zselectionz as $value) {
		    $document->setValue('value1#'.$nn,$nn);
		    $document->setValue('value2#'.$nn,$value->id);
		    $document->setValue('value3#'.$nn,$value->sponsor);
		    $document->setValue('value4#'.$nn,$value->nama1);
		    $document->setValue('value5#'.$nn,$value->tglonline);
		    $document->setValue('value7#'.$nn,$value->nama2);
		$nn++;
		}
		$document->setValue('value6', $headTitle);
		
		$filename = 'ketadm.docx';

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

}