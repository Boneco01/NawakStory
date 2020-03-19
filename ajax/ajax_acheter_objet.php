<?php

	header('Content-type: application/json');

	include_once 'AjaxOP.php';
	$ajaxOP = new AjaxOP();

	$id_objet = $_GET['idObjet'];
	$id_personnage = $_GET['idPersonnage'];
	$achatPossible = $ajaxOP->checkAchat($id_objet, $id_personnage);
	if($achatPossible < 0) {
		$ajaxOP->throwError();
		echo json_encode("not ok");
	} else {
		$ajaxOP->acheterObjet($id_objet, $id_personnage);
		echo json_encode("ok");
	}

?>