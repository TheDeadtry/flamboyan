                <d class='row-fluid'>
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




<div class='row-fluid'>
<div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Keterangan Tugas</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
<?php foreach ($tampil_data_personal as $row2) { ?>
<div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row2->foto ?>" alt="" /></div>
                                     <?php 
                        $this->load->view('template/menudalam');
                    ?>
                                </div>

                                <div class="span9">
                                    <h4><?php echo $row2->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>
                                    <?php if($hitungkettugas == 0) { ?>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini...
                                    <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>

                                    </div>
                                    <?php } else { ?>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                                    <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>

                                    </div>






                      

                                    <?php foreach ($kettugas as $row) { ?>
                             <div class='span11 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Biodata Tkw</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td colspan="10" style="color: #348de0;"><b>Keterangan</b></td>
                                                <td style="color: #348de0;"><b>Pengalaman 經驗</b></td>
                                                <td style="color: #348de0;"><b>Latihan 訓練</b></td>
                                                <td style="color: #348de0;"><b>Bersedia 願意</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat bayi baru lahir sampai 3 bulan 照顧零至三個月大之小孩</td>
                                                <td class="hijau tengah"><?php echo $row->t1_pengalaman; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t1_latihan; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t1_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat bayi 3-12 bulan 照顧三至十二個月大的小孩</td>
                                                <td class="hijau tengah"><?php echo $row->t2_pengalaman; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t2_latihan; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t2_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat anak kecil 1-5 tahun 照顧一至五歲之小孩</td>
                                                <td class="hijau tengah"><?php echo $row->t3_pengalaman; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t3_latihan; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t3_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat anak kecil 5-10 tahun</td>
                                                <td class="hijau tengah"><?php echo $row->t4_pengalaman; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t4_latihan; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t4_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Mengerjakan pekerjaan rumah umumnya 一般家務</td>
                                                <td class="hijau tengah"><?php echo $row->t5_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t5_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Mencuci baju dengan mesin cuci 使用洗衣機</td>
                                                <td class="hijau tengah"><?php echo $row->t6_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t6_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Memakai mesin penyedot debu 使用吸塵器</td>
                                                <td class="hijau tengah"><?php echo $row->t7_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t7_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Mencuci baju dengan tangan 手洗衣服</td>
                                                <td class="hijau tengah"><?php echo $row->t8_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t8_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menjahit sederhana 縫糿</td>
                                                <td class="hijau tengah"><?php echo $row->t9_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t9_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menyetrika baju 燙衫</td>
                                                <td class="hijau tengah"><?php echo $row->t10_pengalaman; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t10_latihan; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t10_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Memasak masakan cina 煮中國菜 / 豬肉</td>
                                                <td class="hijau tengah"><?php echo $row->t11_pengalaman; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t11_latihan; ?></td>
                                                <td class="hijau tengah"><?php echo $row->t11_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" class="coklat">Makan daging babi 願意吃豬肉</td>
                                                <td class="hijau tengah"><?php echo $row->t12_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t12_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" class="coklat">Merawat binatang anjing 願意照顧寵物(狗)</td>
                                                <td class="hijau tengah"><?php echo $row->t13_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t13_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" colspan="9">Tidur satu kamar dengan pasien 願意和被照顧的人一起睡</td>
                                                <td class="coklat tengah">Wanita</td>
                                                <td class="hijau tengah"><?php echo $row->t14apengalaman; ?></td>
                                                <td class="tengah" style="background-color: #a3a3a3"></td>
                                                <td class="hijau tengah"><?php echo $row->t14abersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="tengah">Laki-Laki</td>
                                                <td class="hijau tengah"><?php echo $row->t14bpengalaman; ?></td>
                                                <td class="tengah" style="background-color: #a3a3a3"></td>
                                                <td class="hijau tengah"><?php echo $row->t14bbersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat orang cacat 照顧殘疾人仕</td>
                                                <td class="hijau tengah"><?php echo $row->t15_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t15_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat pasien dibawah 60 tahun 照顧病人 (60嵗下）</td>
                                                <td class="hijau tengah"><?php echo $row->t16_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t16_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Merawat pasien diatas 60 tahun 照顧老人 / 病人 (60嵗上）</td>
                                                <td class="hijau tengah"><?php echo $row->t17_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t17_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="color: #348de0;"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Mengganti popok 換尿布</td>
                                                <td class="hijau tengah"><?php echo $row->t18_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t18_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menyuapi makan 餵食</td>
                                                <td class="hijau tengah"><?php echo $row->t19_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t19_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Memandikan di kamar mandi 洗澡在廁所</td>
                                                <td class="hijau tengah"><?php echo $row->t20_pengalaman; ?></td>
                                                <td class="hijau tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t20_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Memandikan di ranjang 洗澡在床</td>
                                                <td class="hijau tengah"><?php echo $row->t21_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t21_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Membersihkan buang air besar 處理大小便</td>
                                                <td class="hijau tengah"><?php echo $row->t22_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t22_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Bangun di tengah malam 半夜要起床照顧病人</td>
                                                <td class="hijau tengah"><?php echo $row->t23_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t23_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Membantu pasien jalan 扶持</td>
                                                <td class="hijau tengah"><?php echo $row->t24_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t24_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Membantu pasien lemah 行動較弱需攙扶</td>
                                                <td class="hijau tengah"><?php echo $row->t25_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t25_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menemani pasien ke rumah sakit 陪同去醫院</td>
                                                <td class="hijau tengah"><?php echo $row->t26_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t26_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Terapi 復健</td>
                                                <td class="hijau tengah"><?php echo $row->t27_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t27_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menggunakan kursi roda 用轮椅</td>
                                                <td class="hijau tengah"><?php echo $row->t28_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t28_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" class="coklat">Suntik insulin 注射胰島素</td>
                                                <td class="hijau tengah"><?php echo $row->t29_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t29_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" class="coklat">Sedot dahak 抽痰</td>
                                                <td class="hijau tengah"><?php echo $row->t30_pengalaman; ?></td>
                                                <td class="coklat tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t30_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" class="coklat">Memberi makan lewat selang hidung 鼻胃管灌食</td>
                                                <td class="hijau tengah"><?php echo $row->t31_pengalaman; ?></td>
                                                <td class="coklat tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t31_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" class="coklat">Katheter 尿管</td>
                                                <td class="hijau tengah"><?php echo $row->t32_pengalaman; ?></td>
                                                <td class="tengah" style="background-color: #f21313;"></td>
                                                <td class="hijau tengah"><?php echo $row->t32_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Memisahkan pasien ranjang kursi roda dan sebaliknya 抱病人上下床/輪椅</td>
                                                <td class="hijau tengah"><?php echo $row->t33_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t33_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menggendong pasien naik turun tangga 抱病人上下樓梯</td>
                                                <td class="hijau tengah"><?php echo $row->t34_pengalaman; ?></td>
                                                <td class="tengah">V</td>
                                                <td class="hijau tengah"><?php echo $row->t34_bersedia; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="10">Menggendong pasien naik turun tangga 抱病人上下樓梯</td>
                                                <td colspan="3"><b><?php echo $row->t35_kg; ?> KG</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                 </div>
             </div>
         </br>
                                    <?php }} ?>
                                
                                </div>
                                <div class="space5"></div>


                            </div>
        </div>
  </div>
                     

          <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  
  <form action="<?php echo site_url('detailkettugas/tambahkettugas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                    <div class="control-group"> <!-- Tugas 1 -->
                                        <label class="control-label">Merawat bayi baru lahir sampai 3 bulan <br>照顧零至三個月大之小孩</label>
                                    

                                    <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t1_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t1_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t1_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>

                                    </div>
                                    <div class="control-group"> <!-- Tugas 2 -->
                                        <label class="control-label ">Merawat bayi 3-12 bulan <br>照顧三至十二個月大的小孩</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t2_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t2_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t2_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 3 -->
                                        <label class="control-label ">Merawat anak kecil 1-5 tahun <br>照顧一至五歲之小孩</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t3_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t3_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t3_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 4 -->
                                        <label class="control-label ">Merawat anak kecil 5-10 tahun</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t4_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t1_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t1_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 5 -->
                                        <label class="control-label ">Mengerjakan pekerjaan rumah umumnya <br>一般家務</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t5_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t5_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t5_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 6 -->
                                        <label class="control-label ">Mencuci baju dengan mesin cuci <br>使用洗衣機</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t6_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t6_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t6_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 7 -->
                                        <label class="control-label ">Memakai mesin penyedot debu <br>使用吸塵器</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t7_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t7_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t7_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 8 -->
                                        <label class="control-label ">Mencuci baju dengan tangan <br>手洗衣服</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t8_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t8_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t8_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 9 -->
                                        <label class="control-label ">Menjahit sederhana <br>縫糿</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t9_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t9_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t9_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>

                                    <div class="control-group"> <!-- Tugas 10 -->
                                        <label class="control-label ">Menyetrika baju <br>燙衫</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t10_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t10_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t10_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 11 -->
                                        <label class="control-label ">Memasak masakan cina <br>煮中國菜 / 豬肉</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t11_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t11_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t11_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 12 -->
                                        <label class="control-label ">Makan daging babi <br>願意吃豬肉</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t12_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t12_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t12_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 13 -->
                                        <label class="control-label ">Merawat binatang anjing <br>願意照顧寵物(狗)</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t13_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t13_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t13_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 14a -->
                                        <label class="control-label ">Tidur satu kamar dengan pasien (laki) <br>願意和被照顧的人一起睡 (男)</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14a_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14a_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14a_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 14b -->
                                        <label class="control-label ">Tidur satu kamar dengan pasien (wanita) <br>願意和被照顧的人一起睡 (女)</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14b_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14b_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14b_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 15 -->
                                        <label class="control-label ">Merawat orang cacat <br>照顧殘疾人仕</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t15_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t15_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t15_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 16 -->
                                        <label class="control-label ">Merawat pasien dibawah 60 tahun <br>照顧病人 (60嵗下）</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t16_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t16_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t16_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 17 -->
                                        <label class="control-label ">Merawat pasien diatas 60 tahun <br>照顧老人 / 病人 (60嵗上）</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t17_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t17_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t17_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span12"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></label>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 18 -->
                                        <label class="control-label ">Mengganti popok <br>換尿布</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t18_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t18_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t18_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 19 -->
                                        <label class="control-label ">Menyuapi makan <br>餵食</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t19_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t19_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t19_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 20 -->
                                        <label class="control-label ">Memandikan di kamar mandi <br>洗澡在廁所</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t20_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t20_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t20_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 21 -->
                                    <label class="control-label ">Memandikan di ranjang <br>洗澡在床</label>
                                    <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t21_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t21_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t21_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 22 -->
                                        <label class="control-label ">Membersihkan buang air besar <br>處理大小便</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t22_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t22_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t22_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 23 -->
                                        <label class="control-label ">Bangun di tengah malam <br>半夜要起床照顧病人</label>
                                     <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t23_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t23_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t23_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 24 -->
                                        <label class="control-label ">Membantu pasien jalan <br>扶持</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t24_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t24_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t24_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 25 -->
                                        <label class="control-label ">Membantu pasien lemah <br>行動較弱需攙扶</label>
                                        <<div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t25_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t25_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t25_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 26 -->
                                        <label class="control-label ">Menemani pasien ke rumah sakit <br>陪同去醫院</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t26_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t26_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t26_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 27 -->
                                        <label class="control-label ">Terapi <br>復健</label>
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t27_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t27_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t27_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 28 -->
                                        <label class="control-label ">Menggunakan kursi roda <br>用轮椅</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t28_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t28_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t28_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 29 -->
                                        <label class="control-label ">Suntik insulin <br>注射胰島素</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t29_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t29_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t29_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 30 -->
                                        <label class="control-label ">Sedot dahak <br>抽痰</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t30_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t30_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t30_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 31 -->
                                        <label class="control-label ">Memberi makan lewat selang hidung <br>鼻胃管灌食</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t31_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t31_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t31_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 32 -->
                                        <label class="control-label ">Katheter <br>尿管</label>
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t32_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t32_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t32_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 33 -->
                                        <label class="control-label ">Memisahkan pasien ranjang kursi roda dan sebaliknya <br>抱病人上下床/輪椅</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t33_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t33_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t33_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 34 -->
                                        <label class="control-label ">Menggendong pasien naik turun tangga <br>抱病人上下樓梯</label>
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t34_1" value='V' />
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t34_2" value='V' checked/>
                                        Latihan
                                    </label>
                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t34_3" value='V' />
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 35 -->
                                        <label class="control-label ">Bisa menggendong pasien berapa kg? <br>可以携带多少公斤的病人?</label>
                                        <div class="controls">
                                            <input type="text" name="t35_kg" class="form-control">
                                        </div>
                                    </div>
                                   <!--  <div class="form-actions">
                                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                        <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
                                    </div> -->
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>

            </div>

          <div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  
  <form action="<?php echo site_url('detailkettugas/updatekettugas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                      <?php foreach ($kettugas as $row) { ?>
                                    <div class="control-group"> <!-- Tugas 1 -->
                                        <label class="control-label">Merawat bayi baru lahir sampai 3 bulan <br>照顧零至三個月大之小孩</label>
                                    

                                    <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t1_pengalaman=='V'){?>
                                        <input type='checkbox' name="t1_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t1_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                    <?php if($row->t1_latihan=='V'){?>
                                        <input type='checkbox' name="t1_2" value='V' checked/>
                                         <?php }else{?>
                                    <input type='checkbox' name="t1_2" value='V'/>
                                   <?php }?>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t1_bersedia=='V'){?>
                                        <input type='checkbox' name="t1_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t1_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>

                                    </div>
                                    <div class="control-group"> <!-- Tugas 2 -->
                                        <label class="control-label ">Merawat bayi 3-12 bulan <br>照顧三至十二個月大的小孩</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t2_pengalaman=='V'){?>
                                        <input type='checkbox' name="t2_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t2_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                    <?php if($row->t2_latihan=='V'){?>
                                        <input type='checkbox' name="t2_2" value='V' checked/>
                                         <?php }else{?>
                                    <input type='checkbox' name="t2_2" value='V'/>
                                   <?php }?>
                                        Latihan
                                    </label>

                                     <label class='checkbox inline'>
                                     <?php if($row->t2_bersedia=='V'){?>
                                        <input type='checkbox' name="t2_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t2_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>

                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 3 -->
                                        <label class="control-label ">Merawat anak kecil 1-5 tahun <br>照顧一至五歲之小孩</label>
                                       
                                    <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t3_pengalaman=='V'){?>
                                        <input type='checkbox' name="t3_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t3_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                    <?php if($row->t3_latihan=='V'){?>
                                        <input type='checkbox' name="t3_2" value='V' checked/>
                                         <?php }else{?>
                                    <input type='checkbox' name="t3_2" value='V'/>
                                   <?php }?>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t3_bersedia=='V'){?>
                                        <input type='checkbox' name="t3_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t3_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>

                                    </div>
                                    <div class="control-group"> <!-- Tugas 4 -->
                                        <label class="control-label ">Merawat anak kecil 5-10 tahun</label>
                                       
                                    <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t4_pengalaman=='V'){?>
                                        <input type='checkbox' name="t4_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t4_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                    <?php if($row->t4_latihan=='V'){?>
                                        <input type='checkbox' name="t4_2" value='V' checked/>
                                         <?php }else{?>
                                    <input type='checkbox' name="t4_2" value='V'/>
                                   <?php }?>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t4_bersedia=='V'){?>
                                        <input type='checkbox' name="t4_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t4_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>

                                    </div>
                                    <div class="control-group"> <!-- Tugas 5 -->
                                        <label class="control-label ">Mengerjakan pekerjaan rumah umumnya <br>一般家務</label>

                                        <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t5_pengalaman=='V'){?>
                                        <input type='checkbox' name="t5_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t5_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t5_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t5_bersedia=='V'){?>
                                        <input type='checkbox' name="t5_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t5_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>

                                    </div>
                                    <div class="control-group"> <!-- Tugas 6 -->
                                        <label class="control-label ">Mencuci baju dengan mesin cuci <br>使用洗衣機</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t6_pengalaman=='V'){?>
                                        <input type='checkbox' name="t6_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t6_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t6_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t6_bersedia=='V'){?>
                                        <input type='checkbox' name="t6_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t6_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
                                        
                                    </div>
                                    <div class="control-group"> <!-- Tugas 7 -->
                                        <label class="control-label ">Memakai mesin penyedot debu <br>使用吸塵器</label>
                                        <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t7_pengalaman=='V'){?>
                                        <input type='checkbox' name="t7_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t7_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t7_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t7_bersedia=='V'){?>
                                        <input type='checkbox' name="t7_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t7_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
                                        
                                    </div>
                                    <div class="control-group"> <!-- Tugas 8 -->
                                        <label class="control-label ">Mencuci baju dengan tangan <br>手洗衣服</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t8_pengalaman=='V'){?>
                                        <input type='checkbox' name="t8_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t8_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t8_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t8_bersedia=='V'){?>
                                        <input type='checkbox' name="t8_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t8_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
                                        
                                    </div>
                                    <div class="control-group"> <!-- Tugas 9 -->
                                        <label class="control-label ">Menjahit sederhana <br>縫糿</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t9_pengalaman=='V'){?>
                                        <input type='checkbox' name="t9_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t9_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t9_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t9_bersedia=='V'){?>
                                        <input type='checkbox' name="t9_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t9_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
                                        
                                    </div>
                                    <div class="control-group"> <!-- Tugas 10 -->
                                        <label class="control-label ">Menyetrika baju <br>燙衫</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t10_pengalaman=='V'){?>
                                        <input type='checkbox' name="t10_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t10_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                    <?php if($row->t10_latihan=='V'){?>
                                        <input type='checkbox' name="t10_2" value='V' checked/>
                                         <?php }else{?>
                                    <input type='checkbox' name="t10_2" value='V'/>
                                   <?php }?>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t10_bersedia=='V'){?>
                                        <input type='checkbox' name="t10_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t10_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 11 -->
                                        <label class="control-label ">Memasak masakan cina <br>煮中國菜 / 豬肉</label>
                                       <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t11_pengalaman=='V'){?>
                                        <input type='checkbox' name="t11_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t11_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>
                                    <label class='checkbox inline'>
                                    <?php if($row->t11_latihan=='V'){?>
                                        <input type='checkbox' name="t11_2" value='V' checked/>
                                         <?php }else{?>
                                    <input type='checkbox' name="t11_2" value='V'/>
                                   <?php }?>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t11_bersedia=='V'){?>
                                        <input type='checkbox' name="t11_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t11_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
                                    </div>

                                    <div class="control-group"> <!-- Tugas 12 -->
                                        <label class="control-label ">Makan daging babi <br>願意吃豬肉</label>

                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t12_pengalaman=='V'){?>
                                        <input type='checkbox' name="t12_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t12_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t12_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t12_bersedia=='V'){?>
                                        <input type='checkbox' name="t12_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t12_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 13 -->
                                        <label class="control-label ">Merawat binatang anjing <br>願意照顧寵物(狗)</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t13_pengalaman=='V'){?>
                                        <input type='checkbox' name="t13_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t13_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t13_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t13_bersedia=='V'){?>
                                        <input type='checkbox' name="t13_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t13_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 14a -->
                                        <label class="control-label ">Tidur satu kamar dengan pasien (laki) <br>願意和被照顧的人一起睡 (男)</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t14apengalaman=='V'){?>
                                        <input type='checkbox' name="t14a_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t14a_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14a_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t14abersedia=='V'){?>
                                        <input type='checkbox' name="t14a_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t14a_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 14b -->
                                        <label class="control-label ">Tidur satu kamar dengan pasien (wanita) <br>願意和被照顧的人一起睡 (女)</label>
                                       
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t14bpengalaman=='V'){?>
                                        <input type='checkbox' name="t14b_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t14b_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t14b_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t14bbersedia=='V'){?>
                                        <input type='checkbox' name="t14b_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t14b_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 15 -->
                                        <label class="control-label ">Merawat orang cacat <br>照顧殘疾人仕</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t15_pengalaman=='V'){?>
                                        <input type='checkbox' name="t15_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t15_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t15_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t15_bersedia=='V'){?>
                                        <input type='checkbox' name="t15_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t15_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 16 -->
                                        <label class="control-label ">Merawat pasien dibawah 60 tahun <br>照顧病人 (60嵗下）</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t16_pengalaman=='V'){?>
                                        <input type='checkbox' name="t16_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t16_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t16_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t16_bersedia=='V'){?>
                                        <input type='checkbox' name="t16_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t16_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 17 -->
                                        <label class="control-label ">Merawat pasien diatas 60 tahun <br>照顧老人 / 病人 (60嵗上）</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t17_pengalaman=='V'){?>
                                        <input type='checkbox' name="t17_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t17_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t17_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t17_bersedia=='V'){?>
                                        <input type='checkbox' name="t17_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t17_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label span12"><b>Kegiatan Menjaga Pasien 照顧病人的活動</b></label>
                                    </div>
                                    <div class="control-group"> <!-- Tugas 18 -->
                                        <label class="control-label ">Mengganti popok <br>換尿布</label>
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t18_pengalaman=='V'){?>
                                        <input type='checkbox' name="t18_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t18_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t18_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t18_bersedia=='V'){?>
                                        <input type='checkbox' name="t18_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t18_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 19 -->
                                        <label class="control-label ">Menyuapi makan <br>餵食</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t19_pengalaman=='V'){?>
                                        <input type='checkbox' name="t19_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t19_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t19_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t19_bersedia=='V'){?>
                                        <input type='checkbox' name="t19_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t19_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 20 -->
                                        <label class="control-label ">Memandikan di kamar mandi <br>洗澡在廁所</label>
                                       
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t20_pengalaman=='V'){?>
                                        <input type='checkbox' name="t20_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t20_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t20_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t20_bersedia=='V'){?>
                                        <input type='checkbox' name="t20_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t20_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 21 -->
                                    <label class="control-label ">Memandikan di ranjang <br>洗澡在床</label>
                                    
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t21_pengalaman=='V'){?>
                                        <input type='checkbox' name="t21_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t21_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t21_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t21_bersedia=='V'){?>
                                        <input type='checkbox' name="t21_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t21_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 22 -->
                                        <label class="control-label ">Membersihkan buang air besar <br>處理大小便</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t22_pengalaman=='V'){?>
                                        <input type='checkbox' name="t22_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t22_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t22_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t22_bersedia=='V'){?>
                                        <input type='checkbox' name="t22_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t22_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 23 -->
                                        <label class="control-label ">Bangun di tengah malam <br>半夜要起床照顧病人</label>
                                    
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t23_pengalaman=='V'){?>
                                        <input type='checkbox' name="t23_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t23_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t23_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t23_bersedia=='V'){?>
                                        <input type='checkbox' name="t23_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t23_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 24 -->
                                        <label class="control-label ">Membantu pasien jalan <br>扶持</label>
                                    
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t24_pengalaman=='V'){?>
                                        <input type='checkbox' name="t24_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t24_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t24_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t24_bersedia=='V'){?>
                                        <input type='checkbox' name="t24_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t24_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 25 -->
                                        <label class="control-label ">Membantu pasien lemah <br>行動較弱需攙扶</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t25_pengalaman=='V'){?>
                                        <input type='checkbox' name="t25_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t25_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t25_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t25_bersedia=='V'){?>
                                        <input type='checkbox' name="t25_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t25_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 26 -->
                                        <label class="control-label ">Menemani pasien ke rumah sakit <br>陪同去醫院</label>
                                       
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t26_pengalaman=='V'){?>
                                        <input type='checkbox' name="t26_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t26_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t26_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t26_bersedia=='V'){?>
                                        <input type='checkbox' name="t26_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t26_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 27 -->
                                        <label class="control-label ">Terapi <br>復健</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t27_pengalaman=='V'){?>
                                        <input type='checkbox' name="t27_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t27_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t27_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t27_bersedia=='V'){?>
                                        <input type='checkbox' name="t27_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t27_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 28 -->
                                        <label class="control-label ">Menggunakan kursi roda <br>用轮椅</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t28_pengalaman=='V'){?>
                                        <input type='checkbox' name="t28_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t28_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t28_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t28_bersedia=='V'){?>
                                        <input type='checkbox' name="t28_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t28_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 29 -->
                                        <label class="control-label ">Suntik insulin <br>注射胰島素</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t29_pengalaman=='V'){?>
                                        <input type='checkbox' name="t29_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t29_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t29_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t29_bersedia=='V'){?>
                                        <input type='checkbox' name="t29_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t29_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 30 -->
                                        <label class="control-label ">Sedot dahak <br>抽痰</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t30_pengalaman=='V'){?>
                                        <input type='checkbox' name="t30_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t30_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t30_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t30_bersedia=='V'){?>
                                        <input type='checkbox' name="t30_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t30_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 31 -->
                                        <label class="control-label ">Memberi makan lewat selang hidung <br>鼻胃管灌食</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t31_pengalaman=='V'){?>
                                        <input type='checkbox' name="t31_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t31_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t31_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t31_bersedia=='V'){?>
                                        <input type='checkbox' name="t31_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t31_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 32 -->
                                        <label class="control-label ">Katheter <br>尿管</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t32_pengalaman=='V'){?>
                                        <input type='checkbox' name="t32_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t32_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t32_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t32_bersedia=='V'){?>
                                        <input type='checkbox' name="t32_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t32_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 33 -->
                                        <label class="control-label ">Memisahkan pasien ranjang kursi roda dan sebaliknya <br>抱病人上下床/輪椅</label>
                                      
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t33_pengalaman=='V'){?>
                                        <input type='checkbox' name="t33_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t33_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t33_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t33_bersedia=='V'){?>
                                        <input type='checkbox' name="t33_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t33_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>
                                    <div class="control-group"> <!-- Tugas 34 -->
                                        <label class="control-label ">Menggendong pasien naik turun tangga <br>抱病人上下樓梯</label>
                                     
                                      <div class="controls">
                                    <label class='checkbox inline'>
                                    <?php if($row->t34_pengalaman=='V'){?>
                                        <input type='checkbox' name="t34_1" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t34_1" value='V'/>
                                   <?php }?>
                                        Pengalaman
                                    </label>

                                    <label class='checkbox inline'>
                                        <input type='checkbox' name="t34_2" value='V' checked/>
                                        Latihan
                                    </label>
                                     <label class='checkbox inline'>
                                     <?php if($row->t34_bersedia=='V'){?>
                                        <input type='checkbox' name="t34_3" value='V' checked/>
                                     <?php }else{?>
                                    <input type='checkbox' name="t34_3" value='V'/>
                                   <?php }?>
                                        Bersedia
                                    </label>
                                        </div>
 
                                    </div>

                                    <div class="control-group"> <!-- Tugas 35 -->
                                        <label class="control-label ">Bisa menggendong pasien berapa kg? <br>可以携带多少公斤的病人?</label>
                                        <div class="controls">
                                            <input type="text" name="t35_kg" class="form-control" value="<?php echo $row->t35_kg; ?>">
                                        </div>
                                    </div>
                                     <?php }?>
                                   <!--  <div class="form-actions">
                                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                        <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
                                    </div> -->
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>

            </div>