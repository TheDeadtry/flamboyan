<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Usaha </span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Data Usaha </li>
                </ul>
            </div>
        </div>
    </div>
</div>  
<div class='row-fluid'>
    <div class='span12'>
        <a class='btn btn-info btn-large' href="#" id="tambahUsaha">Tambah Jenis Usaha</a>
        <a class='btn btn-info btn-large' href="#" id="tambahPekerjaan">Tambah Pekerjaan</a>
    </div>  
</div> 
</br>

<div class="row-fluid">
    <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
            <div class='title'>Kategori Jenis Pekerjaan</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content box-no-padding'>
            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <div style="padding: 10px;">
                    <input type="text" id="search">
                        <div id="test">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row-fluid">
    <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
            <div class='title'>Kategori Jenis Usaha</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
        <div class='box-content box-no-padding'>
            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <div style="padding: 10px;">
                    <input type="text" id="searchDua">
                        <div id="testkeDua">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
            <label>Kategori</label>
            <select id="kategoriPekerjaan">
                <?php foreach($datapekerjaan as $key => $datapekerjaansaya ) : ?>
                    <option value="<?= $datapekerjaansaya->id_kategori; ?>"><?= $datapekerjaansaya->isi; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" id="idPekerjaan" value="">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" id="isiPekerjaan" name="isiPekerjaan" value="">
        </div>
        <div class="form-group">
            <label>Mandarin</label>
            <input type="text" class="form-control" id="mandarinPekerjaan" name="mandarinPekerjaan" value="">
        </div>
      </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="ubahdata()">Ubah</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modaldua" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
            <input type="hidden" name="id" id="idKategori" value="">
            <label>Usaha</label>
            <input type="text" class="form-control" id="isiKategori" name="isiPekerjaan" value="">
        </div>
        <div class="form-group">
            <label>Usaha (bahasa Mandarin)</label>
            <input type="text" class="form-control" id="kategoriMandarin"  value="">
        </div>
      </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="ubahdatadua()">Ubah</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalUsaha" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" id="TPekerjaan" name="TPekerjaan">
        </div>
        <div class="form-group">
            <label>Mandarin</label>
            <input type="text" class="form-control" id="TMandarinPekerjaan" name="TMandarinPekerjaan">
        </div>
      </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="tambahkanUsahasaya()">save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalPekerjaan" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
            <label>Kategori</label>
            <select id="TkategoriPekerjaan">
                <?php foreach($datapekerjaan as $key => $datapekerjaansaya ) : ?>
                    <option value="<?= $datapekerjaansaya->id_kategori; ?>"><?= $datapekerjaansaya->isi; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" id="TPekerjaanSaya" name="TPekerjaan">
        </div>
        <div class="form-group">
            <label>Pekerjaan ( Dalam Mandarin )</label>
            <input type="text" class="form-control" id="TPekerjaanMandarinSaya" name="TPekerjaan">
        </div>
      </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="tambahkanPekerjaansaya()">save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>



                    
