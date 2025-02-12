
String.prototype.replaceAll = function(search, replacement) {
    let target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};
// set prototype to cut last array
Array.prototype.cutLast = function(event) {
    var s = 0;
    var l = this.length - 1;
    return this.slice(s, l)
}
globalThis.tanggal = function(a) {
    let newDate = new Date();
    if (a != undefined) {
        if (a === "gugus") {
            newDate = new Date(helper.sesiGet('tahun') + '-' + helper.sesiGet('bulan'));
        } else {
            newDate = new Date(a);
        }
    }
    let namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    let namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];

    function buat(newDate) {
        let year = newDate.getFullYear();
        let month = (newDate.getMonth() + 1) + '';
        let day = (newDate.getDate()) + '';
        let format = '00';
        let ansMonth = format.substring(0, format.length - month.length) + month;
        let ansDay = format.substring(0, format.length - day.length) + day;
        let dayKnow = ansDay + '-' + ansMonth + '-' + year;
        if (a == null) {
            return "";
        } else {
            return dayKnow;
        }
    }

    function buatN(newDate) {
        let year = newDate.getFullYear();
        let month = newDate.getMonth();
        let day = (newDate.getDate()) + '';
        let format = '00';
        let ansMonth = namaBulan[month];
        let ansDay = format.substring(0, format.length - day.length) + day;
        let dayKnow = ansDay + ' ' + ansMonth + ' ' + year;
        if (a == null) {
            return "";
        } else {
            return dayKnow;
        }
    }

    function buatO(newDate) {
        let year = newDate.getFullYear();
        let s = newDate.getSeconds().pad(2);
        let h = newDate.getHours().pad(2);
        let m = newDate.getMinutes().pad(2);
        let month = (newDate.getMonth() + 1) + '';
        let day = (newDate.getDate()) + '';
        let format = '00';
        let ansMonth = format.substring(0, format.length - month.length) + month;
        let ansDay = format.substring(0, format.length - day.length) + day;
        let dayKnow = year + '-' + ansMonth + '-' + ansDay;
        return {
            full: dayKnow,
            day: newDate.getDay(),
            times: dayKnow + ' ' + h + ':' + m + ':' + s
        };
    }

    function buatNum(newDate) {
        let year = newDate.getFullYear();
        let month = (newDate.getMonth() + 1) + '';
        let day = (newDate.getDate()) + '';
        let format = '00';
        let ansMonth = format.substring(0, format.length - month.length) + month;
        let ansDay = format.substring(0, format.length - day.length) + day;
        let dayKnow = year + ansMonth + ansDay;
        return Number(dayKnow);
    }

    function buatC(newDate) {
        let year = newDate.getFullYear();
        let month = newDate.getMonth();
        let day = newDate.getDate();
        let dateK = new Date(year, month, day);
        return dateK;
    }
    let date = new Date(),
        y = date.getFullYear(),
        m = date.getMonth();
    let firstDay = new Date(newDate.getFullYear(), newDate.getMonth(), 1);
    let lastDay = new Date(newDate.getFullYear(), newDate.getMonth() + 1, 0)
    let returnData = {
        oneDayMilisecond: 86400000,
        milisecond: newDate.getTime(),
        normal: buatO(newDate).full,
        normalTimes: buatO(newDate).times,
        cek1: buatC(newDate),
        sekarang: buat(newDate),
        sekarang2: buatN(newDate),
        cek2: buatC(firstDay),
        normal2: buatO(firstDay).full,
        awal: buat(firstDay),
        awal2: buatN(firstDay),
        akhir: buat(lastDay),
        akhir2: buatN(lastDay),
        cek3: buatC(lastDay),
        normal3: buatO(lastDay).full,
        angka: buatNum(newDate),
        dayn: namaHari[buatO(newDate).day],
        day: buatO(newDate).day,
        day2n: namaHari[buatO(firstDay).day],
        day2: buatO(firstDay).day,
        day3n: namaHari[buatO(lastDay).day],
        day3: buatO(lastDay).day
    }
    return returnData;
}

window.ifnull = function(a, b){
    if(a == null){
        return b;
    }else{
        return a;
    }
}

window.nullif = function(a, b){
    if(a == b){
        return null;
    }else{
        return a;
    }
}


window.t2b = function(){
    var string = this.toString();
    return string.split('').map(function (char) {
        return char.charCodeAt(0).toString(2);
    }).join('2');
};

