<?php
$this->load->view('crud');
?>
<script>
    function capitalizeWords(text) {
        return text.split(' ')  // Split the text into an array of words
               .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())  // Capitalize first letter, make rest lowercase
               .join(' ');  // Join the array back into a string
    }

    let name = location.href.split('/').pop()
    updateTitle("Kriteria Pekerjaan");
    loadTemp({
        data:["Action","Kode","Nama", "Point", "Keterangan"],
    },0,function(e){
        console.log(e.el);
        let config = {
            debug: true,
            title: function () {
                return 'Agen';
            },
            table: "kriteria_pekerjaan",
            idform: "containerforms",
            newkode: ``,
            kode: 'kode',
            view: ['kode', 'nama', "point", "keterangan"],
            custome: {
            },
            oncreate: function (a) {
                _setval('kode', 'K-'+Date.now())
            },
            onupdate: function (dt) {
                // _setval('date_modified', timestamp())
            },
            dataSelect: ["a.*"],
            queryTemp: "SELECT {select} FROM kriteria_pekerjaan a WHERE 1 = 1 || ORDER BY kode desc",
            validasiForm: [],
            custome : {
            },
            increment:true,
            data: 
            [
                {
                    title: 'Kode',
                    type: 'text',
                    name: 'kode',
                    row: 12,
                    readonly: true,
                    action: function () {

                    },
                }
                ,{
                    title: 'Kode',
                    type: 'text',
                    name: 'kode_nama',
                    row: 12,
                    readonly: true,
                    display:'none',
                    action: function () {

                    },
                }
                ,{
                    title: 'Nama',
                    type: 'select',
                    name: 'nama',
                    row: 12,
                    data: [
                        { id: 'JOMPO', text: "JOMPO" }, 
                        { id: 'MASAK', text: "MASAK" },
                        { id: 'TASAU', text: "TASAU" },
                        { id: 'TAIYI', text: "TAIYI" },
                        { id: 'JAGA ANAK/BAYI', text: "JAGA ANAK/BAYI" },
                        { id: 'GENDONG', text: "GENDONG" }
                    ],
                    readonly: false,
                    action: function (a) {
                        a.onchange = function(){
                            let data = [
                                { id: 'jompo', text: "JOMPO" }, 
                                { id: 'masak', text: "MASAK" },
                                { id: 'tasau', text: "TASAU" },
                                { id: 'taiyi', text: "TAIYI" },
                                { id: 'jaga_anak', text: "JAGA ANAK/BAYI" },
                                { id: 'gendong', text: "GENDONG" }
                            ];
                            let [co] = data.cond(a.value, 'text');
                            _setval('kode_nama', co.id)
                        }
                    },
                }
                ,{
                    title: 'Point',
                    type: 'text',
                    name: 'point',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Keterangan',
                    type: 'text',
                    name: 'keterangan',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
            ]
        }

        loadCrud(config);
    })
</script>