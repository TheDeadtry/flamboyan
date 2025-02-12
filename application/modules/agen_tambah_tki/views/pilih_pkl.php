<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>gugus/select2/select2.min.css">
<style type="text/css">
.scroll{
  overflow-y: scroll;
}
.box-relative-10{
  height: 300px;
}

.sembunyikan{
  border-bottom: 1px solid #777;
}

.box-menu{
  position: relative;
  display: inline-block;
  width: 250px;
}

.icon{
  width: 50px;
  height: auto;
}

.margin-5
{
  margin: 5px;
}



.keluarkan{
  right: 0;
  position: absolute;
  display: block;
  width: 30px;
  padding: 3px;
  font-size: 16px;
  background: white;
  outline: none;
  box-shadow: -1 2 5px rgba(0,0,0,.2);
  z-index: 99;
}

.keluarkan:hover{
  background-color: red;
  color: white;
}

.relative{
  display: inline-block;
  position: relative;
  width: 250px;
  padding: 0;
  margin: 10px;
}

.modal{
  z-index: 99998;
}

#lepastki{
  z-index: 99999;
}

.select2-selection__choice{
  color: black;
}

.list-multiple
{
  position: relative;
  display: block;
  padding: 10px;
  width: 100%;
  height: 200px;
  background-color: #ddd;
  box-shadow: inset 0 0 15px #777;
  overflow-y: scroll;
}

.list-multiple label
{
  padding: 5px;
  margin-bottom: 10px;
  width: 100%;
  background: white;
  box-shadow: 0 2px 5px #777;
}


.list-multiple label:hover
{
  background-color: yellow;
}

input[type="checkbox"]
{
  position: relative;
  width: 60px;
  height: 30px;
  -webkit-appearance:none;
  background-color: #c6c6c6;
  outline: none;
  border-radius: 20px;
  box-shadow: isset 00 5px rgba(0,0,0,0.2);
}


input[type="checkbox"]:before
{
  content: "";
  position: absolute;
  width: 30px;
  height: 30px;
  border-radius: 20px;
  top: 0;
  left: 0;
  background-color: #fff;
  transform: scale(1.1);
  box-shadow:  0 2px 5px rgba(0,0,0,0.2);
  transform: 2s;
}

input:checked[type="checkbox"]
{
  background-color: #03a9f4;
}

input:checked[type="checkbox"]:before
{
  left: 30px;
}

.simpantkilist{
  display: none;
}




.pencarian
{
  width: 200px;
  padding: 5px;
  display: inline-block;
  border: 1px solid #777;
  outline: none;
  background-color: #fff;
}

.pencarian:hover
{
  border: 1px solid red;
  box-shadow: 0 0 10px #fff;
}

.margin-5{
  margin: 3px;
}


.full-menu
{
  position: absolute;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  display: none;
  z-index: 999;
  justify-content: center;
  align-items: center;
  transition: 3s;
}

.input-full{
  width: 250px;
  margin: 25px;
  display: block;
  padding: 10px;
  border-radius: 20px;
  text-align: center;
  box-shadow: 0 0 10px #777;
}

.box-menu
{
  width: auto;
  display: block;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  text-align: center;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.7);
}

.box-lg{
  width: 1000px;
}

.box-md{
  width: 800px;
}

.box-ls{
  width: 600px;
}

.box-shadow
{
  display: block;
  width: auto;
  height: auto;
  padding: 10px;
  margin: 0;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(255,255,255,0.5);
}

.button
{
  padding: 10px;
  margin: 5px;
  border-radius: 20px;
  display: inline-block;
}

.judul
{
  display: inline-block;
  width: 150px;
  padding-bottom: 10px;
  box-shadow: 0 2px 1px rgba(0,0,0,0.2);
  font-family: 'verdana';
}

.not-edit{
  background-color: red;
  color: white;
}

#ubahmajikannya
{
  z-index: 9999;
}

.list{
  display: block;
  width: auto;
  height: 200px;
  border: 1px solid #ddd;
  overflow-y: auto;
}

.list a{
  display: block;
  width: auto;
  padding: 10px;
  border: 1px solid #ddd;
}

.list a:hover
{
  background-color: #ddd;
}

table td, table th{
  position: relative;
  white-space: nowrap;
}

.modal-larges{
  width: 95%;
}


.edit-data{
  margin: 0;
  padding: 3px;
  width: 100%;
  outline: none;
  border: none;
  border-bottom: 1px solid rgba(0,0,0,0.2);

}

.edit-data:disabled
{
  background-color: transparent;
}


.edt
{
  display: block;
  font-family: "verdana";
  font-style: italic;
  color: red;
  width: 100%;
  text-align: center;
  margin: 0;
  padding: 0;
}


