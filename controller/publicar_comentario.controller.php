<?php
	include("../class/Database.class.php");
	include("../class/Controller.class.php");
	include("../class/Comentario.class.php");
	$controller = new Controller();
	$controller->publicar_comentario();
	header("location: ../detalhe.php?id=".$_GET["idOcorrencia"]);
?>