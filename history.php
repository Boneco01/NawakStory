<?php

	include './templateTop.php';
	include './connexionBD.php';

	class History extends ConnexionBD {

		// Fonction pour récupérer les valeurs de notre personnage

		function getPersonnage() {
			$req = self::$bdd->prepare("SELECT * FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			return $tab;
		}

		function getSac($id_aventurier) {
			$req = self::$bdd->prepare('SELECT * FROM objet INNER JOIN sac using(id_objet) WHERE id_aventurier = :id_aventurier');
			$tuple = array(":id_aventurier" => $id_aventurier);
			$result = $req->execute($tuple);

			$tab = $req->fetchAll();
			return $tab;
		}

		function affichageSac($monSac) {
			$affichageSac = "";
			$tailleListe = count($monSac);
			for($i = 0; $i < $tailleListe; $i++) {
				$affichageSac = $affichageSac . "<img id=\"". $monSac[$i][0] ."\" class=\"imgObjetSac imgClickable\" src=\"". $monSac[$i][2] ."\" alt=\"#\">";
			}

			return $affichageSac;
		}

	}

	/* --- --- --- --- --- */

	$monHistoire = new History();

		$monPersonnage = $monHistoire->getPersonnage();
		$monSac = $monHistoire->getSac($monPersonnage[0]);
		$affichageSac = $monHistoire->affichageSac($monSac);
		$mesInfos = "

			<div id=\"perso\" class=\"py-3 text-center\">
				<span id=\"idPersonnage\">" . $monPersonnage[0] . "</span>
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

				<div id=\"inventory\" class=\"mt-2 row w-100 mx-auto\">
					<span class=\"col\"> Or : <span id=\"or\"> " . $monPersonnage[7] . " </span></span>
				</div>

				<div id=\"items\">
					<tr>
					<th scope=\"col\">
						". $affichageSac ."
					</th>
				</tr>
				</div>
			</div>

            <div id=\"monPopup\" class=\"popup\">
                <!-- Contenu du popup-->
                <div class=\"contenuPopup\">
                    <span class=\"fermer\" onclick=\"fermerPopup()\">&times;</span>
                    <div id=\"infosObjetPopup\">
                    	<h2></h2>
                    	<img src=\"\" alt=\"#\" class=\"mx-auto d-block\" style=\"width: 200px\">
                    	<p class=\"mx-auto d-block\"></p>
                    	<button class=\"mx-auto d-block\">Acheter : </button>
                    </div>
                </div>
            </div>
		";
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/history.css">
		<link rel="stylesheet" type="text/css" href="css/barrack.css">
	</head>

	<!-- Corps de page -->

	<body class="mx-auto">
		<section class="mx-auto">
			<div class="w-75 pb-1 mx-auto">
				<?php
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
					}

					switch ($id) {
						case '1':
						case '2':

							echo "
								<h2 class=\"py-3 text-center\"> Page n°" . $_GET['page'] . " </h2>
							";
							include 'stories/story' . $id . '.php';
							break;
						
						default:
							header('Location: adventure.php');
							break;
					}

					echo "
						<script type=\"text/javascript\">
						function test() {
							alert(\"test\");
						}

						function fermerPopup() {
							var popup = document.getElementById(\"monPopup\");
							popup.style.display = \"none\";
						}

						$(\"body\").on('click', \".imgClickable\", function() {

							var objetChoisi = this.id;
							var isSac;
							if(this.className == \"imgObjetSac imgClickable\") {
								isSac = \"1\";
							} else {
								isSac = \"0\";
							}

							$.ajax({
								dataType: \"json\", 
								url: \"./ajax/ajax_recup_donnees_objet.php\", 
								data: {id: objetChoisi, sac: isSac},
								method: 'GET',
								success: function(data) {
									document.getElementById(\"infosObjetPopup\").innerHTML = data;
								},
								error: function() {alert (\"erreur\");}
							});

							var popup = document.getElementById(\"monPopup\");
							popup.style.display = \"block\";

						});

						</script>
					";

					echo "<div id=\"divInfosAventurier\">". $mesInfos ."</div>";
				?>
			</div>
		</section>

		<?php
			include './templateBottom.php';
		?>
	</body>
</html>