.edit-spc{
  background-color: #7eeeed;
  text-align: center;
}

.edit-spc > input{
  border: none;
  outline: none;
  background: none;
  min-width: 90%;
  padding: 10px;
  border-bottom: 1px dotted white;
  text-align: center;
}

.edit-spc > label{
  position: absolute;
  display: none;
  justify-content: center;
  align-items: center;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  background: orange;

}

.edit-spc:hover > label
{
  display: flex;
}


input[type="search"]
{
  padding: 3px;
  margin-bottom: 10px;
  outline: none;
  border-radius: 3px;
}

input
{
  padding: 3px;
  border: none;
  border-bottom: 1px solid #777;
}

</style>



<div class="page-container">
    <div class="page-content">
      <div class="content-wrapper">


        <div class="panel panel-info panel-bordered">
          <div class="panel-heading">
            <b><i><h3><?= $idagen.' '.$namamajikan; ?></h3></i></b>

          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6 text-left">
                <h5><b>INPUTKAN DATA KIRIM BIO</b></h5>
              </div>
              <div class="col-lg-6 text-left">
                <h5><b>TKI SUDAH DILEPAS</b></h5>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-left text-center">
                <button class="btn btn-primary btn-lg" onclick="showtambahtki()" type="button">Tambah TKI</button>
              </div>
              <div class="col-lg-6 text-center">
                <button class="btn btn-primary btn-lg" onclick="showtkidilepas()" type="button">Lihat Tki Dilepas</button>
              </div>
            </div>
          </div>

         </div>
      </form>


            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-info panel-bordered">
                  <div class="panel-heading">
                    <h4><i>Data Tki Kirim Bio Per Tanggal :</i></h4>
                    <div class="row">
                      <div class="col-lg-12 text-right">
                        <a href="<?= site_url(); ?>/print_kirim_bio_2/print_data/<?= $idagen; ?>" class="btn btn-default">print</a>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">

                    <table id="datatable1" class="table data1 table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Kirim Bio</th>
                          <th>Nama Group</th>
                          <th>#</th>
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


<!-- Modal -->

<div class="modal fade" id="kirim-bio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-larges" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Tki Kirim Bio</h4>
        <button class="btn btn-info" onclick="tambah1()">Tambah Tki</button>
      </div>
      <div class="modal-body">
        <div style="overflow-x: auto">
          <table class="table table-bordered data2">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">#</th>
                <th rowspan="2">ID - TKI</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Nama majikan / Nama Perusahaan</th>
                <th>tanggal pauliu</th>
                <th>tanggal interview</th>
                <th rowspan="2">#</th>
              </tr>
              <tr>

                <th class="edit-spc"><input class="datarow1" disabled type="text" placeholder="isi all"/></th>
                <th class="edit-spc"><input class="datarow2" disabled type="text" placeholder="isi all"/></th>

              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="lepastki" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Masukkan Tanggal Dilepas</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control input-tanggal" name="tgldilepas">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary simpan-tgldilepas">Save changes</button>
      </div>
    </div>
  </div>
</div>


<form action="<?= site_url(); ?>/agen_tambah_tki/simpan_data_ke_marka_biotoagen" method="POST">
  <div class="modal fade" id="tambahtkionebyone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">tambahkan Tki</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control pencarian-tki" placeholder="cari tki ...">
          </div>

          <ol class="list-multiple">

          </ol>

          <select class="simpantkilist" name="biodata[]" multiple="multiple">

          </select>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>



<div class="full-menu" id="tambahkantki">
  <div class="box-shadow">
    <div class="box-menu box-md">
      <span class="judul">Tambahkan TKI</span>
      <form method="POST" action="<?= site_url(); ?>/agen_tambah_tki/simpan_data_ke_marka_biotoagen">

              <div class="row">
                  <div class="col-lg-12 text-left">


                    <input type="hidden" name="idagen" value="<?= $idagen; ?>">

                      <input type="hidden" name="" value="">

                      <div class="form-group">
                        <label for="pailu">Tanggal Pauliu :</label>
                        <input type="" id="pailu" class="form-control input-tanggal" name="tgl_to_agen" placeholder="tahun.bulan.hari">
                      </div>

                      <div class="form-group">
                      <label for="bio">Tambahkan TKI :</label>
                      <select id="bio" class="js-example-basic-multiple daftartki" name="biodata[]" multiple="multiple">

                      </select>
                      </div>


                      <br><br>
                      <button type="submit" class="btn btn-success">Simpan</button>

                   </div>


                  </div>
              </div>

      </form>
    </div>
  </div>
</div>



