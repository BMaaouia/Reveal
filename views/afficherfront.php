




<!--*************************************************************************************************-->


<?PHP
	include "../controller/reclamationC.php";
  session_start();
  include '../controller/adherentC.php';
 

//**************maaouia***************** */
$adC=new AdherentC();

$liste =$adC->afficher();
//******************allani******************* */
	$utilisateurC=new reclamationC();
	$listeUsers=$utilisateurC->afficherReclamations();
    $error="";
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
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetsB/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assetsB/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assetsB/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assetsB/css/custom-styles.css" rel="stylesheet" />

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

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





        <?php
	if(isset($_SESSION['nom'])) {			
		include_once ("../config.php");					
    if($_SESSION['status']=='Banned'){
      
      header('Location: login.php');
      
 }
 else {
	?>
				
		Welcome <?php echo $_SESSION['nom']   ?> ! 
   
		<!-- /.dropdown -->
    <a class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="detailsAdherent.php?userID=<?php echo $_SESSION['id'];?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="modifierAdherent.php?userID=<?php echo $_SESSION['id']  ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href='logout.php'><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
               
                <!-- /.dropdown -->
    <br/>

	<?php	
 }
      session_destroy();      
	} 
  else { ?>
		<a href="login.php" class="Login">Login</a>
        <a href="ajouterAdherent.php" class="Create_Account">Create An Account</a>
	<?php
      }
	?>




        
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
          <li class="menu-active"><a href="#body">Home</a></li>
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

  <!--==========================
    Intro Section
  ============================-->
  <hr>
  <button class="btn" style="margin-left:20px" ><a href="index.php">Retour</a></button>
  
  
  
        <hr>
        
        <section id="Report" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Reclamations</h2>
            <p>
              Sed tamen tempor magna labore dolore dolor sint tempor duis magna
              elit veniam aliqua esse amet veniam enim export quid quid veniam
              aliqua eram noster malis nulla duis fugiat culpa esse aute nulla
              ipsum velit export irure minim illum fore
            </p>
</div>
<table class="table table-striped table-bordered table-hover" >
                                            <tr>
				                            <th>Id</th>
			                            	<th>date</th>
				                            <th>name</th>
				                            <th>lastname</th>
                                            <th>email</th>
                                            <th>sujet</th>
                                            <th>Message</th>
                                            <th>Replys</th>
				                           
                                            

			                               </tr>

			                                <?PHP
				                             foreach($listeUsers as $user){
			                                ?>
				                            <tr>
					                         <td><?PHP echo $user['id']; ?></td>
					                          <td><?PHP echo $user['date']; ?></td>
					                         <td><?PHP echo $user['name']; ?></td>
					                             <td><?PHP echo $user['lastname']; ?></td>
					                         <td><?PHP echo $user['email']; ?></td>
                                                <td><?PHP echo $user['sujet']; ?></td>
                                            <td><?PHP echo $user['message']; ?></td>
                                            <td><a href="afficherreponse.php?idr="<?PHP echo $user['id']; ?>> Voir Réponse  </a></td>
					                   
					               
                   
				                        </tr>
			                            <?PHP
                                             }
			                             ?>
                                            </table>
                                            <hr>
                                            <hr>

<hr>
</div>


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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>



