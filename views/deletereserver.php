<?PHP
    include_once "../controller/reservationC.php";

    $userC = new reservationC();
	
		$userC->supprimerreservation($_GET["numres"]);
    header('Location:index.php');

?>

