include .env
export $(shell sed 's/=.*//' .env)

up:
	docker-compose up -d --build
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
down:
	docker-compose down
restart:
	@make down
	@make up
destroy:
	docker-compose down --rmi all --volumes
	docker-compose -f ./docker-compose-vscode.yml down --rmi all --volumes
destroy-volumes:
	docker-compose down --volumes
	docker-compose -f ./docker-compose-vscode.yml down --volumes
ps:
	docker-compose ps
logs:
	docker-compose logs
java:
	docker-compose exec --user ${USERNAME} workspace bash
start:
	@make up
	@make java

server:
	docker-compose exec --user ${USERNAME} workspace bash -lc " cd /home/vscode/workspace/${PROJECT_NAME} && ./gradlew bootRun"
