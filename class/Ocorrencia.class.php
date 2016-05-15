<?php
	include_once("Img.class.php");
	include_once("Html.class.php");
	class Ocorrencia{
		private $id_ocorrencia;
		private $nome_usuario;
		private $cidade;
		private $estado;
		private $referencia_localizacao;
		private $descricao;
		private $img;
		private $latitude;
		private $longitude;
		private $html;
		private $pdo;

		// getters and setters
		public function getId_ocorrencia(){
			return $this->id_ocorrencia;
		}
		public function setId_ocorrencia($id_ocorrencia){
			$this->id_ocorrencia = $id_ocorrencia;
		}
		public function getNome_usuario(){
			return $this->nome_usuario;
		}
		public function setNome_usuario($nome_usuario){
			$this->nome_usuario = $nome_usuario;
		}
		public function getCidade(){
			return $this->cidade;
		}
		public function setCidade($cidade){
			$this->cidade = $cidade;
		}
		public function getEstado(){
			return $this->estado;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}
		public function getReferencia_localizacao(){
			return $this->referencia_localizacao;
		}
		public function setReferencia_localizacao($referencia_localizacao){
			$this->referencia_localizacao = $referencia_localizacao;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		public function getLatitude(){
			return $this->latitude;
		}
		public function setLatitude($latitude){
			$this->latitude = $latitude;
		}
		public function getLongitude(){
			return $this->longitude;
		}
		public function setLongitude($longitude){
			$this->longitude = $longitude;
		}
		public function getHtml(){
			return $this->html;
		}
		public function setHtml($html){
			$this->html = $html;
		}
		public function getImg(){
			return $this->img;
		}
		public function setImg(Img $_img){
			$this->img = $_img;
		}

		public function __construct($_id_ocorrencia=NULL, $_nome_usuario=NULL, $_cidade=NULL, $_estado=NULL, $_referencia_localizacao=NULL, $_descricao=NULL, $_latitude=NULL, $_longitude=NULL){
			$this->id_ocorrencia = $_id_ocorrencia;
			$this->nome_usuario = $_nome_usuario;
			$this->cidade = $_cidade;
			$this->estado = $_estado;
			$this->referencia_localizacao = $_referencia_localizacao;
			$this->descricao = $_descricao;
			$this->latitude = $_latitude;
			$this->longitude = $_longitude;
		}
		
		/*public function insert_ocorrencia($mysqli){
			$query = "INSERT INTO Ocorrencia VALUES(NULL, '$this->nome_usuario', '$this->cidade', '$this->estado', '$this->referencia_localizacao', '$this->descricao', ".$this->img->getId_img().", $this->latitude, $this->longitude)";
			echo $query;
			$mysqli->query($query);
			$this->id_ocorrencia = $mysqli->insert_id;
			
			//generate html file
			//padrão do nome do arquivo
			// $nome_arquivo = "$this->cidade-$this->id_ocorrencia".date("d/m/Y-H:i:s").".html";
			// $this->html = new Html($nome_arquivo, $this->id_ocorrencia);
			// $html->generate_html();
			// $html->insert_html($mysqli);
		}*/

		public function insert_ocorrencia(){
			$this->pdo = Database::conexao();
			$this->insert_img();
			$sql = "INSERT INTO Ocorrencia VALUES(NULL,".$this->ocorrencia->getNome_usuario().",".$this->ocorrencia->getCidade().",".$this->ocorrencia->getEstado().",".$this->ocorrencia->getReferencia_localizacao().",".$this->ocorrencia->getDescricao().",".$this->img->getId_img().",".$this->ocorrencia->getLatitude().",".$this->ocorrencia->getLongitude().")";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$this->ocorrencia->setId_ocorrencia($stmt->insert_id);
			$this->insert_html();
		}
		public function select_ocorrencias(){
			$this->pdo = Database::conexao();
		    $sql = "SELECT * FROM Ocorrencia";
		    $stmt = $this->pdo->prepare($sql);
		    $stmt->execute();
		    if ($stmt->rowCount() >0){
		    	$response = "";
			    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
			 		$response .= "<div class='ocorrencia'>".
							"<h3>".$row->nome_usuario."</h3>".
							"<ul class='list-group'>".
								"<li class='list-group-item'>Cidade: ".$row->cidade."</li>".
								"<li class='list-group-item'>Estado: ".$row->estado."</li>".
								"<li class='list-group-item'>Referência de Localização: ".$row->referencia_localizacao."</li>".
								"<li class='list-group-item'>".
									"<h4>Descrição:</h4>".
									"<p>".$row->descricao."</p>".
								"</li>".
								"<a href='acompanhar_ocorrencia.controller.php?idOcorrencia=".$row->idOcorrencia."' class='list-group-item list-group-item-info'>+Detalhes/Acompanhar Ocorrencia</a>".
							"</ul>".
							// "<img width='200' height='300' class='img-responsive img-thumbnail' src='img/ocorrencias_upload/".$row->caminho_img."'</img>".
						"</div>";       
			    }
			    return $response;
		    }else{
				return "Nenhuma Ocorrencia foi registrada ainda.";
		    }
			return;
		}

		public function insert_html(){
			$this->html = new Html($this->id_ocorrencia, "$this->cidade-$this->id_ocorrencia-".date("d/m/Y-H:i:s").".html");
			$this->html->setContent("<!DOCTYPE html>
			<html>
				<head>
					<title>Ocorrência - $this->nome_usuario</title>
					<meta charset='utf-8'>
					<meta name='viewport' content='width=device-width, initial-scale=1'>
					<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
					<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
					<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
					<script type='text/javascript' src='js/ocorrencia.js'></script>
					<link rel='stylesheet' href='css/style.css'>
					<link rel='stylesheet' href='css/ocorrencia.css'>
				</head>
				<body>
					<nav class='navbar navbar-inverse'>
						<div class='container-fluid'>
							<div class='navbar-header'>
								<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
									<span class='icon-bar'></span>
									<span class='icon-bar'></span>
									<span class='icon-bar'></span>                        
								</button>
							</div>
							<div class='collapse navbar-collapse' id='myNavbar'>
								<ul class='nav navbar-nav'>
									<li class=''><a href='index.php'><- Voltar</a></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class='container'>    
						<div class='row'>
							<div id='center' class='col-md-7'>
								<p id='status'>
								</p>
								<div class='ocorrencia'>
									<h3>$this->nome_usuario</h3>
									<ul class='list-group'>
										<li class='list-group-item'>Cidade: $this->cidade</li>
										<li class='list-group-item'>Estado: $this->estado</li>
										<li class='list-group-item'>Referência de Localização: $this->referencia_localizacao</li>
										<li class='list-group-item'>
											<h4>Descrição:</h4>
											<p>$this->descricao</p>
										</li>
										<li class='list-group-item'>
											<h4>Registro Fotográfico da ocorrencia:</h4>
											<img width='200' height='300' class='img-responsive img-thumbnail' src='".$this->img->getCaminho()."'</img>
										</li>
										<li class='list-group-item'>
											<div id='map'></div>
										</li>
									</ul>
									<h2>Publicar</h2>
									<form method='POST' id='form_comentario' action='controller/publicar_comentario.controller.php?idOcorrencia=$this->id_ocorrencia'>
										<textarea name='conteudo' required='true' rows='5' style='width:100%'></textarea>
									   	<button id='bt_comentar' type='submit'>Comentar</button>
									</form>
								</div>
								<div id='comentarios'>
									<!-- COMENTÁRIOS AQUI OU -->
								</div>
							</div>
							<div id='comentarios' class='col-md-5'>	
								<!-- AQUI -->
							</div>
						</div>
					</div>
					<footer class='container-fluid'>
						<a rel='license' href='http://creativecommons.org/licenses/by-nc-nd/4.0/'><img alt='Licença Creative Commons' style='border-width:0' src='https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png' /></a><br /><span xmlns:dct='http://purl.org/dc/terms/' property='dct:title'><!-- Ambiento</span> de <span xmlns:cc='http://creativecommons.org/ns#' property='cc:attributionName'>Igor Phelype Guimarães</span> está licenciado com uma Licença <a rel='license' href='http://creativecommons.org/licenses/by-nc-nd/4.0/'>Creative Commons - Atribuição-NãoComercial-SemDerivações 4.0 Internacional --></a>
					</footer>
				</body>
				<script src='http://maps.google.com/maps/api/js'></script>
				<script type='text/javascript' src='js/gmap/gmap.js'></script>
				<script type='text/javascript'>
					// Main execution
					$(document).ready(function() {
						//load map
						idOcorrencia = $this->id_ocorrencia;
						map = new GMaps({
							div: '#map',
							lat: $this->latitude,
							lng: $this->longitude
						});
						map.addMarker({
							lat: $this->latitude,
							lng: $this->longitude,
							title: 'Ocorrencia',
							infoWindow: {
								content : 'Local da Ocorrencia' 
							}
						});
						load_comentarios(idOcorrencia);
					});
				</script>
			</html>");
			$this->html->generate_html();
			$sql = "INSERT INTO Html VALUES(NULL,'".$this->html->getNome_arquivo()."',".$this->html->getId_ocorrencia().")";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
		}
		private function insert_img(){
			$this->img = new Img($_POST["img"]);
			$this->img->generate_img();
			$sql = "INSERT INTO Img VALUES(NULL,'".$this->img->getCaminho()."')";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$this->img->setId_img($stmt->insert_id);
		}
	}
?>