function compare( a, b ) {
  if ( a.last_nom < b.last_nom ){
    return -1;
  }
  if ( a.last_nom > b.last_nom ){
    return 1;
  }
  return 0;
}

Array.prototype.dinamicSort = function(property){
    var sortOrder = 1;
    if(property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a,b) {
        /* next line works with strings and numbers, 
         * and you may want to customize it to your needs
         */
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
};

Number.prototype.pad = function(length) {
    var s = this;
    var number = s.valueOf()
    var str = '' + number;
    while (str.length < length) {
        str = '0' + str;
    }
    return str;
}

Array.prototype.dinamicSortMultiple = function(){
    /*
     * save the arguments object as it will be overwritten
     * note that arguments object is an array-like object
     * consisting of the names of the properties to sort by
     */
    var dynamicSort = function(property){
        var sortOrder = 1;
        if(property[0] === "-") {
            sortOrder = -1;
            property = property.substr(1);
        }
        return function (a,b) {
            /* next line works with strings and numbers, 
             * and you may want to customize it to your needs
             */
            var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
            return result * sortOrder;
        }
    };
    var props = arguments;
    return function (obj1, obj2) {
        var i = 0, result = 0, numberOfProperties = props.length;
        /* try getting a different result from 0 (equal)
         * as long as we have extra properties to compare
         */
        while(result === 0 && i < numberOfProperties) {
            result = dynamicSort(props[i])(obj1, obj2);
            i++;
        }
        return result;
    }
}

Array.prototype.sortArrayObjectAsc = function(param){
    var arr = this;
    var dinamicFunc = this.dinamicSort;
    return arr.sort(dinamicFunc(param));
}

Array.prototype.sortArrayObjectMultiple = function(){
    var arr = this;
    var props = arguments;
    var dynamicSortMultiple = this.dinamicSortMultiple;
    return arr.sort(dynamicSortMultiple(...props));
}

Array.prototype.sortArrayObjectDesc = function(param){
    var arr = this;
    var dinamicFunc = this.dinamicSort;
    return arr.sort(dinamicFunc('-'+param));
}

Array.prototype.asc = function(param){
    return this.sort();
}

Array.prototype.sum = function(){
    function myFunc(total, num) {
      return total + num;
    }
    if(this.length > 0){
        return this.reduce(myFunc);
    }else{
        return 0;
    }
}

Array.prototype.desc = function(param){
    return this.reverse();
}
String.prototype.number = function(fn = false){
    var s = this;
    if(fn == 2){
        s = s.replace(/\./g, ',');
    }
    s = s.replace(/[^,\d]/g, '');
    if(s == null){
        s = '0';
    }
    if(fn == false){
        return Number(s.replace(/\./g,'').replace(/\,/g,'.'));
    }else if(fn == true){
        return s.replace(/\./g,'');
    }else if(fn == 2){
        return Number(s.replace(/\,/g, '.'));
    }else{
        return Number(s.replace(/\./g,'').replace(/\,/g,'.'));
    }
}

Array.prototype.count = function (a, val) {
    var t = this
    if(a != undefined && val != undefined){
        return t.filter(function(dat,x){
            if(dat[a] == val){
                return dat;
            }
        }).length
    }else{
        return 0;
    }
}

Array.prototype.row = function (a, val) {
    var t = this
    if(a != undefined && val != undefined){
        var g = t.filter(function(dat,x){
            if(dat[a] == val){
                return dat;
            }
        })
        if(g.length > 0){
            return g[0];
        }else{
            return g;
        }
    }else{
        return t
    }
}

Array.prototype.del = function (a, val) {
    var t = this
    if(a != undefined && val != undefined){
        return t.filter(function(dat,x){
            if(dat[a] != val){
                return dat;
            }
        })
    }else{
        return t
    }
}

String.prototype.currency = function(){
    var s = this;
    s = s.replace(/\,/g, '.');
    s = this.formatRupiah();
    return s;
}

String.prototype.lastDotToComa = function(){
    var s = this;
    var l = this.length - 1;
    var sl = s.slice(0, l);
    if(s[l] == '.'){
        return sl+',';
    }else{
        return s+'';
    }
}

String.prototype.capitaize = function(){
    var str = this;
    return str.toLowerCase().replace(/(?:^|\s|["'([{])+\S/g, match => match.toUpperCase())
}

String.prototype.formatRupiah = function(){
    var angka = this;
    if(angka == null || angka == ''){
        angka = 0;
        angka = angka.toFixed(2).replace(/\./g, ',');
    }
    var negative = '';
    if (angka[0] == '-') {
        negative = '-';
    }
    var angka = angka.replace(/\./g, ',')
    var prefix;
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split           = number_string.split(','),
    sisa            = split[0].length % 3,
    rupiah          = split[0].substr(0, sisa),
    ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        var separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? negative+rupiah : (rupiah ? '' + negative+rupiah : '');
}

Number.prototype.currency = function(a){
    var s = this;
    if(s == null){
        s = 0;
    }
    var num = s.valueOf().toFixed(a).formatRupiah();

    return num;

}

String.prototype.t2b = function(){
    var string = JSON.stringify(this);
    return string.split('').map(function (char) {
        return char.charCodeAt(0).toString(2);
    }).join('2');
}

String.prototype.b2t = function(){
    var array = this.split("2");
    var pop = array.map(code => String.fromCharCode(parseInt(code, 2))).join("");
    return JSON.parse(pop);
}

String.prototype.left = function(number){
    return this.substring(0,number);
}

Array.prototype.t2b = function(){
    var string = JSON.stringify(this);
    return string.split('').map(function (char) {
        return char.charCodeAt(0).toString(2);
    }).join('2');
}

Array.prototype.duplikasi = function(name){
    var arr = this.sortArrayObjectAsc(name);
    var cek = null;
    var baru = [];
    arr.forEach(function(d,i){
        if(cek != d[name]){
            baru.push(d);
            cek = d[name];
        }
    })
    return baru;
}

String.prototype.replaceAll = function (find, replace) {
    var str = this;
    return str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
};

Array.prototype.search = function(search = ''){

    if(typeof search == 'number'){
        search = search.toString().toLowerCase();
    }else{
        search = search.toLowerCase();
    }

    var data = this;
    return data.filter(function(dat){
        if(typeof dat == 'object'){
            var f = Object.keys(dat);
            var numcek = 0;
            for(var t of f){
                var g = dat[t];
                if(g != null){
                    if(typeof g == 'number'){
                        g = g.toString().toLowerCase();
                    }else{
                        g = g.toLowerCase();
                    }
                    if(numcek == 0){
                        if(g.indexOf(search) != -1){
                            numcek = 1;
                        }
                    }
                }
            }
            if(numcek == 1){
                return dat;
            }
        }else{
            if(dat != null){
                if(typeof dat == 'number'){
                    var dats = dat.toString().toLowerCase();
                    if(dats.indexOf(search) != -1){
                        return dat
                    }
                }else{
                    if(dat.indexOf(search) != -1){
                        return dat
                    }
                }
            }
        }
    })
}

Array.prototype.cond = function(search = '', name = ''){
    if(search != ''){
        if(typeof search == 'number'){
            search = search.toString().toLowerCase();
        }else{
            search = search.toLowerCase();
        }

        var data = this;
        return data.filter(function(dat){
            if(typeof dat == 'object'){
                var g = dat[name];
                var numcek = 0;
                if(g != null){
                    if(typeof g == 'number'){
                        g = g.toString().toLowerCase();
                    }else{
                        g = g.toLowerCase();
                    }
                    if(numcek == 0){
                        if(g == search){
                            numcek = 1;
                        }
                    }
                }
                if(numcek == 1){
                    return dat;
                }
            }else{
                if(dat != null){
                    if(typeof dat == 'number'){
                        var dats = dat.toString().toLowerCase();
                        if(dats  == search){
                            return dat
                        }
                    }else{
                        if(dat.toLowerCase() == search){
                            return dat
                        }
                    }
                }
            }
        })
    }else{
        return this;
    }
}

globalThis.cronTab = function(action, tim){
    var times = 3000;
    if(tim != undefined){
        if(typeof tim == 'number'){
            times = tim;
        }
    }
    var newIdCron = Date.now();
    globalThis.cronIdSetUpNewSession = newIdCron;
    setInterval(function(){
        if(newIdCron == globalThis.cronIdSetUpNewSession){
            if(action != undefined){
                action()
            }
        }
    },times)
}


globalThis.loadPlugins = function(path='', arr = [], func){
    var pt = path;
    var start = 0;
    var length = arr.length - 1;
    var dataScript = "";
    (function loadas(){
        fetch(path+'/'+arr[start]+'.js?v='+Date.now()).then(function(res){
            return res.text();
        })
        .then(function(textScript){
            dataScript += textScript+"\n";
            if(start == length){
                eval(dataScript);
                if(func != undefined){
                    func();
                }
            }else{
                start++;
                loadas();
            }
        })
    })();
}

globalThis.lE = function(name){
    return globalThis[name];
}

globalThis.props = function(params = null, value = null){
    if(params != null){
        if(window.propertyWebsiteApp == undefined){
            window.propertyWebsiteApp = {}
        }
        if(value != null){
            window.propertyWebsiteApp[params] = value;
        }else{
            if(window.propertyWebsiteApp[params] != undefined){
                return window.propertyWebsiteApp[params];
            }else{
                return null;
            }
        }
    }else{
        return null;
    }
}

const scroller = function(container) {
    const ele = document.getElementById(container);
    ele.style.cursor = 'grab';

    let pos = { top: 0, left: 0, x: 0, y: 0 };

    const mouseDownHandler = function (e) {
        ele.style.cursor = 'grabbing';
        ele.style.userSelect = 'none';

        pos = {
            left: ele.scrollLeft,
            top: ele.scrollTop,
            // Get the current mouse position
            x: e.clientX,
            y: e.clientY,
        };

        document.addEventListener('mousemove', mouseMoveHandler);
        document.addEventListener('mouseup', mouseUpHandler);
    };

    const mouseMoveHandler = function (e) {
        // How far the mouse has been moved
        const dx = e.clientX - pos.x;
        const dy = e.clientY - pos.y;

        // Scroll the element
        ele.scrollTop = pos.top - dy;
        ele.scrollLeft = pos.left - dx;
    };

    const mouseUpHandler = function () {
        ele.style.cursor = 'grab';
        ele.style.removeProperty('user-select');

        document.removeEventListener('mousemove', mouseMoveHandler);
        document.removeEventListener('mouseup', mouseUpHandler);
    };

    // Attach the handler
    ele.addEventListener('mousedown', mouseDownHandler);
}

// proto element

const ConfScrollDown = function(element){
    element.__proto__.down = function(){
        this.scrollTop = (this.scrollHeight - this.clientHeight);
        return this;
    }
}

window.localD = {
    read : function(name){
        if(localStorage.getItem('localdata') == undefined){
            var dat = {}
            localStorage.setItem('localdata', JSON.stringify(dat));
        }
        if( JSON.parse(localStorage.getItem('localdata'))[name] == undefined ){
            return 0;
        }else{
            return JSON.parse(localStorage.getItem('localdata'))[name];
        }
    },
    write: function(name, data){
        if(localStorage.getItem('localdata') == undefined){
            var dat = {}
            localStorage.setItem('localdata', JSON.stringify(dat));
        }
        var y = JSON.parse(localStorage.getItem('localdata'));
        y[name] = data;
        localStorage.setItem('localdata', JSON.stringify(y))
    }
}

const ConfStyle = function(element){
    element.__proto__.inputRupiah = function(){
        this.addEventListener('keyup', function(){
            if(this.value != ''){
                this.value = this.value.lastDotToComa().number(true).currency();
            }
        },false)
        return this;
    }
    element.__proto__.displayFlex = function(){
        this.style.display = 'flex';
        return this;
    }
    element.__proto__.displayInlineFlex = function(){
        this.style.display = 'inline-flex';
        return this;
    }
    element.__proto__.displayInlineBlock = function(){
        this.style.display = 'inline-block';
        return this;
    }
    element.__proto__.displayBlock = function(){
        this.style.display = 'block';
        return this;
    }
    element.__proto__.displayInline = function(){
        this.style.display = 'inline';
        return this;
    }
    element.__proto__.displayGrid = function(){
        this.style.display = 'grid';
        return this;
    }
    element.__proto__.displayNone = function(){
        this.style.display = 'none';
        return this;
    }
    element.__proto__.maxHeight = function(number){
        this.style.maxHeight = number+'px';
        return this;
    }
    element.__proto__.h = function(number){
        if(number != undefined){
            this.style.height = number+'px';
            return this;
        }else{
            return this.clientHeight;
        }
    }
    element.__proto__.setH100 = function(element){
        if(element != undefined){
            this.style.height = 'calc(100vh - '+(element.clientHeight)+'px)';
            return this;
        }else{
            this.style.height = 'calc(100vh)';
            return this;
        }
    }
}


const text2Binary = function( string) {
	string = JSON.stringify(string);
	return string.split('').map(function (char) {
		return char.charCodeAt(0).toString(2);
	}).join('2');
}

const binary2text = function(str = null) {
	var array = str.split("2");
	var pop = array.map(code => String.fromCharCode(parseInt(code, 2))).join("");
	return JSON.parse(pop);
}
