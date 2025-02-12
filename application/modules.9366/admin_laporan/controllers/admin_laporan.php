<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class admin_laporan extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}

	function formulir_wintrust()
	{
		$data['namamodule'] 	= "admin_laporan";
		$data['namafileview'] 	= "formulir_wintrust/index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function formulir_wintrust_read()
	{
		$columns_d1 = array(
			'tgl',
			'rate',
			'no'
		);

		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'] );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			*
			FROM admin_laporan_formulir_wintrust
			$where_d1 
			order by id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {
        	$btn_actions = '<button type="button" class="btn btn-xs bg-success start_edit_btn" data-id="'.$row->id.'">Ubah</button> '.
        					'<button type="button" class="btn btn-xs bg-danger start_delete_btn" data-id="'.$row->id.'">Delete</button> '.
        					'<a class="btn btn-xs bg-info" href="'.site_url('admin_laporan/formulir_wintrust_detail/'.$row->id).'">Detail</a> '.
        					'<a class="btn btn-xs bg-info" href="'.site_url('admin_laporan/formulir_wintrust_print/'.$row->id).'">Print</a>';

			$no++;
			array_push($data2,
				array(
					$no,
					$btn_actions,
					$row->no,
					$row->tgl,
					$row->rate
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				admin_laporan_formulir_wintrust
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				admin_laporan_formulir_wintrust
			");

		$r = array(
			"draw"            => isset( $request['draw'] ) ? intval( $request['draw'] ) : 0,
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => $data2
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($r));
	}

	function formulir_wintrust_insert()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$data = array(
			'no' 	=> $this->input->post('no'),
			'tgl' 	=> $this->input->post('tgl'),
			'rate' 	=> $this->input->post('rate'),
			'date_created' 	=> date('Y-m-d H:i:s')
		);

		$chck = $this->M_session->insert($data, "admin_laporan_formulir_wintrust");

		if ( $chck == TRUE ) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil di tambah';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function formulir_wintrust_edit()
	{
		$id = $this->input->post('id');

		$data = $this->M_session->select_row("SELECT * FROM admin_laporan_formulir_wintrust WHERE id='".$id."'");

    	$this->output->set_content_type('application/json')->set_output(json_encode( $data ));
	}

	function formulir_wintrust_update()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$id = $this->input->post('id_hidden');

		$data = array(
			'no' 	=> $this->input->post('no'),
			'tgl' 	=> $this->input->post('tgl'),
			'rate' 	=> $this->input->post('rate')
		);

		$chck = $this->M_session->update($data, "admin_laporan_formulir_wintrust", $id, "id");

		if ( $chck == TRUE ) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil di ubah';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function formulir_wintrust_delete()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$id = $this->input->post('id');

		$chck = $this->M_session->delete("admin_laporan_formulir_wintrust", $id, "id");

		if ( $chck == TRUE ) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil di hapus';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function formulir_wintrust_detail($id)
	{
		$data['id'] = $id;

		$data['namamodule'] 	= "admin_laporan";
		$data['namafileview'] 	= "formulir_wintrust/detail";
		echo Modules::run('template/new_admin_template', $data);
	}

	function formulir_wintrust_detail_read($id)
	{
		$columns_d1 = array(
			'idbio',
			'personal.nama',
		);

		$where_ori = ' formulir_wintrust_id = "'.$id.'" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			admin_laporan_formulir_wintrust_detail.*,
			personal.nama
			FROM admin_laporan_formulir_wintrust_detail
			LEFT JOIN personal ON admin_laporan_formulir_wintrust_detail.idbio=personal.id_biodata
			$where_d1 
			order by id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {
        	$btn_actions = '<button type="button" class="btn btn-xs bg-success start_edit_btn" data-id="'.$row->id.'">Ubah</button> '.
        					'<button type="button" class="btn btn-xs bg-danger start_delete_btn" data-id="'.$row->id.'">Delete</button> ';

        	$a1 = $this->M_session->select_row("SELECT * FROM dataagen where id_agen='".$row->agen_id."'");

        	$a1x;
        	if ( $a1 != NULL )
        	{
        		$a1x = $a1->nama;
        	}

        	$a2 = $this->M_session->select_row("SELECT * FROM dataagen_penerima_dana 
			LEFT JOIN dataagen_penerima_nama on dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id where dataagen_penerima_dana.id='".$row->penerima_id."'");

        	$a2x;
        	if ( $a2 != NULL )
        	{
        		$a2x = $a2->nama.' | '.$a2->namamandarin;
        	}

			$no++;
			array_push($data2,
				array(
					$no,
					$btn_actions,
					$row->idbio,
					$row->nama,
					$a1x,
					$a2x,
					$row->ntd
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				admin_laporan_formulir_wintrust_detail
				LEFT JOIN personal ON admin_laporan_formulir_wintrust_detail.idbio=personal.id_biodata
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				admin_laporan_formulir_wintrust_detail
				LEFT JOIN personal ON admin_laporan_formulir_wintrust_detail.idbio=personal.id_biodata
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

	function formulir_wintrust_detail_add($id)
	{
		$datatki = $this->M_session->select("
			SELECT 
			* 
			FROM personal 
			WHERE statusaktif != 'Mengundurkan diri' 
			and statusaktif != 'UNFIT' 
			ORDER BY id_biodata ASC
		");

		$option = "";
		foreach ($datatki as $key => $value) 
		{
			$option .= "\t".'<option value="'.$value->id_biodata.'">'.$value->id_biodata.' '.$value->nama.'</option>'."\n";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($option));
	}

	function formulir_wintrust_detail_get_penerima($id)
	{
		$idbio = $this->input->post('idbio');

		$get_Data = $this->M_session->select("
			SELECT 
			*,
			dataagen_penerima_dana.id as danaid
			FROM majikan 
			LEFT JOIN dataagen ON majikan.kode_agen=dataagen.id_agen 
			LEFT JOIN dataagen_penerima_dana ON dataagen.id_agen=dataagen_penerima_dana.agen_id
			LEFT JOIN dataagen_penerima_nama on dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id
			WHERE majikan.id_biodata = '".$idbio."' 
		");

		$option = "";
		foreach ($get_Data as $key => $value) 
		{
			$option .= "\t".'<option value="'.$value->danaid.'">'.$value->nama.' | '.$value->namamandarin.'</option>'."\n";
		}

		$get_agen = $this->M_session->select("
			SELECT 
			* 
			FROM majikan 
			LEFT JOIN dataagen ON majikan.kode_agen=dataagen.id_agen 
			WHERE majikan.id_biodata = '".$idbio."' 
		");

		$agen_nama = "";
		$agen_id = "";
		foreach ($get_agen as $key => $value) 
		{
			$agen_nama = $value->nama;
			$agen_id = $value->id_agen;
		}

		$fully = array(
			'option' => $option,
			'agen' => $agen_nama,
			'agen_id' => $agen_id
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($fully));
	}

	function formulir_wintrust_detail_insert()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$data = array(
			'idbio' 		=> $this->input->post('tki'),
			'agen_id' 		=> $this->input->post('agen_id'),
			'penerima_id' 	=> $this->input->post('penerima_id'),
			'ntd' 			=> '35000',
			'formulir_wintrust_id' => $this->input->post('id_hidden'),
			'date_created' 	=> date('Y-m-d H:i:s')
		);

		$chck = $this->M_session->insert($data, "admin_laporan_formulir_wintrust_detail");

		if ( $chck == TRUE ) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil di tambah';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function formulir_wintrust_detail_edit()
	{
		$id = $this->input->post('id');

		$datatki = $this->M_session->select("
			SELECT 
			* 
			FROM personal 
			WHERE statusaktif != 'Mengundurkan diri' 
			and statusaktif != 'UNFIT' 
			ORDER BY id_biodata ASC
		");

		$option = "";
		foreach ($datatki as $key => $value) 
		{
			$option .= "\t".'<option value="'.$value->id_biodata.'">'.$value->id_biodata.' '.$value->nama.'</option>'."\n";
		}

		$ambil_data = $this->M_session->select_row("SELECT * FROM admin_laporan_formulir_wintrust_detail WHERE id='".$id."'");

		$data = array(
			'a' => $ambil_data,
			'b' => $option
		);

    	$this->output->set_content_type('application/json')->set_output(json_encode( $data ));
	}

	function formulir_wintrust_detail_update()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$id = $this->input->post('id_hidden');

		$data = array(
			'idbio' 		=> $this->input->post('tki'),
			'agen_id' 		=> $this->input->post('agen_id'),
			'penerima_id' 	=> $this->input->post('penerima_id'),
		);

		$chck = $this->M_session->update($data, "admin_laporan_formulir_wintrust_detail", $id, "id");

		if ( $chck == TRUE ) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil di ubah';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function formulir_wintrust_detail_delete()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$id = $this->input->post('id');

		$chck = $this->M_session->delete("admin_laporan_formulir_wintrust_detail", $id, "id");

		if ( $chck == TRUE ) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil di hapus';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	function formulir_wintrust_print($id)
	{
		$sql = $this->M_session->select("SELECT 
			* 
			FROM admin_laporan_formulir_wintrust 
			join admin_laporan_formulir_wintrust_detail ON admin_laporan_formulir_wintrust.id=admin_laporan_formulir_wintrust_detail.formulir_wintrust_id
			where admin_laporan_formulir_wintrust.id='".$id."'");

		$sql2 = $this->M_session->select_row("SELECT 
			* 
			FROM admin_laporan_formulir_wintrust 
			where id='".$id."'");

        $objPHPExcel = new Spreadsheet();

		$objReader = IOFactory::createReader('Xlsx');
		$objPHPExcel = $objReader->load( "files/formulir_wintrust.xlsx" );

		$data_se = array();
		$total_ntd = 0;
		$total_rp = 0;

		foreach ($sql as $key => $row) 
		{
			$ambil_paspor		= $this->M_session->select_row("SELECT * FROM paspor WHERE id_biodata='".$row->idbio."'");
			$ambil_personal 	= $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$row->idbio."'");
			$ambil_agen 		= $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$row->agen_id."'");
			$ambil_bankpenerima = $this->M_session->select_row("SELECT * FROM dataagen_penerima_dana 
			LEFT JOIN dataagen_penerima_nama on dataagen_penerima_dana.penerima_nama_id=dataagen_penerima_nama.id WHERE dataagen_penerima_dana.id='".$row->penerima_id."'");

			$nama = "";
			if ( $ambil_personal != NULL )
			{
				$nama = $ambil_personal->nama;
			}
			$paspor = "";
			if ( $ambil_paspor != NULL )
			{
				$paspor = $ambil_paspor->nopaspor;
			}
			$agen = "";
			if ( $ambil_agen != NULL )
			{
				$agen = $ambil_agen->nama;
			}
			$penerima = "";
			$bankname = "";
			$bankno   = "";
			if ( $ambil_bankpenerima != NULL )
			{
				$penerima = $ambil_bankpenerima->nama.' / '.$ambil_bankpenerima->namamandarin;
				$bankname = $ambil_bankpenerima->branch;
				$bankno   = $ambil_bankpenerima->bank_no;

				if ( substr($bankno, 0, 1) == "'" )
				{
					$bankno = substr($bankno,1);
				}
			}

			$data_se[] = array(
				'nama' 			=> $nama,
				'paspor' 		=> $paspor,
				'agen' 			=> $agen,
				'penerima' 		=> $penerima,
				'bank_name' 	=> $bankname,
				'bank_no' 		=> $bankno,
				'ntd' 			=> $row->ntd,
				'total' 		=> $row->ntd*$sql2->rate
			);

			$total_ntd += $row->ntd;
			$total_rp += $row->ntd*$sql2->rate;
		}

		$baseRow = 13;
		foreach($data_se as $r => $dataRow) 
		{
			$row = $baseRow + $r;
			$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

			$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$row, $r+1)
			    ->setCellValue('B'.$row, $dataRow['nama'] )
			    ->setCellValue('C'.$row, $dataRow['paspor'] )
			    ->setCellValue('D'.$row, $dataRow['agen'] )
			    ->setCellValue('E'.$row, $dataRow['penerima'] )
			    ->setCellValue('F'.$row, $dataRow['bank_name'] )
			    ->setCellValue('G'.$row, $dataRow['bank_no'] )
			    ->setCellValue('H'.$row, $dataRow['ntd'] )
			    ->setCellValue('I'.$row, $dataRow['total'] );
		}

		$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

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

		$tglx = explode(".", $sql2->tgl);
		$tgly = $tglx[2].' '.$bulan_array[ $tglx[1] ].' '.$tglx[0];

		$objPHPExcel->getActiveSheet()
			->setCellValue('H'.$row, $total_ntd )
			->setCellValue('I'.$row, $total_rp )
			->setCellValue('A7', 'No Transaksi     : '.$sql2->no )
			->setCellValue('A8', 'Tanggal               : '.$tgly )
			->setCellValue('A9', 'Rate                     : '.$sql2->rate );
		
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="ADMIN .xlsx"');

        $objWriter->save("php://output");
	}
}