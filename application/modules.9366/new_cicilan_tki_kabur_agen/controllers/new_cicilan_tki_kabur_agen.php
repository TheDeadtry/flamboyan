<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class new_cicilan_tki_kabur_agen extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');
	}

	function index()
	{
		$data['namamodule'] 	= "new_cicilan_tki_kabur_agen";
		$data['namafileview'] 	= "index";
		echo Modules::run('template/new_admin_template', $data);
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

	function printdata()
	{
		$tgl_m 		= $this->input->post('tgl_m');
		$tgl_s 		= $this->input->post('tgl_s');
		$pilihan 	= $this->input->post('pilihan');
		$group 		= $this->input->post('group');
		$agen 		= $this->input->post('agen');
		$jenis_tki 	= $this->input->post('jenis_tki');

		$document = new \PhpOffice\PhpWord\TemplateProcessor( "files/penagihan_uang_tki_kabur_ke_agen.docx" );

		$whire = "";
		if ( $pilihan == 3 )
		{
			$whire = 'majikan.kode_group="'.$group.'" AND';
		}
		else if ( $pilihan == 2 )
		{	
			foreach ( $agen as $agen_val )
			{
				$whire[] = 'majikan.kode_agen="'.$agen_val.'"';
			}
			$whire = implode(" OR ", $whire);
			$whire = '( '.$whire.' ) AND';
		}

		$jenis_tki_exp = explode(",", $jenis_tki);
		foreach ($jenis_tki_exp as $key => $value) 
		{
			$where[] = 'visa.id_biodata LIKE "'.$value.'%"';
		}
		$jenis_tki_imp = implode(" OR ", $where);
		$jenis_tki_imp = '('. $jenis_tki_imp .') AND';

		
		$ambil_agen = $this->M_session->select("
			SELECT 
			majikan.kode_agen
			FROM setelahterbang
			JOIN majikan ON setelahterbang.id_biodata=majikan.id_biodata
			JOIN visa ON setelahterbang.id_biodata=visa.id_biodata
			where $whire $jenis_tki_imp visa.tanggalterbang BETWEEN '$tgl_m' and '$tgl_s'

			GROUP BY majikan.kode_agen
			order by majikan.kode_agen ASC
		");

		$document->cloneBlock( 'CLONEME', count($ambil_agen) );

		$nl=1;
		foreach ( $ambil_agen as $ambil_agen_val )
		{

			$ambil_tki = $this->M_session->select("
				SELECT 
				setelahterbang.id_biodata,
				setelahterbang.tgl_setelah_terbang,
				setelahterbang.tgl_kejadian,
				setelahterbang.kejadian,
				setelahterbang.nilai_kekurangan_cicilan_bank,
				setelahterbang.nilai_kekurangan_cicilan_bank2,
				setelahterbang_kejadian.nama as kejadian_nama
				FROM setelahterbang
				JOIN majikan ON setelahterbang.id_biodata=majikan.id_biodata
				JOIN visa ON setelahterbang.id_biodata=visa.id_biodata
				LEFT JOIN setelahterbang_kejadian ON setelahterbang.kejadian=setelahterbang_kejadian.id
				WHERE majikan.kode_agen='".$ambil_agen_val->kode_agen."'
				order by visa.tanggalterbang ASC
			");

			$document->cloneRow('b1', count($ambil_tki) );

			$data_total_per_agen = 0;

			$nn=1;
			foreach ( $ambil_tki as $ambil_tki_val )
			{
				$ambil_visa 	= $this->M_session->select_row("SELECT * FROM visa WHERE id_biodata='".$ambil_tki_val->id_biodata."'");

				$ambil_personal	= $this->M_session->select_row("SELECT * FROM personal WHERE id_biodata='".$ambil_tki_val->id_biodata."'");

				$ambil_paspor 	= $this->M_session->select_row("SELECT * FROM paspor WHERE id_biodata='".$ambil_tki_val->id_biodata."'");

				$ambil_majikan 	= $this->M_session->select_row("SELECT majikan.*,datamajikan.nama as dt_nama, datamajikan.namamajikan as dt_nmtw FROM majikan LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan WHERE id_biodata='".$ambil_tki_val->id_biodata."'");

				$idss = substr($ambil_tki_val->id_biodata, 0, 2);
				if ( $idss == 'FF' || $idss == 'MF' || $idss == 'JP' )
				{
					$majikane = $ambil_majikan->dt_nama.' '.$ambil_majikan->dt_nmtw;
				}
				else
				{
					$majikane = $ambil_majikan->namamajikan.' '.$ambil_majikan->namataiwan;
				}

				$data_cicilan1 = 0;
				if ( $ambil_tki_val->nilai_kekurangan_cicilan_bank != NULL )
				{
					$dt56 = explode(" X NTD.", $ambil_tki_val->nilai_kekurangan_cicilan_bank);

					if ( count($dt56) == 2 )
					{
						$data_cicilan1 = $dt56[1];
					}
				}
				$data_cicilan2 = 0;
				if ( $ambil_tki_val->nilai_kekurangan_cicilan_bank2 != NULL )
				{
					$dt56 = explode(" X NTD.", $ambil_tki_val->nilai_kekurangan_cicilan_bank2);
					
					if ( count($dt56) == 2 )
					{
						$data_cicilan2 = $dt56[1];
					}
				}

			    $document->setValue('b1#'.$nn, $nn, $nl );
			    $document->setValue('b2#'.$nn, $ambil_tki_val->tgl_setelah_terbang.'<w:br/>'.$ambil_tki_val->tgl_kejadian, $nl );
			    $document->setValue('b3#'.$nn, $ambil_tki_val->kejadian_nama, $nl );
			    $document->setValue('b4#'.$nn, $ambil_visa->tanggalterbang, $nl );
			    $document->setValue('b5#'.$nn, $ambil_personal->id_biodata.'<w:br/>'.$ambil_personal->nama, $nl );
			    $document->setValue('b6#'.$nn, $ambil_paspor->nopaspor, $nl );
			    $document->setValue('b7#'.$nn, htmlentities($majikane), $nl );
			    $document->setValue('b8#'.$nn, $ambil_tki_val->nilai_kekurangan_cicilan_bank.'<w:br/>'.$ambil_tki_val->nilai_kekurangan_cicilan_bank2, $nl );

			    $data_total_per_agen += $data_cicilan1+$data_cicilan2;

			$nn++;
			}

			$ambil_nama_agen = $this->M_session->select_row("SELECT * FROM dataagen WHERE id_agen='".$ambil_agen_val->kode_agen."'");
			$document->setValue('a4', $ambil_nama_agen->nama, '1' );

			$document->setValue('c1', $data_total_per_agen, '1' );

		$nl++;
		}

		$ambil_group = "-";
		if ( $pilihan == 3 )
		{
			$ambil_group = $this->M_session->select_row("SELECT * FROM datagroup WHERE id_group='".$group."'");
			$ambil_group = $ambil_group->nama;
		}
		else if ( $pilihan == 2 )
		{	
			foreach ( $agen as $agen_val )
			{
				$whire[] = 'majikan.kode_agen="'.$agen_val.'"';
			}
			$whire = implode(" OR ", $whire);
			$whire = '( '.$whire.' ) AND';

			$ambil_pil2 = $this->M_session->select_row("
				SELECT 
				majikan.kode_agen
				FROM setelahterbang
				JOIN majikan ON setelahterbang.id_biodata=majikan.id_biodata
				JOIN visa ON setelahterbang.id_biodata=visa.id_biodata
				where $whire $jenis_tki_imp visa.tanggalterbang BETWEEN '$tgl_m' and '$tgl_s'
				GROUP BY majikan.kode_group
				order by majikan.kode_group ASC
			");

			$majikane = array();
			foreach ($ambil_pil2 as $ambil_pil2_val) 
			{
				$ambil_majikan 	= $this->M_session->select_row("
					SELECT 
					majikan.*,
					datamajikan.nama as dt_nama, 
					datamajikan.namamajikan as dt_nmtw 
					FROM majikan 
					LEFT JOIN datamajikan ON majikan.kode_majikan=datamajikan.id_majikan 
					WHERE kode_agen='".$valueable."'
				");
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
		else if ( $pilihan == 1 )
		{
			$ambil_group = "SEMUA AGEN";
		}


		$document->setValue('a1', $tgl_m.' ~ '.$tgl_s );
		$document->setValue('a2', $ambil_group );
		$document->setValue('a3', $jenis_tki );
		
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

}

?>