<div class="full-menu" id="ubahdata">
  <div class="box-shadow">
    <div class="box-menu box-md">
      <span class="judul">UBAH DATA</span>
      <form action="<?= site_url(); ?>/agen_tambah_tki/updatedatakirimbio" method="POST">
        <input type="hidden" name="editmajikan">
        <input type="hidden" name="editnamaagen">
        <div class="form-group">
          <input type="text" class="form-control" name="edittoagen">
        </div>
        <div class="form-group">
          <input type="text" class="form-control input-tanggal" name="editpauliu" placeholder="Inputkan Tanggal Pauliu">
        </div>
        <div class="form-group">
          <input type="text" class="form-control input-tanggal" name="editinterview" placeholder="Inputkan Tanggal Interview">
        </div>
        <button type="submit" class="button">simpan</button>
      </form>
    </div>
  </div>
</div>


<div class="full-menu" id="ubahmajikannya">
  <div class="box-shadow">
    <div class="box-menu box-ls">
      <span class="judul">UBAH MAJIKAN</span>
      <div class="form-group">
          <input class="form-control cari-majikan" type="text" name="" placeholder="cari data ...">
          <div class="list" id="data-list">

          </div>
      </div>
    </div>
  </div>
</div>



<div class="full-menu" id="tampiltkidilepas">
  <div class="box-shadow">
    <div class="box-menu box-lg">
      <span class="judul">Data TKI DILEPAS</span>

        <div class="row">
          <div class="col-lg-12 text-left">
            <input type="text" id="pencariandilepas" name="pencarian" class="pencarian" target="datadilepas" placeholder="cari dengan id" autocomplete="off"><br>
          </div>
        </div>
        <br>
        <table id="example" class="display table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="text-center">
        <ul class="pagination pagination-lepas">

        </ul>
        </div>


    </div>
  </div>
</div>

<div class="modal fade" id="ubahmajikan2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambahkan Nama Perusahaan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="idbio" value="">
          <input type="hidden" name="tgltoagen" value="">
          <input type="hidden" name="kodeagen" value="">

          <div class="form-grup">
            <label> Nama Perusahan</label>
            <input type="text" class="form-control" name="nama_pabrik" value="" placeholder="nama perusahaan">
          </div>

          <div class="form-grup">
            <label> Nama mandarin </label>
            <input type="text" class="form-control" name="nama_mandarin" value="" placeholder="nama mandarin">
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary simpannamapabrik">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">LINK ke Halaman Majikan dan Maarketing Awal</h4>
      </div>
      <div class="modal-body">
            <button class="btn btn-succces goto" data-link='markawal' data-id="">Marketing awal</button>
            <button class="btn btn-succces goto" data-link='detailmajikan' data-id="">Majikan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="data-bio-kirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">edit tanggal kirim bio</h4>
      </div>
      <div class="modal-body">
        
        <div class="panel">
          <div class="modal-header">
            <h1>Edit Tanggal</h1>
          </div>
          <div class="modal-body">
            <table id="datatanggal" class="table">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th><input type="text" class="ubah-tgl-to-agen" name="" placeholder="edit all"></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>

          <div class="panel-footer text-right"> 
              <button class="btn btn-primary simpan-all-tgltoagen">simpan</button>
          </div>
      </div>
    </div>
  </div>
</div>






<script type="text/javascript" src="<?= base_url(); ?>gugus/select2/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>gugus/jquery_mask/jquery.inputmask.bundle.js"></script>

<script>


$(function($){

    $('<input type="search" class="cari-data" placeholder="cari datanya ...">').insertBefore($("#datatable1"));
    $('<ul class="pagination"></ul>').insertAfter($("#datatable1"));

    var idagen = "<?= $idagen; ?>";
    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/tampilkan_distik_markabio/"+idagen,
      method: "POST",
      dataType: "text",
      data: {
        key: "tabletglterbang"
      },success:function(response){
        var datasaya = JSON.parse(response);
        $(".data1 tbody").html(datasaya.data);
        $(".pagination").html(datasaya.pagination);
      }
    });
})


$(".ubah-tgl-to-agen").keyup(function(){


  var data = $(this).val();
  $('.edit-to-agen').val(data);
  $('.edit-to-agen').inputmask({"mask": "9999.99.99"});

})


