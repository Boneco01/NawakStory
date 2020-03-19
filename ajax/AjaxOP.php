<?php

	include_once '../connexionBD.php';
	
	class AjaxOP extends ConnexionBD {

		function afficheDetailAventure($id_aventure) {
			$req = self::$bdd->prepare('SELECT * FROM aventure WHERE id_aventure = :id_aventure');
			$tuple = array(':id_aventure' => intval($id_aventure));
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			$echo = 
			"
				<h2 id=\"titreAventure\" class=\"pb-3 text-center\">
					". $tab[1] ."
				</h2>

				<div class=\"w-100 mx-auto row\" id=\"adventureSelect\">
					<div class=\"mt-2 text-center w-50 col m-0 p-0 mb-3\" id=\"adventureText\">
						<h3 class=\"text-center\"> Résumé de l'aventure </h3>
						<p id=\"resumeAventure\" class=\"mt-3 px-5\">
							". $tab[2] ."
						</p>
					</div>

					<div class=\"w-50 mx-auto col m-0 p-0\" id=\"adventureImg\">
						<img src=\"". $tab[3] ."\" class=\"w-75 position-absolute\">
						<a href=\"history.php?id=". $tab[0] ."\">
						<button class=\"w-25 position-absolute text-light\"> Commencer </button></a>
					</div>
				</div>
			";
			return $echo;
    	}

    	function afficheDetailObjetBoutique($id_objet) {
			$req = self::$bdd->prepare('SELECT * FROM objet WHERE id_objet = :id_objet');
			$tuple = array(':id_objet' => intval($id_objet));
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			$echo = 
			"
				<h2>". $tab[1] ."</h2>
				<img src=\"". $tab[2] ."\" alt=\"#\" class=\"mx-auto d-block\" style=\"width: 200px\">
				<p class=\"mx-auto d-block\">". $tab[4] ."</p>
				<button id=". $tab[0] ." class=\"boutonAchat mx-auto d-block\">Acheter : <span id=\"prix\"> ". $tab[3] ." </span></button>
			";
			return $echo;
    	}

    	function afficheDetailObjetSac($id_objet) {
			$req = self::$bdd->prepare('SELECT * FROM objet WHERE id_objet = :id_objet');
			$tuple = array(':id_objet' => intval($id_objet));
			$result = $req->execute($tuple);

			$tab = $req->fetch();
			$echo = 
			"
				<h2>". $tab[1] ."</h2>
				<img src=\"". $tab[2] ."\" alt=\"#\" class=\"mx-auto d-block\" style=\"width: 200px\">
				<p class=\"mx-auto d-block\">". $tab[4] ."</p>
			";
			return $echo;
    	}

    	function acheterObjet($id_objet, $id_aventurier) {

    		$req = self::$bdd->prepare('SELECT or_aventurier FROM aventurier WHERE id_aventurier = :id_aventurier');
    		$tuple = array(':id_aventurier' => $id_aventurier);
			$result = $req->execute($tuple);
			$orAventurier = $req->fetch();

			$req = self::$bdd->prepare('SELECT prix_objet FROM objet WHERE id_objet = :id_objet');
    		$tuple = array(':id_objet' => $id_objet);
			$result = $req->execute($tuple);
			$prixObjet = $req->fetch();

			$req = self::$bdd->prepare('INSERT INTO sac (id_aventurier, id_objet) VALUES (:id_aventurier, :id_objet)');
			$tuple = array(':id_aventurier' => $id_aventurier, 'id_objet' => $id_objet);
			$result = $req->execute($tuple);

			$updateOrAventurier = intval($orAventurier[0]) - intval($prixObjet[0]);

			$req = self::$bdd->prepare('UPDATE aventurier SET or_aventurier = :or_aventurier WHERE id_aventurier = :id_aventurier');
			$tuple = array(':or_aventurier' => $updateOrAventurier, ':id_aventurier' => $id_aventurier);
			$result = $req->execute($tuple);
    	}

    	function checkAchat($id_objet, $id_aventurier) {
    		$req = self::$bdd->prepare('SELECT or_aventurier FROM aventurier WHERE id_aventurier = :id_aventurier');
    		$tuple = array(':id_aventurier' => $id_aventurier);
			$result = $req->execute($tuple);
			$orAventurier = $req->fetch();

			$req = self::$bdd->prepare('SELECT prix_objet FROM objet WHERE id_objet = :id_objet');
    		$tuple = array(':id_objet' => $id_objet);
			$result = $req->execute($tuple);
			$prixObjet = $req->fetch();

			return intval($orAventurier[0]) - intval($prixObjet[0]);
    	}
		
	}

?>