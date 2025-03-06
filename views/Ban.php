<?php
include '../controller/adherentC.php';
include '../controller/loginC.php';
//include '../model/adherent.php';
$lc = new loginC();
$adC = new AdherentC();
$l=$lc->Ban($_POST["userID"]);
 $ad=$adC->Ban($_POST["userID"]); 
 header('Location:afficherListeAdherents.php');?>


