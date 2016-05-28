<?php
	if (!empty($_POST)) {
		include_once("../class/Database.class.php");
		include_once("../class/Ocorrencia.class.php");
		include_once("../class/Html.class.php");
		include_once("../class/Controller.class.php");
		$controller = new Controller();
		$controller->cadastrar_ocorrencia();
	}
?>