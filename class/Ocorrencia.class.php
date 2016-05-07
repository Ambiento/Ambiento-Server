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