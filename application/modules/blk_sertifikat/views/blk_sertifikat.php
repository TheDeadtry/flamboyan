
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/notifications/bootbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/media/fancybox.min.js"></script>

<script type="text/javascript">
    $("#navigation").change(function()
    {
        document.location.href = $(this).val();
    });
</script>
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-9">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i> CETAK SERTIFIKAT </i></b></h5>

                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Pilih Sektor</label>
                                        <div class="col-lg-10">
                                            <select class="select-results-color" name="sektor" id="pilih_sektor" required="required">
                                                <option disabled selected id="pilih_sektor_default">PILIH SEKTOR</option>
                                                <?php foreach($sektor as $sektormajikan) : ?>
                                                    <option value="<?= $sektormajikan->id."-".$sektormajikan->sektor ?>"><?= $sektormajikan->nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/images/ajax-loaders/13.gif" alt="Whirlpool" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Pilih PMI</label>
                                        <div class="col-lg-10">
                                            <select class="select-results-color" name="pmi" id="pilih_pmi" required="required">
                                                <option disabled selected id="pilih_pmi_default"><font style="color: red;">PILIH SEKTOR TERLEBIH DAHULU<font></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="tipe_show">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Pilih Tipe</label>
                                        <div class="col-lg-10">
                                            <select class="select-results-color" name="tipe" id="pilih_tipe" required="required">
                                                <option disabled selected id="pilih_tipe_default"><font style="color: red;">PILIH PMI TERLEBIH DAHULU<font></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="display:none" id="manual_show">
                                    <div class="row">
                                        <label class="control-label col-lg-2">Tanggal Manual</label>
                                        <div class="col-lg-5">
                                            <input type="text" name="tglawal" id="tglawal" class="form-control dewdate2" placeholder="Tanggal Awal" />
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="text" name="tglakhir" id="tglakhir" class="form-control dewdate2" placeholder="Tanggal Akhir"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right" id="pilih_btn" style="display: none;">
                                    <button class="btn btn-primary print_header">PRINT</button>
                                </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel">
                        <div class="panel-heading bg-slate-800">
                            <h5 class="panel-title"><b><i> LIST SERTIFIKAT </i></b></h5>

                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            
                            <div class="table-responsive">
                                <table class="table table-xxs table-bordered table-striped table-hover" id="dkrh">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">OPTION</td>
                                            <td max-width="100%" style="text-align:center">SEKTOR</td>
                                            <td max-width="100%" style="text-align:center">NO URUT SERTIFIKAT</td>
                                            <td max-width="100%" style="text-align:center">PIN HAU/NO PIN<br/>NAMA</td>
                                            <td max-width="100%" style="text-align:center">TGL AWAL<br/>TGL AKHIR<br/>TGL TTD</td>
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

<script type="text/javascript">

    window.modal_ubah = function(id){
        $.ajax({
            url: '/flamboyan/blk_sertifikat/ubah_api/'+id
            , dataType: 'json'
            , success : function(res) {
                console.log(res)
            }
            ,error: function(e){
                console.log(e)
            }
        })
    }

    $('#pilih_sektor').change(function() {
        var kode = {
            sektor : $("#pilih_sektor").val()
        };
        document.getElementById("load").style.display = "block";
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('blk_sertifikat/ambil_pmi') ?>",
            data: kode,
            success: function(msg) {
                $('#pilih_sektor').find('#pilih_sektor_default').remove();

                $('#pilih_pmi')
                .find('option')
                .remove()
                .end()
                .append(msg);

                $('#pilih_pmi_default').change();
                $('#pilih_pmi').change();

                document.getElementById("load").style.display = "none";
            }
        });
    });

    $('#pilih_pmi').change(function() {
        $('#pilih_btn').show();
    });

    $('#pilih_tipe').change(function() {
        $('#tglawal').val("");
        $('#tglakhir').val("");
        btn = $('#pilih_tipe').val();
        if ( btn == 'X' ) {
            $('#manual_show').show();
        } else {
            $('#manual_show').hide();
        }
    });

    $('#pilih_pmi').change(function() {
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('blk_sertifikat/check_tipe_pmi') ?>",
            data: {
                pmi : $("#pilih_pmi").val()
            },
            success: function(msg) {
                $('#pilih_tipe').find('#pilih_tipe_default').remove();

                $('#pilih_tipe')
                .find('option')
                .remove()
                .end()
                .append(msg);

                $('#pilih_tipe_default').change();
                $('#pilih_tipe').change();
            }
        });
    });


    $('#dkrh').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('blk_sertifikat/sertifikat_show') ?>",
            "type"      : "POST"
        }
    });

    $(document).on("click", ".print_header", function() {
        console.log("hello")
        var form_data = new FormData();         
        form_data.append('tipe', $("#pilih_tipe").val() );
        form_data.append('tglawal', $("#tglawal").val() );
        form_data.append('tglakhir', $("#tglakhir").val() );
        form_data.append('sektor', $("#pilih_sektor").val() );
        form_data.append('pmi', $("#pilih_pmi").val() );

        $.ajax({
            url             : "<?php echo site_url('blk_sertifikat/add_process') ?>",
            type            : "POST",
            cache           : false,
            contentType     : false,
            processData     : false,
            data            : form_data,
            success: function(data) {
                if (!data.success) {
                    swal({
                        title: "Oops...",
                        text: (data.message)+" !",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    swal({
                        title: "Sukses diubah!",
                        text: (data.message),
                        confirmButtonColor: "#66BB6A",
                        type: "success"
                    }, function() {
                        window.location.href = "<?php echo site_url('blk_sertifikat/cetaks') ?>"+"/"+data.message;
                        $('#dkrh').DataTable().ajax.reload();
                    });
                }
            }, error: function(){
                swal({
                    title: "Oops...",
                    text: "Data TKI belum lengkap",
                    confirmButtonColor: "#EF5350",
                    type: "error"
                });
            }
        });
    });
</script>