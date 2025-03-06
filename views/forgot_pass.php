<?php session_start(); require_once "../controller/adherentC.php"; 
	include_once '../model/adherent.php';
$adherentC=new adherentC();

?>
   <?php 
//variable pour verifier si le formulaire est rempli
if(isset($_POST['check-email'])){/*
    $db = config::getConnexion();
    $sql='SELECT email from user';
    $query=$db->prepare($sql);
				$query->execute();
				
				$result = $query->fetch(PDO::FETCH_OBJ);
                $_SESSION['email']=$result->email ;*/
                $_SESSION['email']=$_POST['email'];

$adherentC->send_code($_SESSION['email']);
header('location: verify_code.php');
 
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                   
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>