$("body").click(function(e){
  var target = $(e.target);
  if (target.is(".simpan-all-tgltoagen")) {

    var dataId = [];
    var nilaiData = [];
    var dataAgen = [];

    $(".edit-to-agen").each(function(){
      dataId.push($(this).attr("data-bio"));
      nilaiData.push($(this).val());
      dataAgen.push($(this).attr("data-agen"));
    })

    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/ubahdatatanggaltoagen",
      method: "POST",
      dataType: "text",
      data: {
        id_biodata: dataId,
        tgl_to_agen: nilaiData,
        nama_agen: dataAgen
      },success:function(response){
        alert(response);



        $(function($){
          $(".cari-data").keyup(function(){
            var idagen = "<?= $idagen; ?>";
            $.ajax({
              url: "<?= site_url(); ?>/agen_tambah_tki/tampilkan_distik_markabio/"+idagen,
              method: "POST",
              dataType: "text",
              data: {
                key: "tabletglterbang",
                cari: $(this).val()
              },success:function(response){
                var datasaya = JSON.parse(response);
                $(".data1 tbody").html(datasaya.data);
                $(".pagination").html(datasaya.pagination);
              }
            });
          });
        });




        
      } 
    })
  }
})



$(function($){
  $(".cari-data").keyup(function(){
    var idagen = "<?= $idagen; ?>";
    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/tampilkan_distik_markabio/"+idagen,
      method: "POST",
      dataType: "text",
      data: {
        key: "tabletglterbang",
        cari: $(this).val()
      },success:function(response){
        var datasaya = JSON.parse(response);
        $(".data1 tbody").html(datasaya.data);
        $(".pagination").html(datasaya.pagination);
      }
    });
  });
});



$('body').click(function(e){
  var target = $(e.target);
  if (target.is('.ubahbio')) {

    var data = target.attr('data-agen');
    $(".simpan_all_tgltoagen").attr("data-agen", data);

    $("#data-bio-kirim").modal('show');
    $(".ubah-tgl-to-agen").inputmask({"mask": "9999.99.99"});


    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/ubahtgltoagen",
      method: "POST",
      dataType: "text",
      data: {
        data_agen : data
      },success:function(response){
        $("#datatanggal tbody").html(response);
      }
    });



  }
})





$('body').click(function(e){
  var target = $(e.target);
  if (target.is('.goto')) {

    var go = target.attr('data-link');
    var id = target.attr('data-id');

    location.href = "<?= site_url(); ?>/agen_tambah_tki/link/"+go+"/"+id;


  }
})



$('body').click(function(e){
  var target = $(e.target);
  if (target.is('.link')) {
    var dataBio = target.attr("data-bio")
    $("#link").modal('show');
    $(".goto").attr('data-id', dataBio);
  }
})


$('body').click(function(e){
  var idagen = "<?= $idagen; ?>";
  var target = $(e.target);
  if (target.is('.pagin')) {
    var text = target.text();
    var data = target.attr("data");
    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/tampilkan_distik_markabio/"+idagen,
      method: "POST",
      dataType: "text",
      data: {
        key: data,
        cari: $(this).val(),
        halaman: text
      },success:function(response){
        var datasaya = JSON.parse(response);
        $(".data1 tbody").html(datasaya.data);
        $(".pagination").html(datasaya.pagination);
      }
    });
  }

})

