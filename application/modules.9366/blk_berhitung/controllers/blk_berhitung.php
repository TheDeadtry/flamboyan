<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_berhitung extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_berhitung');			
	}
	
	function index($pilihan){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else
		{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;

				$tampil_data_blk_personaldetail = $this->M_blk_berhitung->tampil_data_blk_personal($pilihan);
				$data['namanya'] = $tampil_data_blk_personaldetail['namanya'];

			 	//$data['tampil_data_berhitung'] 	= $this->M_blk_berhitung->tampil_data_berhitung($idbio);
			 	$data['tampil_data_blk_instruktur'] = $this->M_blk_berhitung->tampil_data_select('blk_instruktur');
			 	$data['tampil_data_blk_nilai'] 		= $this->M_blk_berhitung->tampil_data_select('blk_nilai');
			 	$data['tampil_data_blk_materi'] 	= $this->M_blk_berhitung->tampil_data_select('blk_pelajaran_berhitung');
			 	$data['tampil_data_blk_minggu'] 	= $this->M_blk_berhitung->tampil_data_select('blk_minggu');
				$data['tampil_data_group'] 			= $this->M_blk_berhitung->tampil_group();
				$data['count_total'] 				= $this->M_blk_berhitung->count_row('blk_penilaian_berhitung',$idbio,'nilai_id');
				$data['t_nilai'] 					= $this->M_blk_berhitung->sum_row('blk_penilaian_berhitung',$idbio,'nilai_id');

				$data['namamodule'] = "blk_berhitung";
				$data['namafileview'] = "blk_berhitung";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

	function tambah_nilai($no) {
		$this->session->set_userdata('buka','in');
		$this->session->set_userdata('buka2','true');

		$tgl 			= $this->input->post('tgl');
		$penilai 		= $this->input->post('penilai');
		$materi 		= $this->input->post('materi');
		$nilai 		 	= $this->input->post('nilai');
		$keterangan 	= $this->input->post('keterangan');
		$tipe 			= 1;
		$minggu 	 	= $this->input->post('minggu');

		$data = array (
			'no_daftar' 		=> $no,
			'tgl' 				=> $tgl,
			'penilai_id' 		=> $penilai,
			'berhitung_id' 	=> $materi,
			'nilai_id' 			=> $nilai,
			'keterangan'		=> $keterangan,
			'tipe' 				=> $tipe,
			'minggu_id' 		=> $minggu
		);

		$this->M_blk_berhitung->tambah_nilai($data);
		redirect('blk_berhitung/index/'.$no);
	}

	function ubah_nilai($no) {
		$id 			= $this->input->post('tatagraha_id');
		$tgl 			= $this->input->post('tgl');
		$penilai 		= $this->input->post('penilai');
		$materi 		= $this->input->post('materi');
		$nilai 		 	= $this->input->post('nilai');
		$keterangan 	= $this->input->post('keterangan');
		$tipe 			= 1;
		$minggu 	 	= $this->input->post('minggu');

		$data = array (
			'tgl' 				=> $tgl,
			'penilai_id' 		=> $penilai,
			'berhitung_id' 	=> $materi,
			'nilai_id' 			=> $nilai,
			'keterangan'		=> $keterangan,
			'tipe' 				=> $tipe,
			'minggu_id' 		=> $minggu
		);

		$this->M_blk_berhitung->ubah_nilai($data,$id);
		redirect('blk_berhitung/index/'.$no);
	}

	function hapus_nilai($no) {
		$this->M_blk_berhitung->hapus_nilai();
		redirect('blk_berhitung/index/'.$no);
	}

	function setdata($no) {
		$tgl 		= $this->input->post('tgl');
		$penilai 	= $this->input->post('penilai');
		$minggu 	= $this->input->post('minggu');
		$penilai_explode = explode(",",$penilai);
		$minggu_explode = explode(",",$minggu);
		$this->session->set_userdata('tgl',$tgl);
		$this->session->set_userdata('id_penilai',$penilai_explode[0]);
		$this->session->set_userdata('nama_penilai',$penilai_explode[1]);
		$this->session->set_userdata('id_minggu',$minggu_explode[0]);
		$this->session->set_userdata('nama_minggu',$minggu_explode[1]);

		redirect('blk_berhitung/index/'.$no);
	}

	function coba($idbio) {

		$tampil_data_group 			= $this->M_blk_berhitung->tampil_group();
		foreach ($tampil_data_group as $group) {
			$h  = $this->M_blk_berhitung->tampil_data_berhitung($group->tgl,$idbio);
	        foreach ($h as $hasil) {
    	echo '<pre>';
    	print_r($hasil);
    	echo '</pre>';
	        	
        	}
    	}
	}
	/*
	function tambah($no,$gl,$sesi) {
		$tgl = $this->input->post('tgl_before');
		if ($tgl == '') {
			$tgl = '0';
		}
		$p = $this->input->post('penilai_before');
		if ($gl == 1 || $gl == 5 || $gl == 2 || $gl == 3 || $gl == 4 || $gl == 6 || $gl == 7 || $gl == 8 || $gl == 9) {
			$tipe = 'index';
		} elseif ($gl == 10 || $gl == 11) {
			$tipe = 'ruang';
		}
		if ($tgl == 0 || $p == 'none')  {
			$url = 'blk_penilaiantatagraha/'.$tipe.'/'.$no.'/'.$gl.'/'.$sesi;
			echo'
			<script type=text/javascript>
			    alert("Form penilai atau tanggal belum di isi!");
				window.location="'.site_url($url).'";
			</script>
			';
		} elseif ($tgl != '' || $p != '') {	
			if ($gl == 1 || $gl == 5) {
				$data = array(
					'no_daftar'			=> $no,
					'tgl'				=> $tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl,
					'nilai_tulis'	 	=> "-,-,-,-,-,-,-,-,-,-,-,-",
					'nilai_praktik'	 	=> "-,-,-,-,-,-,-,-,-,-,-,-",
					'penilai' 			=> $p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p,
					'keterangan' 		=> "-,-,-,-,-,-,-,-,-,-,-,-",
					'gl' 				=> $gl,
					'sesi'				=> $sesi
				);
			} elseif($gl == 2 || $gl == 3 || $gl == 4) {
				$data = array(
					'no_daftar'			=> $no,
					'tgl'				=> $tgl,
					'nilai_tulis'	 	=> "-",
					'nilai_praktik'	 	=> "-",
					'penilai' 			=> $p,
					'keterangan' 		=> "-",
					'gl' 				=> $gl,
					'sesi'				=> $sesi
				);
			} elseif($gl == 6) {
				$data = array(
					'no_daftar'			=> $no,
					'tgl'				=> $tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl,
					'nilai_tulis'	 	=> "-,-,-,-,-,-,-,-,-,-,-",
					'nilai_praktik'	 	=> "-,-,-,-,-,-,-,-,-,-,-",
					'penilai' 			=> $p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p,
					'keterangan' 		=> "-,-,-,-,-,-,-,-,-,-,-",
					'gl' 				=> $gl,
					'sesi'				=> $sesi
				);
			} elseif ($gl == 7 || $gl == 8 || $gl == 9) {
				$data = array(
					'no_daftar'			=> $no,
					'tgl'				=> $tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl,
					'nilai_tulis'		=> "-,-,-,-,-,-",
					'nilai_praktik'		=> "-,-,-,-,-,-",
					'penilai' 			=> $p.','.$p.','.$p.','.$p.','.$p.','.$p,
					'keterangan' 		=> "-,-,-,-,-,-",
					'gl' 				=> $gl,
					'sesi'				=> $sesi
				);
			} elseif ($gl == 10) {
				$data = array(
					'no_daftar'			=> $no,
					'tgl'				=> $tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl,
					'nilai_tulis'		=> "-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-",
					'nilai_praktik'		=> "-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-",
					'penilai' 			=> $p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p,
					'keterangan' 		=> "-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-",
					'gl' 				=> $gl,
					'sesi'				=> $sesi
				);
			} elseif ($gl == 11) {
				$data = array(
					'no_daftar'			=> $no,
					'tgl'				=> $tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl.','.$tgl,
					'nilai_tulis'		=> "-,-,-,-,-,-,-,-,-,-,-",
					'nilai_praktik'		=> "-,-,-,-,-,-,-,-,-,-,-",
					'penilai' 			=> $p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p.','.$p,
					'keterangan' 		=> "-,-,-,-,-,-,-,-,-,-,-",
					'gl' 				=> $gl,
					'sesi'				=> $sesi
				);
			}

			$queries = $this->M_blk_penilaiantatagraha->tambah_data_per_gl($data);
			redirect('blk_penilaiantatagraha/'.$tipe.'/'.$no.'/'.$gl.'/'.$sesi);
		}
	}

	function ubah_nilai() {
		$id 	 		= $this->input->post('tatagraha_id');
		$sesi	 		= $this->input->post('tatagraha_sesi');
		$gl	 			= $this->input->post('tatagraha_gl');
		$no_daftar		= $this->input->post('tatagraha_nodaftar');
		$row			= $this->input->post('tatagraha_row');
		$tgl 			= $this->input->post('tgl');
		$nilai_tulis 	= $this->input->post('nilai_tulis');
		$nilai_praktik 	= $this->input->post('nilai_praktik');
		$penilai 		= $this->input->post('penilai');
		$keterangan		= $this->input->post('keterangan');

		$load = $this->M_blk_penilaiantatagraha->load($id);

        $tgl_explode = explode(",",$load['tgl']);
        $nilai_tulis_explode = explode(",",$load['nilai_tulis']);
        $nilai_praktik_explode = explode(",",$load['nilai_praktik']);
        $penilai_explode = explode(",",$load['penilai']);
        $keterangan_explode = explode(",",$load['keterangan']);

		if ($gl == 1 || $gl == 5) {
			$total_row = 12;
			$tipe = 'index';
		} elseif($gl == 2 || $gl == 3 || $gl == 4) {
			$total_row = 1;
			$tipe = 'index';
		} elseif($gl == 6) {
			$total_row = 11;
			$tipe = 'index';
		} elseif ($gl == 7 || $gl == 8 || $gl == 9) {
			$total_row = 6;
			$tipe = 'index';
		} elseif ($gl == 10) {
			$total_row = 16;
			$tipe = 'ruang';
		} elseif ($gl == 11) {
			$total_row = 11;
			$tipe = 'ruang';
		}

        for ($z=1;$z<=$total_row;$z++) {
        	if ($row == $z) {
        		$tgl_after_add[$z]			= $tgl;
        		$nilai_t_after_add[$z] 		= $nilai_tulis;
        		$nilai_p_after_add[$z] 		= $nilai_praktik;
        		$penilai_after_add[$z] 		= $penilai;
        		$keterangan_after_add[$z] 	= $keterangan;
        	} else {
        		$tgl_after_add[$z]			= $tgl_explode[$z-1];
        		$nilai_t_after_add[$z] 		= $nilai_tulis_explode[$z-1];
        		$nilai_p_after_add[$z] 		= $nilai_praktik_explode[$z-1];
        		$penilai_after_add[$z] 		= $penilai_explode[$z-1];
        		$keterangan_after_add[$z] 	= $keterangan_explode[$z-1];
        	}
        }

        for ($y=1;$y<=$total_row;$y++) {
        	$tgl_combine				= $tgl_combine.$tgl_after_add[$y].',';
        	$nilai_tulis_combine 		= $nilai_tulis_combine.$nilai_t_after_add[$y].',';
        	$nilai_praktik_combine 		= $nilai_praktik_combine.$nilai_p_after_add[$y].',';
        	$penilai_combine 			= $penilai_combine.$penilai_after_add[$y].',';
        	$keterangan_combine 		= $keterangan_combine.$keterangan_after_add[$y].',';
        }

        $tgl_final			= substr($tgl_combine,0,-1);
        $nilai_t_final		= substr($nilai_tulis_combine,0,-1);
        $nilai_p_final		= substr($nilai_praktik_combine,0,-1);
        $penilai_final		= substr($penilai_combine,0,-1);
        $keterangan_final	= substr($keterangan_combine,0,-1);

		$data = array (
			'tgl'				=> $tgl_final,
			'nilai_tulis'		=> $nilai_t_final, 
			'nilai_praktik'		=> $nilai_p_final,
			'penilai'			=> $penilai_final,
			'keterangan'		=> $keterangan_final
		);

		$this->M_blk_penilaiantatagraha->ubah_nilai($data,$id);
		redirect('blk_penilaiantatagraha/'.$tipe.'/'.$no_daftar.'/'.$gl.'/'.$sesi);
	}

	function ruang($pilihan,$gl=10,$sesi=1){
		$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else
		{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){
			 	$idbio=$pilihan;
			 	$data['idbio'] = $idbio;
			 	$data['gl'] = $gl;
			 	$data['sesi'] = $sesi;
				$data['tampil_data_blk_penilaiangl'] = $this->M_blk_penilaiantatagraha->tampil_data_blk_penilaiangl($gl);
				$data['tampil_data_blk_penilaian'] = $this->M_blk_penilaiantatagraha->tampil_data_blk_penilaian($pilihan,$gl,$sesi);
				$tampil_data_blk_penilaian_count = $this->M_blk_penilaiantatagraha->tampil_data_blk_penilaian_count($pilihan,$gl,$sesi);

				if ($tampil_data_blk_penilaian_count[0]['total']) {
					$data['attrb'] = 'disabled';
				} else {
					$data['attrb'] = '';
				}

				$data['tampil_data_blk_penilaianmateri'] = $this->M_blk_penilaiantatagraha->tampil_data_blk_penilaianmateri($gl);
				$tampil_data_blk_personaldetail = $this->M_blk_penilaiantatagraha->tampil_data_blk_personal($pilihan);
				$data['namanya'] = $tampil_data_blk_personaldetail['namanya'];

				$data['tampil_data_blk_instruktur'] = $this->M_blk_penilaiantatagraha->tampil_data_blk_instruktur();

				$data['namamodule'] = "blk_penilaiantatagraha";
				$data['namafileview'] = "blk_penilaianruang";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

	function coba() {
		$tampil_data_blk_personaldetail = $this->M_blk_penilaiantatagraha->tampil_data_blk_personal('MF-0001');
		print_r($tampil_data_blk_personaldetail);
	}*/
}