<?php
include '../controller/adherentC.php';
//include '../model/adherent.php';
$adC = new AdherentC();
$adC->supprimer($_GET["userID"]);

header('Location:afficherListeAdherents.php');?>