<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Majikan_tambah_tki extends MX_Controller{
    public function __construct(){
            parent::__construct();
            $this->load->model('modelku');           
            $this->load->model('M_session'); 
    }
    
    function majikan_tki($idmajikan = '0001'){
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']){
            //user belum login
            $data['namamodule'] = "login";
            $data['namafileview'] = "login";
            echo Modules::run('template/login_template', $data);
        }
        else{
        $id_user = $session['session_userid'];
        $status = $session['session_status'];
            //user sudah login
            if ($id_user && $status==1){
            //user sudah login

                $zzz = $this->db->query("SELECT * FROM datamajikan WHERE id_majikan = $idmajikan ")->row();
                $data['nmagen'] = $this->modelku->ambildatamod($zzz->kode_agen, "nama", "dataagen", "id_agen", "*" );
                $data['nmgroup'] = $this->modelku->ambildatamod($zzz->kode_group, "nama", "datagroup", "id_group", "*" );
                $data['nmmajikan'] = $zzz->nama;
                $data['idagen'] = $this->modelku->ambildatamod($zzz->kode_agen, "id_agen", "dataagen", "id_agen", "*" );
                $data['idgroup'] = $this->modelku->ambildatamod($zzz->kode_group, "id_group", "datagroup", "id_group", "*" );
                $data['idmajikan'] = $idmajikan;


                $data['namamajikan'] = $zzz->nama;
                $data['namamajikanmandarin'] = $zzz->namamajikan;


                $data['namamodule'] = "majikan_tambah_tki";
                $data['namafileview'] = "pilih_pkl";
                echo Modules::run('template/new_admin_template', $data);
            }
        }
    }


    function tampilkan_distik_markabio($key = "")
    {
        $nilai_data = "";
        
        $data = $this->db->query("
            SELECT 
                distinct(id_biodata),
                tgl_to_agen,
                nama_agen,
                grup_to_agen,
                nama_pabrik,
                tgl_pauliu,
                tgl_inter,
                id_marka_bioagen
            FROM
                marka_biotoagen
            WHERE
                nama_pabrik = $key
            AND
                tgldilepas = ''
            ORDER BY
                id_biodata DESC
                ")->result();
                
        $no = 1;
        foreach ($data as $key => $value) {

            $nilai_data .= "

                <tr>
                    <td>".$no."</td>
                    <td>".$value->id_biodata."</td>
                    <td>".$value->tgl_to_agen."</td>
                    <td>".$value->tgl_pauliu."</td>
                    <td>".$value->tgl_inter."</td>
                    <td>
                        <button onclick='ubah(".$value->id_marka_bioagen.")' type='button' class='btn btn-info margin-5'>
                            Ubah
                        </button>
                        <button onclick='dilepas(".$value->id_marka_bioagen.")' type='button' class='btn btn-info margin-5'>
                            Dilepas
                        </button>
                    </td>
                </tr>

            ";

            $no++;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($nilai_data));
    }

    function ubah($id)
    {
        $data = $this->db->query("
            SELECT 
                *
            FROM
                marka_biotoagen
            WHERE
                id_marka_bioagen = $id
            ")->row_array();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

	public function select_tki()
	{
		$searchTerm = "";
		if ($this->input->get('searchTerm'))
		{
			$searchTerm = " WHERE a.id_biodata LIKE '%".$this->input->get('searchTerm')."%' ";
		}

		$q = $this->db->query("SELECT a.id_biodata
            FROM personal a 
            $searchTerm 
            ORDER BY a.id_biodata ASC")->result_array();

		$data = [];
		foreach($q as $val)
		{
			$data[] = array("id"=>$val['id_biodata'], "text"=>$val['id_biodata']);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

    public function addprocess()
    {
        $tki = $this->input->post('a2');
        foreach($tki as $v)
        {
            $data = [
                'id_biodata' => $v,
                'tgl_to_agen' => $this->input->post('a1'),
                'tgl_pauliu' => '',
                'tgl_inter' => '',
                'tgldilepas' => '',
                'grup_to_agen' => $this->input->post('a3'),
                'nama_agen' => $this->input->post('a4'),
                'nama_pabrik' => $this->input->post('a5'),
            ];
            $zx = $this->db->query("SELECT * FROM majikan WHERE id_biodata='".$v."'")->row();
            $data2 = [
                'id_biodata' => $v,
                'kode_group' => $this->input->post('a3'),
                'kode_agen' => $this->input->post('a4'),
                'kode_majikan' => $this->input->post('a5'),
            ];
            $this->db->insert('marka_biotoagen', $data);
            if($zx)
            {
                $this->db->where('id_majikan', $zx->id_majikan);
                $this->db->update('majikan', $data2);
            }
            else 
            {
                $this->db->insert('majikan', $data2);
            }
        }
		$this->output->set_content_type('application/json')->set_output(json_encode($tki));
    }

    public function editprocess()
    {
        $data = [
            'tgl_to_agen' => $this->input->post('a1'),
            'tgl_pauliu' => $this->input->post('a2'),
            'tgl_inter' => $this->input->post('a3'),
            
        ];
        $this->db->where('id_marka_bioagen', $this->input->post('id'));
        $this->db->update('marka_biotoagen', $data);

		$this->output->set_content_type('application/json')->set_output(json_encode([TRUE]));
    }

    public function dilepas($id)
    {
        $data = [
            'tgldilepas' => $this->input->post('a1'),
        ];
        $this->db->where('id_marka_bioagen', $this->input->post('id'));
        $this->db->update('marka_biotoagen', $data);

		$this->output->set_content_type('application/json')->set_output(json_encode([TRUE]));
    }

    public function get_lihat_dilepas($key = "")
    {
        $nilai_data = "";
        
        $data = $this->db->query("
            SELECT 
                distinct(id_biodata),
                tgl_to_agen,
                nama_agen,
                grup_to_agen,
                nama_pabrik,
                tgl_pauliu,
                tgl_inter,
                tgldilepas,
                id_marka_bioagen
            FROM
                marka_biotoagen
            WHERE
                nama_pabrik = $key
            AND
                tgldilepas != ''
            ORDER BY
                id_biodata ASC
                ")->result();
                
        $no = 1;
        foreach ($data as $key => $value) {

            $nilai_data .= "

                <tr>
                    <td>".$no."</td>
                    <td>".$value->id_biodata."</td>
                    <td>".$value->tgldilepas."</td>
                    <td>".$value->tgl_to_agen."</td>
                    <td>".$value->tgl_pauliu."</td>
                    <td>".$value->tgl_inter."</td>
                </tr>

            ";

            $no++;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($nilai_data));
    }

    public function tes1()
    {
        $majikan_ada = 0;
        $majikan_double = 0;
        $data_sama = 0;

        $data = $this->db->query("
                    SELECT *
                    FROM majikan
                    ORDER BY id_biodata ASC
                ")->result();
        $total = count($data);
        foreach ($data as $v)
        {
            $data2 = $this->db->query("
                    SELECT *,count(*) as count
                    FROM marka_biotoagen
                    WHERE id_biodata='".$v->id_biodata."'
                    ORDER BY id_biodata ASC
                ")->row();
            if ($data2->count == 1)
            {
                $majikan_ada += 1;
            }
            else if ($data2->count > 1)
            {
                $majikan_double += 1;
            }
        }
        echo $total.'<br/>'.$majikan_ada.'<br/>'.$majikan_double;
    }

    public function tes2()
    {
        
        $data = $this->db->query("
                    SELECT *
                    FROM majikan
                    ORDER BY id_biodata ASC
                ")->result();
        $d = [];
        $e = [];
        $f = [];
        $noo = 1673;
        foreach ($data as $v)
        {
            $data2 = $this->db->query("
                    SELECT *
                    FROM marka_biotoagen
                    WHERE id_biodata='".$v->id_biodata."'
                    AND tgldilepas = ''
                    ORDER BY id_marka_bioagen DESC
                ")->row();
            if ($data2)
            {
                if($v->kode_group != $data2->grup_to_agen)
                {
                    $d[$v->id_biodata]['grup'] = $v->kode_group.' != '.$data2->grup_to_agen;
                    if($v->kode_agen != $data2->nama_agen)
                    {
                        $d[$v->id_biodata]['agen'] = $v->kode_agen.' != '.$data2->nama_agen;
                        if($v->kode_majikan != $data2->nama_pabrik)
                        {
                            $d[$v->id_biodata]['majikan'] = $v->kode_majikan.' != '.$data2->nama_pabrik;
                        }
                    }
                }
                if($v->kode_group == $data2->grup_to_agen && $v->kode_agen == $data2->nama_agen && $v->kode_majikan != $data2->nama_pabrik)
                {
                    $f[$v->id_biodata] = [ 'nama_pabrik' => $v->kode_majikan ];
/*
                    $this->db->where('id_marka_bioagen', $data2->id_marka_bioagen);
                    $this->db->update('marka_biotoagen', $f[$v->id_biodata]);*/
                }

                
            }
            else 
            {
                $e[$v->id_biodata] = '';
                /*$e[$v->id_biodata] = [ 
                    'id_biodata' => $v->id_biodata,
                    'tgl_to_agen' => '',
                    'tgl_pauliu' => '',
                    'tgl_inter' => '',
                    'tgldilepas' => '',
                ];*/

                //$this->db->insert('marka_biotoagen', $e[$v->id_biodata]);

                $noo++;
            }
            
        }
        echo '<pre>';
        print_r($d);
        echo '=====================================================================================================';
        print_r($e);
        echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
        print_r($f);
    }


}