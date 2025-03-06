<?php
include 'BlogCore.php';
$BlogCore=new BlogCore();
$BlogCore->supprimerblog($_GET["id"]);
header('Location:../views/addblog.php');
?>