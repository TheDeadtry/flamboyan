    <style type="text/css">
        #loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          margin:0 auto;
        }    
 
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
    </style>
<!--
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4>
                    
                    <span class="text-semibold">PERSONAL BLK</span>
                </h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-display4 text-primary"></i> <span>PERSONAL BLK</span></a>
                </div>
            </div>
        </div>
        
    </div>-->
    <div class="page-container">

        <div class="page-content">

            <div class="content-wrapper">

                <div class="panel" id="customdewa">
                    <div class="panel-heading bg-primary-700">
                        <h5 class="panel-title"> 

                            <button type="button" class="btn btn-warning btn-sm" id="tambah_personal_btn">TAMBAH PERSONAL BLK</button>
                            <div class="btn-group btn-group-animated">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" id="sektor_dipilih_btn">
                                    Pilih Sektor<?php echo $pilsektor; ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="sektor_dipilih_dropdown">
                                    <li>
                                        <a value="">
                                        <i class="icon-spinner9"></i> TAMPIL SEMUA</a>
                                    </li>
                                     <?php
                                    //get data sektor
                                    $getSektor = $this->db->query("SELECT kode_jenis kode, isi text, IF(jeniskelamin = '女 Perempuan','icon-woman','icon-man') gen FROM datasektor ORDER BY kode_jenis ASC")->result();
                                    ?>
                                    <?php foreach($getSektor as $sektor) :?>
                                        <li>
                                            <a value="<?= $sektor->kode ?>">
                                            <i class="<?= $sektor->gen ?>"></i> <?= $sektor->text ?> (<?= $sektor->kode ?>)</a>
                                        </li>
                                    <?php endforeach; ?>
                                    <!-- <li>
                                        <a value="FF">
                                        <i class="icon-woman"></i> TAIWAN - Female Formal</a>
                                    </li>
                                    <li>
                                        <a value="MI">
                                        <i class="icon-man"></i> TAIWAN - Male Informal</a>
                                    </li>
                                    <li>
                                        <a value="FI">
                                        <i class="icon-user"></i> TAIWAN - Female Informal</a>
                                    </li>
                                    <li>
                                        <a value="MC">
                                        <i class="icon-user"></i> TAIWAN - MC</a>
                                    </li>
                                    <li>
                                        <a value="MH">
                                        <i class="icon-user"></i> TAIWAN - MH</a>
                                    </li>
                                    <li>
                                        <a value="FH">
                                        <i class="icon-user"></i> TAIWAN - FH</a>
                                    </li>
                                    <li>
                                        <a value="IM">
                                        <i class="icon-user"></i> Malaysia - IM</a>
                                    </li>
                                    <li>
                                        <a value="JP">
                                        <i class="icon-height"></i> TAIWAN - Panti Jompo</a>
                                    </li>
                                    <li>
                                        <a value="HK">
                                        <i class="icon-users4"></i> HONGKONG</a>
                                    </li>
                                    <li>
                                        <a value="S">
                                        <i class="icon-users4"></i> SINGAPORE</a>
                                    </li>
                                    <li>
                                        <a value="TS">
                                        <i class="icon-users4"></i> TS</a>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="btn-group btn-group-animated">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" id="status_terbang_btn">
                                    STATUS TERBANG DIPILIH <?php echo $pilterbang; ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="status_terbang_dropdown">
                                    <li>
                                        <a value="">
                                            TAMPIL SEMUA
                                        </a>
                                    </li>
                                    <li>
                                        <a value="SUDAH TERBANG">
                                            SUDAH TERBANG
                                        </a>
                                    </li>
                                    <li>
                                        <a value="BELUM TERBANG">
                                            BELUM TERBANG
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group btn-group-animated">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" id="status_ujk_btn">
                                    STATUS UJK DIPILIH <?php echo $pilujk; ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="status_ujk_dropdown">
                                    <li>
                                        <a value="">
                                            TAMPIL SEMUA
                                        </a>
                                    </li>
                                    <li>
                                        <a value="SUDAH UJK">
                                            SUDAH UJK
                                        </a>
                                    </li>
                                    <li>
                                        <a value="BELUM UJK">
                                            BELUM UJK
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </h5>

                        <div class="heading-elements">
                            <h3><b>PERSONAL BLK</b></h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID BIODATA</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>POSISI TKI</th>
                                    <th>TGL DAFTAR</th>
                                    <th>JK</th>
                                    <th>PEMILIK</th>
                                    <th>SPONSOR</th>
                                    <th>STAT TERBANG</th>
                                    <th>STAT UJK</th>
                                    <th>DETAIL</th>
                                    <th class="text-center">Actions</th>
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

                <div class="modal fade" id="hapus" tabindex="-2" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal" method="post" action="" id="form_hapus">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">HAPUS DATA PERSONAL</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="hapus_idzz" class="form-control" name="id_personalblk" value="">
                                    <p>Apakah anda yakin akan menghapus data ini? </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="delete_get()" name="submit">Hapus</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="modal_form_vertical" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">TAMBAH DATA PERSONAL</h5>
                            </div>

                            <form method="post" class="add_form_simpan_data" />
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="display-block">NAMA PERSONAL TKI</label>
                                        <select class="select-menu-color"  id="tambahpersonalblk" onchange="tpersonalblk(this.value)" name="pilihpersonal">
                                            <option value="new11">TKI BARU (tidak ada di admin)</option>
                                                <?php  
                                                    foreach ($personaltki as $pilihan) 
                                                    { 
                                                ?>
                                                        <option value="<?php echo $pilihan->id_biodata;?>"/><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                <?php
                                                    } 
                                                ?> 
                                        </select>
                                    </div>

                                    <div id="tki_adm">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Nama Pemilik TKI</label>
                                                     <select class="select-results-color jsess_nama" id="pemilik" name="pemilik2" required="required">
                                                        <?php  
                                                        foreach ($tampil_data_pemilik_tki as $pilihan) 
                                                        { 
                                                            $sell = '';
                                                            if ($pilihan->id_pemilik == 3) {
                                                                $sell = 'selected="selected"';
                                                            }
                                                        ?>
                                                        <option value="<?php echo $pilihan->id_pemilik;?>" <?php echo $sell ?>/><?php echo $pilihan->isi; echo " ".$pilihan->negara;?>
                                                       <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <label >BAHASA</label>
                                                    <select class="select-results-color" name="bahasa2" required="required">
                                                        <option value=""></option>
                                                        <?php  
                                                            foreach ($tampil_data_bahasa_tki as $pilihan) 
                                                            {
                                                                $sel56 = '';
                                                                if ($pilihan->isi == 'MANDARIN') 
                                                                {
                                                                    $sel56 = 'selected="selected"';
                                                                }
                                                        ?>
                                                                    <option value="<?php echo $pilihan->isi;?>" <?php echo $sel56 ?>/><?php echo $pilihan->isi;?>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </select>
                                                </div><!--
                                                <div class="col-sm-4">
                                                    <label>EKS/NON</label>
                                                    <select class="select-results-color" name="eksnon2">
                                                        <option value=""></option>
                                                        <?php  foreach ($tampil_data_eksnon_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                       <?php } ?>
                                                    </select>
                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Cluster</label>
                                                     <select class="select-results-color idtki_adm2" name="cluster2">
                                                        <option value=""></option>

                                                        <?php  
                                                        foreach ($tampil_data_cluster_tki as $pilihan) {
                                                            /*$selxx = '';
                                                            //if ($)
                                                            if ($pilihan->isi == "Perawatan Lanjut Usia") {
                                                                $selxx = 'selected="selected"';
                                                            }*/
                                                        ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                       <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>

                                    <div id="tki_baru">  
                                        <input type="hidden" class="form-control" id="ed1" name="id_personalblk" value="">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" value="" placeholder="EX: Budi" id="ed2" class="form-control" required="required">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Nama Pemilik TKI</label>
                                                    <select class="select-results-color ed3" id="pemilikxx" name="pemilik">
                                                        <option value=""></option>
                                                        <?php  foreach ($tampil_data_pemilik_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " ".$pilihan->negara;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>PL (SPONSOR)</label><!--
                                                    <input type="text" id="ed4" name="sponsor" value="" placeholder="EX: Ani" class="form-control">-->
                                                    <select class="select-results-color" name="sponsor" id="">
                                                        <option value=""></option>
                                                        <?php  foreach ($tampil_data_sponsor as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->kode_sponsor;?>" /><?php echo $pilihan->kode_sponsor." - ".$pilihan->nama;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>ID DIPNAKER</label>
                                                    <input type="text" id="ed5" name="nodisnaker" value="" placeholder="EX: 12345" class="form-control">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>NO DAFTAR TKI</label>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <select id="sektor_non_taiwan" name="notki_sektor" class="form-control" required="required">
                                                                <?php 
                                                                    foreach ($tampil_sektor_nt as $row) {
                                                                ?>
                                                                        <option value="<?php echo $row->kode_sektor ?>"><?php echo $row->kode_sektor ?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" id="id_non_taiwan" name="notki" value="" placeholder="EX: 0001 (NO ID TIDAK BOLEH SAMA)" class="form-control number" maxlength="4" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>TEMPAT LAHIR</label>
                                                    <input type="text" id="ed7" name="tempatlahir" value="" placeholder="EX: Lamongan" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>TANGGAL LAHIR</label>
                                                    <input type="text" id="ed8" name="tanggalnyas" value="" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>JENIS KELAMIN</label>
                                                     <select class="select-results-color ed9"  id="jeniskelamin" name="jeniskelamin" id="">
                                                        <option value=""></option>
                                                        <?php  foreach ($tampil_data_jk_tki as $pilihan) { ?>
                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>ALAMAT</label>
                                                    <input type="text" id="ed10" name="alamat"  value="" placeholder="EX: Jalan Flamboyan" class="form-control">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>NO TELP</label>
                                                    <input type="text" name="notelp" id="ed11"  value="" placeholder="EX: 0811111" class="form-control">
                                                </div>
                                                 <div class="col-sm-4">
                                                    <label>PENDIDIKAN</label>
                                                    <input type="text" name="pendidikan" id="ed12"  value="" placeholder="EX: SMA" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>NO KTP</label>
                                                    <input type="text" name="noktp" id="ed13"  value="" placeholder="EX: 0032123" class="form-control">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>TUJUAN NEGARA</label>
                                                     <select class="select-results-color ed14x" name="negara">
                                                        <option  value=""></option>
                                                        <?php  foreach ($tampil_data_negara_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                 <div class="col-sm-4 ">
                                                    <label >BAHASA</label>
                                                    <select id="" class="select-results-color ed15" name="bahasa">
                                                        <option  value=""></option>
                                                        <?php  foreach ($tampil_data_bahasa_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>EKS/NON</label>
                                                    <select class="select-results-color ed16" name="eksnon" id="">
                                                        <option  value=""></option>
                                                        <?php  foreach ($tampil_data_eksnon_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Cluster</label>
                                                     <select class="select-results-color ed17" name="cluster" id="">
                                                        <option  value=""></option>
                                                        <?php  foreach ($tampil_data_cluster_tki as $pilihan) { ?>
                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>NO PASPOR</label>
                                                    <input type="text" id="ed18"  value="" name="nopaspor" placeholder="EX: 111232" class="form-control">
                                                </div>

                                               <!--  <div class="col-sm-6">
                                                    <label>INPUT FOTO</label>
                                                    <input type="file" name="foto" class="file-styled">
                                                </div> -->
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Tgl MED AWAL</label>
                                                    <input type="text" id="ed19" name="tglmed" value="" placeholder="EX: YYYY-MM-DD" class="form-control">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Tgl MED FULL</label>
                                                    <input type="text" id="ed20" name="tglmedfull" value="" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Tgl SIDIK JARI</label>
                                                    <input type="text" id="ed21" name="tgljari" value="" placeholder="EX:YYYY-MM-DD" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary add_form_simpan_btn">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <script type="text/javascript" charset="utf-16">
        function process() {
            $("#tki_adm").hide();
            $("#tki_baru").show();
        }

        window.DeletePersonal = function(e){
            let link = e.dataset.href;
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                // Perform the delete operation
                location.href = link;
                } else {
                swal("Cancelled", "Your item is safe!", "info");
                }
            });
        }

        function tpersonalblk(tov) {
            var x = document.getElementById("tambahpersonalblk").value;
            if ( x ==  "new11" ) {
                $("#tki_adm").hide();
                $("#tki_baru").show();
            } else {
                var skie = tov.substr(0, 2);
                var $ex4 = $('.idtki_adm2');
                if (skie == 'FI') {
                    $ex4.val("Perawatan Lanjut Usia").trigger("change");
                } else {
                    $ex4.val("").trigger("change");
                }
                $("#tki_adm").show();
                $("#tki_baru").hide();
            }
        }
/*
        function edit666(id) {
            $.ajax({
                url: '<?php echo site_url('blk_personal/edit_show') ?>',
                type: 'POST',
                dataType: 'json',
                data: 'id='+id,
                encode:true,
                success:function (data) {
                    $('#ed1').val(data.id_personalblk);
                    $('#ed2').val(data.namanya);

                    //$('#ed3').val(data.pemilik);
                    //$('#ed3').text(data.pemilikx+' '+data.negarapemilikx);

                    $('#ed5').val(data.nodisnaker);
                    $('#ed6').val(data.nodaftar);
                    $('#ed7').val(data.tempatlahir);
                    $('#ed8').val(data.tanggallahir);
                    $('#ed10').val(data.alamat);
                    $('#ed11').val(data.notelp);
                    $('#ed12').val(data.pendidikan);
                    $('#ed13').val(data.noktp);

                    $('#ed18').val(data.nopaspor);
                    $('#ed19').val(data.tglmedawal);
                    $('#ed20').val(data.tglmedfull);
                    $('#ed21').val(data.tglsidikjari);

                    var $ex3    = $(".ed3");
                    var $ex9    = $('.ed9');
                    var $ex14   = $('.ed14x');
                    var $ex15   = $('.ed15');
                    var $ex16   = $('.ed16');
                    var $ex17   = $('.ed17');
                    var $ex4    = $('.ed4');

                    $ex3.val(data.pemilik).trigger("change");
                    $ex9.val(data.jeniskelamin).trigger("change");
                    $ex14.val(data.negara).trigger("change");
                    $ex15.val(data.bahasa).trigger("change");
                    $ex16.val(data.eksnon).trigger("change");
                    $ex17.val(data.cluster).trigger("change");
                    $ex4.val(data.sponsor).trigger("change");
                }
            })
        }

        function edit_process666() {
            $.ajax({
                url: '<?php echo site_url('blk_personal/edit_process') ?>',
                type: 'POST',
                dataType: 'json',
                data: $('#form_edit').serialize(),
                encode:true,
                success:function (data) {
                    //if(!data.success) {
                        //alert(data.message);
                    //} else {
                        //alert(data.message);
                        setTimeout(function () {
                            $(function () {
                                $('#form_edit').modal('toggle');
                                tablez.ajax.reload();
                            });
                            window.location.reload();
                        }, 400);
                    //}
                }
            })
        }

        function delete_bef(idmm) {
            //document.getElementById('hapus_idzz').value = data.idmm;
            //alert(idmm);
            $('#hapus_idzz').val(idmm);
        }

        function delete_get() {
            //alert('ddd');
            
            $.ajax({
                url: '<?php echo site_url('blk_personal/hapus') ?>',
                type: 'POST',
                dataType: 'json',
                data: $('#form_hapus').serialize(),
                encode:true,
                success:function (data) {
                    //if(!data.success) {
                        //alert(data.message);
                    //} else {
                        //alert(data.message);
                        setTimeout(function () {
                            $(function () {
                                $('#form_edit').modal('toggle');
                                tablez.ajax.reload();
                            });
                            window.location.reload();
                        }, 400);
                    //}
                }
            })
        }*/
        <?php
            $pilsektor 	= $this->session->userdata('blkpersonal_pilsektor');
            $pilterbang = $this->session->userdata('blkpersonal_pilstatterbang');
            $pilujk 	= $this->session->userdata('blkpersonal_pilstatujk');
        ?>
        var tablez = $('#example').dataTable({
            scrollY: "400px",
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                "url"       : "<?php echo site_url('blk_personal/show_data') ?>",
                "type"      : "POST",
                "data" : {
                    "pilsektor" : "<?= $pilsektor  ?>",
                    "pilterbang" : "<?= $pilterbang  ?>",
                    "pilujk" : "<?= $pilujk  ?>",
                }
            },
            columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: 1
                },
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: 2
                },
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: 3
                }
            ],
            "bautoWidth": true,
            oLanguage: {sProcessing: "<div id='loader'></div>"}
        });

        $('input.number').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "");
            });
        });

        $('#tambah_personal_btn').click(function() {
            $('#modal_form_vertical').find("select[name=pilihpersonal]").val("new11").change();
            $('#modal_form_vertical').find("select[name=pemilik2]").val("").change();
            $('#modal_form_vertical').find("select[name=bahasa2]").val("").change();
            $('#modal_form_vertical').find("select[name=cluster2]").val("").change();
            $('#modal_form_vertical').find("input[name=nama]").val("");
            $('#modal_form_vertical').find("select[name=pemilik]").val("").change();
            $('#modal_form_vertical').find("select[name=sponsor]").val("").change();
            $('#modal_form_vertical').find("input[name=nodisnaker]").val("");
            $('#modal_form_vertical').find("select[name=notki_sektor]").val("").change();
            $('#modal_form_vertical').find("input[name=notki]").val("");
            $('#modal_form_vertical').find("input[name=tempatlahir]").val("");
            $('#modal_form_vertical').find("input[name=tanggalnyas]").val("");
            $('#modal_form_vertical').find("select[name=jeniskelamin]").val("").change();
            $('#modal_form_vertical').find("input[name=alamat]").val("");
            $('#modal_form_vertical').find("input[name=notelp]").val("");
            $('#modal_form_vertical').find("input[name=pendidikan]").val("");
            $('#modal_form_vertical').find("input[name=noktp]").val("");
            $('#modal_form_vertical').find("select[name=negara]").val("").change();
            $('#modal_form_vertical').find("select[name=bahasa]").val("").change();
            $('#modal_form_vertical').find("select[name=eksnon]").val("").change();
            $('#modal_form_vertical').find("select[name=cluster]").val("").change();
            $('#modal_form_vertical').find("input[name=nopaspor]").val("");
            $('#modal_form_vertical').find("input[name=tglmed]").val("");
            $('#modal_form_vertical').find("input[name=tglmedfull]").val("");
            $('#modal_form_vertical').find("input[name=tgljari]").val("");

            $('#modal_form_vertical').modal('show');
            $('#modal_form_vertical').find("select[name=pilihpersonal]").select2({
                dropdownParent: $("#modal_form_vertical")
            });
              var selectFields = ['pemilik2', 'bahasa2', 'cluster2', 'pemilik', 'sponsor', 'notki_sektor', 'jeniskelamin', 'negara', 'bahasa', 'eksnon', 'cluster'];
            
              $.each(selectFields, function(index, field) {
                  $('#modal_form_vertical').find("select[name=" + field + "]").select2({
                      dropdownParent: $("#modal_form_vertical")
                  });
              });
          });

        $('.add_form_simpan_btn').click(function() {
            $.ajax({
                url: '<?php echo site_url('blk_personal/simpan_data_blk_personal');?>',
                type: 'POST',
                dataType: 'json',
                data: $('.add_form_simpan_data').serialize(),
                encode:true,
                success:function (data) 
                {
                    if(!data.success) 
                    {
                        swal({
                            title: "Oops...",
                            text: (data.message)+" !",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    } 
                    else 
                    {
                        $('#modal_form_vertical').modal('toggle');
                        swal({
                            title: "Sukses !",
                            text: (data.message),
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        $('#example').DataTable().ajax.reload();
                    }
                }
            })
        });

        $('#sektor_dipilih_dropdown li a').click(function() {
            var setpilih = $(this).attr('value');

            $('#tambah_personal_btn').attr('disabled', 'disabled');
            $('#sektor_dipilih_btn').attr('disabled', 'disabled');
            $('#status_terbang_btn').attr('disabled', 'disabled');
            $('#status_ujk_btn').attr('disabled', 'disabled');

            var block = $('#customdewa');
            $(block).block({ 
                message: '<i class="icon-spinner2 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait',
                    'box-shadow': '0 0 0 1px #ddd'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });

            let loc = '<?php echo site_url('blk_personal/setsektor') ?>/'+setpilih

            location.href=loc;

        });

        $('#status_terbang_dropdown li a').click(function() {
            var setpilih = $(this).attr('value');

            $('#tambah_personal_btn').attr('disabled', 'disabled');
            $('#sektor_dipilih_btn').attr('disabled', 'disabled');
            $('#status_terbang_btn').attr('disabled', 'disabled');
            $('#status_ujk_btn').attr('disabled', 'disabled');

            var block = $('#customdewa');
            $(block).block({ 
                message: '<i class="icon-spinner2 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait',
                    'box-shadow': '0 0 0 1px #ddd'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });

            let loc = "<?php echo site_url('blk_personal/setstatterbang') ?>/"+setpilih;

            location.href = loc;

        });

        $('#status_ujk_dropdown li a').click(function() {
            var setpilih = $(this).attr('value');

            $('#tambah_personal_btn').attr('disabled', 'disabled');
            $('#sektor_dipilih_btn').attr('disabled', 'disabled');
            $('#status_terbang_btn').attr('disabled', 'disabled');
            $('#status_ujk_btn').attr('disabled', 'disabled');

            var block = $('#customdewa');
            $(block).block({ 
                message: '<i class="icon-spinner2 spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait',
                    'box-shadow': '0 0 0 1px #ddd'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });

            let loc = "<?php echo site_url('blk_personal/setstatujk') ?>/"+setpilih;

            location.href = loc;

        });

    </script>


