<!--**********************************CREATION DES SEJOURS**********************************-->

<?php

function getSejours()
{
    /***********************************SEJOUR EN GRECE***********************************/
    $grece = [
        "id" => 0,
        "image" => "./images/santorin.jpg",
        "background" => "./images/background-santorin.jpg",
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
        "background" => "./images/background-ile-maurice.jpg",
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
        "background" => "./images/background-bresil.jpg",
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
        "background" => "./images/background-islande.jpg",
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

function showSejours()
{
    require "db.php";
    $sql = "SELECT * FROM articles";
    $statement = $connexion->prepare($sql);
    $statement->execute();
    $voyages = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach ($voyages as $voyage) {
        echo '<div class="col-xl-3 col-lg-6 col-sm-12 justify-content-center mt-5 mb-5 displayStays">
        <div class="card" style="width: 18rem;">
  <img src="' . $voyage->image . '" class="card-img-top" alt="">
  <div class="card-body">
    <h2 class="card-title">' . $voyage->nom . '</h2>
    <p class="card-text">' . $voyage->description . '</p>
    <p class="card-text">Durée : ' . $voyage->duree . '</p>
    <p class="card-text">Formule : ' . $voyage->id_gamme . '</p>
    <p class="card-text">Prix : ' . $voyage->prix . ' € /personne</p>
    <div class="btn-wrapper">
    <form method="post" action="sejour.php">
    <input type="hidden" name="sejourId" value="' . $voyage->id . '">
    <button type="submit" class="btn btn-primary" style="border-radius: 50px;">Details</button>
    </form>
    <form method="post" action="cart.php">
    <input type="hidden" name="sejourId" value="' . $voyage->id . '">
    <button type="submit" class="btn btn-primary" style="border-radius: 50px;">Ajouter au panier</button>
    </form>
    </div>
  </div>
</div>
</div>';
    }
}

/***********************************RECUPERATION DU SEJOUR CORRESPONDANT A L'ID***********************************/

function getSejour($id)
{
    require "db.php";
    //$sql = "SELECT * FROM articles";
    $sql = "SELECT articles.id, articles.nom, articles.description, articles.description_detaillee, articles.image, articles.prix, articles.background, articles.duree, gammes.nom AS formule FROM articles  
    INNER JOIN gammes
    ON articles.id_gamme = gammes.id;";
    $statement = $connexion->prepare($sql);
    $statement->execute();
    $voyages = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach ($voyages as $voyage) {
        if ($id == $voyage->id) {
            return $voyage;
        }
    }
}

/***********************************AFFICHAGE DU SEJOUR CORRESPONDANT A L'ID***********************************/

function showSejour($id)
{
    $sejourDetails = getSejour($id);
    if (!isset($_SESSION["nom"])) {
        header('Location: connexion.php');
    } else {
        echo '
    <div class="container" style="padding: 0px;">
        <div class="row">
            <div class="card col" style="width: 18rem;padding: 0px;">
                <img src="" class="card-img-top" alt="">
                <div class="card-body details" style="background-image: url(' . $sejourDetails->background . ');">
                    <h3 class="card-title">' . $sejourDetails->nom . '</h3>
                    <div class="row rowDetails">
                        <div class="col-md-2">
                            <p>Intitulé du séjour : </p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">' . $sejourDetails->description . '</p>
                        </div>
                    </div>
                    <div class="row rowDetails">
                        <div class="col-md-2">
                            <p>Description : </p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">' . $sejourDetails->description_detaillee . '</p>
                        </div>
                    </div>
                    <div class="row rowDetails">
                        <div class="col-md-2">
                            <p>Durée du séjour : </p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">' . $sejourDetails->duree . '</p>
                        </div>
                    </div>
                    <div class="row rowDetails">
                        <div class="col-md-2">
                            <p>Formule : </p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">' . $sejourDetails->formule . '</p>
                        </div>
                    </div>
                    <div class="row rowDetails">
                        <div class="col-md-2">
                            <p>Prix du séjour : </p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">' . $sejourDetails->prix . ' € / personne</p>
                        </div>
                    </div>
                    <form class="btn-ajouter" method="post" action="cart.php">
                    <input type="hidden" name="sejourId" value="' . $sejourDetails->id . '">
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
    }
}
/***********************************AJOUTER LE SEJOUR AU PANIER***********************************/

function addToCart($id)
{
    $isArticleAlreadyAdded = FALSE;
    $sejourChoisi = getSejour($id);
    if (!isset($_SESSION["nom"])) {
        header('Location: connexion.php');
    } else {
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($sejourChoisi->id === $_SESSION['cart'][$i]->id) {
                $isArticleAlreadyAdded = TRUE;
                echo "<script>alert(\"Ce séjour est déjà dans votre panier\")</script>";
            }
        }
        if (!$isArticleAlreadyAdded) {
            $sejourChoisi->quantity = 1;
            array_push($_SESSION['cart'], $sejourChoisi);
        }
    }
}

/***********************************AFFICHER LE PANIER***********************************/

function showCart($element)
{
    foreach ($_SESSION['cart'] as $element) {
        echo '<li class="list-group-item d-flex justify-content-between">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 centered">
                            <p>' . $element->nom . '</p>
                        </div>
                        <div class="col-md-5 centered">
                            <form method="post" action="cart.php">
                                <input type="hidden" name="modificationSejourId" value="' . $element->id . '">
                                <input type="text" name="nouvelleQuantité" value="' . $element->quantity . '" style="width: 30px">
                                <button type="submit" class="btn btn-primary">Modifier la quantité</button>
                            </form>                        </div>
                        <div class="col-md-1 centered">
                            <p>' . $element->prix * $element->quantity . ' €</p>
                        </div>
                        <div class="col-md-3 centered">
                            <form method="post" action="cart.php">
                                <input type="hidden" name="idToDelete" value="' . $element->id . '">
                                <button type="submit" class="btn btn-primary">Supprimer du panier</button>
                            </form>
                        </div>
                    </div>
                </div>   
            </li>';
    }
}

/***********************************SUPPRIMER DU PANIER***********************************/
function deleteFromCart($idTodelete)
{
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($idTodelete == $_SESSION['cart'][$i]->id) {
            array_splice($_SESSION['cart'], $i, 1);
            if ($_SESSION['cart'] !== []) {
                echo '<div class="alert alert-success" role="alert">
                Le séjour a été retiré du panier
                    </div>';
            } else {
                echo '<div class="alert alert-warning" role="alert">
                Votre panier est vide
                     </div>';
            }
        }
    }
}

