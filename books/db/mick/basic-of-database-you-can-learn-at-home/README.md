# おうちで学べるデータベースのきほん
url: https://amzn.asia/d/04pzVZCb

## 環境構築

MySQL / PostgreSQL の両方をコンテナで起動できます。

```sh
make up          # コンテナ起動
make run         # MySQL に接続 (mysql クライアント)
make run-postgres # PostgreSQL に接続 (psql)
make down        # コンテナ停止・削除
```

MySQLコンテナには [sakila サンプルDB](https://dev.mysql.com/doc/sakila/en/) と [world サンプルDB](https://dev.mysql.com/doc/world-setup/en/)、
空の `test` DB をビルド時に用意済みです。初回起動時（データボリュームが空の場合）に自動で作成されます
（`test` DBは `MYSQL_USER`（デフォルト: `practice`）から自由に読み書きできます）。

追加で書籍のサンプルSQLを読み込みたい場合は `db/mysql/initdb/` に `.sql` ファイルを置いて `make build` し直してください
（イメージに焼き込む方式のため、ファイルを追加・変更したら再ビルドが必要です）。
PostgreSQL側は `db/postgres/initdb/` に置くと、初回起動時（ボリューム未作成時）に自動で実行されます。

接続情報を変更したい場合は `.env.example` を `.env` にコピーして編集してください（未設定でもデフォルト値で起動します）。
