<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Dashboard extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dashboard');			
	}
	
	function index(){
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

				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();

				$data['hitung_data_mf_md'] = $this->M_dashboard->hitung_data_mf_md();
				$data['hitung_data_mi_md'] = $this->M_dashboard->hitung_data_mi_md();
				$data['hitung_data_ff_md'] = $this->M_dashboard->hitung_data_ff_md();
				$data['hitung_data_fi_md'] = $this->M_dashboard->hitung_data_fi_md();
				$data['hitung_data_jp_md'] = $this->M_dashboard->hitung_data_jp_md();

				$data['hitung_data_mf_terbang'] = $this->M_dashboard->hitung_data_mf_terbang();
				$data['hitung_data_mi_terbang'] = $this->M_dashboard->hitung_data_mi_terbang();
				$data['hitung_data_ff_terbang'] = $this->M_dashboard->hitung_data_ff_terbang();
				$data['hitung_data_fi_terbang'] = $this->M_dashboard->hitung_data_fi_terbang();
				$data['hitung_data_jp_terbang'] = $this->M_dashboard->hitung_data_jp_terbang();

				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();


			//user sudah login
				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "admin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$id_user = $session['session_userid'];
				$data['tampil_data_personalblk'] = $this->M_dashboard->tampil_data_personalblk();
				$data['tampil_data_pemilik'] = $this->M_dashboard->tampil_data_pemilik();
				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "blk";
				echo Modules::run('template/blk_template', $data); 
			}			
			else if ($id_user && $status==3){

				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();
				$data['tampil_data_personal_group'] = $this->M_dashboard->tampil_data_personal_group();
								$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

				$data['namamodule'] = "M_dashboard";
				$data['namafileview'] = "group";
				echo Modules::run('template/group_template', $data); 
			}
		
		}
		 
	}

		function simpan_data_personalblk(){
		$this->M_dashboard->simpan_data_personalblk();

		redirect('dashboard');
	}

	function update_data_personalblk() {
			$this->M_dashboard->update_data_personalblk();
			redirect('dashboard');
	}

	function hapus_data_personalblk() {
		$this->M_dashboard->hapus_data_personalblk();
		redirect('dashboard');
	}
	
	function dataabsen() {




		$data['namamodule'] = "dashboard";
				$data['namafileview'] = "dataabsen";
				echo Modules::run('template/blk_template', $data); 
	}

	function printabsen(){
require_once 'assets/phpword/PHPWord.php';
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('files/absensibulanan.docx');

$date1 = $this->input->post('date1');
$date2 = $this->input->post('date2');

$dat = date('Y-m-d', strtotime(str_replace('-', '/', $date1)));
$dat2 = date('Y-m-d', strtotime(str_replace('-', '/', $date2)));

$document->setValue('value7',$dat);
$document->setValue('value8',$dat2);

$ambildata1= $this->M_dashboard->ambildata1($dat,$dat2);
foreach($ambildata1->result() as $row) {
$usercx = $row->usernya;
$zyxpilsek = substr($usercx, 0, 2);
if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
	$asliname = $row->nama;
} else {
	$asliname = $row->namahk;
}
$negaramilik = $row->negara;
$namanya[]=$usercx;
$namaasli[]=$asliname;
$miliknegara[]=$negaramilik;
$ambildata2= $this->M_dashboard->ambildata2($dat,$dat2,$usercx);
foreach($ambildata2->result() as $rowss) {

$hasil[] = $rowss->idblk;
$tglnyax[] = $rowss->tanggal;
}
$jumlahnyaxx[]=count($hasil);
$tglnyasx[]=$tglnyax[0]." - ".$tglnyax[count($tglnyax)-1];
unset($hasil);
unset($tglnyax);
}

$document->cloneRow('value1',count($namanya));
$nn=1;
foreach ($namanya as $value) {
    $document->setValue('value1#'.$nn,$nn);
    $document->setValue('value2#'.$nn,$namanya[$nn-1]);
    $document->setValue('value3#'.$nn,$namaasli[$nn-1]);
    $document->setValue('value4#'.$nn,$miliknegara[$nn-1]);
    $document->setValue('value5#'.$nn,$tglnyasx[$nn-1]);
    $document->setValue('value6#'.$nn,$jumlahnyaxx[$nn-1]);


$nn++;
}

