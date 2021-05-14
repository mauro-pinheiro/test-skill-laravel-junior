# Client/Product API

Projeto de uma api em laravel usando sanctum demonstração de habilidades.
O projeto consiste em CRUD basico de Clientes e Produtos.

# Instruções de Uso

1. Faça a instalação de todas as dependênncias.

<code>composer install</code>

2. Crie o arquivo .env usando seu metodo de preferencia

Exmplo: Caso o sistema ubuntu, pode-se copiar o arquivo .env.exemple e renomear para .env

<code>cp .env.exemple .env</code>

3. Inicie o ambiante de desenvolvimento usando Laravel Sail.

<code>./vendor/bin/sail up -d --build</code>

4. Gere uma api key para o projeto.

<code>./vendor/bin/sail aritan key:generate</code>

ou

<code>php artisan aritan key:generate</code>

5. Faça a migração do banco de dados

<code>./vendor/bin/sail migrate --seed</code>

ou

<code>php artisan migrate --seed</code>

6. Agora o sistema web pode ser acessado usando o link http://localhost

7. A documentação da api esta no link http://locahost/api/docs

- A api tem um esquema de autenticação bearer.
    - Para gerar o token de acesso. Faça login no sistema usando o link http://localhost/login. O token vai aparece uma vez apois o login.
    - O usuário: admin@admin.com com senha: password já esta pré-cadastrado.
