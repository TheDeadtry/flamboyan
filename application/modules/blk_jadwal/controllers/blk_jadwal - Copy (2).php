<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_jadwal extends MX_Controller {
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
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
			JOIN blk_jadwal3_pelajaran
			ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
			JOIN blk_jadwal3_pelajaran_revisi
			ON blk_jadwal3_paket.pelajaran_revisi_id=blk_jadwal3_pelajaran_revisi.id
			$where_d1 
			order by id desc
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
					$row->pelajaran.' / '.$row->revisi,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				blk_jadwal3_paket
				JOIN blk_jadwal3_pelajaran
				ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
				JOIN blk_jadwal3_pelajaran_revisi
				ON blk_jadwal3_paket.pelajaran_revisi_id=blk_jadwal3_pelajaran_revisi.id
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				blk_jadwal3_paket
				JOIN blk_jadwal3_pelajaran
				ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
				JOIN blk_jadwal3_pelajaran_revisi
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

		$datapm = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket WHERE id='".$id."'");

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

	function paket_detail_read($id)
	{
		$data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket WHERE id='".$id."'");

		$tablefin = '';
		if ( $data->detail != NULL )
		{
			$detaildata = json_decode($data->detail, true);

			$datast = array();
			foreach ($detaildata as $harikey => $harivalue) 
			{
				foreach ($harivalue as $jamkey => $jamvalue) 
				{
					foreach ($jamvalue as $minggukey => $materi) 
					{
						$datast[][$harikey][$jamkey][$minggukey] = $materi;
					}
				}
			}

			$table = "";
			$nod = 1;
			foreach ($datast as $volm)
			{
				$table .= "<tr>";
				$table .= "<td>".$nod."</td>";

				$xxharikey = "";
				foreach ($volm as $harikey => $harivalue)
				{
					$hariz = $this->M_session->select_row("SELECT * FROM blk_hari WHERE id_hari='".$harikey."'");
					if ( $xxharikey != $harikey )
					{
						$table .= '<td rowspan="">'.$hariz->hari.'</td>';
					}

					$xxjamkey = "";
					foreach ($harivalue as $jamkey => $jamvalue) 
					{
						$jamz = $this->M_session->select_row("SELECT * FROM blk_jam WHERE id_jam='".$jamkey."'");
						if ( $xxjamkey != $jamkey )
						{
							$table .= '<td rowspan="">'.$jamz->jam.'</td>';
						}

						foreach ($jamvalue as $minggukey => $materi) 
						{
							$table .= '<td>'.$minggukey.'</td>';

							$table .= '<td>';
							foreach ($materi as $keyx => $valuex) 
							{
								$table .= $valuex.'<br/>';
							}
							$table .= '</td>';
						}

					$xxjamkey = $jamkey;
					}

				$xxharikey = $harikey;
				}
				$table .= '<td>
	        		<a><span class="label label-success btn_action_ubah" data-id="'.$data->id.'">Ubah</span></a>
	        		<a><span class="label label-danger btn_action_hapus" data-id="'.$data->id.'">Hapus</span></a></td>
	        	';
				$table .= "</tr>";

			$nod++;
			}
				

/*
			$table1 = "";
			$table2 = "";
			$table3 = "";
			$no = 0;
			foreach ($detaildata as $harikey => $harivalue) 
			{

				$nofin = 0;
				$no2 = 0;
				foreach ($harivalue as $jamkey => $jamvalue) 
				{

					$no3 = 0;
					foreach ($jamvalue as $minggukey => $materi) 
					{
						$table3 .= '<td>'.$minggukey.'</td>';

						$table3 .= '<td>';
						foreach ($materi as $keyx => $valuex) 
						{
							$table3 .= $valuex.'<br/>';
						}
						$table3 .= '</td>';
					$no3++;
					}
					$nofin += $no3;

					$jamz = $this->M_session->select_row("SELECT * FROM blk_jam WHERE id_jam='".$jamkey."'");
					$table2 = '<td rowspan="'.$no3.'">'.$jamz->jam.'</td>';

				$no2++;
				}

				$hariz = $this->M_session->select_row("SELECT * FROM blk_hari WHERE id_hari='".$harikey."'");
				$table1 = '<td rowspan="'.$nofin.'">'.$hariz->hari.'</td>';

				$tablefin .= '<tr>'.$table1.$table2.$table3.'</tr>';

			$no++;
			}*/
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $table ));
	}

	function paket_detail_add($id)
	{
		$h1 = $this->M_session->select("SELECT * FROM blk_hari");
		$h2 = $this->M_session->select("SELECT * FROM blk_jam");
		$h3 = $this->M_session->select("SELECT * FROM blk_minggu");
		$h4 = $this->M_session->select("SELECT blk_jadwal3_pelajaran_materi.* 
					FROM blk_jadwal3_paket
					JOIN blk_jadwal3_pelajaran 
					ON blk_jadwal3_pelajaran.id=blk_jadwal3_paket.pelajaran_id
					JOIN blk_jadwal3_pelajaran_revisi
					ON blk_jadwal3_pelajaran_revisi.id=blk_jadwal3_paket.pelajaran_revisi_id 
					JOIN blk_jadwal3_pelajaran_materi
					ON blk_jadwal3_pelajaran_revisi.id=blk_jadwal3_pelajaran_materi.pelajaran_revisi_id
					where blk_jadwal3_paket.id='".$id."'
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
			$option3 .= '<option value="'.$val3->id_minggu.'">'.$val3->kode_minggu.' '.$val3->minggu.'</option>';
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
			'option4' => $option4
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail_insert($id)
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'GAGAL DI TAMBAH';

		$hari 	= $this->input->post('hari');
		$jam 	= $this->input->post('jam');
		$minggu = implode(",", $this->input->post('minggu') );
		$materi = $this->input->post('materi');

		$data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket WHERE id='".$id."'");
		if ( $data->detail != NULL )
		{
			$detaildata = json_decode($data->detail, true);

			$detaildata[$hari][$jam][$minggu] = $materi;
		}
		else
		{
			$detaildata[$hari][$jam][$minggu] = $materi;
		}

		$datazzz = array (
			'detail' => json_encode($detaildata)
		);	

		$check0 = $this->M_session->update($datazzz, "blk_jadwal3_paket", $id, "id");

		if ( $check0 == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'SUKSES DI TAMBAH';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function paket_detail_edit($id)
	{
		$h1 = $this->M_session->select("SELECT * FROM blk_hari");
		$h2 = $this->M_session->select("SELECT * FROM blk_jam");
		$h3 = $this->M_session->select("SELECT * FROM blk_minggu");
		$h4 = $this->M_session->select("SELECT blk_jadwal3_pelajaran_materi.* 
					FROM blk_jadwal3_paket
					JOIN blk_jadwal3_pelajaran 
					ON blk_jadwal3_pelajaran.id=blk_jadwal3_paket.pelajaran_id
					JOIN blk_jadwal3_pelajaran_revisi
					ON blk_jadwal3_pelajaran_revisi.id=blk_jadwal3_paket.pelajaran_revisi_id 
					JOIN blk_jadwal3_pelajaran_materi
					ON blk_jadwal3_pelajaran_revisi.id=blk_jadwal3_pelajaran_materi.pelajaran_revisi_id
					where blk_jadwal3_paket.id='".$id."'
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
			$option3 .= '<option value="'.$val3->id_minggu.'">'.$val3->kode_minggu.' '.$val3->minggu.'</option>';
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
			'val1' => $val1,
			'val2' => ,
			'val3' => ,
			'val4' => ,
		);

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	

}