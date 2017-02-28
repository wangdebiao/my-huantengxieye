<?php
include "../public/session.php";
include "../public/db.php";
$cid=$_GET["cid"];
$pid=$_GET["pid"];
$cname=$_GET["cname"];
$db->query("update category set pid='$pid',cname='$cname' where cid=".$cid);
	if($db->affected_rows>0){
		$message = "修改成功";
		$url="../class/class_guanli.php";
		include "../public/tiaozhuan.php";
	}else{
		$message = "修改失败或内容未改变";
		$url="../class/class_guanli.php";
		include "../public/tiaozhuan.php";
	};

?>