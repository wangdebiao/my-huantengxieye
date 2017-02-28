<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<style>
	body{
		background: #E4E8EB;
	}
	.box{
		width:400px;
		height: 200px;
		border-radius: 5px;;
		position:fixed;
		top:0;bottom:0;left:0;right:0;
		margin:auto;
		background:#eee;
		box-shadow: 0 0 10px #000000;
	}
	.jindu{
		width: 300px;;
		height: 15px;
		background: #95CEFF;
		margin-left:50px;
		position:relative;
		
	}
	.jindutiao{
		width:0px;
		height: 100%;;
		position:absolute;
		top:0;
		left: 0;
		background: #4D6C88;
	}
	.jindutiao span{
	}
	.box_top{
		width: 300px;
		height: 50px;
		padding:20px 50px 15px 50px;
		text-align: center;
		line-height: 50px;;
		color: ;
		font-size: 16px;
	}
	.box_bottom{
		width:130px;
		height: 25px;;
		background: #4AB0F8;;
		text-align: center;
		line-height: 25px;;
		border-radius: 10px;
		position: absolute;
		bottom:35px;
		right:35px;
	}
	.box_bottom a{
		color: #fff;
		font-size: 14px;;
	}
	.wenzi{
		width: 300px;;
		height: 15px;
		margin-left:50px;
		margin-top: 10px;
		text-align: center;
		line-height: 15px;
		color: #A9A9A9;
	}
</style>
<body>
	<div class="box">
		<div class="box_top"><?php echo $message?></div>
		<div class="jindu">
			<div class="jindutiao"><span>0.00%</span></div>
		</div>
		<div class="wenzi">页面跳转中，请稍后...</div>
		<div class="box_bottom"><a href="<?php echo $url?>">立即前往</a></div>
	</div>
</body>
<script>
	var	num=0;
	var nub=0;
	var jindu=document.querySelector(".jindutiao");
	var span=document.querySelector("span")
	var t=setInterval(function(){
		num++;
		nub=num*3;
		if(num==100){
			clearInterval(t);
			location.href='<?php echo $url?>';
			num=100;
		}
		jindu.style.width=num+"%";
		span.innerHTML=num+"%";
	},10)
</script>
</html>