                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail Skill <small>Detail Skill Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail Skill</a><span class="divider-last">&nbsp;</span></li>
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
                                        <li><a href="<?php echo base_url()."index.php/detailfamily/"?>"><i class="icon-group"></i> Family Data</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailworking/"?>"><i class="icon-briefcase"></i> Working Experience</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailskill/"?>"><i class="icon-legal"></i> Skill & physical</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailrequest/"?>"><i class="icon-info-sign"></i> Request</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailmedical/"?>"><i class="icon-user-md"></i> Medical</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailpaspor/"?>"><i class="icon-external-link"></i> Passport</a></li>
                                   
                                    <h5></h5>
                                    <h5> DOKUMEN DARI TAIWAN - 臺灣文件</h5>
                                    <li><a href="<?php echo base_url()."index.php/detailsuhan/"?>"><i class="icon-group"></i> Suhan</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailvisapermit/"?>"><i class="icon-briefcase"></i> Visa Permit</a></li>

<!--                                         <li><a href="javascript:void(0)"><i class="icon-user-md"></i> Interview Appraisal</a></li>
 -->
                                    </ul>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailskillid ?></small></h4>
                                <?php }?>
<?php   
                                  if($hitungskill==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Family Belum di input.. silahkan menambahkan data pada tombol ini... <a href="<?php echo base_url()."index.php/tambahskill/"?>" class="btn btn-mini btn-primary">Tambah data skill & condition</a>
                        </div>
                                 <?php
                                }else{ ?>
                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... <a href="<?php echo base_url()."index.php/tambahskill/"?>" class="btn btn-mini btn-primary">Ubah data</a>
                        </div>
                                 <?php foreach ($tampil_data_skill as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> 專長 Keterampilan :</td>
                                                <td> <?php echo $row->keterampilan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 嗜好 Hobby :</td>
                                                <td> <?php echo $row->hobi." tahun 嵗";?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 酒 Alkohol :</td>
                                                <td> <?php echo $row->alkohol;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 煙 merokok :</td>
                                                <td> <?php echo $row->merokok;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 飲食 food :</td>
                                                <td> <?php echo $row->food." tahun 嵗";?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span2"> 身體狀況 Kondisi Fisik</td> 
                                                 <td> </td>                                         
                                               </tr> 


                                             <tr>
                                                <td class="span2"> 過敏 alergi :</td>
                                                <td> <?php echo $row->alergi;?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span2"> 開刀 Operasi :</td>
                                                <td> <?php echo $row->operasi;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 剌青 Tato :</td>
                                                <td> <?php echo $row->tato." tahun 嵗";?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 左撇子 tangan kidal :</td>
                                                <td> <?php echo $row->kidal;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 能夠抱 Bisa mengangkat :</td>
                                                <td> <?php echo $row->angkat;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 推升 Push up :</td>
                                                <td> <?php echo $row->pushup;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 視力 penglihatan mata :</td>
                                                <td> <?php echo $row->peglihatan;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 色盲 buta warna :</td>
                                                <td> <?php echo $row->butawarna;?> </td>
                                            </tr>
                                            

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>


                            
                                   
                                     <?php }

                                 } ?>

                                </div>
                                <div class="span3">
                                 

                                    <h4>Print Dokumen</h4>
                                   <ul class="unstyled">
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Rekomendasi Pembuatan Ijin</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Perjanjian Penempatan</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Perjanjian Legalitas</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Pernyataan Ahli Waris</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Perjanjian Pernyataan</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Pengajuan UJK Flamboyan</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Pembuatan SKCK </a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Ijin Keluarga</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Perjanjian Kerja</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Surat Kuasa</a></li>
                                        <li><strong>Surat </strong>: <a href="javascript:void(0)">Biodata</a></li>
                                    </ul>
                                </div>
                                <div class="space5"></div>
                            </div>
                        </div>
                    </div>
                </div>


