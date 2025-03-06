<?PHP
  include_once "../model/reservation.php";
  include_once "../controller/reservationC.php";

  $error="";
    // create user
    $user = null;

    // create an instance of the controller
    $userC = new reservationC();
    if (
        isset($_GET["idproduitres"]) && 
        isset($_GET["nomproduitres"]) && 
        isset($_GET["imgproduitres"]) &&
        isset($_GET["iddate"])
    ) {
        if (
            !empty($_GET["idproduitres"]) && 
            !empty($_GET["nomproduitres"]) && 
            !empty($_GET["imgproduitres"]) && 
            !empty($_GET["iddate"])
        ) {
            $user = new reservation(
                $_GET['idproduitres'],
                $_GET['nomproduitres'],
                $_GET['imgproduitres'], 
                $_GET['iddate'],
                $_GET['id_event'],
                $_GET['titre_event']
            );
           


        }
        else
            $error = "Missing information";
    }
    $userC->ajouterreservation($user);
    header('Location: cart.php');
?>