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
        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "pelajaran";
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

        $data2  = array();
        $no     = intval( $_POST['start'] );
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
            'pelajaran'     => $pelajaran,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
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
        $id         = $this->input->post('id');

        $datapm = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran WHERE id='".$id."'");

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function pelajaran_update()
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI UBAH';

        $id         = $this->input->post('id');
        $pelajaran  = $this->input->post('nama');

        $data = array (
            'pelajaran'     => $pelajaran,
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran where id='".$id."'");

        $data_record = array (
            'tipe'          => 'UPDATE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_pelajaran',
            'table_id'      => $id,
            'data'          => json_encode( (array) $query )
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
            'deleted_at'    => date('Y-m-d H:i:s')
        );

        $data_record = array (
            'tipe'          => 'DELETE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_pelajaran',
            'table_id'      => $id,
            'data'          => '-'
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

        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "pelajaran_revisi";
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

        $data2  = array();
        $no     = intval( $_POST['start'] );
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
            'revisi'        => $this->input->post('revisi'),
            'pelajaran_id'  => $this->input->post('pelajaran_id'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
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
        $id         = $this->input->post('id');

        $datapm = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_revisi WHERE id='".$id."'");

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function pelajaran_revisi_update()
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI UBAH';

        $id         = $this->input->post('id');

        $data = array (
            'revisi'        => $this->input->post('revisi'),
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_revisi where id='".$id."'");

        $data_record = array (
            'tipe'          => 'UPDATE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_pelajaran_revisi',
            'table_id'      => $id,
            'data'          => json_encode( (array) $query )
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
            'deleted_at'    => date('Y-m-d H:i:s')
        );

        $data_record = array (
            'tipe'          => 'DELETE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_pelajaran_revisi',
            'table_id'      => $id,
            'data'          => '-'
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

        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "pelajaran_materi";
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

        $data2  = array();
        $no     = intval( $_POST['start'] );
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
            'kode'                  => $this->input->post('kode_materi'),
            'materi'                => $this->input->post('nama_materi'),
            'buku_hal'              => $this->input->post('buku_hal'),
            'penjelasan'            => $this->input->post('penjelasan'),
            'keterangan'            => $this->input->post('ket'),
            'tipe_input_nilai'      => $this->input->post('tipe_input_nilai'),
            'pelajaran_revisi_id'   => $this->input->post('pelajaran_revisi_id'),
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s')
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
            'kode'                  => $this->input->post('kode_materi'),
            'materi'                => $this->input->post('nama_materi'),
            'buku_hal'              => $this->input->post('buku_hal'),
            'penjelasan'            => $this->input->post('penjelasan'),
            'keterangan'            => $this->input->post('ket'),
            'tipe_input_nilai'      => $this->input->post('tipe_input_nilai'),
            'pelajaran_revisi_id'   => $this->input->post('pelajaran_revisi_id'),
            'updated_at'            => date('Y-m-d H:i:s')
        );

        $query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi where id='".$id."'");

        $data_record = array (
            'tipe'          => 'UPDATE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_pelajaran_materi',
            'table_id'      => $id,
            'data'          => json_encode( (array) $query )
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
            'deleted_at'    => date('Y-m-d H:i:s')
        );

        $data_record = array (
            'tipe'          => 'DELETE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_pelajaran_materi',
            'table_id'      => $id,
            'data'          => '-'
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
        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "paket";
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

        $data2  = array();
        $no     = intval( $_POST['start'] );
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
            'nama_paket'    => $this->input->post('paket'),
            'pelajaran_id'  => $this->input->post('pelajaran'),
            'pelajaran_revisi_id'   => $this->input->post('rev'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
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
        $id         = $this->input->post('id');

        $datapp = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket WHERE id='".$id."'");

        $datavv = $this->M_session->select("SELECT * FROM blk_jadwal3_pelajaran WHERE deleted_at = '' ");

        $option = "";
        foreach( $datavv as $val )
        {
            $option .= '<option value="'.$val->id.'">'.$val->pelajaran.'</option>';
        }

        $datapm = array (
            'option' => $option,
            'v'      => $datapp
        );

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function paket_update()
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI UBAH';

        $id         = $this->input->post('id');

        $data = array (
            'nama_paket'    => $this->input->post('paket'),
            'pelajaran_id'  => $this->input->post('pelajaran'),
            'pelajaran_revisi_id'   => $this->input->post('rev'),
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket where id='".$id."'");

        $data_record = array (
            'tipe'          => 'UPDATE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_paket',
            'table_id'      => $id,
            'data'          => json_encode( (array) $query )
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
            'deleted_at'    => date('Y-m-d H:i:s')
        );

        $data_record = array (
            'tipe'          => 'DELETE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_paket',
            'table_id'      => $id,
            'data'          => '-'
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

        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "paket_detail";
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
/*
        $data = $this->M_session->select("SELECT
            blk_jadwal3_paket_detail.*,
            concat(blk_hari.kode_hari,' ',blk_hari.hari) as nama_hari,
            concat(blk_jam.kode_jam,' ',blk_jam.jam) as nama_jam
            FROM blk_jadwal3_paket_detail
            JOIN blk_hari ON blk_jadwal3_paket_detail.hari=blk_hari.id_hari
            JOIN blk_jam ON blk_jadwal3_paket_detail.jam=blk_jam.id_jam
            WHERE paket_id='".$id."' and minggu_id='".$minggu_id."' and blk_jadwal3_paket_detail.deleted_at=''");
*/
        $data = $this->M_session->select("
            SELECT
            distinct(blk_jadwal3_paket_detail.hari) as hari,
            blk_hari.kode_hari,
            blk_hari.hari as nama
            FROM blk_jadwal3_paket_detail
            LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari=blk_hari.id_hari
            WHERE paket_id='".$id."'
            and minggu_id='".$minggu_id."'
            and blk_jadwal3_paket_detail.deleted_at=''
            order by blk_hari.kode_hari ASC
        ");

        $table = "";
        $noall = 1;
        foreach ( $data as $hari_val )
        {
            $get_jam = $this->M_session->select("SELECT
                distinct(blk_jadwal3_paket_detail.jam) as jam,
                blk_jam.kode_jam,
                blk_jam.jam as nama
                FROM blk_jadwal3_paket_detail
                LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam=blk_jam.id_jam
                WHERE hari = '".$hari_val->hari."'
                and paket_id='".$id."'
                and minggu_id='".$minggu_id."'
                and blk_jadwal3_paket_detail.deleted_at=''
                order by blk_jam.kode_jam ASC
            ");

            $no_jam = 1;
            foreach ( $get_jam as $jam_val )
            {
                $get_materi = $this->M_session->select_row("SELECT *
                    FROM blk_jadwal3_paket_detail
                    WHERE jam = '".$jam_val->jam."'
                    and hari = '".$hari_val->hari."'
                    and paket_id='".$id."'
                    and minggu_id='".$minggu_id."'
                    and blk_jadwal3_paket_detail.deleted_at=''
                ");

                $detail_arr = json_decode($get_materi->materi);

                $no_detail = 1;
                foreach ( $detail_arr as $da_materi )
                {
                    $table .= '<tr>'."\n";

                    if ( $no_jam == 1 && $no_detail == 1 )
                    {
                        $count_materi1 = 0;
                        foreach ( $get_jam as $dzz )
                        {
                            $get_materid2 = $this->M_session->select_row("SELECT *
                                FROM blk_jadwal3_paket_detail
                                WHERE jam = '".$dzz->jam."'
                                and hari = '".$hari_val->hari."'
                                and paket_id='".$id."'
                                and minggu_id='".$minggu_id."'
                                and blk_jadwal3_paket_detail.deleted_at=''
                            ");

                            $detail_arzr = json_decode($get_materid2->materi);
                            foreach ( $detail_arzr as $d0 )
                            {
                                $count_materi1++;
                            }
                        }
                        $table .=   "\t".'<td e rowspan="'.$count_materi1.'">'.$noall.'</td>'."\n";
                        $table .=   "\t".'<td e rowspan="'.$count_materi1.'">'.$hari_val->kode_hari.' - '.$hari_val->nama.'</td>'."\n";
                    }

                    if ( $no_detail == 1 )
                    {
                        $count_detail = 0;
                        foreach ( $detail_arr as $d0 )
                        {
                            $count_detail++;
                        }
                        $table .=   "\t".'<td d rowspan="'.$count_detail.'">'.$jam_val->kode_jam.' - '.$jam_val->nama.'</td>'."\n";
                        $table .=   "\t".'<td d rowspan="'.$count_detail.'">'.$get_materi->angkatan.'</td>'."\n";
                    }

                    $ambil_pelajaran = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$da_materi."'");

                    $table .=   "\t".'<td>'.$ambil_pelajaran->kode.' - '.$ambil_pelajaran->materi.'</td>'."\n";

                    if ( $no_detail == 1 )
                    {
                        $count_detail = 0;
                        foreach ( $detail_arr as $d0 )
                        {
                            $count_detail++;
                        }
                        $table .=   "\t".'<td rowspan="'.$count_detail.'">'."\n".
                                        "\t".'<a><span class="label label-success btn_action_ubah" data-id="'.$get_materi->id.'">Ubah</span></a>'."\n".
                                        "\t".'<a><span class="label label-danger btn_action_hapus" data-id="'.$get_materi->id.'">Hapus</span></a>'."\n".
                                    "\t".'</td>'."\n";
                    }

                    $table .= '</tr>'."\n";

                $no_detail++;
                }

            $no_jam++;
            }

        $noall++;
        }
/*
        $no = 1;
        $table = "";
        foreach ($data as $key => $value)
        {
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


        $no++;
        }*/
/*
        echo '<pre>';
        print_r($table);*/

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
            'hari'          => $this->input->post('hari'),
            'jam'           => $this->input->post('jam'),
            'angkatan'      => implode(",", $this->input->post('angkatan') ),
            'materi'        => json_encode($this->input->post('materi')),
            'paket_id'      => $id,
            'minggu_id'     => $this->input->post('minggu'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
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
            'hari'          => $this->input->post('hari'),
            'jam'           => $this->input->post('jam'),
            'angkatan'      => implode(",", $this->input->post('angkatan') ),
            'materi'        => json_encode($this->input->post('materi')),
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id."'");

        $data_record = array (
            'tipe'          => 'UPDATE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_paket_detail',
            'table_id'      => $id,
            'data'          => json_encode( (array) $query )
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
            'deleted_at'    => date('Y-m-d H:i:s')
        );

        $data_record = array (
            'tipe'          => 'DELETE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_paket_detail',
            'table_id'      => $id,
            'data'          => '-'
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
        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "datapembelajaran";
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
            blk_jadwal3_pelajaran.id as paket_id,
            blk_instruktur.kode_instruktur as ins_kode,
            blk_instruktur.nama as ins_nama
            FROM blk_jadwal3_datapembelajaran
            LEFT JOIN blk_jadwal3_paket
            ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
            LEFT JOIN blk_instruktur
            ON blk_jadwal3_datapembelajaran.instruktur_id=blk_instruktur.id_instruktur
            LEFT JOIN blk_jadwal3_pelajaran
            ON blk_jadwal3_paket.pelajaran_id=blk_jadwal3_pelajaran.id
            $where_d1
            order by id desc
            $limit
        ";

        $sql = $this->M_session->select($query1);

        $data2  = array();
        $no     = intval( $_POST['start'] );
        foreach( $sql as $row )
        {
            $btn_actions = "";
            if ( $row->paket_id != 13 && $row->paket_id != 5 && $row->paket_id != 3 && $row->paket_id != 4 )
            {
                $btn_actions .= '
                    <a href="'.site_url('blk_jadwal/datapembelajaran_detail/'.$row->id).'"><span class="label label-primary">Detail</span></a>
                    <a href="'.site_url('blk_jadwal/printdata3/'.$row->id).'"><span class="label bg-info">Print Paket</span></a>
                ';
            }
            else
            {
                $btn_actions .= '
                    <a href="'.site_url('blk_jadwal/printdata2/'.$row->id).'"><span class="label label-warning">Print</span></a>
                    <a href="'.site_url('blk_jadwal/datapembelajaran_detail2/'.$row->id).'"><span class="label bg-indigo">Detail Graha P/S</span></a>
                ';
            }
            $btn_actions .= '
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
        $get1 = $this->M_session->select("SELECT * FROM blk_jadwal3_paket WHERE deleted_at=''");
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

        $pil_paket  = $this->input->post('pil_paket');
        $pil_tgl    = $this->input->post('pil_tgl');

        $datazzz = array (
            'paket_id'      => $pil_paket,
            'instruktur_id' => $this->input->post('pil_ins'),
            'tanggal'       => $pil_tgl,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
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

            $t1         = implode( ",", $datapaket );
            $angktan    = explode( ",", $t1 );
            $angktan    = array_unique($angktan);

            $dotori = array();
            $get_personal_angkatan = $this->M_session->select("SELECT * FROM personal_angkatan");
            foreach ( $get_personal_angkatan as $v )
            {
                $tgl1   = $v->date_angkatan;
                $tgl2   = $pil_tgl;

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
                    }
                }
            }

            if ( isset($dotori) )
            {
                //$dataroot = array ();
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
                                    'angkatan'  => $dotori_val,
                                    'nilai'     => array()
                                );
                            }
                        }
                    }

                    $dataroot = array (
                        'id_biodata'            => $dotori_key,
                        'datapembelajaran_id'   => $check0,
                        'detail'                => json_encode($datafinal)
                    );
                    $checkz1 = $this->M_session->insert($dataroot, "blk_jadwal3_datapembelajaran_detail");
                }
            }

            $datapm['success'] = TRUE;
            $datapm['message'] = 'SUKSES DI TAMBAH';


        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }/*

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
            'v'       => $datapp
        );

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_update()
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI UBAH';

        $id         = $this->input->post('id');

        $data = array (
            'paket_id'      => $this->input->post('pil_paket'),
            'instruktur_id' => $this->input->post('pil_ins'),
            'tanggal'       => $this->input->post('pil_tgl'),
            'updated_at'    => date('Y-m-d H:i:s')
        );

        $query = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id."'");

        $data_record = array (
            'tipe'          => 'UPDATE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_datapembelajaran',
            'table_id'      => $id,
            'data'          => json_encode( (array) $query )
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
    }*/

    function datapembelajaran_delete()
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI HAPUS';

        $id = $this->input->post('id');

        $data = array (
            'deleted_at'    => date('Y-m-d H:i:s')
        );

        $data_record = array (
            'tipe'          => 'DELETE',
            'date'          => date('Y-m-d H:i:s'),
            'table_name'    => 'blk_jadwal3_datapembelajaran',
            'table_id'      => $id,
            'data'          => '-'
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

        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "datapembelajaran_detail";
        echo Modules::run('template/blk_template', $data);
    }

    function datapembelajaran_detail2($id)
    {
        $data['id'] = $id;

        $data['namamodule']     = "blk_jadwal";
        $data['namafileview']   = "datapembelajaran_detail2";
        echo Modules::run('template/blk_template', $data);
    }

    function datapembelajaran_detail2_ambil_data_tabel($id_datapembelajaran)
    {
        $ambil_tki = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."'");

        $norty = 1;
        $table2 = '';
        foreach ($ambil_tki as $key => $value)
        {
            $detail = json_decode($value->detail, true);

            $nama_tki = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='".$value->id_biodata."'");
            $nama_tki2 = "";
            if ( $nama_tki != NULL )
            {
                $nama_tki2 = $nama_tki->nama;
            }

            $check_input_nilai = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id_biodata='".$value->id_biodata."' and datapembelajaran_id='".$id_datapembelajaran."'");
            $chckinputed = "<code>KOSONG</code>";
            if ( $check_input_nilai != NULL )
            {
                $chckinputed = '<b>SUDAH INPUT</b>';
            }

            $table2 .= '<tr>';

            $table2 .=  '<td>'.$norty.'</td>';
            $table2 .=  '<td>'.$value->id_biodata.'</td>';
            $table2 .=  '<td>'.$nama_tki2.'</td>';
            $table2 .=  '<td>'.$chckinputed.'</td>';
            $table2 .=  '<td></td>';
            $table2 .=  '<td></td>';
            $table2 .=  '<td class="text-center">
                            <a class="btn btn-xxs bg-danger delete_btn" data-id="'.$value->id.'">Hapus</a>
                        </td>';

            $table2 .= '</tr>';

        $norty++;
        }

        return $table2;
    }

    function datapembelajaran_detail2_read($id_datapembelajaran)
    {
        $datapm = $this->datapembelajaran_detail2_ambil_data_tabel($id_datapembelajaran);

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail2_delete($id2)
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI HAPUS';

        $id = $this->input->post('id');

        $detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id."'");

        $datass = array (
            'deleted_at' => date('Y-m-d H:i:s')
        );

        $upt = $this->M_session->update($datass, "blk_jadwal3_datapembelajaran_detail", $id, "id");

        $dttable        = $this->datapembelajaran_detail2_ambil_data_tabel($id2);
        $datapm['d']    = $dttable;

        if ( $upt == TRUE )
        {
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI HAPUS';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail2_manual_insert($id_datapembelajaran)
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI TAMBAH';

        $datatki    = $this->input->post('tki');

        $dataroot = array();
        $dataroot2 = array();

        $ambil_data = $this->M_session->select("
            SELECT *
            FROM blk_jadwal3_datapembelajaran
            JOIN blk_jadwal3_paket_detail ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket_detail.paket_id
            WHERE blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'
         ");

        $dataroot = array();
        foreach ($datatki as $value)
        {
            $get_detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id='".$id_datapembelajaran."' AND id_biodata='".$value."'");

            if ( $get_detail != NULL )
            {
                $detailg = json_decode($get_detail->detail, true);

                $datafinal = $detailg;
                foreach ($ambil_data as $valuz)
                {
                    if ( !isset($detailg[$valuz->minggu_id][$valuz->hari][$valuz->jam]) )
                    {
                        $datafinal[$valuz->minggu_id][$valuz->hari][$valuz->jam] = array (
                            'tdk_hadir' => '',
                            'angkatan'  => 'manual',
                            'nilai'     => array()
                        );
                    }
                }

                $dataroot2[] = array (
                    'id'                    => $get_detail->id,
                    'id_biodata'            => $value,
                    'datapembelajaran_id'   => $id_datapembelajaran,
                    'detail'                => json_encode($datafinal)
                );
            }
            else
            {
                $datafinal = array();
                foreach ($ambil_data as $valuz)
                {
                    $datafinal[$valuz->minggu_id][$valuz->hari][$valuz->jam] = array (
                        'tdk_hadir' => '',
                        'angkatan'  => 'manual',
                        'nilai'     => array()
                    );
                }

                $dataroot[] = array (
                    'id_biodata'            => $value,
                    'datapembelajaran_id'   => $id_datapembelajaran,
                    'detail'                => json_encode($datafinal)
                );
            }

        }

        $checkthisup = FALSE;
        if ( $dataroot != NULL )
        {
            $checkthisup = $this->M_session->insert_batch($dataroot, "blk_jadwal3_datapembelajaran_detail");
        }
        if ( $dataroot2 != NULL )
        {
            $checkthisup = $this->M_session->update_batch($dataroot2, "blk_jadwal3_datapembelajaran_detail","id");
        }

        $datapm['d'] = $this->datapembelajaran_detail2_ambil_data_tabel($id_datapembelajaran);

        if ( $checkthisup == TRUE )
        {
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI TAMBAH';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail2_penilaian_full($type, $id_datapembelajaran)
    {
        if ( $type == 'change' )
        {
            $idbio = $this->input->post('idbio');
        }
        else if ( $type == 'add' )
        {
            $ambil_data_idbio = $this->M_session->select_row("
                SELECT
                *
                FROM blk_jadwal3_datapembelajaran_detail
                WHERE blk_jadwal3_datapembelajaran_detail.datapembelajaran_id='".$id_datapembelajaran."'
                ORDER BY id_biodata ASC
            ");
            $idbio = "";
            if ( $ambil_data_idbio != NULL )
            {
                $idbio = $ambil_data_idbio->id_biodata;
            }
        }

        $datanilai = $this->M_session->select("
            SELECT
            *
            FROM blk_nilai
        ");

        $btnnilai = "";
        foreach ($datanilai as $key => $value) {
            $btnnilai .= '<button type="button" class="tombol_allchanger" value="'.$value->kode_nilai.'">'.$value->kode_nilai.'</button>';
        }

        $data['stat']   = FALSE;
        $data['message']    = 'TIDAK ADA DATA TKI DI JADWAL INI';
        if ( $idbio != '' )
        {
            $data = $this->datapembelajaran_detail2_penilaian_full_change($id_datapembelajaran, $idbio);
        }

        $data['tombol'] = $btnnilai;

        $this->output->set_content_type('application/json')->set_output(json_encode( $data ));
    }

    function datapembelajaran_detail2_penilaian_full_change($id_datapembelajaran, $idbio)
    {
        $datapm['stat']     = FALSE;
        $datapm['message']  = 'TIDAK ADA DATA TKI DI JADWAL INI';

        $ambil_data_idbio = $this->M_session->select("
            SELECT
            *
            FROM blk_jadwal3_datapembelajaran_detail
            WHERE blk_jadwal3_datapembelajaran_detail.datapembelajaran_id='".$id_datapembelajaran."'
            ORDER BY id_biodata ASC
        ");

        $option = "";
        foreach ( $ambil_data_idbio as $row )
        {
            $option .= '<option value="'.$row->id_biodata.'" >'.$row->id_biodata.'</option>';
        }



        $ambil_data = $this->M_session->select("
            SELECT
            blk_jadwal3_pelajaran_materi.*,
            blk_jadwal3_paket.id as paketid
            FROM blk_jadwal3_datapembelajaran
            JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
            JOIN blk_jadwal3_pelajaran_materi ON blk_jadwal3_paket.pelajaran_revisi_id=blk_jadwal3_pelajaran_materi.pelajaran_revisi_id
            WHERE blk_jadwal3_datapembelajaran.id = '$id_datapembelajaran'
            and blk_jadwal3_pelajaran_materi.deleted_at != 1
        ");

        $datap = $this->M_session->select("SELECT * FROM blk_nilai");
        $ambil_detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id_biodata='$idbio' and datapembelajaran_id='$id_datapembelajaran'");

        $detail_id = $ambil_detail->id;

        $optionatas = $option;
        $table = "";
        foreach ( $ambil_data as $reff )
        {
            $table .= "<tr>";
            $table .=   "\t".'<td>'.$reff->kode.' - '.$reff->materi.'</td>'."\n";

            $ambil_harijamdll = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail WHERE paket_id='$reff->paketid'");


            $detaildata = json_decode($ambil_detail->detail, true);

            $nilai1 = '';
            $nilai2 = '';
            if ( isset( $detaildata[$ambil_harijamdll->minggu_id][$ambil_harijamdll->hari][$ambil_harijamdll->jam]['nilai'][$reff->id] ) )
            {
                $derftg = $detaildata[$ambil_harijamdll->minggu_id][$ambil_harijamdll->hari][$ambil_harijamdll->jam];
                $datatt = $derftg['nilai'][$reff->id];

                $nilai1 = $datatt[0];
                $nilai2 = $datatt[1];
            }

            if ( $reff->tipe_input_nilai == 1 )
            {
                $table .= "
                    <td colspan='2'>
                        <input type='hidden' name='minggu[]' value='".$ambil_harijamdll->minggu_id."' />
                        <input type='hidden' name='hari[]' value='".$ambil_harijamdll->hari."' />
                        <input type='hidden' name='jam[]' value='".$ambil_harijamdll->jam."' />
                        <input type='hidden' name='materi[]' value='".$reff->id."' />
                        <input type='text' class='form-control number' name='nilai1[]' value='".$nilai1."'/>
                        <input type='hidden' class='form-control' name='nilai2[]' value='-'/>
                    </td>
                ";
            }
            else
            {
                $option = "";
                $option2 = "";
                foreach( $datap as $dow )
                {
                    $selector = "";
                    if ( $dow->kode_nilai == $nilai1 )
                    {
                        $selector = 'selected="selected"';
                    }
                    $option .= '<option value="'.$dow->kode_nilai.'" '.$selector.'>'.$dow->kode_nilai.' '.$dow->keterangan.'</option>';

                    $selector2 = "";
                    if ( $dow->kode_nilai == $nilai2 )
                    {
                        $selector2 = 'selected="selected"';
                    }
                    $option2 .= '<option value="'.$dow->kode_nilai.'" '.$selector2.'>'.$dow->kode_nilai.' '.$dow->keterangan.'</option>';
                }

                $table .= "<td>
                                <input type='hidden' name='minggu[]' value='".$ambil_harijamdll->minggu_id."' />
                                <input type='hidden' name='hari[]' value='".$ambil_harijamdll->hari."' />
                                <input type='hidden' name='jam[]' value='".$ambil_harijamdll->jam."' />
                                <input type='hidden' name='materi[]' value='".$reff->id."' />
                                <select name='nilai1[]' class='form-control penilaian_isian' placeholder='Pilih'>
                                    <option></option>
                                    ".$option."
                                </select>
                            </td>";
                $table .= "<td>
                                <select name='nilai2[]' class='form-control penilaian_isian' placeholder='Pilih'>
                                    <option></option>
                                    ".$option2."
                                </select>
                            </td>";
            }

            $table .= '</tr>'."\n";
        }

        $datapm['stat'] = TRUE;
        $datapm['table'] = $table;
        $datapm['idx'] = $detail_id;

        $datapm['option'] = $optionatas;
        $datapm['idbio'] = $idbio;

        return $datapm;

    }

    function datapembelajaran_detail2_penilaian_full_update()
    {
        $datapm['success']  = FALSE;
        $datapm['message']  = 'GAGAL DI UBAH';

        $id_datapembelajaran_detail = $this->input->post('idx');
        $materi = $this->input->post('materi');
        $nilai1 = $this->input->post('nilai1');
        $nilai2 = $this->input->post('nilai2');

        $data   = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id_datapembelajaran_detail."'");

        $dataf = array();
        if ( isset( $dataf ) )
        {
            $dataf = json_decode($data->detail, true);
        }

        $datapaketdetail = $this->M_session->select("SELECT blk_jadwal3_paket_detail.*
            FROM blk_jadwal3_paket_detail
            JOIN blk_jadwal3_datapembelajaran ON blk_jadwal3_paket_detail.paket_id=blk_jadwal3_datapembelajaran.paket_id
            JOIN blk_jadwal3_datapembelajaran_detail ON blk_jadwal3_datapembelajaran.id=blk_jadwal3_datapembelajaran_detail.datapembelajaran_id
            WHERE blk_jadwal3_datapembelajaran_detail.id='".$id_datapembelajaran_detail."'");

        foreach ( $datapaketdetail as $tree )
        {
            for ( $i=0; $i<count($materi); $i++ )
            {
                $dataf[ $tree->minggu_id ][ $tree->hari ][ $tree->jam ]['nilai'][ $materi[ $i ] ] = array (
                    $nilai1[ $i ],
                    $nilai2[ $i ]
                );
            }
        }

        $data23 = array(
            'detail' => json_encode($dataf)
        );

        $checkthisup = $this->M_session->update($data23, "blk_jadwal3_datapembelajaran_detail", $id_datapembelajaran_detail, "id");

        if ( $checkthisup == TRUE )
        {
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI UBAH';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    //================================================================================//

    function datapembelajaran_detail_get_option1($id)
    {
        $ambil_paket_id = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id."'");
        $ambil_paket_id = $ambil_paket_id->paket_id;

        $ambil_data = $this->M_session->select("SELECT
            blk_jadwal3_paket_detail.*,
            blk_jadwal3_setting_minggu.minggu as zminggu,
            blk_hari.kode_hari as zhari,
            blk_jam.kode_jam as zjam
            FROM blk_jadwal3_paket_detail
            LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id=blk_jadwal3_setting_minggu.id
            LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari=blk_hari.id_hari
            LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam=blk_jam.id_jam
            where paket_id='".$ambil_paket_id."' order by zminggu, zhari, zjam ASC");

        $option = "";
        foreach ($ambil_data as $key => $value)
        {
            $ambil_minggu   = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$value->minggu_id."'");
            $ambil_minggu   = $ambil_minggu->kode;
            $ambil_hari     = $this->M_session->select_row("SELECT * FROM blk_hari where id_hari='".$value->hari."'");
            $ambil_hari     = $ambil_hari->kode_hari;
            $ambil_jam      = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$value->jam."'");
            $ambil_jam      = $ambil_jam->kode_jam;

            $option .= '<option value="'.$value->id.'">'.$ambil_minggu.' - '.$ambil_hari.' - '.$ambil_jam.'</option>';
        }

        $ambil_sell = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where paket_id='".$ambil_paket_id."' order by minggu_id, hari, jam");

        $datapm = array(
            'option' => $option,
            'sel1'   => $ambil_sell->id
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($datapm));
    }

    function datapembelajaran_detail_ambil_data_tabel($id,$id2)
    {
        $ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id."'");

        $ambil_minggu1  = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$ambil_data->minggu_id."'");
        $ambil_minggu   = $ambil_minggu1->kode.'<br/>'.strtoupper($ambil_minggu1->minggu);
        $minggu_satuan  = $ambil_minggu1->satuan;

        $ambil_hari1    = $this->M_session->select_row("SELECT * FROM blk_hari where id_hari='".$ambil_data->hari."'");
        $ambil_hari     = $ambil_hari1->kode_hari.'<br/>'.strtoupper($ambil_hari1->hari);
        $hari_satuan    = $ambil_hari1->satuan;

        $ambil_ins1     = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id2."'");
        $ambil_ins      = $this->M_session->select_row("SELECT * FROM blk_instruktur where id_instruktur='".$ambil_ins1->instruktur_id."'");
        $ambil_ins      = $ambil_ins->kode_instruktur.'<br/>'.strtoupper($ambil_ins->nama);

        $ambil_jam      = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$ambil_data->jam."'");
        $ambil_jam      = $ambil_jam->kode_jam.'<br/>'.strtoupper($ambil_jam->jam);

        $materi_json = json_decode($ambil_data->materi, true);

        $table = "";
        $nog = 0;
        foreach ( $materi_json as $value )
        {
            $no = $nog + 1;

            $ambil_materi_name = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$value."'");
            $ambil_materi_name = $ambil_materi_name->kode.' - '.$ambil_materi_name->materi;

            $ambil_tanggal_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id2."'");
            $ambil_tanggal_data = $ambil_tanggal_data->tanggal;

            $hari_sebelumnya    = $minggu_satuan*6;
            $hari_sebelumnya    = $hari_sebelumnya+$hari_satuan+$minggu_satuan;
            $tanggal_real       = date('d/m/Y', strtotime($ambil_tanggal_data. ' +'.$hari_sebelumnya.' day'));

            $table .= '<tr>';

            if ( $nog == 0 )
            {
                $table .=   '<td rowspan="'.count($materi_json).'">'.$no.'</td>';
                $table .=   '<td rowspan="'.count($materi_json).'">'.$ambil_minggu.'</td>';
                $table .=   '<td rowspan="'.count($materi_json).'">'.$ambil_hari.'</td>';
                $table .=   '<td rowspan="'.count($materi_json).'">'.$tanggal_real.'</td>';
                $table .=   '<td rowspan="'.count($materi_json).'">'.$ambil_ins.'</td>';
                $table .=   '<td rowspan="'.count($materi_json).'">'.$ambil_jam.'</td>';
            }

            $table .=   '<td>'.$nog.'</td>';
            $table .=   '<td>'.$ambil_materi_name.'</td>';
            $table .=   '<td></td>';
            $table .=   '<td></td>';
            $table .= '</tr>';

        $nog++;
        }

        $ambil_tki = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id2."'");

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

                $tdkhdr = '<button type="button" class="btn btn-xs bg-danger checkhadir_btn" data-id="'.$value->id.'">TIDAK HADIR</button>';
                if ( $detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]['tdk_hadir'] == NULL )
                {
                    $tdkhdr = '<button type="button" class="btn btn-xs bg-info checkhadir_btn" data-id="'.$value->id.'">HADIR</button>';
                }

                $check_input_nilai = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id_biodata='".$value->id_biodata."' and datapembelajaran_id='".$id2."'");
                $chckinputed = "<code>KOSONG</code>";
                if ( $check_input_nilai != NULL )
                {
                    $chckinputed = '<b>SUDAH INPUT</b>';
                }

                $table2 .= '<tr>';

                $table2 .=  '<td>'.$norty.'</td>';
                $table2 .=  '<td>'.$value->id_biodata.'</td>';
                $table2 .=  '<td>'.$nama_tki2.'</td>';
                $table2 .=  '<td>'.$chckinputed.'</td>';
                $table2 .=  '<td>'.$angk.'</td>';
                $table2 .=  '<td>'.$tdkhdr.'</td>';
                $table2 .=  '<td class="text-center">
                                <a class="btn btn-xxs bg-teal penilaian_btn" data-id="'.$value->id.'">Penilaian</a>
                                <a class="btn btn-xxs bg-danger delete_btn" data-id="'.$value->id.'">Hapus</a>
                            </td>';

                $table2 .= '</tr>';

            $norty++;
            }
        }

        $datapm = array(
            'a' => $table,
            'b' => $table2
        );

        return $datapm;
    }

    function datapembelajaran_detail_read1($id2)
    {
        $id = $this->input->post('id');

        $datapm = $this->datapembelajaran_detail_ambil_data_tabel($id, $id2);

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_delete1($id2)
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI HAPUS';

        $id = $this->input->post('id');
        $vl = $this->input->post('val');

        $ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail WHERE id='".$vl."'");
        $mg = $ambil_data->minggu_id;
        $hr = $ambil_data->hari;
        $jm = $ambil_data->jam;

        $detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id."'");

        $detail = json_decode($detail->detail, true);

        unset($detail[$mg][$hr][$jm]);

        $detail = json_encode($detail);

        $datass = array (
            'detail' => $detail
        );

        $upt = $this->M_session->update($datass, "blk_jadwal3_datapembelajaran_detail", $id, "id");

        if ( $upt == TRUE )
        {
            $dttable = $this->datapembelajaran_detail_ambil_data_tabel($vl, $id2);

            $datapm['d']        = $dttable;
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI HAPUS';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_delete2($id2)
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI HAPUS';

        $id = $this->input->post('id');
        $vl = $this->input->post('val');

        $detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id."'");

        $datass = array (
            'deleted_at' => date('Y-m-d H:i:s')
        );

        $upt = $this->M_session->update($datass, "blk_jadwal3_datapembelajaran_detail", $id, "id");

        $dttable        = $this->datapembelajaran_detail_ambil_data_tabel($vl, $id2);
        $datapm['d']    = $dttable;

        if ( $upt == TRUE )
        {
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI HAPUS';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_manual_add1($id_datapembelajaran)
    {
        $id_paket_detail = $this->input->post('id');

        $data = $this->M_session->select("
            SELECT
            *
            FROM personalblk
        ");

        $option = "";
        foreach ( $data as $row )
        {
            $option .= '<option value="'.$row->nodaftar.'">'.$row->nodaftar.' - '.$row->nama.'</option>';
        }

        $array = array(
            'option' => $option
        );

        $this->output->set_content_type('application/json')->set_output(json_encode( $array ));
    }

    function datapembelajaran_detail_manual_add2($id_datapembelajaran)
    {
        $id_paket_detail = $this->input->post('id');
        $type = $this->input->post('type');

        if ( $type == 1 )
        {
            $data = $this->M_session->select_row("
                SELECT
                blk_jadwal3_setting_minggu.minggu,
                blk_hari.hari,
                blk_jam.jam
                FROM blk_jadwal3_paket_detail
                LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id=blk_jadwal3_setting_minggu.id
                LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari=blk_hari.id_hari
                LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam=blk_jam.id_jam
                WHERE blk_jadwal3_paket_detail.id='".$id_paket_detail."'
            ");

            $array = array(
                'minggu' => $data->minggu,
                'hari' => $data->hari,
                'jam' => $data->jam
            );
        }
        else if ( $type == 2 )
        {
            $data = $this->M_session->select_row("
                SELECT
                blk_jadwal3_datapembelajaran.tanggal,
                blk_instruktur.nama,
                blk_jadwal3_paket.nama_paket
                FROM blk_jadwal3_datapembelajaran
                LEFT JOIN blk_instruktur ON blk_jadwal3_datapembelajaran.instruktur_id=blk_instruktur.id_instruktur
                LEFT JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
                WHERE blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'
            ");

            $array = array(
                'jadwal' => $data->nama_paket.' - '.$data->tanggal.' ('.$data->nama.')'
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $array ));
    }

    function datapembelajaran_detail_manual_insert($id_datapembelajaran)
    {
        $datapm['success'] = FALSE;
        $datapm['message'] = 'GAGAL DI TAMBAH';

        $type       = $this->input->post('typ');
        $pil_hari   = $this->input->post('val');
        $datatki    = $this->input->post('tki');

        $dataroot = array();
        $dataroot2 = array();
        if ( $type == 1 )
        {

            foreach ($datatki as $value)
            {
                $get_detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id='".$id_datapembelajaran."' AND id_biodata='".$value."'");
                if ( $get_detail != NULL )
                {
                    $detailg = json_decode($get_detail->detail, true);

                    $ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail WHERE id='".$pil_hari."'");

                    $datafinal = $detailg;
                    $datafinal[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam] = array (
                        'tdk_hadir' => '',
                        'angkatan'  => 'manual',
                        'nilai'     => array()
                    );

                    if ( !isset($detailg[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam]) )
                    {
                        $dataroot2[] = array (
                            'id'                    => $get_detail->id,
                            'id_biodata'            => $value,
                            'datapembelajaran_id'   => $id_datapembelajaran,
                            'detail'                => json_encode($datafinal)
                        );
                    }
                }
                else
                {
                    $dataroot[] = array (
                        'id_biodata'            => $value,
                        'datapembelajaran_id'   => $id_datapembelajaran,
                        'detail'                => json_encode($datafinal)
                    );
                }
            }
        }
        else if ( $type == 2 )
        {
            $ambil_data = $this->M_session->select("
                SELECT *
                FROM blk_jadwal3_datapembelajaran
                JOIN blk_jadwal3_paket_detail ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket_detail.paket_id
                WHERE blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'
             ");

            $dataroot = array();
            foreach ($datatki as $value)
            {
                $get_detail = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id='".$id_datapembelajaran."' AND id_biodata='".$value."'");

                if ( $get_detail != NULL )
                {
                    $detailg = json_decode($get_detail->detail, true);

                    $datafinal = $detailg;
                    foreach ($ambil_data as $valuz)
                    {
                        if ( !isset($detailg[$valuz->minggu_id][$valuz->hari][$valuz->jam]) )
                        {
                            $datafinal[$valuz->minggu_id][$valuz->hari][$valuz->jam] = array (
                                'tdk_hadir' => '',
                                'angkatan'  => 'manual',
                                'nilai'     => array()
                            );
                        }
                    }

                    $dataroot2[] = array (
                        'id'                    => $get_detail->id,
                        'id_biodata'            => $value,
                        'datapembelajaran_id'   => $id_datapembelajaran,
                        'detail'                => json_encode($datafinal)
                    );
                }
                else
                {
                    $datafinal = array();
                    foreach ($ambil_data as $valuz)
                    {
                        $datafinal[$valuz->minggu_id][$valuz->hari][$valuz->jam] = array (
                            'tdk_hadir' => '',
                            'angkatan'  => 'manual',
                            'nilai'     => array()
                        );
                    }

                    $dataroot[] = array (
                        'id_biodata'            => $value,
                        'datapembelajaran_id'   => $id_datapembelajaran,
                        'detail'                => json_encode($datafinal)
                    );
                }

            }
        }

        $checkthisup = FALSE;
        if ( $dataroot != NULL )
        {
            $checkthisup = $this->M_session->insert_batch($dataroot, "blk_jadwal3_datapembelajaran_detail");
        }
        if ( $dataroot2 != NULL )
        {
            $checkthisup = $this->M_session->update_batch($dataroot2, "blk_jadwal3_datapembelajaran_detail","id");
        }

        $datapm['d'] = $this->datapembelajaran_detail_ambil_data_tabel($pil_hari, $id_datapembelajaran);

        if ( $checkthisup == TRUE )
        {
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI TAMBAH';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_check_kehadiran_edit()
    {
        $id         = $this->input->post('id');
        $pil_hari   = $this->input->post('pil_hari');

        $ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id."'");

        $detaildata = json_decode($ambil_data->detail, true);

        $ambil_paket = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$pil_hari."'");
        $minggu = $ambil_paket->minggu_id;
        $hari   = $ambil_paket->hari;
        $jam    = $ambil_paket->jam;

        $stat_hadir         = 1;
        $alasan_tdk_hadir   = "";
        if ( isset( $detaildata[$minggu][$hari][$jam] ) )
        {
            $alasan_tdk_hadir = $detaildata[$minggu][$hari][$jam]['tdk_hadir'];
            if ( $alasan_tdk_hadir != NULL )
            {
                $stat_hadir = 2;
            }
        }

        $datapm = array(
            'stat_hadir' => $stat_hadir,
            'alasan_tdk_hadir' => $alasan_tdk_hadir
        );

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_check_kehadiran_get_option()
    {
        $data = $this->M_session->select("
            SELECT
            *
            FROM blk_jadwal_absen_ref
        ");

        $option = "";
        foreach ( $data as $row )
        {
            $option .= '<option value="'.$row->id.'">'.$row->nama.'</option>';
        }

        $array = array(
            'option' => $option
        );

        $this->output->set_content_type('application/json')->set_output(json_encode( $array ));
    }

    function datapembelajaran_detail_check_kehadiran_update($id_datapembelajaran, $id_pil_hari)
    {
        $datapm['success']  = FALSE;
        $datapm['message']  = 'GAGAL DI UBAH';

        $id_datapembelajaran_detail = $this->input->post('id_checklist');

        $stat_hadir         = $this->input->post('stat_hadir');
        $alasan_tdk_hadir   = $this->input->post('alasan_tdk_hadir');

        $ambil_data = $this->M_session->select_row('SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id="'.$id_datapembelajaran_detail.'"');
        $dataf      = json_decode( $ambil_data->detail, true );

        $ambil_paket = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id_pil_hari."'");
        $minggu = $ambil_paket->minggu_id;
        $hari   = $ambil_paket->hari;
        $jam    = $ambil_paket->jam;

        if ( isset( $dataf[$minggu][$hari][$jam] ) )
        {
            $val_stathadir = "";
            if ( $stat_hadir == 2 )
            {
                $val_stathadir = $alasan_tdk_hadir;
            }

            $dataf[$minggu][$hari][$jam]['tdk_hadir'] = $val_stathadir;

            $data23 = array(
                'detail' => json_encode($dataf)
            );

            $checkthisup = $this->M_session->update($data23, "blk_jadwal3_datapembelajaran_detail", $id_datapembelajaran_detail, "id");

            $datapm['d'] = $this->datapembelajaran_detail_ambil_data_tabel($id_pil_hari, $id_datapembelajaran);

            if ( $checkthisup == TRUE )
            {
                $datapm['success']  = TRUE;
                $datapm['message']  = 'SUKSES DI UBAH';
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_penilaian_add()
    {
        $id_datapembelajaran_detail = $this->input->post('id');
        $id_paket_detail            = $this->input->post('pil_hari');

        $data = $this->M_session->select_row("
            SELECT
            *
            FROM blk_jadwal3_datapembelajaran_detail
            WHERE blk_jadwal3_datapembelajaran_detail.id='".$id_datapembelajaran_detail."'
        ");

        $paket_detail = $this->M_session->select_row("
            SELECT
            *
            FROM blk_jadwal3_paket_detail
            WHERE blk_jadwal3_paket_detail.id='".$id_paket_detail."'
        ");

        $detaildata = json_decode($data->detail, true);
        $detaildata = $detaildata[$paket_detail->minggu_id][$paket_detail->hari][$paket_detail->jam];

        $materidata = json_decode($paket_detail->materi, true);

        $datap = $this->M_session->select("SELECT * FROM blk_nilai");

        $table = "";
        if ( isset( $detaildata ) )
        {
            $no = 1;
            foreach ( $materidata as $row )
            {
                $ambil_nama_pelajaran = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$row."'");

                $nama_pelajaran = "";
                if ( $ambil_nama_pelajaran != NULL )
                {
                    $nama_pelajaran = $ambil_nama_pelajaran->kode.' - '.$ambil_nama_pelajaran->materi;
                }

                $nilai1 = '';
                $nilai2 = '';
                if ( isset( $detaildata['nilai'][$row] ) )
                {
                    $datatt = $detaildata['nilai'][$row];

                    $nilai1 = $datatt[0];
                    $nilai2 = $datatt[1];
                }

                $table .= "<tr>";
                $table .=   "<td>".$no."</td>";
                $table .=   "<td>".
                                $nama_pelajaran.
                                "<input type='hidden' class='form-control' name='materi[]' value='".$row."'/>".
                            "</td>"
                ;

                if ( $ambil_nama_pelajaran->tipe_input_nilai == 1 )
                {
                    $table .= "<td colspan='2'>
                        <input type='text' class='form-control number' name='nilai1[]' value='".$nilai1."'/>
                        <input type='hidden' class='form-control' name='nilai2[]' value='-'/>
                    </td>";
                }
                else
                {
                    $option = "";
                    $option2 = "";
                    foreach( $datap as $dow )
                    {
                        $selector = "";
                        if ( $dow->kode_nilai == $nilai1 )
                        {
                            $selector = 'selected="selected"';
                        }
                        $option .= '<option value="'.$dow->kode_nilai.'" '.$selector.'>'.$dow->kode_nilai.' '.$dow->keterangan.'</option>';

                        $selector2 = "";
                        if ( $dow->kode_nilai == $nilai2 )
                        {
                            $selector2 = 'selected="selected"';
                        }
                        $option2 .= '<option value="'.$dow->kode_nilai.'" '.$selector2.'>'.$dow->kode_nilai.' '.$dow->keterangan.'</option>';
                    }

                    $table .= "<td>
                                    <select name='nilai1[]' class='form-control penilaian_isian' placeholder='Pilih'>
                                        <option></option>
                                        ".$option."
                                    </select>
                                </td>";
                    $table .= "<td>
                                    <select name='nilai2[]' class='form-control penilaian_isian' placeholder='Pilih'>
                                        <option></option>
                                        ".$option2."
                                    </select>
                                </td>";
                }

                $table .= "</tr>";

            $no++;
            }
        }

        $datanilai = $this->M_session->select("
            SELECT
            *
            FROM blk_nilai
        ");

        $btnnilai = "";
        foreach ($datanilai as $key => $value) {
            $btnnilai .= '<button type="button" class="tombol_allchanger" value="'.$value->kode_nilai.'">'.$value->kode_nilai.'</button>';
        }


        $array = array(
            'table' => $table,
            'tombol' => $btnnilai
        );

        $this->output->set_content_type('application/json')->set_output(json_encode( $array ));
    }

    function datapembelajaran_detail_penilaian_update($id_datapembelajaran, $id_pil_hari)
    {
        $datapm['success']  = FALSE;
        $datapm['message']  = 'GAGAL DI UBAH';

        $id_datapembelajaran_detail = $this->input->post('idx');
        $materi = $this->input->post('materi');
        $nilai1 = $this->input->post('nilai1');
        $nilai2 = $this->input->post('nilai2');

        $data   = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id_datapembelajaran_detail."'");
        $dataf  = json_decode($data->detail, true);

        $ambil_paket = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id_pil_hari."'");
        $minggu = $ambil_paket->minggu_id;
        $hari   = $ambil_paket->hari;
        $jam    = $ambil_paket->jam;

        if ( isset( $dataf[$minggu][$hari][$jam] ) )
        {
            for ( $i=0; $i<count($materi); $i++ )
            {
                $dataf[$minggu][$hari][$jam]['nilai'][ $materi[ $i ] ] = array (
                    $nilai1[ $i ],
                    $nilai2[ $i ]
                );
            }

            $data23 = array(
                'detail' => json_encode($dataf)
            );

            $checkthisup = $this->M_session->update($data23, "blk_jadwal3_datapembelajaran_detail", $id_datapembelajaran_detail, "id");

            if ( $checkthisup == TRUE )
            {
                $datapm['success']  = TRUE;
                $datapm['message']  = 'SUKSES DI UBAH';
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }

    function datapembelajaran_detail_penilaian_full($type, $id_datapembelajaran_detail)
    {
        if ( $type == 'change' )
        {
            $idbio = $this->input->post('idbio');
        }
        else if ( $type == 'add' )
        {
            $ambil_data_idbio = $this->M_session->select_row("
                SELECT
                *
                FROM blk_jadwal3_datapembelajaran_detail
                WHERE blk_jadwal3_datapembelajaran_detail.datapembelajaran_id='".$id_datapembelajaran_detail."'
                ORDER BY id_biodata ASC
            ");
            $idbio = "";
            if ( $ambil_data_idbio != NULL )
            {
                $idbio = $ambil_data_idbio->id_biodata;
            }
        }

        $datanilai = $this->M_session->select("
            SELECT
            *
            FROM blk_nilai
        ");

        $btnnilai = "";
        foreach ($datanilai as $key => $value) {
            $btnnilai .= '<button type="button" class="tombol_allchanger" value="'.$value->kode_nilai.'">'.$value->kode_nilai.'</button>';
        }

        $data['stat']   = FALSE;
        $data['message']    = 'TIDAK ADA DATA TKI DI JADWAL INI';
        if ( $idbio != '' )
        {
            $data = $this->datapembelajaran_detail_penilaian_full_change($id_datapembelajaran_detail, $idbio);
        }

        $data['tombol'] = $btnnilai;

        $this->output->set_content_type('application/json')->set_output(json_encode( $data ));
    }

    function datapembelajaran_detail_penilaian_full_change($id_datapembelajaran_detail, $idbio)
    {
        $datapm['stat']     = FALSE;
        $datapm['message']  = 'TIDAK ADA DATA TKI DI JADWAL INI';

        $ambil_paket_id = $this->M_session->select_row("
            SELECT
            paket_id, detail, blk_jadwal3_datapembelajaran_detail.id
            FROM blk_jadwal3_datapembelajaran_detail
            JOIN blk_jadwal3_datapembelajaran ON blk_jadwal3_datapembelajaran_detail.datapembelajaran_id=blk_jadwal3_datapembelajaran.id
            WHERE blk_jadwal3_datapembelajaran_detail.datapembelajaran_id = '".$id_datapembelajaran_detail."'
            and blk_jadwal3_datapembelajaran_detail.id_biodata = '".$idbio."'
            and blk_jadwal3_datapembelajaran.deleted_at = ''
            ORDER BY id_biodata ASC
        ");

        $ambil_data_idbio = $this->M_session->select("
            SELECT
            *
            FROM blk_jadwal3_datapembelajaran_detail
            WHERE blk_jadwal3_datapembelajaran_detail.datapembelajaran_id='".$id_datapembelajaran_detail."'
            ORDER BY id_biodata ASC
        ");

        $option = "";
        foreach ( $ambil_data_idbio as $row )
        {
            $option .= '<option value="'.$row->id_biodata.'" >'.$row->id_biodata.'</option>';
        }

        $optionatas = $option;

        if ( $ambil_paket_id != NULL )
        {
            $detail_id  = $ambil_paket_id->id;
            $paket_id   = $ambil_paket_id->paket_id;
            $detaildata = json_decode($ambil_paket_id->detail, true);

            $ambil_minggu_id = $this->M_session->select_row("
                SELECT
                *
                FROM blk_jadwal3_paket_detail
                WHERE paket_id = '".$paket_id."'
                ORDER BY minggu_id ASC
            ");
            $minggu_id = $ambil_minggu_id->minggu_id;

            $data = $this->M_session->select("
                SELECT
                distinct(blk_jadwal3_paket_detail.hari) as hari,
                blk_hari.kode_hari,
                blk_hari.hari as nama
                FROM blk_jadwal3_paket_detail
                LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari=blk_hari.id_hari
                WHERE paket_id='".$paket_id."'
                and minggu_id='".$minggu_id."'
                and blk_jadwal3_paket_detail.deleted_at=''
                order by blk_hari.kode_hari ASC
            ");

            $datap = $this->M_session->select("SELECT * FROM blk_nilai");

            $table = "";
            $noall = 1;
            foreach ( $data as $hari_val )
            {
                $get_jam = $this->M_session->select("SELECT
                    distinct(blk_jadwal3_paket_detail.jam) as jam,
                    blk_jam.kode_jam,
                    blk_jam.jam as nama
                    FROM blk_jadwal3_paket_detail
                    LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam=blk_jam.id_jam
                    WHERE hari = '".$hari_val->hari."'
                    and paket_id='".$paket_id."'
                    and minggu_id='".$minggu_id."'
                    and blk_jadwal3_paket_detail.deleted_at=''
                    order by blk_jam.kode_jam ASC
                ");

                $no_jam = 1;
                foreach ( $get_jam as $jam_val )
                {
                    $get_materi = $this->M_session->select_row("SELECT *
                        FROM blk_jadwal3_paket_detail
                        WHERE jam = '".$jam_val->jam."'
                        and hari = '".$hari_val->hari."'
                        and paket_id='".$paket_id."'
                        and minggu_id='".$minggu_id."'
                        and blk_jadwal3_paket_detail.deleted_at=''
                    ");

                    $detail_arr = json_decode($get_materi->materi);

                    $no_detail = 1;
                    foreach ( $detail_arr as $da_materi )
                    {
                        $table .= '<tr>'."\n";

                        if ( $no_jam == 1 && $no_detail == 1 )
                        {
                            $count_materi1 = 0;
                            foreach ( $get_jam as $dzz )
                            {
                                $get_materid2 = $this->M_session->select_row("SELECT *
                                    FROM blk_jadwal3_paket_detail
                                    WHERE jam = '".$dzz->jam."'
                                    and hari = '".$hari_val->hari."'
                                    and paket_id='".$paket_id."'
                                    and minggu_id='".$minggu_id."'
                                    and blk_jadwal3_paket_detail.deleted_at=''
                                ");

                                $detail_arzr = json_decode($get_materid2->materi);
                                foreach ( $detail_arzr as $d0 )
                                {
                                    $count_materi1++;
                                }
                            }
                            $table .=   "\t".'<td e rowspan="'.$count_materi1.'">'.$noall.'</td>'."\n";
                            $table .=   "\t".'<td e rowspan="'.$count_materi1.'">'.$hari_val->kode_hari.' - '.$hari_val->nama.'</td>'."\n";
                        }

                        if ( $no_detail == 1 )
                        {
                            $count_detail = 0;
                            foreach ( $detail_arr as $d0 )
                            {
                                $count_detail++;
                            }
                            $table .=   "\t".'<td d rowspan="'.$count_detail.'">'.$jam_val->kode_jam.' - '.$jam_val->nama.'</td>'."\n";
                            $table .=   "\t".'<td d rowspan="'.$count_detail.'">'.$get_materi->angkatan.'</td>'."\n";
                        }

                        $ambil_pelajaran = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$da_materi."'");

                        $table .=   "\t".'<td>'.$ambil_pelajaran->kode.' - '.$ambil_pelajaran->materi.'</td>'."\n";



                        $nilai1 = '';
                        $nilai2 = '';
                        if ( isset( $detaildata[$get_materi->minggu_id][$get_materi->hari][$get_materi->jam]['nilai'][$da_materi] ) )
                        {
                            $derftg = $detaildata[$get_materi->minggu_id][$get_materi->hari][$get_materi->jam];
                            $datatt = $derftg['nilai'][$da_materi];

                            $nilai1 = $datatt[0];
                            $nilai2 = $datatt[1];
                        }

                        if ( $ambil_pelajaran->tipe_input_nilai == 1 )
                        {
                            $table .= "
                                <td colspan='2'>
                                    <input type='hidden' name='minggu[]' value='".$get_materi->minggu_id."' />
                                    <input type='hidden' name='hari[]' value='".$get_materi->hari."' />
                                    <input type='hidden' name='jam[]' value='".$get_materi->jam."' />
                                    <input type='hidden' name='materi[]' value='".$da_materi."' />
                                    <input type='text' class='form-control number' name='nilai1[]' value='".$nilai1."'/>
                                    <input type='hidden' class='form-control' name='nilai2[]' value='-'/>
                                </td>
                            ";
                        }
                        else
                        {
                            $option = "";
                            $option2 = "";
                            foreach( $datap as $dow )
                            {
                                $selector = "";
                                if ( $dow->kode_nilai == $nilai1 )
                                {
                                    $selector = 'selected="selected"';
                                }
                                $option .= '<option value="'.$dow->kode_nilai.'" '.$selector.'>'.$dow->kode_nilai.' '.$dow->keterangan.'</option>';

                                $selector2 = "";
                                if ( $dow->kode_nilai == $nilai2 )
                                {
                                    $selector2 = 'selected="selected"';
                                }
                                $option2 .= '<option value="'.$dow->kode_nilai.'" '.$selector2.'>'.$dow->kode_nilai.' '.$dow->keterangan.'</option>';
                            }

                            $table .= "<td>
                                            <input type='hidden' name='minggu[]' value='".$get_materi->minggu_id."' />
                                            <input type='hidden' name='hari[]' value='".$get_materi->hari."' />
                                            <input type='hidden' name='jam[]' value='".$get_materi->jam."' />
                                            <input type='hidden' name='materi[]' value='".$da_materi."' />
                                            <select name='nilai1[]' class='form-control penilaian_isian' placeholder='Pilih'>
                                                <option></option>
                                                ".$option."
                                            </select>
                                        </td>";
                            $table .= "<td>
                                            <select name='nilai2[]' class='form-control penilaian_isian' placeholder='Pilih'>
                                                <option></option>
                                                ".$option2."
                                            </select>
                                        </td>";
                        }

                        $table .= '</tr>'."\n";

                    $no_detail++;
                    }

                $no_jam++;
                }

            $noall++;
            }

            $datapm['stat'] = TRUE;
            $datapm['table'] = $table;
            $datapm['idx'] = $detail_id;
        }

        $datapm['option'] = $optionatas;
        $datapm['idbio'] = $idbio;

        return $datapm;

    }

    function datapembelajaran_detail_penilaian_full_update()
    {

        $datapm['success']  = FALSE;
        $datapm['message']  = 'GAGAL DI UBAH';

        $id_datapembelajaran_detail = $this->input->post('idx');
        $minggu = $this->input->post('minggu');
        $hari   = $this->input->post('hari');
        $jam    = $this->input->post('jam');
        $materi = $this->input->post('materi');
        $nilai1 = $this->input->post('nilai1');
        $nilai2 = $this->input->post('nilai2');

        $data   = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE id='".$id_datapembelajaran_detail."'");

        $dataf  = array();
        if ( isset( $dataf ) )
        {
            $dataf  = json_decode($data->detail, true);
        }

        for ( $i=0; $i<count($minggu); $i++ )
        {
            $dataf[ $minggu[ $i ] ][ $hari[ $i ] ][ $jam[ $i ] ]['nilai'][ $materi[ $i ] ] = array (
                $nilai1[ $i ],
                $nilai2[ $i ]
            );
        }

        $data23 = array(
            'detail' => json_encode($dataf)
        );

        $checkthisup = $this->M_session->update($data23, "blk_jadwal3_datapembelajaran_detail", $id_datapembelajaran_detail, "id");

        if ( $checkthisup == TRUE )
        {
            $datapm['success']  = TRUE;
            $datapm['message']  = 'SUKSES DI UBAH';
        }

        $this->output->set_content_type('application/json')->set_output(json_encode( $datapm ));
    }


    function printdata4(){
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Arial');
        $fontStyle->setSize(16);
        $myTextElement = $section->addText('Hello World');
        $myTextElement->setFontStyle($fontStyle);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
    }


    function printdata1($id_datapembelajaran, $id_pil_hari)
    {
        // echo $id_pil_hari;
        $document = new \PhpOffice\PhpWord\TemplateProcessor( "files/blk_jadwal1.docx" );

        $ambil_title = $this->M_session->select_row("
            SELECT *
            FROM blk_jadwal3_datapembelajaran
            JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
            WHERE blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'
        ");

        $ambil_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_paket_detail where id='".$id_pil_hari."'");

        // var_dump($ambil_data);

        $ambil_minggus = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$ambil_data->minggu_id."'");
        $ambil_minggu = "";
        if ( $ambil_minggus != NULL )
        {
            $ambil_minggu = $ambil_minggus->minggu;
        }
        $minggu_satuan  = $ambil_minggus->satuan;

        $ambil_haris    = $this->M_session->select_row("SELECT * FROM blk_hari where id_hari='".$ambil_data->hari."'");
        $ambil_hari = "";
        if ( $ambil_haris != NULL )
        {
            $ambil_hari     = $ambil_haris->kode_hari.'<w:br/>'.strtoupper($ambil_haris->hari);
        }
        $hari_satuan    = $ambil_haris->satuan;

        $ambil_ins1     = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id_datapembelajaran."'");
        $ambil_inss     = $this->M_session->select_row("SELECT * FROM blk_instruktur where id_instruktur='".$ambil_ins1->instruktur_id."'");
        $ambil_ins = "";
        if ( $ambil_inss != NULL )
        {
            $ambil_ins  = $ambil_inss->kode_instruktur.'<w:br/>'.strtoupper($ambil_inss->nama);
        }

        $ambil_jam1         = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$ambil_data->jam."'");
        $ambil_jam = "";
        if ( $ambil_jam1 != NULL )
        {
            $ambil_jam = $ambil_jam1->jam;
        }

        $document->setValue('title', strtoupper($ambil_title->nama_paket).' '.strtoupper($ambil_minggu).' : '.$ambil_jam );
        $document->setValue('title_r', '' );


        $ambil_tanggal_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id_datapembelajaran."'");
        $ambil_tanggal_data = $ambil_tanggal_data->tanggal;

        $hari_sebelumnya    = $minggu_satuan*6;
        $hari_sebelumnya    = $hari_sebelumnya+$hari_satuan+$minggu_satuan;
        $tanggal_real       = date('d/m/Y', strtotime($ambil_tanggal_data. ' +'.$hari_sebelumnya.' day'));

        $materi_json = json_decode($ambil_data->materi, true);


        // var_dump($materi_json);

        $document->cloneRow('val1', count($materi_json) );

        $nog = 0;
        foreach ( $materi_json as $value )
        {
            $no = $nog + 1;

            $ambil_materi_navv = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$value."'");
            $ambil_materi_name = $ambil_materi_navv->kode.' - '.$ambil_materi_navv->materi;
            $ambil_materi_buku = $ambil_materi_navv->buku_hal;
            $ambil_materi_ket  = $ambil_materi_navv->keterangan;



            if ( $nog == 0 )
            {
                $document->setValue('val1#'.$no, $ambil_hari);
                $document->setValue('val2#'.$no, $tanggal_real);
                $document->setValue('val3#'.$no, $ambil_ins);
            }
            else
            {
                $document->setValue('val1#'.$no, '');
                $document->setValue('val2#'.$no, '');
                $document->setValue('val3#'.$no, '');
            }

            $document->setValue('val4#'.$no, $nog);
            $document->setValue('val5#'.$no, $ambil_materi_name);
            $document->setValue('val6#'.$no, $ambil_materi_buku);
            $document->setValue('val7#'.$no, $ambil_materi_ket);

        $nog++;
        }



        $ambil_tki = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."'");

        $total_clone = 0;
        foreach ( $ambil_tki as $value )
        {
            $detail = json_decode($value->detail, true);
            if ( isset( $detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam] ) )
            {
                $total_clone += 1;
            }
        }

        $document->cloneBlock( 'CLONEME', $total_clone );

        $nog = 0;
        foreach ( $ambil_tki as $value )
        {

            $biodata_nama = "";
            $substr_idbio = substr($value->id_biodata, 0, 2);
            if ( $substr_idbio == 'MF' || $substr_idbio == 'FF' || $substr_idbio == 'MI' || $substr_idbio == 'FI' || $substr_idbio == 'JP' )
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }
            else
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }

            $nox = $nog + 1;

            $detail = json_decode($value->detail, true);

            if ( isset( $detail[$ambil_data->minggu_id][$ambil_data->hari][$ambil_data->jam] ) )
            {
                $materi_yg_dipakai = json_decode($ambil_data->materi, true);

                $materi_news = array();
                $not = 0;
                for ( $x=0; $x<count($materi_yg_dipakai); $x=$x+4 )
                {
                    if ( isset($materi_yg_dipakai[ $x ]) )
                    {
                        $materi_news[$not][$x] = $materi_yg_dipakai[ $x ];
                    }
                    if ( isset($materi_yg_dipakai[ $x+1 ]) )
                    {
                        $materi_news[$not][$x+1] = $materi_yg_dipakai[ $x+1 ];
                    }
                    if ( isset($materi_yg_dipakai[ $x+2 ]) )
                    {
                        $materi_news[$not][$x+2] = $materi_yg_dipakai[ $x+2 ];
                    }
                    if ( isset($materi_yg_dipakai[ $x+3 ]) )
                    {
                        $materi_news[$not][$x+3] = $materi_yg_dipakai[ $x+3 ];
                    }

                $not++;
                }

                $document->cloneRow('no', count($materi_news) );

                $noh = 1;
                foreach ( $materi_news as $mn_val )
                {
                    if ( $noh == 1 )
                    {
                        $document->setValue('no#'.$noh, $nox, '1');
                        $document->setValue('id#'.$noh, $value->id_biodata.'<w:br/>'.$get_namaes, '1');
                    }
                    else
                    {
                        $document->setValue('no#'.$noh, '', '1'
                    );
                        $document->setValue('id#'.$noh, '', '1');
                    }

                    $noq=1;
                    foreach ( $mn_val as $mn_keys => $mn_vals)
                    {

                        $document->setValue('km'.$noq.'#'.$noh, $mn_keys, $nog);

                    $noq++;
                    }

                    if ( $noq < 5 )
                    {
                        for ( $dd=($noq-1); $dd<5; $dd++ )
                        {
                            $document->setValue('km'.$dd.'#'.$noh, '', $nog);
                        }
                    }

                $noh++;
                }

            $nog++;
            }
        }

        $filename = 'Jadwal.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        flush();
        readfile($isinya);
        unlink($isinya);
        exit;
    }


    

    function print_satu($id_datapembelajaran, $id_pil_hari){

require_once 'assets/phpword/PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section

// area style ----------------------------------------------------------------------------#################// buka

// Define table style arrays
$styleTable2 = array('borderSize'=>6,'borderColor'=>'black');
$styleTable = array('cellMargin'=>80);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'yellow');


// table style
$borderTopBottom = array('borderSize'=>6,'borderBottomColor'=>'white', 'borderTopColor'=>'white');
$borderAll = array('borderSize'=>6,'borderColor'=>'black');
// Define cell style arrays
$styleCell = array('valign'=>'center', 'borderSize'=>6,'borderColor'=>'black', 'bgColor'=>'yellow');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center');

// Add table style

// area style ----------------------------------------------------------------------------#################// tutup


$title = $this->M_session->select_row("SELECT
    *
FROM
    blk_jadwal3_datapembelajaran
JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id = blk_jadwal3_paket.id
WHERE
    blk_jadwal3_datapembelajaran.id = ".$id_datapembelajaran.""
);





$paket = $this->M_session->select_row('select * from blk_jadwal3_paket_detail WHERE id = '.$id_pil_hari.'');

$ambil_minggus = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$paket->minggu_id."'");
        $ambil_minggu = "";
        if ( $ambil_minggus != NULL )
        {
            $ambil_minggu = $ambil_minggus->minggu;
        }

$ambil_jam1         = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$paket->jam."'");
        $ambil_jam = "";
        if ( $ambil_jam1 != NULL )
        {
            $ambil_jam = $ambil_jam1->jam;
        }
// dapatkan paket_id
$paket_detail = $this->db->query('
    SELECT
    blk_jadwal3_paket_detail.*, blk_jadwal3_setting_minggu.minggu AS zminggu,
    blk_hari.kode_hari AS zhari,
    blk_jam.kode_jam AS zjam
FROM
    blk_jadwal3_paket_detail
LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id = blk_jadwal3_setting_minggu.id
LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari = blk_hari.id_hari
LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam = blk_jam.id_jam
WHERE
    paket_id = '.$paket->paket_id.'
ORDER BY
    zminggu,
    zhari,
    zjam ASC

    ')->result();

$jumlahPaket = count($paket_detail);

// var_dump($title);

foreach ($paket_detail as $key => $isiPaket) {
    $materi[] = $isiPaket->materi;
    $hari[] = $isiPaket->zhari;
    $jam[] = $isiPaket->zjam;
}

$namaHari = array( 'H1'=>'SENIN', 'H2'=>'SELASA', 'H3'=>'RABU', 'H4'=>'KAMIS', 'H5'=>'JUMAT');




// mengulang tabble dan section ke halaman baru-----------------------------------------------#############// buka 
for ($k=0; $k < $jumlahPaket; $k++) { 


$section = $PHPWord->createSection();
$section->addText($title->nama_paket.' '.$ambil_minggu.' '.$ambil_jam);

$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

$table = $section->addTable('myOwnTableStyle_$k');




$table->addRow();

// Add cells
$table->addCell(500, $styleCell)->addText('HARI', $fontStyle);
$table->addCell(500, $styleCell)->addText('TGL', $fontStyle);
$table->addCell(500, $styleCell)->addText('GURU', $fontStyle);
$table->addCell(50, $styleCell)->addText('', $fontStyle);
$table->addCell(10000, $styleCell)->addText('MATERI', $fontStyle);
$table->addCell(500, $styleCell)->addText('T/P/S', $fontStyle);
$table->addCell(500, $styleCell)->addText('BUKU HLM', $fontStyle);

// Add more rows / cells
$text = 'ok';

for($i = 0; $i <= 2; $i++) {
    if ($i==1) {
        break;
    }
    $table->addRow();
    $table->addCell(2000, $borderTopBottom)->addText($hari[$k].' '.$namaHari[$hari[$k]]);

    $table->addCell(2000, $borderTopBottom)->addText($text);
    $table->addCell(2000, $borderTopBottom)->addText($text);
    $table->addCell(2000, $borderAll)->addText("");
    
    $table->addCell(1000, $borderAll)->addText($text);
    $table->addCell(1000, $borderAll)->addText($text);
    $table->addCell(1000, $borderAll)->addText($text);
}


$PHPWord->addTableStyle('myOwnTableStylebe', $styleTable2, $styleFirstRow);

// Add table
$table = $section->addTable('myOwnTableStylebe');

// Add row
$table->addRow();

// Add cells
$table->addCell(500, $styleCell)->addText('NO', $fontStyle);
$table->addCell(2000, $styleCell)->addText('ID-NAMA', $fontStyle);
$table->addCell(2000, $styleCell)->addText('KM', $fontStyle);
$table->addCell(2000, $styleCell)->addText('T', $fontStyle);
$table->addCell(2000, $styleCell)->addText('P', $fontStyle);
$table->addCell(2000, $styleCell)->addText('KM', $fontStyle);
$table->addCell(2000, $styleCell)->addText('T', $fontStyle);
$table->addCell(2000, $styleCell)->addText('P', $fontStyle);
$table->addCell(2000, $styleCell)->addText('KM', $fontStyle);
$table->addCell(2000, $styleCell)->addText('T', $fontStyle);
$table->addCell(2000, $styleCell)->addText('P', $fontStyle);
$table->addCell(2000, $styleCell)->addText('KM', $fontStyle);
$table->addCell(2000, $styleCell)->addText('T', $fontStyle);
$table->addCell(2000, $styleCell)->addText('P', $fontStyle);

// Add more rows / cells
for($i = 1; $i <= 2; $i++) {
    $table->addRow();
    $table->addCell(500)->addText("$i");
    $table->addCell(8000)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(500)->addText("Cell $i");
    $table->addCell(2000)->addText("Cell $i");
    
    $text = ($i % 2 == 0) ? 'X' : '';
    $table->addCell(2000)->addText($text);
}



}
// mengulang table & section ----------------------------------------------------------------------------#################// tutup


// Save File
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('files/coco.docx');

$fileName = basename('coco.docx');
$filePath = 'files/'.$fileName;

if (!empty($fileName) && file_exists($filePath)) {
    // define header
    header('Cache-Control: public');    
    header('Content-Describtion: File Transfer');    
    header('Content-Disposition: attachment; filename='.basename($fileName));    
    header('Content-TYpe: application/zip');
    header('Content-Transfer-Encoding: binary');    
    
    // read file
    readfile($filePath);
    
    exit;

}else{
    echo 'file not axist.';
}

}
    function printdata2($id_datapembelajaran)
    {
        $document = new \PhpOffice\PhpWord\TemplateProcessor( "files/blk_jadwal2_b.docx" );

        $ambil_title = $this->M_session->select_row("
            SELECT *
            FROM blk_jadwal3_datapembelajaran
            JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
            WHERE blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'
        ");

        $ambil_tki = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."'");

        $add_new2 = FALSE;
        $counter = count($ambil_tki);
        if ( ($counter % 2) == 1 )
        {
            $counterx = ($counter+1)/2;
            $counter1 = "LIMIT 0, ".(($counter+1)/2);
            $counter2 = "LIMIT ".(($counter+1)/2).",".$counter;
            $add_new2 = TRUE;
        }
        else
        {
            $counterx = ($counter/2);
            $counter1 = "LIMIT 0, ".($counter/2);
            $counter2 = "LIMIT ".($counter/2).",".$counter;
        }

        $ambil_tki1 = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."' ".$counter1);
        $ambil_tki2 = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."' ".$counter2);

        //echo "SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."' ".$counter1.'<br/>';
        //echo "SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."' ".$counter2;

        $dd_tanggal = $ambil_title->tanggal;
        for ( $i=0; $i<7; $i++ )
        {
            $x = $i+1;
            $tgl1 = date('d/m/Y', strtotime($dd_tanggal. ' +'.$i.' day'));

            $document->setValue('tgl'.$x, $tgl1);
        }

        $document->cloneRow('no', $counterx );

        $nog = 0;
        foreach ( $ambil_tki1 as $value )
        {
            $nog++;

            $biodata_nama = "";
            $substr_idbio = substr($value->id_biodata, 0, 2);
            if ( $substr_idbio == 'MF' || $substr_idbio == 'FF' || $substr_idbio == 'MI' || $substr_idbio == 'FI' || $substr_idbio == 'JP' )
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }
            else
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }

            $document->setValue('no#'.$nog, $nog);
            $document->setValue('id#'.$nog, $value->id_biodata);
            $document->setValue('nm#'.$nog, $get_namaes);
        }

        $nog = 0;
        foreach ( $ambil_tki2 as $value )
        {
            $nog++;

            $biodata_nama = "";
            $substr_idbio = substr($value->id_biodata, 0, 2);
            if ( $substr_idbio == 'MF' || $substr_idbio == 'FF' || $substr_idbio == 'MI' || $substr_idbio == 'FI' || $substr_idbio == 'JP' )
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }
            else
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }

            $document->setValue('no2#'.$nog, $nog);
            $document->setValue('id2#'.$nog, $value->id_biodata);
            $document->setValue('nm2#'.$nog, $get_namaes);
        }

        if ( $add_new2 == TRUE )
        {
            $document->setValue('no2#'.($nog+1), '');
            $document->setValue('id2#'.($nog+1), '');
            $document->setValue('nm2#'.($nog+1), '');
        }

        $filename = 'Jadwal.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        flush();
        readfile($isinya);
        unlink($isinya);
        exit;
    }

    function printdata3($id_datapembelajaran)
    {
        $document = new \PhpOffice\PhpWord\TemplateProcessor( "files/blk_jadwal3.docx" );

        $ambil_title = $this->M_session->select_row("
            SELECT *
            FROM blk_jadwal3_datapembelajaran
            JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket.id
            WHERE blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'
        ");


        $ambil_datas = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran
            JOIN blk_jadwal3_paket_detail
            ON blk_jadwal3_datapembelajaran.paket_id=blk_jadwal3_paket_detail.paket_id
            where blk_jadwal3_datapembelajaran.id='".$id_datapembelajaran."'");

        $document->cloneBlock( 'CLONEME', count($ambil_datas) );

        $nent = 1;
        foreach ( $ambil_datas as $ambil_data )
        {
            $ambil_minggus = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$ambil_data->minggu_id."'");
            $ambil_minggu = "";
            if ( $ambil_minggus != NULL )
            {
                $ambil_minggu = $ambil_minggus->minggu;
            }
            $minggu_satuan  = $ambil_minggus->satuan;

            $ambil_haris    = $this->M_session->select_row("SELECT * FROM blk_hari where id_hari='".$ambil_data->hari."'");
            $ambil_hari = "";
            if ( $ambil_haris != NULL )
            {
                $ambil_hari     = $ambil_haris->kode_hari.'<w:br/>'.strtoupper($ambil_haris->hari);
            }
            $hari_satuan    = $ambil_haris->satuan;

            $ambil_ins1     = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id_datapembelajaran."'");
            $ambil_inss     = $this->M_session->select_row("SELECT * FROM blk_instruktur where id_instruktur='".$ambil_ins1->instruktur_id."'");
            $ambil_ins = "";
            if ( $ambil_inss != NULL )
            {
                $ambil_ins  = $ambil_inss->kode_instruktur.'<w:br/>'.strtoupper($ambil_inss->nama);
            }

            $ambil_jam1         = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$ambil_data->jam."'");
            $ambil_jam = "";
            if ( $ambil_jam1 != NULL )
            {
                $ambil_jam = $ambil_jam1->jam;
            }

            $document->setValue('title', strtoupper($ambil_title->nama_paket).' '.strtoupper($ambil_minggu).' : '.$ambil_jam );
            $document->setValue('title_r', '' );

            $ambil_tanggal_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id_datapembelajaran."'");
            $ambil_tanggal_data = $ambil_tanggal_data->tanggal;

            $hari_sebelumnya    = $minggu_satuan*6;
            $hari_sebelumnya    = $hari_sebelumnya+$hari_satuan+$minggu_satuan;
            $tanggal_real       = date('d/m/Y', strtotime($ambil_tanggal_data. ' +'.$hari_sebelumnya.' day'));

            $materi_json = json_decode($ambil_data->materi, true);

            $document->cloneRow('val1', count($materi_json) );

            $nog = 0;
            foreach ( $materi_json as $value )
            {
                $no = $nog + 1;

                $ambil_materi_navv = $this->M_session->select_row("SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id='".$value."'");
                $ambil_materi_name = $ambil_materi_navv->kode.' - '.$ambil_materi_navv->materi;
                $ambil_materi_buku = $ambil_materi_navv->buku_hal;
                $ambil_materi_ket  = $ambil_materi_navv->keterangan;

                if ( $nog == 0 )
                {
                    $document->setValue('val1#'.$no, $ambil_hari, '1');
                    $document->setValue('val2#'.$no, $tanggal_real, '1');
                    $document->setValue('val3#'.$no, $ambil_ins, '1');
                }
                else
                {
                    $document->setValue('val1#'.$no, '', '1');
                    $document->setValue('val2#'.$no, '', '1');
                    $document->setValue('val3#'.$no, '', '1');
                }

                $document->setValue('val4#'.$no, $nog, $nent);
                $document->setValue('val5#'.$no, $ambil_materi_name, $nent);
                $document->setValue('val6#'.$no, $ambil_materi_buku, $nent);
                $document->setValue('val7#'.$no, $ambil_materi_ket, $nent);

            $nog++;
            }

        $nent++;
        }

        $ambil_tki = $this->M_session->select("SELECT * FROM blk_jadwal3_datapembelajaran_detail where deleted_at = '' and datapembelajaran_id='".$id_datapembelajaran."'");

        $document->cloneRow('no', count($ambil_tki) );

        $nog = 0;
        foreach ( $ambil_tki as $value )
        {
            $nog++;

            $biodata_nama = "";
            $substr_idbio = substr($value->id_biodata, 0, 2);
            if ( $substr_idbio == 'MF' || $substr_idbio == 'FF' || $substr_idbio == 'MI' || $substr_idbio == 'FI' || $substr_idbio == 'JP' )
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personalblk WHERE nodaftar='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }
            else
            {
                $get_namae = $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$value->id_biodata."'");

                $get_namaes = "";
                if ( $get_namae != NULL )
                {
                    $get_namaes = $get_namae->nama;
                }
            }

            $document->setValue('no#'.$nog, $nog);
            $document->setValue('id#'.$nog, $value->id_biodata.'<w:br/>'.$get_namaes);
        }

        $filename = 'Jadwal.docx';

        $isinya=$document->save($filename);

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
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

                        $dtyuiop[$bil_dat] = array (
                            $value98->nilai,
                            $value98->nilai2
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

    function e()
    {
        $got_dataxx = $this->M_session->select("SELECT * FROM blk_jadwal_penilaian WHERE jadwal_data_tki_id='2291'");

        echo '<pre>';
        print_r($got_dataxx);
    }
/*
    function c()
    {
        echo $week = date("w", strtotime(date('2018-07-04')) );
    }*/


    function print_satu_paket_gagal($id_datapembelajaran, $id_pil_hari){

require_once 'assets/phpword/PHPWord.php';


// New Word Document
$PHPWord = new PHPWord();

// Define table style arrays
$styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>20, 'size'=>5);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'yellow');

// Define cell style arrays
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>true, 'valign'=>'center', 'size'=>7);

// Add table style
$PHPWord->addTableStyle('table1', $styleTable, $styleFirstRow);
$PHPWord->addTableStyle('table2', $styleTable, $styleFirstRow);

// script php untuk title

$title = $this->M_session->select_row("SELECT
    *
FROM
    blk_jadwal3_datapembelajaran
JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id = blk_jadwal3_paket.id
WHERE
    blk_jadwal3_datapembelajaran.id = ".$id_datapembelajaran.""
);



$paket = $this->M_session->select_row('select * from blk_jadwal3_paket_detail WHERE id = '.$id_pil_hari.'');

$ambil_minggus = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$paket->minggu_id."'");
        $ambil_minggu = "";
        if ( $ambil_minggus != NULL )
        {
            $ambil_minggu = $ambil_minggus->minggu;
        }

