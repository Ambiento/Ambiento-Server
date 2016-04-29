<?php
	include_once("../include/conexao.php");
	include_once("../class/Ocorrencia.class.php");
	include_once("../class/Administrador.class.php");
	session_start();
	$adm = new Administrador();
	$response = $adm->list_ocorrencias($mysqli);
	echo $response;
?>