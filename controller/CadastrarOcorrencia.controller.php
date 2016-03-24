<?php
	// header('Content-Type: bitmap; charset=utf-8');
	include_once("../include/conexao.php");
	include_once("../class/Ocorrencia.class.php");
	include_once("../class/Img.class.php");
	$img = new Img($_POST["img"]);
	$ocorrencia = new Ocorrencia($_POST["nome"], $_POST["cidade"], $_POST["estado"], $_POST["referencia"], $_POST["descricao"]);
	$img->generate_img($mysqli);
	$ocorrencia->setImg($img);
	$ocorrencia->insert_ocorrencia($mysqli);
?>