<?php 



include "TypeCore.php";


$TypeCore = new TypeCore();

$TypeCore->addType($_POST['type'],$_POST['contenu']);

echo "<script>window.location.href='../views/addtype.php'; alert('Ajout avec succes !');</script>";

?>