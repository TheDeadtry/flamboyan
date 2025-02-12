                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail Biodata <small>Detail Personal Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail Personal</a><span class="divider-last">&nbsp;</span></li>
                            <li class="pull-right search-wrap">
                                <form class="hidden-phone" />
                                <div class="search-input-area">
                                    <input id=" " class="search-query" type="text" placeholder="Search" /><i class="icon-search"></i></div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>                    

<div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-user"></i>Profile</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                            <div class="widget-body">
                            <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                    <ul class="nav nav-tabs nav-stacked">
                                                                              <li label label-success><a href="<?php echo base_url()."index.php/detailpersonal/"?>"><i class="icon-user"></i> Personal data</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> working Data</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailrequest/"?>"><i class="icon-info-sign"></i> Request</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
                                                                                <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-user-md"></i> Passport</a></li>

<!--                                         <li><a href="javascript:void(0)"><i class="icon-user-md"></i> Interview Appraisal</a></li>
 -->
                                    </ul>
                                </div>
                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3">報到日期 Tanggal daftar  :</td>
                                                <td> <?php echo $row->tanggaldaftar;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">性別 Jenis kelamin :</td>
                                                <td> <?php echo $row->jeniskelamin;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">國籍 Warganegara :</td>
                                                <td> <?php echo $row->warganegara;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">身 高 Tinggi Badan :</td>
                                                <td> <?php echo $row->tinggi;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">體 重 Berat Badan :</td>
                                                <td> <?php echo $row->berat;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 宗 教 Agama :</td>
                                                <td> <?php echo $row->agama;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">生日 Tanggal lahir :</td>
                                                <td> <?php echo $row->tgllahir;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 出生地點 Tempat Lahir :</td>
                                                <td> <?php echo $row->tempatlahir;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 年 齡 Umur :</td>
                                                <td> <?php echo $row->umur." tahun 嵗";?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">婚姻狀況 Status :</td>
                                                <td> <?php echo $row->status;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> Tanggal menikah  :</td>
                                                <td> <?php echo $row->tglmenikah;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 教育程度 Pendidikan  :</td>
                                                <td> <?php echo $row->pendidikan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 地址 Alamat  :</td>
                                                <td> <?php echo $row->alamat;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 省份 Propinsi  :</td>
                                                <td> <?php echo $row->provinsi;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 語言能力  Bahasa </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 國語 Mandarin :</td>
                                                <td> <?php echo $row->mandarin;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 英語 Inggris  :</td>
                                                <td> <?php echo $row->inggris;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                     <?php } ?>

                                </div>
                                <div class="span3">
                                    
                                    <h4>Status Data </h4>
                                    <div class="alert alert-success"><i class="icon-ok-sign"></i> Personal Data</div>
                                    <div class="alert alert-danger"><i class="icon-remove-sign"></i> Family Data</div>
                                    <div class="alert alert-danger"><i class="icon-remove-sign"></i> Working Experience</div>
                                    <div class="alert alert-danger"><i class="icon-remove-sign"></i> Skill & physical</div>
                                    <div class="alert alert-danger"><i class="icon-remove-sign"></i> Request</div>
                                    <div class="alert alert-danger"><i class="icon-remove-sign"></i> Kesehatan</div>

                                    <h4>Print Dokumen</h4>
                                    <ul class="unstyled">
                                        <li><strong>Surat 1</strong>: <a href="javascript:void(0)">Perjanjian Penempatan</a></li>
                                        <li><strong>Surat 2</strong>: <a href="javascript:void(0)">Rekomendasi Ijin Keluarga</a></li>
                                        <li><strong>Surat 3</strong>: <a href="javascript:void(0)">Ijin Keluarga</a></li>
                                        <li><strong>Surat 4</strong>: <a href="<?php echo site_url('printout/sp_ahli_waris/'); ?>" target="_blank">Pernyataan Ahli Waris</a></li>
                                        <li><strong>Surat 5</strong>: <a href="javascript:void(0)">Rekomendasi Membuat SKCK</a></li>
                                        <li><strong>Surat 6</strong>: <a href="javascript:void(0)">Perjanjian Pernyataan</a></li>
                                        <li><strong>Surat 7</strong>: <a href="javascript:void(0)">Kuasa</a></li>
                                        <li><strong>Surat 8</strong>: <a href="javascript:void(0)">Pernyataan Legalitas</a></li>
                                        <li><strong>Surat 9</strong>: <a href="javascript:void(0)">exampleproject9.com</a></li>
                                        <li><strong>Surat 10</strong>: <a href="javascript:void(0)">exampleproject10.com</a></li>
                                        <li><strong>Surat 11</strong>: <a href="javascript:void(0)">exampleproject10.com</a></li>
                                        <li><strong>Surat 12</strong>: <a href="javascript:void(0)">exampleproject10.com</a></li>
                                        <li><strong>Surat 13</strong>: <a href="javascript:void(0)">exampleproject10.com</a></li>
                                    </ul>
                                </div>
                                <div class="space5"></div>
                            </div>
                        </div>
                    </div>
                </div>


