<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailisichongyi extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');
	}

	function index()
	{
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status'])
		{
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else
		{
			$id_user = $session['session_userid'];
			$status = $session['session_status'];
			$data['tampil_data'] = $this->M_session->select("SELECT * FROM isichongyi WHERE id_biodata='".$this->session->userdata("detailuser")."'");
			$data['tampil_data_personal'] = $this->M_session->select("SELECT * FROM personal WHERE id_biodata='".$this->session->userdata("detailuser")."'");
			$data['tampil_data_finger'] = $this->M_session->select_row("SELECT count(*) as total FROM tblattendance WHERE idblk='".$this->session->userdata("detailuser")."'");
            
			$data['detailpersonalid'] = $this->session->userdata("detailuser");
			$data['namamodule'] = "detailisichongyi";
			if ($id_user && $status==1)
			{
				$data['namafileview'] = "v";
				echo Modules::run('template/admin_template', $data);
			}
		}
	}

	function tambah(){
		$data = array(  
			'id_biodata' 	=> $this->input->post('idbiodata'),
			'kbm' 			=> $this->input->post('kbm'),
			'kbi' 			=> $this->input->post('kbi'),
			'lbbi' 			=> $this->input->post('lbbi'),
			'sbt' 			=> $this->input->post('sbt'),
			'hub' 			=> $this->input->post('hub'),
	   	);
	   	$this->M_session->insert($data,'isichongyi');
		redirect('detailisichongyi');
	}

	function ubah() {
		$id = $this->input->post('id');
		$data = array(  
			'id_biodata' 	=> $this->input->post('idbiodata'),
			'kbm' 			=> $this->input->post('kbm'),
			'kbi' 			=> $this->input->post('kbi'),
			'lbbi' 			=> $this->input->post('lbbi'),
			'sbt' 			=> $this->input->post('sbt'),
			'hub' 			=> $this->input->post('hub'),
	   	);
	   	$this->M_session->update($data,'isichongyi',$id,'id');
		redirect('detailisichongyi');
	}

	function printdata($id) {
		require_once 'assets/phpword/PHPWord.php';
        $PHPWord = new PHPWord();
        
        $filesloc = 'files/dewa/print_chongyi.docx';
        $document = $PHPWord->loadTemplate($filesloc);

        $dtpersonal = $this->M_session->getDataAllRow("*,DATE(tgllahir) AS lahir_tanggal", "personal", "id_biodata='".$id."'");
        
        $umur_sekarang = date("Y-m-d") - $dtpersonal->lahir_tanggal;
        $jk = '□男Pria 女Wanita';
        if ($personal->jeniskelamin == '男') {
            $jk = '男Pria 女Wanita';
        }

        $hasilfilenama = 'BiodataChongyi';//.$id.'-'.$nama.'-'.$thn.'-'.$bln.'-'.$tgl;
        
        $document->setValue('namamand', $dtpersonal->nama );
        $document->setValue('tempatlahir', $dtpersonal->tempatlahir );
        $document->setValue('umur', $umur_sekarang );
        $document->setValue('namaindo', $dtpersonal->nama_mandarin );
        $document->setValue('jk', $jk );
        

        $filename = 'ddd.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename= '.$hasilfilenama.'.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        
        flush();
        readfile($isinya);
        unlink($isinya);
        exit;
	}
}
