
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
                        
                        
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <a  href="afficherreclamation.php"><i class="fa fa-bar-chart-o"></i> Gestion Reclamation</a>
                    </li>
                  
                    <li>
                        <a href="form.php"><i class="fa fa-edit"></i> Gestion equipement </a>
                    </li>

                    <li>
                        <a class="active-menu"   href="addevent.php"><i class="fa fa-edit"></i> Gestion évènement </a>
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
                        <h1 class="page-heeventer">
                            Event <small>Create an event</small>
                        </h1>
                    </div>
                </div>

<?php 
include '../controller/EventCore.php'; 
$eve=new EventCore;
$liste=$eve->afficherevent()['liste'];
$types=$eve->afficherevent()['types'];

if(isset($_GET['recherche']))
    {
        $search_value=$_GET["recherche"];
        $liste=$eve->rechercheevent($search_value);
    }

if (isset($_GET["tri"]))
   {
    $tri=$_GET["tri"];
    
 
    $liste=$eve->tri($tri);

   }

  
?>
<hr>
<form action="../controller/ajoutevent.php" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-striped" border="1">
        <tr>
            <td>Titre : </td>
            <td><input type="text" name="titre"required minlength="4">
        </tr>

        <tr>
            <td>Description : </td>
            <td><input type="text" name="description" required minlength="4" ></td>
        </tr>

        <tr>
            <td>Date : </td>
            <td><input type="date" name="date" value="2018/07/02"></td>
        </tr>

        <tr>
            <td>Lieu : </td>
            <td><input type="text" name="lieu" required minlength="4" ></td>
        </tr>

        <tr>
            <td>Image : </td>
            <td><input type="file" name="image" ></td>
        </tr>

        <tr>
            <td>Type : </td>
            <td><select type="file" name="type" >
                <option value="">choose a type</option>
                <?php foreach($types as $type) { ?>
                    <option value="<?= $type['id']?>"> <?= $type['type'] ?></option>
                <?php } ?>
            </select></td>
            

        <tr>
            <td></td>
            <td><input style="margin-left:50px" type="submit" name="submit" value="Confirmer" ></td>
        </tr>

    </table>
</form>
<td><form method="get" action="addtype.php">
              <button type="submit" class="btn btn-default">type des evenement</button>
                 </form>
            </td>

<hr>
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-heeventer">
                            Les evenements <small>..</small>
                        </h1>
                    </div>
                </div>


<hr>
                         

                             <hr>
  <div class = "container text-center"> 
    <br><br>
    <table class="table" >
        
    <form  method="get" action="">
                                                            <div>
                                                                <input style="margin-left:200px" type="text"  placeholder="Rechercher évenement"
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                              
                                                                <input  type="submit" class="btn btn-default" name="submit" value="recherche">
                                                                </div>
                                                        
                                                        </form>
    <form method="get" action="">
    <hr>
    <hr>                                                 
<a style="margin-left:80px;border=1;" href="addevent.php?tri=a" id="submit" class="btn btn-default" >Tri par id</a>
 <a style="margin-left:10px" href="addevent.php?tri=b" id="submit" class="btn btn-default">Tri par titre  </a>                                                                                         
 <a style="margin-left:10px" href="addevent.php?tri=c" id="submit" class="btn btn-default" >Tri par date    </a>
 </form>
     
     <hr>                                    
    <theevent>
        <tr>
          <th>ID</th>
          <th>titre</th>
          <th>Description</th>
          <th>Date</th>
          <th>Lieu</th>
          <th>Image</th>
          <th>Type</th>

        
          <th colspan="2">Action</th>
        
        </tr>
      </theevent>
      <tbody>
                        <?php 
                        foreach($liste as $event){
                        ?>
                            <tr>
                            <td><?php echo $event['id']; ?></td>
                            <td><?php echo $event['titre']; ?></td>
                             <td><?php echo $event['description']; ?></td>
                              <td><?php echo $event['date']; ?></td>
                              <td><?php echo $event['lieu']; ?></td>
                              <td><img class="img rounded-circle" style="width: 40px; height: 40px;" src="<?="images/".$event['image']?>" alt=""></td>
                              
 
                           
                    
                                <td>
                                <form method="POST" action="modifierevent.php">
                                    <input type="submit" class="btn btn-info" name="Modifier" value="Modifier">
                                    <input type="hidden" value=<?PHP echo $event['id']; ?> name="id">
                               </form>	
                                </td>

                                <td><a href="../controller/deleteevent.php?id=<?php echo $event['id']; ?>" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                       <?php } ?>
                        </tbody>
                        </table>
                    
                    </div>  
            </div>
            
             