<?php
// script de conexao com o banco de dados do web service e cadastro dos usuários.
// esse script vai receber por get ou post as informacoes do formulario de cadastro.
	include_once("../class/Usuario.class.php");
	include_once("../clas/Orgao.class.php");
	include_once("../Administrador.class.php");
	if($_POST["pessoa"] == "usuario"){
		//instancia um objeto Usuario e faz os procedimentos
		$usuario = New Usuario(NULL, $_POST["foto"], $_POST);
		$usuario->cadastrar();
	}elseif ($_POST["pessoa"] == "administrador") {
		
	}elseif ($_POST["pessoa"] == "orgao") {
		
	}
?>