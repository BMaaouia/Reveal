




<!--*************************************************************************************************-->


<?PHP
	include "../controller/reclamationC.php";
    include "../controller/reponseC.php";
	$utilisateurC=new reponseC();
	$listeUsers=$utilisateurC->afficherReponseF();

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
        <a href="login/login.php" class="Login">Login</a>
        <a href="login/register.php" class="Create_Account">Create An Account</a>
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
          <li><a href="modifierfront.php">Basket</a>
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
  <button class="btn" style="margin-left:50px"><a href="afficherfront.php">Retour à la liste</a></button>
        <hr>
        
        <section id="Report" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Reply</h2>
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
                                    
                                            <th>Sujet</th>
                                            <th>reponse</th>
                                            
			                               </tr>

			                                <?PHP
				                             foreach($listeUsers as $user){
			                                ?>
				                            <tr>
					                         <td><?PHP echo $user['idr']; ?></td>
					                    
                                                <td><?PHP echo $user['reponseR']; ?></td>
                                            <td><?PHP echo $user['reponse']; ?></td>
					                   
					                  
				                        </tr>
			                            <?PHP
                                             }
			                             ?>
                                            </table>
                                            <hr>
                                            <hr>
                  <button class="btn"  style="margin-left:370px" ><a href="mailling.php">SendMail to admin to recheck your report</a></button>
                                            <hr>
                                            <hr>
</div>

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
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
