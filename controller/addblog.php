<?php 



include "BlogCore.php";


$BlogCore = new BlogCore();

$target_dir = "../images/".basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);

$BlogCore->addblog($_POST['titre'],$_POST['description'],$_POST['date'],$_POST['lieu'],$_FILES['image']['name']);

echo "<script>window.location.href='../views/addblog.php'; alert('Ajout avec succes !');</script>";

?>