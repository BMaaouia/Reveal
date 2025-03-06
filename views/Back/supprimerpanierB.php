<?php
include 'model/pan.php';
include 'controller/panier1.php';


if (isset($_GET["id"]))
{

    $panier1C=new panier1C();
   
    $panier1C->supprimerpanier1($_GET["id"]);
 

    header('Location: afficherpanier.php');
}

?>