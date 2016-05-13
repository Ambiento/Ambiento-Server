<?php
	include("class/Html.class.php");
	$html = new Html(1, "Cidade-1-".date("d/m/Y-H:i:s").".html");
	echo $html->getId_ocorrencia();
	$html->generate_html();
?>