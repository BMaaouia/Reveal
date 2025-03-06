<?PHP
  include_once "../model/reclamation.php";
  include_once "../controller/reclamationC.php";

  
  $error="";
    // create user
    $user = null;

    // create an instance of the controller
    $userC = new reclamationC();
    if (
        isset($_POST["date"]) && 
        isset($_POST["name"]) &&
        isset($_POST["lastname"]) && 
        isset($_POST["email"]) && 
        isset($_POST["sujet"]) && 
        isset($_POST["message"])
    ) {
        if (
            !empty($_POST["date"]) && 
            !empty($_POST["name"]) && 
            !empty($_POST["lastname"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["sujet"]) &&
            !empty($_POST["message"])
        ) {
            $user = new reclamation(
                $_POST['date'],
                $_POST['name'], 
                $_POST['lastname'],
                $_POST['email'],
                $_POST['sujet'],
                $_POST['message']
            );
            $userC->ajouterReclamation($user);
            $userC->sendmail($user);
            
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
  <section id="intro">

    <div class="intro-content">
      <h2>Making <span>Your Events</span><br>Happen!</h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="#Events" class="btn-projects scrollto">Our Events</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('img/asasdzx.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="img/campusfrance2017-21.jpg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>About us</h2>
            <h3>Have you ever tried to create your own event? or create your own party? all the phone calls you need to make and all the people you need to contact? , not to mention all the problems you might face? with the innovators, you don't have to worry about everything, because we take care of everything from start to finish</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Best services out there</li>
              <li><i class="ion-android-checkmark-circle"></i> You can count on us !</li>
              <li><i class="ion-android-checkmark-circle"></i> Fast and easy ! Team work make the dream work </li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- #about -->

    

    

    <!--==========================
      Our Portfolio Section
    ============================-->
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Event Services</h2>
          <p>Events services we provide for the clients</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/evenements_sportifs_et_societe.jpg" class="portfolio-popup">
                <img src="img/evenements_sportifs_et_societe.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Sport Event</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/gaming.jpg" class="portfolio-popup">
                <img src="img/gaming.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Gaming Event</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/soire.jpg" class="portfolio-popup">
                <img src="img/soire.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Night Party</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/kids.jpg" class="portfolio-popup">
                <img src="img/kids.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Kids Event</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/chess.jpg" class="portfolio-popup">
                <img src="img/chess.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Chess Event</h2></div>
                </div>
              </a>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- #portfolio -->
    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Clients</h2>
          <p> WE ARE PROUD TO HAVE WORKED WITH</p>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\es.png" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\star.jpg" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\coc.png" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\bi.png" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\st.png" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\mar.png" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\pep.png" alt="">
          <img src="C:\Users\Farouk daadaa\Desktop\reveal12\red.png" alt="">
          
        </div>

      </div>
    </section><!-- #clients -->

    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/sadasdczx.jpg" class="testimonial-img" alt="">
              <h3>Farouk DaaDaa</h3>
              <h4></h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>

        </div>

      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Team</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/qqqqqqqa.jpg" alt=""></div>
              <div class="details">
                <h4>Aziz Allani</h4>
                <span>Gestion Reclamation</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/aasd.jpg" alt=""></div>
              <div class="details">
                <h4>Haithem Attia</h4>
                <span>Gestion Blog</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/asd.jpg" alt=""></div>
              <div class="details">
                <h4>Maaouia Bergaya</h4>
                <span>Gestion Utilisateur</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/sadasdczx.jpg" alt=""></div>
              <div class="details">
                <h4>Farouk Daadaa</h4>
                <span>Gestion Commande</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        <div class="col-lg-3 col-md-6">
          <div class="member">
            <div class="pic"><img src="img/qwasdas.png" alt=""></div>
            <div class="details">
              <h4>Teymour Sayadi</h4>
              <span>Genstion Evenement</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
     

      <div class="col-lg-3 col-md-6">
        <div class="member">
          <div class="pic"><img src="img/asdd.png" alt=""></div>
          <div class="details">
            <h4>Karim Chikambou</h4>
            <span>Genstion Equipement</span>
            <div class="social">
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    </section><!-- #team -->

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
      <section id="Report" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Report Section</h2>
            <p>
              Sed tamen tempor magna labore dolore dolor sint tempor duis magna
              elit veniam aliqua esse amet veniam enim export quid quid veniam
              aliqua eram noster malis nulla duis fugiat culpa esse aute nulla
              ipsum velit export irure minim illum fore
            </p>
          </div>
           
          <div class="container">
            <div class="form">
              <div id="sendmessage"></div>
              <div id="errormessage"></div>
              <button class="btn" ><a href="afficherfront.php">Afficher la liste de réclamation</a></button>
             
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table class="table table-striped table-bordered table-hover" border="1" align="center">

                <tr>
                    <td rowspan='4' colspan='1'>Cordonnés</td>
                    <td>
                        <label for="nom">date:
                        </label>
                    </td>
                    <td><input type="date"  value="2018-07-22" name="date" id="date" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="text">name:
                        </label>
                    </td>
                    <td><input type="text" name="name" id="name" required
       minlength="4" maxlength="15"></td>
                </tr>

                <tr>
                    <td>
                        <label for="text">lastname:
                        </label>
                    </td>
                    <td><input type="text" name="lastname" id="lastname" required
       minlength="4" maxlength="8"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">email:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn">
                    </td>
                </tr>
                <tr>
                    <td rowspan='2' colspan='1'>Info Réclamation</td>
                    <td>
                        <label for="login">sujet:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" id="sujet" required
       minlength="4"  >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">message:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="message" id="message" required
       minlength="4" >
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
            </div>
          </div>
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



