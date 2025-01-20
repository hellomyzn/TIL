# docker-react-handson

下記の記事をの練習プロジェクト
https://zenn.dev/optimisuke/articles/387b30c547ac54

React の実行環境用コンテナ

React プロジェクト作成と起動

```bash
$ npx create-react-app my-app
$ cd my-app
$ npm start
```

Next プロジェクト作成と起動

```bash
$ npx create-next-app
$ rm -rf /app/* && npx create-next-app@latest . --use-npm --no-ts --eslint
$ npm run dev
```

### Docker Command

```
# build (docker-compose up -d --build)
$ make up

# down (docker-compose down)
$ make down
```

### Into to container

```
# Javascript server (docker-compose exec js bash)
$ make node
```

### Ruine the world

```
# destroy (docker-compose down --rmi all --volumes --remove-orphans)
$ make destroy
```

### hoge

How do I press and hold a key and have it repeat in VSCode?

```
$ defaults write com.microsoft.VSCode ApplePressAndHoldEnabled -bool false

```
