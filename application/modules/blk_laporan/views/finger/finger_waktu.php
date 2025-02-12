
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper"><!--
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            $this->load->view('blk_laporan/finger/_sidebar');
                        ?>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-info">
                                <h5 class="panel-title">
                                    DATA FINGERPRINT PER TANGGAL
                                </h5>
                            </div>
                            <div class="panel-body">

                                <form id="form_setting" method="post">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Tanggal
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="tgl" class="form-control dewdate2" placeholder=" Pilih Tanggal ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Waktu
                                            </div>
                                            <div class="col-sm-9">
                                                <select class="select-search" name="waktu">
                                                    <option disabled selected> Pilih Waktu </option>
                                                    <option value="pagi">Pagi ( Jam 6 - 10</option>
                                                    <option value="siang">Siang ( Jam 10 - 15 )</option>
                                                    <option value="sore">Sore ( Jam 15 - 22 )</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">

                                            </div>
                                            <div class="col-sm-9">
                                                <button type="button" onclick="tampil_setting()" class="btn btn-lg bg-primary-700">Show</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>

                        <div class="panel" style="display:none;" id="panel_table">
                            <div class="panel-heading bg-primary-400">
		                        <h5 class="panel-title">
		                            DATA FINGERPRINT PER WAKTU
		                        </h5>
                            </div>
                            <div class="panel-body">			
								<table id="dkrh" class="table table-bordered">
									<thead>
										<tr>
											<th class="text-center">NO.</th>
											<th class="text-center">NO DAFTAR</th>
											<th class="text-center">NAMA</th>
                                            <th class="text-center">DATE</th>
                                            <th class="text-center">TIME</th>
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
    $(funcion() {
        $('#panel_table').hide();
        $('input[name=waktu]').val('pagi').change();
        $('input[name=tgl]').val('<?php echo date('Y-m-d') ?>');
    });

    function tampil_setting() {
        $.ajax({
            url      : '<?php echo site_url('blk_laporan/finger_waktu_read') ?>',
            type     : 'POST',
            dataType : 'json',
            data     : $('#form_setting').serialize(),
            encode   : true,
            success:function (data) {
                if(!data.success) {
                    alert(data.message);
                } else {
                    $('#panel_table').show();
                    $('#dkrh > tbody')
                    .find('tr')
                    .remove()
                    .end()
                    .append(data.table);
                }
            }
        });
    }
</script>