include .env
export $(shell sed 's/=.*//' .env)

PROJECT_NAME ?= my_project
USERNAME ?= vscode
WORKSPACE_PATH = /home/${USERNAME}/workspace
PROJECT_PATH = ${WORKSPACE_PATH}/src/${PROJECT_NAME}
COMPOSE = docker compose --project-name ${PROJECT_NAME}_devcontainer

up:
	docker-compose up -d --build
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
down:
	#{COMPOSE} down
restart:
	@make down
	@make up
destroy:
	${COMPOSE} down --rmi all --volumes
destroy-volumes:
	${COMPOSE} down --volumes
ps:
	docker-compose ps
logs:
	docker-compose logs
login:
	${COMPOSE} exec --user ${USERNAME} workspace bash
psql:
	${COMPOSE} exec postgres bash -c "psql -U postgres"
start:
	@make up
	@make login
# Spring Boot: run (通常)
mvn-run:
	@make _exec_run cmd="./mvnw spring-boot:run"
mvn-build:
	@make _exec_run cmd="./mvnw build"
mvn-test:
	@make _exec_run cmd="./mvnw test"

gr-run:
	@make _exec_run cmd="./gradlew bootRun"
gr-build:
	@make _exec_run cmd="./gradlew build"


# Spring Boot: run (in devcontainer)
mvn-run-d:
	@make _exec_run_dev cmd="./mvnw spring-boot:run"
mvn-build-d:
	@make _exec_run cmd="./mvnw build"
mvn-test-d:
	@make _exec_run_dev cmd="./mvnw test"

gr-run-d:
	@make _exec_run_dev cmd="./gradlew bootRun"
gr-build-d:
	@make _exec_run_dev cmd="./gradlew build"


# 共通関数（通常環境でコマンド実行）
_exec_run:
	docker compose exec --user ${USERNAME} workspace bash -lc "cd ${PROJECT_PATH} && $${cmd}"

# 共通関数（devcontainerでコマンド実行）
_exec_run_dev:
	${COMPOSE} exec --user ${USERNAME} workspace bash -lc "cd ${PROJECT_PATH} && $${cmd}"