$("body").click(function(e){
  var target = $(e.target);
  if (target.is('.kirim-ke-majikan')) {
    var data_bio =target.attr('data-bio');
    var data_grup =target.attr('data-grup');
    var data_majikan =target.attr('data-majikan');
    var data_majikanman =target.attr('data-majikanman');
    var data_agen =target.attr('data-agen');

    alert(data_bio+' '+data_grup+' '+data_majikan+' '+data_majikanman+' '+data_agen);
    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/simpan_data_ke_majikan",
      method: "POST",
      dataType: "text",
      data: {
        id_biodata: data_bio,
        kode_group: data_grup,
        kode_agen: data_agen,
        kode_majikan: data_majikan,
        namataiwan: data_majikanman
      }, success:function(response){
        alert(response);
      }
    })

  }
});

    $('body').dblclick(function(e) {
        var target = $(e.target);
        if(target.is('.datainput1')) {
          target.removeAttr("disabled").focus().css({"background-color":"white", "border-radius": "3px", "box-shadow":"inset 0 0 5px rgba(0,0,0,0.5)"});
          target.inputmask({"mask": "9999.99.99"});
          var  id     = target.attr("data-id");
          var  toagen = target.attr("data-toagen");
          var  agen   = target.attr("data-agen");

          target.keypress(function(event){
              var keycode = (event.keyCode ? event.keyCode : event.which);
              if (keycode == '13') {
                target.prop("disabled","true").css({"background":"none", "border-radius":"none", "box-shadow":"none"});
                var isiData = target.val();

                $.ajax({
                  url: "<?= site_url(); ?>/agen_tambah_tki/update_data_marka_biotoagen",
                  method: "POST",
                  dataType: "text",
                  data: {
                    key: "pauliuone",
                    idBio : id,
                    datatoagen: toagen,
                    dataagen: agen,
                    tglpauliu: isiData
                  }, success:function(response){
                  }
                })

              }
          });
        }
    });

    $('body').dblclick(function(e) {
        var target = $(e.target);
        if(target.is('.datainput2')) {
          target.removeAttr("disabled").focus().css({"background-color":"white", "border-radius": "3px", "box-shadow":"inset 0 0 5px rgba(0,0,0,0.5)"});
          target.inputmask({"mask": "9999.99.99"});
          var  id     = target.attr("data-id");
          var  toagen = target.attr("data-toagen");
          var  agen   = target.attr("data-agen");

          target.keypress(function(event){
              var keycode = (event.keyCode ? event.keyCode : event.which);
              if (keycode == '13') {
                target.prop("disabled","true").css({"background":"none", "border-radius":"none", "box-shadow":"none"});
                var isiData = target.val();

                $.ajax({
                  url: "<?= site_url(); ?>/agen_tambah_tki/update_data_marka_biotoagen",
                  method: "POST",
                  dataType: "text",
                  data: {
                    key: "interviewone",
                    idBio : id,
                    datatoagen: toagen,
                    dataagen: agen,
                    tglpauliu: isiData
                  }, success:function(response){
                  }
                })

              }
          });
        }
    });

    $('body').dblclick(function(e) {
        var target = $(e.target);
        if(target.is('.datarow1')) {
          target.inputmask({"mask": "9999.99.99"});
          target.removeAttr("disabled").focus().css({"background-color":"white", "border-radius": "3px", "box-shadow":"inset 0 0 5px rgba(0,0,0,0.5)"});
          $(".datainput1").css({"background-color":"white", "border-radius": "3px", "box-shadow":"inset 0 0 5px rgba(0,0,0,0.5)"}).removeAttr("value");
          target.keyup(function(){
            $(".datainput1").val(target.val());
          });

          target.keypress(function(event){
              var keycode = (event.keyCode ? event.keyCode : event.which);
              if (keycode == '13') {
                target.prop("disabled","true").css({"background":"none", "border-radius":"none", "box-shadow":"none"});
                  $(".datainput1").prop("disabled","true").css({"background":"none", "border-radius":"none", "box-shadow":"none"});
                  var dataditrima = [];
                  var dataid = [];
                  var datatoagen = [];
                  var dataagen = [];
                  $(".datainput1").each(function(){
                    dataditrima.push($(this).val());
                    dataid.push($(this).attr('data-id'));
                    datatoagen.push($(this).attr('data-toagen'));
                    dataagen.push($(this).attr('data-agen'));
                  })



                  $.ajax({
                    url: "<?= site_url(); ?>/agen_tambah_tki/update_data_marka_biotoagen",
                    method: "POST",
                    dataType: "text",
                    data: {
                      key: "pauliu",
                      idBio : dataid,
                      datatoagen: datatoagen,
                      dataagen: dataagen,
                      tglpauliu: dataditrima
                    }, success:function(response){
                    }
                  })
              }
          });
        }
    });


    $('body').dblclick(function(e) {
        var target = $(e.target);
        if(target.is('.datarow2')) {
          target.inputmask({"mask": "9999.99.99"});
          target.removeAttr("disabled").focus().css({"background-color":"white", "border-radius": "3px", "box-shadow":"inset 0 0 5px rgba(0,0,0,0.5)"});
          $(".datainput2").css({"background-color":"white", "border-radius": "3px", "box-shadow":"inset 0 0 5px rgba(0,0,0,0.5)"}).removeAttr("value");
          target.keyup(function(){
            $(".datainput2").val(target.val());
          });

          target.keypress(function(event){
              var keycode = (event.keyCode ? event.keyCode : event.which);
              if (keycode == '13') {
                target.prop("disabled","true").css({"background":"none", "border-radius":"none", "box-shadow":"none"});
                  $(".datainput2").prop("disabled","true").css({"background":"none", "border-radius":"none", "box-shadow":"none"});
                  var dataditrima = [];
                  var dataid = [];
                  var datatoagen = [];
                  var dataagen = [];
                  $(".datainput2").each(function(){
                    dataditrima.push($(this).val());
                    dataid.push($(this).attr('data-id'));
                    datatoagen.push($(this).attr('data-toagen'));
                    dataagen.push($(this).attr('data-agen'));
                  })

                  $.ajax({
                    url: "<?= site_url(); ?>/agen_tambah_tki/update_data_marka_biotoagen",
                    method: "POST",
                    dataType: "text",
                    data: {
                      key: "interview",
                      idBio : dataid,
                      datatoagen: datatoagen,
                      dataagen: dataagen,
                      tglpauliu: dataditrima
                    }, success:function(response){
                    }
                  })
              }
          });
        }
    });

    function showtkidilepas(){
        $("#tampiltkidilepas").css({"display":"absolute", "display":"flex"});
    }



    function lepastki(key, tgl){
      $("#lepastki").modal("show");
      $(".simpan-tgldilepas").attr("onclick", "simpanTglDilepas('"+key+"','"+tgl+"')");
    }


    function ubahmajikannya( idbio, tgltoagen, kodeagen, search = ''){

        sessionStorage.setItem('idbio', idbio);
        sessionStorage.setItem('tgltoagen', tgltoagen);
        sessionStorage.setItem('kodeagen', kodeagen);


        var id_majikan = "<?= $idagen; ?>";

        if (idbio.substr(0,2) == 'MF' || idbio.substr(0,2) == 'FF' || idbio.substr(0,2) == 'JP' ) {
          $("#kirim-bio").modal("hide");
          $("#ubahmajikannya").css({"display":"absolute", "display":"flex"});
          $.ajax({
            url: "<?= site_url(); ?>/agen_tambah_tki/ambildatamajikan",
            method: "POST",
            dataType: "text",
            data: {
              idmajikan: id_majikan,
              pencarian: search,
              idbio: idbio,
              tgltoagen: tgltoagen,
              kodeagen: kodeagen
            },success:function(response){
              $("#data-list").html(response);
            }
          })
        }else {
          $("#ubahmajikan2").modal("show");

          $.ajax({
            url: "<?= site_url(); ?>/agen_tambah_tki/data_edit_tambah_majikan",
            method: "POST",
            dataType: "text",
            data: {
              idbio: idbio,
              tgltoagen: tgltoagen,
              kodeagen: kodeagen
            },success:function(response){
              var datajson = JSON.parse(response);
              $("input[name=nama_pabrik]").val(datajson.majikan);
              $("input[name=nama_mandarin]").val(datajson.mandarin);

            }
          })



          $("input[name=idbio]").val(idbio);
          $("input[name=tgltoagen]").val(tgltoagen);
          $("input[name=kodeagen]").val(kodeagen);
        }

    }


    function simpanmajikan(idbio, tgltoagen, majikanawal, majikanubah){
      var txt;
      var r = confirm("apakah anda ingin merubah majikan data majikan untuk tki ini ?");
      if (r == true) {
        $.ajax({
          url: "<?= site_url(); ?>/agen_tambah_tki/simpanmajikankebaru",
          method: "POST",
          dataType: "text",
          data: {
            idbio: idbio,
            tgltoagen: tgltoagen,
            majikanawal: majikanawal,
            majikanubah: majikanubah
          },success:function(response){
            alert(response);
            location.reload();
          }
        })
      } else {

      }
    }

    $(".cari-majikan").keyup(function(){
      var cari =  $(this).val();
      var id = sessionStorage.getItem('idbio');
      var toagen = sessionStorage.getItem('tgltoagen');
      var kodeagen = sessionStorage.getItem('kodeagen');
      ubahmajikannya( id, toagen, kodeagen, cari);
    })






    function showtambahtki(){
        $("#tambahkantki").css({"display":"absolute", "display":"flex"});

        $.ajax({
          url: "<?= site_url(); ?>/agen_tambah_tki/ambil_data_tki",
          success:function(response){
            $(".daftartki").html(response);
          }
        });
    }


    $('body').click(function(e) {
        var target = $(e.target);
        if(target.is('.full-menu')) {
          $(".full-menu").css({"display":"none"});
        }
    });


    $(document).ready(function() {
      panggildatadilepas();
      $(".input-tanggal").inputmask({"mask": "9999.99.99"});
      $('.js-example-basic-multiple').select2();
      $('.js-example-basic-single').select2();
    });

    function ubahdata(toagen, pauliu, inter, majikan, namaagen){
      $("#ubahdata").css({"display":"absolute", "display":"flex"});
      $("input[name=edittoagen]").val(toagen);
      $("input[name=editpauliu]").val(pauliu);
      $("input[name=editinterview]").val(inter);
      $("input[name=editmajikan]").val(majikan);
      $("input[name=editnamaagen]").val(namaagen);
    }


