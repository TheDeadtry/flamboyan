<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_agen_penerima_dana extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}

	function index($agen_id)
	{
		$ambil_penerima_nama = $this->M_session->select("SELECT * FROM dataagen_penerima_nama ORDER BY id ASC");
		$data['tampil_data_penerima_nama'] = $ambil_penerima_nama;
		$ambil_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen = '".$agen_id."' ");
		$data['agen_nama'] = $ambil_agen->nama;
		$data['agen_id'] = $agen_id;

		$data['namamodule'] 	= "new_agen_penerima_dana";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function show_data($agen_id)
	{
		$columns_d1 = array(
			'dataagen_penerima_nama.nama',
			'dataagen_penerima_nama.namamandarin',
			'dataagen_penerima_nama.branch',
			'dataagen_penerima_nama.bank_code',
			'dataagen_penerima_nama.bank_no',
			'dataagen_penerima_nama.bank_tel'
		);

		$where_ori = ' dataagen_penerima_dana.agen_id = "'.$agen_id.'" && dataagen_penerima_dana.softDelete != 1 ';
		$where_d1 = datatable_where( $columns_d1, $_POST['search']['value'], $where_ori );

		$limit = datatable_limit( $_POST['start'], $_POST['length'] );

		$query1 = "
			SELECT 
			dataagen_penerima_nama.*,
			dataagen_penerima_dana.id as danaid
			FROM dataagen_penerima_dana
			JOIN dataagen ON dataagen_penerima_dana.agen_id=dataagen.id_agen
			JOIN dataagen_penerima_nama ON dataagen_penerima_nama.id=dataagen_penerima_dana.penerima_nama_id 
			$where_d1 
			order by dataagen_penerima_dana.id desc
			$limit
		";

		$sql = $this->M_session->select($query1);

		$data2 	= array();
		$no 	= intval( $_POST['start'] );
        foreach( $sql as $row ) 
        {

        	$btn_actions = '
        		<button class="btn btn-xs bg-success btn_action_ubah2" data-id="'.$row->danaid.'">Ubah (semua)</button>
        		<button class="btn btn-xs bg-success btn_action_ubah" data-id="'.$row->danaid.'">Ubah (baru)</button>
        		<button class="btn btn-xs bg-danger btn_action_hapus" data-id="'.$row->danaid.'">Hapus</button>
        	';

			$no++;
			array_push($data2,
				array(
					$no,
					$row->nama.'<br/>'.$row->namamandarin,
					$row->branch,
					$row->bank_code,
					$row->bank_no,
					$row->bank_tel,
					$btn_actions
				)
			);
		}

		$recordsFiltered = $this->M_session->select_count("
				dataagen_penerima_dana
				JOIN dataagen ON dataagen_penerima_dana.agen_id=dataagen.id_agen
				JOIN dataagen_penerima_nama ON dataagen_penerima_nama.id=dataagen_penerima_dana.penerima_nama_id 
				$where_d1
			");

		$recordsTotal =  $this->M_session->select_count("
				dataagen_penerima_dana
				JOIN dataagen ON dataagen_penerima_dana.agen_id=dataagen.id_agen
				JOIN dataagen_penerima_nama ON dataagen_penerima_nama.id=dataagen_penerima_dana.penerima_nama_id 
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

	function insert()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di Tambah';

		$data_insert = array (
			'agen_id' 	=> $this->input->post('agen_id'),
			'penerima_nama_id' => $this->input->post('bank_name'),
			'date_created' => date('Y-m-d H:i:s')
		);

		$checkingIfInserted = $this->M_session->insert( $data_insert, 'dataagen_penerima_dana' );

		if ( $checkingIfInserted == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di Tambah';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($datapm));
	}

	function edit()
	{
		$id = $this->input->post('id');
		$ambil_data = $this->M_session->select_row(" SELECT * FROM dataagen_penerima_dana WHERE id='".$id."' ");

		$this->output->set_content_type('application/json')->set_output(json_encode($ambil_data));
	}

	function update()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di Ubah';

		$id = $this->input->post('id');

		$data_change_delete_stat = array(
			'softDelete' => 1
		);

		$checkingIfUpdated = $this->M_session->update( $data_change_delete_stat, 'dataagen_penerima_dana', $id, 'id');

		if ( $checkingIfUpdated == TRUE )
		{
			$data_new = array (
				'agen_id' 	=> $this->input->post('agen_id'),
				'penerima_nama_id' => $this->input->post('bank_name'),
				'date_created' => date('Y-m-d H:i:s')
			);

			$checkingIfInserted = $this->M_session->insert( $data_new, 'dataagen_penerima_dana' );

			if ( $checkingIfInserted == TRUE )
			{
				$datapm['success'] = TRUE;
				$datapm['message'] = 'Sukses di Ubah';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($datapm));
	}

	function update2()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di Ubah';

		$id = $this->input->post('id');

		$data_new = array (
			'penerima_nama_id' => $this->input->post('bank_name'),
			'date_created' => date('Y-m-d H:i:s')
		);

		$checkingIfUpdated = $this->M_session->update( $data_new, 'dataagen_penerima_dana', $id, 'id' );

		if ( $checkingIfUpdated == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di Ubah';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($datapm));
	}

	function delete()
	{
		$datapm['success'] = FALSE;
		$datapm['message'] = 'Gagal di hapus';

		$id = $this->input->post('id');

		$data_delete = array(
			'softDelete' => '1'
		);

		$checkk = $this->M_session->update($data_delete, 'dataagen_penerima_dana', $id, 'id');

		$agen_id = $this->M_session->select_row("SELECT * FROM dataagen_penerima_dana WHERE id='".$id."'")->agen_id;

		if ( $checkk == TRUE )
		{
			$datapm['success'] = TRUE;
			$datapm['message'] = 'Sukses di hapus';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
	}

	function cek_tombol_add($agen_id)
	{
		$stat_dana = $this->M_session->select_count("dataagen_penerima_dana WHERE agen_id='".$agen_id."' and softDelete != 1 order by id desc");

		$this->output->set_content_type('application/json')->set_output(json_encode( $stat_dana ));
	}

	function simpandatanama(){

		$nama = $_POST["nama"];
		$namamandarin = $_POST["namamandarin"];
		$branch = $_POST["branch"];
		$bankcode = $_POST["bankcode"];
		$banknumber = $_POST["banknumber"];
		$banktel = $_POST["banktel"];

		$simpandata = $this->db->query("INSERT INTO dataagen_penerima_nama (id, nama, namamandarin, branch, bank_code, bank_no, bank_tel, deleted_at) VALUES ('', '$nama', '$namamandarin', '$branch', '$bankcode', '$banknumber', '$banktel', '')");

		if ($simpandata) {
			echo "success";
		}else{
			echo "gagal";
		}
	}


}

?>