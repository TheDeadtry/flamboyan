<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div id='style-judul' class="col-lg-12">
                   <div class="panel panel-info panel-bordered">

                    <div class="panel-heading">
                      <b><i><h3>PERNYATAAN PERSETUJUAN TENAGA KERJA</h3></i></b>
                      <br>
                      <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#modalUsaha">Tambah Data</button>
                      <a class="btn btn-success" href="<?php echo site_url(); ?>/pekerjaanaa">kembali</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>datapekerjaan</th>
                              <th>mandarin</th>
                              <th>aksinya</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($datapekerjaan as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $value->isi; ?></td>
                                    <td><?php echo $value->mandarin; ?></td>
                                    <td> <a class="btn btn-info" onclick="editdata(<?= $iddata; ?>,<?= $value->id_pekerjaan ?>)">edit</a> <a href="<?= site_url(); ?>/pekerjaanaa/hapus_data_pekerjaan/<?= $value->id_pekerjaan; ?>/<?= $iddata; ?>" class="btn btn-warning">hapus</a> </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>                    
                          </tbody>
                        </table>
                        <div>
                          
                        </div>
                      </div>
                   </div>
                </div>
             </div>
        </div>
     </div>
</div>


<form action="<?= site_url(); ?>/pekerjaanaa/tambah_data_pekerjaan" method="post">
    <div class="modal fade" id="modalUsaha" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Data Pekerjaan</h4>
            </div>
            <div class="modal-body">
              <form>
                <input type="hidden" name="id" value="<?= $iddata; ?>">

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
                <button type="submit" class="btn btn-success">save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
</form>

<form action="<?= site_url(); ?>/pekerjaanaa/edit_datapekerjaan" method="post">
    <div class="modal fade" id="modalpekerjaan" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Data Pekerjaan</h4>
            </div>
            <div class="modal-body">
              <form>

                <input type="hidden" class="form-control" id="TPekerjaan" name="idpekerjaan">
                <input type="hidden" class="form-control" id="TPekerjaan" name="idkategori" value="<?= $iddata; ?>">

                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" id="isi" name="isi">
                </div>
                <div class="form-group">
                    <label>Mandarin</label>
                    <input type="text" class="form-control" id="mandarin" name="mandarin">
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function editdata(key, pekerjaan) {
      $("#modalpekerjaan").modal("show");
      $("input[name=idpekerjaan]").val(pekerjaan);
      $.ajax({
        url: "<?= site_url(); ?>/pekerjaanaa/ambildatapekerjaan/"+key+"/"+pekerjaan,
        success:function(response){
          var json = JSON.parse(response);
          $("#isi").val(json.isi);
          $("#mandarin").val(json.mandarin);
        }
      });
    }

</script>