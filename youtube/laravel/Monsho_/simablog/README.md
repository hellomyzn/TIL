# docker-laravel-handson
https://www.youtube.com/watch?v=5U0p_OjMmYc&list=PLf5KB8oI_L_3mXd4MoEw4DBwhmGiF5low&ab_channel=%E3%83%97%E3%83%AD%E3%82%B0%E3%83%A9%E3%83%9F%E3%83%B3%E3%82%B0%E5%AD%A6%E7%BF%92%E3%82%B5%E3%83%9D%E3%83%BC%E3%82%BF%E3%83%BC%E3%82%82%E3%82%93%E3%81%97%E3%82%87%E3%83%BC%E3%80%90IT%E3%83%A9%E3%83%9C%E3%80%91

Based on https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4


### Make sure with phpinfo.php
```
[mac] $ echo "<?php phpinfo();" > backend/public/phpinfo.php
```

### Docker Command
```
# build
$ docker-compose up -d --build

# down
$ docker-compose down
```

### Into to container
```
# app server
$ docker-compose exec app bash

# node server
$ docker-compose exec node ash

# db server
$ docker-compose exec db bash
```

### Output server log
```
# log for laravel
$ docker-compose logs

# specific service
$ docker-compose logs -f app

# schemaspy service
$ docker-compose logs schemaspy
```


### Connect to database management application
![image](https://user-images.githubusercontent.com/20104403/114467672-3b724680-9c25-11eb-97e3-b868b9c0cf09.png)

### FYI
```
# If you see memory limit error to composer install or using require, Raise the upper limit
$ php -d memory_limit=-1 /usr/bin/composer install
$ php -d memory_limit=-1 /usr/bin/composer require << PACKAGE >>

# You got conflict of package
$ composer install --ignore-platform-reqs
$ composer update --ignore-platform-reqs
```

### Ruine the world
```
$  docker-compose down --rmi all --volumes --remove-orphans 
```

### localhosts
```
web server: http://localhost:8080/
ngrok:      http://localhost:4040/
schemaspy:  http://localhost:8081/
```