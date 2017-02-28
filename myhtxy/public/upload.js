	function upload(url,obj,box,imgbox){
		this.url=url;
		var obj=obj||{};
		if(obj.nodeName=="INPUT"){
			this.obj=obj;
		}else if(typeof obj=="string"){
			this.obj=document.querySelector(obj);
		}
		var box=box||{};
		if(box.nodeName=="DIV"){
			this.box=box;
		}else if(typeof box=="string"){
			this.box=document.querySelector(box);
		}
		var imgbox=imgbox||{};
		if(imgbox.nodeName=="IMG"){
			this.imgbox=imgbox;
		}else if(typeof imgbox=="string"){
			this.imgbox=document.querySelector(imgbox);
		}
		this.name="file";
		this.size=1024*1024*20;
		this.type=["jpg","jpeg","png","gif"];
		this.onloadStart=function(){
			
		}
	}
	upload.prototype={
		upload:function(callback){
			if(this.url){
				this.callback=callback;
				this.getCon();
			}else{
				alert("请指定地址")
				return false;
			}
		},
		getCon:function(){
			var that=this;
			this.obj.onchange=function(){
				that.data=this.files[0];
	            var read=new FileReader();
	             read.readAsDataURL(that.data);
	            read.onload=function(e){
	                that.imgbox.src=e.target.result;
	            }
				if(that.check()){
	                that.upfile();
	            }
			}
		},
		check:function(){
			if(this.data.size>this.size){
				alert("文件太大");
				return false;
			}
			var leixin=this.data.name.substr(this.data.name.lastIndexOf(".")+1).toLowerCase();
			var flag=false;
			for (var i=0;i<this.type.length;i++) {
				if(leixin==this.type[i]){
					flag=true;
					break;
				}
			}
			if(!flag){
				alert("格式不对")
				return false;
			}
			return true;
		},
		upfile:function(){
			var ajax=new XMLHttpRequest();
			var formObj=new FormData();
        	formObj.append(this.name,this.data);
        	var that=this;
        	ajax.upload.onloadstart=function(){
        		that.onloadStart()
        	}
			ajax.upload.onprogress=function (e){
				var total=e.total;//所有的
				var loaded=e.loaded;//完成的
				var scale=loaded/total*100;
				that.box.style.width=scale.toFixed(2)+"%";
				that.box.innerHTML=scale+"%";
			}
			ajax.onload=function(){
				if(ajax.response=="ok"){
					that.callback(ajax.response)
				}
			}
			ajax.open("post",this.url);
			ajax.send(formObj);
		}
	}
