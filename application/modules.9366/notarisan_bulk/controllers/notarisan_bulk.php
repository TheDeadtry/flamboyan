<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class notarisan_bulk extends MX_Controller{
	
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');
	}

	public function index() {
		$data['tampil_data_pmi'] = $this->M_session->select_custom("personal ORDER BY id_biodata ASC");
		$data['namamodule'] 	= "notarisan_bulk";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/new_admin_template',$data);
	}

	public function show() {
		$columns22 = array(
            'b.id_biodata','b.nama'
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

		$where_dd 	= "WHERE ";
		$limit 		= "LIMIT ".intval($_POST['start']).", ".intval($_POST['length']);

		if ($where != NULL) {
			$where_dd .= $where;
		}

		$tampil_data = $this->M_session->select("SELECT 
            distinct(a.id_biodata) as id_biodata,
			a.id_notarisan as id,
            a.tgl_nota,
            a.nama_nota,
            a.hub_nota,
            a.notelp,
            a.khusus_nota,
            b.nama
			from notarisan a
			JOIN personal b ON a.id_biodata=b.id_biodata 
			$where_dd 
			order by tgl_nota desc 
			$limit
		");

        $data2 	= array();
        $no 	= intval($_POST['start']);
	    foreach ($tampil_data as $row) 
	    {
			$no++;
			array_push($data2,
				array(
					$no,
					'<a class="btn btn-xs bg-teal" target="_blank" href="'.site_url('notarisan_bulk/uploaddokumen/'.$row->id_biodata).'">UPLOAD</a> '."\n".
					'<button class="btn btn-xs bg-success" onClick="modal_ubah('.$row->id.')"  >UBAH</button> '."\n".
					'<button class="btn btn-xs bg-danger" onClick="modal_hapus('.$row->id.')" >HAPUS</button> ',
					$row->tgl_nota,
					$row->id_biodata.' - '.$row->nama,
					$row->nama_nota,
					$row->notelp,
					$row->hub_nota,
					$row->khusus_nota,
				)
			);
	    }

        $recordsFiltered 	= $this->M_session->select_count("notarisan a
            JOIN personal b ON a.id_biodata=b.id_biodata 
			$where_dd
		");

        $recordsTotal 		= $this->M_session->select_count("notarisan a
            JOIN personal b ON a.id_biodata=b.id_biodata  
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
	public function add($id) {
		$data['tampil_data_pmi'] = $this->M_session->select("SELECT personal.nama,personal.id_biodata FROM personal 
		LEFT JOIN notarisan ON personal.id_biodata=notarisan.id_biodata
		WHERE notarisan.id_biodata IS NULL 
        ORDER BY personal.id_biodata ASC");
		$data['namamodule'] 	= "notarisan_bulk";
		$data['namafileview'] 	= "add";
		echo Modules::run('template/new_admin_template',$data);
	}
	public function add_addRow() {
        $a = $this->input->post('pmi');
        $b = $this->input->post('tgl');
        $html = '';
        foreach ($a as $k => $v) {
            $html .= '
                <tr>
                    <td max-width="100%">
                        '.($k+1).'
                    </td>
                    <td max-width="100%">
                        <input type="hidden" name="pmi2[]" class="df" value="'.$v.'"/>
                        <button class="btn btn-danger btnhapusrow" data-id='.$k.'>HAPUS</button>
                    </td>
                    <td max-width="100%">
                        <input type="text" class="form-control" value="'.$v.'" readonly/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="tanggal[]" class="df form-control" value="'.$b.'" readonly/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="nama[]" class="df form-control"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="nomor[]" class="df form-control"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="hub[]" class="df form-control"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="khusus[]" class="df form-control"/>
                    </td>
                </tr>
            ';
        }
        $html .= '
            <tr>
                <td colspan="8"><button type="button" class="btn btn-primary btn-block" id="dkrhsave">Simpan Semua</button></td>
            </tr>
        ';
		$this->output->set_content_type('application/json')->set_output(json_encode($html));
	}
	public function add_save() {

        $tgl = $this->input->post('tanggal');
        $pmi = $this->input->post('pmi2');
        $nama = $this->input->post('nama');
        $nomor = $this->input->post('nomor');
        $hub = $this->input->post('hub');
        $khusus = $this->input->post('khusus');

        foreach($pmi as $k => $v) {
            $data = [
                'tgl_nota' => $tgl[$k],
                'id_biodata' => $pmi[$k],
                'nama_nota' => $nama[$k],
                'notelp' => $nomor[$k],
                'hub_nota' => $hub[$k],
                'khusus_nota' => $khusus[$k],
			];
			$this->M_session->insert($data, 'notarisan');
        }
		
		$tt['success'] = 'sukses';
		$this->output->set_content_type('application/json')->set_output(json_encode($tt));
    }

	public function edit($id) {
		$data = $this->M_session->select_row("SELECT * FROM notarisan WHERE id_notarisan='$id'");
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update() {
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';
		
		$id = $this->input->post('id');
		$data = array(
			'id_biodata' => $this->input->post('pmi'),
			'nama_nota' => $this->input->post('nama'),
			'notelp' => $this->input->post('nomor'),
			'hub_nota' => $this->input->post('hub'),
			'khusus_nota' => $this->input->post('khusus'),
		);
		
		if ($this->M_session->update($data, 'notarisan',$id,'id_notarisan')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}

    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function delete() {
		$id = $this->input->post('id');
		$info['success'] = FALSE;
		$info['message'] = 'Terjadi Kesalahan...';

		if ($this->M_session->delete('notarisan',$id,'id_notarisan')) 
		{
			$info['success'] = TRUE;
			$info['message'] = 'Sukses';
		}
    	$this->output->set_content_type('application/json')->set_output(json_encode( $info ));
	}

	public function printform() {
		$data['tampil_data_pmi'] = $this->M_session->select("SELECT distinct(tgl_nota) FROM notarisan ORDER BY id_biodata ASC");
		$data['namamodule'] 	= "notarisan_bulk";
		$data['namafileview'] 	= "printform";
		echo Modules::run('template/new_admin_template',$data);
	}

	public function printformprocess() {
		$this->load->library('Pdf');

		$tgl = $this->input->post('tgl');
		$type = $this->input->post('type');
		if ($type == 'formal') {
			$where = 'WHERE (a.id_biodata LIKE "MF-%" || a.id_biodata LIKE "FF-%" || a.id_biodata LIKE "JP-%") && tgl_nota="'.$tgl.'" ';
		} else if ($type == 'informal') {
			$where = 'WHERE (a.id_biodata LIKE "MI-%" || a.id_biodata LIKE "FI-%") && tgl_nota="'.$tgl.'" ';
		}
		$query = "SELECT 
			a.*,
			b.nama 
			FROM notarisan a
			LEFT JOIN personal b ON b.id_biodata=a.id_biodata
			".$where."
		";
		$tampil_data = $this->M_session->select($query);
		$tampildata='';
		$no=1;
		foreach($tampil_data as $row) {	
			$tampildata.='<tr nobr="true">
				  <td> '.$row->id_biodata.'</td>
				  <td> '.$row->nama.'</td>
				  <td> '.$row->tgl_nota.'</td>
				  <td> '.$row->nama_nota.'</td>
				  <td> '.$row->hub_nota.'</td>
				  <td> '.$row->notelp.'</td>
				  <td> '.$row->khusus_nota.'</td>
				</tr>';
		  	$no++;       
		}
		//print_r($tampildata);
		
		// create new PDF document
		$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('PT FLAMBOYAN GEMAJASA');
		$pdf->SetTitle('IM');
		$pdf->SetSubject('Data Notarisan dengan kriteria Tanggal dan Sektor');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->setFooterData(array(0,64,0), array(0,64,128)); 
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
		// set margins
		  $pdf->SetMargins(10, 20, 10);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}   
		$pdf->setFontSubsetting(true);   
		$pdf->SetFont('simsun', '', '8', '', false);   
		$pdf->AddPage(); 
			
		$html = '<p align="center">Data Notarisan Tanggal '.$tgl.' dengan Sektor '.strtoupper($type).' </p>
			<br>
			<table width="100%" cellspacing="0" cellpadding="2" border="1">
				<tr>
					<th align="center" rowspan="2">ID Biodata</th>
					<th align="center" rowspan="2">Nama TKI</th>
					<th align="center" colspan="5">Data Notarisan</th>
				</tr>
				<tr>
					<th align="center">Tanggal Notarisan</th>
					<th align="center">Nama Notarisan</th>
					<th align="center">Hubungan Notarisan</th>
					<th align="center">No Telp</th>
					<th align="center">Khusus</th>
				</tr>
				'.$tampildata.'
			</table>';
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
		$pdf->Output('example_001.pdf', 'I');    
	}

	
	public function belum($id) {
		$data['tampil_data_pmi'] = $this->M_session->select("SELECT personal.nama,personal.id_biodata FROM personal 
		LEFT JOIN notarisan ON personal.id_biodata=notarisan.id_biodata
		WHERE notarisan.id_biodata IS NULL 
        ORDER BY personal.id_biodata ASC");
		$data['namamodule'] 	= "notarisan_bulk";
		$data['namafileview'] 	= "belum";
		echo Modules::run('template/new_admin_template',$data);
	}
	public function belumdata() {
		$data = $this->M_session->select("SELECT personal.nama,personal.id_biodata FROM personal 
		LEFT JOIN notarisan ON personal.id_biodata=notarisan.id_biodata
		WHERE notarisan.id_biodata IS NULL 
        ORDER BY personal.id_personal DESC ");

        $html = '';
        foreach ($data as $k => $v) {
            $html .= '
                <tr class="idrow-'.$v->id_biodata.'">
                    <td max-width="100%">
                        '.($k+1).'
                    </td>
                    <td max-width="100%">
                        <input type="hidden" name="pmix" class="df pmix-'.$v->id_biodata.'" value="'.$v->id_biodata.'"/>
						'.$v->id_biodata.' - '.$v->nama.'
                    </td>
                    <td max-width="100%">
                        <input type="text" name="tanggal" class="df form-control tgl-'.$v->id_biodata.'"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="nama" class="df form-control nama-'.$v->id_biodata.'"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="nomor" class="df form-control nomor-'.$v->id_biodata.'"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="hub" class="df form-control hub-'.$v->id_biodata.'"/>
                    </td>
                    <td max-width="100%">
                        <input type="text" name="khusus" class="df form-control khusus-'.$v->id_biodata.'"/>
                    </td>
                    <td max-width="100%">
                    	<button type="button" class="btn btn-primary btn-block dkrhsimpan" data-id="'.$v->id_biodata.'">SIMPAN</button>
                    </td>
                </tr>
            ';
        }
		$this->output->set_content_type('application/json')->set_output(json_encode($html));
	}
	public function belumsimpan() {
        $tgl = $this->input->post('tanggal');
        $pmi = $this->input->post('pmi');
        $nama = $this->input->post('nama');
        $nomor = $this->input->post('nomor');
        $hub = $this->input->post('hub');
        $khusus = $this->input->post('khusus');

		$data = [
			'tgl_nota' => $tgl,
			'id_biodata' => $pmi,
			'nama_nota' => $nama,
			'notelp' => $nomor,
			'hub_nota' => $hub,
			'khusus_nota' => $khusus,
		];
		$this->M_session->insert($data, 'notarisan');
		
		$tt['success'] = 'sukses';
		$this->output->set_content_type('application/json')->set_output(json_encode($tt));
	}
	public function uploaddokumen($user_id) {
		$this->session->set_userdata("detailuser",$user_id);
		redirect('upload_legalitas');
	}
}
?>