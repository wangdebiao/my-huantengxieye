<?php
session_start();
include "../public/db.php";
$username=$_POST["username"];
$password=md5($_POST["password"]);
$role=$_POST["role"];
$result=$db->query("select * from user");
while($row=$result->fetch_assoc()){
	if($row["username"]==$username){
		if($row["password"]==$password){
			if($row["role"]==$role){
				if($role==1){
					$message ="身份确认，管理员登录成功";
		        	$url = "../main.php";
		        	$_SESSION["is_login"]="ok";
		        	$_SESSION["username"]="$username";
		        	include "../public/tiaozhuan.php";
		        	exit;
				}else if($role==0){
					$message = "会员登录成功";
		        	$url = "../index/index.php";
		        	include "../public/tiaozhuan.php";
		        	exit;
				};
				exit;
			};
		};
	};
};
$message = "登录失败";
$url = "denglu.php";
include "../public/tiaozhuan.php";

?>