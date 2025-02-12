<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_finger_new extends MX_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_session');
    }

    function index()
    {
        $data['namamodule']     = "blk_finger_new";
        $data['namafileview']   = "finger_new";
        echo Modules::run('template/blk_template', $data);
    }

	function manual(){
		$data['namamodule']     = "blk_finger_new";
        $data['namafileview']   = "manual";
        echo Modules::run('template/blk_template', $data);
	}

    function maintenance()
    {
        $data['namamodule']     = "blk_finger_new";
        $data['namafileview']   = "finger_new2";
        echo Modules::run('template/blk_template', $data);
    }
    
    private function ToInsert($array, $table = 'test', $wht = '') {
        if (count($array) > 0) {
            $firstElement = $array[0];
            $y = array_keys($firstElement);
            $x = 'INSERT INTO ' . $table . ' (' . implode(', ', array_map(function($u) {
                return '`' . $u . '`';
            }, $y)) . ')';
    
            $x .= "\nSELECT " . implode(', ', array_map(function($g) {
                return 'a.' . $g;
            }, $y)) . ' FROM (';
    
            $x .= implode(" \nUNION ALL \n", array_map(function($w) use ($y) {
                $f = 'SELECT ';
                $f .= implode(',', array_map(function($q) use ($w) {
                    if (isset($w[$q])) {
                        return '"' . str_replace('"', '\\"', $w[$q]) . '" `' . $q . '`';
                    } else {
                        return '"-" `' . $q . '`';
                    }
                }, $y));
                return $f;
            }, $array));
    
            $x .= ') a';
    
            if (is_array($wht) && !empty($wht)) {
                $x .= "\nLEFT JOIN " . $table . ' ON ';
                $x .= implode(" \nAND ", array_map(function($whtx) use ($table) {
                    return $table . '.' . $whtx . ' = a.' . $whtx;
                }, $wht));
    
                $x .= "\nWHERE ";
                $x .= implode(" \nAND ", array_map(function($whtx) use ($table) {
                    return $table . '.' . $whtx . ' IS NULL';
                }, $wht));
            }
    
            return $x;
        } else {
            return [];
        }
    }

    
    function simpanabsen(){
		$insert = $this->ToInsert($_POST['data'], "tblattendance",["idblk","dteDate","tmeTime","waktu"]);
        $this->db->query($insert);
        $data5 = array (
			'timestamp' => $_POST['tgl'],
			'resource_file' => date('Ymdhis'),
		);
		if($_POST['m'] === $_POST['n']){
        	$cek = $this->M_session->insert_return_id($data5, 'blk_new_finger_tki');
		}
		echo(json_encode(["status"=>"success"]));
    }

	function show_index()
	{
		$tampil_data = $this->M_session->select("SELECT
												a.*
												FROM blk_new_finger_tki as a
												ORDER BY a.id DESC");
		echo( json_encode($tampil_data,true) );
	}
	
	public function show_after_upload()
	{
		$data['success'] = FALSE;
		$data['message'] = 'Terjadi Kesalahan';

		$this->load->library('upload');
		$nmfile ='e_'.time().$this->input->post('userfile');
		$configUpload['upload_path'] = asset_url('blk_finger_new');
        $configUpload['allowed_types'] = '*';
		$configUpload['file_name'] = strtolower($nmfile);

		$this->upload->initialize($configUpload);	

		if ( isset($_FILES['userfile']['name']) ) 
		{
			if ($this->upload->do_upload('userfile')) 
			{
				$upload_data 	= $this->upload->data();
				$file_name 		= $upload_data['file_name'];
				$extension		= $upload_data['file_ext'];

				$tgl_data 		 = $this->add_tgl_to_db($file_name);
				if ( $tgl_data != NULL )
				{
					$data['tahunbulan'] = $tgl_data;
					$data['success'] = TRUE;
					$data['message'] = 'Sukses';
				}
			}
			else
			{/*
				print_r($_FILES);
				print_r($configUpload);
				print_r($this->upload->do_upload('userfile') );*/
                echo '<pre>';
				print_r($this->upload);
				echo 'd2 '.$this->upload->display_errors();
			}
		}
		else
		{
			echo 'd1';
		}

		redirect('blk_finger_new');
    }
    
	function add_tgl_to_db($file_name) 
	{
		$this->load->library("PHPExcel");

		$inputFileName 	= asset_url('blk_finger_new/'.$file_name);
        
		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');	

        $objReader->setReadDataOnly(true); 

		$objPHPExcel	= $objReader->load($inputFileName);		 
        $objWorksheet	= $objPHPExcel->setActiveSheetIndex(0);

        $tgl = $objWorksheet->getCellByColumnAndRow(1,2)->getValue();

        $tgl_exp = explode(" ~ ", $tgl);

		$tgl_exp2 = explode("-", str_replace( '/', '-', $tgl_exp[0]) );

		$year = $tgl_exp2[0];
		$month = $tgl_exp2[1];

		$tgl_final = $year.'-'.$month;

		$data5 = array (
			'timestamp' => $tgl_final,
			'resource_file' => $file_name,
		);	

		$finger_count = $this->M_session->select_count("blk_new_finger_tki WHERE timestamp='$tgl_final'");

		$hasil = "";
		//if ( $finger_count == 0 ) 
		//{
			$cek = $this->M_session->insert_return_id($data5, 'blk_new_finger_tki');

			if ( $cek != NULL )
			{
				$save_db = $this->save_data_to_db($cek);
				if ( $save_db == TRUE )
				{
					$hasil = $tgl_final;
				}
			}
		//}
        return $hasil;
	}

	function save_data_to_db($id)
	{
		$ambil_f_kalender = $this->M_session->select_row("SELECT * FROM blk_new_finger_tki where id='".$id."'");

		$this->load->library("PHPExcel");

		$inputFileName 	= asset_url('blk_finger_new/'.$ambil_f_kalender->resource_file);

		$objReader 		= PHPExcel_IOFactory::createReader('Excel5');

		$objPHPExcel	= $objReader->load($inputFileName);
        $totalrows		= $objPHPExcel->setActiveSheetIndex(2)->getHighestDataRow();

        //$totalrows_new 	= ($totalrows - 4);

        $objWorksheet	= $objPHPExcel->setActiveSheetIndex(2);

		var_dump($objWorksheet);
		die();

        $tanggal_excel = $objWorksheet->getCellByColumnAndRow(2,3)->getValue();
        $tanggal_excel_exp = explode(" ~ ", $tanggal_excel);
        $tanggalnews = strtotime( str_replace('/', '-', $tanggal_excel_exp[0]) );
    	$last_date = date('t', $tanggalnews );
    	$year = date('Y', $tanggalnews);
        $month = date('m', $tanggalnews);

		$stateflag = FALSE;
        for( $i=5; $i<=$totalrows; $i++ )
        {
    		//echo $id_finger.'<br/>';
        	if ( ($i%2) == 1 )
        	{
        		$p = $i;
        		$id_finger = $objWorksheet->getCellByColumnAndRow(2,$p)->getValue();
				$pjng = strlen($id_finger);
                $id_first = substr($id_finger, 0, 1);
                $id_last = substr($id_finger, 1);

                $list_sektor = [
                    1 => 'FF-',
                    2 => 'FI-',
                    3 => 'JP-',
                    4 => 'MF-',
                    5 => 'MI-',
                    6 => 'HK-',
                    7 => 'S-',
                    8 => 'TS-',
                    9 => 'MH-',
                    10 => 'FH-',
                    11 => 'MC-',
                    12 => 'IM-',
                ];
                if (!array_key_exists($id_first, $list_sektor ) || $pjng < 5) 
                {
                    continue;
                }
                $kid = $list_sektor[$id_first].$id_last;
        		// $check_deleted = $this->M_session->select_row("SELECT * FROM personalblk where nodaftar='".$kid."'");

				$stateflag = TRUE;
        		if ( $check_deleted != NULL )
        		{
        			$stateflag = TRUE;
        		}
        	}

        	if ( ($i%2) == 0 && $stateflag == TRUE)
        	{
        		$x = $i;
        		for ( $u=0; $u<$last_date; $u++ )
        		{
        			$n = $u+1;
        			$tgl = $objWorksheet->getCellByColumnAndRow($u,$x)->getValue();
                    if ($tgl != "" && $tgl != NULL)
                    {
                        $tgl_split = explode(PHP_EOL, $tgl);
                        foreach ( $tgl_split as $tgl_split_key => $tgl_split_row )
                        {
                            $xwaktu = 'sore';
                            if ( $tgl_split_row < 11.00 )
                            {
                                $xwaktu = 'pagi';
                            }
                            else if ( $tgl_split_row < 13.00 )
                            {
                                $xwaktu = 'siang';
                            }
                            if ($tgl_split_row != "" )
                            {
								$nlong = strlen($n);
								if ($nlong == 1)
								{
									$n = '0'.$n;
								}
                                // $datada = $this->M_session->select_count('tblattendance WHERE dteDate="'.$year.'-'.$month.'-'.$n.'" AND waktu="'.$xwaktu.'" AND idblk="'.$kid.'"');
   
                                // if ($datada == 0)
                                // {
                                //     $data_array_finalization = array(
                                //         'idblk'			        => $kid,
                                //         'dteDate'			    => $year.'-'.$month.'-'.$n,
                                //         'tmeTime'			    => $tgl_split_row,
                                //         'waktu'			        => $xwaktu,
                                //         'rec'			        => date("Y-m-d H:i:s"),
                                //     );
								// 	// var_dump($data_array_finalization);
                                //     // $this->M_session->insert($data_array_finalization, "tblattendance");
                                // }
                            }
                        }
                    }
        		}
        	}
        }

        return TRUE;

	}

	public function btn_force_save_again($id)
	{
		error_reporting(E_ALL & ~E_NOTICE);
		$d = $this->save_data_to_db($id);
		// redirect('blk_finger_new');
	}
//============================================================//

	public function database()
	{
		$ambil_data_tki 		 = "SELECT * FROM personalblk ORDER BY nodaftar";
		$data['tampil_data_tki'] = $this->db->query($ambil_data_tki)->result();
        $data['namamodule']     = "blk_finger_new";
        $data['namafileview']   = "database";
        echo Modules::run('template/blk_template', $data);
	}

	public function pegawai(){
		echo json_encode(
			$this->M_session->fingerspot_select("
				SELECT
				*
				FROM pegawai
				ORDER BY pegawai_pin ASC
			")
		);
	}

	public function database_get()
	{
		$r = $this->M_session->fingerspot_select("SELECT
		*
		FROM pegawai
		ORDER BY pegawai_pin ASC");
		$e = '';
		foreach($r as $v)
		{
			$e .= '
				<tr>
					<td>'.$v->pegawai_pin.'</td>
					<td>'.$v->pegawai_nama.'</td>
					<td><button class="btn btn-danger btn_hapus" data-id="'.$v->pegawai_pin.'" >HAPUS</button></td>
				</tr>
			';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($e));

	}

	public function database_simpan()
	{
		$datatki = $this->input->post('datatki');
		$format = [
			'FF' => 1,
			'FI' => 2,
			'JP' => 3,
			'MF' => 4,
			'MI' => 5,
			'HK' => 6,
			'S'  => 7,
			'TS' => 8,
			'MH' => 9,
			'FH' => 10,
			'MC' => 11,
		];
		$otherdb = $this->load->database('forum', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
		foreach($datatki as $r)
		{
			$zz = explode(' .-. ',$r);
			$xx = explode('-', $zz[0]);
			$yy = $format[$xx[0]];
			$r = $yy.$xx[1];
			$s = $zz[1];
			$d = $otherdb->query("SELECT count(*) as count FROM pegawai WHERE pegawai_pin=$r")->row();
			if ($d->count == 0)
			{
				$data = [
					'pegawai_pin' => $r,
					'pegawai_nama' => $s,
					'pegawai_alias' => $s,
				];
				$this->M_session->fingerspot_checkinsertbatch($data);
			}
		}
		
		redirect('blk_finger_new/database');
	}

	public function database_hapus()
	{
		$datatki = $this->input->post('id');
		$this->M_session->fingerspot_delete($datatki);
		$this->output->set_content_type('application/json')->set_output(json_encode(['SUCCESS']));
	}
	//============================================================//

	public function cetak() {
        $data['namamodule']     = "blk_finger_new";
        $data['namafileview']   = "cetak";
        echo Modules::run('template/blk_template', $data);
	}
	
	public function getDatesFromRange($start, $end,$id, $format = 'Y-m-d') {
      
		  
		// Variable that store the date interval
		// of period 1 day
		$interval = new DateInterval('P1D');
	  
		$realEnd = new DateTime($end);
		$realEnd->add($interval);
	  
		$period = new DatePeriod(new DateTime($start), $interval, $realEnd);
	  
		// Use loop to store date into array
		foreach($period as $date) {                 
			$this->iparray[$id][$date->format($format)] = 'IP'; 
		}
	}

	public function cetakhasil() {
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');
		$tglawal='01';
		$tglakhir=cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
		$bln = sprintf('%02d', $bulan);
		$date1 = $tahun.'-'.$bln.'-'.$tglawal;
		$date2 = $tahun.'-'.$bln.'-'.$tglakhir;
		//echo $date1.''.$date2;
		$sql = "SELECT DISTINCT (
			idblk
			) AS usernya, personal.nama AS nama, personalblk.nama AS namahk
			FROM tblattendance
			LEFT JOIN personalblk ON tblattendance.idblk = personalblk.nodaftar
			LEFT JOIN personal ON personalblk.nodaftar = personal.id_biodata
			WHERE DATE( dteDate ) BETWEEN '$date1' AND '$date2' ORDER BY `usernya` ASC";
		
		$tampil_data = $this->M_session->select($sql);

        $this->load->library("PHPExcel");
        $objPHPExcel  = new PHPExcel();
        $objReader    = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load("files/cetak_fingerspot.xlsx");
        $objWorksheet = $objPHPExcel->getSheet(0);
        //$objWorksheet->insertNewRowBefore(4, (count($tampil_data)-1));

		$alphas = array();
		$letter = 'D';
		while ($letter !== 'AI') {
			$alphas[] = $letter++;
		}

		$noo = 3;
		foreach($tampil_data as $v) {
			$ubah_tipe = substr($v->usernya, 0, 2);
			if (
				$ubah_tipe == 'FI' 
				|| $ubah_tipe == 'FF' 
				|| $ubah_tipe == 'MF' 
				|| $ubah_tipe == 'MI' 
				|| $ubah_tipe == 'JP'
				|| $ubah_tipe == 'HK'
				|| $ubah_tipe == 'MC'
				|| $ubah_tipe == 'MH'
				|| $ubah_tipe == 'FH'
				|| $ubah_tipe == 'MH'
				|| $ubah_tipe == 'FH'
			) {
				$nama_tki = $v->nama;
			} else {
				$nama_tki = $v->namahk;
			}
			
			$tglterbang = $this->M_session->getDataWhere("tglberangkat","visa","id_biodata='$v->usernya'");
			$tglterbang = str_replace(".","-",$tglterbang);
			$tglmd = $this->M_session->getDataWhere("statusaktif","personal","id_biodata='$v->usernya' and statusaktif='MENGUNDURKAN DIRI'");
			$sql = "SELECT count(*) as hasil
				FROM tblattendance
				WHERE idblk = '$v->usernya' AND DATE( dteDate ) BETWEEN '$date1' AND '$date2'";
			$count = $this->M_session->select_row($sql);
			$objWorksheet->setCellValue('A'.$noo, $v->usernya);
			$objWorksheet->setCellValue('B'.$noo, $nama_tki);
			$objWorksheet->setCellValue('C'.$noo, $count->hasil);
			
			$statsebelumnya = "-";
			
			for($z=1;$z<=$tglakhir;$z++) {
				$objWorksheet->setCellValue($alphas[$z-1].'2', $z);

				$tgledit = $tahun.'-'.$bln.'-'.sprintf('%02d', $z);
				$w = $this->M_session->select_row("SELECT tmeTime FROM tblattendance where idblk='$v->usernya' and dteDate='$tgledit' and (waktu='pagi' or waktu='sore') ORDER BY dteDate ASC");
				
				$dt = '-';
				if ($tglterbang != "") {
					if (strtotime($tglterbang) <= strtotime($tgledit)) {
						for($zz=$z;$zz<=$tglakhir;$zz++) {
							$objWorksheet->setCellValue($alphas[$zz-1].$noo, 'TR');
						}
						break;
					}
				}
				if ($tglmd != "") {
					if(!isset($w->tmeTime)) {
						for($zz=$z;$zz<=$tglakhir;$zz++) {
							$objWorksheet->setCellValue($alphas[$zz-1].$noo, 'MD');
						}
						break;
					}
				}
				if(isset($w->tmeTime)) {
					$ipz = $this->M_session->getDataWhere("tglkeluar","blk_izin_pulang","nodaftar='".$v->usernya."' AND YEAR(tglkeluar)='".$tahun."' AND MONTH(tglkeluar)='".$bln."' ORDER BY tglkeluar DESC");
					
					$dt = $w->tmeTime;
					$dt = date('g:i', strtotime($dt));
					$statsebelumnya = '-';
					if ($tgledit == $ipz) {
						$dt = 'IP';
						$statsebelumnya = 'IP';
					}
				} else if ($statsebelumnya == "IP") {
					$dt = "IP";
					$statsebelumnya = 'IP';
				} else if ($statsebelumnya == "PKL") {
					$dt = "PKL";
					$statsebelumnya = 'PKL';
				} else if ($statsebelumnya == "PAP") {
					$dt = "PAP";
					$statsebelumnya = 'PAP';
				} else if ($statsebelumnya == "TETO") {
					$dt = "TETO";
					$statsebelumnya = 'TETO';
				} else if ($z == 1) {
					$onethn = $tahun;
					if ($bln > 1) {
						$bnbln = $bln-1;
						$onebln = "MONTH(tglkeluar)<='$bnbln'";
					} else {
						$bnbln = 12;
						$onebln = "MONTH(tglkeluar)<='$bnbln'";
						$onethn = $tahun - 1;
					}
					$tgleditsebelumnya = $onethn.'-'.sprintf('%02d', $bnbln).'-'.sprintf('%02d', $z);
					
					$attz = $this->M_session->getDataWhereCount("tmeTime","tblattendance","idblk='$v->usernya' and dteDate>'$tgleditsebelumnya' and dteDate<='$tgledit' and (waktu='pagi' or waktu='sore') ORDER BY dteDate ASC");
					
					$dt = '-';
					$statsebelumnya = '-';
					if ($attz == 0) {
						$dt = 'IP';
						$statsebelumnya = 'IP';
					}
				} else {
					$ipz = $this->M_session->getDataWhere("tglkeluar","blk_izin_pulang","nodaftar='".$v->usernya."' AND YEAR(tglkeluar)='".$tahun."' AND MONTH(tglkeluar)='".$bln."' ORDER BY tglkeluar DESC");
					$zpkl = $this->M_session->getDataWhere("tglmulai","blk_dkrh_kegiatanluar","id_biodata='".$v->usernya."' AND tipe='pkl' AND YEAR(tglmulai)='".$tahun."' AND MONTH(tglmulai)='".$bln."' ORDER BY tglmulai DESC");
					$zpap = $this->M_session->getDataWhere("tglmulai","blk_dkrh_kegiatanluar","id_biodata='".$v->usernya."' AND tipe='pap' AND YEAR(tglmulai)='".$tahun."' AND MONTH(tglmulai)='".$bln."' ORDER BY tglmulai DESC");
					$zpap = $this->M_session->getDataWhere("tglmulai","blk_dkrh_kegiatanluar","id_biodata='".$v->usernya."' AND tipe='teto' AND YEAR(tglmulai)='".$tahun."' AND MONTH(tglmulai)='".$bln."' ORDER BY tglmulai DESC");
					
					$dt = "-";
					$statsebelumnya = '-';
					if ($tgledit == $ipz) {
						$dt = 'IP';
						$statsebelumnya = 'IP';
					} elseif ($tgledit == $zpkl) {
						$dt = "PKL";
						$statsebelumnya = 'PKL';
					} elseif ($tgledit == $zpap) {
						$dt = "PAP";
						$statsebelumnya = 'PAP';
					} elseif ($tgledit == $zpap) {
						$dt = "TETO";
						$statsebelumnya = 'TETO';
					}
				}
				$objWorksheet->setCellValue($alphas[$z-1].$noo, $dt);
				
			}
			//echo '<br/>';
			
		$noo++;
		}

        $date = gmdate("D, d M Y H:i:s");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$tahun.'-'.$bulan.'.xlsx"');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        //ob_end_clean();
        $objWriter->save("php://output");
	}

	function daftarabsensi(){
		$data['namamodule']     = "blk_finger_new";
        $data['namafileview']   = "daftarabsensi";
        echo Modules::run('template/blk_template', $data);
	}
}
