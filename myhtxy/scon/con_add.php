<?php
include "../public/session.php";
include "../public/db.php";
//include "function.php";
//$tree=new abc();
//$tree->tree(0,1,$db,"category");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script src="../public/upload.js"></script>
	<style>
	.bigbox{
		width:600px;
		height: auto;
		border:1px solid #333;
		position:relative;
		top:0;bottom:0;left:0;right:0;
		margin:auto;
		background:#fff;
		border-radius: 2px;
		box-shadow: 0 0 5px #333;
		color: #5e5e5e;
	}
	.shuru{
		color:#20739B;
		height: 50px;
		line-height: 50px;
		font-size: 18px;
		margin:25px 0 15px;
		text-align: center;
	}
	.qx{
		color:#666;
		font-size: 13px;
		position: absolute;
		right:0;
		top:0;
	}

	#sub{
		position: absolute;
		bottom:10px;
		left:200px;
	}
	.qqq{
		width: 400px;
		margin-left: 100px;
		margin-bottom: 10px;
	}
	.box{
        width: 98px;
        height: 5px;
        text-align: center;
        border: 1px solid #000000;
        position: absolute;
        left:0;
        bottom:0;
    }
    .box1{
        width: 0%;
        height: 100%;
        text-align: center;
        line-height: 5px;
        background: red;
    }
    .img{
    	width:100px;
    	height: 100px;;
    	position: relative;
    }
    .img img{
    	width:100%;
    	height: 100%;;
    	
    }
    .one{
    	/*float: left;*/
    }
	</style>
</head>
<body>
<div class="bigbox">
	<form action="con_addinfo.php">
		<div class="shuru">添加内容</div>
		<div class="qqq">
			目录：<select name="pid">
					<option value="0">目录</option>
					<?php 
						$result=$db->query("select * from category where pid=0");
						while($row=$result->fetch_assoc()){
					?>
						<option value="<?php echo $row['cid']?>"><?php echo $row["cname"]?></option>
						<?php 
							$result1=$db->query("select * from category where pid=".$row['cid']);
							while($row1=$result1->fetch_assoc()){
						?>
							<option value="<?php echo $row1['cid']?>">--<?php echo $row1["cname"]?></option>
							<?php 
								$result2=$db->query("select * from category where pid=".$row1['cid']);
								while($row2=$result2->fetch_assoc()){
							?>
								<option value="<?php echo $row2['cid']?>">----<?php echo $row2["cname"]?></option>
							<?php 
							}
							?>
						<?php 
						}
						?>
					<?php 
					}
					?>
				</select>
			题目：<input type="text" name="stitle" value=""/>
		</div>
		<div class="qqq">添加内容：<br><textarea name="scon" id="" cols="30" rows="10" ></textarea></div>
		<div class="qqq">
			<input type="file" multiple="multiple" class="one" name="file">
			<div class="img">
				<img src="" alt="" />
				<div class="box">
					<div class="box1"></div>
				</div>
			    
			</div>
			
		</div><br>
		<div class="qqq">
			推荐位:<?php 
						$result3=$db->query("select * from position");
						while($row3=$result3->fetch_assoc()){
					?>
					<?php echo $row3["posname"]?>
						<input type="radio" name="posid" value="<?php echo $row3['posid']?>"/>
					<?php 
					}
					?>
		</div>
		<input type="hidden" name="path" id="dizhi" value=""/><br>
		<div class="qqq"><input type="submit" value="提交" disabled="true" id="sub"/></div>
	</form>
</div>
</body>
<script>
window.onload=function(){
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
				if(ajax.response){
					that.callback(ajax.response)
				}
			}
			ajax.open("post",this.url);
			ajax.send(formObj);
		}
	}
	var sub=document.querySelector("#sub");
	var obj=new upload("con_load.php",".one",".box1",".img>img")
	obj.upload(function(e){
		console.log(e)
		var dizhi=document.querySelector("#dizhi");
		dizhi.setAttribute("value",e);
		sub.removeAttribute("disabled");
	})
	obj.onloadStart=function(){
		sub.setAttribute("disabled","true");
	}
}	
</script>
</html>