
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

let trickster = document.querySelector('trickster');
                let page_url = trickster.getAttribute('url');
                let project_name = trickster.getAttribute('name');
                globalThis.page_url = page_url;
                var domElement = function(selector) {
    this.selector = selector || null;
    this.element = null;
};
domElement.prototype.init = function() {
    switch (this.selector[0]) {
        case '<':
            var matches = this.selector.match(/<([\w-]*)>/);
            if (matches === null || matches === undefined) {
                throw 'Invalid Selector / Node';
                //return false;
            }
            var nodeName = matches[0].replace('<', '').replace('>', '');
            this.element = document.createElement(nodeName);
            break;
        default:
            this.element = document.querySelector(this.selector);
    }
};
domElement.prototype.on = function(event, callback) {
    var evt = this.eventHandler.bindEvent(event, callback, this.element);
}
domElement.prototype.off = function(event) {
    var evt = this.eventHandler.unbindEvent(event, this.element);
}
domElement.prototype.val = function(newVal) {
    return (newVal !== undefined ? this.element.value = newVal : this.element.value);
};
domElement.prototype.append = function(html) {
    this.element.innerHTML = this.element.innerHTML + html;
};
domElement.prototype.prepend = function(html) {
    this.element.innerHTML = html + this.element.innerHTML;
};
domElement.prototype.html = function(html) {
    if (html === undefined) {
        return this.element.innerHTML;
    }
    this.element.innerHTML = html;
};
domElement.prototype.eventHandler = {
    events: [],
    bindEvent: function(event, callback, targetElement) {
        this.unbindEvent(event, targetElement);
        targetElement.addEventListener(event, callback, false);
        this.events.push({
            type: event,
            event: callback,
            target: targetElement
        });
    },
    findEvent: function(event) {
        return this.events.filter(function(evt) {
            return (evt.type === event);
        }, event)[0];
    },
    unbindEvent: function(event, targetElement) {
        var foundEvent = this.findEvent(event);
        if (foundEvent !== undefined) {
            targetElement.removeEventListener(event, foundEvent.event, false);
        }
        this.events = this.events.filter(function(evt) {
            return (evt.type !== event);
        }, event);
    }
};

