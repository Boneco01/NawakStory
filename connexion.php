<?php

	include './templateTop.php';
	include './connexionBD.php';
	
	class Connexion extends ConnexionBD {

		// Fonction qui effectue la connexion à notre site

		function connexionSite($pseudo, $password) {
			$password = hash("sha256", $password);
			$req = self::$bdd->prepare('SELECT * FROM Aventurier WHERE pseudo = :pseudo AND mdp = :mdp');
			$tuple = array(':pseudo' => $pseudo, ':mdp' => $password);
			$result = $req->execute($tuple);

			$tab = $req->fetchAll();

			if (count($tab) <= 0) {
				$message = "Connexion impossible, vos données sont incorrectes. Veuillez réessayer !";
				echo '<script type="text/javascript"> window.alert("' . $message . '");window.location.href="connexion.php";</script>';
			} else {
				$_SESSION['pseudo'] = $pseudo;
				header('Location: home.php');
			}
		}

		// Fonction pour se déconnecter de notre site

		function deconnexionSite() {
			unset($_SESSION['pseudo']);
			header('Location: home.php');
	 	}
	}

 	/* --- --- --- --- --- */

	$maConnexion = new Connexion();

	if (isset($_GET['action'])) {
		$monAction = $_GET['action'];
	} else {
		$monAction = "default";
	}

	switch ($monAction) {
		case "connect":
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$password = htmlspecialchars($_POST['password']);
			$maConnexion->connexionSite($pseudo, $password);
			break;
		case "deconnect":
			$maConnexion->deconnexionSite();
			break;
		default:
			break;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/connexion_inscription.css">
	</head>

	<!-- Corps de page -->

	<body class="mx-auto">
		<section class="mx-auto">
			<div id="parchmentBackground" class="mx-auto w-100">
				<div id="parchment" class="w-75 mx-auto h-100">
					<h2 class="text-center pt-5 px-2"> Contrat d'aventurier </h2>

					<p class="mx-5 mt-4 text-center d-none d-lg-block px-2"><em> Bonjour à toi aveturier, prêt à partir pour de nouvelles aventures palpipantes ? Qu'allez-vous explorer cette fois-ci : une jungle aux multiples dangers, des manoirs hantés par de dangereux spectres ? </em></p>
					<p class="mx-5 mt-4 text-center"><em> Avant de partir en exploration, nous avons besoin que vous vous identifiez dans notre guilde pour que l'on puisse vous assurer en cas de pépin. </em></p>

					<script type="text/javascript">
						function verifForm() {
							if (document.getElementById("field1").value != "" && document.getElementById("field2").value != "") {
								document.getElementById("button").disabled = false;
							} else {
								document.getElementById("button").disabled = true;
							}
						}
					</script>

					<form action="connexion.php?action=connect" method="post" class="pb-3 w-100">
						<input type="text" name="pseudo" placeholder="Pseudo" class="text-center mb-3 fields w-25" id="field1"  onchange="verifForm()">
						<input type="password" name="password" placeholder="Mot de passe" class="text-center mb-3 fields w-25" id="field2" onchange="verifForm()">
						<button class="d-block text-dark rounded-lg w-25 mx-auto fields" type="submit" disabled="true" id="button"> S'identifier </button>
					</form>
				
					<div id="redirection" class="w-50 mx-auto text-center pb-3">
							<a href="subscribe.php" class="text-dark"><em> Vous n'êtes pas encore dans notre guilde ? Rejoignez-nous ! </em></a>
					</div>
				</div>
			</div>
		</section>

		<?php
			include './templateBottom.php';
		?>
	</body>
</html>