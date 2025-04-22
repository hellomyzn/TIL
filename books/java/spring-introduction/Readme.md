### how to create projects
1. .envのプロジェクト名をプロジェクトディレクトリ名に変更
2. .devcontainerでコンテナを起動
3. `command + shift + p`で`Java Create Java Project...`を選択
4. その後の設定は任意で選択 (2025年時点でのおすすめは下記)
   1. `Spring Boot`
   2. `Maven Project` (もし、Gradleを使用する場合は`docker/workspace/gradle/Dockerfile`を`docker-compose.yml`で使用してください。)
   3. 一番上のバージョン
   4. `Java`
   5. `com.example`
   6. プロジェクト名
   7. `War`
   8. `17`
   9. dependencies
      1.  `Spring Boot DevTools`
      2.  `Spring Web`
      3.  `Lombok`
   10. /home/vscode/workspace/src

ref: https://youtu.be/Qy7ZCnkxXCY?si=UR0u03A9J8bPEeef

### how to run with maven
1. cd ./.devcontainer
2. make login
3. cd プロジェクトディレクトリ
4. mvn spring-boot:run


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


