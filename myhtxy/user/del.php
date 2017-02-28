<?php
include "../public/db.php";
$id=$_GET["id"];
$db->query("delete from user where uid=".$id);
if($db->affected_rows>0){//删除时它影响的行数
	echo "ok";
};

?>