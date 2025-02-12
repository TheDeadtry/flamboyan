<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_denah extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_admin');
		} 	
		if ($id_user && $status!=2){
			redirect('dashboard');
		}			
	}
	
	function index() {
		
	}

	function ranjang_blk() {

		$data['tampil_asrama1'] = $this->M_session->select("SELECT * FROM blk_no_ranjang WHERE lokasi='Asrama 1'");
		$data['tampil_asrama2'] = $this->M_session->select("SELECT * FROM blk_no_ranjang WHERE lokasi='Asrama 2'");
		$data['tampil_pemakai_ranjang'] = $this->M_session->select("SELECT a.nodaftar, a.nama as nama_hk, b.nama as nama_taiwan FROM personalblk a LEFT JOIN personal b ON a.nodaftar=b.id_biodata order by a.nodaftar ASC");

		$data['namamodule'] = "blk_denah";
		$data['namafileview'] = "ranjang_blk";
		echo Modules::run('template/blk_template', $data);
	}

	function ranjang_blk_ajax($pil) {

		if ($pil == 1) {
			$data['as1'] = "active";
			$data['as2'] = "";
		} elseif ($pil == 2) {
			$data['as1'] = "";
			$data['as2'] = "active";
		} else {

		}

		$data['tampil_asrama1'] = $this->M_session->select("SELECT * FROM blk_no_ranjang WHERE lokasi='Asrama 1'");
		$data['tampil_asrama2'] = $this->M_session->select("SELECT * FROM blk_no_ranjang WHERE lokasi='Asrama 2'");
		$data['tampil_pemakai_ranjang'] = $this->M_session->select("SELECT a.nodaftar, a.nama as nama_hk, b.nama as nama_taiwan FROM personalblk a LEFT JOIN personal b ON a.nodaftar=b.id_biodata order by a.nodaftar ASC");

        $this->load->view('blk_denah/ranjang_blk_ajax',$data);
	}

	public function print_data_asrama($kondisi)
	{
		if ($kondisi == "terisi") {
			$data = $this->db->query("
			SELECT
				a.id_no_ranjang,
				a.kode_no_ranjang,
				a.lokasi,
				a.ranjang,
				b.nodaftar,
				b.nama
			FROM
				blk_no_ranjang AS a
			LEFT JOIN personalblk AS b ON a.id_no_ranjang = b.ranjangno WHERE nodaftar IS NOT NULL
			ORDER BY lokasi ASC
			")->result();
		}else{
			$data = $this->db->query("
			SELECT
				a.id_no_ranjang,
				a.kode_no_ranjang,
				a.lokasi,
				a.ranjang,
				b.nodaftar,
				b.nama
			FROM
				blk_no_ranjang AS a
			LEFT JOIN personalblk AS b ON a.id_no_ranjang = b.ranjangno WHERE nodaftar IS NULL
			ORDER BY lokasi ASC
			")->result();
		}

		$no = array();
		$noranjang = array();
		$lokasi = array();
		$ranjang = array();
		$nodaftar = array();
		$nama = array();

		foreach ($data as $key => $value) {
			$no[] = $key+1;
			$noranjang[] = $value->kode_no_ranjang;
			$lokasi[] = $value->lokasi;
			$ranjang[] = $value->ranjang;
			$nodaftar[] = $value->nodaftar;
			$nama[] = $value->nama;
		}

		header ("Content-type: text/html; charset=utf-8");
        require_once 'PHPWord/PHPWord.php';
        $PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/blk_asrama/data asrama ku.docx');

		$document->setValue('{KONDISI}', strtoupper($kondisi));

		$doklain = array(
            'no' => $no,
            'ranjang' => $noranjang,
            'lokasi' => $lokasi, 
            'posisi' => $ranjang, 
            'id' => $nodaftar,
            'nama' => $nama,
        );
        $document->cloneRow('data', $doklain);


		$tmp_file = 'files/blk_asrama/data asrama ku review.docx';
        $document->save($tmp_file);
        $namannya = str_replace("'", "--" ,$data->nama);

// ------------------------------------------- download file --------------------------------------------------------------//
        redirect('blk_denah/print_data_asrama_out');
	}


	function print_data_asrama_out(){
		require_once 'gugus/phpword/PHPWord.php';
	   	$PHPWord = new PHPWord();
	   	$document = $PHPWord->loadTemplate('files/blk_asrama/data asrama ku review.docx');

	   $filename = 'files/blk_asrama/data asrama ku review.docx';
	   $isinya=$document->save($filename);
	   header("Content-Description: File Transfer");
	   header('Content-Disposition: attachment; filename= asrama ku.docx');
	   header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	   header('Content-Transfer-Encoding: binary');
	   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	   header('Expires: 0');
		   
	   flush();
	   readfile($isinya);
	   unlink($isinya); // deletes the temporary file
	   exit;
   }

	function ranjang_blk_ambil_pemakai() {
		$id = $this->input->post("id");

		$data_ranjang = $this->M_session->select_row("SELECT * FROM personalblk WHERE ranjangno='$id'");

		$this->output->set_content_type('application/json')->set_output(json_encode($data_ranjang));
	}

	function ranjang_blk_ambil_riwayat() {
		$id = $this->input->post('id');

		$request = '$_POST';
		$table = 'personalblk';

		$primaryKey = 'nodaftar';

		$columns22 = array(
			0 => 'nodaftar'
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

		if ($where != NULL) {
			$where_dd = "where ranjangno='$id' and ".$where;
		} else {
			$where_dd = "where ranjangno='$id'";
		}

		$limit = "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		$sql1 = "SELECT * FROM blk_no_ranjang_history $where_dd ORDER BY id_history DESC $limit";
		$tampil_data_blk_personal = $this->M_session->select($sql1);

        $data33=array();
		$no=intval($_POST['start']);
  
        foreach ($tampil_data_blk_personal as $row) {
			$no++;
            $ubah_tipe = substr($row->nodaftar, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
            	$nama = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='$row->nodaftar'")->nama;
            } else {
            	$nama = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='$row->nodaftar'")->nama;
            }
			array_push($data33,
				array(
					$no,
					$row->nodaftar,
					$nama,
					$row->tanggal_mulai,
					'-',
					'-'
				)
			);
		}
		
		
		$resFilterLength = $this->M_session->select_row("SELECT count(*) as ke FROM blk_no_ranjang_history $where_dd");
		$recordsFiltered = $resFilterLength->ke;

		$resTotalLength =  $this->M_session->select_row("SELECT count(*) as kk FROM blk_no_ranjang_history where ranjangno='$id'");
		$recordsTotal 	= $resTotalLength->kk;

		$r = array(
			"draw"            => isset ( $request['draw'] ) ?
									intval( $request['draw'] ) :
									0,
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => $data33
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
	}

	function update_ranjang() {
		$id 			= $this->input->post('id');
		$idbio 			= $this->input->post('idbio');
		$tanggal_mulai	= $this->input->post('tanggal_mulai');

		$ambil_ruang_asrama = $this->M_session->select_row("SELECT lokasi FROM blk_no_ranjang where id_no_ranjang='$id'");
		if ($ambil_ruang_asrama != NULL) {
			if ($ambil_ruang_asrama->lokasi == "Asrama 1") {
				$asr = 1;
			} elseif ($ambil_ruang_asrama->lokasi == "Asrama 2") {
				$asr = 2;
			}
		}

		$cek = $this->M_session->select_row("SELECT * FROM personalblk WHERE ranjangno='$id' and nodaftar='$idbio'");
		if ($cek != NULL) {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => '2-', 'asrama' => $asr)));
		} else {
			$cek2 = $this->M_session->select_row("SELECT * FROM personalblk WHERE ranjangno='$id'");
			if ($cek2 != NULL) {
				$zero = array (
					'ranjangno' 	=> '',
					'ranjangtgl' 	=> ''
				);
				$blank_ranjang = $this->M_session->update($zero, 'personalblk', $cek2->nodaftar, 'nodaftar');
				if ($blank_ranjang == TRUE) {
					$history = array (
						'nodaftar' 		=> $idbio,
						'ranjangno' 	=> $id,
						'tanggal_mulai' => $tanggal_mulai
					);
					$insert_history = $this->M_session->insert($history, 'blk_no_ranjang_history');
					if ($insert_history == TRUE) {
						$pemilik_baru = array (
							'ranjangno' 	=> $id,
							'ranjangtgl' => $tanggal_mulai
						);
						$update_new_pemilik = $this->M_session->update($pemilik_baru, 'personalblk', $idbio, 'nodaftar');
						$this->output->set_content_type('application/json')->set_output(json_encode(array('success' => '1', 'asrama' => $asr)));
					} else {
						$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => '2b', 'asrama' => $asr)));
					}
				} else {
					$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => '2a', 'asrama' => $asr)));
				}
					
			} else {
				$history = array (
					'nodaftar' 		=> $idbio,
					'ranjangno' 	=> $id,
					'tanggal_mulai' => $tanggal_mulai
				);
				$insert_history = $this->M_session->insert($history, 'blk_no_ranjang_history');
				if ($insert_history == TRUE) {
					$pemilik_baru = array (
						'ranjangno' 	=> $id,
						'ranjangtgl' => $tanggal_mulai
					);
					$update_new_pemilik = $this->M_session->update($pemilik_baru, 'personalblk', $idbio, 'nodaftar');
					$this->output->set_content_type('application/json')->set_output(json_encode(array('success' => '1', 'asrama' => $asr)));
				} else {
					$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => '2a', 'asrama' => $asr)));
				}
				
			}

		}

	}

	function ruang_staff() {
		
		$data['namamodule'] = "blk_denah";
		$data['namafileview'] = "ruang_staff";
		echo Modules::run('template/blk_template', $data);
	}

	function project1xxawxaw() { // jgn di jalankan untuk restore data ranjang
		/*
		$g = $this->M_session->select("SELECT nodaftar, ranjangtgl as tanggal_mulai, ranjangno from personalblk_project1 where ranjangno!=''");
		$data = array();
		foreach($g as $row) {
			$data[] = array(
				'nodaftar' => $row->nodaftar,
				'ranjangno' => $row->ranjangno,
				'tanggal_mulai' => $row->tanggal_mulai
			);
		}

		$this->M_session->insert_batch($data, 'blk_no_ranjang_history');
		echo 'sukses';
		*/
		$v = $this->M_session->select("SELECT * FROM blk_no_ranjang");
		$data = array();
		foreach ($v as $row) {
			$b = $this->M_session->select_row("SELECT * FROM blk_no_ranjang_history WHERE ranjangno='$row->id_no_ranjang' ORDER BY tanggal_mulai DESC");
			if ($b != NULL) {
				echo $b->ranjangno.' : '.$b->nodaftar.'<br/>';
				$data[] = array (
					'nodaftar' => $b->nodaftar,
					'ranjangno' => $b->ranjangno,
					'ranjangtgl' => $b->tanggal_mulai
				);
			} else {

			}
		}

		$this->M_session->update_batch($data, 'personalblk', 'nodaftar');
		echo 'sukse';
	}

	function mes1() {
		$this->mesview('mes1','width="1200px" height="1619px"');
	}

	function mes2() {
		$this->mesview('mes2','width="1600px" height="1200px"');
	}

	function mes3() {
		$this->mesview('mes3','width="1600px" height="1200px"');
	}

	function mes4() {
		//$this->mesview('mes4','width="1600px" height="5000px"');
		$this->mesview4();
	}

	function mesview($view,$opt) {
		$data['tampil_pemakai_ranjang'] = $this->M_session->select("SELECT a.nodaftar, a.nama as nama_hk, b.nama as nama_taiwan 
		FROM personalblk a 
		LEFT JOIN personal b ON a.nodaftar=b.id_biodata 
		order by a.nodaftar ASC");

		$data['type'] = $view;
		$data['opt'] = $opt;
		$data['namamodule'] = "blk_denah";
		$data['namafileview'] = "mes1";
		echo Modules::run('template/blk_template', $data);
	}
	function mes_getdataall($view) {
		$data = $this->M_session->select("SELECT * FROM blk_no_ranjang WHERE lokasi='baru $view'");
		$d = [];
		foreach ($data as $v) {
			$dataz = $this->M_session->select_row("SELECT nodaftar,tanggal_mulai FROM blk_no_ranjang_history WHERE ranjangno='$v->id_no_ranjang' ORDER BY tanggal_mulai,id_history DESC");
			$d[$v->kode_no_ranjang]['no'] = 'KOSONG';
			$d[$v->kode_no_ranjang]['id'] = $v->id_no_ranjang;
			$d[$v->kode_no_ranjang]['tgl'] = date('Y-m-d');
			if (isset($dataz->nodaftar)) {
				$d[$v->kode_no_ranjang] = [
					'no' => $dataz->nodaftar,
					'id' => $v->id_no_ranjang,
					'tgl' => $dataz->tanggal_mulai,
				];
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($d));
	}
	function mes_update() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$id = $this->input->post('id');
		$data = array(
			'nodaftar' => $this->input->post('no'),
			'tanggal_mulai' => $this->input->post('tgl'),
			'ranjangno' => $id,
		);
		
		if ($this->M_session->insert($data, 'blk_no_ranjang_history')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function mesview4() {
		$data['tampil_pemakai_ranjang'] = $this->M_session->select("SELECT a.nodaftar, a.nama as nama_hk, b.nama as nama_taiwan 
		FROM personalblk a 
		LEFT JOIN personal b ON a.nodaftar=b.id_biodata 
		order by a.nodaftar ASC");

		$data['namamodule'] = "blk_denah";
		$data['namafileview'] = "mes4";
		echo Modules::run('template/blk_template', $data);
	}

	function mes4_get() {
		$data = $this->M_session->select("SELECT * FROM blk_no_ranjang WHERE lokasi='baru mes4'");
		$d = [];
		$dataa = "";
		$fff = "";
		$dataareverse = "";
		$dataareverse2 = "";
		$dataareverse3 = "";
		$dataareversestat = false;
		foreach ($data as $v) {
			$dataz = $this->M_session->select_row("SELECT nodaftar,tanggal_mulai FROM blk_no_ranjang_history WHERE ranjangno='$v->id_no_ranjang' ORDER BY tanggal_mulai,id_history DESC");
			$d['no'] = 'KOSONG';
			$d['tgl'] = date('Y-m-d');
			$styless = "background-color: #F44336;color:black;";
			if (isset($dataz->nodaftar) && $dataz->nodaftar != '') {
				$d = [
					'no' => $dataz->nodaftar,
					'tgl' => $dataz->tanggal_mulai,
				];
				$styless = "background-color: #4CAF50;color:black;";
			}
			$noranjexp = explode('_',$v->kode_no_ranjang);
			$noranj = $noranjexp[1];

			$dataaf = "";

			if ( ($noranj == 1 || ($noranj % 3) == 1) && substr($v->kode_no_ranjang,0,4) == "atas" && $dataareversestat == false ) {
				$fff = ($noranj % 2 == 0) ? 'genap' : 'ganjil';
				$dataaf .= '
					<div class="row '.$v->kode_no_ranjang.'">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
						</div>
				';
			}
			if (substr($v->kode_no_ranjang,0,4) == "atas" ) {
				$dataaf .= '
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<table class="table table-bordered table-xs">
								<tr>
									<td rowspan=2 class="bg-primary"><h3>'.$noranj.'</h3></td>
									<td class="map_title map_title_'.$v->id_no_ranjang.'" style="'.$styless.'" data-id="'.$v->id_no_ranjang.'" data-no="'.$d['no'].'" data-tgl="'.$d['tgl'].'"><h4>ATAS '.$noranj.' - '.$d['no'].'</h4>
									</td>
								</tr>
				';
			} else if (substr($v->kode_no_ranjang,0,5) == "bawah" ) {
				$dataaf .= '
								<tr>
									<td class="map_title map_title_'.$v->id_no_ranjang.'" style="'.$styless.'" data-id="'.$v->id_no_ranjang.'" data-no="'.$d['no'].'" data-tgl="'.$d['tgl'].'"><h4>BAWAH '.$noranj.' - '.$d['no'].'</h4>
									</td>
								</tr>
							</table>
							<hr/>
						</div>
				';
			}

			if ( ($noranj == 3 || ($noranj % 3) == 0) && substr($v->kode_no_ranjang,0,5) == "bawah" && $fff == 'ganjil') {
				$dataaf .= '
					</div>
				';
				//$dataareversestat = true;
			}
			if ($fff == 'ganjil') {
				$dataa .= $dataaf;
			} else if ($fff == 'genap') {
				if (($noranj == 1 || ($noranj % 3) == 1)) {
					$dataareverse .= $dataaf;
				}
				if (($noranj == 2 || ($noranj % 3) == 2)) {
					$dataareverse2 .= $dataaf;
				}
				if (($noranj == 3 || ($noranj % 3) == 0)) {
					$dataareverse3 .= $dataaf;
				}

				if (($noranj == 3 || ($noranj % 3) == 0) && substr($v->kode_no_ranjang,0,5) == "bawah") {
					$dataa .= '
						<div class="row '.$v->kode_no_ranjang.'">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 cc">
							</div>'.
							$dataareverse3.
							$dataareverse2.
							$dataareverse.
						'</div>';

						
					$dataareverse = "";
					$dataareverse2 = "";
					$dataareverse3 = "";
				}

			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($dataa));
	}


	function dewates() {
		$dataall = [];
		$ket = 'baru mes3';
		 
		for($x=1;$x<=28;$x++) {
			$dataall[] = [
				'kode_no_ranjang' => 'bawah_'.$x,
				'lokasi' => $ket,
			];/*
			$dataall[] = [
				'kode_no_ranjang' => 'bawah_'.$x,
				'lokasi' => $ket,
			];*/
		}

		$this->M_session->insert_batch($dataall, 'blk_no_ranjang');
		echo 'dewa';
	}
}