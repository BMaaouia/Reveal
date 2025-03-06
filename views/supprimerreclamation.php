<?PHP
	include "../controller/reclamationC.php";

	$utilisateurC=new reclamationC();
	
	if (isset($_POST["id"])){
		$utilisateurC->supprimerreclamation($_POST["id"]);
		header('Location:afficherreclamation.php');
	}

?>