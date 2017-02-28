<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>首页-广州欢腾鞋业有限公司</title>
	<link rel="stylesheet" type="text/css" href="../public/public.css">
    <link rel="stylesheet" type="text/css" href="../public/index.css">
    <script src="../public/jquery.min.js"></script>
    <script src="../public/index.js"></script>
</head>
<style>
	iframe{
		width:100%;
		height: auto;
	}
</style>
<body>
<!-- 顶部导航 -->
	<div class="wdb-topnavbox">
		<div class="wdb-topnav">
			<div class="wdb-topnav-left">
				<img src="../images/head.jpg" alt="">
			</div>
			<div class="wdb-topnav-right">
				<div class="wdb-topnav-right-three"><a href="">设为首页</a></div>
				<div class="wdb-topnav-right-three"><a href="">加入收藏</a></div>
				<div class="wdb-topnav-right-three"><a href="contact.html">联系我们</a></div>
			</div>
		</div>
	</div>
<!-- 主导航 -->
	<div class="wdb-mainbavbox">
		<div class="wdb-mainbav">
			<div class="wdb-mainbav-left">
				<img src="../images/logo.png" alt="">
			</div>
			<ul class="wdb-mainbav-right">
				<a href="index.php">
					<li class="wdb-mainbav-right-seven1"></li>
				</a>
				<?php
					include "../public/db.php";
					$sql="select * from category where pid=0";
					$result=$db->query($sql);
					$v=1;
					while($row=$result->fetch_assoc()){
						$v=$v+1;
						if($row["cid"]==1){
				?>
				<a href="about_category.php?id=1">
					<li class="wdb-mainbav-right-seven<?php echo $v?>"></li>
				</a>
				<?php
				}else if($row["cid"]==2){
				?>
				<a href="news_category.php?id=2">
					<li class="wdb-mainbav-right-seven<?php echo $v?>"></li>
				</a>
				<?php 		
					}else if($row["cid"]==3){
				?>
				<a href="product_category.php?id=3">
					<li class="wdb-mainbav-right-seven<?php echo $v?>"></li>
				</a>
				<?php 		
				}else{
				?>
				<a href="category.php?id=<?php echo $row["cid"]?>">
					<li class="wdb-mainbav-right-seven<?php echo $v?>"></li>
				</a>
				<?php 		
				};};
				?>
			</ul>
		</div>
	</div>