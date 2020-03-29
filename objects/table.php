<?php
class Table{
  
    // Conexão e tabela do banco
    private $conn;
    private $table_name = "todos";
  
    // Propriedades da tabela
    public $id;
    public $description;
    public $completed;
    public $createdAt;
    public $updatedAt;

  
    // Construtor para conexão
    public function __construct($db){
        $this->conn = $db;
    }

    // Leitor de dados
        function read(){
  
        // Seleciona consulta
        $query = "SELECT
                    id, description, completed, createdAt, updatedAt
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id DESC";
  
        // Prepara instrução a consulta
        $stmt = $this->conn->prepare($query);
  
        // Executa consulta
        $stmt->execute();
  
        return $stmt;
        }
        
    // Criando dados
        function create(){
  
        // Cria dados
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    description=:description, completed=:completed, createdAt=:createdAt";
  
        // Prepara query
        $stmt = $this->conn->prepare($query);
  
        // Ajuste de dados
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->completed=htmlspecialchars(strip_tags($this->completed));
        $this->createdAt=htmlspecialchars(strip_tags($this->createdAt));
  
        // Ligando valores
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":completed", $this->completed);
        $stmt->bindParam(":createdAt", $this->createdAt);
  
        // Executa query
        if($stmt->execute()){
            return true;
        }
  
        return false;
        }

    // Atualiza dados
        function update(){
  
        // Atualiza Query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    description = :description, completed = :completed, updatedAt = :updatedAt
                WHERE
                    id = :id";
  
        // Prepara query
        $stmt = $this->conn->prepare($query);
  
        // Ajuste de dados
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->completed=htmlspecialchars(strip_tags($this->completed));
        $this->updatedAt=htmlspecialchars(strip_tags($this->updatedAt));
        $this->id=htmlspecialchars(strip_tags($this->id));
  
        // Ligando valores
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':completed', $this->completed);
        $stmt->bindParam(':updatedAt', $this->updatedAt);
        $stmt->bindParam(':id', $this->id);
  
        // Executa query
        if($stmt->execute()){
            return true;
        }
  
        return false;
        }

    // Deleta dados
        function delete(){
  
        // Delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
  
        // Prepara Query
        $stmt = $this->conn->prepare($query);
  
        // Ajuste de dados
        $this->id=htmlspecialchars(strip_tags($this->id));
  
        // Ligando valores
        $stmt->bindParam(1, $this->id);
  
        // Executa Query
        if($stmt->execute()){
            return true;
        }
  
        return false;
        }
}
?>