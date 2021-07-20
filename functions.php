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
    array_push($sejours, $grece);
    array_push($sejours, $ile_maurice);
    array_push($sejours, $bresil); 
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
    <a href="#" class="btn btn-primary">Ajouter au panier</a>
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
    $sejourChoisi = getSejour($id);
    echo '<div class="card" style="width: 18rem;">
  <img src="" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">'.$sejourChoisi["nom_du_sejour"].'</h5>
    <p class="card-text">'.$sejourChoisi["small_description"].'</p>
    <p class="card-text">'.$sejourChoisi["long_description"].'</p>
    <p class="card-text">'.$sejourChoisi["durée"].'</p>
    <p class="card-text">'.$sejourChoisi["formule"].'</p>
    <p class="card-text">'.$sejourChoisi["prix"].'</p>
    <a href="#" class="btn btn-primary">Ajouter au panier</a>
  </div>
</div>';
    }


?>