// modal show  untuk menampikan data tki sesuai dengan tanggal to agen___________________________

  function tampiltkikirimbio( data1, data2 , tgl){

    sessionStorage.setItem("limit", 10);
    sessionStorage.setItem("pencarian", "");
    var idagen = "<?= $idagen; ?>";
    $("#kirim-bio").modal("show");
    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/tampilkan_distik_markabio/"+idagen,
      method: "POST",
      dataType: "text",
      data: {
        key: "tampiltki",
        filter1: data1,
        filter2: data2,
        filter3: tgl
      },success:function(response){
        $(".data2 tbody").html(response);
        buatdataSesiini(data1);


        $(".edt").dblclick(function () {
          var data = $(this).attr("data");
          $("."+data).removeAttr("disabled").focus();
        })

      }
    });
  }



function buatdataSesiini(data1)
{
  var idagen = "<?= $idagen; ?>";
  $.ajax({
    url: "<?= site_url(); ?>/agen_tambah_tki/ambildatasesiini",
    method: "POST",
    dataType: "text",
    data: {
      idagen : idagen,
      tgl: data1
    }, success:function(success){
      jsonparse = JSON.parse(success);
      sessionStorage.setItem("namaagen", jsonparse.namaagen );
      sessionStorage.setItem("tgltoagen", jsonparse.tgltoagen );
      sessionStorage.setItem("tglpauliu", jsonparse.tglpauliu );
      sessionStorage.setItem("tglinter", jsonparse.tglinter );
    }
  })
}