$filename = 'filenya.docx';
$isinya=$document->save($filename);
header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $isinya . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    
flush();
readfile($isinya);
unlink($isinya); // deletes the temporary file
exit;


	}

	function dataabsenbiaya() {

		$data['namamodule'] = "dashboard";
				$data['namafileview'] = "dataabsenbiaya";
				echo Modules::run('template/blk_template', $data); 
	}

	function printabsenbiaya(){
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/absensibulananbiaya.docx');

		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');

		$dat = date('Y-m-d', strtotime(str_replace('-', '/', $date1)));
		$dat2 = date('Y-m-d', strtotime(str_replace('-', '/', $date2)));

		$document->setValue('value7',$dat);
		$document->setValue('value8',$dat2);

		$tampilbiayas= $this->M_dashboard->tampilbiaya();
		foreach($tampilbiayas->result() as $biayax) {
			$biayaxsx = $biayax->biaya;
		}


		$ambildata1= $this->M_dashboard->ambildata1($dat,$dat2);
		$no1=0;
		foreach($ambildata1->result() as $row) {
		$no1++;
			$usercx = $row->usernya;
			$zyxpilsek = substr($usercx, 0, 2);
			if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
				$asliname = $row->nama;
			} else {
				$asliname = $row->namahk;
			}
			$negaramilik = $row->negara;
			$namanya[]=$usercx;
			$namaasli[]=$asliname;
			$miliknegara[]=$negaramilik;
			$ambildata2= $this->M_dashboard->ambildata2($dat,$dat2,$usercx);

			$get_ijin_pulang = $this->M_dashboard->select("SELECT tglkembali,tglkeluar FROM blk_izin_pulang where nodaftar='".$usercx."'");
			foreach ($get_ijin_pulang as $poy) {
				$t_keluar  = $poy->tglkeluar;
				$t_kembali = $poy->tglkembali;

				if ($t_keluar != NULL) {
					if ($t_keluar >= $dat) {
						$tgl_keluar_akhir = $t_keluar;
					} elseif ($t_keluar < $dat) {
						$tgl_keluar_akhir = $dat;
					}
					if ($t_kembali >= $dat2) {
						$tgl_kembali_akhir = $t_kembali;
					} elseif ($t_kembali < $dat2) {
						$tgl_kembali_akhir = $dat2;
					}
				}
				$f_keluar[$no1][]  = $tgl_keluar_akhir;
				$f_kembali[$no1][] = $tgl_kembali_akhir;
			}
			//$get_pkl = $this->M_dashboard->select("SELECT datediff(tglkembali, tglkeluar) as int_izin FROM blk_penilaianpkl where nodaftar='$usercx'");

			foreach($ambildata2->result() as $rowss) {
				$hasil[] = $rowss->idblk;
				$tglnyax[] = $rowss->tanggal;

			}
			$jumlahnyaxx[]=count($hasil);
			$tglnyasx[]=$tglnyax[0]." - ".$tglnyax[count($tglnyax)-1];
			unset($hasil);
			unset($tglnyax);
		}


		$document->cloneRow('value3',count($namanya));
		$nn=1;
		foreach ($namanya as $value) {

		    $totalbiaya=$jumlahnyaxx[$nn-1]*$biayaxsx;
		    $tots[]=$totalbiaya;
		    $document->setValue('value1#'.$nn,$nn);
		    $document->setValue('value2#'.$nn,$namanya[$nn-1]);
		    $document->setValue('value3#'.$nn,$namaasli[$nn-1]);
		    $document->setValue('value4#'.$nn,$miliknegara[$nn-1]);
		    $document->setValue('value5#'.$nn,$tglnyasx[$nn-1]);
		    $document->setValue('value13#'.$nn,'');
		    $document->setValue('value14#'.$nn,$f_keluar[$no1][$nn-1].$f_kembali[$no1][$nn-1]);
		    $document->setValue('value6#'.$nn,$jumlahnyaxx[$nn-1]);
		    $document->setValue('value10#'.$nn,$biayaxsx);
		    $document->setValue('value11#'.$nn,$totalbiaya);

		$nn++;
		}
		$document->setValue('value12',array_sum($tots));

		$filename = 'filenya.docx';

		$isinya=$document->save($filename);

		header("Content-Description: File Transfer");
		    header('Content-Disposition: attachment; filename="' . $isinya . '"');
		    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		    header('Content-Transfer-Encoding: binary');
		    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		    header('Expires: 0');
		    
		flush();
		readfile($isinya);
		unlink($isinya); // deletes the temporary file
		exit;
	}	

	function dataabsenbiayakat() {

$data['tampil_data_pemilik'] = $this->M_dashboard->tampil_data_pemilik();
		$data['namamodule'] = "dashboard";
				$data['namafileview'] = "dataabsenbiayakat";
				echo Modules::run('template/blk_template', $data); 
}

	function printabsenbiayakat(){
		require_once 'assets/phpword/PHPWord.php';
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('files/absensibulananpemilik.docx');

$date1 = $this->input->post('date1');
$date2 = $this->input->post('date2');
$idpemilik = $this->input->post('namapemilikx');
$jk = $this->input->post('jk');

$tampilpemiliks= $this->M_dashboard->tampilpemilik($idpemilik);
foreach($tampilpemiliks->result() as $pemiliks) {
$namapemilik = $pemiliks->isi.' - '.$pemiliks->negara;
}
$document->setValue('value9',$namapemilik);


$dat = date('Y-m-d', strtotime(str_replace('-', '/', $date1)));
$dat2 = date('Y-m-d', strtotime(str_replace('-', '/', $date2)));

$document->setValue('value7',$dat);
$document->setValue('value8',$dat2);


$tampilbiayas= $this->M_dashboard->tampilbiaya();
foreach($tampilbiayas->result() as $biayax) {
$biayaxsx = $biayax->biaya;
}
if ($jk == 'TKL') {
	$zzjk = " AND (personal.jeniskelamin='男' || personalblk.jeniskelamin='Laki-Laki')";
} elseif ($jk == 'TKW') {
	$zzjk = " AND (personal.jeniskelamin='女' || personalblk.jeniskelamin='Perempuan')";
} elseif ($jk == 'MF') {
	$zzjk = " AND personalblk.nodaftar like 'MF%'";
} elseif ($jk == 'MI') {
	$zzjk = " AND personalblk.nodaftar like 'MI%'";
} elseif ($jk == 'FF') {
	$zzjk = " AND personalblk.nodaftar like 'FF%'";
} elseif ($jk == 'FI') {
	$zzjk = " AND personalblk.nodaftar like 'FI%'";
} elseif ($jk == 'JP') {
	$zzjk = " AND personalblk.nodaftar like 'JP%'";
}
$ambildata1= $this->M_dashboard->ambildata1ss($dat,$dat2,$idpemilik,$zzjk);
foreach($ambildata1->result() as $row) {
	if ($row->hk_stb != 1 && $row->personal_stb != 1) {
		$usercx = $row->usernya;
		$zyxpilsek = substr($usercx, 0, 2);
		if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
			$asliname = $row->nama;
		} else {
			$asliname = $row->namahk;
		}

		$hk_stb[] = $row->hk_stb;
		$hk_stb2[] = $row->personal_stb;

		$negaramilik = $row->negara;
		$namanya[]=$usercx;
		$namaasli[]=$asliname;
		$miliknegara[]=$negaramilik;
		$ambildata2= $this->M_dashboard->ambildata2($dat,$dat2,$usercx);
		foreach($ambildata2->result() as $rowss) {
		$hasil[] = $rowss->idblk;
		$tglnyax[] = $rowss->tanggal;

		}
		$jumlahnyaxx[]=count($hasil);
		$tglnyasx[]=$tglnyax[0]." - ".$tglnyax[count($tglnyax)-1];
		unset($hasil);
		unset($tglnyax);
	}
}


$document->cloneRow('value3',count($namanya));
$nn=1;
foreach ($namanya as $value) {
	if ($hk_stb[$nn-1] != 1 && $hk_stb2[$nn-1] != 1) {
	    $totalbiaya=$jumlahnyaxx[$nn-1]*$biayaxsx;
	    $tots[]=$totalbiaya;
	    $document->setValue('value1#'.$nn,$nn);
	    $document->setValue('value2#'.$nn,$namanya[$nn-1]);
	    $document->setValue('value3#'.$nn,$namaasli[$nn-1]);
	    $document->setValue('value4#'.$nn,$miliknegara[$nn-1]);
	    $document->setValue('value5#'.$nn,$tglnyasx[$nn-1]);
	    $document->setValue('value6#'.$nn,$jumlahnyaxx[$nn-1]);
	    $document->setValue('value10#'.$nn,$biayaxsx);
	    $document->setValue('value11#'.$nn,$totalbiaya);
	}
$nn++;
}

$document->setValue('value12',array_sum($tots));
$filename = 'filenya.docx';

$isinya=$document->save($filename);


header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $isinya . '"');
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