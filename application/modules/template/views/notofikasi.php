<style>
    .infored{
        color:red !important;
    }
    .infored::hover{
        color:#333 !important;
    }
</style>
<div class="modal fade" style="color:black;" id="notifikasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">TKI Terlambat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notifikasi-data">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<li class="dropdown dropdown-user">
    <a class="dropdown-toggle" data-toggle="dropdown">
        <div style="display:flex; align-items:center; height: 30px;">
            <i style="font-size:20px;margin-right:10px;" class="fas fa-bell"></i>
            <i class="caret"></i>
        </div>
    </a>

    <ul class="dropdown-menu dropdown-menu-right">
        <li data-name="telambat" data-kode='l' class="opennotif"><a href="#" class="infored"><i class="fas fa-bell"></i> Tki IP Terlambat Kembali (Laki-laki)</a></li>
        <li data-name="telambat" data-kode='p' class="opennotif"><a href="#" class="infored"><i class="fas fa-bell"></i> Tki IP Terlambat Kembali (Perempuan)</a></li>
        <li data-name="belumkembali" data-kode='l' class="opennotif"><a href="#"><i class="fas fa-bell"></i> TKI IP (Laki-laki)</a></li>
        <li data-name="belumkembali" data-kode='p' class="opennotif"><a href="#"><i class="fas fa-bell"></i> TKI IP (Perempuan)</a></li>
    </ul>
</li>
<script>
    console.log(Array.from(document.querySelectorAll(".opennotif")))
    for(let c of Array.from(document.querySelectorAll(".opennotif"))){
        c.addEventListener('click', function(){
            let kode = this.dataset.kode;
            console.log(kode);
            let query = {
                "terlambat": `SELECT * FROM tki_pulang_belum_kembali_terlambat WHERE jk = '${kode}'`
                ,"belumkembali": `SELECT * FROM tki_pulang_belum_kembali WHERE jk = '${kode}'`
            };
            let nm = this.dataset.name;
            let qr = query[this.dataset.name];
            (async function(){
                let [data] = await getDataTable(qr);
                $("#staticBackdropLabel").html(nm == 'terlambat'? 'TKI Terlambat Kembali': 'TKI Belum Kembali');
                $("#notifikasi-data").html(`
                    <div style="max-height: 70vh; overflow-y:scroll;">
                    ${Array.isArray(data) && data.length > 0 ? data. map(function(q){
                        return `
                        <div style="border-bottom: 1px solid #ddd; display:grid;grid-template-columns: 80px auto 120px;">
                            <div>${q.nodaftar}</div>
                            <div>${q.nama}</div>
                            <div>keluar : ${q.tglkeluar}</div>
                        </div>
                        `
                    }).join('') : `
                        <div class="text-center">
                            Tidak ada notifikasi
                        </div>
                    `}
                    </div>
                `);
                $("#notifikasi").modal('show');
            })();
        },false)
    }
</script>