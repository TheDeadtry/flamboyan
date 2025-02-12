<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_psikolog extends MX_Controller{
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		}		
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index() {	

		$data['tampil_data_pmi'] = $this->M_session->select_custom("personalblk ORDER BY nodaftar ASC");

		$data['namamodule'] = "blk_psikolog";
		$data['namafileview'] = "blk_psikolog";
		echo Modules::run('template/blk_template', $data); 
	}

	function psikolog_show() 
	{
		$columns22 = array(
            'a.date_created','b.idbio','c.nama','d.nama'
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

		$where_dd 	= "";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd = "where ".$where;
		}

		$tampil_data = $this->M_session->select("SELECT a.id,b.idbio,c.nama as nama_hk,d.nama as nama_tw,a.date_created 
			from blk_psikolog a
			JOIN blk_psikolog_nilai b ON a.id=b.psikolog_id 
			JOIN personalblk c ON b.idbio=c.nodaftar 
			LEFT JOIN personal d ON b.idbio=d.id_biodata 
			$where_dd 
			order by id desc 
			$limit
		");

		$dataprev = array();
        $data2 	= array();
        $no 	= intval($_POST['start']);

        $prevVal = "";
	    foreach ($tampil_data as $row) 
	    {
	    	if ( $prevVal != $row->id )
	    	{
	    		$ambil_isi_data = $this->M_session->select('
	    			SELECT 
	    			a.idbio,
	    			c.nama as nama_hk,
	    			d.nama as nama_tw 
	    			FROM blk_psikolog_nilai a
					JOIN personalblk c ON a.idbio=c.nodaftar 
					LEFT JOIN personal d ON a.idbio=d.id_biodata  
					WHERE psikolog_id="'.$row->id.'"
				');

		    	$disnkbb = "";
	    		foreach ( $ambil_isi_data as $rew )
	    		{
	    			$isiz = $rew->idbio;

		    		$disnk 	 = "";

			    	$nama = $rew->nama_hk;
					$sektor_id = substr($isiz, 0, 2);
	    			if ( $sektor_id == 'MF' || $sektor_id == 'FF' || $sektor_id == 'MI' || $sektor_id == 'FI' || $sektor_id == 'JP' ) 
	    			{
		    			$nama = $rew->nama_tw;
			    	}

	    			$disnk = $isiz.' - '.$nama;

		    		$disnkbb .= $disnk.'<br/>';
	    		}

	         	$no++;
	            array_push($data2,
	                array(
	                    $no,
	                    '<a class="btn btn-xs bg-orange" target="_blank" href="'.site_url('blk_psikolog/cetaks/'.$row->id).'">PRINT</a> '.
            			'<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button> '.
            			'<button class="btn btn-xs bg-teal" onClick="modal_penilaian('.$row->id.')" >PENILAIAN</button> ',
	                    $disnkbb,
	                    $row->date_created
	                )
	            );
	    	}

	    	$prevVal = $row->id;
	    }
/*
		$prevValueHit = "";
	    foreach ($tampil_data as $row) 
	    {
	    	$idpsi = $row->id;

	    	$dataprev[]['btn'] = ;
			
			$sektor_id = substr($row->idbio, 0, 2);
			if ( $sektor_id == 'FF' || $sektor_id == 'FI' || $sektor_id == 'MF' || $sektor_id == 'MI' || $sektor_id == 'JP' )
			{
				$namafull = $row->nama_tw;
			}
			else 
			{
				$namafull = $row->nama_hk;
			}

	    	if ($prevValueHit == $row->id) 
	    	{
	    		$disnkbb .= $row->idbio." - ".$namafull;
	    	}
	    	else
	    	{
	    		$disnkbb = $row->idbio." - ".$namafull;
	    	}

	    	$prevValueHit = $row->id;
        }

*/

        $recordsFiltered 	= $this->M_session->select_count("blk_psikolog a
			JOIN blk_psikolog_nilai b ON a.id=b.psikolog_id 
			JOIN personalblk c ON b.idbio=c.nodaftar 
			LEFT JOIN personal d ON b.idbio=d.id_biodata 
			$where_dd
		");

        $recordsTotal 		= $this->M_session->select_count("blk_psikolog a
			JOIN blk_psikolog_nilai b ON a.id=b.psikolog_id 
			JOIN personalblk c ON b.idbio=c.nodaftar 
			LEFT JOIN personal d ON b.idbio=d.id_biodata
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

    function add_process() 
    {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$pmi = $this->input->post('pmi');
		$tgl = $this->input->post('tgl');
		
		$data = array(
			'date_created'			=> $tgl
		);
		$chck = $this->M_session->insert_return_id($data, 'blk_psikolog');

		if ( $chck != NULL ) 
		{
			$data2 = array();
			foreach ($pmi as $key => $value) {
				$data2[] = array(
					'psikolog_id' 	=> $chck,
					'idbio'			=> $value
				);
			}

			$ceking = $this->M_session->insert_batch($data2, 'blk_psikolog_nilai');

			if ( $ceking == TRUE )
			{
				$info['success'] = TRUE;
				$info['message'] = 'Sukses';
				$info['ids'] 	 = $chck;
			}
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
    }    

	function cetaks($id) 
	{
		$get_batch = $this->M_session->select_row("SELECT blk_psikolog.*,blk_psikolog_nilai.idbio,personalblk.nama as nama_hk, personal.nama as nama_tw FROM blk_psikolog 
			JOIN blk_psikolog_nilai ON blk_psikolog.id=blk_psikolog_nilai.psikolog_id 
			JOIN personalblk ON blk_psikolog_nilai.idbio=personalblk.nodaftar 
			LEFT JOIN personal ON blk_psikolog_nilai.idbio=personal.id_biodata 
			WHERE blk_psikolog.id='$id'");

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord 	= new PHPWord();
		$document 	= $PHPWord->loadTemplate('files/blk_psikolog.docx');

		$document->cloneRow('z_1', count($get_batch) );

		foreach ( $get_batch as $key => $row )
		{
			$no = $key+1;

			$sektor_id = substr($row->idbio, 0, 2);
			if ( $sektor_id == 'FF' || $sektor_id == 'FI' || $sektor_id == 'MF' || $sektor_id == 'MI' || $sektor_id == 'JP' )
			{
				$namafull = $row->nama_tw;
			}
			else 
			{
				$namafull = $row->nama_hk;
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

			$document->setValue( 'z_1#'.$no, $no );
			$document->setValue( 'z_2#'.$no, strtoupper( $row->idbio ) );
			$document->setValue( 'z_3#'.$no, strtoupper( $namafull ) );
			$document->setValue( 'z_4#'.$no, "");
		}

		$tanggalnow = date("d-m-Y", strtotime($get_batch->date_created));
		
		$filename = 'List PMI PSIKOLOG '.$tanggalnow.'.docx';

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

	function psikolog_nilai_show() 
	{
		$id2 = $this->input->post('id');
		$ambil_pmi = $this->M_session->select("
			SELECT 
			a.id,
			a.idbio,
			c.nama as nama_hk,
			d.nama as nama_tw,
			a.nilai
			FROM blk_psikolog_nilai a
			JOIN personalblk c ON a.idbio=c.nodaftar 
			LEFT JOIN personal d ON a.idbio=d.id_biodata   
			WHERE psikolog_id='$id2'
		");

        $data2 	= "";
        $no 	= 1;
	    foreach ( $ambil_pmi as $row ) 
	    {
			$id = substr($row->idbio, 0, 2);

	    	$nama = $row->nama_hk;
			if ( $id == 'MF' || $id == 'FF' || $id == 'MI' || $id == 'FI' || $id == 'JP' ) 
			{
    			$nama = $row->nama_tw;
	    	}

	    	$data2 .= "<tr>";
	    	$data2 .= "<td width='8%'>".$no."</td>";
	    	$data2 .= "<td width='20%'>
	    					<input type='hidden' name='idpsi[]' value='".$row->id."' />
	    					<input type='hidden' name='idbio[]' value='".$row->idbio."' />".$row->idbio." - ".$nama.
	    				"</td>";
	    	$data2 .= '<td style="padding:0px" width="72%" height="300px">
				            <div style="height:100% !important">
				                <textarea name="textareanilai[]" style="resize:none; height:100% !important; width:100% !important" data-ng-model="modelLogin.inpMtext">'.$row->nilai.'</textarea>
				            </div>
				        </td>';
	    	$data2 .= "</tr>";

            $no++;
        }

		$this->output->set_content_type('application/json')->set_output(json_encode($data2));
	}   

	function psikolog_nilai_ubah()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$id_psikolog	= $this->input->post("id_psikolog");
		$id_psi			= $this->input->post("idpsi");
		$idbio 			= $this->input->post("idbio");
		$textareanilai 	= $this->input->post("textareanilai");

		for ( $x=0; $x<count($idbio); $x++ )
		{
			$a0 = $id_psi[$x];
			$a1 = $idbio[$x];
			$a2 = $textareanilai[$x];

			$blk_psikolog = $this->M_session->select_row("SELECT * FROM blk_psikolog_nilai WHERE id='".$a0."'");

			$data3z = array(
				'nilai' 		=> $a2
			);

			if ( $blk_psikolog == NULL )
			{
				$chck = $this->M_session->insert($data3z, 'blk_psikolog_nilai');
			}
			else
			{
				$chck = $this->M_session->update($data3z, 'blk_psikolog_nilai', $a0, 'id');
			}

			if ( $chck == TRUE ) {
				$info['success'] = TRUE;
				$info['message'] = $chck;
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($info));
	}

	function psikolog_ubah_data($id)
	{
		$data_psikolog = $this->M_session->select_row("SELECT * FROM blk_psikolog WHERE id='$id'");

		$data_nilai = $this->M_session->select("SELECT * FROM blk_psikolog_nilai WHERE psikolog_id='".$id."'");

		$idbio = array();
		foreach ( $data_nilai as $roq )
		{
			$idbio[] = $roq->idbio;
		}

		$data = array (
			'tgl' => substr( $data_psikolog->date_created, 0, 10 ),
			'pmi' => $idbio
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function psikolog_ubah_data_process()
	{
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		$id	= $this->input->post("id");
		$tgl = $this->input->post("tgl");
		$pmi = $this->input->post('pmi');


		$data333 = array(
			'date_created'	=> $tgl,
		);

		$chck = $this->M_session->update($data333, 'blk_psikolog', $id, 'id');

		if ( $chck == TRUE ) 
		{
			foreach ($pmi as $ruw)
			{
				$ambil_id = $this->M_session->select_row("SELECT * FROM blk_psikolog_nilai where idbio='$ruw' and psikolog_id='$id'");

				$data334 = array(
					'idbio' => $ruw
				);

				if ( $ambil_id != NULL )
				{
					$this->M_session->update($data334, 'blk_psikolog_nilai', $ambil_id->id, 'id');
				}
				else
				{
					$data334['psikolog_id'] = $id;
					$this->M_session->insert($data334, 'blk_psikolog_nilai');
				}
			}

			$info['success'] = TRUE;
			$info['message'] = $chck;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($info));
	}

	function test1()
	{
		$data = $this->M_session->select("SELECT * FROM personalblk222");

		$dataxxx = array();
		foreach ($data as $key => $value) 
		{
			$dataxxx[] = array (
				'id_personalblk' => $value->id_personalblk,
				'nodaftar' => $value->nodaftar
			);
		}

		$this->M_session->update_batch($dataxxx, "personalblk", "id_personalblk");
	}

}