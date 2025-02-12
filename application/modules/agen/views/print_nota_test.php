<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1 class="pull-left">
                <i class="icon-star"></i>
                <span id="title-page">Print Nota TKI</span>
            </h1>
            <div class="pull-right">
                <ul class="breadcrumb">
                    <li>
                        <a href="http://app.flamboyangemajasa.com/flamboyan/index.php/dashboard"><i class="icon-bar-chart"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-angle-right"></i>
                    </li>
                    <li id="title-page2" class="active">Print Nota TKI </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/flamboyan/xlsx.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.css" />
    <!-- SweetAlert JS (version 1.x) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
    window.updateTitle = function(text){
        document.getElementById("title-page").innerHTML = text;
        document.getElementById("title-page2").innerHTML = text;
    }
</script>

<div class="row-fluid">
    <div class="card">
        <div class="card-body" id="app">
            
        </div>
    </div>
</div>

<script>
    class FormInput {
        #container = null;
        #data = null;
        #cf = null;
        
        #containerForm = function(){
            let c = document.createElement('div');
            this.#cf = c;
            return c;
        }

        #label(data){
            let l = document.createElement('label');
            l.htmlFor = data.id;
            l.innerHTML = data.label;            
            return l;
        }

        #text(){
            let data = this.#data;
            this.#containerForm()
            let inpt = document.createElement('input');
            inpt.style.padding = '10px';
            inpt.style.border = '1px solid #ccc';
            inpt.style.borderRadius = '10px';
            inpt.style.width = '100%';
            inpt.style.height = '35px';
            inpt.style.fontSize = '14px';
            inpt.style.boxSizing = 'border-box';
            inpt.style.outline = 'none';
            inpt.style.transition = 'border-color 0.3s ease';
            inpt.type = data.type;
            inpt.id = data.id;            
            inpt.placeholder = data.placeholder;
            this.#cf.appendChild(
                this.#label(data)
            );
            this.#cf.appendChild(
                inpt
            );
            this.#container.appendChild(
                this.#cf
            );
        }

        #number(){
            document.createElement('input');
        }

        constructor(data, container){
            this.#data = data;
            this.#container = container;
            switch (data.type) {
                case 'text':
                    this.#text();
                    break;
                case 'number':
                    this.#number();
                    break;
                default:
                    break;
            }        
        }

    }

    class GTable {
        #app = 'app';
        #container = null;
        #qr = null;
        #library = {};
        #formdata = {};
        #itemsgrid = {};
        #form = null;

        fined_app = function(){
            return document.getElementById(this.#app) ? document.getElementById(this.#app) : null;
        }

        new_app = function(){
            this.#app = document.createElement('div');
            this.#app.id = 'app';
            document.body.appendChild(this.#app);
            return this.#app;
        }

        constructor(){
            if(this.fined_app() == null){
                this.#container = this.new_app();
            }else{
                this.#container = this.fined_app();
            }
            this.#container.innerHTML = '';
            console.log(this.#container);
        }

        #inputload(conf){
            let container = this.#itemsgrid[conf.column];
            let FIP = new FormInput(conf, container);
        }

        #item_form(){
            let data = this.#formdata;
            let items = data.items;
            for(let item of items){
                this.#inputload(item);
            }
        }

        #item_form_grid = function(){
            let data = this.#formdata;
            // set form grid started
            this.#itemsgrid = {};
            if(data.gridColumns.length > 0){
                let flexContainer = document.createElement('div');
                flexContainer.id = 'flex-container';
                flexContainer.style.display = 'flex';
                flexContainer.style.flexDirection = 'row';
                this.#form.appendChild(flexContainer);
                this.#container.appendChild(this.#form);

                // set grid column
                for(let d of data.gridColumns){
                    let flexItem = document.createElement('div');
                    flexItem.style.flex = '1';
                    flexItem.style.padding = '5px';
                    flexContainer.appendChild(flexItem);
                    this.#itemsgrid[d] = flexItem;
                }
                this.#item_form()
            }
        }

        #header_form(){
            let data = this.#formdata;
            let form = this.#form;
            if(data.header){
                let t = typeof data.header;
                console.log(t);
                switch (t) {
                    case 'string':
                        let c = document.createElement('div');
                        c.innerHTML = data.header;
                        c.style.padding = '10px';
                        c.style.backgroundColor = 'gray';
                        c.style.marginTop = '-10px';
                        c.style.marginLeft = '-10px';
                        c.style.marginRight = '-10px';
                        c.style.marginBottom = '5px';
                        c.style.color = 'white';
                        c.style.fontSize = '18px';
                        c.style.fontWeight = 'bold';
                        form.appendChild(
                            c
                        );
                        break;
                    default:
                        break;
                }
            }
        }

        #footer_form(){
            let data = this.#formdata;
            let form = this.#form;
            if(data.footer){
                let t = data.footer;
                let footerContainer = document.createElement('div');
                footerContainer.style.marginTop = '5px';
                footerContainer.style.marginBottom = '10px';
                footerContainer.style.display = 'flex';
                footerContainer.style.justifyContent = 'flex-start';
                
                for(let btn of t) {
                    let button = document.createElement('button');
                    button.type = 'button';
                    button.setAttribute('data-form', this.#form.id);                    
                    button.innerHTML = btn.label;
                    button.className = btn.class;
                    button.onclick = btn.onclick;
                    button.style.marginLeft = '5px';
                    footerContainer.appendChild(button);
                }
                
                form.appendChild(footerContainer);
            }
        }
        add_form(data = []){
            this.#formdata = data;
            const form = document.createElement('form');
            form.id = 'form-'+Date.now();
            form.style.width = '100%';
            form.style.padding = '10px';
            form.style.boxSizing = 'border-box';
            form.style.border = '1px solid #ccc';
            form.style.borderRadius = '4px';
            form.style.backgroundColor = '#fff';
            this.#container.appendChild(form);
            this.#form = form;
            this.#header_form();
            this.#item_form_grid();
            this.#footer_form();
            return form;
        }
        
    }
    
    const g = new GTable();
    g.add_form({
        header: 'Print Nota TKI',
        gridColumns : ['a'],
        items: [
            {
                type: 'text',
                label: 'Pin Hou',
                id: 'pin',
                placeholder: '...',
                column: 'a'
            }
            , {
                type: 'text',
                label: 'Nama TKI',
                id: 'id_biodata',
                placeholder: '...',
                column: 'a'
            }
            , {
                type: 'text',
                label: 'Jumlah',
                id: 'jumlah',
                placeholder: '...',
                column: 'a'
            }
            , {
                type: 'text',
                label: 'Keterangan',
                id: 'keterangan',
                placeholder: '...',
                column: 'a'
            }
        ],
        footer : [
            {
                label: 'Print',
                type: 'button',
                class: 'btn btn-primary',
                onclick: function(){
                    let data = this.dataset;
                    console.log(data);
                }
            }
        ]
    });
</script>
