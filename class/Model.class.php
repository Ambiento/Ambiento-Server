<?php
	/**
	*	  
	*/
	class Model{
		private $ocorrencia;
		private $comentario;
		private $view;
		private $pdo;
		private $adm;

		public function getAdm(){
			return $this->adm;
		}
		public function setAdm($adm){
			$this->adm = $adm;
		}
		public function getComentario(){
			return $this->comentario;
		}
		public function setComentario($comentario){
			$this->comentario = $comentario;
		}
		public function getOcorrencia(){
			return $this->ocorrencia;
		}
		public function setOcorrencia($ocorrencia){
			$this->ocorrencia = $ocorrencia;
		}
		public function getImg(){
			return $this->img;
		}
		public function setImg($img){
			$this->img = $img;
		}
		public function getView(){
			return $this->view;
		}
		public function setView($view){
			$this->view = $view;
		}
		public function getPdo(){
			return $this->pdo;
		}
		public function setPdo($pdo){
			$this->pdo = $pdo;
		}

		function __construct(){
			return;
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
		public function singin_adm(){
			session_start();
			if ($this->adm->singin()) {	
				$_SESSION["nome"] = $this->adm->getNome();
				$_SESSION["sobrenome"] = $this->adm->getSobrenome();
				$_SESSION["email"] = $this->adm->getEmail();
				$_SESSION["img"] = $this->adm->getImg();
				$_SESSION["idAdministrador"] = $this->adm->getIdAdministrador();
				$_SESSION["idOrgao"] = $this->adm->getIdOrgao();
				$_SESSION["singin"] = true;
			}else{
				session_unset();
			}
		}
	}
?>