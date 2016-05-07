<?php
	/*
	 *  
	*/
	include_once("Database.class.php");
	class Model{
		private $database;
		private $ocorrencia;
		private $view;

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
			$pdo = Database::conexao();
		    $sql = "SELECT * FROM Ocorrencia";
		    $query = $pdo->prepare($sql);
		    $query->execute();
		    if ($query->rowCount() >0){
		    	$response = "";
			    while($row = $query->fetch(PDO::FETCH_OBJ)){
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

		}
		public function insert_ocorrencia(){
			$pdo = Database::conexao();
			$sql = "INSERT INTO Ocorrencia VALUES(NULL, ".$this->ocorrencia->getNome_usuario().", ".$this->ocorrencia->getCidade().", ".$this->ocorrencia->getEstado().", ".$this->ocorrencia->getReferencia_localizacao().", ".$this->ocorrencia->getDescricao().", ".$this->ocorrencia->getId_img().", ".$this->ocorrencia->getLatitude().", ".$this->ocorrencia->getLongitude().")";
			// $query = $pdo->prepare($sql);
			// $query->execute();
		}
	}
?>