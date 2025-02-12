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
            <div class='title'>Profile</div>
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

                                <div class="span9">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>

<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini... 
                          <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>

                        </div>
                              
                                                          <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Working Experience</div>
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
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>negara</th>
                                            <th>jenis usaha</th>
                                             <th>posisi</th>
                                             <th>penjelasan Kerja</th>
                                             <th>masa kerja</th>
                                             <th>tahun masa kerja</th>
                                             <th>alasan Berhenti</th>
                                               <th>Ubah</th>
                                                 <th>Hapus</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_working as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->negara;?></td>
                                            <td><?php echo $row->isi."".$row->mandarin;?></td>
                                            <td><?php echo $row->posisi;?></td>
                                            <td><?php echo $row->penjelasan;?></td>
                                            <td><?php echo $row->masa_kerja;?></td>
                                            <td><?php echo $row->tahun;?></td>
                                            <td><?php echo $row->alasan;?></td>


                                        <td>  <a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/tambahworking/v_ubahworking/"?><?php echo $row->id_working; ?>"> ubah </a></td>
                                        <td>  <a type="button" onclick="return deletechecked();" class="btn btn-mini" href="<?php echo base_url()."index.php/tambahworking/hapusworking/"?><?php echo $row->id_working; ?>">hapus </a></td>
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>
             </div>


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
<form action="<?php echo site_url('tambahworking/tambahworkingdata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                                <div class="control-group">
                                                                <label class="control-label"> 受雇國家 Negara</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="negara" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label"> 業務類別 Jenis Usaha </label>
                                                                <div class="controls span7">
                                                                   <?php   echo form_dropdown("id_kategori",$option_posisi,"","id='posisi_id'"); ?>
                                                                               <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                                                </div>
                                                            </div>

                                                             <div class="control-group" id="jelasin">
                                                                <label class="control-label"> 工作性質 Penjelasan pekerjaan </label>
                                                                <div class="controls">
                                                                   <?php    echo form_dropdown("id_pekerjaan",array('Pilih Penjelasan'=>'Pilih Jenis Usaha Dahulu'),'','disabled'); ?>
                                                                </div>
                                                            </div>

                                                              <div class="control-group">
                                                                <label class="control-label"> 職務 Posisi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="posisi" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($pilihan_posisi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                    <label class="control-label"> 受雇期間 Masa Kerja </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Masa Kerja" name="masakerja" class="chosen span6" tabindex="-1" id="masakerja">
                                            <option value="" />
                                         <optgroup label="tahun">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun 年" ?>" /><?php echo"".$i." tahun 年" ?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                             <optgroup label="bulan">
                                                <?php 
                                                for($i=1;$i<=12;$i++){?>
                                                    <option value="<?php echo"".$i." bulan 月" ?>" /><?php echo"".$i." bulan 月" ?>
                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>

                                        </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                                            <label class="control-label"> 年 Tahun</label>
                                                            <div class="controls">
                                                                <input type="text" name="tahun" class="span7 popovers" data-trigger="hover" data-content="Input data tahun dengan di pisah '-' (ex: 2010-2015) " data-original-title="Tahun masa kerja" />
                                                            </div>
                                </div>

                                                            <div class="control-group">
                                                                <label class="control-label">離職原因 Alasan berhenti bekerja </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alasan" data-placeholder="pilih kategori" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($pilihan_alasan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
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