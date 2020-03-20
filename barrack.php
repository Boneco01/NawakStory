<?php

	include './templateTop.php';
	include './connexionBD.php';
	
	class Barrack extends ConnexionBD {
		
		// Fonction pour savoir si l'utilisateur à déjà créé son personnage

		function persoCreate() {
			$req = self::$bdd->prepare("SELECT stat_force FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			return $tab[0];
		}

		// Fonction pour insérer les valeurs de notre personnage

		function insertionPersonnage($or) {
			$req = self::$bdd->prepare("UPDATE Aventurier SET stat_force = :stat_force, stat_endurance = :stat_endurance, stat_intelligence = :stat_intelligence, stat_chance = :stat_chance, or_aventurier = :or_aventurier WHERE pseudo = :pseudo");
			$tuple = array(":stat_force" => $_POST['force'], ":stat_endurance" => $_POST['habilete'], ":stat_intelligence" => $_POST['intelligence'], ":stat_chance" => $_POST['chance'], ":or_aventurier" => $or, ":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);
		}

		// Fonction pour récupérer les valeurs de notre personnage

		function getPersonnage() {
			$req = self::$bdd->prepare("SELECT * FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			return $tab;
		}
	}

	/* --- --- --- --- --- */

	$maCaserne = new Barrack();

	if (!isset($_SESSION['pseudo'])) {
		header('Location: connexion.php');
	}

	if (isset($_GET['action'])) {
		$monAction = $_GET['action'];
	} else {
		$monAction = "default";
	}

	switch ($monAction) {
		case "ajouté":
			$maCaserne->insertionPersonnage(10);
			break;
		default:
			break;
	}
	
	if (($maCaserne->persoCreate()) == 0) {
		$maPage = "
			<div id=\"perso\" class=\"py-3 text-center\">
				<h3> Création de votre personnage </h3>

				<p class=\"w-75 textIntro mt-3\"> Après avoir réglé tous les papiers d'inscription, vous rencontrez le chef de la guilde. Celui-ci vous propose différentes classes qui serviront à votre perso. Il vous explique que chacune d'entre elles ont des statistiques et des caractéristiques différentes. Selon la classe que vous choisirez, votre aventure et vos choix seront différents. A vous de faire le bon choix en fonction de votre caractère ! </p>
				<p class=\"w-75 textIntro\"> Voici les différentes classes qui vous sont proposées : </p>

				<script type=\"text/javascript\">
					function stats(a) {
						var id = document.getElementById(a).id;
						var chance = Math.floor(Math.random() * (8 - 4 + 1) + 4);

						switch(id) {
							case \"normal\":
								document.getElementById(\"force\").innerHTML = \"8\";
								document.getElementById(\"habilete\").innerHTML = \"8\";
								document.getElementById(\"intelligence\").innerHTML = \"8\";
								document.getElementById(\"chance\").innerHTML = chance.toString();

								document.getElementById(\"hiddenForce\").value = \"8\";
								document.getElementById(\"hiddenHabilete\").value = \"8\";
								document.getElementById(\"hiddenIntelligence\").value = \"8\";
								document.getElementById(\"hiddenChance\").value = chance.toString();
								break;
							case \"guerrier\":
								document.getElementById(\"force\").innerHTML = \"12\";
								document.getElementById(\"habilete\").innerHTML = \"8\";
								document.getElementById(\"intelligence\").innerHTML = \"4\";
								document.getElementById(\"chance\").innerHTML = chance.toString();

								document.getElementById(\"hiddenForce\").value = \"12\";
								document.getElementById(\"hiddenHabilete\").value = \"8\";
								document.getElementById(\"hiddenIntelligence\").value = \"4\";
								document.getElementById(\"hiddenChance\").value = chance.toString();							
								break;
							case \"assassin\":
								document.getElementById(\"force\").innerHTML = \"5\";
								document.getElementById(\"habilete\").innerHTML = \"11\";
								document.getElementById(\"intelligence\").innerHTML = \"8\";
								document.getElementById(\"chance\").innerHTML = chance.toString();

								document.getElementById(\"hiddenForce\").value = \"5\";
								document.getElementById(\"hiddenHabilete\").value = \"11\";
								document.getElementById(\"hiddenIntelligence\").value = \"8\";
								document.getElementById(\"hiddenChance\").value = chance.toString();
								break;
							case \"magicien\":
								document.getElementById(\"force\").innerHTML = \"7\";
								document.getElementById(\"habilete\").innerHTML = \"5\";
								document.getElementById(\"intelligence\").innerHTML = \"12\";
								document.getElementById(\"chance\").innerHTML = chance.toString();

								document.getElementById(\"hiddenForce\").value = \"7\";
								document.getElementById(\"hiddenHabilete\").value = \"5\";
								document.getElementById(\"hiddenIntelligence\").value = \"12\";
								document.getElementById(\"hiddenChance\").value = chance.toString();
								break;
							default:
								break;
						}
					}
				</script>

				<div class=\"container\">
					<div class=\"row w-75 statChoice\">
						<button id=\"normal\" class=\"col\" onclick=\"stats('normal')\"> Normal </button>
						<button id=\"guerrier\" class=\"col\" onclick=\"stats('guerrier')\"> Guerrier </button>
						<button id=\"assassin\" class=\"col\" onclick=\"stats('assassin')\"> Assassin </button>
						<button id=\"magicien\" class=\"col\" onclick=\"stats('magicien')\"> Magicien </button>
					</div>

					<div id=\"stats\" class=\"mt-4 pb-4 mx-auto\">
						<form method=\"post\" action=\"barrack.php?action=ajouté\">
							<h3 class=\"pt-3\"> Statistiques </h3>

							<div class=\"row valStats\">
								<span class=\"text-left col-2\"> Force </span>
								<span class=\"text-left col-1\"> : </span>
								<span id=\"force\" name=\"force\" class=\"text-left col-4\"> 8 </span>
								<input id=\"hiddenForce\" type=\"hidden\" name=\"force\" value=\"\"/> 
							</div>

							<div class=\"row valStats\">
								<span class=\"text-left col-2\"> Habileté </span>
								<span class=\"text-left col-1\"> : </span>
								<span id=\"habilete\" name=\"habilete\" class=\"text-left col-4\"> 8 </span>
								<input id=\"hiddenHabilete\" type=\"hidden\" name=\"habilete\" value=\"\"/> 
							</div>

							<div class=\"row valStats\">
								<span class=\"text-left col-2\"> Intelligence </span>
								<span class=\"text-left col-1\"> : </span>
								<span id=\"intelligence\" name=\"intelligence\" class=\"text-left col-4\"> 8 </span>
								<input id=\"hiddenIntelligence\" type=\"hidden\" name=\"intelligence\" value=\"\"/> 
							</div>

							<div class=\"row valStats\">
								<span class=\"text-left col-2\"> Chance </span>
								<span class=\"text-left col-1\"> : </span>
								<span id=\"chance\" name=\"chance\" class=\"text-left col-4\"> 6 </span>
								<input id=\"hiddenChance\" type=\"hidden\" name=\"chance\" value=\"\"/> 
							</div>
							<input type=\"submit\" class= \"mt-3\" value=\"Créer le personnage\">
						</form>
					</div>
				</div>
			</div>
		";
	} else {
		$monPersonnage = $maCaserne->getPersonnage();
		$maPage = "
			<div id=\"perso\" class=\"py-3 text-center\">
				<h3> Nom d'aventurier : " . $monPersonnage[1] . " </h3>

				<div id=\"stats\" class=\"mt-4 pb-4 mx-auto\">
					<h3 class=\"pt-3\"> Statistiques </h3>

					<div class=\"row valStats\">
						<span class=\"text-left col-2\"> Force </span>
						<span class=\"text-left col-1\"> : </span>
						<span class=\"text-left col-4\"> " . $monPersonnage[3] . " </span>
					</div>

					<div class=\"row valStats\">
						<span class=\"text-left col-2\"> Habileté </span>
						<span class=\"text-left col-1\"> : </span>
						<span class=\"text-left col-4\"> " . $monPersonnage[4] . " </span>
					</div>

					<div class=\"row valStats\">
						<span class=\"text-left col-2\"> Intelligence </span>
						<span class=\"text-left col-1\"> : </span>
						<span class=\"text-left col-4\"> " . $monPersonnage[5] . " </span>
					</div>

					<div class=\"row valStats\">
						<span class=\"text-left col-2\"> Chance </span>
						<span class=\"text-left col-1\"> : </span>
						<span class=\"text-left col-4\"> " . $monPersonnage[6] . " </span>
					</div>
				</div>

				<h3 class=\"pt-3 mb-3\"> Inventaire </h3>

				<div id=\"inventory\" class=\"mt-2 row w-100\">
					<span class=\"col\"> Or : " . $monPersonnage[7] . " </span>
					<span class=\"col\"> Sac : </span>
				</div>

				<h3 id=\"shopTitle\" class=\"mt-3 pt-3 mb-n1\"> Boutique </h3>

				<div id=\"shop\" class=\"mb-n3 row w-100 mx-auto\">
					<img src=\"images/placeholder.png\" alt=\"#\" class=\"col px-5\">
					<img src=\"images/placeholder.png\" alt=\"#\" class=\"col px-5\">
					<img src=\"images/placeholder.png\" alt=\"#\" class=\"col px-5\">
					<img src=\"images/placeholder.png\" alt=\"#\" class=\"col px-5\">
				</div>
			</div>
		";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/barrack.css">
	</head>

	<!-- Corps de la page -->

	<body class="mx-auto">
		<section class="mx-auto">
			<?php
				echo($maPage);
			?>
		</section>
	</body>

	<?php 
		include './templateBottom.php';
	?>
</html>