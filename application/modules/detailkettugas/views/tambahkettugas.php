<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

				<div class="alert alert-info">
					<button data-dismiss="alert" class="close"> x </button> Pastikan Id Biodata telah tampil pada form Id Biodata...
				</div>

				<div class="row-fluid">
                    <div class="span4">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>Detail ID Biodata </h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                            <div class="widget-body">
                            <?php foreach ($kettugas as $row) { ?>
                                <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
								<?php } ?>
									<div class="text-center control-group">
										<label class="control-label">ID BIODATA </label>
										<div class="controls">
											<input type="text" readonly id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="span7 popovers" data-trigger="hover" data-content="Auto Generated Id" data-original-title="ID Biodata"/>
										</div>
									</div>
									<span class="label label-important">NOTE!</span>
									<span>  Pastikan id biodata telah tampil dan foto sudah sesuai dengan data...</span>
                                </div>
                            </div>
                        </div>
					<div class="span8">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i>Tambah Keterangan Tugas</h4>
                                <span class="tools">
                                	<a href="javascript:;" class="icon-chevron-down"></a>
                                	<a href="javascript:;" class="icon-remove"></a>
                                </span>
                            </div>
                            <div class="widget-body">
								<form action="<?php echo site_url('detailkettugas/tambahkettugas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
									<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                    <div class="control-group"> <!-- Tugas 1 -->
										<label class="control-label span10">Merawat bayi baru lahir sampai 3 bulan<br>照顧零至三個月大之小孩</label>
									<!-- <div class="controls">
											<select name="t1_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t1_2" class="form-control span3">
												<option value="">-- Latihan --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t1_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div> -->
									<div class='controls'>
				                        <label class='checkbox inline'>
                            <input type='checkbox' value='' />
                            Magni
                        </label>
                        <label class='checkbox inline'>
                            <input type='checkbox' value='' />
                            Explicabo
                        </label>
                        <label class='checkbox inline'>
                            <input type='checkbox' value='' />
                            Odit
                        </label>
				                    </div>
				                </div>
									<div class="control-group"> <!-- Tugas 2 -->
										<label class="control-label span6">Merawat bayi 3-12 bulan <br>照顧三至十二個月大的小孩</label>
										<div class="controls">
											<select name="t2_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t2_2" class="form-control span3">
												<option value="">-- Latihan --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t2_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 3 -->
										<label class="control-label span6">Merawat anak kecil 1-5 tahun <br>照顧一至五歲之小孩</label>
										<div class="controls">
											<select name="t3_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t3_2" class="form-control span3">
												<option value="">-- Latihan --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t3_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 4 -->
										<label class="control-label span6">Merawat anak kecil 5-10 tahun</label>
										<div class="controls">
											<select name="t4_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t4_2" class="form-control span3">
												<option value="">-- Latihan --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t4_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 5 -->
										<label class="control-label span6">Mengerjakan pekerjaan rumah umumnya <br>一般家務</label>
										<div class="controls">
											<select name="t5_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t5_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t5_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 6 -->
										<label class="control-label span6">Mencuci baju dengan mesin cuci <br>使用洗衣機</label>
										<div class="controls">
											<select name="t6_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t6_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t6_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 7 -->
										<label class="control-label span6">Memakai mesin penyedot debu <br>使用吸塵器</label>
										<div class="controls">
											<select name="t7_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t7_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t7_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 8 -->
										<label class="control-label span6">Mencuci baju dengan tangan <br>手洗衣服</label>
										<div class="controls">
											<select name="t8_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t8_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t8_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 9 -->
										<label class="control-label span6">Menjahit sederhana <br>縫糿</label>
										<div class="controls">
											<select name="t9_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t9_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t9_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 10 -->
										<label class="control-label span6">Menyetrika baju <br>燙衫</label>
										<div class="controls">
											<select name="t10_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t10_2" class="form-control span3">
												<option value="">-- Latihan --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t10_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 11 -->
										<label class="control-label span6">Memasak masakan cina <br>煮中國菜 / 豬肉</label>
										<div class="controls">
											<select name="t11_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t11_2" class="form-control span3">
												<option value="">-- Latihan --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t11_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 12 -->
										<label class="control-label span6">Makan daging babi <br>願意吃豬肉</label>
										<div class="controls">
											<select name="t12_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select class="form-control span3" readonly>
											</select>
											<select name="t12_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 13 -->
										<label class="control-label span6">Merawat binatang anjing <br>願意照顧寵物(狗)</label>
										<div class="controls">
											<select name="t13_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select class="form-control span3" readonly>
											</select>
											<select name="t13_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 14a -->
										<label class="control-label span6">Tidur satu kamar dengan pasien (laki) <br>願意和被照顧的人一起睡 (男)</label>
										<div class="controls">
											<select name="t14a1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t14a2" class="form-control span3" readonly>
											</select>
											<select name="t14a3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 14b -->
										<label class="control-label span6">Tidur satu kamar dengan pasien (wanita) <br>願意和被照顧的人一起睡 (女)</label>
										<div class="controls">
											<select name="t14b1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t14b2" class="form-control span3" readonly>
											</select>
											<select name="t14b3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 15 -->
										<label class="control-label span6">Merawat orang cacat <br>照顧殘疾人仕</label>
										<div class="controls">
											<select name="t15_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t15_2" class="form-control span3" readonly>
											</select>
											<select name="t15_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 16 -->
										<label class="control-label span6">Merawat pasien dibawah 60 tahun <br>照顧病人 (60嵗下）</label>
										<div class="controls">
											<select name="t16_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t16_2" class="form-control span3" readonly>
											</select>
											<select name="t16_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 17 -->
										<label class="control-label span6">Merawat pasien diatas 60 tahun <br>照顧老人 / 病人 (60嵗上）</label>
										<div class="controls">
											<select name="t17_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t17_2" class="form-control span3" readonly>
											</select>
											<select name="t17_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label span12"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></label>
									</div>
									<div class="control-group"> <!-- Tugas 18 -->
										<label class="control-label span6">Mengganti popok <br>換尿布</label>
										<div class="controls">
											<select name="t18_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t18_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t18_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 19 -->
										<label class="control-label span6">Menyuapi makan <br>餵食</label>
										<div class="controls">
											<select name="t19_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t19_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t19_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 20 -->
										<label class="control-label span6">Memandikan di kamar mandi <br>洗澡在廁所</label>
										<div class="controls">
											<select name="t20_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t20_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t20_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 21 -->
										<label class="control-label span6">Memandikan di ranjang <br>洗澡在床</label>
										<div class="controls">
											<select name="t21_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t21_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t21_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 22 -->
										<label class="control-label span6">Membersihkan buang air besar <br>處理大小便</label>
										<div class="controls">
											<select name="t22_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t22_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t22_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 23 -->
										<label class="control-label span6">Bangun di tengah malam <br>半夜要起床照顧病人</label>
										<div class="controls">
											<select name="t23_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t23_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t23_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 24 -->
										<label class="control-label span6">Membantu pasien jalan <br>扶持</label>
										<div class="controls">
											<select name="t24_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t24_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t24_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 25 -->
										<label class="control-label span6">Membantu pasien lemah <br>行動較弱需攙扶</label>
										<div class="controls">
											<select name="t25_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t25_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t25_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 26 -->
										<label class="control-label span6">Menemani pasien ke rumah sakit <br>陪同去醫院</label>
										<div class="controls">
											<select name="t26_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t26_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t26_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 27 -->
										<label class="control-label span6">Terapi <br>復健</label>
										<div class="controls">
											<select name="t27_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t27_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t27_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 28 -->
										<label class="control-label span6">Menggunakan kursi roda <br>用轮椅</label>
										<div class="controls">
											<select name="t28_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t28_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t28_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 29 -->
										<label class="control-label span6">Suntik insulin <br>注射胰島素</label>
										<div class="controls">
											<select name="t29_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t29_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t29_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 30 -->
										<label class="control-label span6">Sedot dahak <br>抽痰</label>
										<div class="controls">
											<select name="t30_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t30_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t30_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 31 -->
										<label class="control-label span6">Memberi makan lewat selang hidung <br>鼻胃管灌食</label>
										<div class="controls">
											<select name="t31_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t31_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t31_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 32 -->
										<label class="control-label span6">Katheter <br>尿管</label>
										<div class="controls">
											<select name="t32_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t32_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t32_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 33 -->
										<label class="control-label span6">Memisahkan pasien ranjang kursi roda dan sebaliknya <br>抱病人上下床/輪椅</label>
										<div class="controls">
											<select name="t33_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t33_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t33_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 34 -->
										<label class="control-label span6">Menggendong pasien naik turun tangga <br>抱病人上下樓梯</label>
										<div class="controls">
											<select name="t34_1" class="form-control span3">
												<option value="">-- Pengalaman --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
											<select name="t34_2" class="form-control span3" readonly>
												<option value="V">Iya</option>
											</select>
											<select name="t34_3" class="form-control span3">
												<option value="">-- Bersedia --</option>
												<option value="V">Iya</option>
												<option value="-">Tidak</option>
											</select>
										</div>
									</div>
									<div class="control-group"> <!-- Tugas 35 -->
										<label class="control-label span6">Bisa menggendong pasien berapa kg? <br>可以携带多少公斤的病人?</label>
										<div class="controls">
											<input type="text" name="t35_kg" class="form-control">
										</div>
									</div>
									<div class="form-actions">
		                                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
		                                <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
		                            </div>
								</form>
     						</div>
                        </div>
                    </div>