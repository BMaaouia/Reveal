




<!--*************************************************************************************************-->


<?PHP
	include "../controller/reclamationC.php";
    include "../controller/reponseC.php";


    $tri='';

	$utilisateurC=new reclamationC();
	$listeUsers=$utilisateurC->afficherReclamations();

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3 ;
      
       $listeUsers=$utilisateurC->pagination($page, $perpage);
       $totalP =$utilisateurC->calcTotalRows($perpage);

    if(isset($_GET['recherche']))
    {
        $search_value=$_GET["recherche"];
        $listeUsers=$utilisateurC->recherchereclamation($search_value);
    }


    if (isset($_GET["tri"]))
   {
    $tri=$_GET["tri"];
    
 
    $listeUsers=$utilisateurC->trireclamation($tri);

   }

 ?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Back</title>
    <!-- Bootstrap Styles-->
    <link href="assetsB/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assetsB/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assetsB/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assetsB/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a href="#body"><img src="assetsB/asdf.png" alt="" title="" /></a></h1>
                
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="addevent.php" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-messages">
                        <li><?php foreach($listet as $event) { ?>
                            <a href="addevent.php">
                                <div>
                                    <strong>l event <?=$event->titre?> a ete ajouter </strong>
                                    <span class="pull-right text-muted">
                                        <em><?=$event->date?></em>
                                    </span>
                                </div>
                                <div></div>
                            </a>
                            <?php } ?>

                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="addevent.php">
                                <strong>Voir tout les event</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                    <!-- /.dropdown -->
                
                    <!-- /.dropdown-alerts -->
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
                <!-- /.dropdown -->
               
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
                        <a href="afficherListeAdherents.php"><i class="fa fa-desktop"></i> Gestion User</a>
                    </li>
					<li>
                        <a class="active-menu" href="afficherreclamation.php"><i class="fa fa-bar-chart-o"></i> Gestion Reclamation</a>
                    </li>
                  
                    <li>
                        <a href="form.php"><i class="fa fa-edit"></i> Gestion equipement </a>
                    </li>

                    <li>
                        <a href="addevent.php"><i class="fa fa-edit"></i> Gestion évènement </a>
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


               

              
                <!-- /. ROW  -->

         <div class="row">
             <div class="col-md-8 col-sm-12 col-xs-12" >
                   <div >
                   <div class="col-md-12">
              <h1 class="page-header">
              Gestion <small>reclamation</small>
              </h1>
              
              <button class="btn btn-default"><a href="afficherfront.php">Front page</a></button>
              <button class="btn btn-default"><a href="PDF1.php">Telecharger en PDF</a></button>
        

             <hr>
             
             
            </div>


             
                           <div class="panel-body">
                                <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" >
                                            <form  method="get" action="">
                                                            <div>
                                                                <input style="margin-left:370px" type="text"  placeholder="Rechercher reclamation"
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                              
                                                                <input  type="submit" name="submit" value="recherche">
                                                                </div>
                                                        
                                                        </form>

                                                        <hr>

                                                        <form method="get" action="">
                                                       
   <a style="margin-left:320px" href="afficherreclamation.php?tri=a" id="submit" class="btn btn-default" >Tri par date</a>
  <a style="margin-left:10px" href="afficherreclamation.php?tri=b" id="submit" class="btn btn-default">Tri par name  </a>

  <a style="margin-left:10px" href="afficherreclamation.php?tri=c" id="submit" class="btn btn-default">Tri par lastname    </a>
                                                        </form>

<hr>

                                            <tr>
				                            <th>Id</th>
			                            	<th>date</th>
				                            <th>name</th>
				                            <th>lastname</th>
                                            <th>email</th>
                                            <th>Etat</th>
                                            <th>Message</th>
				                            <th>supprimer</th>
				                            <th>modifier</th>
                                            <th>Reply</th>
                                      
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
					                    <td>
						                   <form method="POST" action="supprimerreclamation.php">
						                    <input type="submit" name="supprimer" value="supprimer">
						                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="id">
						                    </form>
                                        </td>
					                   <td>
						            <a href="modifiereclamation.php?id=<?PHP echo $user['id']; ?>"> Modifier </a>
					                  </td>
                                      <td><a href="ajouterreponse.php?id="> Reply  </a></td>
                                   
                                      
                                    
				                        </tr>
			                            <?PHP
                                             }
			                             ?>
                                            </table>
                                    <hr>
                                            
  
        
                                </div>
                            </div>

                            <div class="row" style="margin-left:520px"  >
                                        <nav>
                                            <ul class="pagination">
                                                <?php

                                                    for ($x = 1; $x <= $totalP; $x++) :

                                                ?>
                                                
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?php echo $x; ?>&per-page=<?php echo $perpage; ?>"><?php echo $x; ?></a><?php endfor; ?>
                                                </li>

                                            </ul>
                                        </nav>
                                    </div>

                        </div>

                    </div>
                </div>
                </div>
                <!-- /. ROW  -->
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <div id="google_translate_element"></div>
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
 
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 
    <!-- jQuery Js -->
    <script src="assetsB/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assetsB/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assetsB/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assetsB/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assetsB/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assetsB/js/custom-scripts.js"></script>


</body>

</html>