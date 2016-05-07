<?php
	/*
	 *  
	*/
	include_once("Database.class.php");
	class Model{
		private $database;
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
		public function select_ocorrencias(){
			$pdo = Database::conexao();
		    $sql = "SELECT * FROM Ocorrencia";
		    $query = $pdo->prepare($sql);
		    $query->execute();
		    if ($query->rowCount() >0){
			    while($row = $query->fetch(PDO::FETCH_OBJ)){
			        $response[] = $row->nome;
			    }
			    return $response;
		    }else{
		    	return false;
		    }
		}
	}
?>