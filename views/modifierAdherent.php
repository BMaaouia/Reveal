

<?php
	include "../controller/adherentC.php";
	include_once '../model/adherent.php';
  include '../controller/loginC.php';
  include_once '../model/loginn.php';
//include '../model/adherent.php';



    session_start();
	$adC = new AdherentC();
  $lc = new loginC();
	$error = "";
	




	if (
		isset($_POST["firstName"])&& 
        isset($_POST["lastName"])&&
        isset($_POST["email"])&& 
        isset($_POST["password"])
	){
		if (
            !empty($_POST["firstName"])&& 
            !empty($_POST["lastName"])&& 
            !empty($_POST["email"])&& 
            !empty($_POST["password"])
        ) {
            $ad = new Adherent(
                $_POST['firstName'],
                $_POST['lastName'], 
                $_POST['email'],
                $_POST['password']
			);
      
      
            $lc->modifierLogin($ad);
            $adC->modifierUtilisateur($ad, $_GET['userID']);
            header('refresh:5;url=index.php');
            //header('Location:modifierAdherent.php');
        }
        else
            $error = "Missing information";
	}
    
?>

















<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Innovators</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../Front/img/favicon.png" rel="icon">
  <link href="../Front/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../Front/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../Front/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../Front/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../Front/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../Front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../Front/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="../Front/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../Front/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">Innovators@Esprit.com</a>
        <i class="fa fa-phone"></i> +216 26354521
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>






        
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body"><img src="img/sad.png" alt="" title="" /></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active" name="home"><a href="index.php" >Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Events</a></li>
          <li><a href="#team">Team</a></li>
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#Report">Report</a></li>
          <li><a href="#">Basket</a>
            <img
              src="img/shopping-trolley--v2.png"
            />
            
          </li>
          <li><a href="haithem/index.php">Blog</a>
            <img
              src="img/blog.png"
            />
            
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <hr>
  <button class="btn" style="margin-left:20px" name="return"><a href="index.php">Retour</a></button>
  <hr>
      
      <section id="Report" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Modifier</h2>
            <p>
              Modifier votre Compte !
            </p>
          </div>
           
         
	<body>
		
    <hr>
    
    <div id="error">
        <?php echo $error; ?>
    </div>

<?php
  if (isset($_GET['userID'])){
    $ad = $adC->recupererclient($_GET['userID']);
    
    
?>
<form action=" " method="POST">
        <table align="center">
            <tr>
                <td rowspan='4' colspan='1'>
        Fiche Personnelle
      </td>
                <td>
                    <label for="userID">Id:
                    </label>
                </td>
                <td>
        <input type="text" name="userID" id="userID"  value = "<?php echo $ad['userID']; ?>" disabled>
      </td>
    </tr>
    <tr>
      <td>
        <label for="firstName">Nom:
        </label>
      </td>
      <td>
        <input type="text" name="firstName" id="firstName" maxlength="20" value = "<?php echo $ad['firstName']; ?>">
      </td>
    </tr>
            <tr>
                <td>
                    <label for="lastName">Prénom:
                    </label>
                </td>
                <td><input type="text" name="lastName" id="lastName" maxlength="20" value = "<?php echo $ad['lastName']; ?>"></td>
            </tr>
            
            <tr>
                <td>
                    <label for="email">Adresse mail:
                    </label>
                </td>
                <td>
                    <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn" value = "<?php echo $ad['email']; ?>">
                </td>
            </tr>
            <tr>
                <td rowspan='2' colspan='1'>Information de Connexion</td>
                
                 
            <tr>
                <td>
                    <label for="password">Mot de passe:
                    </label>
                </td>
                <td>
                    <input type="password" name="password" id="password" value = "<?php echo $ad['password']; ?>">
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="modifier" name = "modiferAdherent"> 
                </td>
                <td>
                    <input type="reset" value="Annuler" >
                </td>
            </tr>
        </table>
    </form>
<?php
} if( isset($_POST['modiferAdherent']) || isset($_POST['return'])|| isset($_POST['home'])){
  $_SESSION['nom']=$_POST['firstName'];
$_SESSION['status']=$ad['status'];
$_SESSION['id']=$ad['userID'];
}
?>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
        <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by BootstrapMade
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../Front/lib/jquery/jquery.min.js"></script>
  <script src="../Front/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../Front/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Front/lib/easing/easing.min.js"></script>
  <script src="../Front/lib/superfish/hoverIntent.js"></script>
  <script src="../Front/lib/superfish/superfish.min.js"></script>
  <script src="../Front/lib/wow/wow.min.js"></script>
  <script src="../Front/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../Front/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="../Front/lib/sticky/sticky.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../Front/js/main.js"></script>

</body>
</html>
