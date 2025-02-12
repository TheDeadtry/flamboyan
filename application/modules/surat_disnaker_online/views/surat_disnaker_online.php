<div class='row-fluid'>
  <div class='span12'>
    <div class='page-header'>
      <h1 class='pull-left'> <i class='icon-star'></i> <span>Data Biodata</span> </h1>
      <div class='pull-right'>
        <ul class='breadcrumb'>
          <li> <a href="<?php echo site_url().'/print_data'; ?>"><i class='icon-bar-chart'></i> </a> </li>
          <li class='separator'> <i class='icon-angle-right'></i> </li>
          <li class='active'>Print Format Disnaker Formal</li>
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
                <th >#</th>
                <th >Nama TKI</th>
                <th >Nama IBU</th>
                <th >Nama AYAH</th>
                <th >Jenis Kelamin </th>
                <th >Tempat Lahir </th>
                <th >Tanggal Lahir </th>
                <th >NO. KTP TKI   </th>
                <th >Alamat TKI   </th>
                <th >Provinsi  </th>
                <th >Kota Asal   </th>
                <th >Alamat ORANG TUA TKI  </th>
                <th >KOTA ORANG TUA TKI  </th>
                <th >STATUS PERKAWINAN TKI  </th>
                <th >Agama  </th>
                <th >PENDIDIKAN  </th>
                <th >AGENCY  </th>
                <th >MATA UANG  </th>
                <th >JABATAN  </th>
                <th >SEKTOR USAHA  </th>
                <th >Gaji TKI   </th>
                <th >NO PASPOR   </th>
                <th >MASA BERLAKU  </th>
                <th >MASA HABIS BERLAKU   </th>
                <th >TGL. BERANGKAT  </th>
                <th >TGL. TIBA   </th>
                <th >OPSI   </th>
                <th >OPSI   </th>
                <th >Print   </th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
              <tr>
                <td ><?php echo $no;?></td>
                <td ><?php echo $row->namanya;?></td>
                <td ><?php echo $row->nama_ibu;?></td>
                <td ><?php echo $row->nama_bapak;?></td>
                <td ><?php echo $row->jeniskelamin;?></td>
                <td ><?php echo $row->tempatlahir;?></td>
                <td ><?php echo $row->tgllahir;?></td>
                <td ><?php echo $row->no_ktpnya;?></td>
                <td ><?php echo $row->alamatnya;?></td>
                <td ><?php echo $row->provinsi;?></td>
                <td ><?php echo $row->alamatnya;?></td>
                <td ><?php echo $row->alamatnya;?></td>
                <td ><?php echo $row->alamatnya;?></td>
                <td ><?php echo $row->status;?></td>
                <td ><?php echo $row->agama;?></td>
                <td ><?php echo $row->pendidikan;?></td>
                <td ><?php echo $row->nama;?></td>
                <td ><?php echo $row->mata_uang;?></td>
                <td ><?php echo $row->jabatan;?></td>
                <td ><?php echo $row->jenisagre;?></td>
                <td ><?php echo $row->gajinya;?></td>
                <td ><?php echo $row->nopaspor;?></td>
                <td ><?php echo $row->berlaku;?></td>
                <td ><?php echo $row->sampai;?></td>
                <td ><?php echo $row->tgl_berangkatnya;?></td>
                <td ><?php echo $row->tgl_tibanya;?></td>
               
                <td ><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-primary">Edit</a></td>
                <td ><a href="#hapus<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                <td ><a href="<?php echo base_url(); ?>baru4/cetak/<?php echo $row->id_biodata;?>" class="btn btn-warning">Print</a></td>
              </tr>
              </tbody>
        	 <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">Modal Header</h3>
              <div class="modal-body" >
                <form action="<?php echo site_url('surat_disnaker_online/edit_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                 <input type="hidden" class="form-control" name="id_karep" value="<?php echo $row->id_karep; ?>">
               <div class="control-group">
                  <label class="control-label">Nama TKI</label>
                  <div class="controls">
                    <select name="id_biodata" class="form-control select-search">
                      <?php foreach ($tampil_data_tki as $row2) { ?>
                      <option value="<?php echo $row2->id_biodata;?>"><?php echo $row2->nama;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>

               <div class="control-group">
                  <label class="control-label">Jabatan</label>
                  <div class="controls">
                    <select name="jabatan" class="form-control select-search">
                      <?php foreach ($tampil_data_jabatan as $row3) { ?>
                      <option value="<?php echo $row3->isi;?>"><?php echo $row3->isi;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">No KTP </label>
                  <div class="controls">
                    <input type="text" name="no_ktpnya" value="<?php echo $row->no_ktpnya;?>" class="form-control" required>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Tanggal Berangkat</label>
                  	<div class="controls">
                  		<div class='datepicker input-append' id='datepicker'>
                  			<input class='input-medium' data-format='yyyy.MM.dd' name="tgl_berangkatnya"  value="<?php echo $row->tgl_berangkatnya;?>" type='text' />
                  			<span class='add-on'>
                  			<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                  			</span>
                  		</div>
                  	</div>
                 </div>
                <div class="control-group">
                  <label class="control-label">Tanggal Tiba</label>
                  	<div class="controls">
                  		<div class='datepicker input-append' id='datepicker'>
                  			<input class='input-medium' data-format='yyyy.MM.dd' name="tgl_tibanya"  value="<?php echo $row->tgl_tibanya;?>" type='text' />
                  			<span class='add-on'>
                  			<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                  			</span>
                  		</div>
                  	</div>
                 </div>  
               <div class="control-group">
                  <label class="control-label">Mata Uang </label>
                  <div class="controls">
                     <select name="mata_uang" class="form-control select" required>
                            <option value="Rp (Rupiah)">Rp (Rupiah)</option>
                            <option value="IDW (Dollar Taiwan Baru)">IDW (Dollar Taiwan Baru)</option>
                            <option value="MYR (Ringgit Malaysia)">MYR (Ringgit Malaysia)</option>
                            <option value="BND (Dollar Brunei)">BND (Dollar Brunei)</option>
                     </select>
                     </div>
                </div>   
               <div class="control-group">
                  <label class="control-label">Gaji </label>
                  <div class="controls">
                     <input type="text" name="gajinya" value="<?php echo $row->gajinya;?>" class="form-control" required>
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
                <form action="<?php echo site_url('surat_disnaker_online/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                
                <input type="hidden" class="form-control" name="id_karep" value="<?php echo $row->id_karep; ?>">
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
                <form action="<?php echo site_url('surat_disnaker_online/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                
                <div class="control-group">
                  <label class="control-label">Nama TKI</label>
                  <div class="controls">
                    <select name="id_biodata" class="form-control select-search">
                      <?php foreach ($tampil_data_tki as $row2) { ?>
                      <option value="<?php echo $row2->id_biodata;?>"><?php echo $row2->nama;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Jabatan</label>
                  <div class="controls">
                    <select name="jabatan" class="form-control select-search">
                      <?php foreach ($tampil_data_jabatan as $row3) { ?>
                      <option value="<?php echo $row3->isi;?>"><?php echo $row3->isi;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">No KTP </label>
                  <div class="controls">
                    <input type="text" name="no_ktpnya" placeholder="Berisi No KTP" class="form-control" required>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Tanggal Berangkat</label>
                  	<div class="controls">
                  		<div class='datepicker input-append' id='datepicker'>
                  			<input class='input-medium' data-format='yyyy.MM.dd' name="tgl_berangkatnya"  placeholder="Berisi Tanggal Tiba" type='text' />
                  			<span class='add-on'>
                  			<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                  			</span>
                  		</div>
                  	</div>
                 </div>
                <div class="control-group">
                  <label class="control-label">Tanggal Tiba</label>
                  	<div class="controls">
                  		<div class='datepicker input-append' id='datepicker'>
                  			<input class='input-medium' data-format='yyyy.MM.dd' name="tgl_tibanya"  placeholder="Berisi Tanggal Tiba" type='text' />
                  			<span class='add-on'>
                  			<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                  			</span>
                  		</div>
                  	</div>
                 </div>
               <div class="control-group">
                  <label class="control-label">Mata Uang </label>
                  <div class="controls">
                     <select name="mata_uang" class="form-control select" required>
                         		<option>Rp (Rupiah)</option>
                         		<option>IDW (Dollar Taiwan Baru)</option>
                         		<option>MYR (Ringgit Malaysia)</option>
                         		<option>BND (Dollar Brunei)</option>
                     </select>
                     </div>
                </div>
               <div class="control-group">
                  <label class="control-label">Gaji </label>
                  <div class="controls">
                     <input type="text" name="gajinya" placeholder="Berisi Nominal Gaji " class="form-control" required>
                     </div>
                </div>
               
               
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save</button>
              </div>
                </form>
              
            </div>