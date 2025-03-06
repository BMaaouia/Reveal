<?php
include 'TypeCore.php';
$TypeCore=new TypeCore();
$TypeCore->supprimertype($_GET["id"]);
header('Location:../views/addtype.php');
?>