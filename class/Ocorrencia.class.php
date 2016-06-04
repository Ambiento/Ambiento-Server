<?php
	include_once("Img.class.php");
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
		private $json;
		private $json_content;
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
		public function getjson(){
			return $this->json;
		}
		public function setjson($json){
			$this->json = $json;
		}
		public function getjson_content(){
			return $this->json_content;
		}
		public function setjson_content($json_content){
			$this->json_content = $json_content;
		}
		public function getImg(){
			return $this->img;
		}
		public function setImg(Img $img){
			$this->img = $img;
		}

		public function __construct($id_ocorrencia=NULL, $nome_usuario=NULL, $cidade=NULL, $estado=NULL, $referencia_localizacao=NULL, $descricao=NULL, $latitude=NULL, $longitude=NULL){
			$this->id_ocorrencia = $id_ocorrencia;
			$this->nome_usuario = $nome_usuario;
			$this->cidade = $cidade;
			$this->estado = $estado;
			$this->referencia_localizacao = $referencia_localizacao;
			$this->descricao = $descricao;
			$this->latitude = $latitude;
			$this->longitude = $longitude;
		}
		public function insert_ocorrencia(){
			$this->pdo = Database::conexao();
			$this->insert_img();
			$sql = "INSERT INTO Ocorrencia VALUES(NULL,'".$this->nome_usuario."','".$this->cidade."','".$this->estado."','".$this->referencia_localizacao."','".$this->descricao."',".$this->img->getId_img().",'".$this->latitude."','".$this->longitude."')";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$this->setId_ocorrencia($this->pdo->lastInsertId());
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
								"<a href='detalhe.php?id=".$row->idOcorrencia."' class='list-group-item list-group-item-info'>+Detalhes/Acompanhar Ocorrencia</a>".
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
		public function select_ocorrenciaById(){
			$this->pdo = Database::conexao();
		    $sql = "SELECT * FROM Ocorrencia WHERE idOcorrencia = $this->id_ocorrencia";
		    $stmt = $this->pdo->prepare($sql);
		    $stmt->execute();
		    if ($stmt->rowCount() == 1){
		    	$row = $stmt->fetch(PDO::FETCH_OBJ);
		    	//desenha o quadrinho da ocorrencia
		    	echo "<div class='ocorrencia'>
					<h3>saida[i]['nome_usuario']</h3>
					<ul class='list-group'>
						<li class='list-group-item'>Cidade: saida[i]['cidade']</li>
						<li class='list-group-item'>Estado: saida[i]['estado']</li>
						<li class='list-group-item'>Referência de Localização: saida[i]['referencia_localizacao']</li>
						<li class='list-group-item'>
							<h4>Descrição:</h4>
							<p>saida[i]['descricao']</p>
						</li>
						<li class='list-group-item'>
							<h4>Registro Fotográfico da ocorrencia:</h4>
							<img width='200' height='300' class='img-responsive img-thumbnail' src=''</img>
						</li>
						<li class='list-group-item'>
							<div id='map'></div>
						</li>
					</ul>
					<h2>Publicar</h2>
					<form method='POST' id='form_comentario' action='controller/publicar_comentario.controller.php?idOcorrencia=<?php echo $idOcorrencia ?>'>
						<textarea name='conteudo' required='true' rows='5' style='width:100%'></textarea>
					   	<button id='bt_comentar' type='submit'>Comentar</button>
					</form>
				</div>";
		    	print_r($row);
		    }
		}
		private function insert_img(){
			$this->img = new Img($_POST["img"]);
			$this->img->generate_img();
			$sql = "INSERT INTO Img VALUES(NULL,'".$this->img->getCaminho()."')";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$this->img->setId_img($this->pdo->lastInsertId());
		}
	}
?>