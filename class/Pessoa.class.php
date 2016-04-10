<?php
	class Pessoa{
		protected $idPessoa;
		protected $foto;
		protected $nome;
		protected $email;
		protected $senha;
		protected $identificador;

		public function __construct($_idPessoa, $_foto, $_nome, $_email, $_senha){
			$this->idPessoa = $_idPessoa;
			$this->foto = $_foto;
			$this->nome = $_nome;
			$this->email = $_email;
			$this->senha = $_senha;
		}
	    public function getIdPessoa(){
	        return $this->idPessoa;
	    }
	    protected function setIdPessoa($idPessoa){
	        $this->idPessoa = $idPessoa;
	        return $this;
	    }
	    public function getFoto(){
	        return $this->foto;
	    }
	    protected function setFoto($foto){
	        $this->foto = $foto;
	        return $this;
	    }
	    public function getNome(){
	        return $this->nome;
	    }
	    protected function setNome($nome){
	        $this->nome = $nome;
	        return $this;
	    }
	    public function getEmail(){
	        return $this->email;
	    }
	    protected function setEmail($email){
	        $this->email = $email;
	        return $this;
	    }
	    public function getSenha(){
	        return $this->senha;
	    }
	    protected function setSenha($senha){
	        $this->senha = $senha;
	        return $this;
	    }
		protected function selectPessoa($mysqli){
			$query = "SELECT * FROM Pessoa WHERE email = '$this->email'";
		}
	}
?>