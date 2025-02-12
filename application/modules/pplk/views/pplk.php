<style type="text/css">
    .pilih_tki{
        display: block;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 0;
        margin: 0;
    }
    .pilih_tki a{
        display: inline-block;
        padding: 5px;
        margin: 3px;
        border-radius: 3px;
        background-color: blue;
        color: white;
    }

    .pilih_tki_menu{
        display: block;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 0;
        margin: 0;
        overflow-y: scroll;
        height: 150px;
    }
    .pilih_tki_menu a{
        display: block;
        padding: 5px;
        margin: 3px;
        border-radius: 3px;
        border: 1px solid #ddd;
    }

    .pilih_tki_menu a:hover{
        background-color: blue;
        color: white;
    }
</style>

<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">


                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>TAMBAHKAN DATA</i></b></h5>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>No Permohonan</label>
                                <input type="text" name="nopermonhonan" class="form-control" placeholder="inputkan nama permohonan">
                            </div>

                            <?php $date_now = date("d-m-Y"); ?>


                            <div class="form-group">
                                <label>Tgl Permohonan</label>
                                <input type="text" name="tglpermohonan" value="<?= $date_now; ?>" class="form-control" placeholder="inputkan nama permohonan" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label>Negara Tujuan</label>
                                <input type="text" name="tujuanpermohonan" class="form-control" placeholder="inputkan nama permohonan">
                            </div>
                            <div class="form-group">
                                <label>Pilih TKi</label>
                                <ol class="pilih_tki">

                                </ol>
                                <input type="text" class="form-control" name="search-data">
                                <ol class="pilih_tki_menu">
                                    <?php foreach( $personal as $key => $value) : ?>
                                        <a data='data-kirim' nilai="<?= $value->id_biodata; ?>"><?= $value->id_biodata.' '.strtoupper($value->nama); ?></a>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <button type="button" class="btn btn-primary simpan">Simpan Data</button>
                        </div>
                    </div>
                
                    <div class="panel">
                        <div class="panel-heading bg-teal">
                            <h5 class="panel-title"><b><i>PRINT SURAT REKOM IJIN BATCH/NAMA </i></b></h5>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-lg table-bordered table-striped table-hover userdata">
                                    <thead>
                                        <tr>
                                            <td max-width="100%" style="text-align:center">NO</td>
                                            <td max-width="100%" style="text-align:center">Id Permohonan</td>
                                            <td max-width="100%" style="text-align:center">tanggal permohonan</td>
                                            <td max-width="100%" style="text-align:center">Tujuan Permohanan</td>
                                            <td max-width="100%" style="text-align:center">Data Tki</td>
                                            <td max-width="100%" style="text-align:center">#</td>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rekom_data"> 

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

<div class="test"></div>


<script type="text/javascript" src="<?= base_url(); ?>gugus/jquery_mask/jquery.inputmask.bundle.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        
        $(".mask").inputmask({"mask":"99-99-9999"});

        // tampilkan data ________________________________________________________________

        panggil_data();


        // tampilkan data_________________________________________________________________


        // bertugas menyimpan data______________________________________________________

        $(".simpan").click(function(){
            var nopermonhonan = $("input[name=nopermonhonan]").val();
            var tglpermohonan = $("input[name=tglpermohonan]").val();
            var tujuanpermohonan = $("input[name=tujuanpermohonan]").val();


            var datatki = "";
            $( "a[data=data]" ).each(function() {
              datatki += $(this).attr("nilai") + " ";
            });


            $.ajax({
                url: "<?= site_url(); ?>/pplk/simpan_data/",
                method: "POST",
                dataType: "text",
                data: {
                    nopermonhonan: nopermonhonan,
                    tglpermohonan: tglpermohonan,
                    tujuanpermohonan: tujuanpermohonan,
                    datatki: datatki
                }, success:function(response){
                    location.reload();
                }
            });
        });

        // end of simpan data


        // bertugas melakukan pencarian list menu________________________________________________________


        $("input[name=search-data]").keyup(function(){
            var pencarian = $(this).val().toUpperCase();
            var data = "";
            $("a[data=data-kirim]").each(function(){
                if ($(this).text().search(pencarian) > -1) {
                    $(this).css({"display":""});
                }else{
                    $(this).css({"display":"none"});
                }
            })
        })

        // end of pencarian




//  mbertugas meambah data mengurangi data__________________________________________________

        $("a[data=data-kirim]").click(function(){
            var nilai = $(this).attr("nilai");
            var value = $(this).text();
            var key = value.replace(/ /g, '_');
            $(".pilih_tki").append("<a data='data' key='"+key+"' nilai='"+nilai+"' onclick='remove("+'"'+key+'","'+nilai+'"'+")'>"+value+"</a>");
            $(this).remove();
            

        })

    });

        function remove(key, nilai){
            var data = key.replace(/_/g, " ");
            $(".pilih_tki_menu").append("<a data='data-kirim' del='"+key+"' nilai='"+nilai+"' onclick='adddata("+'"'+key+'","'+nilai+'"'+")''>"+data+"</a>");
            $("a[key="+key+"]").remove();
        }

        function adddata(key, nilai){
            var data = key.replace(/_/g, " ");
            $(".pilih_tki").append("<a data='data' key='"+key+"' nilai='"+nilai+"' onclick='remove("+'"'+key+'"'+")'>"+data+"</a>");
            $("a[del="+key+"]").remove();

        }

// end of function_______________________________________________________________________
        function panggil_data(){
            var dataTables = $(".userdata").DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax"  :{
                    url:"<?= site_url(); ?>/pplk/tampilkan_data/",
                    type: "POST"
                },
                "columnDefs":[
                    {
                        "orderable": false,
                    }
                ]
            });
        }

        function hapusDatanya(key){
            location.href = "<?= site_url(); ?>/pplk/hapusdatanya/"+key;
        }

        function tampilkanDatanya(key){
            location.href = "<?= site_url(); ?>/pplk/tampilka_hasil/"+key;
        }

</script>