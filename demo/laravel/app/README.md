# install 手順

## MySQL に Database を作成

```
mysql -u root -p 
```

パスワード無しなので、[Enter]でログイン


```
create database mosdb ;
create user 'mos'@'localhost' identified by 'mos' ;
grant all on mosdb.* to 'mos'@'localhost' ;
```

```
mysql -u mos -p 
```

で、パスワード mos で入れること


## Composer install 

```
composer install 
```

vendor フォルダーが作成される



## .env の修正

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mosdb
DB_USERNAME=mos
DB_PASSWORD=mos
```


## データの投入 の作成

```
php artisan migrate:flush --seed
```


## Web API サーバーの起動
```
php artisan serve
```
