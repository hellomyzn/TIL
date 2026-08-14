FROM mysql:8.0

ENV TZ=Asia/Tokyo

COPY ./infra/docker/mysql/my.cnf /etc/my.cnf

# sakila / world サンプルDBを初期化スクリプトとして焼き込む
# (コンテナ初回起動時、データボリュームが空の場合に自動で読み込まれる)
RUN microdnf install -y unzip \
    && curl -fsSL -o /tmp/sakila-db.zip http://downloads.mysql.com/docs/sakila-db.zip \
    && unzip -q /tmp/sakila-db.zip -d /tmp \
    && cp /tmp/sakila-db/sakila-schema.sql /docker-entrypoint-initdb.d/10-sakila-schema.sql \
    && cp /tmp/sakila-db/sakila-data.sql /docker-entrypoint-initdb.d/20-sakila-data.sql \
    && curl -fsSL -o /tmp/world-db.zip http://downloads.mysql.com/docs/world-db.zip \
    && unzip -q /tmp/world-db.zip -d /tmp \
    && cp /tmp/world-db/world.sql /docker-entrypoint-initdb.d/30-world.sql \
    && rm -rf /tmp/sakila-db.zip /tmp/sakila-db /tmp/world-db.zip /tmp/world-db \
    && microdnf remove -y unzip \
    && microdnf clean all

COPY ./db/mysql/initdb/ /docker-entrypoint-initdb.d/
