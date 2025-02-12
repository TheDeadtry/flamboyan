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

                    <div class="row-fluid">


            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Visa</div>
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
                        $this->load->view('template/menuadministrasi');
                    ?>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>
<?php   
                                   
                                  if($hitungvisa==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                        </div>
                                 <?php foreach ($tampil_data_visa as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> No Visa :</td>
                                                <td> <?php echo $row->novisa;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Berlaku :</td>
                                                <td> <?php echo $row->tglberlaku." - ".$row->tglsampai ?> </td>
                                            </tr>
                                             
                                            <tr>
                                                <td class="span2"> 抽獎 KOCOKAN :</td>
                                                <td> <?php echo $row->kocokan; 
                                                
                                                        $hasil1= $row->statuskocokan;
                                                        if($hasil1=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 指纹 FINGER PRINT :</td>
                                                <td> <?php echo $row->finger; 
                                                
                                                        $hasil2= $row->statusfinger;
                                                        if($hasil2=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 領 TERIMA :</td>
                                                <td> <?php echo $row->terima; 
                                                
                                                        $hasil3= $row->statusterima;
                                                        if($hasil3=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>
                                           
                                           <tr>
                                                <td class="span2"> 受訓 PAP :</td>
                                                <td> <?php echo $row->pap; 
                                                
                                                        $hasil3= $row->statuspap;
                                                        if($hasil3=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
                                            </tr>

                                            <tr>
                                                <td class="span2"> 外勞卡 KTKLN :</td>
                                                <td> <?php echo $row->ktkln; 
                                                
                                                        $hasil3= $row->statusktkln;
                                                        if($hasil3=='A'){
                                                            echo " (Actual)";

                                                        }else{
                                                             echo " (Calculation)";
                                                        }?> </td>
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

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Visa</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailvisa/tambahvisa');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                            <label class="control-label span4"> No Visa </label>
                                                            <div class="controls">
                                                                <input type="text" name="novisa" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap"  />
                                                            </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Tanggal Berlaku Dari</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberlaku"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Sampai Tanggal </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglsampai"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                </div>
                                                            </div>

                                                            
                                                           <div class="control-group">
                                                                <label class="control-label"> 抽獎 Kocokan</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglkocokan"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="kocokana" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="kocokana" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 指纹 FINGER PRINT</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglfinger"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="fingera" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fingera" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 領 TERIMA</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="terimaa" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terimaa" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 受訓 PAP</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglpap"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="papa" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="papa" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 外勞卡 KTKLN</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglktkln"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="ktklna" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ktklna" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>
<!-- 
                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailterbang/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div>
                                            -->    

                                                        
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
                    <h3>Ubah Visa</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailvisa/ubahvisa');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_visa as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                            <label class="control-label span4"> No Visa </label>
                                                            <div class="controls">
                                                                <input type="text" name="novisa" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" value="<?php echo $row->novisa;?>"/>
                                                            </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label">Tanggal Berlaku Dari</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberlaku"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglberlaku;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Sampai Tanggal </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglsampai"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglsampai;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                </div>
                                                            </div>

                                                            
                                                           <div class="control-group">
                                                                <label class="control-label"> 抽獎 Kocokan</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglkocokan"  placeholder='Select datepicker' type='text' value="<?php echo $row->kocokan;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tgla= $row->statuskocokan;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="kocokana" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="kocokana" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="kocokana" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="kocokana" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 指纹 FINGER PRINT</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglfinger"  placeholder='Select datepicker' type='text' value="<?php echo $row->finger;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tglb= $row->statusfinger;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="fingera" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fingera" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="fingera" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="fingera" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> 領 TERIMA</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->terima;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tglc= $row->statusterima;
                                                        if($tglc=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="terimaa" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terimaa" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="terimaa" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terimaa" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 受訓 PAP</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglpap"  placeholder='Select datepicker' type='text' value="<?php echo $row->pap;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                     <?php $tgld= $row->statuspap;
                                                        if($tgld=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="papa" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="papa" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="papa" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="papa" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 外勞卡 KTKLN</label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglktkln"  placeholder='Select datepicker' type='text' value="<?php echo $row->ktkln;?>"/>
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                   <?php $tgle= $row->statusktkln;
                                                        if($tgle=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="ktklna" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ktklna" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="ktklna" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="ktklna" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>
                                                            


                                                  <?php } ?>            
<!-- 

                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailterbangpermit/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div> -->
                                                            
                                                       
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>