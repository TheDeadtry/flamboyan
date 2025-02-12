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
                                            <td max-width="100%" style="text-align:center">Nama TKI</td>
                                            <td max-width="100%" style="text-align:center">Pinjaman</td>
                                            <td max-width="100%" style="text-align:center">APPROVAL SISKOKTKLN</td>
                                            <td max-width="100%" style="text-align:center">Tgl Aproval</td>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rekom_data"> 

                                        <?php 
                                            $dataTki = $pplk->datatki;
                                            $datatoarray = json_decode($dataTki);

                                            $pinjaman = $pplk->pinjaman;
                                            $pinjaman = json_decode($pinjaman);

                                            $aproval = $pplk->aproval;
                                            $aproval = json_decode($aproval);

                                            $tgl_aproval = $pplk->tgl_aproval;
                                            $tgl_aproval = json_decode($tgl_aproval);


                                        ?>

                                        <?php for($i=0; $i<(count($datatoarray)-1); $i++) : ?>
                                            <?php $nama = $this->db->query("SELECT * FROM personal where id_biodata = '$datatoarray[$i]'")->row();
                                                $namanya = $nama->nama; 
                                             ?>
                                            <tr>
                                                <td><?= $datatoarray[$i]; ?></td>
                                                <td><?= $namanya; ?></td>
                                                <td><input value="<?= $pinjaman[$i]; ?>" type="text" class="form-control rupiah" name="pinjaman"></td>
                                                <td><input value="<?= $aproval[$i]; ?>" type="text" class="form-control" name="aprvktkln"></td>
                                                <td><input value="<?= $tgl_aproval[$i]; ?>" type="text" name="tglaprv" class="form-control mask"></td>
                                            </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <button class="btn btn-success simpan">SIMPAN</button>
                            <button class="btn btn-success cetak">Print Data</button>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="<?= base_url(); ?>gugus/jquery_mask/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".mask").inputmask({"mask":"99-99-9999"});
    })

    $(".cetak").click(function(){
        var id = "<?= $id; ?>";
        location.href = "<?= site_url(); ?>/pplk/cetak_hasil/"+id;
    })


   $('.rupiah').keyup(function(event) {

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

    $(".simpan").click(function(){
        var id = "<?= $id; ?>";
        var pinjaman = "";
        $( "input[name=pinjaman]" ).each(function() {
          pinjaman += $( this ).val() + " ";
        });
        var aprvktkln = "";
        $( "input[name=aprvktkln]" ).each(function() {
          aprvktkln += $( this ).val() + " ";
        });
        var tglaprv = "";
        $( "input[name=tglaprv]" ).each(function() {
          tglaprv += $( this ).val() + " ";
        });

        $.ajax({
            url: "<?= site_url(); ?>/pplk/update_data",
            method: "POST",
            dataType: "text",
            data: {
                pinjaman: pinjaman,
                aprvktkln: aprvktkln,
                tglaprv: tglaprv,
                id: id
            }, success:function(response){
                alert(response);
            }
        });
    });
</script>