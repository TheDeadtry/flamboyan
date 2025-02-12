<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_ttdt extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_kpapra');			
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
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kpapra->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kpapra'] = $this->M_upload_kpapra->tampil_data_kpapra($detailidnya);
				$data['hitungan'] = $this->M_upload_kpapra->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_kpapra->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_ttdt";
				$data['namafileview'] = "kpapraadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kpapra->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kpapra'] = $this->M_upload_kpapra->tampil_data_kpapra($detailidnya);
				$data['namamodule'] = "upload_ttdt";
				$data['namafileview'] = "kpapraadmin";
				echo Modules::run('template/kpapra_template', $data);
			}
		}	 
	}

	function simpan_data_kpapra(){
		$array = array(
			'id_biodata'=> $this->input->post('idbiodata'),
			'namadok'=> $this->input->post('namadok'),
			'penting'=>$this->input->post('penting'),
			'cekdokumen'=> $this->input->post('cekdokumen'),
			'tglterima'=> $this->input->post('tglterima'),
			'keterangan'=> $this->input->post('keterangan'),
		);

		$simpan = $this->db->query("
			INSERT 
			INTO
			upload_ttdt
			(pinho, namadok, penting, cekdokumen, tglterima, keterangan, tgl_input)
			VALUES
			(
				'".$array['id_biodata']."',
				'".$array['namadok']."',
				'".$array['penting']."',
				'".$array['cekdokumen']."',
				'".$array['tglterima']."',
				'".$array['keterangan']."',
				'".date("Y-m-d H:i:s")."'
			)
		");
			
		if ($simpan) {
			redirect('upload_ttdt');
		}

	}

	function uploadfile(){
		$data['namamodule'] = "upload_ttdt";
		$data['namafileview'] = "upload";
		echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
		$this->M_upload_kpapra->simpan_foto_kpapra($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_kpapra->hapus_foto_kpapra();
	}


	function update_data_kpapra() {
		$array = array(
			'id'=> $this->input->post('id'),
			'id_biodata'=> $this->input->post('idbiodata'),
			'namadok'=> $this->input->post('namadok'),
			'penting'=>$this->input->post('penting'),
			'cekdokumen'=> $this->input->post('cekdokumen'),
			'tglterima'=> $this->input->post('tglterima'),
			'keterangan'=> $this->input->post('keterangan'),
		);
				
		$update = $this->db->query("
			UPDATE 
			upload_ttdt
			SET
			pinho = '".$array["id_biodata"]."',
			namadok = '".$array["namadok"]."',
			penting = '".$array["penting"]."',
			cekdokumen = '".$array["cekdokumen"]."',
			tglterima = '".$array["tglterima"]."',
			keterangan = '".$array["keterangan"]."'
			WHERE id = '".$array["id"]."'
		");

		if($update){
			redirect('upload_ttdt');
		}

	}

	function hapus_data_kpapra() {
		$this->M_upload_kpapra->hapus_data_kpapra();
		redirect('upload_ttdt');
	}
}