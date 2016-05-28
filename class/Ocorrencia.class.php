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
								"<a href='ocorrencia.php?id=".$row->idOcorrencia."' class='list-group-item list-group-item-info'>+Detalhes/Acompanhar Ocorrencia</a>".
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
		public function select_ocorrencia(){
			$sql = "SELECT * FROM Ocorrencia";
			$this->img = new Img();
			// print_r($resultado);
			if ($resultado->num_rows > 0) {
				for ($i=0; $linha = $resultado->fetch_array() ; $i++) { 
					$response[$i]["idOcorrencia"] = $linha["idOcorrencia"];
					$response[$i]["nome_usuario"] = $linha["nome_usuario"];
					$response[$i]["cidade"] = $linha["cidade"];
					$response[$i]["estado"] = $linha["estado"];
					$response[$i]["referencia_localizacao"] = $linha["referencia_localizacao"];
					$response[$i]["descricao"] = $linha["descricao"];
					$response[$i]["latitude"] = $linha["latitude"];
					$response[$i]["longitude"] = $linha["longitude"];
					// $response[$i]["id_img"] = $linha["idImg"];
					$this->img->select_imgbyid($linha["idImg"], $mysqli);
					$response[$i]["caminho_img"] = $this->img->getCaminho();
				}
			}else{
				$response[] = "Sem Ocorrencias!";
			}
			return json_encode($response);
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