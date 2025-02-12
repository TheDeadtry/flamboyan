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


<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Keterampilan </span>
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
                    <li class='active'>Data Keterampilan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


<div class="alert alert-info">
  <button data-dismiss="alert" class="close"> x </button> Welcome <strong> admin </strong> PT Flamboyan Gema Jasa 
</div>
<div class="row-fluid">
  <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
    <div class='box-header orange-background'>
      <div class='title'>
        <h1 style="color: white;">KATEGORI KETERAMPILAN</h1>
        <button type="button" class="btn btn-default btn-lg tambah" data-toggle="modal">Tambah Data</button>
      </div>
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
          <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
               <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Nama Keterampilan</th>
                  <th>Mandarin</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($skill as $key => $value): ?>
                  <tr>
                    <td><?= ($key+1) ?></td>
                    <td><?php 

                      $data_kategori = $this->db->query("SELECT * FROM kategoriskill WHERE id_kategori = '$value->id_kategori' ")->row();
                      echo $data_kategori->isi;

                    ?></td>
                    <td><?= $value->isi; ?></td>
                    <td><?= $value->mandarin; ?></td>
                    <td>
                      <a class="btn btn-info ubah-kategori"
                        data-skill = "<?= $value->id_skill; ?>"
                        data-kategori = "<?= $value->id_kategori; ?>"
                        data-isi = "<?= $value->isi; ?>"
                        data-mandarin = "<?= $value->mandarin; ?>"
                      >ubah</a>
                      <a class="btn btn-danger hapus">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
          </table>    
        </div>
      </div>
    </div>
 </div>
</div>



<form action="<?php echo site_url(); ?>/skill2/tambahskil" method="POST">
<div class="modal fade" id="tambah" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          <input style="width: calc(100% - 10px);" type="hidden" class="form-control" value="<?= $id_kategori; ?>" id="isi" name="id_kategori">
          <div class="form-group">
              <label>Usaha</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="isi" name="isi">
          </div>
          <div class="form-group">
              <label>Mandarin</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="mandarin" name="mandarin">
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


<form action="<?php echo site_url(); ?>/skill2/ubahskilll" method="POST">
<div class="modal fade" id="modalkategori" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          <input style="width: calc(100% - 10px);" type="hidden" name="id_skill" value="">
          <input style="width: calc(100% - 10px);" type="hidden" class="form-control" value="<?= $id_kategori; ?>" id="isi" name="id_kategori">
          <div class="form-group">
              <label>Nama Keterampilan</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="isi" name="isi">
          </div>
          <div class="form-group">
              <label>Mandarin</label>
              <input style="width: calc(100% - 10px);" type="text" class="form-control" id="mandarin" name="mandarin">
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

  $("body").click(function(e) {
    var target = $(e.target);
    if (target.is('.ubah-kategori')) {

      var idSkill = target.attr('data-skill');
      var idKategori = target.attr('data-kategori');
      var isi = target.attr('data-isi');
      var mandarin = target.attr('data-mandarin');

      $("#modalkategori").modal("show");

      $("body input[name=id_skill]").val(idSkill);
      $("body input[name=id_kategori]").val(idKategori);
      $("body input[name=isi]").val(isi);
      $("body input[name=mandarin]").val(mandarin);
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

        var r = confirm("Yakin ingin menghapus data ini");
        if (r == true) {
          location.href = "<?= site_url(); ?>/skill2/hapusskill/<?= $id_kategori ?>/<?= $value->id_skill; ?>";
        } else {

        }

    }
  });


</script>
