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

.pagin a:hover{
  background-color: yellow;
}

</style>



<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div id='style-judul' class="col-lg-12">
                   <div class="panel panel-warning panel-bordered">

                    <div class="panel-heading">
                       <h1>PERNYATAAN PERSETUJUAN TENAGA KERJA</h1>
                    </div>
                    <div class="panel-body">
                      <input type="text" name="search" id="search" class="search" placeholder="search...">
                    </div>
                    <div class="panel-body">
                      <div class="gugus-group-menu-button">

                        

                      </div>
                    </div>
                   </div>
                </div>
             </div>
        </div>
     </div>
</div>


<script type="text/javascript">

$(document).ready(function() {
    $("<div class='pagin'></div>").insertAfter(".gugus-group-menu-button");
    jsonparse();
    ss('pages', 0);
    ss('pencarian', 'all');
    pagin(getss('key'), 0);
} );

function ss(key, data){
  return sessionStorage.setItem(key, data);
}

function getss(key){
  return sessionStorage.getItem(key);
}

function pagin(key, operate){
  

  var data = '';

  // tombol prev ------------------------------
  if (operate >= 4) {
      data += "<a onclick='pagin("+key+","+(Number(operate)-4)+")'>prev</a>";
  }
  // end of ###########################

  
  // content halaman ----------------------------------------------
  for (var i = operate; i < key; i++) {
    if( i == Number(operate)+4 ){
      break;
    } data += "<a onclick='gopages()'>"+(Number(i)+1)+"</a>";
  }
  // #############################################################

  // tombol next ------------------------------
  if (operate < Number(key)-4) {
      data += "<a onclick='pagin("+key+","+(Number(operate)+4)+")'>next</a>";
  }
  // end of ###########################

  $(".pagin").html(data);


}

$("#search").keyup(function(){
  var search = $(this).val();
  ss('pencarian', search);
  jsonparse();

  
})


function jsonparse(){
  var datasaya = 39;
  $.ajax({
    url: "<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/ambilData",
    method: 'POST',
    dataType: 'text',
    data: {
      nilaiData: getss('pages'),
      pencarian: getss('pencarian')
    },
    success: function(response){
      var obj = JSON.parse(response);
      $(".gugus-group-menu-button").html(obj.data);
      ss('key', datasaya);
    }
  });
}
</script>