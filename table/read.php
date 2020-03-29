<?php
// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// Conexão ao banco e a tabela
include_once '../config/database.php';
include_once '../objects/table.php';
  
// Instanciando conexão ao banco
$database = new Database();
$db = $database->getConnection();
  
// Iniciando objeto
$table = new Table($db);
  
// Cria consulta a tabela
$stmt = $table->read();
$num = $stmt->rowCount();
  
// Checando se tabela tem mais de 0
if($num>0){
  
    // Array de dados
    $table_arr=array();
    $table_arr["CONSULTA"]=array();
  
    // Recupera conteúdo
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $table_item=array(
            "id" => $id,
            "description" => html_entity_decode($description),
            "completed" => $completed,
            "createdAt" => $createdAt,
            "updatedAt" => $updatedAt
        );
  
        array_push($table_arr["CONSULTA"], $table_item);
    }
  
    // Setando respostas - 200 OK
    http_response_code(200);
  
    // Apresenta dados em JSON
    echo json_encode($table_arr);
}
  
else{
  
    // Setando respostas - 404 Not found
    http_response_code(404);
  
    // Setando resposta para 0 consultas
    echo json_encode(
        array("message" => "Não foi encontrado nada.")
    );
}