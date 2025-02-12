<style type="text/css">
	.popover {
	  position: absolute;
	  top: 0;
	  left: 0;
	  z-index: 1010;
	  display: none;
	  max-width: 600px;
	  padding: 1px;
	  text-align: left;
	  white-space: normal;
	  background-color: #ffffff;
	  border: 1px solid #ccc;
	  border: 1px solid rgba(0, 0, 0, 0.2);
	  -webkit-border-radius: 6px;
	     -moz-border-radius: 6px;
	          border-radius: 6px;
	  -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	     -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	          box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	  -webkit-background-clip: padding-box;
	     -moz-background-clip: padding;
	          background-clip: padding-box;
	}
</style>
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

						<div class="panel panel-flat">
							<div class="panel-heading">
                				<h4 style="font-family: Montserrat;font-weight: 400;color: #222222;font-size: 17.5px;">ASRAMA 1 </h4>
								<a class="btn btn-success" href="<?= site_url()?>/blk_denah/print_data_asrama/terisi">Data Asrama Terisi</a>
								<a class="btn btn-info" href="<?= site_url()?>/blk_denah/print_data_asrama/kosong">Data Asrama Kosong</a>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body" id="dkrh_asrama">
								<div class="tabbable">
									<ul class="nav nav-tabs nav-justified">
										<li class="active"><a href="#basic-justified-tab1" data-toggle="tab">ASRAMA 1</a></li>
										<li><a href="#basic-justified-tab2" data-toggle="tab">ASRAMA 2</a></li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane active" id="basic-justified-tab1">
											<?php 
							            		$hitung_asrama1 = count($tampil_asrama1);
							            		$total_ranjang  = $hitung_asrama1%2;
							            		if ($total_ranjang == 1) {
							            			$total_ranjangx = ($hitung_asrama1+1)/2;
							            		} else {
							            			$total_ranjangx = $hitung_asrama1/2;
							            		}
							            		$y=0;
							                	for($x=0; $x<$total_ranjangx; $x++) {
							                		$pola1 = $y+1;
							                		$pola2 = $y+2;
							                		$ambil_data1 = $this->M_session->select_row("SELECT * FROM blk_no_ranjang where kode_no_ranjang like '%$pola1'");
							                		$ambil_data2 = $this->M_session->select_row("SELECT * FROM blk_no_ranjang where kode_no_ranjang like '%$pola2'");
							                		$cek_pemilik1 = $this->M_session->select("SELECT ranjangno,nodaftar,nama FROM personalblk where ranjangno='$ambil_data1->id_no_ranjang'");
							                		$cek_pemilik2 = $this->M_session->select("SELECT ranjangno,nodaftar,nama FROM personalblk where ranjangno='$ambil_data2->id_no_ranjang'");
							                		$class_color1 = "bg-danger";
							                		$class_color2 = "bg-danger";
							                		if ($cek_pemilik1 != NULL) {
							                			$class_color1 = "bg-success";
							                		}
							                		if ($cek_pemilik2 != NULL) {
							                			$class_color2 = "bg-success";
							                		}
							                		$isi_data1 = "";
							                		$isi_data2 = "";
							                		foreach($cek_pemilik1 as $row) {
							                			$isi_data1 = $isi_data1.''.$row->nodaftar." ".$row->nama."<br/>";
							                		}
							                		foreach($cek_pemilik2 as $row) {
							                			$isi_data2 = $isi_data2.''.$row->nodaftar." ".$row->nama."<br/>";
							                		}
							                ?>
									                <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3">
									                	<table class="table table-bordered">
									                		<tr>
									                			<td rowspan="2" class="bg-info"><div class='icon-bed2 icon'></div></td>
										                			<td class="<?php echo $class_color1 ?>"
										                				id="fx1_<?php echo $pola1 ?>"
																		data-html="true"  
																	   	data-trigger="hover" 
																	   	data-toggle="popover"
																		data-content="<?php echo $isi_data1; ?>" 
																		title="PEMAKAI" 
																	   	data-container="body">
									                					<a class="edit_ranjang_pemakai" data-id="<?php echo $ambil_data1->id_no_ranjang ?>" data-cont="<?php echo $ambil_data1->kode_no_ranjang.' '.strtoupper($ambil_data1->ranjang) ?>" style="color:white">
																			<?php echo $ambil_data1->kode_no_ranjang.' '.strtoupper($ambil_data1->ranjang) ?> 
																		</a>
																	</td>
									                		</tr>
									                		<tr>
										                			<td class="<?php echo $class_color2 ?>" 
											                			id="fx2_<?php echo $pola2 ?>"
																	   	data-html="true"  
																	   	data-trigger="hover" 
																	   	data-toggle="popover"
																	   	data-content="<?php echo $isi_data2; ?>"
																	   	title="PEMAKAI" 
																	   	data-container="body">
											                			<a class="edit_ranjang_pemakai" data-id="<?php echo $ambil_data2->id_no_ranjang ?>" data-cont="<?php echo $ambil_data2->kode_no_ranjang.' '.strtoupper($ambil_data2->ranjang) ?>" style="color:white">
																			<?php echo $ambil_data2->kode_no_ranjang.' '.strtoupper($ambil_data2->ranjang) ?>
																		</a>
																	</td>
									                		</tr>
									                	</table>
									                </div>
									                <script>
									                	$("#fx1_<?php echo $pola1 ?>").popover({ container: "body" });
									                	$("#fx2_<?php echo $pola2 ?>").popover({ container: "body" });
									                </script>
							                <?php 
							                	$y+=2;
							                	}
							                ?>
										</div>

										<div class="tab-pane" id="basic-justified-tab2">
											<?php 
							            		$hitung_asrama2 = count($tampil_asrama2);
							            		$total_ranjang  = $hitung_asrama2%2;
							            		if ($total_ranjang == 1) {
							            			$total_ranjangx = ($hitung_asrama2+1)/2;
							            		} else {
							            			$total_ranjangx = $hitung_asrama2/2;
							            		}
							            		$y=0;
							                	for($x=0; $x<$total_ranjangx; $x++) {
							                		$pola1 = $y+127;
							                		$pola2 = $y+128;
							                		$ambil_data1 = $this->M_session->select_row("SELECT * FROM blk_no_ranjang where kode_no_ranjang like '%$pola1'");
							                		$ambil_data2 = $this->M_session->select_row("SELECT * FROM blk_no_ranjang where kode_no_ranjang like '%$pola2'");
							                		$cek_pemilik1 = $this->M_session->select("SELECT ranjangno,nodaftar,nama FROM personalblk where ranjangno='$ambil_data1->id_no_ranjang'");
							                		$cek_pemilik2 = $this->M_session->select("SELECT ranjangno,nodaftar,nama FROM personalblk where ranjangno='$ambil_data2->id_no_ranjang'");
							                		$class_color1 = "bg-danger";
							                		$class_color2 = "bg-danger";
							                		if ($cek_pemilik1 != NULL) {
							                			$class_color1 = "bg-success";
							                		}
							                		if ($cek_pemilik2 != NULL) {
							                			$class_color2 = "bg-success";
							                		}
							                		$isi_data1 = "";
							                		$isi_data2 = "";
							                		foreach($cek_pemilik1 as $row) {
							                			$isi_data1 = $isi_data1.''.$row->nodaftar." ".$row->nama."<br/>";
							                		}
							                		foreach($cek_pemilik2 as $row) {
							                			$isi_data2 = $isi_data2.''.$row->nodaftar." ".$row->nama."<br/>";
							                		}
							                ?>
									                <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3">
									                	<table class="table table-bordered">
									                		<tr>
									                			<td rowspan="2" class="bg-info"><div class='icon-bed2 icon'></div></td>
										                			<td class="<?php echo $class_color1 ?>"
										                				id="fx1_<?php echo $pola1 ?>"
																		data-html="true"  
																	   	data-trigger="hover" 
																	   	data-toggle="popover"
																		data-content="<?php echo $isi_data1; ?>" 
																		title="PEMAKAI" 
																	   	data-container="body">
											                			<a class="edit_ranjang_pemakai" data-id="<?php echo $ambil_data1->id_no_ranjang ?>" data-cont="<?php echo $ambil_data1->kode_no_ranjang.' '.strtoupper($ambil_data1->ranjang) ?>" style="color:white">
																			<?php echo $ambil_data1->kode_no_ranjang.' '.$total_ranjangx.strtoupper($ambil_data1->ranjang) ?> 
																		</a>
																	</td>
									                		</tr>
									                		<tr>
										                			<td class="<?php echo $class_color2 ?>" 
											                			id="fx2_<?php echo $pola2 ?>"
																	   	data-html="true"  
																	   	data-trigger="hover" 
																	   	data-toggle="popover"
																	   	data-content="<?php echo $isi_data2; ?>"
																	   	title="PEMAKAI" 
																	   	data-container="body">
											                			<a class="edit_ranjang_pemakai" data-id="<?php echo $ambil_data2->id_no_ranjang ?>" data-cont="<?php echo $ambil_data2->kode_no_ranjang.' '.strtoupper($ambil_data2->ranjang) ?>" style="color:white">
																	   		<?php echo $ambil_data2->kode_no_ranjang.' '.$total_ranjangx.strtoupper($ambil_data2->ranjang) ?>
																	   	</a>
																	</td>
									                		</tr>
									                	</table>
									                </div>
									                <script>
									                	$("#fx1_<?php echo $pola1 ?>").popover({ container: "body" });
									                	$("#fx2_<?php echo $pola2 ?>").popover({ container: "body" });

									                </script>
							                <?php 
							                	$y+=2;
							                	}
							                ?>
										</div>
									</div>
								</div>
							</div>
						</div>
                

            </div>

        </div>
    </div>