globalThis.tr_s = function(selector) {
    var el = new domElement(selector);
    el.init();
    return el;
}
globalThis.tr_db  = function() {
	return {
		data: {
	        select: " * ",
			table: "",
			join: [],
			condition: "",
			order: "",
			limit: "",
			softDeleteField: "deletedAt",
			setCreateTable: "",
			setInsertData: 0,
			setUpdateData: null,
			leftJoin: "",
			obj: null
		},
		select: function(a){
			this.data.select = a;
			return this;
		},
		table: function(a){
			this.data.table = a;
			return this;
		},
		__parseWhere: function(type,field,operator,value) {
			if (value == '') {
				value = operator;
				operator = '=';
			}
			let sp = this.data.condition;
			let z = ' WHERE ';
			if(sp != ''){
				z = ` ${type} `;
			}
			sp += ` ${z} ${field} ${operator} ${value} `;
			this.data.condition = sp;
		},
		where : function(field,operator,value=''){
			this.__parseWhere('AND',field,operator,value);
			return this;
		},
		orWhere: function(field,operator,value=''){
			this.__parseWhere('OR',field,operator,value);
			return this;
		},
	    order: function(a,b = "DESC"){
			this.data.order = ` ORDER BY ${a} ${b} `;
			return this;
	    },
	    limit: function(a, b){
			this.data.limit = ` LIMIT ${a}, ${b}  `;
			return this;
	    },
	    join: function(a = []){
	        this.data.leftJoin = '';
	        var pp = this;
	        a.forEach(function(y,i){
				console.log(y);
	            pp.data.leftJoin += " LEFT JOIN "+y+" ON "+y[1]+" "+y[2]+" "+y[3]+" ";
	        })
			console.log(pp);
	        return this;
	    },
	    leftJoin: function(a = []){
	        this.data.leftJoin = '';
	        var pp = this;
	        a.forEach(function(y,i){
	            pp.data.leftJoin += " LEFT JOIN "+y[0]+" ON "+y[1]+" "+y[2]+" "+y[3]+" ";
	        })
	        return this;
	    },
		delete: function() {
			var up = " DELETE FROM "+this.data.table+" ";
	        up += this.data.condition;
			this.data.updatedata = up;
		},
		hardDelete: function() {
			var up = " DELETE FROM "+this.data.table+" ";
	        up += this.data.condition;
			this.data.updatedata = up;
	        return this;
		},
	    update: function(a = {}){
			function escapeHtml(text) {
				return text
					.replace(/&/g, "&amp;")
					.replace(/</g, "&lt;")
					.replace(/>/g, "&gt;")
					.replace(/'/g, "&#039;");
			}
	        var up = " UPDATE "+this.data.table+" SET ";
	        up += Object.keys(a).map(function(x, s) {
	          	return ` ${x} = '${a[x]}' `;
	        }).join(",")
	        up += this.data.condition;
	        this.data.updatedata = up;
	        return this;
	    },
	    save: function(obj = {}){
			function escapeHtml(text) 
			{
				return text
					.replace(/&/g, "&amp;")
					.replace(/</g, "&lt;")
					.replace(/>/g, "&gt;")
					.replace(/'/g, "&#039;");
			}
	    	this.data.obj = obj;
	        var dat = Object.keys(obj);
	        var dd = dat.map(function(x,c){
	            return '\''+obj[x]+'\'';
	        }).join(",");
	        this.data.saveset = 1;
	        this.data.save = `INSERT INTO ${this.data.table} (${dat.join(",")}) VALUES (${dd}) `;
	        return this;
	    },
	    text2Binary : function( string) {
	        return string.split('').map(function (char) {
	        	return char.charCodeAt(0).toString(2);
	        }).join('2');

	    },
	    nextIncrement : function() {
	    	this.data.nextIncrement = `SELECT auto_increment AS increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '${this.data.table}'`;
	    	return this;
	    },
	    get: async function(/*func, qr = null*/){
	        //let ck = this;
	        let query = "";
	        query = ` SELECT ${this.data.select} FROM ${this.data.table} ${this.data.join} ${this.data.condition} ${this.data.order} ${this.data.limit} `;
	        /*if(qr != null)
			{
	            query = qr.replace(/\n/g, ' ');
	        }
	        if(this.data.setCreateTable != null)
			{
	            query = this.data.createTable;
	        }
	        if(this.data.setInsertData != null)
			{
	            query = this.data.setInsertData;
	        }
	        if(this.data.setUpdateData != null)
			{
	          query = this.data.setUpdateData;
	        }
	        if(this.data.nextIncrement != null)
			{
	          query = this.data.nextIncrement;
	        }*/
			//console.log(globalThis.page_url);
			return await fetch(`${globalThis.page_url}?ajaxreq=db`, {
							method: 'POST',
							headers: { "Content-Type": "application/x-www-form-urlencoded" },
							body: JSON.stringify({'query':query}) ,
						})
						.then(response => response.text())  // convert to json
						.then(response => JSON.parse(response))    //print data to console
						.catch(err => console.log('Request Failed', err)); 
	    }
	}
}

globalThis.tr_table = function() {
    return {
        data: {
            id: 'id' + Date.now(),
            select: null,
            row: {},
            table: null,
            element: null,
            pagination: 0,
            paginationPerPage: 10,
            countData: 0,
            search: null,
            idData: null,
            htmlForm: null,
        },
        table: function(a) {
            this.data.table = a;
            return this;
        },
        row: function(a) {
            this.data.row = a;
            return this;
        },
        load: function(a) {
            let id = this.data.id;
            let row = this.data.row;
            let rowKeys = Object.keys(this.data.row);
            tagupdate = 'data-update' + this.data.id;
            this.data.element = a;
            document.getElementById(this.data.element).style.minHeight = '50vh';
            let ldr = document.getElementById(this.data.id + '-loader-r');
            if (ldr == undefined) {
                document.getElementById(this.data.element).innerHTML = `
                    <div class="row">
                        <div class="col-12 text-center">
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                            </div>
                            <p>please wait...</>
                        </div>
                    </div>
                `;
            } else {
                ldr.style.display = 'inline-block';
            }
            if (this.data.pagination[this.data.table] == undefined) {
                this.data.pagination[this.data.table] = 0;
            }
            if (this.data.countData == undefined) {
                this.data.countData = 0
            }
            if (this.data.paginationPerPage == undefined) {
                this.data.paginationPerPage = 10;
            }
            let aaa = tr_db().table(this.data.table);
            if (this.data.search != undefined) {
                for (const mLIke of Object.keys(this.data.row)) {
                    aaa.orWhere(mLIke, 'LIKE', `"%${this.data.search}%"`)
                }
            }
            if (this.data.row != undefined) {
                aaa.select(Object.keys(this.data.row).join(','));
            }
            if (this.data.select != undefined) {
                aaa.select(this.data.select.join(","));
            }
            aaa.limit(this.data.pagination[this.data.table], this.data.paginationPerPage);
            aaa.get()
            return this;
        }
    }
}
globalThis.tr_form = function() {
    return {
        data: {
            id: 'id' + Date.now(),
            objform: null,
            idData: null,
            group: null,
            htmlForm: null,
        },
        create: function(obj) {
            let group = null;
            if (this.data.group != undefined) {
                group = this.data.group;
            }
            let newForm = '';
            let eform = this.data.objform = obj;
            let keys = this.data.idData = Object.keys(obj);
            let formP = keys.map(function(index) {
                let groupStart = "";
                let groupEnd = "";
                let getArr = obj[index];
                let getObj = {
                    type: getArr[0],
                    placeholder: getArr[1],
                    title: getArr[2],
                }
                if (typeof getArr[3] !== 'undefined') {
                    getObj = Object.assign(getObj, getArr[3]);
                }
                if (group != null) {
                    let gK = Object.keys(group);
                    for (const gk of gK) {
                        for (const gmap of group[gk]) {
                            if (gmap.start == index) {
                                groupStart = `
                                    <div class="${gk}">
                                        <div class="row">
                                `;
                            }
                            if (gmap.end == index) {
                                groupEnd = `
                                        </div>
                                    </div>
                                `;
                            }
                        }
                    }
                }
                // cek colom
                if (getObj.typeColumns == undefined) {
                    getObj.typeColumns = "";
                } else {
                    getObj.typeColumns = "-" + getObj.typeColumns;
                }
                if (getObj.columns == undefined) {
                    getObj.columns = "-12";
                } else {
                    getObj.columns = "-" + getObj.columns;
                }
                // if input method;
                let label = '<label></label>';
                if (getObj.title != undefined) {
                    label = `
                        <label for="${index}">${getObj.title}</label>
                    `;
                }
                let descripsi = '';
                if (getObj.description != undefined) {
                    descripsi = getObj.description
                }
                let vDefault = '';
                if (getObj.default != undefined) {
                    vDefault = ` value="${getObj.default}" `;
                }
                let head = '';
                if (getObj.head != undefined) {
                    head = `
                        <div class="col-12 mt-3">
                            <h5 style="font-weight: bold;">${getObj.head}</h5>
                        </div>
                    `;
                }
                if (getObj.type == 'date') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                    <input type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'slug') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="text" readonly="true" style="background: #ddd;" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'password') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}" style='position:relative;'>
                            <div class="form-group-2 passwd">
                                ${label}
                                <div>
                                    <input ${vDefault} type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                <i id='show-${index}' class="fas fa-eye-slash eypass" onclick='document.getElementById("${index}").type = "text";this.style.display="none"; document.getElementById("hide-${index}").style.display = "inline-block"; ';></i>
                                <i id='hide-${index}' class="fas fa-eye eypass" style="display:none;" onclick='document.getElementById("${index}").type = "password";this.style.display="none"; document.getElementById("show-${index}").style.display = "inline-block"; '></i>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'number') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="text" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'hidden') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2" style="display:none;">
                                ${label}
                                <div>
                                <input ${vDefault} type="hidden" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'readonly') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="text" style="background: #ddd;" readonly="true" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'note') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <textarea height="400px" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" ></textarea>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'area') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <textarea id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" ></textarea>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'textarea') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <textarea id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" value="${tanggal().normal}" ></textarea>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'disable') {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div id="f-${index}" class="form-group-2">
                                ${label}
                                <div>
                                <input  ${vDefault} type="text" id="${index}" disabled class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else if (getObj.type == 'select') {
                    if (getObj.title != undefined) {
                        label = `
                            <label class="label-select" for="${index}">${getObj.title}</label>
                        `;
                    }
                    let grid = '';
                    for (const inserView of getObj.view) {
                        grid += ' auto ';
                    }
                    if (globalThis.listdata == undefined) {
                        globalThis.listdata = {}
                    }
                    globalThis.listdata[index] = function() {
                        let dataSelect = tr_db().table(getObj.table).get();
                        dataSelect = dataSelect.map(function(rData) {
                            let valh = rData[getObj.value];
                            let x = 0;
                            let view = '';
                            for (const inserView of getObj.view) {
                                if (x == 0) {
                                    view += rData[inserView];
                                } else {
                                    view += ' ' + rData[inserView];
                                }
                                x++;
                            }
                            return `<option value="${valh}">${view}</option>`;
                        }).join("")
                        return dataSelect;
                    }
                    return `
                        <style>
                            .select-choice{
                                display: grid;
                                grid-template-columns: ${grid};
                            }
                        </style>
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                <input type="search" class="select-search" id="search-choice-${index}">
                                <div class="select-choice" id="choice-${index}">
                                    ${globalThis.listdata[index]()}
                                </div>
                                ${label}
                                <div>
                                    <select id="${index}" class="form-control-2" >
                                    <option value="">Pilih Data</option>
                                    ${globalThis.listdata[index]()}
                                    </select>
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                } else {
                    return `
                        ${groupStart}
                        ${head}
                        <div id="f-${index}" class="col${getObj.typeColumns}${getObj.columns}">
                            <div class="form-group-2">
                                ${label}
                                <div>
                                <input ${vDefault} type="${getObj.type}" id="${index}" class="form-control-2" placeholder="${getObj.placeholder}" >
                                </div>
                                ${descripsi}
                            </div>
                        </div>
                        ${groupEnd}
                    `;
                }
            }).join(" ")
            this.data.htmlForm = formP;
            return this;
        },
        load: function() {
            let t = this.data.id;
            let loadTable = `
                <style>
                    #${t}{
                        display: grid;
                        grid-template-columns: auto;
                        overflow-y: auto;
                    }
                    #${t}-h{
                        display: grid;
                        grid-template-columns: auto;
                        overflow-y: auto;
                    }
                    #${t} > div{
                        font-size: 8pt;
                        padding: 8px 8px;
                        border-top: 1px solid #ddd;
                        color: #333;
                        background: #f8f9fc;
                        min-width: 120px;
                    }
                    #${t}-h .head{
                        background: #f8f9fc;
                        color: #333;
                        padding: 5px 8px;
                        text-align: left;
                    }
                    #${t}-h{
                    position: relative;
                    z-index: 999;
                    box-shadow: 0 5px 10px rgba(125,125,125,0.4);
                    margin:0 !important;
                    }
                    #${t}-h{
                    padding-bottom: 2px;
                    border-top: 1px solid #ddd;
                    }
                    #${t}-h div{
                    padding: 4px 0;
                    }
                    .form-group-2{
                    margin: 0;
                    }
                    .search-table{
                    float: right;
                    padding: 4px 8px;
                    border: 1px solid #aae;
                    border-radius: 4px;
                    }
                    .head{
                        cursor: pointer;
                        font-size: 11pt !important;
                        font-weight: bold;
                    }
                    .page-item .page-link:nth-child(1){
                    margin-right: 8px;
                    }
                    .page-item .page-link{
                    padding: 8px 15px;
                    }
                    .select2-container{
                        display: block;
                    }
                    .note-group-select-from-files{
                    //   display: none;
                    }
                    .form-group-2{
                    width: 100%;
                    margin-bottom: 8px;
                    }
                    .form-group-2::after{
                    content: "";
                    display: block;
                    clear: both;
                    }
                    .form-group-2 label{
                    float: left;
                    font-size: 9pt;
                    }
                    .form-group-2 .form-control-2{
                    width: calc(100% - 100px);
                    }
                    .form-control-2{
                    font-size: 9pt;
                    }
                    select.form-control-2 {
                        height: 25px;
                    }
                    .form-group-2{
                    display: relative;
                    }
                    .form-group-2 .select-choice div{
                        white-space: nowrap;
                        border-bottom: 1px solid #ddd;
                    }
                    .eypass{
                    position: absolute;
                    bottom: 12px;
                    right: 15px;
                    z-index: 2;
                    cursor: pointer;
                    }
                    .form-group-2 .select-choice{
                        position: absolute;
                        top: calc(100% + 20px);
                        left: 110px;
                        display: none;
                        height:auto;
                        max-height: 250px;
                        width: wrap-content;
                        min-width: calc(100% - 100px);
                        background: white;
                        border-radius: 4px;
                        z-index: 99;
                        box-shadow: 0 0 10px rgba(1235,125,125,0.5);
                        overflow-y: auto;
                        padding: 10px 28px;
                    }
                    .label-select::after{
                    content: "";
                    position: absolute;
                    width: calc(100% - 100px);
                    background: transparent;
                    display: block;
                    height: 100%;
                    top:0;
                    right: 0;
                    }
                    .select-search{
                    width: calc(100% - 100px);
                    display: none;
                    position: absolute;
                    top: calc(100% - 10px);
                    z-index: 999;
                    padding: 3px 10px;
                    margin: 0;
                    height: 30px;
                    left: 110px;
                    border: 1px solid #ddd;
                    }
                    .modal-xl{
                        min-width: calc(100% - 40px);
                    }
                    .modal-xl .modal-body{
                    max-height: calc(100vh - 200px);
                    overflow: auto;
                    }
                    .form-d{
                    display: none;
                    }
                    @media screen and (max-width: 1024px){
                    .head-seach input{
                        width: 100%;
                    }
                    .head-seach{
                        margin-bottom: 10px;
                    }
                    }
                    .disabled-form{
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    background: transparent;
                    z-index: 999;
                    top: 0;
                    left: 0;
                    }
                    .head-seach{
                    display: grid;
                    grid-template-columns: auto auto;
                    }
                    @media screen and (max-width: 1024px){
                    .head-seach{
                        display: grid;
                        grid-template-columns: auto;
                    }
                    }
                    .form-group-2{
                    position: relative;
                    }
                    .form-control-2{
                    display: block;
                    padding: 8px 12px;
                    outline: none;
                    border: none;
                    background: #f5f8fa;
                    border-radius: 4px;
                    color: #5e6278;
                    font: inherit;
                    }
                    select.form-control-2{
                    -webkit-appearance: menulist-button;
                    display: block;
                    padding: 8px 12px;
                    outline: none;
                    height: 35px;
                    border: none;
                    background: #f5f8fa;
                    border-radius: 4px;
                    color: #5e6278;
                    }
                    .form-control-2 > option{
                    height: 18px;
                    }
                    .form-group-2{
                    display: grid;
                    grid-template-columns: 100px calc(100% - 100px);
                    }
                    .form-group-2 div input{
                    min-width: 100%;
                    max-width: 100%;
                    }
                    .form-group-2 div .select2{
                    min-width: 100%;
                    max-width: 100%;
                    }
                    .form-control-2{
                    border: 1px solid #aaa;
                    }
                    input.form-control-2[readonly=true]{
                    border: 1px solid #aaa;
                    background: #ddd;
                    }
                    .table-bordered td,.table-bordered th{
                    border: 1px solid #ddd;
                    }
                    .table-bordered{
                    border: 1px solid #ddd;
                    }
                    .note-btn{
                    padding: 5px !important;
                    }
                    .dropdown-toggle::after{
                    display: none;
                    }
                    .form-group-2 label{
                    display: flex;
                    align-items: center;
                    font-size: 16px !important;
                    font-weight: bold;
                    }
                    .form-group-2{
                        grid-template-columns: 100% !important;
                    }
                    @media screen and (max-width: 1024px){
                    .form-group-2{
                        grid-template-columns: 100% !important;
                    }
                    }
                    .form-group-2 div .select2  span{
                    height: 40px;
                    padding-top: 3px;
                    }
                    .form-group-2 div .select2  .select2-selection__arrow{
                    height: 40px;
                    padding-top: 3px;
                    }
                    #app-content-title{
                    margin-top: 10px;
                    }
                    #app-content{
                    position: relative;
                    }
                    #app-content .data-table{
                    position: relative;
                    max-height: calc(100vh - 455px) !important;
                    overflow: auto;
                    }
                    .bottom-nav{
                    display: grid;
                    grid-template-columns: auto auto;
                    }
                    .bottom-nav span{
                    margin-top: 13px;
                    }
                    @media screen and (max-width: 600px){
                    .bottom-nav{
                        display: grid ;
                        grid-template-columns: auto;
                        width: 100% !important;
                        text-align: center;
                    }
                    .bottom-nav span{
                        padding: 0 ;
                    }
                    .bottom-nav span > ul  {
                        display: inline-flex;
                        }
                    .bottom-nav span, .bottom-nav span ul{
                    margin: 0 !important;
                    padding: 0 !important;
                    }
                    }
                    .form-group-2 div textarea {
                        min-width: 100%;
                        max-width: 100%;
                    }
                    #btn-action-area{
                    position: fixed;
                    z-index: 9999;
                    bottom: 10px;
                    right: 10px;
                    }
                    .footer-app{
                    height: 60px;
                    position: fixed;
                    width: 100%;
                    bottom:0;
                    }
                    /* width */
                    ::-webkit-scrollbar {
                    width: 4px;
                    height: 4px;
                    }
                    /* Track */
                    ::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    }
                    /* Handle */
                    ::-webkit-scrollbar-thumb {
                    background: #888;
                    }
                    /* Handle on hover */
                    ::-webkit-scrollbar-thumb:hover {
                    background: #555;
                    }
                </style>
            `;
            return loadTable+this.data.htmlForm;
        }
    }
}


async function layouts_admin() {
document.querySelector("#main-page").innerHTML = "\r\n    <div style=\"padding:10px;\"> <\/div>\r\n    <a class=\"btn btn-info\" href=\"http:\/\/localhost:807\/_trickster\/\"> Index<\/a>\r\n    <a class=\"btn btn-secondary\" href=\"http:\/\/localhost:807\/_trickster\/welcome\/welcome\"> Welcome<\/a>\r\n    <a class=\"btn btn-primary\" href=\"http:\/\/localhost:807\/_trickster\/datasiswa\"> Data Siswa<\/a>\r\n    <a class=\"btn btn-primary\" href=\"http:\/\/localhost:807\/_trickster\/datakeluarga\"> Data Keluarga<\/a>\r\n    <a class=\"btn btn-primary\" href=\"http:\/\/localhost:807\/_trickster\/datapendukung\"> Data Pendukung<\/a>\r\n    <a class=\"btn btn-primary\" href=\"http:\/\/localhost:807\/_trickster\/datanilai\"> Data Nilai<\/a>\r\n    <br><br>\r\n    <tr-get-text1><\/tr-get-text1>\r\n    <tr-get-html><\/tr-get-html>\r\n"

    console.log("Extend Layout Admin niye");

}

async function pages_welcome() {

layouts_admin();
document.querySelector('tr-get-text1').innerHTML = "Echo dari Halaman Index";
document.querySelector('tr-get-html').innerHTML = "\r\n    <h1>Index<\/h1>\r\n";
const title = document.querySelector("title");
title.innerHTML = "Halaman Index"
document.querySelector('meta[name=description]').setAttribute('content', 'Halaman Index');
document.querySelector('meta[name=author]').setAttribute('content', 'FF');

    console.log("index");

}

async function pages_welcome_welcome() {

layouts_admin();
document.querySelector('tr-get-text1').innerHTML = "Echo dari Halaman Welcome";
document.querySelector('tr-get-html').innerHTML = "\r\n    <h1>Welcome<\/h1>\r\n    <h2>To Paradise...<\/h2>\r\n";
const title = document.querySelector("title");
title.innerHTML = "Halaman Welcome"
document.querySelector('meta[name=description]').setAttribute('content', 'Halaman Welcome');
document.querySelector('meta[name=author]').setAttribute('content', 'ZZ');

    console.log("welcome");

}

async function pages__errors_404() {
document.querySelector("#main-page").innerHTML = "\r\n    <div style=\"text-align: center\">\r\n        <h1>404 Not Found<\/h1>\r\n        <p>Oh no! It looks like the page you're trying to get to is missing!<\/p>\r\n    <\/div>\r\n"}

async function pages__errors_tidak_ada_tag() {
document.querySelector("#main-page").innerHTML = "\r\n    <div style=\"text-align: center\">\r\n        <h1>Syntax Error<\/h1>\r\n        <p>Tidak ada tag<\/p>\r\n    <\/div>\r\n"}

async function pages_datasiswa() {

layouts_admin();
document.querySelector('tr-get-html').innerHTML = "\r\n    <h2>Data Siswa<\/h2>\r\n    <div class=\"row\">\r\n        <div class=\"col-12 col-12\">\r\n            <div class=\"card shadow h-100 py-2\">\r\n                <div class=\"card-body\">\r\n                    <div id=\"datasiswa-main\"><\/div>\r\n                <\/div>\r\n            <\/div>\r\n        <\/div>\r\n    <\/div>\r\n";


    //let a = await tr_db().table('datasiswa').get();
    //await tr_db().table('datasiswa').join(['datakeluarga','datanilai']);
    //console.log(a)
    //tr_s('#datasiswa-main').html('bank-soal-'+Date.now());

    /*let a = tr_form().create({
        kode: ['text','Masukkan Kode','Kode'],
        judul: ['text','Masukkan Judul','Judul'],
        deskripsi: ['textarea','Isi Deskripsi','Deskripsi'],
    });
    tr_s('#datasiswa-main').html(a.load());*/
    let a = tr_table().table('datasiswa').row({
        kode: ['text','Masukkan Kode','Kode'],
        judul: ['text','Masukkan Judul','Judul'],
        deskripsi: ['textarea','Isi Deskripsi','Deskripsi'],
    }).load('datasiswa-main');

    /*tr_crud('datasiswa-main')
    .table('datasiswa')
    .title('Bank Soal')
    .createForm({
        kode: ['text','Masukkan Kode','Kode'],
        judul: ['text','Masukkan Kode','Kode'],
        //mapel: ['select','Pilih Mata Pelajaran','Mata Pelajaran',{table: 'setting_mapel',view: ['kode','nama'], value: 'kode'}],
        deskripsi: ['textarea','Isi Deskripsi','Deskripsi'],
    })
    .oncreate(function(a){
        tr_selector('#kode').setAttribute('readonly', true);
        tr_selector('#kode').value = 'bank-soal-'+Date.now();
    })
    .onupdate(function(a){
        tr_selector('#kode').setAttribute('readonly', true);
    })
    .row({
        kode: 'Kode',
        Judul: 'Judul',
        //mapel: 'Mata Pelajaran',
        action: '<button>Isi Soal</button>',
    })
    .order('kode', 'DESC')
    .load()*/

}

async function pages__default() {

layouts_admin();
document.querySelector('tr-get-text1').innerHTML = "Echo dari Halaman Index";
document.querySelector('tr-get-html').innerHTML = "\r\n    <h1>Index<\/h1>\r\n";
const title = document.querySelector("title");
title.innerHTML = "Halaman Index"
document.querySelector('meta[name=description]').setAttribute('content', 'Halaman Index');
document.querySelector('meta[name=author]').setAttribute('content', 'FF');

    console.log("index");

}


    
    const addOnClickLink = (elm) => {
        for (let i = 0; i < elm.length; i++) {
            if (window.addEventListener) { //Firefox, Chrome, Safari, IE 10
                elm[i].addEventListener('click', function(event) {
                    route(event);
                }, false);
            } else if (window.attachEvent) { //IE < 9
                elm[i].attachEvent('onmouseover', highlight);
            }
        }
    }
    const route = (event) => {
        event = event || window.event;
        event.preventDefault();
        window.history.pushState({}, "", event.target.href);
        handleLocation();
        let elm = document.getElementsByTagName("a");
        addOnClickLink(elm);
    }
    const routing = function (path) {
        //const index = listRoute.pages.findIndex(item => item.name.toLowerCase() === path.toLowerCase());
        //console.log(listRoute.pages[index].js);
            //document.querySelector("#main-page").innerHTML = listRoute.pages[index].html;
            //eval(listRoute.pages[index].js);
        window[path]();
        //currPage.style.display = "block";

    }
    const handleLocation = () => {
        var path = window.location.pathname;
        path = path.replace("/"+project_name+"/",""); 
        path = path.replaceAll("/", "_");
        path = ((path == "") ? '_default' : path);
        path = 'pages_'+path;
        console.log(path);
        routing(path);
    };
    window.onpopstate = handleLocation;
    window.route = route;
    handleLocation();
    let elm = document.getElementsByTagName("a");
    addOnClickLink(elm);
