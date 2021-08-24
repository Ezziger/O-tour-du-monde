<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $dsn = "mysql:host=localhost; dbname=boutique_en_ligne";
    $username = "root";
    $password = "Arinfo/2021";
    $options = [];
    $connexion = new PDO($dsn, $username, $password, $options);
  try {
    //print "Connexion réussie";        
      } catch (PDOException $e) {
    echo $e->getMessage();
    die();
      }
?>