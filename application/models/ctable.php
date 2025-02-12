<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ctable extends CI_Model{


    private $table_name;
    private $target_table;
    private $row_table;
    private $table_location;
    private $option_delete;
    private $option_update;

    private function config_csrf(){
        $html = "
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            })
        ";
        return $html;
    }

    public function location($location)
    {
        create_session("back-location", $_SERVER['REQUEST_URI']);
        $this->table_location = $location;
    }

    public function table_name($name)
    {
        $this->table_name = $name;
    }

    public function set_delete($aa){
        $this->option_delete = $aa;
    }

    public function set_update($aa){
        $this->option_update = $aa;
    }

    private function create_delete_action(){
        $html = '
            $(document).on("click", ".delete",function(){
                event.preventDefault();
                var dataId = $(this).attr("data-id");
                new swal({
                  title: "Hapus Data",
                  text: "Anda yakin ingin menghapus data ini",
                  type: "info",
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                }, function () {
                  setTimeout(function () {
                    $.ajax({
                        url: "'.site_url($this->table_location).'/delete",
                        method: "post",
                        dataType: "text",
                        data: {
                            id: dataId
                        }, success:function(){
                            '.$this->table_name.'.ajax.reload();
                        }
                    })
                    swal("Data Telah Dihapus !");
                  }, 1000);
                });
            })
        ';

        return $html;
    }

    private function create_update_action(){
        $html = '
            $(document).on("click", ".edit",function(){
                event.preventDefault();
                var dataId = $(this).attr("data-id");
                location.href = "'.site_url($this->table_location).'/update/"+dataId;
            })
        ';
        return $html;
    }

    public function create_row($arr)
    {
        $create_row = "";
        foreach($arr as $key => $val){
            $create_row .= "<th>".$val."</th>";
        }
        $this->row_table = $create_row;
    }

    public function order_set($aa){
        $this->target_table = $aa;
    }

    public function create()
    {
        $html =
        '
        <table id="'.$this->table_name.'" class="table table-transaksi" style="width:100%">
                    <thead>
                        <tr style="background-color: #4c8bf5; color: #ffffff;">
                            '.$this->row_table.'
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <script>

                    '.$this->config_csrf().'

                    var func = function(a, b){

                    }

                    globalThis.tableUrlStart = "'.site_url($this->table_location).'/show";

                    globalThis.tableUrl = "'.site_url($this->table_location).'/show";

                    var '.$this->table_name.' = null;

                    function loadTable(){
                        '.$this->table_name.' = $("#'.$this->table_name.'").DataTable({
                             fixedColumns: {
                                right: 1
                            },
                            processing: true,
                            stateSave: true,
                            serverSide: true,
                            order: [],
                            ajax: {
                                "url"       : globalThis.tableUrl,
                                "type"      : "POST"
                            },
                            deferRender: true,
                            columnDefs:[
                                {
                                    targets:['.$this->target_table.'],
                                    orderable: false
                                }
                            ],
                            "initComplete": func,
                        });

                        globalThis.'.$this->table_name.' = '.$this->table_name.';

                        '.$this->create_update_action().'

                        '.$this->create_delete_action().'

                        '.$this->table_name.'.on( \'draw\', function () {
                            Array.from(document.querySelectorAll(".action"))
                            .forEach(function(doc){
                                let data = doc.dataset;
                                doc.className = "drop-data";
                                doc.innerHTML = "";
                                doc.appendChild(
                                    div()
                                    .child(
                                        el("div")
                                        .class("edit")
                                        .data("id", data.id)
                                        .cursor("pointer")
                                        .css("color", "#4c8bf5")
                                        .css("padding", "0 5px")
                                        .css("display", "inline-block").html(`
                                            <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#4c8bf5" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        `)
                                    )
                                    .child(
                                        el("div")
                                        .class("delete")
                                        .data("id", data.id)
                                        .cursor("pointer")
                                        .css("color", "#4c8bf5")
                                        .css("padding", "0 5px")
                                        .css("display", "inline-block").html(`
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#dd0000" fill-rule="nonzero"/>
                                                    <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        `)
                                    )
                                    .get()
                                )
                            })
                        })
                    }

                    $(document).ready(loadTable);

                    let getTh = document.querySelectorAll("th");
                    getTh.forEach(th => {
                        if (th.innerText == "ACTION") {
                            th.style.minWidth = "180px";
                        }
                    })

                    var ubahAction = Array.from(document.querySelectorAll("th"))
                    var varAction = ubahAction.length - 1;

                    ubahAction[varAction].style.textAlign = "center";
                    ubahAction[varAction].style.backgroundColor = "#3c8bf5 !important";
                    ubahAction[varAction].innerHTML = `
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#ffffff"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    `;

                    


                </script>

        ';
        return $html;
    }

}
