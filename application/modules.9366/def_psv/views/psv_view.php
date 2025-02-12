<style type="text/css">
	.gugus_pagin{
		padding: 0;
		margin: 0;
	}

	.gugus_pagin li{
		display: inline;
	}

	.gugus_pagin a{
		display: inline-block;
		min-width: 30px;
		padding: 5px;
		text-decoration: none;
		margin-right: 5px;
		background-color: blue;
		color: white;
		text-align: center;
		border-radius: 5px;
	}

	.gugus_pagin a:hover{
		display: inline-block;
		padding: 7px;
		text-decoration: none;
		margin-right: 5px;
		background-color: #ddd;
		color: #777;
		text-align: center;
	}

.ggs{
  width: 100%;
	position: relative;
}

.ggs-table{
	overflow-x: scroll;
	min-height: 450px;
  margin-bottom: 10px;
}

.ggs-table table{
  width: 100%;
	background-color: white;
	display: block;
	white-space: nowrap;
}

.ggs-table table td, .ggs-table table th{
	border-collapse: collapse;
	padding: 5px;
	border: 1px solid #777;
}

.ggs-table table td{
  background-color: white;
}

#pencarian{
	border-radius: 5px;
	margin-bottom: 10px;
	padding: 5px;
}

#pencarian:focus{
	background-color: yellow;
	border: 2px solid rgba(0,0,255, 0.5);
}

.clone {
  position:absolute;
  top:0;
  left:0;
  pointer-events:none;
  white-space: nowrap;
}
.clone th, .clone td {
	padding: 5px;
	border: 1px solid #777;
 	visibility:hidden
}
.clone td, .clone th {
  border-color:transparent
}
.clone tbody th {
  visibility:visible;
  color:red;
}
.clone .fixed-side {
  border:1px solid #000;
  background-color: orange ;
  visibility:visible;
}

.clone .fixed-side2 {
  border:1px solid #000;
  background-color: white ;
  visibility:visible;
}

.clone thead, .clone tfoot{background:transparent;}

/*kumpulan background warna*/
.orange{
	background-color: orange;
}

.pink{
  background-color: pink;
}

.yellow{
  background-color: yellow;
}

.green{
  background-color: #0d9;
  color: white;
}

.blue{
  background-color: blue;
  color: white;
}

.red{
  background-color: red;
  color: white;
}

.print-menu{
  visibility: hidden;
  position: absolute;
  display: flex;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0,0,0, .5);
  z-index: 999999;
  align-items: center;
  justify-content: center;
}

.print-box-menu{
  min-width: 600px;
  min-height: 200px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 5px 5px 10px, black;
  padding: 10px;
}

.content-box{
  text-align: center;
  min-height: 100px;
}

.opsi-menu{
  display: inline;
}

.opsi-menu li{
  display: inline;
  list-style: none;
}

.opsi-menu select{
  font-size: 12px;
  display: inline-block;
  padding: 10px;
}

.opsi-menu button{
  font-size: 12px;
  display: inline-block;
  padding: 7px;
}

.foot-box{
  text-align: right;
}

.foot-box button{
  display: inline-block;
}

h2, span{
  padding: 0;
  margin: 0;
}

.menu-utama{
  color: black;
}

.page-title h3{
  width: 100%;
  display: inline-block;
  padding: 10px;
  background-color: red;
  color: white;
  border-radius: 5px;
  text-align: center;
}

#style-judul h3{
  width: 100%;
  padding-top: 5px;  
  padding-bottom: 5px;  
  background-color: red;
  color: white;
  border-radius: 5px;
  text-align: center;
}

.perkiraan{
  width: 100%;
  padding: 3px;
  font-size: 16px;
}

</style>



