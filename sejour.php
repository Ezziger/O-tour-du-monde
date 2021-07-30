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

<?php
if (isset($_POST["sejourId"])) {
?>
<img src="<?= getSejour($_POST["sejourId"])['image']?>" alt="">
<?php
}
?>
</header>
<body>
    <div class="wrapperSejour">
        <h1>Le séjour que vous avez sélectionné</h1>
        <?php
        if (isset($_POST["sejourId"])) {
            showSejour($_POST["sejourId"]);           
          }
        ?>
</div>

<?php
    include "footer.php"
?>