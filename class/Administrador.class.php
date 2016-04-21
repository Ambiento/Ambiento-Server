<?php
	// Classe de administrador
	class Administrador{
		private $idAdministrador;
		private $nome;
		private $sobrenome;
		private $senha;
		private $email;
		private $img;
		private $idOrgao;

		public function __construct($_email=NULL, $_senha=NULL){
			$this->email = $_email;
			$this->senha = $_senha;
		}
		public function getIdAdministrador(){
			return $this->idAdministrador;
		}
		public function setIdAdministrador($idAdministrador){
			$this->idAdministrador = $idAdministrador;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getSobrenome(){
			return $this->sobrenome;
		}
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}

		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function getImg(){
			return $this->img;
		}
		public function setImg($img){
			$this->img = $img;
		}
		public function getIdOrgao(){
			return $this->idOrgao;
		}
		public function setIdOrgao($idOrgao){
			$this->idOrgao = $idOrgao;
		}
		
		private function loadAdm($nome, $sobrenome, $img, $idAdministrador, $idOrgao){
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->img = $img;
			$this->idAdministrador = $idAdministrador;
			$this->idOrgao = $idOrgao;
		}
		public function singin($mysqli){
			$sql = "SELECT * FROM Administrador WHERE email = '$this->email' and senha = '$this->senha'";
			$resultado = $mysqli->query($sql);
			$linha = $resultado->fetch_array();
			print_r($linha);
			if (!empty($linha)) {
			// singin success
				$this->loadAdm($linha["nome"], $linha["sobrenome"], $linha["img"], $linha["idAdministrador"], $linha["idOrgao"]);
				return true;
			}else{
			// singin failed
				return false;
			}
		}
		public function select_ocorrencias($mysqli){
			$sql = "SELECT * FROM Ocorrencias";
			
		}
	}
?>