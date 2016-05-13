<?php
	/**
	*	  
	*/
	class Model{
		private $ocorrencia;
		private $view;
		private $pdo;

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
		public function getHtml(){
			return $this->html;
		}
		public function setHtml($html){
			$this->html = $html;
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
	}
?>