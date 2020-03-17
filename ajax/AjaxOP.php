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

		function recupListePersosFiltre($est_heros, $id_lien) {
			if(intval($id_lien) == 0) {
				$req = self::$bdd->prepare('SELECT id_carte, img_carte_petite FROM Carte WHERE est_heros = :est_heros');
				$tuple = array(':est_heros' => $est_heros);
			} else {
				$req = self::$bdd->prepare('SELECT id_carte, img_carte_petite FROM Carte INNER JOIN possede_lien using(id_carte) WHERE est_heros = :est_heros AND id_lien = :id_lien');
				$tuple = array(':est_heros' => $est_heros, ':id_lien' => intval($id_lien));
			}
			$req->execute($tuple);
			$tab = $req->fetchAll();
			return $tab;
    	}

    	function afficheListe($listePerso) {

            $tailleListe = count($listePerso);
            $affichageListe = "";

            for($i=0;$i<$tailleListe;$i++) {
                $affichageListe = $affichageListe . "<a href=\"index.php?mod=personnage&option=detailPerso&id=". $listePerso[$i][0] ."\"><img src=\"". $listePerso[$i][1] ."\" alt=\"#\" class=\"imgtab\"></a>";
            }

            return $affichageListe;

        }

        function recupIdUtilisateur($nom_utilisateur) {

			$req = self::$bdd->prepare('SELECT id_utilisateur FROM Utilisateur WHERE nom_utilisateur = :nom_utilisateur');
			$tuple = array(':nom_utilisateur' => $nom_utilisateur);
			$req->execute($tuple);

			$tab = $req->fetch();
			return $tab[0];

        }
		
	}

?>