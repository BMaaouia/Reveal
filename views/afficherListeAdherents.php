<?php session_start(); 
include '../controller/adherentC.php';


$adC=new AdherentC();
$liste =$adC->afficher();
if (isset($_GET["tri"]))
   {
    $tri=$_GET["tri"];
    
 
    $liste=$adC->tri($tri);

   }




if(isset($_GET['recherche']))
{
    $search_value=$_GET["recherche"];
    $liste=$adC->search($search_value);
}

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Back</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script async src="https://api.countapi.xyz/hit/codefoxx.com/b461abc5-f841-4008-ac9b-d2112a425f40?callback=websiteVisits"></script>
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
        </nav>           <!-- /.dropdown -->
               
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
                        <a  href="afficherreclamation.php"><i class="fa fa-bar-chart-o"></i> Gestion Reclamation</a>
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
                            Gestion <small>User</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

            


        
                <!-- /. ROW  -->

                <div class="row">
                   
                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Client Table 
                            </div>
                           
                            <div class="panel-body">
                            
                              
                              
                              
                            <form  method="get" action="">
             <div>
             <input style="margin-left:240px" type="text"  placeholder="Rechercher User"
                 aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                              
                <input  type="submit" name="submit" value="recherche">
                             </div>
                             </form>
                             <hr>
                             <form method="get" action="">
                                                       
              <a style="margin-left:180px;border=1;" href="afficherListeAdherents.php?tri=a" id="submit" class="btn btn-default" >Tri par prenom</a>
               <a style="margin-left:10px" href="afficherListeAdherents.php?tri=b" id="submit" class="btn btn-default">Tri par nom  </a>
                                                    
             <a style="margin-left:10px" href="afficherListeAdherents.php?tri=c" id="submit" class="btn btn-default" >Tri par email    </a>
                                                                                                            </form>

                             <hr>






<!---->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                          
                                            <tr>
                                              
                                             <th>First Name</th>
                                             <th>Last Name</th>
                                             <th>Email</th>
                                             <th>date</th>
                                             <th>image</th>
                                             <th>supp</th>
                                            
                                             <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                       
   
            foreach ($liste as  $ad){
        ?>
                                            <tr>
                                            
                 <td>   <?php echo $ad['firstName'];?></td>
                <td><?php echo $ad['lastName'];?></td>
                <td><?php echo $ad['email'];?></td>
                <td><?php echo $ad['register_date'];?></td>
                <td><img class="img rounded-circle" style="width: 40px; height: 40px;" src="<?php echo isset($ad['image']) ? $ad['image'] : './assets/profile/beard.png'; ?>" alt=""></td>
                
                
        <td>
            <a href="supprimerAdherent.php?userID=<?php echo $ad['userID'];?>">Supprimer</a>
        </td>

 

        <td>
        
         <?php
          if($ad['status']=='Banned'){
                                                        
         ?>
         <form method="POST" action="unban.php">
        <input type="submit" name="sumbit1" value="UnBan">
         <input type="hidden" name="userID" value="<?php echo $ad ['userID'];?>">
        </form>
        
        <?php
        }
        else{
        ?>
        <form method="POST" action="Ban.php">
        <input type="submit" name="sumbit" value="Ban">
        <input type="hidden" name="userID" value="<?php echo $ad ['userID'];?>">
        <?php }?>
     </form>

            

        </td>
                                            </tr>
                                           

                                        </tbody>
                                         <?php 
                                         }
        ?>
                                    </table>
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
      <!-- JS Scripts-->
      <script src="./assets/js/main.js"></script>
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>