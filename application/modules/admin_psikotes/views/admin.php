<div id="app"> 
</div>

<script>

    const cfg = {

    }

    const iframe = el('iframe').width("100%").height("calc(100vh - 80px)")
    .css({
        outline:'none'
        , border:'none'
        , background:'white'
    })
    .load(loadIframe)
    .get();

    _id("app").appendChild(iframe);    

    const container3 = _id("app").parentNode
    const container2 = _id("app").parentNode.parentNode
    const container = _id("app").parentNode.parentNode.parentNode

    console.log(container3);
    container3.style.height = '100vh';

    container.style.margin = 0;
    container.style.padding = 0;

    function loadIframe(e){
        let iframe = e.el
        // Access the document inside the iframe
        let iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
        iframeDocument.open()
        iframeDocument.write(`
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Iframe Content</title>\
                    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
                    <style>
                        
                        table.dataTable > thead > tr > th, table.dataTable > thead > tr > td {
                            padding: 5px;
                            padding-right: 5px;
                            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
                        }

                    </style>
                </head>
                <body>
                    <div style="padding:14px 20px; border-bottom: 1px solid #ddd"> 
                        <h1 style="font-size: 24px;margin:0;">Psikotes</h1>
                        <p style="margin: 0; font-size: 12px; font-weight: 400;">menampilkan data tki yang sudah psikotes dan belum psikotes</p>
                    </div>

                    <div style="padding: 10px;" class="form-group">
                        <div class="form-group">
                            <label>Status</label>
                            <select id="statusdata" class="form-control">
                                <option value="v">Sudah Psikotes</option>
                                <option value="x">Belum Psikotes</option>
                            </select>
                            <button id="opendata" class="btn btn-sm btn-primary mt-2">Tampilkan Data</button>
                        </div>
                    </div>
                    <div style="padding:20px;">
                        <table  id="data-show">
                            <thead>
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <th>NO</th>    
                                    <th style="min-width: 260px;">PIENHAO-NAMA TKI</th>    
                                    <th>KETERANGAN</th>    
                                </tr>
                            <thead>
                            <tbody>
                            <tbody>
                        </table>
                    </div>
                </body>
            </html>
        `);


        function loadscript(a, loc='head'){
            return new Promise((resolve,reject) => {
                try{
                    iframeDocument[loc].appendChild(
                        el('script').src(a).load(function(e){
                            resolve(e.el)
                        }).get()
                    )
                }catch(e){
                    reject(e)
                }
            }) 
        };

        (async function(){
            await loadscript('https://code.jquery.com/jquery-3.7.1.js');
            await loadscript('https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js');
            await loadscript('https://cdn.datatables.net/2.1.3/js/dataTables.min.js');
            await loadscript('https://app.flamboyangemajasa.com/api/app/bundle.js?v=9');
            iframeDocument.body.appendChild(
                el('script').html(`
                    const datalogin = 'eyJpZCI6IjE4IiwiZm90byI6IiIsIm5hbWEiOiJ2ZHMiLCJsZXZlbCI6IjEiLCJ1c2VybmFtZSI6ImFkbWluIiwicGFzc3dvcmQiOiJlNjY5OTc1ZGFkYzc2OTEyNGZiMjI1ZTJiNmQ1NGVlMDUzMGYyMWYyIiwicGFzc3dvcmR2aWV3IjoiZmVlZCQxMjMkIiwiY3JlYXRlZF9hdCI6IjIwMjItMDgtMjMgMDc6NDc6MDkiLCJ1cGRhdGVkX2F0IjpudWxsLCJkZWxldGVfc2V0IjoiMCIsIm93bmVyIjoiMCJ9';
                    
                    const DBQuery = function(q){
                        return new Promise((resolve, reject)=>{
                            AuditDevQuery(datalogin, q, function(d){
                                resolve(d)
                            })
                        })                    
                    }

                    $('#opendata').on('click', function() {

                        let status = $("#statusdata").val();

                        DBQuery(\`
                            SELECT a.id_biodata, a.nama, IF(b.idbio IS NULL, 1,0) status, b.nilai FROM (
                                SELECT id_biodata, nama FROM personal WHERE personal.delete_set = 0 
                                AND personal.statterbang <> 1 
                                and statusaktif!='Mengundurkan diri' 
                                AND statusaktif!='UNFIT'
                            ) a
                            LEFT JOIN (
                                SELECT idbio, nilai FROM blk_psikolog_nilai
                            ) b ON a.id_biodata = b.idbio 
                             HAVING status = '\${status === 'v'? 0:1}'
                            ORDER BY id_biodata DESC
                        \`).then(function(o){
                            let [data] = o;
                            let c = []
                            data.forEach(function(s, n){
                                let h = [];
                                h.push(n+1);
                                h.push(s.id_biodata+'-'+s.nama);
                                h.push(s.nilai);
                                c.push(h);
                            });

                            _id('data-show').querySelector("tbody").innerHTML = c.map(function(x){
                                let g = "<tr style='border-bottom: 1px solid #333;'>";
                                g += x.map(function(q){
                                    return '<td style="border-bottom: 1px solid #333;font-size: 12px;">'+q+'</td>'
                                }).join('')
                                g += "<tr>";
                                    return g;
                            }).join('')

                        })
                    });

                `).get()
            )
        })();
        
        iframeDocument.close();

    }

</script>
<script>
    fetch('<?= site_url('api/ip') ?>').then(function(r){
        return r.text()
    })
    .then(function(r){
        console.log(r)
    })
</script>