<?php
	include "../controller/reclamationC.php";
	include_once '../model/reclamation.php';



	$utilisateurC = new reclamationC();
	$error = "";
	
	if (
		isset($_POST["date"]) && 
        isset($_POST["name"]) &&
        isset($_POST["lastname"]) && 
        isset($_POST["email"]) && 
        isset($_POST["sujet"]) && 
        isset($_POST["message"])
	){
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
			
            $utilisateurC->modifierreclamation($user, $_GET['id']);
            //header('refresh:5;url=afficherreclamation.php');
        }
        else
            $error = "Missing information";
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
    <!-- Bootstrap Styles-->
    <link href="assetsB/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assetsB/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assetsB/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link
      href="http://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
      type="text/css"
    />
  </head>
  <body>
    <div id="wrapper">
      <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target=".sidebar-collapse"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1>
            <a href="#body"><img src="assetsB/asdf.png" alt="" title="" /></a>
          </h1>
        </div>

        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a
              class="dropdown-toggle"
              data-toggle="dropdown"
              href="#"
              aria-expanded="false"
            >
              <i class="fa fa-envelope fa-fw"></i>
              <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
              <li>
                <a href="#">
                  <div>
                    <strong>John Doe</strong>
                    <span class="pull-right text-muted">
                      <em>Today</em>
                    </span>
                  </div>
                  <div>
                    Lorem Ipsum has been the industry's standard dummy text ever
                    since the 1500s...
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <strong>John Smith</strong>
                    <span class="pull-right text-muted">
                      <em>Yesterday</em>
                    </span>
                  </div>
                  <div>
                    Lorem Ipsum has been the industry's standard dummy text ever
                    since an kwilnw...
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <strong>John Smith</strong>
                    <span class="pull-right text-muted">
                      <em>Yesterday</em>
                    </span>
                  </div>
                  <div>
                    Lorem Ipsum has been the industry's standard dummy text ever
                    since the...
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a class="text-center" href="#">
                  <strong>Read All Messages</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
            <!-- /.dropdown-messages -->
          </li>
          <!-- /.dropdown -->
          <li class="dropdown">
            <a
              class="dropdown-toggle"
              data-toggle="dropdown"
              href="#"
              aria-expanded="false"
            >
              <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
              <li>
                <a href="#">
                  <div>
                    <p>
                      <strong>Task 1</strong>
                      <span class="pull-right text-muted">60% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                      <div
                        class="progress-bar progress-bar-success"
                        role="progressbar"
                        aria-valuenow="60"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 60%"
                      >
                        <span class="sr-only">60% Complete (success)</span>
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <p>
                      <strong>Task 2</strong>
                      <span class="pull-right text-muted">28% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                      <div
                        class="progress-bar progress-bar-info"
                        role="progressbar"
                        aria-valuenow="28"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 28%"
                      >
                        <span class="sr-only">28% Complete</span>
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <p>
                      <strong>Task 3</strong>
                      <span class="pull-right text-muted">60% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                      <div
                        class="progress-bar progress-bar-warning"
                        role="progressbar"
                        aria-valuenow="60"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 60%"
                      >
                        <span class="sr-only">60% Complete (warning)</span>
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <p>
                      <strong>Task 4</strong>
                      <span class="pull-right text-muted">85% Complete</span>
                    </p>
                    <div class="progress progress-striped active">
                      <div
                        class="progress-bar progress-bar-danger"
                        role="progressbar"
                        aria-valuenow="85"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 85%"
                      >
                        <span class="sr-only">85% Complete (danger)</span>
                      </div>
                    </div>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a class="text-center" href="#">
                  <strong>See All Tasks</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
            <!-- /.dropdown-tasks -->
          </li>
          <!-- /.dropdown -->
          <li class="dropdown">
            <a
              class="dropdown-toggle"
              data-toggle="dropdown"
              href="#"
              aria-expanded="false"
            >
              <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-comment fa-fw"></i> New Comment
                    <span class="pull-right text-muted small">4 min</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                    <span class="pull-right text-muted small">12 min</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                    <span class="pull-right text-muted small">4 min</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-tasks fa-fw"></i> New Task
                    <span class="pull-right text-muted small">4 min</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                    <span class="pull-right text-muted small">4 min</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a class="text-center" href="#">
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
            <!-- /.dropdown-alerts -->
          </li>
          <!-- /.dropdown -->
          <li class="dropdown">
            <a
              class="dropdown-toggle"
              data-toggle="dropdown"
              href="#"
              aria-expanded="false"
            >
              <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
            </ul>
            <!-- /.dropdown-user -->
          </li>
          <!-- /.dropdown -->
        </ul>
      </nav>
      <!--/. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="main-menu">
          <li>
                        <a  href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="afficherListeAdherents.php"><i class="fa fa-desktop"></i> Gestion User</a>
                    </li>
					<li>
                        <a href="afficherreclamation.php"><i class="fa fa-bar-chart-o"></i> Gestion Reclamation</a>
                    </li>
                  
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Gestion equipement </a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Gestion évènement </a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Gestion commande </a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Gestion Blog </a>
                    </li>
          </ul>
        </div>
      </nav>
      <!-- /. NAV SIDE  -->
      <div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h1 class="page-header">
                Modifier <small>Reclamation</small>
              </h1>
            </div>
          </div>
          <!-- /. ROW  -->
          <button class="btn btn-warning"><a href="afficherreclamation.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id'])){
				$user = $utilisateurC->recupererReclamation($_GET['id']);
				
		?>
		<form action="" method="POST">
            <table class="table table-striped table-bordered table-hover" align="center" border="3">
                <tr>
                    <td rowspan='5' colspan='1'>
						Cordonnées
					</td>
                    <td>
                        <label for="id">Id:
                        </label>
                    </td>
                    <td>
						<input type="text" name="id" id="id"  value = "<?php echo $user['id']; ?>" disabled>
					</td>
				</tr>
				<tr>
       
					<td>
						<label for="date">Date:
						</label>
					</td>
					
                   <td>
						<input type="date" name="date" id="nom" value="2022-07-22"  value = "<?php echo $user['date']; ?>">
					</td>
				</tr>
                <tr>
                    <td>
                        <label for="prenom">Firstname:
                        </label>
                    </td>
                    <td><input type="text" name="name" id="prenom" required minlength="4" maxlength="15"  value = "<?php echo $user['name']; ?>"></td>
                </tr>

				<tr>
                    <td>
                        <label for="prenom">Lastname:
                        </label>
                    </td>
                    <td><input type="text" name="lastname" id="prenom" required minlength="4" maxlength="15" value = "<?php echo $user['lastname']; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn" value = "<?php echo $user['email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td rowspan='2' colspan='1'>Info Reclamation</td>
                    <td>
                        <label for="login">Sujet:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="sujet" id="login" required minlength="4" value = "<?php echo $user['sujet']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="message">Message:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="message" id="pass" required minlength="4" maxlength="15" value = "<?php echo $user['message']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
        </div>
        <!-- /. PAGE INNER  -->
  
      <!-- /. PAGE WRAPPER  -->

    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assetsB/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assetsB/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assetsB/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assetsB/js/custom-scripts.js"></script>
  </body>
</html>
