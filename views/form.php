<?PHP
  include_once "../model/equipement.php";
  include_once "../controller/equipementC.php";
  $tri='';
  $error="";
    // create user
    $user = null;

    // create an instance of the controller
    $userC = new equipementC();
    if (
        isset($_POST["idproduit"]) && 
        isset($_POST["nomproduit"]) && 
        isset($_POST["imgproduit"]) &&
        isset($_POST["typeproduit"]) && 
        isset($_POST["price"])
    ) {
        if (
            !empty($_POST["idproduit"]) && 
            !empty($_POST["nomproduit"]) && 
            !empty($_POST["imgproduit"]) && 
            !empty($_POST["typeproduit"]) && 
            !empty($_POST["price"])
        ) {
            $user = new equipement(
                $_POST['idproduit'],
                $_POST['nomproduit'],
                $_POST['imgproduit'], 
                $_POST['typeproduit'],
                $_POST['price'],
            );
            $userC->ajouterequipement($user);

        }
        else
            $error = "Missing information";
    }


?>
    <?PHP
	$equipementC=new equipementC();
	$listeUsers=$equipementC->afficherequipements();
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3 ;
   
    $listeUsers=$equipementC->pagination($page, $perpage);
    $totalP =$equipementC->calcTotalRows($perpage);
    if(isset($_GET['recherche']))
    {
        $search_value=$_GET["recherche"];
        $listeUsers=$equipementC->rechercheequipement($search_value);
    }


    if (isset($_GET["tri"]))
   {
    $tri=$_GET["tri"];
    
 
    $listeUsers=$equipementC->triequipement($tri);

   }



?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
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
                        <a href="form.php" class="active-menu"><i class="fa fa-edit"></i> Gestion equipement </a>
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
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            add<small>material</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <form action="" method="POST">
                                        <div class="form-group">
                                            <center><h4>ajouter produit</h4></center><br>
                                            <label>numero produit</label>
                                            <input type="text" class="form-control" name="idproduit" id="idproduit" required>
                                            <p class="help-block">numero produit must be unique</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Nom du produit</label>
                                            <input type="text" class="form-control" placeholder="Enter text"name="nomproduit" id="nomproduit" required>
                                        </div>
                                        <div class="form-group">
                                            <br><label>image produit</label>
                                            <input type="text" class="form-control" placeholder="enter image url"name="imgproduit" id="imgproduit" required>

                                        </div>
                                        <div class="form-group">
                                            <br><br><label>type produit</label>
                                            <select class="form-control" name="typeproduit" id="typeproduit" required>
                                                <option value="">selectioner type de produit</option>
                                                <option value="sono">sono</option>
                                                <option value="instrument">instrument</option>
                                                <option value="stuff">stuff</option>
                                                <option value="cablage">cablage</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                                        </div>
                                        <br><br>
                                        <center><button type="submit" class="btn btn-default" value="Envoyer">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button></center>
                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                          
                                <!-- /.col-lg-6 (nested) -->
                            </div>

             <!-- Show  a produit -->

             <strong><i class="fa fa-database"></i> Show produit</strong>
                <table class="table table-bordered table-striped">
                    <hr>
                <form  method="get" action="">
                                                            <div>
                                                                <input style="margin-left:300px" type="text" class="btn btn-default"  placeholder="Rechercher reclamation"
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                              
                                                                <input  type="submit" name="submit" value="recherche">
                                                                </div>
                                                        
                                                        </form>
                                                        <hr> <hr>

                                                        <form method="get" action="">
                                                       
                                                    
                                                      <a style="margin-left:250px" href="form.php?tri=b" id="submit" class="btn btn-default">Tri par nomproduit  </a>
                                                    
                                                      <a style="margin-left:10px" href="form.php?tri=c" id="submit" class="btn btn-default">Tri par typeproduit    </a>
                                                                                                            </form>

                                                                                                            <hr> <hr>
                                                    
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product nomproduit</th>
                        <th>Price</th>
                        <th>type</th>
                        
                        <th style="width: 20%;">image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listeUsers as $user) : ?>
                        <form action="update.php" method="post">
                        <tr>
                        <td><?PHP echo $user['idproduit']; ?></td>
                        <td><?PHP echo $user['nomproduit']; ?></td>                        
                        <td><?PHP echo $user['price']; ?></td>
                        <td><?PHP echo $user['typeproduit']; ?></td>
                        <div style="display:none">       
                            <?= 
                            $path = $user['imgproduit'];
                            ?>
                        </div>
                        <td><img src=<?= $path ?> width="40%"></td>
                        <td>
                        <a href="modifier.php?idproduit=<?php echo $user['idproduit'];?>"class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        <a href="delete.php?idproduit=<?php echo $user['idproduit'];?>"class="btn btn-sm btn-danger"><i class="fa fa-trash">X</i></a>
                    </td>
                    </tr>
                    </form>
                    <?php endforeach ?>
                </tbody>
            </table>
            
        <!-- End Show a produit -->
                        </div>
                        <div class="row" style="margin-left:570px"  >
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
                                    <center><button class="btn btn-default"><a href="printeq.php">Imprimer</a></button></center>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<footer><p>something and smthn <a href="http://webthemez.com">somtn</a></p></footer>
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
</body>
</html>
