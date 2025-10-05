# 📦 Docker Dev Environment for Go

Go 向けの DevContainer 環境です。VSCode の Dev Containers 機能を利用して、ホットリロードしながら開発できます。

---

## 🚀 Quick Start

### 1. Set up environment variables

```bash
cp .env.template .env
```

必要であれば `.env` を編集してポートやユーザー設定を変更します。

---

### 2. Change `PROJECT_NAME` 
Change `PROJECT_NAME` in `.devcontainer/.env` and value of name in`.devcontainer/devcontainer.json`
```.env
PROJECT_NAME=<PROJECT_NAME>
...
```
```json
{
  "name": "<PROJECT_NAME>",
  ...
```

### 3. Open the container in VSCode

VSCode で `Reopen in Container` を選択すると DevContainer が立ち上がります。

---

### 4. Run the application

```bash
make dev
```

`http://localhost:8080` で Go の HTTP サーバーが確認できます。

---

## 🛠️ Useful Commands

| Command     | Description                                   |
| :---------- | :-------------------------------------------- |
| `make dev`  | `go run ./cmd/server` を実行します             |
| `make build`| `go build ./...` を実行します                 |
| `make down` | DevContainer 用コンテナを停止します           |
| `make exec` | コンテナにシェルで入ります                    |
| `make mysql` | mysql dbに入ります                    |
| `make psql` | postgres dbに入ります                    |

---

## ⚙️ Notes

- ベースイメージは `golang:1.22-bullseye` を使用しています。
- `.env` 内でポートやユーザー ID を変更できます。
- VSCode で Go 拡張機能を利用するとコード補完が有効になります。
- PostgreSQL を利用する場合は `.devcontainer/docker-compose.yml` の `postgres` サービスをコメント解除し、MySQL を無効にしてから `make down` で再起動してください。`workspace` サービスの `depends_on` も忘れずに切り替えます。

