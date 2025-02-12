const tr_db  = function() {
	return {
		data: {
	        select: " * ",
			table: "",
			join: [],
			condition: "",
			order: "",
			limit: "",
			softDeleteField: "deletedAt",
			setCreateTable: null,
			setInsertData: null,
			setUpdateData: null,
			leftJoin: "",
			obj: null
		},
		select: function(a){
			a = (a != "" ) ? 'id,'+a : a;
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
		getWithFunc: function(func, qr = null) {
			let query = "";
	        query = ` SELECT ${this.data.select} FROM ${this.data.table} ${this.data.join} ${this.data.condition} ${this.data.order} ${this.data.limit} `;
	        if(qr != null)
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
	        /*if(this.data.nextIncrement != null)
			{
	          query = this.data.nextIncrement;
	        }*/
			upload(`${globalThis.page_url}?ajaxreq=uploadapi`, '', 'qr.data', btoa(query), (a)=>{}, (b)=>{
				var res = JSON.parse(b);
				func(res.data, res.count)
			});
		},
	    get: async function(){
			let query = "";
			query = ` SELECT ${this.data.select} FROM ${this.data.table} ${this.data.join} ${this.data.condition} ${this.data.order} ${this.data.limit} `;
			console.log('#in database.js >> '+query);
			let body = {
				'query':query,
			};
			return await fetch(`${globalThis.page_url}?ajaxreq=db`, {
							method: 'POST',
							headers: { "Content-Type": "application/x-www-form-urlencoded" },
							body: JSON.stringify(body),
						})
						.then(response => response.text())  // convert to json
						.then(response => JSON.parse(response))    //print data to console
						.catch(err => console.log('Request Failed', err)); 
	   	},
		insert: async function(table,datas){
			await fetch(`${globalThis.page_url}?ajaxreq=db_insert`, {
				method: 'POST',
				headers: { "Content-Type": "application/x-www-form-urlencoded" },
				body: JSON.stringify({'table':table,'datas':datas}),
			})
			.then(response => response.text())
			.then(response => JSON.parse(response))
			.then(response => console.log(response))
			.catch(err => console.log('Request Failed', err));
		},
		update: async function(table,datas,id){
			let query = `INSERT INTO ${table}`;
			let columns = '('+Object.keys(datas).join(',')+')';
			let values = '('+Object.values(datas).join(',')+')';
			query += ` ${columns} VALUES ${values};`;
			console.log(query);
		}
	}
}
