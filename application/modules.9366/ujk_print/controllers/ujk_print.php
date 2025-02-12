<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class ujk_print extends MX_Controller{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('M_session');			
		//$this->load->model('M_ujk_print');			

		$session = $this->M_session->get_session();
		$id_user = $session['session_userid'];
		$status = $session['session_status'];

		if (!$session['session_userid'] && !$session['session_status'])
		{
			redirect('login/login_blk');
		}		
		if ($id_user && $status!=2)
		{
			redirect('dashboard');
		}		
	}
	
	function index()
	{
		$bln_arr = array (
			1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
		);

		$ambil_formulir = $this->M_session->select(" SELECT tipe,DATE_FORMAT(tgl_ujk, '%Y-%m') AS created_month FROM blk_formulir where tgl_ujk != '' group by created_month,tipe ");
		
		$nama_bln = array();
		foreach ($ambil_formulir as $key => $value) {
			$cr_exp = explode("-", $value->created_month);
			$no_bln = (int) $cr_exp[1];

			$nama_bln[] = array(
				'value' => $value->tipe.' '.$cr_exp[0].' '.$bln_arr[$no_bln],
				'no' 	=> $value->tipe.','.$value->created_month
			);
		}

		$data['nama_bulan'] = $nama_bln;

		$data['namamodule'] = "ujk_print";
		$data['namafileview'] = "ujk_print";
		echo Modules::run('template/blk_template', $data);	
	}

	function cetakujk() 
	{
		$bulan = array (
			1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
		);

		require_once 'assets/phpword/PHPWord.php';

		$PHPWord 		= new PHPWord();

		//$PHPWord 	= new \PhpOffice\PhpWord\PhpWord();
		$bulanujk 		= $this->input->post('bulanujkx');
		$bulanujk_f 	= explode(",", $bulanujk);

		$zzstipe = $bulanujk_f[0];

		if ( $zzstipe == 'BLK-LN' )
		{
			$tempx = 'FLAMBOYAN GEMAJASA MANDIRI';
			$tempz = 'BLK – LN '.$tempx;
		}
		elseif ( $zzstipe == 'LPKS' )
		{
			$tempx = 'KARYA INSANI BAROKAH';
			$tempz = 'LPKS '.$tempx;
		}

		$document 	= $PHPWord->loadTemplate('files/ujk_print.docx');


		$piltgl	= $bulanujk_f[1];

/*
		$dateObj   		= DateTime::createFromFormat('!m', $bulanujk);
		$monthName 		= $dateObj->format('F'); // March
*/

		$cr_exp = explode("-", $piltgl);
		$no_bln = (int) $cr_exp[1];

		$tanggal_ujk 	= $cr_exp[0].' '.$bulan[$no_bln];
		$quww 			= 'SELECT 
							c.nama as hk_nama, 
							c.tempatlahir as hk_tempatlahir, 
							c.tanggallahir as hk_tgllahir, 
							c.alamat as hk_alamat,  
							d.nama as zz_nama,
							d.tempatlahir as zz_tempatlahir, 
							d.tgllahir as zz_tgllahir, 
							e.alamat as zz_alamat, 
							a.tgl_ujk, 
							b.nodaftar
							FROM blk_formulir a 
							LEFT JOIN  blk_detail_formulir b 
							ON a.id_formulir=b.id_formulir 
							LEFT JOIN personalblk c 
							ON c.nodaftar=b.nodaftar 
							LEFT JOIN personal d
							ON c.nodaftar=d.id_biodata
							LEFT JOIN disnaker e
							ON c.nodaftar=e.id_biodata
							where a.tgl_ujk like "'.$piltgl.'%"
							and a.tipe="'.$zzstipe.'"
							and b.ket="MURNI" 
							';
		$zselectionz 	= $this->M_session->select($quww);

		$document->cloneRow('value2',count($zselectionz));
		$total_peserta = count($zselectionz);

		$nn=1;	
		foreach ($zselectionz as $value) {
			//print_r($value);
			$zyxpilsek = substr($value->nodaftar, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname 	= $value->zz_nama;
				$aslitempat = $value->zz_tempatlahir ;
				$aslitgl 	= $value->zz_tgllahir ;
				$aslialamat = $value->zz_alamat ;
			} else {
				$asliname 	= $value->hk_nama;
				$aslitempat = $value->hk_tempatlahir;
				$aslitgl 	= $value->hk_tgllahir;
				$aslialamat = $value->hk_alamat;
			}
		/*
			$select_peserta = 'SELECT b.nama, b.tempatlahir, b.tanggallahir, b.alamat FROM blk_detail_formulir a LEFT JOIN personalblk b ON a.nodaftar=b.nodaftar WHERE id_formulir="'.$key->id_formulir.'"';
			$query_peserta = $this->M_ujk_print->select($selecat_peserta);*/
			if ($aslitgl != NULL) {
				//$date 	  = new DateTime($aslitgl);
				$date 	  = str_replace(".", "-", $aslitgl);
				$split 	  = explode('-', $date);
				$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
			} else {
				$tgl_indo = '';
			}

			if ($aslitempat != NULL && $tgl_indo != NULL) {
				$aslittl = $aslitempat.', '.$tgl_indo;
			} else { 
				$aslittl = '';
			}

		    $document->setValue('value1#'.$nn,$nn);
		    $document->setValue('value2#'.$nn,$asliname);
		    $document->setValue('value3#'.$nn,$aslittl );
		    $document->setValue('value4#'.$nn,$aslialamat);
		    $document->setValue('value5#'.$nn,'MALANG');
		$nn++;
		}
/*
		$quww 			= 'SELECT id_formulir FROM blk_formulir where tgl_ujk like "'.$piltgl.'%"';
		$zselectionz 	= $this->M_ujk_print->select($quww);

		foreach ($zselectionz as $key) {
			$select_peserta = 'SELECT b.nama, b.tempatlahir, b.tanggallahir, b.alamat FROM blk_detail_formulir a LEFT JOIN personalblk b ON a.nodaftar=b.nodaftar WHERE id_formulir="'.$key->id_formulir.'"';
			$query_peserta = $this->M_ujk_print->select($selecat_peserta);

			$document->cloneRow('value2',count($zselectionz));

			$nn=1;	
			foreach ($query_peserta as $value) {

			    $document->setValue('value1#'.$nn,$nn);
			    $document->setValue('value2#'.$nn,$value->nama);
			    $document->setValue('value3#'.$nn,$value->tempatlahir);
			    $document->setValue('value4#'.$nn,$value->tanggallahir);
			    $document->setValue('value5#'.$nn,'MALANG');
			$nn++;
			}

			//echo '<pre>';
			//print_r($query_peserta);
			//echo '</pre>';
		}*/
		$document->setValue('value6', $total_peserta.' ORANG');
		$document->setValue('value7', $tanggal_ujk);

		$document->setValue('title1', $tempz);
		$document->setValue('title2', $tempx);
		//echo count($query_peserta);
		
		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="PRINT UJK '.$tanggal_ujk.'.docx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}

}