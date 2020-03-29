<?php
// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// Configuração de banco
include_once '../config/database.php';
  
// Instanciando objeto
include_once '../objects/table.php';

// Cria conexão com banco
$database = new Database();
$db = $database->getConnection();

// Instancia tabela
$table = new Table($db);
  
// Obter dados
$data = json_decode(file_get_contents("php://input"));
  
// Verificar se dados estão vazios
if(
    !empty($data->description) &&
    !empty($data->completed) &&
    !empty($data->createdAt)
){
  
    // Setando valores a tabela
    $table->description = $data->description;
    $table->completed = $data->completed;
    $table->createdAt = date('Y-m-d H:i:s');
  
    // Criando
    if($table->create()){
  
        // Setando resposta - 201 created
        http_response_code(201);
  
        // Informa o usuário
        echo json_encode(array("message" => "Dado registrado"));
    }
  
    // Se não criar dado, avisa usuário
    else{
  
        // Seta resposta - 503 service unavailable
        http_response_code(503);
  
        // Responde usuário
        echo json_encode(array("message" => "Não foi possível registrar dado."));
    }
}
  
// Se dado incompleto, avisa usuário
else{
  
    // Seta resposta ao usuário - 400 bad request
    http_response_code(400);
  
    // Responde usuário
    echo json_encode(array("message" => "Não foi possível registrar, dado incompleto"));
}
?>