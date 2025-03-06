

<?php
  include_once "../model/reservation.php";
  include_once "../controller/reservationC.php";
  $reservationC=new reservationC();
	$listeEquipements1=$reservationC->afficherreservations();
  $s=0;
  $ss=0;
  $sss=1;
  $a=1;
  $k=1;
?>



<!DOCTYPE html>
<html lang="en">
<head>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  margin: 8px 2px;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: blue; 
  border: 2px solid  #e7e7e7;
}

</style>
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
        <a href="login.php" class="Login">Login</a>
        <a href="afficherListeAdherents.php" class="Create_Account">Create An Account</a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
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
          <li ><a href="index.html">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li>
           
          <li class="menu-active"><a href="cart.php">Panier</a></li>
          </li>
       
          <li ><a href="shop.php">SHOP</a></li>
          <li><a href="#portfolio">Events</a></li>
          <li><a href="#team">Team</a></li>
         
          <li><a href="#contact">Contact</a></li>
          <li><a href="#Report">Report</a></li>
         
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <hr>

  <button style="margin-left:200px" class="btn" ><a href="index.php">Retour</a></button>

  <table  class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>id Commande</th>
                    
                    <th>nom produit</th>
                    <th>prix</th>
                    <th>annuler </th>
                </tr>
            </thead>
            <tbody>
             <?php 
                 /* isset($_GET['idcalendrier']);
                    $test = $_GET['idcalendrier'];*/
            ?> 
                    <?php foreach ($listeEquipements1 as $prod): ?>
                <tr>
                    <td>
                    <?PHP echo $prod['numres']; ?>
                    </td>
                    
                    <td class="quantity">
                    <?PHP echo $prod['nomproduitres']; ?>
                    </td>
                      <td>

                      <?PHP echo $prod['iddate']; ?>

                      </td>
                      <?php  
                 $s=$s+ $prod['iddate']; ?>
                    <td class="price"><div class="form-check form-switch">
                    <a href="deletereserver.php?numres=<?php echo $prod['numres']; ?> "class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
            </div></td>
                </tr><tr><td colspan="5"><div class="ligne_horizontal"></div></td></tr> 
                <?php endforeach; ?>
                </tbody>
              
              </table>
             

              <div class="total-amount">
						<div class="row">
							
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										
										<li class="last">You Pay :  <span><?php echo $s; ?> DT</span></li>
									</ul>
                  
									<div class="button5">
                    
										
                    <a href="ajouterpanier1.php?somme=<?php ECHO $s;?>">checkout</a>
        
										<a href="shop.php" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>

           <!-- #Report -->
     
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
