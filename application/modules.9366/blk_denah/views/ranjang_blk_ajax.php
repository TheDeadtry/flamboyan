								<div class="tabbable" id="dkrh_asrama">
									<ul class="nav nav-tabs nav-justified">
										<li class="<?php echo $as1 ?>"><a href="#basic-justified-tab1" data-toggle="tab">ASRAMA 1</a></li>
										<li class="<?php echo $as2 ?>"><a href="#basic-justified-tab2" data-toggle="tab">ASRAMA 2</a></li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane <?php echo $as1 ?>" id="basic-justified-tab1">
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

										<div class="tab-pane <?php echo $as2 ?>" id="basic-justified-tab2">
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
											                			<a class="edit_ranjang_pemakai" data-id="<?php echo $ambil_data2->id_no_ranjang ?>" data-cont="<?php echo $ambil_data2->kode_no_ranjang.' '.strtoupper($ambil_data2->ranjang) ?>" style="color:white">
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