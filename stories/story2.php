<?php

	class Story2 extends ConnexionBD {
		
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

		// Fonction pour récupérer l'id de l'aventurier actuel

		function getIdAventurier() {
			$req = self::$bdd->prepare("SELECT id_aventurier FROM Aventurier WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);

			$tab = $req->fetch();
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

		// Fonction pour définir quelle histoire à été finie

		function histoireActuelle() {
			$req = self::$bdd->prepare("UPDATE Aventurier SET histoire_actuelle = 2 WHERE pseudo = :pseudo");
			$tuple = array(":pseudo" => $_SESSION['pseudo']);
			$result = $req->execute($tuple);
		}

		// Fonction pour ajouter un objet dans notre sac

		function addObject($id_aventurier, $id_objet) {
			$req = self::$bdd->prepare("INSERT INTO Sac (id_aventurier, id_objet) VALUES (:id_aventurier, :id_objet)");
			$tuple = array(":id_aventurier" => intval($id_aventurier[0]), ":id_objet" => $id_objet);
			$result = $req->execute($tuple);
		}

		// Fonction pour savoir quel texte est à afficher en fonction de la page sur laquelle l'utilisateur se trouve

		function page($page) {
			switch ($page) {
				case "1":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous sortez de l’auberge d’un air déterminé. Après avoir traversé des sentiers et marais dont vous n’aviez jamais entendu parler, vous arrivez vers Santytre, la ville mentionnée dans le contrat. Un informateur est censé vous y attendre afin de vous guider vers ces ruines. </p>
						<p class=\"text-center w-75 mx-auto\"> Dès l’entrée du village vous remarquez une foule ainsi que de l’agitation qui en découle. Vous trouvez cela très étrange et, regardant du haut du sentier la scène avec un peu plus de précision, vous remarquez que la foule n’est constituée d’aucun humain. </p>
						<a href=\"history.php?id=2&page=2\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous allez dans la foule </p></a>
						<a href=\"history.php?id=2&page=16\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous contournez vers l’ouest de la ville </p></a>
						<a href=\"history.php?id=2&page=17\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous contournez vers l’est de la ville </p></a>
					";
					break;
				case "2":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous partez donc vers l’entrée du village, au milieu de cette cohue de personnes et essayez d’entrer quand tout d’un coup une main se pose sur votre épaule. Vous vous retournez et distinguez un visage disgracieux, celui d’un garde qui n’a pas l’air de vouloir jouer avec vous. </p>
						<p class=\"text-center w-75 mx-auto\"> Il vous agresse en vous empêchant d’entrer dans la ville. Il vous demande votre nom, race et provenance. </p>
						<p class=\"text-center w-75 mx-auto\"> Vous commencez un peu à comprendre la situation en regardant le comportement du garde qui vous regardait avec mépris. Ils font du tri par rapport aux races non humaines. </p>
						<a href=\"history.php?id=2&page=3\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous lui dites ce qu’il veut savoir </p></a>
						<a href=\"history.php?id=2&page=36\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous l’agrippez en retour avec un regard noir </p></a>
						<a href=\"history.php?id=2&page=37\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous refusez de lui répondre </p></a>
					";
					break;
				case "3":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Après lui avoir dit ce qu’il voulait savoir, le garde semble perplexe et après une longue discussion avec un autre garde tout aussi méprisant, il vous laisse rentrer dans la ville. </p>
						<a href=\"history.php?id=2&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Entrer dans la ville </p></a>
					";
					break;
				case "4":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous pénétrez enfin dans la ville. Vous cherchez l’auberge, dénommée Oqueinon, demandant aux passants s’ils en avaient connaissance. En courant vous vous trouvez sans faire attention dans une ruelle bondée, sans aucun repère, poussé par des gens. Vous décidez donc de vous écarter de la foule et c’est alors que vous remarquez le panneau d’une auberge au loin. Vous décidez d’y aller. Heureusement, c’était la taverne que vous recherchiez. Malheureusement, c’est le chaos total à l’intérieur. </p>
						<p class=\"text-center w-75 mx-auto\"> Vous essayez tant bien que mal de vous frayer un chemin jusqu’au comptoir quand tout un coup vous tombez nez à nez avec une silhouette encapuchonnée </p>
						<a href=\"history.php?id=2&page=5\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Parler avec cette personne </p></a>
						<a href=\"history.php?id=2&page=39\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ignorer cette personne </p></a>
					";
					break;
				case "5":
					echo "
						<p class=\"text-center w-75 mx-auto\"> N’ayant aucune information à propos de votre informateur, vous vous décidez à lui parler. </p>
						<p class=\"text-center w-75 mx-auto\"> “Je viens de la guilde Pad'horijinallyté, je suis à la recherche d’un informateur, suite à la mission qui a été posté pour enquêter sur des ruines Auriez-vous des renseignements à ce sujet ?.” </p>
					";

					$chance = rand(4, 10);

					if ($this->getStats()[0][3] > $chance || $this->getStats()[0][2] > 7) {
						echo "
							<p class=\"text-center w-75 mx-auto\"><i> “Heureusement pour vous, je suis la personne que vous recherchez. Je commençais à m’ennuyer à force d’attendre !” </i></p>
							<p class=\"text-center w-75 mx-auto\"><i> “Ah je …” </i></p>
							<p class=\"text-center w-75 mx-auto\"><i> “Bon ce n’est pas tout mais on à une petite trotte à faire avant d’arriver au lieu de notre affaire. je vous expliquerai en chemin” </i></p>
							<a href=\"history.php?id=2&page=6\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Partir en direction des ruines </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"><i> “Je suis la fusion de Goku et Vegeta, je suis GOGETA !” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Vous comprenez très rapidement que cet homme est totalement ivre, et vous décidez de continuer votre chemin, sans vous arrêter. En vous frayant un chemin à travers la cohue, vous remarquez un homme, isolé dans un coin, une bière à la main. </p>
							<p class=\"text-center w-75 mx-auto\"> Ne sachant pas vers qui d’autre vous tourner, vous décidez d’aller à sa rencontre. Une fois à sa hauteur, vous entamez la discussion : </p>
							<p class=\"text-center w-75 mx-auto\"><i> “Je viens de la guilde Pad'horijinallyté, je suis à … ” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Dès qu’il entendit le nom de votre guilde, il s’exclama : <i> “C’est bien moi ! C’est bien moi ! Asseyez-vous, je vous en prie.” </i></p>
							<p class=\"text-center w-75 mx-auto\"><i> “Du coup, comment va se dérouler l’enquête ? Je n’ai eu que peu de détails à ce propos sans plus de détails.” </i></p>
							<p class=\"text-center w-75 mx-auto\"><i> “Bien sur, bien sur. Voilà comment cela va se passer.” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Après de longues minutes de discussion, il vous explique qu’une fois arrivé sur place, vous devrez vous aventurer seul dans ces ruines pour y trouver un “trésor”, dont il omet de vous dire son nom ou son rôle. La seule chose que vous savez est qu’il sera remarquable entre tous. </p>
							<p class=\"text-center w-75 mx-auto\"> Une fois sa bière finie, l’informateur et vous partez, en direction de ces ruines. </p>
							<a href=\"history.php?id=2&page=18\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Se diriger vers les ruines </p></a>
						";
					}
					break;
				case "6":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Une fois la taverne quittée, vous prenez la route, direction les fameuses ruines. En chemin, votre informateur vous raconte les légendes et mystères entourant les ruines, comme quoi une présence maléfique y sommeille, où l’herbe flétrit et les animaux ont peur d’approcher. </p>
						<p class=\"text-center w-75 mx-auto\"> Plusieurs questions vous viennent à l’esprit : </p>
						<a href=\"history.php?id=2&page=20\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui demander de vous parler plus en détail de cette fameuse “présence” </p></a>
						<a href=\"history.php?id=2&page=21\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui demander de parler des ruines plus en détail </p></a>
						<a href=\"history.php?id=2&page=22\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui parler de vous </p></a>
						<a href=\"history.php?id=2&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ne rien lui dire </p></a>
					";
					break;
				case "7":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vu que vous ne lui posez pas de questions, il s’arrête alors de parler et vous continuez votre chemin dans le silence. Vous vous décidez à prêter plus attention à la végétation devant vous. </p>
						<p class=\"text-center w-75 mx-auto\"> Vous marchez actuellement sur un sentier, bordé par de grands chênes. Vous entendez les oiseaux gazouiller mais vous n’arrivez pas à les discerner, à cause de la dense végétation. La forêt à l’air bien vivante. </p>
					";

					if ($this->getStats()[0][2] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Cependant, quelque chose ne tourne pas rond. Sur le papier de la quête, il était indiqué que c’était un lieu où l’herbe flétrissait et les animaux prenaient la fuite, contrairement à ce que vous voyez actuellement. </p>
							<p class=\"text-center w-75 mx-auto\"> Des soupçons à propos de cet informateur s’éveillent en vous, mais vous ne dites rien à ce sujet. </p>
						";
					}

					echo "
						<p class=\"text-center w-75 mx-auto\"> Au fur et à mesure que vous avancez, vous sentez que vous vous rapprochez petit à petit des ruines car un certain mal-être commence à vous envahir. Vous commencez à voir des pierres éparpillées ci et là, preuve d’anciennes constructions, que le temps n’a pas épargné. </p>
					";

					if ($this->getStats()[0][1] < 6) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous n’êtes pas habitué à faire de longues marches comme celle-ci. Exténué, vous décidez de vous asseoir sur une pierre pour reprendre votre souffle. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous voyez votre informateur un peu exaspéré de vous voir prendre une pause, ce que vous ne relevez pas. Après quelques minutes de repos vous faisant le plus grand bien, vous reprenez la route avec lui. </p>
						";
					}

					echo "
						<p class=\"text-center w-75 mx-auto\"> Une fois arrivée aux ruines, votre informateur vous amène devant un long escalier de pierre s’enfonçant dans les ténèbres. Il vous donne une torche ainsi que des allumettes, vous explique qu’il va vous attendre sous un arbre, et s’en va. </p>
						<a href=\"history.php?id=2&page=23\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Explorer les alentours </p></a>
						<a href=\"history.php?id=2&page=8\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Descendre l’escalier </p></a>
					";
					break;
				case "8":
					$chance = rand(4, 10);

					echo "
						<p class=\"text-center w-75 mx-auto\"> Prenant votre courage à deux mains, vous allumez votre torche et entamez la descente de cet escalier, s’enfonçant toujours plus dans les ténèbres. Les minutes passent, vous continuez de descendre les marches, toujours plus profond. Vous ne voyez qu'à quelques mètres devant vous, avec pour seule source de lumière votre torche. </p>
						<p class=\"text-center w-75 mx-auto\"> Enfin ! Vous atteignez le bas de l’escalier, heureux de ne plus avoir à descendre de marche. A votre grand désarroi, l’escalier débouche sur un immense corridor. Une pensée vous traverse l’esprit : votre informateur doit se la couler douce en haut ! </p>
						<p class=\"text-center w-75 mx-auto\"> Vous commencez à avancer quand soudain, un frisson vous parcourt l’échine. Vous ignorez si cela est dû au froid souterrain ou si c’est un frisson de terreur, dû à la présence maléfique, dont la pression est de plus en plus intense. Après quelques minutes, vous arrivez à un croisement entre 3 couloirs. </p>
					";

					if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Soudain, un courant d’air glacé se met à souffler violemment et éteint votre torche ! Cependant, grâce à cela, vous discernez une lueur pâle émanant de la gauche. De plus, comme par magie, votre torche se rallume. Vous empruntez le chemin de gauche et continuez votre route. </p>
							<a href=\"history.php?id=2&page=9\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Se diriger vers la lumière </p></a>
						";
					} else {
						echo "
							<a href=\"history.php?id=2&page=9\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Se diriger vers la gauche </p></a>
							<a href=\"history.php?id=2&page=24\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Se diriger vers la droite </p></a>
						";
					}
					break;
				case "9":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Au fur et à mesure de votre marche, vous constatez que votre torche n’est presque plus utile car une lumière commence à éclairer de plus en plus le chemin. </p>
						<a href=\"history.php?id=2&page=25\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ranger votre torche </p></a>
						<p class=\"text-center w-75 mx-auto\"> Vous débouchez sur une grande salle, d’une beauté à vous couper le souffle. </p>
						<p class=\"text-center w-75 mx-auto\"> A votre gauche, vous remarquez un grand bassin, rempli d’eau cristalline. Des petits poissons de toutes les couleurs y nagent, avec des nénuphars et des fleurs de lotus, le tout surplombé d’une cascade. </p>
						<p class=\"text-center w-75 mx-auto\"> Sur votre droite, vous distinguez de petits arbustes avec des fruits de toutes les couleurs accrochés aux branches, tous plus alléchants les uns que les autres. </p>
						<p class=\"text-center w-75 mx-auto\"> Pour finir, une allée bordée de colonnes de marbres striées s’étend devant vous, débouchant sur un pont en granit marin à l’apparence plus ou moins solide. </p>
						<a href=\"history.php?id=2&page=26\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Observer les petits poissons et la beauté de la cascade </p></a>
						<a href=\"history.php?id=2&page=27\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Goûter aux fruits </p></a>
						<a href=\"history.php?id=2&page=10\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Traverser le pont </p></a>
					";
					break;
				case "10":
					$chance = rand(4, 10);

					echo "
						<p class=\"text-center w-75 mx-auto\"> Charmé par ce décor idyllique mais conscient que vous avez une mission à accomplir, vous décidez de ne pas trop vous attardez sur le paysage et continuez votre chemin, en empruntant le pont. Arrivé à la moitié, des fissures que vous n’aviez pas remarqué jusque là se mirent à lézarder le pont. Par peur, vous commencez à courir aussi vite que possible pour atteindre l’arrivée. </p>
					";

					if ($this->getStats()[0][3] > $chance || $this->getStats()[0][1] > 6) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous courez, courez et par chance, vous réussissez à traverser le pont, avant que celui ne s’effondre dans un fracas assourdissant. Essoufflé, mais heureux d’être en vie, vous vous adossez à une des colonnes bordant l’allée pour reprendre votre souffle. Après quelques instants, vous vous sentez bien mieux et reprenez votre route. </p>
							<p class=\"text-center w-75 mx-auto\"> Au fur et à mesure que vous avancez, vous voyez la lumière éclairant la caverne où vous étiez précédemment prendre des teintes rouges violacées. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous percevez des murmures, comme des voix perdues dans le vent, vous demandant de vous rapprocher. </p>
							<a href=\"history.php?id=2&page=11\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Trouver la source des voix et vous rapprocher de la lumière </p></a>
							<a href=\"history.php?id=2&page=29\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ne pas écouter les voix et rebrousser chemin </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous avez beau courir de toute vos forces, la fatigue accumulée ces derniers temps font que vous ne courez pas assez vite. Le sol se brise sous vos pieds, et vous commencez à chuter de plus en plus vite. La dernière chose que vous verrez avant de vous écraser sur le sol est votre informateur, de l’autre côté du pont, un sourire malicieux aux lèvres. </p>
							<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
						";
					}
					break;
				case "11":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Plus vous vous approchez, plus les murmures se font intenses, oppressants. Puis vous arrivez devant un bassin, cette fois-ci bien plus grand que les autres. Celui-ci est remplie d’une eau violette-verte, comme empoisonnée par quelque chose. Mais ce n’est pas la première chose qui vous a frappé. C’est la créature y reposant en son centre ! </p>
						<p class=\"text-center w-75 mx-auto\"> Cette créature est digne de vos plus grands cauchemars. Grand amas de chair et de tentacules acérées, avec 4 yeux chacun d’une couleur différente et une énorme bouche remplie de dents aiguisées, vous y êtes : le combat final approche. Vous ressentez au fond de vous que le moindre de ces coups peut mettre fin à votre quête. </p>
						<a href=\"history.php?id=2&page=32\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Foncer tête baissée sur la créature </p></a>
						<a href=\"history.php?id=2&page=12\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Observer les alentours avant d’attaquer le monstre </p></a>
						<a href=\"history.php?id=2&page=28\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fuir </p></a>
					";
					break;
				case "12":
					$chance = rand(4, 10);

					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous regarder autour de vous, avec l’espoir de trouver quelque chose pouvant vous aider à terrasser cette créature. </p>
					";

					if ($this->getStats()[0][2] > 10 || $this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous remarquez en observant le bassin que celui-ci contient 4 pierres aux lueurs pâles, situées aux points cardinaux. Un éclair de génie vous traverse : les yeux de la chose ont la même couleur que ces pierres ! </p>
							<a href=\"history.php?id=2&page=13\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Tenter de briser les pierres </p></a>
							<a href=\"history.php?id=2&page=32\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Foncer tête baissée sur la créature </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Votre regard a beau parcourir la caverne, rien n’y fait, vous ne trouvez rien. Cependant, vous sentez le monstre commencer à agiter ses tentacules, prêt à vous attaquer. </p>
							<a href=\"history.php?id=2&page=30\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Continuer de chercher </p></a>
							<a href=\"history.php?id=2&page=32\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Attaquer le monstre de plein fouet </p></a>
							<a href=\"history.php?id=2&page=28\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fuir </p></a>
						";
					}
					break;
				case "13":
					$chance = rand(4, 10);

					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous commencez à vous approcher d’une des pierres. Vous abattez votre arme et la briser d’un seul coup. Le monstre poussa un cri de douleur, et vous remarquez à ce moment là qu’un de ses yeux n’était plus valide. Celui-ci était de la même couleur que la pierre brisée ! La créature ne se laissant pas faire, celui-ci abat une de ses tentacules sur vous. </p>
					";

					if ($this->getStats()[0][1] > 8 || $this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Votre bonne étoile ne vous abandonne jamais, vous réussissez à esquiver de justesse la tentacule. Celle-ci s’abat à côté de vous, fissurant le sol. Vous courrez vers la pierre la plus proche de vous, et celle-ci subit le même sort que la précédente. Le monstre hurla de plus belle. Pareil pour la 3ème. </p>
							<p class=\"text-center w-75 mx-auto\"> Le monstre, fou de rage est blessé, se mit à agiter ses tentacules dans tous les sens. </p>
						";

						$chance = rand(4, 10);

						if ($this->getStats()[0][3] > $chance) {
							echo "
								<p class=\"text-center w-75 mx-auto\"> Par mégarde, avant de briser la dernière pierre, vous n’avez pas pris en compte que les tentacules pouvait vous atteindre. Une des tentacules de la créature vous touche, vous projetant avec une force inouïe sur une des colonnes entourant le bassin. Vous vous écrasez dessus, et mourez sur le coup. </p>
								<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
							";
						} else {
							echo "
								<p class=\"text-center w-75 mx-auto\"> Grâce aux pierres brisées, le monstre ne sait pas où frapper et ne vous touche pas. Vous arrivez devant la dernière pierre. Au moment ou vous briser celle-ci, le monstre poussa un dernier hurlement, avant de se dissoudre dans le bassin. Heureux de votre victoire, vous entendez cependant un cri de désespoir. </p>
								<p class=\"text-center w-75 mx-auto\"><i> “NOOOOOOOOOOOOOOON !!!”.  </i></p>
								<p class=\"text-center w-75 mx-auto\"> Vous vous retournez et voyez l’informateur, courant vers vous, une sorte de lourde masse à la main. Vous ressentez une haine profonde émaner de lui. </p>
								<a href=\"history.php?id=2&page=14\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Combattre l’informateur </p></a>
								<a href=\"history.php?id=2&page=33\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Tenter de le raisonner </p></a>
							";
						}
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Les pointes acérées de celle-ci s’enfonce dans votre chair. Une douleur comparable à aucune autre s’élance dans tout votre corps. Sous le choc, vous tombez à la renverse, la colonne vertébrale brisée. Ne pouvant plus bouger, le monstre enroule une de ses tentacules autour de vous, puis votre dernière image sera celle de vous devant une bouche béante, prêt à ne faire qu’une bouchée de vous. </p>
							<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
						";
					}
					break;
				case "14":
					if ($this->getStats()[0][0] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> L’informateur se rue sur vous, masse à la main. Il tente de vous asséner un coup à la tête mais vous le parez sans problème. Puis, usant de votre force, vous ripostez d’un coup sec. Celui-ci lâche son arme et trébuche. Vous vous retrouvez ainsi debout, lui allongé à plat ventre devant vous. </p>
							<p class=\"text-center w-75 mx-auto\"><i> “As-tu une dernière parole avant de mourir, informateur ?” </i></p>
							<p class=\"text-center w-75 mx-auto\"><i> “Tuez moi si vous le voulez, vous m’avez ôté ma raison de vivre … Vous avez tué mon seul compagnon !” </i></p>
							<p class=\"text-center w-75 mx-auto\"><i> “Compagnon avec un monstre … Ta vie devait être bien triste, mon cher…” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Une fois ces mots dit, vous assénez un coup sec sur sa nuque, ce qui le tue instantanément. Vous sortez un mouchoir de votre poche pour nettoyer votre lame, souillé du sang d’un bâtard, avant de la ranger. </p>
							<p class=\"text-center w-75 mx-auto\"> Cependant, maintenant que votre informateur est mort, vous ne savez pas du tout comment finir votre mission. Vous vous rappelez cependant qu’il y avait un trésor à trouver. </p>
							<a href=\"history.php?id=2&page=34\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller la dépouille de l’informateur </p></a>
							<a href=\"history.php?id=2&page=15\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller la dépouille de la créature </p></a>
						";
					} else if ($this->getStats()[0][1] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> L’informateur se rue sur vous. Cependant, celui-ci à du mal à manier son arme. Vous remarquez qu’il n’est pas très doué au combat. Esquivant sans aucun problème ses coups, vous attendez que celui-ci se fatigue petit à petit. </p>
							<p class=\"text-center w-75 mx-auto\"> Ne pouvant à peine soulever son arme après, celui-ci s’effondre, épuisé comme jamais. </p>
							<p class=\"text-center w-75 mx-auto\"> Sachant que sa dernière heure est venue, celui-ci se met à murmurer dans sa barbe : </p>
							<p class=\"text-center w-75 mx-auto\"><i> “Cela n’aurait pas dû se passer comme ça… Pourquoi ...” </i> , avant de s’évanouir. </p>
							<p class=\"text-center w-75 mx-auto\"> Cependant, maintenant que votre informateur est dans les vapes, vous ne savez pas du tout comment finir votre mission. Vous vous rappelez cependant qu’il y avait un trésor à trouver. </p>
							<a href=\"history.php?id=2&page=34\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller le corps évanoui de l’informateur </p></a>
							<a href=\"history.php?id=2&page=15\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller la dépouille de la créature </p></a>
						";
					} else if ($this->getStats()[0][2] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> L’informateur se rue sur vous. Vous avez eu le temps de voir que le sol était sablonneux. Voyant que votre adversaire n’est pas très à l’aise avec sa lourde masse, vous décidez de feindre une chute, lui laissant une opportunité pour frapper. Celui-ci, n’ayant pas d’expérience en combat, ne remarque pas qu’il s’agit d’un piège. Vous lui jetez du sable à la figure, ce qui a pour effet de lui faire rater son coup. Vous lui assénez un coup dans la jambe, ce qui a pour effet de le déstabiliser, avant de le maîtriser. </p>
							<p class=\"text-center w-75 mx-auto\"> Celui-ci, vraiment faible, dû à la longue traversée que vous avez dû endurer, s’évanouit sans pouvoir prononcer un seul mot. </p>
							<p class=\"text-center w-75 mx-auto\"> Maintenant que votre informateur est dans les vapes, vous ne savez pas du tout comment finir votre mission. Vous vous rappelez cependant qu’il y avait un trésor à trouver. </p>
							<a href=\"history.php?id=2&page=34\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller le corps évanoui de l’informateur </p></a>
							<a href=\"history.php?id=2&page=15\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller la dépouille de la créature </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> L’informateur se rue sur vous. Il vous assène des coups, vous les parez sans trop de problème. Idem pour lui. Cependant, votre expérience en combat fait que vous avez le dessus assez rapidement, et vous maîtrisez votre adversaire en le mettant à terre. </p>
							<p class=\"text-center w-75 mx-auto\"> Celui-ci, par énervement et dépit, se met à vous insulter en vous reprochant d’avoir tué son seul compagnon. </p>
							<p class=\"text-center w-75 mx-auto\"> Vu que vous n’aimez pas les gens provocateurs, vous lui assénez un coup histoire que celui-ci s’évanouisse simplement, sans le tuer. </p>
							<p class=\"text-center w-75 mx-auto\"> Maintenant que votre informateur est dans les vapes, vous vous rendez compte d'un détail que vous n’avez pas pris en compte : vous ne savez pas du tout comment finir votre mission. Vous vous rappelez cependant qu’il y avait un trésor à trouver. </p>
							<a href=\"history.php?id=2&page=34\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller le corps évanoui de l’informateur </p></a>
							<a href=\"history.php?id=2&page=15\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller la dépouille de la créature </p></a>
						";
					}
					break;
				case "15":
					$id_aventurier = $this->getIdAventurier();
					$this->addObject($id_aventurier, 1);

					echo "
						<p class=\"text-center w-75 mx-auto\"> En vous rapprochant du bassin, vous remarquez que l’eau est redevenu bleu. Vous distinguez une lumière au fond du bassin. </p>
						<p class=\"text-center w-75 mx-auto\"> Après avoir galéré un petit peu, vous arrivez à récupérer cet objet. Vous remarquez qu’il s’agit d’une boucle d’oreille, une boule accroché à une petite chaîne métallique. </p>
					";
					
					$chance = rand(4, 10);

					if ($this->getStats()[0][3] > $chance) {
						$this->addObject($id_aventurier, 6);

						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous décidez de regarder plus en détail cette boucle d’oreille. En la portant à votre oeil, vous discernez un autre éclat, cette fois-ci plus pâle, que vous n’auriez certainement pas remarqué si vous n’aviez pas regardé à travers les mailles de la chaîne. </p>
							<p class=\"text-center w-75 mx-auto\"> Curieux, vous décidez d’aller regarder la source de cet éclat. En fouillant dans les buissons, vous distinguez une sorte de médaillon. Sur celui-ci, un blason y est inscrit, avec une phrase en dessous : </p>
							<p class=\"text-center w-75 mx-auto\"><i> “Το Gogeta είναι καλύτερο από τη Vegetto” </i></p>
							<p class=\"text-center w-75 mx-auto\"> Ne comprenant pas encore ce que ce texte signifie ni l’utilité du médaillon, vous décidez de le ranger dans votre poche. </p>
						";
					}

					echo "
						<p class=\"text-center w-75 mx-auto\"> Une fois ramassé, vous décidez de prendre le chemin du retour, votre mission normalement accomplie. Vous retrouvez sans trop de mal le chemin du retour, malgré le pont détruit, et ressortez à la surface. Un soleil radieux est en train de se lever, inondant de lumière le chemin devant lui. </p>
						<p class=\"text-center w-75 mx-auto\"> Vous n’avez pas vu le temps passer, on est déjà le lendemain ! Vous prenez le chemin du retour, avec hâte. Une fois de retour à votre guilde, vous décidez d’aller voir la tavernière, afin d’avoir plus de renseignements à propos de cet homme et de la mission. Celle-ci vous répondit ne pas avoir eu vent d’une telle mission, ni d’un homme la lui ayant apporté. </p>
						<p class=\"text-center w-75 mx-auto\"> Des questions pleins la tête, vous décidez de mettre cette information de côté et retourner vaquer à vos occupations, prêt à entreprendre si l’envie y est, une nouvelle quête. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la liste des aventures </p></a>
					";

					if ($this->getHistoire()[0] <= 2) {
						$this->histoireActuelle();
					}
					break;
				case "16":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous vous éloignez de cette foule et essayer de contourner la ville. Vous allez vers l’ouest et manque de bol, il n’y a pas d’entrée de ce côté là. </p>
						<a href=\"history.php?id=2&page=17\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Continuer à contourner la ville </p></a>
						<a href=\"history.php?id=2&page=2\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Revenir à l’entrée principale </p></a>
					";
					break;
				case "17":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous décidez de contourner et vous trouvez à l’Est de la ville une petite entrée totalement déserte. </p>
					<a href=\"history.php?id=2&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Entrer dans la ville </p></a>
					";
					break;
				case "18":
					$chance = rand(4, 10);

					if ($this->getStats()[0][2] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous sentez que quelque chose ne tourne pas rond à propos de votre informateur. En effet, celui-ci, au simple nom de votre guilde, a compris qui vous étiez, sans demander plus de détails. Vous vous décidez à le suivre, tout en restant sur vos gardes. </p>
						";
					}

					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous quittez la taverne, direction ces fameuses ruines. A la sortie de la ville, vous empruntez un chemin assez sombre, tandis que votre interlocuteur continue de vous parler, mais bizarrement pas des ruines mais de tout et de rien. </p>
					";

					if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Cependant, un détail attire votre attention : votre informateur jette de furtifs coups d’oeil derrière lui. C’est à ce moment que vous remarquez que vous êtes suivis d’assez loin, par 3 hommes cagoulés, assez costauds. </p>
							<p class=\"text-center w-75 mx-auto\"> Bizarrement, depuis que vous les avez regardé, l’informateur ne jette plus aucun coup d’oeil, et continue de déblatérer sur la pluie et le beau temps. Quelque chose ne tourne pas rond. </p>
							<p class=\"text-center w-75 mx-auto\"> Une fois la ville hors de vue, vous voyez les 3 hommes se rapprocher de plus en plus de vous. C’est un traquenard ! L’informateur se jette sur vous, les 3 hommes presque à votre portée.  </p>
							<p class=\"text-center w-75 mx-auto\"> Une fois les ennemis battus, vous leur prenez leurs bourses, ce qui vous fait un joli pactole de 100 pièces d’or, certainement dû au fait qu’ils avaient déjà détroussés des gens, et retourner à la ville trouver cette fois-ci le vrai informateur. </p>
							<a href=\"history.php?id=2&page=19\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retourner dans la ville </p></a>
						";	
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous continuez d’écouter l’homme raconter sa vie, ne vous doutant de rien. Quand soudain, vous ressentez une violente douleur à la tête et vous tombez par terre, sonné. </p>
							<p class=\"text-center w-75 mx-auto\"> Au moment ou vous reprenez conscience, vous vous estimez chanceux qu’il n’ait pas pris votre vie ! Malgré tout, il ne vous reste plus un sou ni aucun de vos objets car votre besace vous à été dérobée. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous décidez de retourner en ville, cette fois-ci en prenant plus de précautions. </p>
							<a href=\"history.php?id=2&page=19\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retourner dans la ville </p></a>
						";
					}
					break;
				case "19":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Une fois de retour en ville, vous décidez de vous rendre à la taverne, histoire d’attendre le vrai informateur. Vous vous asseyez à une table, bière à la main, et attendez. Des minutes passent, quand un homme s’assoit à votre table. Vous le reconnaissez : c’est l’homme ivre que vous avez croisé tout à l’heure ! </p>
						<p class=\"text-center w-75 mx-auto\"> Celui-ci vous explique que ces personnes l’ont saoulé jusqu’à plus soif, et ont pris son rôle. Il se met à vous expliquer plus en détail son rôle ainsi que le votre dans cette quête. Rassuré, vous lui faîtes confiance, prêt à reprendre votre route. </p>
						<a href=\"history.php?id=2&page=6\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Partir en direction des ruines </p></a>
					";
					break;
				case "20":
					echo "
						<p class=\"text-center w-75 mx-auto\"><i> “Pouvez-vous me parler plus en détail de cette fameuse force obscure ?” </i></p>
						<p class=\"text-center w-75 mx-auto\"><i> “Bien sur. Les gens du coin raconteraient que cette force à le pouvoir de prendre le contrôle de ton corps, t’incitant à faire des actions contre ton gré. Il paraîtrait qu’une fois que tu l’as entendu, tu es sous son joug et impossible de s’en défaire. Te voilà prévenu, aventurier !” </i></p>
						<p class=\"text-center w-75 mx-auto\"> Vous prenez bien en compte toutes ces informations, qui vous seront peut-être utile une fois le moment opportun. </p>
						<a href=\"history.php?id=2&page=21\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui demander de parler des ruines plus en détail </p></a>
						<a href=\"history.php?id=2&page=22\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui parler de vous </p></a>
						<a href=\"history.php?id=2&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ne rien lui dire </p></a>
					";
					break;
				case "21":
					echo "
						<p class=\"text-center w-75 mx-auto\"><i> “Auriez-vous des informations à propos de l’endroit vers lequel nous nous dirigeons ?” </i></p>
						<p class=\"text-center w-75 mx-auto\"><i> “Malheureusement, je n’ai que très peu d’informations à ce sujet. Je sais seulement que l’endroit vers lequel nous nous dirigeons se trouve en plein milieu d’une forêt, un endroit où l’herbe flétrit, les animaux ne vont pas malgré le lac qui s’y trouve pas loin. Des débris d’une ancienne civilisation y seraient aussi, preuve qu’avant ces terres étaient fertiles.” </i></p>
						<p class=\"text-center w-75 mx-auto\"> Vous prenez en compte ces informations, qui vous serviront surement au moment opportun. </p>
						<a href=\"history.php?id=2&page=20\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui demander de vous parler plus en détail de cette fameuse “présence” </p></a>
						<a href=\"history.php?id=2&page=22\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Lui parler de vous </p></a>
						<a href=\"history.php?id=2&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ne rien lui dire </p></a>
					";
					break;
				case "22":
					echo "
						<p class=\"text-center w-75 mx-auto\"><i> “Je ne sais pas comment cela va pour vous, mais de mon côté je suis heureux d’avoir un travail à accomplir. C’est la première quête que j’accepte. J’étais un peu stressé de rencontrer quelqu’un, mais ma passion pour la justice est vraiment plus forte que le reste ! En tout cas, …” </i></p>
						<p class=\"text-center w-75 mx-auto\"><i> “Pouvez-vous s’il vous plaît arrêter de parler de vous et vous concentrez un peu plus sur ce qui arrive ? Ce n’est pas à prendre à la rigolade. Vous n'êtes pas payé pour ça.” </i></p>
						<p class=\"text-center w-75 mx-auto\"> Sur ces mots cassants, vous n’osez plus parler, de peur d’offenser l’informateur. Votre chemin se continue donc en silence, sans que vous n'osiez prendre la parole. </p>
						<a href=\"history.php?id=2&page=7\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Ne rien dire </p></a>
					";
					break;
				case "23":
					$chance = rand(4, 10);

					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous commencez à fouiller les alentours des escaliers. Vous regardez par ci par là, sans trouver réellement grand chose. Vous regardez sous des fougères, entre 2 colonnes de pierre, dans les arbres, rien. Vous ne trouvez absolument rien. </p>
						<p class=\"text-center w-75 mx-auto\"> En regardant derrière vous, vous remarquez votre interlocuteur vous regarder, d’un air interrogateur, se demandant ce que vous faîtes. </p>
					";

					if ($this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Au moment ou vous rapprochez de l’escalier, un élément attire votre oeil : un mur en mosaïque représentant l’univers. Cependant, un carreau ne semble pas être à sa place. Vous décidez d’appuyer dessus, quand soudain, le mur se met à trembler. </p>
							<p class=\"text-center w-75 mx-auto\"> Une cavité se découvre à vous, révélant une petite bourse de 50 pièces d’or. Heureux de votre trouvaille, vous l’empochez, content de voir votre pactole augmenter. </p>
						";
					}

					echo "
						<p class=\"text-center w-75 mx-auto\"> Sans plus attendre, car vous avez décelé son impatience, vous vous dirigez vers cet escalier. </p>
						<a href=\"history.php?id=2&page=8\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Descendre l’escalier </p></a>
					";
					break;
				case "24":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous commencez à avancer. L’air se fait de plus en lourd, de plus en plus dense. Un brouillard se met à s’élever du sol. Vous continuez d’avancer, persuadé que l’aura maléfique pressentie viens de ce chemin. </p>
						<p class=\"text-center w-75 mx-auto\"> Au bout d’un moment, vous ne discernez quasiment plus la lueur de votre lanterne tellement le brouillard est dense. Avançant à tâtons, vous continuez, priant pour sortir de ce pétrin. Soudain, votre pied glisse sur une pierre et vous tomber par terre … du moins vous pensez toucher le sol, mais … votre chute vous semble longue … Anormalement longue … Vous êtes en train de tomber dans le vide ! </p>
						<p class=\"text-center w-75 mx-auto\"> Malgré toutes vos tentatives, vous n’arrivez pas à vous raccrocher à quelque chose, et vous vous écrasez violemment au sol, vos entrailles badigeonnant les murs d’une couleur rougeâtre. La brume vous encercle, c’en est fini de vous. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "25":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Après avoir rangé votre torche, vous continuez d’avancer vers cette lumière. Puis, vous ressentez une certaine chaleur, se faisant de plus en plus forte. Vous vous évanouissez, en vous rendant compte que la torche que vous avez rangé n’était pas éteinte. Quel mort stupide … </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "26":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous vous approchez un peu plus de la fontaine, pour admirer ces poissons de toutes les couleurs. L’eau est vraiment translucide, comme si les poissons nageant dedans étaient en train de voler. Après tout ce que vous avez traversé, un endroit idyllique dans ce lieu semble invraisemblable. </p>
						<p class=\"text-center w-75 mx-auto\"> D’une beauté irréelle, le bruit de la cascade mêlé à la faune et la flore vous laissent bouche bée. </p>
						<p class=\"text-center w-75 mx-auto\"> Reprenant vos esprits, vous vous décidez à revenir ici, une fois votre quête finie, pour y étudier plus en détail ce lieu. </p>
						<a href=\"history.php?id=2&page=27\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Goûter aux fruits </p></a>
						<a href=\"history.php?id=2&page=10\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Traverser le pont </p></a>
					";
					break;
				case "27":
					echo "
						<p class=\"text-center w-75 mx-auto\"> D’une curiosité insatiable, vous ne pouvez vous empêcher de goûter à ces fruits. Vous commencez par un fruit rouge pétant, ressemblant à une fraise. Le goût est indescriptible : la seule chose que vous pouvez dire est qu’il est délicieux ! </p>
						<p class=\"text-center w-75 mx-auto\"> Votre appétit se fait de plus en plus grand et vous décidez d’en reprendre un, puis un autre, jusqu’à tous les manger. </p>
						<p class=\"text-center w-75 mx-auto\"> D’un coup, un mal de ventre intervient, des maux de têtes suivis de malaise vous font dégobiller. Cependant, rien n’y fait : les fruits étaient empoisonnés ! Votre mère vous avait pourtant toujours dit de ne pas manger ce qui était inconnu. </p>
						<p class=\"text-center w-75 mx-auto\"> Une mort qui aurait pu être évitée si vous aviez su retenir votre curiosité. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "28":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Prenant peur par l’immondice se trouvant devant vous, vous rebroussez chemin. La quête : peu importe ! Votre survie est prioritaire !  </p>
						<p class=\"text-center w-75 mx-auto\"> Vous commencez à courir de toutes vos forces quand vous trébuchez, à cause d’une pierre, sortant du sol. Au moment ou vous vous relevez, une violente douleur sur l’arrière de votre crâne parcourt tout votre corps. L’évanouissement est quasiment instantanée. La seule chose que vous entrapercevez avant de sombrer totalement est votre informateur, vous traînant vers la créature, prête à ne faire qu’une bouchée de vous. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "29":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Arrivé au pont, vous constatez que la distance séparant les 2 bords est trop grande pour être franchie d’un bond. En vous approchant du bord, vous tentez de trouver un chemin quand soudain, deux mains se posent sur votre dos et vous poussent ! </p>
						<p class=\"text-center w-75 mx-auto\"> Vous tombez dans la faille, rejoignant à toute vitesse les débris du pont, avec une image gravée en tête que vous emporterez dans l’au delà : l’image de votre informateur, un sourire malicieux aux lèvres. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "30":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous continuez de chercher, persuadé qu’un secret se trouve ici, vous permettant ainsi de vaincre le monstre. Cependant, lui n’allait pas rester sans rien faire. Perdu dans vos pensées, vous n’avez pas prêté attention au fait que celui-ci pourrait vous attaquer. Il abat sa tentacule sur vous. Les pointes acérées de celle-ci s’enfonce dans votre chair. Une douleur comparable à aucune autre s’élance dans tout votre corps. </p>
						<p class=\"text-center w-75 mx-auto\"> Sous le choc, vous tombez à la renverse, la colonne vertébrale brisée. Ne pouvant plus bouger, le monstre enroule une de ses tentacules autour de vous, puis votre dernière image sera celle de vous devant une bouche béante, prêt à ne faire qu’une bouchée de vous. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "31":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous rebroussez chemin, persuadé que c’est un piège devant vous. De plus, les mots de l’informateur vous reviennent à l’esprit : </p>
						<p class=\"text-center w-75 mx-auto\"><i> “Les murmures entendus par les villageois avaient pour but de posséder leurs corps afin de les contrôler.” </i></p>
						<p class=\"text-center w-75 mx-auto\"> Cependant, un détail vous vient à l’esprit : si votre informateur est au courant pour les murmures, cela signifie qu’il est venu ici et qu’il est au courant ! Le sang ne fait qu’un tour dans vos veines : vous vous êtes fait manipulé. </p>
						<a href=\"history.php?id=2&page=29\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Revenir en arrière pour vous venger sur l’informateur </p></a>
						<a href=\"history.php?id=2&page=11\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Trouver la source des murmures avant </p></a>
					";
					break;
				case "32":
					if ($this->getStats()[0][0] > 10) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous avez confiance en votre force. Malgré l’eau semblant s’accrocher à vous pour vous ralentir, vous parvenez à esquiver ou du moins contrer tous les coups de tentacule de la créature. Une fois à sa portée, vous assenez un violent coup, qui a pour but de lui faire une longue entaille. Cependant, celle-ci se referme plus vite que prévu. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous continuez d’asséner des coups, coupant tentacules quand soudain vous constatez une chose : durant votre pluie de coup, les blessures proches des yeux n’ont pas l’air de cicatriser. </p>
							<p class=\"text-center w-75 mx-auto\"> Profitant d’une ouverture, vous commencez à vous acharner sur ces yeux. Vous en crevez un, puis un autre … pour au final tous les crever ! </p>
							<p class=\"text-center w-75 mx-auto\"> Après un dernier hurlement de douleur, le monstre commença à se dissoudre dans le bassin. Heureux de votre victoire, vous entendez cependant un cri de désespoir. </p>
							<p class=\"text-center w-75 mx-auto\"><i> “NOOOOOOOOOOOOOOON !!!”. </i></p>
							<p class=\"text-center w-75 mx-auto\"> Vous vous retournez et voyez l’informateur, courant vers vous, une sorte de lourde masse à la main. Vous ressentez une haine profonde émaner de lui. </p>
							<a href=\"history.php?id=2&page=14\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Combattre l’informateur </p></a>
							<a href=\"history.php?id=2&page=1\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Tenter de le raisonner </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous avez confiance en votre force. Vous foncez tête baissée sur lui. Cependant, la première tentacule qui s’est abattu sur vous vous a fait comprendre la différence de niveau. Vous ne ferez absolument pas le poids. </p>
							<p class=\"text-center w-75 mx-auto\"> Vous tentez de ressortir du bassin, seulement l’eau s'agrippe à vous, ralentissant tous vos mouvements. La créature forme un courant, qui a pour direction sa bouche ! Aucune prise à l’horizon, vous vous sentez comme engloutie par sa bouche. Ne pouvant rien faire, vous réfléchirez à un autre moyen : foncer tête baissé n’est pas le meilleur des moyens ! </p>
							<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
						";
					}
					break;
				case "33":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous commencez à tenter de raisonner l’informateur mais rien n’y fait. Par chance, vous échappez à son premier coup de masse. Les prochains ne vous laisseront certainement pas la chance d’en sortir indemne. </p>
						<p class=\"text-center w-75 mx-auto\"> Vous sortez votre arme, prêt à vous battre. </p>
						<a href=\"history.php?id=2&page=14\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Combattre l’informateur </p></a>
					";
					break;
				case "34":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Sur lui, l’informateur n’avait quasiment rien, à part un papier avec écrit dessus : </p>
						<p class=\"text-center w-75 mx-auto\">
							<i> “Quentin, <br>
								Il faut que tu arrêtes ces actions. Elles te mèneront à ta perte. Ne les écoute plus. Tu ne te rends pas compte du mal que tu fais autour de toi. Arrête de nourrir ce monstre comme si ta vie en dépendait ! Un jour, si ce n’est pas lui qui te dévore, ce sera l’un des aventuriers qui te tuera quand il aura compris ce que tu fais. S’il te plaît, reviens nous. Reviens moi. <br>
								Ta femme qui t’aime”
							<i/>
						</p>
						<p class=\"text-center w-75 mx-auto\"> Sur ces mots touchants, vous replacez la lettre à son emplacement, faites une rapide prière et repartez. </p>
						<a href=\"history.php?id=2&page=15\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Fouiller la dépouille de la créature </p></a>
						<a href=\"history.php?id=2&page=35\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Partir </p></a>
					";
					break;
				case "35":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous décidez de prendre le chemin du retour, votre mission normalement accomplie. Vous retrouvez sans trop de mal le chemin du retour, malgré le pont détruit, et ressortez à la surface. Un soleil radieux est en train de se lever, inondant de lumière le chemin devant lui.  </p>
						<p class=\"text-center w-75 mx-auto\"> Vous n’avez pas vu le temps passer, on est déjà le lendemain ! Vous prenez le chemin du retour, avec hâte. Une fois de retour à votre guilde, vous décidez d’aller voir la tavernière, afin d’avoir plus de renseignements à propos de cet homme et de la mission. Celle-ci vous répondit ne pas avoir eu vent d’une telle mission, ni d’un homme la lui ayant apporté. </p>
						<p class=\"text-center w-75 mx-auto\"> Des questions pleins la tête, vous décidez de mettre cette information de côté et retourner vaquer à vos occupations, prêt à entreprendre si l’envie y est, une nouvelle quête. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "36":
					$chance = rand(4, 10);

					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous agrippez le garde et le menacez avec votre voix la plus grave. </p>
					";

					if (($this->getStats() > 6 && $this->getStats()[0][3] > $chance) || $this->getStats()[0][3] > $chance) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Le garde n’est plus aussi confiant et baisse les yeux. Vous levez le poing et à cet instant, il vous supplie de le laisser tranquille et vous invite avec un minimum de courtoisie à entrer dans la ville. </p>
							<a href=\"history.php?id=2&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Entrer dans la ville </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Le garde commence à s’énerver et vous montre les dents. Il commence à pointer son épée sous votre gorge et vous conseille de rebrousser chemin avant qu’il ne change d’avis. Vous regardez tout autour de vous et voyant le monde, vous prenez son conseil au pied de la lettre afin d’éviter des victimes collatérales dans la foule. </p>
							<a href=\"history.php?id=2&page=17\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous essayez de trouver un autre chemin </p></a>
						";
					}
					break;
				case "37":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Votre silence commence à impatienter le garde qui essaye d’arrêter quelqu’un qui essayait de passer à tout prix. Vous remarquez un moment d’inattention et essayez d’en profiter en tentant votre chance. </p>
					";

					if ($this->getStats()[0][1] > 8) {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous vous servez de la distraction créée pour passer discrètement l’entrée. </p>
							<a href=\"history.php?id=2&page=4\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Vous entrez dans la ville </p></a>
						";
					} else {
						echo "
							<p class=\"text-center w-75 mx-auto\"> Vous essayez de passer mais n’étant pas très agile vous vous cognez sur un autre garde qui avait compris votre petit manège. </p>
							<p class=\"text-center w-75 mx-auto\"> Content de sa trouvaille il appelle l’autre garde qui vous arrête et vous emmène en prison sans passer par la case départ. </p>
							<a href=\"history.php?id=2&page=38\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Prison de la ville </p></a>
						";
					}
					break;
				case "38":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Après avoir passé plusieurs jours dans cette prison sombre et lugubre, avec une odeur pestinentielle qui vous empêchait de dormir, vous êtes enfin relâché dans la ville comme si vous étiez un vagabond. Vous êtes énervé et fatigué. </p>
						<p class=\"text-center w-75 mx-auto\"> Vous savez que l’aventure a pris fin au moment où vous vous êtes fait arrêter. Vous voulez vous venger mais gardant votre âme d’aventurier, vous décider de ne pas faire attention aux gardes devant l’entrée de la ville et de rentrer à la guilde vous reposer et repartir de nouveau. </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				case "39":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous décidez d’ignorer cette personne à l’allure plus que louche et traînez dans l’auberge afin de trouver votre informateur. Après quelques heures vous vous demandez s'il était là ou si la mission était annulée. Vous vous demandez alors si la personne de tout à l’heure qui se trouve maintenant au comptoir pouvait être l’être que vous recherchez. </p>
						<a href=\"history.php?id=2&page=5\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Aller à la rencontre de la mystérieuse personne </p></a>
						<a href=\"history.php?id=2&page=40\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Quitter l’auberge </p></a>
					";
					break;
				case "40":
					echo "
						<p class=\"text-center w-75 mx-auto\"> Vous quittez l’auberge et  sur le chemin du retour, vous réfléchissez déjà aux autres aventures à faire. Vous êtes malheureusement déçu d’avoir perdu autant de temps pour arriver jusqu’ici mais vous ne perdez pas de temps ni de motivation car vous le savez, l’aventure c’est aussi cela ! </p>
						<a href=\"adventure.php\" class=\"linkToRedirect\"><p class=\"text-center w-75 mx-auto\"> Retour à la page des aventures </p></a>
					";
					break;
				default:
					break;
			}
		}
	}

	/* --- --- --- --- --- */

	$maPremièreHistoire = new Story2();

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
		$maPremièreHistoire->page($page);
	} else {
		header('Location: adventure.php');
	}
?>