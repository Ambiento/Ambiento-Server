<?php
	include_once("Img.class.php");
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
		public function list_ocorrencias($mysqli){
			$sql = "SELECT * FROM Ocorrencia";
			$resultado = $mysqli->query($sql);
			$this->img = new Img();
			// print_r($resultado);
			if ($resultado->num_rows > 0) {
				for ($i=0; $linha = $resultado->fetch_array() ; $i++) { 
					$response[$i]["idOcorrencia"] = $linha["idOcorrencia"];
					$response[$i]["nome_usuario"] = $linha["nome_usuario"];
					$response[$i]["cidade"] = $linha["cidade"];
					$response[$i]["estado"] = $linha["estado"];
					$response[$i]["referencia_localizacao"] = $linha["referencia_localizacao"];
					$response[$i]["descricao"] = $linha["descricao"];
					$response[$i]["latitude"] = $linha["latitude"];
					$response[$i]["longitude"] = $linha["longitude"];
					// $response[$i]["id_img"] = $linha["idImg"];
					$this->img->select_imgbyid($linha["idImg"], $mysqli);
					$response[$i]["caminho_img"] = $this->img->getCaminho();
				}
			}else{
				$response[] = "Sem Ocorrencias!";
			}
			return json_encode($response);
		}
	}
?>