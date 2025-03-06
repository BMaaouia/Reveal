

<?php
include '../model/panier.php';
include '../controller/pan.php';
include_once "../model/reservation.php";
  include_once "../controller/reservationC.php";
  $reservationC=new reservationC();
	$listeEquipements1=$reservationC->afficherreservations();
  $s=0;
$panierC=new panierC();

$listepanier=$panierC->afficherPanier(); 



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

<body id="body" onload="captcha()">
  

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
            <img
              src="img/shopping-trolley--v2.png"
            />
          <li ><a href="cart.php">Panier</a></li>
          </li>
       
          <li class="menu-active"><a href="index.php">SHOP</a></li>
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
         
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  
  






  <section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
                        &nbsp; &nbsp; &nbsp; &nbsp;
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form   name="f" method="POST" action="ajouterCommandeC.php" >
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
                                    &nbsp; &nbsp; &nbsp; &nbsp;
										<div class="form-group">
                                        
											<label>RIB<span>*</span></label>
                                           
											<input  type="text" name="rib" id="rib"   >
                                         
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Numero de carte bancaire<span>*</span></label>
											<input  type="text" name="ncb" id="ncb" >
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
                                   
										<div class="form-group">
                                      
											<label>Numero de carte etudiant<span>*</span></label>
                                            
											<input  type="text" name="nce" id="nce" >
                                            
										</div>
                                      <br>
                                      <label>Captcha<span>*</span></label>
                                      <input  type="text" name="T1" id="T1" >
                                      <br><br>
                                      <label>Your answer<span>*</span></label>
                                      <input  type="text" name="T2" id="T2" >          
									</div>
									
									
									
									
								
								
								
								
									<div class="col-12">
									
									</div>
								</div>
							
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
                            &nbsp; &nbsp; &nbsp;
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
									<?php	
									$s=0;
									foreach($listeEquipements1 as $row) { ?>
										<?php   $s=$s+$row['iddate']  ?>
										<?php } ?>
										<li class="last">Total<span> <?php echo $s ?> DT</span></li>
										
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									
										<input type="checkbox" id="mc" name="rnb" value="1">
							<label for="rnb">
								Master card</label><br>
							<input type="checkbox" id="bc" name="soul" value="2">
							<label for="soul">
								 Carte bancaire</label><br>
							<input type="checkbox" id="pl" name="jazz" value="3">
							<label for="jazz">
								Paypal</label>
									
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="img/payment-method.png" alt="#">
								</div>
							</div>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button"  >
										
										<button class="btn"  onclick="return verif();" type="submit">proceed to checkout</button>
										
										
										
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
					</form>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
    <script language="javascript"> 

function verif()
{
if(f.rib.value =="")
{
  alert("Rib est obligatoire ou length >20");
  return false;
}else if (f.ncb.value =="")
{
  alert("numero carte bancaire est obligatoire");
  return false; 
}else if (f.nce.value =="")
{
  alert("numero carte etudiant  obligatoire");
  return false;
}else if(f.checked==false){
  alert("svp choisissez un mode de paiment !!");
  return false ;
}
T1=f.T1.value;
T2=f.T2.value;
if (!(T1==T2)){alert("wrong answer");return false;}

 }
 function captcha() {
ch="";
for (i=0;i<10;i++){
    k=Math.random()*26;
    al=Math.round(k); 
    if (al % 2 ==0){
        car=String.fromCharCode(al+65);
        ch=ch+car;

    }
    else{
        car=String.fromCharCode(al+97);
        ch=ch+car;
    }
}
document.getElementById("T1").value = ch;
}



</script>




















































































































    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us!</h2>
          <p></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>ESPRIT,Avenue Fethi Zouhir</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:26354521">+216 26354521</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="Innovators@Esprit.com">Innovators@Esprit.com</a></p>
            </div>
          </div>

        </div>
      </div>

      <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  

</body>
</html>
