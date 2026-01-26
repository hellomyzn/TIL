### how to run
1. ./devcontainer/Makeを使ってサーバーを起動
```
cd .devcontainer
cp .env.example .env
make up
make sps
```

2. dbをpgAdminを使って作成
    1. `http://localhost:8888`にアクセスし、.envで設定したメールアドレスとパスワードでログイン
    2. 左メニューの`Servers`を左クリックし、Registerをクリック
    3. 下記のように設定をし作成する。 
        - Name: `dev`
        - Host: `postgres`
        - Username: `postgres`
        - Password: `postgres`

3. SwaggerからAPIを叩く
    - url: `http://localhost:8080/swagger-ui/index.html`

4. 終わったらサーバーを落とし、不要なデータは削除する
    - `make destroy`をする
    - `rm -rf .devcontainer/docker/postgres/data/*`
    - `rm -rf .devcontainer/docker/pgadmin4_data/*`