<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div id='style-judul' class="col-lg-12">
                    <h1><i style="font-size: 20px; color: red;" class="icon-star-full2"></i> PROGRESS MARKETING FORMAL</h1>
                    <h3 id="judul"></h3>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">
                        <div class="panel-heading">
                          <ol class="opsi-menu">
                            <li>
                              <select class="menu-utama">
                                <option value="0">Belum Terbang</option>
                                <option value="1">Sudah Terbang</option>
                              </select>  
                            </li>
                            <li>
                              <button type="button" class="btn btn-default" id="open-modal">PRINT</button>  
                            </li>
                          </ol>
                        </div>
                        <div class="panel-body">

                          <div class="ggs">
                          <div class="ggs-table">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                     <tr>
                                        <th rowspan="4" class="fixed-side orange">NO</th>
                                        <th class="fixed-side orange"></th>
                                        <th class="fixed-side orange"></th>
                                        <th class="fixed-side orange"></th>
                                        <th class="orange" colspan="2">keterangan</th>
                                        <th class="orange"></th>
                                        <th class="orange"></th>
                                        <th class="orange">勞工契約PK</th>
                                        <th colspan="12" class="orange">初始過程 PROSES AWAL</th>
                                        <th colspan="3" class="green">挑到雇主 DAPAT MAJIKAN</th>
                                        <th colspan="8" class="blue">離境 KEBERANGKATAN</th>
                                        <th colspan="11" class="green">DOKUMEN DARI TAIWAN - 臺灣文件</th>
                                        <th colspan="25" class="blue">PROSES DOK DI INDONESIA (印尼文件）</th>
                                      </tr>
                                      <tr>
                                        <th colspan="3" class="fixed-side orange">外勞 - TKI</th>
                                        <th class="orange" colspan="2"></th>
                                        <th class="orange">雇主</th>
                                        <th class="orange"></th>
                                        <th rowspan="2" class="orange"> ADA有<br>TIDAK ADA沒有</th>
                                        <th rowspan="2" class="orange">履歷表給臺灣日期</th>
                                        <th colspan="4" class="orange">勞工網上報名 TKI ONLINE DEPNAKER</th>
                                        <th colspan="7" class="orange">訓練 PELATIHAN</th>
                                        <th rowspan="2" class="green">挑工 日期</th>
                                        <th rowspan="2" class="green">聘工表</th>
                                        <th rowspan="2" class="green">雇主要求入境</th>
                                        <th rowspan="3" class="blue">Bandara Tujuan</th>
                                        <th colspan="2" rowspan="2" class="blue">入境 MASUK TAIWAN</th>
                                        <th rowspan="2" class="blue">班機</th>
                                        <th rowspan="2" class="blue">下機張</th>
                                        <th rowspan="2" class="blue">機票-</th>
                                        <th colspan="2" rowspan="2" class="blue">飛TERBANG</th>
                                        <th class="green">勞動契約 PK</th>
                                        <th colspan="5" class="red">核准函 SUHAN</th>
                                        <th colspan="5" class="yellow">簽證函 VISA PERMIT</th>
                                        <th colspan="7" class="blue">新護照 PASPOR BARU</th>
                                        <th colspan="5" class="blue">良民證 </th>
                                        <th colspan="2" class="blue">MEDIKAL FULL-大 體檢</th>
                                        <th colspan="6" class="blue">VISA 簽證</th>
                                        <th colspan="5" class="blue">日期 TGL</th>
                                      </tr>
                                      <tr>
                                        <th class="fixed-side orange">編號</th>
                                        <th class="fixed-side orange"></th>
                                        <th class="fixed-side orange">姓名 NAMA</th>
                                        <th class="orange" colspan="2">備註</th>
                                        <th class="orange">MAJIKAN</th>
                                        <th class="orange"></th>
                                        <th rowspan="2" class="orange">日期 TGL</th>
                                        <th rowspan="2" class="orange">實A / 估-C</th>
                                        <th class="orange">勞工網上報名號碼</th>
                                        <th class="orange">護照號碼</th>
                                        <th class="orange">KEY日期</th>
                                        <th class="orange">訓練(天)</th>
                                        <th colspan="1" rowspan="2" class="orange">完整 SELESAI DURASI</th>
                                        <th colspan="2" class="orange">考試 UJIAN</th>
                                        <th colspan="2" rowspan="2" class="orange">PERKIRAAN TERBANG 大開入境時間</th>
                                        <th rowspan="2" class="green">受到日期 TGL TERIMA</th>
                                        <th class="red">收件日</th>
                                        <th rowspan="2" class="red">號碼 NO</th>
                                        <th colspan="2" class="red">日期 TGL</th>
                                        <th class="red">備註</th>
                                        <th class="yellow">收件日</th>
                                        <th rowspan="2" class="yellow">號碼 NO</th>
                                        <th colspan="2" class="yellow">日期 TGL</th>
                                        <th class="yellow">備註</th>
                                        <th colspan="7" class="blue">日期 TGL</th>
                                        <th colspan="5" class="blue">日期 TGL</th>
                                        <th colspan="2" class="blue">日期 TGL</th>
                                        <th colspan="6" class="blue">日期 TGL</th>
                                        <th rowspan="2" class="blue">貸款 LOAN</th>
                                        <th rowspan="2" class="blue">受訓-PAP & 外勞卡 KTKLN</th>
                                        <th rowspan="2" class="blue">實A / 估-C</th>
                                        <th rowspan="2" class="blue">文件完整入境日期</th>
                                        <th rowspan="2" class="blue">實A / 估-C</th>


                                        
                                      </tr>
                                      <tr>
                                        <th class="fixed-side orange">NO_INDUK</th>
                                        <th class="fixed-side orange">INDONESIA</th>
                                        <th class="fixed-side orange">MANDARIN</th>
                                        <th class="orange">KETERANGAN</th>
                                        <th class="orange">KETERANGAN 2</th>
                                        <th class="orange">MANDARIN</th>
                                        <th class="orange">ENGLISH</th>
                                        <th class="orange">給臺灣日期<br>TGL KE TAIWAN</th>
                                        <th class="orange">TGL KIRIM BIO KE TAIWAN</th>
                                        <th class="orange">NO ID ONLINE</th>
                                        <th class="orange">NO PASPORT</th>
                                        <th class="orange">TGL UPDATE</th>
                                        <th class="orange">SUDAH MENGIKUTI PELATIHAN (HARI)</th>
                                        <th class="orange">TGL日期</th>
                                        <th class="orange">實A / 估-C</th>
                                        <th class="green">TGL TERPILIH</th>
                                        <th class="green">JD</th>
                                        <th class="green">TGL DIMINTA TERBANG</th>
                                        <th class="blue">TGL日期</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">RUTE_PENERBANGAN</th>
                                        <th class="blue">TUJUAN</th>
                                        <th class="blue">TIKET</th>
                                        <th class="blue">TGL日期</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="red">TGL TERIMA</th>
                                        <th class="red">發行 TERBIT</th>
                                        <th class="red">到期 EXP</th>
                                        <th class="red">KETERANGAN</th>
                                        <th class="yellow">TGL TERIMA</th>
                                        <th class="yellow">發行 TERBIT</th>
                                        <th class="yellow">到期 EXP</th>
                                        <th class="yellow">KETERANGAN</th>
                                        <th class="blue">到期EXP</th>
                                        <th class="blue">送 AJU</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">拍照 FOTO</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">受到 TERIMA</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">送PENGAJUAN</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">受到 TERIMA</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">到期 TGL EXP</th>
                                        <th class="blue">作-DILAKUKAN</th>
                                        <th class="blue">到期 EXP</th>
                                        <th class="blue">抽獎 KOCOKAN</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">指纹 FINGER PRINT</th>
                                        <th class="blue">實A / 估-C</th>
                                        <th class="blue">領 TERIMA</th>
                                        <th class="blue">實A / 估-C</th>
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
</div>

<div id="print-menu" class="print-menu">
  <div class="print-box-menu">
    <div class="head-box">
      <center><h1><b>PRINT MENU</b></h1></center>
    </div>
    <div class="content-box">
      <hr>
      <ol class="opsi-menu">
        <li>
          <select id="dataGroupAgen">
            <option value="all"> --- pilih grup ---</option>
          </select>
        </li>
        <li>
          <select id="dataAgen">
            <option value="all"> --- pilih agen ---</option>
          </select>
        </li>
      </ol>
    </div>
    <div class="foot-box">
     <hr>
      <button id="lihat-modal" class="btn btn-success">Lihat</button>
      <button id="print-modal" class="btn btn-default">Print</button>
      <button id="close-modal" class="btn btn-danger">Close</button>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  session("kondisiData", 0);
  session("keyGroupAgen", "all");
  session("keyGroup", "all");
	session("drawer", 0);
	session("limit",0);
	session("search", "");
  	jsonparse();
	$("<input type='text' id='pencarian' placeholder='search' focus onkeyup='search()'>").insertBefore(".ggs");
	$("<div class='gugus_pagin'></div>").insertAfter(".ggs-table");
} );


