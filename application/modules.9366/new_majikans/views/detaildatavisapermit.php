
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data VisaPermit</span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info panel-bordered">
                        <div class="panel-heading">
                            <!-- <a target="_blank" href="<?php echo site_url('pdf9/cetakvisapermit/'); ?>" class="btn btn-large btn-primary" type="button">Print Data VisaPermit</a> -->
                            <a href="<?php echo site_url('new_majikans/tampildatasuhan/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>" class='btn btn-warning' type="button">Kembali</a>
                            <h5 class="panel-title text-center ">Data VisaPermit <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>  
                                        <th></th>  
                                        <th>File</th>
                                        <th>No Suhan</th>
                                        <th>No Visa Permit</th>
                                        <th>Nama Group</th>
                                        <th>Nama Agen</th>
                                        <th>Nama Majikan</th>
                                        <th>tgl terbit</th>
                                        <th>tgl exp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1; 
                                        foreach ($tampil_data_visapermit as $row) { 
                                            if ($row->filevisapermit != NULL) {
                                                $imgs = '<a target="_blank" href="'.base_url().'assets/dokvisapermit/'.$row->filevisapermit.'">';
                                                if (strpos($row->filevisapermit, '.docx') !== false ) { 
                                                    $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/docx.png" /></a>';
                                                } elseif (strpos($row->filevisapermit, '.doc') !== false) { 
                                                    $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/doc.png" /></a>';
                                                } elseif (strpos($row->filevisapermit, '.xlsx') !== false ) { 
                                                    $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xlsx.png" /></a>';
                                                } elseif (strpos($row->filevisapermit, '.xls') !== false) { 
                                                    $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/xls.png" /></a>';
                                                } elseif (strpos($row->filevisapermit, '.pdf') !== false) { 
                                                    $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/ico/pdf.png" /></a>';
                                                } else { 
                                                    $imgss = '<img width="50px" height="50px" src="'.base_url().'assets/dokvisapermit/'.$row->filevisapermit.'"/></a>'; 
                                                }
                                                $filevisapermit_data = $imgs.$imgss;
                                            } else {
                                                $filevisapermit_data = 'KOSONG';
                                            }
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td> 
                                            <a href="<?php echo site_url('new_majikans/update_data_visapermitdata/'.$row->id_visapermit.'/'.$kodesuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup); ?>" class="btn btn-mini btn-primary" type="button">
                                                Ubah
                                            </a>
                                            <!-- <a href="<?php echo site_url('new_majikans/ubahagenvisapermit/'.$row->id_visapermit); ?>"class="btn btn-mini btn-primary"></i>
                                                Ubah SUHAN/VP 
                                            </a> -->
                                            <a class="btn btn-mini btn-primary" href="<?php echo site_url('new_majikans/tampilvisapermit/'.$row->id_visapermit.'/'.$kodesuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">
                                                Tanggal Terima
                                            </a>
                                            <a class="btn btn-mini btn-primary" href="<?php echo site_url('new_majikans/tampiltkivisapermit/'.$row->id_visapermit.'/'.$kodesuhan.'/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">
                                                Data TKI
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapusvisapermit<?php echo $no; ?>">
                                                <span>Hapus</span>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $filevisapermit_data; ?>
                                        </td>
                                        <td><?php echo $row->no_suhan;?></td>
                                        <td><?php echo $row->no_visapermit;?></td>
                                        <td><?php echo $row->namagroupnya;?></td>
                                        <td><?php echo $row->namaagen;?></td>
                                        <td><?php echo $row->namamajikannya;?></td>
                                               
                                        <td><?php echo $row->tglterbitvs;?></td>
                                        <td><?php echo $row->tglexpvs;?></td>
                                        <!-- <td><?php echo $row->tglterimavs;?></td> -->
                                        <!--  <td><?php echo $row->tglsimpanvs;?></td> -->
                                        <!-- <td><?php echo $row->tglbawavs;?></td>
                                        <td><?php echo $row->tglmintavs;?></td> -->
                                        <!--  <td><?php echo $row->quotavs;?></td> -->

                                    </tr>

                                    <div class='modal fade' id='editvisapermit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                                        <div class='modal-header'>
                                            <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                            <h3>Form in modal</h3>
                                        </div>  
                                        <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/update_visapermit'); ?>">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_visapermit" value="<?php echo $row->id_visapermit; ?>">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">No Visa Permit </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="no" class="form-control" value="<?php echo $row->no_visapermit; ?>"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Tgl Terbit</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-append date dewdate" id="datePicker">
                                                            <input type="text" class="form-control" name="tglterbit"  value="<?php echo $row->tglterbitvs; ?>"/>
                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Tgl Expired </label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-append date dewdate" id="datePicker">
                                                            <input type="text" class="form-control" name="tglexp" value="<?php echo $row->tglexpvs; ?>" />
                                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">File Upload</label>
                                                    <div class="col-sm-9">
                                                        <div class="thumbnail">
                                                            <img max-width="250px" max-height="250px" src="<?php echo base_url() ?>/assets/dokvisapermit/<?php echo $row->filevisapermit ?>" alt="KOSONG">
                                                            <div class="caption">
                                                                <input type="file" class="default" value="<?php echo $row->filevisapermit; ?>" name="filenya" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>




                                    <div class="modal fade" id="hapusvisapermit<?php echo $no; ?>" tabindex="-2" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal" method="post" action="<?php echo site_url('new_majikans/hapus_visapermitdata'); ?>">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                        <h4 class="modal-title">Hapus Data SUHAN</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="id_visapermit" value="<?php echo $row->id_visapermit; ?>">
                                             
                                                        <input type="hidden" class="form-control" name="nosuhan" value="<?php echo $kodesuhan; ?>">
                                                        <input type="hidden" class="form-control" name="kodemajikan" value="<?php echo $kodemajikan; ?>">
                                                        <input type="hidden" class="form-control" name="group" value="<?php echo $kodegroup; ?>">
                                                        <input type="hidden" class="form-control" name="kode_agen" value="<?php echo $kodeagen; ?>">
                                                        <input type="hidden" class="form-control" name="file" value="<?php echo $row->filevisapermit; ?>">

                                                        <p>Apakah anda yakin akan menghapus data SUHAN ini? : <?php echo  $row->id_visapermit; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        $no++;
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: true,
                        "searchable": true,
                        fixedColumns: {
                            leftColumns: 0,
                            rightColumns: 0
                        },
                        bFilter: true,
                        "lengthChange": true
                    });
                </script>