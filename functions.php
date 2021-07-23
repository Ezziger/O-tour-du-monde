<!--**********************************CREATION DES SEJOURS**********************************-->

<?php

function getSejours() {
    /***********************************SEJOUR EN GRECE***********************************/
    $grece = [
        "id" => 0,
        "image" => "./images/santorin.jpg",
        "nom_du_sejour" => "A l'abordage de Santorin",
        "small_description" => "Séjour inoubliable sur l'île de Santorin en Grèce",
        "long_description" => "Entre mers et montagnes, eaux turquoises, petits villages pittoresques et la traditionnelle Philoxénia (l’hospitalité grecque), venez profiter d’un séjour inoubliable en Grèce !",
        "durée" => "7 jours et 6 nuits",
        "formule" => "demi-pension",
        "prix" => "700"
    ];  
    
    
    /***********************************SEJOUR A L ILE MAURICE***********************************/
    $ile_maurice = [
        "id" => 1,
        "image" => "./images/ile-maurice.jpg",
        "nom_du_sejour" => "Farniente à l'île Maurice",
        "small_description" => "Séjour détente, entre plage, eaux turquoises et coktails",
        "long_description" => "Posée en plein Océan indien, l'île Maurice vous ouvre les portes de son jardin secret. Sur place, vous avez rendez-vous avec le bonheur, le raffinement et l'authenticité.",
        "durée" => "10 jours et 9 nuits",
        "formule" => "all-inclusive",
        "prix" => "1250"
    ];
    
    /***********************************SEJOUR AU BRESIL***********************************/
    $bresil = [
        "id" => 2,
        "image" => "./images/rio-de-janeiro.jpg",
        "nom_du_sejour" => "Circuit au pays des cariocas",
        "small_description" => "Circuit découverte à travers les incontournables du Brésil.  ",
        "long_description" => "Que l'on soit amateur de ses plages inoubliables et de son soleil, de ses montagnes, sa nature luxuriante et ses forets tropicales, ou de ses ambiances musicales entêtantes,son carnaval et sa diversité, le Brésil est destination qui remplira vos attentes",
        "durée" => "15 jours et 14 nuits",
        "formule" => "pension complète",
        "prix" => "1950"
    ];  

    /***********************************SEJOUR EN ISLANDE***********************************/
    $islande = [
        "id" => 3,
        "image" => "./images/islande.jpg",
        "nom_du_sejour" => "L'islande et ses aurores boréales",
        "small_description" => "Circuit découverte de l'Islande et de ses merveilles",
        "long_description" => "Terre de glace et de feu hors du temps, le pays adossé au cercle arctique ressemble à un immense parc naturel offrant des paysages variés et grandioses.",
        "durée" => "8 jours et 7 nuits",
        "formule" => "pension complète",
        "prix" => "850"
    ];  
    
    
    
    /***********************************CREATION DE L'ARRAY SEJOUR***********************************/
    
    $sejours = [];
    array_push($sejours, $grece, $ile_maurice, $bresil, $islande);
    return $sejours;
}

/***********************************AFFICHAGE DES SEJOURS***********************************/

