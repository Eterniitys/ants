# ants

## Project setup
```
composer install
chmod +x bin/console
```

## Set Database
If you run under mariadb/mysql
```
echo "DATABASE_URL=mysql://<databaseUser>:<databaseUserPassw>@127.0.0.1:3306/ants" >> .env.local
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate
bin/console doctrine:fixture:load
```

## Run server
```
bin/console server:run
```
