<style type="text/css">
    .data-nama{
        margin: 5px;
    }

    .data-nama{
        max-width: 200px;
    }

    .data-nama > h3, .data-nama p{
        padding: 0;
        margin: 0;
    }

     .slide-data{
        margin: 0;
        padding: 0;
        background-color: #ccf;
        min-height: 900px;
        position: relative;
     }

     .data-edit{
        position: absolute;
        margin: 20px;
        padding: 25px;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: white;
     }

     .edit-data{
        position: absolute;
        top: 0;
        right: 0;
        margin: 10px;
        z-index: 9997
     }



     #negara, #jenisusaha, #detailpekerjaan, #posisi, #namaperusahaan{
        display: inline-block; 
        width: 95%;
     }

     #namaperusahaan{
        border-collapse: collapse;
        padding: 0;
        margin: 0;
     }

     .masakerja{
        display: inline;
     }

     #masakerja{
        min-width: 50px;
        max-width: 50px;
        margin: 10px;
     }

     #masabulan{
        min-width: 50px;
        max-width: 50px;  
        margin: 10px;
     }

     #tahun{
        display: inline;
        min-width: 100px;
        max-width: 150px;  
        margin: 10px;
     }

     #alasanberhenti{
        display: inline-block;
        width: 95%;
     }

     label{
        margin: 5px;
     }

     .grid-7, .grid-5{
        padding: 10px;
        overflow-y: scroll;
     }

     .grid-5{
        border-left: 1px solid #777;
     }

     .grid-5 > li {
        list-style: none;
        display: block;
        border-bottom: 1px solid #777;
     }

     .grid-5 > li > input, .grid-5 > li > label{
        padding: 10px;
        display: inline-block;
        font-size: 1.3em;
     }

     .grid-5 > li > button{
        width: 100%;
        display: inline;
        background-color: transparent;
        border: none;

     }

     select > option{
        display: block;
        padding: 5px;
        border-bottom: 1px solid #777;
     }

     .gaji{
        display: inline-block;
     }

     #satuan{
        width: 50px;
     }

     #nilaigaji{
        width: 150px;
     }

     #detailgaji{
        width: 50px;
     }

     input {
        margin: 5px;
     }

     .simpan{
        margin-top: 30px;
        margin: 10px;
        width: 95%;
        font-size: 20px;
     }

     .data-ada{
        visibility: visible;
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        align-items: center;
        justify-content: center;
        overflow-x: scroll;
     }

     .data-tambah{
        visibility: hidden;
        display: grid;
        position: absolute;
        padding: 20px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        grid-template-columns: 7fr 5fr;
     }

     table{
        border-collapse: collapse;
        white-space: nowrap;
     }

     th{
        background-color: #ddd;
     }

     th, td{
        border: 1px solid #abb;
        padding: 5px;
     }
     
     .btn-danger{
        margin-left: 5px;
     }
</style>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
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
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>	                       


<div class="row-fluid">
    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
        <div class='box-header blue-background'>
            <div class='title'>PENGALAMAN KERJA</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
            </div>
        </div>
        <div class='box-content box-no-padding'>
            <?php foreach ($tampil_data_personal as $row) { ?>
               <div class="span3">
          
  
                                    
            <?php 
            $fotoo = base_url()."assets/uploads/".$row->foto;
            $exif = exif_read_data($fotoo);
            if($exif && isset($exif['Orientation']))
            {
                $orien = $exif['Orientation'];
                if ($orien != 1)
                {
                    $img=imagecreatefromjpeg($fotoo);
                    $deg = 0;
                    switch ($orien)
                    {
                        case 3:
                        $deg = 180;
                        break;
                        case 6:
                        $deg = 270;
                        break;
                        case 8:
                        $deg = 90;
                        break;
                    }
                    if ($deg)
                    {
                        $img = imagerotate($img, $deg, 0);
                        echo '<div style="display: table;"><div style="padding: 50% 0;height: 0;"><a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.$fotoo.'" style="display: block;transform-origin: top left;-ms-transform:rotate(270deg) translate(-100%); -webkit-transform:rotate(270deg) translate(-100%); transform:rotate(270deg) translate(-100%); margin-top: -50%;white-space: nowrap;" /></a></div></div>';
                    }
                    else
                    {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                    }
                }
                else
                {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
                }
            }
            else
            {
                        echo '<a class="text-center profile-pic" data-toggle="modal" href="#uploadfoto" role="button"><img src="'.base_url()."assets/uploads/".$row->foto.'" /></a>';
            }
        ?>
                     <?php 
                         $this->load->view('template/menudalam');
                    ?>
                </div>

            <?php }; ?>
        </div>

        <div class="span8">
            <?php if($row->skill1==""){?>
                <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
            <?php }else{?>
                <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
            <?php }?>                               


                        <!-- AREA EDITING -->
