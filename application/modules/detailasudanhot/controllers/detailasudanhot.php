<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class detailasudanhot extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');
			$this->load->model('m_detailasudanhot');
			$this->load->library('form_validation');
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

			$data['tampil_data_negara'] = $this->m_detailasudanhot->tampil_data_negara();
			$data['tampil_data_calling'] = $this->m_detailasudanhot->tampil_data_calling();
			$data['tampil_data_skillnya'] = $this->m_detailasudanhot->tampil_data_skillnya();
			$data['tampil_data_agama'] = $this->m_detailasudanhot->tampil_data_agama();
			$data['tampil_data_pendidikan'] = $this->m_detailasudanhot->tampil_data_pendidikan();
			$data['tampil_data_provinsi'] = $this->m_detailasudanhot->tampil_data_provinsi();
			$data['tampil_data_jobs'] = $this->m_detailasudanhot->tampil_data_jobs();
			$data['tampil_data_lokasi'] = $this->m_detailasudanhot->tampil_data_lokasi();

			$data['tampilvaksin'] = $this->M_session->select("SELECT * FROM setting_hotellist order by kodehotel");
			$data['detailpersonalid'] = $this->session->userdata("detailuser");
			$data['tampil_data_request'] = $this->m_detailasudanhot->tampil_data_request($this->session->userdata("detailuser"));
			$data['tampil_data_personal'] = $this->m_detailasudanhot->tampil_data_personal($this->session->userdata("detailuser"));
			$data['tampil_data_dataairport'] = $this->m_detailasudanhot->tampil_data_dataairport();
			$data['tampil_dataterbang'] = $this->m_detailasudanhot->tampil_dataterbang();

			$data["personal"] = $this->db->query("SELECT * FROM personal WHERE id_biodata = '".$this->session->userdata("detailuser")."' ")->row();

			$data['hitungrequest'] = $this->m_detailasudanhot->hitung_data_request($this->session->userdata("detailuser"));
			$data['namamodule'] = "detailasudanhot";
			if ($id_user && $status==1)
			{
				$data['namafileview'] = "detailasudanhot";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2)
			{
				$data['namafileview'] = "detailrequestagen";
				echo Modules::run('template/agen_template', $data);
			}

		}

	}

	function tambah(){
		$this->m_detailasudanhot->tambahrequest();
		redirect('detailasudanhot');
	}

	function ubah() {
		$this->m_detailasudanhot->ubahrequest();
		redirect('detailasudanhot');
	}

	function hapus($id) {
		$this->m_detailasudanhot->hapusrequest($id);
		redirect('detailasudanhot');
	}

	function simpanpkketaiwan(){


		$id = $_POST['id'];
		$pk = $_POST['pk'];
		$terima = $_POST['terima'];
		$tglpksisko = $_POST['tglpksisko'];
		$tglspbgtaiwan = $_POST['tglspbgtaiwan'];

		if($id != ""){
			$update = $this->db->query("UPDATE personal SET tgl_pk = '$pk', terima_pk = '$terima', tglpksisko = '$tglpksisko', tglspbgtaiwan = '$tglspbgtaiwan' WHERE id_biodata = '$id' ");
			if ($update) {
				echo "success";
			}
			else{
				echo "gagal";
			}
		}
		else{
			echo "gagal";
		}

	}

	function stauspkpk($nilai, $id){
		if($id != ""){
			$update = $this->db->query("UPDATE personal SET status_pk = '$nilai' WHERE id_biodata = '$id' ");
			if ($update) {
				echo "disimpan";
			}
			else{
				echo "tidak disimpan";
			}
		}
		else{
			echo "tidak disimpan";
		}
	}
}
