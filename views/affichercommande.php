
<?php
include '../model/commande.php';
include '../controller/comm.php';
include '../model/pan.php';
include '../controller/panier1.php';


$commandeC=new commandeC();
$listecommande=$commandeC->afficherCommande(); 
$panier1C=new panier1C();

$listepanier=$panier1C->afficherPanier1(); 

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3 ;

$listepanier=$panier1C->pagination($page, $perpage);
$totalP =$panier1C->calcTotalRows($perpage);

if(isset($_GET['recherche']))
{
 $search_value=$_GET["recherche"];
 $listepanier=$panier1C->recherchecomm($search_value);
}


if (isset($_GET["tri"]))
{
$tri=$_GET["tri"];


$listepanier=$panier1C->tricomm($tri);

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Back</title>
    <!-- Bootstrap Styles-->
    <link href="assetsFarouk/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assetsFarouk/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assetsFarouk/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assetsFarouk/css/custom-styles.css" rel="stylesheet" />
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
                        <a  href="afficherreclamation.php"><i class="fa fa-bar-chart-o"></i> Gestion Reclamation</a>
                    </li>
                  
                    <li>
                        <a href="form.php"><i class="fa fa-edit"></i> Gestion equipement </a>
                    </li>

                    <li>
                        <a href="addevent.php"><i class="fa fa-edit"></i> Gestion évènement </a>
                    </li>

                    <li>
                        <a class="active-menu" href="affichercommande.php"><i class="fa fa-edit"></i> Gestion commande </a>
                        
                    </li>

               

                    <li>
                        <a  href="addblog.php"><i class="fa fa-edit"></i> Gestion Blog </a>
                    </li>


                   
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


           

               


               
                <!-- /. ROW  -->

                <div class="row">
                    <di class="col-md-8 col-sm-12 col-xs-12">
                      
                    <div class="panel panel-default">
                            <div class="panel-heading">
                               la Liste des Panier : 
                            </div> 
                            <hr>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                    <form  method="get" action="">
                                                            <div>
                                                                <input style="margin-left:370px" type="text"  placeholder="Rechercher reclamation"
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                              
                                                                <input  type="submit" name="submit" value="recherche">
                                                                </div>
                                                        
                                                        </form>

                                                        <hr>

<form method="get" action="">

<a style="margin-left:0px" href="affichercommande.php?tri=a" id="submit" class="btn btn-default" >Tri par id</a>
<a style="margin-left:10px" href="affichercommande.php?tri=b" id="submit" class="btn btn-default">Tri par somme  </a>


</form>

<hr>

                                        <thead>
                                            <tr>
                                            <th>ID</th>
								
								<th class="text-center"> somme</th>
								
							
								<th class="text-center"><i class="ti-trash remove-icon">Supprimer Panier</i></th>
                                <th class="text-center"><i class="ti-trash remove-icon">Modifier Panier</i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
						$s=0;
						$ss=0;
						$sss=1;
						$a=1;
						 foreach($listepanier as $row){ ?>
							<tr>
								<td >  <?php echo $row['idpan'] ?> </td>
							
								<td >  <?php echo $row['somme']  ?> DT </td>
								
								
								<td class="action" data-title="Remove"><a href="supprimerpanier.php?idpan=<?php echo $row['idpan'];?>">supprimer <i class="ti-trash remove-icon"></i></a></td>
                                <td> <a href="modifierpanier.php?id=<?PHP echo $row['idpan']; ?>"> Modifier </a>
                </td>
							</tr>
							
							<?php } ?>
								

                                        </tbody>
                                    </table>
                                </div>
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

                   





                <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                               la Liste des Commandes : 
                            </div> 
                            <hr>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Mode de paiment</th>
                                                <th>RIB</th>
                                                <th>Numero carte bancaire</th>
                                                <th>Numero carte etudiant</th>
                                                <th>Supprimer commande</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
					
                    foreach($listecommande as $row) { ?>
                       <tr>
                           <td >  <?php echo $row['id_commande'] ?> </td>
                           <td >  <?php echo $row['mode'] ?> </td>
                           <td >  <?php echo $row['rib']  ?> </td>	
                           <td >  <?php echo $row['numero_cb'] ?> </td>
                   <td >  <?php echo $row['numero_ce'] ?> </td>
                   
                           <td class="action" data-title="Remove"><a href="supprimercommande.php?id=<?php echo $row['id_commande'];?>">supprimer<i class="ti-trash remove-icon"></i></a></td>
                          
                        </tr>
                       
                       <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    


<!--test -->

     




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
    <!-- jQuery Js -->
    <script src="assetsFarouk/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assetsFarouk/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assetsFarouk/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assetsFarouk/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assetsFarouk/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assetsFarouk/js/custom-scripts.js"></script>


</body>

</html>