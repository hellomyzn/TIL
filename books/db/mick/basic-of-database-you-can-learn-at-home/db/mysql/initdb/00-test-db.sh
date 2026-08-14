#!/bin/bash
# entrypoint がこのスクリプトを `source` するため、set はサブシェルで隔離する
# (漏れると entrypoint 自身が壊れて後続の初期化スクリプトが実行されなくなる)
(
    set -euo pipefail
    mysql -uroot -p"$MYSQL_ROOT_PASSWORD" <<-EOSQL
        CREATE DATABASE IF NOT EXISTS test CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
        GRANT ALL PRIVILEGES ON test.* TO '$MYSQL_USER'@'%';
        -- sakila / world はこの後の初期化スクリプトで作成されるが、
        -- 存在しないDBへのGRANTも先に発行しておける
        GRANT ALL PRIVILEGES ON sakila.* TO '$MYSQL_USER'@'%';
        GRANT ALL PRIVILEGES ON world.* TO '$MYSQL_USER'@'%';
        FLUSH PRIVILEGES;
EOSQL
)
