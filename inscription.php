<?php
include "header.php";
include "functions.php";
include "db.php";
?>

<div class="panierUp"></div>
<div>
<?php
  if(isset($_POST["creation"])) {
        $lastname = $_POST["nom"];
        $firstname = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["mdp"];


      $sql = "INSERT INTO clients(nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
      $statement = $connexion->prepare($sql);
      $statement->execute([$lastname, $firstname, $email, $password]);
      if($statement) {
            echo '<div class="alert alert-success" role="alert">
                Votre compte a bien été crée !
                    </div>';
      } else {
            echo '<div class="alert alert-warning" role="alert">
                Votre compte n\'a pas pu être crée !
                     </div>';
      }
  }
?>
</div>
<form method="POST" action="inscription.php">
      <div class="mb-3">
            <label for="lastName" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="lastName" required>
      </div>
      <div class="mb-3">
            <label for="firstName" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="firstName" required>
      </div>
      <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="Email">
            <div class="form-text">Votre adresse e-mail ne sera pas utilisée à des fins commerciaux.</div>
      </div>
      <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" name="mdp" id="Password">
            <div class="form-text">Veuillez mettre un mot de passe avec 8 caractères minimun, un chiffre et un caractère spécial.</div>
      </div>
      <input type="submit" class="btn btn-primary" name="creation" value="Créer votre compte">
</form>

<?php
  include "footer.php";
?>