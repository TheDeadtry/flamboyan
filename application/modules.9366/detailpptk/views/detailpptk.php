<style type="text/css">

table{
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
  font-size: 12px;
}

table th{
  padding: 10px;
  background-color: #abc; 
  color: white;
  border: 1px solid #ddd;
  text-align: center;
}

table td{
  padding: 10px;
  border: 1px solid #ddd; 
}


table tbody td{
  margin-left: 20px;
  margin-right: 10px;
}

table tbody td:nth-child(2){
  text-align: center;
}
table tbody td label{
  margin-left: 20px;
  margin-right: 10px;
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
            <div class='title'>Detail Pernyataan Persetujuan Tenaga Kerja</div>
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
             <table>
              <thead>
                <tr>
                  <th>PERNYATAAN PERSETUTUAN TENAGA KERJA</th>
                  <th>BISA / TIDAK</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>APAKAH ANDA BERSEDIA SETIAP BULAN WAJIB TABUNG NT.3000 ?</td><td><select name="data2"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select> </td></tr>
                <tr><td>APAKAH ANDA BERSEDIA KERJA SESUAI PENGATURAN SHIF KERJA ( LIBUR TIDAK SELALU SABTU MINGGU ) ?</td><td><select name="data3"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                <tr><td>APAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI SUHU YANG TINGGI ?</td><td><select name="data4"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                <tr><td>PAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI SUARA YANG BISING ?</td><td><select name="data5"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                <tr><td>APAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI KOTOR ?</td><td><select name="data6"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                <tr><td> APAKAH ANDA BERSEDIA BEKERJA DENGAN KONDISI BAU KIMIA/ MENYENGAT ?</td><td><select name="data7"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                <tr><td>APAKAH ANDA BERSEDIA BEKERJA BERAT ( ANGKA BEBAN BERAT DIATAS 50 KG, BERDIRI DIATAS 8 JAM) ?</td><td><select name="data8"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
                <tr><td>APAKAH ANDA BERSEDIA BEKERJA LEMBUR SESUIA PENGATURAN KANTOR ?</td><td><select name="data9"><option value="NULL"> --- PILIH JAWABAN --- </option><option value="1">YA BERSEDIA / 願意</option><option value="0">TIDAK BERSDIA / 不能</option></select>  </td></tr>
              </tbody>
            </table>
            <div id="aksi">
                ...
            </div>
            
<!-- ################################################################################################################################################################################################################################################### -->
                        <!-- AREA EDITING -->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var idTki = '<?=$detailpersonalid; ?>';
        var cheker = '<?= $checker; ?>';
        if (cheker != '') {
            dataditampilkan();
            $("#aksi").html('<input type="button" onclick="updateData('+"'"+idTki+"'"+')" class="btn btn-success"  value="Update">');
        }else{
            $("#aksi").html('<input type="button" onclick="simpanData('+"'"+idTki+"'"+')" class="btn btn-success"  value="simpan">');
        }

    });



    function simpanData(key){
        var data2 = $("select[name=data2]").val();
        var data3 = $("select[name=data3]").val();
        var data4 = $("select[name=data4]").val();
        var data5 = $("select[name=data5]").val();
        var data6 = $("select[name=data6]").val();
        var data7 = $("select[name=data7]").val();
        var data8 = $("select[name=data8]").val();
        var data9 = $("select[name=data9]").val();
        var datajson = '{"data2":"'+data2+'","data3":"'+data3+'","data4":"'+data4+'","data5":"'+data5+'","data6":"'+data6+'","data7":"'+data7+'","data8":"'+data8+'","data9":"'+data9+'"}';
        
        $.ajax({
            url: "<?= site_url(); ?>/detailpptk/simpan_data",
            method: "POST",
            dataType: "text",
            data: {
                id_tki: key,
                isiData: datajson
            }, success:function(response){
                alert(response);
                location.reload();
            }
        });
    }


    function dataditampilkan(key){
    $.ajax({
        url: '<?= site_url(); ?>/detailpptk/datadiambil/<?=$detailpersonalid; ?>',
        success:function(response){
            var dataJSON = JSON.parse(response);
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
    var data2 = $("select[name=data2]").val();
    var data3 = $("select[name=data3]").val();
    var data4 = $("select[name=data4]").val();
    var data5 = $("select[name=data5]").val();
    var data6 = $("select[name=data6]").val();
    var data7 = $("select[name=data7]").val();
    var data8 = $("select[name=data8]").val();
    var data9 = $("select[name=data9]").val();
    var datajson = '{"data2":"'+data2+'","data3":"'+data3+'","data4":"'+data4+'","data5":"'+data5+'","data6":"'+data6+'","data7":"'+data7+'","data8":"'+data8+'","data9":"'+data9+'"}';

    $.ajax({
        url: "<?= site_url(); ?>/detailpptk/update_Data/",
        method: "POST",
        dataType: "text",
        data: {
          id_tki: key,
          isiData: datajson 
        }, success:function(response){
            alert(response);
            location.reload()
        }
    });
  }
</script>                       
