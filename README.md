## Requisitos para executar o projeto
 - php 7.4
 - composer 2
 - node 16

### 1. Executando o backend
Execute os seguintes comandos na pasta raiz:

```
    composer install
    php artisan migrate
    php artisan seed
    php artisan serve
```
Após esses passos a api de listagem de empresas estará disponível para receber requisições GET, conforme exemplo:

```
curl --request GET \
  --url 'http://localhost:8000/api/companies?uf=PR&name=a&page=1&city=Curitiba'
```

### 2. Executando o frontend
Para rodar o frontend executar os seguintes comandos na pasta frontend:
```
    npm install
    npm run dev
```
Na sequência a url [http://localhost:5173/](http://localhost:5173/) estará disponível para ser acessada no navegador.
