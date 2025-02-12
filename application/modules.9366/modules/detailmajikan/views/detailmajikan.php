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
            <div class='title'>Detail Majikan</div>
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
                                <?php }
                                 if($hitungmajikan==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Silahkan menambahkan data pada tombol ini... 
                         <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                        </div>
                                 <?php
                                }else{ ?>

                                <div class="alert alert-info ">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                        </br>
                         <a class='btn btn-info btn-medium' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>
                         <a href="<?php echo site_url('detailmajikan/vubahmajikan/'.$detailpersonalid); ?>"class="btn btn-info btn-medium"></i>Edit Grup Majikan</a>
                        </div>
                            

                             <?php 
$stts = substr($detailpersonalid, 0, 2);
if($stts == 'FI'){ 
foreach ($tampil_data_majikanfi as $row) { 
                         ?>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Nama Group :</td>
                                                <td> <?php echo  $row->kode_group;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Kode Agen :</td>
                                                <td> <?php echo $row->nama;?> </td>
                                            </tr>
                                            
                                             <tr>
                                                <td class="span3"> Nama Majikan :</td>
                                                <td> <?php echo $row->namamajikan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Nama Majikan (taiwan) :</td>
                                                <td> <?php echo $row->namataiwan;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Terima PK:</td>
                                                <td> <?php echo $row->tglpk;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> No Suhan :</td>
                                                <td> <?php echo $row->id_suhan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> tgl terbit suhan :</td>
                                                <td> <?php echo $row->tglterbitsuhan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> tgl terima suhan :</td>
                                                <td> <?php echo $row->tglterimasuhan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> Keterangan suhan :</td>
                                                <td> <?php echo $row->ketsuhan;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3">No Visa Permit :</td>
                                                <td> <?php echo $row->id_visapermit;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> tgl terbit Visa Permit :</td>
                                                <td> <?php echo $row->tglterbitpermit;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span3"> tgl terima Visa Permit :</td>
                                                <td> <?php echo $row->tglterimapermit;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Keterangan Visa Permit :</td>
                                                <td> <?php echo $row->ketpermit;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3">Tanggal Terpilih :</td>
                                                <td> <?php echo $row->tglterpilih;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> JD :</td>
                                                <td> <?php echo $row->JD;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Terbang :</td>
                                                <td> <?php echo $row->tglterbang;
                                                $hasil3= $row->statustglterbang;

                                                        if($hasil3=='A'){
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

                                 <?php   }
                             }
                         else{
                            foreach ($tampil_data_majikan as $row2) { 
                         ?>
                                <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> Nama Group :</td>
                                                <td> <?php echo $row2->kode_group;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Kode Agen :</td>
                                                <td> <?php echo $row2->kdoeagenya;?> </td>
                                            </tr>
                                            
                                             <tr>
                                                <td class="span3"> Nama Majikan :</td>
                                                <td> <?php echo $row2->nama;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Suhan :</td>
                                                <td> <?php echo $row2->no_suhan;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3">Visa Permit :</td>
                                                <td> <?php echo $row2->no_visapermit;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3">Tanggal Terpilih :</td>
                                                <td> <?php echo $row2->tglterpilih;?> </td>
                                            </tr>
                                         <tr>
                                                <td class="span3"> JD :</td>
                                                <td> <?php echo $row2->JD;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span3"> Tanggal Terbang :</td>
                                                <td> <?php echo $row2->tglterbang;
                                                    $hasil2= $row2->statustglterbang;

                                                        if($hasil2=='A'){
                                                            echo " A(Actual)";

                                                        }else{
                                                             echo " C(Calculation)";
                                                        }?> ?> </td>
                                            </tr>

                                             <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                       <?php }
                   }
               }?>
        </div>
</div>

                </div>


                    
          <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Majikan</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailmajikan/tambahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                             <div class="control-group">
                                          <label class="control-label"> Pilih Group </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("group",$option_group,"","id='group_id'"); ?>
                                          <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                         </div>
                                         </div>

                                         <div class="control-group" id="jelasin_agen">
                                         <label class="control-label">Pilih Agen </label>
                                         <div class="controls">
                                         <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled'); ?>
                                         </div>
                                           </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima PK </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="tglpk"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terpilih Majikan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                            <?php $status = substr($detailpersonalid, 0, 2);
                                                            if($status == 'FI'){ ?>
   <div class="control-group">
                                                            <label class="control-label "> Nama Majikan  </label>
                                                            <div class="controls">
                                                                <input type="text" name="namamajikan" class=" popovers" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label "> Nama Majikan (taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="namataiwan" class=" popovers" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label "> Suhan </label>
                                                            <div class="controls">
                                                                <input type="text" name="suhan" class=" popovers" data-trigger="hover" data-content="" data-original-title="Suhan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terbit Suhan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitsuhan"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima Suhan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="tglterimasuhan"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label "> Keterangan Suhan</label>
                                                            <div class="controls">
                                                                <input type="text" name="ketsuhan" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                                                            </div>
                                                            </div>

                                                            
                                                            <div class="control-group">
                                                            <label class="control-label "> Visa Permit </label>
                                                            <div class="controls">
                                                                <input type="text" name="visapermit" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terbit Visa Permit </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbitpermit"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima Visa Permit </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="tglterimapermit"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label "> Keterangan Visa Permit</label>
                                                            <div class="controls">
                                                                <input type="text" name="ketpermit" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                                                            </div>
                                                            </div>

                                                            

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Dapat Job Deskripsi (JD) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Diminta Terbang </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                                <label class='radio '>
                                                                            <input type='radio' name="terbanga" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terbanga" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>

                                                            <?php }else{?>

                                                            <div class="control-group">
                                                                <label class="control-label"> Pilih Majikan </label>
                                                                <div class="controls">
                                                                   <?php   echo form_dropdown("id_majikannya",$option_posisi,"","id='id_majikan'"); ?>
                                                            <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                                                </div>
                                                            </div>
                                                            <div id="suhanin">
                                                             <div class="control-group" id="suhanin">
                                                                <label class="control-label"> Pilih SUhan </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_suhan",array('Pilih Suhan'=>'Pilih Majikan Terlebih dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="suhanin">
                                                                <label class="control-label"> Pilih Visa Permit </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_visapermit",array('Pilih Suhan'=>'Pilih Majikan Terlebih dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>
                                                            </div>

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terpilih Majikan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Dapat Job Deskripsi (JD) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Diminta Terbang </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                                <label class='radio '>
                                                                            <input type='radio' name="terbanga" value='A' />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terbanga" value='C' checked />
                                                                            Calculation
                                                                        </label>
                                                                </div>
                                                            </div>
         <?php
     }?>
                                                   
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
  <form action="<?php echo site_url('detailmajikan/ubahmajikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                             <?php $status = substr($detailpersonalid, 0, 2);
                                                            if($status == 'FI'){ ?>
                         <?php foreach ($tampil_data_majikanfi as $row2) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                            

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima PK </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' value=" <?php echo  $row->tglpk;?>" name="tglpk"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>


   <div class="control-group">
                                                            <label class="control-label "> Nama Majikan  </label>
                                                            <div class="controls">
                                                                <input type="text" name="namamajikan" class=" popovers" value=" <?php echo  $row->namamajikan;?>" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label "> Nama Majikan (taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="namataiwan" class=" popovers" value=" <?php echo  $row->namataiwan;?>" data-trigger="hover" data-content="" data-original-title="namamajikan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label "> Suhan </label>
                                                            <div class="controls">
                                                                <input type="text" name="suhan" class=" popovers" value=" <?php echo  $row->id_suhan;?>" data-trigger="hover" data-content="" data-original-title="Suhan" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terbit Suhan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' value=" <?php echo  $row->tglterbitsuhan;?>" name="tglterbitsuhan"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima Suhan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd'  value=" <?php echo  $row->tglterimasuhan;?>" name="tglterimasuhan"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>
                                                              <div class="control-group">
                                                            <label class="control-label "> Keterangan Suhan</label>
                                                            <div class="controls">
                                                                <input type="text" name="ketsuhan" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" value="<?php echo  $row->ketsuhan;?>" />
                                                            </div>
                                                            </div>


                                                            
                                                            <div class="control-group">
                                                            <label class="control-label "> Visa Permit </label>
                                                            <div class="controls">
                                                                <input type="text" name="visapermit" class=" popovers" value=" <?php echo  $row->id_visapermit;?>" data-trigger="hover" data-content="" data-original-title="Visa Permit" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terbit Visa Permit </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' value=" <?php echo  $row->tglterbitpermit;?>" name="tglterbitpermit"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima Visa Permit </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' value="<?php echo  $row->tglterimapermit;?>" name="tglterimapermit"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>
                                                              <div class="control-group">
                                                            <label class="control-label "> Keterangan Visa Permit</label>
                                                            <div class="controls">
                                                                <input type="text" name="ketpermit" class=" popovers" data-trigger="hover" data-content="" data-original-title="Visa Permit" value="<?php echo  $row->ketpermit;?>"/>
                                                            </div>
                                                            </div>


                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terpilih Majikan </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terpilih"  placeholder='Select datepicker' type='text' value="<?php echo  $row->tglterpilih;?>"/>
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>


                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Dapat Job Deskripsi (JD) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' value="<?php echo  $row->JD;?>"/>
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Diminta Terbang </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' value="<?php echo  $row->tglterbang;?>"/>
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                               <?php $tgla= $row->statustglterbang;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="terbanga" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terbanga" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="terbanga" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terbanga" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>
                                                            <?php }
                                                        }else{?>
                                                         <?php foreach ($tampil_data_majikanfi as $row3) { ?>
                                        <div class="control-group">
                                                                <label class="control-label"> Nama Group </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="group" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value=" <?php echo  $row3->kode_group;?>" /> <?php echo  $row3->kode_group;?>
                                                                        <?php  foreach ($tampil_data_group as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_group;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Nama Agency </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="agen" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value=" <?php echo  $row3->kode_agen;?>" /> <?php echo  $row3->kode_agen;?>
                                                                        <?php  foreach ($tampil_data_agen as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->kode_agen;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Terima PK </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' value=" <?php echo  $row3->tglpk;?>" name="tglpk"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>
<?php }?>
                                                            <div class="control-group">
                                                                <label class="control-label"> Pilih Majikan </label>
                                                                <div class="controls">
                                                                   <?php   echo form_dropdown("id_majikannya",$option_posisi,"","id='id_majikan'"); ?>
                                                            <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                                                </div>
                                                            </div>
                                                            <div id="suhanin">
                                                             <div class="control-group" id="suhanin">
                                                                <label class="control-label"> Pilih SUhan </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_suhan",array('Pilih Suhan'=>'Pilih Majikan Terlebih dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="suhanin">
                                                                <label class="control-label"> Pilih Visa Permit </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_visapermit",array('Pilih Suhan'=>'Pilih Majikan Terlebih dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Dapat Job Deskripsi (JD) </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="jd"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label"> Tgl Diminta Terbang </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                      <input class='input-medium' data-format='yyyy.MM.dd' name="terbang"  placeholder='Select datepicker' type='text' />
                                                                    <span class='add-on'>
                                                                        <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                     </span>
                                                                               </div>
                                                                                <?php $tgla= $row->statustglterbang;
                                                        if($tgla=='A'){
                                                            ?>
                                                                            <label class='radio '>
                                                                            <input type='radio' name="terbanga" value='A' checked />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terbanga" value='C'  />
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }else{
                                                            ?>
                                                            <label class='radio '>
                                                                            <input type='radio' name="terbanga" value='A'  />
                                                                            Actual
                                                                        </label>
                                                                        <label class='radio'>
                                                                            <input type='radio' name="terbanga" value='C'  checked/>
                                                                            Calculation
                                                                        </label>
                                                             <?php
                                                        }?>
                                                                </div>
                                                            </div>
         <?php
     }?>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
            </div>
                  