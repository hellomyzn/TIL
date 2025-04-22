include .env
export $(shell sed 's/=.*//' .env)

up:
	docker-compose up -d --build
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
down:
	docker compose --project-name ${PROJECT_NAME}_devcontainer down
restart:
	@make down
	@make up
destroy:
	docker-compose --project-name ${PROJECT_NAME}_devcontainer down --rmi all --volumes
destroy-volumes:
	docker-compose --project-name ${PROJECT_NAME}_devcontainer down --volumes
ps:
	docker-compose ps
logs:
	docker-compose logs
login:
	docker-compose --project-name ${PROJECT_NAME}_devcontainer exec --user ${USERNAME} workspace bash
psql:
	docker-compose --project-name ${PROJECT_NAME}_devcontainer exec postgres bash -c "psql -U postgres"
start:
	@make up
	@make login
# spring boot: run server
sbs:
	docker-compose exec --user ${USERNAME} workspace bash -lc \
	"export PATH=\$$HOME/.sdkman/candidates/maven/current/bin:\$$PATH && \
	cd /home/${USERNAME}/workspace/src/${PROJECT_NAME} && mvn spring-boot:run"
#	docker-compose exec --user ${USERNAME} workspace bash -lc "cd /home/${USERNAME}/workspace/${PROJECT_NAME} && ./gradlew bootRun"

# 	in devcontainer
sbsd:
	docker-compose --project-name ${PROJECT_NAME}_devcontainer exec --user ${USERNAME} workspace bash -lc \
	"export PATH=\$$HOME/.sdkman/candidates/maven/current/bin:\$$PATH && \
	cd /home/${USERNAME}/workspace/src/${PROJECT_NAME} && mvn spring-boot:run"
# 	docker-compose --project-name ${PROJECT_NAME}_devcontainer exec --user ${USERNAME} workspace bash -lc "cd /home/${USERNAME}/workspace/src/${PROJECT_NAME} && ./gradlew bootRun"

# spring boot: build
sbb:
	docker-compose exec --user ${USERNAME} workspace bash -lc "cd /home/${USERNAME}/workspace/${PROJECT_NAME} && ./gradlew build"
# 	in devcontainer
sbbd:
	docker-compose --project-name ${PROJECT_NAME}_devcontainer exec --user ${USERNAME} workspace bash -lc "cd /home/${USERNAME}/workspace/${PROJECT_NAME} && ./gradlew build"