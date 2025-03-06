<?PHP
	include "../controller/reponseC.php";

	$utilisateurC=new reponseC();
	
	if (isset($_POST["idr"])){
		$utilisateurC->supprimerReponse($_POST["idr"]);
		header('Location:afficherreponseB.php');
	}

?>