<?php
	/**
	* 
	*/
	class Comentario{
		private $id_administrador;
		private $id_ocorrencia;
		private $conteudo;

		function __construct($_id_administrador, $_id_ocorrencia, $_conteudo){
			$this->id_administrador = $_id_administrador;
			$this->id_ocorrencia = $_id_ocorrencia;
			$this->conteudo = $_conteudo;
		}

		function insert_comentario(){
			$this->pdo = Database::conexao();
			$sql = "INSERT INTO Comentario VALUES(NULL, '$this->conteudo', $this->id_ocorrencia, $this->id_administrador)";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
		}
	}
?>