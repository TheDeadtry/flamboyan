
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-primary-400">
		                        <h5 class="panel-title">
		                            DATA FINGERPRINT
		                        </h5>
                                <div class="heading-elements">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal2">TAMBAH</button>
                                </div>     
                            </div>
                            <div class="panel-body">	
                        						<select class="select-search" name="search_tki" onchange="javascript:location.href=this.value;">
                                                    <option value="<?php echo site_url('blk_rekapitulasi/finger_search_tki/') ?>">SEMUA</option>
                                                    <?php 
                                                        foreach ($tampil_data_tki  as $row) {
                                                            $ubah_tipe = substr($row->id, 0, 2);
                                                            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                                                                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$row->id'");
                                                                $nama_tki = "";
                                                                if ($ambil_nama_taiwan != NULL) {
                                                                    $nama_tki = $ambil_nama_taiwan->nama;
                                                                }
                                                            } else {
                                                                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$row->id'");
                                                                $nama_tki = "";
                                                                if ($ambil_nama_nontaiwan != NULL) {
                                                                    $nama_tki = $ambil_nama_nontaiwan->nama;
                                                                }
                                                            }
                                                            $rdf = "";
                                                            if ($row->id == $u_finger_pil_id) {
                                                                $rdf = 'disabled="disabled" selected="selected"';
                                                            }
                                                    ?>
                                                            <option value="<?php echo site_url('blk_rekapitulasi/finger_search_tki/'.$row->id) ?>" <?php echo $rdf; ?> ><?php echo $row->id.' - '.$nama_tki ?></option>
                                                    <?php        
                                                        }
                                                    ?>
                                                </select>				
								<table id="exs2" class="table table-bordered">
									<thead>
										<tr>
											<th class="text-center">NO.</th>
											<th class="text-center">NO DAFTAR</th>
											<th class="text-center">NAMA</th>
											<th class="text-center">TOTAL (Semua)</th>
											<th class="text-center">DETAIL</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

                            <div id="modal_form_horizontal2" class="modal fade">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH FINGER MANUAL (ADMIN) </h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_rekapitulasi/finger_detail_add_2'); ?>" class="form-horizontal" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="control-label col-sm-12">ID Biodata</label>
                                                    <div class="col-sm-12">
                                                        <select class="dewselect1" name="idbiopil" required="required" data-placeholder="Pilih ID Biodata">
                                                            <?php 
                                                                foreach ( $data_idbio as $teyy ) 
                                                                {
                                                                    $idbiot = substr($teyy->nodaftar, 0, 2);

                                                                    $fnama = $teyy->hknama;
                                                                    if ( $idbiot == "MF" || $idbiot == "MI" || $idbiot == "FF" || $idbiot == "FI" || $idbiot == "JP" )
                                                                    {
                                                                        $fnama = $teyy->twnama;
                                                                    }
                                                            ?>
                                                                    <option value="<?php echo $teyy->nodaftar; ?>"><?php echo $teyy->nodaftar.' - '.$fnama; ?></option>
                                                            <?php  
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-12">Tanggal</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control dewdate" type="text" name="dteDate" required="required" placeholder="Dari Tanggal" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control dewdate" type="text" name="dteDate2" required="required" placeholder="Hingga Tanggal" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-12">Waktu/Jam</label>
                                                    <div class="col-sm-6">
                                                        <input type="checkbox" name="waktuJam[]" class="styled" checked="checked" value="pagi,07.00">Pagi ( 07.00 )
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <input type="checkbox" name="waktuJam[]" class="styled" checked="checked" value="sore,18.30">Sore ( 18.30 )
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<script>
    $('#exs2').DataTable({
        scrollY: true,
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 4,
            rightColumns: 0
        },
        processing: true,
        serverSide: true,
        ordering: false,
        bFilter: false,
		ajax: {
            "url"       : "<?php echo site_url('blk_rekapitulasi/finger_show_data/'.$u_finger_pil_id) ?>",
            "type"      : "POST"
        }
    });
</script>