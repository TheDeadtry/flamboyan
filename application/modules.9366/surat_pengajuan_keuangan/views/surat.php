
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Surat Pengajuan ke Lembaga Keuangan </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="alert bg-info alert-styled-left">
                <button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
            </div>


<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <a class='btn bg-success btn-large' href='<?php echo site_url('print_data') ?>'>Kembali</a>
                            <a class='btn bg-success btn-large' data-toggle='modal' href='#tambahx' role='button'>Tambah Surat Pengajuan</a>
                            <div class="heading-elements">
                                <h5 class="panel-title text-center "> <b><i>Surat Pengajuan</i></b></h5>
                            </div>
                        </div>

                        <div class="panel-body">     
                            <div class="table-responsive">        
                                <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>PPTKIS</th>
                                            <th>Lembaga</th>
                                            <th>No Surat</th>
                                            <th>Tanggal</th>
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
</div>

                <div class='modal fade' id='tambahx' role='dialog'>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class='modal-header bg-primary'>
                                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                <h3>Tambah Surat Pengajuan</h3>
                            </div>  
                            <form action="<?php echo site_url('surat_pengajuan_keuangan/simpan_pengajuan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                <div class="modal-body">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">PPTKIS </label>
                                            <div class="col-lg-12">
                                                <input type="text" name="pptkis" class="form-control not-allowed" value="PT.FLAMBOYAN GEMAJASA" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">Lembaga </label>
                                            <div class="col-lg-12">
                                                <input type="text" name="lembaga" class="form-control not-allowed" value="INTERNUSA TRIBUANA CITRA MULTIFINANCE" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">No. Surat </label>
                                            <div class="col-lg-12">
                                                <input type="text" name="no_surat" class="form-control" placeholder="1046/LK-ITC/FGJ/VIII/2017">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">Tanggal </label>
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input type="text" name="tanggal" autocomplete="off" readonly="readonly" class="form-control dewdate pointer" placeholder="Select Datepicker">
                                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
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


                <div class="modal fade" id="edit" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-slate-400">
                                <button class="close" data-dismiss="modal" type="button">&times;</button>
                                <h3>Ubah Surat Pengajuan</h3>
                            </div>  
                            <form class="form-horizontal" method="post" action="<?php echo site_url('surat_pengajuan_keuangan/ubah_pengajuan/') ?>">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="id_pengajuan" id="id_aju" value="">

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">PPTKIS </label>
                                            <div class="col-lg-12">
                                                <input type="text" name="pptkis" id="epptkis" class="form-control not-allowed" value="" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">Lembaga </label>
                                            <div class="col-lg-12">
                                                <input type="text" name="lembaga" id="elembaga" class="form-control not-allowed" value="" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">No. Surat </label>
                                            <div class="col-lg-12">
                                                <input type="text" name="no_surat" id="enosurat" class="form-control" placeholder="1046/LK-ITC/FGJ/VIII/2017" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-12 control-label">Tanggal </label>
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input type="text" name="tanggal" id="etanggal" autocomplete="off" readonly="readonly" class="dewdate form-control pointer" placeholder="Select Datepicker" value="">
                                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
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

                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('surat_pengajuan_keuangan/show_datax') ?>",
                            "type"      : "POST"
                        }
                    });

                    function edit666(id) {
                        $.ajax({
                            url: '<?php echo site_url('surat_pengajuan_keuangan/edit_show') ?>',
                            type: 'POST',
                            dataType: 'json',
                            data: 'id='+id,
                            encode:true,
                            success:function (data) {
                                $('#id_aju').val(data.id_surat_aju);
                                $('#epptkis').val(data.pptkis);
                                $('#elembaga').val(data.lembaga);
                                $('#enosurat').val(data.no_surat);
                                $('#etanggal').val(data.tanggal);
                            }
                        })
                    }
                </script>
