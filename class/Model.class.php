<?php
	/**
	*	  
	*/
	class Model{
		private $database;
		private $ocorrencia;
		private $img;
		private $view;
		private $pdo;
		private $html;

		function __construct(){
			return;
		}
		public function setOcorrencia($_ocorrencia){
			$this->ocorrencia = $_ocorrencia;
		}
		public function verifica_session(){
			session_start();
			if (!empty($_SESSION)) {
				if ($_SESSION["singin"]) {
				// Logado
					return true;
				}
			}else{
			// Nao logado
				return false;
			}
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
			$this->html = new Html($this->ocorrencia->getId_ocorrencia());
			$this->html->generate_html();
			$sql = "INSERT INTO Html VALUES(NULL,'".$this->html->getNome_arquivo()."',".$this->html->getId_ocorrencia().")";
			$stmt->this->pdo->prepare($sql);
			$stmt->execute();
		}
		private function insert_img(){
			$this->img = new Img($_POST["img"]);
			$this->img->generate_img();
			$sql = "INSERT INTO Img VALUES(NULL,'".$this->img->getCaminho()."')";
			$stmt->this->pdo->prepare($sql);
			$stmt->execute();
			$this->img->setId_img($stmt->insert_id);
		}
		public function insert_ocorrencia(){
			$this->pdo = Database::conexao();
			$this->insert_img();
			$sql = "INSERT INTO Ocorrencia VALUES(NULL,".$this->ocorrencia->getNome_usuario().",".$this->ocorrencia->getCidade().",".$this->ocorrencia->getEstado().",".$this->ocorrencia->getReferencia_localizacao().",".$this->ocorrencia->getDescricao().",".$this->img->getId_img().",".$this->ocorrencia->getLatitude().",".$this->ocorrencia->getLongitude().")";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$this->ocorrencia->setId_ocorrencia($stmt->insert_id);
		}
	}
?>