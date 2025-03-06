<?php
include 'EventCore.php';
$EventCore=new EventCore();
$EventCore->supprimerevent($_GET["id"]);
header('Location:../views/addevent.php');
?>