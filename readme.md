# SilenceOnTheWire Lumen Logs implementation

This microservice allows you to create logs from another application, e.g. Laravel applications and read them.

This is a simple interpretation of the logs microservice for everyone based on Lumen Framework and the GPL 3.0 license. Code under the GNU GPL license cannot be used in programs based on other licenses.

## Required microservices

This microservice required users microservice:

https://github.com/hkt5/users

and setup .env variable

```bash
AUTH_URL=127.0.0.1:8001/api/logs
```

## Official Documentation

If you can setup database, cp .en.example to .env.

The first is database instalation. You must use command:

```bash
php artisan migrate --seed
```

If you want generate documentation, please use this command:

```bash
php artisan scribe:generate
```

### Apache setup

Use .htaccess:
```bash
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

Virtual host setup:

```bash
<VirtualHost *:80>
    ServerAdmin webmaster@myapp.com
    ServerName myapp.com
    DocumentRoot /var/www/myapp.com/public/

    <Directory /var/www/myapp.com/public/>
        Options -Indexes +FollowSymLinks +MultiViews
        AllowOverride All
        Require all granted
        <FilesMatch \.php$>
            # Change this "proxy:unix:/path/to/fpm.socket"
            # if using a Unix socket
            #SetHandler "proxy:fcgi://127.0.0.1:9000"
        </FilesMatch>
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/myapp.com-error.log

    # Possible values include: debug, info, notice, warn, error, crit,
    # alert, emerg.
    LogLevel warn
    CustomLog ${APACHE_LOG_DIR}/myapp.com-access.log combined
</VirtualHost>
```

# Nginx setup

Use setup:

```bash
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## Security Vulnerabilities

If you discover a security vulnerability within this solution, please send an e-mail to Adrian Stolarski at adrian.stolarski@gmail.com. All security vulnerabilities will be promptly addressed.

## License

This soulution is a [GPL License](https://en.wikipedia.org/wiki/GNU_General_Public_License).

## Middleware

The current solution uses middlewares:

```php
$app->middleware([
     App\Http\Middleware\DBTransaction::class,
    App\Http\Middleware\LumenCors::class,
]);
```

## Commercial usage

If you want to use this software under a commercial license without publishing derivative sources, all you have to do is deposit $ 15 peer year to my paypal account: adrian.stolarski@gmail.com
