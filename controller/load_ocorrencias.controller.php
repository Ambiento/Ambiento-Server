<?php
	include_once("../include/conexao.php");
	include_once("../class/Ocorrencia.class.php");
	include_once("../class/Administrador.class.php");
	session_start();
	$adm = new Administrador();
	$adm->select_ocorrencias($mysqli);
	print_r($adm);
	// echo json_encode($response);
?>