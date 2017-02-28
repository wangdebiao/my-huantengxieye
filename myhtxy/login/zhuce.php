<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>注册</title>
	<link rel="stylesheet" href="../public/public.css">
	<script src="../public/jquery.min.js"></script>
</head>
<style>
	body{
		background: #022251;
	}
	.box{
		width:300px;
		height: 350px;
		border:1px solid #333;
		position:fixed;
		top:0;bottom:0;left:0;right:0;
		margin:auto;
		background:#fff;
		text-align: center;
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
	}
	.qx{
		color:#666;
		font-size: 13px;
		position: absolute;
		right:0;
		top:0;
	}
	.one{
		width: 150px;
		height: 30px;
		padding-left: 10px;
		border:1px solid #C6BFBF;
	}
	.two{
		width: 200px;
		margin:0 50px;
		position: relative;
	}
	.two select{
		position: absolute;
		left:0;
		top:0;
	}
	#dl{
		width: 180px;
		height: 28px;
		background: #345BAA;
		color: #fff;
		font-size: 14px;
		border:none;
		position: absolute;
		bottom:50px;
		left:60px;
		cursor: pointer;
	}
</style>
<body>
	<div class="box">
		<form action="../login/add.php" method="POST">
			<div class="shuru">账号注册</div>
			输入账号：<input type="text" name="username" class="one" placeholder="请输入账号" autocomplete="off" value=""/><br>
			<span></span><br>
			输入密码：<input type="text" name="password" class="one" placeholder="密码" autocomplete="off" value="" /><br>
			<span></span><br>
			确认密码：<input type="text" name="word123" class="one" placeholder="密码" autocomplete="off" value="" /><br>
			<span></span><br>
			<div class="two">
				<a class="qx" href="denglu.php">已有账号</a>
			</div>
			<input type="submit" value="注册" id="dl"/>
		</form>
	</div>
</body>
<script>
	var reg=/^\w{6,10}$/;
	//账号
	$("input[name=username]").keyup(function(){
		var val=$(this).val();
		if(!reg.test(val)){
			$("span").eq(0).css({"color":"red","font-size":"12px"}).html("请输入6-10位数字或字母")
		}else{
			$("span").eq(0).css({"color":"green","font-size":"12px"}).html("格式正确")
			$.ajax({
				url:"select.php",
				data:{username:val},
				type:"POST",
				success:function(obj){
					if(obj=="ok"){
						$("span").eq(0).css({"color":"green","font-size":"12px"}).html("账号可用")
					}else if(obj=="error"){
						$("span").eq(0).css({"color":"red","font-size":"12px"}).html("账号已存在")
					}
				}
			})
		}
	})
	//密码
	$("input[name=password]").keyup(function(){
		var val=$(this).val();
		if(!reg.test(val)){
			$("span").eq(1).css({"color":"red","font-size":"12px"}).html("请输入6-10位数字或字母")
		}else{
			$("span").eq(1).css({"color":"green","font-size":"12px"}).html("格式正确")
		}
	})
</script>
</html>