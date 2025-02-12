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


	                       

<div class="row-fluid">

     <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Interview</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
  <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                     <?php 
                        $this->load->view('template/menudalam');
                    ?>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>
<?php   
                                  if($hitunginterview==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Family Belum di input.. silahkan menambahkan data pada tombol ini... 
                         <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                         <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
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
  
<form action="<?php echo site_url('tambahinterview/tambahinterviewdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                                <div class="control-group">
                                                                <label class="control-label span7"> 有經 EXPERIENCE </label>

                                                                <div class="controls">

                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> 抽痰 SUCTION </label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="sunction" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 鼻胃管 FOOD SONDING</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="food" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 尿管 CATETER</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="cateter" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 注射 INJECTION</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="injection" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 拍背 THERAPY BACK</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="therapy" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 扶持 HELPING /CARRYING WHEN PARIENT WALKING</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="helping" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 抱病人上下床/輪椅 CARRYING BATIENT UP/ DOWN BED TO/ FROM WHEELCHAIR</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="bed" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label span4"> 抱病人上下樓梯 CARRYING PATIENT UP/ DOWN STAIRS</label>
                                                                <div class="controls">
                                                                    <select class="span4 " name="stairs" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Y/有" />Y/有
                                                                        <option value="N/ 沒有" />N/ 沒有
                                                                        </select>
                                                                </div>
                                                            </div>                      
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
  
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
            </div>