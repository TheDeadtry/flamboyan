<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous" ></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>

const loadTemp = function(a = {}, t = 0, func){
    let timesCLickBite = Date.now();
    document.querySelector('#app').innerHTML = '';
    document.querySelector('#app').appendChild(
        el('div').html(
             `
             <div data-code="${timesCLickBite}" class="cj-modal"></div>
    <style>
    .btn-clear:hover{
        background: yellow;
    }
    .btn-clear{
        border: 1px solid aqua;
        padding: 3px 8px;
        margin: 3px 0;
    }
    #tabledata td,#tabledata th{
        font-size: 14px !important;
        padding: 0 ;
    }

    .paginate_button{
        padding: 3px 12px !important;
    }

    .dataTable thead, .dataTable tfoot{
        background:  #ff9258;
        color: white;
    }

    #tabledata .dataTable td:nth-child(1),
    #tabledata .dataTable th:nth-child(1)
    {
        width: 75px;
        min-width: 75px;
        max-width: 75px;
    }

    .dataTable td:nth-child(1).dtfc-fixed-left{
        width: 75px;
        min-width: 75px;
        max-width: 75px;
    }

    .dt-button, .dataTables_filter{
        display: none;
    }

    .dataTable thead th,.dataTable tfoot th{
        text-decoration: none;
    }

    .pagination li{
        padding: 0 !important;;
    }

    table.dataTable thead tr > .dtfc-fixed-left, table.dataTable thead tr > .dtfc-fixed-right, table.dataTable tfoot tr > .dtfc-fixed-left, table.dataTable tfoot tr > .dtfc-fixed-right {
        top: 0;
        bottom: 0;
        z-index: 3;
        background-color: #ff9258;
    }

    .panel-head-menu input{
        width: 250px;
        float: right;
        margin-top: 0;
    }

    @media screen and (max-width: 600px){
        .panel-head-menu input{
            margin-top: 10px;
            width: 100%;
            float: none;
        } 
    }

    /* date picker */

    .table-condensed td{
        padding: 2px 5px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
    }

    .table-condensed th{
        padding: 6px 5px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
    }

    .table-condensed td span{
        padding: 5px 3px;
        cursor: pointer;
    }

    .datepicker{
        box-shadow: 0 0 10px #ddd;
    }

    .table-condensed td{
    max-width: 240px;
    }

    .table-condensed thead{
    border-bottom: 1px solid #ddd;
    }


    .table-condensed td{
    border-bottom: 1px solid #ddd;
    }

    .table-condensed td span{
        display: inline-block;
        float: left;
        width: 56px;
        text-align: center;
        padding-top: 15px;
        padding-bottom: : 15px;
        border-bottom: 1px solid #ddd;
    }

    .table-condensed td.old
    , .table-condensed td.new
    {
        background: #ddd;
    }

    .table-condensed thead{
        background: #ff9258;
        color: white;
    }

    .table-condensed thead th{
     border: 1px solid white;
    }

    .table-condensed td.active{
        background: #ff9258;
        color: white;
    }

    .table-condensed tbody td.day:hover{
        background: #ff9258;
        color: white;
    }

    .table-condensed td, .table-condensed th {
        border-radius: 0 !important;
        border: 1px solid white !important;
    }

    .select2 .select2-selection{
    height: 35px;
    }

    .select2 .select2-selection__rendered{
    height: 35px;
    }

    .form-d{
        padding: 3px 10px;
        height: 35px;
        font-size : 14px;
    }

    .select2-results__option--highlighted{
        background: #ff9258 !important;;
    }

    .select2-selection__rendered {
        font-size: 14px;
    }

    #e-form .card-header h5{
    margin: 0;
    }

    #e-form .card-header{
    background-color: #ff9258;
    color:white;
    }

    input{
    box-shadow: inset 0 0 10px #ddd;
    }

    .select2-selection--single .select2-selection__rendered{
    box-shadow: inset 0 0 10px #ddd;
    }

    input{
    border: 1px solid #aaa !important;
    }

    /* end of date picker */
    table th{
        padding: 8px !important;
    }
        /* Ensure container has full width */
        .select-container {
            width: calc(100% - 30px);
        }
        
        /* Ensure Select2 takes up full width */
        .select2-container {
            width: calc(100% - 30px) !important;
        }
        
        /* Optional: Ensure Select2 dropdown fits within the container */
        .select2-container .select2-selection--single {
            width: calc(100% - 30px) !important;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 6px 12px;
        }
</style>
<div style="padding: 10px;">
    <div class="card" id="e-form" style="display:none;background:white;padding:20px; border-radius:5px; box-shadow:0 0 10px #ddd;">
      <div style="padding: 6px 10px; border-bottom:1px solid #ddd;">
        <h5 class="card-title title-f"></h5>
      </div>
      <div class="card-body" style="padding:5px 0px;">
        <div id="containerforms">

        </div>
      </div>
      <div class="card-footer" style="margin-bottom:20px;">
        <button type="button" class="btn btn-primary simpan">Simpan</button>
        <button type="button" class="btn btn-secondary" onclick="window.closeForms();">Tutup</button>
      </div>
    </div>
    <div class="card border-top-3 border-top-vds mb-5"  id="e-table">
        <div class="card-content">
        <div class="card-header panel-head-menu" style="border-bottom: 1px solid #ddd;">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-min-width dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-printer"></i>
                    Export</button>
                <div class="dropdown-menu" id="listreportmenu">
                    
                </div>
            </div>
            <button class="btn btn-success new"><i class="icon-plus"></i> Baru </button>
            <button class="btn btn-default" onclick="window._load()">Refresh</button>
        </div>
            <div class="card-body">        							
                <table id="tabledata" class="display" style="width:100%">
                <thead style="min-width:100%">
                    <tr>
                       ${(a && a.data?a.data:[]).map(function(y, z){
                            if(z<2){
                                return `<th style="max-width:80px;">${y}</th>`
                            }
                            return `<th>${y}</th>`
                       }).join('')}
                    </tr>
                </thead>
                <tfoot style="min-width:100%">
                    <tr>
                        ${(a && a.data?a.data:[]).map(function (y) {
                            return `<th>${y}</th>`
                        }).join('')}
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

    `
        )
        .load(func)
        .get()
    );
    
}

</script>