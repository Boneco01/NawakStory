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
	}

	/* --- --- --- --- --- */

	$monAventure = new Adventure();

	if (!isset($_SESSION['pseudo'])) {
		header('Location: connexion.php');
	}

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
						<img src="<?php echo($tabAventure[0][3]); ?>" class="w-75 position-absolute">
						<a href="history.php?id=<?php echo($tabAventure[0][0]); ?>">
						<button class="w-25 position-absolute text-light"> Commencer </button></a>
					</div>
				</div>
			</div>

			<div class="mt-5 pb-2 table-wrapper my-custom-scrollbar" id="">
				<table class="table">
					<thead>
							<?php
								$tailleListe = count($tabAventure)+1;
								for($i = 1; $i < $tailleListe; $i++) {
									echo "
										<tr>
											<th scope=\"col\">
												<img class=\"imgChoixAventure\" id=\"". $i ."\"src=\"".$tabAventure[$i-1][3]."\">
											</th>
										</tr>
									";
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
