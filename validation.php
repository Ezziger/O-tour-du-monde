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
<div class="panierUp"></div>
    <div style="margin-top: 70px">
        <h1>Validation de la commande</h1>
    </div>
    <div class="container validationWrapper">
        <div class="row">
            <div class="col">
<?php
include "functions.php";
?>

<?php
    AfficherLaValidationCommande();
?>
<div>
  <?php
    totalPanierHFP();
  ?>
<!---TEST --->
<form method="post" action="validation.php">
        <div class="row">
        <label for="domicile">livraison à domicile</label>
            <input type="radio"id="domicile" name="livraison" value= 5 checked>
        </div>
        <div class="row">
        <label for="relais">livraison au point relais</label>
            <input type="radio"id="relais" name="livraison" value= 10>
        </div>
        <button type="submit">Selectionner votre choix</button>
    </form>
<?php 
  if (isset($_POST['livraison'])) {
    //foreach ($_POST['livraison'] as $value) {
      
    //}
  }
?>
<!---FIN TEST --->
  <?php
    calculFraisDossier();
    TotalTTC();
?>
</div>
<div class="col panierValidation">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Valider la commande
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
        <h7 class="modal-title" id="exampleModalLabel"><?=TotalTTC()?></h7>
      </div>
      <div class="modal-body">
        <p style="color: green;">Votre commande à bien été prise en compte</p>
        <p>Votre commande sera expédiée le <?=date('d, F, Y', strtotime('+3 days'))?></p>
        <p>Et arrivera chez vous le <?=date('d, F, Y', strtotime('+9 days'))?></p>
        <p>Merci pour votre confiance</p>
      </div>
      <div class="modal-footer">
      <form class="btn-ajouter" method="post" action="index.php">
            <input type="hidden" name="validation" value="">
            <button type="submit" class="btn btn-primary">Retour à l'accueil</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>


            </div>
        </div>
    </div>

<?php 
    include "footer.php"
?>