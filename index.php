<?php
  require "db.php";
  $sql = "SELECT * FROM boutique_en_ligne";
  $statement = $connexion->prepare($sql);
  $statement->execute();
  $voyages = $statement-> fetchAll(PDO::FETCH_OBJ);
  session_start();
?>

<?php
include "header.php";
include "functions.php";
?>

<span style="display: none;">
<?php
if (isset($_POST["validation"])) {
  suppressionDuPanier();
}
?>
</span>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/santorin.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h4>Une escapade le temps du week-end ?</h4>
        <h5>Nous vous proposons des voyages extraordinaires,</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/rio-de-janeiro.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h4>Un séjour au bout du monde ?</h4>
        <h5>dans tous les pays,</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/ile-maurice.jpg" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h4>Ou simplement du repos et de la tranquilité ?</h4>
        <h5>et pour tous les prix !</h5>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</header>

<body>

  <div class="wrapperIndex">
    <h1>Nos offres du moment</h1>
    <div class="container wrapperStays">
      <div class="row">
        <?php
        showSejours();
        ?>
      </div>
    </div>
  </div>
























  <?php
  include "footer.php";
  ?>