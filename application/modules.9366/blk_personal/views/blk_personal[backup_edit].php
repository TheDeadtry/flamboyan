
                
                <div class="modal fade" id="edit" tabindex="-2" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal" method="post" action="" id="form_edit">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">UBAH DATA PERSONAL</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="ed1" name="id_personalblk" value="">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="" placeholder="EX: Budi" id="ed2" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Nama Pemilik TKI</label>
                                                <select class="select-results-color ed3" id="pemilikxx" name="pemilik" id="">
                                                    <option value=""></option>
                                                    <?php  foreach ($tampil_data_pemilik_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->negara;?>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>PL (SPONSOR)</label>
                                                <select class="select-results-color ed4" name="sponsor" id="">
                                                    <option value=""></option>
                                                    <?php  foreach ($tampil_data_sponsor as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->kode_sponsor;?>" /><?php echo $pilihan->kode_sponsor." - ".$pilihan->nama;?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>ID DIPNAKER</label>
                                                <input type="text" id="ed5" name="nodisnaker" value="" placeholder="EX: 12345" class="form-control">
                                            </div>

                                            <div class="col-sm-6">
                                                <label>NO DAFTAR TKI</label>
                                                <input type="text" id="ed6" name="notki" value="" placeholder="EX: 0001 (NO ID TIDAK BOLEH SAMA)" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>TEMPAT LAHIR</label>
                                                <input type="text" id="ed7" name="tempatlahir" value="" placeholder="EX: Lamongan" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>TANGGAL LAHIR</label>
                                                <input type="text" id="ed8" name="tanggalnyas" value="" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                            </div>
                                            <div class="col-sm-4">
                                                <label>JENIS KELAMIN</label>
                                                 <select class="select-results-color ed9"  id="jeniskelamin" name="jeniskelamin" id="">
                                                    <option value=""></option>
                                                    <?php  foreach ($tampil_data_jk_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>ALAMAT</label>
                                                <input type="text" id="ed10" name="alamat"  value="" placeholder="EX: Jalan Flamboyan" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>NO TELP</label>
                                                <input type="text" name="notelp" id="ed11"  value="" placeholder="EX: 0811111" class="form-control">
                                            </div>
                                             <div class="col-sm-4">
                                                <label>PENDIDIKAN</label>
                                                <input type="text" name="pendidikan" id="ed12"  value="" placeholder="EX: SMA" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>NO KTP</label>
                                                <input type="text" name="noktp" id="ed13"  value="" placeholder="EX: 0032123" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>TUJUAN NEGARA</label>
                                                 <select class="select-results-color ed14x" name="negara">
                                                    <option  value=""></option>
                                                    <?php  foreach ($tampil_data_negara_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                             <div class="col-sm-4 ">
                                                <label >BAHASA</label>
                                                <select id="" class="select-results-color ed15" name="bahasa">
                                                    <option  value=""></option>
                                                    <?php  foreach ($tampil_data_bahasa_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>EKS/NON</label>
                                                <select class="select-results-color ed16" name="eksnon" id="">
                                                    <option  value=""></option>
                                                    <?php  foreach ($tampil_data_eksnon_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Cluster</label>
                                                 <select class="select-results-color ed17" name="cluster" id="">
                                                    <option  value=""></option>
                                                    <?php  foreach ($tampil_data_cluster_tki as $pilihan) { ?>
                                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>NO PASPOR</label>
                                                <input type="text" id="ed18"  value="" name="nopaspor" placeholder="EX: 111232" class="form-control">
                                            </div>

                                           <!--  <div class="col-sm-6">
                                                <label>INPUT FOTO</label>
                                                <input type="file" name="foto" class="file-styled">
                                            </div> -->
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Tgl MED AWAL</label>
                                                <input type="text" id="ed19" name="tglmed" value="" placeholder="EX: YYYY-MM-DD" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Tgl MED FULL</label>
                                                <input type="text" id="ed20" name="tglmedfull" value="" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Tgl SIDIK JARI</label>
                                                <input type="text" id="ed21" name="tgljari" value="" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="edit_process666()" name="submit">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
