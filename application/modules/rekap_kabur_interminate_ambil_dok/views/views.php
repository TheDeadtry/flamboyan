
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/notifications/bootbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/blk/assets/js/plugins/media/fancybox.min.js"></script>
<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
                
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel">
                        <div class="panel-heading bg-indigo">
                            <h5 class="panel-title"><b><i>PRINT </i></b></h5>

                            <div class="heading-elements">
                            </div>
                        </div>

                            <div class="panel-body">
                                <form id="data">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="start" class="label col-lg-3" style="color:#000;">Tanggal Awal</label>
                                        <div class="col-lg-9">
                                            <input type="text" id="start" name="start" class="form-control dewdate2" value="">
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="label col-lg-3" style="color:#000;">Tanggal Akhir</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="ending" id="tgl" class="form-control dewdate2" value="">
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="kondisi" class="label col-lg-3" style="color:#000;">Kondisi</label>
                                        <div class="col-lg-9">
                                            <select name="kondisi" id="kondisi" class="form-control">
                                                <option value="">--selected--</option>
                                                <option value="SUDAH TERBANG LALU KABUR">SUDAH TERBANG LALU KABUR</option>
                                                <option value="SUDAH TERBANG INTERMINATE">SUDAH TERBANG INTERMINATE</option>
                                                <option value="AMBIL DOKUMENT">AMBIL DOKUMENT</option>
                                                <option value="DOKUMENT SIAP DIAMBIL">DOKUMENT SIAP DIAMBIL</option>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                        </div>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-xs bg-primary">PRINT + SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div> 
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>BRIFING TERBANG</i></b></h5>

                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-lg table-bordered table-striped table-hover" id="gugus">
                                    <thead>
                                        <tr>
                                            <td rowspan="2" max-width="100%" style="text-align:center">NO</td>
                                            <td colspan="2" max-width="100%" style="text-align:center">Rentang Tanggal</td>
                                            <td rowspan="2" max-width="100%" style="text-align:center">Kondisi</td>
                                            <td rowspan="2" max-width="100%" style="text-align:center">Action</td>
                                        </tr>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">tanggal awal</td>
                                            <td max-width="100%" style="text-align:center">tanggal akhir</td>
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

                            <div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">UBAH DATA</h5>
                                        </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Pilih Kota</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control" name="pilih_tipe2" id="pilih_tipe2">
                                                                <option value="PORTRAIT" >PORTRAIT</option>
                                                                <option value="LANDSCAPE" >LANDSCAPE</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Tanggal</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" name="tgl2" id="tgl2" class="form-control dewdate2" value="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="label col-lg-3" style="color:#000;">Pilih Peserta</label>
                                                        <div class="col-lg-9">
                                                            <select class="tyy" name="select_nama2[]" multiple="multiple" id="select_nama2">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary edit_footer">OK</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">

$(document).ready(function(){
    tampilopsi();
});


function tampilopsi(){
    $.ajax({
        url: "<?= site_url(); ?>/spl_cost/tampilkandataopsi",
        success:function(response){
            $(".tyy").html(response);
        }
    })
}


    $('#gugus').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url"       : "<?php echo site_url('rekap_kabur_interminate_ambil_dok/show') ?>",
            "type"      : "POST"
        }
    });

    $('.tyy').select2();

    function modal_ubah(id) {
        $.ajax({
            url     : "<?php echo site_url('spl_cost/edit_show') ?>",
            type    : "POST",
            data    : {
                'id'          : id       
            },
            success: function(data) {
                $("#id_hidden").val(id);

                $("#pilih_tipe2").val(data.tipe).trigger("change");
                $("#tgl2").val(data.tgl);
                $("#select_nama2").val(data.tki).trigger("change");

                $('#modal_form_horizontal').modal('toggle');

            }
        });
    }

    $('.modal-footer').on("click", ".edit_footer", function() {

        id = $("#id_hidden").val();
        var form_data = new FormData();   

        form_data.append('select_nama', $("#select_nama2").val() );
        form_data.append('tgl', $("#tgl2").val() );
        form_data.append('pilih_tipe', $("#pilih_tipe2").val() );
        $.ajax({
            url             : "<?php echo site_url('spl_cost/edit_process') ?>"+"/"+id,
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
                        $('#dkrh').DataTable().ajax.reload();
                        $('#modal_form_horizontal').modal('toggle');
                    });
                }
            }
        });

    });

    $("form#data").submit(function(event){
 
    //disable the default form submission
    event.preventDefault();

    //grab all form data  
    var formData = new FormData($(this)[0]);

    $.ajax({
    url: '<?= site_url() ?>/rekap_kabur_interminate_ambil_dok/tambahdata',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
        console.log(returndata);
        $('#gugus').DataTable().ajax.reload();
        // var ambildata = JSON.parse(returndata);
        // window.open("","_blank").location.href = "<?php echo site_url('amplop_terbang/print_amplop_terbang') ?>"+"/"+(ambildata.tanggal_awal)+'/'+ambildata.tanggal_akhir+'/'+ambildata.id;
    }
    });

    return false;
    });

    $(document).ready(function(){
        $(document).click(function(e){
            var target = $(e.target);
            if(target.is(".deletedata")){
                var getId = target.attr("data-id");
                $.ajax({
                    url: "<?= site_url(); ?>/rekap_kabur_interminate_ambil_dok/hapus",
                    dataType: "text",
                    method: "POST",
                    data: {
                        myid: getId
                    }, success:function(response){
                        console.log(response);
                        $('#gugus').DataTable().ajax.reload();
                    }
                })
            }
            if(target.is(".printdata")){
                var getId = target.attr("data-id");
                $.ajax({
                    url: "<?= site_url(); ?>/rekap_kabur_interminate_ambil_dok/print_prepaire",
                    dataType: "text",
                    method: "POST",
                    data: {
                        myid: getId
                    }, success:function(returndata){
                        console.log(returndata);
                        var ambildata = JSON.parse(returndata);
                        window.open("","_blank").location.href = "<?php echo site_url('rekap_kabur_interminate_ambil_dok/print_data') ?>"+"/"+(ambildata.tanggal_awal)+'/'+ambildata.tanggal_akhir+'/'+ambildata.kondisi;
                    }
                })
            }
        })
    })

</script>