<?php
include "../public/db.php";
 $posid=$_GET["id"];
 $posname=$_GET["posname"];
 $value=$_GET["value"];
 $db->query("update position set {$posname}='{$value}' where posid=".$posid);
if($db->affected_rows>0){
	echo "ok";
}
?>