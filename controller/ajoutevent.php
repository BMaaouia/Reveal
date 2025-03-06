<?php 



include "EventCore.php";

$eventC = new EventCore();


$target_dir = "../images/".basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);

$eventC->addEvent($_POST['titre'],$_POST['description'],$_POST['date'],$_POST['lieu'],$_FILES['image']['name'], $_POST['type']);


echo "<script>window.location.href='../views/addevent.php'; alert('Ajout avec succes !');</script>";

?>