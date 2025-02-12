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
            <div class='title'>Detail Family</div>
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
                                  if($hitungfamily==0){
                                ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini... 
                                        <a class='btn btn-info btn-large' data-toggle='modal' href='#modal-example2' role='button'>Tambah Data</a>

                        </div>
                                 <?php
                                }else{ ?>
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini...
                        <a class='btn btn-info btn-large' data-toggle='modal' href='#updatefamily' role='button'>Ubah Data</a>

                        </div>




                                 <?php foreach ($tampil_data_family as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3">姓名 Nama Bapak  :</td>
                                                <td> <?php echo $row->nama_bapak;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">年齡 Umur Bapak :</td>
                                                <td> <?php echo $row->umur_bapak." tahun 嵗";?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">職業 Pekerjaan Bapak :</td>
                                                <td> <?php echo $row->kerja_bapak;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">姓名 Nama Ibu :</td>
                                                <td> <?php echo $row->nama_ibu;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2">年齡 Umur Ibu :</td>
                                                <td> <?php echo $row->umur_ibu." tahun 嵗";?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2">職業 Pekerjaan Ibu :</td>
                                                <td> <?php echo $row->kerja_ibu;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2">姓名 Nama Istri / Suami :</td>
                                                <td> <?php echo $row->nama_istri_suami;?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2">年齡 Umur Istri / Suami :</td>
                                                <td> <?php echo $row->umur_istri_suami." tahun 嵗";?> </td>
                                            </tr>
                                              <tr>
                                                <td class="span2">職業 Pekerjaan Istri / Suami  :</td>
                                                <td> <?php echo $row->kerja_istri_suami;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">子女人數 Banyak anak :</td>
                                                <td> <?php echo $row->data_anak;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">兄弟-saudara laki :</td>
                                                <td> <?php echo $row->saudara_laki;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2">姐妹-saudara perempuan :</td>
                                                <td> <?php echo $row->saudar_pr;?> </td>
                                            </tr>
                                             <tr>
                                                <td class="span2">排行-Anak ke :</td>
                                                <td> <?php echo $row->anak_ke;?> </td>
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

            <div class='modal hide fade' id='modal-example2' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
                  <form action="<?php echo site_url('tambahfamily/tambahfamilydata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                             <div class="control-group">
                                                            <label class="control-label">姓名 Nama Bapak</label>
                                                            <div class="controls">
                                                                <input type="text" name="namabapak" class="form-control" data-trigger="hover" data-content="Isi Nama Lengkap" data-original-title="Nama Bapak" />
                                                                
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label">年齡 Umur Bapak</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurbapak" class="span3 popovers" data-trigger="hover" data-content="Isi Umur Lengkap " data-original-title="Umur Bapak" />
                                                            </div>
                                                            </div>

                                                                <div class="control-group">
                                                                <label class="control-label">職業 Pekerjaan Bapak</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kerjabapak" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                             <div class="control-group">
                                                            <label class="control-label">姓名 Nama Ibu</label>
                                                            <div class="controls">
                                                                <input type="text" name="namaibu" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap " data-original-title="Nama Ibu" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label">年齡 Umur Ibu</label>
                                                            <div class="controls">
                                                                <input type="text" name="umuribu" class="span3 popovers" data-trigger="hover" data-content="Isi Umur Lengkap " data-original-title="Umur Ibu" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">職業 Pekerjaan Ibu</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kerjaibu" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">姓名 Nama Istri</label>
                                                            <div class="controls">
                                                                <input type="text" name="namaistri" class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap" data-original-title="Nama Istri" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label">年齡 Umur Istri</label>
                                                            <div class="controls">
                                                                <input type="text" name="umuristri" class="span3 popovers" data-trigger="hover" data-content="Isi Umur" data-original-title="Umur Istri" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">職業 Pekerjaan Istri</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kerjaistri" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                      <div class="control-group">
                                    <label class="control-label">子女人數 Umur anak </label>
                                    <div class="controls">
                                        <select data-placeholder="Your Favorite Teams" name="jumlahanak[]" id="jumlahanak" class="select2 input-block-level " multiple="multiple">
                                            <option value="" />
                                            <optgroup label="tahun">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun 嵗" ?>" /><?php echo"".$i." tahun 嵗" ?>

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
                                                            <label class="control-label">兄弟-saudara laki</label>
                                                            <div class="controls">
                                                                <input type="text" name="saudaralaki" class="span3 popovers" data-trigger="hover" data-content="Isi Jumlah Saudara Laki laki" data-original-title="Saudara Laki" />
                                                            </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label">姐妹-saudara perempuan</label>
                                                            <div class="controls">
                                                                <input type="text" name="saudarapr" class="span3 popovers" data-trigger="hover" data-content="Isi Jumlah Saudara Perempuan" data-original-title="Saudara Perempuan" />
                                                            </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label">排行-Anak ke</label>
                                                            <div class="controls">
                                                                <input type="text" name="anakke" class="span3 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                            


                                                           <!--  <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailfamily/"?>"><i class=" icon-remove"></i> Kembali </a>
                                </div> -->
                                                            
                                                       
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>

             <div class='modal hide fade' id='updatefamily' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
               <form name="myForm" onsubmit="return validateForm()" action="<?php echo site_url('tambahfamily/ubahfamilydata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_family as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                             <div class="control-group has-error">
                                                            <label class="control-label">姓名 Nama Bapak</label>
                                                            <div class="controls">
                                                                <input type="text" name="namabapak" class="form-control" data-trigger="hover" value="<?php echo $row->nama_bapak;?>" data-content="Isi Nama Lengkap" data-original-title="Nama Bapak" />

                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label">年齡 Umur Bapak</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurbapak" class="span3 popovers" data-trigger="hover" value="<?php echo $row->umur_bapak;?>" data-content="Isi Umur Lengkap " data-original-title="Umur Bapak" />
                                                            </div>
                                                            </div>

                                                                <div class="control-group">
                                                                <label class="control-label">職業 Pekerjaan Bapak</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kerjabapak" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->kerja_bapak;?>"  /><?php echo $row->kerja_bapak;?>
                                                                        <?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                             <div class="control-group">
                                                            <label class="control-label">姓名 Nama Ibu</label>
                                                            <div class="controls">
                                                                <input type="text" name="namaibu" class="span7 popovers" value="<?php echo $row->nama_ibu;?>" data-trigger="hover" data-content="Isi Nama Lengkap " data-original-title="Nama Ibu" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label">年齡 Umur Ibu</label>
                                                            <div class="controls">
                                                                <input type="text" name="umuribu" class="span3 popovers" value="<?php echo $row->umur_ibu;?>" data-trigger="hover" data-content="Isi Umur Lengkap " data-original-title="Umur Ibu" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">職業 Pekerjaan Ibu</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kerjaibu" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->kerja_ibu;?>"  /><?php echo $row->kerja_ibu;?>
                                                                        <?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">姓名 Nama Istri / suami</label>
                                                            <div class="controls">
                                                                <input type="text" name="namaistri" class="span7 popovers" value="<?php echo $row->nama_istri_suami;?>" data-trigger="hover" data-content="Isi Nama Lengkap" data-original-title="Nama Istri" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label">年齡 Umur Istri / suami</label>
                                                            <div class="controls">
                                                                <input type="text" name="umuristri" class="span3 popovers" value="<?php echo $row->umur_istri_suami;?>" data-trigger="hover" data-content="Isi Umur" data-original-title="Umur Istri" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">職業 Pekerjaan Istri / suami</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kerjaistri" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->kerja_istri_suami;?>" /><?php echo $row->kerja_istri_suami;?>
                                                                        <?php  foreach ($tampil_data_jobs as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                      <div class="control-group">
                                    <label class="control-label">子女人數 Banyak anak</label>
                                    <div class="controls">
                                        <select data-placeholder="Input umur dari jumlah anak pendaftar" name="jumlahanak[]" id="jumlahanak" class="select2 input-block-level " multiple="multiple" tabindex="6">
                                            <option value="<?php echo $row->data_anak;?>"  selected/><?php echo $row->data_anak;?>
                                            <optgroup label="tahun">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun 嵗" ?>" /><?php echo"".$i." tahun 嵗" ?>

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
                                                            <label class="control-label">兄弟-saudara laki</label>
                                                            <div class="controls">
                                                                <input type="text" name="saudaralaki" value="<?php echo $row->saudara_laki;?>" class="span3 popovers" data-trigger="hover" data-content="Isi Jumlah Saudara Laki laki" data-original-title="Saudara Laki" />
                                                            </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label">姐妹-saudara perempuan</label>
                                                            <div class="controls">
                                                                <input type="text" name="saudarapr" value="<?php echo $row->saudar_pr;?>" class="span3 popovers" data-trigger="hover" data-content="Isi Jumlah Saudara Perempuan" data-original-title="Saudara Perempuan" />
                                                            </div>
                                                            </div>


                                                            <div class="control-group">
                                                            <label class="control-label">排行-Anak ke</label>
                                                            <div class="controls">
                                                                <input type="text" name="anakke" value="<?php echo $row->anak_ke;?>" class="span3 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" />
                                                            </div>
                                                            </div>

                                                             <?php } ?>                  
                                                    

                                                            
                                                       
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>


<script>
function validateForm() {
    var x = document.forms["myForm"]["namabapak"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>