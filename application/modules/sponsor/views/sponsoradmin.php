

            
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Data Sponsor </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert bg-info alert-styled-left">
				<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
                &nbsp
                <a align="Right" href="<?php echo base_url(); ?>index.php/printdata/cetaksponsor/"  class="btn bg-slate-700">PRINT DATA SPONSOR</a>
			</div>


<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-8">
                    <div class="panel panel-danger panel-bordered">

                        <div class="panel-heading">
                            <h5 class="panel-title text-center ">Data Sponsor </h5>
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Hadphone</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="panel panel-bordered">

                        <div class="panel-heading bg-brown-400">
                            <h5 class="panel-title text-center ">Input Sponsor </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <form class="form-horizontal" autocomplete="off" role="form" action="<?php echo site_url('sponsor/simpan_data_sponsor'); ?>" method="POST">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="form-label col-sm-12">Kode </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="kode" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12">Nama </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nama" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12">Handphone </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="hp" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12">Email </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="email" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12">Alamat </label>
                                    <div class="col-sm-12">
                                        <input type="text" name="alamat" class="form-control" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-12">Status</label>
                                    <div class="col-sm-12">
                                        <select class="select-search" data-placeholder="Choose a Category" tabindex="1" name="status">
                                            <option value="" />Select...
                                            <option value="teman" />Teman
                                            <option value="sponsor" />Sponsor
                                            <option value="agen" />Agen
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions text-center">
                                    <button type="submit" class="btn bg-blue-600"><i class="icon-checkmark2"></i> Save</button>
                                    <button type="button" class="btn bg-danger-600"><i class=" icon-cross3"></i> Batal</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

                    

                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: "400px",
                        processing: true,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('sponsor/show_sponsor') ?>",
                            "type"      : "POST"
                        }
                    });
                </script>
