
<div class="row-fluid">
    <div class="span12">
        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
            </span>
        </div>
        <h3 class="page-title">Halaman <small>Absensi</small></h3>
        <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
            <li><a href="#">Dashboard</a><span class="divider">&nbsp;</span></li>
            <li><a href="#">Data Personal</a><span class="divider">&nbsp;</span></li>
            <li><a href="#">Detail</a><span class="divider-last">&nbsp;</span></li>
        </ul>
    </div>
</div>
<div class="tabbable tabbable-custom tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1_1" data-toggle="tab">Data Majikan - 雇主</a></li>
        <li><a href="#tab_1_2" data-toggle="tab">Data TKI - 外勞</a></li>
        <li><a href="#tab_1_3" data-toggle="tab">Data Disnaker - 勞工網上報名</a></li>
        <li><a href="#tab_1_4" data-toggle="tab">Data PK - 勞動契約</a></li>
        <li><a href="#tab_1_5" data-toggle="tab">Data Suhan - 核准函</a></li>
        <li><a href="#tab_1_6" data-toggle="tab">Data VISA - 簽證函</a></li>
        <li><a href="#tab_1_7" data-toggle="tab">Data Paspor - 護照</a></li>
        <li><a href="#tab_1_8" data-toggle="tab">Data SKCK - 良民證</a></li>
        <li><a href="#tab_1_9" data-toggle="tab">Data Medical - 體檢</a></li>
        <li><a href="#tab_1_10" data-toggle="tab">Data PAP - 出發前簡報課</a></li>
        <li><a href="#tab_1_11" data-toggle="tab">Data KSP LOAN - 貸款</a></li>
        <li><a href="#tab_1_12" data-toggle="tab">Data Departure - 入境</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Majikan</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Majikan</th>
                                    <th>Tanggal Terpilih</th>
                                    <th>Tanggal Jadi</th>
                                    <th>Tanggal Terbang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($majikan as $row) { ?>
                                <tr>
                                    <td><?php echo $row->namamajikan; ?></td>
                                    <td><?php echo $row->tglterpilih; ?></td>
                                    <td><?php echo $row->JD; ?></td>
                                    <td><?php echo $row->tglterbang; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_2">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data TKI</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No Induk Agency</th>
                                    <th>No Induk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tki as $row) { ?>
                                <tr>
                                    <td><?php echo $row->kode_agen; ?></td>
                                    <td><?php echo $row->id_biodata; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_3">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Disnaker</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tgl Online</th>
                                    <th>No ID Online</th>
                                    <th>No Pasport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($disnaker as $row) { ?>
                                <tr>
                                    <td><?php echo $row->tglonline; ?></td>
                                    <td><?php echo $row->nodisnaker; ?></td>
                                    <td><?php echo $row->nopaspor; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_4">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data PK</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No PK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_5">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Suhan</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No Suhan</th>
                                    <th>Tgl Terbit</th>
                                    <th>Tgl Exp</th>
                                    <th>Tgl Terima Baru</th>
                                    <th>Tgl Simpan</th>
                                    <th>Tgl Bawa</th>
                                    <th>Tgl Minta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($suhan as $row) { ?>
                                <tr>
                                    <td><?php echo $row->no; ?></td>
                                    <td><?php echo $row->tglterbit; ?></td>
                                    <td><?php echo $row->tglexp; ?></td>
                                    <td><?php echo $row->tglterima; ?></td>
                                    <td><?php echo $row->tglsimpan; ?></td>
                                    <td><?php echo $row->tglbawa; ?></td>
                                    <td><?php echo $row->tglminta; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_6">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Visa</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kocokan</th>
                                    <th>Finger Print</th>
                                    <th>Terima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($visa as $row) { ?>
                                <tr>
                                    <td><?php echo $row->kocokan; ?></td>
                                    <td><?php echo $row->finger; ?></td>
                                    <td><?php echo $row->terima; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_7">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Paspor</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pengajuan</th>
                                    <th>Terima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($paspor as $row) { ?>
                                <tr>
                                    <td><?php echo $row->rencana; ?></td>
                                    <td><?php echo $row->berlaku; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_8">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data SKCK</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pengajuan</th>
                                    <th>Terima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_9">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Medikal</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Tanggal Expired</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($medical as $row) { ?>
                                <tr>
                                    <td><?php echo $row->tanggal; ?></td>
                                    <td><?php echo $row->expired; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_10">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data PAP</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tgl PAP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pap as $row) { ?>
                                <tr>
                                    <td><?php echo $row->tglpap; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_11">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data KSP LOAN</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>TTD Bank</th>
                                    <th>KTKLN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ksploan as $row) { ?>
                                <tr>
                                    <td><?php echo $row->ttdbank; ?></td>
                                    <td><?php echo $row->ktkln; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab_1_12">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Data Departure</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span></div>
                    <div class="widget-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>tanggalterbang</th>
                                     <th>Rute Penerbangan 1</th>
                                     <th>Rute Penerbangan 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($departure as $row) { ?>
                                <tr>
                                    <td><?php echo $row->tanggalterbang; ?></td>
                                    <td> <?php echo $row->namamaskapai; echo " : ".$row->kodeterbang;echo " : ".$row->ruteterbang;echo " : ".$row->jamterbang;?></td>
                                    <td> <?php echo $row->namamaskapai; echo " : ".$row->kodeterbang2;echo " : ".$row->ruteterbang2;echo " : ".$row->jamterbang2;?> </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>