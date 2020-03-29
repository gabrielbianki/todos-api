<?php
class Database{
  
    // Dados de conexão
    private $host = "mysql.bianki.com.br";
    private $db_name = "bianki";
    private $username = "bianki";
    private $password = "provakinghost1";
    public $conn;
  
    // Conectando a base de dados
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>