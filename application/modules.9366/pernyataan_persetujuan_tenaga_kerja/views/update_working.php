<style type="text/css">

  .opsi{
    background-color: #777;
    color: white;
    widows: auto;
    height: 150px;
    overflow-y: scroll;
  }

  .opsi-close{
    background-color: #777;
    color: white;
    widows: auto;
    overflow-y: scroll;
  }

  .multiple-select{
    display: block;
    padding: 0;
    margin: 0;
  }

  .multiple-select li{
    display: block;
    padding: 0;
    margin: 0;
  }

  .multiple-select input{
    display: inline-block;
  }

  .multiple-select label{
    display: inline-block;
    padding: 10px;
    width: 100%;
    border-bottom: 1px solid #ddd;
  }

  .multiple-select label:hover{
    background-color: blue;
    color: white;
  }

.opsi{
  display: none;
}

.opsi-close{
  display: none;
}

.inline label{
  display: block;
}

.inline .l-25{
  margin-left: 2.5%;
  margin-right: : 2.5%;
  width: 20%;
  display: inline-block;
}

.inline .l-50{
  margin-left: 2.5%;
  margin-right: : 2.5%;
  width: 45%;
  display: inline-block;
}

.close{
  position: absolute;
  background-color: transparent;
  display: inline-block;
  padding: 7px; 
  margin: 2.5px;
  text-align: center;
  font-size: 15px;
  border-right: 1px solid #ddd;
}

</style>


