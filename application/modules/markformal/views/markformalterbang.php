
 <style type="text/css">

            .bg-blue-300, .bg-orange-800, .bg-orange-300, .bg-pink-300 {
                color: #000;
            }

            .kuning {
                background-color: #FCD5B4;
            }

            .coklat {
                background-color: #e88e25;
            }

            .yellow {
                background-color: #f7e031;
                border: 1px solid #ddd;
                border-color: #fff;
            }
             .merah {
                background-color: #FF99CC;
            }
            .biru {
                background-color: #B6DDE8;
            }
            .tengah {
                text-align: center;
            }
            


        </style>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">PROGRESS MARKETING</span>
                </h4>
            </div>

        </div>
        
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Filter Data</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="<?php echo site_url('markformal/setpilihnya'); ?>">

                            <div class="form-group">
                                <label class="control-label col-lg-2">Default select</label>
                                <div class="col-lg-10">
                                    <select  name="idagen" class="form-control">
                                       <?php foreach ($tampil_pilihan_agen as $row1) { 
                                       $sel3 = ($row1->id_agen == $idagen)?'selected="selected"':'';?>
                                      <option value="<?php echo $row1->id_agen;?>" <?php echo $sel3; ?> ><?php echo $row1->nama;?></option>
                                      <?php } ?>
                                    </select>
                                    <button type="submit" class="btn btn-info btn-medium" name="submit">Tampilkan Agen <?php echo $idagen;?></button>
                                    <a href="<?php echo site_url('dashboard/'); ?>" class='btn btn-info btn-medium' type="button">首頁 - HOME</a>
                                    <div class="btn-group btn-group-animated">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">已經入境 – SUDAH KE TAIWAN <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo site_url('markformal/tampidatagroup'); ?>"><i class="icon-spinner9"></i> 還沒入境 – BELUM KE TAIWAN</a></li>
                                            <li class="active"><a><i class="icon-person"></i>  已經入境 – SUDAH KE TAIWAN</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Complex headers example -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">PROGRESS MARKETING PABRIK-JOMPO - 工廠+養護機構 -進度表.<br/>已經入境 – SUDAH KE TAIWAN </h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered datatable-fixed-complex" >
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="4" class="bg-orange-300" >NO.</th>  
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th> 
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th>                                              
                                    <th scope="col" colspan="5" class="bg-orange-300" > 初始過程 PROSES AWAL </th>
                                    <th scope="col" colspan="3" class="yellow"> 挑到雇主 DAPAT MAJIKAN </th>
                                    <th scope="col" colspan="7" class="bg-pink-300"> 離境 KEBERANGKATAN </th>
                                    <th scope="col" colspan="11" class="yellow"> DOKUMEN DARI TAIWAN - 臺灣文件 </th>
                                    <th scope="col" colspan="25" class="bg-pink-300"> PROSES DOK DI INDONESIA (印尼文件） </th>
                                    <th scope="col" rowspan="2"  class="bg-blue-300" >備註</th>  
                                </tr>
                                <tr>   
                                    <th scope="col" colspan="3" class="bg-orange-300"> 外勞 - TKI </th>
                                    <th scope="col" colspan="2" class="bg-orange-300"> 雇主 </th>
                                    <th scope="col" rowspan="2"  class="bg-orange-300"> 履歷表給臺灣日期 </th>
                                    <th scope="col" colspan="4" class="bg-orange-300"> 勞工網上報名 TKI ONLINE DEPNAKER  </th>
                                    <th scope="col" rowspan="2" class="yellow"> 挑工 日期 </th>
                                    <th scope="col" rowspan="2" class="yellow"> 聘工表 </th>
                                    <th scope="col" rowspan="2" class="yellow"> 雇主要求入境 </th>
                                    <th scope="col" rowspan="2" colspan="2" class="bg-pink-300"> 入境 MASUK TAIWAN </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 班機 </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 下機張 </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 機票- </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300" colspan="2"> 飛TERBANG </th>
                                    <th scope="col" rowspan="1"  class="yellow"> 勞動契約 PK </th>
                                    <th scope="col" colspan="5"  class="bg-blue-300"> 核准函 SUHAN </th>
                                    <th scope="col" colspan="5" class="bg-orange-300"> 簽證函 VISA PERMIT </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300"> 久護照 PASPOR LAMA </th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> 新護照 PASPOR BARU </th>
                                    <th scope="col" colspan="5"  class="bg-pink-300"> 良民證 SKCK </th>
                                    <th scope="col" colspan="2"  class="bg-pink-300"> MEDIKAL FULL-大 體檢 </th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> VISA 簽證 </th>
                                    <th scope="col" colspan="5"  class="bg-pink-300"> 日期 TGL  </th>
                               
                                </tr>
                                <tr>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 姓名 NAMA </th>
                                    <th scope="col" colspan="1" class="bg-orange-300"></th>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 編號 </th>
                                    
                                    <th scope="col" colspan="1" class="bg-orange-300"> MAJIKAN </th>
                                    <th scope="col" colspan="1" class="bg-orange-300" ></th>
                                    <th scope="col" rowspan="2" class="bg-orange-300">  日期 TGL  </th>
                                    <th scope="col" rowspan="2" class="bg-orange-300"> 實A / 估-C </th>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 勞工網上報名號碼  </th>
                                    <th scope="col" colspan="1" class="bg-orange-300"> 護照號碼 </th>
                                    <th scope="col" rowspan="2"  class="yellow">受到日期 TGL TERIMA</th>
                                    <th scope="col" rowspan="1"  class="bg-blue-300">收件日</th>
                                    <th scope="col" rowspan="2"  class="bg-blue-300">號碼 NO</th>
                                    <th scope="col" rowspan="1"  class="bg-blue-300" colspan="2">日期 TGL</th>
                                    <th scope="col" rowspan="1"  class="bg-blue-300">備註</th>
                                    <th scope="col" rowspan="1" class="bg-orange-300">收件日</th>
                                    <th scope="col" rowspan="2" class="bg-orange-300">號碼 NO</th>
                                    <th scope="col" rowspan="1" class="bg-orange-300"colspan="2">日期 TGL</th>
                                    <th scope="col" rowspan="1" class="bg-orange-300">備註</th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" colspan="5"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" colspan="2"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" colspan="6"  class="bg-pink-300"> 日期 TGL </th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">貸款 LOAN</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">受訓-PAP</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">實A / 估-C</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">外勞卡 KTKLN</th>
                                    <th scope="col" rowspan="2"  class="bg-pink-300">實A / 估-C</th>
                                    <th scope="col" rowspan="2"  class="bg-blue-300" >KETERANGAN</th>  
                                                        
                                </tr>
                                <tr>      
                                    <th scope="col" class="bg-orange-300"> NO_INDUK </th>
                                    <th scope="col" class="bg-orange-300"> INDONESIA </th>
                                    <th scope="col" class="bg-orange-300"> MANDARIN </th>
                                    <th scope="col" class="bg-orange-300"> MANDARIN </th>
                                    <th scope="col" class="bg-orange-300" > ENGLISH </th>
                                    <th scope="col" class="bg-orange-300">TGL KIRIM BIO KE TAIWAN</th>
                                    <th scope="col" class="bg-orange-300"> NO ID ONLINE </th>
                                    <th scope="col" class="bg-orange-300"> NO PASPORT </th>
                                    <th scope="col" class="yellow">TGL TERPILIH</th>
                                    <th scope="col" class="yellow">JD</th>
                                    <th scope="col" class="yellow">TGL DIMINTA TERBANG</th>
                                    <th scope="col" class="bg-pink-300"> TGL日期 </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> RUTE_PENERBANGAN</th>
                                    <th scope="col" class="bg-pink-300">TUJUAN</th>
                                    <th scope="col" class="bg-pink-300">TIKET</th>
                                    <th scope="col" class="bg-pink-300"> TGL日期 </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-blue-300"> TGL TERIMA </th>
                                    <th scope="col" class="bg-blue-300"> 發行  TERBIT </th>
                                    <th scope="col" class="bg-blue-300"> 到期  EXP </th>
                                    <th scope="col" class="bg-blue-300"> KETERANGAN </th>
                                    <th scope="col" class="bg-orange-300"> TGL TERIMA </th>
                                    <th scope="col" class="bg-orange-300"> 發行  TERBIT </th>
                                    <th scope="col" class="bg-orange-300"> 到期  EXP </th>
                                    <th scope="col" class="bg-orange-300"> KETERANGAN </th>
                                    <th scope="col" class="bg-pink-300"> 到期EXP </th>
                                    <th scope="col" class="bg-pink-300"> 送 AJU </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 拍照  FOTO </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 受到 TERIMA </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 送PENGAJUAN </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 受到 TERIMA </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 到期 TGL EXP </th>
                                    <th scope="col" class="bg-pink-300"> 作-DILAKUKAN </th>
                                    <th scope="col" class="bg-pink-300"> 到期 EXP </th>
                                    <th scope="col" class="bg-pink-300">抽獎 KOCOKAN </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 指纹 FINGER PRINT </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                    <th scope="col" class="bg-pink-300"> 領 TERIMA </th>
                                    <th scope="col" class="bg-pink-300"> 實A / 估-C </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1; 
                                    for($i=0;$i<count($personal);$i++) { 
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td> <?php echo $personal[$i][0].$personal[$i][3].$personal[$i][4].$personal[$i][5].'-'.$personal[$i][6].$personal[$i][7].$personal[$i][8];?></td>
                                    <td> <?php echo $personal[$i][1];?></td>
                                    <td> <?php echo $personal[$i][2];?></td>
                                    <td> <?php echo $namamajikanman[$i];?></td>
                                    <td> <?php echo $namamajikan[$i];?></td>
                                        
                                    <td> <?php echo $tgltoagen[$i];?></td>
                                    <td> <?php echo $tgldisnaker[$i];?></td>
                                    <td> <?php echo $perkiraandisnaker[$i];?></td>
                                    <td> <?php echo $nodisnaker[$i];?></td>
                                    <td> <?php echo $tgterbitpaspor[$i];?></td>
                                    <td> <?php echo $terpilihmajikan[$i];?></td>
                                    <td> <?php echo $jdmajikan[$i];?></td>
                                    <td> <?php echo $terbangmajikan[$i];?></td>
                                    <td> <?php echo $tglberangkat[$i];?></td>
                                    <td> <?php echo $statusberangkat[$i];?></td>
                                    <td> <?php echo $keberangkatan[$i];?></td>
                                    <td> <?php echo $jamtiba[$i];?></td>
                                    <td>  <?php echo $tiket[$i];?></td>
                                    <td> <?php echo $tglnyaberangkat[$i];?></td>
                                    <td> <?php echo $statusterbang[$i];?></td>
                                    <td> <?php echo $tglpk[$i];?></td>
                                    <td> <?php echo $tglterimasuhan[$i];?></td>
                                    <td> <?php echo $no_suhan[$i];?></td>
                                    <td> <?php echo $tglterbit_suhan[$i];?></td>
                                    <td> <?php echo $tglexp_suhan[$i];?></td>
                                    <td> </td>
                                    <td> <?php echo $tglterimavisapermit[$i];?></td>
                                    <td> <?php echo $no_visapermit[$i];?></td>
                                    <td> <?php echo $tglterbit_visapermit[$i];?></td>
                                    <td> <?php echo $tglexp_visapermit[$i];?></td>
                                    <td> </td>
                                    <td> <?php echo $pasporlama[$i];?></td>
                                    <td> <?php echo $ajupaspor[$i];?></td>
                                    <td> <?php echo $ajustatpaspor[$i];?></td>
                                    <td> <?php echo $fotopaspor[$i];?></td>
                                    <td> <?php echo $fotostatpaspor[$i];?></td>
                                    <td> <?php echo $terimapaspor[$i];?></td>
                                    <td> <?php echo $terimastatpaspor[$i];?></td>
                                    <td> <?php echo $pengajuan_skck[$i];?></td>
                                    <td> <?php echo $pengajuanstat_skck[$i];?></td>
                                    <td> <?php echo $terima_skck[$i];?></td>
                                    <td> <?php echo $terimastat_skck[$i];?></td>
                                    <td> <?php echo $tglexp_skck[$i];?></td>
                                    <td><?php echo $medical[$i];?></td>
                                    <td> <?php echo $medicalexp[$i];?></td>
                                    <td> <?php echo $kocokan_visa[$i];?></td>
                                    <td> <?php echo $kocokanstats_visa[$i];?></td>
                                    <td><?php echo $finger_visa[$i];?></td>
                                    <td> <?php echo $fingerstats_visa[$i];?></td>
                                    <td> <?php echo $terima_visa[$i];?></td>
                                    <td> <?php echo $terimastats_visa[$i];?></td>
                                  
                                    <td> <?php echo $loanbank[$i];?></td>
                                    <td> <?php echo $pap_visa[$i];?></td>
                                    <td> <?php echo $papstats_visa[$i];?></td>
                                    <td> <?php echo $ktkln_visa[$i];?></td>
                                    <td> <?php echo $kklnstats_visa[$i];?></td>
                                    <td> 
                                        <a href="#" data-toggle="modal" data-target="#edit<?php echo $i; ?>"><i class="icon-pencil3"></i><span></span></a>
                                        <a href="#" data-toggle="modal" data-target="#lihat<?php echo $i; ?>"><i class="icon-bubbles"></i><span></span></a> 
                                        <?php 
                                            $result = substr($dataketerangan[$i], 0,10);
                                            echo  $result."";
                                        ?>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit<?php echo $i; ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('markformal/updateket'); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">TAMBAH KETERANGAN</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="idbio" value="<?php echo $personal[$i][0];?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>KETERANGAN </label>
                                                                <textarea rows="5" cols="5" name="keterangan" class="form-control" placeholder="Default textarea"><?php echo $dataketerangan[$i];?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="lihat<?php echo $i; ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('markformal/updateket'); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">LIHAT KETERANGAN</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="idbio" value="<?php echo $personal[$i][0];?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>KETERANGAN </label>
                                                                <textarea readonly rows="5" cols="5" name="keterangan" class="form-control" placeholder="Default textarea"><?php echo $dataketerangan[$i];?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $no++;
                                    } 
                                ?>
                                       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!-- /complex headers example -->
