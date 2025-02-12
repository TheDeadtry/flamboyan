
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">DATA BIODATA PRINT PER KET ADM</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span></span></a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-md-1">
        </div>

        <div class="col-md-10">
    <!-- /page header -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <a type="button" href="<?php echo site_url('databio/') ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                    <h3 class="panel-title text-center">PRINT LAPORAN BULANAN KET ADMINISTRATOR</h3>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <form target='_blank' action="<?php echo site_url('cetak_ketadm/cetakketadm');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih Sektor</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="pilsek">
                                    <option value="all"/> Semua
                                    <option value="MF"/> Male Formal
                                    <option value="MI"/> Male Informal
                                    <option value="FF"/> Female Formal
                                    <option value="FI"/> Female Informal
                                    <option value="JP"/> Jompo
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Pilih Print</label>
                            <div class="col-md-10">
                                <select class="select-results-color" onChange="dcetakk()" id="zdcetakk" name="zdcetakk">
                                    <option value="all"/> SEMUA
                                    <option value="bln"/> PER BULAN DAFTAR
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id='cetak_ketadm'>
                            <label class="control-label col-md-2">Pilih Bulan</label>
                            <div class="col-md-10">
                                <select class="select-results-color" name="bulandaftx">
                                    <option value="01,JANUARI"/> JANUARI
                                    <option value="02,FEBRUARI"/> FEBRUARI
                                    <option value="03,MARET"/> MARET
                                    <option value="04,APRIL"/> APRIL
                                    <option value="05,MEI"/> MEI
                                    <option value="06,JUNI"/> JUNI
                                    <option value="07,JULI"/> JULI
                                    <option value="08,AGUSTUS"/> AGUSTUS
                                    <option value="09,SEPTEMBER"/> SEPTEMBER
                                    <option value="10,OKTOBER"/> OKTOBER
                                    <option value="11,NOVEMBER"/> NOVEMBER
                                    <option value="12,DESEMBER"/> DESEMBER
                                </select>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                PRINT 
                                <i class="icon-arrow-right14 position-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" charset="utf-16">
    function process() {
        $("#cetak_ketadm").hide();
    }

    function dcetakk() {
        var x = document.getElementById("zdcetakk").value;
        if ( x ==  "bln" ) {
            $("#cetak_ketadm").show();
        } else if ( x == "all" ) {
            $("#cetak_ketadm").hide();
        }
    }
</script>