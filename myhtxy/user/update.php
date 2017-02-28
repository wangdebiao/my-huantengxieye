<?php
include "../public/db.php";
 $id=$_GET["id"];
 $gbname=$_GET["gbname"];
 $value=$_GET["value"];
 $db->query("update user set {$gbname}='{$value}' where uid=".$id);
if($db->affected_rows>0){
	echo "ok";
}
?>