<?php

	header('Content-type: application/json');

	include_once 'AjaxOP.php';
	$ajaxOP = new AjaxOP();

	$id_aventure = $_GET['id'];
	$mesDetailsEcho = $ajaxOP->afficheDetailAventure($id_aventure);
	echo json_encode($mesDetailsEcho);

?>