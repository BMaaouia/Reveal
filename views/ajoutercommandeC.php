<?php

include '../model/commande.php';
include '../controller/comm.php';


if( isset($_POST['rib']) and isset($_POST['ncb']) and isset($_POST['nce']) )
{
	if( isset($_POST['nce']) ){
		$commande = new commande('Master card',$_POST['rib'],$_POST['ncb'],$_POST['nce']);
	}
	if( isset($_POST['soul']) ){
		$commande = new commande('Carte bancaire',$_POST['rib'],$_POST['ncb'],$_POST['nce']);
	}
	if( isset($_POST['jazz']) ){
		$commande = new commande('Paypal',$_POST['rib'],$_POST['ncb'],$_POST['nce']);
	}

	

	$commandeC=new commandeC();
	$commandeC->ajouterCommande($commande);
	$bdd = new PDO ("mysql:host=localhost;dbname=projet","root","");
    $tree = $bdd->query("DELETE  from panier ");
	header('Location: index.php');
}


?>
