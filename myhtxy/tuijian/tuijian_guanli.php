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
			width:500px;
			border:1px solid #000;
			margin:0 auto;
			border-bottom:none;
			/*border-collapse: collapse;*/
		}
		th,td{
			width:150px;
			height: 30px;
			border:1px solid #000;
			text-align: center;
			line-height:30px;
		}
		.add{
			width:498px;height:30px;
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
					<th>posid</th>
					<th>posname</th>
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
                    str+="<tr id="+e[i].posid+">";
                    	str+="<td attr='posid'>"+e[i].posid+"</td>";
	                    str+="<td attr='posname'>"+e[i].posname+"</td>";
	                    
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
						$("<tr>").attr({"id":obj}).html("<td attr='posid'></td><td attr='posname'><td class='zuihou'><span class='del'>删除</span>&nbsp;<span class='update'>编辑</span></td>").appendTo($("tbody"))
					}
				}
			})
		})
		//修改
		$("tbody").delegate("td:not(.zuihou)","dblclick",function(){
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
					var posname=that.attr("attr");
					$.ajax({
						url:"update.php",
						data:{id:id,posname:posname,value:newvalue},
						success:function(obj){
							console.log(obj)
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
