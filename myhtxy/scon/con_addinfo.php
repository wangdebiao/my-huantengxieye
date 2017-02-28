<?php
include "../public/session.php";
include "../public/db.php";
	$path=$_GET["path"];
	$cid=$_GET["pid"];
	$stitle=$_GET["stitle"];
	$scon=$_GET["scon"];
	$posid=$_GET["posid"];
	$username=$_SESSION["username"];
	$db->query("insert into shows (cid,stitle,scon,username,image,posid) values ('$cid','$stitle','$scon','$username','$path','$posid')");
	if($db->affected_rows>0){
		$message = "添加内容成功";
		$url="../scon/con_add.php";
		include "../public/tiaozhuan.php";
	};
?>