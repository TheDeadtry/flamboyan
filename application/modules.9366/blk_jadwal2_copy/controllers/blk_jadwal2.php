<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_jadwal2 extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index() {
		redirect('blk_jadwal2/paket');	
	}

	//============================ SETTING PAKET JADWAL ===//
	function paket() {
		$paket = "SELECT 
					a.id_paket,
					a.minggu,
					a.nama_paket as kode_paket,
					b.nama_paket,
					c.kode_jam as kode_jam,
					c.jam 
					FROM blk_jadwal_paket a
					LEFT JOIN blk_setting_paket b
					ON a.nama_paket=b.id_setting_paket
					LEFT JOIN blk_jam c
					ON a.jam=c.kode_jam
					";
	 	$data['tampil_data_paket'] 	= $this->M_session->select($paket);

	 	$data['tampil_data_setting_paket'] = $this->M_session->select("SELECT * FROM blk_setting_paket");
	 	$data['tampil_data_minggu'] 	= $this->M_session->select("SELECT * FROM blk_minggu");
	 	$data['tampil_data_jam'] 		= $this->M_session->select("SELECT * FROM blk_jam");

		$data['namamodule'] 	= "blk_jadwal2";
		$data['namafileview'] 	= "v_paket";
		echo Modules::run('template/blk_template', $data); 
	}

	function paket_simpan() {
		$nama 			= $this->input->post('nama');
		$minggu 		= $this->input->post('minggu');
		$jam 			= $this->input->post('jam');
		
		$minggu_final 	= implode(",", $minggu);

		$data = array(
			'nama_paket' 	=> $nama,
			'minggu' 		=> $minggu_final,
			'jam' 			=> $jam
		);

		$this->M_session->insert($data, 'blk_jadwal_paket');

		redirect('blk_jadwal2/paket');
	}

	function paket_ubah() {
		$id2  			= $this->input->post('id');

		$nama 			= $this->input->post('nama');
		$minggu 		= $this->input->post('minggu');
		$jam 			= $this->input->post('jam');
		
		$minggu_final 	= implode(",", $minggu);

		$data = array(
			'nama_paket' 	=> $nama,
			'minggu' 		=> $minggu_final,
			'jam' 			=> $jam
		);

		$this->M_session->update($data, 'blk_jadwal_paket', $id2, 'id_paket');

		redirect('blk_jadwal2/paket');
	}

	function paket_hapus() {
		$id2  			= $this->input->post('id');

		$this->M_session->delete('blk_jadwal_paket', $id2, 'id_paket');

		redirect('blk_jadwal2/paket');
	}

	function add_hari($id) {
	 	$data['tampil_data_paketjadwal'] 	= $this->M_session->select("SELECT * FROM blk_jadwal_paketjadwal where paket_id='".$id."'");

		$query = "SELECT k.kode_materi,k.nama_materi,concat(k.kode_materi,'|-|jompo') as id  FROM blk_pelajaran_jompo k";
		$data['tampil_data_materi'] 		= $this->M_session->select($query);

		$data['tampil_data_hari'] 			= $this->M_session->select("SELECT * FROM blk_hari");
		$data['izpaket'] 					= $this->M_session->select_row("SELECT b.nama_paket FROM blk_jadwal_paket a JOIN blk_setting_paket b where a.id_paket='".$id."'")->nama_paket;

		$data['zid_paket'] = $id;

		$data['namamodule'] 	= "blk_jadwal2";
		$data['namafileview'] 	= "v_add_hari";
		echo Modules::run('template/blk_template', $data); 
	}

	function add_hari_simpan($id) {
		$hari 			= $this->input->post('hari');
		$materi 		= $this->input->post('materi');
		
		$materi_final 	= implode(",", $materi);

		$data = array(
			'hari' 		=> $hari,
			'materi' 	=> $materi_final,
			'paket_id'	=> $id
		);

		$this->M_session->insert($data, 'blk_jadwal_paketjadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	function add_hari_ubah($id) {
		$id2  			= $this->input->post('id');

		$hari 			= $this->input->post('hari');
		$materi 		= $this->input->post('materi');
		
		$materi_final 	= implode(",", $materi);

		$data = array(
			'hari' 		=> $hari,
			'materi' 	=> $materi_final
		);

		$this->M_session->update($data, 'blk_jadwal_paketjadwal', $id2, 'id_jadwal_paket_jadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	function add_hari_hapus($id) {
		$id2  			= $this->input->post('id');

		$this->M_session->delete('blk_jadwal_paketjadwal', $id2, 'id_jadwal_paket_jadwal');

		redirect('blk_jadwal2/add_hari/'.$id);
	}

	//============================ DATA JADWAL PER SENIN ===//
	function jadwal() {
	 	$jadwal 						= "SELECT 
							 				a.id_jadwal_data as id,
							 				a.paket_id as paket_id,
							 				d.nama_paket as nama,
							 				c.jam as jam,
							 				a.tanggal as tgl,
							 				a.instruktur_kode
							 				FROM blk_jadwal_data a
							 				LEFT JOIN blk_jadwal_paket b
							 				ON a.paket_id=b.id_paket
							 				LEFT JOIN blk_jam c
							 				ON b.jam=c.kode_jam 
							 				LEFT JOIN blk_setting_paket d
							 				ON b.nama_paket=d.id_setting_paket
							 				ORDER BY a.id_jadwal_data DESC
							 				";
	 	$data['tampil_data_jadwaldata'] = $this->M_session->select($jadwal);

	 	$paket 							= "SELECT a.id_paket, b.nama_paket FROM blk_jadwal_paket a LEFT JOIN blk_setting_paket b ON a.nama_paket=b.id_setting_paket";
	 	$data['tampil_data_paket'] 		= $this->M_session->select($paket);

	 	$data['tampil_data_minggu'] 	= $this->M_session->select("SELECT * FROM blk_minggu");
	 	$data['tampil_data_instruktur'] = $this->M_session->select("SELECT * FROM blk_instruktur");

	 	$tkw 								= "SELECT 
		 										personalblk.nodaftar as id,
		 										personalblk.nama as nama_hk,
		 										personal.nama as nama_tw 
		 										FROM personalblk 
		 										LEFT JOIN personal 
		 										ON personalblk.nodaftar=personal.id_biodata 
		 										WHERE (personal.statterbang is null && personalblk.statterbang is null )
		 										AND (statusaktif!='Mengundurkan diri' && statusaktif!='UNFIT')
												AND (personalblk.nodaftar not like 'MF%' && personalblk.nodaftar not like 'MI%' && personalblk.nodaftar not like 'FF%')
												ORDER BY personalblk.nodaftar ASC
	 										";
	 	$data['tampil_data_tkw'] 			= $this->M_session->select($tkw);

		$data['namamodule'] = "blk_jadwal2";
		$data['namafileview'] = "v_jadwal";
		echo Modules::run('template/blk_template', $data); 
	}

	function jadwal_add() {
		$pil_paket 		= $this->input->post('pil_paket');
		$pil_tgl 	 	= $this->input->post('pil_tgl');
		$pil_ins		= $this->input->post('pil_ins');

		$data = array (
			'paket_id' 			=> $pil_paket,
			'tanggal' 			=> $pil_tgl,
			'instruktur_kode' 	=> $pil_ins
		);
		$idins = $this->M_session->insert_return_id($data, 'blk_jadwal_data');

		//===============================
		$get_minggu = "SELECT minggu FROM blk_jadwal_paket where id_paket=".$pil_paket;
		$exm_minggu	= $this->M_session->select_row($get_minggu);

		$exp_minggu = explode(",", $exm_minggu->minggu);

		$angktan 		= "SELECT * FROM personal_angkatan";
		$qry_angkatan 	= $this->M_session->select($angktan);

		$data2 = array();
		for ($b=0; $b<count($exp_minggu); $b++) {
            $fnl_minggu = substr($exp_minggu[$b], 1);
			foreach ($qry_angkatan as $key) {
				$startpast = $key->date_angkatan;
	            $xnowday = date('Y-m-d');
	            $datetimeee = new DateTime($startpast);
	            $dayzz = $datetimeee->format('w');
	            if($dayzz == 1) {
	                $xfirstday  = $startpast;
	            } else {
	                $xfirstday  = date('Y-m-d', strtotime('next monday', strtotime($startpast)));
	            }
	            if ($xfirstday <= $xnowday) {
	                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            } elseif ($xfirstday >= $xnowday) {
	                $weekk = 0;
	            } else {
	                $weekk = 0;
	            }

            	if ($weekk == $fnl_minggu) {
					$zidbio 	= $key->nodaftar;
					$zangkatan 	= $weekk;
					$data2[] = array (
						'biodata_id' 		=> $zidbio,
						'angkatan' 			=> $zangkatan,
						'jadwal_data_id' 	=> $idins
					);
            	}
			}
		}

		$this->M_session->insert_batch($data2, 'blk_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal/');
	}

	function jadwal_detail($v_id, $v_hari) {
		$jadwal_data 						= "SELECT 
												*,
												d.hari,
												d.satuan 
												FROM blk_jadwal_data a 
												JOIN blk_jadwal_paket b 
												ON a.paket_id=b.id_paket 
												JOIN blk_jadwal_paketjadwal c 
												ON b.id_paket=c.paket_id 
												LEFT JOIN blk_hari d
												ON c.hari=d.kode_hari
												where a.id_jadwal_data='$v_id'
												AND c.hari='$v_hari'";
		$data['tampil_data_jadwal_data'] 	= $this->M_session->select($jadwal_data);


		$tkw2 								= "SELECT 
												*
												FROM blk_jadwal_data_tki a
												where a.jadwal_data_id='$v_id'";
		$data['tampil_data_tkw2'] 			= $this->M_session->select($tkw2);

		$data['gg_guru'] 		 			= $this->input->post('instruktur');

		$data['v_id'] = $v_id;
		$data['v_hari'] = $v_hari;

		$data['namamodule'] = "blk_jadwal2";
		$data['namafileview'] = "v_jadwal_detail";
		echo Modules::run('template/blk_template', $data); 
	}
/*
	function jadwal_detail_2($v_id, $v_hari) {
		$instruktur = $this->input->post('instruktur');

		$data = array (
			'instruktur_kode' => $instruktur
		);

		$this->M_session->insert($data, 'blk_jadwal_data');
	}*/

	function jadwal_detail_simpan() {
		$id 	 = $this->input->post('id');
		$datatkw = $this->input->post('dt_tkw');

		$data = array();
		for ($y=0; $y<count($datatkw); $y++) {
			$data[] = array (
				'biodata_id' 	 => $datatkw[$y],
				'tipe_data'  	 => 'manual',
				'jadwal_data_id' => $id
			);
		}

		$this->M_session->insert_batch($data, 'blk_jadwal_data_tki');

		redirect('blk_jadwal2/jadwal');
	}
/*
	function all_print2($v_id, $v_hari) {
		require_once 'assets/phpword/PHPWord.php';
		require_once 'assets/phpword/PHPWord/htmltodocx_htmlconverter.php';
		$PHPWord = new PHPWord();

		// New portrait section
		$section = $PHPWord->createSection();

		// Define table style arrays
		$styleTable = array('borderSize'=>6, 'borderColor'=>'000', 'cellMargin'=>80);
		$styleFirstRow = array('borderBottomSize'=>'4', 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');

		// Define cell style arrays
		$styleCell = array('valign'=>'center', 'size' => 6);
		$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

		// Define font style for first row
		$fontStyle = array('bold'=>true, 'align'=>'center');

		// Add table style
		$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

		$get_materi   = "SELECT 
						c.hari as hari,
						a.instruktur_kode as guru,
						c.materi as materi,
						a.tanggal as tanggal
						FROM blk_jadwal_data a 
						JOIN blk_jadwal_paket b 
						ON a.paket_id=b.id_paket
						JOIN blk_jadwal_paketjadwal c 
						ON b.nama_paket=c.paket_id
						WHERE a.id_jadwal_data='$v_id'
						AND c.hari='$v_hari'
						";
		$query_materi = $this->M_session->select($get_materi);

		// Add table
		$table = $section->addTable('myOwnTableStyle');

		// Add row
		$table->addRow(900);

		// Add cells
		$table->addCell(2000, $styleCell)->addText('HARI', $fontStyle);
		$table->addCell(2000, $styleCell)->addText('TGL', $fontStyle);
		$table->addCell(2000, $styleCell)->addText('GURU', $fontStyle);
		$table->addCell(2000, $styleCell)->addText('', $fontStyle);
		$table->addCell(2000, $styleCell)->addText('MATERI JOMPO', $fontStyle);
		$table->addCell(2000, $styleCell)->addText('T/P/S', $fontStyle);
		$table->addCell(2000, $styleCell)->addText('BUKU HAL.', $fontStyle);

		// Add more rows / cells
		foreach ($query_materi as $value) {

			$f_hari = $this->M_session->select_row("SELECT * FROM blk_hari where kode_hari='$value->hari'")->hari;
			$f_guru = $this->M_session->select_row("SELECT * FROM blk_instruktur where kode_instruktur='$value->guru'")->nama;
			$exp_materi = explode(",", $value->materi);


			$table->addRow();
			$table->addCell(2000)->addText($f_hari, $styleCell);
			$table->addCell(2000)->addText($f_guru, $styleCell);
			$table->addCell(2000)->addText( date("d/m/Y", strtotime($value->tanggal)) , $styleCell);

			for ($b=0; $b<count($exp_materi); $b++) {
				$exp_materi2 = explode("|-|", $exp_materi[$b]);

				$x_materi = $this->M_session->select_row("SELECT * FROM blk_pelajaran_jompo where kode_materi='$exp_materi2[0]'");

				$f_no 		= $f_materi.$b.'<div style="border-bottom:1px solid #000;"></div>';
				$f_materi 	= $f_materi.$x_materi->kode_materi.'-'.$x_materi->nama_materi.'<div style="border-bottom:1px solid #000;"></div>';
				$f_ket 		= $f_materi.$x_materi->keterangan.'<div style="border-bottom:1px solid #000;"></div>';
				$f_buku 	= $f_materi.$x_materi->buku_hal.'<div style="border-bottom:1px solid #000;"></div>';
			}

			$table->addCell(2000)->addListItem($f_no, $styleCell);
			$table->addCell(2000)->addListItem($f_materi, $styleCell);
			$table->addCell(2000)->addListItem($f_ket, $styleCell);
			$table->addCell(2000)->addListItem($f_buku, $styleCell);
		}


		// Save File
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save('2AdvancedTable.docx');

	}
*/
	function all_print($v_id, $v_hari) {

		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/new_jadwal2_jompo.docx');

		$get_materi   = "SELECT 
						c.hari as hari,
						a.instruktur_kode as guru,
						c.materi as materi,
						a.tanggal as tanggal,
						b.jam as jam
						FROM blk_jadwal_data a 
						JOIN blk_jadwal_paket b 
						ON a.paket_id=b.id_paket
						JOIN blk_jadwal_paketjadwal c 
						ON b.nama_paket=c.paket_id
						WHERE a.id_jadwal_data='$v_id'
						AND c.hari='$v_hari'
						";
		$query_materi = $this->M_session->select_row($get_materi);

		$value = $query_materi;

		$f_hari = $this->M_session->select_row("SELECT * FROM blk_hari where kode_hari='$value->hari'")->hari;
		$f_guru = $this->M_session->select_row("SELECT * FROM blk_instruktur where kode_instruktur='$value->guru'")->nama;
		$f_tgl 	= date("d/m/Y", strtotime($value->tanggal));
		$exp_materi = explode(",", $value->materi);
		
		$exp_jam = explode(",", $value->jam);
		if (count($exp_jam) == 1) {
			$f_jam1  = $this->M_session->select_row("SELECT * FROM blk_jam where kode_jam='$exp_jam[0]'")->jam;
			$f_jam 	 = $f_jam1;
		} elseif (count($exp_jam) == 2) {
			$f_jam1  = $this->M_session->select_row("SELECT * FROM blk_jam where kode_jam='$exp_jam[0]'")->jam;
			$f_jam2  = $this->M_session->select_row("SELECT * FROM blk_jam where kode_jam='$exp_jam[1]'")->jam;
			$f_jam 	 = $f_jam1.' - '.$f_jam2;
		}

		$f_materi = "";


		$document->setValue('xxhari', $f_hari);
		$document->setValue('jam', $f_jam);

		$document->cloneRow('val1',count($exp_materi));
		$nn=1;
		for ($b=0; $b<count($exp_materi); $b++) {
			$exp_materi2 = explode("|-|", $exp_materi[$b]);
			$x_materi = $this->M_session->select_row("SELECT * FROM blk_pelajaran_jompo where kode_materi='$exp_materi2[0]'");
			if ($b == 1) {
				$f_hari = "";
				$f_guru = "";
				$f_tgl  = "";
			}

		    $document->setValue('val1#'.$nn, $f_hari);
		    $document->setValue('val2#'.$nn, $f_tgl);
		    $document->setValue('val3#'.$nn, $f_guru);

		    $document->setValue('val4#'.$nn, $b);
		    $document->setValue('val5#'.$nn, $x_materi->kode_materi.'-'.$x_materi->nama_materi);
		    $document->setValue('val6#'.$nn, $x_materi->keterangan);
		    $document->setValue('val7#'.$nn, $x_materi->buku_hal);
		$nn++;
		}



		$get_tkw   = "SELECT 
						biodata_id
						FROM blk_jadwal_data_tki
						WHERE jadwal_data_id='$v_id'
						";
		$query_tkw = $this->M_session->select($get_tkw);

		$document->cloneRow('no',count($query_tkw));

		$nn = 1;
		foreach($query_tkw as $value2) {
			
            $sektor 		= substr($value2->biodata_id, 2, 0);
            $biodata_nama 	= "";
            if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
                $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$value2->biodata_id'");
                $biodata_nama    = $ambil_tw->nama;
            } else {
                $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$value2->biodata_id'");
                $biodata_nama    = $ambil_hk->nama;
            }

		    $document->setValue('no#'.$nn, $nn);
		    $document->setValue('id#'.$nn, $value2->biodata_id);
		    $document->setValue('xxnama#'.$nn, $biodata_nama);
		$nn++;
		}

		$filename = 'filenya.docx';

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