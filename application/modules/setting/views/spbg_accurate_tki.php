<?php
    $this->load->view('crud');
     $data = $this->db->query("SELECT id_biodata id, nama text FROM personal WHERE tanggaldaftar like '2024%' OR tanggaldaftar like '2025%'" )->result();
?>
<noscript id="app_data_tki"><?= json_encode($data) ?></noscript>
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


    function capitalizeWords(text) {
    return text.split(' ')  // Split the text into an array of words
               .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())  // Capitalize first letter, make rest lowercase
               .join(' ');  // Join the array back into a string
    }
    let name = location.href.split('/').pop()
    updateTitle("DATA TKI SPBG TAHUNAN");
    loadTemp({
        data:["Action","ID","Tanggal"]
    },0,function(e){
        console.log(e.el);
        let config = {
            debug: true,
            title: function () {
                return 'SPBG MASTER';
            },
            table: "spbg_print_accurate_tki",
            idform: "containerforms",
            newkode: ``,
            kode: 'id',
            view: ['id','data_tki',],
            oncreate: function (a) {
                _setval('spbg_print_accurate_id', '<?= $id ?>');
            },
            onupdate: function (dt) {
            },
            dataSelect: ["a.*"],
            queryTemp: "SELECT {select} FROM spbg_print_accurate_tki a WHERE 1 = 1 || ORDER BY id desc",
            validasiForm: [],
            increment:true,
            onviewonly: function(obj){
                let {data_tki, spbg_print_accurate_id} = obj;
                let tki = data_tki.split(',');
                let simpan = [];
                for(let data of tki){
                    simpan.push({
                        data_tki: data,
                        spbg_print_accurate_id: spbg_print_accurate_id
                    })
                }
                console.log(simpan.ToInsert('spbg_print_accurate_tki'));
                console.log(_w);
                // if(window._w != 'u') { AuditDevQuery(datalogin, simpan.ToInsert('spbg_print_accurate_tki'), function(a){
                //         console.log(a)
                //     })  
                // }else{
                //     AuditDevQuery(datalogin, simpan.ToUpdate('spbg_print_accurate_tki', ['data_tki', 'tanggal', 'sektor']), function(a){
                //         console.log(a)
                //     });
                // }
            
            },
            data: 
            [
                {
                    title: 'Tanggal',
                    type: 'text',
                    name: 'spbg_print_accurate_id',
                    row: 12,
                    readonly: false,
                    display:'none',
                    unfolow:true,
                    action: function () {

                    },
                }
                ,{
                    title: 'TKI',
                    type: 'select',
                    name: 'data_tki',
                    multiple:true,
                    row: 12,
                    readonly: false,
                    unfolow:true,
                    data : _selector('data_tki'),
                    action: function () {

                    },
                }
            ]

        }
        loadCrud(config);
    })
</script>