<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_inventaris extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_inventaris');			
	}
	
	function inventaris(){
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
				$data['namamodule'] = "blk_inventaris";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_inventaris'] = $this->M_session->select("SELECT *,a.id_inventaris as idnyainventaris,(jumlah-jumlahkeluar) as sisanya FROM blk_inventaris a LEFT JOIN blk_inventaris_barang b ON  a.id_barang=b.id_barang  order by idnyainventaris DESC ");
				//$data['tampil_data_tki'] = $this->M_blk_inventaris->tampil_data_tki();
				$data['tampil_data_barang']	= $this->M_blk_inventaris->tampil_data_pilihan_barang();

				$data['namamodule'] = "blk_inventaris";
				$data['namafileview'] = "blk_inventaris";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}
	
//========================================================= Inventaris =======================================================//

	function simpan_data_blk_inventaris()
	{
        $data = array
        (
            'tglmasuk' => $this->input->post('tglmasuk'),
            'id_barang' => $this->input->post('id_barang'),
            'tglkeluar' => $this->input->post('tglkeluar'),
            'jumlah' => $this->input->post('jumlah'),
            'jumlahkeluar' => $this->input->post('jumlahkeluar'),
            'pemohon' => $this->input->post('pemohon'),
        );
		
        $this->db->insert('blk_inventaris',$data);
		redirect('blk_inventaris/inventaris');
	}

	function ubah_data_blk_inventaris() {
		$this->M_blk_inventaris->ubah_data_blk_inventaris();
		redirect('blk_inventaris/inventaris');
	}

	function hapus_data_blk_inventaris() {
		$this->M_blk_inventaris->hapus_data_inventaris_blk();
		redirect('blk_inventaris/inventaris');
	}
//========================================================= Barang Inventaris =======================================================//

	function barang(){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){
			//user sudah login
				$data['namamodule'] = "blk_inventaris";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}else if ($id_user && $status==2){
				
				$data['tampil_data_barang'] = $this->M_session->select("SELECT *,blk_inventaris_barang.id_barang as idnyainventaris FROM blk_inventaris_barang order by idnyainventaris DESC ");
				//$data['tampil_data_tki'] = $this->M_blk_inventaris->tampil_data_tki();
				
				$data['namamodule'] = "blk_inventaris";
				$data['namafileview'] = "blk_inventaris_barang";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

	function simpan_data_barang()
	{
        $data = array
        (
            'nama' => $this->input->post('nama'),
        );
		
        $this->db->insert('blk_inventaris_barang',$data);
		redirect('blk_inventaris/barang');
	}

	function ubah_data_barang() {
		$this->M_blk_inventaris->ubah_data_barang();
		redirect('blk_inventaris/barang');
	}

	function hapus_data_barang() {
		$this->M_blk_inventaris->hapus_data_barang();
		redirect('blk_inventaris/barang');
	}
}
