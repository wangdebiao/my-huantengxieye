<?php
session_start();
if(!isset($_SESSION["is_login"])){
	$message = "请登录";
    $url="login/denglu.php";
    include "public/tiaozhuan.php";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>main</title>
	<link rel="stylesheet" type="text/css" href="public/public.css"/>
	<script src="public/jquery.min.js"></script>
</head>
<style>
    *{
        box-sizing: border-box;
    }
    html,body{
        width:100%;
        height:100%;
        background: #000;
    }
    .bigbox{
    	width: 95%;
    	height: 95%;
    	background: #E9E9E9;
    	position: fixed;
		top:0;
		bottom:0;
		left:0;
		right:0;
    	margin:auto;
    }
    .leftbox{
    	width: 20%;
    	height: 100%;
    	background: #414149;
    	float: left;
    }
    .left_top{
    	height: 22%;
    }
    .left_top .userimg{
    	width: 60px;
    	height: 60px;
    	background: #fff;
    	float: left;
    	margin:30px 20px 30px 30px ;
    }
    .left_top .userimg img{
    	width: 100%;
    	height: 100%;
    }
    .left_top .usermessage{
    	float: left;
    	margin-top: 40px;

    }
    .left_top .usermessage h1,.left_top .usermessage span{
    	color: #fff;
    	margin-bottom: 5px;
    }
    .left_top .usermessage a{
    	display: inline-block;
    	margin-top: 2px;
    	color: #eee;
    	font-size: 12px;
    }
    .left_bottom{
    	height: 80%;
    	border-top: 1px groove #D1D1D6;
    }
    iframe{
        width:100%;
        height:100%;
    }
    .menu{
    	width: 100%;
    	height: auto;
    	margin-top: 40px;
    	border-top: 1px solid #ccc;
    }
    .opt{
        cursor: pointer;
        width: 100%;
        min-height: 40px;
        border-bottom: 1px solid #ccc;
        line-height: 40px;
        padding-left: 20px;
        font-size: 16px;
    	color: #fff;
    }
    .menu .opt .son li{
    	cursor: pointer;
        width: 100%;
        height: 40px;
        border-top: 1px solid #ccc;
        line-height: 40px;
        padding-left: 20px;
        font-size: 14px;
    }
    .menu .opt .son li a{
		color: #eee;
    }
    .rightbox{
    	width: 78%;
    	height:100%;
    	float: left;
    }
    .right_top{
    	width: 100%;
    	height: 10%;
    	background: #414149;
    	float: left;
    	border-radius: 10px;
    	margin-left: 2px;;
    }
    .right_top span{
    	display: block;
    	margin-left:20px;
    	margin-top: 20px;
		color: #fff;
		float: left;
		font-size: 18px;
    }
    .right_top span a{
    	display: inline;
    	margin-left:20px;
		color: #fff;
		font-size: 14px;
    }
    .riqi{
		width: 200px;
		margin-top: 15px;
		overflow: hidden;
		color: #fff;
    	float: right;
    	margin-right: 50px;
    }
    .right_bottom{
    	width: 100%;
    	height: 90%;
    	float: left;
    }
    a{
    	display: block;
    	width: 100%;;height: 100%;;
    }
</style>
<script>
	function time(){
		var t=setInterval(function(){
			var newdate=new Date();
			$(".riqi").html(newdate)
		},1000)
	}
	time()
</script>
<body>
	<div class="bigbox">
		<div class="leftbox">
			<div class="left_top">
				<div class="userimg">
					<img src="images/timg.jpg" alt="">
				</div>
				<div class="usermessage">
					<h1><?php echo $_SESSION["username"]?></h1>
					<span>[超级管理员]</span><br>
					<a href="login/denglu.php">退出</a>
				</div>
				
			</div>
			<div class="left_bottom">
				<ul class="menu">
	               	<li class="opt">
	                   	用户管理
	                   	<ul class="son">
	                       	<li><a href="user/user_guanli.php" target="right">管理用户</a></li>
	                   	</ul>
	               	</li>
	               	<li class="opt">
	                   	分类管理
	                   	<ul class="son">
	                       	<li><a href="class/class_add.php" target="right">添加分类</a></li>
	                       	<li><a href="class/class_guanli.php" target="right">管理分类</a></li>
	                   	</ul>
	               	</li>
	               	<li class="opt">
	                   	内容管理
	                   	<ul class="son">
	                       	<li><a href="scon/con_add.php" target="right">添加内容</a></li>
	                       	<li><a href="scon/con_guanli.php" target="right">管理内容</a></li>
	                   	</ul>
	               	</li>
	               	<li class="opt">
	                   	推荐位管理
	                   	<ul class="son">
	                       	<li><a href="tuijian/tuijian_guanli.php" target="right">管理推荐位</a></li>
	                   	</ul>
	               	</li>
	           </ul>
			</div>
		</div>
		<div class="rightbox">
			<div class="right_top">
				<span>Welcome 后台管理系统<a href="index/index.php">[站点首页]</a></span>
				
				<div class="riqi"></div>
			</div>
			<div class="right_bottom">
				<iframe src="" frameborder="0" name="right" srcdoc="<img style='margin-left:100px;margin-top:100px;' src='images/main.jpg' alt='' />">
           		</iframe>
			</div>
		</div>
	</div>
</body>
    <script>
        $(function(){
            $(".opt").click(function(){
                $(this).find(".son").toggle(100);
                $(".opt").css({"background":"none"}).eq($(this).index()).css({"background":"#B45343"})
            })
            $(".son").click(function(e){
            	e.stopPropagation()
            })
        })
    </script>
</html>