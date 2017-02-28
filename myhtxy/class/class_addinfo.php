<?php
include "../public/db.php";
$pid=$_GET["pid"];
$cname=$_GET["cname"];
$db->query("insert into category (pid,cname) values ('$pid','$cname')");
	if($db->affected_rows>0){
		$message = "添加成功";
		$url="../class/class_add.php";
		include "../public/tiaozhuan.php";
	};

?>