$ambil_jam1         = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$paket->jam."'");
        $ambil_jam = "";
        if ( $ambil_jam1 != NULL )
        {
            $ambil_jam = $ambil_jam1->jam;
        }

// dapatkan paket_id
$paket_detail = $this->db->query('
    SELECT
    blk_jadwal3_paket_detail.*, blk_jadwal3_setting_minggu.minggu AS zminggu,
    blk_hari.kode_hari AS zhari,
    blk_jam.kode_jam AS zjam
FROM
    blk_jadwal3_paket_detail
LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id = blk_jadwal3_setting_minggu.id
LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari = blk_hari.id_hari
LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam = blk_jam.id_jam
WHERE
    paket_id = '.$paket->paket_id.'
ORDER BY
    zminggu,
    zhari,
    zjam ASC

    ')->result();


foreach ($paket_detail as $key => $isiPaket) {
    $materi[] = $isiPaket->materi;
    $hari[] = $isiPaket->zhari;
    $jam[] = $isiPaket->zjam;
    $tanggal[] = $isiPaket->hari;
    $minggu[] = $isiPaket->minggu_id;
}

for ($j=0; $j < count($paket_detail); $j++) { 
    $totalMateri[] = count(json_decode($materi[$j]));
}

var_dump($materi);


$namaHari = array( 'H1'=>'SENIN', 'H2'=>'SELASA', 'H3'=>'RABU', 'H4'=>'KAMIS', 'H5'=>'JUMAT');



$dapatkanCodeInstruktor = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran WHERE id = ".$id_datapembelajaran." ");
$dapatkanCodeInstruktor = $dapatkanCodeInstruktor->instruktur_id;
$dapatkanInstruktor = $this->M_session->select_row("SELECT * FROM blk_instruktur WHERE id_instruktur = ".$dapatkanCodeInstruktor."");
$idInstruktor = $dapatkanInstruktor->kode_instruktur;
$namaInstruktor = $dapatkanInstruktor->nama;



// mengambil tanggal --------------------------------------------------------------------------------------------//

$ambil_tanggal_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id_datapembelajaran."'");
$ambil_tanggal_data = $ambil_tanggal_data->tanggal;



