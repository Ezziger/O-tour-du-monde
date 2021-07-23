<?php
session_start();
$_SESSION['cart'];
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
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

<?php
include "header.php";
?>
</header>
<body>

<?php
include "functions.php";
if (isset($_POST["SejourId"])) {
    addToCart($_POST["SejourId"]);   
}
?>


<ul class="list-group">
    <?php
        if(isset($_POST['idToDelete'])) {
             deleteFromCart($_POST['idToDelete']);
            }
    ?>
    <?php
        if(isset($_POST['modificationSejourId'])) {
               modificationQuantités();
            }
    ?>  
    <?php
        if(isset($_POST['supprimerPanier'])) {
                suppressionDuPanier();
             }
    ?>

  
  
  
  <?php
  showCart($_SESSION['cart']);
?>
</ul>

 <?php
  boutonToutSupprimer();
?>


<a href="validation.php"> Bonjour</a>
<p> Total HT : <?php totalPanierHFP() ?></p>
<?php calculFraisDossier() ?>
<?php TotalTTC()?>


