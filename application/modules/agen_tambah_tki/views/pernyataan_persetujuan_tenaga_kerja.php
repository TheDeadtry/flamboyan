<style type="text/css">
.gugus-table{
  position: relative;
}

.gugus-table table{
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

.gugus-table table th{
  padding: 10px;
  background-color: #875; 
  color: white;
  border: 1px solid black;
  text-align: center;
}

.gugus-table table td{
  padding: 10px;
  border: 1px solid black; 
}


.gugus-table table tbody td{
  margin-left: 20px;
  margin-right: 10px;
}

.gugus-table table tbody td:nth-child(2){
  text-align: center;
}
.gugus-table table tbody td label{
  margin-left: 20px;
  margin-right: 10px;
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
                       <h3><?= $iddata.' '.$nama; ?></h3>
                    </div>
                    <div class="panel-body">
                      
                    </div>
                    <div class="panel-body">
                      <div class="gugus-table">
                        <table>
                          <thead>
                            <tr>
                              <th>PERNYATAAN PERSETUTUAN TENAGA KERJA</th>
                              <th>BISA / TIDAK</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr><td>APAKAH KAMU BISA MEMBERI JAMINAN BENDA BERHARGA SEBAGAI JAMINAN TIDAK AKAN KABUr ?</td><td><select name="data1"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select></td></tr>
                            <tr><td>APAKAH ANDA BERSEDIA SETIAP BULAN WAJIB TABUNG NT.3000 ?</td><td><select name="data2"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select> </td></tr>
                            <tr><td>APAKAH ANDA BERSEDIA KERJA SESUAI PENGATURAN SHIF KERJA ( LIBUR TIDAK SELALU SABTU MINGGU ) ?</td><td><select name="data3"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                            <tr><td>APAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI SUHU YANG TINGGI ?</td><td><select name="data4"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                            <tr><td>PAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI SUARA YANG BISING ?</td><td><select name="data5"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                            <tr><td>APAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI KOTOR ?</td><td><select name="data6"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                            <tr><td> APAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI BAU KIMIA/ MENYENGAT ?</td><td><select name="data7"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                            <tr><td>APAKAH ANDA BERSEDIA BEKERJA BERAT ( ANGKA BEBAN BERAT DIATAS 50 KG, BERDIRI DIATAS 8 JAM) ?</td><td><select name="data8"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                            <tr><td>APAKAH ANDA BERSEDIA BEKERJA LEMBUR SESUIA PENGATURAN KANTOR ?</td><td><select name="data9"><option> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                          </tbody>
                        </table>
                        <div class="<?= $warna;?>">
                          
                        </div>
                      </div>
                    </div>
                   </div>
                </div>
             </div>
        </div>
     </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    var action = "<?= $warna; ?>";
    var iddata = "<?= $iddata; ?>";

    $('.white').html('<input type="button" class="btn btn-success update" value="Simpan" onclick="simpanData('+"'"+iddata+"'"+')">');
    
    $('.red').html('<input type="button" class="btn btn-success update" value="Update" onclick="updateData('+"'"+iddata+"'"+')">');

    tampildata('<?= $warna; ?>');


  });

  function tampildata(key){
    if ($(".update").val() == 'Update' ) {
      var r = confirm("Anda Yakin Ingin Mengupdate Data ?");
      if (r== true) {
        dataditampilkan(key);
      }else{
        location.href = '<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja';
      }
    }
  }

  function dataditampilkan(key){
    $.ajax({
        url: '<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/datadiambil/<?= $iddata; ?>',
        success:function(response){
            var dataJSON = JSON.parse(response);
            $('select[name=data1] option[value="'+dataJSON.data1+'"]').attr("selected", "selected");
            $('select[name=data2] option[value="'+dataJSON.data2+'"]').attr("selected", "selected");
            $('select[name=data3] option[value="'+dataJSON.data3+'"]').attr("selected", "selected");
            $('select[name=data4] option[value="'+dataJSON.data4+'"]').attr("selected", "selected");
            $('select[name=data5] option[value="'+dataJSON.data5+'"]').attr("selected", "selected");
            $('select[name=data6] option[value="'+dataJSON.data6+'"]').attr("selected", "selected");
            $('select[name=data7] option[value="'+dataJSON.data7+'"]').attr("selected", "selected");
            $('select[name=data8] option[value="'+dataJSON.data8+'"]').attr("selected", "selected");
            $('select[name=data9] option[value="'+dataJSON.data9+'"]').attr("selected", "selected");
        }
    });
  }

  function updateData(key) {
    var data1 = $("select[name=data1]").val();
    var data2 = $("select[name=data2]").val();
    var data3 = $("select[name=data3]").val();
    var data4 = $("select[name=data4]").val();
    var data5 = $("select[name=data5]").val();
    var data6 = $("select[name=data6]").val();
    var data7 = $("select[name=data7]").val();
    var data8 = $("select[name=data8]").val();
    var data9 = $("select[name=data9]").val();
    var datajson = '{"data1":"'+data1+'","data2":"'+data2+'","data3":"'+data3+'","data4":"'+data4+'","data5":"'+data5+'","data6":"'+data6+'","data7":"'+data7+'","data8":"'+data8+'","data9":"'+data9+'"}';

    $.ajax({
        url: "<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/update_Data/",
        method: "POST",
        dataType: "text",
        data: {
          iddata: key,
          datakirim: datajson 
        }, success:function(response){
            alert(response);
            location.href = "<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/";
        }
    });
  }

  function simpanData(key) {
    var data1 = $("select[name=data1]").val();
    var data2 = $("select[name=data2]").val();
    var data3 = $("select[name=data3]").val();
    var data4 = $("select[name=data4]").val();
    var data5 = $("select[name=data5]").val();
    var data6 = $("select[name=data6]").val();
    var data7 = $("select[name=data7]").val();
    var data8 = $("select[name=data8]").val();
    var data9 = $("select[name=data9]").val();
    var datajson = '{"data1":"'+data1+'","data2":"'+data2+'","data3":"'+data3+'","data4":"'+data4+'","data5":"'+data5+'","data6":"'+data6+'","data7":"'+data7+'","data8":"'+data8+'","data9":"'+data9+'"}';

    $.ajax({
        url: "<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/simpan_data/",
        method: "POST",
        dataType: "text",
        data: {
          iddata: key,
          datakirim: datajson 
        }, success:function(response){
            alert(response);
            location.href = "<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/";
        }
    });
  }

</script>
