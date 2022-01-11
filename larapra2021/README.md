# docker-laravel-handson
Based on https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4

### Make sure with phpinfo.php
```
[mac] $ echo "<?php phpinfo();" > backend/public/phpinfo.php
```

### Docker Command
```
$ docker-compose up -d --build
$ docker-compose down

# log for laravel
$ docker-compose logs

# specific service
$ docker-compose logs -f app
```

### Seeder Command
```
$ php artisan migrate:fresh --seed
```
- laracasts_users
- laracasts_posts
- laracasts_categories