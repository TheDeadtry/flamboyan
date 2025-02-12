  <?php if($hitung_biodatamf == 0) { ?>
                                            <li><strong>Surat : </strong>Biodata</li> 
                                            <?php } else { ?>
                                            <li><strong>Surat </strong>: <a href="<?php echo site_url('printout/biodata/'); ?>" target="_blank">Biodata</a></li>
                                            <?php } ?>
                                            <?php if($hitung_family == 0) { echo "<div class='alert alert-error'>(Data family belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_working == 0) { echo "<div class='alert alert-error'>(Data working belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_skill == 0) { echo "<div class='alert alert-error'>(Data skill & physical belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_request == 0) { echo "<div class='alert alert-error'>(Data request belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_paspor == 0) { echo "<div class='alert alert-error'>(Data paspor belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_medical == 0) { echo "<div class='alert alert-error'>(Data medical belum diisi)</div>"; } else { echo ""; } ?>
                                        <?php } else if(substr($detailpersonalid, 0, 2) == 'FI') { ?>
                                            <?php if($hitung_biodatafi == 0) { ?>
                                            <li><strong>Surat : </strong>Biodata</li> 
                                            <?php } else { ?>
                                            <li><strong>Surat </strong>: <a href="<?php echo site_url('printout/biodata/'); ?>" target="_blank">Biodata</a></li>
                                            <?php } ?>
                                            <?php if($hitung_family == 0) { echo "<div class='alert alert-error'>(Data family belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_pengalaman == 0) { echo "<div class='alert alert-error'>(Data pengalaman belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_tugas == 0) { echo "<div class='alert alert-error'>(Data tugas belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_kettugas == 0) { echo "<div class='alert alert-error'>(Data keterangan tugas belum diisi)</div>"; } else { echo ""; } ?>

                                            <?php } else if(substr($detailpersonalid, 0, 2) == 'FF') { ?>
                                            <?php if($hitung_biodataff == 0) { ?>
                                            <li><strong>Surat : </strong>Biodatasss</li> 
                                            <?php } else { ?>
                                            <li><strong>Surat </strong>: <a href="<?php echo site_url('printout/biodata/'); ?>" target="_blank">Biodatasasasas</a></li>
                                            <?php } ?>
                                            <?php if($hitung_family == 0) { echo "<div class='alert alert-error'>(Data family belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_pengalaman == 0) { echo "<div class='alert alert-error'>(Data pengalaman belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_tugas == 0) { echo "<div class='alert alert-error'>(Data tugas belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_kettugas == 0) { echo "<div class='alert alert-error'>(Data keterangan tugas belum diisi)</div>"; } else { echo ""; } ?>

                                        <?php } else if(substr($detailpersonalid, 0, 2) == 'JP') { ?>
                                            <?php if($hitung_biodatajp == 0) { ?>
                                            <li><strong>Surat : </strong>Biodata</li> 
                                            <?php } else { ?>
                                            <li><strong>Surat </strong>: <a href="<?php echo site_url('printout/biodata/'); ?>" target="_blank">Biodata</a></li>
                                            <?php } ?>
                                            <?php if($hitung_family == 0) { echo "<div class='alert alert-error'>(Data family belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_working == 0) { echo "<div class='alert alert-error'>(Data working belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_skill == 0) { echo "<div class='alert alert-error'>(Data skill & physical belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_interview == 0) { echo "<div class='alert alert-error'>(Data interview belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_paspor == 0) { echo "<div class='alert alert-error'>(Data paspor belum diisi)</div>"; } else { echo ""; } ?>
                                            <?php if($hitung_medical == 0) { echo "<div class='alert alert-error'>(Data medical belum diisi)</div>"; } else { echo ""; } ?>