function perkiraan(key){
  var id = $("select[name='"+key+"']").val();
  $.ajax({
    url: "<?= site_url(); ?>/abc/simpanperkiraan/"+id+"/"+key,
    success:function(response){
      alert(response);
    }
  })
}

function keteranganPerkiraan(key){
  var id = $("select[name='keterangan"+key+"']").val();
  $.ajax({
    url: "<?= site_url(); ?>/abc/keterangan_simpanperkiraan/"+id+"/"+key,
    success:function(response){
      alert(response);
    }
  })
}

$("#open-modal").click(function(){
  $(".print-menu").css({"visibility":"visible"});
  $.ajax({
      url: "<?= site_url(); ?>/psv/dataGroupAgen",
      success:function(response){
          $("#dataGroupAgen").html(response);
      }
  });
});

$("#dataGroupAgen").change(function(){
  var value = $(this).val();
  $.ajax({
      url: "<?= site_url(); ?>/psv/dataAgen",
      method: "POST",
      dataType: "text",
      data: {
        value: value
      }, success:function(response){
        $("#dataAgen").html(response);  
      }
  });
});


$("#print-modal").click(function(){
  var sesi = getSession("kondisiData");
  var nilai = $("#dataGroupAgen").val();
  var nilaiDua = $("#dataAgen").val();
  location.href = '<?= site_url(); ?>/psv/printData/'+nilai+'/'+nilaiDua+'/'+sesi+'/';
});




