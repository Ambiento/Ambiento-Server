<?php
	/*
		*Classe de arquivo Html das ocorrencias
	*/
	class Html{
		private $id_html;
		private $nome_arquivo;
		private $id_ocorrencia;

		public function __construct($id_ocorrencia, $nome_arquivo){
			$this->id_ocorrencia = $id_ocorrencia;
			$this->id_ocorrencia = $nome_arquivo;
		}
		
		public function getId_html(){
			return $this->id_html;
		}
		public function setId_html($id_html){
			$this->id_html = $id_html;
		}
		public function getNome_arquivo(){
			return $this->nome_arquivo;
		}
		public function setNome_arquivo($nome_arquivo){
			$this->nome_arquivo = $nome_arquivo;
		}
		public function getId_ocorrencia(){
			return $this->id_ocorrencia;
		}
		public function setId_ocorrencia($id_ocorrencia){
			$this->id_ocorrencia = $id_ocorrencia;
		}

		public function generate_html(){
			//Gerar ṕágina da ocorrencia
			
		}
	}
?>