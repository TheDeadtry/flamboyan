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
                    </div>
                    <div class="panel-body">
                      <input type="text" name="search" id="search" class="search" placeholder="search...">
                    </div>
                    <div class="panel-body">
                        <table class="tablenya table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>isi</th>
                              <th>nama</th>
                              <th>mandarin</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      <div class="pagin">
                        
                      </div>
                    </div>
                   </div>
                </div>
             </div>
        </div>
     </div>
</div>



<!-- Modal -->
<form action="<?php echo site_url(); ?>/pekerjaanaa/tambah_data_usaha" method="POST">
<div class="modal fade" id="modalUsaha" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" id="TPekerjaan" name="TPekerjaan">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" class="form-control" id="TMandarinPekerjaan" name="TMandarinPekerjaan">
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

<form action="<?php echo site_url(); ?>/pekerjaanaa/editdatakategori" method="POST">
<div class="modal fade" id="modalkategori" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id_kategori">
        <div class="form-group">
            <label>Usaha</label>
            <input type="text" class="form-control" id="isi" name="isi">
        </div>
        <div class="form-group">
            <label>Mandarin</label>
            <input type="text" class="form-control" id="mandarin" name="mandarin">
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



<script type="text/javascript">

$(document).ready(function() {
    jsonparse('all');
} );


function editdata(key){
  $("#modalkategori").modal("show");
  $("input[name=id_kategori]").val(key);
  $.ajax({
    url: "<?= site_url(); ?>/pekerjaanaa/ambildatakategori/"+key,
    success:function(response){
      var json = JSON.parse(response);
      $("#isi").val(json.isi);
      $("#mandarin").val(json.mandarin);
    }
  });
}

function hapusdata(key){
  var r = confirm("Anda yakin ingin menghapusnya ?");
  if (r == true) {
     window.location.href = "<?php echo site_url(); ?>/pekerjaanaa/hapusdatakategori/"+key;          
  } else {
    
  }
}

function ss(key, data){
  return sessionStorage.setItem(key, data);
}

function getss(key){
  return sessionStorage.getItem(key);
}



function pagin(key, operate, search){
  var data = '';

  // tombol prev ------------------------------
  if (operate >= 4) {
      data += "<a onclick='pagin("+key+","+(Number(operate)-4)+","+'"'+search+'"'+")'>prev</a>";
  }
  // end of ###########################
  
  // content halaman ----------------------------------------------
  for (var i = operate; i < key; i++) {
    if( i == Number(operate)+4 ){
      break;
    } data += "<a onclick='gopages("+'"'+search+'"'+", "+'"'+(Number(i)*20)+'"'+")'>"+(Number(i)+1)+"</a>";
  }
  // #############################################################

  // tombol next ------------------------------
  if (operate < Number(key)-4) {
      data += "<a onclick='pagin("+key+","+(Number(operate)+4)+","+'"'+search+'"'+")'>next</a>";
  }
  // end of ###########################

  $(".pagin").html(data);

}



function jsonparse(key){
  $.ajax({
    url: "<?= site_url(); ?>/pekerjaanaa/ambilData",
    method: 'POST',
    dataType: 'text',
    data: {
      nilaiData: 0,
      pencarian: key
    },
    success: function(response){
      var obj = JSON.parse(response);
      $(".tablenya tbody").html(obj.data);
      pagin(obj.pages, 0, '');
    }
  });
}


$("#search").keyup(function(){
  var nilai = $(this).val();
  pencarian(nilai);
})

function pencarian(key){
   $.ajax({
    url: "<?= site_url(); ?>/pekerjaanaa/ambilData",
    method: 'POST',
    dataType: 'text',
    data: {
      nilaiData: 0,
      pencarian: key
    },
    success: function(response){
      var obj = JSON.parse(response);
      $(".tablenya tbody").html(obj.data);
      pagin((obj.pages/20), 0, key);
    }
  });
}

function gopages(key, page){
  $.ajax({
    url: "<?= site_url(); ?>/pekerjaanaa/ambilData",
    method: 'POST',
    dataType: 'text',
    data: {
      nilaiData: page,
      pencarian: key
    },
    success: function(response){
      var obj = JSON.parse(response);
      $(".tablenya tbody").html(obj.data);
    }
  });
}

</script>