<!-- ################################################################################################################################################################################################################################################### -->

<input type="button" class="btn btn-success tambahkandata" onclick="tambahkandata()" value="Tambahkan Data"><br>
<br>
<div class="slide-data">
    <!-- <button class="btn btn-success edit-data">edit</button> -->
    <div class="data-edit">

        <!-- daerah content edit tampil dan simpan -->

        <div class="data-ada">
            <table class="dataworking">
                <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>受雇國家 Negara</th>
                        <th>公司名稱NAMA PERUSAHAAN</th>
                        <th>業務類別 Jenis Usaha</th>
                        <th>工作性質 Penjelasan pekerjaan</th>
                        <th>職務 Posisi</th>
                        <th>受雇期間 Masa Kerja</th>
                        <th>年 Tahun</th>
                        <th>離職原因 Alasan berhenti bekerja</th>
                        <th>收入/薪資INCOME/GAJI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>


        <!-- daerah tambah data view -->


        <div class="data-tambah">
            <div class="grid-7">
            <form>               
                <div class="ui-widget">
                       <label for="negara">受雇國家 Negara</label>
                       <input id="negara" autofocus="" name="negara">
                </div>

               <label for="namaperusahaan">公司名稱NAMA PERUSAHAAN</label>
               <input id="namaperusahaan" name="namaperusahaan">

                <div class="ui-widget">
                       <label for="jenisusaha">業務類別 Jenis Usaha</label>
                       <input id="jenisusaha" name="jenisusaha">
                </div>

                <label>工作性質 Penjelasan pekerjaan</label>
                <select id="detailpekerjaan" name="detailpekerjaan" multiple="multiple"></select>

                <div class="ui-widget">
                       <label for="posisi">職務 Posisi</label>
                       <input id="posisi" name="posisi">
                </div>

               <label>受雇期間 Masa Kerja</label>
               <input type="number" id="masakerja" class="masakerja" name="masakerja"><label class="masakerja">tahun 年</label>
               <input type="number" id="masabulan" class="masakerja" name="masabulan"><label class="masakerja">bulan 月</label>

               <label for="tahun">年 Tahun</label>
               <input type="text" id="tahun" name="tahun">

               <div class="ui-widget">
                       <label for="alasanberhenti">離職原因 Alasan berhenti bekerja</label>
                       <input id="alasanberhenti" autofocus="" name="alasanberhenti">
                </div>

                <label for="alasanberhenti">收入/薪資INCOME/GAJI</label>
                <div class="ui-widget gaji">
                    <label for="satuan">Satuan</label>
                    <input id="satuan" name="satuan">
                </div>
                <div class="ui-widget gaji">
                    <label for="nilaigaji">Nilai gaji</label>
                    <input id="nilaigaji" name="nilaigaji">
                </div>
                <div class="ui-widget gaji">
                    <label for="detailgaji">Detail Gaji</label>
                    <input id="detailgaji" name="detailgaji">
                </div>
            
            <button type="submit" class="simpan btn btn-success" onclick="simpan()">simpan</button>
            </form>
            </div>

            <div class="grid-5">
                <h3>Data Pilih</h3>
                
                <li><input type="checkbox" class="datadetailpekerjaan" id="data2" value="data2"><label for="data2"> Data 2</label></li>
            </div>

        </div>


        <!-- end of content -->
    </div>
</div>

<!-- ################################################################################################################################################################################################################################################### -->
                        <!-- AREA EDITING -->
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        var matauang = "Rp NT";
        var satuan = matauang.split(" ");

        $("#satuan" ).autocomplete({
        source: satuan
        });

        var per = "/bulan /hari /tahun /minggu";
        var detailgaji = per.split(" ");

        $("#detailgaji" ).autocomplete({
        source: detailgaji
        });

        
        var nilai = $("select[name='detailpekerjaan']").val();
        $(".grid-5").append(nilai);

        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/datakategoripekerjaanAutocomplete",
            success:function(response){
                var ary = JSON.parse(response);
                $("#jenisusaha" ).autocomplete({
                source: ary
                });
            }
        });

        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/datanegaraAutocomplete",
            success:function(response){
                var ary = JSON.parse(response);
                $("#negara" ).autocomplete({
                source: ary
                });
            }
        });

        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/dataposisiAutocomplete",
            success:function(response){
                var ary = JSON.parse(response);
                $("#posisi" ).autocomplete({
                source: ary
                });
            }
        });


        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/dataalasanberhentiAutocomplete",
            success:function(response){
                var ary = JSON.parse(response);
                $("#alasanberhenti" ).autocomplete({
                source: ary
                });
            }
        });

        tampilkandataworking();

    });

    function tampilkandataworking(){
        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/tampildataworking/<?= $detailpersonalid; ?>",
            success:function(response){
                $(".dataworking tbody").html(response);
            }
        });        
    }

    function hapus(key){
        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/hapusdata/"+key,
            success:function(response){
                tampilkandataworking();
            }
        });
    }



