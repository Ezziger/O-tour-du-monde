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
</header>
<body>

<?php
include "functions.php";
if (isset($_POST["sejourId"])) {
    addToCart($_POST["sejourId"]);   
}
?>
<div class="panierUp"></div>
<div class="panierWrapper">
    <h1>Panier</h1>
    <div class="container">
        <div class="row">
            <div class="col">
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
            </div>
        </div>
        <div class="row">
            <li>
                <?php totalPanierHFP() ?>
            </li>
        </div>
        <div class="row">
            <div class="col panierGlobal">
                <?php
                boutonToutSupprimer();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col panierValidation">
                <a class="btn btn-primary" href="validation.php" style="margin-top: 25px;"> Valider</a>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>


