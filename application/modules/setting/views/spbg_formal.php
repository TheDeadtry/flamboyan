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
    updateTitle("Setting Biaya "+capitalizeWords(name));
    loadTemp({
        data:["Action","kode","Nilai"]
    },0,function(e){
        console.log(e.el);
        let config = {
            debug: true,
            title: function () {
                return 'SPBG MASTER';
            },
            table: "spbg_master_formal",
            idform: "containerforms",
            newkode: ``,
            kode: 'kode',
            view: ['kode','nilai'],
            custome: {
            },
            oncreate: function (a) {
            },
            onupdate: function (dt) {
            },
            dataSelect: ["a.*"],
            queryTemp: "SELECT {select} FROM spbg_master_formal a WHERE 1 = 1 || ORDER BY kode desc",
            validasiForm: [],
            increment:true,
            data: 
            [
                {
                    title: 'Kode',
                    type: 'text',
                    name: 'kode',
                    row: 12,
                    readonly: false,
                    action: function () {

                    },
                }
                ,{
                    title: 'Value',
                    type: 'number',
                    name: 'nilai',
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