<?php
	class Img{
		private $id_img;
		private $caminho;

		// function __construct(){

		// 	return true;
		// }
		function getCaminho(){
			return $this->caminho;
		}
		public function generate_img($mysqli){
			$this->caminho = "caminho";
			$query = "INSERT INTO Img VALUES(null, '$this->caminho')";
			$mysqli->query($query);
		}
	}
?>