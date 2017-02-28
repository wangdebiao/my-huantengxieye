<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>登录</title>
	<link rel="stylesheet" href="../public/public.css">
	<script src="../public/jquery.min.js"></script>
</head>
<style>
	body{
		background: #022251;
	}
	.box{
		width:300px;
		height: 300px;
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
		width: 200px;
		height: 30px;
		padding-left: 10px;
		border:1px solid #C6BFBF;
		margin-bottom: 15px;
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
		<form action="dengluYZ.php" method="POST">
			<div class="shuru">账号登录</div>
			<input type="text" name="username" class="one" placeholder="账号" autocomplete="off" value=""/>
			<input type="password" name="password" class="one" placeholder="密码" autocomplete="off" value="" />
			<div class="two">
				<select name="role" id="">
					<option value="0">会员</option>
					<option value="1">管理员</option>
				</select>
				<a class="qx" href="zhuce.php">没有账号？</a>
			</div>
			<input type="submit" value="登录" id="dl"/>
		</form>
	</div>
</body>
</html>