// phpscript --------------------------------------------------------------------------------------------------//

// perulangan untuk table -----------------------------------------------------------------//



for ($ulangTable = 0; $ulangTable < count($paket_detail) ; $ulangTable++) { 


$isiArray = json_decode($materi[$ulangTable], true);
// var_dump($isiArray);

// var_dump($ambil_tanggal_data);
if ($minggu[$ulangTable] == 1) {
    $plusHari = 0;
}else{
    $plusHari = 7;
}
$tambahkanTanggal = date('Y-m-d', strtotime('+'.((($tanggal[$ulangTable])-1)+$plusHari).' days', strtotime($ambil_tanggal_data)));




// New portrait section
$section = $PHPWord->createSection($ulangTable);

// add tatble 1 -----------------------------------------------------------------------------//

// judul table ------------------------------------------------------------------------------//
$section->addText(strtoupper($title->nama_paket).' '.strtoupper($ambil_minggu).' '.strtoupper($ambil_jam), array('bold'=> true,'name'=>'Verdana', 'color'=>'333333'));


// Add table
$table = $section->addTable('table1');

// Add row
$table->addRow(50);

// Add cells
$table->addCell(1000, $styleCell)->addText('HARI', $fontStyle);
$table->addCell(1000, $styleCell)->addText('TGL', $fontStyle);
$table->addCell(1500, $styleCell)->addText('GURU', $fontStyle);
$table->addCell(500, $styleCell)->addText('', $fontStyle);
$table->addCell(8000, $styleCell)->addText('MATERI', $fontStyle);
$table->addCell(1000, $styleCell)->addText('T/P/S', $fontStyle);
$table->addCell(1000, $styleCell)->addText('BUKU HLM', $fontStyle);



// Add more rows / cells
for($i = 0; $i < count($isiArray); $i++) {


    $dataMateri = $this->M_session->select_row('SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id = '.$isiArray[$i].' ');
    $MateriCode = $dataMateri->kode;
    $MateriNama = $dataMateri->materi;
    $MateriBuku = $dataMateri->buku_hal;
    $MateriKeterangan = $dataMateri->keterangan;

    $table->addRow(50);
    $table->addCell(1000)->addText($hari[$ulangTable].' '.$namaHari[$hari[$ulangTable]], $fontStyle);
    $table->addCell(1000)->addText($tambahkanTanggal, $fontStyle);
    $table->addCell(1500)->addText($idInstruktor.'-'.$namaInstruktor, $fontStyle);
    $table->addCell(500)->addText(($i+1), $fontStyle);
    $table->addCell(8000)->addText($MateriCode.' - '.$MateriNama, $fontStyle);
    $table->addCell(1000)->addText($MateriBuku, $fontStyle);
    $table->addCell(1000)->addText($MateriKeterangan, $fontStyle);

}
// ------------------------------------------oooo-----------------------------//


// Add table 2 --------------------------------------------------------------//

$table = $section->addTable('table2');

// Add row
$table->addRow(50);

// Add cells
$table->addCell(1000, $styleCell)->addText('NO', $fontStyle);
$table->addCell(7000, $styleCell)->addText('ID-NAMA', $fontStyle);
$table->addCell(500, $styleCell)->addText('KM', $fontStyle);
$table->addCell(500, $styleCell)->addText('T', $fontStyle);
$table->addCell(500, $styleCell)->addText('P', $fontStyle);
$table->addCell(500, $styleCell)->addText('KM', $fontStyle);
$table->addCell(500, $styleCell)->addText('T', $fontStyle);
$table->addCell(500, $styleCell)->addText('P', $fontStyle);
$table->addCell(500, $styleCell)->addText('KM', $fontStyle);
$table->addCell(500, $styleCell)->addText('T', $fontStyle);
$table->addCell(500, $styleCell)->addText('P', $fontStyle);
$table->addCell(500, $styleCell)->addText('KM', $fontStyle);
$table->addCell(500, $styleCell)->addText('T', $fontStyle);
$table->addCell(500, $styleCell)->addText('P', $fontStyle);

// Add more rows / cells

$dapatkanSiswa = $this->db->query('SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id = '.$id_datapembelajaran.' ')->result();
$no = 1;
foreach ($dapatkanSiswa as $key => $value) {
    $dataSiswa = $this->M_session->select_row('SELECT * FROM personalblk WHERE nodaftar = "'.$value->id_biodata.'"');
    $namaSiswa = $dataSiswa->nama;


    $table->addRow(50);
    $table->addCell(1000)->addText($no, $fontStyle);
    $table->addCell(7000)->addText($value->id_biodata.' - '.$namaSiswa, $fontStyle);
    $table->addCell(500)->addText("" ,$fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);
    $table->addCell(500)->addText("", $fontStyle);

    $no++;

}
// ------------------------------------------oooo--------------------------------//


}


