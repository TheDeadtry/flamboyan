<div class='row-fluid'>
  <div class='span12'>
    <div class='page-header'>
      <h1 class='pull-left'> <i class='icon-star'></i> <span>Data Biodata</span> </h1>
      <div class='pull-right'>
        <ul class='breadcrumb'>
          <li> <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i> </a> </li>
          <li class='separator'> <i class='icon-angle-right'></i> </li>
          <li class='active'>Print Surat Perjanjian Penempatan</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class='row-fluid'>
  <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
    <div class='box-header orange-background'>
      <div class='title'>Data TKI</div>
      <div class='actions'> <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i> </a> <a href="#" class="btn box-collapse btn-mini btn-link"><i></i> </a> <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Tambah Data</a> </div>
    </div>
    <div class='box-content box-no-padding'>
      <div class='responsive-table'>
        <div class='scrollable-area'>
          <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
            <thead>
              <tr>
              <th colspan="1">#</th>
                <th colspan="8">ID TKI</th>
                <th colspan="8">Nama Lengkap</th>
                <th colspan="8">Tempat & Tanggal Lahir</th>
                <th colspan="4">Jenis Kelamin</th>
                <th colspan="4">Alamat (sesuai E-KTP)</th>
                <th colspan="4">No Telepon</th>
                <th colspan="4">Nama Orang Tua </th>
                <th colspan="4">No Telepon Keluarga</th>
                <th colspan="4">Pendidikan Terakhir</th>
                <th colspan="4">Status Perkawinan</th>
                <th colspan="4">Nama Suami/Istri</th>

                <th colspan="4">Alamat Suami/Istri</th>
                <th colspan="4">Negara Bekerja</th>
                <th colspan="4">Nama Pengguna </th>
                <th colspan="4">ID Pengguna </th>
                <th colspan="4">No Telp Pengguna </th>
                <th colspan="4">Alamat Pengguna </th>
                <th colspan="4">Jabatan Bekerja</th>
                
                <th colspan="4">Gaji</th>
                <th colspan="4">Lembur</th>
                <th colspan="4">Hubungan Saksi</th>

                <th colspan="4">Nama Wali</th>
                <th colspan="4">Nama Dinas Terkait</th>
                <th colspan="8">Opsi</th>
                <th colspan="4">Print</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
              <tr>
                <td colspan="1"><?php echo $no;?></td>
                <td colspan="8"><?php echo $row->id_biodata;?></td>
                <td colspan="8"><?php echo $row->namanya;?></td>
                <td colspan="4"><?php echo $row->tempatlahir;?></td>
                <td colspan="4"><?php echo $row->tgllahir;?></td>
                <td colspan="4"><?php echo $row->jeniskelamin;?></td>
                <td colspan="4"><?php echo $row->alamatnya;?></td>
                <td colspan="4"><?php echo $row->notelp;?></td>
                <td colspan="4"><?php echo $row->nama_bapak;?></td>
                <td colspan="4"><?php echo $row->notelpkel;?></td>
                <td colspan="4"><?php echo $row->pendidikan;?></td>
                <td colspan="4"><?php echo $row->status;?></td>
                <td colspan="4"><?php echo $row->nama_istri_suami;?></td>
                
                <td colspan="4"><?php echo $row->alamatnya;?></td>
                <td colspan="4"><?php echo $row->negara;?></td>
                <td colspan="4"><?php echo $row->nama;?></td>
                <td colspan="4"><?php echo $row->nosiup;?></td>
                <td colspan="4"><?php echo $row->notel;?></td>
                <td colspan="4"><?php echo $row->alamat;?></td>
                <td colspan="4"><?php echo $row->jabatan;?></td>
                <td colspan="4"><?php echo $row->gaji;?></td>
                <td colspan="4"><?php echo $row->lembur;?></td>
                <td colspan="4"><?php echo $row->hubungan;?></td>
                <td colspan="4"><?php echo $row->wali;?></td>
                <td colspan="4"><?php echo $row->nama_dinas;?></td>
                <td colspan="4"><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-primary">Edit</a></td>
                <td colspan="4"><a href="#hapus<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                <td colspan="4"><a href="<?php echo base_url(); ?>baru1/cetak/<?php echo $row->id_biodata;?>" class="btn btn-warning" >Print</a></td>
              </tr>
            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">Modal Header</h3>
              </div>
              <div class="modal-body" >
                <form action="<?php echo site_url('perjanjian_penempatan_jompo/edit_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                
                <input type="hidden" class="form-control" name="id_penempatan" value="<?php echo $row->id_penempatan; ?>">
               
                 <div class="control-group">
                  <label class="control-label">Nama TKI</label>
                  <div class="controls">
                    <select name="id_biodata" class="form-control select-search" >
                      <?php foreach ($tampil_data_tki as $row3) { ?>
                      <option value="<?php echo $row3->id_biodata;?>"><?php echo $row3->nama;?></option>
                      <?php }?>
                    </select >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Jabatan TKI</label>
                  <div class="controls">
                    <select name="jabatan" class="form-control select-search" >
                      <?php foreach ($tampil_data_jabatan as $row4) { ?>
                      <option value="<?php echo $row4->isi;?>"><?php echo $row4->isi;?></option>
                      <?php }?>
                    </select >
                     </div>
                </div>
               
                 <div class="control-group">
                  <label class="control-label">Negara Bekerja </label>
                  <div class="controls">
                     <input type="text" name="negara" value="<?php echo $row->negara;?>" class="form-control" required>
                     </div>
                </div>
               
                  <div class="control-group">
                  <label class="control-label">Gaji </label>
                  <div class="controls">
                    <input type="text" name="gaji" value="<?php echo $row->gaji;?>" class="form-control" >
                     </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Lembur </label>
                  <div class="controls">
                     <input type="text" name="lembur" value="<?php echo $row->lembur;?>" class="form-control" >
                     </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Nama Saksi </label>
                  <div class="controls">
                     <input type="text" name="wali" value="<?php echo $row->wali;?>" class="form-control" required>
                     </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Hubungan </label>
                  <div class="controls">
                    <select name="hubungan" class="form-control select"required>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Orang Tua Wali</option>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Ayah</option>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Ibu</option>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Anak</option>
                                  
                    </select>
                     </div>
                </div>


                 <div class="control-group">
                  <label class="control-label">Nama Dinas </label>
                  <div class="controls">
                     <input type="text" name="nama_dinas" value="<?php echo $row->nama_dinas;?>" class="form-control" required>
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
            <div id="hapus<?php echo $no; ?>" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">Hapus Data</h3>
              </div>
              <div class="modal-body">
                <form action="<?php echo site_url('perjanjian_penempatan_jompo/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                
                <input type="hidden" class="form-control" name="id_penempatan" value="<?php echo $row->id_penempatan; ?>">
                <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->namanya; ?></code> ?</p>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Hapus</button>
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

            <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">Modal Header</h3>
              </div>
              <div class="modal-body" >
                <form action="<?php echo site_url('perjanjian_penempatan_jompo/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                <div class="control-group">
                  <label class="control-label">Nama TKI</label>
                  <div class="controls">
                    <select name="id_biodata" class="form-control select-search" >
                      <?php foreach ($tampil_data_tki as $row3) { ?>
                      <option value="<?php echo $row3->id_biodata;?>"><?php echo $row3->nama;?></option>
                      <?php }?>
                    </select >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Jabatan TKI</label>
                  <div class="controls">
                    <select name="jabatan" class="form-control select-search" >
                      <?php foreach ($tampil_data_jabatan as $row4) { ?>
                      <option value="<?php echo $row4->isi;?>"><?php echo $row4->isi;?></option>
                      <?php }?>
                    </select >
                     </div>
                </div>
               
                 <div class="control-group">
                  <label class="control-label">Negara Bekerja </label>
                  <div class="controls">
                     <input type="text" name="negara" placeholder="Berisi Negara Tempat Bekerja" class="form-control" required>
                     </div>
                </div>
               
                 <div class="control-group">
                  <label class="control-label">Gaji </label>
                  <div class="controls">
                     <input type="text" name="gaji" placeholder="Berisi Gaji" class="form-control" required>
                     </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Lembur </label>
                  <div class="controls">
                     <input type="text" name="lembur" placeholder="Berisi Banyaknya Lembur" class="form-control" >
                     </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Nama Saksi </label>
                  <div class="controls">
                     <input type="text" name="wali" placeholder="Berisi Nama Saksi " class="form-control" required>
                     </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Hubungan Saksi Dan TKI</label>
                  <div class="controls">
                    <select name="hubungan" class="form-control select-search">
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Orang Tua / Wali</option>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Ayah</option>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Ibu</option>
                            <option  placeholder="Berisi Hubungan dengan TKI" class="form-control">Anak</option>
                                  
                    </select>
                     </div>
                </div>


                 <div class="control-group">
                  <label class="control-label">Nama Dinas </label>
                  <div class="controls">
                     <input type="text" name="nama_dinas" placeholder="Berisi Nama Dinas Kab/Kota" class="form-control" required>
                     </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save</button>
              </div>
                </form>
              
            </div>