<?php
include '../model/pan.php';
include '../controller/panier1.php';


$ee=$_GET['somme'];


$panier1 = new panier1(1,$ee);


	$panier1C=new panier1C();
	$panier1C->ajouterPanier1($panier1);
   
	header('Location: checkout.php');


?>