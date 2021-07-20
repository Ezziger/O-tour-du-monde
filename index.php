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

<h1>C'est ici que vont apparaitre mes offres de voyages</h1>

<?php
include "functions.php";
//print_r(getArticles()[0]);
showSejours();

?>
























<?php
include "footer.php";
?>