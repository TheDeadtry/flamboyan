
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Detail Daftar CTKI </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>               

<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-bordered">
                        <div class="panel-heading bg-blue-400">
                            <h5 class="panel-title">
                                <div class='title'>Data Daftar CTKI</div> <br>
                            </h5>
                            <div class="heading-elements">
                                <a class='btn bg-warning-800 btn-large' data-toggle='modal' href='#tambahagama' role='button'>Tambah CTKI</a>
                                <a href="<?php echo site_url('surat_rekom_tabelpap/'); ?>" class='btn bg-warning-800 btn-large' type="button">Kembali</a>
                            </div>
                        </div>

                        <div class="panel-body">     
                            <div class="table-responsive">  
                                <table class="table table-bordered table-striped table-hover" id="fixedeks">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>ID BIODATA</th>
                                            <th>NAMA</th>
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

                        <div class="modal fade" id="editvv" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-orange-800">
                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                        <h3>Update Agreement <?php echo $id_pembuatan?> </h3>
                                    </div>  
                                    <form class="form-horizontal" method="post" action="<?php echo site_url('surat_rekom_tabelpap/update_tabelpap/'.$id_pembuatan) ?>">
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" name="id_pembuatan" id="detail_id" value="">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-sm-3"> PILIH CTKI </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="id1" data-placeholder="Choose a Category" id="edit_ctki">
                                                        <?php 
                                                        foreach ($tampil_data_all_sektor as $pilihan) {
                                                            echo '<option value="'.$pilihan->id_biodata.'" />'.$pilihan->id_biodata.' - '.$pilihan->nama;
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class='modal fade' id='tambahagama' role='dialog'>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class='modal-header bg-teal-800'>
                                        <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                        <h3>Tambah Agreement  <?php echo $id_pembuatan; ?></h3>
                                    </div>
                                    <form action="<?php echo site_url('surat_rekom_tabelpap/simpan_data_tabelpap/'.$id_pembuatan);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                        <div class='modal-body'>
                                            <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $id_pembuatan ?>">
                                            <code class="text-danger">PILIH SALAH SATU,dari 5 PILIHAN CTKI BERDASARKAN SEKTORNYA</code>

                                            <div class="form-group" id="ctki1">
                                                <label class="control-label col-sm-3"> PILIH CTKI (FEMALE FORMAL) </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="id1" data-placeholder="Choose a Category" id="xdetail_ctki1">
                                                        <option value="" />
                                                        <?php  foreach ($tampil_data_ff as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group" id="ctki2">
                                                <label class="control-label col-sm-3"> PILIH CTKI (FEMALE INFORMAL) </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="id2" data-placeholder="Choose a Category" id="xdetail_ctki2">
                                                        <option value="" />
                                                        <?php  foreach ($tampil_data_fi as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group" id="ctki3">
                                                <label class="control-label col-sm-3"> PILIH CTKI (MALE FORMAL) </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="id3" data-placeholder="Choose a Category" id="xdetail_ctki3">
                                                        <option value="" />
                                                        <?php  foreach ($tampil_data_mf as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group" id="ctki4">
                                                <label class="control-label col-sm-3"> PILIH CTKI (MALE INFORMAL) </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="id4" data-placeholder="Choose a Category" id="xdetail_ctki4">
                                                        <option value="" />
                                                        <?php  foreach ($tampil_data_mi as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group" id="ctki5">
                                                <label class="control-label col-sm-3"> PILIH CTKI (PANTI JOMPO) </label>
                                                <div class="col-sm-9">
                                                    <select class="select-search" name="id5" data-placeholder="Choose a Category" id="xdetail_ctki5">
                                                        <option value="" />
                                                        <?php  foreach ($tampil_data_jp as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
                                            </div> 
                                        </div>           
                                        <div class='modal-footer'>
                                            <button class='btn' data-dismiss='modal'>Close</button>
                                            <button class='btn btn-primary'>Save changes</button>
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
                "url"       : "<?php echo site_url('surat_rekom_tabelpap/show_data_detail/'.$id_pembuatan) ?>",
                "type"      : "POST"
            }
        });

        function edit999(id) {
            $.ajax({
                url: '<?php echo site_url('surat_rekom_tabelpap/edit_detail_show') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+id,
                encode:true,
                success:function (data) {
                    $('#detail_id').val(data.id_pembuatan);
                    $('#edit_ctki').val(data.id_biodata).trigger("change");
                }
            })
        }

    </script>