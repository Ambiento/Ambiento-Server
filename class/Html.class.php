<?php
	/*
		*Classe de arquivo Html das ocorrencias
	*/
	class Html{
		private $id_html;
		private $nome_arquivo;
		private $id_ocorrencia;

		public function __construct($_id_html, $_nome_arquivo, $_id_ocorrencia){
			$this->id_html = $_id_html;
			$this->nome_arquivo = $_nome_arquivo;
			$this->id_ocorrencia = $_id_ocorrencia;
		}

		public function generate_html(){

		}
		public function insert_html($mysqli){
			
		}
	}
?>