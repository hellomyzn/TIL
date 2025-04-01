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
destroy-volumes:
	docker-compose down --volumes
ps:
	docker-compose ps
logs:
	docker-compose logs
login:
	docker-compose exec --user ${USERNAME} workspace bash
start:
	@make up
	@make login
# spring boot: run server
sps:
# --no-daemonでvscodeとの競合を防ぐ
	docker-compose exec --user ${USERNAME} workspace bash -lc "cd /home/${USERNAME}/workspace/${PROJECT_NAME} && ./gradlew bootRun --no-daemon"
# spring boot: build
spb:
	docker-compose exec --user ${USERNAME} workspace bash -lc "cd /home/${USERNAME}/workspace/${PROJECT_NAME} && ./gradlew build"
