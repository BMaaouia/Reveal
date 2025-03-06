
<?PHP
	include "../controller/reclamationC.php";
    include "../controller/reponseC.php";
//include "../PDF1",
    $message = '';

    $connect = new PDO("mysql:host=localhost;dbname=projet", "root", "");
          
              //require '../views/create-dynamic-pdf-send-as-attachment-with-email-in-php-demo/src/Exception.php';
              require '../views/create-dynamic-pdf-send-as-attachment-with-email-in-php-demo/credential.php';

              
      
        if(isset($_POST["action"]))
        {
          include('../views/create-dynamic-pdf-send-as-attachment-with-email-in-php-demo/pdf.php');
          $file_name = md5(rand()) . '.pdf';
          $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
          $html_code .="";
          $html_code .="  ";
         
          
          $html_code .="<hr>";
          $html_code .= fetch_customer_data($connect);

          //C:/xampp/htdocs/reveal123(ajouter+afficher+supprimer)/reveal123/views/img/llogo.png
          $pdf = new Pdf();
          $pdf->load_html($html_code);
          $pdf->render();
         
       
          $file = $pdf->output();
          file_put_contents($file_name, $file);
        }



	$utilisateurC=new reclamationC();
	$listeUsers=$utilisateurC->afficherReclamations();

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
                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="afficherListeeventherents.php"><i class="fa fa-desktop"></i> Gestion User</a>
                    </li>
					<li>
                        <a class="active-menu"  href="afficherreclamation.php"><i class="fa fa-bar-chart-o"></i> Gestion Reclamation</a>
                    </li>
                  
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> Gestion equipement </a>
                    </li>

                    <li>
                        <a   href="addevent.php"><i class="fa fa-edit"></i> Gestion évènement </a>
                    </li>

                    <li>
                        <a  href="affichercommande.php"><i class="fa fa-edit"></i> Gestion commande </a>
                        
                    </li>

                    <li>
                        <a href="addblog.php"><i class="fa fa-edit"></i> Gestion Blog </a>
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
                IMPRIMER ou TELECHARGER <small>Reclamation</small>
              </h1>
            </div>
          </div>
          <!-- /. ROW  -->
          

                                         
<form method="post">
<button class="btn btn-default"><a href="afficherreclamation.php">Retour à la liste</a></button>

<a  href="print.php" id="submit" class="btn btn-default" >imprimer</a>
    <input type="submit" name="action" class="btn btn-default" value="Télécharger PDF sous ce format : " /><?php echo $message; ?>
              
              </form>
                           <?php
              echo fetch_customer_data($connect);
              ?>			
    </td> 
  <br>
  </tr>
  </table>
      
                  
  
              <?PHP
        function fetch_customer_data($connect)
        {
          $query = "SELECT * FROM reclamation";
          $statement = $connect->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          $output = '
          <div class="table-responsive" >
          <h1 style="text-align:center" >Table de reclamations <small>INNOVATORS</small> </h1>
          <hr>
          <h2 style="text-align:center;margin:60px 0px 0px 0px" >::Innovators@esprit.tn::  </h2>
          <hr>
       
        
  
            <table border=1  class="table table-striped table-bordered" style=" width=100%; margin:60px 0px 0px 150px ">
           
            <thead > 
           
              <tr>
              
                <th>id</th>
                <th>Date</th>
                <th>name</th>
                <th>lastname</th>
               <th>Sujet</th>
  
                <th>message</th>
            
  
              </tr>
              </thead>		
              <tbody>
          
          ';
                  foreach($result as $reclamation){
            
            
                $output .= '
              <tr>
          
                  <td>'.$reclamation['id'].'</td>
                  <td>'.$reclamation['date'].'</td>
                  <td>'.$reclamation['name'].'</td>
          <td>'.$reclamation['lastname'].'</td>
                  <td>'.$reclamation['sujet'].'</td>
  
                  <td>'.$reclamation['message'].'</td>
       
              </tr>
              
        </tbody>
       
        ';
      }
      $output .= '
        </table>
       
      </div>
      ';
      return $output; 
    }
    ?>



        <hr>
        
        
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