// ----------------------------------




function tambah1()
  {

    $("#tambahtkionebyone").modal("show");

    $("<input type='hidden' name='idagen' value='"+sessionStorage.getItem("namaagen")+"'>").insertBefore(".list-multiple");
    $("<input type='hidden' name='tgl_to_agen' value='"+sessionStorage.getItem("tgltoagen")+"'>").insertBefore(".list-multiple");
    $("<input type='hidden' name='tgl_pauliu' value='"+sessionStorage.getItem("tglpauliu")+"'>").insertBefore(".list-multiple");
    $("<input type='hidden' name='tgl_inter' value='"+sessionStorage.getItem("tglinter")+"'>").insertBefore(".list-multiple");

    var start = Number(sessionStorage.getItem("limit"))-10;

    $.ajax({
      url: "<?= site_url(); ?>/agen_tambah_tki/ambil_data_tki",
      method: "POST",
      dataType: "text",
      data: {
        key: "tambah1",
        limit: sessionStorage.getItem("limit"),
        start: start,
        pencarian: sessionStorage.getItem("pencarian")
      },success:function(data){
        $('.list-multiple').html(data);
        ceckedData();
      }
    });
  }


jQuery(function($) {
    $('.list-multiple').on('scroll', function() {
          if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {

            var getLimit = sessionStorage.getItem("limit");
            var newLimit =  Number(getLimit)+10;
            sessionStorage.setItem("limit", newLimit);
            tambah1();

          }
        })
    });


  $('.pencarian-tki').keyup(function(){
     sessionStorage.setItem("pencarian", $(this).val());
     tambah1();
  })


// tambahkan optionnya
function ceckedData()
{
  $("input[name=cekdata]").change(function(){
    if ($(this).is(":checked")) {
      $(".simpantkilist").append("<option selected='selected' value='"+$(this).val()+"'>"+$(this).val()+"</option>");
    }else{
      $(".simpantkilist option[value='"+$(this).val()+"']").remove();
    }
  });
}


// functioin untuk menyimpan tanggal tki dilepas

  function simpanTglDilepas(idtki, tgl){
    var tanggalLepas = $("input[name=tgldilepas]").val();
    $.ajax({
      url : "<?= site_url(); ?>/agen_tambah_tki/simpantgldilepas",
      method:"POST",
      dataType: "text",
      data: {
        idtki: idtki,
        tgldilepas: tanggalLepas,
        tgl: tgl
      },success:function(simpan){
        alert(simpan);
        location.reload();
      }
    })
  }



// hapus dari daftar tki ..............................................

function hapustkidaridaftar(idtki, tgl, idmajikan){
    $.ajax({
      url : "<?= site_url(); ?>/agen_tambah_tki/hapustkidaridaftar",
      method:"POST",
      dataType: "text",
      data: {
        idtki: idtki,
        tgl: tgl
      },success:function(hapus){


        $('#kirim-bio').modal('hide');


        setTimeout(function(){
          tampiltkikirimbio("","",tgl);
        }, 500);

        panggildatatable()
      }
    })
  }


  function hapusalldatatoagen(key)
{
    var txt;
    var idmajikan = "<?= $idagen; ?>";
    var r = confirm("apakah anda yakin akan menghapus data ini ?");
    if (r == true) {

      $.ajax({
        url: "<?= site_url();  ?>/agen_tambah_tki/hapusdataalltoagen",
        method: "POST",
        dataType: "text",
        data: {
          tanggal: key,
          idmajikan: idmajikan
        },success:function(success){
          alert(success);
          panggildatatable();
        }
      });

    } else {

    }
}