function showSejours () {
    foreach (getSejours() as $sejour) {
        echo '<div class="card" style="width: 18rem;">
  <img src="'.$sejour["image"].'" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">'.$sejour["nom_du_sejour"].'</h5>
    <p class="card-text">'.$sejour["small_description"].'</p>
    <p class="card-text">Durée : '.$sejour["durée"].'</p>
    <p class="card-text">Formule : '.$sejour["formule"].'</p>
    <p class="card-text">Prix : '.$sejour["prix"].' € /personne</p>
    <div class="btn-wrapper">
    <form method="post" action="sejour.php">
    <input type="hidden" name="sejourId" value="' . $sejour["id"] . '">
    <button type="submit" class="btn btn-primary">Details</button>
    </form>
    <form method="post" action="cart.php">
    <input type="hidden" name="SejourId" value="' . $sejour["id"] . '">
    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
    </form>
    </div>
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
    <h4 class="card-title">'.$sejourDetails["nom_du_sejour"].'</h4>
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
        echo '<li class="list-group-item d-flex justify-content-between">
        <p>' . $element['nom_du_sejour'] . '</p>
        <form method="post" action="cart.php">
        <input type="hidden" name="modificationSejourId" value="' . $element['id'] .'">
        <input type="text" name="nouvelleQuantité" value="' .$element['quantity'] . '">
        <button type="submit" class="btn btn-primary">Modifier la quantité</button>
        </form>
        <p>' . $element['prix'] . '</p>
        <form method="post" action="cart.php">
        <input type="hidden" name="idToDelete" value="' . $element['id'] . '">
        <button type="submit" class="btn btn-primary">Supprimer du panier</button>
        </form>
        </li>';
    }
}

/***********************************SUPPRIMER DU PANIER***********************************/
function deleteFromCart ($idTodelete) {
    for( $i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($idTodelete == $_SESSION['cart'][$i]['id']) {
            array_splice($_SESSION['cart'],$i, 1);
            echo "L'article a été retiré du panier";
        }
    }
}

/***********************************AFFICHER LE BOUTON POUR SUPPRIMER LA TOTALITE DU PANIER***********************************/
function boutonToutSupprimer () {
echo '<form method="post" action="cart.php">
 <input type="hidden" name="supprimerPanier" value="">
 <button type="submit" class="btn btn-primary">Supprimer le panier</button>';
}

/***********************************SUPPRIMER LA TOTALITE DU PANIER***********************************/
function suppressionDuPanier () {
    $_SESSION['cart'] = [];
}

/***********************************AFFICHER LE BOUTON POUR VALIDER LE PANIER***********************************/
/*function boutonValiderLaCommande () {
    echo '<form method="post" action="validation.php">
          <input type="hidden" name="validerLaCommande" value="">   
          <button type="submit" class="btn btn-primary">Valider la commande</button>
          </form>';
} */

/***********************************VALIDER LE PANIER***********************************/
function AfficherLaValidationCommande () {
    foreach ($_SESSION['cart'] as $element) {
        echo '<li class="list-group-item d-flex justify-content-between">
        <p>' . $element['nom_du_sejour'] . '</p>
        <p>' . $element['quantity'] . '</p>
        <p>' . $element['prix'] . '</p>
        </li>';
    }
}


/***********************************MODIFICATIONS DES QUANTITES***********************************/

function modificationQuantités () {
 for ($i = 0; $i < count($_SESSION['cart']); $i++) {
     if ($_SESSION['cart'][$i]['id'] == $_POST['modificationSejourId']) {
        $_SESSION['cart'][$i]['quantity'] = $_POST['nouvelleQuantité'];
     }
 }
}

/***********************************TOTAL DU PANIER***********************************/
$total = 0;
function totalPanierHFP() {
    global $total;
    foreach ($_SESSION['cart'] as $element) {
        $total += $element['prix'] * $element['quantity'];
    }
    echo $total;
    return $total;
}

/***********************************FRAIS DE DOSSIER***********************************/
$totalFrais = 0;
function calculFraisDossier() {
    global $totalFrais;
    $totalNombreArticles = 0;
    $prixFraisDossier = 30;
    foreach ($_SESSION['cart'] as $element) {
        $totalNombreArticles += $element['quantity'];
    }
    $totalFrais = $totalNombreArticles * $prixFraisDossier;
    echo '<div>' . $totalFrais . '</div>';
    return $totalFrais;
}

/***********************************TOTAL DU PANIER TTC***********************************/
function TotalTTC () {
    global $total, $totalFrais;
    $totalTTC = $total + $totalFrais;
    echo '<div>' . $totalTTC . '</div>';

}






?>
