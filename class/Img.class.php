<?php
	class Img{
		private $id_img;
		private $caminho;
		private $base;

		public function __construct($_base=NULL){
			$this->base = $_base;
			return true;
		}
		public function getCaminho(){
			return $this->caminho;
		}
		public function getId_img(){
			return $this->id_img;
		}
		public function setId_img($_id_img){
			$this->id_img = $_id_img;
		}

		public function select_imgbyid($_id_img, $mysqli){
			$sql = "SELECT caminho FROM Img WHERE idImg = $_id_img";
			$resultado = $mysqli->query($sql);
			$linha = $resultado->fetch_array();
			$this->caminho = $linha["caminho"];
		}
		public function generate_img($pdo){
			$this->caminho = sha1(uniqid(time())).".png";
		    $binary=base64_decode($this->base);
		    $file = fopen('../img/ocorrencias_upload/'.$this->caminho, 'wb');
		    fwrite($file, $binary);
		    fclose($file);
			return;
		}
	}
?>