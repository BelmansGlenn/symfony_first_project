# Vinylaloca 

- Vinylaloca is an Eshop, working with php/symfony5 and a MySQL database. Front-end is done with React.
This ReadMe will explain how we build this project.

## Deploy database and back structure on Heroku

1) Log your project to heroku

```bash
heroku login
```
2) Initialize your git

```bash
git init
```
3) Create your app on Heroku

4) Link your repo

```bash
heroku git:remote -a testmysqlhost
```
5) Go to "ressources" and add-ons ClearDB MySQL in your app on Heroku

7) Keep your database URL in the "Config Vars"

```bash
mysql://b88e7028697f16:80b3b5df@eu-cdbr-west-01.cleardb.com/heroku_a1252670d4fc714?reconnect=true -a testmysqlhost
```
8) Create a ```config.inc.php``` file in your PhpMyAdmin folder. You'll need to copy paste all the code inside your ```config.sample.inc.php``` in the new one, while adding this part juste over the end of server configuration.

```php
/* Heroku remote server */
$i++;
$cfg["Servers"][$i]["host"] = "eu-cdbr-west-01.cleardb.com"; //provide hostname
$cfg["Servers"][$i]["user"] = "b88e7028697f16"; //user name for your remote server
$cfg["Servers"][$i]["password"] = "80b3b5df"; //password
$cfg["Servers"][$i]["auth_type"] = "config"; // keep it as config

/**
 * End of servers configuration
 */
```
9) Now, give permissions to the new file ```config.inc.php``` with : 
```bash
sudo chmod 000 config.inc.php
```
10) Now if you run your phpmyadmin on local, you'll see a new server and database.

11) Add this code at the top of your index.php file
```php
<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
```
12) Create the Procfile files in your project with this line 
```php
web: vendor/bin/heroku-php-apache2 public/
```
13) Add the prod environnement on Heroku with this cmd in your project folder : 
```bash
heroku config:set APP_ENV=prod
```
14) If your /route doesn't work, you need to configure the Apache for server with : 

```bash
composer require symfony/apache-pack
git add composer.json composer.lock symfony.lock public/.htaccess
git commit -m "apache-pack"
```
## Helpfull link
[404 error solutions](https://stackoverflow.com/questions/65000646/symfony5-heroku-urls-404-not-found)
