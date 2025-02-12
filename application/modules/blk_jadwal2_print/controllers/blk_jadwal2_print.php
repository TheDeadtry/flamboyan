<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class blk_jadwal2_print extends MX_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('M_session');		
		$session = $this->M_session->get_session();
		$id_user 	= $session['session_userid'];
		$status 	= $session['session_status'];
		if (!$session['session_userid'] && !$session['session_status']){
			redirect('login/login_blk');
		} 	
		if ($id_user && $status!=2){
			redirect('dashboard');
		}
	}
	
	function index() {

	}

	function detailpaket() {
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");
		    

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<b>My first document</b>";
echo "<table class='table table-bordered'>
	<tr>
		<td>Add</td>
		<td>D</td>
		<td>C</td>
	</tr>
</table>";
echo "</body>";
echo "</html>";

	/*
		$this->load->library('word_dew');
		//our docx will have 'lanscape' paper orientation
		$section = $this->word->addSection(array('orientation'=>'landscape'));

		// Add text elements
		$section->addText('Hello World!');
		$section->addTextBreak(1);
		 
		$section->addText('I am inline styled.', array('name'=>'Verdana', 'color'=>'006699'));
		$section->addTextBreak(1);
		 
		$this->word->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
		$this->word->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
		$section->addText('I am styled by two style definitions.', 'rStyle', 'pStyle');
		$section->addText('I have only a paragraph style definition.', null, 'pStyle');*/
	}

	function detailpaket_word($id) {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord 		= new PHPWord();
		$document 		= $PHPWord->loadTemplate('files/new_jadwal2_detailpaket.docx');

		$sql 	= 'SELECT 
					*
					FROM blk_jadwal_paket a 
					LEFT JOIN  blk_jadwal_paketjadwal b 
					ON a.id_paket=b.paket_id 
					where a.id_paket like "'.$id.'%"';
		$query 	= $this->M_session->select($sql);


		$data = array();
		$nn=0;	
		foreach ($query as $value) {
			$materi_exp = explode(",", $value->materi);

			for( $x=0; $x<count($materi_exp); $x++ ) {
				$materi_exp_exp = explode("|-|", $materi_exp[$x]);

				$table = "blk_pelajaran_".$materi_exp_exp[1];
				$kode  = $materi_exp_exp[0];

				$ambil_data_materi = $this->M_session->select_row("SELECT * FROM $table WHERE kode_materi='$kode'");

				$xhari[$nn][$x] 	= $value->hari;
				$xjam[$nn][$x] 		= $value->jam;
				$xminggu[$nn][$x]	= $value->minggu;
				$xmateri 			= $ambil_data_materi->kode_materi.' - '.$ambil_data_materi->nama_materi;
   				
   				$xnn[$x] = $nn+1;

				if ($nn > 0) {
					$n2 = $nn-1;
					$n3 = $nn;
					if ($xnn[$x-1] == $xnn[$x]) {
						$xnn[$x] = "";
					} else {
						$xnn[$x] = $xnn[$x];
					}  
				}

				if ($nn > 0) {

					if ($xhari[$nn-1][$x] == $xhari[$nn][$x]) {
						$xhari[$nn][$x] = "";
					} else {
						$xhari[$nn][$x] = $xhari[$nn][$x];
					}  

					if ($x > 0) {
						if ($xjam[$nn-1][$x-1] ==  $xjam[$nn][$x]) {
							$xjam[$nn][$x] 	= "";
						} else {
							$xjam[$nn][$x] 	= $xjam[$nn][$x];
						}
						if ($xminggu[$nn-1][$x-1] ==  $xminggu[$nn][$x]) {
							$xminggu[$nn][$x] 	= "";
						} else {
							$xminggu[$nn][$x] 	= $xminggu[$nn][$x];
						}
					}

				}  

				if ($x > 0) {
					$xnn[$x] = "";
					$xhari[$nn][$x] = "";
					$xjam[$nn][$x] 	= "";
					$xminggu[$nn][$x]	= "";
				}    

				$data[] = array(
					'n' 		=> $xnn[$x],
					'x' 		=> $x,
					'c' 		=> count($materi_exp),
					'hari' 		=> $xhari[$nn][$x],
					'jam'  		=> $xjam[$nn][$x],
					'minggu' 	=> $xminggu[$nn][$x],
					'materi'  	=> $xmateri
				);

			}

		$nn++;
		}

		$document->cloneRow('s1', count($data));

		$nn2=1;
		for ($i=0; $i < count($data); $i++) { 
		    $document->setValue('s1#'.$nn2, $data[$i]['n']);
		    $document->setValue('s2#'.$nn2, $data[$i]['hari'] );
		    $document->setValue('s3#'.$nn2, $data[$i]['jam'] );
		    $document->setValue('s4#'.$nn2, $data[$i]['minggu'] );
		    $document->setValue('s5#'.$nn2, $data[$i]['materi'] );
		$nn2++;
		}

		$ambil_data_paket = $this->M_session->select_row("SELECT * FROM blk_jadwal_paket WHERE id_paket='$id'");
		$document->setValue('title', $ambil_data_paket->nama_full);



		//echo '<pre>';print_r($data);
		
		$filename = $ambil_data_paket->nama_full.'.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="DATA PAKET '.$filename.'"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}

	function detailpaket_excel() {

	}

}