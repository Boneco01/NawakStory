<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/home.css">
	</head>

	<?php 
		include './templateTop.php';
	?>

	<!-- Corps de la page -->

	<body class="mx-auto">
		<section class="mx-auto">
			<h2 class="p-3 text-center"> Bienvenue sur NawakStory ! </h2>

			<p class="p-3 mx-5 text-center mx-auto w-75"> Bienvenue à toi visiteur ! Tu te demandes où tu es et laisse moi éclairer ta lanterne. Tu te trouves dans NawakStory, une guilde d'aventuriers de tout genre qui recrute en ce moment. Nous aurions besoin de toi pour accomplir nos missions les plus périlleuses. Es-tu pret à plonger dans l'aventure et découvrir de nouveaux mondes ? </p>
			<p class="p-3 mx-5 text-center mx-auto w-75"> Pour commencer, il faut en premier lieu intégrer la guilde puis choisir tes statistiques afin de pouvoir partir à l'aventure convenablement. Je t'invite à cliquer sur le bouton <strong> "Rejoindre" </strong> en haut à droite de la page et compléter ta fiche d'aventurier. </p>

			<div class="mx-auto row" id="imgHome">
				<a href="chronicle.php" class="col m-0 p-0" id="chronicle">
					<img src="images/map.jpg" class="w-100 h-100 position-absolute" alt="#" id="chronicleImg">
					<span id="chronicleText" class="position-absolute text-center text-light"> Découvrir les chroniques </span>
				</a>

				<a href="adventure.php" class="col m-0 p-0" id="adventure">
					<img src="images/aventure.jpg" class="w-100 h-100 position-absolute" alt="#" id="adventureImg">
					<span id="adventureText" class="position-absolute text-center text-light"> Partir à l'aventure ! </span>
				</a>
			</div>
		</section>
	</body>

	<?php 
		include './templateBottom.php';
	?>
</html>