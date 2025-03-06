<?php
include 'model/commande.php';
include 'controller/comm.php';


if (isset($_GET["id"]))
{

    $commandeC=new commandeC();
   
    $commandeC->supprimercommande($_GET["id"]);
 

    header('Location: affichercommande.php');
}

?>