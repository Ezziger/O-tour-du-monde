<?php
session_start();
include "header.php";
include "functions.php";
include "db.php";
?>

<div class="panierUp"></div>
<?php
   if(isset($_SESSION["nom"])) {

      $username = $_SESSION["nom"];
      $sql = "SELECT nom, prenom, email FROM clients WHERE nom = '$username'";
	   $statement = $connexion->prepare($sql);
	   $statement->execute();
      $resultats = $statement->fetchAll();

      echo '<h1>Bienvenue sur votre profil ' . $resultats[0]["prenom"] . ' ' . $resultats[0]["nom"] . '</h1>';
    }
?>