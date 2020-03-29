*Este projeto tem como objetivo a criação de uma API Rest que utilize as operações CRUD em uma lista de tarefas.*
Para isto, foi utilizado PHP e MySQL.

## Como pode ser usada a aplicação
1 - Primeiramente é necessária a instalação do aplicativo Postman (https://www.postman.com/app/)
2 - Após instalado é necessário que seja clicado no "+" para testarmos

Para fim de testes pode ser utilizado:
*CRIAÇÃO:*
No link na parte superior será utilizado:
http://bianki.com.br/todos/table/create.php
E no seu lado esquerdo marcado a opção POST

Assim, clicaremos em 'Body' e após em 'Raw' logo a baixo. Adicionando o código em JSON:
{
    "description" : "Este é somente um teste",
    "completed" : 1,
    "createdAt" : "2020-03-03 10:00:00"
}

Logo após, clicaremos em 'SEND'. Assim será adicionado o dado no banco.

*LEITURA*
Para a leitura dos dados será utilizado:
http://bianki.com.br/todos/table/read.php
E no seu lado esquerdo marcado a opção POST

Logo após, clicaremos em 'SEND'. Assim será listado os dados do banco.

*ATUALIZAÇÕES*
No link na parte superior será utilizado:
http://bianki.com.br/todos/table/update.php
E no seu lado esquerdo marcado a opção POST

Assim, clicaremos em 'Body' e após em 'Raw' logo a baixo. Adicionando o código em JSON (cuidando para que o ID corresponda a um ID adicionado na tabela):
{
	"id" : "24",
    "description" : "Este dado foi atualizado",
    "completed" : 0,
    "updatedAt" : "2020-03-03 12:35:07"
}

Logo após, clicaremos em 'SEND'. Assim será atualizado o dado mencionado.

*DELETAR*
No link na parte superior será utilizado:
http://bianki.com.br/todos/table/delete.php
E no seu lado esquerdo marcado a opção POST

Assim, clicaremos em 'Body' e após em 'Raw' logo a baixo. Adicionando o código em JSON (cuidando para que o ID corresponda a um ID adicionado na tabela):
{
    "id" : "22"
}

Logo após, clicaremos em 'SEND'. Assim será apagado o dado mencionado.

