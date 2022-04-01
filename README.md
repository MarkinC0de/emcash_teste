# EmCash - Backend Test 
*Caso não tenha o make instalado na sua máquina, irei deixar tutorias para Windows e Linux, sobre como instalar o mesmo no final.*

Após clonar o projeto execute os seguinte comando no terminal :

    make init
   Com isso o projeto já está totalmente apto a ser testado da maneira que desejar.
   
## Rotas

| Verbo Http     |Rota                           |
|----------------|-------------------------------|
|GET|`api/triangle` |
|POST|`api/triangle` - parâmetros : height e base|
|GET|`api/calculate-triangle/{id}`|
|DELETE|`api/triangle/{id}`|
||
|GET|`api/rectangle`|
|POST|`api/rectangle` - parâmetros : length e width|
|GET|`api/calculate-rectangle/{id}`|
|DELETE|`api/rectangle/{id}`|


## 

Se preferir não utilizar o make, basta executar os seguintes comandos em ordem:

    cp .env.example .env  
    cp docker-compose.yml.example docker-compose.yml
    docker-compose up -d
    docker-compose exec emcash-nginx bash -c "su -c \"composer install\" application"
    docker-compose exec emcash-nginx bash -c "su -c 'php artisan key:generate' application"
    docker-compose exec emcash-nginx php artisan migrate
    

## 
Make para Windows (choco) -> https://chocolatey.org/install

Make para Linux  -> https://linuxhint.com/install-make-ubuntu/



