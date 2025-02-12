<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Pelatihan_blk extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_pelatihan_blk');			
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
				$data['namamodule'] = "pelatihan_blk";
				$data['namafileview'] = "agamaadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['tampil_data_laporan'] = $this->M_pelatihan_blk->tampil_data_laporan();
				//$data['tampil_data_tki'] = $this->M_pelatihan_blk->tampil_data_tki();
				
				$data['namamodule'] = "pelatihan_blk";
				$data['namafileview'] = "pelatihan_blk";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}
	
//============================================== surat_pelatihan =======================================================//

	function simpan_data_laporan_pelatihan_blk(){
			
		$this->M_pelatihan_blk->simpan_data_laporan_pelatihan_blk();
		redirect('pelatihan_blk');
	}

	function update_data_laporan_pelatihan_blk() {
		$this->M_pelatihan_blk->update_data_laporan_pelatihan_blk();
		redirect('pelatihan_blk');
	}

	function hapus_data_laporan_pelatihan_blk() {
		$this->M_pelatihan_blk->hapus_data_laporan_pelatihan_blk();
		redirect('pelatihan_blk');
	}
	
//============================================== detail surat_pelatihan =======================================================//
	
	function detail_laporan_pelatihan_blk($idlaporan) {
		$data['tampil_data_detail'] = $this->M_pelatihan_blk->tampil_data_detail($idlaporan);
		
		$data['tampil_data_ff'] = $this->M_pelatihan_blk->tampil_data_ff();
		$data['tampil_data_fi'] = $this->M_pelatihan_blk->tampil_data_fi();
		$data['tampil_data_mf'] = $this->M_pelatihan_blk->tampil_data_mf();
		$data['tampil_data_mi'] = $this->M_pelatihan_blk->tampil_data_mi();
		$data['tampil_data_jp'] = $this->M_pelatihan_blk->tampil_data_jp();
		$data['tampil_data_all'] = $this->M_pelatihan_blk->tampil_data_all();
		$data['tampil_data_laporan'] = $this->M_pelatihan_blk->tampil_data_laporan();
		$data['tampil_data_lsp'] = $this->M_pelatihan_blk->tampil_data_lsp();
		$data['tampil_data_pemilik'] = $this->M_pelatihan_blk->tampil_data_pemilik();

		$data['tampil_data_bayarujk'] = $this->M_pelatihan_blk->tampil_data_bayarujk($idlaporan);
		$data['hitung_data_bayarujk'] = $this->M_pelatihan_blk->hitung_data_bayarujk($idlaporan);
		$data['tampil_data_invoiceujk'] = $this->M_pelatihan_blk->tampil_data_invoiceujk($idlaporan);
		$data['hitung_data_invoiceujk'] = $this->M_pelatihan_blk->hitung_data_invoiceujk($idlaporan);
		$data['tampil_data_invoice_reftuk'] = $this->M_pelatihan_blk->tampil_data_invoice_reftuk($idlaporan);
		$data['hitung_data_invoice_reftuk'] = $this->M_pelatihan_blk->hitung_data_invoice_reftuk($idlaporan);
		$data['tampil_data_invoice_pelatihan'] = $this->M_pelatihan_blk->tampil_data_invoice_pelatihan($idlaporan);
		$data['hitung_data_invoice_pelatihan'] = $this->M_pelatihan_blk->hitung_data_invoice_pelatihan($idlaporan);
		
		$data['id_laporan_blk'] = $idlaporan;
			
			$data['namamodule'] = "pelatihan_blk";
			$data['namafileview'] = "detail_surat_pelatihan_blk";
			echo Modules::run('template/blk_template', $data); 
	}
	
	function simpan_detail_laporan_pelatihan_blk($idagen){
		$this->M_pelatihan_blk->simpan_data_ctki();
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$idagen);
	}
	function update_detail_laporan_pelatihan_blk($idagen) {
		$this->M_pelatihan_blk->update_ctki();
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$idagen);
	}
	function hapus_detail_laporan_pelatihan_blk($idagen) {
		$this->M_pelatihan_blk->hapus_ctki();
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$idagen);
	}
	
	//============================================== detail pembayaranujk ke lsp ==================================================//

	function simpan_detailbayarujk($id_laporan_blk){
		$this->M_pelatihan_blk->simpan_data_bayarujk($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}

	function ubah_detailbayarujk($id_laporan_blk){
		$this->M_pelatihan_blk->ubah_detailbayarujk($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}
	
	//============================================== detail invoiceujk ==================================================//

	function simpan_detailinvoiceujk($id_laporan_blk){
		$this->M_pelatihan_blk->simpan_data_invoiceujk($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}

	function ubah_detailinvoiceujk($id_laporan_blk){
		$this->M_pelatihan_blk->ubah_detailinvoiceujk($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}
	
	//============================================== detail invoice_reftuk ==================================================//

	function simpan_detailinvoice_reftuk($id_laporan_blk){
		$this->M_pelatihan_blk->simpan_data_invoice_reftuk($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}

	function ubah_detailinvoice_reftuk($id_laporan_blk){
		$this->M_pelatihan_blk->ubah_detailinvoice_reftuk($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}
	
	//============================================== detail invoice_pelatihan ==================================================//

	function simpan_detailinvoice_pelatihan($id_laporan_blk){
		$this->M_pelatihan_blk->simpan_data_invoice_pelatihan($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}

	function ubah_detailinvoice_pelatihan($id_laporan_blk){
		$this->M_pelatihan_blk->ubah_detailinvoice_pelatihan($id_laporan_blk);
		redirect('pelatihan_blk/detail_laporan_pelatihan_blk/'.$id_laporan_blk);
	}
	
}