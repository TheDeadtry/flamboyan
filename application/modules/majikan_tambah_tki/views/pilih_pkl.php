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
  margin: 5px;
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




</style>


<div class="page-container">
    <div class="page-content">
      <div class="content-wrapper">

        
        <div class="panel panel-warning panel-bordered">
          <div class="panel-heading">

          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table" border="0">
                  <tr>
                    <td>Nama Group</td>
                    <td>:</td>
                    <td><?php echo $nmgroup ?></td>
                  </tr>
                  <tr>
                    <td>Nama Agen</td>
                    <td>:</td>
                    <td><?php echo $nmagen ?></td>
                  </tr>
                  <tr>
                    <td>Nama Majikan</td>
                    <td>:</td>
                    <td><?php echo $nmmajikan ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

         </div> 

            <div class="row">
              <div class="col-lg-12">
                
                <div class="panel panel-warning panel-bordered" id="panel1">
                  <div class="panel-heading">
                    <h4></h4>
                    <div class="row">
                      <div class="col-lg-12">
                        <a href="<?php echo site_url('new_majikans'); ?>" class="btn btn-primary btn-lg">KEMBALI</a>
                        <button type="button" class="btn btn-primary btn-lg" onclick="tambah()">Tambah TKI</button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="showdilepas()">Lihat Tki Dilepas pada Majikan ini</button>
                        <h3>Data TKI pada Majikan ini</h3>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    
                    <table class="table data1 table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Pinhau</th>
                          <th>Tanggal Kirim Bio</th>
                          <th>Tanggal Pailiu</th>
                          <th>Tanggal interview</th>
                          <th>#</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>                    

                  </div>
                </div>

                
                <div class="panel panel-warning panel-bordered" id="panel2">
                  <div class="panel-heading">
                    <h4></h4>
                    <div class="row">
                      <div class="col-lg-12">
                        <button type="button" class="btn btn-primary btn-lg" onclick="toPanel1()">Kembali</button>
                        <h3>Data TKI yang dilepas dari Majikan ini</h3>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <table class="table data2 table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Pinhau</th>
                          <th>Tanggal Dilepas</th>
                          <th>Tanggal Kirim Bio</th>
                          <th>Tanggal Pailiu</th>
                          <th>Tanggal interview</th>
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

<div class="modal fade" id="tambah" tabindex="-1" role="alert" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <label class="control-label">TGL Kirim Bio</label>
              <input type="text" class="form-control" name="addtoagen" placeholder="YYYY.MM.dd" required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <label class="control-label">List TKI</label>
              <select class="form-control select-tki" name="addtki[]"  multiple="multiple"></select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addprocess()">Tambah</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ubah" tabindex="-1" role="alert" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ubah Data</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="id_hidden" name="editid"/>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <label class="control-label">TGL Kirim Bio</label>
              <input type="text" class="form-control" name="edittoagen" required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <label class="control-label">TGL Pauliu</label>
              <input type="text" class="form-control" name="editpauliu" required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <label class="control-label">TGL Interview</label>
              <input type="text" class="form-control" name="editinterview" required/>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="editprocess()">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="dilepas" tabindex="-1" role="alert" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Pelepasan Data</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="id_hidden" name="lepasid"/>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <label class="control-label">TGL Dilepas</label>
              <input type="text" class="form-control" name="lepastgldilepas" required/>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="dilepasprocess()">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>

<script>
  panggildatatable();
  function panggildatatable()
  {  
    var idmajikan = "<?= $idmajikan ?>";
    $.ajax({
      url: "<?= site_url(); ?>/majikan_tambah_tki/tampilkan_distik_markabio/"+idmajikan,
      method: "POST",
      dataType: "json",
      success:function(response){
        $('#panel1').show();
        $('#panel2').hide();
        $(".data1 tbody").html(response);
      }
    });
  }

  function tambah()
  {
    $("input[name=addtoagen]").val("");
    $(".select-tki").val("").change();
    $('#tambah').modal('show');
  }

  function addprocess()
  {
    var a1 = $("input[name=addtoagen]").val();
    var a2 = $(".select-tki").val();
    var a3 = <?php echo $idgroup ?>;
    var a4 = <?php echo $idagen ?>;
    var a5 = <?php echo $idmajikan ?>;
    $.ajax({
        url     : "<?php echo site_url('majikan_tambah_tki/addprocess') ?>",
        type    : "POST",
        data    : { a1,a2,a3,a4,a5 },
        success: function(data) {
          $('#tambah').modal('hide');
          panggildatatable();
        },
    });
  }

  function ubah(id)
  {
    $.ajax({
      url: "<?= site_url(); ?>/majikan_tambah_tki/ubah/"+id,
      method: "POST",
      dataType: "json",
      success:function(r){
        $("input[name=edittoagen]").val(r.tgl_to_agen);
        $("input[name=editpauliu]").val(r.tgl_pauliu);
        $("input[name=editinterview]").val(r.tgl_inter);
        $("input[name=editid]").val(r.id_marka_bioagen);
        $('#ubah').modal('show');
      }
    });
  }

  function editprocess()
  {
    var id = $("input[name=editid]").val();
    var a1 = $("input[name=edittoagen]").val();
    var a2 = $("input[name=editpauliu]").val();
    var a3 = $("input[name=editinterview]").val();
    $.ajax({
        url     : "<?php echo site_url('majikan_tambah_tki/editprocess') ?>",
        type    : "POST",
        data    : { id,a1,a2,a3 },
        success: function(data) {
          $('#ubah').modal('hide');
          panggildatatable();
        },
    });
  }

  function dilepas(id)
  {
    $("input[name=lepasid]").val(id);
    $("input[name=lepastgldilepas]").val("");
    $('#dilepas').modal('show');
  }

  function dilepasprocess(id)
  {
    var id = $("input[name=lepasid]").val();
    var a1 = $("input[name=lepastgldilepas]").val();
    $.ajax({
      url: "<?= site_url(); ?>/majikan_tambah_tki/dilepas/"+id,
      type    : "POST",
      data    : { id,a1 },
      success: function(data) {
        $('#dilepas').modal('hide');
        panggildatatable();
      },
    });
  }

  function showdilepas()
  {
    var idmajikan = "<?= $idmajikan ?>";
    $.ajax({
      url: "<?= site_url(); ?>/majikan_tambah_tki/get_lihat_dilepas/"+idmajikan,
      method: "POST",
      dataType: "json",
      success:function(response){
        $('#panel1').hide();
        $('#panel2').show();
        $(".data2 tbody").html(response);
      }
    });
  }

  function toPanel1()
  {
    panggildatatable();
  }


  
  $('.select-tki').select2({
    dropdownParent: $('#tambah'),
    theme: 'bootstrap4',
    ajax: {
      url: "<?php echo site_url('majikan_tambah_tki/select_tki') ?>",
      dataType: 'json',
      data: function (params) {
        return {
          searchTerm: params.term // search term
        };
      },
      processResults: function (response) {
        return {
            results: response
        };
      },
      cache: true,
    }
  });

</script>






