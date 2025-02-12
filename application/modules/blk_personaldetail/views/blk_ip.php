<div class="panel-body">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal4">TAMBAH IJIN PULANG</button>
    <div id="modal_form_horizontal4" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Tambah Ijin Pulang [<?php echo $idbio; ?>]</h5>
                </div>
                <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_pulang'); ?>" class="form-horizontal" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">

                           <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Keluar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input  type="text" class="form-control pickadate-selectors dewdate2" readonly="readonly" autocomplete="off" name="tglkeluar" placeholder="EX: 2017-05-16 ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Jam Keluar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                    <input  type="text" placeholder="EX : 12:34" class="form-control" name="jamkeluar" id="anytime-time" >
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Kembali</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="text" class="form-control pickadate-selectors dewdate2" readonly="readonly" autocomplete="off" name="tglkembali" placeholder="EX: 2017-05-16 ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Jam Kembali</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                    <input type="text" class="form-control pickatime" name="jamkembali" placeholder="EX : 12:34">
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal Kembali (Actual)</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="text" autocomplete="off" readonly="readonly" class="form-control pickadate-selectors dewdate2"  name="tglact" placeholder="EX: 2017-05-16 ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Jam Kembali (Actual)</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                    <input type="text" class="form-control pickatime" name="jamact" placeholder="EX : 12:34">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-sm-3"> KEPERLUAN </label>
                                <div class="col-sm-9">
                                    <select class="select-menu-color" name="keperluan">
                                        <option value="" />Select...
                                        <?php  
                                            foreach ($tampil_data_izin_keperluan as $pilihan) { 
                                        ?>
                                                <option value="<?php echo $pilihan->id_izin_keperluan;?>" /><?php echo $pilihan->kode_izin_keperluan." - ".$pilihan->ket;?>
                                        <?php  
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
<!--
                            <?php if($hitung_data_terlambatpulang==null){?>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Terlambat (JAM)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" id="lam2"  value="0" onblur="recalculateSum2();"  >
                            </div>
                        </div>
                          <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="0" id="tot2" >
                         <div class="form-group">
                            <label class="control-label col-sm-3">AKM Terlambat (JAM)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total3" readonly="readonly" >
                            </div>
                        </div>
                        <?php }else{?>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Terlambats (JAM)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="EX : 2" class="form-control value" name="terlambat" id="lam2"  value="0" onblur="recalculateSum2();" >
                            </div>
                        </div>
                        <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="<?php echo $hitung_data_terlambatpulang; ?>" id="tot2" >
                         <div class="form-group">
                            <label class="control-label col-sm-3">AKM Terlambats (JAM)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total3" readonly="readonly" >
                            </div>
                        </div>
                        <?php } ?>
                       -->
                        <div class="form-group">
                            <label class="control-label col-sm-3"> ADM </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="adm">
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                    <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-3"> ADM2 </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="adm2">
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_adm2 as $pilihan3) { ?>
                                    <option value="<?php echo $pilihan3->id_adm_kantor;?>" /><?php echo $pilihan3->kode_adm_kantor." - ".$pilihan3->nama." - ".$pilihan3->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"> MARK </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="mark"  >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"> BLK </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="blk"  >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"> LS </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="blkls"  >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_instruktur_ls as $pilihan3) { ?>
                                    <option value="<?php echo $pilihan3->id_instruktur;?>" /><?php echo $pilihan3->kode_instruktur." - ".$pilihan3->nama." - ".$pilihan3->jabatan_tugas;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-3"> STPM </label>
                            <div class="col-sm-9">
                                <select class="select-menu-color" name="satpam"  >
                                    <option value="" />Select...
                                    <?php  foreach ($tampil_data_satpam as $pilihan3) { ?>
                                    <option value="<?php echo $pilihan3->id;?>" /><?php echo $pilihan3->nama." - ".$pilihan3->jabatansatpam;?>
                                     <?php  } ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-sm-3">Keterangan </label>
                            <div class="col-sm-9">
                                <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ></textarea>
                            </div>
                        </div>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table datatable-basic table-bordered table-striped table-hover" id="table4">
        <thead>
            <tr>
                <th>NO </th>
                <th class="text-center">ACTIONS</th>
                <th>TGL/JAM KELUAR</th>
                <th>TGL/JAM KEMBALI</th>
                <th>TGL/JAM KEMBALI(ACTUAL)</th>
                <!-- <th>TERLAMBAT (JAM)</th>
                <th>AKM </th> -->
                <th>KEPERLUAN</th>
                <th>BLK PEMBERI IZIN (MARK)</th>
                <th>BLK PEMBERI IZIN (ADM)</th>
                <th>BLK PEMBERI IZIN (ADM2)</th>
                <th>BLK PEMBERI IZIN (BLK)</th>
                <th>BLK PEMBERI IZIN (LS)</th>
                <!-- <th>BLK PEMBERI IZIN (STPM)</th> -->
                <th>KET</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1; 
                foreach ($tampil_data_izin_pulang as $row) { 
            ?>
                    <tr>    
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_pulang/update_data_izin_pulang/'.$row->id_izin_pulang); ?>"><i class="icon-pencil"></i> Edit</a>  -->
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editpulang<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuspulang<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> </button> 
                        </td> 
                        <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                        <td><?php echo $row->tglkembali.'<br>'.$row->jamkembali;?></td>
                        <td><?php echo $row->tglactual.'<br>'.$row->jamactual;?></td><!--
                        <td><?php echo $row->terlambat;?></td>
                        <td><?php echo $row->akm_terlambat;?></td>-->
                        <td><?php echo $row->kode_izin_keperluan." - ".$row->ketizin; ?></td>
                        <td><?php echo $row->kode_marketing;?> <?php echo $row->namamark;?> <?php echo $row->jabatanmark;?></td>
                        <td><?php echo $row->kode_adm_kantor;?> <?php echo $row->namaadm;?> <?php echo $row->jabatanadm;?></td>
                        <td><!--<?php echo $row->kode_adm_kantor;?>--><?php echo $row->namaadm2;?> <?php echo $row->jabatanadm2;?></td>
                        <td><!--<?php echo $row->kode_instruktur;?>--><?php echo $row->namablk;?> <?php echo $row->jabatanblk;?></td>
                        <td><!--<?php echo $row->kode_instruktur;?>--> <?php echo $row->namablkls;?> <?php echo $row->jabatanblkls;?></td>
                        <td><?php echo $row->ket;?></td>
                    </tr>

                    <div id="editpulang<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update Ijin Pulang [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_izin_pulang'); ?>" class="form-horizontal" method="post">                                   
                                    <input type="hidden" class="form-control" name="id_izin_pulang" value="<?php echo $row->id_izin_pulang; ?>">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Keluar </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input  type="text" placeholder="Tanggal Keluar" class="form-control dewdate2" autocomplete="off" readonly="readonly" name="tglkeluar" value="<?php echo $row->tglkeluar;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Keluar</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input  type="text" placeholder="Jam Keluar" class="form-control" name="jamkeluar" value="<?php echo $row->jamkeluar;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Kembali</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input type="text" placeholder="Tanggal Kembali" class="form-control dewdate2" autocomplete="off" readonly="readonly" name="tglkembali" value="<?php echo $row->tglkembali;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Kembali</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                        <input type="text" placeholder="Jam Kembali" class="form-control" name="jamkembali" value="<?php echo $row->jamkembali;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal Kembali (Actual)</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input type="text" placeholder="Tanggal Kembali (Actual)" class="form-control dewdate2" autocomplete="off" readonly="readonly" name="tglact" value="<?php echo $row->tglactual;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Kembali (Actual)</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                        <input type="text" placeholder="Jam Kembali (Actual)" class="form-control" name="jamact" value="<?php echo $row->jamactual;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Keperluan </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="keperluan">
                                                        <option value="<?php echo $row->id_izin_keperluan;?>" ><?php echo $row->kode_izin_keperluan." - ".$row->ketizin;?></option>
                                                        <?php  
                                                            foreach ($tampil_data_izin_keperluan as $pilihan) { 
                                                        ?>
                                                                <option value="<?php echo $pilihan->id_izin_keperluan;?>" /><?php echo $pilihan->kode_izin_keperluan." - ".$pilihan->ket;?>
                                                        <?php  
                                                            } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Terlambat" class="form-control" name="terlambat" value="<?php echo $row->terlambat;?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" value="<?php echo $row->akm_terlambat;?>" >
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk">
                                                        <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->namablk." - ".$row->jabatanblk;?></option>
                                                        <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> ADM </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="adm"  >
                                                        <option value="<?php echo $row->id_adm_kantor;?>" ><?php echo $row->kode_adm_kantor." - ".$row->namaadm." - ".$row->jabatanadm;?></option>
                                                        <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                                        <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> ADM2 </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="adm2"  >
                                                        <option value="<?php echo $row->id_adm_kantor;?>" ><?php echo $row->kode_adm_kantor." - ".$row->namaadm2." - ".$row->jabatanadm2;?></option>
                                                        <?php  foreach ($tampil_data_adm2 as $pilihan3) { ?>
                                                        <option value="<?php echo $pilihan3->id_adm_kantor;?>" /><?php echo $pilihan3->kode_adm_kantor." - ".$pilihan3->nama." - ".$pilihan3->jabatan_tugas;?>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> MARK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="mark"  >
                                                        <option value="<?php echo $row->id_marketing;?>" ><?php echo $row->kode_marketing." - ".$row->namamark." - ".$row->jabatanmark;?></option>
                                                        <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> LS </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk"  >
                                                        <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->namablk." - ".$row->jabatanblk;?></option>
                                                        <?php  foreach ($tampil_data_instruktur_ls as $pilihan3) { ?>
                                                        <option value="<?php echo $pilihan3->id_instruktur;?>" /><?php echo $pilihan3->kode_instruktur." - ".$pilihan3->nama." - ".$pilihan3->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> STPM </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk"  >
                                                        <option value="<?php echo $row->id;?>" ><?php echo $row->kode_instruktur." - ".$row->namablk." - ".$row->jabatanblk;?></option>
                                                        <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Keterangan </label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" value="" ><?php echo $row->ket;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <hr>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="hapuspulang<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus Ijin Pulang [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_pulang'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_izin_pulang" value="<?php echo $row->id_izin_pulang; ?>">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <p>Apakah anda yakin akan menghapus data dengan ID <code class="text-danger"><?php echo $row->id_izin_pulang; ?></code> ?</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php 
                $no++;  
                } 
            ?>
        </tbody>
    </table>
</div>
<script>
$('.dewdate2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            minDate: "dateToday",
            todayBtn: "linked",
            clearBtn: true,
            zIndexOffset: 1600
        }).click(function() {    
            $(this).datepicker('setDate', $(this).val() );
        }).removeClass('pointer').addClass('pointer').attr('readonly','readonly');

</script> 