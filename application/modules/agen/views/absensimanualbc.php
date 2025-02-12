<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <h1 class="pull-left">
                <i class="icon-star"></i>
                <span id="title-page">Absensi Manual </span>
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
                    <li id="title-page2" class="active">Absensi manual </li>
                </ul>
            </div>
        </div>
    </div>
</div>
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
<noscript id="ip"><?=  $_SERVER['REMOTE_ADDR']; ?></noscript>
<script>
  (async function(){

    //css
    let ip = _id("ip").innerHTML

    console.log(ip)

    
    let gridCss = {
      display:'grid',
      gridTemplateColumns:'100%'
    }

    const getData = function(d){
      return new Promise((resolve,reject)=>{
        try{
          AuditDevQuery(datalogin, d, function(r){
            resolve(r);
          })
        }catch(e){
          reject(e)
        }
      })
    }

    const [kelastki] = await getData('SELECT kode value, concat(kelas," ", nomor) text  FROM kelastki');
    console.log(kelastki)
    const app = document.getElementById("app");
    const createForm = function(frm, act){
      let data = frm? frm: [
          {
            name: "date"
            , label: "tanggal"
            , type: "date"
          }
          ,{
            name: "kelas"
            , label : "Kelas"
            , type : "select"
            , data : [
               {
                 value: "TKL1",
                 text: "TKL 1"
               }
               ,{
                 value: "TKL2",
                 text: "TKL 2"
               }
              ]
          }
        ];
        
        let f = el("form")
        .css({
          background: 'white'
          ,padding: '10px'
          ,borderRadius: '10px'
          ,boxShadow: '0 0 10px #aaa'
        })
        for(let c of data){
          if(c.type === "date"){
            let name = c.name;
            let label = c.label;
            let type = c.type;
            let inp = el('input').id(name).class('form-control').type('text').load(function(){
              $("#tgl").datepicker();
            }).name(name);
            let lab = el('label').attr('for', name).html(label)
            let con = el('div').class('form-group')
            f.child(
              con.child(lab).child(
                el('div').css(gridCss)
                .child(inp)
              )
             )
            
          }
          if(c.type === "select"){
            let name = c.name;
            let label = c.label;
            let type = c.type;
            let data = c.data;
            let inp = el('select').width('100%').id(name).type(type).name(name);
            let lab = el('label').attr('for',name).html(label)
            for(let op of data){
              inp.child(
                el('option').val(op.value).html(op.text)
              )
            }

            
            let con = el('div')
            .css({
              width: '100%'
            })
            .class('form-group')
            f.child(
              con.child(lab).child(
                el('div').css(gridCss)
                .child(inp)
              )
             )
            
          }
        }
        
        // add button action
        f.child(
          el('button').type("button").text("submit").css({
            padding: "10px",
            background: "green",
            color: "white",
            borderRadius: "10px",
            fontWeight: "bold",
          }).click(act)
        )
        
        app.appendChild(f.get())
        
    }

    const ubahFormateDatePicker = function(tgl){
      let [tgll,bln,thn] = tgl.split('/');
      return `${thn}-${bln}-${tgll}`;
    }

    // swithch display
    let cssButon = { padding:'5px 8px', margin:"5px 3px" }
    let form1 = el('button').css(cssButon).text('Data Absensi')
    let form2 = el('button').css(cssButon).text('Buat Absensi')
    app.appendChild(el('div').css({
      marginBottom: "10px"
    }).child(form1).child(form2).get())

    createForm([
         {
           name: "tgl"
           , label: "tanggal"
           , type: "date"
         }
         ,{
           name: "kelas"
           , label : "Kelas"
           , type : "select"
           , data : [{value:'', text:'Pilih Kelas'}].concat(kelastki)
         }
       ], async function(){
         let tgl = ubahFormateDatePicker(_id('tgl').value);
         let kelas = _id('kelas').value;
         if(kelas != '' && tgl != ''){
            let [dataRes] = await getData(`SELECT  
              a.idblk
              , a.dteDate absensi
              , '${kelas}' kelas
              , ifnull(b.nama,p.nama) nama
              , gender_translation(pa.jeniskelamin) jk
              , am.manual
            FROM tblattendance a
            LEFT JOIN personal_nama p ON p.id_biodata = a.idblk 
            LEFT JOIN idblk b ON b.nodaftar = a.idblk
            LEFT JOIN personal pa ON pa.id_biodata = a.idblk
            LEFT JOIN personalblk pb ON pb.nodaftar = a.idblk
            LEFT JOIN absensi_manual am ON am.id_biodata = a.idblk AND am.kelas = '${kelas}' AND am.tanggal = '${tgl}' AND am.finger = a.dteDate AND am.manual = 'v'
            WHERE a.dteDate = '${tgl}'
            GROUP BY idblk HAVING nama IS NOT NULL`); 
            
            let doo = el('div').css({
              display:'grid',
              gridTemplateColumns:'auto auto auto auto auto'
            });

            for(let o of dataRes){
              console.log(o);

              let yp = el('input').type('checkbox')
                    .data('data', JSON.stringify(o))
                    .data('kelas', _id('kelas').value)
                    .data('tgl', _id('tgl').value)
                    .change(function(){
                      if(this.checked){
                        // set to checked
                        let data = JSON.parse(this.dataset.data);
                        let kelas = this.dataset.kelas;
                        let tgl = this.dataset.tgl;
                        console.log(data)
                        let simpan = [
                          {
                            tanggal:tgl,
                            kelas:kelas,
                            id_biodata:data.idblk,
                            gender:data.jk == 'Wanita'? 'P':'L',
                            nama:data.nama,
                            finger:data.absensi,
                            manual:'v'
                          }
                        ].ToInsert('absensi_manual', ['tanggal', 'kelas', 'id_biodata', 'manual']);

                        getData(simpan).then(function(){
                          alert('simpan')
                        })

                      }else{
                        let data = JSON.parse(this.dataset.data);
                        let kelas = this.dataset.kelas;
                        let tgl = this.dataset.tgl;
                        getData(`DELETE FROM absensi_manual WHERE id_biodata = '${data.idblk}' AND tanggal = '${tgl}' AND kelas = '${kelas}' `).then(function(){
                          alert('di hapus')
                        })
                      }
                    })

              if(o.manual === 'v'){
                yp.attr('checked', false)
              }

              doo.child(
                el('div').css({borderBottom: '1px solid #ddd'}).html(o.nama)
              )
              doo.child(
                el('div').css({borderBottom: '1px solid #ddd'}).html(o.jk)
              )
              doo.child(
                el('div').css({borderBottom: '1px solid #ddd'}).html(o.idblk)
              )
              doo.child(
                el('div').css({borderBottom: '1px solid #ddd'}).html(o.absensi)
              )
              doo.child(
                el('div')
                .child(
                  yp
                )
              )
            }
            
            _id('inputdata').innerHTML = '';
            _id('inputdata').appendChild(doo.get())

          }else{
            alert("isi form terlebih dahulu")
          }
       });

       app.appendChild(
        el('div')
        .id('inputdata')
        .get()
      )
    
       _id('tgl').value = tanggal(tanggal().normal).sekarang.split('-').join('/');
    
  })();
</script>
