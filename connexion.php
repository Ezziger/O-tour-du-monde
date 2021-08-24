<?php
session_start();

include "header.php";
include "functions.php";

if(isset($_POST["connexion"])) {

	$email = $_POST["email"];
	$password = $_POST["mdp"];

	$sql = "SELECT * FROM clients WHERE email = $email";
	$statement = $connexion->prepare($sql);
   $statement->execute();

	if($statement->rowCount() > 0) {
		$data = $statement->fetchAll();
		if (password_verify($password, $data[0]["mot_de_passe"])) {
			$_SESSION['nom'] = $data[0]['nom'];
			echo "Coucou";
		}
	} else {
		echo '<div class="alert alert-warning" role="alert">
                E-mail ou mot de passe invalide !!!
                     </div>';
	}
}
?>



<div class="panierUp"></div>
<div class="container">
	<form method="POST" action="connexion.php">
		<div class="mb-3">
			<label for="Email" class="form-label">Email address</label>
			<input type="email" class="form-control" name="email" id="Email" required>
			<div class="form-text">Votre adresse e-mail ne sera pas utilisée à des fins commerciaux.</div>
		</div>
		<div class="mb-3">
			<label for="Password" class="form-label">Password</label>
			<input type="password" class="form-control" name="mdp" id="Password" required>
			<div class="form-text">Veuillez mettre un mot de passe avec 8 caractères minimun, un chiffre et un caractère spécial.</div>
			<a href="inscription.php">Créer un compte.</a>

		</div>
		<button type="submit" class="btn btn-primary" name="connexion">Se connecter</button>
	</form>
</div>

<?php
include "footer.php";
?>