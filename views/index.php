<?php session_start();
 include '../controller/adherentC.php';
  include_once "../model/reclamation.php";
  include_once "../controller/reclamationC.php";
  include "../controller/EventCore.php";
  include "../controller/TypeCore.php";
  include_once "../model/loginn.php";
  include_once "../controller/loginC.php";
include "../controller/BlogCore.php";
include '../model/panier.php';
include '../controller/pan.php';
include_once "../model/equipement.php";
  include_once "../controller/equipementC.php";
  include_once "../model/reservation.php";
  include_once "../controller/reservationC.php";
//****************haithem**********************//
$blogC = new BlogCore();
$listeh = $blogC->getblogs();
  //**************teymour****************** */
$eventC = new EventCore();
$listet = $eventC->getEvents();

//*************maaouia************ */
$message="";
$adC=new AdherentC();
$liste =$adC->afficher();

$l= null;
$lc= new loginC();


$db = config::getConnexion();

$sql = "SELECT * FROM login ;" ;
			try
			{
				$query=$db->prepare($sql);
				$query->execute();
				$count=$query->rowCount();
				$result = $query->fetch(PDO::FETCH_OBJ);
				if($count==0)
				{
					$message="pseudo ou le mot de passe est incorrect";
				}
				else
				{
					$x=$query->fetch();
					
					$_SESSION['nom'] = $result->firstName ;
					$_SESSION['id'] = $result->userID ;
					$_SESSION['prenom']=$result->lastName ;
					$_SESSION['email']=$result->email ;
          $_SESSION['password']=$result->password ;
          $_SESSION['status']=$result->status ;
          $_SESSION['image']=$result->image ;
          $_SESSION['date']=$result->register_date ;
					echo "$message";

				}
      }
			catch (Exception $e)
				{
					$message= " ".$e->getMessage();
				}

			
      





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
//**************allani****************** */
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
//*********************Farouk****************** */
$panierC=new panierC();
$listepanier=$panierC->afficherPanier(); 
$panierC=new panierC();
$listepanier=$panierC->afficherPanier(); 
//****************** Checambou****************** */

$equipementC=new equipementC();
	$listeEquipements=$equipementC->afficherequipements();

  $reservationC=new reservationC();
	$listeEquipements1=$reservationC->afficherreservations();
?>
<style>

body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 25px;
}

.dark-mode {
  background-color: black;
  color: white;
}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
		}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
    margin-top: 50px;
		width: 560px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		-webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
-moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
		}

</style>
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
  <link rel="stylesheet" href="CSSrating/Stylesheet.css">
  <!-- Main Stylesheet File -->
  <link href="../Front/css/style.css" rel="stylesheet">
  <link href="assetsc/css/style.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <link rel="stylesheet" type="text/css" href="cssfooter/fonts.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/crumina-fonts.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/normalize.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/grid.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/base.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/blocks.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/layouts.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/modules.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/widgets-styles.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/ion.rangeSlider.css">


	<!--Plugins styles-->

	<link rel="stylesheet" type="text/css" href="cssfooter/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/primary-menu.css">
	<link rel="stylesheet" type="text/css" href="cssfooter/magnific-popup.css">

	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>

