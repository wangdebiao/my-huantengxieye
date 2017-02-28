<?php
session_start();
if(!isset($_SESSION["is_login"])){
	$message = "请登录";
    $url="../login/denglu.php";
    include "tiaozhuan.php";
    exit;
}
?>