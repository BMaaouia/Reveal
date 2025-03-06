<?php
include "../controller/adherentC.php";
//include '../model/adherent.php';
$adC=new AdherentC;
$ad=$adC->detail($_POST['userID']);
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
        <li><?php echo $ad['userID'];?></li>
        <li><?php echo $ad['firstName'];?></li>
        <li><?php echo $ad['lastName'];?></li>
        <li><?php echo $ad['email'];?></li>
        <li><?php echo $ad['password'];?></li>
        <li><?php echo $ad['registerDate'];?></li>
    </ul>
</body>
</html>