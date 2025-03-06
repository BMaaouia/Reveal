
<?php


// header.php
include ('header.php');

?>

<?php


session_start();

include '../controller/adherentC.php';
include_once '../model/adherent.php';

include_once "../model/loginn.php";
  include_once "../controller/loginC.php";



$message=" ";
$userC = new AdherentC();
$l= null;
$lc= new loginC();



if (isset($_POST["email"]) && isset($_POST["password"])) {
    if (!empty($_POST["email"])&& !empty($_POST["password"])){
        $_SESSION['email']=$_POST['email'];
        $message=$userC->connexionUser ($_POST["email"],$_POST["password"]);
        
        
       // $status=$_SESSION['status'];
       /* $_SESSION['nom'] = $_POST['firstName'] ;
		$_SESSION['id'] = $_POST['userID'] ;
        $_SESSION['e']=$_POST['email'];
		$_SESSION['prenom']=$_POST['lastName'] ;*/
        
       
        //$userC->verif_ban($email);
       
       
       
       /*  if($verif==true&& $email==true){
            header('Location: login.php'); 
        }
        if(!$verif){
            header('Location: login.php');
        }*/
        				
        
            
     
		if($email == false){
            header('Location: login.php');
          }	
    
        // on stocke dans le tableau une colonne ayant comme nom avec l'email à l'intérieur
        if ($message !='pseudo ou le mot de passe est incorrect'){
            $l=new login(
                $_SESSION['id'],
                $_SESSION['nom'],
                  $_SESSION['prenom'],
                  $_SESSION['email'],
                $_SESSION['password'],
                $_SESSION['status'],
                $_SESSION['image'],
                $_SESSION['date']
                );
                $lc->supprimer();
                $lc->add($l);
            
            header( 'Location:index.php');
        }
        if ($_POST["email"]=='maaouia.bergaya@esprit.tn'){
           // $message ='pseudo ou le mot de passe est incorrect';
           header( 'Location:afficherListeAdherents.php');
        }
    }
            else
        $message = "missing information"; 
}
?>

<!-- registration area -->
<section id="login-form">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
            <div class="text-center pb-5">
                <h1 class="login-title text-dark">Login</h1>
                <p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
                <span class="font-ubuntu text-black-50">Create a new <a href="ajouterAdherent.php">account</a></span>
        
            </div>
            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png' ; ?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="login.php" method="post" enctype="multipart/form-data" id="log-form">

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" required name="email" id="email" class="form-control" placeholder="Email*">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="password" id="password" class="form-control" placeholder="password*">
                        </div>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot_pass.php">Forgot password?</a></div>
                    <div class="submit-btn text-center my-5">
                      <button  type="submit" name="submit" class="btn btn-warning rounded-pill text-dark px-5" >Login</button>  
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>
<!-- #registration area -->


<?php

// footer.php
include ('footer.php');
?>