/***********************************AFFICHER LE BOUTON POUR SUPPRIMER LA TOTALITE DU PANIER***********************************/
function boutonToutSupprimer()
{
    echo '<form method="post" action="cart.php">
 <input type="hidden" name="supprimerPanier" value="">
 <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Supprimer le panier</button>';
}

/***********************************SUPPRIMER LA TOTALITE DU PANIER***********************************/
function suppressionDuPanier()
{
    $_SESSION['cart'] = [];
    echo '<div class="alert alert-warning" role="alert">
    Votre panier est vide
  </div>';
}

/***********************************AFFICHER LE BOUTON POUR VALIDER LE PANIER***********************************/
/*function boutonValiderLaCommande () {
    echo '<form method="post" action="validation.php">
          <input type="hidden" name="validerLaCommande" value="">   
          <button type="submit" class="btn btn-primary">Valider la commande</button>
          </form>';
} */

/***********************************VALIDER LE PANIER***********************************/
function AfficherLaValidationCommande()
{
    foreach ($_SESSION['cart'] as $element) {
        echo '<li class="list-group-item d-flex justify-content-around">
        <div>
            <p>' . $element->nom . '</p>
        </div>
        <div>
            <p>' . $element->quantity . '</p>
        </div>
        <div>
            <p>' . $element->prix . ' €</p>
        </div>
        </li>';
    }
}


/***********************************MODIFICATIONS DES QUANTITES***********************************/

function modificationQuantités()
{
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]->id == $_POST['modificationSejourId']) {
            $_SESSION['cart'][$i]->quantity = $_POST['nouvelleQuantité'];
            echo '<div class="alert alert-success" role="alert">
        La quantité a bien été modifiée
            </div>';
        }
    }
}

/***********************************TOTAL DU PANIER***********************************/
$total = 0;
function totalPanierHFP()
{
    global $total;
    foreach ($_SESSION['cart'] as $element) {
        $total += $element->prix * $element->quantity;
    }
    echo '<div class="list-group-item centered mt"><p>Total Hors Taxes : ' . $total . '€</p></div>';
    return $total;
}

/***********************************FRAIS DE DOSSIER***********************************/
$totalFrais = 0;
function calculFraisDossier()
{
    global $totalFrais;
    $totalNombreArticles = 0;
    $prixFraisDossier = 30;
    foreach ($_SESSION['cart'] as $element) {
        $totalNombreArticles += $element->quantity;
    }
    $totalFrais = ($totalNombreArticles * $prixFraisDossier) + intval($_POST['livraison']);
    echo '<div class="list-group-item centered"><p>Total des frais de ports : ' . $totalFrais . ' €</p></div>';
    return $totalFrais;
}

/***********************************TOTAL DU PANIER TTC***********************************/
function TotalTTC()
{
    global $total, $totalFrais;
    $totalTTC = $total + $totalFrais;
    echo '<div class="list-group-item centered">
            <p>Total TTC de la commande : ' . $totalTTC . ' €
          </div>';
}






?>