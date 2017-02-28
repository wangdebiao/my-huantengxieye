<?php
include "../public/session.php";
include "../public/db.php";
$sid=$_GET["id"];
$db->query("delete from shows where sid=".$sid);
if($db->affected_rows>0){
	$message="删除内容成功";
	$url="../scon/con_guanli.php";
	include "../public/tiaozhuan.php";
}
?>