<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="row">
                <div id='style-judul' class="col-lg-6">
                   <div class="panel panel-primary panel-bordered">

                    <div class="panel-heading">
                      <h3>Ubah data working</h3>
                      </div>
                      <div class="panel-body">

                        <form action="<?php echo site_url();?>/pernyataan_persetujuan_tenaga_kerja/update_data_working" enctype="multipart/form-data" method="post" class="form-horizontal">

                          <input type="hidden" name="idworking" value="<?= $idworking; ?>">


                        <div class="form-group">
                          <label id="id">受雇國家 Negara</label>
                          <select class="form-control" name="negara">
                            <?php foreach($negara as $key => $datanya) : ?>
                              <?php $kondisinegara = $datanya->isi.' '.$datanya->mandarin; ?>
                              <?php if($kondisinegara == $working->negara) : ?>
                                <option selected="selected"><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                                <?php else : ?>
                                <option><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                              <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                          <label id="id">業務類別 Jenis Usaha</label>
                          <select class="form-control" name="jenis_usaha">
                              <?php foreach($kategoripekerjaan as $key => $datanya) : ?>
                              <?php if($datanya->id_kategori == $working->jenis_usaha) : ?>
                                <option onclick="ubahdatapekerjaan('<?= $datanya->id_kategori; ?>')" selected="selected" value="<?= $datanya->id_kategori; ?>"><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                                <?php else : ?>
                                <option aksi="ubah" datanya="<?= $datanya->id_kategori; ?>" value="<?= $datanya->id_kategori; ?>"><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                              <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="ganti-menu">工作性質 Penjelasan pekerjaan</label>
                          <div style="position: relative; padding: 0; margin: 0;">
                            <a class="close" type="button">X</a>
                          <input style="padding-left: 30px; " type="text" id="ganti-menu" class="form-control pilihopsi open-menu" name="penjelasan" value="<?= $working->penjelasan; ?>" placeholder="tambahkan data">
                          </div>
                          <div class="opsi-close">
                          <button type="button" class="close-menu btn btn-danger">close</button>
                          </div>
                          <div class="opsi">
                            <ol class="multiple-select">
                              <li><label><input type="checkbox" name="data" value="option 1"> Option 1</label></li>
                              <li><label><input type="checkbox" name="data" value="option 2"> Option 2</label></li>
                            </ol>
                          </div>
                        </div>

                        <div class="form-group">
                          <label id="id">職務 Posisi</label>
                            <select class="form-control" name="posisi">
                              <?php foreach($posisi as $key => $datanya) : ?>
                              <?php $kondisinegara = $datanya->isi.' '.$datanya->mandarin; ?>
                              <?php if($kondisinegara == $working->posisi) : ?>
                                <option selected="selected"><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                                <?php else : ?>
                                <option><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                              <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <div class="control-group">
                              <label class="control-label"> Barang Diproduksi </label>
                              <select class="form-control " name="barangdiproduksi" data-placeholder="Choose a Category" tabindex="1">
                                  <option value="" />Select...
                                  <?php  foreach ($pilihan_barangdiproduksi as $pilihan) { 
                                      $selected = "";
                                    if ($pilihan->isi == $working->barangdiproduksi) {
                                      $selected = "selected";
                                    }
                                    ?>
                                      <option value="<?php echo $pilihan->isi;?>" <?php echo $selected; ?> /><?php echo $pilihan->isi;?>
                                  <?php } ?>
                              </select>
                          </div>
                        </div>

                        <div class="form-group inline">
                          <label id="id">受雇期間 Masa Kerja</label>
                            <select class="form-control l-50" name="masa_kerja">
                          <option value=""> - pilih -</option>
                              <?php for($i=1; $i<=50; $i++) : ?>
                                <?php if(($i." tahun 年") == $working->masa_kerja) : ?>
                                  <option selected="selected"><?= $i." tahun 年"; ?></option>                            
                                    <?php else : ?>
                                  <option><?= $i." tahun 年"; ?></option>                            
                                <?php endif; ?>
                            <?php endfor; ?>
                            </select>

                            <select class="form-control l-50" name="masabulan">
                              <?php if($working->masa_kerja != null) : ?>
                                <option selected="selected"><?= $working->masa_kerja; ?></option> 
                              <?php endif; ?>
                              <option value=""> - pilih -</option>
                              <?php for($i=1; $i<=3; $i++) : ?>
                                  <option><?= $i." minggu 個星期"; ?></option>                            
                              <?php endfor; ?>
                              <?php for($i=1; $i<=12; $i++) : ?>
                                  <option><?= $i." bulan 月 "; ?></option>                            
                              <?php endfor; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                          <label id="id">年 Tahun</label>
                          <input type="text" name="tahun" id="id" value="<?= $working->tahun; ?>" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                          <label id="id">離職原因 Alasan berhenti bekerja</label>
                          <select class="form-control" name="alasan">
                              <?php foreach($alasan as $key => $datanya) : ?>
                              <?php $kondisinegara = $datanya->isi.' '.$datanya->mandarin; ?>
                              <?php if($kondisinegara == $working->alasan) : ?>
                                <option selected="selected"><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                                <?php else : ?>
                                <option><?= $datanya->isi.' '.$datanya->mandarin; ?></option>                            
                              <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                          <label id="id">Nama Perusahaan</label>
                          <input type="text" name="nama_perusahaan" value="<?= $working->nama_perusahaan; ?>" id="id" class="form-control" placeholder="">
                        </div>

                        <div class="form-group inline">
                          <label id="id">Gaji</label>
                            <select class="form-control l-25" name="satuan">
                              <?php $data_mata_uang = array(" - pilih - ","RP", "NT", "IDR", "USD $", "RM", "YEN"); ?>
                              <?php for($i=0; $i< count($data_mata_uang); $i++) : ?>
                                <?php if($data_mata_uang[$i] == strtoupper($working->satuan)) : ?>
                                  <option selected="selected"><?= $data_mata_uang[$i]; ?></option>                            
                                    <?php else : ?>
                                  <option><?= $data_mata_uang[$i]; ?></option>                            
                                <?php endif; ?>
                            <?php endfor; ?>
                            </select>

                            <input type="text" id="rupiah" name="gaji" value="<?= $working->gaji; ?>" class="form-control l-50 uang" name="">

                            <select class="form-control l-25" name="detail_gaji">
                              <?php $data_per_hari = array(" - pilih - ","/hari", "/minggu", "/bulan", "/perkiraan"); ?>
                              <?php $data_per_hari_mandarin = array("","這一天", "週", "月", ""); ?>
                              <?php for($i=0; $i< count($data_per_hari); $i++) : ?>
                                <?php if($data_per_hari[$i] == $working->detail_gaji) : ?>
                                  <option selected="selected" value="<?= $data_per_hari[$i]; ?>"><?= $data_per_hari[$i].''.$data_per_hari_mandarin[$i]; ?></option>                            
                                    <?php else : ?>
                                  <option value="<?= $data_per_hari[$i]; ?>"><?= $data_per_hari[$i].''.$data_per_hari_mandarin[$i]; ?></option>                            
                                <?php endif; ?>
                            <?php endfor; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success pull-right">Update Data</button>

                        </form>
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
    tampilkan();


    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, '');
    });
 
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }



  });

  function tampilkan(){
    $
  }

  $(".open-menu").click(function(){
    $(".opsi").css({"display":"block"});
    $(".opsi-close").css({"display":"block"});
  });

  $(".close-menu").click(function(){
    $(".opsi").css({"display":"none"});
    $(".opsi-close").css({"display":"none"});
  });


  $(".close").click(function(){
    $("#ganti-menu").removeAttr("value");
  });


 $("input[name=penjelasan]").click(function(){
    var data = $("select[name=jenis_usaha]").val();
    $.ajax({
      url: "<?= site_url(); ?>/pernyataan_persetujuan_tenaga_kerja/dapatkan_data_datapekerjaan/"+data,
      success:function(response){
        $(".multiple-select").html(response);
          
          $("input[name=data]").click(function(){
            var data = $(this).val()+',';
            var data2 = $("input[name=penjelasan]").val();
            var tambah = data+' '+data2;
            if (this.checked) {
              $("input[name=penjelasan]").attr("Value", tambah);
            }else{
              var ambil = $("input[name=penjelasan]").val();
              var ubah = ambil.replace(data,"");
              $("input[name=penjelasan]").attr("Value", ubah);
            }
          })

      }
    })
 })
</script>