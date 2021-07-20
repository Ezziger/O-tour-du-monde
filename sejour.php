<?php
session_start();
$_SESSION['cart'];
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<?php
include "header.php";
?>

<?php
//var_dump($_POST["sejourId"]);
include "functions.php";
//getSejour($_POST["sejourId"]);
showSejour($_POST["sejourId"]);
?>