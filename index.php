<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once "app/request.php";

$app = new App();
$mail = new Mailer();
?>