// function move ###############################################################################################################


    function tambahkandata(){

        $("<input type='button' class='btn btn-default kembali' onclick='kembali()' value='kembali'>").insertAfter(".tambahkandata");

        $(".data-ada").css({"visibility":"hidden"});
        $(".data-tambah").css({"visibility":"visible"});
    }

    function kembali(){
        $(".data-ada").css({"visibility":"visible"});
        $(".data-tambah").css({"visibility":"hidden"});
        $(".kembali").remove();
    }

    function editdata(key){
        
      $.ajax({
            url: "<?= site_url(); ?>/detailexperience/tampileditworking/"+key,
            success:function(response){
                var delta = JSON.parse(response);
                $("input[name='negara']").val(delta.negara);
                $("input[name='namaperusahaan']").val(delta.nama_perusahaan);
                $("input[name='jenisusaha']").val(delta.jenis_usaha);
                $("input[name='posisi']").val(delta.posisi);

                var masa_kerja = delta.masa_kerja;
                if (masa_kerja.search(" tahun 年") != '') {
                    var cariMasakerja = masa_kerja.search(" tahun 年");
                    var datadidapatDarimasakerja = masa_kerja.substr(0, cariMasakerja);
                }
                $("input[name='masakerja']").val(datadidapatDarimasakerja);

                var masa_bulan = delta.masabulan;
                if (masa_bulan.search(" bulan 月") != '') {
                    var cariMasabulan = masa_kerja.search(" bulan 月");
                    var datadidapatDarimasabulan = masa_bulan.substr(0, cariMasabulan);
                }

                $("input[name='masabulan']").val(datadidapatDarimasabulan);


                $("input[name='tahun']").val(delta.tahun);
                $("input[name='alasanberhenti']").val(delta.alasan);
                $("input[name='satuan']").val(delta.satuan);
                $("input[name='nilaigaji']").val(delta.gaji);
                $("input[name='detailgaji']").val(delta.detail_gaji);


            }
        });

        $("<input type='button' class='btn btn-default kembali' onclick='kembali()' value='kembali'>").insertAfter(".tambahkandata");
        $(".simpan").text('Update').attr("onclick", "updatedata("+'"'+key+'"'+")");
        $(".data-ada").css({"visibility":"hidden"});
        $(".data-tambah").css({"visibility":"visible"});
    }
  


// ##################################################################################################################################
    

 
// ################_______

    // // ketika input posisi diklik____________________
    
    $("input[name='alasanberhenti']").click(function(){
        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/dataalasanberhenti",
            success:function(response){
                $('.grid-5').html(response);
                
            }
        });

    });


// mengganti value dari input posisi ______________________________
    function alasan(key){
        $("input[name='alasanberhenti']").val(key);
    }



// ################_______

    // // ketika input posisi diklik____________________
    
    $("input[name='posisi']").click(function(){
        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/dataposisi",
            success:function(response){
                $('.grid-5').html(response);
                
            }
        });

    });


// mengganti value dari input posisi ______________________________
    function posisi(key){
        $("input[name='posisi']").val(key);
    }


// ################_______

    // // ketika input negara diklik____________________
    
    $("input[name='negara']").click(function(){
        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/datanegara",
            success:function(response){
                $('.grid-5').html(response);
                
            }
        });

    });


// mengganti value dari input negara______________________________
    function negara(key){
        $("input[name='negara']").val(key);
    }



// ################_______

    // // ketika input jenisusaha diklik____________________

    $("input[name='jenisusaha']").click(function(){
        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/datakategoripekerjaan",
            success:function(response){
                $('.grid-5').html(response);
                
            }
        });

    });


// mengganti value dari input jenis usaha ______________________________
    function kategoripekerjaan(key){
        $("input[name='jenisusaha']").val(key);
    }

// ################_______


    // ketika select name detailpekerjaan diklik jalankan function 

    $("select[name='detailpekerjaan']").click(function() {
        $("select option").remove();
        
        var datadiminta = $("input[name='jenisusaha']").val();

        $.ajax({
            url: "<?= site_url(); ?>/detailexperience/datapekerjaan",
            method: "POST",
            dataType: "text",
            data: {
                diminta : datadiminta
            },success:function(response){
                // var data = '';
                // var ary = JSON.parse(response);
                // var aryLength = ary.length;
                // for (var i = 0; i < aryLength; i++) {
                //     data += '<li><input type="checkbox" class="datadetailpekerjaan" id="data'+i+'" value="'+ary[i]+'"><label for="data'+i+'">'+ary[i]+'</label></li>';
                // }
                
                // $('.grid-5').html(ary[0]);
                $('.grid-5').html(response);
                
                // ################_______
                    // ketika datadetailpekerjaam dipilih dan kondisi checked jalankan function 

                    $(".datadetailpekerjaan").change(function() {
                        var data = $(this).val();
                        if(this.checked) {
                            $('select[name="detailpekerjaan"]').append('<option value="'+data+'" selected>'+data+'</option>');
                        }else{
                            $('option[value="'+data+'"]').remove();
                        }
                    });
            }
        });
    });




