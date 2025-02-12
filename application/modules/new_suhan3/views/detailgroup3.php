
    <div class="form-group">
        <label class="control-label col-sm-3"> Pilih Agen </label>
        <div class="col-sm-9">
            <?php   echo form_dropdown("kode_agen",$option_agen,"","id='kode_agen' class='form-control'"); ?>
            <!-- <div id="load2" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div> -->

        </div>
    </div>

    <div class="form-group" id="jelasin_majikan">
        <label class="control-label col-sm-3">Pilih Majikan </label>
        <div class="col-sm-9">
            <?php    echo form_dropdown("kode_agen",array('Pilih Group'=>'Pilih Agen Terkebih Dahulu'),'','disabled class="form-control"'); ?>
        </div>
    </div> 

    <script type="text/javascript">
        $("#kode_agen").change(function(){
        var kode_agen = {kode_agen:$("#kode_agen").val()};
        document.getElementById("load").style.display = "block";  // show the loading message.
        $.ajax({
            type: "POST",
            url : "<?php echo site_url('new_suhan/select_majikanlist')?>",
            data: kode_agen,
            success: function(msg) {
            $('#jelasin_majikan').html(msg);
                document.getElementById("load").style.display = "none";
            }
            });
        });
    </script>