$(".menu-utama").change(function(){
  session("drawer", 0);
  session("limit",0);
  var value = $(this).val();
  session("kondisiData", value);
  jsonparse();
});


$("#lihat-modal").click(function(){
  var nilai = $("#dataGroupAgen").val();
  var nilaiDua = $("#dataAgen").val();
  session("keyGroupAgen", nilai);
  session("keyGroup", nilaiDua);
  $(".print-menu").css({"visibility":"hidden"});
  jsonparse();
});



$("#close-modal").click(function(){
  $(".print-menu").css({"visibility":"hidden"});
});

function session(key, data){
	return sessionStorage.setItem(key, data);
}

function getSession(key){
	return sessionStorage.getItem(key);
}

function PageRendering(){
	var drawer = getSession("drawer");
	var totalData = getSession("pages");
	var halaman = "";
	if (drawer < 4) {

	}else{
		halaman += "<li><a href='#' onclick='prevPage()'>prev</a></li>";
	}
	
	halaman += pagination(Number(drawer));
	if ((Number(drawer)+4) > totalData) {

	}else if(totalData<=4){
	
	}else{
		halaman += "<li><a href='#' onclick='nextPage()' >next</a></li>";
	}

	$(".gugus_pagin").html(halaman);
}

function prevPage(){
	$(".gugus_pagin").remove();
	var item = getSession("drawer");
	var itemBARU = Number(item)-4;
	session("drawer", itemBARU);
	$("<div class='gugus_pagin'></div>").insertAfter(".ggs-table");
	PageRendering();
}

