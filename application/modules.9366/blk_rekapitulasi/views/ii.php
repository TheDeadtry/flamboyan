	
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-info">
		                        <h5 class="panel-title">DATA IJIN INAP</h5>
                            </div>
                            <div class="panel-body">		
                                                <select class="select-search" name="search_tki" onchange="javascript:location.href=this.value;">
                                                    <option value="<?php echo site_url('blk_rekapitulasi/ii_search_tki/') ?>">SEMUA</option>
                                                    <?php 
                                                        foreach ($tampil_data_tki  as $row) {
                                                            $ubah_tipe = substr($row->id, 0, 2);
                                                            if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                                                                $ambil_nama_taiwan = $this->M_session->select_row("SELECT nama FROM personal WHERE id_biodata='$row->id'");
                                                                $nama_tki = $ambil_nama_taiwan->nama;
                                                            } else {
                                                                $ambil_nama_nontaiwan = $this->M_session->select_row("SELECT nama FROM personalblk WHERE nodaftar='$row->id'");
                                                                $nama_tki = "";
                                                                if ($ambil_nama_nontaiwan != NULL) {
                                                                    $nama_tki = $ambil_nama_nontaiwan->nama;
                                                                }
                                                            }
                                                            $rdf = "";
                                                            if ($row->id == $u_ii_pil_id) {
                                                                $rdf = 'disabled="disabled" selected="selected"';
                                                            }
                                                    ?>
                                                            <option value="<?php echo site_url('blk_rekapitulasi/ii_search_tki/'.$row->id) ?>" <?php echo $rdf; ?> ><?php echo $row->id.' - '.$nama_tki.$u_ii_pil_id ?></option>
                                                    <?php        
                                                        }
                                                    ?>
                                                </select>		
		                        <table class="table table-lg table-bordered table-striped" id="exs">
									<thead>
                                        <tr class="active">
                                            <th colspan="11">
                                                
                                            </th>
                                        </tr>
										<tr>
											<th class="text-center">NO.</th>
                                            <th class="text-center">ACTION</th>
											<th class="text-center">NO DAFTAR</th>
											<th class="text-center">NAMA</th>
                                            <th class="text-center">TOTAL</th>
											<th class="text-center">TGL KELUAR (JAM)</th>
											<th class="text-center">TGL KEMBALI (JAM)</th>
											<th class="text-center">AKUMULASI TERLAMBAT</th>
                                            <th class="text-center">BLK PEMBERI IZIN</th>
                                            <th class="text-center">KET</th>
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
<script>
    $('#exs').DataTable({
        scrollX: true,
        scrollY: '400px',
        processing: true,
        serverSide: true,
        "ordering": false,
        "info":     false,
        "bFilter": false, 
        "bLengthChange": false,  
        ajax: {
            "url"       : "<?php echo site_url('blk_rekapitulasi/ii_show_data/'.$u_ii_pil_id) ?>",
            "type"      : "POST"
        }
    });
</script>