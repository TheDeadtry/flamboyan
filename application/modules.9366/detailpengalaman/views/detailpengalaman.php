

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
            <div class='title'>Detail Pengalaman</div>
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
                                <div class='title'>Data Pengalaman</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-tablew'>
                            <div class='scrollable-area'  >
                            <table class='data-table table table-bordered table-striped' id="fixTable" style='margin-bottom:0;'>
 <!-- <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>negara</th>
                                            <th>lokasi kerja</th>
                                             <th>lama kerja</th>
                                             <th>periode kerja</th>
                                                <th>Detail</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_pengalaman as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                           <td><?php echo $row->negara;?></td>
                                            <td><?php echo $row->lokasikerja;?></td>
                                            <td><?php echo $row->lamakerja;?></td>
                                            <td><?php echo $row->periodekerja;?></td>


                                            <td><a href="<?php echo base_url()."index.php/tambahpengalaman/"?>" class="btn btn-mini btn-primary">Detail</a> </td>
                                            
                                        </tr>
                                        <?php $no++;
                                        } ?>

                                        </tbody> -->
                                        <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>negara</th>
                                            <th>lokasi kerja</th>
                                             <th>lama kerja</th>
                                             <th>periode kerja</th>
                                             <th>jam kerja</th>
                                             <th>majikan</th>
                                             <th>alasan Berhenti</th>
                                             <th>kerja prt</th>
                                             <th>memasak</th>
                                             <th>mencuci baju</th>
                                             <th>setrika baju</th>
                                             <th>mencuci mobil</th>
                                             <th>rawat binatang</th>
                                             <th>rawat bayi</th>
                                             <th>rawat anak</th>
                                             <th>jompo pria</th>
                                             <th>jompo umur</th>
                                             <th>jompo kondisi</th>
                                             <th>jompo wanita</th>
                                             <th>jompo umur</th>
                                             <th>jompo kondisi</th>
                                             <th>anggota rumah</th>
                                             <th>tipe rumah</th>
                                             <th>jumlah lantai</th>
                                             <th>jumlah kamar</th>
                                             <th>Keterangan</th>
                                               <th>Ubah</th>
                                                 <th>Hapus</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_pengalaman as $row) { ?>
                                        <tr>
                                            <td nowrap="nowrap" ><?php echo $no;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->negara;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->lokasikerja;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->lamakerja;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->periodekerja;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jamkerja;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->majikan;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->alasanberhenti;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->kerjaprt;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->memasak;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->mencucibaju;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->setrikabaju;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->mencucimobil;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->rawatbinatang;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->rawatbayi;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->rawatanak;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jompokelamin;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jompoumur;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jompokondisi;?></td>
                                              <td nowrap="nowrap" ><?php echo $row->jompokelamin2;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jompoumur2;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jompokondisi2;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->anggotarumah;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->tiperumah;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jumlahlantai;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->jumlahkamar;?></td>
                                            <td nowrap="nowrap" ><?php echo $row->keterangan;?></td>


                                          <td nowrap="nowrap" >  <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a></td>
                                        <td nowrap="nowrap" >  <a type="button" onclick="return deletechecked();" class="btn btn-mini" href="<?php echo base_url()."index.php/tambahpengalaman/hapuspengalaman/"?><?php echo $row->id_pengalaman; ?>">hapus </a></td>
                                        </tr>



 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-3'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Data Pengalaman</h3>
                </div>  
                <form action="<?php echo site_url('tambahpengalaman/ubahpengalamandata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                <div class='modal-body'>
  


   <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                            <input type="text" id="idpengalaman" name="idpengalaman" value="<?php echo $row->id_pengalaman;?>" class="hidden" />

                                                                <div class="control-group">
                                                                <label class="control-label"> 受雇國家 Negara</label>
                                                                <div class="controls">
                                                                    <select class=" " name="negara" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->negara;?>" /><?php echo $row->negara;?>
                                                                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Lokasi kerja Taiwan 台灣工作地點 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="lokasikerja" data-placeholder="Choose a Category" tabindex="1">
                                                                        <?php  foreach ($tampil_data_lokasi as $pilihan) { ?>
                                                                        <option value="<?php echo $row->lokasikerja;?>" /><?php echo $row->lokasikerja;?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Lama kerja  (tahun/bulan) 工作期 (年 /  月）</label>
                                                                <div class="controls">
                                                                <input type="text" name="lamakerja" class="control-label span3" value="<?php echo $row->lamakerja;?>"/>&nbsp;&nbsp;&nbsp;&nbsp;

                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Periode kerja 工作期間</label>
                                                            <div class="controls">
                                                                <input type="text" name="periodekerja" class=" popovers" data-trigger="hover" data-content="Isi Periode ex: (2008-20015)" data-original-title="Periode" value="<?php echo $row->periodekerja;?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam Kerja 日常工作時間</label>
                                                            <div class="controls">
                                                                <input type="text" name="jamkerja" class=" popovers" data-trigger="hover" data-content="Isi jam kerja ex: (07.00-21.00)" data-original-title="Jam Kerja" value="<?php echo $row->jamkerja;?>"/>
                                                            </div>
                                                            </div>

                                                            <!-- <div class="control-group">
                                                                <label class="control-label"> Majikan 雇主 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="majikan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->majikan;?>" /><?php echo $row->majikan;?>
                                                                        <option value="華人-Cina" />華人-Cina
                                                                        <option value="印尼人-Indonesia" />印尼人-Indonesia
                                                                        <option value="印度人- India" />印度人- India
                                                                        <option value=" 馬來人-Melayu" /> 馬來人-Melayu
                                                                        <option value="  阿拉伯人-Arab" />  阿拉伯人-Arab
                                                                        <option value="  西雜貨店 -toko grosir" />  西雜貨店 -toko grosir
                                                                        <option value="  豆腐廠 pabrik tahu洋人" />  豆腐廠 pabrik tahu洋人
                                                                        <option value="  洋人-orang bule" />  洋人-orang bule
                                                                        </select>
                                                                </div>
                                                            </div> -->
                                                            <div class="control-group">
                                                                <label class="control-label"> Majikan 雇主 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="majikan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->majikan;?>" /><?php echo $row->majikan;?>
                                                                        <?php  foreach ($tampil_data_setmajikan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label"> Alasan berhenti kerja 離職原因 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="alasan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->alasanberhenti;?>" /><?php echo $row->alasanberhenti;?>
                                                                        <?php  foreach ($pilihan_alasan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Kerja Rumah tangga 家務事</label>
                                                                <div class="controls">
                                                                <label class='checkbox inline'>
                                                                <?php if($row->kerjaprt=='1'){?>
                                                                    <input type='checkbox' name="kerjaprt" value='1' checked/>
                                                                 <?php }else{?>
                                                                <input type='checkbox' name="kerjaprt" value='1'/>
                                                               <?php }?>
                                                                </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Memasak 煮食</label>
                                                                <div class="controls">
                                                                <label class='checkbox inline'>
                                                                <?php if($row->memasak=='1'){?>
                                                                    <input type='checkbox' name="memasak" value='1' checked/>
                                                                 <?php }else{?>
                                                                <input type='checkbox' name="memasak" value='1'/>
                                                               <?php }?>
                                                                </label>

                                                                  
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mencuci baju 洗衫</label>
                                                                <div class="controls">

                                                                <label class='checkbox inline'>
                                                                <?php if($row->mencucibaju=='1'){?>
                                                                    <input type='checkbox' name="cucibaju" value='1' checked/>
                                                                 <?php }else{?>
                                                                <input type='checkbox' name="cucibaju" value='1'/>
                                                               <?php }?>
                                                                </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Menyetrika baju 燙衫</label>
                                                                <div class="controls">
                                                                <label class='checkbox inline'>
                                                                <?php if($row->setrikabaju=='1'){?>
                                                                    <input type='checkbox' name="setrika" value='1' checked/>
                                                                 <?php }else{?>
                                                                <input type='checkbox' name="setrika" value='1'/>
                                                               <?php }?>
                                                                </label>

                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mencuci mobil 洗機車</label>
                                                                <div class="controls">
                                                                <label class='checkbox inline'>
                                                                <?php if($row->mencucimobil=='1'){?>
                                                                    <input type='checkbox' name="cucimobil" value='1' checked/>
                                                                 <?php }else{?>
                                                                <input type='checkbox' name="cucimobil" value='1'/>
                                                               <?php }?>
                                                                </label>

                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Merawat binatang 照顧寵物</label>
                                                                <div class="controls">
                                                                <label class='checkbox inline'>
                                                                <?php if($row->rawatbinatang=='1'){?>
                                                                    <input type='checkbox' name="rawatbinatang" value='1' checked/>
                                                                 <?php }else{?>
                                                                <input type='checkbox' name="rawatbinatang" value='1'/>
                                                               <?php }?>
                                                                </label>

                                                                </div>
                                                            </div>

                                                           

                                                            <div class="control-group">
                                                            <label class="control-label"> Merawat anak kecil 照顧小孩</label>
                                                            <div class="controls">
                                                                <input type="text" name="rawatanak" class=" popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" value="<?php echo $row->rawatanak;?>"/>
                                                            </div>
                                                            </div>
															
															<div class="control-group">
                                    <label class="control-label">子女人數 Umur anak </label>
                                    <div class="controls">
                                        <select data-placeholder="Your Favorite Teams" name="jumlahanak[]" id="jumlahanak" class="select2 input-block-level " multiple="multiple">
                                            <option value="<?php echo $row->umur;?>" selected/><?php echo $row->umur;?>
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
                                               <optgroup label="Kembar (dipilih jika kembar)">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun嵗" ?>" /><?php echo"".$i." tahun 嵗" ?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                             <optgroup label="bulan">
                                                <?php 
                                                for($i=1;$i<=12;$i++){?>
                                                    <option value="<?php echo"".$i." bulan月" ?>" /><?php echo"".$i." bulan 月" ?>
                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                        </select>
                                    </div>
                                </div>
								
														<!-- <div class="control-group">
                                                            <label class="control-label"> Kondisi Anak</label>
                                                            <div class="controls">
                                                                <input type="text" name="kondisianak" class=" popovers" value="<?php echo $row->kondisi;?>" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
                                                            </div>
                                                            </div> -->
															<div class="control-group">
                                                            <label class="control-label"> Kondisi Anak </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisianak" class='select2 input-block-level' tabindex="13">
                                                                    <option value="<?php echo $row->kondisi;?>" selected/><?php echo $row->kondisi;?>
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_setjagaanak as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                            <?php
                                                                        }
                                                                            ?>
                                                                      </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
															 

                                                            <div class="control-group">
                                                                <label class="controls">merawat orang jompo (男 Pria) 照顧老人</label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class=" " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="男 Pria" />男 Pria
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">umur 年齡</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurjompo" class="span3 popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" value="<?php echo $row->jompoumur;?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> kondisi 情況 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisijompo[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                                                    <option value="<?php echo $row->jompokondisi;?>" selected/><?php echo $row->jompokondisi;?>
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_kondisijompo as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                            <?php
                                                                        }
                                                                            ?>
                                                                      </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="control-group">
                                                                <label class="controls">merawat orang jompo (女 Wanita) 照顧老人</label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class=" " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin2">
                                                                        <option value="女 Wanita" />女 Wanita
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">umur 年齡</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurjompo2" class="span3 popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" value="<?php echo $row->jompoumur2;?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> kondisi 情況 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisijompo2[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                                                    <option value="<?php echo $row->jompokondisi2;?>" selected /><?php echo $row->jompokondisi2;?>
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_kondisijompo as $pilihan) { ?>

                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                            <?php
                                                                        }
                                                                            ?>

                                                                      </optgroup>
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
<div class="control-group">
                                                                <label class="controls">------------------------------------------------------------------</label>
                                                            </div>

                                                         <div class="control-group">
                                                            <label class="control-label">jumlah anggota rumah 家庭成員數目</label>
                                                            <div class="controls">
                                                                <input type="text" name="jumlahanggota" class=" popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" value="<?php echo $row->anggotarumah;?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tipe rumah majikan 居住類型 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="tiperumah" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->tiperumah;?>" /><?php echo $row->tiperumah;?>
                                                                         <option value="Villa 別墅" />Villa 別墅
                                                                        <option value="Apartment 公寓" />Apartment 公寓
                                                                        <option value="Rumah kota 城市房子" />Rumah kota 城市房子
                                                                        <option value="Rumah desa 村屋" /> Rumah desa 村屋
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">rumah berapa lantai 樓</label>
                                                            <div class="controls">
                                                                <input type="text" name="lantai" class=" popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" value="<?php echo $row->jumlahlantai;?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">jumlah kamar tidur 睡房 </label>
                                                            <div class="controls">
                                                                <input type="text" name="kamar" class=" popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" value="<?php echo $row->jumlahkamar;?>" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> keterangan 備註 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="keterangan" class='select2 input-block-level' tabindex="13">
                                                                    <option value="<?php echo $row->keterangan;?>" selected/><?php echo $row->keterangan;?>
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_setketerangan as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                            <?php
                                                                        }
                                                                            ?>
                                                                      </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
<!-- 
                                                            <div class="control-group">
                                                                <label class="control-label">keterangan 備註   </label>
                                                                <div class="controls">
                                                                    <select class=" " name="keterangan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="<?php echo $row->keterangan;?>" /><?php echo $row->keterangan;?>
                                                                         <option value="Membantu di restorant 幫老伴在餐廳" />Membantu di restorant 幫老伴在餐廳
                                                                        <option value="Membantu di hotel 幫老伴在酒店" />Membantu di hotel 幫老伴在酒店
                                                                        <option value="Membantu menjual sayur di pasar 幫老伴在銷售按市場" />Membantu menjual sayur di pasar 幫老伴在銷售按市場
                                                                        <option value="Membantu di toko pakaian 幫老伴的衣服店" /> Membantu di toko pakaian 幫老伴的衣服店
                                                                         <option value="Membantu di kebun sayur 幫老伴的菜園" />Membantu di kebun sayur 幫老伴的菜園
                                                                        <option value="Helping employer's fruit garden 幫老伴的菜園" />Helping employer's fruit garden 幫老伴的菜園
                                                                        <option value="Membantu di kebun rebung 幫老伴的竹笋園" /> Membantu di kebun rebung 幫老伴的竹笋園
                                                                        </select>
                                                                </div>
                                                            </div> -->

<!-- 
                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Simpan </button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailpengalaman/"?>"><i class=" icon-remove"></i> Kembali Ke Profile </a>
                                </div> -->
                                                            
                                                       
                </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>

                                 


                                <div class="space5"></div>
                            </div>
        </div>


                </div>


</div>
</div>

<div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>
                <div class='modal-body'>
  

<form action="<?php echo site_url('tambahpengalaman/tambahpengalamandata');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                                <div class="control-group">
                                                                <label class="control-label"> 受雇國家 Negara</label>
                                                                <div class="controls">
                                                                    <select class=" " name="negara" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($tampil_data_negara as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                      <!--       <div class="control-group">
                                                                <label class="control-label"> Lokasi kerja Taiwan 台灣工作地點 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="lokasikerja" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <option value="Kaoshiung 高雄" />Kaoshiung 高雄
                                                                        <option value="Taipei  台北" />Taipei  台北
                                                                        <option value="Taichung 台中" />Taichung 台中
                                                                        <option value="Tainan 台南" />Tainan 台南
                                                                        </select>
                                                                </div>
                                                            </div> -->

                                                                                   <div class="control-group">
                                                                <label class="control-label"> Lokasi kerja Taiwan 台灣工作地點 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="lokasikerja" data-placeholder="Choose a Category" tabindex="1">
                                                                        <?php  foreach ($tampil_data_lokasi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Lama kerja  (tahun/bulan) 工作期 (年 /  月）</label>
                                                                <div class="controls">
                                                                <input type="text" name="lamakerja" class="control-label span3"  />&nbsp;&nbsp;&nbsp;&nbsp;

                                                                    <select class=" " name="tahunlamakerja" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                            <option value="Tahun 年" />Tahun 年
                                                                            <option value="Bulan 月" />Bulan 月
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label">Periode kerja 工作期間</label>
                                                            <div class="controls">
                                                                <input type="text" name="periodekerja" class=" popovers" data-trigger="hover" data-content="Isi Periode ex: (2008-20015)" data-original-title="Periode" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Jam Kerja 日常工作時間</label>
                                                            <div class="controls">
                                                                <input type="text" name="jamkerja" class=" popovers" data-trigger="hover" data-content="Isi jam kerja ex: (07.00-21.00)" data-original-title="Jam Kerja" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> Majikan 雇主 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="majikan" data-placeholder="Choose a Category" tabindex="1">
                                                                        <?php  foreach ($tampil_data_setmajikan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Alasan berhenti kerja 離職原因 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="alasan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                        <?php  foreach ($pilihan_alasan as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                         <?php
                                                                     } ?>
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Kerja Rumah tangga 家務事</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="kerjaprt" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Memasak 煮食</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="memasak" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mencuci baju 洗衫</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="cucibaju" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Menyetrika baju 燙衫</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="setrika" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Mencuci mobil 洗機車</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="cucimobil" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Merawat binatang 照顧寵物</label>
                                                                <div class="controls">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="rawatbinatang" value="1" /> </label>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Merawat bayi 照料初生嬰兒</label>
                                                                <div class="controls">
                                                                <input type="text" name="rawatbayi" class="control-label span3"  />&nbsp;&nbsp;&nbsp;&nbsp;

                                                                    <select class="span3 " name="tahunrawatbayi" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                            <option value="Tahun 年" />Tahun 年
                                                                            <option value="Bulan 月" />Bulan 月
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> Merawat anak kecil 照顧小孩</label>
                                                            <div class="controls">
                                                                <input type="text" name="rawatanak" class=" popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
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
                                               <optgroup label="Kembar (dipilih jika kembar)">
                                                <?php 
                                                for($i=1;$i<=50;$i++){?>

                                                    <option value="<?php echo"".$i." tahun嵗" ?>" /><?php echo"".$i." tahun 嵗" ?>

                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                             <optgroup label="bulan">
                                                <?php 
                                                for($i=1;$i<=12;$i++){?>
                                                    <option value="<?php echo"".$i." bulan月" ?>" /><?php echo"".$i." bulan 月" ?>
                                                    <?php
                                                }
                                                    ?>

                                              </optgroup>
                                        </select>
                                    </div>
                                </div>
								<!-- 
														<div class="control-group">
                                                            <label class="control-label"> Kondisi Anak</label>
                                                            <div class="controls">
                                                                <input type="text" name="kondisianak" class=" popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
                                                            </div>
                                                            </div> -->
                                                            <div class="control-group">
                                                            <label class="control-label"> Kondisi Anak </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisianak" class='select2 input-block-level' tabindex="13">
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_setjagaanak as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                            <?php
                                                                        }
                                                                            ?>
                                                                      </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
															


                                                            <div class="control-group">
                                                                <label class="controls">merawat orang jompo (男 Pria) 照顧老人</label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class=" " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin">
                                                                        <option value="男 Pria" />男 Pria
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">umur 年齡</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurjompo" class="span3 popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> kondisi 情況 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisijompo[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                                                    <option value="" />
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_kondisijompo as $pilihan) { ?>

                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                            <?php
                                                                        }
                                                                            ?>

                                                                      </optgroup>
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="control-group">
                                                                <label class="controls">merawat orang jompo (女 Wanita) 照顧老人</label>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">性別 Jenis kelamin</label>
                                                                <div class="controls">
                                                                    <select class=" " data-placeholder="Choose a Category" tabindex="1" name="jenis_kelamin2">
                                                                        <option value="女 Wanita" />女 Wanita
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">umur 年齡</label>
                                                            <div class="controls">
                                                                <input type="text" name="umurjompo2" class="span3 popovers" data-trigger="hover" data-content="Masukkan Umur orang jompo" data-original-title="Umur" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label"> kondisi 情況 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="kondisijompo2[]" id="hobi" class='select2 input-block-level' multiple="multiple" tabindex="13">
                                                                    <option value="" />
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_kondisijompo as $pilihan) { ?>

                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>

                                                                            <?php
                                                                        }
                                                                            ?>

                                                                      </optgroup>
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
<div class="control-group">
                                                                <label class="controls">------------------------------------------------------------------</label>
                                                            </div>

                                                         <div class="control-group">
                                                            <label class="control-label">jumlah anggota rumah 家庭成員數目</label>
                                                            <div class="controls">
                                                                <input type="text" name="jumlahanggota" class=" popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tipe rumah majikan 居住類型 </label>
                                                                <div class="controls">
                                                                    <select class=" " name="tiperumah" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                         <option value="Villa 別墅" />Villa 別墅
                                                                        <option value="Apartment 公寓" />Apartment 公寓
                                                                        <option value="Rumah kota 城市房子" />Rumah kota 城市房子
                                                                        <option value="Rumah desa 村屋" /> Rumah desa 村屋
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">rumah berapa lantai 樓</label>
                                                            <div class="controls">
                                                                <input type="text" name="lantai" class=" popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">jumlah kamar tidur 睡房 </label>
                                                            <div class="controls">
                                                                <input type="text" name="kamar" class=" popovers" data-trigger="hover" data-content="Masukkan Jumlah Orang di dalam rumah" data-original-title="Jumlah Orang rumah" />
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label"> keterangan 備註 </label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih data" name="keterangan" class='select2 input-block-level' tabindex="13">
                                                                    <optgroup label="Pilih Kondisi">
                                                                        <?php  foreach ($tampil_data_setketerangan as $pilihan) { ?>
                                                                            <option value="<?php echo $pilihan->isi;echo " ".$pilihan->mandarin;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->mandarin;?>
                                                                            <?php
                                                                        }
                                                                            ?>
                                                                      </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
<!-- 

                                                           <!--  <div class="control-group">
                                                                <label class="control-label">keterangan 備註   </label>
                                                                <div class="controls">
                                                                    <select class=" " name="keterangan" data-placeholder="Choose a Category" tabindex="1">
                                                                            <option value="" />Select...
                                                                         <option value="Membantu di restorant 幫老伴在餐廳" />Membantu di restorant 幫老伴在餐廳
                                                                        <option value="Membantu di hotel 幫老伴在酒店" />Membantu di hotel 幫老伴在酒店
                                                                        <option value="Membantu menjual sayur di pasar 幫老伴在銷售按市場" />Membantu menjual sayur di pasar 幫老伴在銷售按市場
                                                                        <option value="Membantu di toko pakaian 幫老伴的衣服店" /> Membantu di toko pakaian 幫老伴的衣服店
                                                                         <option value="Membantu di kebun sayur 幫老伴的菜園" />Membantu di kebun sayur 幫老伴的菜園
                                                                        <option value="Helping employer's fruit garden 幫老伴的菜園" />Helping employer's fruit garden 幫老伴的菜園
                                                                        <option value="Membantu di kebun rebung 幫老伴的竹笋園" /> Membantu di kebun rebung 幫老伴的竹笋園
                                                                        </select>
                                                                </div>
                                                            </div> -->

<!-- 
                                                            <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Simpan </button>
                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/detailpengalaman/"?>"><i class=" icon-remove"></i> Kembali Ke Profile </a>
                                </div> -->
                                                            
                                                       
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                 </form>
            </div>