<script type="text/javascript">
    $(document).ready(function(){
        var search = $("#search").val();
        if(search == ''){
        ambil_data_all();
        ambil_data_all_dua();
        }else{
            
        }
    });


    function deletedata(nilaiId){
        var konfirmasi = confirm("Silakan Klik Tombol Salah Satu Tombol");
            if(konfirmasi === true) {
                deldata(nilaiId);
            }else{
                
            }
    }

    function deldata(nilaiId){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/hapusdatasaya/'; ?>",
            method: "POST",
            dataType: "text",
            data: {
                key: "hapusdata",
                id: nilaiId
            },success:function(response){
                alert(response);
                location.reload();
            }
        });   
    }

    function deletedatadua(nilaiId){
        var konfirmasi = confirm("Silakan Klik Tombol Salah Satu Tombol");
            if(konfirmasi === true) {
                deldatadua(nilaiId);
            }else{
                
            }   
    }

    function deldatadua(nilaiId){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/hapusdatasayadua/'; ?>",
            method: "POST",
            dataType: "text",
            data: {
                key: "hapusdata",
                id: nilaiId
            },success:function(response){
                alert(response);
                location.reload();
            }
        });
    }

    $("#tambahUsaha").click(function(){
        $("#modalUsaha").modal('show');
    });

    $("#tambahPekerjaan").click(function(){
        $("#modalPekerjaan").modal('show');
    });

    function tambahkanPekerjaansaya(){
        var a = $("#TkategoriPekerjaan").val();
        var b = $("#TPekerjaanSaya").val();
        var c = $("#TPekerjaanMandarinSaya").val();
        $.ajax({
            url: "<?= site_url().'/pekerjaana/tambahkanPekerjaan/'; ?>", 
            method: "POST",
            dataType: "text",
            data: {
                key: "tambahkan",
                dataa: a,
                datab: b,
                datac: c
            },success:function(response){
                alert(response);
                location.reload();
            }
        });
    }    

    function tambahkanUsahasaya(){
        var a = $("#TPekerjaan").val();
        var b = $("#TMandarinPekerjaan").val();
        $.ajax({
            url: "<?= site_url().'/pekerjaana/tambahkanUsaha/'; ?>", 
            method: "POST",
            dataType: "text",
            data: {
                key: "tambahkan",
                dataa: a,
                datab: b
            },success:function(response){
                alert(response);
                location.reload();
            }
        });
    }

    function ambil_data_all(){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/data_all/'; ?>"+"1/1/",
            method: "GET",
            dataType: "text",
            data: {
                key: "keya"
            },success:function(response){
                $("#test").html(response);
            }
        });
    }

    function ambil_data_all_dua(){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/data_all_2/'; ?>"+"1/1/",
            method: "GET",
            dataType: "text",
            data: {
                key: "oppa"
            },success:function(response){
                $("#testkeDua").html(response);
            }
        });
    }

    $('#search').keyup(function(){
        var a = $("#search").val();
        if (a!="") {
        var b = a.replace(/ /g, "_");
        $.ajax({
            url: "<?= site_url().'/pekerjaana/test/'; ?>"+b+"/1/1/",
            method: "GET",
            dataType: "text",
            success:function(response){
                $("#test").html(response);
            }
        });

        }else{
        var b = "all";
        $.ajax({
            url: "<?= site_url().'/pekerjaana/data_all/'; ?>"+"1/1/",
            method: "GET",
            dataType: "text",
            data: {
                key: "keya"
            },success:function(response){
                $("#test").html(response);
            }
        });
        };



    });

    $('#searchDua').keyup(function(){
        var a = $("#searchDua").val();
        if (a!="") {
        var b = a.replace(/ /g, "_");
        $.ajax({
            url: "<?= site_url().'/pekerjaana/test2/'; ?>"+b+"/1/1/",
            method: "GET",
            dataType: "text",
            success:function(response){
                $("#testkeDua").html(response);
            }
        });
    }else{
        $.ajax({
            url: "<?= site_url().'/pekerjaana/data_all_2/'; ?>"+"1/1/",
            method: "GET",
            dataType: "text",
            data: {
                key: "oppa"
            },success:function(response){
                $("#testkeDua").html(response);
            }
        });
    }

    });

    function terimadata(search, limit, news){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/test/'; ?>"+search+"/"+limit+"/"+news+"/",
            method: "GET",
            dataType: "text",
            data: {
                key: "draw"
            },success:function(response){
                $("#test").html(response);
            }
        });
    }

    function terimadataAll(limit, news){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/data_all/'; ?>"+limit+"/"+news+"/",
            method: "GET",
            dataType: "text",
            data: {
                key: "drawer"
            },success:function(response){
                $("#test").html(response);
            }
        });
    }

    function terimadataAllDua(limit, news){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/data_all_2/'; ?>"+limit+"/"+news+"/",
            method: "GET",
            dataType: "text",
            data: {
                key: "drawer"
            },success:function(response){
                $("#testkeDua").html(response);
            }
        });
    }

    function terimadatadua(search, limit, news){
        $.ajax({
            url: "<?= site_url().'/pekerjaana/test2/'; ?>"+search+"/"+limit+"/"+news+"/",
            method: "GET",
            dataType: "text",
            data: {
                key: "draw"
            },success:function(response){
                $("#testkeDua").html(response);
            }
        });
    }

    function edit(id, kategori, isi, mandarin){
        $("#myModal").modal("show");
        $("#kategoriPekerjaan").attr("value", kategori);
        $("#idPekerjaan").attr("value", id);
        $("#isiPekerjaan").attr("value", isi);
        $("#mandarinPekerjaan").attr("value", mandarin);
        
    }

    function editdua(id, isi, mandarin){
        $("#modaldua").modal("show");
        $("#idKategori").attr("value", id);
        $("#isiKategori").attr("value", isi);
        $("#kategoriMandarin").attr("value", mandarin);
        
    }

    function ubahdata(){
        var idPekerjaan = $("#idPekerjaan").val();
        var kategoriPekerjaan = $("#kategoriPekerjaan").val();
        var isiPekerjaan = $("#isiPekerjaan").val();
        var mandarinPekerjaan = $("#mandarinPekerjaan").val();
        $.ajax({
            url: "<?= site_url().'/pekerjaana/edit_data/'; ?>",
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'ubah',
                id: idPekerjaan,
                pekerjaan: isiPekerjaan,
                kategori: kategoriPekerjaan,
                mandarin: mandarinPekerjaan
            },success: function(response){
                alert(response);
                location.reload();
            }
        });
    }

    function ubahdatadua(){
        var idPekerjaan = $("#idKategori").val();
        var isiPekerjaan = $("#isiKategori").val();
        var mandarinPekerjaan = $("#kategoriMandarin").val();
        $.ajax({
            url: "<?= site_url().'/pekerjaana/edit_data_2/'; ?>",
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'ubah',
                id: idPekerjaan,
                pekerjaan: isiPekerjaan,
                mandarin: mandarinPekerjaan
            },success: function(response){
                alert(response);
                location.reload();
            }
        });
    }
</script>          

