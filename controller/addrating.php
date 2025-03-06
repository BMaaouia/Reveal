<?php 



include "RatingCore.php";


$RatingCore = new RatingCore();

$RatingCore->addrating($_POST['note']);

echo "<script>window.location.href='../views/addrating.php'; alert('Ajout avec succes !');</script>";

?>