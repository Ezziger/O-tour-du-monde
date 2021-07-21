<!--**********************************CREATION DES SEJOURS**********************************-->

<?php

function getSejours() {
    /***********************************SEJOUR EN GRECE***********************************/
    $grece = [
        "id" => 0,
        "nom_du_sejour" => "A l'abordage de Santorin",
        "small_description" => "Soleil, détente et bord de mer",
        "long_description" => "elle sera longue plus tard",
        "durée" => "7 jours et 6 nuits",
        "formule" => "demi-pension",
        "prix" => "700"
    ];  
    
    
    /***********************************SEJOUR A L ILE***********************************/
    $ile_maurice = [
        "id" => 1,
        "nom_du_sejour" => "Farniente à l'île Maurice",
        "small_description" => "Plage, eaux turquoises et coktails",
        "long_description" => "elle sera longue plus tard",
        "durée" => "10 jours et 9 nuits",
        "formule" => "all-inclusive",
        "prix" => "1250"
    ];
    
    /***********************************SEJOUR AU BRESIL***********************************/
    $bresil = [
        "id" => 2,
        "nom_du_sejour" => "Circuit Au Pays des Cariocas",
        "small_description" => "Circuit découverte à travers les incontournables du Brésil.  ",
        "long_description" => "elle sera longue plus tard",
        "durée" => "15 jours et 14 nuits",
        "formule" => "pension complète",
        "prix" => "1950"
    ];  
    
    
    /***********************************CREATION DE L'ARRAY SEJOUR***********************************/
    
    $sejours = [];
    array_push($sejours, $grece, $ile_maurice, $bresil);
    return $sejours;
}

/***********************************AFFICHAGE DES SEJOURS***********************************/

function showSejours () {
    foreach (getSejours() as $sejour) {
        echo '<div class="card" style="width: 18rem;">
  <img src="" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">'.$sejour["nom_du_sejour"].'</h5>
    <p class="card-text">'.$sejour["small_description"].'</p>
    <p class="card-text">'.$sejour["durée"].'</p>
    <p class="card-text">'.$sejour["formule"].'</p>
    <p class="card-text">'.$sejour["prix"].'</p>
    <form method="post" action="sejour.php">
    <input type="hidden" name="sejourId" value="' . $sejour["id"] . '">
    <button type="submit" class="btn btn-primary">Details</button>
    </form>
    <form method="post" action="cart.php">
    <input type="hidden" name="SejourId" value="' . $sejour["id"] . '">
    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
    </form>
  </div>
</div>';
    }
}

/***********************************RECUPERATION DU SEJOUR CORRESPONDANT A L'ID***********************************/

function getSejour ($id) {
    $sejours = getSejours();
    foreach($sejours as $sejour) {
        if ($id == $sejour['id']) {
            return $sejour;
        }
    }
}

/***********************************AFFICHAGE DU SEJOUR CORRESPONDANT A L'ID***********************************/

function showSejour ($id) {
    $sejourDetails = getSejour($id);
    echo '<div class="card" style="width: 18rem;">
  <img src="" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">'.$sejourDetails["nom_du_sejour"].'</h5>
    <p class="card-text">'.$sejourDetails["small_description"].'</p>
    <p class="card-text">'.$sejourDetails["long_description"].'</p>
    <p class="card-text">'.$sejourDetails["durée"].'</p>
    <p class="card-text">'.$sejourDetails["formule"].'</p>
    <p class="card-text">'.$sejourDetails["prix"].'</p>
    <form method="post" action="cart.php">
    <input type="hidden" name="SejourId" value="' . $sejourDetails["id"] . '">
    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
    </form>
  </div>
</div>';
    }
/***********************************AJOUTER LE SEJOUR AU PANIER***********************************/

function addToCart ($id) {
    $isArticleAlreadyAdded = FALSE;
    $sejourChoisi = getSejour($id);
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if($sejourChoisi['id'] === $_SESSION['cart'][$i]['id']) {
            $isArticleAlreadyAdded = TRUE;
            echo "<script>alert(\"Ce séjour est déjà dans votre panier\")</script>";
        }
    }
    if ( !$isArticleAlreadyAdded) {
        $sejourChoisi['quantity'] = 1;
        array_push($_SESSION['cart'], $sejourChoisi);
    }
}

/***********************************AFFICHER LE PANIER***********************************/

function showCart($element) {
    foreach ($_SESSION['cart'] as $element) {
        echo '<li class="list-group-item d-flex">
        <p>' . $element['nom_du_sejour'] . '</p>
        <p>' . $element['quantity'] . '</p>
        <p>' . $element['prix'] . '</p>
        <form method="post" action="cart.php">
        <input type="hidden" name="idToDelete" value="' . $element['id'] . '">
        <button type="submit" class="btn btn-primary">Supprimer du panier</button>
        </form>
        </li>';
    }
}

/***********************************AFFICHER LE PANIER***********************************/
function deleteFromCart () {
    echo $_POST["idToDelete"];
}

?>
