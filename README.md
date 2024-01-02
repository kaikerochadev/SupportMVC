
# MVC - Nódulo de Suportes

Esse projeto foi desenvolvido através do curso de Laravel 10 do EspecializaTi. <br/> <br/>
O projeto apresenta um sistema CRUD completo que permite a criação, leitura, edição e exclusão de dúvidas. Além disso, conta com paginação das dúvidas e um status para cada dúvida.
<br/> <br/>
Este projeto foi desenvolvido utilizando PHP, Laravel, Docker e MySQL para garantir um sistema robusto e eficiente.

### Passo a passo
Clone Repositório
```sh
git clone -b supportMVC https://github.com/kaikerochadev/SuporteMVC.git mvc-laravel
```
```sh
cd app-laravel
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=MVC
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)
