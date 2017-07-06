# PokemonDatabase

Database por: http://pokeapi.co/ 
método: https://pastebin.com/fZUS4MkA Laravel 5.4.28

#Como usar

Instalar dependências do Composer:

`$ php composer install`

Criar banco de dados, nome do banco: `pokemondatabase` usuário: `root`, sem senha, para alterar edite o arquivo `.env`, prossiga com a migração:

`$ php artisan migrate`

Ripar os Pokemons de http://pokeapi.co/  e popular o banco atrevés de seeds do laravel, é possível escolher a quantidade gerada de pokemons até no máximo 718 através da variável `$pokemonQuantity = 10;` do arquivo `PokemonTableSeeder.php`:

`$ php artisan db:seed`

Após a criação do banco basta subir o servidor local do laravel, ambiente testado XAMPP 7.0.8:

`$ php artisan serve`

Consumir API através do POSTMAN:

Para usar o tokem recomenda-se usar o header `Authorization` com o conteúdo Barer seguido de espaço e o token ex:`Bearer xxxx..` afim de padronizar a autenticação visto que alguns verbos aceitam outras maneiras de autenticação como o POST enviando `api_token` no body da requisição opção que que o verbo GET já não possibilita.

Utilizar o header `Accept` como `application/json` para que a Api retorne apenas conteúdo em json.

Mapa da Api, os campos de header seguem em destaque:

prefixo `api/v1`

POST    `/cadastro` - passa como parametro **nome**, **email** e **senha** para se cadastrar na aplicação;

POST    `/login` - passa como parametro **email** e **senha** para se logar e gerar o token de acesso;

GET     `/pokemons` - lista todos os pokemons do banco de dados;

GET     `/pokemon/:id` - mostra os detalhes de um pokemon;

POST    `/pokemon/add` - cadastra um novo pokemon com **nome**, **tipo** do pokemon, poder de **ataque**, poder de **defesa** e **agilidade**;

PUT     `/pokemon/:id` - altera os dados do pokemon com **nome**, **tipo** do pokemon, poder de **ataque**, poder de **defesa** e **agilidade**;

DELETE  `/pokemon/:id` - remove um pokemon;