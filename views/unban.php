<?php
include '../controller/adherentC.php';
//include '../model/adherent.php';
include '../controller/loginC.php';
//include '../model/adherent.php';
$lc = new loginC();


$adC = new AdherentC();
$l=$lc->unban($_POST["userID"]);
 $ad=$adC->unban($_POST["userID"]); 
 header('Location:afficherListeAdherents.php');?>