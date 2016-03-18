<?php
	class Pessoa{
		protected $idPessoa;
		protected $foto;
		protected $nome;
		protected $email;
		protected $senha;
		protected $identificador;

		public function __construct($_idPessoa, $_foto, $_nome, $_email, $_senha, $_identificador){
			$this->idPessoa = $_idPessoa;
			$this->foto = $_foto;
			$this->nome = $_nome;
			$this->email = $_email;
			$this->senha = $_senha;
			$this->identificador = $_identificador;
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
	    public function getIdentificador(){
	        return $this->identificador;
	    }
	    protected function setIdentificador($identificador){
	        $this->identificador = $identificador;
	        return $this;
	    }

		protected function insertPessoa($mysqli){
			//VERIFICAR SE O EMAIL JÁ NÃO ESTÁ CADASTRADO!
			//primeiro insere uma pessoa
			$query = "INSERT INTO Pessoa()".
							"VALUES(NULL, '$this->foto', '$this->nome', '$this->email', ".
								"'$this->senha', '$this->identificador')";
			$mysqli->query($query);
		}
		protected function selectPessoa($mysqli){
			//Autenticar a pessoa (esse método é chamado pelos filhos pra determinar quem é a pessoa que está logando)
			$query = "SELECT * FROM Pessoa WHERE email = '$this->email'";
		}
	}
?>