function nextPage(){
	$(".gugus_pagin").remove();
	var item = getSession("drawer");
	var itemBARU = Number(item)+4;
	session("drawer", itemBARU);
	$("<div class='gugus_pagin'></div>").insertAfter(".ggs-table");
	PageRendering();
}

function pagination(start){
	var pages = getSession("pages");
	var Batas = start+Number(4);
	var halaman = "";
	for (var i = start; i < pages; i++) {
		if (i === Batas) {
			break;
		}
		halaman += "<li><a href='#' onclick='TampilDataPage("+i+")' >"+(i+Number(1))+"</a></li>";
	}
	return halaman;
}


function TampilDataPage(key){
	session("limit", key);
	jsonparse();
}

function search(){
	session("limit", 0);
	var cari = $("#pencarian").val();
	session("search", cari);
	jsonparse();
}

function judul(){
  var value = getSession("kondisiData");
  if (value == 0) {
    $("#judul").text("BELUM TERBANG");
  }else{
    $("#judul").text("SUDAH TERBANG");
  }
}

function jsonparse(){
  var keyGroupAgen = getSession("keyGroupAgen");
  var keyGroup = getSession("keyGroup");
  var kondisiData = getSession("kondisiData");
	var drawer = getSession("drawer");
	var search = getSession("search");
	var limit = getSession("limit")*Number(10);
	var Datahalaman = '';
	$.ajax({
		url: "<?= site_url(); ?>/psv/json/"+limit+"/"+search,
		method: "POST",
		dataType: "text",
    data:{
      kondisiData: kondisiData,
      keyagen: keyGroupAgen,
      keyDataAgen: keyGroup
    },
		success: function(response){
			var obj = JSON.parse(response);
			if (drawer == 'undefined') {
			session("drawer", obj.drawer);
			}
			session("pages", obj.pages);
      
			$(".display tbody").html(obj.data);
			PageRendering();
			$(".display:last").clone(true).appendTo('.ggs').addClass('clone');
      judul();
		}
	});
}


function keterangan(key){
      $("input[name='"+key+"']").removeAttr("disabled");
      var kunci = "#data"+key;
      $(kunci).attr("value", "save");
      $(kunci).attr("onclick", "simpanKeterangan('"+key+"')");
    }

function keterangan2(key){
      $("input[name='dua"+key+"']").removeAttr("disabled");
      var kunci = "#data2"+key;
      $(kunci).attr("value", "save");
      $(kunci).attr("onclick", "simpanKeterangan2('"+key+"')");
    }



function escapeHtml(text) {
    var map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
  }

function simpanKeterangan(key){
      var kunci = "#data"+key;
      var dataTransfer = $("input[name='"+key+"']").val();
      $.ajax({
          url: "<?= site_url(); ?>/psv/ubahKeterangan",
          method: "POST",
          dataType: "text",
          data: {   
              iddata: key,
              dataTransfer: escapeHtml(dataTransfer) 
          }, success:function(response){
            $("input[name='"+key+"']").prop("disabled", "disabled");
            $("input[name='"+key+"']").attr("value", response);
            $(kunci).attr("value", "ubah");
            $(kunci).attr("onclick", "keterangan('"+key+"')");
          }
       });

      
      // $(kunci).attr("value", "ubah");
      // $(kunci).attr("onclick", "keterangan('"+key+"')");
      // $("input[name='"+key+"']").prop("disabled", true);
      // alert(dataTransfer);
    }


     function simpanKeterangan2(key){
      var kunci = "#data2"+key;
      var dataTransfer = $("input[name='dua"+key+"']").val();
      $.ajax({
          url: "<?= site_url(); ?>/psv/ubahKeterangan2",
          method: "POST",
          dataType: "text",
          data: {   
              iddata: key,
              dataTransfer: escapeHtml(dataTransfer) 
          }, success:function(response){
            $("input[name='dua"+key+"']").prop("disabled", "disabled");
            $("input[name='dua"+key+"']").attr("value", response);
            $(kunci).attr("value", "ubah");
            $(kunci).attr("onclick", "keterangan2('"+key+"')");
          }
       });
    }

</script>