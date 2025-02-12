<?php
    $this->load->view('crud');
    $data = $this->db->query("SELECT DISTINCT ifnull(nullif(`status`,'jompo'),'formal') id, ifnull(nullif(`status`,'jompo'),'formal') text From datasektor ")->result();
?>
<noscript id="app_sektor"><?= json_encode($data) ?></noscript>
<script>

    window._selector = function(id){
        if(id){
            let element = Array.from(document.querySelectorAll('noscript#app_'+id));
            let data;
            for(parse of element){
                data = JSON.parse( parse.innerText );
            }
            return data;
        }else{
            return null
        }
    }

    const loadBefore = function(qr){
        return new Promise(function(resolve, reject) {
            try{
                AuditDevQuery(datalogin, qr, function(data) {
                    resolve(data);
                });
            }catch(e){
                reject(e);
            }
        });
    }
        

    Array.prototype.ToSelect = function (table = 'test', wht = '', add = []) {
    var s = this;
    if (s.length > 0) {
        var y = Object.keys(s[0]);
        var x = '';
        x += 'SELECT a.*, '+add.map(function(c){
            return ` b.${c} `
        }).join(',')+' FROM ( ';
        x += 'SELECT ';
        x += y.map(function (g) {
            return `a.${g}`;
        });
        x += ' FROM (';
        x += s.map(function (w) {
            var f = ` SELECT `;
            f += y.map(function (q) {
                if (w[q] != null) {
                    return `"${w[q].toString().replace(/\"/g, "\\\"")}" \`${q}\``;
                } else {
                    return `"-" \`${q}\``;
                }
            }).join(",");
            return f;
        }).join("\n UNION ALL \n")
        x += ') a';
        x += ') a LEFT JOIN '+table+' b '
        x += ' ON '
        x += Array.isArray(wht) ? wht.map(function(a){
            return ` a.${a} = b.${a} `;
        }).join(' AND ') : ''
        return x;
    } else {
        return [];
    }
};


    function capitalizeWords(text) {
    return text.split(' ')  // Split the text into an array of words
               .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())  // Capitalize first letter, make rest lowercase
               .join(' ');  // Join the array back into a string
    }
    let name = location.href.split('/').pop();

    let dataUpdate = null;

    updateTitle("REKAP SPBG TAHUNAN");
    loadTemp({
        data:["Action","Nama","ID","Tanggal", "Sektor"]
    },0,function(e){
        console.log(e.el);
        let config = {
            debug: true,
            title: function () {
                return 'SPBG MASTER';
            },
            table: "spbg_print_accurate",
            idform: "containerforms",
            newkode: ``,
            kode: 'id',
            view: ['id','data_tki','tanggal','sektor'],
            custome: {
                tanggal: function(a){
                    let date = new Date(a);
                    return date.getDate().pad(2) + '-' + (date.getMonth() + 1).pad(2) + '-' + date.getFullYear();                }
            },
            oncreate: function (a) {
            },
            onupdate: function (dt) {
                dataUpdate = dt;
            },
            dataSelect: ["a.*"],
            queryTemp: "SELECT {select} FROM spbg_print_accurate a WHERE 1 = 1 || ORDER BY id desc",
            validasiForm: [],
            increment:true,
            onDraw:function(aw) {
              let {menu} = aw;
              menu.innerHTML = `
                <a href="${URL}index.php/setting/cetak_spbg_tahunan" class="btn btn-primary btn-sm">Cetak SPBG</a>
              ` 
            },
            onviewonly: function(obj){
                let {data_tki, tanggal, sektor} = obj;
                let tki = data_tki.split(',');
                let simpan = [];
                for(let data of tki){
                    simpan.push({
                        data_tki: data,
                        tanggal: tanggal,
                        sektor: sektor,
                    })
                }
                // console.table(simpan)
                // console.log(simpan.ToInsert('spbg_print_accurate'));
                _w != 'u'?
                AuditDevQuery(datalogin, simpan.ToInsert('spbg_print_accurate'), function(a){
                    window._load()
                })
                :
                (function(){
                    let [y] = simpan
                    y.id = dataUpdate.id
                    let n = [y];

                    AuditDevQuery(datalogin, [y].ToUpdate('spbg_print_accurate', ["id"]), function(a){
                        window._load()
                    });
                })();
            },
            data: 
            [
                {
                    title: 'Tanggal',
                    type: 'date',
                    name: 'tanggal',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Sektor',
                    type: 'select',
                    name: 'sektor',
                    row: 12,
                    readonly: false,
                    unfolow: true,
                    data: _selector('sektor'),
                    action: function (a) {
                        console.log(a);
                        a.onchange = function(){
                            let sektor = this.value;
                            AuditDevQuery(datalogin, `
                            SELECT id_biodata id, nama text FROM data_tki_berdasarkan_sektor WHERE status = '${sektor}'
                            `, function(res){
                                let [nilaiResponse] = res;
                                _setoption('data_tki', nilaiResponse);
                            });
                        }
                    },
                }
                ,{
                    title: 'TKI',
                    type: 'select',
                    name: 'data_tki',
                    multiple: true,
                    row: 12,
                    readonly: false,
                    unfolow: true,
                    data: [],
                    action: function () {
                        // Removed undefined sektor reference
                    }
                }
            ]        
        }
        loadCrud(config);
    })
</script>
