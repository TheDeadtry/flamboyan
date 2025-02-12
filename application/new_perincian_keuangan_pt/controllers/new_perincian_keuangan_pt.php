<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_perincian_keuangan_pt extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}

	function index()
	{
		$data['tampil_data_jenis_tki'] = $this->M_session->select("SELECT * FROM dataagen_jenis_tki ORDER BY id ASC");

		$data['namamodule'] 	= "new_perincian_keuangan_pt";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function index_show_table()
	{
		$columns_d1 = array(
			'tgl1',
			'tgl2',
			'catatan',
			'tgl_transfer',
			'jenis_tki'
		);

		$where_ori = ' dataagen_fee_tki_terbang.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			dataagen_fee_tki_terbang.*,
			datagroup.nama as group_nama,
			dataagen_jenis_tki.nama as jenis_tki_nama
			FROM dataagen_fee_tki_terbang
			LEFT JOIN datagroup ON dataagen_fee_tki_terbang.group=datagroup.id_group
			LEFT JOIN dataagen_jenis_tki ON dataagen_fee_tki_terbang.jenis_tki=dataagen_jenis_tki.kode
			$where_d1 
			order by id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {
        	$print_btn = '';
        	if ( $row->data != NULL )
        	{
        		$print_btn = '<a href="'.site_url('new_perincian_keuangan_pt/printdata/'.$row->id).'"><span class="label bg-indigo">Print</span></a><br/>';
        	}

        	$btn_actions = '
        		<a href="'.site_url('new_perincian_keuangan_pt/detail/'.$row->id).'"><span class="label label-primary">Detail</span></a><br/>
        		'.$print_btn.'
        		<a><span class="label label-success btn_action_ubah" data-id="'.$row->id.'">Ubah</span></a><br/>
        		<a><span class="label label-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</span></a><br/>
        	';

        	$agen_terpilih = "";
        	if ( $row->pilihan == 2 )
        	{
        		$agen_pil = array();
        		$agen_exp = explode(",", $row->agen );
        		foreach ( $agen_exp as $val )
        		{
        			$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen = ".$val);
        			if ( $ambil_agen != NULL )
        			{
        				$agen_pil[] = $ambil_agen->nama;
        			}
        		}
        		$agen_terpilih = implode("<br/>", $agen_pil);
        	}
        	else if ( $row->pilihan == 3 )
        	{
        		$agen_terpilih = $row->group_nama;
        	}
        	else if ( $row->pilihan == 1 )
        	{
        		$agen_terpilih = "SEMUA AGEN";
        	}

			$no++;
			array_push($data2,
				array(
					$no,
					$btn_actions,
					$row->tgl1.' ~ '.$row->tgl2,
					$row->tgl_transfer,
					$agen_terpilih,
					$row->jenis_tki_nama,
					$row->catatan
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				dataagen_fee_tki_terbang
				LEFT JOIN datagroup ON dataagen_fee_tki_terbang.group=datagroup.id_group
				LEFT JOIN dataagen_jenis_tki ON dataagen_fee_tki_terbang.jenis_tki=dataagen_jenis_tki.kode
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				dataagen_fee_tki_terbang
				LEFT JOIN datagroup ON dataagen_fee_tki_terbang.group=datagroup.id_group
				LEFT JOIN dataagen_jenis_tki ON dataagen_fee_tki_terbang.jenis_tki=dataagen_jenis_tki.kode
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

	function index_ambil_agen()
	{
		$ambil_data = $this->M_session->select("SELECT * FROM dataagen");

		$option = '';
		foreach ($ambil_data as $key => $value) {
			$option .= '<option value="'.$value->id_agen.'">'.$value->nama.'</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
	}

	function index_ambil_group()
	{
		$ambil_data = $this->M_session->select("SELECT * FROM datagroup");

		$option = '';
		foreach ($ambil_data as $key => $value) {
			$option .= '<option value="'.$value->id_group.'">'.$value->nama.'</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
	}

	function index_insert()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$tgl1 			= $this->input->post('tgl1');
		$tgl2 			= $this->input->post('tgl2');
		$catatan 		= $this->input->post('catatan');
		$tgl_transfer 	= $this->input->post('tgl_transfer');
		$pilihan 		= $this->input->post('pilihan');
		$group 			= $this->input->post('group');
		$agen 			= $this->input->post('agen');
		$jenis_tki 		= $this->input->post('jenis_tki');

		if ( $pilihan == 2 )
		{
			$agen = implode(",", $agen );
		}

		$data = array (
			'tgl1' 			=> $tgl1,
			'tgl2' 			=> $tgl2,
			'catatan' 		=> $catatan,
			'tgl_transfer' 	=> $tgl_transfer,
			'pilihan' 		=> $pilihan,
			'group' 		=> $group,
			'agen' 			=> $agen,
			'jenis_tki' 	=> $jenis_tki,
			'date_created'  => date('Y-m-d H:i:s')
		);

		$check = $this->M_session->insert($data, "dataagen_fee_tki_terbang");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function index_edit()
	{
		$id = $this->input->post('id');
		$ambil_data = $this->M_session->select_row("SELECT * FROM dataagen_fee_tki_terbang WHERE id='".$id."'");

		$agen_exp = explode(",", $ambil_data->agen);
    	$agen_final = array();
    	foreach ( $agen_exp as $row ) {
    		$agen_final[] = $row;
    	}

		$data = array(
			'v1' => $ambil_data,
			'agen' => $agen_final
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $data ));
	}

	function index_update()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id 			= $this->input->post('id_hidden');

		$tgl1 			= $this->input->post('tgl1');
		$tgl2 			= $this->input->post('tgl2');
		$catatan 		= $this->input->post('catatan');
		$tgl_transfer 	= $this->input->post('tgl_transfer');
		$pilihan 		= $this->input->post('pilihan');
		$group 			= $this->input->post('group');
		$agen 			= $this->input->post('agen');
		$jenis_tki 		= $this->input->post('jenis_tki');

		if ( $pilihan == 2 )
		{
			$agen = implode(",", $agen );
		}

		$data = array (
			'tgl1' 			=> $tgl1,
			'tgl2' 			=> $tgl2,
			'catatan' 		=> $catatan,
			'tgl_transfer' 	=> $tgl_transfer,
			'pilihan' 		=> $pilihan,
			'group' 		=> $group,
			'agen' 			=> $agen,
			'jenis_tki' 	=> $jenis_tki,
			'date_created'  => date('Y-m-d H:i:s')
		);

		$check = $this->M_session->update($data, "dataagen_fee_tki_terbang", $id, "id");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI UBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function index_delete()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$check = $this->M_session->delete("dataagen_fee_tki_terbang", $id, "id");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI HAPUS';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function detail($id)
	{
		
		$data345['id']    = $id;

		$data345['namamodule'] 		= "new_perincian_keuangan_pt";
		$data345['namafileview'] 	= "detail";
		echo Modules::run('template/new_admin_template', $data345);
	}

	function detail_show_table($id)
	{
		$ambil_fee = $this->M_session->select_row("SELECT * FROM dataagen_fee_tki_terbang where id='".$id."'");

		$tgl1 			= $ambil_fee->tgl1;
		$tgl2 			= $ambil_fee->tgl2;
		$catatan 		= $ambil_fee->catatan;
		$tgl_transfer 	= $ambil_fee->tgl_transfer;
		$pilihan 		= $ambil_fee->pilihan;
		$group 			= $ambil_fee->group;
		$agen 			= $ambil_fee->agen;
		$jenis_tki 		= $ambil_fee->jenis_tki;
		$data 			= $ambil_fee->data;

		if ( $data != NULL )
		{
			$datatki = json_decode($data, true);
		}

		//=====================================================//
		$wehre = "";
		if ( $pilihan == 2 )
		{
			$agen_exp = explode(",", $agen);
			foreach ( $agen_exp as $val )
			{
				$wehre[] = "majikan.kode_agen = '".$val."'";
			}
			$wehre = implode(" OR ", $wehre);
			$wehre = "( ".$wehre." ) AND ";
		}
		else if ( $pilihan == 3 )
		{
			$wehre = "majikan.kode_group = '".$group."' AND ";
		}

		$jenis_tki_exp = explode(",", $jenis_tki);
		foreach ($jenis_tki_exp as $key => $value) 
		{
			$where[] = 'visa.id_biodata LIKE "'.$value.'%"';
		}
		$jenis_tki_imp = implode(" OR ", $where);
		$jenis_tki_imp = '('. $jenis_tki_imp .') AND ';
		//=====================================================//

		$ambil_data = $this->M_session->select("
			(SELECT 
			visa.*, 
			personal.nama as tki_nama, 
			majikan.kode_group, 
			majikan.kode_agen, 
			datakreditbank.namakredit,
			datakreditbank.isikredit
			FROM visa 
			JOIN personal ON visa.id_biodata=personal.id_biodata 
			JOIN majikan ON majikan.id_biodata=personal.id_biodata 
			JOIN signingbank ON signingbank.id_biodata=visa.id_biodata 
			JOIN datakreditbank ON signingbank.idkredit=datakreditbank.id_kreditbank
			where tanggalterbang BETWEEN '".$tgl1."' AND '".$tgl2."' AND
			".$wehre."
			".$jenis_tki_imp."
			datakreditbank.namakredit = 'CS'
			order by visa.tanggalterbang, visa.id_biodata ASC)
			UNION
			(SELECT 
			visa.*, 
			personal.nama as tki_nama, 
			majikan.kode_group, 
			majikan.kode_agen, 
			datakreditbank.namakredit,
			datakreditbank.isikredit
			FROM visa 
			JOIN personal ON visa.id_biodata=personal.id_biodata 
			JOIN majikan ON majikan.id_biodata=personal.id_biodata 
			JOIN signingbank ON signingbank.id_biodata=visa.id_biodata 
			JOIN datakreditbank ON signingbank.idkredit=datakreditbank.id_kreditbank
			where tanggalterbang BETWEEN '".$tgl1."' AND '".$tgl2."' AND
			".$wehre."
			".$jenis_tki_imp."
			datakreditbank.namakredit != 'CS'
			order by visa.tanggalterbang, visa.id_biodata ASC)
		");

		$table_master = "";
		$no = 0;
		foreach ($ambil_data as $key => $value) 
		{	
			$set = FALSE;
			$table = '<tr>';
			$table .=  '<input type="hidden" value="'.$value->id_biodata.'" name="idtki['.$no.']" />';
			$table .=  '<input type="hidden" value="'.$value->kode_agen.'" name="agen['.$no.']" />';
			$table .=  '<td><a><label class="label bg-danger remove_row_btn pointer">Hapus</label></a></td>';
			$table .=  '<td></td>';
			$table .=  '<td>'.$value->tanggalterbang.'</td>';
			$table .=  '<td>'.$value->id_biodata.'<br/>'.$value->tki_nama.'</td>';
			$table .=  '<td>'.$value->namakredit.'<br/>'.$value->isikredit.'</td>';

			if ( $data != NULL )
			{
				foreach ( $datatki as $datatki_key => $datatki_val )
				{
					if ( $value->id_biodata == $datatki_key )
					{
						$set = TRUE;
						$table .=  '<td>';
						foreach ( $datatki_val as $pvz )
						{
							$nilai_fee_standard = $pvz;

							$checker = substr( $nilai_fee_standard , 0, 1);

							$ntd = $nilai_fee_standard;
							$icom = 'icon-plus2';
							$val_minp = '+';
							if ( $checker == '-' )
							{
								$ntd = substr($nilai_fee_standard, 1) ;
								$icom = 'icon-minus2';
								$val_minp = '-';
							}

							$table .=  '<div class="input-group">
						                    <span class="input-group-btn">
						                        <button class="btn btn-default change_minplus" type="button"><i class="'.$icom.'"></i></button>
						                    </span>
						                    <input type="hidden" class="change_minplus_hidden" value="'.$val_minp.'" name="change_minplus['.$no.'][]" />
											<input type="text" class="form-control biaya_fee" value="'.$ntd.'" name="nominal['.$no.'][]" ee />
									      	<span class="input-group-btn">
							        			<button class="btn btn-default add_new_row" type="button"><i class="icon-diff-added"></i></button>
									      	</span>
									    </div>';
						}
						$table .=  '</td>';
					}
				}
			}
			else
			{
				$set = TRUE;
				if ( $value->namakredit == 'CS' )
				{
					$nilai_fee_standard = '35.000';
				}
				else if ( $value->namakredit != 'CS' )
				{
					$nilai_fee_standard = 'X';
				}
				$table .=  '<td>
								<div class="input-group">
				                    <span class="input-group-btn">
				                        <button class="btn btn-default change_minplus" type="button"><i class="icon-plus2"></i></button>
				                    </span>
				                    <input type="hidden" class="change_minplus_hidden" value="+" name="change_minplus['.$no.'][]" />
									<input type="text" class="form-control biaya_fee" value="'.$nilai_fee_standard.'" name="nominal['.$no.'][]" dd />
							      	<span class="input-group-btn">
							        	<button class="btn btn-default add_new_row" type="button"><i class="icon-diff-added"></i></button>
							      	</span>
							    </div>
							</td>';
			}

			$table .= '</tr>';

			if ( $set == TRUE )
			{
				$table_master .= $table;
			}

		$no++;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $table_master ));
	}

	function detail_input_fee($ids)
	{
		$id = $this->input->post('idtki');
		$ag = $this->input->post('agen');
		$nt = $this->input->post('nominal');
		$cm = $this->input->post('change_minplus');
/*
		for ( $x=0; $x<count($id); $x++ )
		{
			$nt_cm = array();
			for( $y=0; $y<count( $nt[$x] ); $y++ )
			{
				if ( $cm[$y] == '-' )
				{
					$nt_cm[] = '-'.$nt[$y];
				}
				else
				{
					$nt_cm[] = $nt[$y];
				}
			}
			$data[ $id[$x] ] = $nt_cm;
		}*/

		foreach ( $id as $key => $val )
		{
			echo $key;
			$nt_cm = array();
			foreach( $nt[$key] as $nt_key => $nt_val )
			{
				if ( $cm[$key][$nt_key] == '-' )
				{
					$nt_cm[] = '-'.$nt[$key][$nt_key];
				}
				else
				{
					$nt_cm[] = $nt[$key][$nt_key];
				}
			}
			$data[ $id[$key] ] = $nt_cm;
		}

		$data = json_encode($data);

		$uniquePids = array_unique($ag);

		$data2 = array(
			'data' 		=> $data,
			'agen_list' => json_encode($uniquePids)
		);

		$check = $this->M_session->update($data2, "dataagen_fee_tki_terbang", $ids, "id");

		if ( $check == TRUE )
		{
			redirect('new_perincian_keuangan_pt');
		}
	}

	function printdata($id)
	{
		$ambil_fee = $this->M_session->select_row("SELECT * FROM dataagen_fee_tki_terbang where id='".$id."'");

		$tgl1 			= $ambil_fee->tgl1;
		$tgl2 			= $ambil_fee->tgl2;
		$catatan 		= $ambil_fee->catatan;
		$tgl_transfer 	= $ambil_fee->tgl_transfer;
		$pilihan 		= $ambil_fee->pilihan;
		$group 			= $ambil_fee->group;
		$agen 			= $ambil_fee->agen;
		$jenis_tki 		= $ambil_fee->jenis_tki;
		$data 			= $ambil_fee->data;
		$agen_list		= $ambil_fee->agen_list;

		$document = new \PhpOffice\PhpWord\TemplateProcessor( atemplate_url("pt/perincian_tki_terbang_pembayaran_bank.docx") );

		$datatki = json_decode($data, true);

		$jenis_tki_exp = explode(",", $jenis_tki);
		foreach ($jenis_tki_exp as $key => $value) 
		{
			$where[] = 'visa.id_biodata LIKE "'.$value.'%"';
		}
		$jenis_tki_imp = implode(" OR ", $where);
		$jenis_tki_imp = '('. $jenis_tki_imp .')';

		$agen_list = json_decode($agen_list, true);

		$document->cloneBlock( 'CLONEME', count($agen_list) );
		
		$nl=1;
		foreach ( $agen_list as $valueable )
		{
			$ambil_data = $this->M_session->select("
				SELECT 
				visa.*, 
				personal.nama as tki_nama, 
				majikan.kode_group, 
				majikan.kode_agen, 
				datakreditbank.namakredit,
				datakreditbank.isikredit
				FROM visa 
				JOIN personal ON visa.id_biodata=personal.id_biodata 
				JOIN majikan ON majikan.id_biodata=personal.id_biodata 
				JOIN signingbank ON signingbank.id_biodata=visa.id_biodata 
				JOIN datakreditbank ON signingbank.idkredit=datakreditbank.id_kreditbank
				where tanggalterbang BETWEEN '".$tgl1."' AND '".$tgl2."' AND
				majikan.kode_agen='".$valueable."' AND 
				".$jenis_tki_imp."
				order by visa.tanggalterbang, visa.id_biodata ASC");

			$countrower = 0;
			foreach ( $ambil_data as $ambil_data_val )
			{
				foreach ( $datatki as $datatki_key => $datatki_val )
				{
					if ( $ambil_data_val->id_biodata == $datatki_key )
					{
						$countrower += 1;
					}
				}
			}
			$document->cloneRow('x1', $countrower );

			$total_fee_per_agen = 0;
			$nn=1;
			foreach ( $ambil_data as $ambil_data_val )
			{
				foreach ( $datatki as $datatki_key => $datatki_val )
				{
					if ( $ambil_data_val->id_biodata == $datatki_key )
					{
						$ambil_visa 	= $this->M_session->select_row("SELECT * FROM visa WHERE id_biodata='".$datatki_key."'");

						$ambil_personal	= $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$datatki_key."'");

						$ambil_paspor 	= $this->M_session->select_row("SELECT * FROM paspor WHERE id_biodata='".$datatki_key."'");

						$ambil_majikan 	= $this->M_session->select_row("SELECT majikan.*,datamajikan.nama as dt_nama, datamajikan.namamajikan as dt_nmtw FROM majikan LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE id_biodata='".$datatki_key."'");

						$ambil_bank 	= $this->M_session->select_row("SELECT * 
											FROM signingbank 
											LEFT JOIN datakreditbank
											ON signingbank.idkredit=datakreditbank.id_kreditbank
											WHERE signingbank.id_biodata='".$datatki_key."'");

						$idss = substr($datatki_key, 0, 2);
						if ( $idss == 'FF' || $idss == 'MF' || $idss == 'JP' )
						{
							$majikane = $ambil_majikan->dt_nama.' '.$ambil_majikan->dt_nmtw;
						}
						else
						{
							$majikane = $ambil_majikan->namamajikan.' '.$ambil_majikan->namataiwan;
						}
						$totntd = 0;
						$ntd = array();
						foreach ($datatki_val as $b2_key => $b2_val) 
						{
							$checker = substr($b2_val, 0, 1);
							if ( $checker == '-' )
							{
								$ntd[] = "(".substr($b2_val, 1).")" ;
								//$totntd += str_replace(".", "", substr($b2_val, 1) );
							}
							else
							{
								$ntd[] = $b2_val ;
								$totntd += str_replace(".", "", $b2_val );
							}
						}
						$ntd = implode("<w:br/>", $ntd);

					    $document->setValue('x1#'.$nn, $nn, $nl );
					    $document->setValue('x2#'.$nn, $ambil_visa->tanggalterbang, $nl );
					    $document->setValue('x3#'.$nn, $ambil_personal->id_biodata.'<w:br/>'.$ambil_personal->nama, $nl );
					    $document->setValue('x4#'.$nn, $ambil_paspor->nopaspor, $nl );
					    $document->setValue('x5#'.$nn, $majikane, $nl );
					    $document->setValue('x6#'.$nn, $ambil_bank->namakredit.'<w:br/>'.$ambil_bank->isikredit, $nl );
					    $document->setValue('x7#'.$nn, $ntd, $nl );
					    $document->setValue('x8#'.$nn, $ambil_personal->keterangan2, $nl );

						$total_fee_per_agen += $totntd;

					$nn++;
					}
				}
			}

			$dataagenn = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$valueable."'");

			$nama_agensii = "-";
			if ( $dataagenn != NULL )
			{
				$nama_agensii = $dataagenn->nama;
			}
			$document->setValue('namaagen', $nama_agensii, '1' );

			$document->setValue('z1', number_format( $total_fee_per_agen, 0, "", "."), '1' );
			$document->setValue('z2', '' );
			$document->setValue('z3', '' );

			$document->setValue('img', '' );


		$nl++;
		}

		$ambil_jenis_tki = $this->M_session->select_row("SELECT * FROM dataagen_jenis_tki WHERE kode='".$jenis_tki."'");
		$ambil_group = $this->M_session->select_row("SELECT * FROM datagroup WHERE id_group='".$group."'");

		$ambil_group = "SEMUA AGEN";
		if ( $pilihan == 3 )
		{
			$ambil_group = $this->M_session->select_row("SELECT * FROM datagroup WHERE id_group='".$group."'");
			$ambil_group = $ambil_group->nama;
		}
		else if ( $pilihan == 2 )
		{	
			$majikane = array();
			foreach ( $agen_list as $valueable )
			{
				$ambil_majikan 	= $this->M_session->select_row("SELECT majikan.*,datamajikan.nama as dt_nama, datamajikan.namamajikan as dt_nmtw FROM majikan LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE kode_agen='".$valueable."'");
				if ( $idss == 'FF' || $idss == 'MF' || $idss == 'JP' )
				{
					$majikane[] = $ambil_majikan->dt_nama.' '.$ambil_majikan->dt_nmtw;
				}
				else
				{
					$majikane[] = $ambil_majikan->namamajikan.' '.$ambil_majikan->namataiwan;
				}
			}
			$ambil_group = implode(",", $majikane);
		}

		$document->setValue('w1', $tgl1.' ~ '.$tgl2 );
		$document->setValue('w2', $ambil_group );//$ambil_group->kode_group
		$document->setValue('w3', $ambil_jenis_tki->nama );
		$document->setValue('w4', $catatan );
		$document->setValue('w5', $tgl_transfer );


		$document->setValue('y1', $tgl1.' ~ '.$tgl2 );
		$document->setValue('y2', $tgl1.' ~ '.$tgl2 );

/*
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
		
		*/
		
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

	function show_data()
	{
		$columns_d1 = array(
			'tgl_transfer_doku',
			'agen_id',
			'data'
		);

		$where_ori = ' dataagen_promosi.softDelete != 1 ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			dataagen_promosi.*,
			dataagen.nama as agen_nama
			FROM dataagen_promosi
			JOIN dataagen ON dataagen_promosi.agen_id=dataagen.id_agen
			$where_d1 
			order by id desc
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
        		<button class="btn btn-xs bg-success btn_action_ubah" data-id="'.$row->id.'">Ubah</button>
        		<button class="btn btn-xs bg-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</button>
        	';

			$ambil_bank = $this->M_session->select_row( "SELECT * FROM dataagen_penerima_dana WHERE id='".$row->bank_id."'" );

			$nama_bank = '';
			if ( $ambil_bank != NULL )
			{
				$nama_bank = $ambil_bank->bank_name;
			}

			$no++;
			array_push($data2,
				array(
					$no,
					$row->agen_nama,
					$nama_bank,
					$row->tgl_transfer_doku,
					$total_nt,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				dataagen_promosi
				JOIN dataagen ON dataagen_promosi.agen_id=dataagen.id_agen
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				dataagen_promosi
				JOIN dataagen ON dataagen_promosi.agen_id=dataagen.id_agen
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

	function ambil_bank()
	{
		$agen_id = $this->input->post('bank');

		$select_data = $this->M_session->select("SELECT * FROM dataagen_penerima_dana where agen_id='".$agen_id."' and softDelete != 1");

		$option = '';
		foreach ($select_data as $key => $value) {
			$option .= "\t".'<option value="'.$value->id.'">'.$value->bank_name.'</option>'."\n";
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
			/*concat( dataagen.namamandarin, '    / ', dataagen.nama) as agen_nama */
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
	}

	function cetak_laporan()
	{
		$data['tampil_data_group'] = $this->M_session->select("SELECT * FROM datagroup ORDER BY id_group ASC");
		$data['tampil_data_agen'] = $this->M_session->select("SELECT * FROM dataagen ORDER BY kode_agen ASC");

		$data['namamodule'] 	= "new_agen_promosi";
		$data['namafileview'] 	= "cetak_laporan";
		echo Modules::run('template/new_admin_template', $data);
	}

	function ambil_agen()
	{
		$dataagen = $this->M_session->select("SELECT * FROM dataagen WHERE kode_group=1");

		$option = "";
		foreach ( $dataagen as $row )
		{
			$option .= "\n".'<option value="'.$row->id_agen.'">'.$row->nama.'</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
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