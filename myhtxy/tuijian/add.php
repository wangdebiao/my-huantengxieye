<?php
	include "../public/db.php";
	$db->query("insert into position () values ()");
	if($db->affected_rows>0){
		echo $db->insert_id;
	};
?>