<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_agen_promosi extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}

	function index()
	{
		$data['tampil_data_agen'] = $this->M_session->select("SELECT * FROM dataagen ORDER BY kode_agen ASC");

		$data['namamodule'] 	= "new_agen_promosi";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function show_data()
	{
		$columns_d1 = array(
			'tgl_transfer_doku',
			'dataagen.nama',
			'dataagen_penerima_nama.nama',
			'dataagen_penerima_nama.namamandarin'
		);

		$where_ori = ' dataagen_promosi.softDelete != 1 ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			dataagen_promosi.id as promosiid,
			dataagen_promosi.tgl_transfer_doku,
			dataagen_promosi.data,
			dataagen.nama as agen_nama,
			dataagen_penerima_nama.*
			FROM dataagen_promosi
			JOIN dataagen ON dataagen_promosi.agen_id=dataagen.id_agen
			LEFT JOIN dataagen_penerima_dana ON dataagen_promosi.bank_id=dataagen_penerima_dana.id
			LEFT JOIN dataagen_penerima_nama ON dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id
			$where_d1 
			order by dataagen_promosi.id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );

        foreach( $sql as $row ) 
        {
			$data_inti = json_decode($row->data, true);
        	$total_nt = 0;
        	foreach ( $data_inti as $inti_key => $inti_val )
        	{
        		$total_nt += str_replace('.', '', $inti_val);
        	}

        	$total_nt = number_format($total_nt, 0, "", ".");

        	$btn_actions = '
        		<button class="btn btn-xs bg-success btn_action_ubah" data-id="'.$row->promosiid.'">Ubah</button>
        		<button class="btn btn-xs bg-danger btn_action_hapus" data-id="'.$row->promosiid.'">Hapus</button>
        	';

			$penerimanama = '';
			if ( $row->nama != NULL )
			{
				$penerimanama = $row->nama.'<br/>'.$row->namamandarin;
			}

			$no++;
			array_push($data2,
				array(
					$no,
					$row->agen_nama,
					$penerimanama,
					$row->tgl_transfer_doku,
					$total_nt,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				dataagen_promosi
				JOIN dataagen ON dataagen_promosi.agen_id=dataagen.id_agen
				LEFT JOIN dataagen_penerima_dana ON dataagen_promosi.bank_id=dataagen_penerima_dana.id
				LEFT JOIN dataagen_penerima_nama ON dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				dataagen_promosi
				JOIN dataagen ON dataagen_promosi.agen_id=dataagen.id_agen
				LEFT JOIN dataagen_penerima_dana ON dataagen_promosi.bank_id=dataagen_penerima_dana.id
				LEFT JOIN dataagen_penerima_nama ON dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id
				WHERE $where_ori
			");

		$r = array(
			"draw"            => isset( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => $data2
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
	}


	function ambil_bank()
	{
		$agen_id = $this->input->post('bank');

		$select_data = $this->M_session->select("
			SELECT 
			dataagen_penerima_dana.id as danaid,
			dataagen_penerima_nama.*
			FROM dataagen_penerima_dana 
			LEFT JOIN dataagen_penerima_nama ON dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id
			where agen_id='".$agen_id."' and softDelete != 1");

		$option = '';
		foreach ($select_data as $key => $value) {
			$option .= "\t".'<option value="'.$value->danaid.'">'.$value->nama.' | '.$value->namamandarin.'</option>'."\n";
		}

		$datapm['success'] = FALSE;
		$datapm['message'] = '';
		if ( $option != '' )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = $option;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function ambil_data_pmi($agen_id)
	{
		$ambil_data = $this->M_session->select("
			SELECT 
			personal.*, 
			majikan.kode_agen
			FROM personal 
			JOIN majikan ON personal.id_biodata=majikan.id_biodata
			WHERE (personal.id_biodata LIKE 'MF%' || personal.id_biodata LIKE 'FF%' || personal.id_biodata LIKE 'JP%') 
			AND majikan.kode_agen = '".$agen_id."'
			ORDER BY personal.id_biodata ASC 
		");

		$option = "";
		foreach ( $ambil_data as $row )
		{
			$option .= '<option value="'.$row->id_biodata.'">'.$row->id_biodata.' '.$row->nama.'</option>'."\n";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
	}

	function insert_row()
	{
		$pmi = $this->input->post('pmi');

		$ambil_data = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$pmi."'");

		$no = 1;
		$table = '';
		if ( $ambil_data != NULL )
		{
			$table .= '<tr>';

			$table .= "\t".'<td>'.
						'<input type="hidden" value="'.$ambil_data->id_biodata.'" name="idbio[]"/>'.
						$ambil_data->id_biodata.
						'</td>'."\n";

			$table .= "\t".'<td>'.
						$ambil_data->nama.
						'</td>'."\n";

			$table .= "\t".'<td>'.
						'<input type="text" class="form-control" name="jumlah_nt[]" placeholder="Isi Jumlah NT" id="currency" />'.
						'</td>'."\n";

			$table .= "\t".'<td>'.
						'<button type="button" class="btn btn-xxs bg-danger hapus_row">
							<i class="icon-minus-circle2"></i>
						</button>'.
						'</td>'."\n";

			$table .= '</tr>';
		$no++;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $table ));
	}

	function save_data()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di tambah';

		$tgl 	= $this->input->post('tanggal_transfer_doku');
		$nama 	= $this->input->post('penerima');
		$bank 	= $this->input->post('pilih_bank');

		$idbio 	= $this->input->post('idbio');
		$jumlah = $this->input->post('jumlah_nt');

		$data = array();
		for ( $i=0; $i<count($idbio); $i++ )
		{
			$data[ $idbio[$i] ] = $jumlah[$i];
		}

		$data_save = array(
			'tgl_transfer_doku' => $tgl,
			'agen_id' 			=> $nama,
			'bank_id' 			=> $bank,
			'data'	 			=> json_encode($data),
			'date_created' 		=> date('Y-m-d H:i:s')
		);

		$checkk = $this->M_session->insert($data_save, 'dataagen_promosi');

		if ( $checkk == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di tambah';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function hapus_data()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di hapus';

		$id = $this->input->post('id');

		$data_hapus = array(
			'softDelete' => '1'
		);

		$checkk = $this->M_session->update($data_hapus, 'dataagen_promosi', $id, 'id');

		if ( $checkk == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di hapus';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function edit()
	{
		$id = $this->input->post('id');

		$quww = 'SELECT 
			*
			FROM dataagen_promosi 
			WHERE id = "'.$id.'"
			AND softDelete != 1
		';
		$zselectionz 	= $this->M_session->select_row($quww);

		// ======= data bank ======= //
		/*
		$select_data = $this->M_session->select("SELECT * FROM dataagen_penerima_dana where agen_id='".$zselectionz->agen_id."' and softDelete != 1");

		$banklist = '';
		foreach ($select_data as $key => $value) 
		{
			$selector = '';
			if ( $value->id == $zselectionz->bank_id )
			{
				$selector = 'selected="selected"';
			}
			$banklist .= "\t".'<option value="'.$value->id.'" '.$selector.'>'.$value->bank_name.'</option>'."\n";
		}*/

		// ======= data pmi ======= //
		$data_pmi = json_decode($zselectionz->data, true);

		$table = '';
		foreach ($data_pmi as $key => $value) 
		{
			$ambil_data = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$key."'");

			if ( $ambil_data != NULL )
			{
				$table .= '<tr>';

				$table .= "\t".'<td>'.
							'<input type="hidden" value="'.$ambil_data->id_biodata.'" name="idbio[]"/>'.
							$ambil_data->id_biodata.
							'</td>'."\n";

				$table .= "\t".'<td>'.
							$ambil_data->nama.
							'</td>'."\n";

				$table .= "\t".'<td>'.
							'<input type="text" class="form-control currency" name="jumlah_nt[]" placeholder="Isi Jumlah NT" value="'.$value.'" id="currency" />'.
							'</td>'."\n";

				$table .= "\t".'<td>'.
							'<button type="button" class="btn btn-xxs bg-danger hapus_row">
								<i class="icon-minus-circle2"></i>
							</button>'.
							'</td>'."\n";

				$table .= '</tr>';
			}
		}

		$datapm = array (
			'id' 					=> $zselectionz->id,
			'tanggal_transfer_doku' => $zselectionz->tgl_transfer_doku,
			'agen_id' 				=> $zselectionz->agen_id,
			'bank_id' 				=> $zselectionz->bank_id,
			'table' 				=> $table
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function update()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di ubah';

		$id 	= $this->input->post('id');

		$tgl 	= $this->input->post('tanggal_transfer_doku');
		$nama 	= $this->input->post('penerima');
		$bank 	= $this->input->post('pilih_bank');

		$idbio 	= $this->input->post('idbio');
		$jumlah = $this->input->post('jumlah_nt');

		$data = array();
		for ( $i=0; $i<count($idbio); $i++ )
		{
			$data[ $idbio[$i] ] = $jumlah[$i];
		}

		$data_update = array(
			'tgl_transfer_doku' => $tgl,
			'agen_id' 			=> $nama,
			'bank_id' 			=> $bank,
			'data'	 			=> json_encode($data)
		);

		$checkk = $this->M_session->update($data_update, 'dataagen_promosi', $id, 'id');

		if ( $checkk == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di ubah';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
/*
	function printdata1($agen_id, $penerima_id, $tgl1, $tgl2)
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("pt/transfer_biaya_agensi2.docx") );

		$quww = 'SELECT 
			*
			FROM dataagen_promosi 
			WHERE agen_id = "'.$agen_id.'" and bank_id = "'.$penerima_id.'"
			AND tgl_transfer_doku between "'.$tgl1.'" AND "'.$tgl2.'"
			AND softDelete != 1
			ORDER BY tgl_transfer_doku ASC
		';
		$zselectionz 	= $this->M_session->select($quww);

		$total = 0;
		foreach( $zselectionz as $dd )
		{
			$data_tki = json_decode($dd->data, true);
			$total += count($data_tki);
		}

		$document->cloneBlock( 'CLONEME', count($zselectionz) );

		$nomor = 1;
		$total_coklat = 0;
		foreach ($zselectionz as $nemb1 => $value) 
		{
			$nemb = $nemb1+1;
			$data_tki = json_decode($value->data, true);

			$document->cloneRow('n1',count($data_tki));
			$nn=1;
			$total_kuning = 0;
			foreach ( $data_tki as $tki_key => $tki_val )
			{
				$ambil_personal = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$tki_key."'");
				$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$value->agen_id."'");
				$ambil_visa = $this->M_session->select_row("SELECT * FROM visa WHERE id_biodata='".$tki_key."'");
				$ambil_majikan = $this->M_session->select_row("SELECT * FROM majikan JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE id_biodata='".$tki_key."'");

				$tglterbang = "還沒確定時間。";
				if ( $ambil_visa != NULL )
				{
					if ( date('Y-m-d') <= $ambil_visa->tanggalterbang )
					{
						$tglterbang = "安排。";	
					}
					$tglterbang .= $ambil_visa->tanggalterbang;	
				}

			    $document->setValue('n1#'.$nn, $nomor, $nemb );
			    $document->setValue('n2#'.$nn, $tki_key, $nemb );
			    $document->setValue('n3#'.$nn, $ambil_personal->nama, $nemb );

			    $document->setValue('n4#'.$nn, $ambil_majikan->namamajikan, $nemb );
				$document->setValue('n5#'.$nn, $ambil_majikan->nama, $nemb );

			    $document->setValue('n6#'.$nn, $tglterbang, $nemb );

				$document->setValue('n8#'.$nn, $ambil_agen->nama, $nemb );

				$document->setValue('n9#'.$nn, $value->tgl_transfer_doku, $nemb );

				$document->setValue('n10#'.$nn, str_replace(".", ",", $tki_val), $nemb  );

				$total_kuning += str_replace(".", "", $tki_val);

			$nomor++;
			$nn++;
			}

			$document->setValue('t1', number_format($total_kuning, 0, "", ","), '1' );

			$total_coklat += $total_kuning;
		}

		$ambil_penerima = $this->M_session->select_row("SELECT 
			dataagen_penerima_dana.*,
			//concat( dataagen.namamandarin, '    / ', dataagen.nama) as agen_nama 
			dataagen.nama as agen_nama
			FROM dataagen_penerima_dana 
			JOIN dataagen ON dataagen_penerima_dana.agen_id=dataagen.id_agen
			WHERE agen_id='".$agen_id."' 
			and id = '".$penerima_id."'
			and softDelete != 1 
			order by id desc
		");

		$document->setValue('opsi1', $tgl1.' ~ '.$tgl2 );
		$document->setValue('opsi2', date('Y.m.d') );
		$document->setValue('opsi3', $ambil_penerima->bank_name.' / '.$ambil_penerima->agen_nama );
		$document->setValue('opsi4', '-' );
		$document->setValue('opsi5', $ambil_penerima->branch );
		$document->setValue('opsi6', $ambil_penerima->bank_code);
		$document->setValue('opsi7', $ambil_penerima->bank_no );

		$document->setValue('t2', $tgl1.'~'.$tgl2 );
		$document->setValue('t3', number_format($total_coklat, 0, "", ",") );
		
		
		$filename = 'LAPORAN TRANSFER AGENSI.docx';

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

	function printdata2($thn, $bln, $group_id, $agen_id)
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("pt/transfer_biaya_agensi3.docx") );

		$bln = sprintf('%02d', $bln);
		$bln_freshdate = $thn.'-'.$bln.'-01';
		$bln_outdate = date( 'Y-m-t', strtotime($bln_freshdate) );

		$whre = 'AND penerima_group_id = "'.$group_id.'"';
		if ( $group_id == 1 )
		{
			$whre = 'AND penerima_group_id = "1" AND dataagen_penerima_dana.agen_id="'.$agen_id.'"';
		}

		$quww = 'SELECT 
			dataagen_promosi.*
			FROM dataagen_promosi 
			JOIN dataagen_penerima_dana ON dataagen_promosi.bank_id=dataagen_penerima_dana.id
			WHERE tgl_transfer_doku BETWEEN "'.str_replace("-", ".", $bln_freshdate).'" AND "'.str_replace("-", ".", $bln_outdate).'" 
			'.$whre.'
			AND dataagen_promosi.softDelete != 1
			ORDER BY tgl_transfer_doku ASC
		';		
		$zselectionz 	= $this->M_session->select($quww);
		
		$total = 0;
		foreach( $zselectionz as $dd )
		{
			$data_tki = json_decode($dd->data, true);
			$total += count($data_tki);
		}

		$document->cloneBlock( 'CLONEME', count($zselectionz) );

		$nomor = 1;
		$total_coklat = 0;
		foreach ($zselectionz as $nemb1 => $value) 
		{
			$nemb = $nemb1+1;
			$data_tki = json_decode($value->data, true);

			$document->cloneRow('n1',count($data_tki));
			$nn=1;
			$total_kuning = 0;
			foreach ( $data_tki as $tki_key => $tki_val )
			{
				$ambil_personal = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$tki_key."'");
				$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$value->agen_id."'");
				$ambil_visa = $this->M_session->select_row("SELECT * FROM visa WHERE id_biodata='".$tki_key."'");
				$ambil_majikan = $this->M_session->select_row("SELECT * FROM majikan JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE id_biodata='".$tki_key."'");
				//$ambil_penerima = $this->M_session->select_row("SELECT * FROM dataagen_penerima_dana WHERE id='".$value->bank_id."'");

				$tglterbang = "還沒確定時間。";
				if ( $ambil_visa != NULL )
				{
					if ( date('Y-m-d') <= $ambil_visa->tanggalterbang )
					{
						$tglterbang = "安排。";	
					}
					$tglterbang .= $ambil_visa->tanggalterbang;	
				}

			    $document->setValue('n1#'.$nn, $nomor, $nemb );
			    $document->setValue('n2#'.$nn, $tki_key, $nemb );
			    $document->setValue('n3#'.$nn, $ambil_personal->nama, $nemb );

			    $document->setValue('n4#'.$nn, $ambil_majikan->namamajikan, $nemb );
				$document->setValue('n5#'.$nn, $ambil_majikan->nama, $nemb );

			    $document->setValue('n6#'.$nn, $tglterbang, $nemb );

				$document->setValue('n8#'.$nn, $ambil_agen->nama, $nemb );

				$document->setValue('n9#'.$nn, $value->tgl_transfer_doku, $nemb );

				$document->setValue('n10#'.$nn, str_replace(".", ",", $tki_val), $nemb  );

				$total_kuning += str_replace(".", "", $tki_val);

			$nomor++;
			$nn++;
			}

			$document->setValue('t1', number_format($total_kuning, 0, "", ","), '1' );

			$total_coklat += $total_kuning;
		}

        $bulan_arr = array (
            1 => 'JANUARI',
            2 => 'FEBRUARI',
            3 => 'MARET',
            4 => 'APRIL',
            5 => 'MEI',
            6 => 'JUNI',
            7 => 'JULI',
            8 => 'AGUSTUS',
            9 => 'SEPTEMBER',
            10 => 'OKTOBER',
            11 => 'NOVEMER',
            12 => 'DESEMBER',
        );
		$bln_name = $bulan_arr[ sprintf('%01d', $bln) ];

		if ( $group_id != 1 )
		{
			$ambil_group = $this->M_session->select_row("SELECT * FROM datagroup WHERE id_group='".$group_id."'");
			$opsi3_a = $ambil_group->nama;
		}
		else
		{
			$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen = '".$agen_id."' ");
			$opsi3_a = $ambil_agen->nama;
		}

		$document->setValue('opsi1', $bln_name.' '.$thn );
		$document->setValue('opsi2', date('Y.m.d') );
		$document->setValue('opsi3', $opsi3_a );

		$document->setValue('t2', $bln_name.' '.$thn );
		$document->setValue('t3', number_format($total_coklat, 0, "", ",") );
		
		$filename = 'LAPORAN TRANSFER AGENSI.docx';

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
	}*/

	function cetak_laporan()
	{
		$data['tampil_data_penerima'] = $this->M_session->select("SELECT * FROM dataagen_penerima_nama ORDER BY nama ASC");

		$data['namamodule'] 	= "new_agen_promosi";
		$data['namafileview'] 	= "cetak_laporan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function printdata3($penerima_id, $tgl1, $tgl2)
	{
		$document = new \PhpOffice\PhpWord\TemplateProcessor( "files/transfer_biaya_agensi2.docx" );

		$quww = 'SELECT 
			dataagen_promosi.tgl_transfer_doku,
			dataagen_promosi.agen_id,
			dataagen_promosi.data
			FROM dataagen_promosi 
			JOIN dataagen_penerima_dana ON dataagen_promosi.bank_id=dataagen_penerima_dana.id 
			JOIN dataagen_penerima_nama ON dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id
			WHERE dataagen_penerima_dana.penerima_nama_id="'.$penerima_id.'"
			AND tgl_transfer_doku between "'.$tgl1.'" AND "'.$tgl2.'"
			AND dataagen_promosi.softDelete != 1
			ORDER BY tgl_transfer_doku ASC
		';
		$zselectionz 	= $this->M_session->select($quww);

		$total = 0;
		foreach( $zselectionz as $dd )
		{
			$data_tki = json_decode($dd->data, true);
			$total += count($data_tki);
		}

		$document->cloneBlock( 'CLONEME', count($zselectionz) );

		$nomor = 1;
		$total_coklat = 0;
		foreach ($zselectionz as $nemb1 => $value) 
		{
			$nemb = $nemb1+1;
			$data_tki = json_decode($value->data, true);

			$document->cloneRow('n1',count($data_tki));
			$nn=1;
			$total_kuning = 0;
			foreach ( $data_tki as $tki_key => $tki_val )
			{
				$ambil_personal = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$tki_key."'");
				$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$value->agen_id."'");
				$ambil_visa = $this->M_session->select_row("SELECT * FROM visa WHERE id_biodata='".$tki_key."'");
				$ambil_majikan = $this->M_session->select_row("SELECT * FROM majikan JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE id_biodata='".$tki_key."'");

				$tglterbang = "還沒確定時間。";
				if ( $ambil_visa != NULL )
				{
					if ( date('Y-m-d') <= $ambil_visa->tanggalterbang )
					{
						$tglterbang = "安排。";	
					}
					$tglterbang .= $ambil_visa->tanggalterbang;	
				}

			    $document->setValue('n1#'.$nn, $nomor, $nemb );
			    $document->setValue('n2#'.$nn, $tki_key, $nemb );
			    $document->setValue('n3#'.$nn, $ambil_personal->nama, $nemb );

			    $document->setValue('n4#'.$nn, $ambil_majikan->namamajikan, $nemb );
				$document->setValue('n5#'.$nn, htmlspecialchars( $ambil_majikan->nama ), $nemb );

			    $document->setValue('n6#'.$nn, $tglterbang, $nemb );

				$document->setValue('n8#'.$nn, $ambil_agen->nama, $nemb );

				$document->setValue('n9#'.$nn, $value->tgl_transfer_doku, $nemb );

				$document->setValue('n10#'.$nn, str_replace(".", ",", $tki_val), $nemb  );

				$total_kuning += str_replace(".", "", $tki_val);

			$nomor++;
			$nn++;
			}

			$document->setValue('t1', number_format($total_kuning, 0, "", ","), '1' );

			$total_coklat += $total_kuning;
		}

		$ambil_penerima = $this->M_session->select_row("SELECT 
			*
			FROM dataagen_penerima_nama
			WHERE id='".$penerima_id."'
			order by id desc
		");

		$document->setValue('opsi1', $tgl1.' ~ '.$tgl2 );
		$document->setValue('opsi2', date('Y.m.d') );
		$document->setValue('opsi3', $ambil_penerima->nama.' | '.$ambil_penerima->namamandarin );
		$document->setValue('opsi4', $ambil_penerima->branch );
		$document->setValue('opsi5', '-' );
		$document->setValue('opsi6', $ambil_penerima->bank_code);
		$document->setValue('opsi7', $ambil_penerima->bank_no );

		$document->setValue('t2', $tgl1.'~'.$tgl2 );
		$document->setValue('t3', number_format($total_coklat, 0, "", ",") );
		
		$filename = 'LAPORAN TRANSFER AGENSI .docx';

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


/*
	function printdata($agen_id, $tgl1, $tgl2)
	{
		$PHPWord 		= new \PhpOffice\PhpWord\PhpWord();
		$document 		= $PHPWord->loadTemplate( atemplate_url("pt/transfer_biaya_agensi.docx") );

		$quww = 'SELECT 
			*
			FROM dataagen_promosi 
			WHERE agen_id = "'.$agen_id.'" 
			AND tgl_transfer_doku between "'.$tgl1.'" AND "'.$tgl2.'"
			AND softDelete != 1
		';
		$zselectionz 	= $this->M_session->select($quww);

		$total = 0;
		foreach( $zselectionz as $dd )
		{
			$data_tki = json_decode($dd->data, true);
			$total += count($data_tki);
		}

		//$document->cloneBlock('clonesection', 3);
		$document->cloneRow('n1',$total);

		$nn=1;	
		foreach ($zselectionz as $value) 
		{
			$data_tki = json_decode($value->data, true);

			foreach ( $data_tki as $tki_key => $tki_val )
			{
				$ambil_personal = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$tki_key."'");
				$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$value->agen_id."'");
				$ambil_visa = $this->M_session->select_row("SELECT * FROM visa WHERE id_biodata='".$tki_key."'");
				$ambil_majikan = $this->M_session->select_row("SELECT * FROM majikan JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE id_biodata='".$tki_key."'");

				$tglterbang = "還沒確定時間。";
				if ( $ambil_visa != NULL )
				{
					$tglterbang = "";
					if ( date('Y-m-d') <= $ambil_visa->tanggalterbang )
					{
						$tglterbang = "安排。";	
					}
					$tglterbang .= $ambil_visa->tanggalterbang;	
				}

			    $document->setValue('n1#'.$nn, $nn);
			    $document->setValue('n2#'.$nn, $tki_key);
			    $document->setValue('n3#'.$nn, $ambil_personal->nama);

			    $document->setValue('n4#'.$nn, $ambil_majikan->namamajikan );
				$document->setValue('n5#'.$nn, $ambil_majikan->nama );

			    $document->setValue('n6#'.$nn, $tglterbang);

				$document->setValue('n8#'.$nn, $ambil_agen->nama);

				$document->setValue('n9#'.$nn, $value->tgl_transfer_doku);

				$document->setValue('n10#'.$nn, str_replace(".", ",", $tki_val) );
			$nn++;
			}
		}

		$ambil_penerima = $this->M_session->select_row("SELECT 
			dataagen_penerima_dana.*,
			concat( dataagen.namamandarin, '    / ', dataagen.nama) as agen_nama 
			FROM dataagen_penerima_dana 
			JOIN dataagen ON dataagen_penerima_dana.agen_id=dataagen.id_agen
			WHERE agen_id='".$value->agen_id."' 
			and softDelete != 1 
			order by id desc
		");

		$document->setValue('opsi1', $tgl1.' ~ '.$tgl2 );
		$document->setValue('opsi2', date('Y.m.d') );
		$document->setValue('opsi3', $ambil_penerima->agen_nama );
		$document->setValue('opsi4', $ambil_penerima->bank_name );
		$document->setValue('opsi5', $ambil_penerima->branch );
		$document->setValue('opsi6', $ambil_penerima->bank_code);
		$document->setValue('opsi7', $ambil_penerima->bank_no );

		$document->setValue('t1', '' );
		$document->setValue('t2', $tgl1.'~'.$tgl2 );
		$document->setValue('t3', '' );
		
		$filename = 'LAPORAN TRANSFER AGENSI.docx';

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
	}*/


}

?>