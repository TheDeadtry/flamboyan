<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_laporan extends MX_Controller {
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}/*
	
	function index() 
	{
		redirect('blk_jadwal/pelajaran');
	}*/

	//===============================================================================================================//
	/*
	function finger() 
	{
		$pil_tki = $this->session->userdata('finger_search_tki');

		$data['u_finger_pil_id'] = $pil_tki;

		$ambil_data_tki 		 = "SELECT distinct(idblk) as id FROM tblattendance ORDER BY idblk";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['data_idbio']		 = $this->M_session->select("SELECT distinct(personalblk.nodaftar), personal.nama as twnama, personalblk.nama as hknama FROM personalblk LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata");

		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "finger/finger";
		echo Modules::run('template/blk_template',$data);
	}

	function finger_show_data() 
	{
		$columns_d1 = array(
			'personalblk.nodaftar',
			'personalblk.nama',
			'personal.nama',
		);

		$where = datatable_where( $columns_d1, $_POST['search']['value'] );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$sql = "SELECT 
				personalblk.nodaftar as id,
		    	personalblk.nama as nama_hk,
		    	personal.nama as nama_tw
		    	FROM personalblk
		    	LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata 
		    	$where 
		    	order by nodaftar ASC 
		    	$limit";
		
	 	$tampil_data_finger = $this->M_session->select($sql);

		$data2 	= array();
		$no 	= intval($_POST['start']);
		foreach ($tampil_data_finger as $row) {
			$no++;

			$pagi 	= $this->M_session->select_count("tblattendance WHERE idblk='".$row->id."' and waktu='pagi'");
			$siang 	= $this->M_session->select_count("tblattendance WHERE idblk='".$row->id."' and waktu='siang'");
			$sore 	= $this->M_session->select_count("tblattendance WHERE idblk='".$row->id."' and waktu='sore'");

			$highest_number = max( $pagi, $siang, $sore);

            $ubah_tipe = substr($row->id, 0, 2);
            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                $nama_tki = $row->nama_tw;
            } else {
				$nama_tki = $row->nama_hk;
            }

			array_push($data2,
				array(
					$no,
					$row->id,
					$nama_tki,
					$highest_number, 
					'<a class="show_detail" data-id="'.$row->id.'")><span class="label label-warning">Finger Detail</span></a>'
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				personalblk
		    	LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata 
		    	$where 
			");

		$recordsTotal =  $this->M_session->select_count("
				personalblk
			");

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

	function finger_detail($id_tki) {
		$ambil_data_rekap_finger = $this->M_session->select("SELECT distinct month(dteDate) as bulan, year(dteDate) as tahun FROM tblattendance WHERE idblk='$id_tki'");

		$data['tampil_data_rekap_finger'] = $ambil_data_rekap_finger;
		$data['id_tki']					  = $id_tki;
		$data['tampil_data_pmi'] 		  = $this->M_session->select("SELECT a.nodaftar, a.nama as nontaiwan_nama, b.nama as taiwan_nama FROM personalblk a LEFT JOIN personal b ON a.nodaftar=b.id_biodata ORDER BY a.nodaftar ASC");

		$data['namamodule'] 	= "blk_rekapitulasi";
		$data['namafileview'] 	= "finger_detail";
		echo Modules::run('template/blk_template',$data);
	}

	function finger_detail_add($id_tki) 
	{
		$idblk = $id_tki;
		$dates = $this->input->post('dteDate');
		$date2 = $this->input->post('dteDate2');
		$waktu = $this->input->post('waktuJam');

		if ( $dates > $date2 )
		{
			exit('error12');
		}
		echo '<pre>';
		$datetime1 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) ) );
		$datetime2 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $date2) ) ) );

		$interval = $datetime1->diff($datetime2);
		$selisih = $interval->format('%a');

		$data = array();
		for ( $k=0; $k<=$selisih; $k++ ) 
		{
			for ( $i=0; $i<count($waktu); $i++ ) 
			{
				$waktu_exp = explode(',', $waktu[$i]);

				$dates_new = date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) );
				$dates_pls = date('Y-m-d', strtotime($dates_new . "+" . $k . " days") );

				$cek_ada = $this->M_session->select_row(" SELECT count(*) as total FROM tblattendance WHERE idblk='".$idblk."' AND dteDate='".$dates_pls."' AND waktu='".$waktu_exp[0]."' ");

				if ( $waktu_exp[0] == 'pagi' ) {
					$qq_jam = '07:00:00';
				} elseif ( $waktu_exp[0] == 'sore' ) {
					$qq_jam = '18:30:00';
				} else {
					exit('error33');
				}

				if ( $cek_ada->total == 0 ) 
				{
					$data[] = array
					(
						'idblk' => $idblk,
						'dteDate' => $dates_pls,
						'tmeTime' => $qq_jam,
						'waktu' => $waktu_exp[0],
						'rec' => date('Y-m-d H:i:s'),
					);
				}
			}	
		}

		//print_r($data);

		if ( $data != NULL ) 
		{
			$ty = $this->M_session->insert_batch($data, 'tblattendance');
			if ( $ty == TRUE ) 
			{
				redirect('blk_rekapitulasi/finger_detail/'.$idblk);
			}
			else
			{
				exit('error26');
			}
		}
	}

	function finger_detail_add_2()
	{
		$idblk = $this->input->post('idbiopil');
		$dates = $this->input->post('dteDate');
		$date2 = $this->input->post('dteDate2');
		$waktu = $this->input->post('waktuJam');

		if ( $dates > $date2 )
		{
			exit('error12');
		}
		
		$datetime1 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) ) );
		$datetime2 = new DateTime( date('Y-m-d', strtotime( str_replace(".", "-", $date2) ) ) );

		$interval = $datetime1->diff($datetime2);
		$selisih = $interval->format('%a');

		$data = array();
		for ( $k=0; $k<=$selisih; $k++ ) 
		{
			for ( $i=0; $i<count($waktu); $i++ ) 
			{
				$waktu_exp = explode(',', $waktu[$i]);

				$dates_new = date('Y-m-d', strtotime( str_replace(".", "-", $dates) ) );
				$dates_pls = date('Y-m-d', strtotime($dates_new . "+" . $k . " days") );

				$cek_ada = $this->M_session->select_row(" SELECT count(*) as total FROM tblattendance WHERE idblk='".$idblk."' AND dteDate='".$dates_pls."' AND waktu='".$waktu_exp[0]."' ");

				if ( $waktu_exp[0] == 'pagi' ) {
					$qq_jam = '07:00:00';
				} elseif ( $waktu_exp[0] == 'sore' ) {
					$qq_jam = '18:30:00';
				} else {
					exit('error33');
				}

				if ( $cek_ada->total == 0 ) 
				{
					$data[] = array
					(
						'idblk' => $idblk,
						'dteDate' => $dates_pls,
						'tmeTime' => $qq_jam,
						'waktu' => $waktu_exp[0],
						'rec' => date('Y-m-d H:i:s'),
					);
				}
			}	
		}

		//print_r($data);

		if ( $data != NULL ) 
		{
			$ty = $this->M_session->insert_batch($data, 'tblattendance');
			if ( $ty == TRUE ) 
			{
				redirect('blk_rekapitulasi/finger');
			}
			else
			{
				exit('error26');
			}
		}
	}*/
	//--------------------------------------------------------------------------------------------------//
	function finger_waktu() 
	{
		$pil_tki = $this->session->userdata('finger_search_tki');

		$data['u_finger_pil_id'] = $pil_tki;

		$ambil_data_tki 			= "SELECT distinct(idblk) as id FROM tblattendance ORDER BY idblk";
		$data['tampil_data_tki'] = $this->M_session->select($ambil_data_tki);

		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "finger/finger_waktu";
		echo Modules::run('template/blk_template',$data);
	}

	function finger_waktu_read() 
	{
		$validasi = array
		(
			array('field'=>'tgl','label'=>'1','rules'=>'required'),
			array('field'=>'waktu','label'=>'2','rules'=>'required'),
		);
		$this->form_validation->set_rules($validasi);
		if ($this->form_validation->run()===FALSE) 
		{
			$info['success'] = FALSE;
			$info['message'] = validation_errors();
		} 
		else 
		{
			$info['success'] = TRUE;

			$tgl 	= $this->input->post('tgl');
	        $waktu 	= $this->input->post('waktu');

	        if ( $waktu == 'pagi' ) {
	        	$whee = "and tmeTime between '06:00:00' and '10:00:00' ";
	        } else if ( $waktu == 'siang' ) {
	        	$whee = "and tmeTime between '10:00:01' and '15:00:00' ";
	        } else if ( $waktu == 'sore' ) {
	        	$whee = "and tmeTime between '15:00:01' and '22:00:00' ";
	        }

			$where_dd 	= "where a.dteDate='".$tgl."' ".$whee;

			$tampil_data = $this->M_session->select("SELECT 
													a.idblk as id, 
													a.dteDate, 
													a.tmeTime, 
													b.nama as non_nama, 
													c.nama as taiwan_nama
													FROM tblattendance a 
													LEFT JOIN personalblk b 
													ON a.idblk=b.nodaftar 
													LEFT JOIN personal c 
													ON a.idblk=c.id_biodata 
													$where_dd 
													ORDER BY a.idblk ASC");

	        $no 	= 0;
	        $hasil 	= "";
		    foreach ($tampil_data as $row) 
		    {

	            $no++;
	            $hasil .= '<tr>';
	            $hasil .= '<td>'.$no.'</td>';
	            $hasil .= '<td>'.$row->id.'</td>';

                $ubah_tipe = substr($row->id, 0, 2);
                if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') 
                {
	            	$hasil .= '<td>'.$row->taiwan_nama.'</td>';
                } 
                else 
                {
	            	$hasil .= '<td>'.$row->non_nama.'</td>';
                }
	            $hasil .= '<td>'.$row->dteDate.'</td>';
	            $hasil .= '<td>'.$row->tmeTime.'</td>';
	            $hasil .= '</tr>';

	        }
	        $info['table'] = $hasil;

		}
		$this->output->set_content_type('application/json')->set_output(json_encode( $info ) );
	}
	//===============================================================================================================//

	//===============================================================================================================//=
	function pembinaan()
	{
		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "pembinaan/pembinaan";
		echo Modules::run('template/blk_template',$data);
	}

	function pembinaan_read()
	{
		$sql = $this->M_session->select("
			SELECT
			id, nodaftar, tgl, data 
			FROM blk_pembinaan
		");
	}
	//===============================================================================================================//

	//===============================================================================================================//
	function dataabsen()
	{
		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "absen/absen";
		echo Modules::run('template/blk_template',$data);
	}

	function dataabsen_biayamakan()
	{
		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "absen/absen_biayamakan";
		echo Modules::run('template/blk_template', $data); 
	}

	function dataabsen_biayakategori()
	{
		$data['tampil_data_pemilik'] = $this->M_session->select("SELECT * FROM blk_pemilik");

		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "absen/absen_biayakategori";
		echo Modules::run('template/blk_template', $data); 
	}

	function dataabsen_print()
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("blk/blk_laporan/dataabsen.docx") );

		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');

		$dat1 = date('d/m/Y', strtotime( $date1 ));
		$dat2 = date('d/m/Y', strtotime( $date2 ));

		$document->setValue('value7',$dat1);
		$document->setValue('value8',$dat2);

		$ambildata1= $this->M_session->select(
			"SELECT 
			DISTINCT (idblk) AS usernya, 
			personal.nama AS nama_tw, 
			personalblk.nama AS nama_hk, 
			blk_pemilik.isi AS nama_pemilik, 
			blk_pemilik.negara AS negara
			FROM tblattendance
			LEFT JOIN personalblk ON tblattendance.idblk = personalblk.nodaftar
			LEFT JOIN blk_pemilik ON personalblk.pemilik = blk_pemilik.id_pemilik
			LEFT JOIN personal ON personalblk.nodaftar = personal.id_biodata
			WHERE dteDate BETWEEN '$date1' AND '$date2' ORDER BY 'usernya' ASC"
		);

		$document->cloneRow('value1',count($ambildata1));

		$nn=1;
		foreach($ambildata1 as $row) {
			$zyxpilsek = substr( $row->usernya, 0, 2 );
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP')
			{
				$asliname = $row->nama_tw;
			}
			else
			{
				$asliname = $row->nama_hk;
			}

			//== TOTAL IJIN PULANG ==//
			$get_ijin_pulang = $this->M_session->select("SELECT tglkembali,tglkeluar FROM blk_izin_pulang where nodaftar='".$row->usernya."'");
			
			$out_date = 0;
			foreach ($get_ijin_pulang as $poy) 
			{
				$t_keluar  = date_create( $poy->tglkeluar );
				$t_kembali = date_create( $poy->tglkembali );

				$diff = date_diff( $t_keluar, $t_kembali );

				$out_date += $diff->format("%a");
			}

			//== TOTAL PKL ==//
			$get_pkl 	= $this->M_session->select("SELECT tgl_mulai, tgl_selesai FROM blk_hasilpkl where id_personalblk='".$row->usernya."'");
			
			$pkl_date 	= 0;
			foreach ($get_pkl as $por) {
				$t_keluar  = date_create( $por->tgl_mulai );
				$t_kembali = date_create( $por->tgl_selesai );

				$diff = date_diff( $t_keluar, $t_kembali );

				$pkl_date += $diff->format("%a");
			}

			$ambildata2 = $this->M_session->select("
				SELECT 
				DISTINCT(DATE(dteDate)) as tanggal
				FROM tblattendance 
				WHERE dteDate BETWEEN '".$date1."' AND '".$date2."' 
				AND idblk ='".$row->usernya."' 
				ORDER BY  dteDate ASC
			");

			$tgl_hadir = 0;
			foreach($ambildata2 as $rowss) 
			{
			    if ($rowss === reset($ambildata2))
			    {
			        $tgl_hadir = date('d/m/Y', strtotime( $rowss->tanggal ) ).'<w:br/>';
			    }

			    if ($rowss === end($ambildata2))
			    {
			        $tgl_hadir .= date('d/m/Y', strtotime( $rowss->tanggal ) );
			    }
			}

		    $document->setValue('value1#'.$nn, $nn );
		    $document->setValue('value2#'.$nn, $row->usernya );
		    $document->setValue('value3#'.$nn, $asliname );
		    $document->setValue('value4#'.$nn, $row->negara );
			$document->setValue('value9#'.$nn, $pkl_date );
			$document->setValue('value10#'.$nn, $out_date );
		    $document->setValue('value5#'.$nn, $tgl_hadir );
		    $document->setValue('value6#'.$nn, count($ambildata2) );
		$nn++;
		}

		$filename = 'BLK LAPORAN - DATA ABSENSI.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $filename . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
	    
		flush();
		readfile($isinya);
		unlink($isinya);
		exit;
	}

	function dataabsen_biayamakan_print()
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("blk/blk_laporan/dataabsen_biayamakan.docx") );

		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');

		$dat1 = date('d/m/Y', strtotime( $date1 ));
		$dat2 = date('d/m/Y', strtotime( $date2 ));

		$document->setValue('value7',$dat1);
		$document->setValue('value8',$dat2);

		$ambildata1= $this->M_session->select(
			"SELECT 
			DISTINCT (idblk) AS usernya, 
			personal.nama AS nama_tw, 
			personalblk.nama AS nama_hk, 
			blk_pemilik.isi AS nama_pemilik, 
			blk_pemilik.negara AS negara
			FROM tblattendance
			LEFT JOIN personalblk ON tblattendance.idblk = personalblk.nodaftar
			LEFT JOIN blk_pemilik ON personalblk.pemilik = blk_pemilik.id_pemilik
			LEFT JOIN personal ON personalblk.nodaftar = personal.id_biodata
			WHERE dteDate BETWEEN '$date1' AND '$date2' ORDER BY 'usernya' ASC"
		);

		$document->cloneRow('value1',count($ambildata1));

		$total_biaya = 0;

		$nn=1;
		foreach($ambildata1 as $row) {
			$zyxpilsek = substr( $row->usernya, 0, 2 );
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP')
			{
				$asliname = $row->nama_tw;
			}
			else
			{
				$asliname = $row->nama_hk;
			}

			//== TOTAL IJIN PULANG ==//
			$get_ijin_pulang = $this->M_session->select("SELECT tglkembali,tglkeluar FROM blk_izin_pulang where nodaftar='".$row->usernya."'");
			
			$out_date = 0;
			foreach ($get_ijin_pulang as $poy) 
			{
				$t_keluar  = date_create( $poy->tglkeluar );
				$t_kembali = date_create( $poy->tglkembali );

				$diff = date_diff( $t_keluar, $t_kembali );

				$out_date += $diff->format("%a");
			}

			//== TOTAL PKL ==//
			$get_pkl 	= $this->M_session->select("SELECT tgl_mulai, tgl_selesai FROM blk_hasilpkl where id_personalblk='".$row->usernya."'");
			
			$pkl_date 	= 0;
			foreach ($get_pkl as $por) {
				$t_keluar  = date_create( $por->tgl_mulai );
				$t_kembali = date_create( $por->tgl_selesai );

				$diff = date_diff( $t_keluar, $t_kembali );

				$pkl_date += $diff->format("%a");
			}

			$ambildata2 = $this->M_session->select("
				SELECT 
				DISTINCT(DATE(dteDate)) as tanggal
				FROM tblattendance 
				WHERE dteDate BETWEEN '".$date1."' AND '".$date2."' 
				AND idblk ='".$row->usernya."' 
				ORDER BY  dteDate ASC
			");

			$tgl_hadir = 0;
			foreach($ambildata2 as $rowss) 
			{
			    if ($rowss === reset($ambildata2))
			    {
			        $tgl_hadir = date('d/m/Y', strtotime( $rowss->tanggal ) ).'<w:br/>';
			    }

			    if ($rowss === end($ambildata2))
			    {
			        $tgl_hadir .= date('d/m/Y', strtotime( $rowss->tanggal ) );
			    }
			}

		    $document->setValue('value1#'.$nn, $nn );
		    $document->setValue('value2#'.$nn, $row->usernya );
		    $document->setValue('value3#'.$nn, $asliname );
		    $document->setValue('value4#'.$nn, $row->negara );
			$document->setValue('value9#'.$nn, $pkl_date );
			$document->setValue('value10#'.$nn, $out_date );
		    $document->setValue('value5#'.$nn, $tgl_hadir );
		    $document->setValue('value6#'.$nn, count($ambildata2) );
		    $document->setValue('value11#'.$nn, 'Rp. '.number_format( count($ambildata2)*25000 , 0, "", ",") );
		    
		    $total_biaya += count($ambildata2)*25000;
		$nn++;
		}

		$document->setValue('total', 'Rp. '.number_format( $total_biaya , 0, "", ",") );

		$document->setValue('pemilik', $pemilik );

		$filename = 'BLK LAPORAN - DATA ABSENSI.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $filename . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
	    
		flush();
		readfile($isinya);
		unlink($isinya);
		exit;
	}

	function dataabsen_biayakategori_print()
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("blk/blk_laporan/dataabsen_biayakategori.docx") );

		$namap = $this->input->post('namapemilikx');
		$jk    = $this->input->post('jk');
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		$biaya = $this->input->post('biaya');

		$dat1 = date('d/m/Y', strtotime( $date1 ));
		$dat2 = date('d/m/Y', strtotime( $date2 ));

		$document->setValue('value7',$dat1);
		$document->setValue('value8',$dat2);

		$where = ' AND tblattendance.idblk LIKE "'.$jk.'%" ';
		if ( $jk == 'TKL' )
		{
			$where = ' AND ( 
				tblattendance.idblk LIKE "MF%" || 
				tblattendance.idblk LIKE "MI%" 
			)';
		}
		else if ( $jk == 'TKW' )
		{
			$where = ' AND ( 
				tblattendance.idblk LIKE "FF%" || 
				tblattendance.idblk LIKE "FI%" || 
				tblattendance.idblk LIKE "JP%" || 
				tblattendance.idblk LIKE "HK%" || 
				tblattendance.idblk LIKE "S%"  || 
				tblattendance.idblk LIKE "TS%"
			)';
		}
		else if ( $jk == 'TAIWAN FORMAL' )
		{
			$where = ' AND ( 
				tblattendance.idblk LIKE "FF%" || 
				tblattendance.idblk LIKE "MF%" || 
				tblattendance.idblk LIKE "JP%"
			)';
		}
		else if ( $jk == 'TAIWAN INFORMAL' )
		{
			$where = ' AND ( 
				tblattendance.idblk LIKE "FI%" ||
				tblattendance.idblk LIKE "MI%" 
			)';
		}
		else if ( $jk == 'HONGKONG' )
		{
			$where = ' AND ( 
				tblattendance.idblk LIKE "HK%"
			)';
		}

		$ambildata1= $this->M_session->select(
			"SELECT 
			DISTINCT (idblk) AS usernya, 
			personal.nama AS nama_tw, 
			personalblk.nama AS nama_hk, 
			blk_pemilik.isi AS nama_pemilik, 
			blk_pemilik.negara AS negara
			FROM tblattendance
			LEFT JOIN personalblk ON tblattendance.idblk = personalblk.nodaftar
			LEFT JOIN blk_pemilik ON personalblk.pemilik = blk_pemilik.id_pemilik
			LEFT JOIN personal ON personalblk.nodaftar = personal.id_biodata
			WHERE dteDate BETWEEN '$date1' AND '$date2' 
			AND blk_pemilik.id_pemilik = '$namap'
			".$where."
			ORDER BY idblk ASC"
		);

		$document->cloneRow('value1',count($ambildata1));

		$total_biaya = 0;

		$nn=1;
		foreach($ambildata1 as $row) {
			$zyxpilsek = substr( $row->usernya, 0, 2 );
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP')
			{
				$asliname = $row->nama_tw;
			}
			else
			{
				$asliname = $row->nama_hk;
			}

			//== TOTAL IJIN PULANG ==//
			$get_ijin_pulang = $this->M_session->select("SELECT tglkembali,tglkeluar FROM blk_izin_pulang where nodaftar='".$row->usernya."'");
			
			$out_date = 0;
			foreach ($get_ijin_pulang as $poy) 
			{
				$t_keluar  = date_create( $poy->tglkeluar );
				$t_kembali = date_create( $poy->tglkembali );

				$diff = date_diff( $t_keluar, $t_kembali );

				$out_date += $diff->format("%a");
			}

			//== TOTAL PKL ==//
			$get_pkl 	= $this->M_session->select("SELECT tgl_mulai, tgl_selesai FROM blk_hasilpkl where id_personalblk='".$row->usernya."'");
			
			$pkl_date 	= 0;
			foreach ($get_pkl as $por) {
				$t_keluar  = date_create( $por->tgl_mulai );
				$t_kembali = date_create( $por->tgl_selesai );

				$diff = date_diff( $t_keluar, $t_kembali );

				$pkl_date += $diff->format("%a");
			}

			$ambildata2 = $this->M_session->select("
				SELECT 
				DISTINCT(DATE(dteDate)) as tanggal
				FROM tblattendance 
				WHERE dteDate BETWEEN '".$date1."' AND '".$date2."' 
				AND idblk ='".$row->usernya."' 
				ORDER BY  dteDate ASC
			");

			$tgl_hadir = 0;
			foreach($ambildata2 as $rowss) 
			{
			    if ($rowss === reset($ambildata2))
			    {
			        $tgl_hadir = date('d/m/Y', strtotime( $rowss->tanggal ) ).'<w:br/>';
			    }

			    if ($rowss === end($ambildata2))
			    {
			        $tgl_hadir .= date('d/m/Y', strtotime( $rowss->tanggal ) );
			    }
			}

		    $document->setValue('value1#'.$nn, $nn );
		    $document->setValue('value2#'.$nn, $row->usernya );
		    $document->setValue('value3#'.$nn, $asliname );
		    $document->setValue('value4#'.$nn, $row->negara );
			$document->setValue('value9#'.$nn, $pkl_date );
			$document->setValue('value10#'.$nn, $out_date );
		    $document->setValue('value5#'.$nn, $tgl_hadir );
		    $document->setValue('value6#'.$nn, count($ambildata2) );
		    $document->setValue('value11#'.$nn, 'Rp. '.number_format( count($ambildata2)*25000 , 0, "", ",") );
		    
		    $total_biaya += count($ambildata2)*25000;
		$nn++;
		}

		$document->setValue('total', 'Rp. '.number_format( $total_biaya , 0, "", ",") );

		$pemilik = $this->M_session->select_row("SELECT * FROM blk_pemilik WHERE id_pemilik='".$namap."'");
		$pemilike = "";
		if ( $pemilik != NULL )
		{
			$pemilike = $pemilik->isi.' '.$pemilik->negara;
		}

		$document->setValue('pemilik', $pemilike );

		$filename = 'BLK LAPORAN - DATA ABSENSI.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
	    header('Content-Disposition: attachment; filename="' . $filename . '"');
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	    header('Content-Transfer-Encoding: binary');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Expires: 0');
	    
		flush();
		readfile($isinya);
		unlink($isinya);
		exit;
	}
	//===============================================================================================================//
	
	//===============================================================================================================//
	function sertifikat() 
	{	
		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "sertifikat/sertifikat";
		echo Modules::run('template/blk_template', $data); 
	}

	function sertifikat_ambil_pmi() 
	{
		$sektor = $this->input->post("sektor");
		if ( $sektor == "F" ) {
			$where = " (a.id_biodata like 'MF%' || a.id_biodata like 'FF%' )";
		} elseif ( $sektor == "J" ) {
			$where = " a.id_biodata like 'JP%' ";
		}

        $quertos  	= "SELECT 
        				a.*
        				FROM personal a 
        				JOIN paspor b 
        				ON a.id_biodata = b.id_biodata 
        				JOIN disnaker c 
        				ON a.id_biodata = c.id_biodata 
        				WHERE b.keterangan='sudah' 
        				and (a.statterbang is null or a.statterbang = '') 
        				and a.statusaktif != 'Mengundurkan diri' 
        				and a.statusaktif != 'UNFIT' 
        				and $where 
        				GROUP BY a.id_biodata
        				ORDER BY a.id_biodata
        				";

        $data_pmi = $this->M_session->select($quertos);

        $html = '<option disabled selected id="pilih_pmi_default">PILIH PMI</option>';
        foreach ($data_pmi as $key => $value) 
        {
        	$html .= '<option value="'.$value->id_biodata.'">'.$value->id_biodata.' '.$value->nama.'</option>';
        }

		$this->output->set_content_type('application/json')->set_output(json_encode($html));
	}

	function sertifikat_check_tipe_pmi() 
	{
		$pmi = $this->input->post("pmi");
/*
		$cek = $this->M_session->select_row("SELECT 
        				count(*) as total 
        				FROM tblattendance a 
        				WHERE a.idblk = '$pmi'
        				");*/

        $html = '';/*
		if ( $cek->total == 0 ) {
            $html = '<option value="X">MANUAL</option>';
		} else {*/
			$html .= '<option value="I">DARI ID DISNAKER</option>';/*
			$html .= '<option value="N">TANGGAL AKHIR SEKARANG</option>';
            $html .= '<option value="D">TANGGAL AKHIR ABSEN FINGER</option>';
            $html .= '<option value="M">TANGGAL AKHIR +20 HARI</option>';*/
            $html .= '<option value="X">MANUAL</option>';
		//}

		$this->output->set_content_type('application/json')->set_output(json_encode($html));
	}

	function sertifikat_show() 
	{
		$columns22 = array(
            'a.sektor','a.id_biodata','a.no_urut_sertifikat','b.nama','c.nama'
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

		$limit 		= "";
		$where_dd 	= "";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT a.*,b.nama as nama1,c.nama as nama2 FROM blk_sertifikat a LEFT JOIN personalblk b ON a.id_biodata=b.nodaftar LEFT JOIN personal c ON a.id_biodata=c.id_biodata  $where_dd order by a.id desc $limit");

        $data2 	= array();
        $no 	= intval($_POST['start']);

	    foreach ($tampil_data as $row) {
	    	$id = substr($row->id_biodata, 0, 2);
	    	if ( $id == 'MF' || $id == 'FF' || $id == 'MI' || $id == 'FI' || $id == 'JP' ) {
	    		$nama = $row->nama2;
	    	} else {
	    		$nama = $row->nama1;
	    	}

	    	$ttdtgl = '';
	    	if ($row->tglakhir != NULL) {
	    		$stop_date = new DateTime($row->tglakhir);
				$stop_date->format('Y-m-d'); 
				$stop_date->modify('+1 day');
				$ttdtgl = $stop_date->format('Y-m-d');
	    	}

            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a class="btn btn-xs bg-orange" target="_blank" href="'.site_url('blk_laporan/sertifikat_cetaks/'.$row->id).'">PRINT</a> '.
                    '<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button>',
                    $row->sektor,
                    $row->no_urut_sertifikat,
                    $row->id_biodata.'<br/>'.$nama,
                    $row->tglawal.'<br/>'.$row->tglakhir.'<br/>'.$ttdtgl
                )
            );
        }

        $resFilterLength 	= $this->M_session->select_row("SELECT count(*) as total FROM blk_sertifikat a LEFT JOIN personalblk b ON a.id_biodata=b.nodaftar LEFT JOIN personal c ON a.id_biodata=c.id_biodata $where_dd");
        $recordsFiltered 	= $resFilterLength->total;

        $resTotalLength 	=  $this->M_session->select_row("SELECT count(*) as total FROM blk_sertifikat a LEFT JOIN personalblk b ON a.id_biodata=b.nodaftar LEFT JOIN personal c ON a.id_biodata=c.id_biodata ");
        $recordsTotal 		= $resTotalLength->total;

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

	function sertifikat_add_process() 
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$tipe 		= $this->input->post('tipe');
		$sektor 	= $this->input->post('sektor');
		$pmi 		= $this->input->post('pmi');

		$tglawal 	= "";
		$tglakhir 	= "";
		if ( $tipe == 'N' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) AS tgl_awal,
							CURDATE() AS tgl_akhir,
							DATE_ADD( CURDATE() , INTERVAL 1 DAY) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		} elseif ( $tipe == 'D' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) AS tgl_awal,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate DESC limit 1,1 ) AS tgl_akhir,
							( SELECT DATE_ADD(dteDate, INTERVAL 1 DAY) as dteDate  FROM tblattendance where idblk='$pmi' ORDER BY dteDate DESC limit 1,1 ) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		} elseif ( $tipe == 'M' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) AS tgl_awal,
							DATE_ADD( ( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) , INTERVAL 20 DAY) AS tgl_akhir,
							DATE_ADD( ( SELECT dteDate FROM tblattendance where idblk='$pmi' ORDER BY dteDate ASC limit 1,1 ) , INTERVAL 21 DAY) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		} elseif ( $tipe == 'X' ) {
			$tglawal 	= $this->input->post('tglawal');
			$tglakhir 	= $this->input->post('tglakhir');
		} elseif ( $tipe == 'I' ) {
			$tb_personal = $this->M_session->select_row("SELECT 
							a.id_biodata,
							DATE_ADD( ( SELECT tglonline FROM disnaker where id_biodata='$pmi' ORDER BY id_disnaker DESC ) , INTERVAL 1 DAY) AS tgl_awal,
							DATE_ADD( ( SELECT tglonline FROM disnaker where id_biodata='$pmi' ORDER BY id_disnaker DESC ) , INTERVAL 20 DAY) AS tgl_akhir,
							DATE_ADD( ( SELECT tglonline FROM disnaker where id_biodata='$pmi' ORDER BY id_disnaker DESC ) , INTERVAL 21 DAY) AS tgl_ttd
	        				FROM personal a 
	        				WHERE a.id_biodata='$pmi' 
	        				");
			if ( $tb_personal != NULL ) {
				$tglawal 	= $tb_personal->tgl_awal;
				$tglakhir  	= $tb_personal->tgl_akhir;
			}
		}
		
		$zz34 = $this->M_session->select_row("SELECT * FROM blk_sertifikat WHERE id_biodata='$pmi' ");

		if ( $zz34 != NULL ) {
			$nomor_urut = $zz34->no_urut_sertifikat;
			$info['message'] = 'Data Sudah ada di List';
		} else {
			$dd = $this->M_session->select_row("SELECT no_urut_sertifikat FROM blk_sertifikat WHERE sektor='$sektor' ORDER BY no_urut_sertifikat DESC");

			if ($dd != NULL) {
				$nomor_urut = $dd->no_urut_sertifikat;
				$nomor_urut = sprintf('%04d', ($nomor_urut+1) );
			} else {
				$nomor_urut = "0001";
			}

			$data = array(
				'sektor' 				=> $sektor,
				'id_biodata' 			=> $pmi,
				'no_urut_sertifikat' 	=> $nomor_urut,
				'tipe_download' 		=> $tipe,
				'tglawal' 				=> $tglawal,
				'tglakhir' 				=> $tglakhir,
				'date_created' 			=> date('Y-m-d H:i:s'),
			);
			$chck = $this->M_session->insert_return_id($data, 'blk_sertifikat');

			if ( $chck == TRUE ) {
				$info['success'] = TRUE;
				$info['message'] = $chck;
			}
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }    

	function sertifikat_cetaks($id) 
	{

		$get_batch = $this->M_session->select_row("SELECT * FROM blk_sertifikat WHERE id='$id'");
		if ($get_batch != NULL) {
			$sektor 	= $get_batch->sektor;
			$id_bio 	= $get_batch->id_biodata;
			$nomor_urut = $get_batch->no_urut_sertifikat;

			$tipe 	 	= $get_batch->tipe_download;
			$tglawal 	= $get_batch->tglawal;
			$tglakhir 	= $get_batch->tglakhir;
		} else {
			exit('error 1');
		}

		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("blk/blk_laporan/sertifikat_formal.docx") );

		if ($sektor == 'F') {
			$sektor_nama = "Manufacturing";
		} elseif ($sektor == 'J') {
			$sektor_nama = "Nursing Home";
		}

		$tb_personal = $this->M_session->select_row("SELECT 
						a.id_biodata,
						a.nama,
						b.nopaspor
        				FROM personal a 
        				JOIN paspor b 
        				ON a.id_biodata = b.id_biodata 
        				WHERE b.keterangan='sudah' 
        				and a.id_biodata='$id_bio' 
        				");

		if ($tb_personal != NULL) {

			$id_exp = explode("-", $id_bio );

			$bulan_array = array(
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember'
			);

			$stop_date = new DateTime($tglakhir);
			$stop_date->format('Y-m-d'); 
			$stop_date->modify('+1 day');
			$tgl_ttd = $stop_date->format('Y-m-d');

			$tgl_awal_exp 	= explode("-", $tglawal );
			$tgl_akhir_exp 	= explode("-", $tglakhir );
			$tgl_ttd_exp 	= explode("-", $tgl_ttd );

			$tgl_awal 	= date("d", strtotime( $tglawal )).' '.$bulan_array[$tgl_awal_exp[1]].' '.date("Y", strtotime( $tglawal ));
			$tgl_akhir 	= date("d", strtotime( $tglakhir )).' '.$bulan_array[$tgl_akhir_exp[1]].' '.date("Y", strtotime( $tglakhir ));
			$tgl_ttd 	= date("d", strtotime( $tgl_ttd )).' '.$bulan_array[$tgl_ttd_exp[1]].' '.date("Y", strtotime( $tgl_ttd ));
			

			$document->setValue( 'z_xxxx', $nomor_urut );
			$document->setValue( 'z_m', strtoupper( $id_exp[0] ) );
			$document->setValue( 'z_nnnn', strtoupper( $id_exp[1] ) );
			$document->setValue( 'z_bb', strtoupper( date('m').date('Y') ) );
			$document->setValue( 'z_nama', strtoupper( $tb_personal->nama ) );
			$document->setValue( 'z_paspor', strtoupper( $tb_personal->nopaspor ) );
			$document->setValue( 'z_ttbb',  $tgl_ttd  );
			$document->setValue( 'z_sektor',  'MANUFACTURING'  );

			$document->setValue( 'xxxx', $nomor_urut );
			$document->setValue( 'm', strtoupper( $id_exp[0] ) );
			$document->setValue( 'nnnn', strtoupper( $id_exp[1] ) );
			$document->setValue( 'bb', strtoupper( date('m').date('Y') ) );
			$document->setValue( 'nama', strtoupper( $tb_personal->nama ) );
			$document->setValue( 'paspor', strtoupper( $tb_personal->nopaspor ) );
			$document->setValue( 'ddmm_awal',  $tgl_awal  );
			$document->setValue( 'ddmm_akhir',  $tgl_akhir  );
			$document->setValue( 'ttbb',  $tgl_ttd  );
			$document->setValue( 'sektor',  $sektor_nama  );
		} else {
			exit('error');
		}
		
		$filename = 'Sertifikat '.$tb_personal->nama.'.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile(FCPATH.$isinya);
		unlink(FCPATH.$isinya);
		exit;
	}
	//===============================================================================================================//

	//===============================================================================================================//
	function registrasi() 
	{	
		$data['namamodule'] 	= "blk_laporan";
		$data['namafileview'] 	= "registrasi/registrasi";
		echo Modules::run('template/blk_template', $data); 
	}

	function registrasi_print()
	{
		
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/laporan_registrasi.docx');

		$bln = $this->input->post('bulan');
		$thn = $this->input->post('tahun');

		$date1 	= $thn.'-'.$bln.'-01';
		$date2 	= date('Y-m-t', strtotime($date1));
		$sektor = $this->input->post('sektor');

		if ( $sektor == 'tkw' )
		{
			$wheres1 = ' AND ( nodaftar LIKE "FF%" OR nodaftar LIKE "FI%" OR nodaftar LIKE "JP%" ) ';
			$wheres2 = ' AND ( nodaftar LIKE "HK%" ) ';
			$wheres3 = ' AND ( nodaftar LIKE "S%" ) ';
		}

		$get_batch = $this->M_session->select("
			SELECT 
			personalblk.*,
			personalblk.nama as nama_hkg,
			personal.nama as nama_adm,
			personalblk.tempatlahir as tempatlahir_hkg,
			personalblk.tanggallahir as tanggallahir_hkg,
			personalblk.alamat as alamat_hkg,
			personal.tempatlahir as tempatlahir_adm,
			personal.tgllahir as tgllahir_adm,
			disnaker.alamat as alamat_adm
			FROM personalblk 
			LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata
			LEFT JOIN disnaker ON personalblk.nodaftar=disnaker.id_biodata
			WHERE adm_tglreg between '$date1' and '$date2'
			$wheres1
			ORDER BY adm_tglreg, nodaftar
		");
		$get_batch2 = $this->M_session->select("
			SELECT 
			personalblk.*,
			personalblk.nama as nama_hkg,
			personal.nama as nama_adm,
			personalblk.tempatlahir as tempatlahir_hkg,
			personalblk.tanggallahir as tanggallahir_hkg,
			personalblk.alamat as alamat_hkg,
			personal.tempatlahir as tempatlahir_adm,
			personal.tgllahir as tgllahir_adm,
			disnaker.alamat as alamat_adm
			FROM personalblk 
			LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata
			LEFT JOIN disnaker ON personalblk.nodaftar=disnaker.id_biodata
			WHERE adm_tglreg between '$date1' and '$date2'
			$wheres2
			ORDER BY adm_tglreg, nodaftar
		");
		$get_batch3 = $this->M_session->select("
			SELECT 
			personalblk.*,
			personalblk.nama as nama_hkg,
			personal.nama as nama_adm,
			personalblk.tempatlahir as tempatlahir_hkg,
			personalblk.tanggallahir as tanggallahir_hkg,
			personalblk.alamat as alamat_hkg,
			personal.tempatlahir as tempatlahir_adm,
			personal.tgllahir as tgllahir_adm,
			disnaker.alamat as alamat_adm
			FROM personalblk 
			LEFT JOIN personal ON personalblk.nodaftar=personal.id_biodata
			LEFT JOIN disnaker ON personalblk.nodaftar=disnaker.id_biodata
			WHERE adm_tglreg between '$date1' and '$date2'
			$wheres3
			ORDER BY adm_tglreg, nodaftar
		");

		//$document = new \PhpOffice\PhpWord\TemplateProcessor( "files/laporan_registrasi.docx") );

			$document->cloneRow( 'value1',count($get_batch) );

			$no = 1;
			foreach ($get_batch as $key => $value) 
			{
				$document->setValue( 'value1#'.$no, $no );
				$document->setValue( 'value2#'.$no, $value->nodaftar );
				$document->setValue( 'value3#'.$no, $value->nama_adm );
				$document->setValue( 'value4#'.$no, $value->tempatlahir_adm.'  '.$value->tgllahir_adm );
				$document->setValue( 'value5#'.$no, $value->alamat_adm );

			$no++;
			}

			$document->cloneRow( 'palue1',count($get_batch2) );

			$no = 1;
			foreach ($get_batch2 as $key => $value) 
			{
				$document->setValue( 'palue1#'.$no, $no );
				$document->setValue( 'palue2#'.$no, $value->nodaftar );
				$document->setValue( 'palue3#'.$no, $value->nama_hkg );
				$document->setValue( 'palue4#'.$no, $value->tempatlahir_hkg.'  '.$value->tanggallahir_hkg );
				$document->setValue( 'palue5#'.$no, $value->alamat_hkg );

			$no++;
			}
			$document->setValue( 'palue1', '' );
			$document->setValue( 'palue2', '' );
			$document->setValue( 'palue3', '' );
			$document->setValue( 'palue4', '' );
			$document->setValue( 'palue5', '' );
		
			$document->cloneRow( 'dalue1',count($get_batch3) );

			$no = 1;
			foreach ($get_batch3 as $key => $value) 
			{
				$document->setValue( 'dalue1#'.$no, $no );
				$document->setValue( 'dalue2#'.$no, $value->nodaftar );
				$document->setValue( 'dalue3#'.$no, $value->nama_hkg );
				$document->setValue( 'dalue4#'.$no, $value->tempatlahir_hkg.'  '.$value->tanggallahir_hkg );
				$document->setValue( 'dalue5#'.$no, $value->alamat_hkg );

			$no++;
			}

		$bulan_array = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		);

		$document->setValue( 'bulan1', $bulan_array[ $bln ].' '.$thn );

		$filename = 'BLK LAPORAN - LIST CTKI REGISTRASI.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya);
		exit;
	}
	//===============================================================================================================//

	function dd($d,$e)
	{
		$t_keluar  = date_create( $d );
		$t_kembali = date_create( $e );

		$diff = date_diff( $t_keluar, $t_kembali );
		echo $diff->format("%a"); 
	}
}