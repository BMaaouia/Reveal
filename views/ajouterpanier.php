<?php
include '../model/panier.php';
include '../controller/pan.php';
if (isset($_GET['id_article2'])){
	$id=$_GET['id_article2'];
$conn = mysqli_connect("localhost","root","","projet");
$result= $conn->query("SELECT * FROM article WHERE id_article=$id") or die ($mysqli->error);
$row =$result->fetch_assoc();
} 
$eee=$_GET['id_article2'];
$ee=$row['nom_article'];
$e=$row['prix'];

$panier = new panier($eee,$e,$ee);


	$panierC=new panierC();
	$panierC->ajouterPanier($panier);
	header('Location: cart.php');


?>