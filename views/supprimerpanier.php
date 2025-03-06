<?php
include '../model/pan.php';
include '../controller/panier1.php';




    $panierC=new panier1C();
   
    $panierC->supprimerpanier1($_GET["idpan"]);
 

    header('Location: affichercommande.php');


?>