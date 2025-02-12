<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Dashboard extends MX_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_dashboard');			
	}

	function cow(){
		Dbs::load("SELECT 1=1 total");
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		} else {
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

				$huen = "SELECT * FROM datasponsor where status='sponsor'";
			
				$ambil_data_tki_per_sponsor = $this->M_dashboard->select($huen);

				$raw = [];
				$nm = 0;
				foreach ($ambil_data_tki_per_sponsor as $key) {
					$vien = "SELECT count(*) as jum FROM personal where personal.kode_sponsor='".$key->kode_sponsor."'";
					$hitung = $this->M_dashboard->select_row($vien)->jum;
					$raw[$nm] = "{value: ".$hitung.", name: '".$key->kode_sponsor.' - '.$key->nama."'},";
					$nm++;
				}
				$raw[$nm-1] = substr($raw[$nm-1], 0, -1);
				//$xus = substr($raw, 0, -1);
				$data['data_donut'] = $raw;

			//user sudah login
				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "admin";
				echo Modules::run('template/new_admin_template', $data);
			}
			else if ($id_user && $status==2){
				$id_user = $session['session_userid'];

				$data['blk_tki'] 	= $this->M_dashboard->select_row("SELECT count(*) as total FROM personalblk")->total;
				$data['blk_non'] 	= $this->M_dashboard->select_row("SELECT count(*) as total FROM personalblk 
					WHERE (personalblk.nodaftar NOT LIKE 'MF%' 
					AND personalblk.nodaftar NOT LIKE 'MI%'
					AND personalblk.nodaftar NOT LIKE 'FI%'
					AND personalblk.nodaftar NOT LIKE 'FF%'
					AND personalblk.nodaftar NOT LIKE 'JP%')")->total;
				$data['blk_taiwan'] = $this->M_dashboard->select_row("SELECT count(*) as total FROM personalblk
					WHERE (personalblk.nodaftar LIKE 'MF%' 
					OR personalblk.nodaftar LIKE 'MI%'
					OR personalblk.nodaftar LIKE 'FI%'
					OR personalblk.nodaftar LIKE 'FF%'
					OR personalblk.nodaftar LIKE 'JP%')")->total;
				$data['tki_all'] 	= $this->M_dashboard->select_row("SELECT count(*) as total FROM personal")->total;
/*
				$data['tampil_data_personalblk'] = $this->M_dashboard->tampil_data_personalblk();
				$data['tampil_data_pemilik'] = $this->M_dashboard->tampil_data_pemilik();
				$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

				$query_ijin_pulang = "SELECT
				a.nodaftar as id,
				c.nama as nama,
				a.tglkeluar as pulang,
				a.tglkembali as kembali
				FROM blk_izin_pulang a
				JOIN personalblk b
				ON a.nodaftar=b.nodaftar
				LEFT JOIN personal c
				ON b.nodaftar=c.id_biodata
				order by a.tglkeluar DESC
				";
				$query_ujk = "SELECT 
				b.statujk as stat,
				a.nodaftar as idbio
				FROM blk_detail_formulir a
				LEFT JOIN personalblk b
				ON a.id_detail_formulir=b.nodaftar
				

				";
				
				$data['tampil_data_ijin_pulang'] 	= $this->M_dashboard->select($query_ijin_pulang);
				$data['tampil_data_ujk'] 			= $this->M_dashboard->select($query_ujk);*/

				$data['namamodule'] = "dashboard";
				$data['namafileview'] = "blk";
				echo Modules::run('template/blk_template', $data); 
			} else if ($id_user && $status==3) {

					$zid_user = $this->M_session->select_row("SELECT id_agen FROM dataagen WHERE kode_agen='".$id_user."'")->id_agen;

					$query1 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang IS NULL 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'FF%'");
					$query2 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang IS NULL 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'FI%'");
					$query3 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang IS NULL 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'MF%'");
					$query4 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang IS NULL 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'MI%'");
					$query5 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang IS NULL 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'JP%'");
					$query6 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang=1 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'FF%'");
					$query7 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang=1 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'FI%'");
					$query8 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang=1 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'MF%'");
					$query9 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang=1 
   									AND majikan.kode_agen='".$zid_user."'
   									AND personal.id_biodata LIKE 'MI%'");
					$query10 = $this->M_session->select_row("SELECT COUNT(*) as total FROM personal 
									JOIN majikan 
									ON personal.id_biodata=majikan.id_biodata  
   									WHERE personal.statterbang=1 
   									AND majikan.kode_agen='".$zid_user."' 
   									AND personal.id_biodata LIKE 'JP%'");
					$data['chart1'] = $query1->total.",".$query2->total.",".$query3->total.",".$query4->total.",".$query5->total;
					$data['chart2'] = $query6->total.",".$query7->total.",".$query8->total.",".$query9->total.",".$query10->total;
/*
				$data['hitung_data_mf'] = $this->M_dashboard->hitung_data_mf();
				$data['hitung_data_mi'] = $this->M_dashboard->hitung_data_mi();
				$data['hitung_data_ff'] = $this->M_dashboard->hitung_data_ff();
				$data['hitung_data_fi'] = $this->M_dashboard->hitung_data_fi();
				$data['hitung_data_jp'] = $this->M_dashboard->hitung_data_jp();*/
				//$data['tampil_data_personal_group'] = $this->M_dashboard->tampil_data_personal_group();
				//$data['tampil_data_personal'] = $this->M_dashboard->tampil_data_personal();

				$data['namamodule'] = "dashboard";
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

			$get_ijin_pulang = $this->M_dashboard->select("SELECT tglkembali,tglkeluar FROM blk_izin_pulang where nodaftar='".$usercx."'");
			$out_date 	= "";
			foreach ($get_ijin_pulang as $poy) {
				$t_keluar  = $poy->tglkeluar;
				$t_kembali = $poy->tglkembali;

				if ($t_keluar != NULL) {
					if ($t_keluar >= $dat) {
						$tgl_keluar_akhir = $t_keluar;
					} elseif ($t_keluar < $dat) {
						$tgl_keluar_akhir = $dat;
					}
					if ($t_kembali <= $dat2) {
						$tgl_kembali_akhir = $t_kembali;
					} elseif ($t_kembali > $dat2) {
						$tgl_kembali_akhir = $dat2;
					}
				}
				//$f_keluar[$no1][]  = $tgl_keluar_akhir;
				//$f_kembali[$no1][] = $tgl_kembali_akhir;
				$out_date = $out_date." (".$tgl_keluar_akhir." - ".$tgl_kembali_akhir.")";
			}

			$get_pkl 	= $this->M_dashboard->select("SELECT tgl_mulai, tgl_selesai FROM blk_hasilpkl where id_personalblk='$usercx'");
			$pkl_date 	= "";
			foreach ($get_pkl as $por) {
				$t_keluar  = $por->tgl_mulai;
				$t_kembali = $por->tgl_selesai;

				if ($t_keluar != NULL) {
					if ($t_keluar >= $dat) {
						$tgl_keluar_akhir = $t_keluar;
					} elseif ($t_keluar < $dat) {
						$tgl_keluar_akhir = $dat;
					}
					if ($t_kembali <= $dat2) {
						$tgl_kembali_akhir = $t_kembali;
					} elseif ($t_kembali > $dat2) {
						$tgl_kembali_akhir = $dat2;
					}
				}
				//$f_keluar[$no1][]  = $tgl_keluar_akhir;
				//$f_kembali[$no1][] = $tgl_kembali_akhir;
				$pkl_date = $pkl_date." (".$tgl_keluar_akhir." - ".$tgl_kembali_akhir.")";
			}
			foreach($ambildata2->result() as $rowss) {
				$hasil[] = $rowss->idblk;
				$tglnyax[] = $rowss->tanggal;
			}
			$zout_date[] = $out_date; 
			$zpkl_date[] = $pkl_date;
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
	$document->setValue('value9#'.$nn,$zpkl_date[$nn-1]);
	$document->setValue('value10#'.$nn,$zout_date[$nn-1]);
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

	function printabsenbiaya() {
		require_once 'assets/phpword/PHPWord.php';
		$PHPWord = new PHPWord();
		$document = $PHPWord->loadTemplate('files/absensibulananbiaya.docx');

		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');

		$dat = date('Y-m-d', strtotime(str_replace('-', '/', $date1)));
		$dat2 = date('Y-m-d', strtotime(str_replace('-', '/', $date2)));

		$document->setValue('value7',$dat);
		$document->setValue('value8',$dat2);

		$tampilbiayas = $this->M_dashboard->tampilbiaya();
		foreach($tampilbiayas->result() as $biayax) {
			$biayaxsx = $biayax->biaya;
		}


		$ambildata1= $this->M_dashboard->ambildata1($dat,$dat2);
		$no1=0;
		foreach($ambildata1->result() as $row) {
		$no1++;
			$usercx 	= $row->usernya;
			$zyxpilsek 	= substr($usercx, 0, 2);
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
			$out_date 	= "";
			foreach ($get_ijin_pulang as $poy) {
				$t_keluar  = $poy->tglkeluar;
				$t_kembali = $poy->tglkembali;

				if ($t_keluar != NULL) {
					if ($t_keluar >= $dat) {
						$tgl_keluar_akhir = $t_keluar;
					} elseif ($t_keluar < $dat) {
						$tgl_keluar_akhir = $dat;
					}
					if ($t_kembali <= $dat2) {
						$tgl_kembali_akhir = $t_kembali;
					} elseif ($t_kembali > $dat2) {
						$tgl_kembali_akhir = $dat2;
					}
				}
				//$f_keluar[$no1][]  = $tgl_keluar_akhir;
				//$f_kembali[$no1][] = $tgl_kembali_akhir;
				$out_date = $out_date." (".$tgl_keluar_akhir." - ".$tgl_kembali_akhir.")";
			}

			$get_pkl 	= $this->M_dashboard->select("SELECT tgl_mulai, tgl_selesai FROM blk_hasilpkl where id_personalblk='$usercx'");
			$pkl_date 	= "";
			foreach ($get_pkl as $por) {
				$t_keluar  = $por->tgl_mulai;
				$t_kembali = $por->tgl_selesai;

				if ($t_keluar != NULL) {
					if ($t_keluar >= $dat) {
						$tgl_keluar_akhir = $t_keluar;
					} elseif ($t_keluar < $dat) {
						$tgl_keluar_akhir = $dat;
					}
					if ($t_kembali <= $dat2) {
						$tgl_kembali_akhir = $t_kembali;
					} elseif ($t_kembali > $dat2) {
						$tgl_kembali_akhir = $dat2;
					}
				}
				//$f_keluar[$no1][]  = $tgl_keluar_akhir;
				//$f_kembali[$no1][] = $tgl_kembali_akhir;
				$pkl_date = $pkl_date." (".$tgl_keluar_akhir." - ".$tgl_kembali_akhir.")";
			}

			foreach($ambildata2->result() as $rowss) {
				$hasil[] = $rowss->idblk;
				$tglnyax[] = $rowss->tanggal;

			}
			$zout_date[] = $out_date; 
			$zpkl_date[] = $pkl_date;
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
		    $document->setValue('value13#'.$nn,$zpkl_date[$nn-1]);
		    $document->setValue('value14#'.$nn,$zout_date[$nn-1]);
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
		$biayafghj = $this->input->post('biaya');

		$tampilpemiliks= $this->M_dashboard->tampilpemilik($idpemilik);

		foreach($tampilpemiliks->result() as $pemiliks) {
			$namapemilik = $pemiliks->isi.' - '.$pemiliks->negara;
		}
		$document->setValue('value9',$namapemilik);

		$dat = date('Y-m-d', strtotime(str_replace('-', '/', $date1)));
		$dat2 = date('Y-m-d', strtotime(str_replace('-', '/', $date2)));

		$document->setValue('value7',$dat);
		$document->setValue('value8',$dat2);

/*
		$tampilbiayas= $this->M_dashboard->tampilbiaya();
		foreach($tampilbiayas->result() as $biayax) {
			$biayaxsx = $biayax->biaya;
		}*/
		$biayaxsx = $biayafghj;
		if ($jk == 'TKL') {
			$zzjk = " AND (personal.jeniskelamin='男' || personalblk.jeniskelamin='Laki-Laki')";
		} elseif ($jk == 'TKW') {
			$zzjk = " AND (personal.jeniskelamin='女' || personalblk.jeniskelamin='Perempuan')";
		} else {
			$zzjk = " AND personalblk.nodaftar like '$jk%'";
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

				$get_ijin_pulang = $this->M_dashboard->select("SELECT tglkembali,tglkeluar FROM blk_izin_pulang where nodaftar='".$usercx."'");
				$out_date 	= "";
				foreach ($get_ijin_pulang as $poy) {
					$t_keluar  = $poy->tglkeluar;
					$t_kembali = $poy->tglkembali;

					if ($t_keluar != NULL) {
						if ($t_keluar >= $dat) {
							$tgl_keluar_akhir = $t_keluar;
						} elseif ($t_keluar < $dat) {
							$tgl_keluar_akhir = $dat;
						}
						if ($t_kembali <= $dat2) {
							$tgl_kembali_akhir = $t_kembali;
						} elseif ($t_kembali > $dat2) {
							$tgl_kembali_akhir = $dat2;
						}
					}
					//$f_keluar[$no1][]  = $tgl_keluar_akhir;
					//$f_kembali[$no1][] = $tgl_kembali_akhir;
					$out_date = $out_date." (".$tgl_keluar_akhir." - ".$tgl_kembali_akhir.")";
				}

				$get_pkl 	= $this->M_dashboard->select("SELECT tgl_mulai, tgl_selesai FROM blk_hasilpkl where id_personalblk='$usercx'");
				$pkl_date 	= "";
				foreach ($get_pkl as $por) {
					$t_keluar  = $por->tgl_mulai;
					$t_kembali = $por->tgl_selesai;

					if ($t_keluar != NULL) {
						if ($t_keluar >= $dat) {
							$tgl_keluar_akhir = $t_keluar;
						} elseif ($t_keluar < $dat) {
							$tgl_keluar_akhir = $dat;
						}
						if ($t_kembali <= $dat2) {
							$tgl_kembali_akhir = $t_kembali;
						} elseif ($t_kembali > $dat2) {
							$tgl_kembali_akhir = $dat2;
						}
					}
					//$f_keluar[$no1][]  = $tgl_keluar_akhir;
					//$f_kembali[$no1][] = $tgl_kembali_akhir;
					$pkl_date = $pkl_date." (".$tgl_keluar_akhir." - ".$tgl_kembali_akhir.")";
				}

				foreach($ambildata2->result() as $rowss) {
					$hasil[] = $rowss->idblk;
					$tglnyax[] = $rowss->tanggal;
				}

				$zout_date[] = $out_date; 
				$zpkl_date[] = $pkl_date;
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
			    $document->setValue('value13#'.$nn,$zpkl_date[$nn-1]);
			    $document->setValue('value14#'.$nn,$zout_date[$nn-1]);
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

	function show1() {
		$querrr = "SELECT 
		b.id_biodata, b.nama, a.kode_majikan, a.namamajikan, c.nama as namamajikan2
		FROM majikan a 
		JOIN personal b 
		ON a.id_biodata=b.id_biodata 
		LEFT JOIN datamajikan c
		ON a.kode_majikan=c.id_majikan
		order by a.id_majikan DESC 
		limit 0, 10";
		$tampil_data_pengajuan = $this->M_dashboard->select($querrr);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
	    	if ($row->kode_majikan == 0) {
	    		$majikan = $row->namamajikan;
	    	} else {
	    		$majikan = $row->namamajikan2;
	    	}

            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="'.site_url('dashboard/detail_show1/'.$row->id_biodata).'" class="label label-primary" >
                        <span>DETAIL</span>
                    </a>',
                    $row->id_biodata,
                    $row->nama,
                    $majikan
                )
            );
        }

        $recordsTotal 		= 10;
        $recordsFiltered	= 10;

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

	function show2() {
		$sql = "SELECT 
				visa.id_biodata, personal.nama, visa.tanggalterbang 
				FROM visa 
				JOIN personal 
				ON visa.id_biodata=personal.id_biodata 
				order by visa.id_visa DESC 
				limit 0, 10";
        $tampil_data_visa = $this->M_dashboard->select($sql);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_visa as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="'.site_url('dashboard/detail_show2/'.$row->id_biodata).'" class="label label-primary" target="_blank">
                        <span>DETAIL</span>
                    </a>',
                    $row->id_biodata,
                    $row->nama,
                    $row->tanggalterbang
                )
            );
        }
        
        $recordsTotal 		= 10;
        $recordsFiltered	= 10;

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

	function show3() {
		$querrr = "SELECT 
		b.id_biodata, b.nama, a.nopaspor
		FROM paspor a 
		JOIN personal b 
		ON a.id_biodata=b.id_biodata 
		order by a.id_paspor DESC 
		limit 0, 10";
		$tampil_data_pengajuan = $this->M_dashboard->select($querrr);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="'.site_url('dashboard/detail_show3/'.$row->id_biodata).'" class="label label-primary" target="_blank">
                        <span>DETAIL</span>
                    </a>',
                    $row->id_biodata,
                    $row->nama,
                    $row->nopaspor
                )
            );
        }
        
        $recordsTotal 		= 10;
        $recordsFiltered	= 10;

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

	function show4() {
		$querrr = "SELECT 
		a.id_biodata, a.nama, b.tanggal_ganti as md, b.status
		FROM personal a 
		LEFT JOIN personal_stat_history b 
		ON a.id_biodata=b.id_biodata
		WHERE (a.statusaktif='Mengundurkan diri' || a.statusaktif='UNFIT') AND (b.status='Mengundurkan diri' || b.status='UNFIT')
		ORDER BY tanggaldaftar DESC
		limit 0, 10";
		$tampil_data_pengajuan = $this->M_dashboard->select($querrr);

        $data2=array();
        $no=intval($_POST['start']);

	    foreach ($tampil_data_pengajuan as $row) {
            $no++;
            array_push($data2,
                array(
                    $no,
                    '<a href="'.site_url('dashboard/detail_show4/'.$row->id_biodata).'" class="label label-primary" target="_blank">
                        <span>DETAIL</span>
                    </a>',
                    $row->id_biodata,
                    $row->nama,
                    $row->status,
                    $row->md
                )
            );
        }
        
        $recordsTotal 		= 10;
        $recordsFiltered	= 10;

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

	function detail_show1($user_id) {
	  	$this->session->set_userdata("detailuser",$user_id);
		redirect('detailmajikan/');
	}

	function detail_show2($user_id) {
	  	$this->session->set_userdata("detailuser",$user_id);
		redirect('detailvisa');
	}

	function detail_show3($user_id) {
	  	$this->session->set_userdata("detailuser",$user_id);
		redirect('detailpaspor/');
	}

	function detail_show4($user_id) {
	  	$this->session->set_userdata("detailuser",$user_id);
		redirect('detailpersonal');
	}

}