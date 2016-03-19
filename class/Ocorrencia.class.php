<?php
	class Ocorrencia{
		private $id_ocorrencia;
		private $nome_usuario;
		private $cidade;
		private $estado;
		private $referencia_localizacao;
		private $descricao;
		private $img;

		public function __construct($_nome_usuario, $_cidade, $_estado, $_referencia_localizacao, $_descricao){
			$this->nome_usuario = $_nome_usuario;
			$this->cidade = $_cidade;
			$this->estado = $_estado;
			$this->referencia_localizacao = $_referencia_localizacao;
			$this->descricao = $_descricao;
		}

		public function insert_ocorrencia($mysqli, $_img){
			$query = "INSERT INTO Ocorrencia VALUES(NULL, '$this->nome_usuario', '$this->cidade', '$this->estado', '$this->referencia_localizacao', '$this->descricao', 1)";
			echo $query;
		}
	}
?>