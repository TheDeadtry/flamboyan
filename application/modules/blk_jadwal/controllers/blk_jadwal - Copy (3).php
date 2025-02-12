<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_jadwal extends MX_Controller {
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}
	
	function index() 
	{
		redirect('blk_jadwal/pelajaran');
	}
	
	function pelajaran() 
	{
		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "pelajaran";
		echo Modules::run('template/blk_template', $data); 
	}

	function pelajaran_read()
	{
		$columns_d1 = array(
			'blk_jadwal3_pelajaran.pelajaran'
		);

		$where_ori = ' blk_jadwal3_pelajaran.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			*
			FROM blk_jadwal3_pelajaran
			$where_d1 
			order by id desc
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {

        	$btn_actions = '
        		<a href="'.site_url('blk_jadwal/pelajaran_revisi/'.$row->id).'"><span class="label label-primary">Detail</span></a>
        		<a><span class="label label-success btn_action_ubah" data-id="'.$row->id.'">Ubah</span></a>
        		<a><span class="label label-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</span></a>
        	';

			$no++;
			array_push($data2,
				array(
					$no,
					$row->pelajaran,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				blk_jadwal3_pelajaran
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				blk_jadwal3_pelajaran
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
	
	function pelajaran_insert() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$pelajaran = $this->input->post('nama');

		$data = array (
			'pelajaran' 	=> $pelajaran,
			'created_at'  	=> date('Y-m-d H:i:s'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$check = $this->M_session->insert($data, "blk_jadwal3_pelajaran");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_edit() 
	{
		$id 		= $this->input->post('id');

		$datapm = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran WHERE id='".$id."'");

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_update() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id 		= $this->input->post('id');
		$pelajaran 	= $this->input->post('nama');

		$data = array (
			'pelajaran' 	=> $pelajaran,
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran where id='".$id."'");

		$data_record = array (
			'tipe' 			=> 'UPDATE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_pelajaran',
			'table_id' 		=> $id,
			'data' 			=> json_encode( (array) $query )
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_pelajaran", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI UBAH';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function pelajaran_delete() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$data = array (
			'deleted_at'  	=> date('Y-m-d H:i:s')
		);

		$data_record = array (
			'tipe' 			=> 'DELETE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_pelajaran',
			'table_id' 		=> $id,
			'data' 			=> '-'
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_pelajaran", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI HAPUS';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_revisi($id) {
		$data['id'] = $id;
		$data['pelajaran'] = $this->M_session->select_one("blk_jadwal3_pelajaran WHERE id='".$id."'", "pelajaran");

		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "pelajaran_revisi";
		echo Modules::run('template/blk_template', $data); 
	}

	function pelajaran_revisi_read($id)
	{
		$columns_d1 = array(
			'blk_jadwal3_pelajaran_revisi.revisi'
		);

		$where_ori = ' blk_jadwal3_pelajaran_revisi.pelajaran_id="'.$id.'" AND blk_jadwal3_pelajaran_revisi.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			*
			FROM blk_jadwal3_pelajaran_revisi
			$where_d1 
			order by id desc
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {

        	$btn_actions = '
        		<a href="'.site_url('blk_jadwal/pelajaran_materi/'.$id.'/'.$row->id).'"><span class="label label-primary">Detail</span></a>
        		<a><span class="label label-success btn_action_ubah" data-id="'.$row->id.'">Ubah</span></a>
        		<a><span class="label label-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</span></a>
        	';

			$no++;
			array_push($data2,
				array(
					$no,
					$row->revisi,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				blk_jadwal3_pelajaran_revisi
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				blk_jadwal3_pelajaran_revisi
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
	
	function pelajaran_revisi_insert() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$data = array (
			'revisi' 		=> $this->input->post('revisi'),
			'pelajaran_id' 	=> $this->input->post('pelajaran_id'),
			'created_at'  	=> date('Y-m-d H:i:s'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$check = $this->M_session->insert($data, "blk_jadwal3_pelajaran_revisi");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_revisi_edit() 
	{
		$id 		= $this->input->post('id');

		$datapm = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_revisi WHERE id='".$id."'");

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_revisi_update() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id 		= $this->input->post('id');

		$data = array (
			'revisi' 		=> $this->input->post('revisi'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_revisi where id='".$id."'");

		$data_record = array (
			'tipe' 			=> 'UPDATE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_pelajaran_revisi',
			'table_id' 		=> $id,
			'data' 			=> json_encode( (array) $query )
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_pelajaran_revisi", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI UBAH';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function pelajaran_revisi_delete() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$data = array (
			'deleted_at'  	=> date('Y-m-d H:i:s')
		);

		$data_record = array (
			'tipe' 			=> 'DELETE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_pelajaran_revisi',
			'table_id' 		=> $id,
			'data' 			=> '-'
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_pelajaran_revisi", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI HAPUS';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_materi($idpelajaran, $idrevisi) {
		$data['id1'] = $idpelajaran;
		$data['id2'] = $idrevisi;
		$data['pelajaran'] = $this->M_session->select_one("blk_jadwal3_pelajaran WHERE id='".$idpelajaran."'", "pelajaran");
		$data['pelajaran_revisi'] = $this->M_session->select_one("blk_jadwal3_pelajaran_revisi WHERE id='".$idrevisi."'", "revisi");

		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "pelajaran_materi";
		echo Modules::run('template/blk_template', $data); 
	}

	function pelajaran_materi_read($id)
	{
		$columns_d1 = array(
			'blk_jadwal3_pelajaran_materi.kode',
			'blk_jadwal3_pelajaran_materi.materi',
			'blk_jadwal3_pelajaran_materi.buku_hal',
			'blk_jadwal3_pelajaran_materi.penjelasan',
			'blk_jadwal3_pelajaran_materi.keterangan',
			'blk_jadwal3_pelajaran_materi.tipe_input_nilai'
		);

		$where_ori = ' blk_jadwal3_pelajaran_materi.pelajaran_revisi_id="'.$id.'" AND blk_jadwal3_pelajaran_materi.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			*
			FROM blk_jadwal3_pelajaran_materi
			$where_d1 
			order by id desc
		";

		$sql = $this->M_session->select($query1);
 
		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {

        	$btn_actions = '
        		<a href="'.site_url('blk_jadwal/pelajaran_materi/'.$id.'/'.$row->id).'"><span class="label label-primary">Detail</span></a>
        		<a><span class="label label-success btn_action_ubah" data-id="'.$row->id.'">Ubah</span></a>
        		<a><span class="label label-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</span></a>
        	';

			$no++;
			array_push($data2,
				array(
					$no,
					$row->kode,
					$row->materi,
					$row->buku_hal,
					$row->penjelasan,
					$row->keterangan,
					$row->tipe_input_nilai,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				blk_jadwal3_pelajaran_materi
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				blk_jadwal3_pelajaran_materi
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
	
	function pelajaran_materi_insert() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$data = array (
			'kode' 					=> $this->input->post('kode_materi'),
			'materi' 				=> $this->input->post('nama_materi'),
			'buku_hal' 				=> $this->input->post('buku_hal'),
			'penjelasan' 			=> $this->input->post('penjelasan'),
			'keterangan' 			=> $this->input->post('ket'),
			'tipe_input_nilai' 		=> $this->input->post('tipe_input_nilai'),
			'pelajaran_revisi_id' 	=> $this->input->post('pelajaran_revisi_id'),
			'created_at'  			=> date('Y-m-d H:i:s'),
			'updated_at'  			=> date('Y-m-d H:i:s')
		);

		$check = $this->M_session->insert($data, "blk_jadwal3_pelajaran_materi");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_materi_edit() 
	{
		$id = $this->input->post('id');

		$datapm = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$id."'");

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function pelajaran_materi_update() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id = $this->input->post('id');

		$data = array (
			'kode' 					=> $this->input->post('kode_materi'),
			'materi' 				=> $this->input->post('nama_materi'),
			'buku_hal' 				=> $this->input->post('buku_hal'),
			'penjelasan' 			=> $this->input->post('penjelasan'),
			'keterangan' 			=> $this->input->post('ket'),
			'tipe_input_nilai' 		=> $this->input->post('tipe_input_nilai'),
			'pelajaran_revisi_id' 	=> $this->input->post('pelajaran_revisi_id'),
			'updated_at'  			=> date('Y-m-d H:i:s')
		);

		$query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi where id='".$id."'");

		$data_record = array (
			'tipe' 			=> 'UPDATE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_pelajaran_materi',
			'table_id' 		=> $id,
			'data' 			=> json_encode( (array) $query )
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_pelajaran_materi", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI UBAH';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function pelajaran_materi_delete() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$data = array (
			'deleted_at'  	=> date('Y-m-d H:i:s')
		);

		$data_record = array (
			'tipe' 			=> 'DELETE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_pelajaran_materi',
			'table_id' 		=> $id,
			'data' 			=> '-'
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_pelajaran_materi", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI HAPUS';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	//==============================================================================================================//

	function paket()
	{
		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "paket";
		echo Modules::run('template/blk_template', $data); 
	}

	function paket_read()
	{
		$columns_d1 = array(
			'blk_jadwal3_paket.nama_paket',
			'blk_jadwal3_pelajaran.pelajaran',
			'blk_jadwal3_pelajaran_revisi.revisi'
		);

		$where_ori = ' blk_jadwal3_paket.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			blk_jadwal3_paket.id,
			blk_jadwal3_paket.nama_paket,
			blk_jadwal3_pelajaran.pelajaran,
			blk_jadwal3_pelajaran_revisi.revisi
			FROM blk_jadwal3_paket
			LEFT JOIN blk_jadwal3_pelajaran
			ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
			LEFT JOIN blk_jadwal3_pelajaran_revisi
			ON blk_jadwal3_paket.pelajaran_revisi_id=blk_jadwal3_pelajaran_revisi.id
			$where_d1 
			order by id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {

        	$btn_actions = '
        		<a href="'.site_url('blk_jadwal/paket_detail/'.$row->id).'"><span class="label label-primary">Detail</span></a>
        		<a><span class="label label-success btn_action_ubah" data-id="'.$row->id.'">Ubah</span></a>
        		<a><span class="label label-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</span></a>
        	';

			$no++;
			array_push($data2,
				array(
					$no,
					$row->nama_paket,
					$row->pelajaran.'<br/>'.$row->revisi,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				blk_jadwal3_paket
				LEFT JOIN blk_jadwal3_pelajaran
				ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
				LEFT JOIN blk_jadwal3_pelajaran_revisi
				ON blk_jadwal3_paket.pelajaran_revisi_id=blk_jadwal3_pelajaran_revisi.id
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				blk_jadwal3_paket
				LEFT JOIN blk_jadwal3_pelajaran
				ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
				LEFT JOIN blk_jadwal3_pelajaran_revisi
				ON blk_jadwal3_paket.pelajaran_revisi_id=blk_jadwal3_pelajaran_revisi.id
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

	function paket_add()
	{
		$datapm = $this->M_session->select("SELECT * FROM blk_jadwal3_pelajaran WHERE deleted_at = '' ");

		$option = "";
		foreach( $datapm as $val )
		{
			$option .= '<option value="'.$val->id.'">'.$val->pelajaran.'</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
	}

	function paket_get_rev()
	{
		$id = $this->input->post('id');

		$datapm = $this->M_session->select("SELECT * FROM blk_jadwal3_pelajaran_revisi WHERE deleted_at = '' and pelajaran_id='".$id."'");

		$option = "";
		foreach( $datapm as $val )
		{
			$option .= '<option value="'.$val->id.'">'.$val->revisi.'</option>';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
	}
	
	function paket_insert() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$data = array (
			'nama_paket' 	=> $this->input->post('paket'),
			'pelajaran_id' 	=> $this->input->post('pelajaran'),
			'pelajaran_revisi_id' 	=> $this->input->post('rev'),
			'created_at'  	=> date('Y-m-d H:i:s'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$check = $this->M_session->insert($data, "blk_jadwal3_paket");

		if ( $check == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function paket_edit() 
	{
		$id 		= $this->input->post('id');

		$datapp = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket WHERE id='".$id."'");

		$datavv = $this->M_session->select("SELECT * FROM blk_jadwal3_pelajaran WHERE deleted_at = '' ");

		$option = "";
		foreach( $datavv as $val )
		{
			$option .= '<option value="'.$val->id.'">'.$val->pelajaran.'</option>';
		}

		$datapm = array (
			'option' => $option,
			'v' 	 => $datapp
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function paket_update() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id 		= $this->input->post('id');

		$data = array (
			'nama_paket' 	=> $this->input->post('paket'),
			'pelajaran_id' 	=> $this->input->post('pelajaran'),
			'pelajaran_revisi_id' 	=> $this->input->post('rev'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket where id='".$id."'");

		$data_record = array (
			'tipe' 			=> 'UPDATE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_paket',
			'table_id' 		=> $id,
			'data' 			=> json_encode( (array) $query )
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_paket", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI UBAH';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_delete() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$data = array (
			'deleted_at'  	=> date('Y-m-d H:i:s')
		);

		$data_record = array (
			'tipe' 			=> 'DELETE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_paket',
			'table_id' 		=> $id,
			'data' 			=> '-'
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_paket", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI HAPUS';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail($id)
	{
		$data['id'] = $id;

		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "paket_detail";
		echo Modules::run('template/blk_template', $data); 
	}

	function paket_detail_get_minggu()
	{
		$ambil_data = $this->M_session->select("SELECT * FROM blk_jadwal3_setting_minggu order by kode ASC");

		$option = "";
		foreach ( $ambil_data as $row )
		{
			$option .= "<option value='".$row->id."'>".$row->kode."-".$row->minggu."</option>";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $option ));
	}

	function paket_detail_read($id)
	{
		$minggu_id = $this->input->post('id');

		$data = $this->M_session->select("SELECT 
			blk_jadwal3_paket_detail.*,
			concat(blk_hari.kode_hari,' ',blk_hari.hari) as nama_hari,
			concat(blk_jam.kode_jam,' ',blk_jam.jam) as nama_jam
			FROM blk_jadwal3_paket_detail 
			JOIN blk_hari ON blk_jadwal3_paket_detail.hari=blk_hari.id_hari
			JOIN blk_jam ON blk_jadwal3_paket_detail.jam=blk_jam.id_jam
			WHERE paket_id='".$id."' and minggu_id='".$minggu_id."' and blk_jadwal3_paket_detail.deleted_at=''");

		$no = 1;
		$table = "";
		foreach ($data as $key => $value) {

			$minggu_exp = explode(",", $value->angkatan);
			$minggu_fin = array();
			foreach ($minggu_exp as $k => $v) {
				$d = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_angkatan WHERE id='".$v."'");
				$minggu_fin[] = $d->kode;
			}
			$minggu_fin = implode(",", $minggu_fin);

			$materi_exp = json_decode($value->materi, true);
			$materi_fin = array();
			foreach ($materi_exp as $k => $v) {
				$d = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$v."'");
				$materi_fin[] = $d->kode.' - '.$d->materi;
			}
			$materi_fin = implode('<br/>', $materi_fin);

			$table .= '<tr>';
			$table .= 	'<td>'.$no.'</td>';
			$table .= 	'<td>'.$value->nama_hari.'</td>';
			$table .= 	'<td>'.$value->nama_jam.'</td>';
			$table .= 	'<td>'.$minggu_fin.'</td>';
			$table .= 	'<td>'.$materi_fin.'</td>';
			$table .= 	'<td>
        					<a><span class="label label-success btn_action_ubah" data-id="'.$value->id.'">Ubah</span></a>
        					<a><span class="label label-danger btn_action_hapus" data-id="'.$value->id.'">Hapus</span></a>
        				</td>';
			$table .= '</tr>';

		$no++;
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $table ));
	}

	function paket_detail_get_add_option($type, $id1, $id2=NULL)
	{

		$h1 = $this->M_session->select("SELECT * FROM blk_hari order by kode_hari ASC");
		$h2 = $this->M_session->select("SELECT * FROM blk_jam order by kode_jam ASC");
		$h3 = $this->M_session->select("SELECT * FROM blk_jadwal3_setting_angkatan");
		$h4 = $this->M_session->select("SELECT blk_jadwal3_pelajaran_materi.* 
					FROM blk_jadwal3_paket
					JOIN blk_jadwal3_pelajaran 
					ON blk_jadwal3_pelajaran.id=blk_jadwal3_paket.pelajaran_id
					JOIN blk_jadwal3_pelajaran_revisi
					ON blk_jadwal3_pelajaran_revisi.id=blk_jadwal3_paket.pelajaran_revisi_id 
					JOIN blk_jadwal3_pelajaran_materi
					ON blk_jadwal3_pelajaran_revisi.id=blk_jadwal3_pelajaran_materi.pelajaran_revisi_id
					where blk_jadwal3_paket.id='".$id1."'
				");

		$option1 = "";
		foreach ( $h1 as $val1 )
		{
			$option1 .= '<option value="'.$val1->id_hari.'">'.$val1->kode_hari.' '.$val1->hari.'</option>';
		}

		$option2 = "";
		foreach ( $h2 as $val2 )
		{
			$option2 .= '<option value="'.$val2->id_jam.'">'.$val2->kode_jam.' '.$val2->jam.'</option>';
		}

		$option3 = "";
		foreach ( $h3 as $val3 )
		{
			$option3 .= '<option value="'.$val3->id.'">'.$val3->kode.' '.$val3->angkatan.'</option>';
		}

		$option4 = "";
		foreach ( $h4 as $val4 )
		{
			$option4 .= '<option value="'.$val4->id.'">'.$val4->kode.' '.$val4->materi.'</option>';
		}

		$datapm = array(
			'option1' => $option1,
			'option2' => $option2,
			'option3' => $option3,
			'option4' => $option4,
		);

		if ( $type == 'add' )
		{
			$minggu_id = $this->input->post('id');

			$get_minggu = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$minggu_id."'");
			$get_minggu = $get_minggu->kode.'-'.$get_minggu->minggu;

			$datapm['minggu'] = $get_minggu;
		}
		else if ( $type == 'edit' )
		{
			$ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail WHERE id='".$id2."'");
			$get_minggu = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$ambil_data->minggu_id."'");
			$get_minggu = $get_minggu->kode.'-'.$get_minggu->minggu;

			$datapm['minggu'] = $get_minggu;
			$datapm['minggu2'] = $ambil_data->minggu_id;
			$datapm['val1'] = $ambil_data->hari;
			$datapm['val2'] = $ambil_data->jam;
			$datapm['val3'] = explode(",", $ambil_data->angkatan);
			$datapm['val4'] = json_decode($ambil_data->materi, true);
			$datapm['id'] = $id2;
		}

		return $datapm;
	}

	function paket_detail_add($id)
	{
		$datapm = $this->paket_detail_get_add_option('add', $id);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail_insert($id)
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$datazzz = array (
			'hari'			=> $this->input->post('hari'),
			'jam'			=> $this->input->post('jam'),
			'angkatan' 		=> implode(",", $this->input->post('angkatan') ),
			'materi' 		=> json_encode($this->input->post('materi')),
			'paket_id' 		=> $id,
			'minggu_id'		=> $this->input->post('minggu'),
			'created_at'  	=> date('Y-m-d H:i:s'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);	

		$check0 = $this->M_session->insert($datazzz, "blk_jadwal3_paket_detail");

		if ( $check0 == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail_edit($id1)
	{
		$id2 = $this->input->post('id');
		$datapm = $this->paket_detail_get_add_option('edit', $id1, $id2);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail_update()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id = $this->input->post('id');

		$datazzz = array (
			'hari'			=> $this->input->post('hari'),
			'jam'			=> $this->input->post('jam'),
			'angkatan' 		=> implode(",", $this->input->post('angkatan') ),
			'materi' 		=> json_encode($this->input->post('materi')),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);	

		$query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id."'");

		$data_record = array (
			'tipe' 			=> 'UPDATE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_paket_detail',
			'table_id' 		=> $id,
			'data' 			=> json_encode( (array) $query )
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($datazzz, "blk_jadwal3_paket_detail", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI UBAH';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail_delete() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$data = array (
			'deleted_at'  	=> date('Y-m-d H:i:s')
		);

		$data_record = array (
			'tipe' 			=> 'DELETE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_paket_detail',
			'table_id' 		=> $id,
			'data' 			=> '-'
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_paket_detail", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI HAPUS';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function datapembelajaran()
	{
		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "datapembelajaran";
		echo Modules::run('template/blk_template', $data); 
	}

	function datapembelajaran_read()
	{
		$columns_d1 = array(
			'blk_jadwal3_paket.nama_paket',
			'blk_instruktur.kode_instruktur',
			'blk_instruktur.nama',
			'blk_jadwal3_datapembelajaran.tanggal'
		);

		$where_ori = ' blk_jadwal3_datapembelajaran.deleted_at = "" ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			blk_jadwal3_datapembelajaran.id,
			blk_jadwal3_datapembelajaran.tanggal,
			blk_jadwal3_paket.nama_paket,
			blk_instruktur.kode_instruktur as ins_kode,
			blk_instruktur.nama as ins_nama
			FROM blk_jadwal3_datapembelajaran
			LEFT JOIN blk_jadwal3_paket
			ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
			LEFT JOIN blk_instruktur
			ON blk_jadwal3_datapembelajaran.instruktur_id=blk_instruktur.id_instruktur
			$where_d1 
			order by id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {
        	$btn_actions = '
        		<a href="'.site_url('blk_jadwal/datapembelajaran_detail/'.$row->id).'"><span class="label label-primary">Detail</span></a>
        		<a><span class="label label-success btn_action_ubah" data-id="'.$row->id.'">Ubah</span></a>
        		<a><span class="label label-danger btn_action_hapus" data-id="'.$row->id.'">Hapus</span></a>
        	';

			$no++;
			array_push($data2,
				array(
					$no,
					$row->tanggal,
					$row->nama_paket,
					$row->ins_kode.' - '.$row->ins_nama,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				blk_jadwal3_datapembelajaran
				LEFT JOIN blk_jadwal3_paket
				ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
				LEFT JOIN blk_instruktur
				ON blk_jadwal3_datapembelajaran.instruktur_id=blk_instruktur.id_instruktur
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				blk_jadwal3_datapembelajaran
				LEFT JOIN blk_jadwal3_paket
				ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
				LEFT JOIN blk_instruktur
				ON blk_jadwal3_datapembelajaran.instruktur_id=blk_instruktur.id_instruktur
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

	function datapembelajaran_add()
	{
		$get1 = $this->M_session->select("SELECT * FROM blk_jadwal3_paket");
		$get2 = $this->M_session->select("SELECT * FROM blk_instruktur");

		$option1 = "";
		$option2 = "";
		foreach ($get1 as $key => $value) {
			$option1 .= '<option value="'.$value->id.'">'.$value->nama_paket.'</option>';
		}
		foreach ($get2 as $key => $value) {
			$option2 .= '<option value="'.$value->id_instruktur.'">'.$value->kode_instruktur.' - '.$value->nama.'</option>';
		}

		$data = array(
			'option1' => $option1,
			'option2' => $option2
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function datapembelajaran_insert()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$pil_paket 	= $this->input->post('pil_paket');
		$pil_tgl 	= $this->input->post('pil_tgl');

		$datazzz = array (
			'paket_id'		=> $pil_paket,
			'instruktur_id'	=> $this->input->post('pil_ins'),
			'tanggal'		=> $pil_tgl,
			'created_at'  	=> date('Y-m-d H:i:s'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$check0 = $this->M_session->insert_return_id($datazzz, "blk_jadwal3_datapembelajaran");

		if ( $check0 != NULL )
		{
			$pil_paketdd = $this->M_session->select("SELECT angkatan FROM blk_jadwal3_paket_detail WHERE paket_id='".$pil_paket."' GROUP BY angkatan");

			$datapaket = array();
			foreach ( $pil_paketdd as $value1 ) 
			{
				$datapaket[] = $value1->angkatan;
			}

			$t1 		= implode( ",", $datapaket );
			$angktan 	= explode( ",", $t1 );
			$angktan 	= array_unique($angktan);

			$dotori = array();
			$get_personal_angkatan = $this->M_session->select("SELECT * FROM personal_angkatan");
			foreach ( $get_personal_angkatan as $v ) 
			{
				$tgl1 	= $v->date_angkatan;
        		$tgl2 	= $pil_tgl;

        		$position_day_in_week = date("w", strtotime($tgl1) );

	            $first_day_in_week = date('Y-m-d', strtotime( 'next monday' , strtotime($tgl1) ) );
	            if ( $first_day_in_week == 1 )
	            {
	                $first_day_in_week = $tgl1;
	            }

	            $weekk = 0;
	            if ( $first_day_in_week <= $tgl2 ) {
	                $dayss = round(abs(strtotime($tgl2)-strtotime( $first_day_in_week ))/86400);
	                $weekk = (int)($dayss / 7)+1;
	            }

	            foreach ( $angktan as $w )
	            {
	            	if ( $weekk == $w ) 
	            	{
	            		$dotori[$v->nodaftar] = $weekk;
/*
			            $datar[][$a1->id_hari][$a2->id_jam] = array(
							'tdk_hadir' => $value4->alasan,
							'angkatan' => $dddd,
							'nilai' => $dtyuiop
						);

						$data2[] = array (
							'biodata_id' 				=> $value->id_biodata,
							'datapembelajaran_id' 		=> $check0,
							'detail' 					=> $detailed
						);*/
	            	}
	            }

			}

			$dataroot = array ();
			$pil_paket2 = $this->M_session->select("SELECT * FROM blk_jadwal3_paket_detail WHERE paket_id='".$pil_paket."'");
			foreach ( $dotori as $dotori_key => $dotori_val )
			{
				$datafinal = array();
				foreach ( $pil_paket2 as $paket_key => $paket_val )
				{
					$angkatan_exp = explode(",", $paket_val->angkatan);
					foreach ($angkatan_exp as $newvalue) 
					{
						if ( $newvalue == $dotori_val )
						{
							$datafinal[$paket_val->minggu_id][$paket_val->hari][$paket_val->jam] = array (
								'tdk_hadir' => '',
								'angkatan' 	=> $dotori_val,
								'nilai' 	=> array()
							);
						}
					}
				}

				$dataroot[] = array (
					'id_biodata' 			=> $dotori_key,
					'datapembelajaran_id'	=> $check0,
					'detail' 				=> json_encode($datafinal)
				);
			}

			$checkz1 = $this->M_session->insert_batch($dataroot, "blk_jadwal3_datapembelajaran_detail");

			if ( $checkz1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI TAMBAH';
			}

			/*

			foreach ( $pil_paket as $value1 ) 
			{
				$t1 		= implode( ",", $value1->angkatan );
				$angktan 	= explode( ",", $t1 );
				$angktan 	= array_unique($angktan);
				foreach ( $angktan as $value2 ) 
				{
					$get_personal_angkatan = $this->M_session->select("SELECT * FROM personal_angkatan");
					foreach ( $get_personal_angkatan as $v ) 
					{
						$tgl1 	= $v->date_angkatan;
	            		$tgl2 	= $pil_tgl;

	            		$position_day_in_week = date("w", strtotime($tgl1) );

			            $first_day_in_week = date('Y-m-d', strtotime( 'next monday' , strtotime($tgl1) ) );
			            if ( $week == 1 )
			            {
			                $first_day_in_week = $tgl1;
			            }

			            $weekk = 0;
			            if ( $first_day_in_week <= $tgl2 ) {
			                $dayss = round(abs(strtotime($tgl2)-strtotime( $first_day_in_week ))/86400);
			                $weekk = (int)($dayss / 7)+1;
			            }

		            	if ( $weekk == $value2 ) 
		            	{
		            		$dotori[$weekk] = $v->nodaftar;

				            $datar[][$a1->id_hari][$a2->id_jam] = array(
								'tdk_hadir' => $value4->alasan,
								'angkatan' => $dddd,
								'nilai' => $dtyuiop
							);

							$data2[] = array (
								'biodata_id' 				=> $value->id_biodata,
								'datapembelajaran_id' 		=> $check0,
								'detail' 					=> $detailed
							);
		            	}
					}


				}
			}*/
/*
			foreach ($pil_paket as $key => $value) 
			{
				$angktan = explode(",", $value->angkatan);
				foreach ($angktan as $key2 => $value2) 
				{
					$get_personal_angkatan = $this->M_session->select("SELECT * FROM personal_angkatan");
					foreach ($get_personal_angkatan as $k => $v) 
					{
						$startpast 	= $v->date_angkatan;
	            		$xnowday 	= $this->input->post('pil_tgl');
	            		$week 		= date("w", strtotime($startpast) );

			            if($week == 1) {
			                $xfirstday  = $startpast;
			            } else {
			                $xfirstday  = date('Y-m-d', strtotime( 'next monday' , strtotime($startpast) ) );
			            }

			            $weekk = 0;
			            if ( $xfirstday <= $xnowday ) {
			                $dayss = round(abs(strtotime($xnowday)-strtotime($xfirstday))/86400);
			                $weekk = (int)($dayss / 7)+1;
			            }

		            	if ($weekk == $value2) 
		            	{
				            $datar[1][$a1->id_hari][$a2->id_jam] = array(
								'tdk_hadir' => $value4->alasan,
								'angkatan' => $dddd,
								'nilai' => $dtyuiop
							);

							$data2[] = array (
								'biodata_id' 				=> $value->id_biodata,
								'datapembelajaran_id' 		=> $check0,
								'detail' 					=> $detailed
							);
		            	}
					}
				}

					

			}*/
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $dataroot ));
	}
	
	function datapembelajaran_edit() 
	{
		$id = $this->input->post('id');

		$datapp = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran WHERE id='".$id."'");

		$get1 = $this->M_session->select("SELECT * FROM blk_jadwal3_paket");
		$get2 = $this->M_session->select("SELECT * FROM blk_instruktur");

		$option1 = "";
		$option2 = "";
		foreach ($get1 as $key => $value) {
			$option1 .= '<option value="'.$value->id.'">'.$value->nama_paket.'</option>';
		}
		foreach ($get2 as $key => $value) {
			$option2 .= '<option value="'.$value->id_instruktur.'">'.$value->kode_instruktur.' - '.$value->nama.'</option>';
		}

		$datapm = array(
			'option1' => $option1,
			'option2' => $option2,
			'v' 	  => $datapp
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
	
	function datapembelajaran_update() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI UBAH';

		$id 		= $this->input->post('id');

		$data = array (
			'paket_id'		=> $this->input->post('pil_paket'),
			'instruktur_id'	=> $this->input->post('pil_ins'),
			'tanggal'		=> $this->input->post('pil_tgl'),
			'updated_at'  	=> date('Y-m-d H:i:s')
		);

		$query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id."'");

		$data_record = array (
			'tipe' 			=> 'UPDATE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_datapembelajaran',
			'table_id' 		=> $id,
			'data' 			=> json_encode( (array) $query )
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_datapembelajaran", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI UBAH';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function datapembelajaran_delete() 
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI HAPUS';

		$id = $this->input->post('id');

		$data = array (
			'deleted_at'  	=> date('Y-m-d H:i:s')
		);

		$data_record = array (
			'tipe' 			=> 'DELETE',
			'date' 			=> date('Y-m-d H:i:s'),
			'table_name' 	=> 'blk_jadwal3_datapembelajaran',
			'table_id' 		=> $id,
			'data' 			=> '-'
		); 

		$check0 = $this->M_session->insert($data_record, "_records");

		if ( $check0 == TRUE )
		{
			$check1 = $this->M_session->update($data, "blk_jadwal3_datapembelajaran", $id, "id");

			if ( $check1 == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'SUKSES DI HAPUS';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function datapembelajaran_detail($id)
	{
		$data['id'] = $id;

		$data['namamodule'] 	= "blk_jadwal";
		$data['namafileview'] 	= "datapembelajaran_detail";
		echo Modules::run('template/blk_template', $data); 
	}

	function datapembelajaran_detail_get_option1($id)
	{
		$ambil_paket_id = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id."'");
		$ambil_paket_id = $ambil_paket_id->paket_id;

		$ambil_data = $this->M_session->select("SELECT * FROM blk_jadwal3_paket_detail where paket_id='".$ambil_paket_id."' order by minggu_id, hari, jam");

		$option = "";
		foreach ($ambil_data as $key => $value) 
		{
			$ambil_minggu 	= $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$value->minggu_id."'");
			$ambil_minggu 	= $ambil_minggu->kode;
			$ambil_hari 	= $this->M_session->select_row("SELECT * FROM blk_hari where id_hari='".$value->hari."'");
			$ambil_hari 	= $ambil_hari->kode_hari;
			$ambil_jam 		= $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$value->jam."'");
			$ambil_jam 		= $ambil_jam->kode_jam;

			$option .= '<option value="'.$value->id.'">'.$ambil_minggu.' - '.$ambil_hari.' - '.$ambil_jam.'</option>';
		}

		$ambil_sell = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where paket_id='".$ambil_paket_id."' order by minggu_id, hari, jam");

		$datapm = array(
			'option' => $option,
			'sel1' 	 => $ambil_sell->id
		);

		$this->output->set_content_type('application/json')->set_output(json_encode($datapm));
	}

	function datapembelajaran_detail_read1($id2)
	{
		$id = $this->input->post('id');

		$ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id."'");

		$ambil_minggu 	= $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$ambil_data->minggu_id."'");
		$ambil_minggu 	= $ambil_minggu->kode.'<br/>'.strtoupper($ambil_minggu->minggu);

		$ambil_hari 	= $this->M_session->select_row("SELECT * FROM blk_hari where id_hari='".$ambil_data->hari."'");
		$ambil_hari 	= $ambil_hari->kode_hari.'<br/>'.strtoupper($ambil_hari->hari);

		$ambil_ins1 	= $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id2."'");
		$ambil_ins 		= $this->M_session->select_row("SELECT * FROM blk_instruktur where id_instruktur='".$ambil_ins1->instruktur_id."'");
		$ambil_ins 		= $ambil_ins->kode_instruktur.'<br/>'.strtoupper($ambil_ins->nama);

		$ambil_jam 		= $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$ambil_data->jam."'");
		$ambil_jam 		= $ambil_jam->kode_jam.'<br/>'.strtoupper($ambil_jam->jam);

		$materi_json = json_decode($ambil_data->materi, true);

		$table = "";
		$nog = 0;
		foreach ( $materi_json as $value )
		{
			$no = $nog + 1;

			$ambil_materi_name = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$value."'");
			$ambil_materi_name = $ambil_materi_name->kode.' - '.$ambil_materi_name->materi;

			$table .= '<tr>';

			if ( $nog == 0 )
			{
				$table .= 	'<td rowspan="'.count($materi_json).'">'.$no.'</td>';
				$table .= 	'<td rowspan="'.count($materi_json).'">'.$ambil_minggu.'</td>';
				$table .= 	'<td rowspan="'.count($materi_json).'">'.$ambil_hari.'</td>';
				$table .= 	'<td rowspan="'.count($materi_json).'"></td>';
				$table .= 	'<td rowspan="'.count($materi_json).'">'.$ambil_ins.'</td>';
				$table .= 	'<td rowspan="'.count($materi_json).'">'.$ambil_jam.'</td>';
			}

			$table .= 	'<td>'.$nog.'</td>';
			$table .= 	'<td>'.$ambil_materi_name.'</td>';
			$table .= 	'<td></td>';
			$table .= 	'<td></td>';
			$table .= '</tr>';

		$nog++;
		}

		$ambil_tki = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where datapembelajaran_id='".$id2."'");

		$norty = 1;
		$table2 = '';
		foreach ($ambil_tki as $key => $value) 
		{
			$detail = json_decode($value->detail, true);

			if ( isset($detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]) )
			{
				$nama_tki = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='".$value->id_biodata."'");
				$nama_tki2 = "";
				if ( $nama_tki != NULL )
				{
					$nama_tki2 = $nama_tki->nama;
				}

				$angk = $detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]['angkatan'];
				if ( $detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]['angkatan'] != 'manual' )
				{
					$angk = "Angkatan ".$detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]['angkatan'];
				}

				$tdkhdr = '<label class="label label-danger">TIDAK HADIR</label>';
				if ( $detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]['tdk_hadir'] == NULL )
				{
					$tdkhdr = '<label class="label label-info">HADIR</label>';
				}

				$table2 .= '<tr>';

				$table2 .= 	'<td>'.$norty.'</td>';
				$table2 .= 	'<td>'.$value->id_biodata.'</td>';
				$table2 .= 	'<td>'.$nama_tki2.'</td>';
				$table2 .= 	'<td>'.$angk.'</td>';
				$table2 .= 	'<td>'.$tdkhdr.'</td>';
				$table2 .= 	'<td></td>';

				$table2 .= '</tr>';
			}

		$norty++;
		}

		$datapm = array(
			'a' => $table,
			'b' => $table2
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}
/*
	function test()
	{
		$list = array(
			4 => 'berhitung',
			5 => 'bhs_taiyu',
			6 => 'fisik_mental',
			7 => 'graha_boga',
			8 => 'graha_laundry',
			9 => 'graha_ruang',
			10 => 'jompo',
			11 => 'mandarin_inf_jompo',
			12 => 'mandarin_pabrik',
			13 => 'olah_raga',
			14 => 'tata_boga',
			15 => 'umum',
			16 => 'graha_ps',
			17 => 'teori_boga'
		);

		$datanew = array();
		foreach ($list as $key => $value) {
			$table2 = "blk_pelajaran_".$value;
			$ambil_data = $this->M_session->select("SELECT * FROM $table2");
			foreach ($ambil_data as $key2 => $value2) {
				$datanew[] = array (
					'kode' => $value2->kode_materi,
					'materi' => $value2->nama_materi,
					'pelajaran_revisi_id' => $key,
				);
			}
		}
		$this->M_session->insert_batch($datanew, "blk_jadwal3_pelajaran_materi");

	}*/
/*
	function test2()
	{
		$list = array(
			4 => 'berhitung',
			5 => 'bhs_taiyu',
			6 => 'fisik_mental',
			7 => 'graha_boga',
			8 => 'graha_laundry',
			9 => 'graha_ruang',
			10 => 'jompo',
			11 => 'mandarin_inf_jompo',
			12 => 'mandarin_pabrik',
			13 => 'olah_raga',
			14 => 'tata_boga',
			15 => 'umum',
			16 => 'graha_ps',
			17 => 'teori_boga'
		);

		$datanew = array();
		$ambil_data = $this->M_session->select("SELECT * FROM blk_jadwal_paketjadwal");
		foreach ($ambil_data as $key2 => $value2) {

			$materi_exp = explode(",", $value2->materi);

			$data_json = array();
			foreach ( $materi_exp as $val )
			{
				$val_exp = explode("|-|", $val);

				$kuytr1 = $val_exp[0];
				$kuytr2 = array_search($val_exp[1], $list);

				$dt = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE kode='".$kuytr1."' AND pelajaran_revisi_id='".$kuytr2."'");
				$data_json[] = $dt->id;
			}
			$matter = json_encode($data_json);

			$a1 = $this->M_session->select_row("SELECT * FROM blk_hari WHERE kode_hari='".$value2->hari."'");
			$a2 = $this->M_session->select_row("SELECT * FROM blk_jam WHERE kode_jam='".$value2->jam."'");
			
			$minggu_exp = explode(",", $value2->minggu);
			$minggu_fin = array();
			foreach ($minggu_exp as $key => $value) {
				$a3 = $this->M_session->select_row("SELECT * FROM blk_minggu WHERE kode_minggu='".$value."'");
				$minggu_fin[] = $a3->id_minggu;
			}
			$minggu_fin = implode(",", $minggu_fin);
			

			$datanew[] = array (
				'id' => $value2->id_jadwal_paket_jadwal,
				'hari' => $a1->id_hari,
				'jam' => $a2->id_jam,
				'minggu' => $minggu_fin,
				'materi' => $matter,
				'paket_id' => $value2->paket_id
			);
		}

		$this->M_session->insert_batch($datanew, "blk_jadwal3_paket_detail");

	}*/
	/*
	function test3()
	{

		$datanew = array();
		$ambil_data = $this->M_session->select("SELECT * FROM blk_jadwal_data");

		foreach ($ambil_data as $key2 => $value2) {
			$get_data1 = $this->M_session->select_row("SELECT * FROM blk_instruktur WHERE kode_instruktur='".$value2->instruktur_kode."'");
			$get_data1 = $get_data1->id_instruktur;

			$datanew[] = array (
				'id' => $value2->id_jadwal_data,
				'paket_id' => $value2->paket_id,
				'instruktur_id' => $get_data1,
				'tanggal' => $value2->tanggal
			);
		}

		$this->M_session->insert_batch($datanew, "blk_jadwal3_datapembelajaran");

	}*/
/*
	function test4()
	{

		$datanew = array();
		$ambil_data = $this->M_session->select("SELECT jadwal_data_id FROM blk_jadwal_data_tki group by jadwal_data_id");

		foreach ($ambil_data as $key2 => $value2) {

			$ambil_data2 = $this->M_session->select("SELECT * FROM blk_jadwal_data_tki WHERE jadwal_data_id='".$value2->jadwal_data_id."' group by biodata_id");

			foreach ($ambil_data2 as $key3 => $value3) {
				
				$ambil_data3 = $this->M_session->select("SELECT * FROM blk_jadwal_data_tki WHERE jadwal_data_id='".$value2->jadwal_data_id."' and biodata_id='".$value3->biodata_id."'");
				$datar = array();
				foreach ($ambil_data3 as $key4 => $value4) {
					$a1 = $this->M_session->select_row("SELECT * FROM blk_hari WHERE kode_hari='".$value4->hari."'");
					$a2 = $this->M_session->select_row("SELECT * FROM blk_jam WHERE kode_jam='".$value4->jam."'");
					$dddd = $value4->tipe_data;
					if ( $value4->angkatan != NULL )
					{
						$dddd = $value4->angkatan;
					}

					$dtyuiop = array();
					$got_dataxx = $this->M_session->select("SELECT * FROM blk_jadwal_penilaian WHERE jadwal_data_tki_id='".$value4->id_jadwal_data_tki."'");
					foreach ($got_dataxx as $key98 => $value98) {
						$bil_dat = $this->M_session->select_row("select * from blk_jadwal3_pelajaran_materi where kode='".$value98->materi_id."'");
						$bil_dat = $bil_dat->id;
						$dtyuiop = array (
							$bil_dat => array(
								$value98->nilai,
								$value98->nilai2
							)
						);
					}


					$datar[1][$a1->id_hari][$a2->id_jam] = array(
						'tdk_hadir' => $value4->alasan,
						'angkatan' => $dddd,
						'nilai' => $dtyuiop
					);
				}

				$datanew[] = array (
					'id_biodata' => $value3->biodata_id,
					'datapembelajaran_id' => $value2->jadwal_data_id,
					'detail' => json_encode($datar)
				);
				

			}
		}

		$this->M_session->insert_batch($datanew, "blk_jadwal3_datapembelajaran_detail");

	}*/

	function c()
	{
        echo $week = date("w", strtotime(date('2018-07-04')) );
	}
}