</div>


                            <div id="edit_ranjang_pemakai_modal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title"></h5>
                                        </div>
                                        
												<div class="tabbable">
													<ul class="nav nav-tabs nav-justified">
														<li class="active"><a href="#basic-justified-tab98" data-toggle="tab">UBAH PEMAKAI RANJANG</a></li>
														<li><a href="#basic-justified-tab99" data-toggle="tab">DETAIL PEMAKAI SEBELUMNYA</a></li>
													</ul>

													<div class="tab-content">
														<div class="tab-pane active" id="basic-justified-tab98">

					                                        <form action="<?php echo site_url('ranjang_blk/update_ranjang'); ?>" class="form-horizontal" method="post">                                        
					                                        	<div class="modal-body">
					                                            	<input type="hidden" class="form-control" name="id_no_ranjang" id="id_no_ranjang" value="">

					                                                <div class="form-group">
								                                        <div class="row">
								                                            <label class="control-label col-sm-3">Tanggal Terima Ranjang</label>
								                                            <div class="col-sm-9">
								                                                <div class="input-group input-append date dewdate2" id="datePicker">
								                                                    <input type="text" class="form-control" name="tanggal_mulai" placeholder="Select Datepicker" id="modal_tgl_terima_ranjang"/>
								                                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
								                                                </div>
								                                            </div>
								                                        </div>
								                                    </div>

					                                                <div class="form-group">
					                                                    <div class="row">
					                                                        <label class="control-label col-sm-3">IDBIO/NAMA</label>
					                                                        <div class="col-sm-9">
					                                                            <select class="select-menu-color" name="idbio" id="modal_idbio">
					                                                            	<option value="">-KOSONG-</option>
					                                                                <?php 
					                                                                    foreach ($tampil_pemakai_ranjang as $row) { 
					                                                                    	$ubah_tipe = substr($row->nodaftar, 0, 2);
					            															if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
					            																$nama = $row->nama_taiwan;
					            															} else {
					            																$nama = $row->nama_hk;
					            															}

					                                                                ?>
					                                                                        <option value="<?php echo $row->nodaftar?>" <?php //echo $sel;?>><?php echo $row->nodaftar.' - '.$nama?></option>
					                                                                <?php    
					                                                            		}
					                                                                ?>
					                                                            </select>
					                                                        </div>
					                                                    </div>
					                                                </div>
					                                                <hr>

					                                            </div>
					                                            <div class="modal-footer">
					                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
					                                                <button type="button" class="btn btn-primary" id="update_ranjang">Simpan</button>
					                                            </div>
					                                        </form>

			                                            </div>

														<div class="tab-pane" id="basic-justified-tab99">
					                                        <div class="modal-body">
																<table class="table table-bordered" id="phoenix">
																	<thead>
																		<tr>
																			<td>NO</td>
																			<td>ID BIO</td>
																			<td>NAMA</td>
																			<td>TANGGAL PAKAI</td>
																			<td>TANGGAL LEPAS</td>
																			<td></td>
																		</tr>
																	</thead>
																	<tbody>

																	</tbody>
																</table>
															</div>
				                                            <div class="modal-footer">
				                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
				                                            </div>
														</div>
			                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div id="error" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title"></h5>
                                        </div>

                                    	<div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    	<code class="danger" id="error_field"></code>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                        </div>
					                          
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
	$(document).on("click", ".edit_ranjang_pemakai", function() {
		$("#edit_ranjang_pemakai_modal").modal('show');
        $('.modal-title').text($(this).data('cont'));
    	$("#id_no_ranjang").val($(this).data('id'));
    	id = $(this).data('id');
    	$.ajax({
    		url : "<?php echo site_url('blk_denah/ranjang_blk_ambil_pemakai') ?>",
            type: 'POST',
            data: {
                'id'         : $(this).data('id')
            },
            success: function(data2) {
                $("#modal_idbio").val(data2.nodaftar).trigger("change");
                $("#modal_tgl_terima_ranjang").val(data2.ranjangtgl);
            }
    	});
    	table = $('#phoenix').dataTable({
    		destroy: true,
	        processing: true,
	        serverSide: true,
	        ordering: false,
			ajax: {
	            "url"       : "<?php echo site_url('blk_denah/ranjang_blk_ambil_riwayat/') ?>",
	            "type"      : "POST",
	            "data" 		: {
                    'id'         : id
                },
	        }
		});
	});

	$(".modal-footer").on("click", "#update_ranjang", function() {
        $.ajax({
            url 	: "<?php echo site_url('blk_denah/update_ranjang/') ?>",
	        type    : "POST",
            data 	: {
                'id'    		: $("#id_no_ranjang").val(),
                'idbio' 		: $('#modal_idbio').val(),
                'tanggal_mulai' : $('#modal_tgl_terima_ranjang').val()
            },
            success: function(data) {
                if ((data.error)) {
            		//alert('error');
                    setTimeout(function () {
                        $('#edit_ranjang_pemakai_modal').modal('toggle');
                        toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                    }, 500);
                } else {
            		//alert('success');
                    toastr.success('Successfully updated Post!', 'Success Alert', {timeOut: 5000});
            		$('#dkrh_asrama').load("<?php echo site_url('blk_denah/ranjang_blk_ajax/') ?>"+"/"+(data.asrama));
                    $('#edit_ranjang_pemakai_modal').modal('toggle');
                }
            }
        });
    });

</script>