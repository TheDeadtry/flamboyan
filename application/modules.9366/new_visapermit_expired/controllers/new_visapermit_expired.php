<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_visapermit_expired extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}

	// ====================== DATABIO ============================ //
	
	function index()
	{
		$data['namamodule'] 	= "new_visapermit_expired";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/new_admin_template', $data);
	}

	function show_data()
	{/*
		$bulan = sprintf('%02d', $this->input->post('bulan'));
        $tahun = $this->input->post('tahun');*/
        $tgl_sekarang = $this->input->post('tanggal_sekarang');

        $tgl_sekarang_rep = str_replace(".", "-", $tgl_sekarang);

        $columns22 = array(
			'datasuhan.no_suhan',
			'datavisapermit.no_visapermit',
			'datagroup.nama',
			'dataagen.nama',
			'datamajikan.nama',
            'datavisapermit.tglexpvs'
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

        //$where_dd   = "where ".$where.' and tglexpvs != "" and Month(tglexpvs) >= '.$bulan.' && YEAR(tglexpvs) >= '.$tahun;
        $where_dd   = "where ".$where.' and tglexpvs != "" and tglexpvs >= "'.$tgl_sekarang.'"';
        $limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

        $ambiltki = $this->M_session->select("
        	SELECT datavisapermit.*,
	   		dataagen.nama as namaagen,
	   		datamajikan.nama as namamajikannya,
	   		datagroup.nama as namagroupnya,
	   		datasuhan.no_suhan,
	   		( SELECT count(*) from majikan 
				LEFT JOIN personal ON personal.id_biodata = majikan.id_biodata 
		        LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
				where majikan.kode_visapermit = datavisapermit.id_visapermit ) as total_pmi
			FROM datavisapermit 
			LEFT JOIN datamajikan 
			ON datavisapermit.id_majikan=datamajikan.id_majikan 
			LEFT JOIN dataagen 
			ON datavisapermit.id_agen=dataagen.id_agen
			LEFT JOIN datagroup
			ON datavisapermit.id_group=datagroup.id_group
			LEFT JOIN datasuhan
			ON datavisapermit.id_suhan=datasuhan.id_suhan 
			$where_dd 
			order by tglexpvs asc
			$limit
		");

        $data2  = array();
        $no     = intval($_POST['start']);
        foreach ($ambiltki as $row) {

        	$tglexpvs_rep = str_replace(".", "-", $row->tglexpvs);
        	$diff = strtotime($tglexpvs_rep) - strtotime($tgl_sekarang_rep);
        	$countdown_expired = floor($diff / (60 * 60 * 24));

            $ccc = "H-".$countdown_expired;
        	if ( $countdown_expired == 0 )
        	{
        		$ccc = "EXPIRED!";
        	}

            $no++;
            array_push($data2,
                array(
                	$no,
                	$row->total_pmi,
                    $row->tglexpvs,
                    $row->no_visapermit,
                    $row->no_suhan,
                    $row->namamajikannya,
                    $row->namaagen,
                    $row->namagroupnya,
                    $ccc
                )
            );
        }

        $recordsFiltered = $this->M_session->select_count("
        	datavisapermit 
			LEFT JOIN datamajikan 
			ON datavisapermit.id_majikan=datamajikan.id_majikan 
			LEFT JOIN dataagen 
			ON datavisapermit.id_agen=dataagen.id_agen
			LEFT JOIN datagroup
			ON datavisapermit.id_group=datagroup.id_group
			LEFT JOIN datasuhan
			ON datavisapermit.id_suhan=datasuhan.id_suhan 
			$where_dd
	   	");

        $recordsTotal = $this->M_session->select_count("
        	datavisapermit 
			LEFT JOIN datamajikan 
			ON datavisapermit.id_majikan=datamajikan.id_majikan 
			LEFT JOIN dataagen 
			ON datavisapermit.id_agen=dataagen.id_agen
			LEFT JOIN datagroup
			ON datavisapermit.id_group=datagroup.id_group
			LEFT JOIN datasuhan
			ON datavisapermit.id_suhan=datasuhan.id_suhan 
	   	");

        $r = array(
            "draw"            => isset ( $request['draw'] ) ? intval( $request['draw'] ) : 0,
            "recordsTotal"    => intval( $recordsTotal ),
            "recordsFiltered" => intval( $recordsFiltered ),
            "data"            => $data2
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($r));
	}

}