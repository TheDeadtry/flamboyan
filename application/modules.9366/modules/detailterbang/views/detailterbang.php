<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Keberangkatan </span>
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
                    <li class='active'>Detail Keberangkatan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  



	                       

<div class="row-fluid">

    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Keberangkatan</div>
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
                                  if($hitungterbang==0){
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
                                 <?php foreach ($tampil_data_terbang as $pilihan) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Tanggal Masuk di Taiwan :</td>
                                                <td> <?php echo $pilihan->tanggalterbang; 

                                                        $hasil= $pilihan->statustgl;
                                                        if($hasil=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan :</td>
                                                <td> <?php echo $pilihan->namamaskapai; echo " : ".$pilihan->kodeterbang;echo " : ".$pilihan->ruteterbang; echo " : ".$pilihan->jamterbang;?></td>
                                            </tr>

                                            <tr>
                                                <td class="span3"> Jadwal Penerbangan Lanjutan:</td>
                                                <td> <?php echo $pilihan->namamaskapai; echo " : ".$pilihan->kodeterbang2;echo " : ".$pilihan->ruteterbang2;echo " : ".$pilihan->jamterbang2;?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span3"> Tiket:</td>
                                                <td> <?php echo $pilihan->tiket;

                                                 $hasil3= $pilihan->tiket;
                                                        if($hasil3=='wl'){
                                                            echo " (候補 - Waiting List)";
                                                        }
                                                        if($hasil3=='issued'){
                                                            echo " (開票 - ISSUED)";
                                                        }
                                                        if($hasil3=='ok'){
                                                            echo " (可以 - OK)";
                                                        }
                                                        ?> </td>
                                            </tr>

                                              <tr>
                                                <td class="span3"> Tanggal Terbang :</td>
                                                <td> <?php echo $pilihan->tglberangkat; 
                                                
                                                        $hasil2= $pilihan->statusterbang;
                                                        if($hasil2=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
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

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Terbang</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailterbang/tambahterbang');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Tiba di Taiwan </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tanggalterbang"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->namamaskapai; echo " : ".$pilihan->kodeterbang;echo " : ".$pilihan->ruteterbang;echo " : ".$pilihan->jamterbang;echo " --> ";echo " : ".$pilihan->kodeterbang2;echo " : ".$pilihan->ruteterbang2;echo " : ".$pilihan->jamterbang2;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                        
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Tiket </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiket" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="wl" />候補 - WL
                                                                            <option value="issued" />開票-ISSUED
                                                                            <option value="ok" />可以 - OK
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terbang </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberangkat"  placeholder='Select datepicker' type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C' checked />
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
                    <h3>Ubah Data Terbang</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailterbang/ubahterbang');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_terbang as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Tiba di Taiwan</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo $row->tanggalterbang;?>" name="tanggalterbang"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                <?php $tglb= $row->statustgl;
                                                        if($tglb=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="tanggalterbanga" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="tanggalterbanga" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>

                                                                 
                                                                </div> 
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Pilih Penerbangan</label>
                                                                <div class="controls">
                                                                    <select class="span12 " name="id_terbang" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->id_terbang;?>" /><?php echo $row->namamaskapai; echo " : ".$row->kodeterbang;echo " : ".$row->ruteterbang;echo " : ".$row->jamterbang;echo " --> ";echo " : ".$row->kodeterbang2;echo " : ".$row->ruteterbang2;echo " : ".$row->jamterbang2;?>
                                                                        <?php  foreach ($tampil_dataterbang as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_terbang;?>" /><?php echo $pilihan->namamaskapai; echo " : ".$pilihan->kodeterbang;echo " : ".$pilihan->ruteterbang;echo " : ".$pilihan->jamterbang;echo " --> ";echo " : ".$pilihan->kodeterbang2;echo " : ".$pilihan->ruteterbang2;echo " : ".$pilihan->jamterbang2;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                     <div class="control-group">
                                                                <label class="control-label"> Tiket </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tiket" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="wl" /><?php echo $row->tiket;?>
                                                                            <option value="wl" />候補 - WL
                                                                            <option value="issued" />開票-ISSUED
                                                                            <option value="ok" />可以 - OK
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terbang </label>
                                                                <div class="controls">
                                                                     <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tglberangkat"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglberangkat;?>" />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                                    <?php $tgla= $row->statusterbang;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="berangkata" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="berangkata" value='C'  checked/>
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