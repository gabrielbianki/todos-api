<?php
// Cabeçalhos necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// Conexão ao banco e a tabela
include_once '../config/database.php';
include_once '../objects/table.php';
  
// Instanciando conexão ao banco
$database = new Database();
$db = $database->getConnection();
  
// Iniciando objeto
$table = new Table($db);
  
// Pega ID do dado para edição
$data = json_decode(file_get_contents("php://input"));
  
// Seta ID do dado
$table->id = $data->id;
  
// Seta dados do dado
$table->description = $data->description;
$table->completed = $data->completed;
$table->updatedAt = date('Y-m-d H:i:s');
  
// Atualiza dado
if($table->update()){
  
    // Seta resposta - 200 ok
    http_response_code(200);
  
    // Responde usuário
    echo json_encode(array("message" => "Dado atualizado"));
}
  
// Se não for possível atualizar, avisa usuário
else{
  
    // Seta resposta - 503 service unavailable
    http_response_code(503);
  
    // Responde usuário
    echo json_encode(array("message" => "Não foi possível atualizar o dado"));
}
?>