<?php
	if (!empty($_GET["id"])) {
		include("class/Database.class.php");
		include("class/Controller.class.php");
		include("class/Ocorrencia.class.php");
		$controller =  new Controller();
		$controller->detalhe();
	}else{
		header("location: index.php");
	}
?>