<?php
    /**
     * Autoria: felladrin.
     * Adaptação feita por mim.
     * forked from gist.github.com/felladrin/pdo.class.php
    */
    class Database{
        private $db_host = "localhost";
        private $db_nome = "Ambiento";
        private $db_usuario = "root";
        private $db_senha = "123456";
        private $db_driver = "mysql";
        protected static $db;

        private function __construct(){
            try{
                self::$db = new PDO("$this->db_driver:host=$this->db_host; dbname=$this->db_nome", $this->db_usuario, $this->db_senha);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->exec('SET NAMES utf8');
            }catch (PDOException $e){
                die("Connection Error: ".$e->getMessage());
            }
        }
        public static function conexao(){
            if (!self::$db){
                new Database();
            }
            return self::$db;
        }
    }
    // Exemplo de código:
        // $pdo = Database::conexao();
        // $sql = "SELECT * FROM Administrador";
        // $query = $pdo->prepare($sql);
        // $query->execute();
        // while($row = $query->fetch(PDO::FETCH_OBJ)){
        //     echo $row->sobrenome;
        // }
?>