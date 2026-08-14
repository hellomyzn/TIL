up:
	docker compose up -d --wait

down:
	docker compose down --remove-orphans

down-v:
	docker compose down --remove-orphans --volumes

build:
	docker compose build

restart:
	@make down
	@make up

destroy:
	docker compose down --rmi all --volumes --remove-orphans

ps:
	docker compose ps

logs:
	docker compose logs --follow

log-mysql:
	docker compose logs --follow mysql

log-postgres:
	docker compose logs --follow postgres

run-mysql:
	@make up
	docker compose exec mysql bash -c 'mysql -u"$$MYSQL_USER" -p"$$MYSQL_PASSWORD" "$$MYSQL_DATABASE"'

run-postgres:
	@make up
	docker compose exec postgres bash -c 'psql -U "$$POSTGRES_USER" -d "$$POSTGRES_DB"'

run: 
	@make up
	@make run-mysql

