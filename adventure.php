<?php
	include './templateTop.php';
	include './connexionBD.php';

	class Adventure extends ConnexionBD {

		// Fonction pour récupérer les données liées à notre aventure

		function getAdventure() {
			$req = self::$bdd->prepare('SELECT * FROM Aventure');
			$result = $req->execute();

			$tab = $req->fetchAll();
			return $tab;
		}

		// Fonction pour récupérer l'histoire actuelle

		function getHistoire() {
			$req = self::$bdd->prepare("SELECT histoire_actuelle FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			return $tab;
		}

		// Fonction pour vérifier si un personnage à été créé 

		function persoIsCreate() {
			$req = self::$bdd->prepare("SELECT stat_force FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			return $tab;
		}
	}

	/* --- --- --- --- --- */

	$monAventure = new Adventure();

	if (!isset($_SESSION['pseudo'])) {
		header('Location: connexion.php');
	}

	if ($monAventure->persoIsCreate()[0] == 0) {
		header('Location: barrack.php');
	}

	$aventureJouable = $monAventure->getHistoire();
	$tabAventure = $monAventure->getAdventure();

		echo "
			<script type=\"text/javascript\">
			$(\"body\").on('click', \".imgChoixAventure\", function() {

				var aventureChoisi = this.id;

				$.ajax({
					dataType: \"json\", 
					url: \"./ajax/ajax_recup_donnees_aventure.php\", 
					data: {id: aventureChoisi},
					method: 'GET',
					success: function(data) {
						document.getElementById(\"detailsAventure\").innerHTML = data;
					},
					error: function() {alert (\"erreur\");}
				});

			});
			</script>
		";
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/adventure.css">
	</head>

	<!-- Corps de la page -->

	<body class="mx-auto">
		<section class="pt-3 mx-auto">
			<div id="detailsAventure">
				<h2 id="titreAventure" class="pb-3 text-center">
					<?php
						echo($tabAventure[0][1]);
					?>
				</h2>

				<div class="w-100 mx-auto row" id="adventureSelect">
					<div class="mt-2 text-center w-50 col m-0 p-0 mb-3" id="adventureText">
						<h3 class="text-center"> Résumé de l'aventure </h3>
						<p id="resumeAventure" class="mt-3 px-5">
							<?php
								echo($tabAventure[0][2]);
							?>
						</p>
					</div>

					<div class="w-50 mx-auto col m-0 p-0" id="adventureImg">
						<img src="<?php echo($tabAventure[0][3]); ?>">
						<?php echo "<a href=\"history.php?id=". $tabAventure[0][0] ."&page=1\">
						<button class=\"position-absolute text-light\"> Commencer </button></a>" ?>
					</div>
				</div>
			</div>

			<div class="table-wrapper my-custom-scrollbar" id="divChoixAventure">
				<table class="table">
					<thead>
							<?php
								
								$tailleListe = count($tabAventure) + 1;

								for ($i = 1; $i < $tailleListe; $i++) {
									if ($i <= $aventureJouable[0]) {
										echo "
											<tr>
												<th scope=\"col\">
													<img class=\"imgChoixAventure\" id=\"". $i ."\"src=\"".$tabAventure[$i-1][3]."\">
												</th>
											</tr>
										";
									} else {
										echo "
											<tr>
												<th scope=\"col\">
													<img class=\"nonJouable\" id=\"". $i ."\"src=\"".$tabAventure[$i-1][3]."\">
												</th>
											</tr>
										";
									}
								}
							?>
					</thead>
				</table>
			</div>
		</section>
	</body>

	<?php 
		include './templateBottom.php';
	?>
</html>
