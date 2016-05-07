<?php
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

		// getters and setters
		public function setImg(Img $_img){
			$this->img = $_img;
		}
		public function getImg(){
			return $this->img;
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
		
		public function insert_ocorrencia($mysqli){
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
		}
	}
?>