<?php
include "../public/session.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="ajax.js"></script>
		<script src="jquery.min.js"></script>
	</head>
	<style>
		table{
			width:800px;
			border:1px solid #000;
			margin:0 auto;
			border-bottom:none;
			/*border-collapse: collapse;*/
		}
		th,td{
			height: 30px;
			border:1px solid #000;
			text-align: center;
			line-height:30px;
		}
		.add{
			width:798px;height:30px;
	        font-size:20px;
	        text-align: center;
	        line-height: 30px;
	        border:1px solid #000;
	        border-top:none;
	        margin:0 auto;
	        cursor: pointer;
	        display: block;
	        text-decoration: none;
	        color:green;
		}
		.update,.del{
			cursor:pointer;
		}
		.zuihou{
			color: blue;
		}
	</style>
	<body>
		<table>
			<thead>
				<tr>
					<th>账号</th>
					<th>密码</th>
					<th>权限</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
		<div class="add">+</div>
	</body>
	<script>	
		//获取
		$.ajax({
            url:"select.php",
            dataType:"json",
            success:function (e) { 
            	console.log(e) 
                var str="";
                for(var i=0;i<e.length;i++){
                    str+="<tr id="+e[i].uid+">";
	                    str+="<td attr='username'>"+e[i].username+"</td>";
	                    str+="<td attr='password'>"+e[i].password+"</td>";
	                    str+="<td attr='role' class='gl'>"+e[i].role+"</td>";
	                    str+="<td class='zuihou'><span class='del'>删除</span>&nbsp;<span class='update'>编辑</span></td>";
                    str+="</tr>";
                }
                $("tbody").html(str)
            }
       	})
		//删除
		$("tbody").delegate(".del","click",function(){
			var father=$(this).parent().parent();
			var fatherId=father.attr("id");
			$.ajax({
				url:"del.php",
				data:{"id":fatherId},
				success:function(obj){
					if(obj=="ok"){
						father.remove()
					}else{
						alert("删除失败")
					}
				}
			})
		})
		//添加
		$(".add").click(function(){
			$.ajax({
				url:"add.php",
				success:function(obj){
					if(obj){
						$("<tr>").attr({"id":obj}).html("<td attr='username'></td><td attr='password'><td attr='role' class='gl'></td></td><td class='zuihou'><span class='del'>删除</span>&nbsp;<span class='update'>编辑</span></td>").appendTo($("tbody"))
					}
				}
			})
		})
		//修改
		$("tbody").delegate(".gl","dblclick",function(){
			var that=$(this);
			var oldvalue=$(this).html();
			$(this).html(" ")
			var input=$("<input>").css({"width":"80%"}).val(oldvalue).appendTo(this);
			input.focus();
			input.blur(function(){
				var newvalue=$(this).val();
				if(newvalue==oldvalue){
					input.remove()
					that.html(oldvalue);
				}else{
					var id=that.parent().attr("id");
					var gbname=that.attr("attr");
					$.ajax({
						url:"update.php",
						data:{id:id,gbname:gbname,value:newvalue},
						success:function(obj){
							if(obj=="ok"){
								input.remove();
								that.html(newvalue);
							}
						}
					})
				}
			})
		})
	</script>
</html>
