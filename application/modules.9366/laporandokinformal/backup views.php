
                                <?php 
                                $no=1;
                                foreach($tampil_data_dok_inf as $dokinf) {
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $dokinf->namamajikan ?></td>
                                    <td><?php echo $dokinf->namataiwan ?></td>
                                    <td><?php echo $dokinf->id_biodata ?></td>
                                    <td><?php echo $dokinf->namaindon ?></td>
                                    <td><?php echo $dokinf->namamandarinn ?></td>
                                    <td><?php echo $dokinf->id_suhan ?></td>
                                    <td><?php echo $dokinf->tglterbitsuhan ?></td>
                                    <td><?php //$dokinf-> ?></td>
                                    <td><?php echo $dokinf->tglterimasuhan ?></td>
                                    <td><?php echo $dokinf->statsuhan ?></td>
                                    <td><?php //$dokinf-> ?></td>
                                    <td><?php echo $dokinf->tglsimpansuhan ?></td>
                                    <td>
                                        <?php echo $dokinf->ketsuhan ?>&nbsp
                                        <a data-toggle="modal" data-target="#ketsuhan<?php echo $no ?>">
                                            <i class="icon-pencil3">
                                            </i>
                                            <span>
                                            </span>
                                        </a>
                                    </td>
                                    <td><?php echo $dokinf->id_visapermit ?></td>
                                    <td><?php echo $dokinf->tglterbitpermit ?></td>
                                    <td><?php //$dokinf-> ?></td>
                                    <td><?php echo $dokinf->tglterimapermit ?></td>
                                    <td><?php echo $dokinf->statvp ?></td>
                                    <td><?php //$dokinf-> ?></td>
                                    <td><?php echo $dokinf->tglsimpanvp ?></td>
                                    <td>
                                        <?php echo $dokinf->ketpermit ?>&nbsp
                                        <a data-toggle="modal" data-target="#ketpermit<?php echo $no ?>">
                                            <i class="icon-pencil3">
                                            </i>
                                            <span>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="ketsuhan<?php echo $no ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('laporandokinformal/updateketsuhan') ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH KETERANGAN SUHAN</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="idbio" value="<?php echo $dokinf->id_biodata ?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>KETERANGAN </label>
                                                                <textarea class="form-control" name="ketsuhan"><?php echo $dokinf->ketsuhan ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="ketpermit<?php echo $no ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('laporandokinformal/updateketpermit') ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH KETERANGAN VISA PERMIT</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="idbio" value="<?php echo $dokinf->id_biodata ?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>KETERANGAN </label>
                                                                <textarea class="form-control" name="ketpermit"><?php echo $dokinf->ketpermit ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
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