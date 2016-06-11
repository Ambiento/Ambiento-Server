<?php
	/**
	* 
	*/
	class Arquivo{
		private $file;
		private $caminho;
		private $conteudo;

		function __construct($_caminho, $_conteudo){
			$this->caminho = $_caminho;
			$this->conteudo = $_conteudo;
		}

		public function escrever(){
			$this->file = fopen($this->caminho, 'wb');
		    fwrite($this->file, $this->conteudo);
		    fclose($this->file);
		}
		public function ler(){
			
		}
	}
?>