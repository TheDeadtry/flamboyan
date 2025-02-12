
		$id = $this->session->userdata("detailuser");
 
		$negara1=$this->m_printout->ambil_id_negara1($id);
		$negara2=$this->m_printout->ambil_id_negara2($id);
		$calling1=$this->m_printout->ambil_id_calling($id);
		$skill1=$this->m_printout->ambil_id_skill1($id);
		$skill2=$this->m_printout->ambil_id_skill2($id);
		$skill3=$this->m_printout->ambil_id_skill3($id);

		if($skill1=='') {
			$tampilidbio = $id.''.$negara1.''.$negara2.''.$calling1.''.$skill1.''.$skill2.''.$skill3;
		} else {
			$tampilidbio = $id.''.$negara1.''.$negara2.''.$calling1.'-'.$skill1.''.$skill2.''.$skill3;
		}


		$personalhtml='';
	    $keluargahtml='';
	    $workinghtml='';
	    $kondisihtml='';
	    $kethtml='';
	    $permohonanhtml='';
	    $pasporhtml='
	    		<tr>
				    <td class="tengah">PASPORT / 護照</td> 
				    <td class="tengah biru"> </td> 
				    <td class="tengah">到期-Berlaku sampai</td> 
				    <td class="tengah biru"> </td> ';
	    $medicalhtml='
	    			<td class="tengah">體檢-Pemeriksaan kesehatan</td> 
				    <td class="tengah biru"> </td> 
				</tr>';
	    $notelhtml='';
	    $interviewhtml='';
		$detailpengalamanfi='';

		$tampil_data_personal= $this->m_printout->tampil_data_personal($id);


 		foreach ($tampil_data_personal as $rowpersonal) { 
			$personalhtml='
				<tr>
					<th> '.$tampilidbio.'</th>
					<th class="biru"> PL : '.$rowpersonal->kode_sponsor.'</th>
					<th colspan="2"> 仲介公司-Agent : </th>
					<th colspan="2"> 僱主名稱-Nama Majikan : </th>
				</tr>
				<tr>
					<td colspan="2" rowspan="10" class="tengah"><img src="assets/uploads/'.$rowpersonal->foto.'" width="190" height="240"></td>
					<th colspan="4" class="biru tengah">個人資料 / Personal Data</th>
				</tr>
				<tr>
					<td class="tengah">姓名 Nama</td>
					<th colspan="2" class="kuning tengah">'.$rowpersonal->nama.'</th>
					<td colspan="2" class="kuning tengah">
						'.$rowpersonal->nama_mandarin.'
					</td>
				</tr>
				<tr>
					<td class="tengah">報到日期 Tanggal Daftar</td>
					<td class="kuning tengah">'.$rowpersonal->tanggaldaftar.'</td>
					<td class="tengah">性別 Jenis Kelamin</td>
					<td class="tengah">'.$rowpersonal->jeniskelamin.'</td>
				</tr>
				<tr>
					<td class="tengah">身 高 Tinggi Badan</td>
					<td class="kuning tengah">'.$rowpersonal->tinggi.' cm</td>
					<td class="tengah">國籍 Warganegara</td>
					<td class="tengah">'.$rowpersonal->warganegara.'</td>
				</tr>
				<tr>
					<td class="tengah">體 重 Berat Badan</td>
					<td class="kuning tengah">'.$rowpersonal->berat.' kg</td>
					<td class="tengah">生日 Tanggal Lahir</td>
					<td class="kuning tengah">'.$rowpersonal->tgllahir.'</td>
				</tr>
				<tr>
					<td class="tengah">宗 教 Agama</td>
					<td class=" tengah">'.$rowpersonal->agama.'</td>
					<td class="tengah">出生地點 Tempat Lahir</td>
					<td class="kuning tengah">'.$rowpersonal->tempatlahir.'</td>
				</tr>
				<tr>
					<td class="tengah">婚姻狀況 Status</td>
					<td class=" tengah">'.$rowpersonal->status.'</td>
					<td class="tengah">年 齡 Umur</td>
					<td class="kuning tengah">'.$rowpersonal->umur.' tahun 嵗</td>
				</tr>
				<tr>
					<td colspan="3"> Tanggal Menikah / cerai hidup 結婚/离婚日期</td>
					<td class="kuning"> '.$rowpersonal->tglmenikah.'</td>
				</tr>
				<tr>
					<td class="tengah"> 教育程度 Pendidikan</td>
					<td colspan="3" class=""> '.$rowpersonal->pendidikan.' '.$rowpersonal->pendidikan_mandarin.'</td>
				</tr>
				<tr>
					<td class="tengah"> 地址-Alamat</td>
					<td class="kuning"> '.$rowpersonal->alamat.'</td>
					<td class="tengah"> 省份-Propinsi</td>
					<td class=""> '.$rowpersonal->provinsi.'</td>
				</tr>
				<tr>
					<td colspan="2" class="tengah"> 語言能力 Bahasa</td>
					<td class="tengah"> 國語 Mandarin</td>
					<td class=""> '.$rowpersonal->mandarin.'</td>
					<td class="tengah"> 英語 Inggris</td>
					<td class=""> '.$rowpersonal->inggris.'</td>
				</tr>
			';
			$kethtml='
				<tr>
				    <td class="tengah">備 注 Keterangan</td> 
				    <td colspan="5"> '.$rowpersonal->keterangan.' </td> 
				</tr>
			';
   		} 

       $tampil_data_family= $this->m_printout->tampil_data_family($id);

 		foreach ($tampil_data_family as $rowfamily) { 
			$keluargahtml='
				<tr>
					<td colspan="6" class="biru tengah">家庭資料 / Data Keluarga</td>
				</tr>
				<tr>
					<td colspan="2" class="coklat tengah">姓名 Nama dari</td>
					<td class="coklat tengah">年齡 Umur</td>
					<td class="coklat tengah">職業 Pekerjaan</td>
					<td>兄弟-saudara laki</td>
					<td class="kuning tengah">'.$rowfamily->saudara_laki.'</td>
				</tr>
				<tr>
				    <td class="tengah">父親 / Bapak</td> 
				    <td class="kuning tengah">'.$rowfamily->nama_bapak.'</td> 
				    <td class="kuning tengah">'.$rowfamily->umur_bapak.' tahun 嵗</td> 
				    <td class="kuning tengah">'.$rowfamily->kerja_bapak.'</td> 
				    <td>姐妹-saudara perempuan</td> 
				    <td class="kuning tengah">'.$rowfamily->saudar_pr.'</td> 
				</tr>
				<tr>
				    <td class="tengah">母親 / Ibu</td> 
				    <td class="kuning tengah">'.$rowfamily->nama_ibu.'</td> 
				    <td class="kuning tengah">'.$rowfamily->umur_ibu.' tahun 嵗</td> 
				    <td class="kuning tengah">'.$rowfamily->kerja_ibu.'</td> 
				    <td>排行-Anak ke</td> 
				    <td class="kuning tengah">'.$rowfamily->anak_ke.'</td> 
				</tr>
				<tr>
				    <td class="tengah">配偶 / Pasangan</td> 
				    <td class="kuning tengah">'.$rowfamily->nama_istri_suami.'</td> 
				    <td class="kuning tengah">'.$rowfamily->umur_istri_suami.' tahun 嵗</td> 
				    <td class="kuning tengah">'.$rowfamily->kerja_istri_suami.'</td> 
				    <td>子女人數anak </td> 
				    <td class="kuning tengah">'.$rowfamily->data_anak.'</td> 
				</tr>
			';
 		} 

        $tampil_data_working= $this->m_printout->tampil_data_working($id);

 		foreach ($tampil_data_working as $rowworking) { 
			$workinghtml .='
				<tr>
					<td rowspan="2" class=" tengah">'.$rowworking->negara.'</td>
					<td rowspan="2" class=" tengah">'.$rowworking->isi.''.$rowworking->mandarin.';</td>
					<td colspan="2" class=" tengah">'.$rowworking->posisi.'</td>
					<td rowspan="2" class=" tengah">'.$rowworking->masa_kerja.' '.$rowworking->masabulan.'<br>'.$rowworking->tahun.'</td>
					<td rowspan="2" class=" tengah">'.$rowworking->alasan.'</td>
				</tr>
				<tr>
					<td colspan="2" class=" tengah">'.$rowworking->penjelasan.'</td>
				</tr>
			';
		}


        $tampil_data_skill= $this->m_printout->tampil_data_skill($id);

 		foreach ($tampil_data_skill as $rowskill) {
			$kondisihtml='
				<tr>
					<th colspan="6" class="biru tengah">KETRAMPILAN 專長 &amp; KONDISI FISIK 物理條件</th>
				</tr>
				<tr>
					<td class="coklat"> 專長 Keterampilan</td>
					<td colspan="5" class=""> '.$rowskill->keterampilan.'</td>
				</tr>
				<tr>
					<td class="coklat"> 嗜好 Hobby</td>
					<td colspan="5" class=""> '.$rowskill->hobi.'</td>
				</tr>
				<tr>
				    <td class="coklat"> 酒-Alkohol</td> 
				    <td class=""> '.$rowskill->alkohol.'</td> 
				    <td class="coklat"> 煙merokok</td> 
				    <td class=""> '.$rowskill->merokok.'</td> 
				    <td class="coklat"> 飲食-food</td> 
				    <td class=""> '.$rowskill->food.'</td> 
				</tr>
				<tr>
					<td rowspan="4"> 身體狀況 Kondisi Fisik</td>
					<td> 過敏-alergi</td> 
				    <td colspan="2" class=""> '.$rowskill->alergi.'</td> 
				    <td colspan="2"> Bisa mengangkat 能夠抱 '.$rowskill->angkat.' KG 公斤</td> 
				</tr>
				<tr>
					<td> 開刀 Operasi</td> 
				    <td colspan="2" class=""> '.$rowskill->operasi.'</td> 
				    <td colspan="2"> Push up-推升 '.$rowskill->pushup.'</td>
				</tr>
				<tr>
					<td> 剌青-Tato</td> 
				    <td colspan="2" class=""> '.$rowskill->tato.'</td> 
				    <td class="coklat"> 視力-penglihatan mata</td> 
				    <td class=""> '.$rowskill->peglihatan.'</td>
				</tr>
				<tr>
				    <td> 左撇子-tangan kidal</td> 
				    <td colspan="2" class=""> '.$rowskill->kidal.'</td> 
				    <td class="coklat"> 色盲-buta warna</td> 
				    <td class=""> '.$rowskill->butawarna.'</td> 
				</tr>

			';

		}

        $tampil_data_request= $this->m_printout->tampil_data_request($id);

 		foreach ($tampil_data_request as $rowrequest) { 
			$permohonanhtml='
				<tr>
					<td colspan="6" class="biru tengah">請求 PERMOHONAN</td>
				</tr>
				<tr>
				    <td class="tengah">Usaha majikan 雇主企業類型</td> 
				    <td colspan="2" class="tengah "> '.$rowrequest->usahamajikan.'</td> 
				    <td class="tengah">Jenis Pekerjaan 工作類型</td> 
				    <td colspan="2" class="tengah "> '.$rowrequest->jenispekerjaan.'</td> 
				</tr>
				<tr>
				    <td class="tengah">Waktu kerja 願意工作時間</td> 
				    <td colspan="2" class="tengah "> '.$rowrequest->waktukerja.'</td> 
				    <td class="tengah">Lokasi kerja 工作地點</td> 
				    <td colspan="2" class="tengah "> '.$rowrequest->lokasikerja.'</td> 
				</tr>
				<tr>
				    <td class="tengah">Kondisi kerja 工作意願</td> 
				    <td colspan="2" class="tengah "> '.$rowrequest->kondisikerja.'</td> 
				    <td class="tengah">Lembur 加班</td> 
				    <td colspan="2" class="tengah "> '.$rowrequest->lembur.'</td> 
				</tr>
				'.$kethtml.'
			';
		}

        $tampil_data_interview= $this->m_printout->tampil_data_interview($id);

 		foreach ($tampil_data_interview as $rowinterview) { 
			$interviewhtml='
				<tr>
					<td colspan="6" class="biru tengah">面試評價 / Interview Appraisal</td>
				</tr>
				<tr>
					<td colspan="3" class="tengah">項 目 <br> ITEM</td>
					<td class="tengah"> 有經 EXPERIENCE</td>
					<td class="coklat tengah">訓練 <br> TRAINING</td>
					<td class="coklat tengah">願意做 WILINGNESS</td>
				</tr>
				<tr>
					<td colspan="3"> 抽痰 / SUCTION</td>
					<td class=" tengah"> '.$rowinterview->sunction.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				<tr>
					<td colspan="3"> 鼻胃管 / FOOD SONDING</td>
					<td class=" tengah"> '.$rowinterview->food.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				<tr>
					<td colspan="3"> 尿管 / CATETER</td>
					<td class=" tengah"> '.$rowinterview->cateter.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				<tr>
					<td colspan="3"> 注射 / INJECTION</td>
					<td class=" tengah"> '.$rowinterview->injection.'</td>
					<td class="coklat tengah"> N/沒有</td>
					<td class="coklat tengah"> N/沒有</td>
				</tr>
				<tr>
					<td colspan="3"> 拍背 / THERAPY BACK</td>
					<td class=" tengah"> '.$rowinterview->therapy.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				<tr>
					<td colspan="3"> 扶持 HELPING / CARRYING WHEN PARIENT WALKING</td>
					<td class=" tengah"> '.$rowinterview->helping.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				<tr>
					<td colspan="3"> 抱病人上下床 / 輪椅 CARRYINNG BATIENT UP / DOWN BED TO / FROM WHEELCHAIR</td>
					<td class=" tengah"> '.$rowinterview->bed.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				<tr>
					<td colspan="3"> 抱病人上下樓梯 CARRYINNG PATIENT UP / DOWN STAIRS</td>
					<td class=" tengah"> '.$rowinterview->stairs.'</td>
					<td class="coklat tengah">Y/有</td>
					<td class="coklat tengah">Y/有</td>
				</tr>
				'.$kethtml.'
			';
		}



		$tampil_data_paspor= $this->m_printout->tampil_data_paspor($id);

 		foreach ($tampil_data_paspor as $rowpaspor) { 
		if($rowpaspor->keterangan=="sudah"){
			$pasporhtml='
				<tr>
				    <td class="tengah">PASPORT / 護照</td> 
				    <td class="tengah biru"> 有- ADA </td> 
				    <td class="tengah">到期-Berlaku sampai</td> 
				    <td class="tengah biru"> '.$rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired).'</td> 
			';
			} elseif($rowpaspor->keterangan=="mati") {
			$pasporhtml='
				<tr>
				    <td class="tengah">PASPORT / 護照</td> 
				    <td class="tengah biru"> PASPOR MATI </td> 
				    <td class="tengah"> Rencana 安排 </td> 
				    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
			';
			} elseif($rowpaspor->keterangan=="exbio"){
			$pasporhtml='
				<tr>
				    <td class="tengah">PASPORT / 護照</td> 
				    <td class="tengah biru"> EX BIOMETRI </td> 
				    <td class="tengah"> Rencana 安排 </td> 
				    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
			';
			} else {
			$pasporhtml='
				<tr>
				    <td class="tengah">PASPORT / 護照</td> 
				    <td class="tengah biru"> 沒有- BELUM ADA </td> 
				    <td class="tengah"> Rencana 安排 </td> 
				    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
			';
			}
		}


		$tampil_data_medical= $this->m_printout->tampil_data_medical($id);
		$tampil_data_medical2= $this->m_printout->tampil_data_medical2($id);
		$tampil_data_medical3= $this->m_printout->tampil_data_medical3($id);
		$hitungmedicalsa= $this->m_printout->hitung_data_medical($id);
		$hitungmedical3= $this->m_printout->hitung_data_medical3($id);

		if($hitungmedicalsa==0) {
			foreach ($tampil_data_medical as $rowmedical) { 
				$medicalhtml=
				'
				    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
				    <td class="tengah biru"> '.$rowmedical->nama.'s</td> 
				</tr>
				';
			}
		} else {
			foreach ($tampil_data_medical2 as $rowmedical2) { 
				$medicalhtml=
				'
				    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
				    <td class="tengah biru"> '.$rowmedical2->nama.'a</td> 
				</tr>
				';
			}
	
		}

		if($hitungmedical3>0) {
	 		foreach ($tampil_data_medical3 as $rowmedical3) { 
				$medicalhtml=
				'
				    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
				    <td class="tengah biru"> '.$rowmedical3->nama.'s</td> 
				</tr>
				';
			}
		}

	    $tampil_data_personal= $this->m_printout->tampil_data_personal($id);
	 	foreach ($tampil_data_personal as $rowpersonalx) { 
			$notelhtml=
			'
			<tr>
			    <td> Handphone</td> 
			    <td colspan="2" class="kuning"> '.$rowpersonalx->notelp.'</td> 
			    <td> No. Keluarga</td> 
			    <td colspan="2" class="kuning"> '.$rowpersonalx->notelpkel.'</td> 
			 </tr>
			';
		}


		$arctam='<td colspan="4" width="100%" style="color: #0000FF; text-align: center;"></td>';
		$keterangantam='';

	    $tampil_data_arc= $this->m_printout->tampil_data_arc($id);

	 	foreach ($tampil_data_arc as $arc) { 

		$arctam=
			'
			<td colspan="4" width="100%" style="color: #0000FF; text-align: center;"><img src="assets/upload_arc/'.$arc->file.'"  style="max-width: auto; height: 140;"></td>				'
			;
		}


	    $tampil_data_keterangan= $this->m_printout->tampil_data_keterangan($id);

	 	foreach ($tampil_data_keterangan as $keterangan) { 
			$keterangantam.='
			<tr>
				<td colspan="4" class="header1" style="color: #ff3838;">'.$keterangan->namadok.'</td>
			</tr>
			<tr>
				<td colspan="4" style="color: #0000FF; text-align: center; padding-top:10px;"><img src="assets/upload_keterangan/'.$keterangan->file.'" style="max-width: auto; height: 140;"></td>
			</tr>			'
			;
		}

		$stat = substr($id, 0, 2);

		if($stat=='FF' || $stat=='MF' || $stat=='MI') {

   			$header = '
 				<style type="text/css">
		    		td, th {
						padding: 0px;
					}

					.biru {
						background-color: #a4d3ed;
					}

					.coklat {
						background-color: #e88e25;
					}

					.tengah {
						text-align: center;
					}
					
					.header1 {
						color: #13ad2c;
						font-size:18px;
						text-align: center;
					}

					.header2 {
						color: #ff3838;
						text-align: center;
					}
				</style>
				<!-- AWAL HEADER -->
		    	<table>
		    		<tr>
		    			<td colspan="6" class="header1">PT Flamboyan Gema Jasa</td>
		    		</tr>
		    		<tr>
		    			<td colspan="6" class="header2">Jl. Inspektur Suwoto No. 95B RT.02 RW.01 Ds.Sidodadi Kec.Lawang, Kab.Malang, East Java, Indonesia. Post code 65251 <br>Email : mahartatiang@yahoo.co.id</td>
		    		</tr>
		    	</table>
		    	<!-- AKHIR HEADER -->
				<!-- AWAL FORM 1 -->
				<table border="1">
					'.$personalhtml.''.$keluargahtml.'
					<tr>
						<th colspan="6" class="biru tengah">WORKING EXPERIENCE-工作經驗</th>
					</tr>
					<tr>
						<td rowspan="2" class="coklat tengah">受雇國家 Negara</td>
						<td rowspan="2" class="coklat tengah">Jenis Usaha 業務類別</td>
						<td colspan="2" class="coklat tengah">職務 Posisi</td>
						<td rowspan="2" class="coklat tengah">受雇期間 Masa Kerja</td>
						<td rowspan="2" class="coklat tengah">離職原因 Alasan berhenti bekerja</td>
					</tr>
					<tr>
						<td colspan="2" class="coklat tengah">工作性質 Penjelasan pekerjaan</td>
					</tr>
					'.$workinghtml.''.$kondisihtml.''.$permohonanhtml.''.$pasporhtml.''.$medicalhtml.''.$notelhtml.'
					<tr>
				    	<td colspan="6">
					    	本人保證以上填寫內容屬實, 若往後發現與事實不符, 本人願接受雇主無條件解雇, 且不要求任何賠償.<br>
					    	Saya menjamin semua yang saya tulis di atas benar adanya, jika pada akhirnya diketahui bahwa saya memberikan data palsu, saya bersedia dipecat tanpa ada komentar apa
					    </td> 
					 </tr>
				 	<tr>
				    	<td colspan="3"> 應徵者簽名 / Tanda tangan pelamar : </td> 
				    	<td colspan="3"> 評審者簽名 / Tanda tangan penilai :</td> 
					</tr>
				</table>

				<table  width="100%">
					<tbody>
						<tr>
							<td colspan="2" width="50%"></td>
							<td colspan="2" width="50%">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" width="50%"></td>
							<td colspan="2" width="50%">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<br pagebreak="true"> </br>
				<table border="1" width="100%" cellpadding="5">
					<tbody>
						<tr>
							<td colspan="4" width="100%" style="color: #0000FF; text-align: center;">ARC & Asuransi</td>
						</tr>
						<tr>
							'.$arctam.'
						</tr>
						'.$keterangantam.'
					</tbody>
				</table>

    		';
		}

		if($stat=='JP') {
   			$header = '
 				<style type="text/css">
			    	td, th {
						padding: 0px;
					}

					.biru {
						background-color: #a4d3ed;
					}

					.coklat {
						background-color: #e88e25;
					}

					.tengah {
						text-align: center;
					}
					
					.header1 {
						color: #13ad2c;
						font-size: 18px;
						text-align: center;
					}

					.header2 {
						color: #ff3838;
						text-align: center;
					}
				</style>
				<!-- AWAL HEADER -->
			    <table>
			    	<tr>
	    				<td colspan="6" class="header1">PT Flamboyan Gema Jasa</td>
	    			</tr>
	    			<tr>
	    				<td colspan="6" class="header2">Jl. Inspektur Suwoto No. 95B RT.02 RW.01 Ds.Sidodadi Kec.Lawang, Kab.Malang, East Java, Indonesia. Post code 65251 <br>Email : mahartatiang@yahoo.co.id</td>
	    			</tr>
	    		</table>
	    		<!-- AKHIR HEADER -->
				<!-- AWAL FORM 1 -->
				<table border="1">
					'.$personalhtml.''.$keluargahtml.'
					<tr>
						<th colspan="6" class="biru tengah">WORKING EXPERIENCE-工作經驗</th>
					</tr>
					<tr>
						<td rowspan="2" class="coklat tengah">受雇國家 Negara</td>
						<td rowspan="2" class="coklat tengah">Jenis Usaha 業務類別</td>
						<td colspan="2" class="coklat tengah">職務 Posisi</td>
						<td rowspan="2" class="coklat tengah">受雇期間 Masa Kerja</td>
						<td rowspan="2" class="coklat tengah">離職原因 Alasan berhenti bekerja</td>
					</tr>
					<tr>
						<td colspan="2" class="coklat tengah">工作性質 Penjelasan pekerjaan</td>
					</tr>
					'.$workinghtml.''.$interviewhtml.''.$pasporhtml.''.$medicalhtml.''.$notelhtml.'
					<tr>
			    		<td colspan="6">
				    		本人保證以上填寫內容屬實, 若往後發現與事實不符, 本人願接受雇主無條件解雇, 且不要求任何賠償.<br>
				    		Saya menjamin semua yang saya tulis di atas benar adanya, jika pada akhirnya diketahui bahwa saya memberikan data palsu, saya bersedia dipecat tanpa ada komentar apa
			    		</td> 
			 		</tr>
			 		<tr>
			    		<td colspan="3"> 應徵者簽名 / Tanda tangan pelamar : </td> 
			    		<td colspan="3"> 評審者簽名 / Tanda tangan penilai :</td> 
					</tr>
				</table>

				<table  width="100%">
					<tbody>
						<tr>
							<td colspan="2" width="50%"></td>
							<td colspan="2" width="50%">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" width="50%"></td>
							<td colspan="2" width="50%">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<br pagebreak="true"> </br>
				<table border="1" width="100%" cellpadding="5">
					<tbody>
						<tr>
							<td colspan="4" width="100%" style="color: #0000FF; text-align: center;">ARC & Asuransi</td>
						</tr>
						<tr>
							'.$arctam.'
						</tr>
						'.$keterangantam.'
					</tbody>
				</table>

   	 		';
		}

		if($stat=='FI') {
			$keluargafihtml='';
			$keluargafi2html='';
			$tugasfihtml='';

			$tampil_data_familyfi= $this->m_printout->tampil_data_family($id);

 			foreach ($tampil_data_familyfi as $rowfamilyfi) {
 				$hitungtahun=substr_count($rowfamilyfi->data_anak, 'tahun');
				$hitungbulan=substr_count($rowfamilyfi->data_anak, 'bulan');
				$hasilnya=$hitungbulan+$hitungtahun; 
				$keluargafihtml='
					<tr>
						<td colspan="2"> Nama Suami 配偶姓名</td>
						<td colspan="2" class="kuning"> '.$rowfamilyfi->nama_istri_suami.'</td>
					</tr>
					<tr>
						<td colspan="2"> Umur Suami 配偶年齡</td>
						<td colspan="2" class="kuning"> '.$rowfamilyfi->umur_istri_suami.'</td>
					</tr>
					<tr>
						<td colspan="2"> Pekerjaan Suami 配偶職業</td>
						<td colspan="2" class="biru"> '.$rowfamilyfi->kerja_istri_suami.'</td>
					</tr>
					<tr>
						<td colspan="2" rowspan="2"> Jumlah Anak <br> 子女數及年齡 </td>
						<td colspan="2" class="kuning"> '.$hasilnya.' anak</td>
					</tr>
					<tr>
						<td colspan="2" class="kuning"> '.$rowfamilyfi->data_anak.'</td>
					</tr>
				';
  
				$cwk=$rowfamilyfi->saudara_laki;
				$cwek=$rowfamilyfi->saudar_pr;
				$ttl=$cwk+$cwek;

 				$keluargafi2html='
					<tr>
						<td colspan="2"><b> Nama ayah 父親姓名</b></td>
						<td colspan="2" class="kuning tengah">'.$rowfamilyfi->nama_bapak.'</td>
						<td> Umur 年齡</td>
						<td class="kuning tengah">'.$rowfamilyfi->umur_bapak.' tahun 嵗</td>
					</tr>
					<tr>
						<td colspan="2"><b> Nama ibu 母親姓名</b></td>
						<td colspan="2" class="kuning tengah">'.$rowfamilyfi->nama_ibu.'</td>
						<td> Umur 年齡</td>
						<td class="kuning tengah">'.$rowfamilyfi->umur_ibu.' tahun 嵗</td>
					</tr>
					<tr>
						<td colspan="2"><b> Jumlah saudara 共有兄弟和姐妹</b></td>
						<td class="kuning tengah">'.$ttl.'</td>
						<td colspan="2"> Saya anak ke brp? 你是排第</td>
						<td class="kuning tengah">'.$rowfamilyfi->anak_ke.'</td>
					</tr>
				';
			} 


			$negarahtml='';
			$kerjahtml='';
			$lamahtml='';
			$periodehtml='';
			$jamhtml='';
			$majikanhtml='';
			$alasanhtml='';
			$lokasikerjahtml='';

			$rumah='';
			$masak='';
			$cucibaju='';
			$Menyetrika='';
			$cucimobil='';
			$merawatbinatang='';
			$merawatbayi='';
			$merawatanak='';
			$umuranak='';
			$kondisianak='';
			$umur='';
			$kondisinya='';
			$umur2='';
			$kondisinya2='';
			$merawatjompo='';
			$kondisijompo='';
			$anggotarumah='';
			$tiperumah='';
			$lantairumah='';
			$jumlahkamar='';
			$keterangan='';

 			$tampil_data_pengalamanfi= $this->m_printout->tampil_data_pengalaman($id);

 			foreach ($tampil_data_pengalamanfi as $rowpengalamanfi) { 
				$negarahtml.='<td class="biru tengah"> '.$rowpengalamanfi->negara.'</td>';
				$kerjahtml.='<td class="biru tengah"> '.$rowpengalamanfi->lokasikerja.'</td>';
				$lamahtml.='<td class="biru tengah"> '.$rowpengalamanfi->lamakerja.'</td>';
				$periodehtml.='<td class="biru tengah"> '.$rowpengalamanfi->periodekerja.'</td>';
				$jamhtml.='<td class="biru tengah"> '.$rowpengalamanfi->jamkerja.'</td>';
				$majikanhtml.='<td class="biru tengah"> '.$rowpengalamanfi->majikan.'</td>';
				$alasanhtml.='<td class="biru tengah"> '.$rowpengalamanfi->alasanberhenti.'</td>';

				$krjprt=$rowpengalamanfi->kerjaprt;
				$msk=$rowpengalamanfi->memasak;
				$cucibj=$rowpengalamanfi->mencucibaju;
				$strk=$rowpengalamanfi->setrikabaju;
				$cucimb=$rowpengalamanfi->mencucimobil;
				$rwtb=$rowpengalamanfi->rawatbinatang;

				if($krjprt=='1'){$krjprt='V';}else{$krjprt=' ';}
				if($msk=='1'){$msk='V';}else{$msk=' ';}
				if($cucibj=='1'){$cucibj='V';}else{$cucibj=' ';}
				if($strk=='1'){$strk='V';}else{$strk=' ';}
				if($cucimb=='1'){$cucimb='V';}else{$cucimb=' ';}
				if($rwtb=='1'){$rwtb='V';}else{$rwtb=' ';}

				$rumah.='<td class="hijau tengah"> '.$krjprt.'</td>';
				$masak.='<td class="hijau tengah"> '.$msk.'</td>';
				$cucibaju.='<td class="hijau tengah"> '.$cucibj.'</td>';
				$Menyetrika.='<td class="hijau tengah"> '.$strk.'</td>';
				$cucimobil.='<td class="hijau tengah"> '.$cucimb.'</td>';
				$merawatbinatang.='<td class="hijau tengah"> '.$rwtb.'</td>';



				$merawatbayi.='<td class="kuning tengah"> '.$rowpengalamanfi->rawatbayi.'</td>';
				$merawatanak.='<td class="kuning tengah"> '.$rowpengalamanfi->rawatanak.' Orang 位</td>';
				$umuranak.='<td class="kuning tengah"> '.$rowpengalamanfi->umur.'</td>';
				if ($rowpengalamanfi->rawatanak == NULL) {
					$kondisianak.='<td class="kuning tengah"> -</td>';
				} else {
					$kondisianak.='<td class="kuning tengah"> '.$rowpengalamanfi->kondisi.'</td>';
				}

				$umur.='<td class="kuning tengah"> '.$rowpengalamanfi->jompoumur.' Tahun 嵗</td>';
				$kondisinya.='<td class="biru tengah"> '.$rowpengalamanfi->jompokondisi.'</td>';
				 
				$umur2.='<td class="kuning tengah"> '.$rowpengalamanfi->jompoumur2.' Tahun 嵗</td>';
				$kondisinya2.='<td class="biru tengah"> '.$rowpengalamanfi->jompokondisi2.'</td>';
				 
				$merawatjompo.='<td class="kuning tengah"> '.$rowpengalamanfi->jompoumur.' sTahun 嵗</td>';
				$kondisijompo.='<td class="biru tengah"> '.$rowpengalamanfi->jompokondisi.'</td>';
				$anggotarumah.='<td class="kuning tengah"> '.$rowpengalamanfi->anggotarumah.' / Orang 名</td>';
				$tiperumah.='<td class="biru tengah"> '.$rowpengalamanfi->tiperumah.'</td>';
				$lantairumah.='<td class="kuning tengah"> '.$rowpengalamanfi->jumlahlantai.'</td>';
				$jumlahkamar.='<td class="kuning tengah"> '.$rowpengalamanfi->jumlahkamar.'</td>';
				$keterangan.='<td class="biru tengah"> '.$rowpengalamanfi->keterangan.'</td>';

 			}
 
			$detailpengalamanfi='
				<tr>
					<td colspan="2" style="color: #0000FF;"><b> PENGALAMAN KERJA 工作經驗</b></td>
					<td class="tengah" style="color: #0000FF;"><b>I</b></td>
					<td class="tengah" style="color: #0000FF;"><b>II </b></td>
					<td class="tengah" style="color: #0000FF;"><b>III </b></td>
					<td class="tengah" style="color: #0000FF;"><b>IV </b></td>
				</tr>
				<tr>
					<td colspan="2"> Negara 國家</td>
					'.$negarahtml.'
				</tr>
				<tr>
					<td colspan="2"> Lokasi Kerja Taiwan 台灣工作地點</td>
					'.$kerjahtml.'
				</tr>
				<tr>
					<td colspan="2"> Lama Kerja (tahun/bulan) 工作期 (年 / 月）</td>
					'.$lamahtml.'
				</tr>
				<tr>
					<td colspan="2"> Periode Kerja 工作期間</td>
					'.$periodehtml.'
				</tr>
				<tr>
					<td colspan="2"> Jam Kerja 日常工作時間</td>
					'.$jamhtml.'
				</tr>
				<tr>
					<td colspan="2"> Majikan 雇主</td>
					'.$majikanhtml.'
				</tr>
				<tr>
					<td colspan="2"> Alasan berhenti kerja 離職原因</td>
					'.$alasanhtml.'
				</tr>
				<tr>
					<td colspan="6" style="color: #0000FF;"><b> TUGAS 工作範圍</b></td>
				</tr>
				<tr>
					<td colspan="2"> Kerja rumah tangga 家務事</td>
					'.$rumah.'
				</tr>
				<tr>
					<td colspan="2"> Memasak 煮食</td>
					'.$masak.'
				</tr>
				<tr>
					<td colspan="2"> Mencuci Baju 洗衫</td>
					'.$cucibaju.'
				</tr>
				<tr>
					<td colspan="2"> Menyetrika Baju 燙衫</td>
					'.$Menyetrika.'
				</tr>
				<tr>
					<td colspan="2"> Mencuci Mobil 洗機車</td>
					'.$cucimobil.'
				</tr>
				<tr>
					<td colspan="2"> Merawat Binatang 照顧寵物</td>
					'.$merawatbinatang.'
				</tr>
				<tr>
					<td colspan="2"> Merawat Bayi 照料初生嬰兒</td>
					'.$merawatbayi.'
				</tr>
				<tr>
					<td colspan="2"> Merawat Anak Kecil 照顧小孩</td>
					'.$merawatanak.'
				</tr>
				<tr>
					<td colspan="2"> Umur 年齡 </td>
					'.$umuranak.'
				</tr>
				<tr>
					<td colspan="2"> Kondisi 情況</td>
					'.$kondisianak.'
				</tr>
				
				<tr>
					<td rowspan="2"> merawat orang jompo 照顧老人laki 男- </td>
					<td> umur-年齡</td>
					'.$umur.'
				</tr>
				<tr>
					<td> kondisi-年齡</td>
					'.$kondisinya.'
				</tr>
				<tr>
					<td rowspan="2"> merawat orang jompo 照顧老人Wanita 女-</td>
					<td>umur-年齡</td>
					'.$umur2.'
				</tr>
				<tr>
					<td> kondisi-年齡</td>
					'.$kondisinya2.'
				</tr>
				<tr>
					<td colspan="2"> Jumlah anggota rumah 家庭成員數目</td>
					'.$anggotarumah.'
				</tr>
				<tr>
					<td colspan="2"> Tipe rumah majikan 居住類型</td>
					'.$tiperumah.'
				</tr>
				<tr>
					<td colspan="2"> Rumah berapa lantai 樓</td>
					'.$lantairumah.'
				</tr>
				<tr>
					<td colspan="2"> Jumlah kamar tidur 睡房</td>
					'.$jumlahkamar.'
				</tr>
				<tr>
					<td colspan="2"><b> Keterangan 備註</b></td>
					'.$keterangan.'
				</tr>
			';





			$tampil_data_personalfi= $this->m_printout->tampil_data_personal($id);

				foreach ($tampil_data_personalfi as $rowpersonalx) { 
				$personalfihtml='
					<tr>
						<th colspan="4" class="coklat" style="font-size: 20px; background-color: #FBD4B4;"><b> PT. FLAMBOYAN GEMAJASA</b></th>
						<th colspan="2" class="coklat tengah" style="font-size: 20px; background-color: #FBD4B4;">'.$tampilidbio.'</th>
					</tr>
					<tr>
						<th colspan="4" class="hijau" style="font-size: 20px; background-color: #00BFFF;"><b> General Trade & Labour Supplier</b></th>
						<th colspan="2" class="hijau tengah" style="font-size: 20px"><b></b>'.$rowpersonalx->kode_sponsor.'</th>
					</tr>
					<tr>
						<th colspan="4" style="color: #0000FF;"><b> PENCATATAN KUALIFIKASI TKW 女傭資料</b> </th>
						<td colspan="2" class="tengah"></td>
					</tr>
					<tr>
						<td colspan="2"> Tanggal Daftar 進日期</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->tanggaldaftar.'</td>
						<td colspan="2" rowspan="21"><img src="assets/uploads/'.$rowpersonalx->foto.'" width="230" height="330"></td>
					</tr>
					<tr>
						<td colspan="2"> Nama 姓名</td>
						<td class="tengah"> '.$rowpersonalx->nama.'</td>
						<td class="tengah"> '.$rowpersonalx->nama_mandarin.'</td>
					</tr>
					
					<tr>
						<td colspan="2"> Tanggal Lahir 日期地點</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->tgllahir.'</td>
					</tr>
					<tr>
						<td colspan="2"> Tempat Lahir 出生地點</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->tempatlahir.'</td>
					</tr>
					<tr>
						<td colspan="2"> Umur 年齡</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->umur.' Tahun 歲</td>
					</tr>
					<tr>
						<td colspan="2"> Tinggi Badan 身高</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->tinggi.' cm 公分</td>
					</tr>
					<tr>
						<td colspan="2"> Berat Badan 體重</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->berat.' kg 公斤</td>
					</tr>
					<tr>
						<td colspan="2"> Pendidikan 學歷</td>
						<td colspan="2" class="biru"> '.$rowpersonalx->pendidikan.'</td>
					</tr>
					<tr>
						<td colspan="2"> Agama 宗教</td>
						<td colspan="2" class="biru"> '.$rowpersonalx->agama.'</td>
					</tr>
					<tr>
						<td colspan="2"> Status 婚姻狀況</td>
						<td colspan="2" class="biru"> '.$rowpersonalx->status.'</td>
					</tr>
					<tr>
						<td colspan="2"> Tanggal menikah / cerai hidup 結婚 / 离婚日期</td>
						<td colspan="2" class="kuning"> '.$rowpersonalx->tglmenikah.'</td>
					</tr>
					'.$keluargafihtml.'



					<tr>
						<td rowspan="5"><b><br> Kemampuan Bahasa <br> 語言能力</b></td>
						<td> Mandarin 中文</td>
						<td class="biru" colspan="2"> '.$rowpersonalx->mandarin.'</td>
					</tr>
					<tr>
						<td> Taiyu 台語</td>
						<td class="biru" colspan="2"> '.$rowpersonalx->taiyu.'</td>
					</tr>
					<tr>
						<td> Inggris 英文</td>
						<td class="biru" colspan="2"> '.$rowpersonalx->inggris.'</td>
					</tr>
					<tr>
						<td> Cantonese 廣東</td>
						<td class="biru" colspan="2"> '.$rowpersonalx->cantonese.'</td>
					</tr>
					<tr>
						<td> Hakka 客家</td>
						<td class="biru" colspan="2"> '.$rowpersonalx->hakka.'</td>
					</tr>
				';

				}

				$tampil_data_tugas= $this->m_printout->tampil_data_tugas($id);
			foreach ($tampil_data_tugas as $tugas) { 
				$tugasfihtml='
					<tr>
						<td width="28%"> Pekerjaan rumah tangga 家務</td>
						<td width="5%" class="tengah">'.$tugas->pekerjaan_rt.'</td>
						<td width="28%"> Merawat bayi baru Lahir 照顧嬰兒</td>
						<td width="5%" class="tengah">'.$tugas->merawat_bayi.'</td>
						<td width="28%" > Merawat orang cacat 老弱病殘</td>
						<td width="6%" class="tengah">'.$tugas->cacat.'</td>
					</tr>
					<tr> 
						<td> Merawat anak kecil 看護小孩</td>
						<td class="kuning tengah">'.$tugas->anak_kecil.'</td>
						<td> Memasak 烹飪</td>
						<td class="kuning tengah">'.$tugas->memasak.'</td>
						<td> Merawat orang jompo 看護老人</td>
						<td class="kuning tengah">'.$tugas->jompo.'</td>
					</tr>
				';
			}

				$tampil_data_kettugas= $this->m_printout->tampil_data_kettugas($id);
			$kettugasfihtml='';
			foreach ($tampil_data_kettugas as $kettugas) { 
				$kettugasfihtml='
					<tr>
						<td style="text-align: center;">1. </td>
						<td colspan="6"> Merawat bayi baru lahir sampai 3 bulan 照顧零至三個月大之小孩</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t1_pengalaman).'</td>
		                <td class="merah tengah"  style="color: #FF0000" > 雇主要求 </td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t1_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">2. </td>
						<td colspan="6"> Merawat bayi 3-12 bulan 照顧三至十二個月大的小孩</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t2_pengalaman).'</td>
		                <td class="merah tengah"  style="color: #FF0000" > 雇主要求 </td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t2_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">3. </td>
						<td colspan="6"> Merawat anak kecil 1-5 tahun 照顧一至五歲之小孩</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t3_pengalaman).'</td>
		                <td class="merah tengah"  style="color: #FF0000" > 雇主要求 </td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t3_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">4. </td>
						<td colspan="6"> Merawat anak kecil 5-10 tahun</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t4_pengalaman).'</td>
		                <td class="merah tengah"  style="color: #FF0000" > 雇主要求 </td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t4_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">5. </td>
						<td colspan="6"> Mengerjakan pekerjaan rumah umumnya 一般家務</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t5_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t5_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">6. </td>
						<td colspan="6"> Mencuci baju dengan mesin cuci 使用洗衣機</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t6_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t6_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">7. </td>
						<td colspan="6"> Memakai mesin penyedot debu 使用吸塵器</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t7_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t7_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">8. </td>
						<td colspan="6"> Mencuci baju dengan tangan 手洗衣服</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t8_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t8_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">9. </td>
						<td colspan="6"> Menjahit sederhana 縫糿</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t9_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t9_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">10. </td>
						<td colspan="6"> Menyetrika baju 燙衫</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t10_pengalaman).'</td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t10_latihan).'</td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t10_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">11. </td>
						<td colspan="6"> Memasak masakan cina 煮中國菜 / 豬肉</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t11_pengalaman).'</td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t11_latihan).'</td>
		                <td class="hijau tengah">'.str_replace("0"," ",$kettugas->t11_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">12. </td>
						<td colspan="6" class="kuning" style="background-color: #FBD4B4;"> Makan daging babi 願意吃豬肉</td>
						<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t12_pengalaman).'</td>
						<td class="kuning tengah" style="background-color: #FFFF00;"></td>
						<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t12_bersedia).'</td>
					</tr>
					<tr> 
						<td style="text-align: center;">13. </td>
						<td colspan="6" class="kuning" style="background-color: #FBD4B4;" > Merawat binatang anjing 願意照顧寵物(狗)</td>
						<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t13_pengalaman).'</td>
						<td class="kuning tengah" style="background-color: #FFFF00;"></td>
						<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t13_bersedia).'</td>
					</tr>
					<tr>
						<td rowspan="2"  style="text-align: center;">14. </td> 
						<td rowspan="2" colspan="5"> Tidur satu kamar dengan pasien 願意和被照顧的人一起睡</td>
						<td class="tengah" style="background-color: #FBD4B4;" >laki 男</td>
						<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t14apengalaman).'</td>
						<td class="kuning tengah" style="background-color: #FFFF00"></td>
						<td class="kuning tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t14abersedia).'</td>
					</tr>
					<tr>
						<td class="tengah"> wanita 女</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t14bpengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t14bbersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">15. </td>
						<td colspan="6"> Merawat orang cacat 照顧殘疾人仕</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t15_pengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t15_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">16. </td>
						<td colspan="6"> Merawat pasien dibawah 60 tahun 照顧病人 (60嵗下）</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t16_pengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t16_bersedia).'</td>
					</tr>
					<tr>
						<td style="text-align: center;">17. </td>
						<td colspan="6"> Merawat pasien diatas 60 tahun 照顧老人 / 病人 (60嵗上）</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t17_pengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t17_bersedia).'</td>
					</tr>
				</table>
				<table border="1">
					<tr>
						<td colspan="10" style="color: #0000FF;"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">A. </td>
						<td colspan="6"  width="65%"> Mengganti popok 換尿布</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t18_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t18_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">B. </td>
						<td colspan="6"> Menyuapi makan 餵食</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t19_pengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t19_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">C. </td>
						<td colspan="6"> Memandikan di kamar mandi 洗澡在廁所</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t20_pengalaman).'</td>
						<td class="hijau tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t20_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">D. </td>
						<td colspan="6"> Memandikan di ranjang 洗澡在床</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t21_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t21_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">E. </td>
						<td colspan="6"> Membersihkan buang air besar 處理大小便</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t22_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t22_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">F. </td>
						<td colspan="6"> Bangun di tengah malam 半夜要起床照顧病人</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t23_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t23_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">G. </td>
						<td colspan="6"> Membantu pasien jalan 扶持</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t24_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t24_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">H. </td>
						<td colspan="6"> Membantu pasien lemah 行動較弱需攙扶</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t25_pengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t25_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">I. </td>
						<td colspan="6"> Menemani pasien ke rumah sakit 陪同去醫院</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t26_pengalaman).'</td>
						<td class="tengah" style="background-color: #FFFF00;"></td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t26_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">J. </td>
						<td colspan="6"> Terapi 復健</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t27_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t27_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">K. </td>
						<td colspan="6"> Menggunakan kursi roda 用轮椅</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t28_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t28_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">L. </td>
						<td colspan="6" class="coklat" style="background-color: #FBD4B4;"> Suntik insulin 注射胰島素</td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t29_pengalaman).'</td>
						<td class="tengah" style="background-color: #FBD4B4;"></td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t29_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">M. </td>
						<td colspan="6" class="coklat" style="background-color: #FBD4B4;"> Sedot dahak 抽痰</td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t30_pengalaman).'</td>
						<td class="tengah" style="background-color: #FBD4B4;">V</td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t30_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">N. </td>
						<td colspan="6" class="coklat" style="background-color: #FBD4B4;"> Memberi makan lewat selang hidung 鼻胃管灌食</td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t31_pengalaman).'</td>
						<td class="tengah" style="background-color: #FBD4B4;">V</td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t31_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">O. </td>
						<td colspan="6" class="coklat" style="background-color: #FBD4B4;"> Katheter 尿管</td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t32_pengalaman).'</td>
						<td class="tengah" style="background-color: #FBD4B4;"></td>
						<td class="hijau tengah" style="background-color: #FBD4B4;">'.str_replace("0"," ",$kettugas->t32_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">P. </td>
						<td colspan="6"> Memisahkan pasien ranjang kursi roda dan sebaliknya 抱病人上下床/輪椅</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t33_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t33_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">Q. </td>
						<td colspan="6"> Menggendong pasien naik turun tangga 抱病人上下樓梯</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t34_pengalaman).'</td>
						<td class="tengah">V</td>
						<td class="hijau tengah">'.str_replace("0"," ",$kettugas->t34_bersedia).'</td>
					</tr>
					<tr>
						<td width="5%"  style="text-align: center;">R. </td>
						<td colspan="6"> Bisa menggendong pasien berapa kg? 可以携带多少公斤的病人?</td>
						<td colspan="3" class="kuning tengah">'.$kettugas->t35_kg.' <b>KG</b></td>
					</tr>
				';
				}


			$tampil_data_personal= $this->m_printout->tampil_data_personal($id);
				foreach ($tampil_data_personal as $rowpersonalx) { 
				$notelfihtml='
					<td colspan="2" class="kuning"> HANDPHONE : '.$rowpersonalx->notelp.'</td>
				';
				$notelfi2html='
					<td colspan="2" class="kuning"> HANDPHONE KELUARGA : '.$rowpersonalx->notelpkel.'</td>
				';
			}
			$rencanafipaspor='';

			$tampil_data_paspor= $this->m_printout->tampil_data_paspor($id);

			foreach ($tampil_data_paspor as $rowpaspor) { 

					if($rowpaspor->keterangan=="sudah"){
					$pasporfihtml='
						<td rowspan="2"> PASPORT 護照</td>
						<td rowspan="2"> 有- ADA </td>
						<td colspan="2" class="kuning">Berlaku sampai / 到期 <br> '.$rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired).'</td>
	
					';
				} elseif($rowpaspor->keterangan=="mati") {
					$pasporhtml='
						<tr>
						    <td class="tengah">PASPORT / 護照</td> 
						    <td class="tengah biru"> 護照关闭 - PASPOR MATI </td> 
						    <td class="tengah"> Rencana 安排 </td> 
						    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
					';
				} elseif($rowpaspor->keterangan=="exbio") {
					$pasporhtml='
						<tr>
						    <td class="tengah">PASPORT / 護照</td> 
						    <td class="tengah biru"> 護照丟失 - EX BIOMETRI </td> 
						    <td class="tengah"> Rencana 安排 </td> 
						    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
					';
				} else {
					$pasporfihtml='
						<td rowspan="2"> PASPORT 護照</td>
						<td rowspan="2"> 沒有- BELUM ADA </td>
						<td colspan="2" class="kuning"> Berlaku sampai / 到期 <br>  </td>
					';
					$rencanafipaspor='
						<td colspan="2" class="kuning"> Rencana 安排 : '.$rowpaspor->tglpengajuan.'</td>
					';
				}
			}
			$medicalfihtml ='<td rowspan="2"> PASPORT 護照</td>';
			$tampil_data_medical= $this->m_printout->tampil_data_medical($id);

			foreach ($tampil_data_medical as $rowmedical) { 
				$medicalfihtml='
					<td rowspan="2"> PASPORT 護照</td>
				';
			}

			$tampil_data_paspor= $this->m_printout->tampil_data_paspor($id);
				foreach ($tampil_data_paspor as $rowpaspor) { 

				if($rowpaspor->keterangan=="sudah") {

					$pasporhtml='
						<tr>
					    	<td class="tengah">PASPORT / 護照</td> 
					    	<td class="tengah biru"> 有- ADA </td> 
					    	<td class="tengah">到期-Berlaku sampai</td> 
					    	<td class="tengah biru"> '.$rowpaspor->tglterbit." - ".str_replace("-",".",$rowpaspor->expired).'</td> 
					';
				} elseif($rowpaspor->keterangan=="mati") {
					$pasporhtml='
						<tr>
						    <td class="tengah">PASPORT / 護照</td> 
						    <td class="tengah biru"> 護照关闭 - PASPOR MATI </td> 
						    <td class="tengah"> Rencana 安排 </td> 
						    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
					';
				} elseif($rowpaspor->keterangan=="exbio") {
					$pasporhtml='
						<tr>
						    <td class="tengah">PASPORT / 護照</td> 
						    <td class="tengah biru"> 護照丟失 - EX BIOMETRI </td> 
						    <td class="tengah"> Rencana 安排 </td> 
						    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
					';
				} else {
					$pasporhtml='
						<tr>
						    <td class="tengah">PASPORT / 護照</td> 
						    <td class="tengah biru"> 沒有- BELUM ADA </td> 
						    <td class="tengah"> Rencana 安排 </td> 
						    <td class="tengah biru"> '.$rowpaspor->tglterima.'</td> 
					';
				}
			}

			$tampil_data_medical= $this->m_printout->tampil_data_medical($id);
			$tampil_data_medical2= $this->m_printout->tampil_data_medical2($id);
			$hitungmedicalsa= $this->m_printout->hitung_data_medical($id);

			if($hitungmedicalsa==0) {
	 			foreach ($tampil_data_medical as $rowmedical) { 
					$medicalhtml='
			    			<td class="tengah">體檢-Pemeriksaan kesehatan</td> 
			    			<td class="tengah biru"> '.$rowmedical->nama.'s</td> 
						</tr>
					';
				}
			} else {
		 		foreach ($tampil_data_medical2 as $rowmedical2) { 
					$medicalhtml='
						    <td class="tengah">體檢-Pemeriksaan kesehatan</td> 
						    <td class="tengah biru"> '.$rowmedical2->nama.'a</td> 
						</tr>
					';
				}
			}


    		$tampil_data_personal= $this->m_printout->tampil_data_personal($id);
 			foreach ($tampil_data_personal as $rowpersonalx) { 
				$notelhtml='
					<tr>
					    <td> Handphone</td> 
					    <td colspan="2" class="kuning"> '.$rowpersonalx->notelp.'</td> 
					    <td> No. Keluarga</td> 
					    <td colspan="2" class="kuning"> '.$rowpersonalx->notelpkel.'</td> 
					 </tr>
				';
				$lokasikerjahtml='
					<tr>
					    <td class="tengah" colspan="2"> 工作地點要求 <br> Permintaan Lokasi Kerja </td> 
					    <td colspan="5" > '.$rowpersonalx->lokasikerja.'</td> 
					</tr>
				';
			}


			$arctam='<td colspan="4" width="100%" style="color: #0000FF; text-align: center;"></td>';
			$keterangantam='';

    		$tampil_data_arc= $this->m_printout->tampil_data_arc($id);

 			foreach ($tampil_data_arc as $arc) { 
				$arctam='
					<td colspan="4" width="100%" style="color: #0000FF; text-align: center;"><img src="assets/upload_arc/'.$arc->file.'"  style="max-width: auto; height: 140;"></td>				
				';
			}

    		$tampil_data_asuransi= $this->m_printout->tampil_data_asuransi($id);
 			foreach ($tampil_data_asuransi as $asuransi) { 
				$asuransitam='
					<td colspan="2" width="50%" style="color: #0000FF; text-align: center;"><img src="assets/upload_asuransilama/'.$asuransi->file.'" width="330" height="230"></td>
				';

			}



 			$header = '
  				<style type="text/css">
	    			td, th {
						padding: 5px;
					}

					.tengah {
						text-align: center;
					}
					
					.header1 {
						color: #13ad2c;
						font-size: 20px;
						text-align: center;
					}

					.header2 {
						color: #ff3838;
						text-align: center;
					}
				</style>
				<!-- AWAL FORM 1 -->
				<table border="1">
					'.$personalfihtml.''.$detailpengalamanfi.'
					<tr>
						<td colspan="6" style="color: #0000FF;"><b> LATAR BELAKANG KELUARGA 家庭狀況</b></td>
					</tr>
					'.$keluargafi2html.'
					<tr>
						<td colspan="6" style="color: #0000FF;"><b> Tugas dikerjakan dari terbaik (1) sampai dengan terburuk (6) 優先</b></td>
					</tr>'.$tugasfihtml.'
				</table>
				<table border="1" width="100%">
					<tr>
						<td width="5%"  style="text-align: center;"></td>
						<td colspan="6"  width="65%"></td>
						<td style="color: #0000FF; text-align: center;"><b>Pengalaman 經驗</b></td>
						<td style="color: #0000FF; text-align: center;"><b> Latihan 訓練</b></td>
						<td style="color: #0000FF; text-align: center;"><b> Bersedia 願意</b></td>
					</tr>
					'.$kettugasfihtml.'
				</table>
				<table border="1">
			
					'.$kethtml.'
					'.$lokasikerjahtml.'
					'.$pasporhtml.''.$medicalhtml.''.$notelhtml.'
				</table>
				</br>
				<table  width="100%">
					<tbody>
						<tr>
							<td colspan="2" width="50%"></td>
							<td colspan="2" width="50%">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" width="50%"></td>
							<td colspan="2" width="50%">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<br pagebreak="true"> </br>
				<table border="1" width="100%" cellpadding="5">
					<tbody>
						<tr>
							<td colspan="4" width="100%" style="color: #0000FF; text-align: center;">ARC & Asuransi</td>
						</tr>
						<tr>
						'.$arctam.'
						</tr>
					</tbody>
				</table>
    		';
		}