**Este projeto tem como objetivo a criação de uma API Rest que utilize as operações CRUD em uma lista de tarefas.**<br>
Para isto, foi utilizado PHP e MySQL.

## Como pode ser usada a aplicação
1 - Primeiramente é necessária a instalação do aplicativo [Postman](https://www.postman.com/app/)<br>
2 - Após instalado é necessário que seja clicado no "+" para testarmos<br>

Para fim de testes pode ser utilizado:<br>
### *CRIAÇÃO:*
No link na parte superior será utilizado:<br>
http://bianki.com.br/todos/table/create.php<br>
E no seu lado esquerdo marcado a opção POST<br>

Assim, clicaremos em 'Body' e após em 'Raw' logo a baixo. Adicionando o código em JSON:<br>
{<br>
    "description" : "Este é somente um teste",<br>
    "completed" : 1,<br>
    "createdAt" : "2020-03-03 10:00:00"<br>
}

Logo após, clicaremos em 'SEND'. Assim será adicionado o dado no banco.<br>

### *LEITURA*
Para a leitura dos dados será utilizado:<br>
http://bianki.com.br/todos/table/read.php<br>
E no seu lado esquerdo marcado a opção POST<br>

Logo após, clicaremos em 'SEND'. Assim será listado os dados do banco.<br>

### *ATUALIZAÇÕES*
No link na parte superior será utilizado:<br>
http://bianki.com.br/todos/table/update.php<br>
E no seu lado esquerdo marcado a opção POST<br>

Assim, clicaremos em 'Body' e após em 'Raw' logo a baixo. Adicionando o código em JSON (cuidando para que o ID corresponda a um ID adicionado na tabela):<br>
{<br>
	"id" : "24",<br>
    "description" : "Este dado foi atualizado",<br>
    "completed" : 0,<br>
    "updatedAt" : "2020-03-03 12:35:07"<br>
}<br>

Logo após, clicaremos em 'SEND'. Assim será atualizado o dado mencionado.<br>

### *DELETAR*
No link na parte superior será utilizado:<br>
http://bianki.com.br/todos/table/delete.php<br>
E no seu lado esquerdo marcado a opção POST<br>

Assim, clicaremos em 'Body' e após em 'Raw' logo a baixo. Adicionando o código em JSON (cuidando para que o ID corresponda a um ID adicionado na tabela):<br>
{<br>
    "id" : "22"<br>
}<br>

Logo após, clicaremos em 'SEND'. Assim será apagado o dado mencionado.

