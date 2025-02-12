<?php
	// examples
	
	header ("Content-type: text/html; charset=utf-8");
	
	require_once '../PHPWord.php';
	
	$PHPWord = new PHPWord();	
	$document = $PHPWord->loadTemplate('biodatacongyi.docx');
	
	$document->setValue('{kerjaposisi}', 'namanya');
	$document->setValue('{namaagen}', 'namanya');
	$document->setValue('{namamajikan}', 'namanya');
	$document->setValue('{nama}', 'namanya');
	$document->setValue('{namamandarin}', '伊完');
	$document->setValue('{tanggaldaftar}', '伊完');
	$document->setValue('{jeniskelamin}', '伊完');
	$document->setValue('{tinggibadan}', '伊完');
	$document->setValue('{warganegara}', '伊完');
	$document->setValue('{beratbadan}', '伊完');
	$document->setValue('{tanggallahir}', '伊完');
	$document->setValue('{agama}', '伊完');
	$document->setValue('{tempatlahir}', '伊完');
	$document->setValue('{status}', '伊完');
	$document->setValue('{umur}', '伊完');
	$document->setValue('{tanggalstatuspernnikahan}', '伊完');
	$document->setValue('{pendidikan}', '伊完');
	$document->setValue('{statuspendidikan}', '伊完');
	$document->setValue('{bahasamandarin}', '伊完');
	$document->setValue('{statusbahasamandarin}', '伊完');
	$document->setValue('{bahasainggriss}', '伊完');
	$document->setValue('{statusbahasainggriss}', '伊完');
	$document->setValue('{namabapak}', '伊完');
	$document->setValue('{umurbapak}', '伊完');
	$document->setValue('{pekerjaanbapak}', '伊完');
	$document->setValue('{namaibu}', '伊完');
	$document->setValue('{umuribu}', '伊完');
	$document->setValue('{pekerjaanibu}', '伊完');
	$document->setValue('{namaistri}', '伊完');
	$document->setValue('{umuristri}', '伊完');
	$document->setValue('{pekerjaanistri}', '伊完');
	$document->setValue('{banyaksaudaralaki}', '伊完');
	$document->setValue('{banyaksaudaraperempuan}', '伊完');
	$document->setValue('{anaknourutke}', '伊完');
	$document->setValue('{anak}', '伊完');

	// clonerow 
	$datapengalaman = array(
		'kosong' => array('','',''),
		'negara' => array(1,2,3),
		'posisi' => array('red', 'blue', 'green'),
		'masakerja' => array('red', 'blue', 'green'),
		'mulaiberakhir' => array('ff0000','0000ff','00ff00'),
		'jenisusaha' => array('','',''),
		'namaperusahaan' => array('','',''),
		'gaji' => array('','',''),
		'gajidibayar' => array('','',''),
		'jenispekerjaan' => array('','',''),
		'alasanberhenti' => array('','',''),
	);

	$document->cloneRow('pengalaman', $datapengalaman);

// keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//

	$document->setValue('{keterampilan}', '伊完');
	$document->setValue('{hoby}', '伊完');
	$document->setValue('{kemampuan}', '伊完');
	$document->setValue('{yangdimakan}', '伊完');
	$document->setValue('{pushup}', '伊完');
	$document->setValue('{minumalkohol}', '伊完');
	$document->setValue('{butawarna}', '伊完');
	$document->setValue('{merokok}', '伊完');
	$document->setValue('{banyakbatangrokok}', '伊完');
	$document->setValue('{rabunjauh}', '伊完');
	$document->setValue('{banyakrabunjauh}', '伊完');
	$document->setValue('{idiomatik}', '伊完');
	$document->setValue('{tanganbasah}', '伊完');
	$document->setValue('{tato}', '伊完');
	$document->setValue('{operasi}', '伊完');
	$document->setValue('{alergi}', '伊完');
	$tahunoperasi = array('2001','2002','2006');
	$dataoperasi = array('paru_paru','gijal','hati');
	$alergi = array('udang', 'ikan asin', 'ikan lele', 'tiram');

	$banyak_alergi = count($alergi);
	$banyak_operasi = count($dataoperasi);

		if ($banyak_alergi < $banyak_operasi) {
			$nilai = $banyak_operasi-$banyak_alergi;
			for ($i= 0; $i < $nilai ; $i++) { 
					$alergi[] = '';
			}
		} if ($banyak_alergi > $banyak_operasi) {
			$nilai = $banyak_alergi-$banyak_operasi;
			for ($i=0; $i < $nilai; $i++) { 
				$dataoperasi[] = '';
				$tahunoperasi[] = '';
			}
		}


	$operasi = array(
		'alergi' => $alergi,
		'tahun' => $tahunoperasi,
		'ket' => $dataoperasi,
	);

	$document->cloneRow('operasi', $operasi);

// keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//

	$document->setValue('{usahamajikan}', '伊完');
	$document->setValue('{waktukerja}', '伊完');
	$document->setValue('{kondisikerja}', '伊完');
	$document->setValue('{jenispekerjaandiminta}', '伊完');
	$document->setValue('{lokasikerja}', '伊完');
	$document->setValue('{lemburkerja}', '伊完');
	$document->setValue('{keterangankerja}', '伊完');
	$document->setValue('{pasport}', '伊完');
	$document->setValue('{rencanakerjasampai}', '伊完');
	$document->setValue('{hasilpermeriksaankesehatan}', '伊完');
	$document->setValue('{nohp}', '伊完');
	$document->setValue('{nohpkeluaraga}', '伊完');
	$document->setValue('{alamatkeluarga}', '伊完');


// keterampilan dan pengalaman kerja ------------------------------------------------------------------------------------//


	$document->setValue('{pernyataan1}', '伊完');
	$document->setValue('{pernyataan2}', '伊完');
	$document->setValue('{pernyataan3}', '伊完');
	$document->setValue('{pernyataan4}', '伊完');
	$document->setValue('{pernyataan5}', '伊完');
	$document->setValue('{pernyataan6}', '伊完');
	$document->setValue('{pernyataan7}', '伊完');
	$document->setValue('{pernyataan8}', '伊完');
	$document->setValue('{pernyataan9}', '伊完');







	// save file
	$tmp_file = 'congyi01.docx';
	$document->save($tmp_file);
	
	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	print "complete.";
?>