// ------------------------- end of perulangan table ----------------------------//




// Save File
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('files/deco.docx');

$fileName = basename('deco.docx');
$filePath = 'files/'.$fileName;

if (!empty($fileName) && file_exists($filePath)) {
    // define header
    header('Cache-Control: public');    
    header('Content-Describtion: File Transfer');    
    header('Content-Disposition: attachment; filename='.basename($fileName));    
    header('Content-TYpe: application/zip');
    header('Content-Transfer-Encoding: binary');    
    
    // read file
    readfile($filePath);
    exit;
}else{
    echo 'file not axist.';
}
}


function print_satu_paket($id_datapembelajaran, $id_pil_hari){


// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$header = array('size' => 10, 'bold' => true);

// 1. Basic table

// script php untuk title

$title = $this->M_session->select_row("SELECT
    *
FROM
    blk_jadwal3_datapembelajaran
JOIN blk_jadwal3_paket ON blk_jadwal3_datapembelajaran.paket_id = blk_jadwal3_paket.id
WHERE
    blk_jadwal3_datapembelajaran.id = ".$id_datapembelajaran.""
);

$paket = $this->M_session->select_row('select * from blk_jadwal3_paket_detail WHERE id = '.$id_pil_hari.'');

$ambil_minggus = $this->M_session->select_row("SELECT * FROM blk_jadwal3_setting_minggu where id='".$paket->minggu_id."'");
        $ambil_minggu = "";
        if ( $ambil_minggus != NULL )
        {
            $ambil_minggu = $ambil_minggus->minggu;
        }

$ambil_jam1         = $this->M_session->select_row("SELECT * FROM blk_jam where id_jam='".$paket->jam."'");
        $ambil_jam = "";
        if ( $ambil_jam1 != NULL )
        {
            $ambil_jam = $ambil_jam1->jam;
        }

$paket_detail = $this->db->query('
    SELECT
    blk_jadwal3_paket_detail.*, blk_jadwal3_setting_minggu.minggu AS zminggu,
    blk_hari.kode_hari AS zhari,
    blk_jam.kode_jam AS zjam
FROM
    blk_jadwal3_paket_detail
LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id = blk_jadwal3_setting_minggu.id
LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari = blk_hari.id_hari
LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam = blk_jam.id_jam
WHERE
    paket_id = '.$paket->paket_id.'
ORDER BY
    zminggu,
    zhari,
    zjam ASC

    ')->result();

$dapatkanCodeInstruktor = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran WHERE id = ".$id_datapembelajaran." ");
$dapatkanCodeInstruktor = $dapatkanCodeInstruktor->instruktur_id;
$dapatkanInstruktor = $this->M_session->select_row("SELECT * FROM blk_instruktur WHERE id_instruktur = ".$dapatkanCodeInstruktor."");
$idInstruktor = $dapatkanInstruktor->kode_instruktur;
$namaInstruktor = $dapatkanInstruktor->nama;


foreach ($paket_detail as $key => $isiPaket) {
    $materi[] = $isiPaket->materi;
    $hari[] = $isiPaket->zhari;
    $jam[] = $isiPaket->zjam;
    $tanggal[] = $isiPaket->hari;
    $minggu[] = $isiPaket->minggu_id;
}

for ($i=0; $i < count($materi); $i++) { 
    $jumlahMateri[] = count(json_decode($materi[$i]));
}

$this->load->helper('ggs');

for ($l=0; $l < count($jumlahMateri); $l++) { 
    $k[] = buat_array($jumlahMateri[$l]);
}


for ($o=0; $o < count($k); $o++) { 
    $t[] = bagi($k[$o][0]);
}

// var_dump(count($t[1]));

$r[2] = array('1','2','3','4');

// var_dump($t);

$kosong = '';
// mengambil tanggal --------------------------------------------------------------------------------------------//

$ambil_tanggal_data = $this->M_session->select_row("SELECT * FROM blk_jadwal3_datapembelajaran where id='".$id_datapembelajaran."'");
$ambil_tanggal_data = $ambil_tanggal_data->tanggal;


$namaHari = array( 'H1'=>'SENIN', 'H2'=>'SELASA', 'H3'=>'RABU', 'H4'=>'KAMIS', 'H5'=>'JUMAT');



    // var_dump($paket_detail[0]);



$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '999999');
$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
$cellRowSpan2 = array('vMerge' => 'restart', 'valign' => 'center');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$cellVCentered = array('valign' => 'center');
$cellVCenteredSingle = array('valign' => 'center', 'bgColor' => 'FFFF00', 'cellMargin'=> 0);
$spanTableStyleName = 'Colspan Rowspan';
$tableHeader = 'Header';
$tableIsi = 'ISI';
$tableIsi2 = 'ISI2';
$tableIsi3 = 'ISI3';
$fontsetting = array('size' => 7);
$fontsetting2 = array('size' => 7);

for ($ulangTable = 0; $ulangTable < count($paket_detail) ; $ulangTable++) { 



$isiArray = json_decode($materi[$ulangTable], true); 


if ($minggu[$ulangTable] == 1) {
    $plusHari = 0;
}else{
    $plusHari = 7;
}
$tambahkanTanggal = date('Y-m-d', strtotime('+'.((($tanggal[$ulangTable])-1)+$plusHari).' days', strtotime($ambil_tanggal_data)));

$section = $phpWord->createSection($ulangTable);

$section->addText(strtoupper($title->nama_paket).' '.strtoupper($ambil_minggu).' '.strtoupper($ambil_jam), $header);

$phpWord->addTableStyle($tableHeader, $fancyTableStyle);
$table = $section->addTable($tableHeader);
$table->addRow();
$table->addCell(1500, $cellVCenteredSingle)->addText('HARI', $fontsetting, $cellHCentered);
$table->addCell(1500, $cellVCenteredSingle)->addText('TGL', $fontsetting, $cellHCentered);
$table->addCell(2000, $cellVCenteredSingle)->addText('GURU', $fontsetting, $cellHCentered);
$table->addCell(500, $cellVCenteredSingle)->addText('', $fontsetting, $cellHCentered);
$table->addCell(7000, $cellVCenteredSingle)->addText('MATERI', $fontsetting, $cellHCentered);
$table->addCell(1000, $cellVCenteredSingle)->addText('T/P/S', $fontsetting, $cellHCentered);
$table->addCell(1000, $cellVCenteredSingle)->addText('BUKU'.'<w:br/>'.'HLM', $fontsetting, $cellHCentered);

// --------------


$table->addRow();
    // var_dump($data[$i]);
$table->addCell(1500, $cellRowSpan2)->addText($paket_detail[$ulangTable]->zhari.'<w:br/>'.$namaHari[$paket_detail[$ulangTable]->zhari], $fontsetting2, $cellHCentered);
$table->addCell(1500, $cellRowSpan2)->addText($tambahkanTanggal, $fontsetting2, $cellHCentered);
$table->addCell(2000, $cellRowSpan2)->addText($idInstruktor.'<w:br/>'.$namaInstruktor, $fontsetting2, $cellHCentered);
$table->addCell(500, $cellVCentered)->addText('0', $fontsetting2, $cellHCentered);

$dataMateri = $this->M_session->select_row('SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id = '.$isiArray[0].' ');


$table->addCell(7000, $cellVCentered)->addText($dataMateri->kode.' - '.$dataMateri->materi, $fontsetting2, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText($dataMateri->buku_hal, $fontsetting2, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText($dataMateri->keterangan, $fontsetting2, $cellHCentered);


if (count($isiArray) > 1) {



    for($i = 1; $i< count($isiArray); $i++){

    $dataMateri = $this->M_session->select_row('SELECT * FROM blk_jadwal3_pelajaran_materi WHERE id = '.$isiArray[$i].' ');
    $MateriCode = $dataMateri->kode;
    $MateriNama = $dataMateri->materi;
    $MateriBuku = $dataMateri->buku_hal;
    $MateriKeterangan = $dataMateri->keterangan;

    $table->addRow();
    $table->addCell(1500, $cellRowContinue);
    $table->addCell(1500, $cellRowContinue);
    $table->addCell(2000, $cellRowContinue);
    $table->addCell(500, $cellVCentered)->addText(($i), $fontsetting2, $cellHCentered);
    $table->addCell(7000, $cellVCentered)->addText($MateriCode.' '.$MateriNama, $fontsetting2, $cellHCentered);
    $table->addCell(1000, $cellVCentered)->addText($MateriBuku, $fontsetting2, $cellHCentered);
    $table->addCell(1000, $cellVCentered)->addText($MateriKeterangan, $fontsetting2, $cellHCentered);

    }

}else{

}

$phpWord->addTableStyle($tableIsi2, $fancyTableStyle);
$table = $section->addTable($tableIsi2);
$table->addRow();
    // var_dump($data[$i]);

$table->addCell(500, $cellVCenteredSingle)->addText("No", $fontsetting, $cellHCentered);
$table->addCell(4000, $cellVCenteredSingle)->addText("Id-Nama", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("KM", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("T", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("P", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("KM", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("T", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("P", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("KM", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("T", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("P", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("KM", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("T", $fontsetting, $cellHCentered);
$table->addCell(800, $cellVCenteredSingle)->addText("P", $fontsetting, $cellHCentered);



// var_dump($t[$ulangTable][0]);


// var_dump($dipakai);


$dapatkanSiswa = $this->db->query('SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id = '.$id_datapembelajaran.' AND deleted_at = "" ')->result();



for($inti = 0; $inti< count($dapatkanSiswa); $inti++){

$dataSiswa = $this->M_session->select_row('SELECT * FROM personalblk WHERE nodaftar = "'.$dapatkanSiswa[$inti]->id_biodata.'"');



$table->addRow();

if (isset($t[$ulangTable][0][0])!= null) {
    $aa = $t[$ulangTable][0][0];
}else{
    $aa = $kosong;
}

if (isset($t[$ulangTable][0][1])!= null) {
    $bb = $t[$ulangTable][0][1];
}else{
    $bb = $kosong;
}

if (isset($t[$ulangTable][0][2])!=null) {
    $cc = $t[$ulangTable][0][2];
}else{
    $cc = $kosong;
}
 
if (isset($t[$ulangTable][0][3])!=null) {
    $dd = $t[$ulangTable][0][3];
}else{
    $dd = $kosong;
}   

// var_dump($t);

$table->addCell(500, $cellRowSpan2)->addText(($inti+1), $fontsetting2, $cellHCentered);
$table->addCell(4000, $cellRowSpan2)->addText($dataSiswa->nodaftar.'<w:br/>'.$dataSiswa->nama, $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText($aa, $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText($bb, $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText($cc, $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText($dd, $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
$table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);


if (count($t[$ulangTable]) > 1 ) {


    for($x=1; $x < count($t[$ulangTable]); $x++ ){

        if (isset($t[$ulangTable][$x][0])!= null) {
            $aa = $t[$ulangTable][$x][0];
        }else{
            $aa = $kosong;
        }

        if (isset($t[$ulangTable][$x][1])!= null) {
            $bb = $t[$ulangTable][$x][1];
        }else{
            $bb = $kosong;
        }

        if (isset($t[$ulangTable][$x][2])!=null) {
            $cc = $t[$ulangTable][$x][2];
        }else{
            $cc = $kosong;
        }
         
        if (isset($t[$ulangTable][$x][3])!=null) {
            $dd = $t[$ulangTable][$x][3];
        }else{
            $dd = $kosong;
        } 

        $table->addRow();
        $table->addCell(null, $cellRowContinue);
        $table->addCell(null, $cellRowContinue);
        $table->addCell(800, $cellVCentered)->addText($aa, $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText($bb, $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText($cc, $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText($dd, $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
        $table->addCell(800, $cellVCentered)->addText("", $fontsetting2, $cellHCentered);
    }
}else{

}



}
}


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('files/helloWorld.docx');

// // Saving the document as ODF file...
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
// $objWriter->save('helloWorld.odt');

// // Saving the document as HTML file...
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
// $objWriter->save('helloWorld.html');



$fileName = basename('helloWorld.docx');
$filePath = 'files/'.$fileName;

if (!empty($fileName) && file_exists($filePath)) {
    // define header
    header('Cache-Control: public');    
    header('Content-Describtion: File Transfer');    
    header('Content-Disposition: attachment; filename='.basename($fileName));    
    header('Content-TYpe: application/zip');
    header('Content-Transfer-Encoding: binary');    
    
    // read file
    readfile($filePath);
    exit;
}else{
    echo 'file not axist.';
}


}


function tampil_yang_tidak_hadir(){

    $id_pil_hari = $_POST['idguava'];

    $paket = $this->M_session->select_row('select * from blk_jadwal3_paket_detail WHERE id = '.$id_pil_hari.'');

    $this->load->helper('ggs'); 

    $id = $_POST['guava'];

    $kotak_besar = $this->db->query("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id = ".$id." ")->result();

    $kotak_besar1 = $this->db->query("SELECT
        blk_jadwal3_paket_detail.*, blk_jadwal3_setting_minggu.minggu AS zminggu,
        blk_hari.kode_hari AS zhari,
        blk_jam.kode_jam AS zjam
    FROM
        blk_jadwal3_paket_detail
    LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id = blk_jadwal3_setting_minggu.id
    LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari = blk_hari.id_hari
    LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam = blk_jam.id_jam
    WHERE
        paket_id = ".$paket->paket_id."
    ORDER BY
        zminggu,
        zhari,
        zjam ASC
    ")->result();


    for ($i=0; $i < count($kotak_besar); $i++) { 
        # code...

    $y = json_decode($kotak_besar[$i]->detail);
    $no = 0;
    foreach ($y as $key => $k) {
        foreach ($k as $key => $l) {
            foreach ($l as $key => $p) {
                $lina[] = $p->tdk_hadir;
            }
        }
    }
    }

    // var_dump($kotak_besar);

    for ($i=0; $i < count($kotak_besar); $i++) { 
        # code...
       // var_dump($x);
    }
    // var_dump($lina);
    $angka = count($kotak_besar1);
    $data = bagi_bagi($lina, $angka);
    // var_dump($data);
    // var_dump($kotak_besar);
    // echo "<table border='1' cellpadding='10'>";
    // echo "
    // <tr>
    // <td>no</td>
    // <td>nama</td>
    // <td>tidak hadir</td>
    // </tr>
    // ";

    // foreach ($kotak_besar as $key => $nn) {
    //     var_dump($nn);
    // }



    // var_dump($data);

    // echo "</table>";
    // var_dump($data);

    // echo count($k);
    // var_dump($data);
    $text = '';
    $bio = '';
    // echo "<br>tidak hadir di isi 13 untuk menampilkan data bernilai tidal hadir<br>dan null untuk hadir<br><br>";
    for ($i=0; $i < count($kotak_besar1); $i++) { 
        $text .= $kotak_besar1[$i]->zhari.' ';
    }

    $text2 = '';
    for ($i=0; $i < count($kotak_besar); $i++) { 
        $text2 .= $text;
    }


    $q = $text2;
    $q = explode(" ",$q);
    $hasilnya = array_filter($q);

    // var_dump($hasilnya);



    $txt = '';

    for ($i=0; $i < count($kotak_besar); $i++) { 
        for ($j=0; $j < $angka; $j++) { 
            $txt .= $kotak_besar[$i]->id_biodata.',';
        }
    }

    $zz = $txt;
    $zz = explode(",",$zz);
    $zz = array_filter($zz);

    $response = '';
    for ($nilai=0; $nilai < count($zz); $nilai++) {
        $personal = $this->M_session->select_row('SELECT nama FROM personalblk WHERE nodaftar = "'.$zz[$nilai].'" ');
        if ($lina[$nilai] == null) {

        }else{
        $response .= '<tr><td>'.$zz[$nilai].'</td><td>'.$personal->nama.'</td><td>'.$hasilnya[$nilai]."</td></tr>";
        }
    }
    exit($response);
}


function print_tidak_masuk($id_pil_hari, $id){


    $paket = $this->M_session->select_row('select * from blk_jadwal3_paket_detail WHERE id = '.$id.'');
    // var_dump($paket->paket_id);

    $this->load->helper('ggs'); 

    // $id = $_POST['guava'];

    $kotak_besar = $this->db->query("SELECT * FROM blk_jadwal3_datapembelajaran_detail WHERE datapembelajaran_id = ".$id_pil_hari." ")->result();

    $kotak_besar1 = $this->db->query("SELECT
        blk_jadwal3_paket_detail.*, blk_jadwal3_setting_minggu.minggu AS zminggu,
        blk_hari.kode_hari AS zhari,
        blk_jam.kode_jam AS zjam
    FROM
        blk_jadwal3_paket_detail
    LEFT JOIN blk_jadwal3_setting_minggu ON blk_jadwal3_paket_detail.minggu_id = blk_jadwal3_setting_minggu.id
    LEFT JOIN blk_hari ON blk_jadwal3_paket_detail.hari = blk_hari.id_hari
    LEFT JOIN blk_jam ON blk_jadwal3_paket_detail.jam = blk_jam.id_jam
    WHERE
        paket_id = ".$paket->paket_id."
    ORDER BY
        zminggu,
        zhari,
        zjam ASC
    ")->result();


    for ($i=0; $i < count($kotak_besar); $i++) { 
        # code...

    $y = json_decode($kotak_besar[$i]->detail);
    $no = 0;
    foreach ($y as $key => $k) {
        foreach ($k as $key => $l) {
            foreach ($l as $key => $p) {
                $lina[] = $p->tdk_hadir;
            }
        }
    }
    }

    // var_dump($kotak_besar);

    for ($i=0; $i < count($kotak_besar); $i++) { 
        # code...
       // var_dump($x);
    }
    // var_dump($lina);
    $angka = count($kotak_besar1);
    $data = bagi_bagi($lina, $angka);
    // var_dump($data);
    // var_dump($kotak_besar);
    // echo "<table border='1' cellpadding='10'>";
    // echo "
    // <tr>
    // <td>no</td>
    // <td>nama</td>
    // <td>tidak hadir</td>
    // </tr>
    // ";

    // foreach ($kotak_besar as $key => $nn) {
    //     var_dump($nn);
    // }



    // var_dump($data);

    // echo "</table>";
    // var_dump($data);

    // echo count($k);
    // var_dump($data);
    $text = '';
    $bio = '';
    // echo "<br>tidak hadir di isi 13 untuk menampilkan data bernilai tidal hadir<br>dan null untuk hadir<br><br>";
    for ($i=0; $i < count($kotak_besar1); $i++) { 
        $text .= $kotak_besar1[$i]->zhari.' ';
    }

    $text2 = '';
    for ($i=0; $i < count($kotak_besar); $i++) { 
        $text2 .= $text;
    }


    $q = $text2;
    $q = explode(" ",$q);
    $hasilnya = array_filter($q);

    // var_dump($hasilnya);



    $txt = '';

    for ($i=0; $i < count($kotak_besar); $i++) { 
        for ($j=0; $j < $angka; $j++) { 
            $txt .= $kotak_besar[$i]->id_biodata.',';
        }
    }

    $zz = $txt;
    $zz = explode(",",$zz);
    $zz = array_filter($zz);

    $response = '';


    // Creating the new document...
    $header = array('size' => 10, 'bold' => true);
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();

    $section->addTextBreak(1);
    $section->addText('Data TKI Tidak Hadir Saat Pelatihan', $header);
    $fancyTableStyleName = 'Fancy Table';
    $fancyTableStyle = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
    $fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
    $fancyTableCellStyle = array('valign' => 'center');
    $fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
    $fancyTableFontStyle = array('bold' => true);
    $phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
    $table = $section->addTable($fancyTableStyleName);
    $table->addRow(900);
    $table->addCell(4000, $fancyTableCellStyle)->addText('ID', $fancyTableFontStyle);
    $table->addCell(4000, $fancyTableCellStyle)->addText('NAMA', $fancyTableFontStyle);
    $table->addCell(4000, $fancyTableCellStyle)->addText('HARI', $fancyTableFontStyle);
    
    for ($nilai=0; $nilai < count($zz); $nilai++) {
        $personal = $this->M_session->select_row('SELECT nama FROM personalblk WHERE nodaftar = "'.$zz[$nilai].'" ');
        if ($lina[$nilai] == null) {

        }else{
        $table->addRow();
        $table->addCell(4000)->addText($zz[$nilai]);
        $table->addCell(4000)->addText($personal->nama);
        $table->addCell(4000)->addText($hasilnya[$nilai]);
        }
    }
    
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('files/testing.docx');

    // // Saving the document as ODF file...
    // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
    // $objWriter->save('helloWorld.odt');

    // // Saving the document as HTML file...
    // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
    // $objWriter->save('helloWorld.html');



    $fileName = basename('testing.docx');
    $filePath = 'files/'.$fileName;

    if (!empty($fileName) && file_exists($filePath)) {
        // define header
        header('Cache-Control: public');    
        header('Content-Describtion: File Transfer');    
        header('Content-Disposition: attachment; filename='.basename($fileName));    
        header('Content-TYpe: application/zip');
        header('Content-Transfer-Encoding: binary');    
        
        // read file
        readfile($filePath);
        exit;
    }else{
        echo 'file not axist.';
    }

}

}
