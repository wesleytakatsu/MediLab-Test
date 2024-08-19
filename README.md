# MediLabProject
Projeto de teste do Wesley Sieiro Takatsu de Araujo


- [DATABASE DIAGRAM](https://dbdiagram.io/)


Tecnologias utilizadas:
PHP, HTML, CSS, Javascript, Postgres
Laravel, Docker, Docker-compose, Bootstrap, Jquery
ORM Eloquent, Migrations, UUID, Middlewares
Sanctum para autenticação via token no HEADER

Sessões são utilizadas para manter o login do usuário via Web.
Via API usa o token em todas as requisições.

O banco de dados é persistido em ./sail-pgsql e precisam de permissão para alteração.



Na migration os dados JSON são carregados no banco.
Os usuários carregam seu nome em minúsculo, sem espaços, seguidos de @teste.com.
Ex: Anonimo 1 -> anonimo1@teste.com

A senha é 12345 em todos.
A senha é em HASH.
Os IDs de user e de person são do tipo UUID.

sail artisan migrate


Rotas de API:
Corpo em JSON
O token de autenticação pelo

User:
List: GET http://127.0.0.1/api/users
Por ID: GET http://127.0.0.1/api/users/[ID]
Store: POST http://127.0.0.1/api/users {"email", "password"}
Update: PUT http://127.0.0.1/api/users/[ID]
Delete: DEL http://127.0.0.1/api/users/[ID]

Person:
List: GET http://127.0.0.1/api/people
Store Person: POST http://127.0.0.1/api/people {"id", "nome", "numAcesso", "visita", "patientID", "data", "modalidade", "tipoExame", "numero", "estado", "medSol", "laudo", "sexo", "especial", "urgente", "restaurado"}

Store Person + User: POST {todas as informações de user e person}


Autenticação:
Login: POST http://127.0.0.1/api/login {"email", "password", "device_name"}
Teste Login: POST http://127.0.0.1/api/isloged -> HEADER: {Authorization: Bearer [token]}
