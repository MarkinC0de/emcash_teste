init: ## Iniciando o ambiente de desenvolvimento

	$(MAKE) copy
	$(MAKE) dev
	$(MAKE) install
	$(MAKE) keys
	$(MAKE) fresh

keys: ## Gerando secret keys
	docker-compose exec emcash-nginx bash -c "su -c 'php artisan key:generate' application"
	docker-compose exec emcash-nginx bash -c "su -c 'php artisan jwt:secret --force' application"

dev: ## Iniciar containers
	docker-compose up -d

##@ Database tools

migrate: ## Executar migrate
	docker-compose exec emcash-nginx php artisan migrate

##@ Composer

install: ## Instalar dependencias do composer
	docker-compose exec emcash-nginx bash -c "su -c \"composer install\" application"

##@ Composer

copy: ## Instalar dependencias do composer
	cp .env.example .env
	cp docker-compose.yml.example docker-compose.yml