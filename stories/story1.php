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

		// Fonction pour récupérer le nombre de pièces d'or d'un joueur

		function getOr() {
			$req = self::$bdd->prepare("SELECT or_aventurier FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
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
						<a href=\"history.php?id=1&page=8\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> S’approcher de l’étrange silhouette </p></a>
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
				case "7":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Atteignant finalement le centre de d’intérêt général, vous comprenez rapidement ce qui attire tant l’attention des aventuriers. Un tableau des missions, puisque telle est sa fonction, prend place au milieu de l’auberge. Sur celui-ci, quelques affiches proposant diverses missions et autres commandes sont placardés. A bien y regarder, vous remarquez que nombreuses des affiches ont été arrachés, emportés par les plus rapides ou les plus malins. Une affiche cependant semble ne pas avoir été emportée, il serait bon d’en profiter pour vous l’accaparer tant que vous en avez l’occasion. En survolant le texte inscrit sur le papier, vous comprenez qu’il est question d’une enquête au sujet de ruines suspectes. La récompense est élevée à 100 pièces d’or, une offre alléchante pour une première mission ! </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\">  Récupérer la fiche et se préparer pour partir à l’aventure </p></a>

					";
					break;
				case "8":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous approchez finalement de l’individu encapuchonné, dont vous ne pouvez distinguer l’expression sous l’ombre de sa capuche. Pourtant, celui-ci semble réagir à votre présence, relevant légèrement la tête alors que vous atteignez sa table. Un ricanement enroué s’élève, entre deux toussotement. </p>
						<p class=\"text-center w-75 mx-auto\"> “Et bien, et bien, je vois que vous savez flairer les bonnes opportunités. Prenez donc place, et jouez avec moi ! Si vous croyez en votre chance, peut-être parviendrez vous à tirer profit de mon petit jeu…” </p>
						<p class=\"text-center w-75 mx-auto\"> Déposant doucement sa chope à sa droite, l’étrange personnage dresse son index face à votre visage. </p>
						<p class=\"text-center w-75 mx-auto\"> “Le jeu est simple, je vais montrer une direction avec mon doigt, et vous devrez faire en sorte de regarder dans une direction opposée. Si jamais vous ne bougez pas, ou bien que vous regardez dans la direction pointé, vous perdez, sinon vous gagnez. Il vous suffit de miser une certaine somme d’argent, dont vous remporterez le double si vous parvenez à me battre, ou bien que vous perdrez si je parviens à vous avoir. Intéressé ?” </p>
						<a href=\"history.php?id=1&page=9\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Parier 5 pièces d’or </p></a>
						<a href=\"history.php?id=1&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> S’en aller </p></a>
					";
					break;
				case "9":
					$chance = rand(4, 10);

					if ($this->getOr()[0] - 5 > 0) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous n’avez pas assez d’or pour pouvoir jouer, l’être encapuchonné s’enfonce dans sa chaise en attrapant à nouveau sa chope, vous indiquant par son seul geste qu’il n’est plus intéressé par l’idée de jouer avec vous. </p>
							<a href=\"history.php?id=1&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> S’en aller </p></a>
						";
					} else if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Visiblement ravi de rencontrer un joueur tel que vous, le maître de ce petit jeu se met à balancer son doigt de droite à gauche doucement, tandis que vous tâchez de rester concentré. Soudain, voilà que sa main se contracte, tandis qu’il s’apprête à pointer une direction. </p>
							<p class=\"text-center w-75 mx-auto\"> Fort heureusement, dans un réflexe immédiat, vous parvenez à regarder dans une direction opposée au même instant. L’être encapuchonné se met à grogner, tandis qu’il vous tant les 5 pièces d’or que vous avez gagné. </p>
							<a href=\"history.php?id=1&page=6\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Parier à nouveau 5 pièces d’or </p></a>
							<a href=\"history.php?id=1&page=6\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> S’en aller </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Visiblement ravi de rencontrer un joueur tel que vous, le maître de ce petit jeu se met à balancer son doigt de droite à gauche doucement, tandis que vous tâchez de rester concentré. Soudain, voilà que sa main se contracte, tandis qu’il s’apprête à pointer une direction. </p>
							<p class=\"text-center w-75 mx-auto\"> Malheureusement, son geste rapide semble vous avoir grandement perturbé, et dans la précipitation vous ne pouvez vous empêcher de regarder dans la direction pointé. L’être encapuchonné se met à ricaner, attrapant votre mise pour la fourrer dans l’une de ses poches. </p>
							<a href=\"history.php?id=1&page=9\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Parier à nouveau 5 pièces d’or </p></a>
							<a href=\"history.php?id=1&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> S’en aller </p></a>
						";
					}
					break;
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
	} else {
		header('Location: adventure.php');
	}
?>