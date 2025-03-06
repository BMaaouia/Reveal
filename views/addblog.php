
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
                        <a  href="affichercommande.php"><i class="fa fa-edit"></i> Gestion commande </a>
                        
                    </li>

               

                    <li>
                        <a class="active-menu" href="addblog.php"><i class="fa fa-edit"></i> Gestion Blog </a>
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
                            Blog <small>Create a blog</small>
                        </h1>
                    </div>
                </div>



                <form action="../controller/addblog.php" method="post" enctype="multipart/form-data">
    <table class="table table-striped table-bordered table-hover" border="1">
        <tr>
            <td>Titre : </td>
            <td><input type="text" name="titre" required minlength="4">
        </tr>

        <tr>
            <td>review : </td>
            <td><textarea type="text" name="description" required minlength="4"></textarea></td>
        </tr>

        <tr>
            <td>Date : </td>
            <td><input type="date" name="date" ></td>
        </tr>

        <tr>
            <td>Lieu : </td>
            <td><input type="text" name="lieu" required minlength="4"></td>
        </tr>

        <tr>
            <td>Image : </td>
            <td><input type="file" name="image" ></td>
        </tr>

        <tr>
            <td></td>
            <td><input style="margin-left:70px" type="submit" name="submit" value="Confirmer" ></td>
        </tr>

    </table>
</form>
<?php 
include '../controller/BlogCore.php'; 
$blo=new BlogCore;
$liste=$blo->afficherblog();
if(isset($_GET['recherche']))
    {
        $tri='';
        $search_value=$_GET["recherche"];
        $liste=$blo->rechercheblog($search_value);
    }

    if (isset($_GET["tri"]))
    {
     $tri=$_GET["tri"];
     $liste=$blo->triblog($tri);
 
    }
 
?>

<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Blogs <small>..</small>
                        </h1>
                    </div>
                </div>


  <div class = "container text-center"> 
    <br><br>
    <table class="table" >
    <form  method="get" action="">
                                                            <div>
                                                                <input style="margin-left:00px" type="text"  placeholder="Rechercher reclamation"
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                              
                                                                <input  type="submit" name="submit" value="recherche">
                                                                </div>
                                                        
                                                        </form>
<hr>
<hr>
                     <form method="get" action="">
                                                       
           <a style="margin-left:20px" href="addblog.php?tri=a" id="submit" class="btn btn-default" >Tri par id</a>
<a style="margin-left:10px" href="addblog.php?tri=b" id="submit" class="btn btn-default">Tri par titre  </a>
       <a style="margin-left:10px" href="addblog.php?tri=c" id="submit" class="btn btn-default">Tri par description    </a>
                                                                                                            </form>
                                                                                                            <hr>
                                                                                                            <hr>
    <thead>
        <tr>
          <th>ID</th>
          <th>titre</th>
          <th>review</th>
          <th>Date</th>
          <th>Lieu</th>
          <th>Image</th>

        
          <th colspan="2">Action</th>
        
        </tr>
      </thead>
      <tbody>
                        <?php 
                        foreach($liste as $blo){
                        ?>
                            <tr>
                            <td><?php echo $blo['id']; ?></td>
                            <td><?php echo $blo['titre']; ?></td>
                             <td><?php echo $blo['description']; ?></td>
                              <td><?php echo $blo['date']; ?></td>
                              <td><?php echo $blo['lieu']; ?></td>
                              <td><?php echo $blo['image']; ?></td>

                           
                    
                                <td>
                                <form method="POST" action="modifierblog.php">
                                    <input type="submit" class="btn btn-info" name="Modifier" value="Modifier">
                                    <input type="hidden" value=<?PHP echo $blo['id']; ?> name="id">
                               </form>	
                                </td>

                                <td><a href="../controller/deleteblog.php?id=<?php echo $blo['id']; ?>" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                       <?php } ?>
                        </tbody>
                        </table>
                    
                    </div>  
            </div>
            
        

?>
