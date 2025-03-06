<?php
include 'RatingCore.php';
$RatingCore=new RatingCore();
$RatingCore->supprimerrating($_GET["id"]);
header('Location:../back/addrating.php');
?>