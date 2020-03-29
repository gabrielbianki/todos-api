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
  
// Recebe id do objeto
$data = json_decode(file_get_contents("php://input"));
  
// Seta ID do dado
$table->id = $data->id;
  
// Deleta o dado
if($table->delete()){
  
    // Setando respostas - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "O dado foi deletado"));
}
  
// Se não for possível deletar
else{
  
    // Responde usuário
    http_response_code(503);
  
    // Responde usuário
    echo json_encode(array("message" => "Não foi possível deletar o dado"));
}
?>