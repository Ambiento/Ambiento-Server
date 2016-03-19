<?php
	include_once("../include/conexao.php");
	include_once("../class/Ocorrencia.class.php");
	include_once("../class/Img.class.php");
	$img = new Img();
	$ocorrencia = new Ocorrencia($_POST["nome"], $_POST["cidade"], $_POST["estado"], $_POST["referencia"], $_POST["descricao"]);
	$img->generate_img($mysqli);
	$ocorrencia->insert_ocorrencia($mysqli, $img);
?>