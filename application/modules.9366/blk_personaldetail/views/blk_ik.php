<div class="panel-body">


    <table class="table table-bordered table-striped table-hover" id="table2444">
        <thead>
            <tr class="active">
                <th colspan="9">

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal2">TAMBAH IJIN KELUAR</button>
                    <div id="modal_form_horizontal2" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Tambah Ijin Keluar [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_keluar'); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" autocomplete="off" class="form-control pickadate-selectors dewdate2"  name="tgl" placeholder="EX: 2017-05-16 ">
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
                                                        <input required="required" type="text" placeholder="EX : 12:34" class="form-control" name="jam_keluar" id="anytime-time" >
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
                                                        <input type="text" class="form-control pickatime" name="jam_kembali" placeholder="EX : 12:34">
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--
                                        <?php if($hitung_data_terlambat==null){?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="EX : 120" class="form-control value" value="0" name="terlambat" id="value1" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="Auto" class="form-control" name="akm_terlambat" id="total" readonly="readonly" >
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Terlambats (Menit)</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" value="0" id="value2" >
                                            </div>
                                        </div>

                                                <input type="hidden" placeholder="EX : 120" class="form-control value" value="<?php echo $hitung_data_terlambat; ?>" >
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">AKM Terlambats (Menit)</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="Auto" class="form-control" name="akm_terlambat" id="total" readonly="readonly" >
                                            </div>
                                        </div>
                                        <?php } ?>-->
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Keperluan </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="keperluan"  required="required">
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

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk_pemberi_izin"  required="required">
                                                        <option value="" />Select...
                                                        <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Yang di ajak/ikut </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="yg_ikut">
                                                        <option value="" />Select...
                                                        <?php  
                                                            foreach ($tampil_data_pmi as $pilihan) 
                                                            {
                                                        ?>
                                                                <option value="<?php echo $pilihan->nodaftar;?>"><?php echo $pilihan->nama; ?></option>
                                                        <?php  
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Keterangan </label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ></textarea>
                                                </div>
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

                </th>
            </tr>
            <tr>
                <th>NO </th>
                <th class="text-center">ACTIONS</th>
                <th>TANGGAL</th>
                <th>JAM KELUAR</th>
                <th>JAM KEMBALI</th><!--
                <th>TERLAMBAT (MENIT)</th>
                <th>AKM TERLAMBAT</th>-->
                <th>KEPERLUAN</th>
                <th>BLK PEMBERI IZIN</th>
                <th>YANG IKUT</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1; 
                foreach ($tampil_data_izin_keluar as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td class="text-center">
                            <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_keluar/update_data_izin_keluar/'.$row->id_izin_keluar); ?>"><i class="icon-pencil"></i> </a>  -->
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editkeluar<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuskeluar<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> </button> 
                        </td> 
                        <td><?php echo $row->tgl;?></td>
                        <td><?php echo $row->jam_keluar;?></td>
                        <td><?php echo $row->jam_kembali;?></td><!--
                        <td><?php echo $row->terlambat;?></td>
                        <td><?php echo $row->akm_terlambat;?></td>-->
                        <td><?php echo $row->kode_izin_keperluan." - ".$row->ket; ?></td>
                        <td><?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                        <td><?php echo $row->ditemani_oleh;?></td>
                        <td><?php echo $row->keluar_ket;?></td>
                    </tr>

                    <div id="editkeluar<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Update Ijin Keluar [<?php echo $idbio; ?>]</h5>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo site_url('blk_personaldetail/update_data_izin_keluar'); ?>" class="form-horizontal" method="post">                                        
                                    <input type="hidden" class="form-control" name="id_izin_keluar" value="<?php echo $row->id_izin_keluar; ?>">
                                     <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Tanggal </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                        <input required="required" type="text" placeholder="Tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate2" name="tgl" data-format='yyyy.MM.dd' value="<?php echo $row->tgl;?>">
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
                                                        <input required="required" type="text" placeholder="Jam Keluar" class="form-control" name="jam_keluar" value="<?php echo $row->jam_keluar;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Jam Kembali</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" placeholder="Jam Kembali" class="form-control" name="jam_kembali" value="<?php echo $row->jam_kembali;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" placeholder="Terlambat (Menit)" class="form-control" name="terlambat" value="<?php echo $row->terlambat;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                        <input type="text" placeholder="AKM Terlambat (Menit)" class="form-control" name="akm_terlambat" value="<?php echo $row->akm_terlambat;?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Keperluan </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="keperluan"  required="required">
                                                        <option value="<?php echo $row->id_izin_keperluan;?>" ><?php echo $row->kode_izin_keperluan." - ".$row->ket;?></option>
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

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> BLK </label>
                                                <div class="col-sm-9">
                                                    <select class="select-menu-color" name="blk_pemberi_izin"  required="required">
                                                        <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->nama." - ".$row->jabatan_tugas;?></option>
                                                        <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                         <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Yang di ajak/ikut </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="yg_ikut">
                                                        <option value="<?php echo $row->ditemani_oleh;?>" ><?php echo $row->ditemani_oleh.' '.$row->namadia; ?></option>
                                                        <?php  
                                                            foreach ($tampil_data_pmi as $pilihan) 
                                                            {
                                                        ?>
                                                                <option value="<?php echo $pilihan->nodaftar;?>"><?php echo $pilihan->nodaftar.' '.$pilihan->nama; ?></option>
                                                        <?php  
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="control-label col-sm-3"> Keterangan </label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ><?php echo $row->keluar_ket;?></textarea>
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

                    <div id="hapuskeluar<?php echo $no; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Hapus Ijin Keluar [<?php echo $idbio; ?>]</h5>
                                </div>
                                <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_keluar'); ?>" class="form-horizontal" method="post">                                     
                                    <div class="modal-body">
                                         <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <input type="hidden" class="form-control" name="id_izin_keluar" value="<?php echo $row->id_izin_keluar; ?>">
                                        <p>Apakah anda yakin akan menghapus data dengan ID <code class="text-danger"><?php echo $row->id_izin_keluar; ?></code> ?</p>
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

<script type="text/javascript">
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

$('#table2444').dataTable();
</script>