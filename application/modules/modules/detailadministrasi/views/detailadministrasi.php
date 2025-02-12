<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal (MASIH DALAM PERBAIKAN)</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>                

                <div class="row-fluid">

                                <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Administrasi</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                            <?php foreach ($tampil_data_personal as $row) { ?>
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                    <?php 
                                        $this->load->view('template/menuadministrasi');
                                    ?>
                                </div>
                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                    
                                    
                                </div>

<div class='row-fluid'>
    <div class='span8 box'>
        <div class='box-header'>
            <div class='title'>
                <div class='icon-inbox'></div>
                Status TKW (perbaikan)
            </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='row-fluid'>
            <div class='span6'>
                <div class='box-content box-statistic'>
                    <h3 class='title text-error'>0</h3>
                    <small>Jumlah Absen</small>
                    <div class='text-error icon-inbox align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-warning'>0</h3>
                    <small>Jumlah Ijin</small>
                    <div class='text-warning icon-check align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-info'>0</h3>
                    <small>Jumlah PKL</small>
                    <div class='text-info icon-time align-right'></div>
                </div>
            </div>
            <div class='span6'>
                <div class='box-content box-statistic'>
                    <h3 class='title text-primary'>0</h3>
                    <small>No Paspor</small>
                    <div class='text-primary icon-truck align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title text-success'>0</h3>
                    <small>No Visa</small>
                    <div class='text-success icon-flag align-right'></div>
                </div>
                <div class='box-content box-statistic'>
                    <h3 class='title muted'>0</h3>
                    <small>Status </small>
                    <div class='muted icon-remove align-right'></div>
                </div>
            </div>

        </div>
    </div>

</div>                 
                                <div class="space5"></div>
    
                                <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel1">Modal Header</h3></div>
                                    <div class="modal-body">
                                        <form action="<?php echo site_url('detailadministrasi/ubahstatus');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            <div class="control-group">
                                                <label class="control-label">ID BIODATA</label>
                                                <div class="controls">
                                                    <input type="text" readonly name="idp" value="<?php echo $detailpersonalid; ?>" required class="span7 popovers" data-trigger="hover" data-content="Isi Nama Lengkap Sesuai dengan KTP" data-original-title="Nama Lengkap" readonly/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Status TKI</label>
                                                <div class="controls">
                                                    <select class="span7 " name="statustki" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="<?php echo $row->statusaktif; ?>"  /><?php echo $row->statusaktif; ?>
                                                        <option value="Pending" />Pending
                                                        <option value="Medical" />Medical
                                                        <option value="Unfit" />Unfit
                                                        <option value="Mengundurkan diri" />Mengundurkan diri
                                                    </select>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                <?php } ?>

                            </div>
        </div>


                    </div>