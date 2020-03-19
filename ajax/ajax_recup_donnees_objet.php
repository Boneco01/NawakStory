<?php

	header('Content-type: application/json');

	include_once 'AjaxOP.php';
	$ajaxOP = new AjaxOP();

	$id_objet = $_GET['id'];
	$isSac = $_GET['sac'];
	if($isSac == '0') {
		$mesDetailsEcho = $ajaxOP->afficheDetailObjetBoutique($id_objet);
	} else {
		$mesDetailsEcho = $ajaxOP->afficheDetailObjetSac($id_objet);
	}
	echo json_encode($mesDetailsEcho);

?>