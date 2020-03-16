<?php

	include './templateTop.php';
	include './connexionBD.php';

	class Subscribe extends ConnexionBD {

		// Fonction qui effectue une inscription à notre site

		function inscription($pseudo, $password) {
			$password = hash("sha256", $password);
			$req = self::$bdd->prepare('INSERT INTO Aventurier (pseudo, mdp) VALUES (:pseudo, :mdp)');
			$tuple = array(':pseudo' => $pseudo, ':mdp' => $password);
			$result = $req->execute($tuple);
			
			if ($result) {
				$message = "Inscription réussie. Bienvenue parmi nous, aventurier";
				echo '<script type="text/javascript"> window.alert("' . $message . '");window.location.href="home.php";</script>';
			} else {
				$message =  "Inscription impossible, vos données sont incorrectes. Veuillez réessayer !";
				echo '<script type="text/javascript"> window.alert("' . $message . '");</script>';
			}
		}
	}

	/* --- --- --- --- --- */

	$monInscription = new Subscribe();

	if (isset($_GET['action'])) {
		$monAction = $_GET['action'];
	} else {
		$monAction = "default";
	}

	switch ($monAction) {
		case "subscribe":
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$password = htmlspecialchars($_POST['password']);
			$monInscription->inscription($pseudo, $password);
			$_SESSION['pseudo'] = $pseudo;
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
					<h2 class="text-center pt-5 px-2"> Identification de l'aventurier </h2>

					<p class="mx-5 mt-4 text-center d-none d-lg-block px-2"><em> Bienvenue à toi, apprenti aventurier. Tu t'apprêtes à rejoindre la plus grande guilde d'Adefynir pour partir à la découverte de notre monde, et nous aider à nous développer encore plus. Tu auras l'occasion de participer à des histoires toutes plus originales les unes des autres, affronter des ennemis coriaces afin de purger le monde de ce mal qui l'habite !</em></p>
					<p class="mx-5 mt-4 text-center"><em> Pour rejoindre notre guilde et partir à l'aventure découvrir de merveilleux trésors, veuillez entrer le nom de votre personnage ainsi qu'un mot de passe, afin de pouvoir vous reconnaître. </em></p>

					<script type="text/javascript">
						function verifForm() {
							if (document.getElementById("field1").value != "" && document.getElementById("field2").value != "") {
								document.getElementById("button").disabled = false;
							} else {
								document.getElementById("button").disabled = true;
							}
						}
					</script>

					<form action="subscribe.php?action=subscribe" method="post" class="pb-3 w-100">
						<input type="text" name="pseudo" placeholder="Pseudo" class="text-center mb-3 fields w-25" id="field1"  onchange="verifForm()">
						<input type="password" name="password" placeholder="Mot de passe" class="text-center mb-3 fields w-25" id="field2" onchange="verifForm()">
						<button class="d-block text-dark rounded-lg w-25 mx-auto fields" type="submit" disabled="true" id="button"> Signer le contrat </button>
					</form>
				
					<div id="redirection" class="w-50 mx-auto text-center pb-3">
							<a href="connexion.php" class="text-dark"><em> Vous êtes déjà dans notre guilde ? Identifiez-vous ! </em></a>
					</div>
				</div>
			</div>
		</section>

		<?php
			include './templateBottom.php';
		?>
	</body>
</html>