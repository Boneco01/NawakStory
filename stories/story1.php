<?php
	
	class Story1 extends ConnexionBD {
		
		// Fonction pour récupérer les différentes statistiques du joueur

		function getStats() {
			$req = self::$bdd->prepare("SELECT stat_force, stat_endurance, stat_intelligence, stat_chance FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetchAll();
			return $tab;
		}

		// Fonction pour savoir quel texte est à afficher en fonction de la page sur laquelle l'utilisateur se trouve

		function page($page) {
			switch ($page) {
				case "1":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous entrez finalement dans la caserne, et faîtes face à une bande de joyeux lurons. Véritable auberge et point de rencontre pour les aventuriers qui décident, tout comme vous, de rejoindre la guilde, cet endroit inspire la joie de vivre et semble propice à nouer des liens. 
						<p class=\"text-center w-75 mx-auto\"> Peut-être remarquerez vous la jolie demoiselle prenant place derrière le comptoir, distribuant des chopines à tour de bras. Elle, en tous cas, semble vous avoir à l’oeil </p>
						<a href=\"history.php?id=1&page=2\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Aller à la rencontre de la tavernière </p></a>

						<p class=\"text-center w-75 mx-auto\"> Au beau milieu de l’auberge se regroupe de nombreuses personnes, formant une masse aussi bruyante qu’intimidante. Les quelques chanceux qui parviennent à s’extraire de la foule tiennent chacun un parchemin entre leurs mains. </p>
						<a href=\"history.php?id=1&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Tenter de se faufiler à travers la foule </p></a>

						<p class=\"text-center w-75 mx-auto\"> Au fond de l’auberge, dans le coin le plus sombre, se tient une silhouette encapuchonnée. Celle-ci semble complètement indifférente au brouhaha perpétuel qui occupe le lieu, sirotant doucement sa chope. </p>
						<a href=\"history.php?id=1&page=?\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> S’approcher de l’étrange silhouette </p></a>
					";
					break;

				case "2":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous approchez du comptoir, prenant place aux côtés d’un homme visiblement ivre. Heureusement pour vous, ce dernier semble trop occupé à inspecter le fond de sa chope pour vous causer le moindre soucis. Vous ne restez pas seul longtemps, puisque sans trop tarder voilà que la tavernière vous accueil comme il se doit. </p>
						<p class=\"text-center w-75 mx-auto\"><i> “Bien le bonjour, aventurier. Je ne crois pas vous avoir déjà rencontré, vous venez d’arriver n’est-ce pas ?” </i></p>
						<p class=\"text-center w-75 mx-auto\"> La charmante jeune femme, parée d’une chevelure d’un roux ardent, et dont les tâches de rousseurs font ressortir son regard azur, s’adresse à vous d’une voix suave. Balayant la main baladeuse de l’ivrogne à vos côtés, la tavernière reprend. </p>
						<p class=\"text-center w-75 mx-auto\"><i> “Quoi qu’il en soit, vous êtes le bienvenue parmi nous ! Vous trouverez ici tout ce dont chaque aventurier a besoin. Que ce soit de quoi vous requinquer comme de quoi vous amuser, ou encore les contrats que nous avons à vous proposer, vous ne connaîtrez plus l’ennui !” </i></p>
						<p class=\"text-center w-75 mx-auto\"> Sur ces mots, elle pointait du doigt la foule prenant place au milieu de l’auberge, cachant vraisemblablement le tableau des missions. </p>
						<a href=\"history.php?id=1&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Remercier la tavernière et se diriger vers la foule </p></a>

						<p class=\"text-center w-75 mx-auto\"> Soudainement, l’ivrogne se fait plus insistant. Attrapant la robe de la jeune femme, il se met à la tirer frénétiquement. Celle-ci, loin d’être effrayée par le comportement de l’homme, semble toutefois ennuyée. Tandis qu’elle essaie de se défaire de l’étreinte du malheureux, celui-ci commence à devenir agressif. </p>
						<a href=\"history.php?id=1&page=3\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Porter secours à la tavernière </p></a>
					";
					break;

				case "3":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Prenant votre courage à deux mains, vous vous ruez sur l’ivrogne afin qu’il relâche sa cible. Le bousculant violemment, vous parvenez à le faire lâcher prise, tandis qu’il tombe à la renverse. Malgré son état second, l’homme parvient à se relever, vous faisant face en grognant. </p>
					";

					$chance = rand(4, 10);

					if ($this->getStats()[0][0] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> L’ivrogne se jetant sur vous, vous l’accueillez en bonne et due forme en lui portant votre poing à la figure. L’une de ses dents s’échappe de sa bouche, alors qu’il s’écrase de nouveau en arrière, cette fois inconscient. Soupirant, la tavernière tapote sur sa robe afin de la défroisser, vous adressant un large sourire. </p>
							<p class=\"text-center w-75 mx-auto\"><i> “Les énergumènes dans son genre sont nombreux ici, j’y suis habituée, mais merci pour votre aide ! Tenez, en gage de ma gratitude, prenez-en soin.” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Un léger clin d’oeil accompagne le geste de la jeune femme, tandis qu’elle vous tend un petit pendentif en argent. Appelée par un énième client, votre interlocutrice vous laisse de nouveau seul. </p>
							<a href=\"history.php?id=1&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ranger le pendentif et se diriger vers la foule </p></a>
						";
					} else if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous tentez de le frapper, mais vous ne le faites que reculer. Cependant, par chance, l’ivrogne trébuche sur le tabouret sur lequel il était assis et se cogne la tête sur le coin de la table. Il s’évanouit sur le coup, mais vous ne savez pas si cela est dû à l’alcool ou à la chute. </p>
							<p class=\"text-center w-75 mx-auto\"> Soupirant, la tavernière tapote sur sa robe afin de la défroisser, vous adressant un large sourire. </p>
							<p class=\"text-center w-75 mx-auto\"><i> “Les énergumènes dans son genre sont nombreux ici, j’y suis habituée.” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Appelée par un énième client, votre interlocutrice vous laisse de nouveau seul. </p>
							<a href=\"history.php?id=1&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Se diriger vers la foule </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> L’ivrogne se jette sur vous et vous attrape à la gorge. Tandis que vous suffoquer, d’autres aventuriers sur ruent à votre secours afin de maîtriser l’énergumène. </p>
							<p class=\"text-center w-75 mx-auto\"> Finalement, vous tombez à la renverse, parvenant difficilement à reprendre votre souffle. Votre manque de constitution semble grandement vous handicaper, et vous finissez par tomber dans les pommes. </p>
							<p class=\"text-center w-75 mx-auto\"> Peut-être auriez-vous dû réfléchir davantage à vos capacités avant d’entreprendre pareille action. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous transportant dans l’une des chambres de l’auberge, les aventuriers vous laissèrent aux petits soins de la tavernière avant que vous ne repreniez connaissance. </p>
							<a href=\"history.php?id=1&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Redescendre dans la caserne </p></a>
						";
					}
					break;

				case "4":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Doucement mais sûrement, vous parvenez à vous frayer un chemin entre la foule. Toutefois, il semble que vous n’êtes pas le seul à espérer atteindre le centre de ce cercle infernal. Entre deux coups de coudes mal avisés, vous percutez lourdement un mur… Qui n’en est pas vraiment un. Devant vous se tient un véritable colosse, vous toisant désormais d’un regard mauvais. </p>
						<a href=\"history.php?id=1&page=5\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Dissuader l’homme de s’en prendre à vous </p></a>
						<a href=\"history.php?id=1&page=6\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui montrer lequel de vous deux est le plus fort </p></a>
					";
					break;

				case "5":
					$chance = rand(4, 10);
					
					if ($this->getStats()[0][2] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Alors que la tension semble grimper en flèche au milieu de cette marée d’aventuriers, vous faîtes face à une situation complexe. En effet, vous vous êtes attiré les foudres d’un homme bien plus imposant que la moyenne, et qui ne semble pas assez raisonnable pour retenir ses poings. </p>
							<p class=\"text-center w-75 mx-auto\"> Toutefois, dans un éclair de génie, vous faites en sorte de trébucher au contact d’un homme à votre droite. Exagérant votre réaction, vous insistez sur le fait que ces gens sont réellement mal élevés, et qu’ils sont les seuls responsables de toutes ces collisions. Fort heureusement, voilà que le colosse se laisse berner, alors que vous parvenez à rediriger sa rage contre une tierce personne. D’un geste ample, ce dernier balaye une grande partie de la foule, vous ouvrant par la même occasion la voie. </p>
							<a href=\"history.php?id=1&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> En profiter pour atteindre le centre de la foule </p></a>
						";
					} else if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Alors que la tension semble grimper en flèche au milieu de cette marée d’aventuriers, vous faîtes face à une situation complexe. En effet, vous vous êtes attiré les foudres d’un homme bien plus imposant que la moyenne, et qui ne semble pas assez raisonnable pour retenir ses poings. </p>
							<p class=\"text-center w-75 mx-auto\"> Si vous tentez maladroitement de rejeter la faute sur un autre homme, feintant une chute provoquée par un contact bien trop peu crédible, il semble néanmoins que votre bonne étoile vous accompagne. Un peu plus loin dans la foule, une bagarre éclate, provoquant une vague de gens qui a pour effet de vous emporter loin de cet adversaire inescompté. Soufflant de soulagement, vous parvenez à vous extraire doucement du “courant”, découvrant une ouverture. </p>
							<a href=\"history.php?id=1&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> En profiter pour atteindre le centre de la foule </p></a>
						";
					}  else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Alors que la tension semble grimper en flèche au milieu de cette marée d’aventuriers, vous faîtes face à une situation complexe. En effet, vous vous êtes attiré les foudres d’un homme bien plus imposant que la moyenne, et qui ne semble pas assez raisonnable pour retenir ses poings. </p>
							<p class=\"text-center w-75 mx-auto\"> Si vous tentez maladroitement de rejeter la faute sur un autre homme, feintant une chute provoquée par un contact bien trop peu crédible, il est clair que votre petit manège ne trompe pas cet adversaire inescompté. </p>
							<p class=\"text-center w-75 mx-auto\"> Un geste vif précéda un ciel étoilé, tandis que la frappe du colosse vous atteint de plein fouet. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous transportant dans l’une des chambres de l’auberge, les aventuriers vous laissèrent aux petits soins de la tavernière avant que vous ne repreniez connaissance. </p>
							<a href=\"history.php?id=1&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Redescendre dans la caserne </p></a>
						";
					}
					break;
				case "6":
					$chance = rand(4, 10);

					if ($this->getStats()[0][0] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Alors que la tension semble grimper en flèche au milieu de cette marée d’aventuriers, vous faîtes face à une situation complexe. En effet, vous vous êtes attiré les foudres d’un homme bien plus imposant que la moyenne, et qui ne semble pas assez raisonnable pour retenir ses poings. </p>
							<p class=\"text-center w-75 mx-auto\"> Toutefois, loin d’être impressionné par cet adversaire inescompté, vous bombez le torse et faîtes face dignement. Votre comportement semble par ailleurs l’irriter davantage, celui-ci se mettant à rugir comme une bête enragé en brandissant son poing. Parvenant à éviter son assaut, vous envoyez à votre tour un uppercut rencontrer sa mâchoire. </p>
							<p class=\"text-center w-75 mx-auto\"> Le choc fut terrible, la tête du colosse rebondissant en arrière, manquant presque de se détacher. Complètement mis K.O par cette contre-attaque fulgurante, ce dernier titube un instant avant de s’effondrer sur la foule, écrasant quelques aventuriers et vous offrant un chemin tout tracé. </p>
							<a href=\"history.php?id=1&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> En profiter pour atteindre le centre de la foule </p></a>
						";
					} else if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Alors que la tension semble grimper en flèche au milieu de cette marée d’aventuriers, vous faîtes face à une situation complexe. En effet, vous vous êtes attiré les foudres d’un homme bien plus imposant que la moyenne, et qui ne semble pas assez raisonnable pour retenir ses poings. </p>
							<p class=\"text-center w-75 mx-auto\"> Toutefois, loin d’être impressionné par ce colosse, vous bombez le torse et faîtes face dignement. Votre comportement semble par ailleurs l’irriter davantage, celui-ci se mettant à rugir comme une bête enragé en brandissant son poing. Parvenant à éviter son assaut, vous envoyez à votre tour un uppercut rencontrer sa mâchoire. </p>
							<p class=\"text-center w-75 mx-auto\"> Malheureusement, quand bien même celle-ci fait mouche, votre attaque est arrêté net par le cou robuste de votre adversaire. Peut-être était-ce un peu trop ambitieux de vous jeter dans l’affrontement face à un homme de cette trempe. Il semble néanmoins que votre bonne étoile vous accompagne. Un peu plus loin dans la foule, une bagarre éclate, provoquant une vague de gens qui a pour effet de vous emporter loin de cet adversaire inescompté. Soufflant de soulagement, vous parvenez à vous extraire doucement du “courant”, découvrant une ouverture. </p>
							<a href=\"history.php?id=1&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> En profiter pour atteindre le centre de la foule </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Alors que la tension semble grimper en flèche au milieu de cette marée d’aventuriers, vous faîtes face à une situation complexe. En effet, vous vous êtes attiré les foudres d’un homme bien plus imposant que la moyenne, et qui ne semble pas assez raisonnable pour retenir ses poings. </p>
							<p class=\"text-center w-75 mx-auto\"> Toutefois, loin d’être impressionné par ce colosse, vous bombez le torse et faîtes face dignement. Votre comportement semble par ailleurs l’irriter davantage, celui-ci se mettant à rugir comme une bête enragé en brandissant son poing. Parvenant à éviter son assaut, vous envoyez à votre tour un uppercut rencontrer sa mâchoire. </p>
							<p class=\"text-center w-75 mx-auto\"> Malheureusement, quand bien même celle-ci fait mouche, votre attaque est arrêté net par le cou robuste de votre adversaire. Peut-être était-ce un peu trop ambitieux de vous jeter dans l’affrontement face à un homme de cette trempe. Un geste vif précéda un ciel étoilé, tandis que la frappe du colosse vous atteint de plein fouet. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous transportant dans l’une des chambres de l’auberge, les aventuriers vous laissèrent aux petits soins de la tavernière avant que vous ne repreniez connaissance. </p>
							<a href=\"history.php?id=1&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Redescendre dans la caserne </p></a>
						";
					}
					break;
					/*
						<p class=\"text-center w-75 mx-auto\"></p>
						<a href=\"history.php?id=1&page=6\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"></p></a>
					*/
				default: 
					break;
			}
		}
	}

	/* --- --- --- --- --- */

	$maPremièreHistoire = new Story1();

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
		$maPremièreHistoire->page($page);
		$maPremièreHistoire->getStats();
	} else {
		header('Location: adventure.php');
	}
?>