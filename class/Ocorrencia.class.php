<?php
	class Ocorrencia{
		private $id_ocorrencia;
		private $nome_usuario;
		private $cidade;
		private $estado;
		private $referencia_localizacao;
		private $descricao;
		private $img;

		// getters and setters
		public function setImg(Img $_img){
			$this->img = $_img;
		}

		public function __construct($_nome_usuario, $_cidade, $_estado, $_referencia_localizacao, $_descricao){
			$this->nome_usuario = $_nome_usuario;
			$this->cidade = $_cidade;
			$this->estado = $_estado;
			$this->referencia_localizacao = $_referencia_localizacao;
			$this->descricao = $_descricao;
		}
		
		public function insert_ocorrencia($mysqli){
			$query = "INSERT INTO Ocorrencia VALUES(NULL, '$this->nome_usuario', '$this->cidade', '$this->estado', '$this->referencia_localizacao', '$this->descricao', ".$this->img->getId_img().")";
			echo $query;
			$mysqli->query($query);
			$this->id_ocorrencia = $mysqli->insert_id;
		}
	}
?>