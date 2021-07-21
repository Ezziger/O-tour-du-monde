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
//var_dump($_POST["panierSejourId"]);
include "functions.php";
//getSejour($_POST["panierSejourId"]);
//showSejour($_POST["panierSejourId"]);
addToCart($_POST["SejourId"]);
var_dump($_SESSION['cart']);

?>
<ul class="list-group">
  <?php
  showCart($_SESSION['cart']);

  var_dump(deleteFromCart())
  ?>
</ul>