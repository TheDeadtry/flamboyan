                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail suhan <small>Detail suhan suhant</small></h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail suhan</a><span class="divider-last">&nbsp;</span></li>
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
                                    <li><a href="<?php echo base_url()."index.php/lokal/"?>"><i class="icon-group"></i> Suhan</a></li>
                                        <li><a href="<?php echo base_url()."index.php/detailvisapermit/"?>"><i class="icon-briefcase"></i> Visa Permit</a></li>

<!--                                         <li><a href="javascript:void(0)"><i class="icon-user-md"></i> Interview Appraisal</a></li>
 -->
                                    </ul>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$lokalid ?></small></h4>
                                <?php }?>
<?php   
                                  if($hitungsuhan==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... <a href="<?php echo base_url()."index.php/tambahsuhan/"?>" class="btn btn-mini btn-primary">Tambah data suhan</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... <a href="<?php echo base_url()."index.php/tambahsuhan/v_ubahsuhan"?>" class="btn btn-mini btn-primary">Ubah data</a>
                        </div>
                                 <?php foreach ($tampil_data_suhan as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> 號碼 NO :</td>
                                                <td> <?php echo $row->no;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 發行日期 TGL TERBIT :</td>
                                                <td> <?php echo $row->tglterbit;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 到期 TGL EXP :</td>
                                                <td> <?php echo $row->tglexp;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">新受到日期 TGL TERIMA BARU :</td>
                                                <td> <?php echo $row->tglterima;?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 之前受到日期保留在印尼 TGL TERIMA DULU DISIMPAN DI INDONESIA :</td>
                                                <td> <?php echo $row->tglsimpan;?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 給工人帶回去臺灣-TGL DIBAWA TKI KE TAIWAN :</td>
                                                <td> <?php echo $row->tglbawa;?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 保留在印尼-TGL DIMINTA SIMPAN DI INDO :</td>
                                                <td> <?php echo $row->tglsimpan;?> </td>
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

                                <div class="space5"></div>
                            </div>
                        </div>
                    </div>
                </div>


