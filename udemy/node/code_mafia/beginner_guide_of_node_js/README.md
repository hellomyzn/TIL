# docker-node-handson
`Node.jsで学ぶWebシステムとソフトウェア開発基礎！Node.js完全入門ガイド`の勉強環境

コンテナ内での実行方法
```bash
$ node someple.js
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