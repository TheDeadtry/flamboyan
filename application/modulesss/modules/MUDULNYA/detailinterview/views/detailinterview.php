                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail interview <small>Detail interview Pendaftar</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail interview</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailinterviewid ?></small></h4>
                                <?php }?>
<?php   
                                  if($hitunginterview==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Family Belum di input.. silahkan menambahkan data pada tombol ini... <a href="<?php echo base_url()."index.php/tambahinterview/"?>" class="btn btn-mini btn-primary">Tambah data interview</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... <a href="<?php echo base_url()."index.php/tambahinterview/"?>" class="btn btn-mini btn-primary">Ubah data</a>
                        </div>
                                 <?php foreach ($tampil_data_interview as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> 抽痰 SUCTION :</td>
                                                <td> <?php echo $row->sunction;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 鼻胃管 FOOD SONDING :</td>
                                                <td> <?php echo $row->food;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 尿管 CATETER :</td>
                                                <td> <?php echo $row->cateter;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 注射 INJECTION :</td>
                                                <td> <?php echo $row->injection;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2"> 拍背 THERAPY BACK :</td>
                                                <td> <?php echo $row->therapy;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2"> 扶持 HELPING /CARRYING WHEN PARIENT WALKING :</td>
                                                <td> <?php echo $row->helping;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 抱病人上下床/輪椅 CARRYING BATIENT UP/ DOWN BED TO/ FROM WHEELCHAIR :</td>
                                                <td> <?php echo $row->bed;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 抱病人上下樓梯 CARRYING PATIENT UP/ DOWN STAIRS :</td>
                                                <td> <?php echo $row->stairs;?> </td>
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


