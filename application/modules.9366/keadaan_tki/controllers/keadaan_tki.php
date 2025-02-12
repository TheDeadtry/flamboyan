<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class keadaan_tki extends MX_Controller
{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');			
	}

	function index() 
	{
		$data['tampil_data_personal'] = $this->M_session->select("SELECT * FROM personal WHERE id_biodata='".$this->session->userdata("detailuser")."'");
		$data['detailpersonalid'] = $this->session->userdata("detailuser");
		$data['hitungterbang'] = $this->M_session->select_count("admin_keadaan_tki WHERE id_biodata='".$this->session->userdata("detailuser")."'");
		$data['tampil_data_keadaan'] = $this->M_session->select("SELECT * FROM admin_keadaan_tki_pilihan");
		$data['tampil_data'] = $this->M_session->select("SELECT 
			admin_keadaan_tki.*,
			admin_keadaan_tki_pilihan.nama as keadaan_nama 
			FROM admin_keadaan_tki 
			JOIN admin_keadaan_tki_pilihan ON admin_keadaan_tki.keadaan_id=admin_keadaan_tki_pilihan.id 
			where id_biodata='".$this->session->userdata("detailuser")."'");

		$data['namamodule'] 	= "keadaan_tki";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/admin_template', $data);
	}

	function tambah() 
	{
		$data = array(
			'id_biodata' 	=> $this->input->post('idbiodata'),
			'keadaan_id' 	=> $this->input->post('keadaan'),
			'tanggal' 		=> $this->input->post('tanggal'),
			'date_created' 	=> date("Y-m-d H:i:s"),
		);

		$this->M_session->insert($data, "admin_keadaan_tki");

		redirect('keadaan_tki');
	}

	function ubah() 
	{
		$id = $this->input->post('id');

		$data = array(
			'keadaan_id' 	=> $this->input->post('keadaan'),
			'tanggal' 		=> $this->input->post('tanggal'),
			'date_created' 	=> date("Y-m-d H:i:s"),
		);

		$this->M_session->update($data, "admin_keadaan_tki", $id, "id");

		redirect('keadaan_tki');
	}

	function hapus() 
	{
		$id = $this->input->post('id');

		$this->M_session->delete("admin_keadaan_tki", $id, "id");

		redirect('keadaan_tki');
	}
			

}