// ################_______


    // simpan data 

    function simpan(){

        // ambil niali dari form negara
        var negara = $("input[name='negara']").val();

        // ambil nilai dari form 
        var namaperusahaan = $("input[name='namaperusahaan']").val();

        // ambil nilai dari form jenisusaha
        var jenisusaha = $("input[name='jenisusaha']").val();

        // ambil nilai dari form posisi

        var posisi = $("input[name='posisi']").val(); 

        // mengambil data form masakerja
        var masakerja = $("input[name='masakerja']").val()+' tahun 年';
        
        // mengambil data form masabulan
        var masabulan = $("input[name='masabulan']").val()+' bulan 月';

        // mengambil nilai form tahun
        var tahun = $("input[name='tahun']").val();

        // mengambil nilai form alasanberhenti
        var alasanberhenti = $("input[name='alasanberhenti']").val();

        // mengambil nilai form satuan
        var Satuan = $("input[name='satuan']").val();

        // mengambil nilai form nilaigaji
        var nilaigaji = $("input[name='nilaigaji']").val();


        // mengambil nilai form detailgaji
        var detailgaji = $("input[name='detailgaji']").val();


        // -------- ambil nilai penje;asan
        var penjelasan = "";
        $( "select option:selected" ).each(function() {
          penjelasan += $( this ).text() + " ";
        });

                $.ajax({
                    url: "<?= site_url(); ?>/detailexperience/simpandata",
                    method: "POST",
                    dataType: "text",
                    data: {
                        
                    id_biodata: '<?= $detailpersonalid; ?>',
                    negara : negara,
                    jenis_usaha: jenisusaha,
                    posisi : posisi,
                    penjelasan : penjelasan,
                    masa_kerja : masakerja,
                    masa_bulan : masabulan,
                    tahun : tahun,
                    alasan : alasanberhenti,
                    nama_perusahaan : namaperusahaan,
                    satuan : Satuan,
                    gaji : nilaigaji,
                    detail_gaji: detailgaji

                    }, success:function(response){
                        alert(response);
                        tampilkandataworking();

                    }
                });
    }

    function updatedata(key){

        // ambil niali dari form negara
        var negara = $("input[name='negara']").val();

        // ambil nilai dari form 
        var namaperusahaan = $("input[name='namaperusahaan']").val();

        // ambil nilai dari form jenisusaha
        var jenisusaha = $("input[name='jenisusaha']").val();

        // ambil nilai dari form posisi

        var posisi = $("input[name='posisi']").val(); 

        // mengambil data form masakerja
        var masakerja = $("input[name='masakerja']").val()+' tahun 年';
        
        // mengambil data form masabulan
        var masabulan = $("input[name='masabulan']").val()+' bulan 月';

        // mengambil nilai form tahun
        var tahun = $("input[name='tahun']").val();

        // mengambil nilai form alasanberhenti
        var alasanberhenti = $("input[name='alasanberhenti']").val();

        // mengambil nilai form satuan
        var Satuan = $("input[name='satuan']").val();

        // mengambil nilai form nilaigaji
        var nilaigaji = $("input[name='nilaigaji']").val();


        // mengambil nilai form detailgaji
        var detailgaji = $("input[name='detailgaji']").val();


        // -------- ambil nilai penje;asan
        var penjelasan = "";
        $( "select option:selected" ).each(function() {
          penjelasan += $( this ).text() + " ";
        });

                $.ajax({
                    url: "<?= site_url(); ?>/detailexperience/updatedataworking",
                    method: "POST",
                    dataType: "text",
                    data: {
                        
                    id_biodata: '<?= $detailpersonalid; ?>',
                    negara : negara,
                    jenis_usaha: jenisusaha,
                    posisi : posisi,
                    penjelasan : penjelasan,
                    masa_kerja : masakerja,
                    masa_bulan : masabulan,
                    tahun : tahun,
                    alasan : alasanberhenti,
                    nama_perusahaan : namaperusahaan,
                    satuan : Satuan,
                    gaji : nilaigaji,
                    detail_gaji: detailgaji,
                    id_working: key

                    }, success:function(response){
                        tampilkandataworking();

                    }
                });
    }



</script>                    