<body id="body">
<div id="hellopreloader">
      <div class="preloader">
        <svg width="58" height="58">
          <g
            fill="none"
            fill-rule="evenodd"
            stroke="#FFF"
            stroke-width="1.5"
            transform="translate(2 1)"
          >
            <circle cx="42.601" cy="11.462" r="5" fill="#fff">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="1;0;0;0;0;0;0;0"
              />
            </circle>
            <circle cx="49.063" cy="27.063" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;1;0;0;0;0;0;0"
              />
            </circle>
            <circle cx="42.601" cy="42.663" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;0;1;0;0;0;0;0"
              />
            </circle>
            <circle cx="27" cy="49.125" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;0;0;1;0;0;0;0"
              />
            </circle>
            <circle cx="11.399" cy="42.663" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;0;0;0;1;0;0;0"
              />
            </circle>
            <circle cx="4.938" cy="27.063" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;0;0;0;0;1;0;0"
              />
            </circle>
            <circle cx="11.399" cy="11.462" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;0;0;0;0;0;1;0"
              />
            </circle>
            <circle cx="27" cy="5" r="5" fill="none">
              <animate
                attributeName="fill-opacity"
                begin="0s"
                calcMode="linear"
                dur="1.3s"
                repeatCount="indefinite"
                values="0;0;0;0;0;0;0;1"
              />
            </circle>
          </g>
        </svg>
        <div class="text">Loading ...</div>
      </div>
    </div>
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
    if($l->getStatus()=='Banned'){
      
      header('Location: login.php');
      
 }
 else {
	?>
				
		Welcome <?php echo $l->getFirstName();   ?> ! 
   
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

      <nav style="margin-right:100px" id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#shop">Shop</a></li>
          <li><a href="#portfolio">Events</a></li>
          <li><a href="#team">Team</a></li>
       
          <li><a href="#contact">Contact</a></li>
          <li><a href="#Report">Report</a></li>
          
         
            
          </li>
          <li><a href="#clients">Blog</a>
         
            
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
      <div class="user-menu open-overlay">
            <a href="#" class="user-menu-content js-open-aside">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
    </div>
  </header><!-- #header -->


<!-- right-menu-->
<div class="mCustomScrollbar" data-mcs-theme="dark">
      <div class="popup right-menu">
        <div class="right-menu-wrap">
          <div class="user-menu-close js-close-aside">
            <a href="#" class="user-menu-content js-clode-aside">
              <span></span>
              <span></span>
            </a>
          </div>

          <div class="logo">
            <a href="index-2.html" class="full-block-link"></a>
            <img src="img/logo-eye.png" alt="Seosight" />
            <div class="logo-text">
              <div class="logo-title">Seosight</div>
            </div>
          </div>

          <p class="text">
            Investigationes demonstraverunt lectores legere me lius quod ii
            legunt saepius est etiam processus dynamicus.
          </p>
        </div>

        <div class="widget login">
          <h4 class="login-title">Sign In to Your Account</h4>
          <input
            class="email input-standard-grey"
            placeholder="Username or Email"
            type="text"
          />
          <input
            class="password input-standard-grey"
            placeholder="Password"
            type="password"
          />
          <div class="login-btn-wrap">
            <div class="btn btn-medium btn--dark btn-hover-shadow">
              <span class="text">login now</span>
              <span class="semicircle"></span>
            </div>

            <div class="remember-wrap">
              <div class="checkbox">
                <input
                  id="remember"
                  type="checkbox"
                  name="remember"
                  value="remember"
                />
                <label for="remember">Remember Me</label>
              </div>
            </div>
          </div>

          <div class="helped">Lost your password?</div>
          <div class="helped js-window-popup">Register Now</div>
        </div>

        <div class="widget contacts">
          <h4 class="contacts-title">Get In Touch</h4>
          <p class="contacts-text">
            Lorem ipsum dolor sit amet, duis metus ligula amet in purus, vitae
            donec vestibulum enim, tincidunt massa sit, convallis ipsum.
          </p>

          <div class="contacts-item">
            <img src="img/contact4.png" alt="phone" />
            <div class="content">
              <a href="#" class="title">8 800 567.890.11</a>
              <p class="sub-title">Mon-Fri 9am-6pm</p>
            </div>
          </div>

          <div class="contacts-item">
            <img src="img/contact5.png" alt="phone" />
            <div class="content">
              <a href="#" class="title">info@seosight.com</a>
              <p class="sub-title">online support</p>
            </div>
          </div>

          <div class="contacts-item">
            <img src="img/contact6.png" alt="phone" />
            <div class="content">
              <a href="#" class="title">Melbourne, Australia</a>
              <p class="sub-title">795 South Park Avenue</p>
            </div>
          </div>
        </div>
      </div>
    </div>






  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2>Making <span>Your Events</span><br>Happen!</h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="#clients" class="btn-projects scrollto">Our Events</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('../Front/img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('../Front/img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('../Front/img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('../Front/img/asasdzx.jpg');"></div>
      <div class="item" style="background-image: url('../Front/img/asasdzx.jpg');"></div>
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
            <img src="../Front/img/campusfrance2017-21.jpg" alt="">
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
          <p> Events services we provide for the clients</p>
        </div>

   

      <div class="container-fluid">
        <div class="row no-gutters">

          <?php foreach($listet as $event) { ?>
                <div class="col-lg-3 col-md-4">
                <div class="portfolio-item wow fadeInUp">
                <a href="<?="images/".$event->image?>" class="portfolio-popup">
                    <img src="<?="images/".$event->image?>" alt="">
                    <div class="portfolio-overlay">
                    <div class="portfolio-info"><h2 class="wow fadeInUp"><?=$event->titre?> <br> <?=$event->description?> <br> <?=$event->date?></h2></div>
                    </div>
                </a>
                </div>
            </div>
        <?php } ?>
          

        </div>
        

      </div>

      <div class="row" style="margin-left:350px">
        <div class="col-6">
          <div id='wrap'>

            <div id='calendar'></div>

            <div style='clear:both'></div>

          </div>
        </div>

       
        
      </div>
      
    </section><?php require "footer.php"; ?>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <link href="assetst/calendar.css" rel="stylesheet"/>

    <script>

	$(document).ready(function() {
    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			
			events: [
        <?php foreach($listet as $event) {?>
				{
					id: "<?= $event->id ?>",
					title: "<?= $event->titre ?>",
					start: new Date("<?= $event->date ?>"),
					allDay: false,
					className: 'info'
				},
        <?php } ?>
			],			
		});
		
		
	});

</script>

    <!--==========================
     haithem
    ============================-->
  


    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Blogs</h2>
          <p>Blogs  for the clients</p>
        </div>
      </div>


     

      <div class="container-fluid">
        <div class="row no-gutters">

          <?php foreach($listeh as $blog) { ?>
                <div class="col-lg-3 col-md-4">
                <div class="portfolio-item wow fadeInUp">
                <a href="<?="images/".$event->image?>" class="portfolio-popup">
                    <img src="<?="images/".$blog->image?>" alt="">
                    <div class="portfolio-overlay">
                    <div class="portfolio-info"><h2 class="wow fadeInUp"><?=$blog->titre?><br> <?=$blog->description?><br> <?=$blog->date?><br> <?=$blog->lieu?></h2></div>
                    
                  </div>
                </a>
                </div>
                <div  class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text mb-0">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="star">
                            <input type="radio" name="rating" id="star-1"> <label for="star-1" data-dataid="1"></label>
                            <input type="radio" name="rating" id="star-2"> <label for="star-2" data-dataid="2"></label>
                            <input type="radio" name="rating" id="star-3"> <label for="star-3" data-dataid="3"></label>
                            <input type="radio" name="rating" id="star-4"> <label for="star-4" data-dataid="4"></label>
                
                        </div>                                 
                    </div>
            </div>
            
        <?php } ?>
          

        </div>

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
                <img src="../Front/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <img src="../Front/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="../Front/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <img src="../Front/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="../Front/img/testimonial-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="../Front/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <img src="../Front/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="../Front/img/sadasdczx.jpg" class="testimonial-img" alt="">
              <h3>Farouk DaaDaa</h3>
              <h4></h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="../Front/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <img src="../Front/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="../Front/img/testimonial-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="../Front/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <img src="../Front/img/quote-sign-right.png" class="quote-sign-right" alt="">
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
              <div class="pic"><img src="../Front/img/qqqqqqqa.jpg" alt=""></div>
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
              <div class="pic"><img src="../Front/img/aasd.jpg" alt=""></div>
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
              <div class="pic"><img src="../Front/img/asd.jpg" alt=""></div>
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
              <div class="pic"><img src="../Front/img/sadasdczx.jpg" alt=""></div>
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
            <div class="pic"><img src="../Front/img/qwasdas.png" alt=""></div>
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
          <div class="pic"><img src="../Front/img/asdd.png" alt=""></div>
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

      
         <!--shop -->

         <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <br><br>
          <h2>equipement disponible</h2>
          <p>press on item to shop</p>
        </div>
      </div>



        <center>
      <table border="1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>produit</th>
                    <th>nom produit</th>
                    <th>Price</th>
                    <th>type</th>
                    <th>nom event</th>
                    <th>reserver</th>
                </tr>
            </thead>
            <tbody>
             <?php 
                 
            ?> 
                    <?php foreach ($listeEquipements as $prod): ?>
                <tr>
                    <td class="img">
                    <div class="col-lg-10 col-md-4">
                                  <div class="portfolio-item wow fadeInUp">
                                  <a href="<?PHP echo $prod['imgproduit']; ?>" class="portfolio-popup">
                                    <img src="<?PHP echo $prod['imgproduit']; ?>"width="10%">
                                    <div class="portfolio-overlay">
                                      <div class="portfolio-info"><h2 class="wow fadeInUp"><?PHP echo $prod['nomproduit']; ?></h2></div>
                                    </div>
                                  
                                  </div>   </a>
                                </div>                    </td>
                    <td>
                    <?PHP echo $prod['nomproduit']; ?>
                    </td>
                    <td class="price">&dollar;<?PHP echo $prod['price']; ?></td>
                    <td class="quantity">
                    <?PHP echo $prod['typeproduit']; ?>
                    </td>
                    <td>

                      <select name="titre" id="typeproduit" required>
                                                <option value="">selectioner event</option>
                                               <?php foreach ($listet as $option) :
                                                                          ?>
                                               <option><?php echo $option->titre; ?> </option>
                                                 <?php 
                                                             endforeach;
                                                    ?>
                                            </select>


                      </td>
                    <td class="price"><div class="form-check form-switch">
                    <a href="ajoutreser.php?$idcalendrier=<?php echo "14" ?> & idproduitres=<?php echo $prod['idproduit']; ?> & nomproduitres=<?php echo $prod['nomproduit']; ?>& imgproduitres=<?php echo $prod['imgproduit']; ?> & iddate=<?php echo $l->getUserID(); ?> & id_event=<?php echo 12; ?>& titre_event=<?php echo "hi"; ?>"class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
            </div></td>
            
                </tr><tr><td colspan="5"><div class="ligne_horizontal"></div></td></tr> 
                <?php endforeach; ?>
                </tbody>
              
              </table>
              <table>
              
                </table>
                    </center>


    </section>


    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <br><br>
          <h2>equipement disponible</h2>
          <p>press on item to shop </p>
          
        </div>
      </div>
      <input type="submit" value="proceed to checkout">


        <center>
      <table  class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>id Commande</th>
                    
                    <th>nom produit</th>
                    <th>nom event</th>
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

                      <?PHP echo $prod['titre_event']; ?>

                      </td>
                      
                    <td class="price"><div class="form-check form-switch">
                    <a href="deletereserver.php?numres=<?php echo $prod['numres']; ?> "class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
            </div></td>
                </tr><tr><td colspan="5"><div class="ligne_horizontal"></div></td></tr> 
                <?php endforeach; ?>
                </tbody>
              
              </table>
              <table>
              
                </table>
                    </center>


    </section>


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
       minlength="4" maxlength="15" value="<?php echo $l->getFirstName();?>"></td>
                </tr>

                <tr>
                    <td>
                        <label for="text">lastname:
                        </label>
                    </td>
                    <td><input type="text" name="lastname" id="lastname" required
       minlength="4" maxlength="8" value="<?php echo $l->getLastName();?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">email:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn" value="<?php echo $l->getEmail();?>">
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
    </section>

  </main>
<!--***************************************************************-->
<div class="container-fluid bg-green-color">
		<div class="">
			<div class="container">

				<div class="">

					<div class="subscribe scrollme">

						<div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
							<h4 class="subscribe-title">Email Newsletters!</h4>
							<form class="subscribe-form" method="post" action="https://html.crumina.net/html-seosight/import.php">
								<input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
								<button class="subscr-btn">subscribe
									<span class="semicircle--right"></span>
								</button>
							</form>
							<div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

						</div>

						<div class="images-block">
							<img src="img/subscr-gear.png" alt="gear" class="gear">
							<img src="img/subscr1.png" alt="mail" class="mail">
							<img src="img/subscr-mailopen.png" alt="mail" class="mail-2">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--***************************************************************-->

<footer class="footer">
	<div class="container">
		<div class="row">

			<div class="info">
				<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
					<div class="heading">
						<h3 class="heading-title">Seosight Company!</h3>
						<div class="heading-line">
							<span class="short-line"></span>
							<span class="long-line"></span>
						</div>
						<p class="heading-text">Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham
							liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
							Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
							ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt
							lectores legere me lius quod ii legunt saepius parum claram.
						</p>
					</div>

					<div class="socials">
						<a href="#" class="social__item">
							<img src="svg/circle-facebook.svg" alt="facebook">
						</a>
						<a href="#" class="social__item">
							<img src="svg/twitter.svg" alt="twitter">
						</a>
						<a href="#" class="social__item">
							<img src="svg/google.svg" alt="google">
						</a>
						<a href="#" class="social__item">
							<img src="svg/youtube.svg" alt="youtube">
						</a>
						<a href="#" class="social__item">
							<img src="svg/rss.svg" alt="rss">
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
					<div class="services">
						<div class="heading">
							<h3 class="heading-title">Services Provided</h3>
							<div class="heading-line">
								<span class="short-line"></span>
								<span class="long-line"></span>
							</div>
						</div>

						<ul class="list list--primary">
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">SEO Services</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Pay-per-click</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Social Media</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Web Analytics</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Web Development</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Content Management</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Blog Management</a>
							</li>
						</ul>

						<ul class="list list--primary">
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Virtual Marketing</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Email Marketing</a>
							</li>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a href="#">Keyword Analytics</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="contacts">
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="contacts-item">
						<div class="icon js-animate-icon">
							<img src="data:image/png;base64,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"/>
						</div>
						<div class="content">
							<a href="#" class="title">8 800 567.890.11</a>
							<p class="sub-title">Mon-Fri 9am-6pm</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="contacts-item">
						<div class="icon js-animate-icon">
				<img src="data:image/png;base64,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"/>


						</div>
						<div class="content">
							<a href="#" class="title">info@seosight.com</a>
							<p class="sub-title">online support</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
					<div class="contacts-item">
						<div class="icon js-animate-icon">
		<img src="data:image/png;base64,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"/>
						</div>
						<div class="content">
							<a href="#" class="title">Melbourne, Australia</a>
							<p class="sub-title">795 South Park Avenue</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span>
                        Copyright © 2016 <a href="index-2.html" class="sub-footer__link">Seosight,</a>
                        Designed by <a href="https://themeforest.net/user/themefire/portfolio">themefire</a>
                    </span>

					<span>Developed by <a href="https://themeforest.net/user/crumina/portfolio">Crumina</a></span>
					<span>Only on <a href="https://themeforest.net/user/crumina/portfolio">Envato Market</a></span>

					<a class="back-to-top" href="#">
						<svg class="back-to-top">
							<use xlink:href="#to-top"></use>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>

</footer>
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
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../Front/js/main.js"></script>
<script src="assetst/calendar.js"></script>

<!--footer -->
<script src="jsfooter/jquery-3.4.1.js"></script>

<script src="jsfooter/js-plugins/crum-mega-menu.js"></script>
<script src="jsfooter/js-plugins/swiper.jquery.min.js"></script>
<script src="jsfooter/js-plugins/waypoints.js"></script>
<script src="footer/js-plugins/jquery.drawsvg.js"></script>
<script src="jsfooter/js-plugins/jquery-countTo.js"></script>
<script src="jsfooter/js-plugins/jquery.mousewheel.js"></script>
<script src="jsfooter/js-plugins/jquery.mCustomScrollbar.js"></script>
<script src="jsfooter/js-plugins/imagesLoaded.js"></script>
<script src="jsfooter/js-plugins/jquery.magnific-popup.js"></script>
<script src="jsfooter/js-plugins/jquery.matchHeight.js"></script>
<script src="jsfooter/js-plugins/segment.js"></script>
<script src="jsfooter/js-plugins/bootstrap.js"></script>
<script src="jsfooter/js-plugins/jquery-circle-progress.js"></script>
<script src="jsfooter/js-plugins/Headroom.js"></script>
<script src="jsfooter/js-plugins/smooth-scroll.js"></script>
<script src="jsfooter/js-plugins/jquery.nice-select.js"></script>
<script src="jsfooter/js-plugins/fastClick.js"></script>
<script src="jsfooter/js-plugins/form-actions.js"></script>
<script src="jsfooter/js-plugins/velocity.js"></script>
<script src="jsfooter/js-plugins/time-line.js"></script>
<script src="jsfooter/js-plugins/ScrollMagic.min.js"></script>
<script src="jsfooter/js-plugins/animation.velocity.min.js"></script>
<script src="jsfooter/js-plugins/ajax-pagination.js"></script>
<script src="jsfooter/js-plugins/donut-chart.js"></script>
<script src="jsfooter/js-plugins/isotope.pkgd.min.js"></script>
<script src="jsfooter/js-plugins/photo-gallery.js"></script>
<script src="jsfooter/js-plugins/ion.rangeSlider.js"></script>
<script src="jsfooter/js-plugins/leaflet.js"></script>
<script src="jsfooter/js-plugins/MarkerClusterGroup.js"></script>

<script src="jsfooter/main.js"></script>
</body>

</html>

