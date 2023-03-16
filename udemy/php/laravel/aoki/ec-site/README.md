# docker-laravel-handson
Based on https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4

### Make sure with phpinfo.php
```
[mac] $ echo "<?php phpinfo();" > src/public/phpinfo.php
```

### How to create a new project
0. Remove `.git`
```
$ rm -rf .git
```

1. Set up `.env` for `docker-compose.yml`
```
$ cp .env.template .env
Add NGROK_AUTH key
```

2. Create laravel project
```
$ make create
```

3. Initialization
```
$ make install
```

`.env.testing`
```
APP_ENV=testing
DB_HOST=db-testing
```
`phpunit.xml`
```
    <php>
        <env name="APP_ENV" value="testing" force="true"/>
        <env name="DB_CONNECTION" value="mysql" force="true"/>
        <env name="DB_HOST" value="db-testing" force="true"/>
        <env name="DB_PORT" value="3306" force="true"/>
        <env name="DB_DATABASE" value="laravel_local" force="true"/>
        <env name="DB_USERNAME" value="phper" force="true"/>
        <env name="DB_PASSWORD" value="secret" force="true"/>
        <env name="BCRYPT_ROUNDS" value="4"/>
        <env name="CACHE_DRIVER" value="array"/>
        <env name="MAIL_DRIVER" value="array"/>
        <env name="QUEUE_CONNECTION" value="sync"/>
        <env name="SESSION_DRIVER" value="array"/>
    </php>
```

4. Install Packages
```
# composer packages
$ make install-recommend-packages
```

`src/vite.config.js`
```js:src/vite.config.js
...
    server: {
        host: true,
        hmr: {
            host: 'localhost',
        },
    },
...
```

5. Make sure
```
# Web server
$ open http://localhost:80/

# Php my admin
$ open http://localhost:8888/

# Ngrok
$ open http://localhost:4040/
```

### Optional setup
1. `.env`
```
APP_NAME=Application name
```

2. Timezone and Language
`config/app.php`
```
return [
    // アプリケーションデフォルトのタイムゾーンを設定できます。
    // PHPの日付および日時関数を使用する際にこの設定を参照します。
    'timezone' => 'Asia/Tokyo',

    // 翻訳サービスプロバイダーが使用するデフォルトのロケールを設定します。
    'locale' => 'ja',

    // フォールバックロケールは、指定したロケールが使用できない場合に使用するロケールを決定します。
    'fallback_locale' => 'ja',

    // FakerPHPライブラリがデータを生成する際に使用されます。
    'faker_locale' => 'ja_JP',
],
```

3. Database charset
`config/database.php`
```
return [
    'connections' => [
        'mysql' => [
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_bin',
        ],
    ],
];
```

4. Japanese translation file
[Laravel 9.x validation.php言語ファイル](https://readouble.com/laravel/9.x/ja/validation-php.html)

5. Remove unnecessary scripts on `composer.json`
`composer.json`
```
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi"
        ]
    },
```

6. Logs
**Change from single to daily log**
`src/config/loggging.php`
```
        'stack' => [
            'driver' => 'stack',
            'channels' => ['daily', 'stderr'],
            'ignore_exceptions' => false,
        ],
        
        ・・・
        # out put app logs to docker compose logs -f app
        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER', 'Monolog\\Formatter\\JsonFormatter'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

```
- Slack log: [LaravelでエラーログをSlackに投稿したい](https://qiita.com/shihori_23/items/4f6d37c2c2c546909159)
- SQL log: [Laravel SQLの実行クエリログを出力する](https://qiita.com/ucan-lab/items/753cb9d3e4ceeb245341)
- Request log: [Laravel リクエストログを出力する](https://qiita.com/ucan-lab/items/bfd15b096a916f811468)
- Console log and HTTP log: [Laravel ConsoleとHttpのログファイルを分ける](https://qiita.com/ucan-lab/items/4dd7b5f7a3eb57a3ef1f)


**references**
- [Laravelプロジェクトの初期設定](https://qiita.com/ucan-lab/items/8eab84e37421f907dea0)



### Output server log
```
# log for laravel
$ docker-compose logs

# specific service
$ docker-compose logs -f app

# db logs
$ make logs-db

# db error logs
$ make logs-db-error

# recommend to use grep
$ make logs-db | grep 2023-01-20

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

# If you want to remove <none> images
$ docker image prune

# If you want to make sure .evn file for docker-compose.yml is working or not
$ docker-compose config
```
