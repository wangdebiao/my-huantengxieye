<?php
include "../public/session.php";
include "../public/db.php";
$id=$_GET["id"];
$result=$db->query("select * from category where pid=".$id);
if($row=$result->fetch_assoc()){
	$message = "有子类，不能删";
	$url="../class/class_guanli.php";
	include "../public/tiaozhuan.php";
}else{
	$db->query("delete from category where cid=".$id);
	$message = "已删除";
	$url="../class/class_guanli.php";
	include "../public/tiaozhuan.php";
};
?>