<style type="text/css">
.gugus-group-menu-button{
  width: 100%;
  padding: 0;
  margin: 0;
  display: block;
  text-align: center;
}

.gugus-group-menu-button a{
  display: inline-block;
  width: 23%;
  height: auto;
  padding: 0;
  border-radius: 3px;
  margin-right: 1%;
  margin-bottom: 1%;
  text-align: center;
  transition: 1s;
  
  border: 1px solid #777;
}

.gugus-group-menu-button a:hover{
  background-color: #cccccc;
}

.pagin{
  display: block;
  padding: 10px;
  margin: 10px;
  background-color: transparent;
  text-align: right;
}

.pagin a{
  text-align: center;
  width: 50px;
  display: inline-block;
  padding: 10px;
  margin: 10px;
  background-color: transparent;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.ada-red{
  background-color: red;
  color: white;
}

.pagin a:hover{
  background-color: yellow;
}

</style>


<div class="row">

<div class="col-lg-12">
            <h5 class="panel-title text-center ">SETTING SPBG<br> </h5><br/>
    <div class="panel panel-warning panel-bordered">

        <div class="panel-heading">
          <button type="button" class="btn btn-default btn-lg tambah" data-toggle="modal">Tambah Data</button>
        </div>

        <div class="panel-body">
          <table class='table table-bordered table-striped' style='margin-bottom:0;'>
              <thead>
                  <tr>
                    <th>No</th>
                    <th>No.COMLA</th>
                    <th>Nama</th>
                    <th>Direktur</th>
                    <th>#</th>
                  </tr>
            </thead>
            <tbody>
              <?php foreach ($tampil_data_dokdibawa as $key => $value): ?>
                <tr>
                  <td><?php echo ($key+1) ?></td>
                  <td><?php echo $value->k1; ?></td>
                  <td><?php echo $value->k2; ?></td>
                  <td><?php echo $value->k3; ?></td>
                  <td>
                    <a class="btn btn-info ubah-kategori"
                      data-id = "<?php echo $value->id_setting_spbg ?>"
                      data-k1 = "<?php echo $value->k1; ?>"
                      data-k2 = "<?php echo $value->k2; ?>"
                      data-k3 = "<?php echo $value->k3; ?>"
                    >ubah</a>
                    <a data-id = "<?php echo $value->id_setting_spbg ?>" class="btn btn-danger hapus">Hapus</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>    
        </div>
      </div>
    </div>















<form action="<?php echo site_url(); ?>/setting_spbg/update_data_dokdibawa" method="POST">
<div class="modal fade" id="modalkategori" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data</h4>
      </div>
      <div class="modal-body">
          <input style="width: calc(100% - 10px);" type="hidden" name="id_kategori">
          <div class="form-group">
              <label>NO.COMLA</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="k1" name="k1">
          </div>
          <div class="form-group">
              <label>NAMA</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="k2" name="k2">
          </div>
          <div class="form-group">
              <label>DIREKTUR</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="k3" name="k3">
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success">save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>


<form action="<?php echo site_url(); ?>/setting_spbg/simpan_data_dokdibawa" method="POST">
<div class="modal fade" id="tambah" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label>NO.COMLA</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="k1" name="k1">
          </div>
          <div class="form-group">
              <label>NAMA</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="k2" name="k2">
          </div>
          <div class="form-group">
              <label>DIREKTUR</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="k3" name="k3">
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success">save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>


<script>


  $(document).ready(function() {
      $('#example').DataTable();
  } );

  $("body").click(function(e) {
    var target = $(e.target);
    if (target.is('.ubah-kategori')) {

      var id = target.attr('data-id');
      var k1 = target.attr('data-k1');
      var k2 = target.attr('data-k2');
      var k3 = target.attr('data-k3');

      $("#modalkategori").modal("show");

      $("body input[name=id_kategori]").val(id);
      $("body input[name=k1]").val(k1);
      $("body input[name=k2]").val(k2);
      $("body input[name=k3]").val(k3);

    }
  });

    $("body").click(function(e) {
    var target = $(e.target);
    if (target.is('.tambah')) {
      $("#tambah").modal("show");
    }
  });

  $("body").click(function(e) {
    var target = $(e.target);
    if (target.is('.hapus')) {
       var id = target.attr("data-id");
        var r = confirm("Yakin ingin menghapus data ini");
        if (r == true) {
          location.href = "<?php echo site_url(); ?>/setting_spbg/hapus_data_dokdibawa/"+id;
        } else {

        }

    }
  });

</script>
