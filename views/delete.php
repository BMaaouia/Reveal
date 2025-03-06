
<?PHP
	include "../controller/equipementC.php";

	$recC=new equipementC();
	
	
		$recC->supprimerequipement($_GET["idproduit"]);
		header('Location:form.php');
	

?>