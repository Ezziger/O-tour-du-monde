<?php
session_start();
$_SESSION['cart'];
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<?php
include "header.php";
include "functions.php";
?>

<img src="<?= getSejour($_POST["sejourId"])['image']?>" alt="">
</header>
<body>

<?php
//var_dump($_POST["sejourId"]);
//getSejour($_POST["sejourId"]);
showSejour($_POST["sejourId"]);
?>