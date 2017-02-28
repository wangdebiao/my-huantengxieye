<?php
include "../public/db.php";
$result=$db->query("select * from user");
$array=array();
while($row=$result->fetch_assoc()){
    $array[]=$row;
};
echo json_encode($array);
?>