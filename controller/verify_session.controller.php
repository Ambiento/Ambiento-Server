<?php
	header("Content-Type: text/plain");
	
	session_start();
	if (!empty($_SESSION)) {
		if ($_SESSION["singin"]) {
		// Logado
			$response["logado"] = true;
			$response["myNavbar"] = file_get_contents("../view/myNavbar-logado.view.html");
		}
	}else{
	// Nao logado
		$response["logado"] = false;
		$response["myNavbar"] = file_get_contents("../view/myNavbar-deslogado.view.html");
	}
	echo json_encode($response);
?>