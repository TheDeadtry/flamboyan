    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
        .blok_timur {
            border-left: 1px solid black;
        }
        .blok_barat {
            border-right: 1px solid black;
        }
    </style>        


        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4>Tambah Invoice </h4>
                </div>

                <div class="heading-elements">
                    <div class="heading-btn-group">
                        <a class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Tambah Invoice</span></a>
                    </div>
                </div>
            </div>
        </div>

                                    <?php 
                                        if ($row != NULL) {
                                            $pnbp       = $row->pnbp;
                                            $sidik_jari = $row->sidik_jari;
                                            $foto       = $row->foto;
                                            $online     = $row->online;
                                            $kesehatan  = $row->kesehatan;
                                            $visa       = $row->visa;
                                            $asuransi   = $row->asuransi;
                                            $skck       = $row->skck;
                                            $id         = $row->id;

                                            $transport      = $row->transport;
                                            $tiket          = $row->tiket;
                                            $airport        = $row->airport;
                                            $ujk            = $row->ujk;
                                            $akomodasi      = $row->akomodasi;
                                            $konsumsi       = $row->konsumsi;
                                            $ins_honor      = $row->ins_honor;
                                            $ins_transport  = $row->ins_transport;
                                            $buku_baju      = $row->buku_baju;
                                            $alat_praktek   = $row->alat_praktek;
                                            $atk            = $row->atk;
                                            $fee_pl         = $row->fee_pl;
                                        } else {
                                            $pnbp       = '';
                                            $sidik_jari = '';
                                            $foto       = '';
                                            $online     = '';
                                            $kesehatan  = '';
                                            $visa       = '';
                                            $asuransi   = '';
                                            $skck       = '';
                                            $id         = '';

                                            $transport      = '';
                                            $tiket          = '';
                                            $airport        = '';
                                            $ujk            = '';
                                            $akomodasi      = '';
                                            $konsumsi       = '';
                                            $ins_honor      = '';
                                            $ins_transport  = '';
                                            $buku_baju      = '';
                                            $alat_praktek   = '';
                                            $atk            = '';
                                            $fee_pl         = '';
                                        }
                                    ?>
        <div class="page-container">
            <div class="page-content">
                <div class="content-wrapper">

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <a type="button" href="<?php echo site_url('invoice/tambah_invoice_bln') ?>" class="btn btn-primary btn-sm">KEMBALI</a>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body"> 

                            <div id="edit1" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update Transport Lokal</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/1') ?>" name="search-theme-form" class="form-horizontal" method="post">
                                            <div class="modal-body">                                    
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Transport Lokal</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $transport ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update Paspor - PNBP</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/2') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Paspor - PNBP</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $pnbp  ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit3" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Tiket Pesawat</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/3') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tiket</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $tiket ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit4" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Paspor - Sidik Jari</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/4') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Paspor - Sidik Jari</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $sidik_jari ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit5" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Airport Tax</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/5') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Airport Tax</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $airport ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit6" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Paspor - Pas Foto</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/6') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Paspor - Pas Foto</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $foto ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit7" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">UJK</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/7') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">UJK</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $ujk ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit8" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Paspor - Online</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/8') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Paspor - Online</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $online ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit9" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Test Kesehatan</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/9') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Test Kesehatan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $kesehatan ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit10" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Akomodasi 120hari</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/10') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Akomodasi 120hari</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $akomodasi ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit11" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Visa TKI</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/11') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Visa TKI</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $visa ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit12" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Konsumsi 120hari</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/12') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Konsumsi 120hari</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $konsumsi ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit13" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Asuransi Perlindungan TKI</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/13') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Asuransi Perlindungan TKI</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $asuransi ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit14" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Honor Instruktur 120hari</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/14') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Honor Instruktur 120hari</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $ins_honor ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit15" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">SKCK</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/15') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">SKCK</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $skck ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit16" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Transport Instruktur 120hari</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/16') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Transport Instruktur 120hari</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $ins_transport ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit17" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">ID</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/17') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">ID</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $id ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit18" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Buku+Baju</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/18') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Buku+Baju</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $buku_baju ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit19" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Bahan Praktek masak & alat</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/19') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Bahan Praktek masak & alat</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $alat_praktek ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit20" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">ATK/Fotocopy/Cetak Foto</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/20') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">ATK/Fotocopy/Cetak Foto</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $atk ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="edit21" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Fee PL/TKI</h5>
                                        </div>
                                        <form action="<?php echo site_url('invoice/simpan_invoice/21') ?>" name="search-theme-form" class="form-horizontal" method="post">                                        
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_invoice" value="<?php echo $zidz ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Fee PL/TKI</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="tfield" class="form-control number" value="<?php echo $fee_pl ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn- btn-sm btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <?php 
                                $bulan = array(
                                            '1' => 'JANUARI',
                                            '2' => 'FEBRUARI',
                                            '3' => 'MARET',
                                            '4' => 'APRIL',
                                            '5' => 'MEI',
                                            '6' => 'JUNI',
                                            '7' => 'JULI',
                                            '8' => 'AGUSTUS',
                                            '9' => 'SEPTEMBER',
                                            '10' => 'OKTOBER',
                                            '11' => 'NOVEMBER',
                                            '12' => 'DESEMBER',
                                        );
                            ?><!--
                            <?php 
                                for ($yr=1; $yr<=12; $yr++) { 
                                    $stst = '';
                                    if (date('n') == $yr) {
                                        $stst = 'selected="selected"';
                                    }
                            ?>
                            <select name="bulan" class="select-search">

                                    <option value="<?php echo $yr ?>" <?php echo $stst ?> ><?php echo $bulan[$yr]; ?></option>
                            </select>
                            <?php } ?>-->
                            <label>Tahun, Bulan : <?php echo $row->tahun; ?>, <?php echo $bulan[$row->bulan]; ?></label>
                            <table class="table table-xxs">
                                <thead>
                                    <th width="25%"></th>
                                    <th width="25%"></th>
                                    <th width="25%"></th>
                                    <th width="25%"></th>
                                </thead>
                                <tbody>

                                    <?php 
                                        if ($row != NULL) {
                                            $pnbp       = "Rp. ".$row->pnbp;
                                            $sidik_jari = "Rp. ".$row->sidik_jari;
                                            $foto       = "Rp. ".$row->foto;
                                            $online     = "Rp. ".$row->online;
                                            $kesehatan  = "Rp. ".$row->kesehatan;
                                            $visa       = "Rp. ".$row->visa;
                                            $asuransi   = "Rp. ".$row->asuransi;
                                            $skck       = "Rp. ".$row->skck;
                                            $id         = "Rp. ".$row->id;

                                            $transport      = "Rp. ".$row->transport;
                                            $tiket          = "Rp. ".$row->tiket;
                                            $airport        = "Rp. ".$row->airport;
                                            $ujk            = "Rp. ".$row->ujk;
                                            $akomodasi      = "Rp. ".$row->akomodasi;
                                            $konsumsi       = "Rp. ".$row->konsumsi;
                                            $ins_honor      = "Rp. ".$row->ins_honor;
                                            $ins_transport  = "Rp. ".$row->ins_transport;
                                            $buku_baju      = "Rp. ".$row->buku_baju;
                                            $alat_praktek   = "Rp. ".$row->alat_praktek;
                                            $atk            = "Rp. ".$row->atk;
                                            $fee_pl         = "Rp. ".$row->fee_pl;
                                        } else {
                                            $pnbp       = '';
                                            $sidik_jari = '';
                                            $foto       = '';
                                            $online     = '';
                                            $kesehatan  = '';
                                            $visa       = '';
                                            $asuransi   = '';
                                            $skck       = '';
                                            $id         = '';

                                            $transport      = '';
                                            $tiket          = '';
                                            $airport        = '';
                                            $ujk            = '';
                                            $akomodasi      = '';
                                            $konsumsi       = '';
                                            $ins_honor      = '';
                                            $ins_transport  = '';
                                            $buku_baju      = '';
                                            $alat_praktek   = '';
                                            $atk            = '';
                                            $fee_pl         = '';
                                        }
                                    ?>
                                    <form method="post" action="<?php echo site_url('invoice/simpan_invoice') ?>">
                                        <tr>
                                            <td class="bg-primary" colspan="2">Biaya Tetap</td>
                                            <td class="bg-info" colspan="2">Biaya Tidak Tetap</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="blok_barat">Paspor </td>
                                            <td class="blok_timur">Transport Lokal <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit1" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $transport ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;- a. PNBP <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit2" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $pnbp ?></td>
                                            <td class="blok_timur">Tiket <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit3" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $tiket ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;- b. Sidik Jari <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit4" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $sidik_jari ?></td>
                                            <td class="blok_timur">Airport <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit5" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $airport ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;- c. Pas Foto <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit6" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $foto ?></td>
                                            <td class="blok_timur">UJK <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit7" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $ujk ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;- d. Online <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit8" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $online ?></td>
                                            <td colspan="2" class="blok_timur">Pelatihan</td>
                                        </tr>
                                        <tr>
                                            <td>Test Kesehatan <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit9" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $kesehatan ?></td>
                                            <td class="blok_timur">&nbsp;- a. Akomodasi 120hari @25.000 <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit10" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $akomodasi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Visa TKI <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit11" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $visa ?></td>
                                            <td class="blok_timur">&nbsp;- b. Konsumsi 120hari @18.000 <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit12" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $konsumsi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Asuransi Perlindungan TKI <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit13" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $asuransi ?></td>
                                            <td class="blok_timur">&nbsp;- c. Honor Instruktur 120hari @20.000 <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit14" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $ins_honor ?></td>
                                        </tr>
                                        <tr>
                                            <td>SKCK <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit15" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $skck ?></td>
                                            <td class="blok_timur">&nbsp;- d. Transport Instruktur 120hari @10.000 <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit16" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $ins_transport ?></td>
                                        </tr>
                                        <tr>
                                            <td>ID <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit17" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $id ?></td>
                                            <td class="blok_timur">&nbsp;- e. Buku+Baju <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit18" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $buku_baju ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" rowspan="3"></td>
                                            <td class="blok_timur">&nbsp;- f. Bahan praktek masak & alat <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit19" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $alat_praktek ?></td>
                                        </tr>
                                        <tr>
                                            <td class="blok_timur">&nbsp;- g. ATK / Fotocopy / Cetak Foto <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit20" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $atk ?></td>
                                        </tr>
                                        <tr>
                                            <td class="blok_timur">Fee PL/TKI <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#edit21" onclick="edit()"><i class="icon-pencil4"></i></button></td>
                                            <td>: <?php echo $fee_pl ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td></td>
                                            <td colspan="2" class="text-center">
                                                <a type="button" class="btn btn-lg bg-blue-600" href="<?php echo site_url('invoice/cetak_invoice/'.$zidz) ?>">Cetak Invoice</a>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript" charset="utf-16">
        $('input.number').keyup(function(event) {

          // skip for arrow keys
          if(event.which >= 37 && event.which <= 40) return;

          // format number
          $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            ;
          });
        });
    </script>