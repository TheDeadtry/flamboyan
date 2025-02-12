<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Blk_personal extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_blk_personal');			
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			 if ($id_user && $status==2){

			 	$pilsek  = $this->session->userdata('pilsektor');
			 	$pilstts = $this->session->userdata('pilstat2');
			 	$data['pilsek']   = $pilsek;
			 	$data['pilstts'] = $pilstts;

				$data['personalff'] = $this->M_blk_personal->personalff();
				$data['personalfi'] = $this->M_blk_personal->personalfi();
				$data['personalmf'] = $this->M_blk_personal->personalmf();
				$data['personalmi'] = $this->M_blk_personal->personalmi();
				$data['personaljp'] = $this->M_blk_personal->personaljp();

			 	$data['tampil_data_pemilik_tki'] 	= $this->M_blk_personal->tampil_data_pemilik_tki();
			 	$data['tampil_data_jk_tki'] 		= $this->M_blk_personal->tampil_data_jk_tki();
			 	$data['tampil_data_negara_tki'] 	= $this->M_blk_personal->tampil_data_negara_tki();
			 	$data['tampil_data_bahasa_tki'] 	= $this->M_blk_personal->tampil_data_bahasa_tki();
			 	$data['tampil_data_eksnon_tki'] 	= $this->M_blk_personal->tampil_data_eksnon_tki();
			 	$data['tampil_data_cluster_tki'] 	= $this->M_blk_personal->tampil_data_cluster_tki();

			 	$data['tampil_data_sponsor'] 		= $this->M_blk_personal->tampil_data_sponsor();

				$data['namamodule'] = "blk_personal";
				$data['namafileview'] = "blk_personal";
				echo Modules::run('template/blk_template', $data); 
			}
		}	 
	}

	function setpilih($pilihan){
		$this->session->set_userdata('pilsektor', $pilihan);
		redirect('blk_personal/');
	}

	function setstat2($pilihan){
		$this->session->set_userdata('pilstat2', $pilihan);
		redirect('blk_personal/');
	}

	function simpan_data_blk_personal(){
		$this->M_blk_personal->simpan_data_blk_personal();
		//print_r($d);
		redirect('blk_personal');
	}

	function update_data_blk_personal() {
			$this->M_blk_personal->update_data_blk_personal();
			redirect('blk_personal');
	}

	function hapus_data_blk_personal() {
		$this->M_blk_personal->hapus_data_blk_personal();
		redirect('blk_personal');
	}

   	function show_data() {
		$pilsek = $this->session->userdata('pilsektor');
		$pilst2 = $this->session->userdata('pilstat2');

		$request = '$_POST';
		$table = 'personalblk';

		$primaryKey = 'nodaftar';

		$columns22 = array(
			0 => 'nodaftar',
			1 => 'personalblk.nama',
			2 => 'personal.nama',
			/*
			2 => 'personalblk.nama',
			2 => 'personal.jeniskelamin', 
			3 => 'blk_pemilik.isi', 
			4 => 'blk_pemilik.negara',  	
			5 => 'datasponsor.kode_sponsor',
			6 => 'personalblk.jeniskelamin',
			7 => 'personal.kode_sponsor',
			*/
		);

		$strr = array();
		$string1 = $_POST['search']['value'];
		for ($i=0;$i<count($columns22);$i++) {
			$strr[] = " lower(".$columns22[$i].") LIKE '%".strtolower($string1)."%'";
		}
		$where = '';
		if ( count( $strr ) ) {
			$where = '('.implode(' OR ', $strr).')';
		}
		if ( $where !== '' ) {
			$where = $where;
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($pilst2 == 'BELUM_TERBANG') {
			$sttbng = " AND (personalblk.statterbang IS NULL && personal.statterbang IS NULL)";
		} elseif ($pilst2 == 'SUDAH_TERBANG') {
			$sttbng = " AND (personalblk.statterbang=1 || personal.statterbang=1)";
		}  else {
			$sttbng = '';
		}

		$where_af = $where.' '.$sttbng;

		if($pilsek=='NN') {
			if ($where_af != NULL) {
				$where_dd = "WHERE (personalblk.nodaftar NOT LIKE 'MF%' 
								AND personalblk.nodaftar NOT LIKE 'MI%'
								AND personalblk.nodaftar NOT LIKE 'FI%'
								AND personalblk.nodaftar NOT LIKE 'FF%'
								AND personalblk.nodaftar NOT LIKE 'JP%')  AND ".$where_af;
			} else {
				$where_dd = "WHERE (personalblk.nodaftar NOT LIKE 'MF%' 
								AND personalblk.nodaftar NOT LIKE 'MI%'
								AND personalblk.nodaftar NOT LIKE 'FI%'
								AND personalblk.nodaftar NOT LIKE 'FF%'
								AND personalblk.nodaftar NOT LIKE 'JP%') ";
			}
		} else {
			if ($where_af != NULL) {
				$where_dd = "WHERE personalblk.nodaftar LIKE '".$pilsek."%' AND ".$where_af;
			} else {
				$where_dd = "WHERE personalblk.nodaftar LIKE '".$pilsek."%'";
			}	
		}

		$tampil_data_blk_personal = $this->M_blk_personal->tampil_data_blk_personal($where_dd, $limit);

        $data2=array();
		$no=intval($_POST['start']);
  
        foreach ($tampil_data_blk_personal as $roew) {
			$no++;
            $ubah_tipe = substr($roew->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
            	$nama 		= $roew->personal_nama;
            	$sponsor 	= $roew->personal_kodespons;
	            if ($roew->personal_jk=="男") {
	                $jkk = 'L';
	            } elseif ($roew->personal_jk=="女") {
	                $jkk = 'P';
	            } else {
	            	$jkk = '';
	            }
	            $edit_buttonz = '';
	            if ($roew->optterbang == 1) {
	            	$foptterbang = "Sudah Terbang";
	            } elseif ($roew->optterbang == NULL) {
	            	$foptterbang = "Belum Terbang";
	            } else {
	            	$foptterbang = '';
	            }
	            if ($ubah_tipe == 'FI' || $ubah_tipe == 'MI') {
		            $pilihan_graha = '
		                <li><a href="'.site_url('blk_fisik_mental/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-brain"></i> Fisik Mental</a></li>
		                <li><a href="'.site_url('blk_mandarin_inf_jompo/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-bookmark"></i> Mandarin Informal-Jompo</a></li>
		                <li><a href="'.site_url('blk_bhs_taiyu/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-tumblr2"></i> Bahasa Taiyu</a></li>
		                <li><a href="'.site_url('blk_jompo/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-accessibility2"></i> Jompo</a></li>
		                <li><a href="'.site_url('blk_graha_laundry/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-shutter"></i> Graha Laundry</a></li>
		                <li><a href="'.site_url('blk_graha_ruang/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-cube"></i> Graha Ruang</a></li>
		                <li><a href="'.site_url('blk_graha_boga/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-ampersand"></i> Graha Boga</a></li>
		                <li><a href="'.site_url('blk_tata_boga/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-wave2"></i> Tata Boga</a></li>
		            ';
	            } elseif ($ubah_tipe == 'FF' || $ubah_tipe == 'MF') {
		            $pilihan_graha = '
		                <li><a href="'.site_url('blk_fisik_mental/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-brain"></i> Fisik Mental</a></li>
		                <li><a href="'.site_url('blk_mandarin_pabrik/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-book3"></i> Mandarin Pabrik</a></li>
		                <li><a href="'.site_url('blk_olah_raga/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-dribbble"></i> Olah Raga</a></li>
		                <li><a href="'.site_url('blk_berhitung/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-seven-segment-4"></i> Berhitung</a></li>
		            ';
	            } elseif ($ubah_tipe == 'JP') {
		            $pilihan_graha = '
		                <li><a href="'.site_url('blk_fisik_mental/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-brain"></i> Fisik Mental</a></li>
		                <li><a href="'.site_url('blk_mandarin_inf_jompo/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-bookmark"></i> Mandarin Informal-Jompo</a></li>
		                <li><a href="'.site_url('blk_bhs_taiyu/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-tumblr2"></i> Bahasa Taiyu</a></li>
		                <li><a href="'.site_url('blk_jompo/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-accessibility2"></i> Jompo</a></li>
		            ';
	            }
            } else {
            	$nama 		= $roew->namanya;
            	$sponsor 	= $roew->blk_sponsor;
	            if ($roew->blk_jk=="Laki-Laki") {
	                $jkk = 'L';
	            } elseif ($roew->blk_jk=="Perempuan") {
	                $jkk = 'P';
	            } else {
	                $jkk = '';
	            }
	            $edit_buttonz = '<li><a href="#" data-toggle="modal" data-target="#edit" onclick=edit666('.$roew->id_personalblk.')><i class="icon-pencil3"></i><span>Ubah</span></a></li>';
	            if ($roew->hk_optterbang == 1) {
	            	$foptterbang = "Sudah Terbang";
	            } elseif ($roew->hk_optterbang == NULL) {
	            	$foptterbang = "Belum Terbang";
	            } else {
	            	$foptterbang = '';
	            }
	            $pilihan_graha = '
		            <li><a href="'.site_url('blk_fisik_mental/index/'.$roew->nodaftar).'" target="_blank"><i class="icon-brain"></i> Fisik Mental</a></li>
		        ';
            }
	        $tgl_ujk = $this->M_session->select_row("SELECT tgl_ujk FROM blk_detail_formulir
				LEFT JOIN blk_formulir
				ON blk_detail_formulir.id_formulir=blk_formulir.id_formulir
				LEFT JOIN blk_pengajuan_ujk
				ON blk_detail_formulir.id_formulir=blk_pengajuan_ujk.id_formulirnya
				LEFT JOIN blk_lembaga_lsp
				ON blk_pengajuan_ujk.lembagalsp=blk_lembaga_lsp.id_lembaga_lsp
				WHERE blk_detail_formulir.nodaftar='$roew->nodaftar' ORDER BY blk_formulir.id_formulir DESC LIMIT 1");
	        if ($tgl_ujk != NULL) {
	        	//if ($tgl_ujk->tgl_ujk < date("Y-m-d")) {
	        	if ($tgl_ujk->tgl_ujk != NULL) {
	        		$tgl_ujk2 	= strtotime($tgl_ujk->tgl_ujk);
	        		$tgl_now 	= strtotime(date("now"));

	        		$statujk = "BELUM UJK";
	        		if ($tgl_ujk > $tgl_now) {
	        			$statujk = "SUDAH UJK";
	        		}
	        	} else {
	        		$statujk = 'BELUM UJK';
	        	}
	        	//} else {
	        	//	$statujk = 'SUDAH UJK';
	        	//}
	        } else {
	        	$statujk = 'BELUM UJK';
	        }

			array_push($data2,
				array(
					$no,
					$roew->nodaftar.$roew->extra_1.$roew->extra_2.$roew->extra_3.'-'.$roew->extra_4.$roew->extra_5.$roew->extra_6,
					$nama,
					$jkk,
					$roew->pemilikx.' - '.$roew->negarapemilikx,
					$sponsor,
					$foptterbang,
					$statujk,
					'<a href="'.site_url('blk_personaldetail/index/'.$roew->nodaftar).'" target="_blank"><span class="label label-success">Detail</span></a>'.' '.
					'<a href="'.site_url('blk_personaldetail/pembinaan/'.$roew->nodaftar).'" target="_blank"><span class="label label-primary">Pembinaan</span></a>'.' '.
					'
                    <div class="btn-group btn-group-animated">
                    	<a class="dropdown-toggle" data-toggle="dropdown">
	                    	<span class="label label-danger">
	                    		Pelatihan
	                    	</span>
                    	</a>
                        <ul class="dropdown-menu">
                        	'.$pilihan_graha.'
                        </ul>
                    </div>
                    ',
					'<ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                            	'.$edit_buttonz.'
                                <li><a href="#" data-toggle="modal" data-target="#hapus" onclick=delete_bef('.$roew->id_personalblk.')><i class="icon-eraser"></i><span>Hapus</span></a></li>
                            </ul>
                        </li>
                    </ul>'
				)
			);
		}
		
		
		$resFilterLength = $this->M_blk_personal->datatables_count_where($table, $primaryKey, $where_dd);
		$recordsFiltered = $resFilterLength->filter;

		$resTotalLength =  $this->M_blk_personal->datatables_count($table, $primaryKey, $pilsek);
		$recordsTotal = $resTotalLength->key;

		$r = array(
			"draw"            => isset ( $request['draw'] ) ?
									intval( $request['draw'] ) :
									0,
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => $data2
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
   	}

   	function edit_show() {
		$id = $this->input->post('id');
		//print_r($id);
		$data = $this->M_blk_personal->edit_show_Data($id);
		//print_r($data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
   		//print_r($k);
   	}

   	function edit_process() {
		$this->M_blk_personal->update_data_blk_personal();

		$info['success'] = TRUE;
		$info['message'] = "Berhasil Diubah";

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
   	}

	function hapus() {
		$this->M_blk_personal->hapus_data_blk_personal();

		$info['success'] = TRUE;
		$info['message'] = "Berhasil Diubah";

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
		//$this->M_blk_personal->hapus_data_finger();
		//redirect('blk_personal');
	}

}