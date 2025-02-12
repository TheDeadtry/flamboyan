<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class cetak_ketadm extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_cetak_ketadm');			
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
				$id_user = $session['session_userid'];

				$data['namamodule'] = "cetak_ketadm";
				$data['namafileview'] = "v_cetak_ketadm";
				echo Modules::run('template/new_admin2_template', $data); 
			}		
		
		}
		 
	}

	function cetakketadm() {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord 		= new PHPWord();
		$document 		= $PHPWord->loadTemplate('files/ketadm_print.docx');

		$bulanujk 		= $this->input->post('bulandaftx');
		$pilcetak 		= $this->input->post('zdcetakk');
		$pilsektr 		= $this->input->post('pilsek');

		$bulanujk_f 	= explode(",", $bulanujk);
		$tahunujk		= date("Y");

		$piltgl			= $tahunujk.'.'.$bulanujk_f[0];

		$tanggal_keluar 	= $bulanujk_f[1].' '.$tahunujk;

		if ($pilsektr == 'all') {
			$wh_pilsek = "";
		} else {
			$wh_pilsek = "and id_biodata like '".$pilsektr."%'";
		}

		if ($pilcetak == 'bln') {
			$quww = 'SELECT * FROM personal where ketadm is not null '.$wh_pilsek.' and tanggaldaftar like "'.$piltgl.'%"';
			$ket_tgl = $tanggal_keluar;
		} elseif ($pilcetak == 'all') {
			$quww = 'SELECT * FROM personal where ketadm is not null '.$wh_pilsek;
			$ket_tgl = 'SEMUA';
		}

		$zselectionz 	= $this->M_cetak_ketadm->select($quww);

		$document->cloneRow('value2',count($zselectionz));
		$total_peserta = count($zselectionz);

		$nn=1;	
		foreach ($zselectionz as $value) {
		    $document->setValue('value1#'.$nn,$nn);
		    $document->setValue('value2#'.$nn,$value->id_biodata);
		    $document->setValue('value3#'.$nn,$value->kode_sponsor);
		    $document->setValue('value4#'.$nn,$value->nama);
		    $document->setValue('value5#'.$nn,$value->ketadm);
		$nn++;
		}
		$document->setValue('value6',$ket_tgl.' ('.$pilsektr.')');
		
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