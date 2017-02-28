<?php
include "../public/db.php";
$username=$_POST["username"];
$result=$db->query("select username from user");
while($row=$result->fetch_assoc()){
	if($row["username"]==$username){
		echo "error";
		exit;
	};
};
echo "ok";
?>