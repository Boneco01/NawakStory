<?php

	include './templateTop.php';
	include './connexionBD.php';

	class History extends ConnexionBD {
		
		// Fonction pour savoir si l'utilisateur à déjà créé son personnage

		function persoCreate() {
			$req = self::$bdd->prepare("SELECT stat_force FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetchAll();
			return $tab;
		}
	}

	/* --- --- --- --- --- */

	$monHistoire = new History();

	$persoCreate = $monHistoire->persoCreate();

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/history.css">
	</head>

	<!-- Corps de page -->

	<body class="mx-auto">
		<section class="mx-auto">
			
		</section>

		<?php
			include './templateBottom.php';
		?>
	</body>
</html>