<?php
include "../controller/reclamationC.php";

$rec=new AdherentC;
$ad=$rec->detailsreclamation($_POST['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><?php echo $ad['id'];?></li>
        <li><?php echo $ad['date'];?></li>
        <li><?php echo $ad['name'];?></li>
        <li><?php echo $ad['lastname'];?></li>
        <li><?php echo $ad['email'];?></li>
        <li><?php echo $ad['sujet'];?></li>
        <li><?php echo $ad['message'];?></li>
    </ul>
</body>
</html>
