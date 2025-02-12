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
            <div class='title'>Detail Skill & Physical Condition</div>
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
                                  if($hitungskill==0){
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
                                 <?php foreach ($tampil_data_skill as $row) { ?>

                                  
                        

                               

                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3"> 專長 Keterampilan :</td>
                                                <td> <?php echo $row->keterampilan;?> </td>
                                            </tr>
                                            <tr>
                                                <td class="span2"> 嗜好 Hobby :</td>
                                                <td> <?php echo $row->hobi;?> </td>
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
                                                <td> <?php echo $row->food;?> </td>
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
                                                <td> <?php echo $row->tato;?> </td>
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
  <form action="<?php echo site_url('tambahskill/tambahskilldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                          

                                                            <div class="control-group">
                                    <label class="control-label"> 專長 Keterampilan  </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Keterampilan" name="keterampilan[]" id="keterampilan" class='select2 input-block-level' multiple="multiple" tabindex="6">
                                            <option value="" />
                                            <optgroup label="Pilih Keterampilan">
                                                <?php  foreach ($tampil_data_keterampilan as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                                                        <div class="control-group">
                                    <label class="control-label"> 嗜好 Hobby </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih data" name="hobi[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                            <option value="" />
                                            <optgroup label="Pilih Hobi">
                                                <?php  foreach ($tampil_data_hobi as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="control-group">
                                                                <label class="control-label"> 酒 Alkohol</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alkohol" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="不喝 tidak" />不喝 tidak
                                                                        <option value="偶爾 kadang " />偶爾 kadang 
                                                                        <option value="喝 ya" />喝 ya
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 煙 merokok</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="merokok" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="不喝 tidak" />不喝 tidak
                                                                        <option value="偶爾 kadang " />偶爾 kadang 
                                                                        <option value="吸煙 merokok" />吸煙 merokok
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> 飲食 food</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="food" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="吃豬肉 makan daging babi" />吃豬肉 makan daging babi
                                                                        <option value="一般不吃豬肉 tidak makan daging babi" />一般不吃豬肉 tidak makan daging babi
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> 身體狀況 Kondisi Fisik </label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 過敏 alergi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alergi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 開刀 Operasi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="operasi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak Pernah 從不" />Tidak Pernah 從不
                                                                        <option value="Pernah 從過" />Pernah 從過
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 剌青 Tato</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tato" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 左撇子 tangan kidal</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tangan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>
                                                               <div class="control-group">
                                                            <label class="control-label"> 能夠抱 Bisa mengangkat</label>
                                                            <div class="controls">
                                                                <input type="text" name="angkat" class="span3 popovers" data-trigger="hover" data-content="isi berdasarkan KG" data-original-title="MEngangkat Beban" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label"> 推升 Push up</label>
                                                            <div class="controls">
                                                                <input type="text" name="pushup" class="span3 popovers" data-trigger="hover" data-content="Isi pushup berapa kali" data-original-title="Jumlah Pushup" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 視力 penglihatan mata </label>
                                                                <div class="controls">
                                                                    <select class="span7 " id="mata" name="mata" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_mata as $pilihan) { ?>

                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                            <?php
                                                                        }
                                                                            ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group" id="ukuranmata">
                                                            <label class="control-label">Ukuran mata</label>
                                                            <div class="controls">
                                                                 Kanan <input type="text" class="span2 popovers" data-trigger="hover" name="kanan" id="kanan" data-content="Ukuran Mata untuk Kanan" data-original-title="Mata Kanan" />
                                                                 Kiri  <input type="text" class="span2 popovers" data-trigger="hover" name="kiri"  id="kiri" data-content="Ukuran Mata untuk Kiri" data-original-title="Mata Kiri" />
                                                            </div>
                                                            </div>
                                                        
                                                        <div class="control-group">
                                                                <label class="control-label"> 色盲 buta warna</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="butawarna" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value="" />Select...
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>



                                                            

<!-- 
                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailskill/"?>"><i class=" icon-remove"></i> Kembali </a>
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
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('tambahskill/ubahskilldata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                 <?php foreach ($tampil_data_skill as $row) { ?>

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
    

                                    <div class="control-group">
                                    <label class="control-label"> 專長 Keterampilan  </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih Keterampilan" name="keterampilan[]" id="keterampilan" class='select2 input-block-level' multiple="multiple" tabindex="6">
                                            
                                            <option value=" <?php echo $row->keterampilan;?>" selected/><?php echo $row->keterampilan;?>
                                            <optgroup label="Pilih Keterampilan">
                                                <?php  foreach ($tampil_data_keterampilan as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                                                        <div class="control-group">
                                    <label class="control-label"> 嗜好 Hobby </label>
                                    <div class="controls">
                                        <select data-placeholder="Pilih data" name="hobi[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                            <option value=" <?php echo $row->hobi;?>" selected/><?php echo $row->hobi;?>
                                            <optgroup label="Pilih Hobi">
                                                <?php  foreach ($tampil_data_hobi as $pilihan) { ?>

                                                    <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                          
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="control-group">
                                                                <label class="control-label"> 酒 Alkohol</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alkohol" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->alkohol;?>"  /><?php echo $row->alkohol;?>
                                                                        <option value="不喝 tidak" />不喝 tidak
                                                                        <option value="偶爾 kadang " />偶爾 kadang 
                                                                        <option value="喝 ya" />喝 ya
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 煙 merokok</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="merokok" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->merokok;?>"  /> <?php echo $row->merokok;?>
                                                                        <option value="不喝 tidak" />不喝 tidak
                                                                        <option value="偶爾 kadang " />偶爾 kadang 
                                                                        <option value="吸煙 merokok" />吸煙 merokok
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> 飲食 food</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="food" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->food;?>"  /><?php echo $row->food;?>
                                                                        <option value="吃豬肉 makan daging babi" />吃豬肉 makan daging babi
                                                                        <option value="一般不吃豬肉 tidak makan daging babi" />一般不吃豬肉 tidak makan daging babi
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> 身體狀況 Kondisi Fisik </label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 過敏 alergi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="alergi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->alergi;?>"  /><?php echo $row->alergi;?>
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 開刀 Operasi</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="operasi" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->operasi;?>"  /><?php echo $row->operasi;?>
                                                                        <option value="Tidak Pernah 從不" />Tidak Pernah 從不
                                                                        <option value="Pernah 從過" />Pernah 從過
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 剌青 Tato</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tato" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->tato;?>"  /><?php echo $row->tato;?>
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> 左撇子 tangan kidal</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="tangan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->kidal;?>"  /> <?php echo $row->kidal;?>
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
                                                                </div>
                                                            </div>
                                                               <div class="control-group">
                                                            <label class="control-label"> 能夠抱 Bisa mengangkat</label>
                                                            <div class="controls">
                                                                <input type="text" name="angkat" value=" <?php echo $row->angkat;?>" class="span3 popovers" data-trigger="hover" data-content="isi berdasarkan KG" data-original-title="MEngangkat Beban" />
                                                            </div>

                                                            </div>
                                                            <div class="control-group">
                                                            <label class="control-label"> 推升 Push up</label>
                                                            <div class="controls">
                                                                <input type="text" name="pushup" value=" <?php echo $row->pushup;?>" class="span3 popovers" data-trigger="hover" data-content="Isi pushup berapa kali" data-original-title="Jumlah Pushup" />
                                                            </div>
                                                            </div>



                                                            <div class="control-group" id="ukuranmata">
                                                            <label class="control-label">視力 penglihatan mata</label>
                                                            <div class="controls">
                                                                 <input type="text" class="span8 popovers" value=" <?php echo $row->peglihatan;?>"  data-trigger="hover" name="mata" id="kanan" data-content="Ukuran Mata untuk Kanan" data-original-title="Mata Kanan" />
                                                            </div>
                                                            </div>

                                                        <div class="control-group">
                                                                <label class="control-label"> 色盲 buta warna</label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="butawarna" data-placeholder="Choose a Category" tabindex="1">
                                                                        <option value=" <?php echo $row->butawarna;?>"  /> <?php echo $row->butawarna;?>
                                                                        <option value="Tidak 沒有" />Tidak 沒有
                                                                        <option value="Ya 是" />Ya 是
                                                                        </select>
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