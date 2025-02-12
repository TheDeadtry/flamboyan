
    <div class="form-group">
        <label class="control-label col-sm-3"> Pilih majikan </label>
        <div class="col-sm-9">
            <?php echo form_dropdown("kodemajikan",$option_majikan,"","id='kode_majikan' class='form-control'"); ?>
            <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
            </div>
        </div>
    </div>

    <div class="form-group" id="jelasin_suhan">
        <label class="control-label col-sm-3">Pilih Suhan </label>
        <div class="col-sm-9">
            <?php echo form_dropdown("kode_majikan",array('Pilih Group'=>'Pilih Majikan Terkebih Dahulu'),'','disabled class="form-control"'); ?>
        </div>
    </div>

    <script type="text/javascript">
        $("#kode_majikan").change(function(){
            var kode_majikan = {kode_majikan:$("#kode_majikan").val()};
            document.getElementById("load").style.display = "block";  // show the loading message.
            $.ajax({
                type: "POST",
                url : "<?php echo site_url('new_visapermit/select_suhanlist')?>",
                data: kode_majikan,
                success: function(msg) {
                $('#jelasin_suhan').html(msg);
                    document.getElementById("load").style.display = "none";
                }
            });
        });
    </script>