function panggildatadilepas(pages = '')
{

  var render = sessionStorage.getItem("renderlepas");
  if (render == 'undefined') {
    render = "";
  }

  if (sessionStorage.getItem("pencariandilepas") == null)
  {
    sessionStorage.setItem("pencariandilepas", "");
  }


  var datamajikan = "<?= $idagen; ?>"
  $.ajax({
    url: "<?= site_url(); ?>/agen_tambah_tki/datatkidilepas",
    method: "POST",
    dataType: "text",
    data: {
      render : render,
      pages : pages,
      pencarian : sessionStorage.getItem("pencariandilepas"),
      idmajikan: datamajikan
    },success:function(response){


      dataNya =  JSON.parse(response);

      $("#example tbody").html(dataNya.tabel);

      var BanyakData = dataNya.banyakdata;

      var pembagihalaman = dataNya.render;

      var bagihalaman = Number(BanyakData)/pembagihalaman;

      var banyakhalaman = Math.ceil(bagihalaman);

      paginationdilepas(banyakhalaman);


        // $("#example tbody").html(jsondata.tabel);
        // sessionStorage.setItem("renderlepas", jsondata.render);
        // paginationdilepas(jsondata.banyak_data);
    }
  })
}


$("#pencariandilepas").keyup(function(){
  var dicari = $(this).val();
  sessionStorage.setItem("pencariandilepas", dicari);
  panggildatadilepas();
})



// tampilan data dilepas -____________________________________________________________________________________


function paginationdilepas(key){

  if (sessionStorage.getItem("dataslice") == null) {
    var dataslice = 0;
  }else{
    var dataslice = sessionStorage.getItem("dataslice");
  }

  var start = Number(dataslice);
  var batas = Number(dataslice)+4;

  var pagin = "";

  if (start != 0) {
    pagin += '<li><a onclick="lihathalamandilepas('+key+','+"'kebawah'"+')" ><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>';
  }


  for (var i = 0; i < key; i++) {
    if ( (i+1) <= batas && (i+1) > start) {
      pagin += "<li><a onclick='panggildatadilepas("+'"'+i+'"'+")'>"+(Number(i)+1)+"</a></li>";
    }
  }


  var lebih = sessionStorage.getItem("dataslice")+4;

  if (lebih < key) {
    pagin += '<li><a onclick="lihathalamandilepas('+key+','+"'keatas'"+')" ><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>';
  }




  $(".pagination-lepas").html(pagin);
}


function lihathalamandilepas(key, aksinya){

  if (aksinya == 'keatas') {

    var nilai = sessionStorage.getItem("dataslice");
    var hasil = Number(nilai)+4;

    sessionStorage.setItem("dataslice", hasil);
    paginationdilepas(key);
  }else{

    var nilai = sessionStorage.getItem("dataslice");
    var hasil = Number(nilai)-4;

    sessionStorage.setItem("dataslice", hasil);
    paginationdilepas(key);
  }

}

function keluarkandata(id, tgl, idmajikan)
{
  $.ajax({
    url: "<?= site_url(); ?>/agen_tambah_tki/keluarkan",
    method: "POST",
    dataType: "text",
    data: {
      id: id,
      tgl: tgl,
      idmajikan: idmajikan
    },success: function(response){
      panggildatadilepas();
    }
  });
}

  function printpertgltoagen(tgltoagen) {
    var id_agen = "<?= $idagen; ?>";
    location.href = "<?= site_url(); ?>/print_kirim_bio_3/print_data/"+tgltoagen+"/"+id_agen;
  }

    $('body').click(function(e) {
        var target = $(e.target);
        if(target.is('.simpannamapabrik')) {
          var idbio = $("input[name=idbio]").val();
          var tgltoagen = $("input[name=tgltoagen]").val();
          var kodeagen = $("input[name=kodeagen]").val();
          var nama_pabrik = $("input[name=nama_pabrik]").val();
          var nama_mandarin = $("input[name=nama_mandarin]").val();

          $.ajax({
              url : "<?= site_url(); ?>/agen_tambah_tki/simpan_perubahan_pabrik",
              method: "POST",
              dataType: "text",
              data: {
                idbio: idbio,
                tgltoagen: tgltoagen,
                kodeagen: kodeagen,
                nama_pabrik: nama_pabrik,
                nama_mandarin: nama_mandarin
              }, success:function(response){
                alert(response);
                $(".ubahmajikan2").modal("hide");
                $(".kirim_bio").modal("hide");
                tampiltkikirimbio(tgltoagen, '', tgltoagen);
              }
          });


        }
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

</script>
