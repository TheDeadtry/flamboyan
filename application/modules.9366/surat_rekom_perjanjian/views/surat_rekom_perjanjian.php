 <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Print Perjanjian Kerja</span>
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
                    <li class='active'>Print Perjanjian Kerja</li>
                </ul>
            </div>
        </div>
    </div>
</div>


                            <div class='row-fluid'>
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
                                <div class='title'>SURAT UNTUK <?php echo $id_bio;?></div>
                                <div class='actions'>
                                    <a href="<?php echo base_url()."index.php/detaildisnaker/"?>" role="button" class="btn btn-success"> Kembali</a>
                           			 <a href="#myModal1" role="button" class="btn btn-success" data-toggle="modal">Tambah Data</a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                            <th>Nomor Surat</th>
                                            <th>Lembur</th>
                                            <th>Nama Saksi</th>
                                            <th>Hub Saksi</th>
                                            <th>Nama Dinas</th>
                                            <th>Tanggal</th>
                                            <th>Total Rupiah</th>
                                            <th>Total NT</th>
                                            <th>Diangsur</th>
                                            <th>Detail Pembayaran</th>
                                            <th>job</th>
                                            <th>Kepala Disnaker (10 Pasal)</th>
                                            <th>Gaji (10 Pasal)</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td>
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetak/<?php echo $row->id_tki;?>"  target="_blank" class="btn btn-warning">Print (Pasal 19)</a><br/>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetak/<?php echo $row->id_tki;?>/2/"  target="_blank" class="btn btn-warning">Print (Pasal 19) Cabang</a><br/>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetak/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-warning">Print (Pasal 19) Khusus Kediri</a><br/>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetak2/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-warning">Print (Pasal 19) Khusus Ngawi</a><br/>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetakpasal18/<?php echo $row->id_tki;?>"  target="_blank" class="btn btn-info">Print (Pasal 18)</a><br>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetakpasal18/<?php echo $row->id_tki;?>/2/"  target="_blank" class="btn btn-info">Print (Pasal 18) cabang</a><br>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/baru1/cetakpasal18/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-info">Print (Pasal 18) Khusus Kediri</a><br>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-danger">Print Formal Madiun</a><br>-->
                                                <!--<a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-danger">Print Formal 10 Pasal</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/zerocost/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-success">Print Zero Cost</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal_kab_pati/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-success">Print Formal Kab. PATI</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal_kab_banyuwangi/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-success">Print Formal Kab. BANYUWANGI</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal_kab_ponorogo/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-success">Print Formal Kab. PONOROGO</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal_kab_lampung/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-success">Print Formal Kab. LAMPUNG</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/formal_kab_ngawi/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-success">Print Formal Kab. NGAWI</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/zerocost_tulungagung_fi/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-info">Print Zero Cost FI Tulungagung</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/zerocost_banyuwangi/<?php echo $row->id_tki;?>/3/true"  target="_blank" class="btn btn-info">Print Zero Cost Banyuwangi</a><br>
                                                --><a href="<?php echo base_url(); ?>index.php/new_pdf_pp/novformal/<?php echo $row->id_tki;?>"  target="_blank" class="btn btn-success">Print Formal</a><br>
                                                <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/novinformal/<?php echo $row->id_tki;?>"  target="_blank" class="btn btn-info">Print Informal</a><br>
                                                
                                            </td>
                                            <td><?php echo $row->nomor;?></td>
                                            <td><?php echo $row->lembur;?></td>
                                            <td><?php echo $row->namasaksi;?></td>
                                            <td><?php echo $row->hubsaksi;?></td>
                                            <td><?php echo $row->namadinas;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->a1;?></td>
                                            <td><?php echo $row->a2;?></td>
                                            <td><?php echo $row->a3;?></td>
                                            <td><?php echo $row->a4;?></td>
                                            <td><?php echo $row->a5;?></td>
                                            <td><?php echo $row->a6;?></td>
                                            <td><?php echo $row->a7;?></td>
                                        </tr>



                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_perjanjian/edit_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                                    		<input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor"  class="span10 popovers"  value="<?php echo $row->nomor;?>" class="form-control" required>
                                                      </div>
                                                    </div>


                                                    <div class="control-group">
                                                        <label class="control-label">Lembur</label>
                                                      <div class="controls">
                                                        <input type="text" name="lembur" class="span10 popovers"  value="<?php echo $row->lembur;?>" class="form-control" required>
                                                      </div>
                                                    </div>


                                                    <div class="control-group">
                                                        <label class="control-label">Nama Saksi</label>
                                                      <div class="controls">
                                                        <input type="text" name="namasaksi" class="span10 popovers" value="<?php echo $row->namasaksi;?>" class="form-control" required>
                                                      </div>
                                                    </div>


                                                    <div class="control-group">
                                                      <label class="control-label">Hubungan Saksi Dan TKI</label>
                                                      <div class="controls">
                                                        <select name="hubungan" class="form-control select-search">
                                                             <option  value="<?php echo $row->hubsaksi;?>" class="form-control"><?php echo $row->hubsaksi;?></option>
                                                                <option  value="Orang Tua / Wali" class="form-control">Orang Tua / Wali</option>
                                                                <option  value="Ayah" class="form-control">Ayah</option>
                                                                <option  value="Ibu" class="form-control">Ibu</option>
                                                                <option  value="Anak" class="form-control">Anak</option>
                                                                <option  value="Istri" class="form-control">Istri</option>
                                                                <option  value="Suami" class="form-control">Suami</option>
                                                                <option  value="Saudara" class="form-control">Saudara</option>
                                                                <option  value="Paman" class="form-control">Paman</option>
                                                                <option  value="wali" class="form-control">Wali</option>
                                                        </select>
                                                         </div>
                                                    </div>

                                                    <div class="control-group">
                                                      <label class="control-label">Nama Dinas </label>
                                                      <div class="controls">
                                                         <input type="text" name="namadinas" value="<?php echo $row->namadinas;?>" placeholder="Berisi Nama Dinas Kab/Kota" class="form-control" required>
                                                         </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label span4"> Tanggal Dokumen </label>
                                                        <div class="controls">
                                                            <div class='datepicker input-append' id='datepicker'>
                                                                <input class='input-medium' data-format='dd-MM-yyyy'  name="tanggal"  value="<?php echo $row->tanggal; ?>" placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                            </div>
                                                            <code class="text-danger">Ubah Jika berbeda</code>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    <b>Opsional (untuk print kab. Pati)</b><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Total Rupiah </label>
                                                        <div class="controls">
                                                            <textarea name="a1" rows="4" cols="200" class="span12 form-control" ><?php echo $row->a1;?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Total NT </label>
                                                        <div class="controls">
                                                            <textarea name="a2" rows="4" cols="200" class="span12 form-control" ><?php echo $row->a2;?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Diangsur </label>
                                                        <div class="controls">
                                                            <textarea name="a3" rows="4" cols="200" class="span12 form-control" ><?php echo $row->a3;?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Detail Pembayaran </label>
                                                        <div class="controls">
                                                            <textarea name="a4" rows="4" cols="200" class="span12 form-control" ><?php echo $row->a4;?></textarea>
                                                        </div>
                                                    </div>
                                                    <b>Opsional (ganti kata WORKER di PDF)</b><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Job </label>
                                                        <div class="controls">
                                                            <input name="a5" class="span12 form-control" value="<?php echo $row->a5;?>" />
                                                        </div>
                                                    </div>
                                                    <b>Opsional untuk print 10 Pasal </b><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Kepala Disnaker(Jika tidak diisi, data diambil dari ttl) </label>
                                                        <div class="controls">
                                                            <input name="a6" class="span12 form-control" value="<?php echo $row->a6;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Gaji (NT) </label>
                                                        <div class="controls">
                                                            <input name="a7" class="span12 form-control" value="<?php echo $row->a7;?>" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                            </div>

                                            <div id="hapus" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Hapus Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_perjanjian/hapus_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                  <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                    <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->nomor; ?></code> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>

                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
 <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_perjanjian/simpan_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />


                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor" class="span10 popovers"  placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div>


                                                    <div class="control-group">
                                                        <label class="control-label">Lembur</label>
                                                      <div class="controls">
                                                        <input type="text" name="lembur" class="span10 popovers"   placeholder="Berisi Data Surat" class="form-control" required>      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>


                                                    <div class="control-group">
                                                        <label class="control-label">Nama Saksi</label>
                                                      <div class="controls">
                                                        <input type="text" name="namasaksi" class="span10 popovers" value="<?php echo "".$nama_bapak?>"  placeholder="Berisi Data Surat" class="form-control" required>     <code class="text-danger">Ini Adalah Nama Bapak, Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>

                                                    <div class="control-group">
                                                      <label class="control-label">Hubungan Saksi Dan TKI</label>
                                                      <div class="controls">
                                                        <select name="hubungan" class="form-control select-search">
                                                                 <option  value="Orang Tua / Wali" class="form-control">Orang Tua / Wali</option>
                                                                <option  value="Ayah" class="form-control">Ayah</option>
                                                                <option  value="Ibu" class="form-control">Ibu</option>
                                                                <option  value="Anak" class="form-control">Anak</option>
                                                                <option  value="Istri" class="form-control">Istri</option>
                                                                <option  value="Suami" class="form-control">Suami</option>
                                                                <option  value="Saudara" class="form-control">Saudara</option>
                                                                <option  value="Paman" class="form-control">Paman</option>
                                                                <option  value="wali" class="form-control">Wali</option>
                                                        </select>
                                                         </div>
                                                    </div>

                                                    <div class="control-group">
                                                      <label class="control-label">Nama Dinas </label>
                                                      <div class="controls">
                                                         <input type="text" name="namadinas" placeholder="Berisi Nama Dinas Kab/Kota" class="form-control" required>
                                                         </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label span4"> Tanggal Dokumen </label>
                                                        <div class="controls">
                                                            <div class='datepicker input-append' id='datepicker'>
                                                                <input class='input-medium' data-format='dd-MM-yyyy'  name="tanggal"  value="" placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                    <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                            </div>
                                                            <code class="text-danger">Ubah Jika berbeda</code>
                                                        </div>
                                                    </div>

                                                    <hr/>
                                                    <b>Opsional (untuk print kab. Pati)</b><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Total Rupiah </label>
                                                        <div class="controls">
                                                            <textarea name="a1" rows="4" cols="200" class="span12 form-control" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Total NT </label>
                                                        <div class="controls">
                                                            <textarea name="a2" rows="4" cols="200" class="span12 form-control" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Diangsur </label>
                                                        <div class="controls">
                                                            <textarea name="a3" rows="4" cols="200" class="span12 form-control" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Detail Pembayaran </label>
                                                        <div class="controls">
                                                            <textarea name="a4" rows="4" cols="200" class="span12 form-control" ></textarea>
                                                        </div>
                                                    </div>
                                                    <b>Opsional (ganti kata WORKER di PDF)</b><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Job</label>
                                                        <div class="controls">
                                                            <input name="a5" class="span12 form-control" />
                                                        </div>
                                                    </div>
                                                    <b>Opsional untuk print 10 Pasal (Jika tidak diisi, data diambil dari ttl) </b><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Kepala Disnaker </label>
                                                        <div class="controls">
                                                            <input name="a6" class="span12 form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Gaji (NT) </label>
                                                        <div class="controls">
                                                            <input name="a7" class="span12 form-control" />
                                                        </div>
                                                    </div>

                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
